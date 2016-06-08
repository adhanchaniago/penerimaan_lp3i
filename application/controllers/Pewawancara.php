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
		redirect('pewawancara/beranda');
	}

	public function beranda()
	{
		$this->security_check->check_pewawancara();
		$data['judul'] 		= 'Halaman Pewawancara';
		$data['konten'] 	= 'pewawancara/beranda';
		$data['peserta'] 	= $this->tbl_peserta->join_pendaftar_jadwal(array('jadwal_tes.TAHAP' => 'Wawancara'));
		$data['no_tes']		= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->ID;
		$data['tanggal_tes']= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->TANGGAL;
		$data['pewawancara']= $this->session->userdata('id_pewawancara');

		$this->load->view('pewawancara/layout', $data);
	}

	public function tes($no_pendaftaran)
	{
		$this->security_check->check_pewawancara();
		$tgl_ujian 			= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->TANGGAL;
		$this->security_check->check_tanggal_ujian($tgl_ujian);
		$data['judul'] 		= 'Tes Peserta Wawancara';
		$data['konten'] 	= 'pewawancara/tes';
		$data['peserta']	= $this->tbl_pendaftar->get_id($no_pendaftaran)[0];
		$data['kriteria']	= $this->tbl_kriteria_wawancara->get_all();

		$this->load->view('pewawancara/layout', $data);
	}

	public function edit_tes($no_pendaftaran)
	{
		$this->security_check->check_pewawancara();
		$tgl_ujian 			= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->TANGGAL;
		$this->security_check->check_tanggal_ujian($tgl_ujian);
		$data['judul'] 				= 'Edit Tes Peserta Wawancara';
		$data['konten'] 			= 'pewawancara/edit_tes';
		$no_tes						= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->ID;
		$data['id_pewawancara'] 	= $this->session->userdata('id_pewawancara');
		$data['peserta']			= $this->tbl_pendaftar->get_id($no_pendaftaran)[0];
		$data['kriteria']			= $this->tbl_detail_tes_wawancara->get_kriteria($no_pendaftaran,$no_tes);


		$this->load->view('pewawancara/layout', $data);
	}	

	public function pewawancara_act($action)
	{
		switch ($action) {
			case 'simpan':
				$kriteria 		= $this->input->post('kriteria');
				$no_pendaftaran = $this->input->post('pendaftar');
				$no_tes			= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->ID;
				$id_pewawancara	= $this->session->userdata('id_pewawancara');
				$tanggal_tes 	= date("Y-m-d");
				$nilai_total 	= array_sum($kriteria);
				$keterangan 	= $this->input->post('keterangan');

				if ($nilai_total <= 100 )
				{
					$this->tbl_tes_wawancara->add($no_pendaftaran,$no_tes,$id_pewawancara,$tanggal_tes,$nilai_total,$keterangan);
					foreach ($kriteria as $key => $skor)
					{
						$this->tbl_detail_tes_wawancara->add($no_pendaftaran,$no_tes,$key,$skor);
					}
				}else{
					$this->session->set_flashdata('notif_error','Maaf nilai tidak boleh lebih dari <b>100</b>, cek kembali masing - masing kriteria.');
					redirect('pewawancara/tes/'.$no_tes);
				}
				$this->session->set_flashdata('pesan','Data berhasil di simpan dengan total nilai : <b>'.$nilai_total.'</b> .');
				redirect('pewawancara');
				break;

			case 'update':
				$kriteria 		= $this->input->post('kriteria');
				$no_pendaftaran = $this->input->post('pendaftar');
				$no_tes			= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'))[0]->ID;
				$id_pewawancara	= $this->session->userdata('id_pewawancara');
				$tanggal_tes 	= date("Y-m-d");
				$nilai_total 	= array_sum($kriteria);
				$keterangan 	= $this->input->post('keterangan');

				if ($nilai_total <= 100 )
				{
					$this->tbl_tes_wawancara->update($no_pendaftaran,$no_tes,$id_pewawancara,$tanggal_tes,$nilai_total,$keterangan);
					foreach ($kriteria as $key => $skor)
					{
						$this->tbl_detail_tes_wawancara->update($no_pendaftaran,$no_tes,$key,$skor);
					}
				}else{
					$this->session->set_flashdata('notif_error','Maaf nilai tidak boleh lebih dari <b>100</b>, cek kembali masing - masing kriteria.');
					redirect('pewawancara/edit_tes/'.$no_tes);
				}
				$this->session->set_flashdata('pesan','Data berhasil di simpan dengan total nilai : <b>'.$nilai_total.'</b> .');
				redirect('pewawancara');
				break;
			default:
				redirect('pewawancara');
				break;
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
