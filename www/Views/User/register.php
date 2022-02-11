<div class="mx-auto w-25 border border-2 rounded-2 p-2 m-2 mb-5" id="login">
		<h3 class="text-center mt-2">Register user</h3>
		<form method="post" action="AddUser" name="register">
			<div class="row mb-3">
				<label for="nif" class="col-sm-12 col-form-label">NIF</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="nif" id="nif" autocomplete="off" placeholder="NIF" value="<?php echo $model1->NIF ?? "" ?>" onkeypress="new User().ClearMessages(this);">
					<span id="nifs" class="text-danger">
						<?php echo $model2->NIF ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="name" class="col-sm-12 col-form-label">Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="Name" value="<?php echo $model1->Name ?? "" ?>" onkeypress="new User().ClearMessages(this);">
					<span id="names" class="text-danger">
					<?php echo $model2->Name ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="lastName" class="col-sm-12 col-form-label">Last Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" name="lastName" id="lastName" autocomplete="off" placeholder="Last Name" value="<?php echo $model1->LastName ?? "" ?>" onkeypress="new User().ClearMessages(this);">
					<span id="lastNames" class="text-danger">
					<?php echo $model2->LastName ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="email" class="col-sm-12 col-form-label">Email</label>
				<div class="col-sm-12">
					<input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email" value="<?php echo $model1->Email ?? "" ?>" onkeypress="new User().ClearMessages(this);">
					<span id="emails" class="text-danger">
						<?php echo $model2->Email ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<label for="password" class="col-sm-12 col-form-label">Password</label>
				<div class="col-sm-12">
					<input type="password" class="form-control" name="password" id="password" autocomplete="off" placeholder="Password" value="<?php echo $model1->Password ?? "" ?>" onkeypress="new User().ClearMessages(this);">
					<span id="passwords" class="text-danger">
						<?php echo $model2->Password ?? "" ?>
					</span>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col center">
					<input type="submit" class="btn btn-info center" name="registerSubmit" value="Register">
				</div>
				<div class=" col center">
					<a href="<?php echo URL ?>User/Cancel" class="btn btn-warning center">Cancel</a>
				</div>
			</div>
		</form>
	</div>