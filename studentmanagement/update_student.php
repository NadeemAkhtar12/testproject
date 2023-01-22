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
if($conn===false){
    die('connection error');
}
$id = $_GET['student1_id'];
$query = "select * from schooluser WHERE id='$id'";
$result = mysqli_query($conn,$query);
$rows = $result->fetch_assoc();
if(isset($_POST['update'])){
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $update = "update schooluser SET username='$name',phone='$phone',email='$email',password='$password' WHERE id='$id'";
     $result = mysqli_query($conn,$update );
     if($result){
        $_SESSION['message']="student data Updated Succefully";
       header('location:view_student.php');
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
                    <h4>Update Student Data</h4>
                   </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">UserName</label>
     <input type="text" class="form-control" name="name" value="<?php echo "{$rows['username']}"; ?>">
</div>
<div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
     <input type="text" name="phone" class="form-control" value="<?php echo "{$rows['phone']}"; ?>">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email address</label>
     <input type="email" class="form-control" name="email" value="<?php echo "{$rows['email']}"; ?>">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">PASSWORD</label>
     <input type="password" class="form-control" name="password" value="<?php echo "{$rows['password']}"; ?>">
</div>
    <button type="submit" name="update" class="btn btn-primary">Update Student</button>
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