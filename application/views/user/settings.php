<?php include "header.php"; ?>
<div class="row justify-content-center">
	<div class="cont">
		<div class="form">
		<h2>Update Profile</h2>
		<form action="<?php echo base_url('main/signup_button'); ?>" method="POST">
			<!-- First Name Input Field -->
			<div class="input__box">
				<input type="text" name="first_name" placeholder="First Name"/>
			</div>
			<!-- Last Name Input Field -->
			<div class="input__box">
				<input type="text" name="last_name" placeholder="Last Name"/>
			</div>
			<!-- Email Input Field -->
			<div class="input__box">
				<input type="email" name="user_email" placeholder="Email"/>
			</div>
			<!-- Username Input Field -->
			<div class="input__box">
				<input type="text" name="user_name" placeholder="Username"/>
			</div>
			<!-- Password Input Field -->
			<div class="input__box">
				<input type="password" name="user_password" placeholder="Password"/>
			</div>
			<br>
			<!-- Gender Input Field -->
			<!-- <div class="input__box"> -->
			<input type="radio" name="gender" id="male" checked value="male">
			<label for="gender">Male</label>
			<input type="radio" name="gender" id="female" value="female">
			<label for="gender">Female</label>
			<!-- </div> -->
			<div class="input__box">
			<input type="submit" name="signup_button" value="SignUp">
			</div>
			<p class="forget">
			Already have an account? <a href="<?php echo base_url('main/login') ?>">Login here</a>
			</p>
		</form>
		</div>
	</div>
</div>
<!-- </section> -->
<?php include "footer.php"; ?>