<?php  
/**
* 
*/
class M_Jadwal_Tes extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('jadwal_tes')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('jadwal_tes', array('id' => $id))->result();
	}

	public function get_where(array $cond)
	{
		return $this->db->get_where('jadwal_tes', $cond)->result();
	}

	public function add($id, $tahap, $tanggal, $tempat, $ruang)
	{
		return $this->db->insert('jadwal_tes', array(
				'id'		=> $id,
				'tahap'		=> $tahap,
				'tanggal'	=> $tanggal,
				'tempat'	=> $tempat,
				'ruang'		=> $ruang
			));
	}

	public function edit($id, $tahap, $tanggal, $tempat, $ruang)
	{
		$this->db->where('id', $id);
		return $this->db->update('jadwal_tes', array(
				'tahap'		=> $tahap,
				'tanggal'	=> $tanggal,
				'tempat'	=> $tempat,
				'ruang'		=> $ruang
			));
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('peserta');

		$this->db->where('id', $id);
		return $this->db->delete('jadwal_tes');
	}
}
?>