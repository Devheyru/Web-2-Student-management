<?php
session_start();
//session declared
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
     
   $data= array($id,"employe");
    delete_user($conn,$data);
    $em= "You are deleted successfully";
    header("Location:./user.php?success= $em");
    exit();
}else{
    $em = "First log in please";
    header("Location:../login.php?error= $em");
    exit();
      }
?>
