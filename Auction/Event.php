﻿<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<body>
	<p id="Title" style="padding-top: 0px;">
        Event Sign In
    </p>
    <?php include 'eventList.php'; ?>
    <script type="text/javascript">
			if (screen.width <= 699) {
				document.location = "EventM.php";
			}
	</script>
</body>
</html>