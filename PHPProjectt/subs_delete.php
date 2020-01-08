<?php

include 'include/condb.php';

$cid = $_GET['cid'];

$q ="DELETE FROM `tblclient` WHERE cid = $cid";
mysqli_query($condb,$q);

header('location:subs_list.php');

?>