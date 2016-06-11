<?php
/**
* 
*/
class M_Tes_Akademik extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('tes_akademik')->result();
	}

	public function get_id($no_pendaftaran,$no_tes)
	{
		return $this->db->get_where('tes_akademik', array('no_pendaftaran' => $no_pendaftaran,'id' => $no_tes))->result();
	}

	public function add(array $data)
	{
		return $this->db->insert('tes_akademik', $data);
	}

	public function update(array $data,$where)
	{
		$this->db->where($where);
		return $this->db->update('tes_akademik', $data);
	}
}
?>