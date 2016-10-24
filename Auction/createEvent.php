<?php
include( 'Admin.html' );
$isempty = false;

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$send = mysqli_query($conn, "SELECT * FROM EventList");
$num_rows = mysqli_num_rows($send);
$id = $num_rows;

$sql = "INSERT INTO EventList (id, name, date, fee, location, timeStart, timeEnd)
VALUES ('$id','$_POST[name]','$_POST[date]','$_POST[fee]','$_POST[location]','$_POST[timeStart]','$_POST[timeEnd]')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
	echo "Error Sending Request";
    //echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
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

$conn->close();
?>