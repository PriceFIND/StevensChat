
<!--
we want to be able to add a auser to our database so that we can use more user names to send messages.
also we dont want to constantly have to use the phpmyadmin to add users
this is done when: a new user name can succefully be added to the database
-->

<!DOCTYPE html>
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h1> Add a new User</h1><br>
  Name: <input type="text" name="fname">
  Password: <input type="password" name="pass"><br>
  <input type="submit" name="submit">
  <input type="reset">
</form>

<?php
	
	$squidy = mysqli_connect("localhost","chatMan","sevendigits","gochatty");

	if(isset($_POST["submit"])){
		$rottenUnicorn = $_POST["fname"]; 
		$userName = mysqli_query($squidy, "SELECT name FROM user_names WHERE name='$rottenUnicorn'"); //okay we have HUGE FREAKNING ERRORS if there is a weird single quote in an sql query, get rid of them. especially if the error is "expecting result got bool instead" or something like that. 
		
		echo mysqli_num_rows($userName);
		
		if(empty($rottenUnicorn)){
			echo "Name is empty";
		}
		else if(mysqli_num_rows($userName)>0){
			echo "name's taken";
		}
		else{
			mysqli_query($squidy, "INSERT INTO user_names (name) VALUES ('$rottenUnicorn')");
			echo "Welcome new user!";
			echo $rottenUnicorn;
		}
	}
?>

</body>
</html>