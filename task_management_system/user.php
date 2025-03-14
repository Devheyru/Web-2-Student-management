<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
	include "Db_connection.php";
	include "app/Model/User.php";
	$users = get_all_users($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>manage users</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/style.css">

</head>
<body>
	<input type="checkbox" id="checkbox">
<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
    <h4 class="title">manage user <a href="add_user.php">Add User</a>
	  <?php if (isset($_GET['success'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['success']);?>
      <?php }?>
     </span> 
	</h4>
	<table class="main-table">
		<?php if ($users!=0){ ?>
			<tr>
				<th>#</th>
				<th>Full Name</th>
				<th>Username</th>
				<th>role</th>
				<th>Action</th>
			</tr>
			<tr>
			<?php foreach($users as $user){ ?>	
				<td><?=$user["id"]?></td>
				<td><?=$user["full_name"]?></td>
				<td><?=$user["username"]?></td>
				<td><?=$user["role"]?></td>
				<td>
					<a href="edit_user.php?id=<?=$user["id"]?>" class="edit-btn">Edit</a>
					<a href="delete_user.php?id=<?=$user["id"]?>" class="delete-btn">Delete</a>
				</td>
			</tr>
			<?php }?>
		</table>
   <?php } else{

				echo"
			 <tr>
				<th>#</th>
				<th>Full Name</th>
				<th>Username</th>
				<th>role</th>
				<th>Action</th>
			</tr>
				<tr><td>empty table </td></tr> 	</table>";
			} ?> 
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
