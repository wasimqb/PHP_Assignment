<?php
$con = mysqli_connect("localhost", "root", "wasim121", "demo");
{ 
    $totalEmpSQL = "SELECT a.user_id,a.username, a.name, a.email,a.address,a.phone, b.dept, b.location 
                    FROM users a, employee b  WHERE a.user_id = b.emp_uid";
                
    $allEmpResult = mysqli_query($con, $totalEmpSQL);
    $totalEmployee = mysqli_num_rows($allEmpResult);
    $totalPages = ceil($totalEmployee/3);
    $page ='';
    for($i=1; $i<=$totalPages; $i++)
         {
           $page .= '<a href="#" onclick="return changePagination('.($i-1).');" id="'.$i.'">'.$i.'</a>&nbsp;&nbsp;';
         }
    echo $page;

}
?>