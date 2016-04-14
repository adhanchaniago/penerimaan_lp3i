<?php
/**
* 
*/
class M_Jawaban_Minat_Bakat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('jawaban_minat_bakat')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('jawaban_minat_bakat', array('id_jawaban' => $id))->result();
	}

	public function get_soal($soal)
	{
		return $this->db->get_where('jawaban_minat_bakat', array('id_soal' => $soal))->result();
	}

	public function add($id, $soal, $jawaban, $karakter)
	{
		return $this->db->insert('jawaban_minat_bakat', array(
				'id_jawaban' => $id,
				'id_soal' => $soal,
				'jawaban' => $jawaban,
				'karakter' => $karakter
			));
	}


	public function edit($id, $soal, $jawaban, $karakter)
	{
		$this->db->where('id_jawaban', $id);
		return $this->db->update('jawaban_minat_bakat', array(
				'id_jawaban' => $id,
				'id_soal' => $soal,
				'jawaban' => $jawaban,
				'karakter' => $karakter
			));
	}

	public function remove($id)
	{
		$this->db->where('id_jawaban', $id);
		return $this->db->delete('jawaban_minat_bakat');
	}
}
?>