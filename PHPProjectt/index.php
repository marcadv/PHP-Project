<?php
include 'include/loginserv.php';
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/marz.css"/>
</head>
<body> 
	<div class="text-container">
	<h1>Fiesta Cable Inc. <br/> Billing System</h1>
	</div>
		<div class="login">
		<h2 align="center">Login</h2>
		<form action=" " method="post" style="text-align:center;">
		<input type="text" placeholder="Username" id="username" name="username" class="form-text"><br/><br/>
		<input type="password" placeholder="Password" id="password" name="password" class="form-text"><br/><br/>
		<input type="submit" value="Login" name="submit">

<span><?php echo $error; ?></span>
</body>
</html>
