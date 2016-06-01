<?php  
/**
* 
*/
class Jadwal extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = "Penjadwalan Tes";
		$data['konten'] = "admin/jadwal_tes";

		$data['jadwal'] = $this->tbl_jadwal_tes->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function new()
	{
		$id = $this->security_check->gen_ai_id('jadwal_tes', 'id');
		$tahap = $this->input->post('tahap');
		$tanggal = $this->input->post('tanggal');
		$tempat = $this->input->post('tempat');
		$ruang = $this->input->post('ruang');

		$act = $this->tbl_jadwal_tes->add($id, $tahap, $tanggal, $tempat, $ruang);
		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal tes telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal tes gagal disimpan.');
		}
		redirect('jadwal');
	}

	public function patch()
	{
		$id = $this->input->post('id');
		$tahap = $this->input->post('tahap');
		$tanggal = $this->input->post('tanggal');
		$tempat = $this->input->post('tempat');
		$ruang = $this->input->post('ruang');

		$act = $this->tbl_jadwal_tes->edit($id, $tahap, $tanggal, $tempat, $ruang);
		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal tes telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal tes gagal diubah.');
		}
		redirect('jadwal');
	}

	public function delete($id)
	{
		$act = $this->tbl_jadwal_tes->remove($id);
		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Jadwal tes telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Jadwal tes gagal dihapus.');
		}
		redirect('jadwal');
	}

	public function participant($id)
	{
		$this->security_check->admin_check();
		$data['judul'] = "Peserta Tes";
		$data['konten'] = "admin/peserta_tes";

		$data['jadwal'] = $this->tbl_jadwal_tes->get_id($id)[0];
		$data['peserta'] = $this->tbl_peserta->custom_where("(peserta.total_nilai = 0 or peserta.total_nilai is null) and (jadwal_tes.tahap = '".$data['jadwal']->TAHAP."' or jadwal_tes.tahap is null)");

		$this->load->view('admin/layout', $data);
	}

	public function participant_patch()
	{
		$jadwal = $this->input->post("jadwal");
		$pendaftar = trim($this->input->post("pendaftar"));
		$no_pendaftar = explode(";", $pendaftar);

		var_dump($no_pendaftar);
	}
}
?>