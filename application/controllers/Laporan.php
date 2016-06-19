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
		$data['judul'] 		= "Laporan,Seluruh Peserta";
		$data['konten'] 	= "admin/keseluruhan";
		$cond 				= array('peserta.ID' => 1, 'peserta.KETERANGAN' => 'DITERIMA');
		$data['pendaftar'] 	= $this->tbl_peserta->join_pendaftar($cond);
		$this->load->view('admin/layout', $data);
	}

	public function cetak($tipe)
	{
		$cond 				= array('peserta.ID' => 1, 'peserta.KETERANGAN' => 'DITERIMA');
		$data['pendaftar'] 	= $this->tbl_peserta->join_pendaftar($cond);

		$fileName 			= 'Laporan Peserta '.date('dmY_His');
		$this->pdf->load_view('admin/cetak_keseluruhan',$data);
		$this->pdf->render();
		$this->pdf->stream($fileName);
	}

	public function detail($no_pendaftaran)
	{
		$data ['pendaftar']			= $this->tbl_pendaftar->get_id($no_pendaftaran)[0];
		$data ['bidang_akademik']	= $this->tbl_bidang_soal_akademik->get_all();
		$data ['total_akademik']	= count($this->tbl_tes_akademik->get_id($no_pendaftaran,1))>0?$this->tbl_tes_akademik->get_id($no_pendaftaran,1)[0]->TOTAL_NILAI:"0";
		
		$total_soal					= count($this->tbl_soal_akademik->get_all());
		$total_presentasi			= $this->tbl_bidang_soal_akademik->total_bobot();
		$data ['bobot_nilai']		= $total_presentasi/$total_soal;

		$data ['kriteria']			= $this->tbl_detail_tes_wawancara->join_kriteria(array('detil_tes_wawancara.NO_PENDAFTARAN' => $no_pendaftaran));
		$data ['total_wawancara']	= count($this->tbl_tes_wawancara->get_total(array('tes_wawancara.NO_PENDAFTARAN' => $no_pendaftaran)))>0?$this->tbl_tes_wawancara->get_total(array('tes_wawancara.NO_PENDAFTARAN' => $no_pendaftaran))[0]->TOTAL_NILAI:"0";

		$fileName 			= $no_pendaftaran.' '.$data['pendaftar']->NAMA;
		$this->pdf->load_view('admin/cetak_individu',$data);
		$this->pdf->render();
		$this->pdf->stream($fileName);	
	}
}
