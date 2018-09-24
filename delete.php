<?php
$con = mysqli_connect("localhost","root","wasim121","demo") 
        or die("Error " . mysqli_error($con));;
$uid = $_GET['uid'];
$delete_emp = "DELETE FROM employee WHERE emp_uid='".$uid."'";
mysqli_query($con,$delete_emp);
echo $sql1;
$delete_user ="DELETE FROM users WHERE user_id='".$uid."'";
echo $sql;
mysqli_query($con,$delete_user);
header("location:home_admin.php")
?>

