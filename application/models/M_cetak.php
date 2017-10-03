<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cetak extends CI_Model {

	public function getDataEks($tahun1,$tahun2)
		{
			return $this->db->query("SELECT * FROM berkas
			                        JOIN box ON box.id_box=berkas.no_box
			                        AND tahun between '$tahun1' AND '$tahun2' ORDER BY berkas.tahun ASC");
		}	
	public function getDataEks1($tahun1)
		{
			return $this->db->query("SELECT * FROM berkas
			                        JOIN box ON box.id_box=berkas.no_box
			                        AND tahun='$tahun1' ORDER BY berkas.tahun ASC");
		}	
	public function getDataEkspor()
		{
			return $this->db->query("SELECT * FROM berkas
			                        JOIN box ON box.id_box=berkas.no_box
			                        ORDER BY berkas.no_berkas ASC");
		}	

}

/* End of file M_cetak.php */
/* Location: ./application/models/M_cetak.php */