<!DOCTYPE html>
<html lang="en">
<head>
<form action="logout.php" method="POST">
	<input type="submit" class="logout" name="logout" value="LOGOUT" style=" float: right;align: top">
</form>

	<title>User Area</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table {
    width:90%;
    margin-top: -15%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: rgb(224, 75, 224);
    color: white;
}
.table-container{
    margin-top: 17%;
}
/* input[name="logout"]{
    margin-right:0%;
    margin-top:0%;
    position:absolute;
    color: black;
} */
.image{
    width: 10%;
    height: 10%;
    margin-top: 0%
}
</style>
</head>
<body>
<?php
$con = mysqli_connect("localhost","root","wasim121","demo");

session_start();
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
    
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