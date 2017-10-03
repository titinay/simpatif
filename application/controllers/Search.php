<?php

class Search extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_search');
        $this->load->model('M_box');
        no_access();
	}
	public function index()
	{
        include('Menu_akses.php'); //akses
		$data['title']="Search||Arsip";
        $data['active']="search";
		$data['drop_active']="search";
		$data['all']=$this->M_search->all()->result();
		$data['content']="search/index.php";
		$this->load->view('admin/template',$data);
	}
    public function embed()
    {
        $file = $this->uri->segment(3);
        echo "<embed src='".base_url('files/'.$file)."' width='100%' height='100%'></embed>";
    }
    public function update($id)
    {
        include('Menu_akses.php'); //akses
        $data['title']="Search||Edit";
        $data['active']="search";
        $data['drop_active']="search";
        $data['data_box']=$this->M_box->all()->result();
        $data['content']="search/edit.php";  
        $data['cekid']=$this->M_search->cekid($id)->row_array();
        $this->load->view('admin/template',$data);
    }

    public function update_pro($id)
    {
        $info=array(
            'no_box'=>$this->input->post('no_box', TRUE),
            'indeks'=>$this->input->post('indeks', TRUE),
            'kode_klasifikasi'=>$this->input->post('kode_klasifikasi', TRUE),
            'uraian'=>$this->input->post('uraian', TRUE),
            'tahun'=>$this->input->post('tahun', TRUE),
            'volume'=>$this->input->post('volume', TRUE),
            'ket'=>$this->input->post('keterangan', TRUE),
        );
        $this->M_search->update_proses($info,$id);
        $this->session->set_flashdata('suksesedit','1');
        redirect('Search');
    }
    function hapus($id)
    {
        $id=$this->uri->segment(3);
        $this->M_search->delete($id);
        $this->session->set_flashdata('sukseshapus','1');
        redirect('Search');
    }

    public function update_proses() 
    {
        $no_berkas  = $this->input->post('no_berkas', TRUE);
        $no_box     = $this->input->post('no_box', TRUE);
        $indeks     = $this->input->post('indeks', TRUE);
        $kode_klasifikasi     = $this->input->post('kode_klasifikasi', TRUE);
        $uraian     = $this->input->post('uraian', TRUE);
        $tahun     = $this->input->post('tahun', TRUE);
        $volume     = $this->input->post('volume', TRUE);
        $ket     = $this->input->post('keterangan', TRUE);
        if($_FILES['file']['name'] == ""){
            $new_name3=$this->input->post('file_lama', TRUE);
        }else{
            $hapus = $this->input->post('file_lama', TRUE);
            unlink('files/'.$hapus);
            $dokumen=$_FILES['file']['name'];
            $dir="file/"; //tempat file foto
            $dirs="files/"; //tempat file foto
            $file='file'; //name pada input type file
            $new_name3='update'.$this->input->post('no_box')."-".$this->input->post('no_berkas').'.pdf'; //name pada input type file
            $vdir_upload = $dir;
            $file_name=$_FILES[''.$file.'']["name"];
            $vfile_upload = $vdir_upload . $file;
            $tmp_name=$_FILES[''.$file.'']["tmp_name"];
            move_uploaded_file($tmp_name, $dirs.$file_name);
            rename($dirs.$file_name, $dirs.$new_name3);
        }
            $data=array(
                'no_berkas'=>$no_berkas,
                'no_box'=>$no_box,
                'indeks'=>$indeks,
                'kode_klasifikasi'=>$kode_klasifikasi,
                'uraian'=>$uraian,
                'tahun'=>$tahun,
                'volume'=>$volume,
                'ket'=>$ket,
                'file'=>$new_name3
            );
            $this->M_search->update_proses($data,$no_berkas);
            $this->session->set_flashdata('suksesedit', "1");
            redirect('Search');
    }

	 function datatables_ajax()
    {
    	/** AJAX Handle */
    	if(
    		isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    		!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
    		)
    	{
            
            $this->load->model('M_search');
    		
    		/**
    		 * Mengambil Parameter dan Perubahan nilai dari setiap 
    		 * aktifitas pada table
    		 */
            $datatables  = $_POST;
            $datatables['table']    = 'berkas';
    		$datatables['id-table'] = 'no_berkas';

            /**
             * Kolom yang ditampilkan
             */
	    	$datatables['col-display'] = array(
            	    		               'no_berkas',
            	    		               'no_box',
            	    		               'kode_klasifikasi',
            	    		               'indeks',
            	    		               'uraian',
            	    		               'tahun',
            	    		               'volume',
            	    		               'ket',
            	    		             );

            /**
             * menggunakan table join
             */
           // $datatables['join']    = 'JOIN box ON box.id_box=berkas.no_box';
	    	$this->M_search->Datatables($datatables);
    	}

    	return;
    }
}
