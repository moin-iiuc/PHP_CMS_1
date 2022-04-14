<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Edit Post";
include "header.php";
require "../../include/db.php";
$post=$_GET['id'];
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

	</style>
<div class="form">
	<form action="ed.php?id=<?php echo $post;?>" method="post" enctype="multipart/form-data">
		<div class="head">
			<h1>Edit Blog</h1>
		</div>
		<?php $query = "SELECT * FROM blogs where post_id=$post";
	$db= new database();
	$result = $db->fetchdata($query);
	if(mysqli_num_rows($result)>0){
		while($posti=mysqli_fetch_assoc($result)){ 
			?>
		<div class="body">
			<label>Post Title</label>
			<br>
		   <input type="text" name="title" value="<?php echo $posti['title'];?>" required="">
		   <br>
		   <br>
		   <label>Post Image</label>
		   <br>
		   <input type="file" name="img" accept=".jpg,.jpeg,.png" value="<?php echo $posti['img'];?>">
		   <br>
		   <br>
		   <label>Post Description</label>
		   <br>
		   <textarea name="de" required=""><?php echo $posti['descript'];?></textarea>
		   <br>
		   <br>
		   <label>References</label>
		   <br>
		   <input type="text" name="ref" value="<?php echo $posti['ref'];?>" >
		   <br>
		   <br>
		<?php } }?>
		   </div>
		<button type="submit" class="btn" name="submit">Edit</button>
	</form>
</div>
<?php
	include "footer.php";
?>
<?php 
}
else {
	header("Location:../index.php");
}?>
