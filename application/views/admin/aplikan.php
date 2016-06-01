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
							<a class="btn green" href="<?php echo base_url().'index.php/page/register'; ?>">Tambah Aplikan Baru <i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
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
								Tempat, Tanggal Lahir
							</th>
							<th>
								Alamat
							</th>
							<th>
								No. Telepon
							</th>
							<th>
								Email
							</th>
							<th>
								Valid
							</th>
							<th>
								Opsi
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pendaftar as $p) {
							$jk = $p->JENIS_KELAMIN=="L"?"Laki-laki":"Perempuan";
							$valid = $p->VALID=="0"?"Belum Tervalidasi":"Sudah Tervalidasi";
							echo "<tr>
								<td>".$p->NO_PENDAFTARAN."</td>
								<td>".$p->NAMA."</td>
								<td>".$jk."</td>
								<td>".$p->TEMPAT_LAHIR.", ".date("d M Y", strtotime($p->TANGGAL_LAHIR))."</td>
								<td>".$p->ALAMAT_TETAP."</td>
								<td>".$p->NO_TELEPON."</td>
								<td>".$p->EMAIL."</td>
								<td>".$valid."</td>
								<td style='text-align: center;'>
									<div class='hidden-sm hidden-xs action-buttons'>
										<a class='btn btn-xs btn-primary' href='".base_url().'index.php/aplikan/ubah/'.$p->NO_PENDAFTARAN."'>
											<i class='ace-icon fa fa-pencil'></i> Ubah
										</a>

										<a class='btn btn-xs green' href='".base_url().'index.php/aplikan/detil/'.$p->NO_PENDAFTARAN."'>
											<i class='ace-icon fa fa-user'></i> Detil
										</a>";

										if($p->VALID == 0) {
										echo "<a class='btn btn-xs purple' href='".base_url().'index.php/aplikan/validasi/'.$p->NO_PENDAFTARAN."' onclick='return confirm(\"Anda yakin?\");'>
											<i class='ace-icon fa fa-check'></i> Validasi
										</a>";
										}

										echo "<a class='btn btn-xs btn-danger' href='".base_url().'index.php/aplikan/hapus/'.$p->NO_PENDAFTARAN."' onclick='return confirm(\"Anda yakin?\");'>
											<i class='ace-icon fa fa-trash-o'></i> Hapus
										</a>
									</div>
								</td>
							</tr>";
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>