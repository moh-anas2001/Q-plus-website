<?php
// Database connection
$servername = "localhost";
$username = "cms";
$password = "secret";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current date
$currentDate = date("Y-m-d");

// Query to delete job listings with a deletion_date less than or equal to the current date
$sql = "DELETE FROM jobs WHERE delete_date <= '$currentDate'";
$conn->query($sql);

// Close the database connection
$conn->close();

echo "Expired job listings have been removed.";
?>
