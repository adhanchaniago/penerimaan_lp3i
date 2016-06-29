<h1>Beranda</h1><hr>
<div class="row">
	<div class="col-md-6">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase">Info</span>
					<span class="caption-helper">informasi pmb terbaru</span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<ul>
					<?php foreach ($informasi as $info) {
						echo "<li>
						<strong>".date('d M Y', strtotime($info['tanggal']))."</strong>: ".$info['judul']."
						</li>";
					} ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase">Jadwal</span>
					<span class="caption-helper">informasi jadwal kegiatan pmb</span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<ol>
					<?php foreach ($jadwal as $j) {
						echo "<li>
						<strong>".date('d M Y', strtotime($j->TANGGAL))."</strong> - ".$j->TAHAP." @".$j->TEMPAT." (".$j->RUANG.")
						</li>";
					} ?>
				</ol>
			</div>
		</div>
	</div>
</div>