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
				<input type="text" name="name" placeholder="Event Name" id="mobileIn">
					<p style="line-height: 0px;">Start&nbsp;time</p>
					<input type="time" name="timeStart" id="mobileIn">
				<br>
					<p style="line-height: 0px;">Ending&nbsp;time</p>
					<input type="time" name="timeEnd" id="mobileIn">
					<p style="line-height: 0px;">Date</p>
					<input type="date" name="date" placeholder="Date" id="mobileIn">
				<br><br>
				<input type="number" name="fee" placeholder="Fee" id="mobileIn">
				<div style="padding-bottom: 15px;"></div>
				<input type="text" name="location" placeholder="Location" id="mobileIn">
				<div style="padding-bottom: 15px;"></div>
				<button class="button2">Submit</button>
				<!--<input type="file" accept="image/*" name="picture" style="margin: auto;">-->
				<?php include ('eventList.php'); ?>
			</div>
			</form>
		</div>
    </body>
</html>