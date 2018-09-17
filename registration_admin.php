<?php
session_start();
$con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;

  $uname = $_SESSION['uname'];
  $pass = $_SESSION['pass'];
  $email = $_SESSION['email'];
  $addr = $_SESSION['addr'];
  $fon = $_SESSION['fon'];
  $name = $_SESSION['name'];
  $dept = $_SESSION['dept'];
  $location = $_SESSION['location'];

  // $sql3 = "select * from users where username='".$uname."'";
  // $result = mysqli_query($con,$sql3);
  // $row3 = mysqli_fetch_assoc($result);
  // echo $row;
  // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //   echo "Invalid email format";
  // }
  // elseif ($row3)
  // {
  //   echo "select * from users where username='".$uname."'";
  //     header("location:register1.html");
  // }
  //  else{
    $sql = "INSERT INTO users (username, name, email, password, type, address, phone)
          VALUES ('".$uname."', '".$name."','".$email."','".$pass."','user','".$addr."',".$fon.")";
    mysqli_query($con,$sql);
    $sql1 = "select user_id from users where username = '".$uname."'";
    $result = mysqli_query($con,$sql1);
    $row = mysqli_fetch_assoc($result);
    $emp_uid = $row['user_id'];
    $sqlemp = "INSERT INTO employee (dept,location,emp_uid)
               VALUES ('".$dept."','".$location."','".$emp_uid."')";
    mysqli_query($con,$sqlemp);
    echo "Registration Successful";
    header("location:home_admin.php");
//   }
// }

mysqli_close($con);

 ?>