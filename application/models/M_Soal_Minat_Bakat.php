<?php
/**
* 
*/
class M_Soal_Minat_Bakat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		$this->db->select('soal_minat_bakat.*');
		$this->db->from('soal_minat_bakat');
		return $this->db->get()->result();
	}

	public function get_id($id)
	{
		$this->db->select('soal_minat_bakat.*');
		$this->db->from('soal_minat_bakat');
		$this->db->where('soal_minat_bakat.ID_SOAL', $id);
		return $this->db->get()->result();
	}

	public function add($id, $teks)
	{
		return $this->db->insert('soal_minat_bakat', array(
				'id_soal' => $id,
				'teks_soal' => $teks
			));
	}


	public function edit($id, $teks)
	{
		$this->db->where('id_soal', $id);
		return $this->db->update('soal_minat_bakat', array(
				'teks_soal' => $teks
			));
	}

	public function remove($id)
	{
		$this->db->where('id_soal', $id);
		$this->db->delete('jawaban_minat_bakat');

		$this->db->where('id_soal', $id);
		return $this->db->delete('soal_minat_bakat');
	}
}
?>