<?php
$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, date, fee, location, timeStart, timeEnd FROM EventList";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
    echo 	"<div id=\"formdivPHP\">
        		<p style=\"font-size: 40px; line-height: 10px;\">"
        			. $row["name"] . 
        		"</p>
        		<p>"
        			. $row["location"] .
        			"<br><br>"
        			. $row["date"] .
        		"</p>
        		<p>"
        			. $row["fee"] .
        			"<br>"
        			. $row["timeStart"] . " to " . $row["timeEnd"] .
        		"</p>
        	<a href=\"";
        	if ($isAdmin == 1) {
        				echo "adminItem.php";
        			} else {
        				echo "Item.php";
        			}
    echo 	"?eventNum=". $row["id"] ."\">
        	<br>
        	<button class=\"button2\">More</button></a></div>";
    }
} else {
    echo "0 results";
}

$send = mysqli_query($conn, "SELECT * FROM Image");
$num_rows = mysqli_num_rows($send);
$i = 1;
while ($i <= $num_rows) {
	$sql = "SELECT image FROM Image WHERE id=$i";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);

	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" style="width: 300px; height: 200px;"/><br>';
	$i++;
}

?>