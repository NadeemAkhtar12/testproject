<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
  elseif($_SESSION['usertype']=="student"){
    header("location:login.php");
  }
  include 'connect.php';
  if(isset($_POST['submit'])){
    $data_name = $_POST['name'];
    $data_phone = $_POST['phone'];
    $data_email = $_POST['email'];
    $data_password = $_POST['password'];
    $usertype = "student";
    $select = "select * from schooluser WHERE username= '$data_name'";
    $check_data = mysqli_query($conn,$select);
    $count_data = mysqli_num_rows($check_data);
    if($count_data==1){
        echo "<script type='text/javascript'>
        alert('Username Already Exist');
       </script>";
    }
    else{
     $inserquery = "insert into schooluser (username,phone,email,usertype,password) VALUES
     ('$data_name','$data_phone','$data_email','$usertype','$data_password')";
     $reuslt = mysqli_query($conn,$inserquery);
     if($reuslt){
        echo "<script type='text/javascript'>
            alert('Record Submited Succefully');
           </script>";
     }
     else{
        echo "<script type='text/javascript'>
        alert('Record Submited Not Succefully');
       </script>";
 }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php 
       include 'admin_css.php';
    ?>
</head>
<body>
      <?php
      include 'admin_sidebar.php';
    ?>
    <div class="content">
      <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
           <div class="card nadeem">
                <div class="card-header">
                    <h4>Student Data</h4>
                   </div>
                    <div class="card-body">
                        <form action="add_student.php" method="POST">
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">UserName</label>
     <input type="text" class="form-control" name="name" placeholder="Username">
</div>
<div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
     <input type="text" name="phone" class="form-control" placeholder="Phone">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
     <input type="email" class="form-control" name="email" placeholder="name@example.com">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">PASSWORD</label>
     <input type="password" class="form-control" name="password" placeholder="password">
</div>
    <button type="submit" name="submit" class="btn btn-primary">Add Student</button>
</div>
</form>
                            
                    </div> 
            </div>

        </div>

    </div>
</div> 
</div>
</body>
</html>