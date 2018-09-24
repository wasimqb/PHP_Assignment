<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="Styles/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="Scripts/valid_add_user.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<?php session_start();
if(!isset($_SESSION['user-name']))
header('location:logout.php');
?>

<center>
<h1>Add Employee</h1>
<p><span class="">* required field</span></p>
<form method="post" class="form" onsubmit="return do_add_user();" style="max-width:500px;margin:auto">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" id="name" name="name" placeholder="Name" value="">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" id="email" name="email" onkeyup="return email_check();" placeholder="Email" value="">
  </div>

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" id="uname" name="uname" onkeyup="username_check()" placeholder="Username" value="">
  </div>


  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" id="pass"name="pass" onkeyup="pass_strength()" placeholder="Password" value="">
  </div>

  <div class="input-container">
    <i class="fa fa-address-card icon"></i>
    <input class="input-field" type="text" id="addr" name="addr" placeholder="Address" value="">
  </div>

  <div class="input-container">
    <i class="fa fa-mobile-phone icon"></i>
    <input class="input-field" type="text" id="fon" name="fon" placeholder="Phone" value="">
    </div>

  <div class="input-container">
    <i class="fa fa-simplybuilt icon"></i>
    <input class="input-field" type="text" id="dept" name="dept" placeholder="Department" value="">
  </div>

  <div class="input-container">
    <i class="fa fa-map-marker icon"></i>
    <input class="input-field" type="text" id="location" name="location" placeholder="Location" value="">
    </div>

  <button type="submit" class="btn">Register</button>
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