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
				<a class="btn btn-default" href="<?php echo base_url(); ?>jadwal"><i class="fa fa-chevron-left"></i></a>
					<span class="caption-subject bold uppercase"><?php echo explode(' ', $judul)[0]; ?></span>
					<span class="caption-helper uppercase"><?php echo explode(' ', $judul)[1]; ?></span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<p><strong>Detil Tes</strong></p>
				<table>
					<?php foreach ($jadwal as $key => $value) {
						if($key != "ID") {
							if($key == "TANGGAL") $value = date("d M Y", strtotime($value));
							echo "<tr>
								<td style='font-weight: bold;' width='100px'>".ucwords(strtolower($key))."</td>
								<td>:</td>
								<td>".$value."</td>
							</tr>";
						}
					} ?>
				</table>
				<div class="row">
					<div class="col-xs-12">
						<button type="submit" id="btnSimpan" class="btn btn-md blue pull-right" data-toggle="modal" href="#tambah_peserta"><i class="fa fa-plus"></i> Tambah</button>
					</div>
				</div>
				<hr>
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								No. Pendaftaran
							</th>
							<th>
								Nama
							</th>
							<th>
								Jenis Kelamin
							</th>
							<th>
								Alamat
							</th>
							<th>
								No. Telp/HP
							</th>
							<th style="text-align: center;">
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($peserta as $p) {
							$jk = $p->JENIS_KELAMIN=="L"?"Laki-laki":"Perempuan";
							echo "<tr class='odd gradeX'>
								<td style='width: 10%;' class='no_pendaftaran'>".$p->NO_PENDAFTARAN."</td>
								<td style='width: 25%;'>".$p->NAMA."</td>
								<td style='width: 10%;'>".$jk."</td>
								<td style='width: 30%;'>".$p->ALAMAT_TETAP."</td>
								<td style='width: 20%;'>".$p->NO_HANDPHONE."</td>
								<td style='width: 5%;text-align: center;'>
								<a href='".base_url()."jadwal/participant_del/".$p->NO_PENDAFTARAN."/".$p->ID."' class='btn btn-xs btn-danger' onclick='hapus(".$p->NO_PENDAFTARAN.")'><i class='fa fa-trash'></i></a>
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


	<div class="modal fade" id="tambah_peserta" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Tambah Peserta</h4>
				</div>
				<div class="modal-body">
				<form action="<?= base_url(); ?>jadwal/participant_patch" method="post">
				<input type="hidden" name="jadwal" id="jadwal" value="<?= $jadwal->ID; ?>">
				<table class="table table-striped table-bordered table-hover" id="sample_1">
					<thead>
						<tr>
							<th>
								No. Pendaftaran
							</th>
							<th>
								Nama
							</th>
							<th>
								Alamat
							</th>
							<th>
								No. Telp/HP
							</th>
							<th class="table-checkbox" style="text-align: center;">
								<input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($pendaftar as $p) {
							echo "<tr class='odd gradeX'>
								<td style='width: 10%;' class='no_pendaftaran'>".$p->NO_PENDAFTARAN."</td>
								<td style='width: 25%;'>".$p->NAMA."</td>
								<td style='width: 30%;'>".$p->ALAMAT_TETAP."</td>
								<td style='width: 20%;'>".$p->NO_HANDPHONE."</td>
								<td style='width: 5%;text-align: center;'>
									<input type='checkbox' name='pendaftar[]' class='checkboxes' value='".$p->NO_PENDAFTARAN."'/>
								</td>
							</tr>
							";
							$no++;
						} ?>
					</tbody>
				</table>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btnSimpan" class="btn btn-md green pull-right"><i class="fa fa-save"></i> Simpan</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->