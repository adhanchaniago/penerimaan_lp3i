<?php
/**
* 
*/
class M_Jawaban_Akademik extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('jawaban_akademik')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('jawaban_akademik', array('id_jawaban' => $id))->result();
	}

	public function get_soal($soal)
	{
		return $this->db->get_where('jawaban_akademik', array('id_soal' => $soal))->result();
	}

	public function add($id, $soal, $jawaban, $nilai)
	{
		return $this->db->insert('jawaban_akademik', array(
				'id_jawaban' => $id,
				'id_soal' => $soal,
				'jawaban' => $jawaban,
				'nilai' => $nilai
			));
	}


	public function edit($id, $soal, $jawaban, $nilai)
	{
		$this->db->where('id_jawaban', $id);
		return $this->db->update('jawaban_akademik', array(
				'id_jawaban' => $id,
				'id_soal' => $soal,
				'jawaban' => $jawaban,
				'nilai' => $nilai
			));
	}

	public function remove($id)
	{
		$this->db->where('id_jawaban', $id);
		return $this->db->delete('jawaban_akademik');
	}
}
?>