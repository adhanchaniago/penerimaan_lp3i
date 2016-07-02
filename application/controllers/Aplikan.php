<?php  
/**
* 
*/
class Aplikan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->security_check->admin_check();
		$data['judul'] = "Data Aplikan";
		$data['konten'] = "admin/aplikan";

		$data['pendaftar'] = $this->tbl_pendaftar->get_all();

		$this->load->view('admin/layout', $data);
	}

	public function hapus($no_pendaftaran)
	{
		$act = $this->tbl_pendaftar->remove($no_pendaftaran);

		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data aplikan telah dihapus.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data aplikan gagal dihapus.');
		}
		redirect('aplikan');
	}

	public function validasi()
	{
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$act = $this->tbl_pendaftar->validasi($no_pendaftaran);

		if ($act > 0) {
			$this->session->set_flashdata('pesan', '<b>Berhasil!</b> Data aplikan telah tervalidasi.');
		} else {
			$this->session->set_flashdata('pesan', '<b>Gagal!</b> Data aplikan gagal divalidasi.');
		}
		redirect('aplikan');
	}

	public function get_bukti()
	{
		$no_pendaftaran = $this->input->post('no_pendaftaran');
		$buktis = $this->tbl_bukti->join_pendaftar(array('bukti_pembayaran.no_pendaftaran' => $no_pendaftaran));
		if(count($buktis) > 0) {
			echo "<ol>";
			foreach ($buktis as $bukti) {
				echo "<li><a href='".base_url()."assets/global/img/bukti/".$bukti->FILENAME."' target='_blank'>"
					.date('d-m-Y', strtotime($bukti->TANGGAL_UPLOAD))."&nbsp;".$bukti->KETERANGAN."</a></li>";
			}
			echo "</ol><br><span style='font-size: 9pt;'>&nbsp;*) Klik untuk melihat.</span>";
		} else {
			echo "<div style='display: block;width: 100%;text-align: center;'>
				<strong>Aplikan belum mengupload bukti transfer biaya pendaftaran.</strong>
				</div>";
		}
	}

	public function check_notif()
	{
		$pendaftar = $this->tbl_pendaftar->custom_where(array('valid' => '0'));
		echo count($pendaftar);
	}

	public function detil($no_pendaftaran)
	{
		$this->security_check->admin_check();
		$data['judul'] = "Detil Aplikan";
		$data['konten'] = "admin/detil_aplikan";

		$data['data'] 		= $this->tbl_pendaftar->get_id($no_pendaftaran)[0];		
		$data['keluarga'] 	= $this->tbl_anggota_keluarga->get_pendaftar($no_pendaftaran);		
		$data['pendidikan'] = $this->tbl_riwayat_pendidikan->get_pendaftar($no_pendaftaran);		
		$data['pekerjaan'] 	= $this->tbl_riwayat_pekerjaan->get_pendaftar($no_pendaftaran);		

		$this->load->view('admin/layout', $data);
	}

	public function ubah($no_pendaftaran)
	{
		$this->security_check->admin_check();
		$data['judul'] = "Edit Aplikan";
		$data['konten'] = "admin/edit_aplikan";

		$data['data'] 		= $this->tbl_pendaftar->get_id($no_pendaftaran)[0];		
		$data['keluarga'] 	= $this->tbl_anggota_keluarga->get_pendaftar($no_pendaftaran);		
		$data['pendidikan'] = $this->tbl_riwayat_pendidikan->get_pendaftar($no_pendaftaran);		
		$data['pekerjaan'] 	= $this->tbl_riwayat_pekerjaan->get_pendaftar($no_pendaftaran);		

		$txtKota = read_file('./daftar_kota.txt');
		$data['kota'] = explode(';', $txtKota);

		$this->load->view('admin/layout', $data);
	}

	public function update()
	{
		$no_pendaftaran 		= $this->input->post('no_pendaftaran');
		$nama			 		= $this->input->post('nama');
		$jk				 		= $this->input->post('jk');
		$tempat_lahir 	 		= $this->input->post('tmp_lahir');
		$tanggal_lahir 	 		= $this->input->post('tgl_lahir');
		$status_penikahan 		= $this->input->post('status');
		$kewarganegaraan 		= $this->input->post('kewarganegaraan');
		$no_indentitas 			= $this->input->post('no_identitas');
		$alamat_tetap 			= $this->input->post('alamat_tetap');
		$alamat_sekarang 		= $this->input->post('alamat_sekarang');
		$pekerjaan 	 			= $this->input->post('pekerjaan');
		$alamat_kantor 			= $this->input->post('alamat_kantor');
		$email 		 			= $this->input->post('email');
		$no_hp 		 			= $this->input->post('no_hp');
		$evaluasi 	 			= $this->input->post('evaluasi');

		//set array
		$where = array('NO_PENDAFTARAN'=>$no_pendaftaran);
		$data = array(
				'NAMA' 				=> $nama,
				'JENIS_KELAMIN' 	=> $jk,
				'TEMPAT_LAHIR' 		=> $tempat_lahir,
				'TANGGAL_LAHIR' 	=> $tanggal_lahir,
				'STATUS_PERNIKAHAN' => $status_penikahan,
				'KEWARGANEGARAAN' 	=> $kewarganegaraan,
				'NO_IDENTITAS' 		=> $no_indentitas,
				'ALAMAT_TETAP' 		=> $alamat_tetap,
				'ALAMAT_SEKARANG' 	=> $alamat_sekarang,
				'PEKERJAAN' 		=> $pekerjaan,
				'ALAMAT_KANTOR' 	=> $alamat_kantor,
				'EMAIL' 			=> $email,
				'NO_HANDPHONE' 		=> $no_hp,
				'EVALUASI_DIRI' 	=> $evaluasi
			);
		$this->tbl_pendaftar->update($data,$where);
		redirect('aplikan/ubah/'.$no_pendaftaran);
	}

	public function aplikan_act($act,$no_pendaftaran = Null,$id = Null)
	{
		switch ($act) {
			case 'simpan_keluarga':
				$id = $this->security_check->gen_ai_id('anggota_keluarga', 'ID');

				$nama = $this->input->post('nama-u');
				$hubungan = $this->input->post('hubungan-alt-u');
				$usia = $this->input->post('usia-u');
				$pekerjaan = $this->input->post('pekerjaan-u');

				$this->tbl_anggota_keluarga->add($id, $no_pendaftaran, $nama, $hubungan, $usia, $pekerjaan);

				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'tambah_keluarga':
				$no = $this->input->post('no_pendaftaran');
				echo '
				<form class="form-horizontal" role="form" action="'.base_url().'aplikan/aplikan_act/simpan_keluarga/'.$no.'" method="post">
			    <div class="modal-body no-padding">		        
			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="nama-u">Nama</label>
			          <div class="col-sm-6">
			            <input type="text" id="nama-u" name="nama-u" placeholder="Nama Anggota Keluarga" class="form-control" required="" />
			          </div>
			        </div>

			        <div class="form-group">
						<label class="col-md-3 control-label" for="hubungan-alt-u">Hubungan Keluarga</label>
						<div class="col-md-9">
							<select class="form-control form-control-inline input-medium" name="hubungan-alt-u" id="hubungan-alt-u">
								<option>Ayah</option>
								<option>Ibu</option>
								<option>Kakak</option>
								<option>Adik</option>
								<option>Lainnya</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="usia-u">Usia</label>
						<div class="col-md-6">
							<input class="form-control form-control-inline input-medium" id="usia-u" name="usia-u" type="number" value="0" max="100" />
						</div>
					</div>

					<div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="pekerjaan-u">Pekerjaan</label>
			          <div class="col-sm-6">
			            <input type="text" id="pekerjaan-u" name="pekerjaan-u" placeholder="Pekerjaan" class="form-control" />
			          </div>
			        </div>

			    </div>
			    <div class="modal-footer no-margin-top">
			        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			          <i class="ace-icon fa fa-times"></i> Tutup
			        </button>&nbsp;
			        <button class="btn btn-primary btn-sm" type="submit">
			          <i class="ace-icon fa fa-check"></i> Simpan
			        </button>
			    </div>
			    </form>
				';
				break;
			case 'update_keluarga':

				$id = $this->input->post('id-u');
				$nama = $this->input->post('nama-u');
				$hubungan = $this->input->post('hubungan-alt-u');
				$usia = $this->input->post('usia-u');
				$pekerjaan = $this->input->post('pekerjaan-u');

				$this->tbl_anggota_keluarga->edit($id, $no_pendaftaran, $nama, $hubungan, $usia, $pekerjaan);

				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'edit_keluarga':
				$no = $this->input->post('no_pendaftaran');
				$id = $this->input->post('id_kel');

				$kel = $this->tbl_anggota_keluarga->get_id($id)[0];
				$usia = intval($kel->USIA);
				echo '
				<form class="form-horizontal" role="form" action="'.base_url().'aplikan/aplikan_act/update_keluarga/'.$no.'" method="post">
			    <div class="modal-body no-padding">		        
			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="nama-u">Nama</label>
			          <div class="col-sm-6">
			            <input type="text" id="nama-u" name="nama-u" placeholder="Nama Anggota Keluarga" class="form-control" required="" value="'.$kel->NAMA.'" />
			            <input type="hidden" id="id_u" name="id-u" class="form-control" value="'.$kel->ID.'" />
			          </div>
			        </div>

			        <div class="form-group">
						<label class="col-md-3 control-label" for="hubungan-alt-u">Hubungan Keluarga</label>
						<div class="col-md-9">
							<select class="form-control form-control-inline input-medium" name="hubungan-alt-u" id="hubungan-alt-u">';
								$data_kel = array('Ayah','Ibu','Kakak','Adik','Lainnya');
								foreach ($data_kel as $key => $value)
								{
									if ($value == $kel->HUBUNGAN_KELUARGA) {
										echo '<option selected>'.$value.'</option>';
									}else{
										echo '<option >'.$value.'</option>';
									}
								}
								echo '
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="usia-u">Usia</label>
						<div class="col-md-6">
							<input class="form-control form-control-inline input-medium" id="usia-u" name="usia-u" type="number" max="100" value="'.$usia.'" />
						</div>
					</div>
 					<div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="pekerjaan-u">Pekerjaan</label>
			          <div class="col-sm-6">
			            <input type="text" id="pekerjaan-u" name="pekerjaan-u" placeholder="Pekerjaan" class="form-control" value="'.$kel->PEKERJAAN.'" />
			          </div>
			        </div>

			    </div>
			    <div class="modal-footer no-margin-top">
			        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			          <i class="ace-icon fa fa-times"></i> Tutup
			        </button>&nbsp;
			        <button class="btn btn-primary btn-sm" type="submit">
			          <i class="ace-icon fa fa-check"></i> Simpan
			        </button>
			    </div>
			    </form>
				';
				break;
			case 'hapus_keluarga':
				$this->tbl_anggota_keluarga->remove($id);
				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'simpan_pendidikan':
				$id = $this->security_check->gen_ai_id('riwayat_pendidikan', 'ID');
				$jenis = $this->input->post('jenis');
				$nama = $this->input->post('nama');
				$alamat = $this->input->post('alamat');
				$mulai = $this->input->post('mulai');
				$selesai = $this->input->post('selesai');
				$sertifikat = $this->input->post('sertifikat');

				$this->tbl_riwayat_pendidikan->add($id, $no_pendaftaran, $jenis, $nama, $alamat, $mulai, $selesai, $sertifikat);

				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'tambah_pendidikan':
				$no = $this->input->post('no_pendaftaran');
				echo '
				<form class="form-horizontal" role="form" action="'.base_url().'aplikan/aplikan_act/simpan_pendidikan/'.$no.'" method="post">
			     <div class="modal-body no-padding">			        
			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="nama">Nama Lembaga</label>
			          <div class="col-sm-9">
			            <input type="text" id="nama" name="nama" placeholder="Contoh: SMA 1 Surabaya, LBB Primagama" class="form-control" required="" />
			          </div>
			        </div>

			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="jenis">Jenis</label>
			          <div class="col-sm-9">
			            <div class="radio-list">
							<label class="radio-inline"><input type="radio" name="jenis" id="jenisFormal" value="Formal" checked> Formal </label>
							<label class="radio-inline"><input type="radio" name="jenis" id="jenisNonformal" value="Nonformal"> Nonformal </label>
						</div>
			          </div>
			        </div>

			        <div class="form-group">
						<label class="col-md-3 control-label" for="mulai">Mulai/Masuk</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="mulai" name="mulai" size="16" type="date" placeholder="DD/MM/YYYY" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="selesai">Selesai/Lulus</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="selesai" name="selesai" size="16" type="date" placeholder="DD/MM/YYYY" />
						</div>
					</div>

					<div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="alamat">Alamat Lembaga</label>
			          <div class="col-sm-9">
			            <textarea id="alamat" name="alamat" placeholder="Alamat" class="form-control"></textarea>
			          </div>
			        </div>

			        <div class="form-group" id="form-sertifikat">
			          <label class="col-sm-3 control-label no-padding-right" for="sertifikat">Sertifikat</label>
			          <div class="col-sm-9">
			            <input type="text" id="sertifikat" name="sertifikat" placeholder="Sertifikat" class="form-control" />
			          </div>
			        </div>

			      </div>
			      <div class="modal-footer no-margin-top">
			        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			          <i class="ace-icon fa fa-times"></i> Tutup
			        </button>&nbsp;
			        <button class="btn btn-primary btn-sm" type="submit">
			          <i class="ace-icon fa fa-check"></i> Simpan
			        </button>
			      </div>
			    </form>
				';
				break;
			case 'edit_pendidikan':
				$no = $this->input->post('no_pendaftaran');
				$id = $this->input->post('id_pend');

				$pendidikan = $this->tbl_riwayat_pendidikan->get_id($id)[0];

				echo '
				<form class="form-horizontal" role="form" action="'.base_url().'aplikan/aplikan_act/update_pendidikan/'.$no.'" method="post">
			     <div class="modal-body no-padding">			        
			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="nama">Nama Lembaga</label>
			          <div class="col-sm-9">
			            <input type="text" id="nama" name="nama" placeholder="Contoh: SMA 1 Surabaya, LBB Primagama" class="form-control" required="" value="'.$pendidikan->NAMA_LEMBAGA.'">
			            <input type="hidden" id="id" name="id" class="form-control" value="'.$pendidikan->ID.'">
			          </div>
			        </div>

			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="jenis">Jenis</label>
			          <div class="col-sm-9">
			            <div class="radio-list">
							<label class="radio-inline"><input type="radio" name="jenis" id="jenisFormal" value="Formal"'; if($pendidikan->JENIS == 'Formal'){echo "checked";}; echo '> Formal </label>
							<label class="radio-inline"><input type="radio" name="jenis" id="jenisNonformal" value="Nonformal" '; if($pendidikan->JENIS == 'Nonformal'){echo "checked";}; echo '> Nonformal </label>
						</div>
			          </div>
			        </div>

			        <div class="form-group">
						<label class="col-md-3 control-label" for="mulai">Mulai/Masuk</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="mulai" name="mulai" size="16" type="date" value="'.$pendidikan->TANGGAL_MULAI.'" placeholder="DD/MM/YYYY" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="selesai">Selesai/Lulus</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="selesai" name="selesai" size="16" type="date" value="'.$pendidikan->TANGGAL_SELESAI.'" placeholder="DD/MM/YYYY" />
						</div>
					</div>

					<div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="alamat">Alamat Lembaga</label>
			          <div class="col-sm-9">
			            <textarea id="alamat" name="alamat" placeholder="Alamat" class="form-control">'.$pendidikan->ALAMAT_LEMBAGA.'</textarea>
			          </div>
			        </div>

			        <div class="form-group" id="form-sertifikat">
			          <label class="col-sm-3 control-label no-padding-right" for="sertifikat">Sertifikat</label>
			          <div class="col-sm-9">
			            <input type="text" id="sertifikat" name="sertifikat" placeholder="Sertifikat" class="form-control" value="'.$pendidikan->SERTIFIKAT.'"/>
			          </div>
			        </div>

			      </div>
			      <div class="modal-footer no-margin-top">
			        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			          <i class="ace-icon fa fa-times"></i> Tutup
			        </button>&nbsp;
			        <button class="btn btn-primary btn-sm" type="submit">
			          <i class="ace-icon fa fa-check"></i> Simpan
			        </button>
			      </div>
			    </form>
				';


				break;
			case 'update_pendidikan':
				$id = $this->input->post('id');
				$jenis = $this->input->post('jenis');
				$nama = $this->input->post('nama');
				$alamat = $this->input->post('alamat');
				$mulai = $this->input->post('mulai');
				$selesai = $this->input->post('selesai');
				$sertifikat = $this->input->post('sertifikat');

				$this->tbl_riwayat_pendidikan->edit($id, $no_pendaftaran, $jenis, $nama, $alamat, $mulai, $selesai, $sertifikat);

				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'hapus_pendidikan':
				$this->tbl_riwayat_pendidikan->remove($id);
				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'simpan_pekerjaan':
				$id = $this->security_check->gen_ai_id('riwayat_kerja', 'ID');
				$nama = $this->input->post('nama');
				$mulai = $this->input->post('mulai');
				$selesai = $this->input->post('selesai');
				$jabatan = $this->input->post('jabatan');
				$gaji = $this->input->post('gaji');

				$this->tbl_riwayat_pekerjaan->add($id, $no_pendaftaran, $nama, $mulai, $selesai, $jabatan, $gaji);

				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'tambah_pekerjaan':
				$no = $this->input->post('no_pendaftaran');
				echo '
				  <form class="form-horizontal" role="form" action="'.base_url().'aplikan/aplikan_act/simpan_pekerjaan/'.$no.'" method="post" enctype="multipart/form-data">
			      <div class="modal-body no-padding">			        
			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="nama">Nama Perusahaan</label>
			          <div class="col-sm-9">
			            <input type="text" id="nama" name="nama" placeholder="Contoh: PT. ABDI BERKAH CAHAYA" class="form-control" required="" />
			          </div>
			        </div>

			        <div class="form-group">
						<label class="col-md-3 control-label" for="mulai">Mulai/Masuk</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="mulai" name="mulai" size="16" type="date" placeholder="DD/MM/YYYY" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="selesai">Selesai/Keluar</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="selesai" name="selesai" size="16" type="date" placeholder="DD/MM/YYYY" />
						</div>
					</div>

					<div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="jabatan">Jabatan Terakhir</label>
			          <div class="col-sm-9">
			            <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan" class="form-control" />
			          </div>
			        </div>

			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="gaji">Gaji Per Bulan</label>
			          <div class="col-sm-9">
			            <input type="number" id="gaji" name="gaji" placeholder="1000000" class="form-control" />
			          </div>
			        </div>

			      </div>
			      <div class="modal-footer no-margin-top">
			        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			          <i class="ace-icon fa fa-times"></i> Tutup
			        </button>&nbsp;
			        <button class="btn btn-primary btn-sm" type="submit">
			          <i class="ace-icon fa fa-check"></i> Simpan
			        </button>
			      </div>
			      </form>
				';
				break;
			case 'edit_pekerjaan':
				$no = $this->input->post('no_pendaftaran');
				$id = $this->input->post('id_krj');

				$krj = $this->tbl_riwayat_pekerjaan->get_id($id)[0];

				echo '
				  <form class="form-horizontal" role="form" action="'.base_url().'aplikan/aplikan_act/update_pekerjaan/'.$no.'" method="post" enctype="multipart/form-data">
			      <div class="modal-body no-padding">			        
			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="nama">Nama Perusahaan</label>
			          <div class="col-sm-9">
			            <input type="text" id="nama" name="nama" placeholder="Contoh: PT. ABDI BERKAH CAHAYA" class="form-control" required="" value="'.$krj->NAMA_PERUSAHAAN.'"/>
			            <input type="hidden" id="id" name="id"  class="form-control" value="'.$krj->ID.'">
			          </div>
			        </div>

			        <div class="form-group">
						<label class="col-md-3 control-label" for="mulai">Mulai/Masuk</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="mulai" name="mulai" size="16" type="date" placeholder="DD/MM/YYYY" value="'.$krj->TANGGAL_MULAI.'"/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label" for="selesai">Selesai/Keluar</label>
						<div class="col-md-9">
							<input class="form-control form-control-inline input-medium date-picker" id="selesai" name="selesai" size="16" type="date" placeholder="DD/MM/YYYY" value="'.$krj->TANGGAL_SELESAI.'"/>
						</div>
					</div>

					<div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="jabatan">Jabatan Terakhir</label>
			          <div class="col-sm-9">
			            <input type="text" id="jabatan" name="jabatan" placeholder="Jabatan" class="form-control" value="'.$krj->JABATAN_AKHIR.'"/>
			          </div>
			        </div>

			        <div class="form-group">
			          <label class="col-sm-3 control-label no-padding-right" for="gaji">Gaji Per Bulan</label>
			          <div class="col-sm-9">
			            <input type="number" id="gaji" name="gaji" placeholder="1000000" class="form-control" value="'.$krj->GAJI_PERBULAN.'"/>
			          </div>
			        </div>

			      </div>
			      <div class="modal-footer no-margin-top">
			        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
			          <i class="ace-icon fa fa-times"></i> Tutup
			        </button>&nbsp;
			        <button class="btn btn-primary btn-sm" type="submit">
			          <i class="ace-icon fa fa-check"></i> Simpan
			        </button>
			      </div>
			      </form>
				';
				break;
			case 'update_pekerjaan':
				$id = $this->input->post('id');
				$nama = $this->input->post('nama');
				$mulai = $this->input->post('mulai');
				$selesai = $this->input->post('selesai');
				$jabatan = $this->input->post('jabatan');
				$gaji = $this->input->post('gaji');

				$this->tbl_riwayat_pekerjaan->edit($id, $no_pendaftaran, $nama, $mulai, $selesai, $jabatan, $gaji);

				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;
			case 'hapus_pekerjaan':
				$this->tbl_riwayat_pekerjaan->remove($id);
				redirect('aplikan/ubah/'.$no_pendaftaran);
				break;		
			default:
				redirect('aplikan/ubah');
				break;
		}
	}
}
?>