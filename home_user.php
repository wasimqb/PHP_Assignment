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
session_start();
include('session.php');
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
?>

<center>
<?php

$query = "SELECT * FROM image where emp_uid=".$_SESSION['uid'];
$result= mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
if($rowcount > 0)
    while($row = mysqli_fetch_assoc($result)){
        $imageURL = 'uploads/'.$row["img_name"];
?>
<div class="image"> <img src="<?php echo $imageURL; ?>" alt="Hi" style="width:100%;height:100%;"/></div>
<a href="delete_image.php">Delete your picture</a>
<?php 
    }else{ ?>
        <div class="image"><img src="uploads/x.jpg" alt="Hi" style="width:150%;height:150%;"/></div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select Image File to Upload:
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload">
            <span class="error">*<?php echo $_SESSION['imageErr']; ?></span>
        </form>
<?php } ?> 
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