<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utility extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		no_access();
	}

	public function index()
	{
		include('Menu_akses.php'); //akses
		$data['title']="Utility||Arsip";
		$data['active']="utility";
		$data['drop_active']="utility";
		$data['content']="utility/index.php";
		$this->load->view('admin/template',$data);
	}
	function backup(){
		$this->load->helper('download');
		$this->load->dbutil();
		$nama_file	= 'arsip';
		$prefs = array(
				'format'      => 'zip',             // gzip, zip, txt
				'filename'    => $nama_file.'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
				'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
				'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
				'newline'     => "\n"               // Newline character used in backup file
			);

		$this->dbutil->backup($prefs);
		$backup =& $this->dbutil->backup($prefs); 
		$nama_database = 'arsip' .'.zip';
	    $simpan = '/upload -'.$nama_database;
	    $this->load->helper('file');
	    write_file($simpan);
		$this->load->helper('download');
	    force_download($nama_database, $backup);
	}
	function restore(){
		$this->db->query("DROP TABLE admin");
		$this->db->query("DROP TABLE akses");
		$this->db->query("DROP TABLE berkas");
		$this->db->query("DROP TABLE box");
		$up	 	= $_FILES['gambar']['name'];
		$file='gambar';
		$dir		= './upload/';
		$config['allowed_types'] 	= 'sql';
		$config['max_size']			= '8000';
		$config['max_width']  		= '10000';
		$config['max_height'] 		= '10000';

		$this->load->library('upload', $config);			
		$tmp_name=$_FILES[''.$file.'']["tmp_name"];
		move_uploaded_file($tmp_name, $dir.$up);
		$direktori		= './upload/'.$up;
		$isi_file		= file_get_contents($direktori);
		$_satustelu		= substr($isi_file, 0, 103);
		$string_query	= rtrim($isi_file, "\n;" );
		$array_query	= explode(";", $string_query);
		
		foreach ($array_query as $query){
			$this->db->query(trim($query));
		}
		$path			= './upload/';
		$this->load->helper("file"); // load the helper
		delete_files($path, true);
		$this->session->set_flashdata('sukses','Data Berhasil Di Restore');
		redirect('Utility','index');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */ ?>