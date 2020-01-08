<?php

include 'inlcude/condb.php';

$user_id = $_GET['user_id'];

$q ="DELETE FROM `tbluser` WHERE user_id = $user_id";
mysqli_query($condb,$q);

header('location:admin_list.php');

?>