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
 $user_id =$_GET['student_id'];
 $sql="SELECT * FROM user WHERE id ='$user_id'";
 $result=mysqli_query($data,$sql);
 $info=$result->fetch_assoc();

//  update//

if(isset($_POST['update']))
{
    $upd_name=$_POST['name'];
    $upd_email=$_POST['email'];
    $upd_phone=$_POST['phone'];
    $upd_password=$_POST['password'];

    $query="UPDATE user SET username='$upd_name',email='$upd_email',phone='$upd_phone',password='$upd_password' WHERE id='$user_id'";
    $result2 =mysqli_query($data,$query);
    if($result2){
      header(("location:view_student.php"));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php

include 'admin_sidebar.php';

  ?>
   <div class="content">
    <center>
    <h1>Update Student</h1>
    <form action="#" method="POST">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text"  name="name" class="form-control" id="inputEmail3" value="<?php echo "{$info['username']}";?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="email" class="form-control" id="inputEmail3" value="<?php echo "{$info['email']}";?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">phone</label>
    <div class="col-sm-10">
      <input type="number" name="phone" class="form-control" id="inputPassword3" value="<?php echo "{$info['phone']}";?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" value="<?php echo "{$info['username']}";?>">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="submit" value="Update" name="update"  class="btn btn-primary">
    </div>
  </div>
</form>
    </center>
   </div>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>