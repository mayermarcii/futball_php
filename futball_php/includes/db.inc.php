

<?php
//Database login -FL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "futball_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>
