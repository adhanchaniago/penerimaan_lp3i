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
					<div class="col-md-offset-1 col-md-11">
						<table style="width:100%;" >
							<tr> <td style="width:20%;"><strong>No. Pendaftaran</strong></td> <td style="width:2%">:</td> <td><?php echo $data->NO_PENDAFTARAN; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Nama Lengkap</strong></td> <td style="width:2%">:</td> <td><?php echo $data->NAMA; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Jenis Kelamin</strong></td> <td style="width:2%">:</td> <td><?php echo $data->JENIS_KELAMIN=='L'?'Laki-laki':'Perempuan'; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Tempat, Tanggal Lahir</strong></td> <td style="width:2%">:</td> <td><?php echo $data->TEMPAT_LAHIR; ?>,<?php echo date("d-m-Y",strtotime($data->TANGGAL_LAHIR)); ?>,</td> </tr>
							<tr> <td style="width:20%"><strong>Agama</strong></td> <td style="width:2%">:</td> <td><?php echo $data->AGAMA; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Status Pernikahan</strong></td> <td style="width:2%">:</td> <td><?php echo $data->STATUS_PERNIKAHAN==0?'Belum Menikah':'Menikah'; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Kewarganegaraan</strong></td> <td style="width:2%">:</td> <td><?php echo $data->KEWARGANEGARAAN; ?></td> </tr>
							<tr> <td style="width:20%"><strong>No. Identitas</strong></td> <td style="width:2%">:</td> <td><?php echo $data->NO_IDENTITAS; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Alamat Tetap</strong></td> <td style="width:2%">:</td> <td><?php echo $data->ALAMAT_TETAP; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Alamat Sekarang</strong></td> <td style="width:2%">:</td> <td><?php echo $data->ALAMAT_SEKARANG; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Pekerjaan</strong></td> <td style="width:2%">:</td> <td><?php echo $data->PEKERJAAN; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Alamat Kantor</strong></td> <td style="width:2%">:</td> <td><?php echo $data->ALAMAT_KANTOR; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Email</strong></td> <td style="width:2%">:</td> <td><?php echo $data->EMAIL; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Evaluasi Diri</strong></td> <td style="width:2%">:</td> <td><?php echo $data->EVALUASI_DIRI; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Status validasi</strong></td> <td style="width:2%">:</td> <td><?php echo $data->VALID==0?'Belum Tervalidasi':'Sudah Tervalidasi'; ?></td> </tr>
							<tr> <td style="width:20%"><strong>Tanggal Daftar</strong></td> <td style="width:2%">:</td> <td><?php echo date("d-m-Y",strtotime($data->TANGGAL_DAFTAR)); ?></td> </tr>
							<tr> <td style="width:20%"><strong>Sumber Informasi</strong></td> <td style="width:2%">:</td> <td><?php echo $data->SUMBER_INFORMASI; ?></td> </tr>
						</table>
					</div>
				</div>
				<br>
				<h4><strong>Anggota Keluarga</strong></h4>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table style="width:100%;" class="table table-bordered">
							<tr>
								<th width="25%" style="text-align:center">Hubungan Keluarga</th>
								<th width="30%" style="text-align:center">Nama Lengkap</th>
								<th width="20%" style="text-align:center">Usia</th>
								<th width="35%" style="text-align:center">Pekerjaan</th>
							</tr>
							<?php if (count($keluarga)>0): ?>
							<?php foreach ($keluarga as $kel): ?>
							<tr>
								<td><?php echo $kel->HUBUNGAN_KELUARGA ?></td>
								<td><?php echo $kel->NAMA ?></td>
								<td style="text-align:center"><?php echo $kel->USIA ?></td>
								<td><?php echo $kel->PEKERJAAN ?></td>
							</tr>
							<?php endforeach ?>
							<?php else: ?>
							<tr> 
								<td></td>
								<td></td>
								<td style="text-align:center"></td>
								<td></td>
							</tr>
							<?php endif ?>
						</table>
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
								<th width="15%" style="text-align:center">Tanggal Masuk</th>
								<th width="15%" style="text-align:center">Tanggal Keluar</th>
								<th width="15%" style="text-align:center">Sertifikat</th>
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
							</tr>
							<?php endif ?>
						</table>
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
							</tr>
							<?php if (count($pekerjaan)>0): ?>
							<?php foreach ($pekerjaan as $krj): ?>
							<tr>
								<td><?php echo $krj->NAMA_PERUSAHAAN ?></td>
								<td><?php echo $krj->JABATAN_AKHIR ?></td>
								<td style="text-align:center"><?php echo $krj->GAJI_PERBULAN ?></td>
								<td style="text-align:center"><?php echo date("d-m-Y",strtotime($krj->TANGGAL_MULAI)) ?></td>
								<td style="text-align:center"><?php echo date("d-m-Y",strtotime($krj->TANGGAL_SELESAI)) ?></td>
							</tr>
							<?php endforeach ?>
							<?php else: ?>
							<tr>
								<td></td>
								<td></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
								<td style="text-align:center"></td>
							</tr>
							<?php endif ?>
						</table>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
