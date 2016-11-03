<?php

$conn = new mysqli("localhost", "root", "NCAPSSQLison#1", "mydb");

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, event, name, description, bid, pic FROM ItemList WHERE event = '$eventNum'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
while($row = $result->fetch_assoc()) {
    echo 	"<div style=\"width: 100%; height: 100px;\">
    			<div style=\"width: 33%; float: left;\">
        			<img src=\"data:image/jpeg;base64, ".base64_encode( $row['pic'] )."\" style=\"width: 180px; height: 100px;\"/>
        		</div>
        		<div style=\"width: 33%; float: left;\">
        			<p style=\"font-size: 40px; line-height: 10px;\">"
        				. $row["name"] . 
        			"</p>
        		</div>
        		<div style=\"width: 33%; float: left;\">
        			<p style=\"font-size: 40px; line-height: 10px;\">Current bid: $"
        				. $row["bid"] .
        			"</p>
        		</div>
        	</div>";
    }
} else {
    echo "0 results";
}
?>