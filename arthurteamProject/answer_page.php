<?php

	/* Use the following variables to connect to the database 'arthurteamdatabase'
		If the user recieves a MYSQL error, that means that script was unsuccessful
		in connecting to the database.
	*/

	$dsn = 'mysql:host=localhost; dbname=arthurteamdatabase';
	$user = 'arthurteam';
	$pass = 'arthurteampass';

	try {
		$db = new PDO($dsn, $user, $pass, array(PDO::ATTR_PERSISTENT => true));
	}
	catch (PDOException $e) {
		$error = $e->getMessage();
		include('database_error_page.php');
		exit();
	}

	// If the user hits the accept button to answer the question, this is true.
	if (isset($_POST['submit_button'])) {

		// Take the answer details that you posted and place them into a variable
		// Take the hidden value and post it into the $question variable. 
		$answer = $_POST['quest_detail'];
		$question = $_POST['questionValue'];
		$rowCreate = '';

		// Generate a query from the questions table that utilizes the question column.
		$query = 'SELECT * FROM questions WHERE question = :question';
		$statementQuest = $db->prepare($query);
		$statementQuest->bindValue(":question", $question);
		$statementQuest->execute();

		// If the question is valid, this variable will be true.
		$questionValid = ($statementQuest->rowCount() == 1);
		$result = $statementQuest->fetch();
		$statementQuest->closeCursor();

		// Since the question is valid, fetch the course number and details of this question.
		if ($questionValid) {
			$courseNumb = $result['courseID'];
			$questionDetail = $result['questionDetail'];
			$questionID = $result['questionID'];
		}

		// Post the answer and questionID into the answers table.
		$insertToDatabase = "INSERT INTO answers (questionID, answer) VALUES 
		('$questionID', '$answer')";
		$db->query($insertToDatabase);

		// Create a query where the answer table displays all the answers that are associated 
		// with this question based on the questionID. the answer table also utilizes the questionID column
		$queryAnswers = 'SELECT * FROM answers WHERE questionID = :questionID';
		$statementAns = $db->prepare($queryAnswers);
		$statementAns->bindValue(":questionID", $questionID);
		$statementAns->execute();

		$allMatches = $statementAns->rowCount();
		$rowCreate = '';
		
		// If there are answers associated with the question, this will be true.
		if ($allMatches > 0) {
			// while the statement is still fetching the answers associated with the question...
			while ($row = $statementAns->fetch()) {
				// keep adding onto the string the row and cell as well as the answer to the question.
				$rowCreate .= '<tr><td><p class = "bodyParagraph" style = "text-align: left; font-size: 0.8vw">'. $row['answer'] .'</p></td></tr>';
			}
		}
		$db = null;
	}
	// If the user has not posted an answer, this will be true instead.
	else {

		// Previously, all questions that were generated in a table in the main page utilized
		// a hyperlink, when you click that link, it would direct to this page. However, that 
		// hyperlink would also carry the actual question into this script as well meaning that 
		// this variable holds the question with the hyper link you clicked on.
		$question = $_GET['question'];

		// Create a query for the question column in the questions table.
		$query = 'SELECT * FROM questions WHERE question = :question';
		$statementQuest = $db->prepare($query);
		$statementQuest->bindValue(":question", $question);
		$statementQuest->execute();

		// If the question is valid, and is in the database, this will be true.
		$questionValid = ($statementQuest->rowCount() == 1);
		$result = $statementQuest->fetch();
		$statementQuest->closeCursor();

		// If the statement is true, fetch the course number and question detail associated
		// with this question.
		if ($questionValid) {
			$courseNumb = $result['courseID'];
			$questionDetail = $result['questionDetail'];
			$questionID = $result['questionID'];
		}

		// Create a query where the answer table displays all the answers that are associated 
		// with this question based on the questionID. the answer table also utilizes the questionID column
		$queryAnswers = 'SELECT * FROM answers WHERE questionID = :questionID';
		$statementAns = $db->prepare($queryAnswers);
		$statementAns->bindValue(":questionID", $questionID);
		$statementAns->execute();

		$allMatches = $statementAns->rowCount();
		$rowCreate = '';

		// If there are answers associated with the question, this will be true.
		if ($allMatches > 0) {
			// while the statement is still fetching the answers associated with the question...
			while ($row = $statementAns->fetch()) {
				// keep adding onto the string the row and cell as well as the answer to the question.
				$rowCreate .= '<tr><td><p class = "bodyParagraph" style = "text-align: left; font-size: 0.8vw">'. $row['answer'] .'</p></td></tr>';
			}
		}
		// Otherwise, rowCreate will be empty string.
		else {
			$rowCreate = '';
		}
		$db = null;
	}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Hawk Heap - Answer Page</title>
		<link rel = "shortcut icon" href = "web_images/favicon_hawkheap.png" type = "image/png"/>

		<!-- Style sheet implemented from mainStructure.css as well as style used within the file-->
		<link rel = "stylesheet" href = "mainStructure.css" type = "text/css"/>
		<style>
			#bodyBoxDesign {
				margin-left: auto;
				margin-right: auto;
				padding: 20px;
				margin-top: 50px;
				width: 30%;
				height: 30%;
				background-color: #ffcaca;
				border: 5px solid #ff0000;
				box-shadow: 3px 6px 20px;
			}

			table {
				border-collapse: collapse;
				width: 100%;
			}

			tr {
				border-bottom: 3px solid #ff0000;
			}

			td {
				width: 12%;
			}

			div.divSpacing {
				display: block;
				line-height: 2.5vw;
			}

			textarea {
				width: 98%;
				padding: 5px 5px;
				border: 1px solid black;
				font-size: 1.5vw;
				font-size: 1.5vh;
				border-radius: 5px;
				resize: none;
			}

			label.labelStyle {
				margin-top: 20%;
				display:inline-block;
				font-family: Copperplate,Copperplate Gothic Light,fantasy;
				font-size: 1vw;
				font-weight: bold;
				width: 35%;
			}

			button.submitButton {
				margin: auto;
				background-color: transparent;
				border: none;
				cursor: pointer;
				overflow: hidden;
				outline: none;
			}

			button:hover {
				transform: rotate(-5deg);
			}

			img:hover.imgHover {
				transform: rotate(-5deg);
			}

			a {
				color: black;
				text-decoration: none;
			}

			div.inline {
				display: inline-block;
			}

		</style>
	</head>
	<body>
		<!-- Create top heading section of the website with the image and hawk heap title as well as 
			montclair state university logo to the right-->
		<div id = "headerBoxDesign">
			<img id = "hawkHeapLogo" src = "web_images/hawkheap_logo.png" alt = "Hawk Heap Logo"/>
			<img id = "hawkHeapTitle" src = "web_images/hawkheap_title.png" alt = "Hawk Heap Title"/>
			<img id = "msuLogo" src = "web_images/msu_logo.png" alt = "Montclair State University Logo"/>
		</div>

		<!-- Display the course number and title of the question as the title in this page. -->
		<div id = "bodyBoxDesign">
			<table>
				<tr>
					<td><p class = "bodyParagraph" style = "text-align: left; text-shadow: 2px 2px 3px;">
						<?php echo $courseNumb .': '. $question;?></p></td>
				</tr>
			</table>
				<!-- Display the question details of that question you clicked on. -->
				<p class = "bodyParagraph" style = "text-align: left; font-size: 1.7vw; font-size: 1.7vh; margin-bottom: 20%"><?php echo $questionDetail?></p>

			<table>
				<tr>
					<td><p class = "bodyParagraph" style = "text-align: left; text-shadow: 2px 2px 3px;">
					Answer(s):</p></td>
				</tr>
				<!-- Display all the answers associated with the question in this table-->
				<?php echo $rowCreate ?>
			</table>

			<!-- Create a form that holds a hidden value from the question, the reason we do this is because when you reload the page after 
				submitting the question, the $question will not exist anymore and will provide errors. We need to somehow save this question. -->
			<form method = "post" action = "answer_page.php">
				<input type = "hidden" name = "questionValue" value = "<?php echo $question;?>"/>
				<div class = "divSpacing">
					<label class = "labelStyle" style = "margin-right: 40%; font-size: 0.8vw" for = "detail_sec">Send Answer:</label>
				</div>
				<div class = "divSpacing">
					<textarea rows = "8" name = "quest_detail" required></textarea>
				</div>
				<div class = "inline" style = "text-align: center; margin-left: 23%">
					<button class = "submitButton" type = "submit" name = "submit_button">
						<img style = "width: 7vw" src = "web_images/accept_button.png" alt = "Accept Button"/>
					</button>
				</div>
				<div class = "inline" style = "text-align: center">
					<a href = "main_search.php" class = "linkVisibility">
						<img class = "imgHover" style = "width: 7vw" src = "web_images/return_button.png" alt = "Return Button"/>
					</a>
				</div>
			</form>
		</div>
	</body>
		<!-- Implement copyright and year as well as my name and other footer details -->
	<footer>
		<div class = "centerContents">
			<p class = "boldedText" style = "margin-top: 3%; font-size: 0.8vw">
				&copy; 2000 - 2020 Arthur Levitsky.<br/>
				Montclair State University - Computer Science and Technology.<br/>
				CSIT 337 - Internet Computing.
			</p>
		</div>
	</footer>
</html>