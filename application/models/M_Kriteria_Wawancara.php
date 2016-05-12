<?php
/**
* 
*/
class M_Kriteria_Wawancara extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('kriteria_wawancara')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('kriteria_wawancara', array('id_kriteria' => $id))->result();
	}

	public function add($id, $nama)
	{
		return $this->db->insert('kriteria_wawancara', array(
				'id_kriteria' => $id,
				'nama_kriteria' => $nama
			));
	}


	public function edit($id, $nama)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->update('kriteria_wawancara', array(
				'nama_kriteria' => $nama,
			));
	}

	public function remove($id)
	{
		$this->db->where('id_kriteria', $id);
		return $this->db->delete('kriteria_wawancara');
	}
}
?>