<?php
/**
* 
*/
class M_Anggota_Keluarga extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('anggota_keluarga')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('anggota_keluarga', array('id' => $id))->result();
	}

	public function get_pendaftar($id)
	{
		return $this->db->get_where('anggota_keluarga', array('no_pendaftaran' => $id))->result();
	}

	public function add($id, $no_pendaftaran, $nama, $hubungan, $usia, $pekerjaan)
	{
		return $this->db->insert('anggota_keluarga', array(
				'ID' => $id,
				'NO_PENDAFTARAN' => $no_pendaftaran,
				'NAMA' => $nama,
				'HUBUNGAN_KELUARGA' => $hubungan,
				'USIA' => $usia,
				'PEKERJAAN' => $pekerjaan
			));
	}


	public function edit($id, $no_pendaftaran, $nama, $hubungan, $usia, $pekerjaan)
	{
		$this->db->where('id', $id);
		return $this->db->update('anggota_keluarga', array(
				'no_pendaftaran' => $no_pendaftaran,
				'nama' => $nama,
				'hubungan_keluarga' => $hubungan,
				'usia' => $usia,
				'pekerjaan' => $pekerjaan
			));
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('anggota_keluarga');
	}
}
?>