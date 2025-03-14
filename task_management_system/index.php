<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
	include "./Db_connection.php";
  include "./app/Model/Task.php";
  include "./app/Model/User.php";

	if($_SESSION['role']=='admin'){
			$due_today_task = count_tasks_due_today($conn);
			$nodeadline = count_tasks_no_deadline($conn);
			$overdue_task =count_tasks_due_overdue($conn);
			$all_task = count_tasks($conn);
			$num_users =count_users($conn);
			$pending = count_pending_tasks($conn);
			$in_progress = count_in_progress_tasks($conn);
			$completed = count_completed_tasks($conn);
	}else{
	    $num_my_task =	count_my_tasks($conn,$_SESSION['id']);
	    $overdue_my_task =count_tasks_my_due_overdue($conn,$_SESSION['id']);
			$my_nodeadline = count_my_tasks_no_deadline($conn,$_SESSION['id']);
			$due_today_my_task = count_my_tasks_due_today($conn,$_SESSION['id']);
			$my_pending = count_my_pending_tasks($conn,$_SESSION['id']);
			$my_in_progress =count_my_in_progress_tasks($conn,$_SESSION['id']);
			$my_completed = count_my_completed_tasks($conn,$_SESSION['id']);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
      <?php if($_SESSION['role'] =='admin'){ ?>
       <div class="dashboard">
				<div class="dashboard-item">
          <i class="fa fa-tasks"></i>
					<span><?=$num_users?> Employee(s)</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-window-close-o"></i>
					<span><?=$overdue_task?> Overdue</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-clock-o"></i>
					<span><?=$nodeadline?> No Deadline</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-tasks"></i>
					<span><?=$due_today_task?> Due Today</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-bell"></i>
					<span><?=$overdue_task?> Notifications</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-square-o"></i>
					<span><?=$pending?> Pending</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-spinner"></i>
					<span><?=$in_progress?> In progress</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-check-square-o"></i>
					<span><?=$completed?> Completed</span>
				</div>
			 </div>
			<?php }
			else{?>
				 <div class="dashboard">
				<div class="dashboard-item">
          <i class="fa fa-users"></i>
				<span><?=$num_my_task?> My tasks</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-window-close-o"></i>
					<span><?=$overdue_my_task?> Overdue</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-clock-o"></i>
					<span><?=$my_nodeadline?> No Deadline</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-tasks"></i>
					<span><?=$due_today_my_task?> Due Today</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-square-o"></i>
					<span><?=$my_pending?> Pending</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-spinner"></i>
					<span><?=$my_in_progress?> In progress</span>
				</div>
				<div class="dashboard-item">
          <i class="fa fa-check-square-o"></i>
					<span><?=$my_completed?> Completed</span>
				</div>
			 </div>
				<?php } ?>
		</section>
	</div>
<script type="text/javascript">
  var active = document.querySelector("#navlist li:nth-child(1)");
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
