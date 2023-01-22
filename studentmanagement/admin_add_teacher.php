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
if(isset($_POST['add_teacher'])){
    $t_name = $_POST['name'];
    $t_description = $_POST['decription'];
    $file = $_FILES['image']['name'];
    $dst = "./images/".$file;
    $dst_db = "images/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
   $insert = "INSERT INTO teacher(name,descriptioon,image) VALUES('$t_name','$t_description','$dst_db')";
   $result = mysqli_query($conn,$insert);
   if($result){
       header('location:admin_add_teacher.php');
       $_SESSION['message']='Teacher Data inserted Succefully';
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
                    <h4>Add Teacher</h4>
                    <?php 
                       if($_SESSION['message']){
                        echo $_SESSION['message'];
                       }
                       unset($_SESSION['message']);
                    ?>
                   </div>
                    <div class="card-body">
                        <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Teacher Name:</label>
     <input type="text" class="form-control" name="name">
</div>
<div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Description</label>
        <textarea class="form-control" name="decription" rows="3"></textarea>
</div>
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Images</label>
     <input type="file" class="form-control" name="image">
</div>
    <button type="submit" name="add_teacher" class="btn btn-primary">Add Teacher</button>
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