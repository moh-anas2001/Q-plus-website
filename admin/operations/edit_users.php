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
                    <h4 class="page-title">Manage Profiles</h4>
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle the form submission for editing the project
            $userName = $_POST["username"];
            $email = $_POST["email"];
            $password = sha1($_POST["password"]);
            $phone = $_POST["phone"];
            $role = $_POST["role"];
            $status = $_POST["status"];
            $userId = $_POST["user_id"];

            $sql = "UPDATE users SET username = ?, email = ?, password = ?, phone = ?, role = ?,  status= ?  WHERE id = ? ";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("ssssssi", $userName, $email, $password, $phone, $role, $status, $userId);
            $stmt->execute();
            $stmt->close();

            header("Location: ../profile.php"); // Terminate the script// Redirect to the edit page
        
        } else {
            // Display the profile details for editing
            $userId = $_GET["id"];
            $sql = "SELECT * FROM users WHERE id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // ...
// Display the user profile details in a form for editing
        
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                echo "<div class=''>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<form method='POST' action='edit_users.php'>";
                echo "<div class='form-group mb-4'>";
                echo "<label for='username'>User Name</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='username' id='username' placeholder='Enter User Name' value='" . $row["username"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='email'>Email</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='email' name='email' id='email' placeholder='Enter Email' value='" . $row["email"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='password'>Password</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='password' name='password' id='password' placeholder='Enter New Password' value='" . $row["password"] . "' required class='form-control p-0 border-0'>";
                echo "<small class='text-muted'>**Don't touch this field if you don't want to change password</small>";
                echo "</div>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='phone'>Phone</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='phone' id='phone' placeholder='Enter Phone Number' value='" . $row["phone"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";

                // Role as a dropdown
                echo "<div class='form-group'>";
                echo "<label for='role'>Role</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<select name='role' id='role' class='form-control p-0 border-0' required>";
                echo "<option value='admin' " . ($row["role"] === "Admin" ? "selected" : "") . ">Admin</option>";
                echo "<option value='blogger' " . ($row["role"] === "Blogger" ? "selected" : "") . ">Blogger</option>";
                echo "</select>";
                echo "</div>";
                echo "</div>";

                // Status as radio buttons
                echo "<div class='form-group'>";
                echo "<label>Status</label><br>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<label class='radio-inline'><input type='radio' name='status' value='1' " . ($row["status"] === "1" ? "checked" : "") . " required> Active</label> &nbsp;&nbsp;";
                echo "<label class='radio-inline'><input type='radio' name='status' value='0' " . ($row["status"] === "0" ? "checked" : "") . " required> Inactive</label>";
                echo "</div>";
                echo "</div>";

                echo "<input type='hidden' name='user_id' value='" . $row["id"] . "'>";
                echo "<button type='submit' class='btn btn-success'>Save Changes</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

            } else {
                echo '<script>alert("User not found!")</script>';
            }

            $stmt->close();
        }

        $connect->close();
        ?>
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