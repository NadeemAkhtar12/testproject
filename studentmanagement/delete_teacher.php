<?php 
   error_reporting(0);
   session_start();
   include 'connect.php';
   if($_GET['teacher_id']){
    $teach_id = $_GET['teacher_id'];
    $dele = "delete from teacher WHERE id='$teach_id '";
   $result = mysqli_query($conn,$dele);
   if($result){
       $_SESSION['message']='your has been deleted succefully';
   header('location:admin_view_teacher.php');
   }
   }
?>