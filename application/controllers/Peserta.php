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
		$data['judul'] 				= 'Halaman Peserta MABA LP3I';
		$data['konten'] 			= 'peserta/beranda';
		$no_tes						= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->ID;
		$data['jadwal_wawancara'] 	= $this->tbl_peserta->join_pendaftar_jadwal(array('peserta.NO_PENDAFTARAN'=>$this->session->userdata('no_pendaftaran'),'peserta.ID'=>$no_tes))[0];

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
				$data['judul'] 		= 'Ujian Akademik';
				$data['konten'] 	= 'peserta/akademik';
				$data['bidang'] 	= $this->tbl_bidang_soal_akademik->get_all();


				$this->load->view('peserta/layout', $data);				
				break;
			
			default:
				redirect('peserta');
				break;
		}
	}
}
