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

		$this->load->view('admin/layout', $data);
	}	
}
?>