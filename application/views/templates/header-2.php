<!DOCTYPE html>
<html>
	<head>
		<title>TM</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
		<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	</head>
	<body class="bg-primary">
		<nav class="navbar-inverse black">
			<div class="container">
				<div class="navbar-header">
					<a href="<?php echo base_url();?>"><img class="navbar-brand" src="<?php echo base_url();?>assets\images\tm-2.png"></a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php $_SESSION['error'] ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a></li>
							<li><a href="#">Page 1-2</a></li>
							<li><a href="#">Page 1-3</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>