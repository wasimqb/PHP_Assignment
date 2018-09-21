<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="Scripts/valid_register.js"></script>
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
<?php session_start();?>
</head>
<body>

<center>
<h1>Register Form</h1>
<p><span class="">* required field</span></p>
<form method="post" class="form" onsubmit="return do_register();" style="max-width:500px;margin:auto">

<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" id="name" name="name" placeholder="Name" value="">
</div>

<div class="input-container">
  <i class="fa fa-envelope icon"></i>
  <input class="input-field" type="text" id="email" name="email" onkeyup="email_check()" placeholder="Email" value="">
</div>

<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" id="uname" name="uname" onkeyup="username_check()" placeholder="Username" value="">
</div>


<div class="input-container">
  <i class="fa fa-key icon"></i>
  <input class="input-field" type="password" id="pass"name="pass" placeholder="Password" value="">
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
				<p class="change_link">  
					Already a member ?
					<a href="login.php" class="to_register"> Go and Log in </a>
				</p>
  
      
</form>
</center>
</body>
</html>