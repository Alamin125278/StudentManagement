<?php
session_start();
error_reporting(0);

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
$sql="SELECT * FROM teacher";

$result =mysqli_query($data,$sql);

if($_GET['teacher_id']){
    $t_id =$_GET['teacher_id'];

    $sql2 ="DELETE FROM teacher WHERE id ='$t_id'";
    $result2 =mysqli_query($data,$sql2);

    if($result2){
        header("location:admin_view_teacher.php");
    }
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php

include 'admin_sidebar.php';

  ?>
   <div class="content">
    <h1 style="text-align: center;">View All Teacher Data</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"> TeacherName</th>
      <th scope="col">About Teacher</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
  <?php
   
   while($info=$result->fetch_assoc())
   {

   ?>
   <tr>
      <td><?php echo "{$info['name']}";?></td>
      <td><?php echo "{$info['description']}";?></td>
      <td><img height="100px" width="100px" src="<?php echo "{$info['image']}";?>" alt=""></td>
      <td><?php echo "<a class='btn btn-danger'onClick=\"javascript:return confirm('Are you sure to delete this ?')\" 
      href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";?></td>
      <td><?php echo "<a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>";?></td>
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