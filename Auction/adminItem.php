<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
    <body>
    	<div style="padding-bottom: 50px;">
    	<p id="Title">
			Item Page
		</p>
			<div id="formdiv">
			<form action="createItem.php" method="post" id="admin" enctype="multipart/form-data">
				<input type="hidden" name="eventNum" value="<?php echo $_GET['eventNum'];?>">
				<input type="text" name="name" placeholder="Item Name" id="input100">
				<div style="float: left; width: 35%; height: 20px; text-align: left; padding-bottom: 40px;">
					<p>Starting Bid</p>
				</div>
				<div style="width: 65%; padding-top: 15px; float: right;">
					<input type="number" name="bid" placeholder="Bid" id="input100">
				</div>
				<br>
				<input type="text" name="description" placeholder="Description" id="input100">
				<div style="padding-bottom: 15px;"></div>
				<input type="file" accept="image/*" name="picture" style="margin: auto;" id="input100">
				<div style="padding-bottom: 15px;"></div>
				<button class="button2">Submit</button>
			</form>
			</div>
			<div style="padding-top: 30px;"></div>
		<?php $eventNum = $_GET['eventNum']; include ('itemList.php');?>
		</div>
    </body>
</html>