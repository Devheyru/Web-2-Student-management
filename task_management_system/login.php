 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>log in task management system</title>
  <link rel="stylesheet" href="./css/style.css">
 </head>
 <body>
<div class="login_bg">
    <div class="container">
    <!-- login form -->

    <h2>Login form</h2>
    <form class="form_container" action="app/login.php" method="post">
     <div class="input">
     <label for="user_name" id="user_name" >User name</label>
     <?php if (isset($_GET['error'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['error']);?>
      <?php }?>
     </span>
     <input type="text" name="user_name" id="user_name" autocomplete="off" placeholder="Enter your user name"   >
     </div>
      <div class="input">
     <label for="password" id="password">password</label>
     <input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" >
      <?php if (isset($_GET['error_pwrd'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['errorPwrd']);?>
      <?php }?>
     </span>
     </div>
      <div class="login_btn">
     <input type="submit" name="submit" value="Login">
     </div>
    </form>
    </div>
  </div>
</div>
 </body>
 </html>