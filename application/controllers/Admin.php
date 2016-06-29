<?php  
/**
* 
*/
class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$data['judul'] = 'Login Administrator';
		
		$this->load->view('admin/login', $data);
	}

	public function login_auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek_admin 			= count($this->user_admin->get_id($username));
		$cek_pewawancara 	= count($this->tbl_pewawancara->get_id($username));

		if ($cek_admin > 0)
		{
			$admin = $this->user_admin->auth($username, $password);

			if (count($admin) > 0) {
				$admin_sess = $this->user_admin->get_id($admin[0]->ID_ADMIN);
				$session_data = array(
					'id_admin' 		=> $admin_sess[0]->ID_ADMIN,
					'nama_admin' 	=> $admin_sess[0]->NAMA_ADMIN,
					'pass_admin' 	=> $admin_sess[0]->PASS_ADMIN,
					'role_admin' 	=> $admin_sess[0]->ROLE_ADMIN
				);
				$this->session->set_userdata($session_data);
				redirect('admin/beranda');
			} else {
				$this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Mohon periksa Password yang Anda masukkan.');
				redirect('admin/login');
			}
		}
		else if ($cek_pewawancara > 0)
		{
			$pewawancara = $this->tbl_pewawancara->auth($username, $password);

			if (count($pewawancara) > 0) {
				$pewawancara_sess = $this->tbl_pewawancara->get_id($pewawancara[0]->ID_PEWAWANCARA);
				$session_data = array(
					'id_pewawancara' 		=> $pewawancara_sess[0]->ID_PEWAWANCARA,
					'nama_pewawancara' 		=> $pewawancara_sess[0]->NAMA,
					'pass_pewawancara' 		=> $pewawancara_sess[0]->PASSWORD,
					'role_pewawancara' 		=> $pewawancara_sess[0]->KETERANGAN
				);
				$this->session->set_userdata($session_data);
				redirect('pewawancara/beranda');
			} else {
				$this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Mohon periksa Password yang Anda masukkan.');
				redirect('admin/login');
			}
		}else{
				$this->session->set_flashdata('pesan', '<strong>Gagal!</strong> Mohon periksa Username dan Password yang Anda masukkan.');
				redirect('admin/login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

	public function index()
	{
		redirect('admin/beranda');
	}

	public function beranda()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Halaman Administrator PMB';
		$data['konten'] = 'admin/beranda';
		$data['jadwal'] = $this->tbl_jadwal_tes->get_all();

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

		$this->load->view('admin/layout', $data);
	}	

	public function manage()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Akses Admin';
		$data['konten'] = 'admin/admin';
		$data['id'] = $this->user_admin->create_id_admin();
		$data['admin'] = $this->user_admin->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$password 	= $this->input->post('password');
		$role		= $this->input->post('role');

		$query = $this->user_admin->add($id, $nama, $password, $role);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Akun admin baru telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Akun admin gagal disimpan.');
		}
		redirect('admin/manage');
	}

	public function ubah()
	{
		$id 		= $this->input->post('id-u');
		$nama 		= $this->input->post('nama-u');
		$password 	= $this->input->post('password-u');
		$role		= $this->input->post('role-u');

		$query = $this->user_admin->edit($id, $nama, $password, $role);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Akun admin baru telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Akun admin gagal diubah.');
		}
		redirect('admin/manage');
	}

	public function hapus($id)
	{
		$query = $this->user_admin->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Akun admin <b>"'.$id.'"</b> telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Akun admin <b>"'.$id.'"</b> gagal dihapus.');
		}
		redirect('admin/manage');
	}
}
?>