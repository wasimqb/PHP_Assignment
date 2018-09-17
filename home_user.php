<!DOCTYPE html>
<html lang="en">
<head>

	<title>User Area</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table {
    width:70%;
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
</style>
</head>
<body>
<?php
include('session.php');
?>
<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="LOGOUT" style="float: right;">
</form>
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
            </tr>
        <?php
                echo '<tr >
                <td>'.$row1['name'].'</td>
                <td>'.$row1['email'].'</td>
                <td>'.$row1['address'].'</td>
                <td>'.$row1['phone'].'</td>
                <td>'.$row2['dept'].'</td>
                <td>'.$row2['location'].'</td>
                <td><a href="edit_user.php?user_id='.$uid.'"> EDIT </a></td>
                <form action="" method="POST" >
                </form>
                </tr>';
        ?>
    </table>
</div>
</center>
</body>
</html>