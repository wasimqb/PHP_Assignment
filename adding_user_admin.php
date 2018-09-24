<?php
session_start();
$con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;

if(isset($_POST['do_add_user'])){

  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];
  $addr = $_POST['addr'];
  $fon = $_POST['fon'];
  $name = $_POST['name'];
  $dept = $_POST['dept'];
  $location = $_POST['location'];

  $sql2 = "select * from users where username = '".$uname."' OR email = '".$email."'";
  $result2 = mysqli_query($con,$sql2);
  $row2 = mysqli_fetch_assoc($result2);

  if(!$row2 && isset($name)){

    $sql = "INSERT INTO users (username, name, email, password, type, address, phone)
          VALUES ('".$uname."', '".$name."','".$email."','".md5($pass)."','user','".$addr."',".$fon.")";
    mysqli_query($con,$sql);
    $sql1 = "select user_id from users where username = '".$uname."'";
    $result = mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($result);
    $emp_uid = $row['user_id'];
    $sqlemp = "INSERT INTO employee (dept,location,emp_uid)
                VALUES ('".$dept."','".$location."','".$emp_uid."')";
    mysqli_query($con,$sqlemp);
    echo "successful";
  }
}

else if(isset($_POST['do_check_uname'])){
  $uname = $_POST['uname'];
  $sql_uname1 = "select * from users where username = '".$uname."'";
  $result_uname1 = mysqli_query($con,$sql_uname1);
  $row_uname1 = mysqli_fetch_assoc($result_uname1);

  if($row_uname1)
  echo ($row_uname1['username']);
  else echo "not exist";
}

else if(isset($_POST['do_check_email'])){
  $email = $_POST['email'];
  $sql_email1 = "select * from users where email = '".$email."'";
  $result_email1 = mysqli_query($con,$sql_email1);
  $row_email1 = mysqli_fetch_assoc($result_email1);

  if($row_email1)
  echo ($row_email1['email']);
  else echo "not exist";
}

mysqli_close($con);

 ?>