<?php
error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message']){
  $message=$_SESSION['message'];
  echo "<script type='text/javascript'> 
  
  alert('$message');
  </script>";
}

$host="localhost";
$user="root";
$password="";
$db="studentManagement";

$data=mysqli_connect($host,$user,$password,$db);
$sql ="SELECT * FROM teacher";

$result =mysqli_query($data,$sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
  <label class="logo">W-School</label>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">Contact</a></li> 
    <li><a href="#">Admission</a></li> 
    <li><a href="login.php" class="btn btn-success">Login</a></li>
  </ul>
</nav>
<div class="section-1">
  <label class="img_text">We Teach Students With Care</label>
  <img class="main_img" src="img/school_management.jpg" alt="school_management">
</div>

<div class="container">
  <center>
  <h1>Our Teachers</h1>
 </center>
  <div class="row">
    <div class="col-md-4">
      <img src="img/school2.jpg" alt="school" class="wlc_img">
    </div>
    <div class="col-md-8">
      <h1 class="">Welcome to W-School</h1>
      <p class="">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel deleniti eveniet quis magni consectetur libero maiores eligendi dolorem ab quibusdam, eos debitis asperiores ipsum, placeat sit blanditiis laborum ad accusantium ipsam quia iste fuga. Neque asperiores doloremque adipisci alias? Deserunt sapiente alias enim commodi, tempore eius, minima obcaecati ea architecto voluptatum dolorum veritatis quae omnis accusantium est quam ut totam. Aspernatur dolorem quasi, 
  </div>
</div>

<center>
  <h1>Our Teachers</h1>
</center>

<div class="container">
  <div class="row">
    <?php
    while($info=$result->fetch_assoc())
    {
    ?>
    <div class="col-md-4">
      <img src="<?php echo "{$info['image']}" ?>" alt="" class="teacher">
      <h3><?php echo "{$info['name']}" ?></h3>
      <h5><?php echo "{$info['description']}" ?></h5>
    </div>
    <?php
    }
    ?>
  </div>
</div>

<center>
  <h1>Our Courses</h1>
</center>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <img src="img/web.jpg" alt="" class="courses">
      <h3>Web Development</h3>
    </div>
    <div class="col-md-4">
      <img src="img/marketing.png" alt="" class="courses">
      <h3>Marketing</h3>
    </div>
    <div class="col-md-4">
      <img src="img/graphic.jpg" alt="" class="courses">
      <h3>Graphic designer</h3>
    </div>
  </div>
</div>

<center>
  <h1>Admission</h1>
</center>
<div class="admission-form " align="center">
  <form action="data_check.php" method="POST">
    <div class="adm_deg">
      <label  class="label-txt" for="">Name</label>
      <input class="input_deg" type="text" name="name" id="">
    </div>
    <div class="adm_deg">
      <label class="label-txt" for="">Email</label>
      <input  class="input_deg" type="email" name="email" id="">
    </div>
    <div class="adm_deg" class="adm_deg">
      <label class="label-txt" for="">Phone</label>
      <input  class="input_deg" type="text" name="phone" id="">
    </div>
    <div class="adm_deg">
    <label  class="label-txt" for="">Message</label>
     <textarea class="txt_area" name="message" ></textarea>
    </div>
    <div class="adm_deg">
     
      <input  class="btn btn-primary" type="submit" 
     id="submit" value="apply" name="apply">
    </div>
  </form>
</div>
<footer>
  <h3 class="ftr">All @copyright reserved by Alamin</h3>
</footer>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>