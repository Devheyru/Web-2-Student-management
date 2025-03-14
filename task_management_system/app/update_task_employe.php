<?php
session_start();
  if(isset($_SESSION['role']) && isset($_SESSION['id'])){
  if (isset($_POST['id']) && isset($_POST['status'])  && $_SESSION['role']=="employe"  ){
      include "../Db_connection.php";

          $status = $_POST['status'];
          $id = $_POST['id'];
          
          // update data in the database
          include "./Model/Task.php";
          $data = array($status,$id);
          update_tasks_status($conn,$data);
          $success =" Status updated successfully";
          header("Location:../my_task.php?success= $success&id=$id");

}else{
    $em = "Unknown error occured";
    header("Location:../edit_task_employe.php?error= $em");
    exit();
    }}else{
    $em = "First log in please";
    header("Location:../login.php?error= $em");
    exit();
    }

?>




