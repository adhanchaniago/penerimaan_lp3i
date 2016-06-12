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
		$data['judul'] 	= "Penjadwalan Tes";
		$data['konten'] = "admin/jadwal_tes";

		$data['jadwal'] = $this->tbl_jadwal_tes->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function baru()
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
		$id = $this->input->post('id-u');
		$tahap = $this->input->post('tahap-u');
		$tanggal = $this->input->post('tanggal-u');
		$tempat = $this->input->post('tempat-u');
		$ruang = $this->input->post('ruang-u');

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
		// redirect('jadwal');
	}

	public function participant($id)
	{
		$this->security_check->admin_check();
		$data['judul'] = "Peserta Tes";
		$data['konten'] = "admin/peserta_tes";

		$data['jadwal'] = $this->tbl_jadwal_tes->get_id($id)[0];
		$data['peserta'] = $this->tbl_peserta->custom_where("(peserta.total_nilai = 0 or peserta.total_nilai is null) 
			AND (jadwal_tes.tahap = '".$data['jadwal']->TAHAP."' or jadwal_tes.tahap is null) 
			AND (pendaftar.NO_PENDAFTARAN NOT IN (select distinct NO_PENDAFTARAN from peserta where ID <> '".$data['jadwal']->ID."'))");

		$this->load->view('admin/layout', $data);
	}

	public function participant_patch()
	{
		$jadwal 		= $this->input->post("jadwal");
		$no_pendaftar 	= $this->input->post("pendaftar");

		// cek yang tidak terpilih
		$not_in = $this->tbl_peserta->where_not_in("pendaftar.NO_PENDAFTARAN", $no_pendaftar);
		if(count($not_in) > 0) {
			foreach ($not_in as $applicant) {
				if($applicant->TOTAL_NILAI == 0 || $applicant->TOTAL_NILAI == null) {
					$this->tbl_peserta->remove($jadwal, $applicant->NO_PENDAFTARAN);
				}
			}
		}

		// peserta yang terpilih
		$query = 0;
		foreach ($no_pendaftar as $key => $no_pendaftaran)
		{
			$cek = $this->tbl_peserta->get_where(array('ID'=>$jadwal,'NO_PENDAFTARAN'=>$no_pendaftaran))->num_rows();
			if ($cek == 0) {
				$query = $this->tbl_peserta->add($jadwal, $no_pendaftaran, '', '', '', '');
			}
		}

		if ($query > 0) {
			$this->session->set_flashdata('pesan','input jadwal peserta ujian Akademik berhasil disimpan.');
		}else{
			$this->session->set_flashdata('pesan','input jadwal peserta ujian Akademik gagal disimpan, cek data yang sudah ada!');
		}
		redirect('jadwal');
	}

}
?>