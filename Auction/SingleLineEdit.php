<?php
$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM Persons WHERE fName='' AND lName=''";

if ($conn->query($sql) === TRUE) {
    echo "Edited Succesfully! ;)";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>