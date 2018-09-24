<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="Scripts/valid_edit_admin.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="Styles/style.css">
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
?>

<center>
<h1>Edit Profile</h1>
<p><span class="">* required field</span></p>
<form method="post" class="form" onsubmit="return do_edit_admin(<?php echo $uid?>);" style="max-width:500px;margin:auto">
<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text"  name="name" disabled="disabled" placeholder="Name" value="<?php echo $row1['name']; ?>">
</div>


<div class="input-container">
  <i class="fa fa-simplybuilt icon"></i>
  <input class="input-field" type="text" name="dept" id="dept" placeholder="Department" value="<?php echo $row2['dept']; ?>">
</div>

<div class="input-container">
  <i class="fa fa-map-marker icon"></i>
  <input class="input-field" type="text" name="location" id="location" placeholder="Location" value="<?php echo $row2['location']; ?>">
</div>

<button type="submit" class="btn">Update</button>
<button type="button" class="btn_cancel" onclick="redirect_home()">Cancel</button>
     
</form>
<script>
function redirect_home(){
    window.location.href="home_admin.php?";
}
</script>
</center>
</body>
</html>