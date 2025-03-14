<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == 'employe'){
  include "./Db_connection.php";
  include "./app/Model/User.php";
  $user = get_user_by_id($conn,$_SESSION['id']);
    // print_r($user);
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>Profile</title>
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
    </style>
  </head>
  <body>
    <input type="checkbox" id="checkbox">
  <?php include "inc/header.php" ?>
    <div class="body">
      <?php include "inc/nav.php" ?>
      <section class="section-1">
      <h4 class="title">Profile <a href="./edit_profile.php">Edit Profile</a>
    </h4>
       <table class="main-table" style="max-width: 300px;">
        <tr>
          <th>Full Name</th>
          <td><?=$user['full_name']?></td>
        </tr>
          <tr>
          <th>User Name</th>
          <td><?=$user['username']?></td>
        </tr>
        <tr>
          <th>Join At</th>
          <td><?=$user['create_at']?></td>
        </tr>
       </table>
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
