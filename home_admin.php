<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="Styles/home_admin.css">
<title>Admin Area</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
session_start();
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
try {
    $con = mysqli_connect("localhost", "root", "wasim121", "demo");
    $sql = "SELECT a.user_id,a.username, a.name, a.email,a.address,a.phone, b.dept, b.location FROM users a
				INNER JOIN employee b WHERE a.user_id = b.emp_uid ";
    $result = mysqli_query($con, $sql) or die(mysqli_error());
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="LOGOUT" style="float: right; margin-top:-6%;">
</form>
<button type="button" class="addEmp" onclick="location.href='add_user.php'">Add Employee</button>
<center>
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
            <th >Delete employee</th>
        </tr>
        <?php  
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>
                <td>' . $row['name'].'</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['address'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>' . $row['dept'] . '</td>
                <td>' . $row['location'] . '</td>
                <td><a href="edit_admin.php?uid=' . $row['user_id'] . '"> EDIT </a></td>
                <td><a href="delete.php?uid=' . $row['user_id'] . '"> DELETE </a></td>
                </tr>';
            }
        ?>
    </table>
</div>
</center>
</body>
</html>