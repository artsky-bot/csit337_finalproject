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

	// Create an empty string called rowCreate
	// Create a query that selects all the courseID and question 
	// data values from the questions table.
	$rowCreate = '';
	$query = 'SELECT courseID, question FROM questions';
	$result = $db->prepare($query);
	$result->execute();

	// Count how many rows there are in total
	$queryResult = $result->rowCount();

	// If you hit the continue button for search, this is true.
	if(isset($_POST['Submit'])) {


		// Table the search text and the course number selected and 
		// store them in these variables.
		$search = $_POST['search'];
		$course = $_POST['course_numb'];


		// If the course variable is empty and the search is empty, 
		// post all the data values from questions table regarding
		// course numbers and questions.
		if ($course == "" && $search == null) {
			$query = 'SELECT courseID, question FROM questions';
			$result = $db->prepare($query);
			$result->execute();
			$queryResult = $result->rowCount();
		}
		// If only search is empty but not course number, then 
		// find specific courses with the course number you selected.
		else if ($search == null) {
			$query = "SELECT * FROM questions WHERE courseID = :course";
			$result = $db->prepare($query);
			$result->bindValue(":course", $course);
			$result->execute();
			$queryResult = $result->rowCount();
		}
		// If course number is empty but search isn't, then 
		// find questions with specific keywords that search text had.
		else if ($course == "") {
			$query = "SELECT * FROM questions WHERE question LIKE ?";
			$param = array("%$search%");
			$result = $db->prepare($query);
			$result->execute($param);
			$queryResult = $result->rowCount();
		}
		// Otherwise, if both values exist, find a question with the course number 
		// as well as with a keyword from search. 
		else {
			$query =  "SELECT * FROM questions WHERE question LIKE '%$search%' AND courseID = :course";
			$result = $db->prepare($query);
			$result->bindValue(":course", $course);
			$result->execute();
			$queryResult = $result->rowCount();
		}
 	}
 	// If there are rows of data in the questions table, this is true
	if ($queryResult > 0) {
		// while the result variable can still fetch data from the questions table, this is true
		while ($row = $result->fetch()) {
			// Fill up the rowCreate string with some html elements for creating rows and cells. 
			$rowCreate .= '<tr><td><a href = "answer_page.php?question='.$row['question'].'"><p class = "bodyParagraph" style = "text-align: left">'. $row['courseID'].': '. $row['question'] .'</p></a></td></tr>';
		}
	}
	else {
		// Otherwise leave the rowCreate string empty.
		$rowCreate = '';
	}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Hawk Heap - Main Page</title>
		<link rel = "shortcut icon" href = "web_images/favicon_hawkheap.png" type = "image/png"/>

		<!-- Style sheet implemented from mainStructure.css as well as style used within the file-->
		<link rel = "stylesheet" href = "mainStructure.css" type = "text/css"/>
		<style>
			#bodyBoxDesign {
				margin-left: auto;
				margin-right: auto;
				padding: 1%;
				width: 40%;
				background-color: #ffcaca;
				border: 5px solid #ff0000;
				box-shadow: 3px 6px 20px;
				overflow-y: auto;
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

			a {
				color: black;
				text-decoration: none;
			}

			label.labelStyle {
				display:inline-block;
				font-family: Copperplate,Copperplate Gothic Light,fantasy;
				font-size: 1vw;
				font-weight: bold;
				width: 12%;
			}

			input {
				width: 40%;
				padding: 5px 5px;
				border: 1px solid black;
				font-size: 1.5vw;
				font-size: 1.5vh;
				border-radius: 5px;
				display: inline;
			}

			select {
				width: 20%;
				padding: 4px 4px;
				border: 1px solid black;
				font-size: 1.5vw;
				font-size: 1.5vh;
				border-radius: 5px;
			}

			select:required:invalid {
				color: gray;
			}

			option {
				color: black;
			}

			img:hover.imgHover {
				transform: rotate(-5deg);
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

		<!-- Create a box that holds a form where a user can select from a drop down menu specific courses
			as well as type in specific keywords to search for specific questions he is looking for. -->
		<div id = "bodyBoxDesign" style = "margin-top: 3%; text-align: center">
			<form method = "post" action = "main_search.php" autocomplete = "off">
				<label class = "labelStyle" for = "search_sec">Search:</label>
				<select id = "search_sec" name = "course_numb" required>
					<option value = "" disabled selected>Select a Course!</option>
					<option value = "">No Course Selected</option>
					<option value = "CSIT 104">CSIT 104: Computational Concepts</option>
					<option value = "CSIT 111">CSIT 111: Fundamentals of Programming I</option>
					<option value = "CSIT 112">CSIT 112: Fundamentals of Programming II</option>
					<option value = "CSIT 212">CSIT 212: Data Structures and Algorithms</option>
					<option value = "CSIT 230">CSIT 230: Computer Systems</option>
					<option value = "CSIT 379">CSIT 379: Computer Science Theory</option>
					<option value = "CSIT 315">CSIT 315: Software Engineering I</option>
					<option value = "CSIT 415">CSIT 415: Software Engineering II</option>
					<option value = "CSIT 340">CSIT 340: Computer Networks</option>
					<option value = "CSIT 355">CSIT 355: Database Systems</option>
					<option value = "CSIT 313">CSIT 313: Foundations of Programming Languages</option>
					<option value = "CSIT 345">CSIT 345: Operating Systems</option>
					<option value = "CSIT 337">CSIT 337: Internet Computing</option>
				</select>
				<input type = text name = "search" id = "search_sec" placeholder = "Search a Question!"/>
				<input type = submit style = "background-color: red; font-family: Copperplate,Copperplate Gothic Light,fantasy;
				border-radius: 50px; width: 15%; box-shadow: inset 0 0 5px black; color: white" 
				name = Submit value = "Continue"/>
			</form>
		</div>
		<!-- Generate the rows and cells for the questions that are displayed from the questions table in the database
			The rows will be initially fully displayed however this can change if the user uses the search feature.-->
		<div id = "bodyBoxDesign" style = "height: 400px; margin-top: 1%; height: 30vh;">
			<table>
				<?php echo $rowCreate;?>
			</table>
		</div>

		<!-- Create a 'got a question' button and a 'log out' button. The log out button returns the  users to index.html, the 
			'got a question' button sends the user to the question_verification.php page. -->
		<div style = "text-align:center">
			<div id = "bodyBoxDesign" style = "margin-top: 1vw; text-align: center; width: 22.5%; display:inline-block; margin-right: 1%">
				<a href = "question_verification.php" class = "linkVisiblity">
					<img style = "width: 15vw" class = "imgHover" src = "web_images/question_button.png" alt = "Question Button"/>
				</a>
			</div>
			<div id = "bodyBoxDesign" style = "margin-top: 1vw; text-align: center; width: 14%; display:inline-block">
				<a href = "index.html" class = "linkVisiblity">
					<img style = "width: 8vw" class = "imgHover" src = "web_images/log_out.png" alt = "Question Button"/>
				</a>
			</div>
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