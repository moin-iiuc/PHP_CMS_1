<?php
$title="About";
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
			border: 5px solid black;
			border-radius: 10px 10px 10px 10px;
		}
		.devs{
			height: auto;
			width: auto;
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
		}
		.tarekvai{
			height: auto;
			width: auto;
			border-radius: 10px 10px 10px 10px;
			margin: 10px;
		}
		.tarekvai p{
			margin: 10px;
			font-weight: bold;
		}
		.tarekvai img{
			height: 300px;
			width: 300px;
			border-radius: 10px 10px 10px 10px;
		}
		.me{
			height: auto;
			width: auto;
			border-radius: 10px 10px 10px 10px;
			margin: 10px;
		}
		.me img{
			height: 300px;
			width: 300px;
			border-radius: 10px 10px 10px 10px;
		}
		.me p{
			margin: 10px;
			font-weight: bold;
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
				<h1 align="center">About Us </h1>
				<p style="margin: 5px;">We are some noob PHP coders from Sheikh Kamal IT & Incubation Centre. This is a showcase project programmed solely in PHP, HTML, CSS. We are grateful To our Trainer for his continous efforts. I hope we will get to learn more interesting programming stuff from Tarek Vai.</p>
				<div class="devs">
					<div class="tarekvai">
					<img src="images/tarekvai.jpg">
					<br>
					<p>Trainer</p>
					<p>Mr. Mohiuddin Tarek</p>
					<p>Github:  <a href="https://github.com/mutarek" style="text-decoration: none">mutarek</a></p>
				</div>
				<div class="me">
					<img src="images/moin.jpg">
					<br>
					<p>Trainee</p>
					<p>Md. Moniul Hossain Bhuiyan</p>
					<p>Github:  <a href="https://github.com/moin-iiuc" style="text-decoration: none">moin_iiuc</a></p>
				</div>
			</div>
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