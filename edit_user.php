<!DOCTYPE HTML>
<html>
<head>
<title>Edit Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
}

/* Control the right side */
.right {
  right: 0;
  top: -5%;
}

/* If you want the content centered horizontally and vertically */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}
.form{
  width: 150%;
  position : relative;
  margin-left: -25%;
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
    margin-left: 100%;
}
.error_image {
    color: #FF0000;
    margin-top: -10%;
}
img{
    margin-left: 30%;
    max-width:100%;
    max-height:100%;
}
.image{
    height: 180px;
    width: 200px;
}
.image_fit{
    object-fit: contain;
}
.btn_cancel {
    background-color: rgb(224, 75, 224);
    color: white;
    padding: 10px 5px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    margin-top:5px;
} 
.form_image{
    margin-top:-2%;
    width : 100%;
}
</style>
</head>
<body>
<?php session_start();
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
?>
<center>
<div class = "split left">
    <div class = "centered">
        <h1>Edit Profile</h1>
        <p><span class="">* required field</span></p>
        <form method="post" class="form" action="validate_edit_user.php" style="max-width:500px;">
        <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" name="name" placeholder="Name" value="<?php echo $_SESSION['name']; ?>">
        <span class="error">* <?php echo $_SESSION['nameErr']; ?></span>
        </div>
        <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" name="pass" placeholder="Password" value="">
        <span class="error">*<?php echo $_SESSION['passErr']; ?></span>
        </div>

        <div class="input-container">
        <i class="fa fa-address-card icon"></i>
        <input class="input-field" type="text" name="addr" placeholder="Address" value="<?php echo $_SESSION['addr']; ?>">
        <span class="error">*<?php echo $_SESSION['addrErr']; ?></span>
        </div>

        <div class="input-container">
        <i class="fa fa-mobile-phone icon"></i>
        <input class="input-field" type="text" name="fon" placeholder="Phone" value="<?php echo $_SESSION['fon']; ?>">
        <span class="error">*<?php echo $_SESSION['fonErr']; ?></span>
        </div>

        <div class="input-container">
        <i class="fa fa-simplybuilt icon"></i>
        <input class="input-field" type="text" name="dept" placeholder="Department" value="<?php echo $_SESSION['dept']; ?>">
        <span class="error">*<?php echo $_SESSION['deptErr']; ?></span>
        </div>

        <div class="input-container">
        <i class="fa fa-map-marker icon"></i>
        <input class="input-field" type="text" name="location" placeholder="Location" value="<?php echo $_SESSION['location']; ?>">
        <span class="error">*<?php echo $_SESSION['locationErr']; ?></span>
        </div>

        <button type="submit" class="btn">Update</button>
        <button type="button" class="btn_cancel" onclick="document.location.href='home_user.php'">Cancel</button>
        </form>
    </div>
</div>

<div class = "split right">
    <div class = "centered">
        <h1>Upload Image</h1>
        <?php
            $con = mysqli_connect("localhost","root","wasim121","demo");
            $query = "SELECT * FROM image where emp_uid=".$_SESSION['uid'];
            $result= mysqli_query($con,$query);
            $rowcount=mysqli_num_rows($result);
            if($rowcount > 0)
                while($row = mysqli_fetch_assoc($result)){
                    $imageURL = 'uploads/'.$row["img_name"];
        ?>
<div class="image"> <img class="image_fit" src="<?php echo $imageURL; ?>" style="width:100%;height:100%;"/></div>
<a href="delete_image.php">Delete your picture</a><br>
<?php 
    }else{?>
        <div class="image"><img class="image_fit" src="uploads/x.jpg" alt="Hi" style="width:150%;height:150%;"/></div>
    <?php }?>
    <h3>Select Image File to Upload:</h3>
        <form class="form_image" action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload">
            <span class="error_image"><?php echo $_SESSION['imageErr']; ?></span>
        </form>
    </div>
</div>
</center>
</body>
</html>