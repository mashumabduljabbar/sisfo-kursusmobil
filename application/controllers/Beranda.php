<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/ssp.php';
class Beranda extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('m_general');
		$this->load->library('email'); 
	}	
	
	public function daftar()
	{
		$data['tbl_tentangkami'] = $this->m_general->view("tbl_tentangkami");
		$data['hasildaftar'] = "";
		$this->load->view("v_beranda_header");
		$this->load->view("v_beranda_daftar",$data);
		$this->load->view("v_beranda_footer");
	}
	
	public function aksi_daftar()
    {
		$folder = "avatar";
		$file_upload = $_FILES['userfiles'];
		$files = $file_upload;
					
		if($files['name'] != "" OR $files['name'] != NULL){
			$nama_fileupload = $this->m_general->file_upload($file_upload, $folder);
		}else{
			$nama_fileupload = "";
		}
		$penerima =  $this->input->post('user_name');
		$user_password = $_POST['user_password'];
		$user_password_md5 = md5($user_password);
		$_POST['user_password'] = $user_password_md5;
		$server = base_url();
		$subject = "Informasi User Akses";
		$message = "Username : $penerima<br>Password : $user_password<br>
		Silahkan klik link berikut untuk aktivasi : ".$server."beranda/self_activation/$penerima/$user_password_md5";
		
		
            $_POST['user_foto'] = $nama_fileupload;
			$_POST['user_level'] = "pelanggan";
			$this->m_general->add("tbl_user", $_POST);
		
		$this->m_general->send($message, $penerima, $subject);
		
			$data['tbl_tentangkami'] = $this->m_general->view("tbl_tentangkami");
			$data['hasildaftar'] = "<i style='color:green;'>Pendaftaran Sukses, Silahkan periksa email :  $penerima</i>";
			$this->load->view("v_beranda_header");
			$this->load->view("v_beranda_daftar",$data);
			$this->load->view("v_beranda_footer");
        
		
    }	
	
	function self_activation($user_name, $token)
	{
		$_POST['user_status'] = 1;
		$where = array("user_name" => $user_name, "user_password" => $token);
		$this->m_general->edit("tbl_user",$where, $_POST);
		$data['hasillogin'] = "<i style='color:green;'>User telah aktif, silahkan login !</i>";
		$this->load->view("v_beranda_header");
		$this->load->view('v_beranda_login',$data);
		$this->load->view("v_beranda_footer");
	}
	
	public function login()
	{
		$data['hasillogin'] = "";
		$this->load->view("v_beranda_header");
		$this->load->view('v_beranda_login',$data);
		$this->load->view("v_beranda_footer");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('beranda/login'));
	}
	
	function aksi_login(){
		$user_name = $this->input->post('user_name');
		$user_password = md5($this->input->post('user_password'));
		$where = array(
			'user_name' => $user_name,
			'user_password' => $user_password
			);
		$checking = $this->m_general->check_login('tbl_user', array('user_name' => $user_name), array('user_password' => $user_password));
		
		if($checking > 0){
			foreach ($checking as $apps) {
				$data_session = array(
					'userid' => $apps->user_id,
					'user_name' => $apps->user_name,
					'level' => $apps->user_level,
					'aktif' => $apps->user_status,
					'status' => "login"
					);
	 
				$this->session->set_userdata($data_session);
				
				if($apps->user_level=="admin" and $this->session->userdata('aktif') != "0"){
					redirect(base_url("admin"));
				}elseif($apps->user_level=="pelanggan" and $this->session->userdata('aktif') != "0"){
					redirect(base_url("pelanggan"));
				}else{
					$data['hasillogin'] = "<i style='color:red;'>User tidak aktif !</i>";
					$this->load->view("v_beranda_header");
					$this->load->view('v_beranda_login', $data);
					$this->load->view("v_beranda_footer");
				}
			
			}
		}else{
			$data['hasillogin'] = "<i style='color:red;'>Username dan password salah !</i>";
			$this->load->view("v_beranda_header");
			$this->load->view('v_beranda_login', $data);
			$this->load->view("v_beranda_footer");
		}
	}
	
	public function index()
	{
		$order1 = "paket_judul ASC";
		$data['tbl_paket_foto'] = $this->m_general->view_order_limit("tbl_paket", $order1, 4);
		
		$order2 = "paket_judul ASC";
		$data['tbl_paket'] = $this->m_general->view_order("tbl_paket", $order2);
		$this->load->view("v_beranda_header");
		$this->load->view('v_beranda_index',$data);
		$this->load->view("v_beranda_footer");
	}
	
	public function carapesan()
	{
		$order1 = "carapesan_urut ASC";
		$data['tbl_carapesan_foto'] = $this->m_general->view_order_limit("tbl_carapesan", $order1, 4);
		
		$order2 = "carapesan_urut ASC";
		$data['tbl_carapesan'] = $this->m_general->view_order("tbl_carapesan", $order2);
		$this->load->view("v_beranda_header");
		$this->load->view('v_beranda_carapesan',$data);
		$this->load->view("v_beranda_footer");
	}
	
	public function tentangkami()
	{
		$order1 = "tentangkami_id ASC";
		$data['tbl_tentangkami_foto'] = $this->m_general->view_order_limit("tbl_tentangkami", $order1, 4);
		
		$where1 = array("tentangkami_level" => "pusat");
		$data['tbl_tentangkami_pusat'] = $this->m_general->view_where("tbl_tentangkami", $where1, $order ="");
		
		$where2 = array("tentangkami_level" => "cabang");
		$data['tbl_tentangkami_cabang'] = $this->m_general->view_where("tbl_tentangkami", $where2, $order ="");
		
		$this->load->view("v_beranda_header");
		$this->load->view('v_beranda_tentangkami',$data);
		$this->load->view("v_beranda_footer");
	}
	
	public function testimoni()
	{
		$order1 = "testimoni_created DESC";
		$data['tbl_testimoni'] = $this->m_general->view_order_limit("tbl_testimoni", $order1, 4);
		$this->load->view("v_beranda_header");
		$this->load->view('v_beranda_testimoni',$data);
		$this->load->view("v_beranda_footer");
	}
}