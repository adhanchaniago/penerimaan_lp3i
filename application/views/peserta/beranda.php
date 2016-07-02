	<?php if (isset($_SESSION['pesan'])) { ?>
		<div class="alert alert-block alert-info" role="alert">
			<button type="button" class="close" data-dismiss="alert">
			  <i class="ace-icon fa fa-times"></i>
			</button>
			<?php echo $this->session->flashdata('pesan'); ?>
		</div>
	<?php } ?>

	<?php if($pendaftar[0]->VALID == 0): ?>
		<?php if(count($bukti) == 0): ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-block alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert"></button>
					<h4 class="alert-heading"><b>Pemberitahuan!</b></h4>
					<p>
						Akun anda belum tervalidasi , lakukan pembayaran dan upload bukti pembayaran untuk dapat melihat jadwal ujian. 
					</p>
					<p>
					<a class="btn purple" data-toggle="modal" href="#upload_bukti">
						Upload bukti </a>
					</p>
				</div>
			</div>
		</div>
		<?php else: ?>
			<div class="alert alert-block alert-info" role="alert">
			<button type="button" class="close" data-dismiss="alert">
			  	<i class="ace-icon fa fa-times"></i>
			</button>
			<strong>Informasi!</strong> No. Pendaftaran Anda belum divalidasi, mohon tunggu paling lambat 1x24 jam untuk divalidasi oleh Admin PMB LP3I Surabaya.
		</div>
		<?php endif	?>
	<?php endif	?>
	
	<div class="row">
	<?php if ($tampil['akademik'] != null && $tampil['akademik']->TANGGAL >= date("Y-m-d")) : ?>
	<?php if ($tampil['akademik']->VALID == '1'): ?>
	<?php if ($tampil['akademik']->TOTAL_NILAI <= 0): ?>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="dashboard-stat blue-madison">
				<div class="visual">
					<i class="fa fa-graduation-cap"></i>
				</div>
				<div class="details">
					<div class="number">
						 UJIAN AKADEMIK
					</div>
					<div class="desc">
						Pelaksanaan : 
						 <?php echo date("d-m-Y",strtotime($ujian['akademik']->TANGGAL)); ?>
					</div>
				</div>
				<?php $link_akademik = $ujian['akademik']->TANGGAL==date("Y-m-d")? base_url().'peserta/ujian/akademik/'.$jadwal['akademik']:'#'; ?>
				<a class="more" href="<?php echo $link_akademik; ?>">
				Mulai ujian<i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	<?php endif ?>
	<?php endif ?>
	<?php endif ?>

	<?php if ($tampil['bakat'] != null && $tampil['bakat']->TANGGAL >= date("Y-m-d")) : ?>
	<?php if ($tampil['bakat']->VALID == '1'): ?>
	<?php if ($tampil['bakat']->TOTAL_NILAI <= 0): ?>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="dashboard-stat red-intense">
				<div class="visual">
					<i class="fa fa-puzzle-piece"></i>
				</div>
				<div class="details">
					<div class="number">
						 UJIAN MINAT BAKAT
					</div>
					<div class="desc">
						 Pelaksanaan : 
						 <?php echo date("d-m-Y",strtotime($ujian['bakat']->TANGGAL)); ?>
					</div>
				</div>
								<?php $link_bakat = $ujian['bakat']->TANGGAL==date("Y-m-d")? base_url().'peserta/ujian/bakat/'.$jadwal['bakat']:'#'; ?>
				<a class="more" href="<?php echo $link_bakat; ?>">
				Mulai ujian <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	<?php endif ?>
	<?php endif ?>
	<?php endif ?>

	<?php if ($tampil['wawancara'] != null && $tampil['wawancara']->TANGGAL >= date("Y-m-d")) : ?>
	<?php if ($tampil['wawancara']->VALID == '1'): ?>
	<?php if ($tampil['wawancara']->TOTAL_NILAI <= 0): ?>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="dashboard-stat green-haze">
				<div class="visual">
					<i class="fa fa-comments"></i>
				</div>
				<div class="details">
					<div class="number">
						 UJIAN WAWANCARA
					</div>
					<div class="desc">
						 Pelaksanaan : 
						 <?php echo date("d-m-Y",strtotime($ujian['wawancara']->TANGGAL)); ?>	
					</div>
				</div>
				<a class="more" data-toggle="modal" href="#detail_wawancara">
				Lihat lokasi <i class="m-icon-swapright m-icon-white"></i>
				</a>
			</div>
		</div>
	<?php endif ?>
	<?php endif ?>
	<?php endif ?>
	</div>
	
	<?php if ($hasil_tes): ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption caption-md font-blue">
						<i class="fa fa-graduation-cap font-blue"></i>
						<span class="caption-subject theme-font bold uppercase">PENGUMUMAN HASIL TES</span>
					</div>
				</div>
				<div class="portlet-body">
					<p>Pengumuman Hasil Tes dari saudara , </p>
					<table style="margin-left:50px;">
						<tr>
							<td>Nama Lengkap</td>
							<td>&nbsp; : &nbsp;</td>
							<td><?php echo $pendaftar[0]->NAMA ?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal lahir</td>
							<td>&nbsp; : &nbsp;</td>
							<td><?php echo $pendaftar[0]->TEMPAT_LAHIR ?>, <?php echo date("d-m-Y",strtotime($pendaftar[0]->TANGGAL_LAHIR)) ?></td>
						</tr>
						<tr>
							<td>Jenis kelamin</td>
							<td>&nbsp; : &nbsp;</td>
							<td><?php echo $pendaftar[0]->JENIS_KELAMIN=='L'?'Laki - laki':'Perempuan' ?></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>&nbsp; : &nbsp;</td>
							<td><?php echo $pendaftar[0]->ALAMAT_TETAP ?></td>
						</tr>
						<tr>
							<td>No. handphone</td>
							<td>&nbsp; : &nbsp;</td>
							<td><?php echo $pendaftar[0]->NO_HANDPHONE ?></td>
						</tr>
					</table>
					<br>
					<?php if ($status_hasil == 'DITERIMA'): ?>
					<p>Telah dinyatakan <strong><?php echo $status_hasil ?></strong> sebagai mahasiswa pada LP3I pada jurusan <strong><?php echo strtoupper($jurusan) ?></strong>, Dengan total nilai ujian <strong><?php echo $total_nilai ?></strong></p>
					<?php else: ?>
					<p>Telah dinyatakan <strong><?php echo $status_hasil ?></strong>, Dengan total nilai ujian <strong><?php echo $total_nilai ?></strong></p>
					<?php endif ?>
					<p><a href="#detil_hasil" data-toggle="modal">Lihat Detail Nilai</a></p>
				</div>
			</div><!-- end.portlet -->
		</div>
	</div>
	<?php endif ?>

	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption caption-md font-blue">
						<i class="fa fa-bullhorn font-blue"></i>
						<span class="caption-subject theme-font bold uppercase">INFORMATIONS</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 308px;" data-always-visible="1" data-rail-visible="0">
						<ul class="feeds">
							<?php foreach ($informasi as $info) {
								echo "<li>
								<div class='col1'>
									<div class='cont'>
										<div class='cont-col1'>
											<div class='label label-sm label-info'>
												<i class='fa fa-calendar'></i>
											</div>
										</div>
										<div class='cont-col2'>
											<div class='desc'>

										<strong>".date('d M Y', strtotime($info['tanggal']))."</strong>: ".$info['judul']."
									
											</div>
										</div>
									</div>
								</div>
								</li>";
							} ?>
						</ul>
					</div>
				</div>
			</div><!-- end.portlet -->
		</div>
	</div>
	<?php if (count($bukti) == 0): ?>
	<div class="modal fade" id="upload_bukti" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class='form-horizontal' role='form' action='<?php echo base_url()."upload/do_upload"; ?>' method='post' enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Upload Bukti Pembayaran</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="bukti" class="control-label col-md-4">Pilih File</label>
						<div class="col-md-6">
							<input type="file" id="bukti" name="bukti" accept=".jpg,.png,.bmp" class="form-control" required>
							<p class="help-block">
								 file type : jpg, bmp, png, pdf.
							</p>
						</div>
					</div>

					<div class="form-group">
						<label for="keterangan" class="control-label col-md-4">Keterangan</label>
						<div class="col-md-6">
							<input type="text" id="keterangan" name="keterangan" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-cloud-upload"></i>
						Simpan
					</button>
					<button class="btn" type="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Cancel
					</button>
				</div>
				</form>	
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<?php endif ?>

	<div class="modal fade" id="detail_wawancara" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Detail Tes Wawancara</h4>
				</div>
				<div class="modal-body">
					<?php if(count($jadwal_wawancara) > 0) { ?> 
					 <table>
					 	<tr>
					 		<td width="20%"><b>Tanggal</b></td>
					 		<td width="5%">:</td>
					 		<td width="40%"><?= date("d-m-Y",strtotime($jadwal_wawancara->TANGGAL)) ?></td>
					 	</tr>
					 	<tr>
					 		<td width="20%"><b>Tempat</b></td>
					 		<td width="5%">:</td>
					 		<td width="40%"><?= $jadwal_wawancara->TEMPAT ?></td>
					 	</tr>
					 	<tr>
					 		<td width="20%"><b>Ruang</b></td>
					 		<td width="5%">:</td>
					 		<td width="40%"><?= $jadwal_wawancara->RUANG ?></td>
					 	</tr>
					 </table>
					<?php } else {
						echo "Wawancara belum terjadwal. Silahkan tunggu informasi lebih lanjut.";
					} ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<?php if ($hasil_tes): ?>
	<div class="modal fade" id="detil_hasil" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class='form-horizontal' role='form' action='<?php echo base_url()."upload/do_upload"; ?>' method='post' enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Detil Hasil Tes</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered">
						<tr>
							<th colspan="3" style="text-align:center;">AKADEMIK</th>
						</tr>
						<tr>
							<td width="5%" style="text-align:center;">NO.</td>
							<td width="80%" style="text-align:center;">BIDANG</td>
							<td width="15%" style="text-align:center;">NILAI</td>
						</tr>
						<?php $no = 1; ?>
						<?php foreach ($bidang_akademik as $akademik): ?>
						<tr>
							<td style="text-align:center;"><?php echo $no++ ?></td>
							<td><?php echo $akademik->NAMA_BIDANG_SOAL ?></td>
							<?php 
								$cond_t = array(
										'detil_tes_akademik.NO_PENDAFTARAN' => $pendaftar[0]->NO_PENDAFTARAN,
										'jawaban_akademik.NILAI' => 1,
										'bidang_soal_akademik.ID_BIDANG_SOAL' => $akademik->ID_BIDANG_SOAL
									);
								$benar = count($this->tbl_detail_tes_akademik->join_all($cond_t));
								$nilai_benar = $benar * $bobot_nilai;
							?>
							<td style="text-align:center;"><?php echo round($nilai_benar, 0) ?></td>
						</tr>	
						<?php endforeach ?>
						<tr>
							<td colspan="2" style="text-align:right;">Total Nilai Akademik</td>
							<td style="text-align:center;"><b><?php echo $total_akademik ?></b></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right;"><b>B x K</b></td>
							<td style="text-align:center;"><b><?php echo round(($total_akademik*70)/100); ?></b></td>
						</tr>
					</table>
					<br>
					<table class="table table-bordered">
						<tr>
							<th colspan="3" style="text-align:center;">Wawancara</th>
						</tr>
						<tr>
							<td width="5%" style="text-align:center;">NO.</td>
							<td width="80%" style="text-align:center;">BIDANG</td>
							<td width="15%" style="text-align:center;">NILAI</td>
						</tr>
						<?php $no = 1; ?>
						<?php foreach ($kriteria as $kriteria): ?>
						<tr>
							<td style="text-align:center;"><?php echo $no++ ?></td>
							<td><?php echo $kriteria->NAMA_KRITERIA ?></td>
							<td style="text-align:center;"><?php echo $kriteria->SKOR ?></td>
						</tr>
						<?php endforeach ?>
						<tr>
							<td colspan="2" style="text-align:right;">Total Nilai Wawancara</td>
							<td style="text-align:center;"><b><?php echo $total_wawancara; ?></b></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:right;"><b>B x K</b></td>
							<td style="text-align:center;"><b><?php echo round(($total_wawancara*30)/100); ?></b></td>
						</tr>
					</table>
					<br>
					<p>Total nilai Keseluruhan : <strong><?php echo $total_nilai ?></strong></p>

				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal">
						Tutup
					</button>
				</div>
				</form>	
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<?php endif ?>