<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Hawk Heap - Signup Page</title>
		<link rel = "shortcut icon" href = "web_images/favicon_hawkheap.png" type = "image/png"/>

		<!-- Style sheet implemented from mainStructure.css as well as style used within the file-->
		<link rel = "stylesheet" href = "mainStructure.css" type = "text/css"/>
		<style>
			#bodyBoxDesign {
				margin-left: auto;
				margin-right: auto;
				padding: 1%;
				margin-top: 50px;
				width: 30%;
				height: 30%;
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

			input {
				width: 10vw;
				padding: 5px 5px;
				border: 1px solid black;
				font-size: 1.5vw;
				font-size: 1.5vh;
				border-radius: 5px;
			}

			div.divSpacing {
				display: block;
				line-height: 4vw;
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

		<!-- Create a form that takes a username, email, and password. If the requirements are met, then
			post the user details to the database -->
		<div id = "bodyBoxDesign" class = "centerContents">
			<img class = "imgResize" src = "web_images/signup_form.png" alt = "Signup Title"/>

			<form action = "signup_verification.php" method = "post" autocomplete = "off">
				<div class = "divSpacing">
					<label class = "labelStyle" for = "username_sec">Username:</label>
					<input name = "username" type = "name" id = "username_sec" placeholder = "username123" required/>
				</div>
				<div class = "divSpacing">
					<label class = "labelStyle" for = "email_sec">E-Mail:</label>
					<input name = "email" type = "email" id = "email_sec" placeholder = "you@email.com" required/>
				</div>
				<div class = "divSpacing">
					<label class = "labelStyle" for = "pass_sec">Password:</label>
					<input name = "password" type = "password" id = "pass_sec" placeholder = "********" required/>
				</div>
				<div style = "margin-top: 1vw">
					<button class = "submitButton" type = "submit">
						<img style = "width: 7vw" src = "web_images/accept_button.png" alt = "Accept Button"/>
					</button>
				</div>
				<!-- Dynamic message that tells you if there is an ERROR but originally will welcome you to the form -->
				<div>
					<p class = "bodyParagraph" style = "font-size: 1.5vw; font-size: 1.5vh;"><?php echo $signup_message;?></p>
				</div>
			</form>
		</div>
	</body>
	<!-- Implement copyright and year as well as my name and other footer details -->
	<footer>
		<div class = "centerContents">
			<p class = "boldedText" style = "margin-top: 5%; font-size: 0.8vw">
				&copy; 2000 - 2020 Arthur Levitsky.<br/>
				Montclair State University - Computer Science and Technology.<br/>
				CSIT 337 - Internet Computing.
			</p>
		</div>
	</footer>
</html>