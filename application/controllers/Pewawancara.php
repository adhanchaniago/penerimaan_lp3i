<?php
/**
* 
*/
class Pewawancara extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Akses Pewawancara';
		$data['konten'] = 'admin/pewawancara';

		$data['id'] = $this->tbl_pewawancara->create_id('pewawancara', 'id_pewawancara');
		$data['pewawancara'] = $this->tbl_pewawancara->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
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
		redirect('pewawancara');
	}

	public function ubah()
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
		redirect('pewawancara');
	}

	public function hapus($id)
	{
		$query = $this->tbl_pewawancara->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data pewawancara telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pewawancara gagal dihapus.');
		}
		redirect('pewawancara');
	}
}
?>