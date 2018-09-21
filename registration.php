<?php
session_start();
$con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;

if(isset($_POST['do_register']))
{
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

      if(!$row2 && isset($name))
      {
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
      session_unset();
}
else if(isset($_POST['do_check_uname'])){
      $uname = $_POST['uname'];
      $sql_uname = "select * from users where username = '".$uname."'";
      $result_uname = mysqli_query($con,$sql_uname);
      $row_uname = mysqli_fetch_assoc($result_uname);

      if($row_uname)
      echo ($row_uname['username']);
      else echo "not exist";
}
else if(isset($_POST['do_check_email'])){
      $email = $_POST['email'];
      $sql_email = "select * from users where email = '".$email."'";
      $result_email = mysqli_query($con,$sql_email);
      $row_email = mysqli_fetch_assoc($result_email);

      if($row_email)
      echo ($row_email['email']);
      else echo "not exist";
}

mysqli_close($con);

 ?>