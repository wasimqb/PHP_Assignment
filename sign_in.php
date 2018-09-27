<?php
session_start();

$con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;

try{
    $sql1 = "select * from users where password ='".($_SESSION['pass'])."' AND username ='".$_SESSION['uname']."'";    
    $result1 = mysqli_query($con,$sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = "select * from employee where emp_uid =".$row1['user_id'];
    $result2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_assoc($result2);

    $_SESSION['uid'] = $row1['user_id'];
    $_SESSION['email'] = $row1['email'];
    $_SESSION['name'] = $row1['name'];
    $_SESSION['addr'] = $row1['address'];
    $_SESSION['fon'] = $row1['phone'];
    $_SESSION['dept'] = $row2['dept'];
    $_SESSION['location'] = $row2['location'];

    if($row1)
    {
    $_SESSION['user-name'] = $row1['username'];
    if($row1['type']=='admin')
    {
    header('location:home_admin.php');
    }
    if($row1['type']=='user')
    {
    header('location:home_user.php');
    }
    }
}catch(Exception $e){
    echo $e->getMessage();
}
mysqli_close($con);
?>