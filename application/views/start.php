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
<title><?php echo $judul; ?> - LP3I Surabaya</title>
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
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo base_url(); ?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico"/>
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
                    <a id="index" class="navbar-brand" href="start.html">
                        <img src="<?php echo base_url(); ?>assets/admin/layout6/img/logo.png" alt="Logo">
                    </a>
                	<!-- END LOGO -->

	                <!-- BEGIN TOPBAR ACTIONS -->
	                <div class="topbar-actions">
		                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
						<form class="search-form" action="extra_search.html" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Cari..." name="query">
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
	<!-- HEADER END -->

	<!-- PAGE CONTENT BEGIN -->
    <div class="page-content">
    	<div class="container">
    		<!-- Center Wrap BEGIN -->
    		<div class="center-wrap">
    			<div class="center-align">
    				<div class="center-body">
			    		<div class="row">
			    			<div class="col-sm-6 margin-bottom-30">
			    				<a class="webapp-btn" href="http://surabaya.lp3i.ac.id/">
			    					<h3>Official</h3>
			    					<p>Website LP3I Surabaya</p>
			    				</a>
			    			</div>
			    			<div class="col-sm-6 margin-bottom-30">
			    				<a class="webapp-btn" href="<?php echo base_url().'informasi'; ?>">
			    					<h3>Informasi</h3>
			    					<p>Penerimaan Mahasiswa Baru</p>
			    				</a>
			    			</div>
			    		</div>
			    		
			    		<div class="row">
			    			<div class="col-sm-6 sm-margin-bottom-30">
			    				<a class="webapp-btn" href="<?php echo base_url().'page/register'; ?>">
			    					<h3>Daftar</h3>
			    					<p>Isi formulir online disini</p>
			    				</a>
			    			</div>
			    			<div class="col-sm-6 sm-margin-bottom-30">
			    				<a class="webapp-btn" href="#">
			    					<h3>Kontak</h3>
			    					<p>Hubungi kami</p>
			    				</a>
			    			</div>
			    		</div>

			    		<div class="row">
			    			<div class="col-sm-12" style="margin-top: 30px;">
			    				<a class="webapp-btn" href="<?php echo base_url().'page/login'; ?>">
			    					<p>Sudah daftar? Klik disini.</p>
			    				</a>
			    			</div>
			    		</div>
					</div>
				</div>
			</div>
    		<!-- Center Wrap END -->

			<!-- Copyright BEGIN -->
			<p class="copyright">2016 © PMB LP3I Surabaya &bull; Developed by <a href="https://twitter.com/obyzz" target="_blank">@obyzz</a> &bull; 
				<a href="<?php echo base_url().'admin'; ?>">Admin Page</a></p>
			<!-- Copyright END -->
    	</div>
    </div>
	<!-- PAGE CONTENT END -->
    <!-- END MAIN LAYOUT -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
    QuickSidebar.init(); // init quick sidebar
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>