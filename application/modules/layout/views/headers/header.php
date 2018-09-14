<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <title> <?= $title . " | " . DEFAULT_TITLE_MANAGER ?> </title>
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/font-awesome.min.css">

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/smartadmin-production-plugins.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/smartadmin-production.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/smartadmin-skins.min.css">

        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/loading.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/animate.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/sweetalert.css">

        <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url(); ?>assets/css/style.css">

        <!-- #GOOGLE FONT -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700&amp;subset=latin-ext" rel="stylesheet">

        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="152x152" href="/logo/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/logo/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/logo/favicon-16x16.png">
        <link rel="manifest" href="/logo/manifest.json">
        <link rel="mask-icon" href="/logo/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/logo/favicon.ico">
        <meta name="msapplication-config" content="/logo/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body class="smart-style-2">

		<!-- #HEADER -->
		<header id="header">
			<!-- <div id="logo-group"> -->
				<!-- <span id="logo"style="margin-left: 56px; margin-top: 10px; color: white;"><b> ASEANINDO </b></span> -->
				<!-- PLACE YOUR LOGO HERE -->
				<!-- <span id="logo"> <img src="<?php //echo base_url(); ?>assets/logo/AKS.png" alt="Logo"> </span> -->
				<!-- END LOGO PLACEHOLDER -->
			<!-- </div> -->
			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?php echo site_url() ?>/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a href="javascript:void(0);" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->

                <!-- clear local storage button -->
				<div id="reset" class="btn-header transparent pull-right">
					<span> <a title="Reset UI" data-action="resetWidgets"><i class="fa fa-history"></i></a> </span>
				</div>
				<!-- end clear local storage button -->
			</div>
			<!-- end pulled right: nav area -->
		</header>
		<!-- END HEADER -->

        <!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
		<aside id="left-panel">
			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is -->
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?php echo base_url() ?>assets/logo/AKS.png" alt="me" class="online" />
						<span>
							<?= $this->session->userdata('name'); ?>
						</span>
						<i class="fa fa-angle-down"></i>
					</a>
				</span>
			</div>
			<!-- end user info -->
			<!-- NAVIGATION : This navigation is also responsive
			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!--
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
                    <!-- Dashboard and Statuses -->
					<li class="dashboard">
						<a href="<?= site_url('dashboard'); ?>"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
                    <li class="">
						<a href="#"><i class="fa fa-lg fa-fw fa-file"></i> <span class="menu-item-parent">SLIP</span></a>
                        <ul>
                        	<?php 
								$level = $this->session->userdata("level");
								if( $level == "STAFF AKS" ) :
							?>
                            <li class="<?= (isset($active_page) && $active_page == "slip-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip") ?>" title="SLIP AKS"><span class="menu-item-parent">View AKS</span></a>
							</li>
							<?php elseif( $level == "AGENT HSBC") : ?>
							<li class="<?= (isset($active_page) && $active_page == "slip-hsbc-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip/list") ?>" title="SLIP Slip"><span class="menu-item-parent">View Slip</span></a>
							</li>
							<?php elseif( $level == "AGENT BNI") : ?>
							<li class="<?= (isset($active_page) && $active_page == "slip-bni-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip/list_bni") ?>" title="SLIP Slip"><span class="menu-item-parent">View Slip</span></a>
							</li>
							<?php elseif($level == "AGENT DIPO") :?>
							<li class="<?= (isset($active_page) && $active_page == "slip-dipo-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip/list_dipo") ?>" title="SLIP Slip"><span class="menu-item-parent">View Slip</span></a>
							</li>
							<?php else :?>
							<li class="<?= (isset($active_page) && $active_page == "slip-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip") ?>" title="SLIP AKS"><span class="menu-item-parent">View Slip AKS</span></a>
							</li>
							<li class="<?= (isset($active_page) && $active_page == "slip-hsbc-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip/list") ?>" title="SLIP HSBC"><span class="menu-item-parent">View Slip HSBC</span></a>
							</li>
							<li class="<?= (isset($active_page) && $active_page == "slip-bni-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip/list_bni") ?>" title="SLIP BNI"><span class="menu-item-parent">View Slip BNI</span></a>
							</li>
							<li class="<?= (isset($active_page) && $active_page == "slip-dipo-list") ? "active" : "" ?>">
								<a href="<?= site_url("slip/list_dipo") ?>" title="SLIP HSBC"><span class="menu-item-parent">View Slip DIPO</span></a>
							</li>
						<?php endif; ?>
						</ul>
					</li>
                    <!-- Admin Module -->
                    <?php 
                    	$level = $this->session->userdata("level");
	                    if( $level == "SYSTEM" || $level == "ADMINISTRATOR") { ?>
						<li class="">
							<a href="#"><i class="fa fa-lg fa-fw fa-upload"></i> <span class="menu-item-parent">Upload Data</span></a>
	                        <ul>
								<li class="<?= (isset($active_page) && $active_page == "import") ? "active" : ""?>">
									<a href="<?= site_url('upload/import'); ?>" title="Upload Data"><span class="menu-item-parent">Upload slip internal</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "import-hsbc") ? "active" : ""?>">
									<a href="<?= site_url('upload/import_hsbc'); ?>" title="Upload Data"><span class="menu-item-parent">Upload slip agent HSBC</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "import-bni") ? "active" : ""?>">
									<a href="<?= site_url('upload/import_bni'); ?>" title="Upload Data"><span class="menu-item-parent">Upload slip agent BNI</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "import-dipo") ? "active" : ""?>">
									<a href="<?= site_url('upload/import_dipo'); ?>" title="Upload Data"><span class="menu-item-parent">Upload slip agent DIPO</span></a>
								</li>

							</ul>
						</li>

						<li class="">
							<a href="#"><i class="fa fa-lg fa-fw fa-users"></i> <span class="menu-item-parent">Upload Data User</span></a>
	                        <ul>
								<li class="<?= (isset($active_page) && $active_page == "import-user") ? "active" : ""?>">
									<a href="<?= site_url('upload/import-user'); ?>" title="Upload Data"><span class="menu-item-parent">Upload data user</span></a>
								</li>
								
							</ul>
						</li>
					<?php } ?>

					<?php 
                    	$level = $this->session->userdata("level");
	                    if( $level == "SYSTEM" || $level == "ADMINISTRATOR") { ?>
						<li class="">
							<a href="#"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Manage User</span></a>
	                        <ul>
								<li class="<?= (isset($active_page) && $active_page == "user-list") ? "active" : ""?>">
									<a href="<?= site_url('user'); ?>" title="Create Group"><span class="menu-item-parent">List Data Internal</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "user-list-hsbc") ? "active" : ""?>">
									<a href="<?= site_url('user/list-hsbc'); ?>" title="Create Group"><span class="menu-item-parent">List Data User HSBC</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "user-list-bni") ? "active" : ""?>">
									<a href="<?= site_url('user/list-bni'); ?>" title="Create Group"><span class="menu-item-parent">List Data User BNI</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "user-list-dipo") ? "active" : ""?>">
									<a href="<?= site_url('user/list-dipo'); ?>" title="Create Group"><span class="menu-item-parent">List Data User DIPO</span></a>
								</li>

								<li class="<?= (isset($active_page) && $active_page == "user-create") ? "active" : ""?>">
									<a href="<?= site_url('user/create'); ?>" title="Create Group"><span class="menu-item-parent">Create User</span></a>
								</li>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
		</aside>
		<!-- END NAVIGATION -->

		<!-- #MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" onclick="location.reload();" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reload this page." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<?= isset($breadcrumb) ? $breadcrumb : "" ?>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->
