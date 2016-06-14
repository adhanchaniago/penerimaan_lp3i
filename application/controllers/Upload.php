<?php  
/**
* 
*/
class Upload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function do_upload()
	{
		// $no_pendaftaran = $this->session->userdata('no_pendaftaran');
		// $no_pendaftaran = '123456';
		// $config['file_name']          	= $no_pendaftaran;
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload())
                {
                	echo  "<pre>";
                	print_r($this->upload->display_errors());
                	echo  "</pre>";
                }
                else
                {
                	echo  "<pre>";
                	print_r($this->upload->data());
                	echo  "</pre>";
                }
	}
}
?>