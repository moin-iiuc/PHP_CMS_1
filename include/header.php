<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?> </title>
	<style>
		.header{
			height: auto;
			width: auto;
			background-color: #2C3E50;
			display: grid;
			grid-template-rows: repeat(2, 1fr);
			grid-template-areas: 
			"n"
			"p";
		}
		.name{
			grid-row: n;
			text-align: center;
			color: #ECF0F1;
		}
		.pages{
			grid-row: p;
			text-align: center;
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			grid-template-areas: 
			"h ab co msg";
			
		}
		.home{
			grid-column: h;
			
		}
		.about{
			grid-column: ab;
		}
		.contact{
			grid-column: co;
		}
		.msg{
			grid-column: msg;
		}
		.footer{
			background-color: #2C3E50;
			text-align: center;
			color: #ECF0F1;
			height: auto;
			width: auto;
			font-weight: bold ;
		}
		.footer input{
			border-radius: 5px 5px 5px 5px;
		}
		.date{
			text-align: right;
			margin-right: 10px;
		}
		.btn{
			background-color:#045F5F;
			color: white;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="name">
			<h1>myblogs<sub>bring your thinking live</sub></h1>
		</div>
		<div class="pages">
			<p class="home"><a href="index.php" style="text-decoration: none;color: white">Home</a></p>
			<p class="about"><a href="about.php" style="text-decoration: none;color: white">About us</a></p>
			<p class="contact"><a href="contact.php" style="text-decoration: none;color: white">Contact</a></p>
			<p class="msg"><a href="msg.php" style="text-decoration: none;color: white">Message</a></p>
		</div>
	</div>
	


