<?php
//  include('session.php');
// define variables and set to empty values
$con = mysqli_connect("localhost","root","wasim121","demo");

session_start();
$uid = $_GET['uid'];
$_SESSION['deptErr']='';
$deptErr = $locationErr ='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["dept"])) {
        $deptErr = "Department is required";
    } else {
        $_SESSION['dept'] = test_input($_POST["dept"]);
    }

    if (empty($_POST["location"])) {
        $locationErr = "Location is required";
    } else {
        $_SESSION['location'] = test_input($_POST["location"]);
    }
if($deptErr == '' && $locationErr == '')
{
    header('location:update_admin.php?uid='.$uid);
}
else{
    $_SESSION['deptErr'] = $deptErr;
    $_SESSION['locationErr'] = $locationErr;
    header('location:edit_admin.php?uid='.$uid);
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