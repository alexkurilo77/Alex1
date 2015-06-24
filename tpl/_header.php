<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= implode(' | ', $titles) ?></title>
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<style>
		.input-group-addon.input-group-addon-width-110 {
		    min-width:110px;
		}
	</style>
</head>
<body>
	<div class="navbar navbar-inverse">
		<ul class="nav navbar-nav">
		<?php if (!$s['user']): ?>
			<li><a href="/login">Login</a></li>
			<li><a href="/register">Registration</a></li>
		<?php else: ?>
			<li><a href="/logout">Logout</a></li>
			<li><a href="/blog">My stream</a></li>
			<li><a href="/blog/<?= $s['user']['id'] ?>">My blog</a></li>
		<?php endif ?>
		<li><a href="/blogs">All blogs</a></li>

		</ul>
		<div class="navbar-brand pull-right"><?= $s['user'] ? $s['user']['name'] : 'Anon' ?></div>
	</div>
	<div class="container">
		<?php display_flashes($s['flash']) ?>
	</div>
