<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Index Page</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 75%;
    margin-bottom: 15px;
}
.centerDiv
	{
	
		width:30%;
		height:200px;
		position: fixed;
		top: 50%;
		left: 50%;
		margin-top: -200px;
		margin-left: -200px;
	}
.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
}
button{
    border: 2px solid red;
    border-radius: 20px;
    padding: 12px;


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
    color: rgb(255, 255, 255);
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 75%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
body{
  background:rgb(255, 255, 255);
}
</style>

</head>

<body>
<?php 
session_start();
session_unset();
?>
    <center>
        <div class="centerDiv">
            

                <h2>Welcome</h2>
          <form action="login.php">
              <button type="submit" class="btn"><a href="login.html"></a>Login</button>
          </form>
          <form action="register.php">
                <button style="margin:5px;" type="submit" class="btn"><a href="register.php"></a>Register</button>
          </form>
        
        </div>
    </center>
</body>

</html>