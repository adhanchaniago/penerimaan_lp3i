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

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/select2/select2.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/global/plugins/jquery-multi-select/css/multi-select.css"/>

		<link href="<?php echo base_url(); ?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>

		<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/numeric.js" type="text/javascript"></script>
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
							<form class="search-form" action="<?php echo base_url().'cari'; ?>" method="GET">
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

	    <?php $this->load->view($konten); ?>

	    <!-- END MAIN LAYOUT -->
	    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

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

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>

		<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-pickers.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/components-dropdowns.js"></script>

		<script>
		jQuery(document).ready(function() {    
		   	Metronic.init(); // init metronic core componets
		   	Layout.init(); // init layout
		    // Index.init(); // init index page
		    QuickSidebar.init(); // init quick sidebar
		    Demo.init(); // init demo features
           	ComponentsPickers.init();
		    Tasks.initDashboardWidget(); // init tash dashboard widget
		    ComponentsDropdowns.init();
		});
		</script>
	</body>
</html>