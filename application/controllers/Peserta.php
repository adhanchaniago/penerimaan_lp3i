<?php  
/**
* 
*/
class Peserta extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('peserta/beranda');
	}

	public function beranda()
	{
		$this->security_check->check();
		$data['judul'] 				= 'Halaman Peserta MABA LP3I';
		$data['konten'] 			= 'peserta/beranda';
		$no_pendaftaran 			= $this->session->userdata('no_pendaftaran');

		$tampil_akademik			= $this->tbl_peserta->join_pendaftar_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran,'jadwal_tes.TAHAP'=>'Akademik'));
		$data['tampil']['akademik']	= count($tampil_akademik)>0?$tampil_akademik[0]:null;
		$cek_akademik				= $this->tbl_peserta->join_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran,'jadwal_tes.TAHAP'=>'Akademik'));
		if (count($cek_akademik) >0) 
		{
			$data['jadwal']['akademik'] = $cek_akademik[0]->ID;
			$data['ujian']['akademik'] = $cek_akademik[0];
		}
		
		$tampil_bakat				= $this->tbl_peserta->join_pendaftar_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran,'jadwal_tes.TAHAP'=>'Minat bakat'));
		$data['tampil']['bakat']	= count($tampil_bakat)>0?$tampil_bakat[0]:null;
		$cek_bakat					= $this->tbl_peserta->join_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran,'jadwal_tes.TAHAP'=>'Minat bakat'));
		if (count($cek_bakat) >0)
		{
			$data['jadwal']['bakat'] = $cek_bakat[0]->ID;
			$data['ujian']['bakat'] = $cek_bakat[0];
		}

		$tampil_wawancara			= $this->tbl_peserta->join_pendaftar_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran,'jadwal_tes.TAHAP'=>'wawancara'));
		$data['tampil']['wawancara']= count($tampil_wawancara)>0?$tampil_wawancara[0]:null;
		$cek_wawancara				= $this->tbl_peserta->join_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran,'jadwal_tes.TAHAP'=>'wawancara'));
		if (count($cek_wawancara) >0)
		{
			$data['jadwal']['wawancara'] = $cek_wawancara[0]->ID;
			$data['ujian']['wawancara'] = $cek_wawancara[0];
		}

		$jadwal_tes 				= $this->tbl_jadwal_tes->get_where(array('jadwal_tes.TANGGAL >='=>date("Y-m-d"),'jadwal_tes.TAHAP'=> 'Wawancara'));
		if(count($jadwal_tes) > 0){
			$no_tes						= $jadwal_tes[0]->ID;
			$jadwal_wawancara 			= $this->tbl_peserta->join_pendaftar_jadwal(array('peserta.NO_PENDAFTARAN'=>$this->session->userdata('no_pendaftaran'),'peserta.ID'=>$no_tes));
			if (count($jadwal_wawancara) > 0) {
				$data['jadwal_wawancara'] = $jadwal_wawancara[0]; 	
			}else{
				$data['jadwal_wawancara'] = null;
			}
		} else {
			$data['jadwal_wawancara']	= null;
		}

		//cek upload bukti
		$data['bukti'] 					= $this->tbl_bukti->join_pendaftar(array('bukti_pembayaran.NO_PENDAFTARAN'=>$no_pendaftaran));
		$data['pendaftar']				= $this->tbl_pendaftar->get_id($no_pendaftaran);

		// info directory
		$files = directory_map("./assets/global/info/");
		$info_arr = array();
		if($files != null) {
			foreach ($files as $file) {
				// baca file
				$file_value = read_file("./assets/global/info/".$file);
				$arr_value = explode("|[]|", $file_value);
				if(count($arr_value) > 0) {
					$arr_file = array(
							"judul"	=> $arr_value[0],
							"tanggal" => $arr_value[1],
							"isi" => $arr_value[2],
							"filename" => $file
						);
					array_push($info_arr, $arr_file);
				}
			}
		} else {
			$arr_file = array(
					"judul"	=> "Informasi",
					"tanggal" => date("d/m/Y"),
					"isi" => "Tidak ada informasi untuk saat ini.",
					"filename" => null
				);
			array_push($info_arr, $arr_file);
		}
		$data['informasi'] = $info_arr;

		//cek hasil tes
		$status_hasil = false;

		//mengecek pada database
		$cek_h = $this->tbl_peserta->join_jadwal(array('peserta.NO_PENDAFTARAN'=>$no_pendaftaran));
		if (count($cek_h) > 0)
		{
			$status_hasil = true;
			foreach ($cek_h as $hasil) 
			{
				if ($hasil->TOTAL_NILAI == '' ||$hasil->TOTAL_NILAI == Null ||$hasil->TOTAL_NILAI == "0" )
				{
					$status_hasil = false;
				}
			}
			$data['hasil_tes'] 	= $status_hasil;
			$data['status_hasil'] = $this->tbl_peserta->get_id($no_pendaftaran,1)[0]->KETERANGAN;
			$data['total_nilai'] = $this->tbl_peserta->get_id($no_pendaftaran,1)[0]->KEPUTUSAN;
			$jurusan = $this->tbl_peserta->get_id($no_pendaftaran,2)[0]->KEPUTUSAN;
			$data['jurusan'] = $jurusan!="0"?$this->m_jurusan->get_id($jurusan)[0]->NAMA_JURUSAN:''; 
		}else{
			$data['hasil_tes'] 	= $status_hasil;
			$data['status_hasil'] = '';
			$data['total_nilai'] = '0';
			$data['jurusan'] = ''; 

		}

		//get bobot nilai
		$data ['bidang_akademik']	= $this->tbl_bidang_soal_akademik->get_all();
		$data ['total_akademik']	= count($this->tbl_tes_akademik->get_id($no_pendaftaran,1))>0?$this->tbl_tes_akademik->get_id($no_pendaftaran,1)[0]->TOTAL_NILAI:"0";
		
		$total_soal					= count($this->tbl_soal_akademik->get_all());
		$total_presentasi			= $this->tbl_bidang_soal_akademik->total_bobot();
		$data ['bobot_nilai']		= $total_presentasi/$total_soal;

		$data ['kriteria']			= $this->tbl_detail_tes_wawancara->join_kriteria(array('detil_tes_wawancara.NO_PENDAFTARAN' => $no_pendaftaran));
		$data ['total_wawancara']	= count($this->tbl_tes_wawancara->get_total(array('tes_wawancara.NO_PENDAFTARAN' => $no_pendaftaran)))>0?$this->tbl_tes_wawancara->get_total(array('tes_wawancara.NO_PENDAFTARAN' => $no_pendaftaran))[0]->TOTAL_NILAI:"0";

		$this->load->view('peserta/layout', $data);
	}	

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('page/login');
	}

	public function ujian($jenis,$no_tes=null)
	{
		$this->security_check->check();

		switch ($jenis) {
			case 'akademik':
				$data['judul'] 		= 'Ujian Akademik';
				$data['konten'] 	= 'peserta/akademik';
				$data['bidang'] 	= $this->tbl_bidang_soal_akademik->get_all();
				$data['akademik']	= $no_tes;

				$this->load->view('peserta/layout', $data);				
				break;
			case 'jawaban_akademik':
				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$soal 			= $this->input->post('soal');
				$no_tes			= $this->input->post('no_tes');

				$this->tbl_tes_akademik->add(array('NO_PENDAFTARAN'=>$no_pendaftaran,'ID'=>$no_tes,'TOTAL_NILAI'=>0,'KETERANGAN'=>null));
				foreach ($soal as $id_soal => $jawaban) {
					$data = array(
						'NO_PENDAFTARAN'	=> $no_pendaftaran,
						'ID'				=> $no_tes,
						'ID_SOAL'			=> $id_soal,
						'ID_JAWABAN'		=> $jawaban
					);
					$this->tbl_detail_tes_akademik->add($data);
				}

				$total_soal			= count($this->tbl_soal_akademik->get_all());
				$total_presentasi	= $this->tbl_bidang_soal_akademik->total_bobot();
				$bobot_nilai		= $total_presentasi/$total_soal;
				$soal_benar 		= count($this->tbl_detail_tes_akademik->benar($no_pendaftaran,$no_tes));
				$nilai 				= round($bobot_nilai*$soal_benar,1);
				$where 				= array('NO_PENDAFTARAN'=>$no_pendaftaran,'ID'=>$no_tes);
				$data 				= array('TOTAL_NILAI'=>$nilai);
				$this->tbl_tes_akademik->update($data,$where);//simpan ke tabel tes akademik
				$total_nilai 		= round(($nilai*70)/100);

				$cek_total_wawancara = $this->tbl_peserta->get_id($no_pendaftaran,3)[0]->TOTAL_NILAI;
				$jumlah_total_nilai  = $cek_total_wawancara + $total_nilai;

				if ($jumlah_total_nilai >= 65)
				{
					$keterangan = "DITERIMA";
				}else{
					$keterangan = "GAGAL";
				}

				$peserta_where		= array('NO_PENDAFTARAN' =>$no_pendaftaran,'ID'=>$no_tes);
				$peserta_update 	= array('TOTAL_NILAI' => $total_nilai, 'KETERANGAN' => $keterangan, 'KEPUTUSAN' => $jumlah_total_nilai);
				$this->tbl_peserta->update($peserta_update,$peserta_where);

				$w_where			= array('NO_PENDAFTARAN' =>$no_pendaftaran,'ID'=>3);
				$w_update 			= array('KETERANGAN' => $keterangan, 'KEPUTUSAN' => $jumlah_total_nilai);
				$this->tbl_peserta->update($w_update,$w_where);

				redirect('peserta/beranda');
				break;
 			case 'bakat':
 				$data['judul'] 		= 'Ujian Minat Bakat';
				$data['konten'] 	= 'peserta/bakat';
				$data['soal'] 		= $this->tbl_soal_minat_bakat->get_all();
				$data['bakat']		= $no_tes;

				$this->load->view('peserta/layout', $data);
 				break;
 			case 'jawaban_bakat':
 				$no_pendaftaran = $this->session->userdata('no_pendaftaran');
				$soal 			= $this->input->post('soal');
				$no_tes			= $this->input->post('no_tes');

				$this->tbl_tes_minat_bakat->add(array('NO_PENDAFTARAN'=>$no_pendaftaran, 'ID'=>$no_tes, 'KARAKTER_DOMINAN'=>null, 'KARAKTER_SEKUNDER'=>null, 'KETERANGAN'=>null));
				foreach ($soal as $id_soal => $jawaban) {
					$data = array(
							'NO_PENDAFTARAN'	=> $no_pendaftaran,
							'ID'				=> $no_tes,
							'ID_SOAL'			=> $id_soal,
							'ID_JAWABAN'		=> $jawaban
						);
					$this->tbl_detail_tes_minat_bakat->add($data);
				}

				$hasil = array();
				$hasil['sanguin']=count($this->tbl_detail_tes_minat_bakat->join_jawaban(array(
						'NO_PENDAFTARAN' => $no_pendaftaran,
						'ID' => $no_tes,
						'jawaban_minat_bakat.KARAKTER' => 'Sanguin'
					)));
				$hasil['koleris']=count($this->tbl_detail_tes_minat_bakat->join_jawaban(array(
						'NO_PENDAFTARAN' => $no_pendaftaran,
						'ID' => $no_tes,
						'jawaban_minat_bakat.KARAKTER' => 'koleris'
					)));
				$hasil['melankolis']=count($this->tbl_detail_tes_minat_bakat->join_jawaban(array(
						'NO_PENDAFTARAN' => $no_pendaftaran,
						'ID' => $no_tes,
						'jawaban_minat_bakat.KARAKTER' => 'melankolis'
					)));
				$hasil['phlegmatis']=count($this->tbl_detail_tes_minat_bakat->join_jawaban(array(
						'NO_PENDAFTARAN' => $no_pendaftaran,
						'ID' => $no_tes,
						'jawaban_minat_bakat.KARAKTER' => 'Phlegmatis'
					)));
				arsort($hasil);
				$i = 1;
				$karakter=array();
				foreach ($hasil as $key => $value) {
					if ($i < 3) {
						$karakter[$i]=$key;
						$i++;
					}
				}

				$data_update = array(
						'KARAKTER_DOMINAN' 	=> $karakter[1],
						'KARAKTER_SEKUNDER' => $karakter[2]
					);
				$where_update = array(
						'NO_PENDAFTARAN' 	=> $no_pendaftaran,
						'ID'				=> $no_tes
					);
				$this->tbl_tes_minat_bakat->update($data_update,$where_update);

				$peserta_where		= array('NO_PENDAFTARAN' =>$no_pendaftaran,'ID'=>$no_tes);
				$peserta_update 	= array('TOTAL_NILAI' => 1);
				$this->tbl_peserta->update($peserta_update,$peserta_where);

				$jurusan_terpilih = 0;
				$pilihan_jurusan = $this->m_jurusan->get_pilihan($no_pendaftaran);
				foreach ($pilihan_jurusan as $jurusan) {
					$saran_karakter = explode(";", $jurusan->SARAN_KARAKTER);
					$cari = array_search($karakter[1], $saran_karakter);
					if(!$cari) {
						$jurusan_terpilih = $jurusan->ID_JURUSAN;
						break;
					}
				}
				$peserta_update 	= array('KEPUTUSAN' => $jurusan_terpilih);
				$this->tbl_peserta->update($peserta_update,$peserta_where);

				redirect('peserta/beranda');
 				break;
			default:
				redirect('peserta');
				break;
		}
	}
}
