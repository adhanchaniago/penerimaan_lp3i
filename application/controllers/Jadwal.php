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
		redirect('jadwal');
	}

	public function participant($id)
	{
		$this->security_check->admin_check();
		$data['judul'] = "Peserta Tes";
		$data['konten'] = "admin/peserta_tes";

		$data['jadwal'] = $this->tbl_jadwal_tes->get_id($id)[0];
		
		//mendapatkan peserta dengan id valid dan terdaftar pada tahap tersebut
		$terdaftar = $this->tbl_peserta->get_where(array('ID'=>$id))->result();
		// echo "<pre>";
		// print_r($terdaftar);
		// echo "</pre>";
		$peserta_terdaftar = '';
		if (count($terdaftar) > 0) {
			foreach ($terdaftar as $peserta) {
				$peserta_terdaftar .= $peserta->NO_PENDAFTARAN.',';
			}
			$peserta_terdaftar = substr_replace($peserta_terdaftar, '', -1,1);
			$data['pendaftar'] =  $this->tbl_pendaftar->get_peserta($peserta_terdaftar);
		}else{
			$data['pendaftar'] = $this->tbl_pendaftar->custom_where(array('VALID'=>1));
		}

		$data['peserta'] = $this->tbl_peserta->join_pendaftar(array('ID' => $id));

		$this->load->view('admin/layout', $data);
	}

	public function participant_patch()
	{
		$jadwal 		= $this->input->post("jadwal");
		$no_pendaftar 	= $this->input->post("pendaftar");

		$query = 0;
		foreach ($no_pendaftar as $key => $no_pendaftaran)
		{
			$cek = $this->tbl_peserta->get_where(array('ID'=>$jadwal,'NO_PENDAFTARAN'=>$no_pendaftaran))->num_rows();
			if ($cek == 0) {
				$query = $this->tbl_peserta->add($jadwal, $no_pendaftaran, '', '', '', '');
			}
		}
		switch ($jadwal) {
			case '1':
				$tahap = 'Akademik';
				break;
			case '2':
				$tahap = 'Minat bakat';
				break;
			case '3':
				$tahap = 'Wawancara';
				break;
			default:
				$tahap = 'Akademik';
				break;
		}
		if ($query > 0) {
			$this->session->set_flashdata('pesan','input jadwal peserta ujian '.$tahap.' berhasil disimpan.');
		}else{
			$this->session->set_flashdata('pesan','input jadwal peserta ujian '.$tahap.' gagal disimpan, cek data yang sudah ada!');
		}
		redirect('jadwal/participant/'.$jadwal);
	}

	public function participant_del($no,$id)
	{
		$this->tbl_peserta->remove($id,$no);
		redirect('jadwal/participant/'.$id);	
	}

	public function brodcast($id)
	{
		$brodcast = $this->tbl_peserta->join_full(array('peserta.ID' => $id));
		foreach ($brodcast as $b)
		{
			$nomer = $b->NO_HANDPHONE;
			$pesan = 'Pemberitahuan ! pelaksanaan ujian '.$b->TAHAP.' dilaksanakan pada tanggal '.date("d/m/Y",strtotime($b->TANGGAL)).' bertempat di '.$b->TEMPAT.' pada Ruang '.$b->RUANG;
			$this->tbl_sms->outbox($nomer,$pesan);
		}
		$this->session->set_flashdata('pesan','<b>Berhasil! </b>Data telah berhasil di brodcast ke seluruh peserta pada tahap tersebut');
		redirect('jadwal');	
	}

}
?>