<div class="app-sidebar sidebar-shadow">
	<div class="app-header__logo">
		<div class="logo-src"></div>
		<div class="header__pane ml-auto">
			<div>
				<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<div class="app-header__mobile-menu">
		<div>
			<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</button>
		</div>
	</div>
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-ellipsis-v fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>    <div class="scrollbar-sidebar">
		<div class="app-sidebar__inner">
			<ul class="vertical-nav-menu">
				<li class="app-sidebar__heading">Dashboards</li>
				<li>
					<a href="<?php echo base_url('home'); ?>" class="<?php echo (getCtrl() == 'home' ? 'mm-active' : ''); ?>">
						<i class="metismenu-icon pe-7s-home"></i> Home
					</a>
				</li>
				<li class="app-sidebar__heading">Master Data</li>
				<li>
					<a href="<?php echo base_url('user'); ?>" class="<?php echo (getCtrl() == 'user' ? 'mm-active' : ''); ?>">
						<i class="metismenu-icon pe-7s-user"></i> Users
					</a>
				</li>
				<li>
					<a href="<?php echo base_url('role'); ?>" class="<?php echo (getCtrl() == 'role' ? 'mm-active' : ''); ?>">
						<i class="metismenu-icon pe-7s-photo"></i> Role
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>  