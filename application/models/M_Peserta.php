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

	public function get_id($no_pendaftaran,$id)
	{
		return $this->db->get_where('peserta',array('NO_PENDAFTARAN'=>$no_pendaftaran,'ID'=>$id))->result();
	}

	public function get_where(array $cond)
	{
		return $this->db->get_where('peserta', $cond);
	}

	public function join_jadwal(array $cond)
	{
		$this->db->select("peserta.*, jadwal_tes.*");
		$this->db->from("peserta");
		$this->db->join("jadwal_tes", "peserta.ID = jadwal_tes.ID");
		if (count($cond)>0)
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

	public function join_pendaftar_jadwal(array $cond)
	{
		$this->db->select("pendaftar.*, jadwal_tes.*, peserta.ID, peserta.TOTAL_NILAI, peserta.KETERANGAN, peserta.KEPUTUSAN, peserta.CATATAN");
		$this->db->from("peserta");
		$this->db->join("pendaftar", "peserta.no_pendaftaran = pendaftar.no_pendaftaran", "inner");
		$this->db->join("jadwal_tes", "peserta.id = jadwal_tes.id");
		if(count($cond) > 0)
			$this->db->where($cond);
		return $this->db->get()->result();	
	}

	public function custom_where($where)
	{
		$this->db->select("pendaftar.*, peserta.ID, peserta.TOTAL_NILAI, peserta.KETERANGAN, peserta.KEPUTUSAN, peserta.CATATAN, if(peserta.ID is null, '', 'checked') as SELECTED");
		$this->db->from("peserta");
		$this->db->join("pendaftar", "peserta.no_pendaftaran = pendaftar.no_pendaftaran", "right");
		$this->db->join("jadwal_tes", "peserta.id = jadwal_tes.id", "left");
		$this->db->where($where);
		return $this->db->get()->result();
	}

	public function where_not_in($key, array $cond)
	{
		$this->db->select("pendaftar.*, peserta.ID, peserta.TOTAL_NILAI, peserta.KETERANGAN, peserta.KEPUTUSAN, peserta.CATATAN, if(peserta.ID is null, '', 'checked') as SELECTED");
		$this->db->from("peserta");
		$this->db->join("pendaftar", "peserta.no_pendaftaran = pendaftar.no_pendaftaran", "right");
		$this->db->join("jadwal_tes", "peserta.id = jadwal_tes.id", "left");
		$this->db->where_not_in($key, $cond);
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

	public function update(array $data,array $cond)
	{
		$this->db->where($cond);
		return $this->db->update('peserta',$data);
	}

	public function remove($id, $no_pendaftaran)
	{
		$this->db->where('id', $id);
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		return $this->db->delete('peserta');
	}

}
?>