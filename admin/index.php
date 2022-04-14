<?php
session_start();
if(isset($_SESSION['auth']))
{
	header("Location:dashboard/index.php");
}
else
{
	?>

	<?php
require "../include/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In</title>
	<style>
		.form{
			height: 292.8px;
			width: 400px;
			background-color: #D0D3D4;
			box-shadow: 10px 10px 10px 10px grey;
			text-align: center;
            margin: auto;
		}
		.head{
			height: 60px;
			background-color: #0E6655;
			color: #F0F3F4;
			text-align: center;
		}
		.body{
			text-align: center;
			justify-content: space-around;
		}
		.body input{
			border: none;
			border-bottom: 2px solid black;
		}
		.body input:hover{
			border-bottom: 2px solid red;
		}
		.btn:hover{
			background-color: #0E6655;
			color: white;
		}.btn:active{
			background-color: red;
			color: white;
		}
		.foot{
			background-color: #0E6655;
			color: #F0F3F4;
			text-align: center;
			height: 60px;
		}
		.foot a{
			color: #FCF3CF;
		}
		.foot a:hover{
			color: #85929E;
		}

	</style>
</head>
<body>
	<div class="form">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="head">
			<h1>Log In</h1>
		</div>
		<div class="body">
			<br>
			<br>
		<input type="text" name="email" placeholder="Email">
		<br>
		<br>
		<input type="password" name="pass" placeholder="Password">
		<br>
		<br>
		</div>
		<input class="btn" type="submit" name="submit" value="Log In">
	    <br>
		<br>
		<div class="foot">
			<p style="font-weight: bold;">Not a Admin yet? <a href="register.php" style="text-decoration:none">Register Here</a></p>
		</div>
		
	</form>
</div>
<?php
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		if(empty($email))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($pass))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else
		{
			$fetch_query="SELECT *FROM admin where email = '$email' AND pass_word= '$pass'";
			$mydb= new database();
			$response=$mydb->fetchdata($fetch_query);
			$data=mysqli_fetch_assoc($response);
		    if(mysqli_num_rows($response)> 0)
		    {
			    $_SESSION['username']=$data['user_name'];
			    $_SESSION['auth']=1;
			    header("Location:dashboard/index.php");
	        }
		    else
		    {
		        echo '<p style="text-align:center;color:red;font-weight:bold">Wrong Credentials</p>';
		    }
	    }
	}
	?>
<?php } ?>
</body>
</html>