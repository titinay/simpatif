<?php

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		no_access();
		$this->load->model('M_admin');
	}
	public function index()
	{
		include('Menu_akses.php'); //akses
		$data['title']="Admin||Arsip";
		$data['drop_active']="master";
		$data['active']="admin";
		$data['all']=$this->M_admin->all()->result();
		$data['id']=$this->M_admin->getId();
		$data['akses']=$this->M_admin->getakses()->result();
		$data['content']="admin/index.php";
		$this->load->view('admin/template',$data);
	}
	public function add()
	{
		$id=$this->input->post('id', TRUE);
		$username=$this->input->post('username', TRUE);
		$password=$this->input->post('password', TRUE);
		$nama=$this->input->post('name', TRUE);
		$id_akses=$this->input->post('id_akses', TRUE);
		$cekusername=$this->M_admin->checkUser($username)->num_rows();
		if($cekusername>0){
			$this->session->set_flashdata('error','1');
			redirect('admin');
		}else{
			$object=array(
				'id_admin'=>$id,
				'username'=>$username,
				'password'=>md5($password),
				'nama_admin'=>$nama,
				'akses' => $id_akses
			);
			$this->db->insert('admin', $object);
			$this->session->set_flashdata('sukses','1');
			redirect('admin');
		}
	}
	//Update one item
	public function update($id)
	{
		include('Menu_akses.php'); //akses
		$data['title']="Admin||Edit";
		$data['active']="admin";
		$data['drop_active']="master";
		$data['content']="admin/edit.php";	
		$data['cekid']=$this->M_admin->cekid($id)->row_array();
		$this->load->view('admin/template',$data);
	}

	public function update_proses($id)
	{
		$info=array(
				'nama_admin'=>$this->input->post('nama_admin')
			);
		$this->M_admin->update_proses($info,$id);
		$this->session->set_flashdata('suksesedit','1');
		redirect('Admin');
	}

	//Delete one item
	public function delete($id)
	{
		$id=$this->uri->segment(3);
		$this->M_admin->delete($id);
		$this->session->set_flashdata('sukseshapus','1');
		redirect('Admin');
	}
}
