<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
  elseif($_SESSION['usertype']=="student"){
    header("location:login.php");
  }
  include 'connect.php';
$select = "select * from admission";
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
                    <h4>Applied For Admission</h4>
                   </div>
                    <div class="card-body">
                      <table class="table table-border">
                        <thead>
                           <tr>
                               <th>ID</th>
                               <th>Name</th>
                               <th>Email</th>
                               <th>phone</th>
                               <th>Message</th>
                           </tr>
                         </thead> 
                         <tbody>
                            <?php
                              while($row=$result->fetch_assoc())
                              {
                            ?>
                              <tr>
                              <td><?php echo "{$row['id']}";?></td>
                                 <td><?php echo "{$row['name']}"; ?></td>
                                 <td><?php echo "{$row['email']}"; ?></td>
                                 <td><?php echo "{$row['phone']}"; ?></td>
                                 <td><?php echo "{$row['message']}"; ?></td>
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