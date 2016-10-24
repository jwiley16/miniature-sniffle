<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
    <body>
    	<div style="padding-bottom: 50px;">
    	<p id="Title">
			Admin Page
		</p>
			<div id="formdiv">
			<form action="createEvent.php" method="post" id="admin" enctype="multipart/form-data">
				<input type="text" name="name" placeholder="Event Name" id="input100">
				<div style="float: left; width: 23%; height: 20px; text-align: left;">
					<p>Start&nbsp;time</p>
				</div>
				<div id="input1">
					<input type="time" name="timeStart" id="input100">
				</div>
				<br>
				<div style="float: left; width: 28%; height: 20px; text-align: left;">
					<p>Ending&nbsp;time</p>
				</div>
				<div id="input2">
					<input type="time" name="timeEnd" id="input100">
				</div>
				<div style="float: left; width: 12%; height: 20px; text-align: left; padding-bottom: 40px;">
					<p>Date</p>
				</div>
				<div id="input3">
					<input type="date" name="date" placeholder="Date" id="input100">
				</div>
				<br>
				<input type="number" name="fee" placeholder="Fee" id="input100">
				<div style="padding-bottom: 15px;"></div>
				<input type="text" name="location" placeholder="Location" id="input100">
				<div style="padding-bottom: 15px;"></div>
				<button class="button2">Submit</button>
				<!--<input type="file" accept="image/*" name="picture" style="margin: auto;">-->
			</div>
			</form>
		</div>
		<?php include ('display.php'); ?>
		<script type="text/javascript">
			if (screen.width <= 699) {
				document.location = "AdminM.html";
			}
		</script>
    </body>
</html>