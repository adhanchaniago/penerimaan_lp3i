<?php
/**
* 
*/
class Soal_Akademik extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola, Soal Akademik';
		$data['konten'] = 'admin/soal_akademik_view';

		$data['bidang_soal'] = $this->tbl_bidang_soal_akademik->get_all();
		$this->load->view('admin/layout', $data);
	}
	
	public function view()
	{
		$this->security_check->admin_check();
		$bidang_soal = $this->input->post('bidang_soal');
		if ($bidang_soal == 'all')
		{
			$data['id'] = $this->security_check->gen_ai_id('soal_akademik', 'id_soal');
			$data['bidang_soal'] = $this->tbl_bidang_soal_akademik->get_all();
			$data['soal_akademik'] = $this->tbl_soal_akademik->get_all();
		}else{

			$data['id'] = $this->security_check->gen_ai_id('soal_akademik', 'id_soal');
			$data['bidang_soal'] = $this->tbl_bidang_soal_akademik->get_id($bidang_soal);
			$data['soal_akademik'] = $this->tbl_soal_akademik->get_by_bidang($bidang_soal);
		}

		$data['judul'] = 'Kelola Soal Akademik';
		$data['konten'] = 'admin/soal_akademik';


		$this->load->view('admin/layout', $data);
	}

	private function do_upload_images($inputname, $id_soal) {
		$this->load->library('upload');

	    $files = $_FILES;

	    $cpt = count ($_FILES [$inputname] ['name']);
	    for($i = 0; $i < $cpt; $i ++) {

	        $_FILES [$inputname] ['name'] = $files [$inputname] ['name'] [$i];
	        $_FILES [$inputname] ['type'] = $files [$inputname] ['type'] [$i];
	        $_FILES [$inputname] ['tmp_name'] = $files [$inputname] ['tmp_name'] [$i];
	        $_FILES [$inputname] ['error'] = $files [$inputname] ['error'] [$i];
	        $_FILES [$inputname] ['size'] = $files [$inputname] ['size'] [$i];

	        $config = array ();
		    $config ['upload_path'] = './assets/global/img/soal/';
		    $config ['allowed_types'] = 'bmp|jpg|png';
		    $config ['overwrite']	= TRUE;
	        $this->upload->initialize($config);
	        $this->upload->do_upload($inputname);

	        // insert to db
	        $id_gambar = $this->security_check->gen_ai_id('gambar_akademik', 'id');
	        $this->tbl_gambar_akademik->add($id_gambar, $id_soal, $_FILES[$inputname]['name'], $config['upload_path']);
	    }
	}

	public function tambah()
	{
		// soal
		$id 			= $this->input->post('id');
		$bidang 		= $this->input->post('bidang');
		$teks 			= $this->input->post('teks');

		$benar			= $this->input->post('benar');
		$idx_benar		= 0;
		switch ($benar) {
			case 'a': $idx_benar = 1; break;
			case 'b': $idx_benar = 2; break;
			case 'c': $idx_benar = 3; break;
			case 'd': $idx_benar = 4; break;
		}

		$query = $this->tbl_soal_akademik->add($id, $bidang, $teks);
		if ($query > 0) {
			// jawaban
			for($i = 1; $i<=4; $i++) {
				$id_jawaban	= $this->security_check->gen_ai_id('jawaban_akademik', 'id_jawaban');
				$jawaban	= $this->input->post('jawaban'.$i);
				$nilai		= $idx_benar == $i?1:0;
				
				$this->tbl_jawaban_akademik->add($id_jawaban, $id, $jawaban, $nilai);
			}

			// upload gambar 
			$this->do_upload_images('gambar', $id);

			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Soal akademik telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal akademik gagal disimpan.');
		}
		redirect('soal_akademik');
	}

	public function ubah()
	{
		// soal
		$id 		= $this->input->post('id-u');
		$bidang 	= $this->input->post('bidang-u');
		$teks		= $this->input->post('teks-u');

		$benar			= $this->input->post('benar-u');
		$idx_benar		= 0;
		switch ($benar) {
			case 'a': $idx_benar = 1; break;
			case 'b': $idx_benar = 2; break;
			case 'c': $idx_benar = 3; break;
			case 'd': $idx_benar = 4; break;
		}

		$query = $this->tbl_soal_akademik->edit($id, $bidang, $teks);
		if ($query > 0) {
			// jawaban
			for($i = 1; $i<=4; $i++) {
				$id_jawaban	= $this->input->post('idjawaban-u'.$i);
				$jawaban	= $this->input->post('jawaban-u'.$i);
				$nilai		= $idx_benar == $i?1:0;
				
				$this->tbl_jawaban_akademik->edit($id_jawaban, $id, $jawaban, $nilai);
			}

			// upload gambar 
			$this->do_upload_images('gambar-u', $id);

			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Soal akademik telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal akademik gagal diubah.');
		}
		redirect('soal_akademik');
	}

	public function get_detil()
	{
		$id_soal	= $this->input->post('id_soal');
		$soal 		= $this->tbl_soal_akademik->get_id($id_soal);
		$jawaban 	= $this->tbl_jawaban_akademik->get_soal($id_soal);
		$gambar		= $this->tbl_gambar_akademik->get_soal($id_soal);
		$arr_detil	= array(
			'SOAL' 		=> $soal,
			'JAWABAN'	=> $jawaban,
			'GAMBAR'	=> $gambar,
			);
		header('Content-Type: application/json');
		echo json_encode($arr_detil);
	}

	public function hapus($id)
	{
		$cek = $this->tbl_detail_tes_akademik->join_all(array('detil_tes_akademik.ID_SOAL'=>$id));
		if (count($cek) > 0)
		{
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal akademik gagal dihapus, cek data yang terkait.');
		}else{
			$query = $this->tbl_soal_akademik->remove($id);
			if ($query > 0) {
				$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Soal akademik telah dihapus.');
			} else {
				$this->session->set_flashdata('pesan', '<b>Gagal!</b> Soal akademik gagal dihapus.');
			}
		}
		redirect('soal_akademik');
	}

	public function hapus_gambar($id)
	{
		$query = $this->tbl_gambar_akademik->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Gambar bantuan soal akademik telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Gambar bantuan akademik gagal dihapus.');
		}
		redirect('soal_akademik'); 
	}

	public function hapus_gambar_soal($soal)
	{
		$query = $this->tbl_gambar_akademik->remove_soal($soal);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Gambar bantuan soal akademik telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Gambar bantuan akademik gagal dihapus.');
		}
		redirect('soal_akademik'); 
	}
}
?>