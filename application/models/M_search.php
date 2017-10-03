<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_search extends CI_Model {

	public function all()
	{
		return $this->db->query("SELECT * from berkas
		JOIN box ON box.id_box=berkas.no_box");
	}
	function getberkas($id)
	{
		return $this->db->query("SELECT * from berkas,box where box.id_box=berkas.no_box and berkas.no_box='$id'");
	}
	function getnom($id)
	{
		return $this->db->query("SELECT * from berkas,box where box.id_box=berkas.no_box and berkas.no_box='$id'");
	}
    public function cekid($id)
    {
        return $this->db->where('no_berkas', $id)->get('berkas');
    }
    public function cekfile($idd)
    {
        return $this->db->query("SELECT file from berkas where no_berkas='$idd'");
    }
    public function delete($id)
    {
        return $this->db->query("delete from berkas where no_berkas='$id'");
    }
    public function update_proses($data,$no_berkas)
    {
        $this->db->where('no_berkas', $no_berkas);
        $this->db->update('berkas', $data);
    }
	function Datatables($dt)
    {
        $columns = implode(', ', $dt['col-display']) . ', ' . $dt['id-table'];

        //$join = $dt['join'];

        $sql  = "SELECT {$columns} FROM {$dt['table']} ";


        $data = $this->db->query($sql);

        $rowCount = $data->num_rows();

        $data->free_result();

        // pengkondisian aksi seperti next, search dan limit
        $columnd = $dt['col-display'];
        $count_c = count($columnd);

        // search
        $search = $dt['search']['value'];

        /**
         * Search Global
         * pencarian global pada pojok kanan atas
         */
        $where = '';
        if ($search != '') {   
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';
                
                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }
        
        /**
         * Search Individual Kolom
         * pencarian dibawah kolom
         */
        for ($i=0; $i < $count_c; $i++) { 
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }

        /**
         * pengecekan Form pencarian
         * pencarian aktif jika ada karakter masuk pada kolom pencarian.
         */
        if ($where != '') {
            $sql .= " WHERE " . $where;
            
        }
        
        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";
        
        // limit
        $start  = $dt['start'];
        $length = $dt['length'];

        $sql .= " LIMIT {$start}, {$length}";
        
        $list = $this->db->query($sql);

        /**
         * convert to json
         */
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();

        foreach ($list->result() as $row) {
           $rows = array();
           $rows[] = $row->$columnd[0];
           $rows[] = $row->$columnd[1];
           $rows[] = $row->$columnd[2];
           $rows[] = $row->$columnd[3];
           $rows[] = $row->$columnd[4];
           $rows[] = $row->$columnd[5];
           $rows[] = $row->$columnd[6];
           $rows[] = $row->$columnd[7];
           $rows[] = '<center>
						<a href="'.site_url('search/edit/'.$row->$columnd[0]).'" class="btn btn-default btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
							<i class="entypo-pencil"></i>
						</a>
						<a href="'.site_url('search/hapus/'.$row->$columnd[0]).'" class="btn btn-danger btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
							<i class="entypo-cancel"></i>
						</a>
					</center>';
           $option['data'][] = $rows;
        }

        // eksekusi json
        echo json_encode($option);

    }

}

/* End of file M_search.php */
/* Location: ./application/models/M_search.php */