<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
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
.main_container{

    width: 80%;
    position : relative;
    margin-top: 12%;
}
</style>
<?php session_start();?>
</head>
<body>

<?php

include 'validation_login.php';
?>

<center>
<div class="main_container">
<h1>Login</h1>
<form method="post" class="form" action="<?php if (!empty($_POST['uname']) && !empty($_POST['pass']) && $row) {

    $_SESSION['uname'] = $uname;
    $_SESSION['pass'] = $pass;
    header("location:sign_in.php");
} else {
    echo "";
}?>" style="max-width:500px;margin:auto">

<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" name="uname" placeholder="Username" value="<?php echo $uname; ?>">
  <span class="error"><?php echo "*".$unameErr; ?></span>
</div>

<div class="input-container">
  <i class="fa fa-key icon"></i>
  <input class="input-field" type="password" name="pass" placeholder="Password" value="">
  <span class="error"><?php echo "*".$passErr; ?></span>
</div>



<button type="submit" class="btn">Login</button>
				<p class="change_link">
					Not a member ?
					<a href="register.php" class="to_register"> Register Here </a>
				</p>


</form>
    </div>
</center>
</body>
</html>