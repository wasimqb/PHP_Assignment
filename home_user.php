<!DOCTYPE html>
<html lang="en">
<head>
<form action="logout.php" method="POST">
	<input type="submit" class="logout" name="logout" value="LOGOUT" style=" float: right;align: top">
</form>
<title>User Area</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Styles/home_user.css">
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
$con = mysqli_connect("localhost","root","wasim121","demo");
    
$uid = $_GET['uid'];
$sql1 = "select * from users where user_id=".$uid;
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($res1);

$sql2 = "select * from employee where emp_uid = ".$uid ;
$rs2 = mysqli_query($con, $sql2) or die(mysql_error());
$row2 = mysqli_fetch_assoc($rs2);

echo '<center>';
?>
<div class="table-container">
    <table id="t01">
        <tr >
            <th >Name</th>
            <th >Email</th>
            <th >Address</th>
            <th >Phone</th>
            <th >Department</th>
            <th >Location</th>
            <th >Edit Profile</th>
        </tr>
        <?php
            echo '<tr >
            <td>'.$row1['name'].'</td>
            <td>'.$row1['email'].'</td>
            <td>'.$row1['address'].'</td>
            <td>'.$row1['phone'].'</td>
            <td>'.$row2['dept'].'</td>
            <td>'.$row2['location'].'</td>
            <td><a href="edit_user.php"> EDIT </a></td>
            </tr>';
        ?>
    </table>
</div>
</center>
</body>
</html>