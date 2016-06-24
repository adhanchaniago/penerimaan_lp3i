<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Sms extends CI_Model
{

	public function outbox($nomer,$pesan)
	{
		$sms = $this->load->database('sms',TRUE);
		$data = array(
				'DestinationNumber' => $nomer,
				'TextDecoded' => $pesan
			);
		$sms->insert('outbox',$data);
	}

}