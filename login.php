<?php
include("PHPconnectionDB.php");
?>
<html>
<head>
</head>
<body background = main_bg.jpg style="background-attachment: fixed">
	<BR></BR>
	<BR></BR>
	<BR></BR>
	<h1><center>hello</center><h1>
	<?php
        if (isset ($_POST['validate'])){
            //get the input
	    
	    $name=$_POST['name'];
	    $password=$_POST['password'];
	    ini_set('display_errors', 1);
	    error_reporting(E_ALL);
            $conn=connect();
	    if (!$conn) {
    		$e = oci_error();
    		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	    }
       
            $sql = "select * from persons where persons.username='$name' and persons.password = '$password'" ; 
	    
	    //Prepare sql using conn and returns the statement identifier
	    $stid = oci_parse($conn, $sql );
	    
	    //Execute a statement returned from oci_parse()
	    $res=oci_execute($stid);

	    
	    //if error, retrieve the error using the oci_error() function & output an error message
	    
	    if (!$res) {
		$err = oci_error($stid); 
		echo htmlentities($err['message']);
	    }
	    $y = 0;
	    while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
		$y += 1;
	    }
	    if ($y == 0){
		echo '<CENTER> Your username or password is incorrect. Plz retry.  </CENTER>';
		echo "<CENTER><p><a href='http://consort.cs.ualberta.ca/~youdong/proj1/login.html'>return</a></p></CENTER>";
            }else{
		$hour = time() + 3600;
		setcookie(username, $name, $hour);
		setcookie(password, $password, $hour); 
		header("Location: http://consort.cs.ualberta.ca/~youdong/proj1/Photoshare.php"); 
		exit;
            }
	    // Free the statement identifier when closing the connection
	    oci_free_statement($stid);
	    oci_close($conn);
    
	}
	?>

</body>
</html>
