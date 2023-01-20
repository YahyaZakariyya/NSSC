<?php include "header.php"; ?>
<div class="row justify-content-center">
    <div class="cont">
    <div class="form">
        <h2>Login Form</h2>
        <form action="<?php echo base_url('main/login_button'); ?>" method="POST">
        <div class="input__box">
            <input type="text" name="user_name" placeholder="Username" required />
        </div>
        <div class="input__box">
            <input type="password" name="user_password" placeholder="Password" required />
        </div>
        <div class="input__box">
            <input type="submit" name="login_button" value="Login" />
        </div>
        <!-- <p class="forget">Forgot Password? <a href="#">Click Here</a></p> -->
        <p class="forget">
            Don't have an account? <a href="<?php echo base_url('main/signup'); ?>">Sign-Up</a>
        </p>
        </form>
    </div>
    </div>
</div>
<?php include "footer.php"; ?>