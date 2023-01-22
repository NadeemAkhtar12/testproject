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
$select = "select * from schooluser WHERE usertype='student'";
   $result = mysqli_query($conn,$select);
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
                <div class="card-header e-3">
                    <h4>Student Data</h4>
                    <?php
                    if($_SESSION['message']){
                        echo $_SESSION['message'];
                    }
                    unset($_SESSION['message']);
                    ?>
                   </div>
                    <div class="card-body">
                      <table class="table table-border">
                        <thead>
                           <tr>
                               <th>Sr No.</th>
                               <th>Username</th>
                               <th>Phone</th>
                               <th>Email</th>
                               <th>Password</th>
                               <th>Delete</th>
                               <th>Update</th>
                           </tr>
                         </thead> 
                         <tbody>
                            <?php
                              while($row=$result->fetch_assoc())
                              {
                            ?>
                              <tr>
                              <td><?php echo "{$row['id']}";?></td>
                                 <td><?php echo "{$row['username']}"; ?></td>
                                 <td><?php echo "{$row['phone']}"; ?></td>
                                 <td><?php echo "{$row['email']}"; ?></td>
                                 <td><?php echo "{$row['password']}"; ?></td>
                                 <td>
                                    
                                        <?php echo "<a class='btn btn-danger btn-sm' onClick=\"javascript:return confirm('Are you Sure Delete Student data');\" href='delete.php?student_id={$row['id']}'>Delete</a>"; ?>
                              </td>
                              <td>
                                    
                                        <?php echo "<a class='btn btn-primary btn-sm' href='update_student.php?student1_id={$row['id']}'>Update</a>"; ?>
                              </td>
                              </tr>
                            <?php 
                              }
                            ?>
                           </tbody>
                      </table>
                     
                    </div> 
            </div>

        </div>

    </div>
</div> 
                            </div>                         
</body>
</html>