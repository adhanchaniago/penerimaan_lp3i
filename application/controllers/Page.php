<?php 
/**
* 
*/
class Page extends CI_Controller
{
	
	public function index()
	{
		$data['judul'] = 'Pendaftaran Mahasiswa Baru';

		$this->load->view('start', $data);
	}

	public function beranda()
	{
		$data['judul'] = 'Pendaftaran Mahasiswa Baru';
		$data['konten'] = 'registrasi/beranda';

		$this->load->view('layout', $data);
	}

	public function register()
	{
		// buat captcha dulu
		$this->load->helper('captcha');
		$vals = array(
			'img_path'      => './assets/global/img/captcha/',
			'img_url'       => base_url().'/assets/global/img/captcha/',
			'img_width'     => '200',
			'img_height'    => '50',
			'word_length'   => '5',
			'expiration'    => '7200',
			'pool'			=> 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',
			'font_size'     => '20',
			
			// White background and border, black text and red grid
			'colors'        => array(
					'background' 	=> array(255, 255, 255),
					'border' 		=> array(0, 0, 0),
					'text' 			=> array(0, 0, 0),
					'grid' 			=> array(255, 150, 150)
			)
		);
		$cap = create_captcha($vals);
		//buat session sementara untuk menampung nilai captcha
		$this->session->set_userdata('captcha_word', $cap['word']);

		$data['judul'] = 'Pendaftaran Mahasiswa Baru';
		$data['jurusan'] = $this->m_jurusan->get_all();
		$data['captcha'] = $cap;
		
		$this->load->view('registrasi/form_online', $data);
	}

	public function register_act()
	{
		$no_pendaftaran = $this->tbl_pendaftar->create_no_pendaftaran();
		$id_admin = '1';
		$nama = $this->input->post('nama');
		$tempat_lahir = $this->input->post('tmp_lahir');
		$tanggal_lahir = date('y-M-d', strtotime($this->input->post('tgl_lahir')));
		$agama = $this->input->post('agama');
		$status_pernikahan = $this->input->post('status');
		$pekerjaan = $this->input->post('pekerjaan');
		$kewarganegaraan = $this->input->post('kewarganegaraan');
		$no_identitas = $this->input->post('no_id');
		$alamat_tetap = $this->input->post('alamat_tetap');
		$alamat_sekarang = $this->input->post('alamat_sekarang');
		$alamat_kantor = $this->input->post('alamat_kantor');
		$no_handphone = $this->input->post('no_handphone');
		$no_telepon = $this->input->post('no_telepon');
		$email = $this->input->post('email');
		$evaluasi_diri = '';
		$password = md5($this->input->post('pass'));
		$valid = '0';
		$tanggal_daftar = date('y-M-d');
		$sumber_informasi = $this->input->post('sumber_informasi');

		$prodi1 = $this->input->post('prodi1');
		$prodi2 = $this->input->post('prodi2');

		$kode_unik = $this->input->post('kode_unik');
		if ($kode_unik != $_SESSION['captcha_word']) {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Pastikan \'Kode Unik\' yang Anda masukkan sudah sesuai dengan gambar.');
			redirect('registrasi/form_online');
		}

		$act = $this->tbl_pendaftar->add($no_pendaftaran, $id_admin, $nama, $tempat_lahir, $tanggal_lahir, 
			$agama, $status_pernikahan, $pekerjaan, $kewarganegaraan, $no_identitas, $alamat_tetap, 
			$alamat_sekarang, $alamat_kantor, $no_handphone, $no_telepon, $email, $evaluasi_diri, 
			$password, $valid, $tanggal_daftar, $sumber_informasi);
		if ($act > 0) {
			if($prodi1 != '-') $this->tbl_pilihan->add($no_pendaftaran, $prodi1);
			if($prodi2 != '-') $this->tbl_pilihan->add($no_pendaftaran, $prodi2);

			$this->session->set_flashdata('pesan', "<b>Berhasil!</b> Data pendaftaran Anda telah disimpan. 
				Silahkan <a href='".base_url().'index.php/page/login'."'>LOGIN</a> dan lengkapi data Anda.");
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data pendaftaran Anda gagal disimpan.');
		}
		redirect('registrasi/form_online');
	}

	public function login()
	{
		$data['judul'] = 'Login - PMB';
		
		$this->load->view('login', $data);
	}

	public function login_auth()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username == 'admin' && $password == 'admin') {
			redirect('page/beranda');
		} else {
			redirect('page/login');
		}
	}
}
?>