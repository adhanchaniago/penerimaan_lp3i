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
		$user = $this->session->userdata('no_pendaftaran');
		if(empty($user))
		{
			$this->session->sess_destroy();
			redirect('page/login');
		}
	}

	public function check_pewawancara()
	{
		$user = $this->session->userdata('id_pewawancara');
		if(empty($user))
		{
			$this->session->sess_destroy();
			redirect('admin/login');
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