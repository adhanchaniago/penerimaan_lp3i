<?php
/**
* 
*/
class M_Pilihan_Jurusan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('pilihan_jurusan')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('pilihan_jurusan', array('no_pendaftaran' => $id))->result();
	}

	public function add($no_pendaftaran, $id_jurusan)
	{
		return $this->db->insert('pilihan_jurusan', array(
				'no_pendaftaran' => $no_pendaftaran,
				'id_jurusan' => $id_jurusan,
			));
	}


	public function edit($no_pendaftaran, $id_jurusan)
	{
		$this->db->where('no_pendaftaran', $id);
		return $this->db->update('pilihan_jurusan', array(
				'id_jurusan' => $id_jurusan
			));
	}

	public function remove($no_pendaftaran, $id_jurusan)
	{
		$this->db->where('no_pendaftaran', $no_pendaftaran);
		$this->db->where('id_jurusan', $id_jurusan);
		return $this->db->delete('pilihan_jurusan');
	}

	public function get_by_jurusan($id)
	{
		return $this->db->get_where('pilihan_jurusan', array('id_jurusan' => $id))->result();
	}
}
?>