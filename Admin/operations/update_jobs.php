<?php
session_start();

// Check if the user is not authenticated (not logged in)
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit();
}

// Include the database configuration
require_once('../includes/database.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $job_id = $_POST["job_id"];
    $job_title = $_POST["job_title"];
    $job_code = $_POST["job_code"];
    $job_description = $_POST["job_description"];
    $experience = $_POST["experience"];
    $posted = $_POST["posted"];
    $expire = $_POST["delete_date"];
    $stat = $_POST["stat"];

    // Prepare and execute the SQL query to update data
    $sql = "UPDATE jobs SET job_title=?, job_code=?, job_description=?, experience=?, posted=?, delete_date=?, stat = ? WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssssssi", $job_title, $job_code, $job_description, $experience, $posted, $expire, $stat, $job_id);
    $stmt->execute();
    $stmt->close();

    // Redirect back to the add_jobs.php page after updating the job
    header("Location: ../add_jobs.php");
    exit();
}

// Fetch job details based on the provided job ID
if (isset($_GET['id'])) {
    $job_id = $_GET['id'];

    $sql = "SELECT * FROM jobs WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $job = $result->fetch_assoc();
    } else {
        // Redirect to add_jobs.php if the job ID is invalid
        header("Location: ../add_jobs.php");
        exit();
    }
} else {
    // Redirect to add_jobs.php if no job ID is provided
    header("Location: ../add_jobs.php");
    exit();
}
?>

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
        <!-- <a href='../add_projects.php'><i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;go back</a></div>-->

        <div class="container-fluid">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                            class="form-horizontal form-material">
                            <input type="hidden" name="job_id" value="<?php echo $job['id']; ?>">
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Job Title</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="job_title" placeholder="Enter the Job Title" required
                                        class="form-control p-0 border-0" value="<?php echo $job['job_title']; ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Experience</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="experience"
                                        placeholder="Enter the Experience (for ex: 0-2 years or 2+ years...)" required
                                        class="form-control p-0 border-0" value="<?php echo $job['experience']; ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Date</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" name="posted" required class="form-control p-0 border-0"
                                        value="<?php echo $job['posted']; ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Expire Date</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="date" name="delete_date" required class="form-control p-0 border-0"
                                        value="<?php echo $job['delete_date']; ?>">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Job Code</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="job_code" placeholder="Enter the Job code without spacing"
                                        required class="form-control p-0 border-0"
                                        value="<?php echo $job['job_code']; ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Job Description</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea rows="5" class="form-control p-0 border-0" name="job_description"
                                        placeholder="Enter the Job Description"
                                        required><?php echo $job['job_description']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Status</label>
                                <div class="col-md-12 p-0">
                                    <label class="radio-inline">
                                        <input type="radio" name="stat" value="Open" required <?php if ($job['stat'] === 'open')echo 'checked'; ?>>Open</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="stat" value="Close" <?php if ($job['stat'] === 'clos')echo 'checked'; ?>>Close</label>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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