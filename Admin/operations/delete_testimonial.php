<!-- delete_project.php -->
<?php
// require_once('../includes/database.php');

// if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
//     $projectId = $_GET["id"];

//     // Delete the project from the database
//     $sql = "DELETE FROM testimonials WHERE id = ?";
//     $stmt = $connect->prepare($sql);
//     $stmt->bind_param("i", $projectId);
//     $stmt->execute();
//     $stmt->close();

//     // Redirect back to the projects list page
//     header("Location: ../admin_testimonial.php");
// } else {
//     echo "Invalid request!";
// }

// $connect->close();
?>
<?php
// Include the database configuration
require_once('../includes/database.php');

// Check if an ID is provided for the testimonial to delete
if (isset($_GET['id'])) {
    $testimonialId = $_GET['id'];

    // Delete the testimonial from the database
    $sql = "DELETE FROM testimonials WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $testimonialId);
    $stmt->execute();

    $stmt->close();
}

// Redirect back to the add_testimonial.php page after deleting
header("Location: ../admin_testimonial.php");
exit;
?>