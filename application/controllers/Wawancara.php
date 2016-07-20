<?php
/**
* 
*/
class Wawancara extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function pewawancara()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Akses Pewawancara';
		$data['konten'] = 'admin/pewawancara';

		$data['id'] = $this->tbl_pewawancara->create_id('pewawancara', 'id_pewawancara');
		$data['pewawancara'] = $this->tbl_pewawancara->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah_pewawancara()
	{
		$id 			= $this->input->post('id');
		$nama 			= $this->input->post('nama');
		$password 		= $this->input->post('password');
		$keterangan		= $this->input->post('keterangan');

		$query = $this->tbl_pewawancara->add($id, $nama, $password, $keterangan);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pewawancara telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pewawancara gagal disimpan.');
		}
		redirect('wawancara/pewawancara');
	}

	public function ubah_pewawancara()
	{
		$id 		= $this->input->post('id-u');
		$nama 		= $this->input->post('nama-u');
		$password	= $this->input->post('password-u');
		$keterangan	= $this->input->post('keterangan-u');

		$query = $this->tbl_pewawancara->edit($id, $nama, $password, $keterangan);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pewawancara telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pewawancara gagal diubah.');
		}
		redirect('wawancara/pewawancara');
	}

	public function hapus_pewawancara($id)
	{
		$cek = $this->tbl_tes_wawancara->get_total(array('tes_wawancara.ID_PEWAWANCARA'=>$id));
		if (count($cek))
		{
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pewawancara gagal dihapus, cek data yang terkait.');
		}else{
			$query = $this->tbl_pewawancara->remove($id);
			if ($query > 0) {
				$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pewawancara telah dihapus.');
			} else {
				$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pewawancara gagal dihapus.');
			}
		}
		redirect('wawancara/pewawancara');
	}

	public function kriteria()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Kriteria Wawancara';
		$data['konten'] = 'admin/kriteria_wawancara';

		$data['id'] = $this->security_check->gen_ai_id('kriteria_wawancara', 'id_kriteria');
		$data['kriteria'] = $this->tbl_kriteria_wawancara->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah_kriteria()
	{
		$id 			= $this->input->post('id');
		$nama 			= $this->input->post('nama');

		$query = $this->tbl_kriteria_wawancara->add($id, $nama);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data kriteria wawancara telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data kriteria wawancara gagal disimpan.');
		}
		redirect('wawancara/kriteria');
	}

	public function ubah_kriteria()
	{
		$id 		= $this->input->post('id-u');
		$nama 		= $this->input->post('nama-u');

		$query = $this->tbl_kriteria_wawancara->edit($id, $nama);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data kriteria wawancara telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data kriteria wawancara gagal diubah.');
		}
		redirect('wawancara/kriteria');
	}

	public function hapus_kriteria($id)
	{
		$cek =  $this->tbl_detail_tes_wawancara->join_kriteria(array('detil_tes_wawancara.ID_KRITERIA'=>$id));
		if (count($cek) > 0)
		{
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data kriteria wawancara gagal dihapus, cek data yang terkait.');
		}else{
			$query = $this->tbl_kriteria_wawancara->remove($id);
			if ($query > 0) {
				$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data kriteria wawancara telah dihapus.');
			} else {
				$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data kriteria wawancara gagal dihapus.');
			}
		}

		redirect('wawancara/kriteria');
	}
}
?>