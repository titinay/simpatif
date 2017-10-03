<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_ars extends CI_Model {

	public function all()
	{
		return $this->db->query("SELECT * from ars_vital
		JOIN box ON box.id_box=ars_vital.no_box");
	}
}

/* End of file M_search.php */
/* Location: ./application/models/M_search.php */