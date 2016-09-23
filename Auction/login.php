<?php
include( 'Home.html' );
$isempty = false;

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");


//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Check if they typed anything 
if (trim($_POST['fname']) === '' || trim($_POST['lname']) === '') {
	$isempty = true;
}

//Insert form from Home.html
$sql = "INSERT INTO Persons (fName, lName)
VALUES ('$_POST[fname]','$_POST[lname]')";

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

$conn->close();
?>