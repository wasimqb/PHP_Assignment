<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="Styles/home_admin.css">
<title>Admin Area</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript" src="Scripts/load_page.js"></script>
</head>

<body>
<?php
session_start();
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
$con = mysqli_connect("localhost", "root", "wasim121", "demo");
?>
<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="LOGOUT" style="float: right; margin-top:-6%;">
</form>
<button type="button" class="addEmp" onclick="location.href='add_user.php'">Add Employee</button>
<center>
<div id="table-container" class="table-container">
    <table id="t01">
        <tr>
        </table>
        </div>
        <ul class="pagination" id="pagination">
       <script>
        </script>
    </ul> 

</center>
</body>
</html>