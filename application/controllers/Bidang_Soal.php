<?php
/**
* 
*/
class Bidang_Soal extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = 'Kelola Bidang Soal Akademik';
		$data['konten'] = 'admin/bidang_soal';

		$data['id'] = $this->security_check->gen_ai_id('bidang_soal_akademik', 'id_bidang_soal');
		$data['bidang_soal_akademik'] = $this->tbl_bidang_soal_akademik->get_all();
		$data['total_bobot'] = $this->tbl_bidang_soal_akademik->total_bobot();
		$data['max_bobot'] = 100 - $data['total_bobot'];

		$this->load->view('admin/layout', $data);
	}

	public function tambah()
	{
		$id 			= $this->input->post('id');
		$nama 			= $this->input->post('nama');
		$bobot 		= $this->input->post('bobot');

		$query = $this->tbl_bidang_soal_akademik->add($id, $nama, $bobot);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data bidang soal akademik telah disimpan.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data bidang soal akademik gagal disimpan.');
		}
		redirect('bidang_soal');
	}

	public function ubah()
	{
		$id 		= $this->input->post('id-u');
		$nama 		= $this->input->post('nama-u');
		$bobot		= $this->input->post('bobot-u');

		$query = $this->tbl_bidang_soal_akademik->edit($id, $nama, $bobot);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data bidang soal akademik telah diubah.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data bidang soal akademik gagal diubah.');
		}
		redirect('bidang_soal');
	}

	public function hapus($id)
	{
		$query = $this->tbl_bidang_soal_akademik->remove($id);
		if ($query > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data bidang soal akademik telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data bidang soal akademik gagal dihapus.');
		}
		redirect('bidang_soal');
	}

	public function edit()
	{
		$id 	= $this->input->post('id');
		$nama 	= $this->input->post('nama');
		$bobot 	= $this->input->post('bobot');

		//mengecek bobot yang tersisa di tambah bobot ini
		$bobot_total = $this->tbl_bidang_soal_akademik->total_bobot();
		$bobot_sisa = (100 - $bobot_total) + $bobot;
		echo '
		<div class="modal-body no-padding">
          <input type="hidden" id="id-u" name="id-u" placeholder="ID" class="form-control" readonly="" value="'.$id.'" required="" />
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="nama-u">Bidang Akademik</label>
            <div class="col-sm-9">
              <input type="text" id="nama-u" name="nama-u" placeholder="Nama" class="form-control" value="'.$nama.'" required="" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="bobot-u">Bobot (%)</label>
            <div class="col-sm-9">
              <input type="number" id="bobot-u" name="bobot-u" placeholder="XX" class="form-control" required="" value="'.$bobot.'" max="'.$bobot_sisa.'" min="1" />
              <span class="help-text"> *NB : Bobot diantara 1 - '.$bobot_sisa.'</span>
            </div>
          </div>
        </div>
        <div class="modal-footer no-margin-top">
          <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
            <i class="ace-icon fa fa-times"></i> Tutup
          </button>&nbsp;
          <button class="btn btn-primary btn-sm" type="submit" id="btn-simpan-u">
            <i class="ace-icon fa fa-check"></i> Simpan
          </button>
        </div>
		';
	}

}
?>