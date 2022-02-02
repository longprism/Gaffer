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
    <script type="text/javascript" src="<?php echo base_url(); ?>/asset/js/jquery-3.5.1.min.js"></script>
    <title>register</title>
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
      <h3 class="t-center">Register</h3>
      <div class="alert red <?php echo ($msg==1)?'':'none';?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Username is taken!
      </div>
      <div class="alert red <?php echo ($msg==2)?'':'none';?>">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        Password must have min. 7 characters!
      </div>
      <form action="<?php echo base_url();?>register/checking" method="post">
        <input name="username" class="log-field" type="text" placeholder="Username" required>
        <input name="role" class="log-field" type="text" placeholder="Role Name" required>
        <input name="password" name="role" class="log-field" type="password" placeholder="Password" required>
        <div style="display: inline-block;"><input type="checkbox" name="check1" required><label for="check1"> I agree with the <a target="_blank" href="https://youtu.be/3H9YEoXeTRg?t=12">Terms and Condition</a></label></div>
        <input class="c-button-action my w-100" type="submit" value="register">
      </form>
      <a class="t-center" href="<?php echo base_url('login');?>">← Back</a>
    </div>
    <script text="type/javascript">
      $("input[name='username']").keypress(function( e ) {
      if(e.which === 32) 
          return false;
      });
    </script>
  </body>
</html>