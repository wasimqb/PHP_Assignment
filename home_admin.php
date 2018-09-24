<!DOCTYPE html>
<html lang="en">
<head>

	<title>Admin Area</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table {
    width:90%;
    table-layout: auto;
    margin-top: -10%;
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
input[name="logout"]{
    margin-right:0%;
    margin-top:-16%;
    position:static;
    color: black;
}
.button {    
    margin-right:45%;
    margin-top:-16%;
    color: black;
    position:absolute;
}    
</style>
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
	<button type="button" onclick="location.href='add_user.php'" style="margin-right:45%;
    margin-top:-6%;
    color: black;
    position:absolute;">Add Employee</button>
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