<?php  
/**
* 
*/
class Peserta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('peserta/beranda');
	}

	public function beranda()
	{
		$this->security_check->check();
		$data['judul'] = 'Halaman Peserta MABA LP3I';
		$data['konten'] = 'peserta/beranda';

		$this->load->view('peserta/layout', $data);
	}	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('page/login');
	}

	public function ujian($jenis)
	{
		$this->security_check->check();

		switch ($jenis) {
			case 'akademik':
				$data['judul'] = 'Ujian Akademik';
				$data['konten'] = 'peserta/akademik';

				$this->load->view('peserta/layout', $data);				



				break;
			
			default:
				redirect('peserta');
				break;
		}
	}
}
