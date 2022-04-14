<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Create Newsletter";
	require "../../include/db.php";
    include "header.php";
?>
<style>
		.form{
			height: 250px;
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
			height: auto;
			width: auto;
		}
		.input{
			border: none;
			border-bottom: 2px solid black;
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
			opacity: 1;
		}
		.body placeholder{
			font-weight: bold;
		}
		.body input:hover{
			border-bottom: 2px solid red;
		}
	</style>
<div class="form">
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="head">
			<h1>Create New News</h1>
		</div>
		<div class="body">
			<label>Title</label>
			<br>
			<input type="text" name="title" required="">
			<br>
			<br>
			<label>Message</label>
			<br>
		   <textarea name="msg" required=""></textarea> 
		   <br>
		   <br>
		   </div>
		<button type="submit" class="btn" name="submit">Send Newslettter</button>
		</form>
		</div>
		<br>
		<br>
		<?php
if(isset($_POST['submit']))
{
	$headers  ="From: Moinul Hossain<mohammadmhbhuiyan@gmail.com>\r\n";
	$headers .="Reply-To: mohammadmhbhuiyan@gmail.com\r\n";
	$headers .= "Content-type:text/html\r\n";
	$subject=$_POST['title'];
	$message=$_POST['msg'];

	$error=0;
	$query = "SELECT * FROM subscriber";
	$db= new database();
	$result = $db->fetchdata($query);
	if(mysqli_num_rows($result)>0){
		while($subs=mysqli_fetch_assoc($result)){
		 
			$to_receive=$subs['subscriber_email'];
			if(mail($to_receive,$subject,$message,$headers))
			{
                echo "Done";
			}
				else{
					echo '<h3 style="color:#45B39D;">Mailbox Not Found !!!</h3>';
				}
		}
    }
}
}
else {
	header("Location:../index.php");
}?>
<?php
	include "footer.php";
?>
	


