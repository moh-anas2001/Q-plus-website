<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta property="og:image" content="assets/img/qplus_logo.png">

    <!-- Favicons -->
    <link href="assets/img/qplus_logo.png" rel="icon">
    <link href="assets/img/qplus_logo.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="portfolio-details-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">
            <div class="container-fluid d-flex align-items-center justify-content-between">

                <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <img src="assets/img/logo.png" alt="">
                    <!-- <h1>Q PLUS</h1>
          <span>.</span> -->
                </a>

                <!-- Nav Menu -->
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="index.php#home">Home</a></li>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="index.php#services">Services</a></li>
                        <li><a href="portfolio-details.php" class="active">Portfolio</a></li>
                        <!--<li><a href="blog.php">Blog</a></li>-->
                        <li><a href="careers.php">Join us</a></li>

                        <!-- <li class="dropdown has-dropdown"><a href="#"><span>More</span> <i class="bi bi-chevron-down"></i></a>
              <ul class="dd-box-shadow">
                <li><a href="index.php#careers">Join us</a></li> -->
                        <!-- <li class="dropdown has-dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down"></i></a>
                  <ul class="dd-box-shadow">
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                  </ul> -->
                        <!-- </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
              </ul> -->
                        </li>
                        <li><a href="index.php#contact">Contact</a></li>
                    </ul>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav><!-- End Nav Menu -->


                <a class="btn-getstarted" href="index.php#contact">Contact us</a>
            </div>
        </header><!-- End Header -->

        <main id="main">

            <!-- Portfolio Details Page Title & Breadcrumbs -->
            <div data-aos="fade" class="page-title">
                <div class="heading">
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-lg-8">
                                <h1>Portfolio Details</h1><br>
                                <p class="mb-0">An extensive portfolio of projects in the UAE and across the globe
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="breadcrumbs">
                    <div class="container">
                        <ol>
                            <li><a href="index.php">Home</a></li>
                            <li class="current">Portfolio Details</li>
                        </ol>
                    </div>
                </nav>
            </div><!-- End Page Title -->

            <!-- ======= Portfolio Details Section ======= -->
            <section id="portfolio-details" class="portfolio-details">
                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                                <div class="align-items-center">
                                    <?php
                                    // Establish a database connection (you may need to adjust the database credentials)
              $conn = new mysqli("localhost", "dacenj4b_qplus", "Dacentric@db", "dacenj4b_qplus");

                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Get the project ID from the URL parameter
                                    if (isset($_GET['id'])) {
                                        $project_id = $_GET['id'];

                                        // Query to fetch project details based on project ID
                                        $sql = "SELECT project_name, image_path, description FROM projects WHERE id = $project_id";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();

                                            // Display project image
                                            echo '<img src="' . $row['image_path'] . '" alt="Project Image">';
                                        } else {
                                            echo "Project not found.";
                                        }
                                    } else {
                                        echo "Invalid project ID.";
                                    }

                                    // Close the database connection
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="portfolio-description">
                                <?php
                                if (isset($row['project_name'])) {
                                    // Display project name and description
                                    echo '<h2>' . $row['project_name'] . '</h2>';
                                    echo '<p>' . $row['description'] . '</p>';
                                }
                                ?>
                            </div>
                            <?php
                            // Fetch client, contractor, and consultant details based on project ID
                            if (isset($_GET['id'])) {
                                $project_id = $_GET['id'];

                                // Query to fetch client, contractor, and consultant details based on project ID
                                $sql = "SELECT client, contractor, consultant FROM projects WHERE id = $project_id";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();

                                    // Check if all project information fields are empty
                                    $allEmpty = empty($row['client']) && empty($row['contractor']) && empty($row['consultant']);

                                    // Conditionally display the "Project information" section
                                    if (!$allEmpty) {
                                        echo '<div class="portfolio-info">';
                                        echo '<h3>Project information</h3>';
                                        echo '<ul>';
                                        if (!empty($row['client'])) {
                                            echo '<li><strong>Client</strong> ' . $row['client'] . '</li>';
                                        }
                                        if (!empty($row['contractor'])) {
                                            echo '<li><strong>Main Contractor</strong> ' . $row['contractor'] . '</li>';
                                        }
                                        if (!empty($row['consultant'])) {
                                            echo '<li><strong>Consultant</strong> ' . $row['consultant'] . '</li>';
                                        }
                                        echo '</ul>';
                                        echo '</div>';
                                    }
                                }
                            }
                            $conn->close();
                            ?>
                        </div>
                    </div>
                </div>
            </section>

        </main><!-- End #main -->




        <!-- =======Default  Footer ======= -->
        <footer id="footer" class="footer">

            <div class="container footer-top">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-about">
                        <a class="logo d-flex align-items-center">
                            <span style="color: white;font-size: large;margin-top: 10px">Our Social Networks<span>
                        </a>

                        <div class="social-links d-flex mt-4">
                            <a href="https://twitter.com/qplus_q"><i class="bi bi-twitter"></i></a>
                            <a href="https://www.facebook.com/Qplusts"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/qplustechnicalservice/"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/qplus-technical-service-llc/"><i
                                    class="bi bi-linkedin"></i></a>
                            <a href="https://wa.me/+971581174967"><i class="bi bi-whatsapp"></i></a>
                            <a href="https://www.youtube.com/@Qplus201"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="index.php#home">Home</a></li>
                            <li><a href="index.php#about">About us</a></li>
                            <li><a href="index.php#services">Services</a></li>
                            <li><a href="index.php#portfolio">Portfolio</a></li>
                            <li><a href="index.php#careers">Join us</a></li>
                            <li><a href="index.php#contact">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><a href="service-details.php">ELV services</a></li>
                            <li><a href="service-details.php">IT and Networking Services</a></li>
                            <li><a href="service-details.php">MEP Services</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <a href="https://goo.gl/maps/baR7adV2LxGMmDGF8">
                            <p>Q Plus Technical Service LLC</p>
                            <p>Office:702-20, Mai Tower, Al Nahda-1,</p>
                            <p>Al Qusais, Dubai United Arab Emirates</p>
                        </a>
                        <p class="mt-4"><strong>Phone:</strong> <span>
                                <p>Mob:<a href="tel:+971581174967"> +971 581174967</a></p>
                                <p><a href="tel:+971585388100" style="margin-left: 39px;">+971 585388100</a></p>
                                <p>Tel:</strong>&nbsp;&nbsp;&nbsp;<a href="tel:043931110"> +971 4 393 1110</a>
                            </span></p>
                        <p><strong><br>Email:</strong> <span><a
                                    href="mailto:info@qplus-ts.com">info@qplus-ts.com</span></a></p>
                    </div>

                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p>&copy; <span>Copyright</span><strong class="px-1">DaCentric Technologies</b></strong><span>All Rights
                        Reserved</span></p>
                <div class="credits">
                  
                    <a href=""></a>
                </div>
            </div>

        </footer><!-- End Footer -->


        <!-- Scroll Top Button -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <!-- <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div> -->

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>


        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

</html>