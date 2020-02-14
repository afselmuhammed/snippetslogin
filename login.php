<?php
session_start();
error_reporting(1);
include_once 'dbconfig.php';
if(isset($_POST['user_login']) && ($_POST['username'] && $_POST['password'] !=""))
{  
	extract($_POST);
	 $res = $crud->getData($username);
   //var_dump($res);
    if($res['password']==$password){
        $_SESSION['user']['login']=1;
        $_SESSION['user']['id']= $res['id'];
        header('Location: productlist.php');
      }
        echo '<div class="container"><div class="row"><div class="col-md-8 offset-2">
              <div class="alert alert-danger text-center">Invalid Username or Password</div>
              </div></div></div>';
	  }
	  if($_SESSION['user']['login']!==1){

		echo "now You Are Logged Out";
		} 
		else
		{?>

          <a href="productlist.php"> Go to Your Dashboard</a>

	<?php } ?>
 
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>

<body

<div class="container">
<div class="row">
<div class="col-md-12">
<a href="index.php">Home</a> 
	<h1>User Login</h1><br><br><br> 
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="user_login" value="Submit"></td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	</div>
	
</body>
</html>
