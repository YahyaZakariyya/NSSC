<?php include "header.php"; ?>
<div class="cont">
<form class="form" action="<?php echo base_url('main/login_button'); ?>" method="POST">
    <h2>Login Form</h2>
    <div class="form-floating mb-3">
		<input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="title" required/>
        <label for="user_name" placeholder="title" class="form-label" id="floatingInput">Username or Email</label>
	</div>
    <div class="form-floating mb-3">
        <input type="password" name="user_password" class="form-control" placeholder="title" required/>
        <label for="user_password" class="form-label">Password</label>
    </div>
    <p>Don't have an account? <a href="<?php echo base_url('main/signup'); ?>">Sign-Up</a></p>
    <input class="btn btn-light rounded-5" type="submit" name="login_button" value="LOGIN"></input>
</form>
</div>
<?php include "footer.php"; ?>