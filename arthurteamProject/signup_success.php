<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Hawk Heap - Signup Successful</title>
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

			div.divSpacing {
				margin-top: 1vw;
			}

			#returnButton {
				position: relative;
				display:inline-block;
				width: 7vw;
			}

			img:hover.tiltImage {
				transform: rotate(-5deg);
			}

			a.linkVisibility {
				text-decoration: none;
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

		<!-- Red box design with a paragraph inside the box. This paragraph congratulates the user for 
		creating an account and dynamically displays his username. -->
		<div id = "bodyBoxDesign" class = "centerContents">
			<div>
				<p class = "bodyParagraph" style = "font-size: 1.5vw; font-size: 1.5vh;">
				Congradulations <span style = "color: red"><?php echo $obtainUsername;?></span>! 
				You have successfully created an account at Hawk Heap!
				Please click on the return button to return back to the home page!</p>
			</div>
			<!-- Return back to the index.html page -->
			<div class = "divSpacing">
				<a href = "index.html" class = "linkVisibility">
					<img id = "returnButton" class = "tiltImage" src = "web_images/return_button.png" alt = "Return Button"/>
				</a>
			</div>
		</div>
	</body>
	<footer>
		<!-- Implement copyright and year as well as my name and other footer details -->
		<div class = "centerContents">
			<p class = "boldedText" style = "margin-top: 5%; font-size: 0.8vw">
				&copy; 1995 - 2020 Arthur Levitsky.<br/>
				Montclair State University - Computer Science and Technology.<br/>
				CSIT 337 - Internet Computing.
			</p>
		</div>
	</footer>
</html>