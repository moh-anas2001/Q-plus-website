<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords">
    <meta name="robots" content="noindex,nofollow">
    <title>Update Fields</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Manage Projects</h4>
                </div>
            </div>
        </div>

        <!-- /.col-lg-12 -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="col-lg-3">
            <p style="color: red;font-style: italic;margin:20px 30px 0px 30px;">please update the fields !</p>
        </div>
        <!-- <a href='../add_projects.php'><i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;go back</a></div>
            -->




        <?php
        require_once('../includes/database.php');
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle the form submission for updating the user's profile
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hashedPassword = sha1($password); // Hash the password
            $phone = $_POST["phone"];
            $country = $_POST["country"];
            $role = $_POST["role"];
            $status = $_POST["status"];
            $userID = $_SESSION['id']; // Assuming you store the user ID in the session
        
            // Handle profile image upload if provided
            $profileImage = $_FILES["profile_image"]["name"];
            $profileImagePath = ''; // Initialize the path as empty
        
            if (!empty($profileImage)) {
                $profileImageDir = "../../assets/img/users"; // Directory to store profile images
                $profileImagePath = $profileImageDir . basename($profileImage);

                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $profileImagePath)) {
                    // Image uploaded successfully
                } else {
                    echo "";
                    // Handle the error as needed
                }
            }

            // Update user profile in the database
            $sqlUpdateProfile = "UPDATE users SET username = ?, email = ?, password = ?, phone = ?, country = ?, role = ?, status = ?, profile_image = ? WHERE id = ?";
            $stmtUpdateProfile = $connect->prepare($sqlUpdateProfile);
            $stmtUpdateProfile->bind_param("ssssssssi", $username, $email, $hashedPassword, $phone, $country, $role, $status, $profileImagePath, $userID);

            if ($stmtUpdateProfile->execute()) {
                // Profile updated successfully
                echo '<script>alert("Profile updated successfully!");</script>';
            } else {
                // Error updating profile
                echo '<script>alert("Error updating profile: ' . $stmtUpdateProfile->error . '");</script>';
            }
            $stmtUpdateProfile->close();
        }

        // Fetch user data from the users table
        $userID = $_SESSION['id']; // Assuming you store the user ID in the session
        $sqlFetchUserData = "SELECT username, email, phone, country, role, status, profile_image FROM users WHERE id = ?";
        $stmtFetchUserData = $connect->prepare($sqlFetchUserData);
        $stmtFetchUserData->bind_param("i", $userID);
        $stmtFetchUserData->execute();
        $stmtFetchUserData->bind_result($username, $email, $phone, $country, $role, $status, $profileImage);
        $stmtFetchUserData->fetch();
        $stmtFetchUserData->close();
        ?>

        <!-- HTML Form to Update User Profile -->
        <div class="">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"
                        class="form-horizontal form-material">
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">User Name</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="text" name="username" placeholder="Enter Your name" required
                                    class="form-control p-0 border-0" value="<?php echo $username; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="example-email" class="col-md-12 p-0">Email</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="email" name="email" placeholder="Enter Your Email" required
                                    class="form-control p-0 border-0" name="example-email" id="example-email"
                                    value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Profile Image</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="file" name="profile_image" class="form-control p-0 border-0">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Password</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="password" name="password" value="" class="form-control p-0 border-0"
                                    placeholder="Enter your password" required>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Select role</label>
                            <div class="col-sm-12 border-bottom">
                                <select name="role" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option <?php if ($role === 'Admin')
                                        echo 'selected'; ?>>Admin</option>
                                    <option <?php if ($role === 'Blogger')
                                        echo 'selected'; ?>>Blogger</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Phone No</label>
                            <div class="col-md-12 border-bottom p-0">
                                <input type="number" name="phone" required placeholder="Phone Number"
                                    class="form-control p-0 border-0" value="<?php echo $phone; ?>">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-md-12 p-0">Status</label>
                            <div class="col-md-12 border-bottom p-0">
                                <label><input type="radio" name="status" value="1" <?php if ($status === '1')
                                    echo 'checked'; ?>> Active</label>&nbsp;&nbsp;
                                <label><input type="radio" name="status" value="0" <?php if ($status === '0')
                                    echo 'checked'; ?>> Inactive</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label class="col-sm-12">Select Country</label>
                            <div class="col-sm-12 border-bottom">
                                <select name="country" class="form-select shadow-none p-0 border-0 form-control-line">
                                    <option <?php if ($country === 'United Arab Emirates')
                                        echo 'selected'; ?>>United Arab
                                        Emirates</option>
                                    <option <?php if ($country === 'India')
                                        echo 'selected'; ?>>India</option>
                                    <option <?php if ($country === 'London')
                                        echo 'selected'; ?>>London</option>
                                    <option <?php if ($country === 'United States of America')
                                        echo 'selected'; ?>>United
                                        States of America</option>
                                    <option <?php if ($country === 'Others')
                                        echo 'selected'; ?>>Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="../js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../js/custom.js"></script>

</body>

</html>