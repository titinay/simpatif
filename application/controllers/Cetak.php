<?php

class Cetak extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_cetak');
		no_access();
	}
	public function index()
	{
		include('Menu_akses.php'); //akses
		$data['title']="Cetak||Arsip";
		$data['active']="cetak";
		$data['drop_active']="cetak";
		$data['content']="cetak/index.php";
		$this->load->view('admin/template',$data);
	}
	public function ekspor()
	{
		$tahun1=$this->input->post('tahun1');
		$tahun2=$this->input->post('tahun2');
		if(($tahun1=="") and ($tahun2=="")){
			$data['tahun1']="";
			$data['tahun2']="";
			$data['all']=$this->M_cetak->getDataEkspor()->result();
			if($this->input->post('format')==1){
				$this->load->view('admin/cetak/ekspor.php', $data);
			}else{
				$this->load->view('admin/cetak/eksporex.php', $data);
			}
		}elseif($tahun2!=""){
			if($tahun1>$tahun2){
				$data['tahun1']="";
				$data['tahun2']="";
				$this->session->set_flashdata('error','1');
				redirect('cetak');
			}else{
				$data['tahun1']=$tahun1;
				$data['tahun2']=$tahun2;
				if($tahun2!=""){
					$data['all']=$this->M_cetak->getDataEks($tahun1,$tahun2)->result();
				}else{
					$data['all']=$this->M_cetak->getDataEks1($tahun1)->result();
				}
				if($this->input->post('format')==1){
					$this->load->view('admin/cetak/ekspor.php', $data);
				}else{
					$this->load->view('admin/cetak/eksporex.php', $data);
				}
			}
		}else{
			$data['tahun1']=$tahun1;
			$data['tahun2']=$tahun2;
			if($tahun2!=""){
				$data['all']=$this->M_cetak->getDataEks($tahun1,$tahun2)->result();
			}else{
				$data['all']=$this->M_cetak->getDataEks1($tahun1)->result();
			}
			if($this->input->post('format')==1){
				$this->load->view('admin/cetak/ekspor.php', $data);
			}else{
				$this->load->view('admin/cetak/eksporex.php', $data);
			}
		}
	}
}
