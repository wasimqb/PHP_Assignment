<?php
session_start();

include('session.php');

  $pass = $_POST['psw'];
  $addr = $_POST['address'];
  $fon = $_POST['phone'];
  $name = $_POST['name'];
  $dept = $_POST['dept'];
  $location = $_POST['location'];

    $update_sql = "UPDATE users SET name = '".$name."', password = '".md5($pass)."', address = '".$addr."', phone = '".$fon."' WHERE user_id = ".$uid;
    echo $update_sql;
    mysqli_query($con,$update_sql);
    $update_sqlemp = "UPDATE employee SET dept = '".$dept."', location = '".$location."' WHERE emp_uid = ".$uid;
    mysqli_query($con,$update_sqlemp);
    echo "successful";
    header("location:home_user.php");
    
    mysqli_close($con);
?>