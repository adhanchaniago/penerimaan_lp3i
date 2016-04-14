<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<li>
				<a href="<?php echo base_url().'index.php/admin/beranda'; ?>">
				<i class="icon-home"></i>
				<span class="title">Beranda</span>
				</a>
			</li>
			<?php if($_SESSION['role_admin'] == '1' || $_SESSION['role_admin'] == '2') { ?>
			<li>
				<a href="javascript:;">
					<i class="icon-layers"></i>
					<span class="title">Kelola Data Master</span>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
					<li><a href="<?php echo base_url().'index.php/jurusan'; ?>"><i class="fa fa-university"></i> Jurusan </a></li>
					<li><a href="<?php echo base_url().'index.php/admin/manage'; ?>"><i class="fa fa-user"></i> Admin </a></li>
					<li>
						<a href="javascript:;">
							<i class="fa fa-book"></i> Tes Potensi Akademik <span class="arrow"></span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url().'index.php/bidang_soal'; ?>"><i class="fa fa-cube"></i> Bidang Soal</a></li>
							<li><a href="<?php echo base_url().'index.php/soal_akademik'; ?>"><i class="fa fa-language"></i> Kelola Soal</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="fa fa-camera"></i> Tes Minat Bakat <span class="arrow"></span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url().'index.php/soal_minat_bakat'; ?>"><i class="fa fa-language"></i> Kelola Soal</a></li>
						</ul>
					</li>
					<li>
						<a href="javascript:;">
							<i class="fa fa-suitcase"></i> Tes Wawancara <span class="arrow"></span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?php echo base_url().'index.php/pewawancara'; ?>"><i class="fa fa-user"></i> Kelola Pewawancara</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<?php } ?>
			<?php if($_SESSION['role_admin'] == '1' || $_SESSION['role_admin'] == '3') { ?>
			<li>
				<a href="#">
				<i class="icon-user"></i>
				<span class="title">Aplikan</span>
				</a>
			</li>
			<li>
				<a href="#">
				<i class="icon-check"></i>
				<span class="title">Jadwal</span>
				</a>
			</li>
			<li>
				<a href="#">
				<i class="icon-paper-plane"></i>
				<span class="title">Info</span>
				</a>
			</li>
			<?php } ?>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>