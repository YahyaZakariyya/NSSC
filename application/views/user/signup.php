<?php include "header.php"; ?>
<div class="row">
<div class="cont col-12 col-md-6">
<form class="form" action="<?php echo base_url('main/signup_button'); ?>" method="POST">
	<h2>Sign-Up Form</h2>
	<!-- First Name Input Field -->
	<div class="form-floating mb-3">
		<input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="title" required/>
		<label for="first_name" class="form-label">First Name</label>
	</div>
	<!-- Last Name Input Field -->
	<div class="form-floating mb-3">
		<input type="text" name="last_name" class="form-control" id="floatingInput" placeholder="title" required/>
		<label for="last_name" class="form-label">Last Name</label>
	</div>
	<!-- Email Input Field -->
	<div class="form-floating mb-3">
		<input type="email" name="user_email" class="form-control" id="floatingInput" placeholder="title" required/>
		<label for="email" class="form-label">Email</label>
	</div>
	<!-- Username Input Field -->
	<div class="form-floating mb-3">
		<input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="title" required/>
		<label for="user_name" class="form-label">Username</label>
	</div>
	<!-- Password Input Field -->
	<div class="form-floating mb-3">
		<input type="password" name="user_password" class="form-control" id="floatingInput" placeholder="title" required/>
		<label for="password" class="form-label">Password</label>
	</div>
	<!-- Gender Input Field -->
	<div class="mb-3">
		<div class="form-check">
			<input class="form-check-input" type="radio" name="gender" id="male" checked value="male">
			<label class="form-check-label" for="gender">Male</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="gender" id="female" value="female">
			<label class="form-check-label" for="gender">Female</label>
		</div>
	</div>
	<p>
		Already have an account? <a href="<?php echo base_url('main/login') ?>">Login here</a>
	</p>
	<input type="submit" name="signup_button" class="btn btn-light rounded-5" value="Sign Up"></input>
</form>			
</div>
</div>
<!-- </section> -->
<?php include "footer.php"; ?>