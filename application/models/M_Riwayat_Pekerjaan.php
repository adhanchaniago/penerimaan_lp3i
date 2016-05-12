<?php  
/**
* 
*/
class M_Riwayat_Pekerjaan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('riwayat_kerja')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('riwayat_kerja', array('id' => $id))->result();
	}

	public function get_pendaftar($id)
	{
		return $this->db->get_where('riwayat_kerja', array('no_pendaftaran' => $id))->result();
	}

	public function add($id, $no_pendaftaran, $nama, $tgl_mulai, $tgl_selesai, $jabatan, $gaji)
	{
		return $this->db->insert('riwayat_kerja', array(
				'id' => $id,
				'no_pendaftaran' => $no_pendaftaran,
				'nama_perusahaan' => $nama,
				'tanggal_mulai' => $tgl_mulai,
				'tanggal_selesai' => $tgl_selesai,
				'jabatan_akhir' => $jabatan,
				'gaji_perbulan' => $gaji
			));
	}


	public function edit($id, $no_pendaftaran, $nama, $tgl_mulai, $tgl_selesai, $jabatan, $gaji)
	{
		$this->db->where('id', $id);
		return $this->db->update('riwayat_kerja', array(
				'no_pendaftaran' => $no_pendaftaran,
				'nama_perusahaan' => $nama,
				'tanggal_mulai' => $tgl_mulai,
				'tanggal_selesai' => $tgl_selesai,
				'jabatan_akhir' => $jabatan,
				'gaji_perbulan' => $gaji
			));
	}

	public function remove($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('riwayat_kerja');
	}
}
?>