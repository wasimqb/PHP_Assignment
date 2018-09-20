<?php
session_start();

include('session.php');

  $uid = $_SESSION['uid'];
  $pass = $_POST['pass'];
  $addr = $_POST['addr'];
  $fon = $_POST['fon'];
  $name = $_POST['name'];
  $dept = $_POST['dept'];
  $location = $_POST['location'];
  if($pass!=NULL){
    $update_sql = "UPDATE users SET name = '".$name."', password = '".md5($pass)."', address = '".$addr."', phone = '".$fon."' WHERE username = '".$_SESSION['uname']."'";
  }
  else $update_sql = "UPDATE users SET name = '".$name."', address = '".$addr."', phone = '".$fon."' WHERE username = '".$_SESSION['uname']."'";
    mysqli_query($con,$update_sql);
    $update_sqlemp = "UPDATE employee SET dept = '".$dept."', location = '".$location."' WHERE emp_uid = ".$uid;
    mysqli_query($con,$update_sqlemp);
  echo $uid;
    
    mysqli_close($con);
?>