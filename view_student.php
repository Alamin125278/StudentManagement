<?php
error_reporting(0);
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
$sql="SELECT * FROM user WHERE usertype ='student'";

$result =mysqli_query($data,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php

include 'admin_sidebar.php';

  ?>
    <div class="content">
    <h1 style="text-align: center;"> Student Data</h1>
    <?php
    if($_SESSION['message']){
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    ?>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Password</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
   <?php
   
   while($info=$result->fetch_assoc()){

   ?>
   <tr>
   <th><?php echo "{$info['username']}";?></th>
   <td><?php echo "{$info['email']}";?></td>
   <td><?php echo "{$info['phone']}";?></td>
   <td><?php echo "{$info['password']}";?></td>
   <td><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure to delete this ?')\" href='delete.php?student_id={$info['id']}'>Delete</a>";?></td>
   <td><?php echo "<a class='btn btn-primary' href='update.php?student_id={$info['id']}'>Update</a>";?></td>
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