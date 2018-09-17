<!DOCTYPE html>
<html>
<head>
<title>Edit employee</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
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

.icon {
    padding: 10px;
    background: rgb(224, 75, 224);
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: rgb(224, 75, 224);
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
</style>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "wasim121", "demo");

session_start();
$uid = $_GET['uid'];

$sql1 = "select * from users where user_id=" . $uid;
$res1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($res1);

$sql2 = "select * from employee where emp_uid = " . $uid;
$rs2 = mysqli_query($con, $sql2) or die(mysql_error());
$row2 = mysqli_fetch_assoc($rs2);

?>
<center>

 <form action="<?php echo "update_admin.php?uid=" . $uid ?>" method="post" style="max-width:500px;margin:auto">
  <h2>Edit Employee Details</h2>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" disabled='disabled' type="text" value="<?php echo $row1['name'] ?>" name="name">
  </div>
  <div class="input-container">
  <i class="fa fa-simplybuilt icon"></i>
  <input class="input-field" type="text" name="dept" placeholder="Department" value="<?php echo $dept; ?>">
  <span class="error">*<?php echo $deptErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-map-marker icon"></i>
  <input class="input-field" type="text" name="location" placeholder="Location" value="<?php echo $location; ?>">
  <span class="error">*<?php echo $locationErr; ?></span>
</div>
  <button type="submit" class="btn" name = "submit">Update</button>
</form>
</center>
</body>
</html>
