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
		$data['judul'] = 'Kelola Data Jurusan';
		$data['konten'] = 'admin/jurusan';

		$data['id'] = $this->security_check->gen_ai_id('jurusan', 'id_jurusan');
		$data['jurusan'] = $this->m_jurusan->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
	{
		$id 						= $this->input->post('id');
		$nama 						= $this->input->post('nama');
		$keterangan					= $this->input->post('keterangan');
		
		$checkKarakterSanguins		= $this->input->post('checkKarakterSanguins');
		$checkKarakterKoleris		= $this->input->post('checkKarakterKoleris');
		$checkKarakterMelankolis	= $this->input->post('checkKarakterMelankolis');	
		$checkKarakterPhlegmatis	= $this->input->post('checkKarakterPhlegmatis');
		$saran						= $checkKarakterSanguins.$checkKarakterKoleris.$checkKarakterMelankolis.$checkKarakterPhlegmatis;

		$query = $this->m_jurusan->add($id, $nama, $saran, $keterangan);
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

		$checkKarakterSanguins		= $this->input->post('checkKarakterSanguins-u');
		$checkKarakterKoleris		= $this->input->post('checkKarakterKoleris-u');
		$checkKarakterMelankolis	= $this->input->post('checkKarakterMelankolis-u');	
		$checkKarakterPhlegmatis	= $this->input->post('checkKarakterPhlegmatis-u');
		$saran						= $checkKarakterSanguins.$checkKarakterKoleris.$checkKarakterMelankolis.$checkKarakterPhlegmatis;

		$query = $this->m_jurusan->edit($id, $nama, $saran, $keterangan);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jurusan telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jurusan gagal diubah.');
		}
		redirect('jurusan');
	}

	public function hapus($id)
	{
		//mengecek apakah id tersebut di gunakan pada tabel lain
		$cek = $this->tbl_pilihan->get_by_jurusan($id);
		if (count($cek) > 0)
		{
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jurusan gagal dihapus, cek data yang bersangkutan.');
			redirect('jurusan');
		}else{
			$query = $this->m_jurusan->remove($id);
			if ($query > 0) {
				$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data jurusan telah dihapus.');
			} else {
				$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data jurusan gagal dihapus.');
			}
		}
		redirect('jurusan');
	}
}
?>