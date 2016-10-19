<?php
$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, date, fee, location, timeStart, timeEnd FROM EventList";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
    echo 	"<div style=\"width: 33%; float: left;\">
        	<p style=\"font-size: 40px; line-height: 10px;\">"
        	. $row["name"] . 
        	"</p></div><div style=\"width: 33%; float: left;\"><p>"
        	. $row["location"] .
        	"<br>"
        	. $row["date"] .
        	"</p></div><div style=\"width: 33%; float: left;\"><p>"
        	. $row["fee"] .
        	"<br>"
        	. $row["timeStart"] . " to " . $row["timeEnd"] .
        	"</p></div><br><br><br><br>";
    }
} else {
    echo "0 results";
}

/*
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
*/
?>