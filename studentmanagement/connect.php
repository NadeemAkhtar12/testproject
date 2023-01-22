<?php 
     $host = 'sql110.epizy.com';
     $user = 'epiz_33432424';
     $password ='rSlXz7JAKEqamsP';
     $db = 'epiz_33432424_testpro';
     $conn = mysqli_connect($host,$user,$password,$db);
     if($conn===false){
        die('connection is Error');
     }

?>