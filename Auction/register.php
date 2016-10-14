<?php
include( 'Home.html' );
$isempty = false;

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userList (fName, email, pass)
VALUES ('$_POST[fName]','$_POST[User]','$_POST[Pass]')";

if (trim($_POST['fName']) === '' || trim($_POST['User']) === '' || trim($_POST['Pass']) === '') {
	$isempty = true;
}

if ($isempty == false && $conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
	echo "Did you type anything?<br>";
    //echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}

$conn->close();
?>