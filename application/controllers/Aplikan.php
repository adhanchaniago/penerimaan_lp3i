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

	public function validasi()
	{
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$act = $this->tbl_pendaftar->validasi($no_pendaftaran);

		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data aplikan telah tervalidasi.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data aplikan gagal divalidasi.');
		}
		redirect('aplikan');
	}

	public function get_bukti()
	{
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$buktis = $this->tbl_bukti->join_pendaftar(array('bukti_pembayaran.no_pendaftaran' => $no_pendaftaran));
		if(count($buktis) > 0) {
			echo "<ol>";
			foreach ($buktis as $bukti) {
				echo "<li><a href='".base_url()."assets/global/img/bukti/".$bukti->FILENAME."' target='_blank'>"
					.date('d-m-Y', strtotime($bukti->TANGGAL_UPLOAD))."&nbsp;".$bukti->KETERANGAN."</a></li>";
			}
			echo "</ol><br><span style='font-size: 9pt;'>&nbsp;*) Klik untuk melihat.</span>";
		} else {
			echo "<div style='display: block;width: 100%;text-align: center;'>
				<strong>Aplikan belum mengupload bukti transfer biaya pendaftaran.</strong>
				</div>";
		}
	}
}
?>