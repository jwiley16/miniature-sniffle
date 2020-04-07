<?php

$isempty = false;

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));

$send = mysqli_query($conn, "SELECT * FROM ItemList");
$num_rows = mysqli_num_rows($send);
$id = $num_rows;

$max_size = 1000000;
if(filesize($_FILES['userfile']['tmp_name']) > $max_size) {
	die('The file you uploaded is too large.');
}

$sql = "INSERT INTO ItemList (id, event, name, bid, description, pic)
VALUES ('$id','$_POST[eventNum]','$_POST[name]','$_POST[bid]','$_POST[description]','$image')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
	echo "Error Sending Request";
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}

$conn->close();
?>