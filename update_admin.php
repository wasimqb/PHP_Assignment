<?php
session_start();
  $con = mysqli_connect("localhost", "root", "wasim121", "demo");

  $uid = $_GET['uid'];
  $dept = $_POST['dept'];
  $location = $_POST['location'];
  if(isset($_POST['do_edit_admin'])){
    $sqlemp = "UPDATE employee SET dept = '".$dept."', location = '".$location."' WHERE emp_uid = ".$uid;
    mysqli_query($con,$sqlemp);
  }
   
    mysqli_close($con);
?>