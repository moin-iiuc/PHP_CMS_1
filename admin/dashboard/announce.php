<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Publish News";
include "header.php";
require "../../include/db.php";
?>
<style>
		.form{
			height: 220px;
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
			height: 60px;
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
			<h1>Create New News</h1>
		</div>
		<div class="body">
			<br>
			<br>
			<label>Announcement</label>
		   <input type="text" name="news" placeholder="News" required="">
		   <br>
		   <br>
		   <label>Link</label>
		   <input type="text" name="link" placeholder="www.link.com">
		   <br>
		   <br>
		   </div>
		<button type="submit" class="btn" name="submit">Send Newslettter</button>
	</form>
</div>
<br>
<br>
<br>
<?php
if(isset($_POST['submit']))
{
	$news=$_POST['news'];
$link=$_POST['link'];

            $insert_query="INSERT INTO news(news,link) VALUES('$news', '$link')";
			$mydb= new database();
			$response=$mydb->insertdata($insert_query);
		    if($response==true)
		    {
			    echo '<p style="text-align:center;color:green;font-weight:bold">Hurray!!!News Uploaded!!!</p>';
	        }
		    else
		    {
		        echo '<p style="text-align:center;color:red;font-weight:bold">News Upload Failed!!!</p>';
		    }

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