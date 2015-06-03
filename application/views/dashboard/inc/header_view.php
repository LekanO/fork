<!doctype html>
<html>
<head>
	<title> Fork </title>
	<link rel="stylesheet" href="<?php base_url()?>public/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php base_url()?>public/css/style.css" />
	<script src="<?php base_url()?>public/js/jquery.js"></script>
	<script src="<?php base_url()?>public/js/bootstrap.js"></script>
	<script src="<?php base_url()?>public/js/fork/dashboard/result.js"></script>
	<script src="<?php base_url()?>public/js/fork/dashboard/event.js"></script>
	<script src="<?php base_url()?>public/js/fork/dashboard/template.js"></script>
	<script src="<?php base_url()?>public/js/fork/dashboard.js"></script>


</head>

	<script>
		$(function() { 
			var dashboard = new Dashboard();
		});
	</script>

<body>
<nav class="navbar">
	<div class="navbar-inner">
		<span class="brand"> Fork </span>	
			<ul class="nav">
				<li><a href="#">Dashboard</a></li>
				<li><a href="#">User</a></li>
				<li><a href="<?= site_url('dashboard/logout')?>">Logout</a></li>
			</ul>
	</div>
</nav>

<div class="wrapper">