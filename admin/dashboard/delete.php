<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Delete Post";
include "header.php";
require "../../include/db.php";
$post=$_GET['id'];
?>
<style>
		.form{
			height: 280px;
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
			font-weight: bold;
		}
		.body input{
			border: none;
			border-bottom: 2px solid black;
		}
		.body placeholder{
			font-weight: bold;
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
			height: auto;
		}
		.foot a{
			color: #FCF3CF;
		}
		.foot a:hover{
			color: #85929E;
		}
		.btn{
			background-color: #1DA1F2;
			color: white;
			border-radius: 5px 5px 5px 5px;
		}
		.btn1{
			background-color: red;
			color: white;
			border-radius: 5px 5px 5px 5px;
		}

	</style>
<div class="form">
	<form action="de.php?id=<?php echo $post;?>" method="post" enctype="multipart/form-data">
		<div class="head">
			<h1>Delete Blog</h1>
		</div>
		<div class="body">
			<label>You want to Delete the Post?</label>
		   <br>
		   <br>
		   </div>
		<button type="submit" class="btn" name="submit1">Yes</button>
		<button type="submit" class="btn1" name="submit2">No</button>
	</form>
</div>
<br>
<br>
<?php
	include "footer.php";
?>
<?php 
}
else {
	header("Location:../index.php");
}?>

