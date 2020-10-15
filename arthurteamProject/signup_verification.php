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

	// If the user posts from signup_page.php, then this will be true.
	if ($_POST) {

		// Assign the values that the user posted to this variables.
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Generate a query for username.
		$usernameData = 'SELECT * FROM hh_users
		WHERE username = :username';

		// Generate a query for email.
		$emailData = 'SELECT * FROM hh_users
		WHERE email = :email';

		// Create a statement that will bind values with what the user posted (username)
		$statementUsername = $db->prepare($usernameData);
		$statementUsername->bindValue(':username', $username);
		$statementUsername->execute();

		// Create a statement that will bind values with what the user posted (email)
		$statementEmail = $db->prepare($emailData);
		$statementEmail->bindValue(':email', $email);
		$statementEmail->execute();

		// Check for both variables if rowCount for the statements provides 1 or not.
		// We use this as it describes if there already is a username or email that exists in the database.
		$usedCredUsername = ($statementUsername->rowCount() == 1);
		$usedCredEmail = ($statementEmail->rowCount() == 1);
		$statementUsername->closeCursor();
		$statementEmail->closeCursor();

		// If either email or username already exists, this is true
		if ($usedCredUsername || $usedCredEmail) {
			$signup_message = '<span style = "color: red">ERROR: Please use a different username or email!</span>';
			include('signup_page.php');
		}
		// Otherwise insert into the database for hh_users table
		else {
			$user_info = "INSERT INTO hh_users (email, username, password) VALUES 
			('$email','$username','$password')";
			$db->query($user_info);
			$obtainUsername = $username;
			include('signup_success.php');
		}
	}
	// If the user did not post from the form, this is true.
	else {
		$signup_message = 'Welcome! You must sign up to view the contents of this site!';
		include('signup_page.php');
	}
?>