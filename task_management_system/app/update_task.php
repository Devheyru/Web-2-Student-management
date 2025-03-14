<?php
session_start();
  if(isset($_SESSION['role']) && isset($_SESSION['id'])){
  if (isset($_POST['id']) && isset($_POST['discription'])  && isset($_POST['due_date']) && isset($_POST['title']) && isset($_POST['assigned_to']) ){
      include "../Db_connection.php";
      // validating input data
        function validate_input($data){
          $data= trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $tilte = $_POST['title'];
        $discription = $_POST['discription'];
        $assigned_to = $_POST['assigned_to'];
        $due_date = $_POST['due_date'];
        $id = $_POST['id'];


        if(empty($tilte)){
          $em= "Tilte is required";
          header("Location:../edit_task.php?success= $em&id=$id");
          exit();
          }
        elseif(empty($discription)){
          $errorName = "Discription is required";
          header("Location:../edit_task.php?success= $errorName&id=$id");
          exit();
        }elseif(empty($assigned_to)){
          $errorPwr= "select user";
          header("Location:../edit_task.php?success= $errorPwr&id=$id");
          exit();
        } 
        else{
          
          // insert data to into data base
          include "./Model/Task.php";
          $data = array( $tilte, $discription,$assigned_to,$due_date,$id);
          update_tasks($conn,$data);
          $success ="Task updated successfully";
          header("Location:../edit_task.php?success= $success&id=$id");
        }
  }else{

      if(empty($_POST['title'])){
       $error = "title is required <br>";
       header("Location:../edit_task.php?success=$error");

      }elseif(empty($_POST['discription'])){
       $error = "discription is required <br>";
      header("Location:../edit_task.php?success=$error");  
      }elseif(empty($_POST['assigned_to'])){
        $errorp ="Assigned to is required <br>";
      header("Location:../edit_task.php?success=$error");
      }  
    }
}else{
    $em = "First log in please";
    header("Location:../login.php?error= $em");
    exit();
    }

?>




