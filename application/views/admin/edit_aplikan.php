<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
				<a class="btn btn-default" href="<?php echo base_url(); ?>aplikan"><i class="fa fa-chevron-left"></i></a>
					<span class="caption-subject bold uppercase"><?php echo explode(' ', $judul)[0]; ?></span>
					<span class="caption-helper uppercase"><?php echo explode(' ', $judul)[1]; ?></span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<h4><strong>Data Diri</strong></h4>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<form action="<?php echo base_url(); ?>aplikan/update" method="post" class="form-horizontal">
							<div class="form-group">
								<label class="col-md-3 control-label">No. Pendaftaran</label>
								<div class="col-md-5">
									<input type="text" name="no_pendaftaran" id="no_pendaftaran"  class="form-control input-data" readonly="true" value="<?php echo $data->NO_PENDAFTARAN; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Nama Lengkap</label>
								<div class="col-md-5">
									<input type="text" name="nama" id="nama" class="form-control input-data" disabled="true" value="<?php echo $data->NAMA; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Jenis Kelamin</label>
								<div class="col-md-5">
									<div class="radio-list">
										<label class="radio-inline"><input type="radio" name="jk" id="jkLakiLaki" value="L" class="input-data" disabled="true" <?php echo $data->JENIS_KELAMIN=='L'?'checked':''; ?> > Laki-laki </label>
										<label class="radio-inline"><input type="radio" name="jk" id="jkPerempuan" value="P" class="input-data" disabled="true" <?php echo $data->JENIS_KELAMIN=='P'?'checked':''; ?> > Perempuan </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Tempat Lahir</label>
								<div class="col-md-5">
									<select class="form-control select2me input-data" disabled="true" data-placeholder="Pilih..." name="tmp_lahir" required>
										<option selected><?php echo $data->TEMPAT_LAHIR ?></option>
										<?php foreach ($kota as $k) {
												echo "<option>".$k."</option>";
										} ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Tanggal Lahir</label>
								<div class="col-md-5">
									<input class="form-control form-control-inline input-medium date-picker input-data" disabled="true" name="tgl_lahir" size="16" type="date" placeholder="MM/DD/YYYY" value="<?php echo $data->TANGGAL_LAHIR; ?>" required />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Agama</label>
								<div class="col-md-5">
									<select name="agama" class="form-control input-data" disabled="true">
										<option <?php echo $data->AGAMA=='Islam'?'selected':''; ?>>Islam</option>
										<option <?php echo $data->AGAMA=='Kristen'?'selected':''; ?>>Kristen</option>
										<option <?php echo $data->AGAMA=='Katolik'?'selected':''; ?>>Katolik</option>
										<option <?php echo $data->AGAMA=='Hindu'?'selected':''; ?>>Hindu</option>
										<option <?php echo $data->AGAMA=='Budha'?'selected':''; ?>>Budha</option>
										<option <?php echo $data->AGAMA=='Lainnya'?'selected':''; ?>>Lainnya</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Status Pernikahan</label>
								<div class="col-md-5">
									<div class="radio-list">
										<label class="radio-inline"><input type="radio" name="status" id="statusMenikah" value="1" class="input-data" disabled="true" <?php echo $data->STATUS_PERNIKAHAN==1?'checked':'';?>> Menikah </label>
										<label class="radio-inline"><input type="radio" name="status" id="statusBelumMenikah" value="0" class="input-data" disabled="true" <?php echo $data->STATUS_PERNIKAHAN==0?'checked':'';?>> Belum Menikah </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Kewarganegaraan</label>
								<div class="col-md-5">
									<div class="radio-list">
										<label class="radio-inline"><input type="radio" name="kewarganegaraan" id="wni" value="WNI" class="input-data" disabled="true" <?php echo $data->KEWARGANEGARAAN=='WNI'?'checked':'';?>> WNI </label>
										<label class="radio-inline"><input type="radio" name="kewarganegaraan" id="wna" value="WNA" class="input-data" disabled="true" <?php echo $data->KEWARGANEGARAAN=='WNA'?'checked':'';?>> WNA </label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">No. Identitas</label>
								<div class="col-md-5">
									<input type="text" name="no_identitas" id="no_identitas" class="form-control input-data" disabled="true" value="<?php echo $data->NO_IDENTITAS; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Alamat Tetap</label>
								<div class="col-md-5">
									<textarea name="alamat_tetap" class="form-control input-data" disabled="true" placeholder="Masukkan Alamat Tetap Anda"><?php echo $data->ALAMAT_TETAP; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Alamat Sekarang</label>
								<div class="col-md-5">
									<textarea name="alamat_sekarang" class="form-control input-data" disabled="true" placeholder="Masukkan Alamat Anda Sekarang"><?php echo $data->ALAMAT_SEKARANG; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Pekerjaan</label>
								<div class="col-md-5">
									<input type="text" name="pekerjaan" class="form-control input-data" disabled="true" placeholder="Masukkan Pekerjaan" value="<?php echo $data->PEKERJAAN; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Alamat Kantor</label>
								<div class="col-md-5">
									<textarea name="alamat_kantor" class="form-control input-data" disabled="true" placeholder="Masukkan Alamat Kantor Anda"><?php echo $data->ALAMAT_KANTOR; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Email</label>
								<div class="col-md-5">
									<input type="text" name="email" class="form-control input-data" disabled="true" placeholder="Masukkan Email" value="<?php echo $data->EMAIL; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">No. Handphone</label>
								<div class="col-md-5">
									<input type="text" name="no_hp" id="no_hp" class="form-control input-data" disabled="true" placeholder="08xxxxxxxxxx" value="<?php echo $data->NO_HANDPHONE; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Evaluasi Diri</label>
								<div class="col-md-5">
									<textarea name="evaluasi" id="evaluasi" class="form-control input-data" disabled="true" placeholder="Evaluasi diri"><?php echo $data->EVALUASI_DIRI; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-5" id="box-button">
									<button type="button" class="btn btn-primary" onclick="edit()"><i class="fa fa-pencil"></i> Ubah</button>
								</div>
							</div>
						</form>
					</div>
				</div>

				<br>
				<h4><strong>Anggota Keluarga</strong></h4>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%;" class="table table-bordered">
							<tr>
								<th width="20%" style="text-align:center">Hubungan Keluarga</th>
								<th width="30%" style="text-align:center">Nama Lengkap</th>
								<th width="10%" style="text-align:center">Usia</th>
								<th width="25%" style="text-align:center">Pekerjaan</th>
								<th width="15%" style="text-align:center"></th>
							</tr>
							<?php if (count($keluarga)>0): ?>
							<?php foreach ($keluarga as $kel): ?>
							<tr>
								<td><?php echo $kel->HUBUNGAN_KELUARGA ?></td>
								<td><?php echo $kel->NAMA ?></td>
								<td style="text-align:center"><?php echo $kel->USIA ?></td>
								<td><?php echo $kel->PEKERJAAN ?></td>
								<td style="text-align:center">
									<a href="#modal-keluarga" class="btn btn-xs btn-primary" data-toggle="modal" role="button" onclick="edit_keluarga('<?php echo $data->NO_PENDAFTARAN; ?>',<?php echo $kel->ID ?>)"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo base_url() ?>aplikan/aplikan_act/hapus_keluarga/<?php echo $data->NO_PENDAFTARAN; ?>/<?php echo $kel->ID ?>" class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data anggota keluarga ini')"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php endforeach ?>
							<?php else: ?>
							<tr> 
								<td></td>
								<td></td>
								<td style="text-align:center"></td>
								<td></td>
								<td style="text-align:center">
								</td>
							</tr>
							<?php endif ?>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="pull-right">
							<a href="#modal-keluarga" class="btn btn-success" data-toggle="modal" role="button" onclick="tambah_keluarga('<?php echo $data->NO_PENDAFTARAN; ?>')"><i class="fa fa-plus"> Tambah</i></a>
						</div>
					</div>
				</div>
				<br>
				<h4><strong>Riwayat Pendidikan</strong></h4>
				<hr>				
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%;" class="table table-bordered">
							<tr>
								<th width="20%" style="text-align:center">Nama Lembaga</th>
								<th width="10%" style="text-align:center">Jenis</th>
								<th width="25%" style="text-align:center">Alamat Lembaga</th>
								<th width="10%" style="text-align:center">Tanggal Masuk</th>
								<th width="10%" style="text-align:center">Tanggal Keluar</th>
								<th width="15%" style="text-align:center">Sertifikat</th>
								<th width="10%" style="text-align:center"></th>
							</tr>
							<?php if (count($pendidikan)>0): ?>
							<?php foreach ($pendidikan as $pend): ?>
							<tr>
								<td><?php echo $pend->NAMA_LEMBAGA; ?></td>
								<td style="text-align:center"><?php echo $pend->JENIS; ?></td>
								<td><?php echo $pend->ALAMAT_LEMBAGA; ?></td>
								<td style="text-align:center"><?php echo date("d-m-Y",strtotime($pend->TANGGAL_MULAI)); ?></td>
								<td style="text-align:center"><?php echo date("d-m-Y",strtotime($pend->TANGGAL_SELESAI)); ?></td>
								<td style="text-align:center"><?php echo $pend->SERTIFIKAT; ?></td>
								<td style="text-align:center">
									<a href="#modal-pendidikan" class="btn btn-xs btn-primary" data-toggle="modal" role="button" onclick="edit_pendidikan('<?php echo $data->NO_PENDAFTARAN; ?>',<?php echo $pend->ID ?>)"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo base_url() ?>aplikan/aplikan_act/hapus_pendidikan/<?php echo $data->NO_PENDAFTARAN; ?>/<?php echo $pend->ID ?>" class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data riwayat pendidikan ini')"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php endforeach ?>
							<?php else: ?>
							<tr>
								<td></td>
								<td style="text-align:center"></td>
								<td></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
								<td></td>
							</tr>
							<?php endif ?>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="pull-right">
							<a href="#modal-pendidikan" class="btn btn-success" data-toggle="modal" role="button" onclick="tambah_pendidikan('<?php echo $data->NO_PENDAFTARAN; ?>')" ><i class="fa fa-plus"> Tambah</i></a>
						</div>
					</div>
				</div>
				<br>
				<h4><strong>Riwayat Kerja</strong></h4>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%;" class="table table-bordered">
							<tr>
								<th width="20%" style="text-align:center">Nama Perusahaan</th>
								<th width="20%" style="text-align:center">Jabatan Akhir</th>
								<th width="15%" style="text-align:center">Gaji Per Bulan</th>
								<th width="15%" style="text-align:center">Tanggal Masuk</th>
								<th width="15%" style="text-align:center">Tanggal Keluar</th>
								<th width="15%" style="text-align:center"></th>
							</tr>
							<?php if (count($pekerjaan)>0): ?>
							<?php foreach ($pekerjaan as $krj): ?>
							<tr>
								<td><?php echo $krj->NAMA_PERUSAHAAN ?></td>
								<td><?php echo $krj->JABATAN_AKHIR ?></td>
								<td style="text-align:center"><?php echo $krj->GAJI_PERBULAN ?></td>
								<td style="text-align:center"><?php echo date("d-m-Y",strtotime($krj->TANGGAL_MULAI)) ?></td>
								<td style="text-align:center"><?php echo date("d-m-Y",strtotime($krj->TANGGAL_SELESAI)) ?></td>
								<td style="text-align:center">
									<a href="#modal-pekerjaan" class="btn btn-xs btn-primary" data-toggle="modal" role="button" onclick="edit_pekerjaan('<?php echo $data->NO_PENDAFTARAN; ?>',<?php echo $krj->ID ?>)"><i class="fa fa-pencil"></i></a>
									<a href="<?php echo base_url() ?>aplikan/aplikan_act/hapus_pekerjaan/<?php echo $data->NO_PENDAFTARAN; ?>/<?php echo $krj->ID ?>" class="btn btn-xs btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data riwayat kerja ini')"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							<?php endforeach ?>
							<?php else: ?>
							<tr>
								<td></td>
								<td></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
							</tr>
							<?php endif ?>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="pull-right">
							<a href="#modal-pekerjaan" class="btn btn-success" data-toggle="modal" role="button" onclick="tambah_pekerjaan('<?php echo $data->NO_PENDAFTARAN; ?>')" ><i class="fa fa-plus"> Tambah</i></a>
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>


<div id="modal-keluarga" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Anggota Keluarga
				</div>
			</div>
			<div id="box-modal-keluarga">
		    </div><!-- end #box-modal-keluarga -->
		</div>
	</div>
</div>

<div id="modal-pendidikan" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Riwayat Pendidikan
				</div>
			</div>
			<div id="box-modal-pendidikan">
				
		    </div><!-- end #box-modal-keluarga -->
		</div>
	</div>
</div>

<div id="modal-pekerjaan" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Riwayat Kerja
				</div>
			</div>
			<div id="box-modal-pekerjaan">
				
		    </div><!-- end #box-modal-pekerjaan -->
		</div>
	</div>
</div>

<script>
	function edit()
	{
		$('.input-data').removeAttr('disabled');
		$('#box-button').html('<button class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>'+
		'<button type="button" class="btn btn-default" onclick="location.reload()"><i class="fa fa-times"></i> Batal</button> ');
	}

	function tambah_keluarga(no_pendaftaran)
	{
		$.ajax({
			url 	: '<?php echo base_url() ?>aplikan/aplikan_act/tambah_keluarga',
			type 	: 'post',
			data 	: {'no_pendaftaran':no_pendaftaran},
			success : function(r)
			{
				$('#box-modal-keluarga').html(r);
			},
			error 	: function(r)
			{
				alert("Sistem error, please contact administrator !");
				$('#box-modal-keluarga').html('');
			}
		});
	}
	
	function edit_keluarga(no_pendaftaran,id)
	{
		$.ajax({
			url 	: '<?php echo base_url() ?>aplikan/aplikan_act/edit_keluarga',
			type 	: 'post',
			data 	: {'no_pendaftaran':no_pendaftaran,'id_kel':id},
			success : function(r)
			{
				$('#box-modal-keluarga').html(r);
			},
			error 	: function(r)
			{
				alert("Sistem error, please contact administrator !");
				$('#box-modal-keluarga').html('');
			}
		});
	}

	function tambah_pendidikan(no_pendaftaran)
	{
		$.ajax({
			url 	: '<?php echo base_url() ?>aplikan/aplikan_act/tambah_pendidikan',
			type 	: 'post',
			data 	: {'no_pendaftaran':no_pendaftaran},
			success : function(r)
			{
				$('#box-modal-pendidikan').html(r);
			},
			error 	: function(r)
			{
				alert("Sistem error, please contact administrator !");
				$('#box-modal-pendidikan').html('');
			}
		});
	}
	
	function edit_pendidikan(no_pendaftaran,id)
	{
		$.ajax({
			url 	: '<?php echo base_url() ?>aplikan/aplikan_act/edit_pendidikan',
			type 	: 'post',
			data 	: {'no_pendaftaran':no_pendaftaran,'id_pend':id},
			success : function(r)
			{
				$('#box-modal-pendidikan').html(r);
			},
			error 	: function(r)
			{
				alert("Sistem error, please contact administrator !");
				$('#box-modal-pendidikan').html('');
			}
		});
	}

	function tambah_pekerjaan(no_pendaftaran)
	{
		$.ajax({
			url 	: '<?php echo base_url() ?>aplikan/aplikan_act/tambah_pekerjaan',
			type 	: 'post',
			data 	: {'no_pendaftaran':no_pendaftaran},
			success : function(r)
			{
				$('#box-modal-pekerjaan').html(r);
			},
			error 	: function(r)
			{
				alert("Sistem error, please contact administrator !");
				$('#box-modal-pendidikan').html('');
			}
		});
	}
	
	function edit_pekerjaan(no_pendaftaran,id)
	{
		$.ajax({
			url 	: '<?php echo base_url() ?>aplikan/aplikan_act/edit_pekerjaan',
			type 	: 'post',
			data 	: {'no_pendaftaran':no_pendaftaran,'id_krj':id},
			success : function(r)
			{
				$('#box-modal-pekerjaan').html(r);
			},
			error 	: function(r)
			{
				alert("Sistem error, please contact administrator !");
				$('#box-modal-pekerjaan').html('');
			}
		});
	}



</script>
