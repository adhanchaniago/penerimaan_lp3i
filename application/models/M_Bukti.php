 <?php
/**
* 
*/
class M_Bukti extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_all()
	{
		return $this->db->get('bukti_pembayaran')->result();
	}

	public function get_id($id)
	{
		return $this->db->get_where('bukti_pembayaran', array('ID_BUKTI' => $id))->result();
	}

	public function join_pendaftar(array $cond = null)
	{
		$this->db->select('*');
		$this->db->from('bukti_pembayaran');
		$this->db->join('pendaftar','pendaftar.NO_PENDAFTARAN = bukti_pembayaran.NO_PENDAFTARAN');
		if (count($cond)>0)
			$this->db->where($cond);
		return $this->db->get()->result();
	}

	public function add(array $value)
	{
		return $this->db->insert('bukti_pembayaran', $value);
	}
}
?>