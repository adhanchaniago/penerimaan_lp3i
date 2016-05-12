<?php  
/**
* 
*/
class M_Riwayat_Pendidikan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('riwayat_pendidikan')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('riwayat_pendidikan', array('id' => $id))->result();
	}

	public function get_pendaftar($id)
	{
		return $this->db->get_where('riwayat_pendidikan', array('no_pendaftaran' => $id))->result();
	}

	public function add($id, $no_pendaftaran, $jenis, $nama, $alamat, $tgl_mulai, $tgl_selesai, $sertifikat)
	{
		return $this->db->insert('riwayat_pendidikan', array(
				'id' => $id,
				'no_pendaftaran' => $no_pendaftaran,
				'jenis' => $jenis,
				'nama_lembaga' => $nama,
				'alamat_lembaga' => $alamat,
				'tanggal_mulai' => $tgl_mulai,
				'tanggal_selesai' => $tgl_selesai,
				'sertifikat' => $sertifikat
			));
	}


	public function edit($id, $no_pendaftaran, $jenis, $nama, $alamat, $tgl_mulai, $tgl_selesai, $sertifikat)
	{
		$this->db->where('id', $id);
		return $this->db->update('riwayat_pendidikan', array(
				'no_pendaftaran' => $no_pendaftaran,
				'jenis' => $jenis,
				'nama_lembaga' => $nama,
				'alamat_lembaga' => $alamat,
				'tanggal_mulai' => $tgl_mulai,
				'tanggal_selesai' => $tgl_selesai,
				'sertifikat' => $sertifikat
			));
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('riwayat_pendidikan');
	}
}
?>