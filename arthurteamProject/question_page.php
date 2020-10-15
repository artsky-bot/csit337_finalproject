<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Hawk Heap - Question Page</title>
		<link rel = "shortcut icon" href = "web_images/favicon_hawkheap.png" type = "image/png"/>

		<!-- Style sheet implemented from mainStructure.css as well as style used within the file-->
		<link rel = "stylesheet" href = "mainStructure.css" type = "text/css"/>
		<style>
			#bodyBoxDesign {
				margin-right: auto;
				margin-left: auto;
				padding: 1%;
				width: 30%;
				background-color: #ffcaca;
				border: 5px solid #ff0000;
				box-shadow: 3px 6px 20px;
			}

			img.imgResize {
				width: 70%;
			}

			label.labelStyle {
				display:inline-block;
				font-family: Copperplate,Copperplate Gothic Light,fantasy;
				font-size: 1vw;
				font-weight: bold;
				width: 35%;
			}

			div.divSpacing {
				display: block;
				line-height: 2.5vw;
			}

			select {
				width: 40%;
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

			input {
				width: 10vw;
				padding: 5px 5px;
				border: 1px solid black;
				font-size: 1.5vw;
				font-size: 1.5vh;
				border-radius: 5px;
			}

			textarea {
				width: 73%;
				padding: 5px 5px;
				border: 1px solid black;
				font-size: 1.5vw;
				font-size: 1.5vh;
				border-radius: 5px;
				resize: none;
			}

			button.submitButton {
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

		<!-- Design a form where you can input a question into the website, in here the user 
			needs to provide a course number, the question, and the question details -->
		<div id = "bodyBoxDesign" class = "centerContents">
			<img class = "imgResize" src = "web_images/ask_question.png" alt = "Question Title"/>
			<form action = "question_verification.php" method = "post" autcomplete = "off">
				<div class = "divSpacing" style = "margin-top: 1vw">
					<label class = "labelStyle" for = "course_sec">Course Section:</label>
					<select id = "course_sec" name = "course_numb" required>
						<option value = "" disabled selected>Select a Course!</option>
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
				</div>
				<div class = "divSpacing">
					<label class = "labelStyle" style = "font-size: 0.7vw" for = "question_sec">What is the Question?:</label>
					<input type = "text" style = "width: 38%" name = "quest_box" id = "question_sec" required>
				</div>
				<div class = "divSpacing">
					<label class = "labelStyle" style = "margin-right: 40%; font-size: 0.8vw" for = "detail_sec">Question Details:</label>
				</div>
				<div class = "divSpacing">
					<textarea rows = "8" name = "quest_detail" required></textarea>
				</div>
				<div style = "margin-top: 1vw; display: inline-block">
					<button class = "submitButton" type = "submit" name = "submit_button">
						<img style = "width: 7vw" src = "web_images/accept_button.png" alt = "Accept Button"/>
					</button>
				</div>
				<div style = "display: inline-block">
					<a href = "main_search.php">
						<img class = "imgHover" style = "width: 7vw" src = "web_images/return_button.png" alt = "Return Button"/>
					</a>
				</div>
				<!-- Dynamic message that provides an ERROR if the same exact question already exists in the database.-->
				<div>
					<p class = "bodyParagraph" style = "font-size: 1.5vw; font-size: 1.5vh;"><?php echo $signup_message;?></p>
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