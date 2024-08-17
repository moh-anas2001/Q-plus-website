<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta property="og:image" content="assets/img/qplus_logo.png">

    <title>Careers </title>

    <!-- Favicons -->
    <link href="assets/img/qplus_logo.png" rel="icon">
    <link href="assets/img/qplus_logo.png" rel="apple-touch-icon">


    <!-- Styles -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="careers-page" data-bs-spy="scroll" data-bs-target="#navmenu">

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
                        <li><a href="index.php#portfolio">Portfolio</a></li>
                        <li><a href="careers.php" class="active">Join us</a></li>
                        <!--<li><a href="index.php#contact">Contact</a></li>-->
                        <!-- <li><a href="index.php#recent-posts">Blog</a></li> -->

                    </ul>

                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav><!-- End Nav Menu -->
                <!-- <a href="index.php" class="logo-2 me-xl-0">
          <p> WE ARE ISO 9001 2015 Certified</p>
          
          <img src="assets/img/clients/ISO-1.jpg" alt="QPLUS" class="iso-1">
          <img src="assets/img/clients/ISO-2.png" alt="QPLUS" class="iso-2">
        </a> -->

                <a class="btn-getstarted" href="index.php#contact">Contact us</a>
            </div>
        </header><!-- End Header -->

        <main id="main">

            <!-- Blog Page Title & Breadcrumbs -->
            <div data-aos="fade" class="page-title">
                <div class="heading">
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-lg-8">
                                <h1>Careers</h1>
                                <p class="mb-0">Join our Team of Talented and Passionate Individuals
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="breadcrumbs">
                    <div class="container">
                        <ol>
                            <li><a href="index.php">Home</a></li>
                            <li class="current">Careers</li>
                        </ol>
                    </div>
                </nav>
            </div><!-- End Page Title -->


            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <?php
                                if (isset($_GET['job_id'])) {
                                    // Establish a database connection (adjust the credentials as needed)
                                    $conn = new mysqli("localhost", "dacenj4b_qplus", "Dacentric@db", "dacenj4b_qplus");

                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Retrieve the job details based on the job ID from the URL parameter
                                    $job_id = $_GET['job_id'];
                                    $sql = "SELECT * FROM jobs WHERE id = ?";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $job_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        $job_title = $row["job_title"];
                                        $job_code = $row["job_code"];
                                        $job_description = $row["job_description"];
                                        $experience = $row["experience"];
                                        $posted = date('F d, Y', strtotime($row["posted"]));
                                        $stat = $row["stat"];

                                        // Display the job title
                                        echo '<h2 class="text-center">' . $job_title . '</h2>';
                                    } else {
                                        echo "<h2 class='text-center'>Job details not found.</h2>";
                                    }

                                    $stmt->close();
                                    $conn->close();
                                } else {
                                    echo "<h2 class='text-center'>Job ID not provided.</h2>";
                                }
                                ?>
                            </div>
                            <div class="card-body">
                                <h5>Job Description:</h5>
                                <?php
                                if (isset($job_description)) {
                                    echo '<p>' . $job_description . '</p>';
                                }
                                ?>

                                <h5>Experience Required:</h5>
                                <?php
                                if (isset($experience)) {
                                    echo '<p>' . $experience . ' years</p>';
                                }
                                ?>

                                <h5>Date Posted:</h5>
                                <?php
                                if (isset($posted)) {
                                    echo '<p>' . $posted . '</p>';
                                }
                                ?>

                                <h5>Job Code:</h5>
                                <?php
                                if (isset($job_code)) {
                                    echo '<p>' . $job_code . '</p>';
                                }
                                ?>

                                <h5>Status:</h5>
                                <?php
                                if (isset($stat)) {
                                    echo '<p>' . $stat . '</p>';
                                }
                                ?>

                                <div class="text-center mt-4 car-buts">
                                    <?php echo '<a href="mailto:careers@qplusts.com?subject=[' . $row["job_code"] . ']">';
                                    echo '<button class="small-button" type="submit">Apply Now</button></a>'; ?>&nbsp;&nbsp;
                                    <button class="btn btn-link" id="shareButton"><i class="bi bi-share">&nbsp;</i>Share</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- =======Default  Footer ======= -->
            <footer id="footer" class="footer">

                <div class="container footer-top">
                    <div class="row gy-4">
                        <div class="col-lg-5 col-md-12 footer-about">
                            <a class="logo d-flex align-items-center">
                                <span style="color: white;font-size: large;margin-top: 10px">Our Social
                                    Networks<span>
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
                                <p>Office:M20, Al Fahad Building, Abu Hail Road,</p>
                    <p>Hor Al Anz, Dubai, UAE</p>
                            </a>
                            <p class="mt-4"><strong>Phone:</strong> <span>
                                    <p>Mob:<a href="tel:+971581174967"> +971 581174967</a></p>
                                    <p><a href="tel:+971585388100" style="margin-left: 39px;">+971 585388100</a></p>
                                    <p>Tel:</strong>&nbsp;&nbsp;&nbsp;<a href="tel:043931110"> +971 4 393 1110</a>
                                </span></p>
                            <p><strong><br>Email:</strong> <span><a
                                        href="mailto:info@qplus-ts.com">info@qplus-ts.com</span>
                                </a></p>
                        </div>

                    </div>
                </div>

                <div class="container copyright text-center mt-4">
                    <p>&copy; <span>Copyright</span><strong class="px-1">DaCentric Technologies</b></strong><span>All
                            Rights
                            Reserved</span></p>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you've purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
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
   </div>  -->


            <!-- Vendor JS Files -->
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
            <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="assets/vendor/aos/aos.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>
    </body>

</html>