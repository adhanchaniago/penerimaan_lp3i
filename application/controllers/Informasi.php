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
		foreach ($files as $file) {
			// baca file
			$file_value = read_file("./assets/global/info/".$file);
			$file_info = get_file_info("./assets/global/info/".$file);
			$arr_file = array(
					"value" => $file_value,
					"size" => ceil($file_info['size'] / 1024),
					"date" => $file_info['date']
				);
			array_push($info_arr, $arr_file);
		}
		$data['informasi'] = $info_arr;

		$this->load->view('registrasi/layout', $data);
	}
}
?>