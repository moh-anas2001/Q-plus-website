<!-- delete_project.php -->
<?php
require_once('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    // Delete the project from the database
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the projects list page
    header("Location: ../profile.php");
} else {
    echo "Invalid request!";
}

$connect->close();
?>