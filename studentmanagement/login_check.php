<?php
error_reporting(0);
session_start();
include 'connect.php';
if($conn===false){
    die('connection error');
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
$user = $_POST['username'];
$pass = $_POST['password'];
$data = "select * from schooluser where username='".$user."' AND password='".$pass."'";
$result = mysqli_query($conn,$data);
$row = mysqli_fetch_array($result);
if($row["usertype"]=="student"){
    $_SESSION['username']=$user;
    $_SESSION['usertype']="student";
    header("location:studenthome.php");
}
elseif($row["usertype"]=="admin"){
    $_SESSION['username']=$user;
    $_SESSION['usertype']="admin";
    header("location:adminhome.php");
}
else{
    
   $message = "username or password do not matched";
   $_SESSION['loginMessage']= $message;
   header("location:login.php");
}
}
?>