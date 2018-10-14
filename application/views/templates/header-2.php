<!DOCTYPE html>
<html>
	<head>
		<title>TM</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>" />
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	</head>
	<body class="bg-primary">
		<nav class="navbar-inverse black">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="<?php echo base_url();?>"><img class="navbar-brand" src="<?php echo base_url();?>assets\images\tm-2.png"></a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<img class="navbar-brand img-circle" src="<?php echo base_url($_SESSION['profil_picture_url']);?>" id="profile" name="profile">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo ($_SESSION['nickname']);?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('index.php/account');?>">Account Settings</a></li>
							<li><a href="<?php echo base_url('index.php/tournaments')?>">My Tournaments</a></li>
							<li class="divider footer-line"></li>
							<li><a href="<?php echo base_url('index.php/accounts/logout')?>">Log out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>