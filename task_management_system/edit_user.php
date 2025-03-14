<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
  include "./Db_connection.php";
  include "./app/Model/User.php";
if(!isset($_GET['id'])){
  header("Location:./user.php");
}

 $id = $_GET['id'];
 $user = get_user_by_id($conn,$id);

 if($user==0){
  header("Location:./user.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/style.css">
  <style>
      .container_add_users{
      width: 50%;
      min-width: 300px;}

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
    <h4 class="title">update Users <a href="user.php"> Users</a>
       <?php if (isset($_GET['success'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['success']);?>
      <?php }?>
       </span> 
  </h4>
     <form action="./app/update_user.php" class="container_add_users" method="POST">
      <label for="full_name" >Full Name</label><br>
      <input type="text" placeholder="Enter Full Name " name="full_name" value="<?=$user['full_name']?>"><br>
      <?php if (isset($_GET['errorf'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['errorf']);?>
      <?php }?>
     </span>

      <label for="user_name">UserName</label><br>
      <input type="text" placeholder="Enter Username" name="user_name" value="<?=$user['username']?>"><br>
      <?php if (isset($_GET['erroru'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['erroru']);?>
      <?php }?>
     </span>
      <label for="password">Password</label><br>
      <input type="password" placeholder="Enter password" name="password" value="<?=$user['password']?>"><br>
      <?php if (isset($_GET['errorp'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['errorp']);?>
      <?php }?>
     </span>
     <input type="text" name="id" value="<?=$user['id']?>" hidden="true">
      <input type="submit" value="Update" class="add_user_btn">
     </form>
		</section>
	</div>
<script type="text/javascript">
  var active = document.querySelector("#navlist li:nth-child(2)");
  active.classList.add("active");
</script>
</body>
</html>
<?php 
}else{
    $em = "First log in please";
    header("Location:../login.php?error= $em");
    exit();
      }
?>
