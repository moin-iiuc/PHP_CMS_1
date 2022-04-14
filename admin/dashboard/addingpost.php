<?php
session_start();
if(isset($_SESSION['auth']))
{
include "header.php";
require "../../include/db.php";
$error=array();
if(isset($_FILES['img']))
{
	$filename=$_FILES['img']['name'];
	$filenam=explode('.',$filename);
    $i=rand(1,1000000);
    $fileu= $filenam[0].$i.".".$filenam[1];
	$tmp_name=$_FILES['img']['tmp_name'];
	$size=$_FILES['img']['size'];
	if($size > 2097152)
	{
		$error[]="Image is big";
	}
	if(empty($error)){
		move_uploaded_file($tmp_name, "uploads/".$fileu);
	}
	else{
		for($i=0;$i<sizeof($error);$i++)
		{
			echo $error[$i];
		}
	}
}
    $from=$_SESSION['username'];
    date_default_timezone_set('Asia/Dhaka');
	$date=date('F d, Y h:i:s A');

	$title=$_POST['title'];
	$posted=$from;
	$time_by=$date;
    $des=$_POST['de'];
    $ref=$_POST['ref'];

$insert_query="INSERT INTO blogs(title,posted_by,time_by,img,descript,ref,read_by) VALUES('$title', '$posted', '$time_by','$fileu', '$des', '$ref',0)";
$mydb= new database();

$response=$mydb->insertdata($insert_query);
if($response==true)
{
	header("Location:index.php");
}
else
{
	echo "Failed To upload";
}

?>
<?php
	}
	else{
		header("Location:../index.php");
	}
?>