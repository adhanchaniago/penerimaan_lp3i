<?php  
/**
* 
*/
class Jurusan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Master Jurusan';
		$data['konten'] = 'admin/jurusan';

		$data['id'] = $this->security_check->gen_ai_id('jurusan', 'id_jurusan');
		$data['jurusan'] = $this->m_jurusan->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$keterangan	= $this->input->post('keterangan');

		$query = $this->m_jurusan->add($id, $nama, $keterangan);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jurusan telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jurusan gagal disimpan.');
		}
		redirect('jurusan');
	}

	public function ubah()
	{
		$id 		= $this->input->post('id-u');
		$nama 		= $this->input->post('nama-u');
		$keterangan	= $this->input->post('keterangan-u');

		$query = $this->m_jurusan->edit($id, $nama, $keterangan);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jurusan telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jurusan gagal diubah.');
		}
		redirect('jurusan');
	}

	public function hapus($id)
	{
		$query = $this->m_jurusan->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jurusan telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jurusan gagal dihapus.');
		}
		redirect('jurusan');
	}
}
?>