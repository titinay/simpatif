<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	public function check($username,$password)
	{
		$this->db->select("*");
		$this->db->from('admin');
		$this->db->join('akses', 'admin.akses = akses.id_akses');
		$this->db->where('admin.username', $username);
		$this->db->where('admin.password', $password);
		return $this->db->get();
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */