<?php
session_start();
include_once 'dbconfig.php';

 if(isset($_POST['register'])){
    // var_dump($_POST);exit;
        $res = $crud->createUser($_POST);
	//var_dump($res);exit;
	if($res==1){
	  $_SESSION['user']['login']=1;
	   header("location:productlist.php");
	   
	} else
	{
		header("location:index.php");
	}
   

   
}
?>
<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="index.php">Home</a> <br />

	<h2>Register</h2>
	<form name="" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="register" value="Submit"></td>
			</tr>
		</table>
	</form>

</body>
</html>
