<?php
$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

?>