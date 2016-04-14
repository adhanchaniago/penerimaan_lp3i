<?php
/**
* 
*/
class Soal_Minat_Bakat extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Soal Minat Bakat';
		$data['konten'] = 'admin/soal_minat_bakat';

		$data['id'] = $this->security_check->gen_ai_id('soal_minat_bakat', 'id_soal');
		$data['soal_minat_bakat'] = $this->tbl_soal_minat_bakat->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
	{
		// soal
		$id 			= $this->input->post('id');
		$teks 			= $this->input->post('teks');

		$query = $this->tbl_soal_minat_bakat->add($id, $teks);
		if ($query > 0) {
			// jawaban
			for($i = 1; $i<=4; $i++) {
				$id_jawaban	= $this->security_check->gen_ai_id('jawaban_minat_bakat', 'id_jawaban');
				$jawaban	= $this->input->post('jawaban'.$i);
				$karakter	= $this->input->post('karakter'.$i);
				
				$this->tbl_jawaban_minat_bakat->add($id_jawaban, $id, $jawaban, $karakter);
			}

			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Soal minat bakat telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal minat bakat gagal disimpan.');
		}
		redirect('soal_minat_bakat');
	}

	public function ubah()
	{
		// soal
		$id 		= $this->input->post('id-u');
		$teks		= $this->input->post('teks-u');

		$query = $this->tbl_soal_minat_bakat->edit($id, $teks);
		if ($query > 0) {
			// jawaban
			for($i = 1; $i<=4; $i++) {
				$id_jawaban	= $this->input->post('idjawaban-u'.$i);
				$jawaban	= $this->input->post('jawaban-u'.$i);
				$karakter	= $this->input->post('karakter-u'.$i);
				
				$this->tbl_jawaban_minat_bakat->edit($id_jawaban, $id, $jawaban, $karakter);
			}

			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Soal minat bakat telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal minat bakat gagal diubah.');
		}
		redirect('soal_minat_bakat');
	}

	public function get_detil()
	{
		$id_soal	= $this->input->post('id_soal');
		$soal 		= $this->tbl_soal_minat_bakat->get_id($id_soal);
		$jawaban 	= $this->tbl_jawaban_minat_bakat->get_soal($id_soal);
		$arr_detil	= array(
			'SOAL' 		=> $soal,
			'JAWABAN'	=> $jawaban,
			);
		header('Content-Type: application/json');
		echo json_encode($arr_detil);
	}

	public function hapus($id)
	{
		$query = $this->tbl_soal_minat_bakat->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Soal minat bakat telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal minat bakat gagal dihapus.');
		}
		redirect('soal_minat_bakat');
	}
}
?>