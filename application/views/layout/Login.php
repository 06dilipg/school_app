
<!DOCTYPE html>
<html lang="en">

<head>
    <title>EdShorts</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content=""/>
    <!-- /meta tags -->
    <!-- custom style sheet -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- /custom style sheet -->
    <!-- fontawesome css -->
    <link href="<?php echo base_url();?>assets/css/fontawesome-all.css" rel="stylesheet" />
    <!-- /fontawesome css -->
    <!-- google fonts-->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- /google fonts-->

</head>


<body>
<?php

 if ($this->session->flashdata('msg')) { ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('msg'); ?></div>
   
<?php } ?>

<h1>EdShorts</h1>
<div class=" w3l-login-form">
    <h2>Login Here</h2>
    <form action="<?php echo  site_url('User/check_login');?>" method="post">

        <div class=" w3l-form-group">
            <label>Username:</label>
            <div class="group">
                <i class="fas fa-user"></i>
                <!--                <input type="text" class="form-control" placeholder="Username" required="required" />-->
                <?php echo form_input(array( 'class'=>'form-control',  'id'=> 'User1','name' => 'username','placeholder'=>'username','required'=>'required'))?>
            </div>
        </div>
        <div class=" w3l-form-group">
            <label>Password:</label>
            <div class="group">
                <i class="fas fa-unlock"></i>
                <!--                <input type="password" class="form-control" placeholder="Password" required="required" />-->
                <?php echo form_input(array('type'=> 'password','class'=> 'form-control' ,'id'=>'pass','name' => 'password','placeholder'=>'password','required'=>'required'))?>
            </div>
        </div>
        <div class="forgot">
            <a href="#">Forgot Password?</a>
            <p><input type="checkbox">Remember Me</p>
        </div>
        <button type="submit" name="submit">Login</button>
        <br> <br>
        <!-- <a href="Register"> <button type="button">Register</button></a> -->
    </form>
    <p class=" w3l-register-p">Don't have an account?<a href="<?php echo base_url();?>Register" class="register"> Register</a></p>
</div>
<footer>
    <p class="copyright-agileinfo"> &copy; 2018. All Rights Reserved</p>
</footer>

</body>

</html>