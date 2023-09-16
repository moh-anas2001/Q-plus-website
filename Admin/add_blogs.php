<?php
session_start();

// Check if the user is not authenticated (not logged in)
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

// Include the database configuration
require_once('includes/database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submitted token matches the stored token
    if ($_POST['token'] === $_SESSION['token']) {
        // Token is valid, now check for duplicates
        $blogTitle = $_POST["title"];
        $authorName = $_POST["author_name"];
        $publishDate = $_POST["publish_date"];
        $content = $_POST["content"];

        // SQL query to check for duplicates based on blog title
        $sqlCheckDuplicate = "SELECT COUNT(*) FROM blog WHERE title = ?";
        $stmtCheckDuplicate = $connect->prepare($sqlCheckDuplicate);
        $stmtCheckDuplicate->bind_param("s", $blogTitle);
        $stmtCheckDuplicate->execute();
        $stmtCheckDuplicate->bind_result($duplicateCount);
        $stmtCheckDuplicate->fetch();
        $stmtCheckDuplicate->close();

        if ($duplicateCount > 0) {
            echo "Blog post with the same title already exists.";
        } else {
            // Upload and handle blog image
            $blogImageDir = "../assets/img/blog/"; // Directory to store blog images
            $blogImage = $_FILES["image"]["name"];
            $blogImagePath = $blogImageDir . basename($blogImage);

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $blogImagePath)) {
                // Image uploaded successfully, proceed to insert data
                // Upload and handle author image
                $authorImageDir = "../assets/img/blog/author/"; // Directory to store author images
                $authorImage = $_FILES["author_image"]["name"];
                $authorImagePath = $authorImageDir . basename($authorImage);

                if (move_uploaded_file($_FILES["author_image"]["tmp_name"], $authorImagePath)) {
                    // Author image uploaded successfully, proceed to insert data into the database
                    $sql = "INSERT INTO blog (title, author_name, publish_date, content, image_path, author_image) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $connect->prepare($sql);
                    $stmt->bind_param("ssssss", $blogTitle, $authorName, $publishDate, $content, $blogImagePath, $authorImagePath);

                    if ($stmt->execute()) {
                        // Data inserted successfully
                        echo "Blog post added successfully!";
                    } else {
                        // Error inserting data
                        echo "Error adding blog post: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Error uploading author image!";
                }
            } else {
                echo "Error uploading blog image!";
            }
        }
    } else {
        // Token mismatch
        echo "Token mismatch!";
    }
}

// Generate a new token when the form is initially loaded.
$_SESSION['token'] = md5(uniqid(rand(), true));

// Close the database connection
$connect->close();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords">
    <title>Manage Projects Section</title>
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
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle">
                                <span class="text-white font-medium">Admin</span>
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
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="basic-table.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Basic Table</span>
                            </a>
                        </li> -->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_testimonial.php"
                                aria-expanded="false">
                                <i class="fa fa-comment" aria-hidden="true"></i>
                                <span class="hide-menu">New Testimonials</span>
                            </a>
                        </li>


                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="add_blogs.php"
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
                        <h4 class="page-title">Add Blogs</h4>
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
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
                                enctype="multipart/form-data" class="form-horizontal form-material">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Blog Title</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="title" placeholder="Enter Blog Title" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Author Name</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="author_name" placeholder="Enter Author Name" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Author Image</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="file" name="author_image" accept="image/*" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Publish Date</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" name="publish_date" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Blog Description</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea id="content" rows="5" class="form-control p-0 border-0"
                                            name="content" placeholder="Enter Blog Description"></textarea>
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

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const readMoreLinks = document.querySelectorAll(".read-more-link");

            readMoreLinks.forEach(function (link) {
                link.addEventListener("click", function () {
                    const description = this.getAttribute("data-description");
                    alert(description); // You can replace this with code to display the full description in a modal or expand the table row.
                });
            });
        });
    </script>



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
    <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#content'
        })
    </script>


</body>

</html>