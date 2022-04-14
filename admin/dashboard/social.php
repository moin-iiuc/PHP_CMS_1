<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Social Info";
include "header.php";
require "../../include/db.php";
?>
<style>
		.main-content{
			height: auto;
			width: auto;
		}
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
		}
		.btn{
			background-color: #1DA1F2;
			color: white;
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
			height: 60px;
		}
		.foot a{
			color: #FCF3CF;
		}
		.foot a:hover{
			color: #85929E;
		}

	</style>
<div class="content">
	<div class="form">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="head">
			<h1>Social Links Settings</h1>
		</div>
		<div class="body">
			<br>
			<br>
			<?php 
			$query = "SELECT * FROM social";
			$db= new database();
			$result = $db->fetchdata($query);
			if(mysqli_num_rows($result)>0){
		       while($lin=mysqli_fetch_assoc($result)){
?>
			<label>Facebook</label>
		   <input type="text" name="fb" value="<?php echo $lin['fb'] ?>">
		   <br>
		   <br>
		   <label>Instagram</label>
		   <input type="text" name="insta" value="<?php echo $lin['insta'] ?>">
		   <br>
		   <br>
		   <label>LinkedIn</label>
		   <input type="text" name="linkedin" value="<?php echo $lin['linkedin'] ?>">
		   <br>
		   <br>
		   <label>Youtube</label>
		   <input type="text" name="youtube" value="<?php echo $lin['youtube'] ?>">
		   <br>
		   <br>
		   <label>Tweeter</label>
		   <input type="text" name="tweeter" value="<?php echo $lin['tweeter'] ?>">
		   <br>
		   <br>
		   <?php } } ?>
		   </div>
		<button type="submit" class="btn" name="submit">Save</button>
	</form>
</div>
</div>
<br>
<br>
<br>
<?php
if(isset($_POST['submit']))
{
	$fb=$_POST['fb'];
$insta=$_POST['insta'];
$linkedin=$_POST['linkedin'];
$youtube=$_POST['youtube'];
$tweeter=$_POST['tweeter'];

$query = "UPDATE social SET fb = '$fb', insta='$insta', linkedin='$linkedin',youtube='$youtube', tweeter='$tweeter';";
	$db= new database();
	$result = $db->fetchdata($query);
	header("Location:index.php");

}
?>

<?php
	include "footer.php";
?>
<?php 
}
else {
	header("Location:../index.php");
}?>
