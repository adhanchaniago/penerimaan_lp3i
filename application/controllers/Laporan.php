<?php  
/**
* 
*/
class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		redirect('laporan/individu');
	}

	public function individu()
	{
		$data['judul'] = "Laporan Peserta";
		$data['konten'] = "admin/individu";

		$this->load->view('admin/layout', $data);
	}

	public function keseluruhan()
	{
		$data['judul'] = "Laporan,Seluruh Peserta";
		$data['konten'] = "admin/keseluruhan";
		$data['pendaftar'] = $this->tbl_pendaftar->get_all();


		$this->load->view('admin/layout', $data);
	}

	public function cetak($tipe)
	{
		// $this->load->view('admin/cetak_keseluruhan');

		$fileName 			= 'Laporan Peserta';

		$isi = array();

		$this->pdf->load_view('admin/cetak_keseluruhan',$isi);
		$this->pdf->render();
		$this->pdf->stream($fileName);
	}

	public function detail()
	{
		// $this->load->view('admin/cetak_individu');

		$fileName 			= '0606160001 achmad ainul yaqin';//nomer pendaftaran dan nama 

		$isi = array();

		$this->pdf->load_view('admin/cetak_individu',$isi);
		$this->pdf->render();
		$this->pdf->stream($fileName);	
	}
}
