<?php
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
        $pass = md5(test_input($_POST["pass"]));
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
