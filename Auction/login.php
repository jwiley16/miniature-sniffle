<?php
include( 'Home.html' );
$isempty = false;

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
$send = mysqli_query($conn, "SELECT * FROM Image");
$num_rows = mysqli_num_rows($send);
$num_rows++;

if (filesize($_FILES['picture']['tmp_name']) == 0) {
	echo "Choose a file you idiot<br>";
} else {
	$image = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
	$image_name = addslashes($_FILES['picture']['name']);
	$sql = "INSERT INTO `Image` (`id`, `image`, `image_name`) VALUES ('{$num_rows}', '{$image}', '{$image_name}')";
	
	if (!$conn->query($sql)) { // Error handling
    	echo "Something went wrong! :("; 
    }
}
*/
$sql = "SELECT * FROM userList WHERE email = '$_POST[User]' AND pass = '$_POST[Pass]'";

if (mysqli_num_rows($conn->query($sql)) == 0) {
	echo "bro don't even play. Can't break into this system.<br>";
}
else {
	echo "you're good my g. Logged in succesfully<br>";
}

//Display
$sql = "SELECT email, pass FROM userList";
$result = $conn->query($sql);
/*
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["email"]. " " . $row["pass"] . "<br>";
    }
} else {
    echo "0 results";
}
include('display.php');
*/
$conn->close();
?>