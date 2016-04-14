<?php
/**
* 
*/
class Bidang_Soal extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Bidang Soal Akademik';
		$data['konten'] = 'admin/bidang_soal';

		$data['id'] = $this->security_check->gen_ai_id('bidang_soal_akademik', 'id_bidang_soal');
		$data['bidang_soal_akademik'] = $this->tbl_bidang_soal_akademik->get_all();
		$data['total_bobot'] = $this->tbl_bidang_soal_akademik->total_bobot();
		$data['max_bobot'] = 100 - $data['total_bobot'];

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
	{
		$id 			= $this->input->post('id');
		$nama 			= $this->input->post('nama');
		$bobot 		= $this->input->post('bobot');

		$query = $this->tbl_bidang_soal_akademik->add($id, $nama, $bobot);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data bidang soal akademik telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data bidang soal akademik gagal disimpan.');
		}
		redirect('bidang_soal');
	}

	public function ubah()
	{
		$id 		= $this->input->post('id-u');
		$nama 		= $this->input->post('nama-u');
		$bobot		= $this->input->post('bobot-u');

		$query = $this->tbl_bidang_soal_akademik->edit($id, $nama, $bobot);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data bidang soal akademik telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data bidang soal akademik gagal diubah.');
		}
		redirect('bidang_soal');
	}

	public function hapus($id)
	{
		$query = $this->tbl_bidang_soal_akademik->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data bidang soal akademik telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data bidang soal akademik gagal dihapus.');
		}
		redirect('bidang_soal');
	}
}
?>