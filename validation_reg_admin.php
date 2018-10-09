<?php
session_start();
include('test_input.php');

// define variables and set to empty values
$nameErr = $emailErr = $unameErr = $passErr = $addrErr = $fonErr = $deptErr = $locationErr = "";
$name = $email = $uname = $pass = $addr = $fon = $dept = $location = "";
$conn = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($conn));;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "select * from users where email ='".$_POST['email']."' OR username ='".$_POST['uname']."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
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

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
         else if($email == $row['email'])
         $emailErr = "User already exists";
    }

    if (empty($_POST["uname"])) {
        $unameErr = "Username Required";
    } else {
        $uname = test_input($_POST["uname"]);
        if($uname == $row['username'])
        $unameErr = "Username already exists";
    }

    if (empty($_POST["pass"])) {
        $passErr = "Password required";
    } else {
        $pass = md5($_POST["pass"]);
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

    $_SESSION['uname'] = $uname;
    $_SESSION['name'] = $name;
    $_SESSION['pass'] = $pass;
    $_SESSION['email'] = $email;
    $_SESSION['addr'] = $addr;
    $_SESSION['fon'] = $fon;
    $_SESSION['dept'] = $dept;
    $_SESSION['location'] = $location;

    $_SESSION['unameErr'] = $unameErr;
    $_SESSION['nameErr'] = $nameErr;
    $_SESSION['passErr'] = $passErr;
    $_SESSION['emailErr'] = $emailErr;
    $_SESSION['addrErr'] = $addrErr;
    $_SESSION['fonErr'] = $fonErr;
    $_SESSION['deptErr'] = $deptErr;
    $_SESSION['locationErr'] = $locationErr;
    
    if($nameErr == '' && $emailErr == '' && $unameErr == '' && $passErr == '' && $addrErr == ''
    && $fonErr == '' && $deptErr == '' && $locationErr == '')
    {
        header('location:adding_user_admin.php');
    }
    else header('location:add_user.php');
}
    
mysqli_close($conn);
?>
