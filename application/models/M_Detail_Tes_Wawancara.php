<?php
/**
* 
*/
class M_Detail_Tes_Wawancara extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('detil_tes_wawancara')->result();
	}

	public function get_kriteria($no_pendaftaran,$no_tes)
	{
		$this->db->select('*');
		$this->db->from('detil_tes_wawancara');
		$this->db->join('kriteria_wawancara','detil_tes_wawancara.ID_KRITERIA = kriteria_wawancara.ID_KRITERIA');
		$this->db->join('tes_wawancara','detil_tes_wawancara.NO_PENDAFTARAN = tes_wawancara.NO_PENDAFTARAN AND detil_tes_wawancara.ID = tes_wawancara.ID');
		$this->db->where('detil_tes_wawancara.no_pendaftaran',$no_pendaftaran);
		$this->db->where('detil_tes_wawancara.id',$no_tes);
		return $this->db->get()->result();
	}

	public function add($no_pendaftaran,$no_tes,$id_kriteria,$skor)
	{
		return $this->db->insert('detil_tes_wawancara', array(
				'no_pendaftaran' 	=> $no_pendaftaran,
				'id' 				=> $no_tes,
				'id_kriteria' 		=> $id_kriteria,
				'skor' 				=> $skor
			));
	}

	public function update($no_pendaftaran,$no_tes,$id_kriteria,$skor)
	{
		$this->db->where('no_pendaftaran',$no_pendaftaran);
		$this->db->where('id',$no_tes);
		$this->db->where('id_kriteria',$id_kriteria);
		return $this->db->update('detil_tes_wawancara', array(
				'skor' 				=> $skor
			));
	}

}
?>