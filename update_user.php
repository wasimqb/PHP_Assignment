<?php
session_start();

include('session.php');

  $uid = $_SESSION['uid'];
  $pass = $_SESSION['pass'];
  $addr = $_SESSION['addr'];
  $fon = $_SESSION['fon'];
  $name = $_SESSION['name'];
  $dept = $_SESSION['dept'];
  $location = $_SESSION['location'];

  if($pass == "")
  {
    $update_sql = "UPDATE users SET name = '".$name."', address = '".$addr."', 
                    phone = '".$fon."' WHERE username = '".$_SESSION['uname']."'";
  }
  else{
    $update_sql = "UPDATE users SET name = '".$name."', password = '".$pass."', address = '".$addr."', 
                  phone = '".$fon."' WHERE username = '".$_SESSION['uname']."'";
  }
    mysqli_query($con,$update_sql);
    $update_sqlemp = "UPDATE employee SET dept = '".$dept."', location = '".$location."' WHERE emp_uid = ".$uid;
    mysqli_query($con,$update_sqlemp);
    echo "successful";
    header("location:home_user.php");
    
    mysqli_close($con);
?>