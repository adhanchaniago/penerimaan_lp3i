<?php
/**
* 
*/
class M_Detail_Tes_Minat_Bakat extends CI_Model
{
	public function get_all()
	{
		return $this->db->get('detil_tes_minat_bakat')->result();
	}

	public function add(array $data)
	{
		return $this->db->insert('detil_tes_minat_bakat',$data);
	}

	public function join_jawaban(array $cond)
	{
		$this->db->select('*');
		$this->db->from('detil_tes_minat_bakat');
		$this->db->join('jawaban_minat_bakat','jawaban_minat_bakat.ID_JAWABAN = detil_tes_minat_bakat.ID_JAWABAN');
		if (count($cond) > 0)
			$this->db->where($cond);
		return $this->db->get()->result();
	}
}
