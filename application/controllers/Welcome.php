<?php

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		no_access();
	}
	public function index()
	{
		include('Menu_akses.php'); //akses
		$data['title']="Dashboard||Arsip";
		$data['active']="dashboard";
		$data['drop_active']="dashboard";
		$data['content']="dashboard/index.php";
		$this->load->view('admin/template',$data);
	}
    public function logout()
	{
	   	$this->session->unset_userdata('usernamee');
	   	$this->session->unset_userdata('level');
	   	redirect('login');
	}
	public function embed($id)
	{
	   	echo '<title>PDF</title>
		<center><embed src="'.base_url('uploads/'.$this->uri->segment(3)).'" width="100%" height="100%"></embed></center>';
	}
}
