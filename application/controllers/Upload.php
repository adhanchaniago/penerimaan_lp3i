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
                $this->load->library('upload');

                $keterangan                     = $this->input->post('keterangan');

                $no_pendaftaran                 = $this->session->userdata('no_pendaftaran');
                $config['file_name']            = $no_pendaftaran."_".date('d_m_Y_h_i_sa');
                $config['upload_path']          = './assets/global/img/bukti/';
                $config['allowed_types']        = 'pdf|bmp|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->upload->initialize($config);
                if (!$this->upload->do_upload('bukti')) {
                        $this->session->set_flashdata('pesan', '<b>Gagal!</b> '.$this->upload->display_errors());
                }
                else {
                        $data_upload = $this->upload->data();
                        $id_bukti = $this->security_check->gen_ai_id('bukti_pembayaran', 'id_bukti');
                        $act = $this->tbl_bukti->add(array(
                                        'id_bukti'              => $id_bukti,
                                        'no_pendaftaran'        => $no_pendaftaran,
                                        'tanggal_upload'        => date('Y-m-d'),
                                        'keterangan'            => $keterangan,
                                        'filename'              => $data_upload['file_name']
                                ));
                        $this->session->set_flashdata('pesan', '<b>Terima kasih!</b> pendaftaran Anda akan kami validasi paling lambat 1x24 jam.');
                }
                
                redirect('peserta/beranda');
	}
}
?>