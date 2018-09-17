<?php
session_start();

$con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;

$sql = "select * from users where password ='".md5($_SESSION['pass'])."' OR username ='".$_SESSION['uname']."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row)
    {
        $_SESSION['user-name'] = $row['username'];
        if($row['type']=='admin')
        {
            header('location:home_admin.php');
        }
        if($row['type']=='user')
        {
            header('location:home_user.php');
        }
    }
    mysqli_close($con);
?>