<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="Styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="Scripts/valid_login.js"></script>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<?php session_start();
?>
</head>
<body>
<center>
<div class="main_container">
    <h1>Login</h1>
    <form method="post" class="form" onsubmit="return do_login();" id="myform" style="max-width:500px;margin:auto">
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" name="uname" id="uname" placeholder="Username" >
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" name="password" id="password" placeholder="Password" value="">
        </div>
        <button type="submit" name="btn" id="btn" class="btn">Login</button>
        <p class="change_link">Not a member ?<a href="register.php" class="to_register"> Register Here </a></p>
    </form>
</div>
</center>
</body>
</html>