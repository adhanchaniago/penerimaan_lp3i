<?php  
/**
* 
*/
class M_Akun_Admin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('akun_admin')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('akun_admin', array('id_admin' => $id))->result();
	}

	public function auth($name, $pass)
	{
		return $this->db->get_where(
			'akun_admin',
			array(
				'id_admin' => $name,
				'pass_admin' => md5($pass)
			),
			1
		)->result();
	}

	public function add($id, $nama, $pass, $role)
	{
		return $this->db->insert('akun_admin', array(
				'id_admin' => $id,
				'nama_admin' => $nama,
				'pass_admin' => md5($pass),
				'role_admin' => $role
			));
	}


	public function edit($id, $nama, $pass, $role)
	{
		$this->db->where('id_admin', $id);
		return $this->db->update('akun_admin', array(
				'nama_admin' => $nama,
				'pass_admin' => $pass,
				'role_admin' => $role
			));
	}

	public function remove($id)
	{
		$this->db->where('id_admin', $id);
		return $this->db->delete('akun_admin');
	}

	public function create_id_admin()
	{
		$iter = '00'.$this->db->query("select ifnull(max(right(id_admin, 2)), 0) + 1 as JUMLAH from akun_admin")->result()[0]->JUMLAH;
		$id_admin = 'ADM'.substr($iter, strlen($iter) - 2, strlen($iter));
		return $id_admin;
	}
}
?>