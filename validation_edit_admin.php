<?php
//  include('session.php');
// define variables and set to empty values
$deptErr = $locationErr = "";
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
