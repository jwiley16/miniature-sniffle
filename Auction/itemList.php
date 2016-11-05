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
    echo 	"<div id=\"item\">
    			<div style=\"width: 33%; float: left; margin: auto;\">
        			<img src=\"data:image/jpeg;base64, ".base64_encode( $row['pic'] )."\" style=\"width: 100%; height: 100%;\"/>
        		</div>
        		<div style=\"width: 33%; float: left;\">
        			<p style=\"font-size: 40px; text-overflow: ellipsis; overflow: hidden; font-size: 25px;\">"
        				. $row["name"] . 
        			"</p>
        		</div>
        		<div style=\"width: 33%; height: 75%; margin: auto; float: left;\">
        			<a href=\"";
        			if ($isAdmin == 1) {
        				echo "adminItem.php";
        			} else {
        				echo "Item.php";
        			}
    echo			"\"?eventNum=". $row["id"] ."\">
        				<button class=\"button3\">Bid</button>
        			</a>
        		</div>
        	</div>";
    }
} else {
    echo "0 results";
}
?>