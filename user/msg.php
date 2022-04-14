<?php
$title="Message";
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
			text-align: center;
			font-weight: bold;
		}
		.content-head{
			height: auto;
			width: auto;
			border-radius: 6px 6px;
			background-color: #28B463;
		}
		.form{
	        font-weight: bold;
	        display: grid;
	        grid-template-columns: repeat(2, 1fr);
	        grid-template-areas: "l i";
        }
        .form label{
        	grid-column: l;
        	        }
        .form input{
        	grid-column: i;
        	text-align: left;
        	margin-right: 20px;
        	border: none;
        	border-bottom: 2px solid red;

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
               <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
               
               	<div class="content-head">
					<img src="images/mail.png" style="heigh: 130px;width:130px;border-radius:50%;align-content: center;">
			</div>
			<div class="form">
				<br>
	            <label>Name: </label>
	            <input type="text" name="name" required="">
	            <br>
	            <label>E-mail: </label>
	            <input type="text" name="email" required="">
	            <br>
	            <label>Message: </label>
	            <input type="textarea" name="msg" required="">
	            <br>
	            </div>
	            <input type="submit" name="submit" value="Send">
	           </form>
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
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$msg=$_POST['msg'];
		if(empty($name))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($email))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else if(empty($msg))
		{
			echo '<p style="text-align:center;color:red">Please Provide All Information!!!</p>';
		}
		else
		{
			$insert_query="INSERT INTO message(Name,Contact,Message,Status) VALUES('$name', '$email', '$msg',1)";
			$mydb= new database();
			$response=$mydb->insertdata($insert_query);
		    if($response==true)
		    {
			    echo '<p style="text-align:center;color:green;font-weight:bold">Hurray!!!Message Sent!!!</p>';
	        }
		    else
		    {
		        echo '<p style="text-align:center;color:red;font-weight:bold">Message Not Sent!!!</p>';
		    }
	    }
	}
	?>
<?php
	include "../include/footer.php";
?>