<?php
	
	/* Use the following variables to connect to the database 'arthurteamdatabase'
		If the user recieves a MYSQL error, that means that script was unsuccessful
		in connecting to the database.
	*/

	$dsn = 'mysql:host=localhost; dbname=arthurteamdatabase';
	$user = 'arthurteam';
	$pass = 'arthurteampass';

	try {
		$dv = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));

	}
	catch (PDOException $e) {
		$error = $e->getMessage();
		include('database_error_page.php');
		exit();
	}

	// If the user posts the course number, question, and question detal. This is true.
	if ($_POST) {

		// Take the course number, question, and question detail and store them in variables.
		$courseNumber = $_POST['course_numb'];
		$question = $_POST['quest_box'];
		$questionDet = $_POST['quest_detail'];

		// Create a query where the database selects the question column from the questions table.
		$query = 'SELECT * FROM questions WHERE question = :question';

		// Create a statement that prepares and binds the value from the database to the 
		// value created by the user.
		$statementQuest = $dv->prepare($query);
		$statementQuest->bindValue(':question', $question);
		$statementQuest->execute();

		// If there is a matching question in the database to the question the user created, this is true.
		$usedQuestion = ($statementQuest->rowCount() == 1);
		$statementQuest->closeCursor();

		// If the question is already used, this is true.
		if ($usedQuestion) {
			$signup_message = '<span style = "color: red">ERROR: Unfortunately! That same exact 
			question already exists! Please return to main menu!</span>';
			include('question_page.php');
		}
		// Otherwise post the question to the questions table in the database.
		else {
			$user_info = "INSERT INTO questions (courseID, question, questionDetail) VALUES 
			('".$courseNumber."','".$question."','".$questionDet."')";
			$dv->query($user_info);
			$dv = null;
			include('question_success.php');
		}
	}
	// If the user did not post a question yet, display this message below. 
	else {
		$signup_message = 'Hello! Please enter a question that you have!';
		include('question_page.php');
	}
?>