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
if($_GET['teacher_id']){
    $t_id =$_GET['teacher_id'];
    $sql="SELECT * FROM teacher WHERE id ='$t_id'";
    $result=mysqli_query($data,$sql);
    $info=$result->fetch_assoc();
}

//  update//

if(isset($_POST['update_teacher']))
{
    $t_name=$_POST['name'];
    $t_des=$_POST['description'];
    $t_file=$_FILES['image']['name'];

    $dst="./image/".$t_file;
    $dst_db="image/".$t_file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

   if($t_file){
    $query="UPDATE teacher SET name='$t_name',description='$t_description',image='$dst_db' WHERE id='$t_id'";
   }else{
    $query="UPDATE teacher SET name='$t_name',description='$t_description' WHERE id='$t_id'";
   }
    $result2 =mysqli_query($data,$query);
    if($result2){
      header(("location:admin_view_teacher.php"));
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
   <center>
    <h1>Update Teacher Data</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Teacher Name</label>
    <div class="col-sm-10">
      <input type="text"  name="name" class="form-control" id="inputEmail3" value="<?php echo "{$info['name']}";?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <textarea type="text" name="description" class="form-control" id="inputEmail3"><?php echo "{$info['description']}";?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Teache Old Image </label>
    <div class="col-sm-10">
     <img  width="100px" src="<?php echo "{$info['image']}";?>" alt="">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Teache New Image </label>
    <div class="col-sm-10">
      <input type="file" name="image" class="form-control" id="inputPassword3" value="<?php echo "{$info['image']}";?>">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="submit" value="Update" name="update_teacher"  class="btn btn-primary">
    </div>
  </div>
</form>
    </center>

   </div>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>