<?php
 error_reporting(0);
 session_start();
 include 'connect.php';
 if(isset($_POST['submit'])){
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];
    $query = "INSERT INTO admission (name,email,phone,message) VALUES ('$data_name','$data_email','$data_phone','$data_message')"; 
    $result = mysqli_query($conn,$query);
    if($result){
       $_SESSION['message']="Aplly Form Succefully";
        header('location:index.php');
    }
     else{
          echo "Apply Not Succefully";
     }
 }


?>