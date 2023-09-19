<?php
require_once('../includes/database.php');

if (isset($_POST["delete_blog"]) && isset($_POST["blog_id"])) {
    // Check if the delete_blog button is clicked and if blog_id is set in POST data
    $blogId = $_POST["blog_id"]; // Get the blog ID from the form

    // Delete related records in blog_images table
    $sqlDeleteImages = "DELETE FROM blog_images WHERE blog_id = ?";
    $stmtDeleteImages = $connect->prepare($sqlDeleteImages);
    $stmtDeleteImages->bind_param("i", $blogId);

    if ($stmtDeleteImages->execute()) {
        // Blog images deleted successfully, proceed to delete the blog post
        $stmtDeleteImages->close();

        // Delete the blog post from the database
        $sqlDeleteBlog = "DELETE FROM blog WHERE blog_id = ?";
        $stmtDeleteBlog = $connect->prepare($sqlDeleteBlog);
        $stmtDeleteBlog->bind_param("i", $blogId);

        if ($stmtDeleteBlog->execute()) {
            // Blog post deleted successfully
            header("Location: ../admin_blogs.php"); // Redirect to the blog list page or another suitable page
        } else {
            // Error deleting blog post
            echo "Error deleting blog post: " . $stmtDeleteBlog->error;
        }

        $stmtDeleteBlog->close();
    } else {
        // Error deleting blog images
        echo "Error deleting blog images: " . $stmtDeleteImages->error;
    }
} else {
    // Invalid request or missing parameters
    echo "Invalid request or missing parameters.";
}

$connect->close();
?>
