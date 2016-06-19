<?php
/**
* 
*/
class M_Detail_Tes_Akademik extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('detil_tes_akademik')->result();
	}

	public function add(array $data)
	{
		return $this->db->insert('detil_tes_akademik',$data);
	}

	public function benar($no_pendaftaran,$no_tes)
	{
		$this->db->select('*');
		$this->db->from('detil_tes_akademik');
		$this->db->join('jawaban_akademik','jawaban_akademik.ID_JAWABAN = detil_tes_akademik.ID_JAWABAN');
		$this->db->where('detil_tes_akademik.NO_PENDAFTARAN',$no_pendaftaran);
		$this->db->where('detil_tes_akademik.ID',$no_tes);
		$this->db->where('jawaban_akademik.NILAI',1);
		return $this->db->get()->result();
	}

	public function join_all(array $cond = NULL)
	{
		$this->db->select('*');
		$this->db->from('detil_tes_akademik');
		$this->db->join('jawaban_akademik','jawaban_akademik.ID_JAWABAN = detil_tes_akademik.ID_JAWABAN');
		$this->db->join('soal_akademik','soal_akademik.ID_SOAL = detil_tes_akademik.ID_SOAL');
		$this->db->join('bidang_soal_akademik','bidang_soal_akademik.ID_BIDANG_SOAL = soal_akademik.ID_BIDANG_SOAL');
		if (count($cond) > 0)
			$this->db->where($cond);
		return $this->db->get()->result();
	}
}
