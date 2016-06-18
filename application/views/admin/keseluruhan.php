<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase"><?php echo explode(',', $judul)[0]; ?></span>
					<span class="caption-helper uppercase"><?php echo explode(',', $judul)[1]; ?></span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-toolbar">
					<div>
						<center><u><b>PENGUMUMAN PMB</b></u></center>
					</div>
					<div>
						<center>Periode tahun : 2016/2017</center>
					</div>
					<br>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="5%" style="text-align:center;">NO.</th>
								<th width="20%" style="text-align:center;">NAMA</th>
								<th width="25%" style="text-align:center;">ALAMAT</th>
								<th width="15%" style="text-align:center;">No. HP</th>
								<th width="25%" style="text-align:center;">DITERIMA DI JURUSAN</th>
								<th width="10%" style="text-align:center;">TOTAL NILAI</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($pendaftar as $pendaftar): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><a href="<?php echo base_url(); ?>laporan/detail/<?php echo $pendaftar->NO_PENDAFTARAN ?> "><?= $pendaftar->NAMA ?></a></td>
								<td><?= $pendaftar->ALAMAT_TETAP?></td>
								<td><?= $pendaftar->NO_HANDPHONE ?></td>
								<td>EKONOMI</td>
								<td>100</td>
							</tr>	
							<?php endforeach ?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-md-12">
							<div class="btn-group pull-right">
								<a class="btn green" href="<?php echo base_url().'laporan/cetak/all'; ?>"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 
<div id="modal-validasi" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					Validasi Aplikan
				</div>
			</div>
			<div class='modal-body no-padding'>
				<input type="hidden" name="no_pendaftaran" id="no_pendaftaran" />
				<div class="row" id="bukti_list">	</div>
			</div>
			<div class='modal-footer no-margin-top'>
				<button class='btn btn-primary btn-sm pull-left' type='submit'>
					<i class='ace-icon fa fa-check'></i> Validasi
				</button>
				<button class='btn btn-sm btn-danger pull-right' data-dismiss='modal'>
					<i class='ace-icon fa fa-times'></i> Tutup
				</button>
			</div>
		</div>
	</div>
</div> -->

<script type="text/javascript">
</script>