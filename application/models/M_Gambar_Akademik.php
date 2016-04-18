<?php
/**
* 
*/
class M_Gambar_Akademik extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('gambar_akademik')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('gambar_akademik', array('id' => $id))->result();
	}

	public function get_soal($soal)
	{
		return $this->db->get_where('gambar_akademik', array('id_soal' => $soal))->result();
	}

	public function add($id, $soal, $nama, $lokasi)
	{
		return $this->db->insert('gambar_akademik', array(
				'id' => $id,
				'id_soal' => $soal,
				'nama_file' => $nama,
				'lokasi_file' => $lokasi
			));
	}


	public function edit($id, $soal, $nama, $lokasi)
	{
		$this->db->where('id_jawaban', $id);
		return $this->db->update('gambar_akademik', array(
				'id_soal' => $soal,
				'nama_file' => $nama,
				'lokasi_file' => $lokasi
			));
	}

	public function remove($id)
	{
		$file = $this->db->get_where('gambar_akademik', array('id' => $id))->result();
		unlink($file[0]->LOKASI_FILE.$file[0]->NAMA_FILE);

		$this->db->where('id', $id);
		return $this->db->delete('gambar_akademik');
	}

	public function remove_soal($soal)
	{
		$files = $this->db->get_where('gambar_akademik', array('id_soal' => $soal))->result();
		if(count($files) > 0) {
			foreach ($files as $file) {
				unlink($file->LOKASI_FILE.$file->NAMA_FILE);
			}
		}

		$this->db->where('id_soal', $soal);
		return $this->db->delete('gambar_akademik');
	}
}
?>