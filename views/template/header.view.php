<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Panel</title>
	
	<link rel="stylesheet" href="<?php echo Configs::ABS_URL;  ?>includes/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo Configs::ABS_URL;  ?>includes/css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo Configs::ABS_URL;  ?>includes/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo Configs::ABS_URL;  ?>includes/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo Configs::ABS_URL;  ?>includes/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="<?php echo Configs::ABS_URL;  ?>includes/js/jquery.equalHeight.js"></script>
    <?php include Configs::ABS_PATH . "/views/admin/staff/inc.popup.php";  ?>
</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo Configs::ABS_URL; ?>admin/staff/list.php">Admin Panel</a></h1>
			<h2 class="section_title">Quản Lý Nhân Sự</h2>
            <div class="btn_view_site"><a href="<?php echo Configs::ABS_URL; ?>admin/user/logout.php">Logout</a></div>
            
		</hgroup>
	</header> <!-- end of header bar -->	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin </p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo Configs::ABS_URL; ?>admin/admin-home.php">Admin CP</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->