<?php
/**
* 
*/
class M_Pendaftar extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('pendaftar')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('pendaftar', array('no_pendaftaran' => $id))->result();
	}

	public function add($no_pendaftaran, $id_admin, $nama, $jk, $tempat_lahir, $tanggal_lahir, 
		$agama, $status_pernikahan, $pekerjaan, $kewarganegaraan, $no_identitas, $alamat_tetap, 
		$alamat_sekarang, $alamat_kantor, $no_handphone, $no_telepon, $email, $evaluasi_diri, 
		$password, $valid, $tanggal_daftar, $sumber_informasi)
	{
		return $this->db->insert('pendaftar', array(
				'no_pendaftaran' 		=> $no_pendaftaran,
				'id_admin' 				=> $id_admin,
				'nama' 					=> $nama,
				'jenis_kelamin'			=> $jk,
				'tempat_lahir'			=> $tempat_lahir,
				'tanggal_lahir'			=> $tanggal_lahir,
				'agama'					=> $agama,
				'status_pernikahan'		=> $status_pernikahan,
				'pekerjaan'				=> $pekerjaan,
				'kewarganegaraan'		=> $kewarganegaraan,
				'no_identitas'			=> $no_identitas,
				'alamat_tetap'			=> $alamat_tetap,
				'alamat_sekarang'		=> $alamat_sekarang,
				'alamat_kantor'			=> $alamat_kantor,
				'no_handphone'			=> $no_handphone,
				'no_telepon'			=> $no_telepon,
				'email'					=> $email,
				'evaluasi_diri'			=> $evaluasi_diri,
				'password' 				=> $password,
				'valid' 				=> $valid,
				'tanggal_daftar'		=> $tanggal_daftar,
				'sumber_informasi'		=> $sumber_informasi,
			));
	}


	public function edit($no_pendaftaran, $id_admin, $nama, $jk, $tempat_lahir, $tanggal_lahir, 
		$agama, $status_pernikahan, $pekerjaan, $kewarganegaraan, $no_identitas, $alamat_tetap, 
		$alamat_sekarang, $alamat_kantor, $no_handphone, $no_telepon, $email, $evaluasi_diri, 
		$password, $valid, $tanggal_daftar, $sumber_informasi)
	{
		$this->db->where('no_pendaftaran', $id);
		return $this->db->update('pendaftar', array(
				'id_admin' 				=> $id_admin,
				'nama' 					=> $nama,
				'jenis_kelamin'			=> $jk,
				'tempat_lahir'			=> $tempat_lahir,
				'tanggal_lahir'			=> $tanggal_lahir,
				'agama'					=> $agama,
				'status_pernikahan'		=> $status_pernikahan,
				'pekerjaan'				=> $pekerjaan,
				'kewarganegaraan'		=> $kewarganegaraan,
				'no_identitas'			=> $no_identitas,
				'alamat_tetap'			=> $alamat_tetap,
				'alamat_sekarang'		=> $alamat_sekarang,
				'alamat_kantor'			=> $alamat_kantor,
				'no_handphone'			=> $no_handphone,
				'no_telepon'			=> $no_telepon,
				'email'					=> $email,
				'evaluasi_diri'			=> $evaluasi_diri,
				'password' 				=> $password,
				'valid' 				=> $valid,
				'tanggal_daftar'		=> $tanggal_daftar,
				'sumber_informasi'		=> $sumber_informasi
			));
	}

	public function update(array $data, array $where)
	{
		return $this->db->update('pendaftar',$data,$where);
	}

	public function remove($id)
	{
		$this->db->where('no_pendaftaran', $id);
		$this->db->delete('riwayat_pendidikan');

		$this->db->where('no_pendaftaran', $id);
		$this->db->delete('pilihan_jurusan');

		$this->db->where('no_pendaftaran', $id);
		$this->db->delete('anggota_keluarga');

		$this->db->where('no_pendaftaran', $id);
		$this->db->delete('riwayat)_kerja');

		$this->db->where('no_pendaftaran', $id);
		$this->db->delete('bukti_pembayaran');

		$this->db->where('no_pendaftaran', $id);
		return $this->db->delete('pendaftar');
	}

	public function validasi($no_pendaftaran)
	{
		$id_admin = $this->session->userdata("id_admin");
		$this->db->where("no_pendaftaran", $no_pendaftaran);
		return $this->db->update("pendaftar", array(
			"valid" 	=> 1,
			"id_admin"	=> $id_admin
			));
	}

	public function create_no_pendaftaran()
	{
		$iter = '0000'.$this->db->query("
			select ifnull(max(right(no_pendaftaran, 4)), 0) + 1 as JUMLAH
			from pendaftar
			where tanggal_daftar = '".date("Y-m-d")."'
		")->result()[0]->JUMLAH;
		$no_pendaftaran = date('dmy').substr($iter, strlen($iter) - 4, strlen($iter));
		return $no_pendaftaran;
	}

	public function auth($no, $pass)
	{
		return $this->db->get_where(
			'pendaftar',
			array(
				'no_pendaftaran' 	=> $no,
				'password' 			=> md5($pass)
			),
			1
		)->result();
	}

	public function custom_where(array $cond = null)
	{
		$this->db->select('*');
		$this->db->from('pendaftar');
		if (count($cond) > 0)
			$this->db->where($cond);
		return $this->db->get()->result();
	}

	public function get_peserta($peserta)
	{
		return $this->db->query('
			SELECT *
			FROM pendaftar
			WHERE
			pendaftar.VALID = 1 AND
			pendaftar.NO_PENDAFTARAN NOT IN ('.$peserta.')
			')->result();
	}
}
?>