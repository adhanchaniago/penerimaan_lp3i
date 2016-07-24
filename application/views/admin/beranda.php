<h1>Beranda</h1><hr>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bordered">
			<div class="portlet-title">
				<div class="caption font-dark">
					<span class="caption-subject bold uppercase">Jumlah Pendaftar</span>
					<span class="caption-helper">Per Tahun</span>
				</div>
				<div class="actions">
					<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
			</div>
		</div>
	</div>
</div>
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
<script type="text/javascript">
	$(function () {
	    $('#container').highcharts({
	        chart: {
	            type: 'column'
	        },
	        credits: false,
	        title: {
	            text: 'Jumlah Pendaftar Per Tahun'
	        },
	        xAxis: {
	            categories: [
	            	<?php foreach ($xtahun as $tahun) {
	            		echo $tahun.",\n";
	            	} ?>
	            ],
	            crosshair: true
	        },
	        yAxis: {
	            min: 0,
	            title: {
	                text: 'Jumlah'
	            }
	        },
	        tooltip: {
	            headerFormat: '<span style="font-size:14px;font-weight:bold;">{point.key}</span><table>',
	            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	                '<td style="padding:0"><b>{point.y} Pendaftar</b></td></tr>',
	            footerFormat: '</table>',
	            shared: true,
	            useHTML: true
	        },
	        plotOptions: {
	            column: {
	                pointPadding: 0.2,
	                borderWidth: 0
	            }
	        },
	        series: [
	        <?php 
	        if(count($grafik) > 0) {
		        foreach ($grafik as $data) {
		        	echo "{name: '".$data['name']."', \n
		        	data: [";
		        	foreach ($data['data'] as $jml) {
		        		echo $jml.", ";
		        	}
		        	echo "]},\n";
		        }
	        } 
	        ?>
	        ]
	    });
	});
</script>