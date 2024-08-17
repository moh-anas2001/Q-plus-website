<?php
// Include necessary files and start the session
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');



// Handle the registration form submission
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];

    // Handle image upload
    $targetDir = "../assets/img/users/";
    $profileImage = basename($_FILES["profile_image"]["name"]);
    $targetFilePath = $targetDir . $profileImage;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the uploaded file is an image
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    
    if (isset($_FILES["profile_image"]["name"])) {
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        if (in_array($imageFileType, $allowTypes)) {
            // Upload the image
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $targetFilePath)) {
                // Image uploaded successfully
            } else {
                // Image upload failed
                echo '<script>alert("Image upload failed. Please try again.");</script>';
            }
        } else {
            // Invalid file type
            echo '<script>alert("Invalid file type. Please upload a valid image.");</script>';
        }
    } else {
        // No image was uploaded
        echo '<script>alert("Please upload a profile image.");</script>';
    }

    // Hash the password for security
    $hashedPassword = sha1($password);

    // Update the SQL query to store the full image path
    $profileImagePath = $targetFilePath; // Full image path
    $sql = "INSERT INTO users (username, email, password, profile_image, phone, country, role, status) VALUES (?, ?, ?, ?, ?, ?, 'Blogger', 1)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ssssss", $username, $email, $hashedPassword, $profileImagePath, $phone, $country);

    if ($stmt->execute()) {
        // Registration successful, you can redirect the user to a login page or perform other actions
        set_message("Registration successful. You can now log in.");
        header('Location: index.php');
        exit();
    } else {
        // Registration failed
        set_message("Registration failed. Please try again.");
    }

    $stmt->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- Vendor CSS file -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta2/css/bootstrap.min.css">
    <!-- Custom CSS files -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="colored">

    <section class="container register">
        <div class="row">
            <div class="col-md-12 offset-md-5 mx-auto log">
                <div class="card my-5">


                    <form method="post"enctype="multipart/form-data" class="card-body cardbody-color p-lg-5">
                        <div class="text-center" style="font-family:'Times New Roman', Times, serif ;">
                            <h3><strong>User Registration</strong></h3>
                        </div><br>

                        <!-- Add a profile image input -->
                        <div class="mb-3">
                            <label class="form-label" for="profile_image">Profile Image</label>
                            <input type="file" id="profile_image" name="profile_image" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required
                                placeholder="Enter Username" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required
                                placeholder="Enter Email" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required
                                placeholder="Enter Password" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" required
                                placeholder="Enter Phone" />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="country">Country</label>
                            <select id="country" name="country" class="form-select" required>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="India">India</option>
                                <option value="London">London</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>


                        <div class="text-center">
                            <button type="submit" name="register" class="btn btn-color px-5 mt-3 mb-3"
                                style="background-color: #ffc107;color: white;">Register</button>
                        </div>

                        <div class="text-center">
                            <a href="index.php" class="btn btn-link">Already have an account? Log in here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>