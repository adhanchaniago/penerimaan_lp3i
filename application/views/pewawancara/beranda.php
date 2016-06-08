	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-block alert-info fade in">
				<button type="button" class="close" data-dismiss="alert"></button>
				<h4 class="alert-heading"><b>Pemberitahuan!</b></h4>
				<p>
					Pelaksanaan ujian wawancara terdekat pada tanggal <?= date("d-m-Y",strtotime($tanggal_tes)) ?>. Ujian hanya dapat di lakukan pada tanggal tersebut.
				</p>
			</div><!-- end.alert -->
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
		      <div class="portlet-title">
		        <div class="caption font-dark">
		          <span class="caption-subject bold uppercase">Daftar</span>
		          <span class="caption-helper uppercase">Peserta Tes</span>
		        </div>
		        <div class="actions">
		          <a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
		        </div>
		      </div>
		      <div class="portlet-body">
		      	<?php $notif = $this->session->flashdata('pesan'); ?>
		      	<?php if (isset($notif)): ?>
		        <div class="alert alert-block alert-success fade in">
		          <button type="button" class="close" data-dismiss="alert"></button>
		          <p>
		            <?php $notif; ?>
		          </p>
		        </div><!-- end.alert -->
		        <?php endif ?>
		        <table id="sample_1" class="table table-striped table-bordered table-hover">
		          <thead>
		            <tr>
		              <th width="5%">No.</th>
		              <th width="15%">No. Pendaftaran</th>
		              <th width="20%">Nama</th>
		              <th width="10%">JK</th>
		              <th width="15%">TTL</th>
		              <th width="10%">No.HP</th>
		              <th width="10%">Total Nilai</th>
		              <th width="10%">Opsi</th>
		            </tr>
		          </thead>
		          <tbody>
		          <?php $no = 1; ?>
		          <?php foreach ($peserta as $p): ?>
		          	<?php $cek	= $this->tbl_tes_wawancara->get_id($p->NO_PENDAFTARAN,$no_tes,$pewawancara);?>
		          	<?php if (count($cek) > 0){ ?>
		          		<?php $p->JENIS_KELAMIN=='L' ? $jk='Laki - laki' : $jk='Perempuan';  ?>
			          	<tr>
			          		<td style="text-align:center;"><?= $no++ ?></td>
			          		<td><?= $p->NO_PENDAFTARAN ?></td>
			          		<td><?= $p->NAMA ?></td>
			          		<td><?= $jk ?></td>
			          		<td><?= $p->TEMPAT_LAHIR ?>, <?= date("d-m-Y",strtotime($p->TANGGAL_LAHIR)) ?></td>
			          		<td><?= $p->NO_HANDPHONE ?></td>
			          		<td style="text-align:center;"><b><?= $cek[0]->TOTAL_NILAI ?></b></td>
			          		<td style="text-align:center;">
			          			<?php if (date("Y-m-d")==$p->TANGGAL): ?>
			          			<a href="<?= base_url() ?>pewawancara/edit_tes/<?= $p->NO_PENDAFTARAN ?>" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
			          			<?php endif ?>
			          		</td>
			          	</tr>
		          	<?php  } else { ?>
		          	<?php $p->JENIS_KELAMIN=='L' ? $jk='Laki - laki' : $jk='Perempuan';  ?>
		          	<tr>
		          		<td style="text-align:center;"><?= $no++ ?></td>
		          		<td><?= $p->NO_PENDAFTARAN ?></td>
		          		<td><?= $p->NAMA ?></td>
		          		<td><?= $jk ?></td>
		          		<td><?= $p->TEMPAT_LAHIR ?>, <?= date("d-m-Y",strtotime($p->TANGGAL_LAHIR)) ?></td>
		          		<td><?= $p->NO_HANDPHONE ?></td>
		          		<td style="text-align:center;"><b></b></td>
		          		<td style="text-align:center;">
		          			<?php if (date("Y-m-d")==$p->TANGGAL): ?>
		          			<a href="<?= base_url() ?>pewawancara/tes/<?= $p->NO_PENDAFTARAN ?>" class="btn btn-success"><i class="fa fa-check-square-o"></i> Beri nilai</a>
		          			<?php endif ?>
		          		</td>
		          	</tr>
		          	<?php } ?>
		          <?php endforeach ?>
		          </tbody>
		        </table>
		      </div>
		    </div>
		</div>
	</div>