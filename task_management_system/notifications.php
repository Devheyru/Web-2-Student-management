<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id']) ){
	include "Db_connection.php";
	include "app/Model/Notifications.php";
	$notifications = get_all_my_notifications($conn,$_SESSION['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Notification</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
    <h4 class="title">All Notification
	  <?php if (isset($_GET['success'])) {?> 
      <span>
      <?php echo stripcslashes($_GET['success']);?>
      <?php }?>
     </span> 
	</h4>
		<?php if ($notifications != 0){ ?>
			<table class="main-table">
			<tr>
				<th>#</th>
				<th>Message</th>
				<th>Type</th>
				<th>Date</th>
			</tr>
			<tr>
			<?php $i=0; foreach($notifications as $notification){ ?>
        <td><?=++$i?></td>
				<td><?=$notification["message"]?></td>
				<td><?=$notification["type"]?></td>
				<td><?=$notification["date"]?></td>
			</tr>
			<?php } ?>
		</table>
   <?php } else { ?> 
	   <h3>You have zero Notifications</h3>
			<?php } ?>
		</section>
	</div>
<?php if($_SESSION['role']=='employe') 
{ ?>
	<script type="text/javascript">
  var active = document.querySelector("#navlist li:nth-child(4)");
  active.classList.add("active");
</script>
<?php }else{  ?>
	<script type="text/javascript">
  var active = document.querySelector("#navlist li:nth-child(5)");
  active.classList.add("active");
</script>
<?php }?>
</body>
</html>
<?php 
}else{
		$em = "First log in please";
		header("Location:../login.php?error= $em");
		exit();
		}
?>
