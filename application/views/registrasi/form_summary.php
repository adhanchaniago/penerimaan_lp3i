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
					<td width="16%" style="background-color: rgb(145, 240, 150);color: rgb(255, 255, 255)">5. Evaluasi Diri</td>
					<td width="16%" style="background-color: rgb(255, 185, 185);color: rgb(100, 100, 100)">6. Selesai</td>
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
						<span class="caption-subject bold uppercase">Informasi</span>
						<span class="caption-helper">PENDAFTARAN</span>
					</div>
					<div class="actions">
						<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
					</div>
				</div>
				<div class="portlet-body form">
					<p>Terima kasih, Anda telah terdaftar menjadi aplikan Mahasiswa Baru LP3I Surabaya. Berikut informasi pendaftaran Anda:</p>
					<table border="0">
						<tr>
							<td>No. Pendaftaran</td> 
							<td>:</td> 
							<td><strong><?php echo $pendaftar->NO_PENDAFTARAN; ?></strong></td>
						</tr>
						<tr>
							<td>Nama</td> 
							<td>:</td>
							<td><?php echo $pendaftar->NAMA; ?></td>
						</tr>
						<tr>
							<td>Jenik Kelamin</td> 
							<td>:</td> 
							<td><?php echo $pendaftar->JENIS_KELAMIN=="L"?"Laki-laki":"Perempuan"; ?></td>
						</tr>
						<tr>
							<td>Tempat, Tanggal Lahir</td> 
							<td>:</td> 
							<td><?php echo $pendaftar->TEMPAT_LAHIR.", ".date("d-m-Y", strtotime($pendaftar->TANGGAL_LAHIR)); ?></td>
						</tr>
						<tr>
							<td>Alamat</td> 
							<td>:</td> 
							<td><?php echo $pendaftar->ALAMAT_TETAP; ?></td>
						</tr>
						<tr>
							<td>No. Telepon</td> 
							<td>:</td> 
							<td><?php echo $pendaftar->NO_TELEPON; ?></td>
						</tr>
						<tr>
							<td>Email</td> 
							<td>:</td> 
							<td><?php echo $pendaftar->EMAIL; ?></td>
						</tr>
					</table>
					<br><p>Mohon segera lakukan konfirmasi pendaftaran dengan mengunggah/<i>upload</i> bukti pembayaran melalui bank yang sudah ditentukan. 
					<br>Klik <a href="#">disini</a> untuk melakukan konfirmasi pembayaran.</p>
					<br>
					<p style="text-align: center;">
						<a href="<?php echo base_url(); ?>" class="btn btn-primary">Beranda</a>
						<a href="#" class="btn green">Login</a>
					</p>
				</div>
			</div>
		</div>
		<!-- END PAGE CONTENT FIXED -->

		<!-- Copyright BEGIN -->
		<p class="copyright-v2">2016 © PMB LP3I Surabaya by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a></p>
		<!-- Copyright END -->
	</div>
</div>    
<script type="text/javascript">
	function setFirstChoice() {
		var selectedOption = $('#prodi1').val();
		$("#prodi2 option[value='"+selectedOption+"']").remove();
	}
</script>