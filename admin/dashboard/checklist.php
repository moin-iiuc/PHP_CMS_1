<?php
session_start();
if(isset($_SESSION['auth']))
{
	$title="Subscriber List";
include "header.php";
require "../../include/db.php";
?>

<style>
	.main-content{
			height: auto;
			width: auto;
			display: grid;
			grid-template-columns: repeat(6,1fr);
			grid-template-areas: 
			"m c c c c c";
		}
		.menu{
			grid-column: m;
			background-color: #F5B7B1;
			text-align: center;
		}
		.content{
			grid-column: c;
			height: auto;
			width: auto;
			display: grid;
			grid-template-columns: repeat(3, 1fr);
			grid-template-areas: 
			"ar ar ar";
		}
		.articles{
			height: auto;
			width: auto;
			background-color: white ;
			text-align: center;
			font-weight: bold;
			margin-right: auto;
			margin-left: auto;
			grid-column: ar;
		}

		.message{
			height: auto;
			width: auto;
			background-color: #0E6655;
			color: white;
			grid-column: si;
			font-weight: bold;
		}
		.message h4:hover{
			color: #F9E79F;
		}
		table{
			margin: 10px;
		}
		table, th, td {
  border: 1px solid black;
}
tr:nth-child(even) {
  background-color: #D6EEEE;
}
.mail{
	text-decoration:none;
	color: black;
}
.mail:hover{
	color: blue;
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
	</div>
		<div class="content">
			<div class="articles">
				<table>
					<caption>Subscriber List</caption>
					<tr>
						<th>Serial</th>
						<th>Email</th>
						<?php
						$sub=0;
	$query = "SELECT * FROM subscriber";
	$db= new database();
	$result = $db->fetchdata($query);
	if(mysqli_num_rows($result)>0){
		while($subs=mysqli_fetch_assoc($result)){ 
			$sub++;
			?>
					</tr>
					<tr>
						
						<td><?php echo $sub ?></td>
						<td><a class="mail" href="mailto:<?php echo $subs['subscriber_email'] ?>" ><?php echo $subs['subscriber_email'] ?></a></td>
				<?php }
			}
				?>
			</tr>
		</table>
		<h1>Total Subscriber: <?php echo $sub ?> </h1>
			</div>
		</div>
	</div>





<?php
include "footer.php";
?>
<?php 
}
else {
	header("Location:../index.php");
}?>
