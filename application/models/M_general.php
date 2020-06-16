<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_general extends CI_Model {
	public function __construct() { 
        parent::__construct(); 
        $this->load->library('email'); 
		$this->load->database();
    }
	
	public function bacaidterakhir($table, $id){
		$this->db->select("($id*1) as $id");
		$this->db->order_by("$id DESC");
		$this->db->limit(1);
		$hasil = $this->db->get($table)->row();
		return $hasil->$id+1;
	}
	
	public function bacaidterakhir2($table, $id){
		$total = $this->db->get($table)->num_rows(); 
		if($total==0){
			return 1;
		}else{
			$this->db->select("($id*1) as $id");
			$this->db->order_by("$id DESC");
			$this->db->limit(1);
			$hasil = $this->db->get($table)->row();
			return $hasil->$id+1;
		}
	}
	
	public function send($message, $penerima, $subject)
    {
        $ci = get_instance();
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "e.sampel.bpmpt@gmail.com";
        $config['smtp_pass'] = "indo2019";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
		$config['validation'] = TRUE; 
        $ci->email->initialize($config);
        $ci->email->from("e.sampel.bpmpt@gmail.com", "No-Reply");
        $list = array($penerima);
        $ci->email->to($list);
        $ci->email->subject($subject);
        $ci->email->message($message);
		
		if($this->email->send()) {
            //
        } else {
            //
        }
    }
  
	public function countdata($table, $where_array){
		$this->db->where($where_array);
		$total = $this->db->get($table)->num_rows();
		return $total;
	}
	
	public function view($table){
		return $this->db->get($table)->result();
	}
	
	public function view_by($table, $where){
		$this->db->where($where);
		return $this->db->get($table)->row();
	}
	
	public function view_join1_by($table1, $table2, $where, $field1){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->where($where);
		return $this->db->get($table1)->row();
	}
	
	public function view_join1_where($table1, $table2, $where, $field1){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->where($where);
		return $this->db->get($table1)->result();
	}
	
	public function view_join1($table1, $table2, $field1){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		return $this->db->get($table1)->result();
	}
	
	public function view_join2_where($table1, $table2, $table3, $where, $field1, $field2){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->join($table3,"$table2.$field2=$table3.$field2");
		$this->db->where($where);
		return $this->db->get($table1)->result();
	}
	
	public function view_join1_order($table1, $table2, $order, $field1, $group_by){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->order_by($order);
		$this->db->group_by($group_by);
		return $this->db->get($table1)->result();
	}
	
	public function view_join2_by($table1, $table2, $table3, $where, $field1, $field2){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->join($table3,"$table1.$field2=$table3.$field2");
		$this->db->where($where);
		return $this->db->get($table1)->row();
	}
	
	public function view_where($table, $where){
		$this->db->where($where);
		return $this->db->get($table)->result();
	}
	
	public function view_order($table, $order =""){
		$this->db->order_by($order);
		return $this->db->get($table)->result();
	}
	
	public function view_order_limit($table, $order ="", $limit = ""){
		$this->db->order_by($order);
		$this->db->limit($limit);
		return $this->db->get($table)->result();
	}
	
	public function view_order_group_by($table, $order ="", $group_by = ""){
		$this->db->order_by($order);
		$this->db->group_by($group_by);
		return $this->db->get($table)->result();
	}
	
	public function declarevariable($table, $order, $search = ""){
        $this->table = $table;
        $this->order = $order;
        $this->column_order = array(null, $order);
        $this->column_search = $search;
    }
	
	public function declarevariable_where($table, $order, $where, $search = ""){
        $this->table = $table;
        $this->where = $where;
        $this->value = $search;
        $this->order = $order;
        $this->column_order = array(null, $order);
        $this->column_search = $search;
    }
	

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_datatables_where()
	{
		$this->_get_datatables_query_where();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value'])
			{
				if($i===0)
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end(); 
			}
			$i++;
		}
		if(isset($_POST['order'])) 
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	
	public function _get_datatables_query_where()
	{
		$this->db->where($this->where);
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value'])
			{
				if($i===0)
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end(); 
			}
			$i++;
		}
		if(isset($_POST['order'])) 
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function count_filtered_where()
	{
		$this->_get_datatables_query_where();
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function count_all_where()
	{
		$this->db->where($this->where,$this->value);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
  
	public function add($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
  
	function edit($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data); 
		return $this->db->affected_rows();
	}
  
	function hapus($table, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->delete($table);
		return $this->db->affected_rows();
	}
	
	//////////////////////////////////////////////////////////////////////////////////
	public function file_upload($file_upload, $folder)
    {
				$files = $file_upload;
				$_FILES['userfile']['name'] = $files['name'];
				$_FILES['userfile']['type'] = $files['type'];
				$_FILES['userfile']['error'] = $files['error'];
				$_FILES['userfile']['tmp_name'] = $files['tmp_name'];
				$_FILES['userfile']['size'] = $files['size'];
				$new_name = time().md5($files['name']);
				
				// File upload configuration
                $uploadPath = './assets/dist/img/'.$folder.'/';
                $config=array(); 
				$config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'avi|mp4|flv|pdf|jpg|jpeg|png|gif';
                $config['max_size'] = '30000';
                $config['max_width'] = '20000';
                $config['max_height'] = '20000';
                $config['file_name'] = $new_name;
				
				// Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload userfile to server
                if($this->upload->do_upload()){
                    // Uploaded userfile data
                    $nama_fileupload = $this->upload->data('file_name');
                }
				
				return $nama_fileupload;
	}
	
	function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
	
	function bulan($string){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		return $bulan[$string];
	}
	
	function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
	 
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	
}