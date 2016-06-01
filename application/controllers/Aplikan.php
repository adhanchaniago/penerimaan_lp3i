<?php  
/**
* 
*/
class Aplikan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = "Data Aplikan";
		$data['konten'] = "admin/aplikan";

		$data['pendaftar'] = $this->tbl_pendaftar->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function hapus($no_pendaftaran)
	{
		$act = $this->tbl_pendaftar->remove($no_pendaftaran);

		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data aplikan telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data aplikan gagal dihapus.');
		}
		redirect('aplikan');
	}

	public function validasi($no_pendaftaran)
	{
		$act = $this->tbl_pendaftar->validasi($no_pendaftaran);

		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data aplikan telah tervalidasi.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data aplikan gagal divalidasi.');
		}
		redirect('aplikan');
	}
}
?>