<!-- delete_project.php -->
<?php
require_once('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $projectId = $_GET["id"];

    // Delete the project from the database
    $sql = "DELETE FROM projects WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $projectId);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the projects list page
    header("Location: ../add_projects.php");
} else {
    echo "Invalid request!";
}

$connect->close();
?>

