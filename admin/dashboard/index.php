<?php
session_start();
if(!isset($_SESSION['auth']))
{
	header("Location:../index.php");
}
else
{
    $title="Homepage";
    include "header.php";
    require "../../include/db.php";
?>

<style>
	.main-content{
			height: auto;
			width: auto;
			display: grid;
			grid-template-columns: repeat(12,1fr);
			grid-template-areas: 
			"m m c c c c c c c c c c";
		}
		.menu{
			grid-column: m;
			background-color: #F5B7B1;
			font-weight: bold;
			text-align: center;

		}
		.content{
			height: auto;
			width: auto;
			grid-column: c;
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			grid-template-areas: 
			"ar ar ar si";
		}
		.articles{
			height: auto;
			width: auto;
			grid-column: ar;
			border-radius: 10px 10px 10px 10px;
			text-align: center;
			font-weight: bold;
			margin-right: auto;
			margin-left: auto;
			justify-items: space-around;
		}
		.articles a{
			text-decoration: none;
			padding: 10px;
		}
		.button {
			background-color: #008CBA;
			color: white;
		}
		.content-head{
			height: auto;
			width: auto;
			border-radius: 10px 10px;
			background-color: #28B463;
			
		}
		.post{
			height: 300px;
			width: 300px;
			border: 5px ;
			border-radius: 10px 10px 10px 10px;
			margin: 10px;
			
		}
		.post:hover{
			box-shadow: 10px 10px 10px 10px grey;
		}
		.post img{
			height: 150px;
			width: 150px;

		}
		.message{
			height: auto;
			width: auto;
			background-color: #0E6655;
			color: white;
			grid-column: si;
			font-weight: bold;
			text-align: center;
		}
		.message h4:hover{
			color: #F9E79F;
		}
		.showfb{
			display: none;
		}
		.fb:hover+.showfb{
			display: block;
			font-weight: bold;
			color: #EAF2F8;
		}
		.showtw{
			display: none;
		}
		.tw:hover+.showtw{
			display: block;
			font-weight: bold;
			color: #EAF2F8 ;
		}
		.showgm{
			display: none;
		}
		.gm:hover+.showgm{
			display: block;
			font-weight: bold;
			color: #EAF2F8;
		}

		.showyt{
			display: none;
		}
		.yt:hover+.showyt{
			display: block;
			font-weight: bold;
			color: #EAF2F8;
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
	<div class="main-content">
		<div class="menu">
            <?php 
            date_default_timezone_set('Asia/Dhaka');
			$hour=date('G');
		if($hour>=5 && $hour<=11) {
			echo '<h3 style="color:#45B39D;">Good Morning!!!<br>'.$_SESSION['username'].'</h3>';
		}
		elseif ($hour>=12 && $hour<=17) {
			echo '<h3 style="color:red;">Good Afternoon!!!<br>'.$_SESSION['username'].'</h3>';
		}
		elseif($hour>=18 && $hour <=21){
            echo '<h3 style="color:#34495E ;">Good Evening!!!<br>'.$_SESSION['username'].'</h3>';
		}
		else{
			echo '<h3 style="color:#F0F3F4;">Good Night!!!<br>'.$_SESSION['username'].'</h3>';
		}
		?>
			<ul>
				<li><a href="announce.php" style="text-decoration:none;color:#5D6D7E">Create News</a></li>
				<br>
				<li><a href="social.php" style="text-decoration:none;color:#5D6D7E">Social Platforms</a></li>
				<br>
				<li><a href="setcontact.php" style="text-decoration:none;color:#5D6D7E">Contact Info</a></li>
				<br>
				<li><a href="addpost.php" style="text-decoration:none;color:#5D6D7E">Create Blog</a></li>
				<br>
				<li><a href="allpost.php" style="text-decoration:none;color:#5D6D7E">Show Blogs</a></li>
				<br>
			</ul>
		</div>
		<div class="content">
			<div class="articles">
				<?php 
				$subs=0;
	$query = "SELECT * FROM subscriber";
	$db= new database();
	$result = $db->fetchdata($query);
	if(mysqli_num_rows($result)>0){
		while($post=mysqli_fetch_assoc($result)){ 
			if(!empty($post['subscriber_email']))
				$subs++;
			}
		}
		?>
		<h1>Subscriber Hits: <?php echo $subs; ?>  </h1>
		<br>
			<a href="newsletter.php"><button class="btn">Blogs Inside</button></a>
			<a href="checklist.php"><button class="btn">Check List</button></a>
			<a href="sendnewsletter.php"><button class="btn">Create Newsletter</button></a>
			
              
            </div>
            			
			<div class="message">
				<h1 style="color: #FDEBD0;">Inbox</h1>
				<?php
    $newmessage=0;
	$query = "SELECT * FROM message";
	$db= new database();
	$result = $db->fetchdata($query);
	if(mysqli_num_rows($result)>0){
		while($post=mysqli_fetch_assoc($result)){ 
				
				if($post['Status']==1)
				{
					$newmessage++;
				}
			}
		}
				?>
				<h3>You have <?php echo $newmessage." "." new messages." ?></h3>
                <a href="messages.php" style="text-decoration:none;color:white"><h4>Open Inbox</h4></a>
			</div>
		</div>
	</div>





<?php
include "footer.php";
?>
<?php } ?>
