<?php
session_start();
if(isset($_POST['do_login']))
{
    try{
        $con = mysqli_connect("localhost","root","wasim121","demo") or die("Error " . mysqli_error($con));;

        $sql1 = "select * from users where password ='".md5($_POST['password'])."' AND username ='".$_POST['uname']."'";    
        $result1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_assoc($result1);
        

        $sql2 = "select * from employee where emp_uid =".($row1['user_id']);    
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
    }catch(Exception $e){
        echo $e->getMessage();
    } 
    if($row1)
    {
        $_SESSION['uid'] = $row1['user_id'];
        $_SESSION['email'] = $row1['email'];
        $_SESSION['name'] = $row1['name'];
        $_SESSION['type'] = $row1['type'];
        $_SESSION['addr'] = $row1['address'];
        $_SESSION['fon'] = $row1['phone'];
        $_SESSION['dept'] = $row2['dept'];
        $_SESSION['location'] = $row2['location'];
        $_SESSION['user-name'] = $row1['username'];
        $_SESSION['uname'] = $row1['username'];
        echo json_encode($row1);
    }
    else echo "fail";
}
mysqli_close($con);
?>