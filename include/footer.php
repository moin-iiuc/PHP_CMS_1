<div class="footer">
	<div class="newsletter">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<input type="text" name="email" required="">
			<input class="btn" type="submit" name="press" value="Subscribe Newsletter">
		</form>
		<?php 
		if(isset($_POST['press']))
	    {
		    try{
		    $email=$_POST['email'];
		    $insert_query="INSERT INTO subscriber(subscriber_email) VALUES('$email')";
			$mydb= new database();
			$response=$mydb->insertdata($insert_query);
		    
		    	if($response==true)
		        {
			        echo '<p style="text-align:center;color:#00FFFF;font-weight:bold">Subscribed!!!</p>';
	            }
		        else
		        {
		            echo '<p style="text-align:center;color:red;font-weight:bold">Failed Subscription!!!</p>';
		        }
		    }
		    catch(Exception $e)
		    {
		    	 echo '<p style="text-align:center;color:red;font-weight:bold">Allready Subscribed with this email!!!</p>';
		    }
		}
		    ?>
	</div>
	<p>&copy myblogs.com</p>
</div>
</body>
</html>