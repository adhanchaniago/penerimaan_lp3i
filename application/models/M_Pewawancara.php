 <?php
/**
* 
*/
class M_Pewawancara extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('pewawancara')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('pewawancara', array('id_pewawancara' => $id))->result();
	}

	public function add($id, $nama, $password, $keterangan = null)
	{
		return $this->db->insert('pewawancara', array(
				'id_pewawancara' => $id,
				'nama' => $nama,
				'password' => md5($password),
				'keterangan' => $keterangan
			));
	}


	public function edit($id, $nama, $password, $keterangan)
	{
		$this->db->where('id_pewawancara', $id);
		return $this->db->update('pewawancara', array(
				'nama' => $nama,
				'password' => md5($password),
				'keterangan' => $keterangan
			));
	}

	public function remove($id)
	{
		$this->db->where('id_pewawancara', $id);
		return $this->db->delete('pewawancara');
	}

	public function create_id()
	{
		$iter = '000'.$this->db->query("select ifnull(max(right(id_pewawancara, 2)), 0) + 1 as JUMLAH from pewawancara")->result()[0]->JUMLAH;
		$id = 'INT'.substr($iter, strlen($iter) - 3, strlen($iter));
		return $id;
	}


	public function auth($name, $pass)
	{
		return $this->db->get_where(
			'pewawancara',
			array(
				'id_pewawancara' => $name,
				'password' => md5($pass)
			),
			1
		)->result();
	}

}
?>