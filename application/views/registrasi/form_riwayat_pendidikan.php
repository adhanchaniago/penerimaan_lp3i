<div class="container-fluid">
	<div class="page-content page-content-popup">
		<!-- BEGIN PAGE CONTENT FIXED -->
		<div class="page-content-fixed-header">
			<h2><?php echo $judul; ?></h2>					
		</div>

		<div class="col-md-12">
			<table height="100px" width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-top: 10px; margin-bottom: 10px;">
				<tr style="text-align: center;font-size: 14pt;font-weight: bold;color: rgb(100, 100, 100)">
					<td width="20%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">1. Data Pribadi</td>
					<td width="20%" style="background-color: rgb(255, 185, 185);color: rgb(100, 100, 100)">2. Riwayat Pendidikan</td>
					<td width="20%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">3. Riwayat Pekerjaan</td>
					<td width="20%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">4. Evaluasi Diri</td>
					<td width="20%" style="background-color: rgb(255, 185, 185);color: rgb(255, 255, 255)">5. Selesai</td>
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
						<span class="caption-subject bold uppercase">Formulir</span>
						<span class="caption-helper">Riwayat Pendidikan</span>
					</div>
					<div class="actions">
						<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
					</div>
				</div>
				<div class="portlet-body form">
					<form action="<?php echo base_url().'index.php/page/riwayat_pendidikan_act'; ?>" class="form-horizontal" role="form" method="POST">
						<div class="col-md-12"></div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-6 col-md-6">
									<button type="submit" class="btn green">Daftar</button>
									<button type="reset" class="btn red">Batal</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT FIXED -->

		<!-- Copyright BEGIN -->
		<p class="copyright-v2">2016 © PMB LP3I Surabaya by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a></p>
		<!-- Copyright END -->
	</div>
</div>    