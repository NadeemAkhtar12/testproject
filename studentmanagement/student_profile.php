<?php
error_reporting(0);
session_start();
session_destroy();
if(!isset($_SESSION['username']))
  header("location:login.php");
  elseif($_SESSION['usertype']=="admin"){
    header("location:login.php");
  }
  include 'connect.php';
  $name = $_SESSION['username'];
  $updatequery = "SELECT * FROM schooluser WHERE username='$name'";
  $result = mysqli_query($conn,$updatequery);
  $rows = mysqli_fetch_assoc($result);
   if(isset($_POST['update_profile'])){
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $updateprofife = "update schooluser set phone='$phone',email='$email',password='$password' WHERE username='$name'";
       $result = mysqli_query($conn,$updateprofife);
       if($result){
           $_SESSION['message']='Student data Updated Succefully';
           header('location:student_profile.php');
           
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
       include 'student_css.php';
    ?>
</head>
<body>
      <?php 
      include 'student_sidebar.php';
      ?>
      <div class="content">
      <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
           <div class="card nadeem">
                <div class="card-header">
                    <h4>Update Profile</h4>
                   </div>
                    <div class="card-body">
                        <?php
                        if( $_SESSION['message']){
                            echo  $_SESSION['message'];
                        }
                        ?>
                        <form action="student_profile.php" method="POST">
<div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
     <input type="email" name="email" class="form-control" value="<?php echo "{$rows['email']}"; ?>">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Phone</label>
     <input type="type" class="form-control" name="phone" value="<?php echo "{$rows['phone']}"; ?>">
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">PASSWORD</label>
     <input type="password" class="form-control" name="password" value="<?php echo "{$rows['password']}"; ?>">
</div>
    <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
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