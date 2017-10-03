<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_input extends CI_Model {

	public function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'no_berkas' => $dataarray[$i]['no_berkas'],
                'no_box' => $dataarray[$i]['no_box'],
                'kode_klasifikasi' => $dataarray[$i]['kode_klasifikasi'],
                'indeks' => $dataarray[$i]['indeks'],
                'uraian' => $dataarray[$i]['uraian'],
                'tahun' => $dataarray[$i]['tahun'],
                'volume' => $dataarray[$i]['volume'],
                'ket' => $dataarray[$i]['ket'],
             );
			$this->db->where('no_berkas',$dataarray[$i]['no_berkas']);
			$this->db->delete('berkas');
			$this->db->insert('berkas', $data);
		}
	}

}

/* End of file M_input.php */
/* Location: ./application/models/M_input.php */