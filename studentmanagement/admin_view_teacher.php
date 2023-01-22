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
  $select = "select * from teacher";
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
                <div class="card-header">
                    <h4>Teachers Data View</h4>
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
                               <th>Teacher Name:</th>
                               <th>Description</th>
                               <th>Images</th>
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
                                 <td><?php echo "{$row['name']}"; ?></td>
                                 <td><?php echo "{$row['descriptioon']}"; ?></td>
                                 <td><img width="75px" height="75px" src="<?php echo "{$row['image']}"; ?>"></td>
                                 <td>
                                 <?php echo "<a class='btn btn-danger btn-sm' onClick=\"javascript:return confirm('Are you Sure Delete Teacher data');\" href='delete_teacher.php?teacher_id={$row['id']}'>Delete</a>"; ?>
                              </td>
                              <td>
                              <?php echo "<a class='btn btn-primary btn-sm' href=''>Update</a>"; ?>
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