<?php
//  include('session.php');
// define variables and set to empty values
$con = mysqli_connect("localhost","root","wasim121","demo");

session_start();

$_SESSION['deptErr'] = $_SESSION['locationErr'] = $_SESSION['nameErr'] = 
$_SESSION['passErr'] = $_SESSION['addrErr'] = $_SESSION['fonErr'] = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        $_SESSION['nameErr'] = "Name is required";
    } else {
        $_SESSION['name'] = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $_SESSION['nameErr'] = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["pass"])) {
        $_SESSION['passErr'] = "Password required";
    } else {
        $_SESSION['pass'] = md5($_POST["pass"]);
    }

    if (empty($_POST["addr"])) {
        $_SESSION['addrErr'] = "Address is required";
    } else {
        $_SESSION['addr'] = test_input($_POST["addr"]);
    }

    if (empty($_POST["fon"])) {
        $_SESSION['fonErr'] = "Phone number is required";
    } else {
        $_SESSION['fon'] = test_input($_POST['fon']);
        if(!preg_match("/^[0-9]{10}$/", $_SESSION['fon'])) {
            $_SESSION['fonErr'] = "Invalid phone number";
          }
    }

    if (empty($_POST["dept"])) {
        $_SESSION['deptErr'] = "Department is required";
    } else {
        $_SESSION['dept'] = test_input($_POST["dept"]);
    }

    if (empty($_POST["location"])) {
        $_SESSION['locationErr'] = "Location is required";
    } else {
        $_SESSION['location'] = test_input($_POST["location"]);
    }
if($_SESSION['deptErr']=='' && $_SESSION['locationErr']==''&& $_SESSION['nameErr'] =='' 
&& $_SESSION['addrErr']=='' && $_SESSION['passErr']=='' && $_SESSION['fonErr']=='' )
{
    header('location:update_user.php');
}
else header('location:edit_user.php');
}

    


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>