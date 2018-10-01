<?php
include_once('function.php');

$con = mysqli_connect("localhost", "root", "wasim121", "demo");
$rpp = 3;
if(isset($_POST['pageId']) && !empty($_POST['pageId'])){
   $id=$_POST['pageId'];
}else{
   $id='0';
}
$pageLimit= $rpp*$id;
$query="SELECT a.user_id,a.username, a.name, a.email,a.address,a.phone,b.dept, b.location 
        FROM users a, employee b  WHERE a.user_id = b.emp_uid LIMIT ".$pageLimit.",3";
$res=mysqli_query($con,$query);
$count=mysqli_num_rows($res);
$string='<tr>
        <th >Name</th>
        <th >Email</th>
        <th >Address</th>
        <th >Phone</th>
        <th >Department</th>
        <th >Location</th>
        <th >Edit Profile</th>
        <th >Delete employee</th>
        </tr>';
if($count > 0)
{
    while($row=mysqli_fetch_assoc($res))
    {
        $string .= '<tr>
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
    echo $string;
}
?>