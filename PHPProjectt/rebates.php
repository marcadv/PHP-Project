<?php
include 'include/condb.php';
include 'include/auth.php';
$brgy 		= $_POST['brgy'];
$r_date 	= $_POST['r_date'];
$mun 		= $_POST['mun'];
$days 		= $_POST['days'];
$r_no 		= $_POST['r_no'];
$mon 		= date("m",strtotime($r_date));
$yr  		= date("Y",strtotime($r_date));
if($r_no == 0){
	$clients=mysqli_query($condb,"SELECT * FROM tblclient WHERE brgy='$brgy' and mun='$mun' ") or die(mysqli_error($condb));
		//echo $brgy."======".$mun;
}else{
	$clients=mysqli_query($condb,"SELECT * FROM tblclient WHERE mun='$mun' ") or die(mysqli_error($condb));

}

while ($c=mysqli_fetch_assoc($clients)) {
	$cid = $c['cid'];
	$plan = $c['plan'];
	$rebate = ($plan/30)*$days;
	mysqli_query($condb,"UPDATE tblhistory SET rebates ='$rebate' WHERE MONTH(`date`) = '$mon' and YEAR(`date`)='$yr' and cid='$cid'  ")or die(mysqli_error($condb));
}

//echo "Bill has been successfully added!";
?>