<?php

include 'include/condb.php';
$query = $_POST['query'];
mysqli_query($condb,$query) or die(mysqli_error($condb));

?>