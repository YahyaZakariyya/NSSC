<?php include "header.php"; ?>
<div class="row justify-content-center">
<div class="cont">
<form class="form" action="<?php echo base_url('main/login_button'); ?>" method="POST">
    <h2>Login Form</h2>
    <div class="mb-2">
        <label for="user_name" class="form-label">Username or Email</label>
        <input type="text" name="user_name" class="form-control" required/>
    <div class="mb-2">
        <label for="user_password" class="form-label">Password</label>
        <input type="password" name="user_password" class="form-control" required/>
    </div>
    <p>Don't have an account? <a href="<?php echo base_url('main/signup'); ?>">Sign-Up</a></p>
    <input class="btn btn-light rounded-0" type="submit" name="login_button" value="LOGIN"></input>
</form>
</div>
</div>
<?php include "footer.php"; ?>