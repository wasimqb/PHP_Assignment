<?php
session_start();
// define variables and set to empty values
 $unameErr = $passErr = "";
$uname = $pass = "";
$con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "select * from users where password ='".md5($_POST['pass'])."' OR username ='".$_POST['uname']."'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);


    if (empty($_POST["uname"])) {
        $unameErr = "Username Required";
    } else {
        $uname = test_input($_POST["uname"]);
    }

    if (empty($_POST["pass"])) {
        $passErr = "Password required";
    } else {
        $pass = md5($_POST["pass"]);
        if($pass != $row['password']){
            $passErr = "Invalid password";
        }
    }
    $_SESSION['uname'] = $uname;
    $_SESSION['pass'] = $pass;

    $_SESSION['unameErr'] = $unameErr;
    $_SESSION['passErr'] = $passErr;

    if($unameErr == '' && $passErr == '')
    {
        header('location:sign_in.php');
    }
    else header('location:login.php');
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
