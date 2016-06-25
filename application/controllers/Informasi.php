<?php
/**
* 
*/
class Informasi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul'] = "Informasi PMB - LP3I Surabaya";
		$data['konten'] = "info/informasi_umum";

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

		$this->load->view('registrasi/layout', $data);
	}

	public function admin()
	{
		$data['judul'] = "Atur Informasi PMB - LP3I Surabaya";
		$data['konten'] = "admin/info_admin";

		// info directory
		$files = directory_map("./assets/global/info/");
		$info_arr = array();
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
		$data['informasi'] = $info_arr;

		$this->load->view("admin/layout", $data);
	}

	public function tambah()
	{
		$filename = date("d_m_Y_h_i_sa").".info";
		$tanggal = date("d M Y");
		$judul = $this->input->post("judul");
		$isi = $this->input->post("informasi");

		$strInfo = $judul."|[]|".$tanggal."|[]|".$isi;

		if(write_file("./assets/global/info/".$filename, $strInfo)) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Informasi telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Informasi gagal disimpan.');
		}

		redirect('informasi/admin');
	}

	public function hapus($filename)
	{
		unlink("./assets/global/info/".$filename);

		redirect('informasi/admin');
	}

	public function ubah()
	{
		$filename = $this->input->post("filename-u");
		$tanggal = $this->input->post("tanggal-u");
		$judul = $this->input->post("judul-u");
		$isi = $this->input->post("informasi-u");

		$strInfo = $judul."|[]|".$tanggal."|[]|".$isi;

		if(write_file("./assets/global/info/".$filename, $strInfo)) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Informasi telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Informasi gagal disimpan.');
		}

		redirect('informasi/admin');
	}
}
?>