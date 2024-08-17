<?php
session_start();

// Check if the user is not authenticated (not logged in)
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_SESSION['role']) && $_SESSION['role'] !== 'Admin') {
    // Redirect to a restricted access page or display an error message
    header('Location: 404.php'); // You can create this page
    exit();
}

// Include the database configuration
require_once('includes/database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submitted token matches the stored token
    if (isset($_POST['token'])) {
        if ($_POST['token'] === $_SESSION['token']) {
            // Token is valid, now check for duplicates and handle form data
            if (isset($_POST['client_name'])) {
                $clientName = $_POST["client_name"];
                $uploadDirectory = "../assets/img/clients/";
                $uploadedImagePath = $uploadDirectory . basename($_FILES["image"]["name"]);
                $sqlCheckDuplicate = "SELECT COUNT(*) FROM logo WHERE client_name = ?";
                $stmtCheckDuplicate = $connect->prepare($sqlCheckDuplicate);
                $stmtCheckDuplicate->bind_param("s", $clientName);
                $stmtCheckDuplicate->execute();
                $stmtCheckDuplicate->bind_result($duplicateCount);
                $stmtCheckDuplicate->fetch();
                $stmtCheckDuplicate->close();

                if ($duplicateCount > 0) {
                    echo '<script>alert("Client already exists!");</script>';
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedImagePath)) {
                        $clientPath = $uploadedImagePath;
                        $sql = "INSERT INTO logo (client_path, client_name) VALUES (?, ?)";
                        $stmt = $connect->prepare($sql);
                        $stmt->bind_param("ss", $clientPath, $clientName);
                        $stmt->execute();
                        $stmt->close();
                        echo '<script>alert("Client added successfully!");</script>';
                    } else {
                        echo '<script>alert("Error uploading image!");</script>';
                    }
                }
            } elseif (isset($_POST['brand_name'])) {
                $brandName = $_POST["brand_name"];
                $uploadDirectory = "../assets/img/Brands/"; // Specify a different path for brand logos
                $uploadedImagePath = $uploadDirectory . basename($_FILES["image"]["name"]);
                $sqlCheckDuplicate = "SELECT COUNT(*) FROM logo WHERE brand_name = ?";
                $stmtCheckDuplicate = $connect->prepare($sqlCheckDuplicate);
                $stmtCheckDuplicate->bind_param("s", $brandName);
                $stmtCheckDuplicate->execute();
                $stmtCheckDuplicate->bind_result($duplicateCount);
                $stmtCheckDuplicate->fetch();
                $stmtCheckDuplicate->close();

                if ($duplicateCount > 0) {
                    echo '<script>alert("Brand already exists!");</script>';
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedImagePath)) {
                        $brandPath = $uploadedImagePath;
                        $sql = "INSERT INTO logo (brand_path, brand_name) VALUES (?, ?)";
                        $stmt = $connect->prepare($sql);
                        $stmt->bind_param("ss", $brandPath, $brandName);
                        $stmt->execute();
                        $stmt->close();
                        echo '<script>alert("Brand added successfully!");</script>';
                    } else {
                        echo '<script>alert("Error uploading image!");</script>';
                    }
                }
            }
        } else {
            // Token mismatch, do not process the form again.
            // You can display an error message or take appropriate action.
            echo '<script>alert("Token mismatch!");</script>';
        }
    }
}

// Generate new tokens for both forms when the page is initially loaded
$_SESSION['token'] = md5(uniqid(rand(), true));
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords">
    <title>Add Logo Section</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

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
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="plugins/images/logo-icon.png" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="plugins/images/logo-text.png" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">

                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                         <li class="dropdown">
                            <a class="profile-pic" href="#">
                                <?php
                                // Include the database configuration
                                require_once('includes/database.php');

                                // Assuming you have a session variable for the logged-in user ID
                                $userID = $_SESSION['id'];

                                // Fetch user data from the users table based on the user ID
                                $sqlFetchUserData = "SELECT username, profile_image FROM users WHERE id = ?";
                                $stmtFetchUserData = $connect->prepare($sqlFetchUserData);
                                $stmtFetchUserData->bind_param("i", $userID);
                                $stmtFetchUserData->execute();
                                $stmtFetchUserData->bind_result($username, $profile_image);
                                $stmtFetchUserData->fetch();
                                $stmtFetchUserData->close();

                                // Display the user's profile image and username
                                echo '<img src="' . $profile_image . '" alt="user-img" width="36" class="img-circle">';
                                echo '<span class="text-white font-medium">' . $username . '</span>';
                                ?>
                            </a>
                            <div class="dropdown-content">
                                <a href="dashboard.php">Dashboard</a>
                                <a href="add_jobs.php">Add Jobs</a>
                                <a href="Logout.php">Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="profile.php"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_projects.php"
                                aria-expanded="false">
                                <i class="far fa-lightbulb" aria-hidden="true"></i>
                                <span class="hide-menu">New Projects</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_jobs.php"
                                aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="hide-menu">New Jobs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="stats.php"
                                aria-expanded="false">
                                <i class="fas fa-chart-line" aria-hidden="true"></i>
                                <span class="hide-menu">Update Statistics</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_testimonial.php"
                                aria-expanded="false">
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                <span class="hide-menu">New Testimonials</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_logo.php"
                                aria-expanded="false">
                                <i class="fas fa-image" aria-hidden="true"></i>
                                <span class="hide-menu">Add Logo</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="admin_blogs.php"
                                aria-expanded="false">
                                <i class="fas fa-upload" aria-hidden="true"></i>
                                <span class="hide-menu">Add Blogs</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Logo</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <h4 class="page-title">Add Client Logo</h4><br>
                            </div>

                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal form-material">

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">client Name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="client_name" placeholder="Enter Client Name" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Upload Image</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" name="image" accept="image/*" required
                                            class="form-control p-0 border-0">
                                    </div>
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Upload and Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <h4 class="page-title">Add Brand Logo</h4><br>
                            </div>

                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Brand Name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="brand_name" placeholder="Enter Brand Name" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Upload Image</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" name="image" accept="image/*" required
                                            class="form-control p-0 border-0">
                                    </div>
                                    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

                                </div>
                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Upload and Save</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <!-- Manage Clients -->
                    <div class="col-md-6">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Manage Clients</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Client Name</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Include the database configuration
                                        require_once('includes/database.php');

                                        // Fetch client data from the database
                                        $sqlClient = "SELECT * FROM logo WHERE client_name IS NOT NULL AND client_name != ''";
                                        $resultClient = $connect->query($sqlClient);

                                        while ($rowClient = $resultClient->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td class='txt-oflo'>" . $rowClient["client_name"] . "</td>";
                                            echo "<td><a href='operations/delete_logo.php?id=" . $rowClient["id"] . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Manage Brands -->
                    <div class="col-md-6">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Manage Brands</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Brand Name</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetch brand data from the database, excluding rows with empty brand_name
                                        $sqlBrand = "SELECT * FROM logo WHERE brand_name IS NOT NULL AND brand_name != ''";
                                        $resultBrand = $connect->query($sqlBrand);

                                        while ($rowBrand = $resultBrand->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td class='txt-oflo'>" . $rowBrand["brand_name"] . "</td>";
                                            echo "<td><a href='operations/delete_logo.php?id=" . $rowBrand["id"] . "'>Delete</a></td>";
                                            echo "</tr>";
                                        }

                                        $connect->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>










            </div>




            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center"> 2020 © Qplus Technical Service LLC - <a
                href="https://www.qplus-ts.com">www.qplus-ts.com</a>
        </footer>

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->





    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>


</body>

</html>