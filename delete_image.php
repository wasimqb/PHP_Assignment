<?php

$con = mysqli_connect("localhost","root","wasim121","demo");

session_start();
$uid = $_GET['uid'];
echo $uid;
$sql = "delete from image where emp_uid=".$uid;
mysqli_query($con,$sql);

header('location:home_user.php?uid='.$uid);

?>
