<?php
// Include the database configuration
require_once('../includes/database.php');

// Check if an ID is provided for the testimonial to delete
if (isset($_GET['id'])) {
    $jobId = $_GET['id'];

    // Delete the testimonial from the database
    $sql = "DELETE FROM jobs WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $jobId);
    $stmt->execute();

    $stmt->close();
}

// Redirect back to the add_testimonial.php page after deleting
header("Location: ../add_jobs.php");
exit;
?>