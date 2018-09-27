<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}
.form{
  width: 30%;
}
.icon {
    padding: 10px;
    background: rgb(224, 75, 224);
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 5px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: rgb(224, 75, 224);
    color: white;
    padding: 10px 5px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
.btn_login{
    background-color: rgb(224, 75, 224);
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    width: 50%;
    opacity: 0.9;
}
.btn:hover {
    opacity: 1;
}

.error {
    color: #FF0000;
    position: absolute;
    margin-left: 30%;
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

$name = $row1['name'];
$_SESSION['dept'] = $row2['dept'];
$_SESSION['location'] = $row2['location'];

?>

<center>
<h1>Edit Profile</h1>
<p><span class="">* required field</span></p>
<form method="post" class="form" action="<?php echo "validate_edit_admin.php?uid=".$uid;?>" style="max-width:500px;margin:auto">
<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" name="name" disabled="disabled" placeholder="Name" value="<?php echo $name; ?>">
</div>


<div class="input-container">
  <i class="fa fa-simplybuilt icon"></i>
  <input class="input-field" type="text" name="dept" placeholder="Department" value="<?php echo $_SESSION['dept']; ?>">
  <span class="error">*<?php echo $_SESSION['deptErr']; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-map-marker icon"></i>
  <input class="input-field" type="text" name="location" placeholder="Location" value="<?php echo $_SESSION['location']; ?>">
  <span class="error">*<?php echo $_SESSION['locationErr']; ?></span>
</div>

<button type="submit" class="btn">Update</button>
     
</form>
</center>
</body>
</html>