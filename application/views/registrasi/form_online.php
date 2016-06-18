<div class="container-fluid">
	<div class="page-content page-content-popup">
		<!-- BEGIN PAGE CONTENT FIXED -->
		<div class="page-content-fixed-header">
			<h2><?php echo $judul; ?></h2>
		</div>

		<div class="col-md-12">
			<table height="100px" width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px; margin-bottom: 10px;">
				<tr style="text-align: center;font-size: 14pt;font-weight: bold;color: rgb(100, 100, 100)">
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(100, 100, 100)">1. Data Pribadi</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">2. Riwayat Pendidikan</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">3. Riwayat Pekerjaan</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">4. Anggota Keluarga</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">5. Evaluasi Diri</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">6. Selesai</td>
				</tr>
			</table>
		</div>

		<div class="col-md-12">
			<?php if (isset($_SESSION['pesan'])) { ?>
			<div class="alert alert-block alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<?php echo $this->session->flashdata('pesan'); ?>
			</div>
			<?php } ?>
		</div>

		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-dark">
						<span class="caption-subject bold uppercase">Formulir</span>
						<span class="caption-helper">Online</span>
					</div>
					<div class="actions">
						<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
					</div>
				</div>
				<div class="portlet-body form">
					<form action="<?php echo base_url().'index.php/page/register_act'; ?>" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label class="col-md-3 control-label">Lokasi Kampus</label>
									<div class="col-md-9">
										<input type="text" name="lokasi" class="form-control" value="LP3I Surabaya" readonly="true">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Program Pendidikan (Pilihan 1)</label>
									<div class="col-md-9">
										<select name="prodi1" id="prodi1" class="form-control" onchange="javascript:setFirstChoice();" required>
											<option></option>
											<?php foreach ($jurusan as $jur) { ?>
											<option value="<?php echo $jur->ID_JURUSAN; ?>"><?php echo $jur->NAMA_JURUSAN; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Program Pendidikan (Pilihan 2)</label>
									<div class="col-md-9">
										<select name="prodi2" id="prodi2" class="form-control">
											<option></option>
											<?php foreach ($jurusan as $jur) { ?>
											<option value="<?php echo $jur->ID_JURUSAN; ?>"><?php echo $jur->NAMA_JURUSAN; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<legend><small>Data Aplikan</small></legend>
								<div class="form-group">
									<label class="col-md-3 control-label">No. KTP/SIM/Kartu Pelajar</label>
									<div class="col-md-9">
										<input type="text" name="no_id" class="form-control" placeholder="Masukkan No. KTP/SIM/Kartu Pelakar">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Nama Lengkap</label>
									<div class="col-md-9">
										<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Jenis Kelamin</label>
									<div class="col-md-9">
										<div class="radio-list">
											<label class="radio-inline"><input type="radio" name="jk" id="jkLakiLaki" value="L" checked> Laki-laki </label>
											<label class="radio-inline"><input type="radio" name="jk" id="jkPerempuan" value="P"> Perempuan </label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Tempat Lahir</label>
									<div class="col-md-9">
										<!-- <input type="text" name="tmp_lahir" class="form-control" placeholder="Masukkan Tempat Lahir"> -->
										<select class="form-control select2me" data-placeholder="Pilih..." name="tmp_lahir" required>
											<option></option>
											<?php foreach ($kota as $k) {
												echo "<option>".$k."</option>";
											} ?>
										</select>

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Tanggal Lahir</label>
									<div class="col-md-9">
										<input class="form-control form-control-inline input-medium date-picker" name="tgl_lahir" size="16" type="date" placeholder="MM/DD/YYYY" required />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Agama</label>
									<div class="col-md-9">
										<select name="agama" class="form-control">
											<option>- Pilih Agama -</option>
											<option>Islam</option>
											<option>Kristen</option>
											<option>Katolik</option>
											<option>Hindu</option>
											<option>Budha</option>
											<option>Lainnya</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Status Pernikahan</label>
									<div class="col-md-9">
										<div class="radio-list">
											<label class="radio-inline"><input type="radio" name="status" id="statusMenikah" value="Menikah"> Menikah </label>
											<label class="radio-inline"><input type="radio" name="status" id="statusBelumMenikah" value="Belum Menikah" checked> Belum Menikah </label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Kewarganegaraan</label>
									<div class="col-md-9">
										<div class="radio-list">
											<label class="radio-inline"><input type="radio" name="kewarganegaraan" id="wni" value="WNI" checked> Warga Negara Indonesia </label>
											<label class="radio-inline"><input type="radio" name="kewarganegaraan" id="wna" value="WNA"> Warga Negara Asing </label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Pekerjaan</label>
									<div class="col-md-9">
										<input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Alamat Tetap</label>
									<div class="col-md-9">
										<textarea name="alamat_tetap" class="form-control" placeholder="Masukkan Alamat Tetap Anda"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Alamat Sekarang</label>
									<div class="col-md-9">
										<textarea name="alamat_sekarang" class="form-control" placeholder="Masukkan Alamat Anda Sekarang"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Alamat Kantor</label>
									<div class="col-md-9">
										<textarea name="alamat_kantor" class="form-control" placeholder="Masukkan Alamat Kantor Anda"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">No. Handphone</label>
									<div class="col-md-9">
										<input type="text" name="no_handphone" class="form-control" placeholder="Masukkan No. Telepon">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">No. Telepon</label>
									<div class="col-md-9">
										<input type="text" name="no_telepon" class="form-control" placeholder="Masukkan No. Telepon">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Tahun Lulus SMA/SMK/Sederajat</label>
									<div class="col-md-2">
										<input type="number" name="tahun_lulus" class="form-control" placeholder="20xx" value="2005">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Email</label>
									<div class="col-md-9">
										<input type="text" name="email" class="form-control" placeholder="Masukkan Email">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">PIN BB</label>
									<div class="col-md-9">
										<input type="text" name="pin_bb" class="form-control" placeholder="Masukkan PIN BB (Optional)">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Facebook</label>
									<div class="col-md-9">
										<input type="text" name="facebook" class="form-control" placeholder="Masukkan Nama Akun Facebook (Optional)">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Twitter</label>
									<div class="col-md-9">
										<input type="text" name="twitter" class="form-control" placeholder="Masukkan Akun Twitter (Optional)">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Sumber Informasi</label>
									<div class="col-md-9">
										<select name="sumber_informasi" class="form-control">
											<option>Web LP3I Surabaya</option>
											<option>Media Cetak (Brosur/Koran/Majalah)</option>
											<option>Informasi Dari Rekan</option>
											<option>Lainnya</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Kata Sandi</label>
									<div class="col-md-9">
										<input type="password" name="pass" class="form-control" placeholder="Masukkan Kata Sandi">
										<span class="help-inline">Digunakan untuk masuk ke sistem penerimaan mahasiswa baru (cek jadwal tes, tes online, pengumuman, dll.)</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Masukkan Kode Unik</label>
									<div class="col-md-3">
										<?php echo $captcha['image']; ?>
										<input type="text" name="kode_unik" class="form-control" placeholder="Masukkan Kode Unik">
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<!-- <div class="form-group">
									<label class="col-md-3 control-label">Pas Foto</label>
									<div class="col-md-9">
										<input type="file" name="pas_foto[]" class="form-control" accept=".png,.jpg,.bmp">
									</div>
								</div> -->
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-6 col-md-6">
									<button type="submit" class="btn green">Daftar</button>
									<button type="reset" class="btn red">Batal</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT FIXED -->

		<!-- Copyright BEGIN -->
		<p class="copyright-v2">2016 © PMB LP3I Surabaya by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a></p>
		<!-- Copyright END -->
	</div>

</div>
<script type="text/javascript">
	function setFirstChoice() {
		var selectedOption = $('#prodi1').val();
		$("#prodi2 option[value='"+selectedOption+"']").remove();
	}
</script>
