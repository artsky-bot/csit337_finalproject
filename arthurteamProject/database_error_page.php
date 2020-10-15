<!DOCTYPE html>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Hawk Heap - Database Error</title>
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
		<!-- Create a box with the text inside being the error message that describes that the database is not connected to the web server.-->
		<div id = "bodyBoxDesign" class = "centerContents">
			<div>
				<p class = "bodyParagraph" style = "font-size: 1.5vw; font-size: 1.5vh;"><span style = "color: red"><?php echo $error;?></span>
			</div>
		</div>
	</body>
		<!-- Implement copyright and year as well as my name and other footer details -->
	<footer>
		<div class = "centerContents">
			<p class = "boldedText" style = "margin-top: 5%; font-size: 0.8vw">
				&copy; 1995 - 2020 Arthur Levitsky.<br/>
				Montclair State University - Computer Science and Technology.<br/>
				CSIT 337 - Internet Computing.
			</p>
		</div>
	</footer>
</html>