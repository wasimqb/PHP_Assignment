<?php
  $con = mysqli_connect("localhost", "root", "wasim121", "demo");

  $uid = $_GET['uid'];
  $dept = $_POST['dept'];
  $location = $_POST['location'];

    // $sql1 = "select user_id from users where username = '".$uname."'";
    // $result = mysqli_query($con,$sql1);
    // $row = mysqli_fetch_assoc($result);
    // $emp_uid = $row['user_id'];
    $sqlemp = "UPDATE employee SET dept = '".$dept."', location = '".$location."' WHERE emp_uid = ".$uid;
    mysqli_query($con,$sqlemp);
    header("location:home_admin.php");
   
    mysqli_close($con);
?>