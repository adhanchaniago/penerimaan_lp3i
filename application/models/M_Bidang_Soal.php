<?php
/**
* 
*/
class M_Bidang_Soal extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('bidang_soal_akademik')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('bidang_soal_akademik', array('id_bidang_soal' => $id))->result();
	}

	public function add($id, $nama, $bobot)
	{
		return $this->db->insert('bidang_soal_akademik', array(
				'id_bidang_soal' => $id,
				'nama_bidang_soal' => $nama,
				'bobot_bidang_soal' => $bobot
			));
	}


	public function edit($id, $nama, $bobot)
	{
		$this->db->where('id_bidang_soal', $id);
		return $this->db->update('bidang_soal_akademik', array(
				'nama_bidang_soal' => $nama,
				'bobot_bidang_soal' => $bobot
			));
	}

	public function total_bobot()
	{
		return $this->db->query("select ifnull(sum(bobot_bidang_soal), 0) as TOTAL from bidang_soal_akademik")->result()[0]->TOTAL;
	}

	public function remove($id)
	{
		$this->db->where('id_bidang_soal', $id);
		return $this->db->delete('bidang_soal_akademik');
	}
}
?>