<?php
include( 'Home.html' );
$isempty = false;

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

$sql = "INSERT INTO Persons (fName, lName)
VALUES ('$_POST[fname]','$_POST[lname]')";

if (trim($_POST['fname']) === '' || trim($_POST['lname']) === '') {
	$isempty = true;
}

if ($isempty == false && $conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
	echo "Did you type anything?<br>";
    //echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}


//Display
$sql = "SELECT fName, lName FROM Persons";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["fName"]. " " . $row["lName"] . "<br>";
    }
} else {
    echo "0 results";
}
include('display.php');

$conn->close();
?>