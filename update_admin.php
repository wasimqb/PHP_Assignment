<?php
session_start();
  $con = mysqli_connect("localhost", "root", "wasim121", "demo");

  $uid = $_GET['uid'];
  $dept = $_SESSION['dept'];
  $location = $_SESSION['location'];
    $sqlemp = "UPDATE employee SET dept = '".$dept."', location = '".$location."' WHERE emp_uid = ".$uid;
    mysqli_query($con,$sqlemp);
    header("location:home_admin.php");
   
    mysqli_close($con);
?>