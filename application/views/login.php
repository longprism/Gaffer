<?php
  if (isset($msg)) {
    $msg=$msg;
  } else {
    $msg = null;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- <link href="bootstrap/css/bootstrap.css" rel="stylesheet"> -->
    <link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/login-style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/css/css-reset.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@400;500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-3.5.1.min.js"></script>
    <title>login</title>
  </head>
  <style>
    body {
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }
  </style>
  <body>
    <div class="login-box">
      <h3 class="t-center">Welcome to Gaffer.id</h3>
      <div class="alert red <?php echo ($msg==1)?'':'none';?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Wrong Username
      </div>
      <div class="alert red <?php echo ($msg==2)?'':'none';?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Wrong Password
      </div>
      <div class="alert green <?php echo ($msg==3)?'':'none';?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Account is successfully created, now log on to proceed!
      </div>
      <form action="<?php echo base_url();?>login/checking" method="post">
        <input name="username" class="log-field" type="text" placeholder="Username" required>
        <input name="password" class="log-field" type="password" placeholder="Password" required>
        <input class="c-button-direct my w-100" type="submit" value="login">
      </form>
      <span class="t-center">Don't have an account? <a href="<?php echo base_url('register');?>">Sign up here!</a></span>
    </div>
    <script text="type/javascript">
      $("input[name='username']").keypress(function( e ) {
      if(e.which === 32) 
          return false;
      });
    </script>
  </body>
</html>