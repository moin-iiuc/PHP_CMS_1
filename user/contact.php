<?php
$title="Contact";
include "../include/header.php";
require "../include/db.php";
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
			display: grid;
			font-weight: bold;
			grid-template-rows: repeat(4, 1fr);
			grid-template-areas: 
			"h"
			"ad"
			"te"
			"em";
			

		}
		.articles img{
			height: 80px;
			width: 80px;
			border-radius: 40px 40px 40px 40px;
			align-items: center;
			margin: 10px;
		}
		.head{
			grid-row: h;
			background-color: #0E6655;
		}
		.address{
			grid-row: ad;
			background-color: #2471A3 ;
			color: white;
			display: flex;
		   align-items: center;
		   justify-content: center;

		}
		.address:hover{
			box-shadow: 10px 10px 10px 10px;
		}
		.tele{
			grid-row: te;
			background-color: #3498DB ;
			display: flex;
		   align-items: center;
		   justify-content: center;
		   color: white;

		}
		.tele:hover{
			box-shadow: 10px 10px 10px 10px;
		}
		.mail{
			grid-row: em;
			background-color: #1ABC9C ;
			display: flex;
		   align-items: center;
		   justify-content: center;
		   color: white;

		}
		.mail:hover{
			box-shadow: 10px 10px 10px 10px;
		}
		.links{
			height: auto;
			width: auto;
			background-color: #5DADE2;
			grid-column: si;
		}
		.links img{
			height: 30px;
			width: 30px;
			border-radius: 5px 5px 5px 5px;
			margin: 10px;
		}
		.showfb{
			display: none;
		}
		.fb:hover+.showfb{
			display: block;
			font-weight: bold;
			color: #EAF2F8;
		}
		.showinsta{
			display: none;
		}
		.insta:hover+.showinsta{
			display: block;
			font-weight: bold;
			color: #EAF2F8;
		}
		.showlk{
			display: none;
		}
		.lk:hover+.showlk{
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
		.showyt{
			display: none;
		}
		.yt:hover+.showyt{
			display: block;
			font-weight: bold;
			color: #EAF2F8;
		}
	</style>
	<div class="main-content">
		<div class="menu">
			<?php 
            date_default_timezone_set('Asia/Dhaka');
			$hour=date('G');
		if($hour>=5 && $hour<=11) {
			echo '<h3 style="color:#45B39D;">Good Morning!!!</h3>';
		}
		elseif ($hour>=12 && $hour<=17) {
			echo '<h3 style="color:red;">Good Afternoon!!!</h3>';
		}
		elseif($hour>=18 && $hour <=21){
            echo '<h3 style="color:#34495E ;">Good Evening!!!</h3>';
		}
		else{
			echo '<h3 style="color:#F0F3F4;">Good Night!!!</h3>';
		}
		?>
		</div>
		<div class="content">
			<div class="articles">
				<?php 
			$query = "SELECT * FROM contact";
			$db= new database();
			$result = $db->fetchdata($query);
			if(mysqli_num_rows($result)>0){
		       while($ad=mysqli_fetch_assoc($result)){
		       	?>
				<div class="head"><h1 align="center" style="color:white;">Reach us</h1></div>
				<div class="address"><img src="../images/address.png" ><?php echo $ad['address'] ?></div>
				<div class="tele"><img src="../images/ph.png"><?php echo $ad['tele'] ?></div>
				<div class="mail"><img src="../images/mail.png"><?php echo $ad['mail'] ?></div>
			<?php } }?>
			</div>
			<div class="links">
				<p class="news" style="font-weight: bold;text-align: center;">News: <marquee><?php 
				$query = "SELECT * FROM news WHERE id=(SELECT MAX(id) FROM news)";
			$db= new database();
			$result = $db->fetchdata($query);
			if(mysqli_num_rows($result)>0){
		       while($lin=mysqli_fetch_assoc($result)){
		       	echo $lin['news']." "."Read More " ?> <a href="<?php echo $lin['link']; ?>">Read Here </a> 
		       	<?php
		       }
		   }
?>
				</marquee></p>
				<?php 
			$query = "SELECT * FROM social";
			$db= new database();
			$result = $db->fetchdata($query);
			if(mysqli_num_rows($result)>0){
		       while($lin=mysqli_fetch_assoc($result)){
?>
				<p class="fb"><a href="<?php echo $lin['fb'] ?>" style="text-decoration: none"><img src="../images/fb.png"></a></p>
				<p class="showfb">Connect with us on Facebook</p>
				<p class="insta"><a href="<?php echo $lin['insta'] ?>" style="text-decoration: none"><img src="../images/insta.png"></a></p>
				<p class="showinsta">Follow us on Instagram</p>
				<p class="lk"><a href="<?php echo $lin['linkedin'] ?>" style="text-decoration: none"><img src="../images/lk.jpg"></a></p>
				<p class="showlk">Connect with us on Linkedin</p>
				<p class="yt"><a href="<?php echo $lin['youtube'] ?>" style="text-decoration: none"><img src="../images/yt.png"></a></p>
				<p class="showyt">Subscribe our Youtube</p>
				<p class="tw"><a href="<?php echo $lin['tweeter'] ?>" style="text-decoration: none"><img src="../images/tweeter.png"></a></p>
				<p class="showtw">Get with us on Tweeter</p>
				<?php } } ?>
			</div>
		</div>
	</div>
	<?php
	include "../include/footer.php";
?>