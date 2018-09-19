<?php
session_start();
// Include the database configuration file
$con = mysqli_connect("localhost","root","wasim121","demo");
$statusMsg = '';
$uid = $_SESSION['uid'];

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$temp = $_FILES["file"]["tmp_name"];
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$sql1 = "select * from image where emp_uid=".$uid;
            $r1 = mysqli_query($con,$sql1);
            $row1 = mysqli_fetch_assoc($r1);

    if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
        $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            if(!$row1){
                $sql = "INSERT into image(img_name,upload_on, emp_uid)
                         VALUES ('".$fileName."',NOW(),".$uid.")";
                // Insert image file name into database
                $insert = mysqli_query($con,$sql);
            }else{ 
                $update = "update image set img_name = '".$fileName."', upload_on = NOW()";
                $insert = mysqli_query($con,$update);
            }
            if($insert){
                $statusMsg = "Upload successfull";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
    }
    }else{
    $statusMsg = 'Please select a file to upload.';   
    }
$_SESSION['imageErr'] = $statusMsg;
header('location:home_user.php');
// Display status message
echo $statusMsg;
?>