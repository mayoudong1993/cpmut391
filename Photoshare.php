<html>
	<head>
		<style>
		.right
		{
		position:absolute;
		right:0px;
		width:500px;
		background-color: #F5F5DC;
		}
		</style>
	<title>Photoshare</title>
	<body background = main_bg.jpg style="background-attachment: fixed">
		<div class = 'right'>	
			<p>USER NAME: <?php echo $_COOKIE["username"]; ?>  <a href="http://consort.cs.ualberta.ca/~youdong/proj1/changeinformation.php">Edit Profile</a></p>
		</div>
	<center><p><a href="http://consort.cs.ualberta.ca/~youdong/proj1/Photoshare.php">Home Page</a></p></center>
	<form action="upload_file.php" method="post"enctype="multipart/form-data">
		<label for="file">Picture name:</label>
		<input type="file" name="file" id="file" /> 
		<br />
		<input type="submit" name="submit" value="Upload" />
	</form>
	<?php
	 
	   /*include ("PHPconnectionDB.php");        
	   //establish connection
           $conn=connect();
           	               
           //sql command
           $sql = 'SELECT * FROM Students';
           
           //Prepare sql using conn and returns the statement identifier
           $stid = oci_parse($conn, $sql );
           
           //Execute a statement returned from oci_parse()
           $res=oci_execute($stid); 
           
           //if error, retrieve the error using the oci_error() function & output an error
           if (!$res) {
		$err = oci_error($stid);
		echo htmlentities($err['message']);
           } else { echo 'Rows Extracted <br/>'; }
           
	   //Display extracted rows
	   while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
	   	
		foreach ($row as $item) {
			echo $item.'&nbsp;';
		}
		echo '<br/>';
	   }
	   
	    // Free the statement identifier when closing the connection
	    oci_free_statement($stid);
	    oci_close($conn);
		*/
	?>
	<p><a></a></p>	
	</body>
</html>
