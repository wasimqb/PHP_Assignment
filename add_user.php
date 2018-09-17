<!DOCTYPE HTML>
<html>
<head>
<title>Add Employee</title>
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

include 'validation_reg.php';
include('session.php');
?>

<center>
<h1>Add Employee</h1>
<p><span class="">* required field</span></p>
<form method="post" class="form" action="<?php if(!empty($_POST['uname']) && !empty($dept) && !empty($name)
&& !empty($email) && !empty($pass) &&!empty($addr) &&!empty($fon) &&!empty($location) 
&& preg_match("/^[0-9]{10}$/", $fon) && filter_var($email, FILTER_VALIDATE_EMAIL) && !$row )
        {
          
            $_SESSION['uname'] = $uname;
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $email;
            $_SESSION['addr'] = $addr;
            $_SESSION['fon'] =$fon;
            $_SESSION['name'] = $name;
            $_SESSION['dept'] = $dept;
            $_SESSION['location'] = $location;
            header("location:registration_admin.php");
        }
        else {
            echo "";
        }?>" style="max-width:500px;margin:auto">

<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $nameErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-envelope icon"></i>
  <input class="input-field" type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" name="uname" placeholder="Username" value="<?php echo $uname; ?>">
  <span class="error">*<?php echo $unameErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-key icon"></i>
  <input class="input-field" type="password" name="pass" placeholder="Password" value="<?php echo $pass; ?>">
  <span class="error">*<?php echo $passErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-address-card icon"></i>
  <input class="input-field" type="text" name="addr" placeholder="Address" value="<?php echo $addr; ?>">
  <span class="error">*<?php echo $addrErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-mobile-phone icon"></i>
  <input class="input-field" type="text" name="fon" placeholder="Phone" value="<?php echo $fon; ?>">
  <span class="error">*<?php echo $fonErr; ?></span>
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

<button type="submit" class="btn">Add user</button>

</form>
</center>
</body>
</html>