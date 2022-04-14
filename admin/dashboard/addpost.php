<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Create Post";
include "header.php";
require "../../include/db.php";
?>
<style>
		.form{
			height: 350px;
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
		.btn{
			background-color: #1DA1F2;
			color: white;
		}
		.btn:hover{
			background-color: #0E6655;
			color: white;
		}.btn:active{
			background-color: red;
			color: white;
		}

	</style>
<div class="form">
	<form action="addingpost.php" method="post" enctype="multipart/form-data">
		<div class="head">
			<h1>Add New Blog</h1>
		</div>
		<div class="body">
			<label>Post Title</label>
			<br>
		   <input type="text" name="title" placeholder="My First Post" required="">
		   <br>
		   <br>
		   <label>Post Image</label>
		   <br>
		   <input type="file" name="img" accept=".jpg,.jpeg,.png" required="">
		   <br>
		   <br>
		   <label>Post Description</label>
		   <br>
           <textarea name="de" placeholder="My First Post" required="">
		   </textarea>
		   <br>
		   <br>
		   <label>References</label>
			<br>
		   <input type="text" name="ref" placeholder="www.google.com">
		   <br>
		   <br>
		   </div>
		<button type="submit" class="btn" name="submit">Create Blog</button>
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
