<?php

class Input extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_box');
		$this->load->model('M_input');
		$this->load->library('Excel_reader');
		no_access();
	}
	public function index()
	{
		include('Menu_akses.php'); //akses
		$data['title']="Input||Arsip";
		$data['active']="input";
		$data['drop_active']="input";
		$data['data_box']=$this->M_box->all()->result();
		$data['content']="input/index.php";
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$id=$this->input->post('no_berkas', TRUE);
        $num=$this->db->query("select * from berkas where no_berkas='$id'")->num_rows();
        if($num>0){
             $this->session->set_flashdata('errorid','1');
            redirect('input');
        }else{
        	$dokumen=$_FILES['file']['name'];
			$dir="file/"; //tempat upload foto
			$dirs="files/"; //tempat upload foto
			$file='file'; //name pada input type file
			$new_name3='update'.$this->input->post('no_box').'-'.$this->input->post('no_berkas').'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dirs.$file_name);
			$source_url3=$dir.$file_name;
			rename($dirs.$file_name,$dirs.$new_name3);
			$data=array(
				'no_berkas'=>$this->input->post('no_berkas', TRUE),
				'no_box'=>$this->input->post('no_box', TRUE),
				'indeks'=>$this->input->post('indeks', TRUE),
				'kode_klasifikasi'=>$this->input->post('kode_klasifikasi', TRUE),
				'uraian'=>$this->input->post('uraian', TRUE),
				'tahun'=>$this->input->post('tahun', TRUE),
				'volume'=>$this->input->post('volume', TRUE),
				'ket'=>$this->input->post('keterangan', TRUE),
				'file'=>$new_name3
			);
			$this->db->insert('berkas', $data);
			$this->session->set_flashdata('sukses','1');
			redirect('input');
		}
	}
	public function add_file(){
			$no_berkas = $this->input->post('no_berkas');
			$dokumen=$_FILES['file']['name'];
			$dir="file/"; //tempat upload foto
			$dirs="files/"; //tempat upload foto
			$file='file'; //name pada input type file
			$new_name3='update'.$this->input->post('no_box').'-'.$no_berkas.'.pdf'; //name pada input type file
			$vdir_upload = $dir;
			$file_name=$_FILES[''.$file.'']["name"];
			$vfile_upload = $vdir_upload . $file;
			$tmp_name=$_FILES[''.$file.'']["tmp_name"];
			move_uploaded_file($tmp_name, $dirs.$file_name);
			$source_url3=$dir.$file_name;
			rename($dirs.$file_name,$dirs.$new_name3);
			$data=array(
				'file'=>$new_name3
			);
			$this->db->where('no_berkas', $no_berkas);
			$this->db->update('berkas', $data);
			$this->session->set_flashdata('sukses','1');
			redirect('Search');
	}
	//IMPORT DATA
	public function import(){
		$fileNames = $_FILES['import']['name'];
		$config['upload_path'] = './assets/file/';
		$config['file_name'] = $fileNames;
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']        = 10000;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('import')) {
			$this->session->set_flashdata('error_import','1');
			redirect('input');
		} else {
		  $upload_data = $this->upload->data('import');
		  $this->load->library('Excel_reader');
		  $this->excel_reader->setOutputEncoding('230787');
		  $files = './assets/file/'.$fileNames;
		  $this->excel_reader->read($files);
		  error_reporting(E_ALL ^ E_NOTICE);
		  $data = $this->excel_reader->sheets[0];
		  $dataexcel = array();
		  for ($i = 2; $i <= $data['numRows']; $i++) {
			   if ($data['cells'][$i][2] == '') break;
			   $dataexcel[$i - 2]['no_berkas'] = ($data['cells'][$i][1]);
			   $dataexcel[$i - 2]['no_box'] = ($data['cells'][$i][2]);
			   $dataexcel[$i - 2]['kode_klasifikasi'] = ($data['cells'][$i][3]);
			   $dataexcel[$i - 2]['indeks'] = ($data['cells'][$i][4]);
			   $dataexcel[$i - 2]['uraian'] = ($data['cells'][$i][5]);
			   $dataexcel[$i - 2]['tahun'] = ($data['cells'][$i][6]);
			   $dataexcel[$i - 2]['volume'] = ($data['cells'][$i][7]);
			   $dataexcel[$i - 2]['ket'] = ($data['cells'][$i][8]);
		  }
		  $files = $upload_data['file_name'];
		  $path = 'assets/file/'.$fileNames;
		  
		  $this->M_input->loaddata($dataexcel);
		}
		$this->session->set_flashdata('sukses_import','1');
		redirect('input');
	}
}
