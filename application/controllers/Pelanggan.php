<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Pelanggan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login" or $this->session->userdata('level') != "pelanggan"){
			redirect(base_url("login"));
		}
		$this->load->model('m_general');
	}	
	
	public function index()
	{
		$order1 = "paket_judul ASC";
		$data['tbl_paket_foto'] = $this->m_general->view_order_limit("tbl_paket", $order1, 4);
		
		$order2 = "paket_judul ASC";
		$data['tbl_paket'] = $this->m_general->view_order("tbl_paket", $order2);
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_index',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function pemesanan()
	{
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_pemesanan');
		$this->load->view("v_pelanggan_footer");
	}
	
	public function get_data_master_pemesanan()
	{
		$userid = $this->session->userdata('userid');
		$table = "
        (
            SELECT
                tbl_pemesanan.*, tbl_paket.paket_judul, tbl_tentangkami.tentangkami_namaperusahaan
            FROM tbl_pemesanan, tbl_paket, tbl_tentangkami
			WHERE tbl_pemesanan.paket_id=tbl_paket.paket_id AND tbl_pemesanan.tentangkami_id=tbl_tentangkami.tentangkami_id
			AND user_id='$userid'
        )temp";
		
        $primaryKey = 'pemesanan_id';
        $columns = array(
        array( 'db' => 'paket_judul',     'dt' => 0 ),
        array( 'db' => 'tentangkami_namaperusahaan',     'dt' => 1 ),
        array( 'db' => 'pemesanan_jumlahbayar',     'dt' => 2 ),
        array( 'db' => 'pemesanan_buktibayar',     'dt' => 3 ),
        array( 'db' => 'pemesanan_status',     'dt' => 4 )
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
	
	public function inbox()
	{
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_inbox');
		$this->load->view("v_pelanggan_footer");
	}
	
	public function get_data_master_inbox()
	{
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
	
	public function carapesan()
	{
		$order1 = "carapesan_urut ASC";
		$data['tbl_carapesan_foto'] = $this->m_general->view_order_limit("tbl_carapesan", $order1, 4);
		
		$order2 = "carapesan_urut ASC";
		$data['tbl_carapesan'] = $this->m_general->view_order("tbl_carapesan", $order2);
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_carapesan',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function carapesan_tambah($paket_id="", $tentangkami_id="")
    {
		$data['tbl_paket'] = $this->m_general->view("tbl_paket");
		$where1 = array("paket_id" => $paket_id);
		$data['tbl_paket_by'] = $this->m_general->view_by("tbl_paket",$where1);
		
		$data['tbl_tentangkami'] = $this->m_general->view("tbl_tentangkami");
		$where2 = array("tentangkami_id" => $tentangkami_id);
		$data['tbl_tentangkami_by'] = $this->m_general->view_by("tbl_tentangkami",$where2);
		
		$this->load->view("v_pelanggan_header");
        $this->load->view("v_pelanggan_carapesan_add",$data);
		$this->load->view("v_pelanggan_footer");
    }
	
	public function carapesan_aksi_tambah()
    {
		$folder = "pemesanan";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
		
		$id = $this->m_general->bacaidterakhir2("tbl_pemesanan", "pemesanan_id");
		$_POST['pemesanan_id'] = $id;
		$_POST['user_id'] = $this->session->userdata('userid');
		$_POST['pemesanan_buktibayar'] = $nama_fileupload;
		$this->m_general->add("tbl_pemesanan", $_POST);
		
		
		$where1= array("user_id" => $this->session->userdata('userid'));
		$user = $this->m_general->view_by("tbl_user",$where1);
		
		$where2= array("user_level" => "admin", "tentangkami_id" => $_POST['tentangkami_id']);
		$admin = $this->m_general->view_by("tbl_user",$where2);
		
		$data1 = array(
			'inbox_pengirim' => "SISTEM",
			'inbox_pesan' => "TERIMAKASIH SUDAH MELAKUKAN KONFIRMASI PEMESANAN, MOHON MENUNGGU VALIDASI DARI ADMIN CABANG, TERIMAKASIH.",
			'user_id' => $this->session->userdata('userid')
		);
		$url = base_url()."admin/inbox";
		$data2 = array(
			'inbox_pengirim' => "SISTEM",
			'inbox_pesan' => "USER $user->user_namalengkap ($user->user_name) TELAH MELAKUKAN KONFIRMASI PEMESANAN, KLIK  <a href='$url/$id'>RINCIAN</a> UNTUK MELAKUKAN KONFIRMASI, TERIMAKASIH.",
			'user_id' => $admin->user_id
		);
		$this->m_general->add("tbl_inbox", $data1);
		$this->m_general->add("tbl_inbox", $data2);
		redirect('pelanggan/pemesanan');
    }
	
	public function tentangkami()
	{
		$order1 = "tentangkami_id ASC";
		$data['tbl_tentangkami_foto'] = $this->m_general->view_order_limit("tbl_tentangkami", $order1, 4);
		
		$where1 = array("tentangkami_level" => "pusat");
		$data['tbl_tentangkami_pusat'] = $this->m_general->view_where("tbl_tentangkami", $where1, $order ="");
		
		$where2 = array("tentangkami_level" => "cabang");
		$data['tbl_tentangkami_cabang'] = $this->m_general->view_where("tbl_tentangkami", $where2, $order ="");
		
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_tentangkami',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function testimoni()
	{
		$order1 = "testimoni_created DESC";
		$data['tbl_testimoni'] = $this->m_general->view_order_limit("tbl_testimoni", $order1, 4);
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_testimoni',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function penjadwalan($pemesanan_id="")
	{
		$userid = $this->session->userdata('userid');
		$where1= array("user_id" => $userid);
		$data['tbl_paket'] = $this->m_general->view_join1_where("tbl_pemesanan","tbl_paket",$where1,"paket_id");
		
		$where2 = array("pemesanan_id" => $pemesanan_id);
		$data['tbl_pemesanan_by'] = $this->m_general->view_by("tbl_pemesanan",$where2);
		
		if($pemesanan_id!=""){
		$where3 = array("paket_id" => $data['tbl_pemesanan_by']->paket_id);
		$data['tbl_paket_by'] = $this->m_general->view_by("tbl_paket",$where3);
		}
		
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_penjadwalan',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function penjadwalan_ubah($penjadwalan_id="", $paket_id="" )
	{
		$userid = $this->session->userdata('userid');
		$where0= array("penjadwalan_id" => $penjadwalan_id);
		$data['tbl_penjadwalan_by'] = $this->m_general->view_by("tbl_penjadwalan",$where0);
		
		$where1= array("user_id" => $userid);
		$data['tbl_paket'] = $this->m_general->view_join1_where("tbl_pemesanan","tbl_paket",$where1,"paket_id");
		
		if($paket_id==""){
			$paketid = $data['tbl_penjadwalan_by']->paket_id;
		}else{
			$paketid = $paket_id;
		}
		
		$where2 = array("paket_id" => $paketid);
		$data['tbl_paket_by'] = $this->m_general->view_by("tbl_paket",$where2);
		
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_penjadwalan_edit',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function penjadwalan_aksi_tambah()
    {
		$id = $this->m_general->bacaidterakhir2("tbl_penjadwalan", "penjadwalan_id");
		$penjadwalan_id = $id;
		$user_id = $this->session->userdata('userid');
		$paket_id = $_POST['paket_id'];
		$pemesanan_id = $_POST['pemesanan_id'];
		$penjadwalan_ke = $_POST['penjadwalan_ke'];
		$penjadwalan_tanggal = $_POST['penjadwalan_tanggal'];
		$penjadwalan_jam = $_POST['penjadwalan_jam'];
		
		$data0 = array(
			'penjadwalan_id' => $penjadwalan_id,
			'paket_id' => $paket_id,
			'user_id' => $user_id,
			'pemesanan_id' => $pemesanan_id,
			'penjadwalan_ke' => $penjadwalan_ke,
			'penjadwalan_tanggal' => $penjadwalan_tanggal,
			'penjadwalan_jam' => $penjadwalan_jam
		);
		
		$this->m_general->add("tbl_penjadwalan", $data0);
		
		$where1= array("user_id" => $this->session->userdata('userid'));
		$user = $this->m_general->view_by("tbl_user",$where1);
		
		$where2= array("user_level" => "admin", "tentangkami_id" => $_POST['tentangkami_id']);
		$admin = $this->m_general->view_by("tbl_user",$where2);
		
		$data1 = array(
			'inbox_pengirim' => "SISTEM",
			'inbox_pesan' => "PENENTUAN JADWAL SUDAH DILAKUKAN, TERIMAKASIH.",
			'user_id' => $this->session->userdata('userid')
		);
		$url = base_url()."admin/penjadwalan";
		$data2 = array(
			'inbox_pengirim' => "SISTEM",
			'inbox_pesan' => "PENENTUAN JADWAL OLEH USER $user->user_namalengkap ($user->user_name) SUDAH DILAKUKAN, MOHON UNTUK DILAKUKAN PENGECEKAN PADA MENU <a href='$url/$pemesanan_id/$penjadwalan_id'>PENJADWALAN</a>, TERIMAKASIH.",
			'user_id' => $admin->user_id
		);
		$this->m_general->add("tbl_inbox", $data1);
		$this->m_general->add("tbl_inbox", $data2);
		
		redirect('pelanggan/penjadwalan');
    }
	public function penjadwalan_aksi_ubah($penjadwalan_id)
    {
		$data1 = array(
			'inbox_pengirim' => "SISTEM",
			'inbox_pesan' => "TELAH DILAKUKAN PERUBAHAN PADA JADWAL SUDAH DITENTUKAN, TERIMAKASIH.",
			'user_id' => $this->session->userdata('userid')
		);
		$this->m_general->add("tbl_inbox", $data1);
		$where = array("penjadwalan_id" => $penjadwalan_id);
		$this->m_general->edit("tbl_penjadwalan", $where, $_POST);
		redirect('pelanggan/penjadwalan');
    }
	public function penjadwalan_aksi_hapus($penjadwalan_id){
		$where['penjadwalan_id'] = $penjadwalan_id;
		$this->m_general->hapus("tbl_penjadwalan", $where);
		redirect('pelanggan/penjadwalan');
	}
	
	public function get_data_master_penjadwalan()
	{
		$userid = $this->session->userdata('userid');
		$table = "
        (
            SELECT
                tbl_penjadwalan.*, tbl_paket.paket_judul,
				CASE
					WHEN penjadwalan_updated IS NULL THEN penjadwalan_created
					ELSE penjadwalan_updated
				END AS penjadwalancreated
            FROM tbl_penjadwalan, tbl_paket
			WHERE tbl_penjadwalan.paket_id=tbl_paket.paket_id AND user_id='$userid'
        )temp";
		
        $primaryKey = 'penjadwalan_id';
        $columns = array(
        array( 'db' => 'paket_judul',     'dt' => 0 ),
        array( 'db' => 'penjadwalan_ke',     'dt' => 1 ),
        array( 'db' => 'penjadwalan_tanggal',     'dt' => 2 ),
        array( 'db' => 'penjadwalan_jam',     'dt' => 3 ),
        array( 'db' => 'penjadwalancreated',     'dt' => 4 ),
        array( 'db' => 'penjadwalan_id',     'dt' => 5 )
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
	
	public function penilaian($penjadwalan_id="")
	{
		$userid = $this->session->userdata('userid');
		$where1= array("user_id" => $userid);
		$data['tbl_penjadwalan'] = $this->m_general->view_join1_where("tbl_penjadwalan","tbl_paket",$where1,"paket_id");
		
		$where2 = array("penjadwalan_id" => $penjadwalan_id);
		$data['tbl_penjadwalan_by'] = $this->m_general->view_join1_by("tbl_penjadwalan","tbl_paket",$where2,"paket_id");
		$data['tbl_penilaian_by'] = $this->m_general->view_by("tbl_penilaian",$where2);
		
		if($penjadwalan_id==""){
			$paket_id = "";
		}else{
			$paket_id = $data['tbl_penjadwalan_by']->paket_id;
		}
		
		$data['tbl_paket'] = $this->m_general->view_join1_where("tbl_pemesanan","tbl_paket",$where1,"paket_id");
		
		$data['tbl_penilaian_ratarata'] = $this->db->query("select 
		avg(penilaian_etikaberkendara) as penilaian_etikaberkendara, 
		avg(penilaian_teknikberkendara) as penilaian_teknikberkendara, 
		avg(penilaian_pemahamanrambu) as penilaian_pemahamanrambu, 
		avg(penilaian_responsifberkendara) as penilaian_responsifberkendara, 
		avg(penilaian_teknikparkir) as penilaian_teknikparkir
FROM tbl_penilaian, tbl_penjadwalan
WHERE tbl_penilaian.penjadwalan_id=tbl_penjadwalan.penjadwalan_id 
AND tbl_penilaian.user_id='$userid'
AND paket_id='$paket_id'")->row();
		
		$this->load->view("v_pelanggan_header");
		$this->load->view('v_pelanggan_penilaian',$data);
		$this->load->view("v_pelanggan_footer");
	}
	
	public function penilaian_cetak($paket_id)
	{
		$userid = $this->session->userdata('userid');
		
		$data['tbl_penilaian'] = $this->db->query("select * 
FROM tbl_penilaian, tbl_penjadwalan, tbl_paket
WHERE tbl_penilaian.penjadwalan_id=tbl_penjadwalan.penjadwalan_id 
AND tbl_penjadwalan.paket_id=tbl_paket.paket_id
AND tbl_penilaian.user_id='$userid'
AND tbl_penjadwalan.paket_id='$paket_id'");
		
		$data['tbl_penilaian_ratarata'] = $this->db->query("select 
		avg(penilaian_etikaberkendara) as penilaian_etikaberkendara, 
		avg(penilaian_teknikberkendara) as penilaian_teknikberkendara, 
		avg(penilaian_pemahamanrambu) as penilaian_pemahamanrambu, 
		avg(penilaian_responsifberkendara) as penilaian_responsifberkendara, 
		avg(penilaian_teknikparkir) as penilaian_teknikparkir
FROM tbl_penilaian, tbl_penjadwalan
WHERE tbl_penilaian.penjadwalan_id=tbl_penjadwalan.penjadwalan_id 
AND tbl_penilaian.user_id='$userid'
AND paket_id='$paket_id'")->row();

		$where2 = array("user_id" => $userid);
		$data['tbl_user'] = $this->m_general->view_by("tbl_user",$where2);
		
		$where3 = array("paket_id" => $paket_id);
		$data['tbl_paket'] = $this->m_general->view_by("tbl_paket",$where3);
		
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
        $mpdf->SetTitle("Penilaian");
		$halaman = $this->load->view('v_pelanggan_penilaian_cetak',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
	
	public function sertifikat_cetak($paket_id)
	{
		$userid = $this->session->userdata('userid');
		
		$data['tbl_penilaian'] = $this->db->query("select * 
		FROM tbl_penilaian, tbl_penjadwalan, tbl_paket
		WHERE tbl_penilaian.penjadwalan_id=tbl_penjadwalan.penjadwalan_id 
		AND tbl_penjadwalan.paket_id=tbl_paket.paket_id
		AND tbl_penilaian.user_id='$userid'
		AND tbl_penjadwalan.paket_id='$paket_id'");

		$tbl_penjadwalan1 = $this->db->query("select * 
		FROM tbl_penjadwalan WHERE paket_id= '$paket_id' AND user_id='$userid' order by penjadwalan_ke ASC LIMIT 1")->row();
		$data['tanggal_mulai'] = $this->m_general->tgl_indo($tbl_penjadwalan1->penjadwalan_tanggal);
		$tbl_penjadwalan2 = $this->db->query("select * 
		FROM tbl_penjadwalan WHERE paket_id= '$paket_id' AND user_id='$userid' order by penjadwalan_ke DESC LIMIT 1")->row();
		$data['tanggal_selesai'] = $this->m_general->tgl_indo($tbl_penjadwalan2->penjadwalan_tanggal);
		$data['tanggal_hariini'] = $this->m_general->tgl_indo(date("Y-m-d"));
		$data['tbl_penilaian_ratarata'] = $this->db->query("select 
		avg(penilaian_etikaberkendara) as penilaian_etikaberkendara, 
		avg(penilaian_teknikberkendara) as penilaian_teknikberkendara, 
		avg(penilaian_pemahamanrambu) as penilaian_pemahamanrambu, 
		avg(penilaian_responsifberkendara) as penilaian_responsifberkendara, 
		avg(penilaian_teknikparkir) as penilaian_teknikparkir
FROM tbl_penilaian, tbl_penjadwalan
WHERE tbl_penilaian.penjadwalan_id=tbl_penjadwalan.penjadwalan_id 
AND tbl_penilaian.user_id='$userid'
AND paket_id='$paket_id'")->row();

		$where2 = array("user_id" => $userid);
		$data['tbl_user'] = $this->m_general->view_by("tbl_user",$where2);
		
		$where3 = array("paket_id" => $paket_id);
		$data['tbl_paket'] = $this->m_general->view_by("tbl_paket",$where3);
		
		$mpdf = new \Mpdf\Mpdf([
		'mode' => 'utf-8', 
		'format' => 'A4-P',
		'margin_left' => 30,
		'margin_right' => 30,
		'margin_top' => 45,
		'margin_bottom' => 10,
		'margin_header' => 3,
		'margin_footer' => 3,
		]); //L For Landscape , P for Portrait
        $mpdf->SetTitle("Penilaian");
		$halaman = $this->load->view('v_pelanggan_sertifikat_cetak',$data,true);
        $mpdf->WriteHTML($halaman);
        $mpdf->Output();
	}
}