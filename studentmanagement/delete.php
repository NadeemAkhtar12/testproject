<?php
session_start();
include 'connect.php';
if($_GET['student_id']){
    $user_id = $_GET['student_id'];
    $dele = "delete from schooluser WHERE id='$user_id '";
    $result = mysqli_query($conn,$dele);
    if($result){
       $_SESSION['message']='Delete Student data Succefully';
      header('location:view_student.php');
    }
}
?>