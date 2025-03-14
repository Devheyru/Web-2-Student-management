<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'employe'){
  include "./Db_connection.php";
  include "./app/Model/User.php";
  $user = get_user_by_id($conn,$_SESSION['id']);
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .container_add_users{
        width: 50%;
        min-width: 300px;}
      .input-1,
      .container_add_users input {
        width: 80%;
        height: 35px;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 10px;
        color: gray;
        justify-content: center;
        margin: 5px auto 10px auto;
        border: 1px solid;
        border-color: blue;
      }
      .container_add_users .add_user_btn{
      max-width: 40%;
      padding: auto;
      margin: auto  20%;
      border: none;
      background-color: #006CE0;
      color: #fff;
      font-size: 18px;
      }
      .add_user_btn:hover{
        opacity: 0.6;
      }
      .container_add_users span{
       color: red;
    } 

    .container_add_users #success{
      color: green !important;
}
  </style>
  </head>
    
  <body>
    <input type="checkbox" id="checkbox">
  <?php include "inc/header.php" ?>
    <div class="body">
      <?php include "inc/nav.php" ?>
      <section class="section-1">
      <h4 class="title">Edit Profile <a href="profile.php">Profile</a>
    </h4>
     <form action="./app/update_profile.php" class="container_add_users" method="POST">
      <label for="full_name" >Full Name</label><br>
       <?php if (isset($_GET['success'])) {?> 
      <span id="success">
      <?php echo stripcslashes($_GET['success']). "<br>"; ?>
      <?php }?>
     </span>
      <input type="text" placeholder="Enter Full Name " name="full_name" value="<?=$user['full_name']?>"><br>
     </span>
      <label for="password">Old Password</label><br>
      <input type="password" placeholder="Enter old password" name="password" ><br>
      <?php if (isset($_GET['errorp'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['errorp']);?>
      <?php }?>
     </span>
      <label for="new_password"> New Password</label><br>
      <input type="password" placeholder="Enter new password" name="new_password" ><br>
      <?php if (isset($_GET['errorp'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['errorp']);?>
      <?php }?>
     </span>
      <label for="confirm_password"> Confirm Password</label><br>
      <input type="password" placeholder="Enter confirm password" name="confirm_password" ><br>
      <?php if (isset($_GET['errorp'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['errorp']);?>
      <?php }?>
     
      <input type="submit" value="change password" class="add_user_btn">
     </form>
      </section>
    </div>
  <script type="text/javascript">
    var active = document.querySelector("#navlist li:nth-child(3)");
    active.classList.add("active");
  </script>
  </body>
  </html>
  <?php 
}else{
      $em = "First log in please";
      header("Location:./login.php?error= $em");
      exit();
       }
?>
