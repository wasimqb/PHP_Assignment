<!DOCTYPE html>
<html lang="en">
<head>

	<title>Admin Area</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
table {
    width:90%;
    table-layout: auto;
    margin-top: -10%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: rgb(224, 75, 224);
    color: white;
}
.table-container{
    margin-top: 17%;
}
input[name="logout"]{
    margin-right:0%;
    margin-top:-16%;
    position:static;
    color: black;
}
.button {    
    margin-right:45%;
    margin-top:-16%;
    color: black;
    position:absolute;
}
a:visited { 
    background-color: cyan;
}    
</style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user-name']))
    header('location:logout.php');
$con = mysqli_connect("localhost", "root", "wasim121", "demo");
$showRecordPerPage = 2;

if(isset($_GET['page']) && !empty($_GET['page']))
{
    $currentPage = $_GET['page'];
}else
{
    $currentPage = 1;
}

$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT a.user_id,a.username, a.name, a.email,a.address,a.phone, b.dept, b.location FROM users a
                INNER JOIN employee b WHERE a.user_id = b.emp_uid";
$allEmpResult = mysqli_query($con, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

$sql = "SELECT a.user_id,a.username, a.name, a.email,a.address,a.phone, b.dept, b.location FROM users a
            INNER JOIN employee b WHERE a.user_id = b.emp_uid LIMIT ".$startFrom.", ".$showRecordPerPage;
$result = mysqli_query($con, $sql) or die(mysqli_error());


?>

<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="LOGOUT" style="float: right; margin-top:-6%;">
</form>
	<button type="button" onclick="location.href='add_user.php'" style="margin-right:45%;
    margin-top:-6%;
    color: black;
    position:absolute;">Add Employee</button>
<center>
<div class="table-container">
    <table id="t01">
        
            <tr >
                <th >Name</th>
                <th >Email</th>
                <th >Address</th>
                <th >Phone</th>
                <th >Department</th>
                <th >Location</th>
                <th >Edit Profile</th>
                <th >Delete employee</th>
            </tr>
        <?php
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                    <td>' . $row['name'].'</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['dept'] . '</td>
                    <td>' . $row['location'] . '</td>
                    <td><a href="edit_admin.php?uid=' . $row['user_id'] . '"> EDIT </a></td>
                    <td><a href="delete.php?uid=' . $row['user_id'] . '"> DELETE </a></td>
                    </tr>';
                }
        ?>
    </table>
    
        <ul class="pagination">
            <?php if($currentPage != $firstPage) { ?>
            
                <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">First</span>
                </a>
            </li>
            <?php } ?>
            <?php if($currentPage >= 2) { ?>
            <a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
            <?php } ?>
            <a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
            <?php if($currentPage != $lastPage) { ?>
            <a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
            
                <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                    <span aria-hidden="true">Last</span>
                </a>
            </li>
            <?php } ?>
        </ul>
    

</div>
</center>
</body>
</html>