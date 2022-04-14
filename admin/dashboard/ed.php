<?php
session_start();
if(isset($_SESSION['auth']))
{
include "header.php";
require "../../include/db.php";
$post_num=$_GET['id'];
    if(isset($_FILES['img']))
    {
	    
	    $title=$_POST['title'];
        $des=$_POST['de'];
        $ref=$_POST['ref'];
        $file_name=$_FILES['img']['name'];
        if($file_name==null)
        {
    	    $query = "UPDATE blogs SET title = '$title',descript='$des',ref='$ref' WHERE post_id='$post_num';";
	        $db= new database();
	        $result = $db->fetchdata($query);
	        header("Location:index.php");
	    }
	    else
	    {
		    $fetch_query="SELECT *FROM blogs where post_id='$post_num';";
			$mydb= new database();
			$response=$mydb->fetchdata($fetch_query);
			$data=mysqli_fetch_assoc($response);
		    if(mysqli_num_rows($response)>0)
		    {
			$file=$data['img'];
			$dir="uploads/";
			unlink($dir.$file);
	         }
	         echo $dir.$file;
            $tmp_name=$_FILES['img']['tmp_name'];
             $size=$_FILES['img']['size'];
		    $error=array();
		    if($size > 2097152)
	        {
		        $error[]="Image is big";
	        }
		    $filenam=explode('.',$file_name);
            $i=rand(1,1000000);
            $fileu= $filenam[0].$i.".".$filenam[1];
	        if(empty($error)){
		        move_uploaded_file($tmp_name, "uploads/".$fileu);
	         }
	         else{
		        for($i=0;$i<sizeof($error);$i++)
		        {
			        echo $error[$i];
		        }
	         }
	        $query="UPDATE blogs SET title='$title',img='$fileu',descript='$des',ref='$ref' WHERE post_id='$post_num';";
            $mydb= new database();
            $response=$mydb->fetchdata($query);
            header("Location:index.php");
        }
    }
    else{
	echo "Unknown Error!!";
}
}
else{
	header("Location:../index.php");
}
?>