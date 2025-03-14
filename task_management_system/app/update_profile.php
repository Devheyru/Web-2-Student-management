<?php
session_start();
if(isset($_SESSION['role']) && isset($_SESSION['id'])){
  if (isset($_POST['new_password']) && isset($_POST['confirm_password'])  && isset($_POST['password'])  && isset($_POST['full_name']) && $_SESSION['role']=='employe'){
      include "../Db_connection.php";
      // validating input data
        function validate_input($data){
          $data= trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $full_name = validate_input($_POST['full_name']);
        $password = validate_input($_POST['password']);
        $new_password = validate_input($_POST['new_password']);
        $confirm_password = validate_input($_POST['confirm_password']);

        // $full_name = $_POST['full_name'];
        // $password = $_POST['password'];
        // $new_password = $_POST['new_password'];
        // $confirm_password = $_POST['confirm_password'];

        if(empty($full_name)){
          $em= "Name is required";
          header("Location:../edit_profile.php?errorf= $em");
          exit();
          }
        elseif(empty($password)||empty($confirm_password)||empty($new_password)){
          $errorName = "password is required";
          header("Location:../edit_profile.php?errorp= $errorName");
          exit();
        }elseif($new_password != $confirm_password){
          $errorPwr= "New Password and confirm password is does not match";
          header("Location:../edit_profile.php?errorp= $errorPwr");
          exit();
        } else{
          
          // insert data to into data base
            include "./Model/User.php";
            $user = get_user_by_id($conn,$_SESSION['id']);
           if($user){

                $new_password = password_hash($confirm_password ,PASSWORD_DEFAULT);
                $id= $_SESSION['id'];
                $data = array($full_name,$new_password,$id);
                update_profile($conn,$data);

                $success ="User Password is Upadated successfully ";
                header("Location:../login.php?success= $success&id=$id");
                 exit();
           }else{
            $em="Unknown error Occurred";
            header("Location:../edit_profile.php?errorf= $em");
            exit();
           }


 
        }
  }else{

      if(empty($_POST['full_name'])){
       $errorf = "Name is required <br>";
       header("Location:../edit_profile.php?errorf=$errorf");
      }elseif(empty($_POST['password'])){
        $errorp ="Password is required <br>";
      header("Location:../edit_profile.php?errorp=$errorp");
      }

    }
}else{
    $em = "First log in please";
    header("Location:../login.php?success= $em");
    exit();
    }
?>
