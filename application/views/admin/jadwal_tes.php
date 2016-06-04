<?php if (isset($_SESSION['pesan'])) { ?>
  <div class="alert alert-block alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>
    <?php echo $this->session->flashdata('pesan'); ?>
  </div>
<?php } ?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase"><?php echo explode(' ', $judul)[0]; ?></span>
					<span class="caption-helper uppercase"><?php echo explode(' ', $judul)[1]; ?></span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div class="row">
						<div class="btn-group pull-right">
							<a class="btn green" href="#modal-add" data-toggle="modal" role="button">Buat Jadwal Baru <i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								No.
							</th>
							<th>
								Tahap
							</th>
							<th>
								Tanggal
							</th>
							<th>
								Tempat
							</th>
							<th>
								Ruang
							</th>
							<th>
								Opsi
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($jadwal as $j) {
							echo "<tr>
								<td style='width: 5%;text-align: right;'>".$no.".</td>
								<td style='width: 15%;'>".$j->TAHAP."</td>
								<td style='width: 10%;'>".date('d M Y', strtotime($j->TANGGAL))."</td>
								<td style='width: 25%;'>".$j->TEMPAT."</td>
								<td style='width: 20%;'>".$j->RUANG."</td>
								<td style='width: 25%;text-align: center;'>
									<div class='hidden-sm hidden-xs action-buttons'>
										<a class='btn btn-xs btn-success' href='#modal-edit' data-toggle='modal' role='button'>
											<i class='ace-icon fa fa-pencil'></i> Ubah
										</a>

										<a class='btn btn-xs btn-primary' href='".base_url().'index.php/jadwal/participant/'.$j->ID."'>
											<i class='ace-icon fa fa-user'></i> Peserta
										</a>

										<a class='btn btn-xs purple' href='".base_url().'index.php/jadwal/brodcast/'.$j->ID."'>
											<i class='ace-icon fa fa-envelope'></i> Brodcast
										</a>

										<a class='btn btn-xs btn-danger' href='".base_url().'index.php/jadwal/delete/'.$j->ID."' onclick='return confirm(\"Anda yakin?\");'>
											<i class='ace-icon fa fa-trash-o'></i> Hapus
										</a>
									</div>
								</td>
							</tr>
							";
							$no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="modal-add" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Buat Jadwal Tes
				</div>
			</div>
			<form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/jadwal/baru'; ?>" method="post" enctype="multipart/form-data">
			<div class='modal-body no-padding'>
				<div class="form-group">
					<label class='col-sm-3 control-label no-padding-right' for='tahap'>Tahap Tes</label>
					<div class='col-sm-9'>
						<select id='tahap' name="tahap" placeholder='Tahap Tes' class='form-control' required="" >
							<option></option>
							<option>Akademik</option>
							<option>Minat Bakat</option>
							<option>Wawancara</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class='col-sm-3 control-label no-padding-right' for='tanggal'>Tanggal</label>
					<div class='col-sm-3'>
						<input type="date" id='tanggal' name="tanggal" placeholder='Tanggal Tes' class='form-control' required="" />
					</div>
				</div>

				<div class="form-group">
					<label class='col-sm-3 control-label no-padding-right' for='tempat'>Tempat</label>
					<div class='col-sm-9'>
						<input type="text" id='tempat' name="tempat" placeholder='Tempat Tes' class='form-control' required="" />
					</div>
				</div>

				<div class="form-group">
					<label class='col-sm-3 control-label no-padding-right' for='ruang'>Ruang</label>
					<div class='col-sm-9'>
						<input type="text" id='ruang' name="ruang" placeholder='Ruang Tes' class='form-control' required="" />
					</div>
				</div>
			</div>
			<div class='modal-footer no-margin-top'>
				<button class='btn btn-sm btn-danger pull-left' data-dismiss='modal'>
					<i class='ace-icon fa fa-times'></i> Tutup
				</button>&nbsp;
				<button class='btn btn-success btn-sm' type='submit'>
					<i class='ace-icon fa fa-check'></i> Simpan
				</button>
			</div>
			</form>
		</div>
	</div>
</div>