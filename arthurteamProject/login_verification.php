<?php
	
	/* Use the following variables to connect to the database 'arthurteamdatabase'
		If the user recieves a MYSQL error, that means that script was unsuccessful
		in connecting to the database.
	*/

	$dsn = 'mysql:host=localhost; dbname=arthurteamdatabase';
	$user = 'arthurteam';
	$pass = 'arthurteampass';

	try {
		$db = new PDO($dsn, $user, $pass);
	}
	catch (PDOException $e) {
		$error = $e->getMessage();
		include('database_error_page.php');
		exit();
	}

	// If the user posts his username and password, this will be true.
	if (isset($_POST['submit_login'])) {

		// Take the username and password from the form and store them in the variables.
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Generate a query from the hh_users table that takes username data and password data
		// from the database.
		$query = 'SELECT * FROM hh_users WHERE username = :username AND password = :password';

		// Create a statement that binds the values to compare with anything
		// from the database and what the user has posted.
		$statementCreds = $db->prepare($query);
		$statementCreds->bindValue(':username', $username);
		$statementCreds->bindValue(':password', $password);
		$statementCreds->execute();

		// Create a condition if the username or password exists.
		$credidentialValid = ($statementCreds->rowCount() == 1);
		$statementCreds->closeCursor();

		// If they do exist, that means that what the user implemented is correct in the username and password field.
		if ($credidentialValid) {
			$db = null;
			include('main_search.php');	
		}
		// Otherwise, the username did not implement the correct username and password that the database could identify.
		else {
			$signup_message = '<span style = "color: red">ERROR: Unfortunately the username or password you entered is not correct! Please try again!</span>';
			include('login_page.php');
		}
	}
	// This will show if user has not hit the submit button for the form.
	else {
		$signup_message = 'Please enter your username and password to proceed!';
		include('login_page.php');
	}
?>