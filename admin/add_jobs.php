<?php
session_start();

// Database connection
$servername = "localhost";
$username = "cms";
$password = "secret";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is authenticated (logged in)
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();

}

if (isset($_SESSION['role']) && $_SESSION['role'] !== 'Admin') {
    // Redirect to a restricted access page or display an error message
    header('Location: 404.php'); // You can create this page
    exit();
}

// Retrieve the lastJobCode value from the database and store it in the session
$sql = "SELECT last_code FROM last_job_code WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['lastJobCode'] = $row['last_code'];
} else {
    // If no record is found, initialize it to your desired starting value
    $_SESSION['lastJobCode'] = 19; // Starting from 20
}

// Include the database configuration
require_once('includes/database.php');

// Initialize the last job code variable from the session or set it to 0 if not set
$lastJobCode = isset($_SESSION['lastJobCode']) ? $_SESSION['lastJobCode'] : 19;
$jobCode = ""; // Initialize the job code variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_title = $_POST["job_title"];
    $job_description = $_POST["job_description"];
    $experience = $_POST["experience"];
    $posted = $_POST["posted"];
    $stat = $_POST["stat"];
    $deletion_date = $_POST["delete_date"]; // Retrieve the deletion date

    // Increment the last job code
    $lastJobCode++;

    // Create the job code by concatenating the fixed part and the incremented number
    $jobCode = "QPTS/JOB-" . str_pad($lastJobCode, 2, '0', STR_PAD_LEFT);

    // Store the updated $lastJobCode in the session
    $_SESSION['lastJobCode'] = $lastJobCode;

    // Update the value in the database
    $sql = "UPDATE last_job_code SET last_code = $lastJobCode WHERE id = 1";
    $conn->query($sql);

    // Prepare and execute the SQL query to insert data, including the deletion date
    $sql = "INSERT INTO jobs (job_title, job_code, job_description, experience, posted, stat, delete_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssssss", $job_title, $jobCode, $job_description, $experience, $posted, $stat, $deletion_date);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the add_jobs.php page after adding the job
    header("Location: add_jobs.php");
    exit();
}


// After successfully processing the form, set the flag to true
$_SESSION['form_submitted'] = true;

// Fetch existing testimonials from the database
$sql = "SELECT * FROM jobs";
$result = $connect->query($sql);
$jobs = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }
}
?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description">
    <title>Manage Jobs Section</title>
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
                        <h4 class="page-title">Add Jobs</h4>
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
                <!-- ==============================================================-->



                <div class="">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                class="form-horizontal form-material">

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Job Title</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="job_title" placeholder="Enter the Job Title" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Experience</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="text" name="experience"
                                            placeholder="Enter the Experience (for ex: 0-2 years or 2+ years...)"
                                            required class="form-control p-0 border-0">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Date</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" name="posted" required class="form-control p-0 border-0">
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Deletion Date</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <input type="date" name="delete_date" required
                                            class="form-control p-0 border-0">
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Job Description</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        <textarea id = "job_description" class="form-control p-0 border-0" name="job_description"
                                            placeholder="Enter the Job Description" ></textarea>
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Status</label>
                                    <div class="col-md-12 p-0">
                                        <label class="radio-inline">
                                            <input type="radio" name="stat" value="Open" required>
                                            &nbsp;Open</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="radio-inline">
                                            <input type="radio" name="stat" value="Close"> &nbsp;Close </label>
                                    </div>
                                </div>


                                <div class="form-group mb-4">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Manage Projects</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Job Title</th>
                                            <th class="border-top-0">Experience</th>
                                            <th class="border-top-0">Job code</th>
                                            <th class="border-top-0">Job Description</th>
                                            <th class="border-top-0">Posted On</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($jobs as $job) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $job['id']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $job['job_title']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $job['experience']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $job['job_code']; ?>
                                                </td>
                                                <td>
                                                    <?php // echo $job['job_description']; ?>
                                                    <span class="job-description-short">
                                                        <?php echo substr($job['job_description'], 0, 10); ?>...<!-- Display the first 50 characters -->
                                                    </span>
                                                    <span class="job-description-full" style="display: none;">
                                                        <?php echo $job['job_description']; ?> <!-- Hidden by default -->
                                                    </span>
                                                    <span class="expand-description-button"
                                                        style="cursor: pointer; font-size: small;color: blue; text-decoration: underline;">Expand</span>
                                                </td>
                                                <td>
                                                    <?php
                                                    $postedDate = date('d M Y', strtotime($job['posted']));
                                                    $deleteDate = date('d M Y', strtotime($job['delete_date']));
                                                    echo $postedDate . ' to ' . $deleteDate;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $job['stat'] ?>
                                                </td>
                                                <td>
                                                    <a
                                                        href="operations/update_jobs.php?id=<?php echo $job['id']; ?>">Edit</a>
                                                    /
                                                    <a
                                                        href="operations/delete_jobs.php?id=<?php echo $job['id']; ?>">Delete</a>


                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>


                                </table>
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
    <!-- ============================================================== -->

    <script>
        // Add an event listener for the expand button
        document.querySelectorAll(".expand-description-button").forEach(function (button) {
            button.addEventListener("click", function () {
                // Find the related short and full description spans
                const shortDescription = this.parentNode.querySelector(".job-description-short");
                const fullDescription = this.parentNode.querySelector(".job-description-full");

                // Toggle their visibility
                if (shortDescription.style.display === "inline-block") {
                    shortDescription.style.display = "none";
                    fullDescription.style.display = "inline-block";
                    this.innerText = "Collapse";
                } else {
                    shortDescription.style.display = "inline-block";
                    fullDescription.style.display = "none";
                    this.innerText = "Expand";
                }
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
            selector:'#job_description'
        })
    </script>
</body>

</html>