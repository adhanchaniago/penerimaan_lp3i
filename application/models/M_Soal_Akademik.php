<?php
/**
* 
*/
class M_Soal_Akademik extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$this->db->select('soal_akademik.*, bidang_soal_akademik.NAMA_BIDANG_SOAL as BIDANG_SOAL');
		$this->db->from('soal_akademik');
		$this->db->join('bidang_soal_akademik', 'soal_akademik.ID_BIDANG_SOAL = bidang_soal_akademik.ID_BIDANG_SOAL', 'left');
		return $this->db->get()->result();
	}

	public function get_id($id)
	{
		$this->db->select('soal_akademik.*, bidang_soal_akademik.NAMA_BIDANG_SOAL as BIDANG_SOAL');
		$this->db->from('soal_akademik');
		$this->db->join('bidang_soal_akademik', 'soal_akademik.ID_BIDANG_SOAL = bidang_soal_akademik.ID_BIDANG_SOAL', 'left');
		$this->db->where('soal_akademik.ID_SOAL', $id);
		return $this->db->get()->result();
	}

	public function add($id, $bidang, $teks)
	{
		return $this->db->insert('soal_akademik', array(
				'id_soal' => $id,
				'id_bidang_soal' => $bidang,
				'teks_soal' => $teks
			));
	}


	public function edit($id, $bidang, $teks)
	{
		$this->db->where('id_soal', $id);
		return $this->db->update('soal_akademik', array(
				'id_bidang_soal' => $bidang,
				'teks_soal' => $teks
			));
	}

	public function remove($id)
	{
		$this->db->where('id_soal', $id);
		$this->db->delete('jawaban_akademik');

		$this->db->where('id_soal', $id);
		return $this->db->delete('soal_akademik');
	}
}
?>