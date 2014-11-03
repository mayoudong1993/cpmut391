<?php
include("PHPconnectionDB.php");
?>
<html>
	<body background = main_bg.jpg>
		<?php	
			$b = isset($_POST['password']);
			$a = isset($_POST['name']) and isset($_POST['password']) and isset($_POST['password2']) and isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_POST['address']) and isset($_POST['email']) and isset($_POST['phone_number']);
			$conn=connect();
			if (isset($_POST['validate'])){
			    if ($a == 0){
				die("<p>You did not complete all of the required fields.</p><CENTER><p><a href='http://consort.cs.ualberta.ca/~youdong/proj1/signup.html'>return</a></p></CENTER>");
			    }
			    $usercheck =  $_POST['name'];
                            $sql ="SELECT username FROM Persons WHERE Persons.username = '$usercheck'"; 
			    $stid = oci_parse($conn, $sql );
			    $y = 0;
			    $res=oci_execute($stid);
			    if (!$res) {
				$err = oci_error($stid); 
				echo htmlentities($err['message']);
			    }
	    		    while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
				$y += 1;
	    		    }
			    if ($y != 0) {
		                die("<p>Sorry, the username ".$_POST['name']." is already in use.</p><CENTER><p><a href='http://consort.cs.ualberta.ca/~youdong/proj1/signup.html'>return</a></p></CENTER>");
			    }
			    $password=$_POST['password'];
			    $password2=$_POST['password2'];
			    if ($password != $password2) {
				die("<p>Your passwords did not match.</p> <CENTER><p><a href='http://consort.cs.ualberta.ca/~youdong/proj1/signup.html'>return</a></p></CENTER>");
			    }
			    $name=$_POST['name'];
			    
			    $firstname=$_POST['firstname'];
			    $lastname=$_POST['lastname'];
			    $address=$_POST['address'];
			    $email=$_POST['email'];
			    $phone_number=$_POST['phone_number'];
		  //   Name : <input type="text" name="name"
		  //   Password : <input type="text" name="password"/><br/>
		  //   Firstname : <input type="text" name="firstname"/><br/>
		  //   Lastname : <input type="text" name="lastname"/><br/>
		  //   Address : <input type="text" name="address"/><br/>
		  //   Email : <input type="text" name="email"/> <br/>
		  //   Phone_number : <input type="text" name="Phone_number"/> <br/>
			    
			    
			    //establish connection
			    
		 	    oci_free_statement($stid);
			    //sql command
			    $sql = 'INSERT INTO persons VALUES (\''.$name.'\',\''.$password.'\',\''.$firstname.'\',\''.$lastname.'\',\''.$address.'\',\''.$email.'\',\''.$phone_number.'\')'; 
			    
			    //Prepare sql using conn and returns the statement identifier
			    $stid = oci_parse($conn, $sql );
			    
			    //Execute a statement returned from oci_parse()
			    $res=oci_execute($stid);

			    
			    //if error, retrieve the error using the oci_error() function & output an error message
			    if (!$res) {
				$err = oci_error($stid); 
				echo htmlentities($err['message']),"<CENTER><p><a href='http://consort.cs.ualberta.ca/~youdong/proj1/signup.html'>return</a></p></CENTER>";
			    }
			    else{
				echo "<CENTER><p>Sign up successfully. Plz log in.</p><p><a href='http://consort.cs.ualberta.ca/~youdong/proj1/login.html'>Log in</a></p></CENTER>";
			    }
			    
			    // Free the statement identifier when closing the connection
			    oci_free_statement($stid);
			    oci_close($conn);
		     
			}
		?>
	</body>
</html>
