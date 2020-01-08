<?php
include 'include/condb.php';
include 'include/auth.php';
$billdate = $_POST['billdate'];
$duedate = $_POST['duedate'];
$disdate = $_POST['disdate'];
$clients=mysqli_query($condb,"SELECT * FROM tblclient") or die(mysqli_error($condb));
while ($c=mysqli_fetch_assoc($clients)) {
	$cid = $c['cid'];
	$plan = $c['plan'];
	$charges = $c['plan'];
	$remarks = date('F',strtotime($billdate));

	mysqli_query($condb,"INSERT INTO tblhistory(`cid`, `date`, `charges`, `duedate`, `disdate`, `remarks`) VALUES ('$cid','$billdate','$charges','$duedate','$disdate','$remarks')");
}
echo "Bill has been successfully added!";
?>