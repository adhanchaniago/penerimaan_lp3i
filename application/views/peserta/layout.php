<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8"/>
		<title><?php echo $judul; ?> :: LP3I Surabaya</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
		<link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
		<!-- END PAGE LEVEL PLUGIN STYLES -->
		<!-- BEGIN PAGE STYLES -->
		<link href="<?php echo base_url(); ?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
		<!-- END PAGE STYLES -->
		<!-- BEGIN THEME STYLES -->
		<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
		<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>

		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-redirect.js" type="text/javascript"></script>
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="page-quick-sidebar-over-content">

		<!-- BEGIN MAIN LAYOUT -->
		<!-- HEADER BEGIN -->
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
							<form class="search-form" action="extra_search.html" method="GET">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Cari" name="query">
									<span class="input-group-btn">
										<a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a>
									</span>
								</div>
							</form>
							<!-- END HEADER SEARCH BOX -->

		                	<!-- BEGIN GROUP NOTIFICATION -->
							<div class="btn-group-notification btn-group" id="header_notification_bar">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<span class="badge">
										<i class="fa fa-bell-o"></i>
									</span>
								</button>
								<ul class="dropdown-menu-v2">
									<li class="external">
										<h3><span class="bold">Pemberitahuan</span></h3>
									</li>
									<li>
										<ul class="dropdown-menu-list scroller" style="height: 65px; padding: 0;" data-handle-color="#637283">
											<li>
												<a href="javascript:;">
													<span class="details">
														<span class="label label-sm label-icon label-success">
															<i class="fa fa-plus"></i>
														</span>
														Pendaftar baru
													</span>
													<span class="time">0</span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</div>
		                	<!-- END GROUP NOTIFICATION -->

		                	<!-- BEGIN USER PROFILE -->
							<?php 
		                		if (isset($_SESSION['no_pendaftaran']))
		                		{
		                			$id_user = $this->session->userdata('no_pendaftaran');
		                			$user = $this->tbl_pendaftar->get_id($id_user)[0];
		                			$path = base_url("assets/global/img/photo/".$user->FOTO);
		                		}else{
									$path = '';		                			
		                		}
		                	?>
			                <div class="btn-group-img btn-group">
								<button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<img src="<?php echo $path; ?>" alt="">
								</button>
								<ul class="dropdown-menu-v2" role="menu">
									<li>
										<a href="javascript:void(0);">Ubah Password</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url().'peserta/logout'; ?>">Keluar</a>
									</li>
								</ul>
							</div>
							<!-- END USER PROFILE -->
						</div>
		                <!-- END TOPBAR ACTIONS -->
	                </div>
	            </div>
	            <!--/container-->
	        </nav>
	    </header>
		<!-- HEADER END -->

		<!-- PAGE CONTENT BEGIN -->
	    <div class="container-fluid">
	    	<div class="page-content page-content-popup">
	    		<!-- BEGIN PAGE CONTENT FIXED -->
				<div class="page-content-fixed-header">
					<h2><?php echo $judul; ?></h2>
				</div>

				<!-- BEGIN SIDEBAR -->
				<?php //$this->load->view('admin/sidebar'); ?>
				<!-- END SIDEBAR -->

				<div class="page-fixed-main-content" style="margin-left:0;">
					<?php $this->load->view($konten); ?>
				</div>
	    		<!-- END PAGE CONTENT FIXED -->

	    		<!-- Copyright BEGIN -->
				<p class="copyright-v2">2016 © Developed by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a></p>
				<!-- Copyright END -->
	    	</div>
	    </div>
		<!-- PAGE CONTENT END -->
	    <!-- END MAIN LAYOUT -->
	    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
		<script src="../../assets/global/plugins/respond.min.js"></script>
		<script src="../../assets/global/plugins/excanvas.min.js"></script> 
		<![endif]-->
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<!--<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript" ></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript" ></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript" ></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript" ></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>-->
		<!-- END PAGE LEVEL PLUGINS -->

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/table-managed.js"></script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script>
		jQuery(document).ready(function() {    
		   	Metronic.init(); // init metronic core componets
		   	Layout.init(); // init layout
		    TableManaged.init(); // DataTable Managed
		    //Index.init(); // init index page
		    QuickSidebar.init(); // init quick sidebar
		    //Tasks.initDashboardWidget(); // init tash dashboard widget
		});
		</script>
		<!-- END JAVASCRIPTS -->
	</body>
	<!-- END BODY -->
</html>