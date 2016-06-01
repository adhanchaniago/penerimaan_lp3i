<?php  
/**
* 
*/
class M_Peserta extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all($jadwal)
	{
		return $this->db->get_where('peserta', array('id' => $jadwal))->result();
	}

	public function get_where(array $cond)
	{
		return $this->db->get_where('peserta', $cond)->result();
	}

	public function join_jadwal(array $cond)
	{
		$this->db->select("peserta.*, jadwal_tes.TAHAP, jadwal_tes.TANGGAL, jadwal_tes.TEMPAT, jadwal_tes.RUANG");
		$this->db->from("peserta");
		$this->db->join("jadwal_tes", "peserta.id = jadwal_tes.id");
		$this->db->where($cond);
		return $this->db->get()->result();
	}

	public function join_pendaftar(array $cond)
	{
		$this->db->select("pendaftar.*, peserta.ID, peserta.TOTAL_NILAI, peserta.KETERANGAN, peserta.KEPUTUSAN, peserta.CATATAN");
		$this->db->from("peserta");
		$this->db->join("pendaftar", "peserta.no_pendaftaran = pendaftar.no_pendaftaran", "right");
		if(count($cond) > 0)
			$this->db->where($cond);
		return $this->db->get()->result();
	}

	public function custom_where($where)
	{
		$this->db->select("pendaftar.*, peserta.ID, peserta.TOTAL_NILAI, peserta.KETERANGAN, peserta.KEPUTUSAN, peserta.CATATAN");
		$this->db->from("peserta");
		$this->db->join("pendaftar", "peserta.no_pendaftaran = pendaftar.no_pendaftaran", "right");
		$this->db->join("jadwal_tes", "peserta.id = jadwal_tes.id", "left");
		$this->db->where($where);
		return $this->db->get()->result();
	}

	public function add($id, $no_pendaftaran, $total_nilai, $keterangan, $keputusan, $catatan)
	{
		return $this->db->insert('peserta', array(
				'id'				=> $id,
				'no_pendaftaran'	=> $no_pendaftaran,
				'total_nilai'		=> $total_nilai,
				'keterangan'		=> $keterangan,
				'keputusan'			=> $keputusan,
				'catatan'			=> $catatan,
			));
	}

	public function edit($id, $no_pendaftaran, $total_nilai, $keterangan, $keputusan, $catatan)
	{
		$this->db->where('id', $id);
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		return $this->db->update('peserta', array(
				'total_nilai'		=> $total_nilai,
				'keterangan'		=> $keterangan,
				'keputusan'			=> $keputusan,
				'catatan'			=> $catatan,
			));
	}

	public function remove($id, $no_pendaftaran)
	{
		$this->db->where('id', $id);
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		return $this->db->delete('peserta');
	}
}
?>