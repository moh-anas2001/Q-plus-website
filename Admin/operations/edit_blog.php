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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Handle the form submission for editing the blog
            $blogTitle = $_POST["title"];
            $publishDate = $_POST["publish_date"];
            $content = $_POST["content"];
            $blogId = $_POST["blog_id"]; // Assuming you pass the blog ID for editing
        
            $sql = "UPDATE blog SET title = ?, publish_date = ?, content = ? WHERE blog_id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssi", $blogTitle, $publishDate, $content, $blogId);
            $stmt->execute();
            $stmt->close();

            echo "<script>window.history.go(-2);</script>";
    
            exit(); // Terminate the script// Redirect to the edit page
        } else {
            // Display the blog details for editing
            $blogId = $_GET["blog_id"]; // Assuming you get the blog ID from the URL
            $sql = "SELECT * FROM blog WHERE blog_id = ?";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("i", $blogId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                echo "<div class='container-fluid'>";
                echo "<div class='row'>";
                echo "<div class=''>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                echo "<form method='POST' action='edit_blog.php'>"; // Change the action to the current script's filename (edit_blog.php)
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Blog Title</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='text' name='title' placeholder='Enter Blog Title' value='" . $row["title"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Publish Date</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<input type='date' name='publish_date' value='" . $row["publish_date"] . "' required class='form-control p-0 border-0'>";
                echo "</div>";
                echo "</div>";
                echo "<div class='form-group mb-4'>";
                echo "<label class='col-md-12 p-0'>Blog Description</label>";
                echo "<div class='col-md-12 border-bottom p-0'>";
                echo "<textarea  id ='content' name='content' placeholder='Enter Blog Description'  class='form-control p-0 border-0'>" . $row["content"] . "</textarea>";
                echo "</div>";
                echo "</div>";
                echo "<input type='hidden' name='blog_id' value='" . $row["blog_id"] . "'>";
                echo "<div class='form-group mb-4'>";
                echo "<div class='col-sm-12'>";
                echo "<button type='submit' class='btn btn-success'>Update Blog</button>";
                echo "</div>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "Blog not found!";
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
        <script src="../js/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#content'
            })
        </script>

</body>

</html>