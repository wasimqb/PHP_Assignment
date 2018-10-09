<?php

$con = mysqli_connect("localhost","root","wasim121","demo");

session_start();

$sql = "delete from image where emp_uid=".$_SESSION['uid'];
mysqli_query($con,$sql);

header('location:edit_user.php');

?>
