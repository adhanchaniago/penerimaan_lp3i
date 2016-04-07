<?php
/**
* 
*/
class M_Jurusan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('jurusan')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('jurusan', array('id_jurusan' => $id))->result();
	}

	public function add($id, $nama, $karakter, $keterangan = null)
	{
		return $this->db->insert('jurusan', array(
				'id_jurusan' => $id,
				'nama_jurusan' => $nama,
				'saran_karakter' => $karakter,
				'keterangan' => $keterangan
			));
	}


	public function edit($id, $nama, $karakter, $keterangan)
	{
		$this->db->where('id_jurusan', $id);
		return $this->db->update('jurusan', array(
				'nama_jurusan' => $nama,
				'saran_karakter' => $karakter,
				'keterangan' => $keterangan
			));
	}

	public function remove($id)
	{
		$this->db->where('id_jurusan', $id);
		return $this->db->delete('jurusan');
	}
}
?>