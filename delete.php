<?php

$con = mysqli_connect("localhost","root","wasim121","demo") 
        or die("Error " . mysqli_error($con));;

$uid = $_GET['uid'];

$delete1 = "DELETE FROM employee WHERE emp_uid='".$uid."'";
mysqli_query($con,$delete1);
echo $sql1;
$delete2 ="DELETE FROM users WHERE user_id='".$uid."'";
echo $sql;
mysqli_query($con,$delete2);
header("location:home_admin.php")
?>

