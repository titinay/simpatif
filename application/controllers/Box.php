<?php

class Box extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('M_box');
		$this->load->model('M_search');
		no_access();
	}
	public function index($offset=0)
	{
		include('Menu_akses.php'); //akses
		$data['title']="Box||Arsip";
		$data['drop_active']="master";
		$data['active']="box";
		$data['id']=$this->M_box->getId();
		$data['alldata']=$this->M_box->all()->result();
		$data['content']="box/index.php";
		$this->load->view('admin/template',$data);
	}
	// Add a new item
	public function add()
	{
		$data=array(
			'id_box'=>$this->input->post('id', TRUE),
			'nama_box'=>$this->input->post('name', TRUE),
		);
		$this->db->insert('box', $data);
		$this->session->set_flashdata('sukses','1');
		redirect('box');
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
			redirect('Box/detail/'.$this->input->post('no_box'));
	}
	//Detail item
	public function detail($id)
	{
		include('Menu_akses.php'); //akses
		$id=$this->uri->segment(3);
		$data['title']="Box||Detail";
		$data['active']="box";
		$data['getberkas']=$this->M_search->getberkas($id)->result();
		$data['drop_active']="master";
		$data['content']="Box/detail.php";
		$this->load->view('admin/template',$data);
	}
	
	//Update one item
	//Update one item
	public function update($id)
	{
		include('Menu_akses.php'); //akses
		$data['title']="Box||Edit";
		$data['active']="box";
		$data['drop_active']="master";
		$data['content']="box/edit.php";	
		$data['cekid']=$this->M_box->cekid($id)->row_array();
		$this->load->view('admin/template',$data);
	}

	public function update_proses($id)
	{
		$info=array(
				'nama_box'=>$this->input->post('nama_box')
			);
		$this->M_box->update_proses($info,$id);
		$this->session->set_flashdata('suksesedit','1');
		redirect('box');
	}

	//Delete one item
	public function delete($id)
	{
		$id=$this->uri->segment(3);
		$this->M_box->delete($id);
		$this->session->set_flashdata('sukseshapus','1');
		redirect('box');
	}
	
	/* End of file Box.php */
	/* Location: ./application/controllers/Box.php */
}
