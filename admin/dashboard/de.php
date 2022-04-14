<?php
session_start();
if(isset($_SESSION['auth']))
{
include "header.php";
require "../../include/db.php";
if(isset($_POST['submit1']))
{
    $post_num=$_GET['id'];
    $fetch_query="SELECT *FROM blogs where post_id='$post_num';";
			$mydb= new database();
			$response=$mydb->fetchdata($fetch_query);
			$data=mysqli_fetch_assoc($response);
		    if(mysqli_num_rows($response)>0){
			$filename=$data['img'];
			$dir="uploads/";
			unlink($dir.$filename);
	}
			?>

	<?php 
	$query = "DELETE FROM blogs WHERE post_id='$post_num';";
	$db= new database();
	$result = $db->fetchdata($query);
	header("Location:allpost.php");
}
else{
	header("Location:index.php");
}
}
else{
	header("Location:../index.php");
}
?>