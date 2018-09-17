<?php

session_start();
session_unset();
session_destroy();

echo $_SESSION['user-name'];
var_dump($_SESSION['user-name']);

header("location:index.php");
exit();

?>