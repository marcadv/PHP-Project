<?php
session_start();

$error='';
if(isset($_POST['submit'])){
 if(empty($_POST['username']) || empty($_POST['password'])){
 $error = "Username or Password is Invalid";
 }
 else
 {
 $username=$_POST['username'];
 $password=$_POST['password'];
 $password=md5($password);
 $condb = mysqli_connect("localhost", "root", "");
 $db = mysqli_select_db($condb, "fcibs");
 
 $query = mysqli_query($condb, "SELECT * FROM tbluser WHERE password='$password' AND username='$username'");
 
 $rows = mysqli_num_rows($query);
 if($rows == 1){
 header("Location:../home.php"); 
 }
 else
 {
 $error = "Username or Password is Invalid";
 }
 mysqli_close($condb);
 }
}
 
?>
