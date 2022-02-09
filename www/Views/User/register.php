<div class="mx-auto w-25 border border-2 rounded-2 p-2 m-2 mb-5" id="login">
		<h3 class="text-center mt-2">Register user</h3>
		<form method="post" action="AddUser" name="register">
			<div class="row mb-3">
				<label for="nif" class="col-sm-12 col-form-label">NIF</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="nif" id="nif" autocomplete="off" placeholder="NIF" value="<?php echo $model1->NIF ?? "" ?>" >
					<span id="names" class="text-danger">
						<?php echo $model2->NIF ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="name" class="col-sm-12 col-form-label">Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Name" value="<?php echo $model1->Name ?? "" ?>" >
					<span id="names" class="text-danger">
					<?php echo $model2->Name ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="lastName" class="col-sm-12 col-form-label">Last Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="lastName" id="lastName" autocomplete="off" placeholder="Last Name" value="<?php echo $model1->LastName ?? "" ?>" >
					<span id="lastNames" class="text-danger">
					<?php echo $model2->LastName ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="email" class="col-sm-12 col-form-label">Email</label>
				<div class="col-sm-12">
					<input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email" value="<?php echo $model1->Email ?? "" ?>" >
					<span id="emails" class="text-danger">
						<?php echo $model2->Email ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="password" class="col-sm-12 col-form-label">Password</label>
				<div class="col-sm-12">
					<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password" value="<?php echo $model1->Password ?? "" ?>" >
					<span id="passwords" class="text-danger">
						<?php echo $model2->Password ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<span class="text-danger">
					<?php // echo ... ?>
				</span>
			</div>
			<input type="submit" class="btn btn-info btn-block" name="registerSubmit" value="Register">
		</form>
	</div>