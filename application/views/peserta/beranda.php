	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-block alert-info fade in">
				<button type="button" class="close" data-dismiss="alert"></button>
				<h4 class="alert-heading"><b>Pemberitahuan!</b></h4>
				<p>
					Akun anda belum tervalidasi , lakukan pembayaran dan upload bukti pembayaran untuk dapat melihat jadwal ujian. 
				</p>
				<p>
					<a class="btn purple" href="javascript:;">
					Upload bukti </a>
				</p>
			</div><!-- end.alert -->
		</div>
	</div>
		
	<div class="row">
	<?php if ($tampil['akademik'] != null) : ?>
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

	<?php if ($tampil['bakat'] != null) : ?>
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

	<?php if ($tampil['wawancara'] != null) : ?>
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

	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption caption-md font-blue">
						<i class="fa fa-bullhorn font-blue"></i>
						<span class="caption-subject theme-font bold uppercase">INFORMATIONS</span>
					</div>
					<!-- <div class="actions">
						<div class="btn-group">
							<a class="btn btn-sm btn-default dropdown-toggle" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							Filter By <i class="fa fa-angle-down"></i>
							</a>
							<div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
								<label><input type="checkbox"/> Finance</label>
								<label><input type="checkbox" checked=""/> Membership</label>
								<label><input type="checkbox"/> Customer Support</label>
								<label><input type="checkbox" checked=""/> HR</label>
								<label><input type="checkbox"/> System</label>
							</div>
						</div>
					</div> -->
				</div>
				<div class="portlet-body">
					<div class="scroller" style="height: 308px;" data-always-visible="1" data-rail-visible="0">
						<ul class="feeds">
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-info">
												<i class="fa fa-check"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident, eligendi quam voluptas reiciendis. Rerum est deleniti, laborum ad porro perferendis quasi repellendus ratione distinctio, dolores ipsum, necessitatibus aliquid commodi in. <span class="label label-sm label-warning ">
												detail <i class="fa fa-share"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li>
								<a href="#">
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-success">
												<i class="fa fa-bar-chart-o"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae quisquam libero, consequuntur aperiam adipisci tempore architecto aut aliquam laudantium sint error illum ducimus voluptas officia, cumque, et? Reprehenderit, officiis, similique!	
											</div>
										</div>
									</div>
								</div>
								</a>
							</li>
							<li>
								<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-danger">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc">
												 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt laborum, minima, qui officia magni, a cum soluta natus placeat atque quidem tempore maiores veritatis, earum fugit et neque minus. Non.
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div><!-- end.portlet -->
		</div>
	</div>

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