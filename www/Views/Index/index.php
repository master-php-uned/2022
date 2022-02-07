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
							<a class="nav-link text-dark" >Login</a>
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
	<div class="mx-auto w-25 border border-2 rounded-2 p-2 m-2" id="login">
		<h3 class="text-center mt-2">Login</h3>
		<form method="post" action="Index/Login" name="login">
			<div class="row mb-3">
				<label for="email" class="col-sm-12 col-form-label">Email</label>
				<div class="col-sm-12">
					<input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email" value="<?php //echo ... ?>" >
					<span id="emails" class="text-danger">
						<?php //echo ... ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="password" class="col-sm-12 col-form-label">Password</label>
				<div class="col-sm-12">
					<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password" value="<?php //echo ... ?>" >
					<span id="passwords" class="text-danger">
						<?php //echo ... ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<span class="text-danger">
					<?php // echo ... ?>
				</span>
			</div>
			<input type="submit" class="btn btn-info btn-block" name="loginSubmit" value="Login">
		</form>
	</div>

	<script src="<?php echo URL ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>