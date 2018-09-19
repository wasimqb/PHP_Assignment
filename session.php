<?php

$con = mysqli_connect("localhost","root","wasim121","demo");

session_start();

$user_check = $_SESSION['user-name'];
$sql1 = "select * from users where username='".$user_check."'";
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($res1);
$uid = $row1['user_id'];

$sql2 = "select * from employee where emp_uid = ".$uid ;
$rs2 = mysqli_query($con, $sql2) or die(mysql_error());
$row2 = mysqli_fetch_assoc($rs2);

if(!isset($_SESSION['user-name'])){
    header('location: index.php'); 
    mysqli_close($con); 
    }

?>