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
 
 if(isset($_POST['add_student'])){
     $username =$_POST['name'];
     $email =$_POST['email'];
     $phone =$_POST['phone'];
     $password =$_POST['password'];
     $usertype="student";

     $check="SELECT * FROM user WHERE username ='$username'";
     $check_user=mysqli_query($data,$check);


     $row_count =mysqli_num_rows($check_user);
     if($row_count==1){
        echo "<script type='text/javascript'>
           
           alert('Username Already Exist.Try Another One!');
           </script>";

     }else{


        $sql="INSERT INTO user(username,email,phone,usertype,password)VALUES('$username','$email','$phone','$usertype','$password')";

        $result =mysqli_query($data,$sql);
   
       if($result){
           echo "<script type='text/javascript'>
           
           alert('Uploaded Successfully!');
           </script>";
       }else{
           echo "Uploaded Failed";
       }
     }

 }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin.css">
    <style type="text/css">
        label{
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .div_deg{
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>
<body>
<?php

include 'admin_sidebar.php';

  ?>
   <div class="content">
   <center>
   <h1>Add Student</h1>
    <div class="div_deg">
        <form action="#" method="POSt">
            <div>
                <label for="">Username</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="text" name="phone">
            </div>
            <div>
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <div>
                
                <input class="btn btn-primary" type="submit" name="add_student" value="Add Student">
            </div>
        </form>
    </div>
   </center>
   </div>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>