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
