<?php
session_start();

if(!isset($_SESSION["username"])){
    header("location:login.php");
}
elseif( $_SESSION['usertype']=='student'){
    header("location:login.php");
 }

 $host="localhost";
 $user="root";
 $password="";
 $db="studentManagement";

 $data=mysqli_connect($host,$user,$password,$db);

  $sql="SELECT * from admission";

  $result =mysqli_query($data,$sql);
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
  <?php

include 'admin_sidebar.php';

  ?>
   <div class="content">
    <h1 style="text-align: center;"> Applied For Admission</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
   <?php
   
   while($info=$result->fetch_assoc()){

   ?>
   <tr>
   <th><?php echo "{$info['name']}";?></th>
   <td><?php echo "{$info['email']}";?></td>
   <td><?php echo "{$info['phone']}";?></td>
   <td><?php echo "{$info['message']}";?></td>
 </tr>
 <?php
   }
 ?>
    
  </tbody>
</table>
   </div>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>