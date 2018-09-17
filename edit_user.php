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

$uid = $_GET['user_id'];
$sql1 = "select * from users where user_id=".$uid;
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($res1);

$sql2 = "select * from employee where emp_uid = ".$uid ;
$rs2 = mysqli_query($con, $sql2) or die(mysql_error());
$row2 = mysqli_fetch_assoc($rs2);

// if(!isset($_SESSION['user-name'])){
//     header('location: index.php'); 
//     mysqli_close($con); 
//     }
// define variables and set to empty values

// include('validation_edit_user');

$nameErr = $emailErr = $unameErr = $passErr = $addrErr = $fonErr = $deptErr = $locationErr = "";
$name = $row1['name'];
$pass = $row1['password'];
$addr = $row1['address'];
$fon = $row1['phone'];
$dept = $row2['dept'];
$location = $row2['location'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        echo $uname;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["pass"])) {
        $passErr = "Password required";
    } else {
        $pass = md5(test_input($_POST["pass"]));
    }

    if (empty($_POST["addr"])) {
        $addrErr = "Address is required";
    } else {
        $addr = test_input($_POST["addr"]);
    }

    if (empty($_POST["fon"])) {
        $fonErr = "Phone number is required";
    } else {
        $fon = test_input($_POST["fon"]);
        if(!preg_match("/^[0-9]{10}$/", $fon)) {
            $fonErr = "Invalid phone number";
          }
    }

    if (empty($_POST["dept"])) {
        $deptErr = "Department is required";
    } else {
        $dept = test_input($_POST["dept"]);
    }

    if (empty($_POST["location"])) {
        $locationErr = "Location is required";
    } else {
        $location = test_input($_POST["location"]);
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
    

?>

<center>
<h1>Edit Profile</h1>
<p><span class="">* required field</span></p>
<form method="post" class="form" action="<?php if(!empty($_POST['dept']) && !empty($_POST['name']) 
&& !empty($_POST['pass']) && !empty($_POST['addr']) && !empty($_POST['fon']) 
&& !empty($_POST['location']) && preg_match("/^[0-9]{10}$/", $_POST['fon']))
        {
            echo "update_user.php";
        }
        else {
            echo "";
            }
            ?>" style="max-width:500px;margin:auto">
<div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $nameErr; ?></span>
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

<button type="submit" class="btn">Update</button>
     
</form>
</center>
</body>
</html>