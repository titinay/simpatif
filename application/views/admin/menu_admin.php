<div class="sidebar-menu">
	<div class="sidebar-menu-inner">
		<header class="logo-env">
			<div class="logo">
				<a href="<?php echo site_url('welcome') ?>">
					<img src="<?php echo base_url('assets/images/logo@2x.png'); ?>" height="30" width="85" alt="" />
				</a>
			</div>
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon">
					<i class="entypo-menu"></i>
				</a>
			</div>
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation">
					<i class="entypo-menu"></i>
				</a>
			</div>
		</header>
		<ul id="main-menu" class="main-menu">
			<li class="<?php if($active=='dashboard'){echo "active";} ?>">
				<a href="<?php echo base_url(); ?>">
					<i class="entypo-gauge"></i>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="<?php if($drop_active=='master'){echo "opened active";} ?>">
				<a href="#">
					<i class="entypo-window"></i>
					<span class="title">Master Data</span>
				</a>
				<ul>
					<li class="<?php if($active=='box'){echo "active";} ?>">
						<a href="<?php echo site_url('Box'); ?>">
							<i class="entypo-box"></i>
							<span class="title">Box</span>
						</a>
					</li>
					<li class="<?php if($active=='admin'){echo "active";} ?>">
						<a href="<?php echo site_url('Admin'); ?>">
							<i class="entypo-user"></i>
							<span class="title">Admin</span>
						</a>
					</li>
				</ul>
			</li>
			<li class="<?php if($active=='input'){echo "active";} ?>">
				<a href="<?php echo site_url('Input'); ?>">
					<i class="entypo-mail"></i>
					<span class="title">Input Berkas</span>
				</a>
			</li>
			<li class="<?php if($active=='search'){echo "active";} ?>">
				<a href="<?php echo site_url('Search'); ?>">
					<i class="entypo-search"></i>
					<span class="title">Searching</span>
				</a>
			</li>
			<li class="<?php if($active=='print'){echo "active";} ?>">
				<a href="<?php echo site_url('Cetak'); ?>">
					<i class="entypo-export"></i>
					<span class="title">Export</span>
				</a>
			</li>
			<li class="<?php if($active=='database'){echo "active";} ?>">
				<a href="<?php echo site_url('Utility'); ?>">
					<i class="entypo-lock"></i>
					<span class="title">Utility(Database)</span>
				</a>
			</li>
		</ul>
		
	</div>
</div>