<?php
include( 'Admin.php' );
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

$conn->close();
?>