<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_box extends CI_Model {

	public function getId()
    {
        $q = $this->db->query("select MAX(id_box) as kd_max from box");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%01s", $tmp);
            }
        }
        else
        {
            $kd = "1";
        }
        return $kd;
    }
	public function all()
	{
		return $this->db->get('box');

	}
    public function cekid($id)
    {
        return $this->db->where('id_box', $id)->get('box');
    }
	public function berkas($id)
	{
		return $this->db->where('no_box',$id)->get('berkas');

	}
	public function delete($id)
	{
		return $this->db->query("delete from box where id_box='$id'");

	}
    public function update_proses($info,$id)
    {
        $this->db->where('id_box', $id);
        $this->db->update('box', $info);
    }
}

/* End of file M_box.php */
/* Location: ./application/models/M_box.php */