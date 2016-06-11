<?php
/**
* 
*/
class M_Tes_Minat_Bakat extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('tes_minat_bakat')->result();
	}

	public function get_id($no_pendaftaran,$no_tes)
	{
		return $this->db->get_where('tes_minat_bakat', array('no_pendaftaran' => $no_pendaftaran,'id' => $no_tes))->result();
	}

	public function add(array $data)
	{
		return $this->db->insert('tes_minat_bakat', $data);
	}

	public function update(array $data,$where)
	{
		$this->db->where($where);
		return $this->db->update('tes_minat_bakat', $data);
	}
}
?>