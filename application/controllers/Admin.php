<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
date_default_timezone_set('Asia/Jakarta');
class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "admin"){
			redirect(base_url("login"));
		}
		$this->load->model('m_general');
	}
	
	public function laporan()
	{
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_laporan');
		$this->load->view("v_admin_footer");
	}
	
	public function get_data_master_laporan($tahun="", $bulan="")
	{
		if($bulan==""){
			$where1 = "";
		}else{
			$where1 = "AND MONTH(pemesanan_created)=$bulan";
		}
		
		if($tahun==""){
			$where2 = "";
		}else{
			$where2 = "AND YEAR(pemesanan_created)=$tahun";
		}
		
		
		$userid = $this->session->userdata('userid');
		$where3= array("user_id" => $userid);
		$user = $this->m_general->view_by("tbl_user",$where3);
		
		$table = "
        (
            SELECT
                tbl_pemesanan.*, tbl_paket.paket_judul, tbl_user.user_name, tbl_user.user_namalengkap, tbl_user.user_alamatlengkap
            FROM tbl_pemesanan, tbl_paket, tbl_tentangkami, tbl_user
			WHERE tbl_pemesanan.paket_id=tbl_paket.paket_id AND tbl_pemesanan.tentangkami_id=tbl_tentangkami.tentangkami_id
			AND tbl_pemesanan.user_id=tbl_user.user_id
			AND pemesanan_status='1' $where1 $where2
			AND tbl_user.tentangkami_id='$user->tentangkami_id'
        )temp";
		
        $primaryKey = 'pemesanan_id';
        $columns = array(
        array( 'db' => 'pemesanan_created',     'dt' => 0 ),
        array( 'db' => 'user_name',     'dt' => 1 ),
        array( 'db' => 'user_namalengkap',     'dt' => 2 ),
        array( 'db' => 'user_alamatlengkap',     'dt' => 3 ),
        array( 'db' => 'paket_judul',     'dt' => 4 ),
        array( 'db' => 'pemesanan_jumlahbayar',     'dt' => 5 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	public function laporan_cetak($tahun="", $bulan="")
	{
		if($bulan==""){
			$where1 = "";
			$data['bulan'] = "Semua";
		}else{
			$where1 = "AND MONTH(pemesanan_created)=$bulan";
			$bulan_teks = $this->m_general->bulan($bulan);
			$data['bulan'] = $bulan_teks;
		}
		
		if($tahun==""){
			$where2 = "";
			$data['tahun'] = "Semua";
		}else{
			$where2 = "AND YEAR(pemesanan_created)=$tahun";
			$data['tahun'] = $tahun;
		}
		
		$data['tbl_laporan'] = $this->db->query("SELECT
                tbl_pemesanan.*, tbl_paket.paket_judul, tbl_user.user_name, tbl_user.user_namalengkap, tbl_user.user_alamatlengkap
            FROM tbl_pemesanan, tbl_paket, tbl_tentangkami, tbl_user
			WHERE tbl_pemesanan.paket_id=tbl_paket.paket_id AND tbl_pemesanan.tentangkami_id=tbl_tentangkami.tentangkami_id
			AND tbl_pemesanan.user_id=tbl_user.user_id
			AND pemesanan_status='1' $where1 $where2")->result();
		
		$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8', 
		'format' => 'A4-P',
		'margin_left' => 12,
		'margin_right' => 12,
		'margin_top' => 5,
		'margin_bottom' => 10,
		'margin_header' => 3,
		'margin_footer' => 3,
		]); //L For Landscape , P for Portrait
        $mpdf->SetTitle("Laporan");
		$halaman = $this->load->view('v_admin_laporan_cetak',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	
	
	public function pemesanan()
	{
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_pemesanan');
		$this->load->view("v_admin_footer");
	}
	
	public function get_data_master_pemesanan()
	{
		$userid = $this->session->userdata('userid');
		$where1= array("user_id" => $userid);
		$user = $this->m_general->view_by("tbl_user",$where1);
		//JIKA TENTANG KAMI NYA PUSAT MAKA BISA LIHAT SEMUA PESANAN
		$table = "
        (
            SELECT
                tbl_pemesanan.*, tbl_paket.paket_judul, tbl_tentangkami.tentangkami_namaperusahaan
            FROM tbl_pemesanan, tbl_paket, tbl_tentangkami
			WHERE tbl_pemesanan.paket_id=tbl_paket.paket_id AND tbl_pemesanan.tentangkami_id=tbl_tentangkami.tentangkami_id
			AND tbl_pemesanan.tentangkami_id='$user->tentangkami_id'
        )temp";
		
        $primaryKey = 'pemesanan_id';
        $columns = array(
        array( 'db' => 'paket_judul',     'dt' => 0 ),
        array( 'db' => 'tentangkami_namaperusahaan',     'dt' => 1 ),
        array( 'db' => 'pemesanan_jumlahbayar',     'dt' => 2 ),
        array( 'db' => 'pemesanan_buktibayar',     'dt' => 3 ),
        array( 'db' => 'pemesanan_status',     'dt' => 4 ),
        array( 'db' => 'pemesanan_id',     'dt' => 5 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	public function pemesanan_aksi_ubah($pemesanan_id)
    {
		$_POST['pemesanan_status'] = 1;
		
		$where = array("pemesanan_id" => $pemesanan_id);
		$this->m_general->edit("tbl_pemesanan", $where, $_POST);
		redirect('admin/pemesanan');
    }	
	public function pemesanan_aksi_hapus($pemesanan_id){
			$where['pemesanan_id'] = $pemesanan_id;
			$this->m_general->hapus("tbl_pemesanan", $where);
			redirect('admin/pemesanan');
	}
	
	public function inbox_aksi_ubah($pemesanan_id)
    {
		$_POST['pemesanan_status'] = 1;
		$where = array("pemesanan_id" => $pemesanan_id);
		$this->m_general->edit("tbl_pemesanan", $where, $_POST);
		
		$where = array("pemesanan_id" => $pemesanan_id);
		$data['tbl_pemesanan'] = $this->m_general->view_by("tbl_pemesanan",$where);
		
		$where1= array("user_id" => $data['tbl_pemesanan']->user_id);
		$user = $this->m_general->view_by("tbl_user",$where1);
		
		$url = base_url()."pelanggan/penjadwalan";
		$id = $data['tbl_pemesanan']->paket_id;
		$data1 = array(
			'inbox_pengirim' => "ADMIN CABANG",
			'inbox_pesan' => "KONFIRMASI PEMESANAN JADWAL SUDAH DI VALIDASI. SILAHKAN KLIK LINK BERIKUT UNTUK MENENTUKAN <a href='$url/$id'>JADWAL</a>!.",
			'user_id' => $user->user_id
		);
		$url = base_url()."admin/inbox";
		$data2 = array(
			'inbox_pengirim' => "SISTEM",
			'inbox_pesan' => "KONFIRMASI PEMESANAN JADWAL OLEH USER $user->user_namalengkap ($user->user_name) SUDAH DIVALIDASI. MOHON MENUNGGU PENENTUAN JADWAL DARI USER, TERIMAKASIH.",
			'user_id' => $this->session->userdata('userid')
		);
		$this->m_general->add("tbl_inbox", $data1);
		$this->m_general->add("tbl_inbox", $data2);
		
		redirect('admin/inbox');
    }
	
	public function inbox($pemesanan_id="")
	{
		$where = array("pemesanan_id" => $pemesanan_id);
		$data['tbl_pemesanan'] = $this->m_general->view_by("tbl_pemesanan",$where);
		
		if($pemesanan_id!=""){
			$where2 = array("user_id" => $data['tbl_pemesanan']->user_id);
			$data['tbl_user'] = $this->m_general->view_by("tbl_user",$where2);
			
			$where3 = array("paket_id" => $data['tbl_pemesanan']->paket_id);
			$data['tbl_paket'] = $this->m_general->view_by("tbl_paket",$where3);
			
			$where4 = array("tentangkami_id" => $data['tbl_pemesanan']->tentangkami_id);
			$data['tbl_tentangkami'] = $this->m_general->view_by("tbl_tentangkami",$where4);
		}
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_inbox',$data);
		$this->load->view("v_admin_footer");
	}
	
	public function get_data_master_inbox()
	{
		//JIKA TENTANG KAMI NYA PUSAT MAKA BISA LIHAT SEMUA INBOX
		$userid = $this->session->userdata('userid');
		$table = "
        (
            SELECT
                tbl_inbox.*
            FROM tbl_inbox
			WHERE user_id='$userid'
        )temp";
		
        $primaryKey = 'inbox_id';
        $columns = array(
        array( 'db' => 'inbox_pengirim',     'dt' => 0 ),
        array( 'db' => 'inbox_created',     'dt' => 1 ),
        array( 'db' => 'inbox_pesan',     'dt' => 2 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	
	public function index()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_index');
		$this->load->view('v_admin_footer');
	}
	
	public function paket()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_paket');
		$this->load->view('v_admin_footer');
	}
	
	public function get_data_master_paket()
	{
		$table = "
        (
            SELECT
                tbl_paket.*
            FROM tbl_paket
        )temp";
		
        $primaryKey = 'paket_id';
        $columns = array(
        array( 'db' => 'paket_judul',     'dt' => 0 ),
        array( 'db' => 'paket_keterangan',     'dt' => 1 ),
        array( 'db' => 'paket_harga',     'dt' => 2 ),
        array( 'db' => 'paket_lamakursus',     'dt' => 3 ),
        array( 'db' => 'paket_foto',     'dt' => 4 ),
        array( 'db' => 'paket_id',     'dt' => 5 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function paket_tambah()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_paket_add");
		$this->load->view("v_admin_footer");
    }
	public function paket_ubah($paket_id)
	{
		$where = array("paket_id" => $paket_id);
		$data['tbl_paket'] = $this->m_general->view_by("tbl_paket",$where);
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_paket_edit', $data);
		$this->load->view("v_admin_footer");
	}	
	public function paket_aksi_tambah()
    {
		$folder = "paket";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
					
		$_POST['paket_foto'] = $nama_fileupload;
		$this->m_general->add("tbl_paket", $_POST);
		redirect('admin/paket');
    }	
	public function paket_aksi_ubah($paket_id)
    {
		$folder = "paket";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = $this->input->post('paket_foto');
		}
					
		$_POST['paket_foto'] = $nama_fileupload;
		
		$where = array("paket_id" => $paket_id);
		$this->m_general->edit("tbl_paket", $where, $_POST);
		redirect('admin/paket');
    }	
	public function paket_aksi_hapus($paket_id){
			$where['paket_id'] = $paket_id;
			$this->m_general->hapus("tbl_paket", $where);
			redirect('admin/paket');
	}
	
	///////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////
	
	public function user()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_user');
		$this->load->view('v_admin_footer');
	}
	
	public function get_data_master_user()
	{
		$table = "
        (
            SELECT
                tbl_user.*, tbl_tentangkami.tentangkami_namaperusahaan
            FROM tbl_user, tbl_tentangkami
			WHERE tbl_user.tentangkami_id=tbl_tentangkami.tentangkami_id
        )temp";
		
        $primaryKey = 'user_id';
        $columns = array(
        array( 'db' => 'user_name',     'dt' => 0 ),
        array( 'db' => 'user_namalengkap',     'dt' => 1 ),
        array( 'db' => 'user_level',     'dt' => 2 ),
        array( 'db' => 'tentangkami_namaperusahaan',     'dt' => 3 ),
        array( 'db' => 'user_id',     'dt' => 4 ),
        array( 'db' => 'user_status',     'dt' => 5 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function user_tambah()
    {
		$data['tbl_tentangkami'] = $this->m_general->view("tbl_tentangkami");
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_user_add",$data);
		$this->load->view("v_admin_footer");
    }
	public function user_ubah($user_id)
	{
		$data['tbl_tentangkami'] = $this->m_general->view("tbl_tentangkami");
		$where1 = array("user_id" => $user_id);
		$data['tbl_user'] = $this->m_general->view_by("tbl_user",$where1);
		$where2 = array("tentangkami_id" => $data['tbl_user']->tentangkami_id);
		$data['tbl_tentangkami_by'] = $this->m_general->view_by("tbl_tentangkami",$where2);
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_user_edit', $data);
		$this->load->view("v_admin_footer");
	}	
	public function user_aksi_tambah()
    {
		$folder = "avatar";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
		
		$user_password = $_POST['user_password'];
		$user_password_md5 = md5($user_password);
		$_POST['user_password'] = $user_password_md5;
        $_POST['user_foto'] = $nama_fileupload;
		$this->m_general->add("tbl_user", $_POST);
		redirect('admin/user');
    }	
	
	public function user_aksi_ubah($user_id)
    {
		$folder = "avatar";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = $this->input->post('user_foto');
		}
					
		$_POST['user_foto'] = $nama_fileupload;
		
		if($this->input->post('user_password')[0]==$this->input->post('user_password')[1]){
			$_POST['user_password'] = $this->input->post('user_password')[0];
		}else{
			$_POST['user_password'] = md5($this->input->post('user_password')[0]);
		}
		
		$where = array("user_id" => $user_id);
		$this->m_general->edit("tbl_user", $where, $_POST);
		redirect('admin/user');
    }	
	
	public function user_aktivasi($user_id)
    {
		$_POST['user_status'] = 1;
		$where = array("user_id" => $user_id);
		$this->m_general->edit("tbl_user", $where, $_POST);
		redirect('admin/user');
    }	
	
	public function user_aksi_hapus($user_id){
			$where['user_id'] = $user_id;
			$this->m_general->hapus("tbl_user", $where);
			redirect('admin/user');
	}
	
	///////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////
	
	public function carapesan()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_carapesan');
		$this->load->view('v_admin_footer');
	}
	
	public function get_data_master_carapesan()
	{
		$table = "
        (
            SELECT
                tbl_carapesan.*
            FROM tbl_carapesan
        )temp";
		
        $primaryKey = 'carapesan_id';
        $columns = array(
        array( 'db' => 'carapesan_urut',     'dt' => 0 ),
        array( 'db' => 'carapesan_nama',     'dt' => 1 ),
        array( 'db' => 'carapesan_foto',     'dt' => 2 ),
        array( 'db' => 'carapesan_id',     'dt' => 3 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function carapesan_tambah()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_carapesan_add");
		$this->load->view("v_admin_footer");
    }
	public function carapesan_ubah($carapesan_id)
	{
		$where = array("carapesan_id" => $carapesan_id);
		$data['tbl_carapesan'] = $this->m_general->view_by("tbl_carapesan",$where);
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_carapesan_edit', $data);
		$this->load->view("v_admin_footer");
	}	
	public function carapesan_aksi_tambah()
    {
		$folder = "carapesan";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
					
		$_POST['carapesan_foto'] = $nama_fileupload;
		$this->m_general->add("tbl_carapesan", $_POST);
		redirect('admin/carapesan');
    }	
	public function carapesan_aksi_ubah($carapesan_id)
    {
		$folder = "carapesan";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = $this->input->post('carapesan_foto');
		}
					
		$_POST['carapesan_foto'] = $nama_fileupload;
		
		$where = array("carapesan_id" => $carapesan_id);
		$this->m_general->edit("tbl_carapesan", $where, $_POST);
		redirect('admin/carapesan');
    }	
	public function carapesan_aksi_hapus($carapesan_id){
			$where['carapesan_id'] = $carapesan_id;
			$this->m_general->hapus("tbl_carapesan", $where);
			redirect('admin/carapesan');
	}
	
	///////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////
	
	public function tentangkami()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_tentangkami');
		$this->load->view('v_admin_footer');
	}
	
	public function get_data_master_tentangkami()
	{
		$table = "
        (
            SELECT
                tbl_tentangkami.*
            FROM tbl_tentangkami
        )temp";
		
        $primaryKey = 'tentangkami_id';
        $columns = array(
        array( 'db' => 'tentangkami_namaperusahaan',     'dt' => 0 ),
        array( 'db' => 'tentangkami_keterangan',     'dt' => 1 ),
        array( 'db' => 'tentangkami_alamatperusahaan',     'dt' => 2 ),
        array( 'db' => 'tentangkami_koordinatlatitude',     'dt' => 3 ),
        array( 'db' => 'tentangkami_koordinatlongitude',     'dt' => 4 ),
        array( 'db' => 'tentangkami_kontak',     'dt' => 5 ),
        array( 'db' => 'tentangkami_level',     'dt' => 6 ),
        array( 'db' => 'tentangkami_foto',     'dt' => 7 ),
        array( 'db' => 'tentangkami_id',     'dt' => 8 ),
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function tentangkami_tambah()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_tentangkami_add");
		$this->load->view("v_admin_footer");
    }
	public function tentangkami_ubah($tentangkami_id)
	{
		$where = array("tentangkami_id" => $tentangkami_id);
		$data['tbl_tentangkami'] = $this->m_general->view_by("tbl_tentangkami",$where);
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_tentangkami_edit', $data);
		$this->load->view("v_admin_footer");
	}	
	public function tentangkami_aksi_tambah()
    {
		$folder = "tentangkami";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
					
		$_POST['tentangkami_foto'] = $nama_fileupload;
		$this->m_general->add("tbl_tentangkami", $_POST);
		redirect('admin/tentangkami');
    }	
	public function tentangkami_aksi_ubah($tentangkami_id)
    {
		$folder = "tentangkami";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = $this->input->post('tentangkami_foto');
		}
					
		$_POST['tentangkami_foto'] = $nama_fileupload;
		
		$where = array("tentangkami_id" => $tentangkami_id);
		$this->m_general->edit("tbl_tentangkami", $where, $_POST);
		redirect('admin/tentangkami');
    }	
	public function tentangkami_aksi_hapus($tentangkami_id){
			$where['tentangkami_id'] = $tentangkami_id;
			$this->m_general->hapus("tbl_tentangkami", $where);
			redirect('admin/tentangkami');
	}
	
	///////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////
	
	public function penjadwalan($pemesanan_id="",$penjadwalan_id="")
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_penjadwalan');
		$this->load->view('v_admin_footer');
	}
	
	public function get_data_master_penjadwalan($pemesanan_id="",$penjadwalan_id="")
	{
		$date = date("Y-m-d");
		$userid = $this->session->userdata('userid');
		if($pemesanan_id==""){
			$where1 = "";
		}else{
			$where1 = "AND tbl_penjadwalan.pemesanan_id='$pemesanan_id'";
		}
		if($penjadwalan_id==""){
			$where2 = "";
		}else{
			$where2 = "AND tbl_penjadwalan.penjadwalan_id='$penjadwalan_id'";
		}
		$table = "
        (
            SELECT
				tbl_penjadwalan.*, 
				tbl_paket.paket_judul, 
				tbl_user.user_name, 
				tbl_user.user_namalengkap, 
				tbl_user.user_alamatlengkap, 
				CASE
					WHEN penjadwalan_updated IS NULL THEN penjadwalan_created
					ELSE penjadwalan_updated
				END AS penjadwalancreated
            FROM tbl_penjadwalan, tbl_paket, tbl_user
			WHERE tbl_penjadwalan.paket_id=tbl_paket.paket_id 
			AND tbl_user.user_id=tbl_penjadwalan.user_id
			$where1
			$where2
        )temp";
		
        $primaryKey = 'penjadwalan_id';
        $columns = array(
        array( 'db' => 'penjadwalan_tanggal',     'dt' => 0 ),
        array( 'db' => 'penjadwalan_jam',     'dt' => 1 ),
        array( 'db' => 'user_name',     'dt' => 2 ),
        array( 'db' => 'user_namalengkap',     'dt' => 3 ),
        array( 'db' => 'user_alamatlengkap',     'dt' => 4 ),
        array( 'db' => 'penjadwalan_ke',     'dt' => 5 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	public function testimoni()
	{
		$this->load->view('v_admin_header');
		$this->load->view('v_admin_testimoni');
		$this->load->view('v_admin_footer');
	}
	
	public function get_data_master_testimoni()
	{
		$table = "
        (
            SELECT
                tbl_testimoni.*
            FROM tbl_testimoni
        )temp";
		
        $primaryKey = 'testimoni_id';
        $columns = array(
        array( 'db' => 'testimoni_namauser',     'dt' => 0 ),
        array( 'db' => 'testimoni_keterangan',     'dt' => 1 ),
        array( 'db' => 'testimoni_foto',     'dt' => 2 ),
        array( 'db' => 'testimoni_id',     'dt' => 3 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}	
	
	public function testimoni_tambah()
    {
		$this->load->view("v_admin_header");
        $this->load->view("v_admin_testimoni_add");
		$this->load->view("v_admin_footer");
    }
	public function testimoni_ubah($testimoni_id)
	{
		$where = array("testimoni_id" => $testimoni_id);
		$data['tbl_testimoni'] = $this->m_general->view_by("tbl_testimoni",$where);
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_testimoni_edit', $data);
		$this->load->view("v_admin_footer");
	}	
	public function testimoni_aksi_tambah()
    {
		$folder = "testimoni";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
					
		$_POST['testimoni_foto'] = $nama_fileupload;
		$this->m_general->add("tbl_testimoni", $_POST);
		redirect('admin/testimoni');
    }	
	public function testimoni_aksi_ubah($testimoni_id)
    {
		$folder = "testimoni";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = $this->input->post('testimoni_foto');
		}
					
		$_POST['testimoni_foto'] = $nama_fileupload;
		
		$where = array("testimoni_id" => $testimoni_id);
		$this->m_general->edit("tbl_testimoni", $where, $_POST);
		redirect('admin/testimoni');
    }	
	public function testimoni_aksi_hapus($testimoni_id){
			$where['testimoni_id'] = $testimoni_id;
			$this->m_general->hapus("tbl_testimoni", $where);
			redirect('admin/testimoni');
	}
	
	public function penilaian()
	{
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_penilaian');
		$this->load->view("v_admin_footer");
	}
	
	public function get_data_master_penilaian()
	{
		$table = "
        (
            SELECT
                tbl_penilaian.*,
				tbl_penjadwalan.penjadwalan_ke,
				CONCAT(user_name,' - ',user_namalengkap) as nama_user
            FROM tbl_penilaian, tbl_penjadwalan,tbl_user
			WHERE tbl_penilaian.penjadwalan_id=tbl_penjadwalan.penjadwalan_id
			AND tbl_penilaian.user_id=tbl_user.user_id
        )temp";
		
        $primaryKey = 'penilaian_id';
        $columns = array(
        array( 'db' => 'nama_user',     'dt' => 0 ),
        array( 'db' => 'penjadwalan_ke',     'dt' => 1 ),
        array( 'db' => 'penilaian_etikaberkendara',     'dt' => 2 ),
        array( 'db' => 'penilaian_teknikberkendara',     'dt' => 3 ),
        array( 'db' => 'penilaian_pemahamanrambu',     'dt' => 4 ),
        array( 'db' => 'penilaian_responsifberkendara',     'dt' => 5 ),
        array( 'db' => 'penilaian_teknikparkir',     'dt' => 6 ),
        array( 'db' => 'penilaian_id',     'dt' => 7 )
        );

        $sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
        );
	}
	
	public function penilaian_tambah($userid ="", $penjadwalan_id="")
	{
		$data['tbl_user'] = $this->m_general->view_join1("tbl_pemesanan","tbl_user","user_id");
		$where1 = array("user_id" => $userid);
		$data['tbl_user_by'] = $this->m_general->view_by("tbl_user",$where1);
		$data['tbl_penjadwalan'] = $this->m_general->view_join1_where("tbl_penjadwalan","tbl_paket",$where1,"paket_id");
		$where2 = array("penjadwalan_id" => $penjadwalan_id);
		$data['tbl_penjadwalan_by'] = $this->m_general->view_join1_by("tbl_penjadwalan","tbl_paket",$where2,"paket_id");
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_penilaian_add',$data);
		$this->load->view("v_admin_footer");
	}
	
	public function penilaian_ubah($penilaian_id)
	{
		$where = array("penilaian_id" => $penilaian_id);
		$data['tbl_penilaian'] = $this->m_general->view_by("tbl_penilaian",$where);
		$this->load->view("v_admin_header");
		$this->load->view('v_admin_penilaian_edit', $data);
		$this->load->view("v_admin_footer");
	}
	
	public function penilaian_aksi_tambah()
    {
		$this->m_general->add("tbl_penilaian", $_POST);
		redirect('admin/penilaian');
    }
	
	public function penilaian_aksi_ubah($penilaian_id)
    {
		$where = array("penilaian_id" => $penilaian_id);
		$this->m_general->edit("tbl_penilaian", $where, $_POST);
		redirect('admin/penilaian');
    }
	
	public function penilaian_aksi_hapus($penilaian_id){
			$where['penilaian_id'] = $penilaian_id;
			$this->m_general->hapus("tbl_penilaian", $where);
			redirect('admin/penilaian');
	}
	
}