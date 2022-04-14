<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Contact Info";
include "header.php";
require "../../include/db.php";
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
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="head">
			<h1>Set Contacts</h1>
		</div>
		<div class="body">
			<br>
			<br>
			<?php 
			$query = "SELECT * FROM contact";
			$db= new database();
			$result = $db->fetchdata($query);
			if(mysqli_num_rows($result)>0){
		       while($lin=mysqli_fetch_assoc($result)){
?>
			<label>Address</label>
		   <input type="text" name="address" value="<?php echo $lin['address'] ?>">
		   <br>
		   <br>
		   <label>Telephone/Mobile</label>
		   <input type="text" name="tele" value="<?php echo $lin['tele'] ?>">
		   <br>
		   <br>
		   <label>Mail</label>
		   <input type="text" name="mail" value="<?php echo $lin['mail'] ?>">
		   <br>
		   <br>
		   <?php } } ?>
		   </div>
		<button type="submit" class="btn" name="submit">Save Contact Info</button>
	</form>
</div>
<br>
<br>
<br>
<?php
if(isset($_POST['submit']))
{
	$address=$_POST['address'];
$tele=$_POST['tele'];
$mail=$_POST['mail'];

$query = "UPDATE contact SET address = '$address', tele='$tele', mail='$mail';";
	$db= new database();
	$result = $db->fetchdata($query);
	echo '<p style="text-align:center;color:green;font-weight:bold">Contacts Updated!!!</p>';
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
