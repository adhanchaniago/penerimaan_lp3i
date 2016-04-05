<?php
/**
* 
*/
class M_Security extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function admin_check()
	{
		$admin = $this->session->userdata('id_admin');
		if(empty($admin))
		{
			$this->session->sess_destroy();
			redirect('admin/login');
		}
	}

	public function check()
	{
		$user = $this->session->userdata('user_id');
		if(empty($user))
		{
			$this->session->sess_destroy();
			redirect('page/login');
		}
	}

	public function gen_ai_id($tabel, $kolom)
	{
		$this->db->select_max($kolom, 'id');
		$data = $this->db->get($tabel)->result();
		return ($data[0]->id + 1);
	}
}
?>