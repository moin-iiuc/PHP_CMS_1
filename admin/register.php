<?php
require "../include/db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<style>
		.form{
			height: 332px;
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
			text-align: left;
			border: none;
			border-bottom: 2px solid black;
		}
		.body input:hover{
			border-bottom: 2px solid red;
		}
		.btn:hover{
			background-color: #0E6655;
			color: white;
		}
		.btn:active{
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
			<h1>Register</h1>
		</div>
		<div class="body">
			<br>
			<br>
			
			<input type="text" name="name" placeholder="Username">
			<br>
			<br>
		
		<input type="text" name="email" placeholder="Email">
		<br>
		<br>
		
		<input type="password" name="pass" placeholder="Password">
		<br>
		<br>
		</div>
		<input class="btn" type="submit" name="submit" value="Register">
	    <br>
		<br>
		<div class="foot">
			<p style="font-weight: bold;">Already An Admin? <a href="index.php" style="text-decoration:none">Log In </a></p>
		</div>
		
	</form>
</div>
<?php
	if(isset($_POST['submit']))
	{
		try{
			$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		if(empty($name))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($email))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($pass))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else
		{
			$insert_query="INSERT INTO admin(user_name,email,pass_word) VALUES('$name', '$email', '$pass')";
			$mydb= new database();
			$response=$mydb->insertdata($insert_query);
		    if($response==true)
		    {
			    header("Location:index.php");
	        }
		    else
		    {
		        echo '<p style="text-align:center;color:red">Unable To Register!!!</p>';
		    }
	    }
	}
	catch(Exception $e)
		    {
		    	 echo '<p style="text-align:center;color:red;font-weight:bold">Email Already In Use!!!</p>';
		    }
	}
	?>
</body>
</html>