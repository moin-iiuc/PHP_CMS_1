<?php
$title="Blog";
include "../include/header.php";
require "../include/db.php";
$posti=$_GET['id'];
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
			text-align: center;
			font-weight: bold;
			justify-content: space-around;
		}
		.content-head{
			height: auto;
			width: auto;
			border-radius: 10px 10px;
			background-color: #28B463;
			
		}
		.post{
			height: auto;
			width: auto;
			border: 5px ;
			border-radius: 10px 10px 10px 10px;
			margin: 10px;
		}
		.post img{
			height: 300px;
			width: 300px;
            margin-right: auto;
            margin-left: auto;
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

	$query = "SELECT * FROM blogs WHERE post_id='$posti';";
	$db= new database();
	$result = $db->fetchdata($query);
	if(mysqli_num_rows($result)>0){
		while($post=mysqli_fetch_assoc($result)){
?>
             <div class="post">
	           <h1><?php echo $post['title']; ?></h1>
	           <h3><?php echo $post['posted_by']; ?></h3>
	           <h4><?php echo $post['time_by'];?></h4>
	          <img src="../admin/dashboard/uploads/<?php echo $post['img']; ?>">
	          <p><?php echo $post['descript']; ?> </p>
	          <button><img src="images/eye.png" style="height:10px;width:10px"> <?php echo $post['read_by'];?></button>
	          <?php $r=$post['read_by'];?>
	          </div>
<?php } } ?>
              
            </div>
            <?php 
            $read=$r+1;
            $query = "UPDATE blogs SET read_by=$read WHERE post_id='$posti';";
	        $db= new database();
	         $result = $db->fetchdata($query);
	         ?>
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