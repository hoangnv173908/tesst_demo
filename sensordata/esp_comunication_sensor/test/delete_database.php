<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb01";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  if ($conn->query($sql) === TRUE) {
    echo "Deleted successfully";
  } else {
    echo "Error: ";
  }
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

$sql = "DELETE FROM myguests WHERE firstname='John'";

if ($conn->query($sql) === TRUE) {
  echo "Deleted successfully";
} else {
  echo "Error: ";
}

$conn->close();
?>