<html>
<head>
    <title>Login</title>
</head>
<body>
     <form action="<?php echo  site_url('home/Login_form');?>" method="post">
         <?php echo form_input(array('id'=> 'User1','name' => 'username','placeholder'=>'username'))?><br><br>
         <?php echo form_input(array('id'=>'pass','name' => 'password','placeholder'=>'password'))?>
         <button type="submit" name="submit" class="btn login_btn">Login</button>
     </form>
</body>
</html>