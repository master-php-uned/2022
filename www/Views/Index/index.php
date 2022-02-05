<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login con PHP</title>
	<link rel="stylesheet" href="./../../assets/css/styles.css">
</head>
<body>
	<div class="mx-auto w-25 border border-2 rounded-2 p-2 m-2" id="login">
		<h3 class="text-center mt-2">Login</h3>
		<form method="post" action="" name="login">
			<div class="row mb-3">
				<label for="usernameEmail" class="col-sm-12 col-form-label">Username or Email</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="usernameEmail" id="usernameEmail" autocomplete="off" />
				</div>
			</div>
			<div class="row mb-3">
				<label for="password" class="col-sm-12 col-form-label">Password</label>
				<div class="col-sm-12">
					<input type="password" class="form-control" name="password" id="password" autocomplete="off"/>
				</div>
			</div>
			<div class="errorMsg"><?php // echo $errorMsgLogin; ?></div>
			<input type="submit" class="button" name="loginSubmit" value="Login">
		</form>
	</div>
</body>
</html>