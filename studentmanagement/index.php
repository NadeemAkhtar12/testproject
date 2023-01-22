<?php
  error_reporting(0);
  session_start();
  session_destroy();
  if($_SESSION['message']){
   $message = $_SESSION['message'];
   echo "<script type='text/javascript'> 
          alert('$message');
   </script>";
  }
  include 'connect.php';
  $select = "select * from teacher";
  $result = mysqli_query($conn,$select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=initial-scale=1.0">
    <title>Code Zone</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
     <nav>
        <label class="logo">W-CodeZone</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
     </nav>
     <div class="section1">
        <img class="main_img" src="image/edu.jpg">
     </div>
     <div class="container">
        <div class="row">
            <div class="col-md-4">
            <img class="welcome_img" src="image/scho.jpg">
            </div>
            <div class="col-md-8">
             <h1>Welcome W-Code Zone IT</h1>
             <p>when an unknown printer took a galley of type and scrambled it t
                o make a type specimen book. It has survived not only five centuries, 
                but also the leap into electronic typesetting, remaining essentially 
                unchanged. It was popularised in the 1960s with the release of 
                Letraset sheets containing Lorem Ipsum passages, and more 
                recently with desktop publishing software like Aldus PageMaker 
                including versions of Lorem Ipsum 
                It was popularised in the 1960s with the release of 
                Letraset sheets containing Lorem Ipsum passages, and more 
                recently with desktop publishing software like Aldus PageMaker 
                including versions of Lorem Ipsum</p>
            </div>

        </div>

     </div>
     <center>
        <h1>Our Teachers</h1>
     </center>
     <div class="container">
        <div class="row">
        <?php 
          while($rows=$result->fetch_assoc()){

      ?>
         <div class="col-md-4">
            <img class="teacher" src="<?php echo "{$rows['image']} "?>">
            <h3><?php echo "{$rows['name']} "?></h3>
            <p><?php echo "{$rows['descriptioon']} "?></p>
        </div>
        <?php 
          }
         ?>
        </div>
     
         </div>
     <center>
        <h1>Our Course</h1>
     </center>
     <div class="container">
        <div class="row">
         <div class="col-md-4">
            <img class="teacher" src="image/web.jpg">
            <h3>Web Development</h3>
         </div>
         <div class="col-md-4">
         <img class="teacher" src="image/graphic.jpg">
         <h3>Graphics Design</h3>
         </div>
         <div class="col-md-4">
         <img class="teacher" src="image/marketing.png">
         <h3>Marketing</h3>
         </div>
        </div>
     </div>
      <center>
         <h1>Admission Form</h1>
      </center>
      <div align="center" class="admission-form">
      <form action="data_check.php" method="POST">
      <div class="adm-int">
         <label class="label_text">Name</label>
         <input class="input_deg" type="text" name="name">
         </label>
      </div>
      <div class="adm-int">
         <label class="label_text">Email</label>
         <input class="input_deg" type="email" name="email">
         </label>
      </div>
      <div class="adm-int">
         <label class="label_text">Phone</label>
         <input class="input_deg" type="text" name="phone">
         </label>
      </div>
      <div>
         <label class="label_text">Message</label>
         <textarea class="input_txt" name="message"></textarea>
      </div>
      <div class="adm-int">
      <input class="btn btn-primary" name="submit" type="submit" value="Apply">
</div>
</form>
</div>
<footer class="footer">
  <div class="footer-left col-md-4 col-sm-6">
    <p class="about">
      <span> About the company</span> Ut congue augue non tellus bibendum, in varius tellus condimentum. In scelerisque nibh tortor, sed rhoncus odio condimentum in. Sed sed est ut sapien ultrices eleifend. Integer tellus est, vehicula eu lectus tincidunt,
      ultricies feugiat leo. Suspendisse tellus elit, pharetra in hendrerit ut, aliquam quis augue. Nam ut nibh mollis, tristique ante sed, viverra massa.
    </p>
    <div class="icons">
      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-google-plus"></i></a>
      <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
  </div>
  <div class="footer-center col-md-4 col-sm-6">
    <div>
      <i class="fa fa-map-marker"></i>
      <p><span>Zam Zam Apartment, Tedhi Pulia, Adil Nagar Lucknow,</span>India</p>
    </div>
    <div>
      <i class="fa fa-phone"></i>
      <p> (+91)9170613509</p>
    </div>
    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="#"> code@zoneit.com</a></p>
    </div>
  </div>
  <div class="footer-right col-md-4 col-sm-6">
    <h2><span>W-CodeZone</span></h2>
    <p class="menu">
      <a href="#"> Home</a> |
      <a href="#">Contact Us</a> |
      <a href="#">Admdmission</a> 
    </p>
    <p class="name"> Company Name &copy; 2023</p>
  </div>
</footer>
        
</body>
</html>