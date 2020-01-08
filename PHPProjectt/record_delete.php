<?php

include 'inlucde/condb.php';

$hid = $_GET['hid'];

$q ="DELETE FROM `tblhistory` WHERE hid = $hid";
mysqli_query($condb,$q);

header('location:record_list.php');

?>