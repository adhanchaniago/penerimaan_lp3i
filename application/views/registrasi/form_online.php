<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?php echo $judul; ?> :: LP3I Surabaya</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>

		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>

		<link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
		
		<link href="<?php echo base_url(); ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/clockface/css/clockface.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>

		<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>
	</head>
	<body>
		<header class="page-header">
	        <nav class="navbar" role="navigation">
	            <div class="container-fluid">
	                <div class="havbar-header">
	                	<!-- BEGIN LOGO -->
	                    <a id="index" class="navbar-brand" href="<?php echo base_url(); ?>">
	                        <img src="<?php echo base_url(); ?>assets/admin/layout6/img/logo.png" alt="Logo">
	                    </a>
	                	<!-- END LOGO -->

		                <!-- BEGIN TOPBAR ACTIONS -->
		                <div class="topbar-actions">
			                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
							<form class="search-form" action="<?php echo base_url().'index.php/cari'; ?>" method="GET">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Cari" name="query">
									<span class="input-group-btn">
										<a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a>
									</span>
								</div>
							</form>
							<!-- END HEADER SEARCH BOX -->
						</div>
		                <!-- END TOPBAR ACTIONS -->
	                </div>
	            </div>
	            <!--/container-->
	        </nav>
	    </header>

		<div class="container-fluid">
	    	<div class="page-content page-content-popup">
	    		<!-- BEGIN PAGE CONTENT FIXED -->
				<div class="page-content-fixed-header">
					<h2><?php echo $judul; ?></h2>					
				</div>

				<?php if (isset($_SESSION['pesan'])) { ?>
				<div class="alert alert-block alert-info" role="alert">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
					<?php echo $this->session->flashdata('pesan'); ?>
				</div>
				<?php } ?>

				<div class="col-md-12">
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-dark">
								<span class="caption-subject bold uppercase">Formulir</span>
								<span class="caption-helper">Online</span>
							</div>
							<div class="actions">
								<a title="" data-original-title="" class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"></a>
							</div>
						</div>
						<div class="portlet-body form">
							<form action="<?php echo base_url().'index.php/page/register_act'; ?>" class="form-horizontal" role="form" method="POST">
								<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<label class="col-md-3 control-label">Lokasi Kampus</label>
											<div class="col-md-9">
												<input type="text" name="lokasi" class="form-control" value="LP3I Surabaya" readonly="true">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Program Pendidikan (Pilihan 1)</label>
											<div class="col-md-9">
												<select name="prodi1" class="form-control">
													<option value="-">- Pilih Jurusan -</option>
													<?php foreach ($jurusan as $jur) { ?>
													<option value="<?php echo $jur->ID_JURUSAN; ?>"><?php echo $jur->NAMA_JURUSAN; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Program Pendidikan (Pilihan 2)</label>
											<div class="col-md-9">
												<select name="prodi2" class="form-control">
													<option value="-">- Pilih Jurusan -</option>
													<?php foreach ($jurusan as $jur) { ?>
													<option value="<?php echo $jur->ID_JURUSAN; ?>"><?php echo $jur->NAMA_JURUSAN; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<legend><small>Data Aplikan</small></legend>
										<div class="form-group">
											<label class="col-md-3 control-label">No. KTP/SIM/Kartu Pelajar</label>
											<div class="col-md-9">
												<input type="text" name="no_id" class="form-control" placeholder="Masukkan No. KTP/SIM/Kartu Pelakar">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Nama Lengkap</label>
											<div class="col-md-9">
												<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tempat Lahir</label>
											<div class="col-md-9">
												<input type="text" name="tmp_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tanggal Lahir</label>
											<div class="col-md-9">
												<input class="form-control form-control-inline input-medium date-picker" name="tgl_lahir" size="16" type="text" placeholder="DD/MM/YYYY" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Agama</label>
											<div class="col-md-9">
												<select name="agama" class="form-control">
													<option>- Pilih Agama -</option>
													<option>Islam</option>
													<option>Kristen</option>
													<option>Katolik</option>
													<option>Hindu</option>
													<option>Budha</option>
													<option>Lainnya</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Status Pernikahan</label>
											<div class="col-md-9">
												<div class="radio-list">
													<label class="radio-inline"><input type="radio" name="status" id="statusMenikah" value="Menikah"> Menikah </label>
													<label class="radio-inline"><input type="radio" name="status" id="statusBelumMenikah" value="Belum Menikah" checked> Belum Menikah </label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Kewarganegaraan</label>
											<div class="col-md-9">
												<div class="radio-list">
													<label class="radio-inline"><input type="radio" name="kewarganegaraan" id="wni" value="WNI" checked> Warga Negara Indonesia </label>
													<label class="radio-inline"><input type="radio" name="kewarganegaraan" id="wna" value="WNA"> Warga Negara Asing </label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Pekerjaan</label>
											<div class="col-md-9">
												<input type="text" name="pekerjaan" class="form-control" placeholder="Masukkan Pekerjaan">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Alamat Tetap</label>
											<div class="col-md-9">
												<textarea name="alamat_tetap" class="form-control" placeholder="Masukkan Alamat Tetap Anda"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Alamat Sekarang</label>
											<div class="col-md-9">
												<textarea name="alamat_sekarang" class="form-control" placeholder="Masukkan Alamat Anda Sekarang"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Alamat Kantor</label>
											<div class="col-md-9">
												<textarea name="alamat_kantor" class="form-control" placeholder="Masukkan Alamat Kantor Anda"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">No. Handphone</label>
											<div class="col-md-9">
												<input type="text" name="no_handphone" class="form-control" placeholder="Masukkan No. Telepon">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">No. Telepon</label>
											<div class="col-md-9">
												<input type="text" name="no_telepon" class="form-control" placeholder="Masukkan No. Telepon">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Tahun Lulus</label>
											<div class="col-md-2">
												<input type="number" name="tahun_lulus" class="form-control" placeholder="20xx" value="2005">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Email</label>
											<div class="col-md-9">
												<input type="text" name="email" class="form-control" placeholder="Masukkan Email">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">PIN BB</label>
											<div class="col-md-9">
												<input type="text" name="pin_bb" class="form-control" placeholder="Masukkan PIN BB (Optional)">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Facebook</label>
											<div class="col-md-9">
												<input type="text" name="facebook" class="form-control" placeholder="Masukkan Nama Akun Facebook (Optional)">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Twitter</label>
											<div class="col-md-9">
												<input type="text" name="twitter" class="form-control" placeholder="Masukkan Akun Twitter (Optional)">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Sumber Informasi</label>
											<div class="col-md-9">
												<select name="sumber_informasi" class="form-control">
													<option>Web LP3I Surabaya</option>
													<option>Media Cetak (Brosur/Koran/Majalah)</option>
													<option>Informasi Dari Rekan</option>
													<option>Lainnya</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Kata Sandi</label>
											<div class="col-md-9">
												<input type="password" name="pass" class="form-control" placeholder="Masukkan Kata Sandi">
												<span class="help-inline">Digunakan untuk masuk ke sistem penerimaan mahasiswa baru (cek jadwal tes, tes online, pengumuman, dll.)</span>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Masukkan Kode Unik</label>
											<div class="col-md-3">
												<?php echo $captcha['image']; ?>
												<input type="text" name="kode_unik" class="form-control" placeholder="Masukkan Kode Unik">
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="col-md-3 control-label">Pas Foto</label>
											<div class="col-md-9">
												<input type="file" name="pas_foto" class="form-control">
											</div>
										</div>
									</div>
								</div>
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
		<!-- PAGE CONTENT END -->
	    <!-- END MAIN LAYOUT -->
	    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/clockface/js/clockface.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

		<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
		<!--<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>-->
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-pickers.js"></script>

		<script>
		jQuery(document).ready(function() {    
		   	Metronic.init(); // init metronic core componets
		   	Layout.init(); // init layout
		    Index.init(); // init index page
		    QuickSidebar.init(); // init quick sidebar
		    Demo.init(); // init demo features
           	ComponentsPickers.init();
		    Tasks.initDashboardWidget(); // init tash dashboard widget
		});
		</script>
	</body>
</html>