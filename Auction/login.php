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

echo '<br>';
$target_dir = "pictures/";
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["picture"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>