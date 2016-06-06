<?php  
/**
* 
*/
class Pewawancara extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('pewawancara/beranda');
	}

	public function beranda()
	{
		$this->security_check->check_pewawancara();
		$data['judul'] = 'Halaman Pewawancara';
		$data['konten'] = 'pewawancara/beranda';

		$this->load->view('pewawancara/layout', $data);
	}

	public function tes($no_pendaftaran)
	{
		$this->security_check->check_pewawancara();
		$data['judul'] = 'Tes Peserta Wawancara';
		$data['konten'] = 'pewawancara/tes';

		$this->load->view('pewawancara/layout', $data);
	}	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
