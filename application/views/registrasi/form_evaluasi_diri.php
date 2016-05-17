<div class="container-fluid">
	<div class="page-content page-content-popup">
		<!-- BEGIN PAGE CONTENT FIXED -->
		<div class="page-content-fixed-header">
			<h2><?php echo $judul; ?></h2>					
		</div>

		<div class="col-md-12">
			<table height="100px" width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px; margin-bottom: 10px;">
				<tr style="text-align: center;font-size: 14pt;font-weight: bold;color: rgb(100, 100, 100)">
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">1. Data Pribadi</td>
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">2. Riwayat Pendidikan</td>
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">3. Riwayat Pekerjaan</td>
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">4. Anggota Keluarga</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(100, 100, 100)">5. Evaluasi Diri</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">6. Selesai</td>
				</tr>
			</table>
		</div>
		
		<div class="col-md-12">
			<?php if (isset($_SESSION['pesan'])) { ?>
			<div class="alert alert-block alert-info" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<?php echo $this->session->flashdata('pesan'); ?>
			</div>
			<?php } ?>
		</div>

		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption font-dark">
						<span class="caption-subject bold uppercase">Evaluasi</span>
						<span class="caption-helper">Diri</span>
					</div>
					<div class="actions">
						<a title="Fullscreen" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
						<a title="Tambah Baru" class="btn btn-circle btn-icon-only btn-default" href="#modal-add" data-toggle="modal" role="button"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<form method="post" action="<?php echo base_url().'index.php/page/evaluasi_diri_act/'.$pendaftar->NO_PENDAFTARAN; ?>" class='form-horizontal' role='form' enctype="multipart/form-data">
					<div class="portlet-body">
							<div class="col-md-12">
								<input type='hidden' id='id' name="id" class='form-control' readonly="" required="" value="<?php echo $pendaftar->NO_PENDAFTARAN; ?>" />
        
						        <div class="form-group">
						          <label class='col-sm-1 control-label no-padding-right' for='evaluasi'>Evaluasi Diri</label>
						          <div class='col-sm-11'>
						            <textarea id='evaluasi' name="evaluasi" placeholder='Tuliskan evaluasi diri Anda disini.' class='form-control' required="" rows="20"></textarea>
						          </div>
						        </div>
							</div>
							
							<a href="<?php echo base_url().'index.php/page/smmary/'.$pendaftar->NO_PENDAFTARAN; ?>" class="btn grey">Lewati</a>
							<button type="submit" class="btn green pull-right">Lanjut</button>
					</div>
				</form>
			</div>
		</div>
		<!-- END PAGE CONTENT FIXED -->

		<!-- Copyright BEGIN -->
		<p class="copyright-v2">2016 © PMB LP3I Surabaya by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a></p>
		<!-- Copyright END -->
	</div>
</div>