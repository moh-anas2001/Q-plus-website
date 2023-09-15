
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
            <div class="col-lg-3"> <p style="color: red;font-style: italic;margin:20px 30px 0px 30px;">please update the fields !</p></div>
            <!-- <a href='../add_projects.php'><i class='fa fa-arrow-left' aria-hidden='true'></i>&nbsp;go back</a></div>
            -->
       



        <?php
        require_once('../includes/database.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle the form submission for editing the project
            $projectName = $_POST["project_name"];
            $projectDescription =$_POST["description"];
            $client = $_POST["client"];
            $contractor = $_POST["contractor"];
            $consultant = $_POST["consultant"];
            $projectId = $_POST["project_id"];

            $sql = "UPDATE projects SET project_name = ?, description = ?, client = ?, contractor = ?, consultant = ?  WHERE id = ? ";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssssi", $projectName, $projectDescription, $client, $contractor, $consultant, $projectId);
            $stmt->execute();
            $stmt->close();

            header("Location: ../add_projects.php");
        } else {
            // Display the project details for editing
            $projectId = $_GET["id"];
            $sql = "SELECT * FROM projects WHERE id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $projectId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                echo "<div class=''>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<form method='POST' action='edit_project.php'>"; // Change the action to update.php
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Project Name</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='project_name' placeholder='Enter Project Name' value='" . $row["project_name"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Client Name</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='client' placeholder='Enter Client Name' value='" . $row["client"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Main Contractor Name</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='contractor' placeholder='Enter Main Contractor Name' value='" . $row["contractor"] . "'  class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Consultant Name</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='consultant' placeholder='Enter Consultant Name' value='" . $row["consultant"] . "' class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Project Description</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<textarea rows='5' name='description' placeholder='Enter Description' required class='form-control p-0 border-0'>" . $row["description"] . "</textarea>";
                echo "</div>";
                echo "</div>";
                echo "<input type='hidden' name='project_id' value='" . $row["id"] . "'>";
                echo "<div class='form-group mb-4'>";
                echo "<div class='col-sm-12'>";
                echo "<button type='submit' class='btn btn-success'>Update Project</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

            } else {
                echo "Project not found!";
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