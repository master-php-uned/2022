<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login con PHP</title>
	<link rel="stylesheet" href="<?php echo URL.RQ ?>css/styles.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
			<div class="container">
				<a class="navbar-brand" >
					<img src="<?php echo URL.RQ ?>images/icons/logotipo.png" class="mx-auto w-25 imglogo me-3"> Ejercicio - Login
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a  class="nav-link text-dark" title="Manage">Hello, Welcome ...</a>
						</li>
						<li class="nav-item">
							<a  class="nav-link text-dark" title="Manage">Logout</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo URL ?>User/Register" class="nav-link text-dark" title="Manage">Register</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo URL ?>Index/Index" class="nav-link text-dark" >Login</a>
						</li>
					</ul>
					<ul class="navbar-nav flex-grow-1">
						<li class="nav-item">
							<a class="nav-link text-dark" >Home</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>