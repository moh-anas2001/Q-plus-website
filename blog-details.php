<?php
// Include the database configuration and establish a database connection
include('admin/includes/database.php');

// Check if the blog_id is provided in the URL
if (isset($_GET['blog_id'])) {
  $blogId = $_GET['blog_id'];

  // Fetch the blog post details based on blog_id
  $sql = "SELECT * FROM blog WHERE blog_id = ?";
  $stmt = $connect->prepare($sql);
  $stmt->bind_param("i", $blogId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    // Fetch the blog post data
    $row = $result->fetch_assoc();

    // Fetch additional images associated with the blog post from blog_images table
    $sqlImages = "SELECT image_path FROM blog_images WHERE blog_id = ?";
    $stmtImages = $connect->prepare($sqlImages);
    $stmtImages->bind_param("i", $blogId);
    $stmtImages->execute();
    $resultImages = $stmtImages->get_result();

    $additionalImages = [];
    while ($imageRow = $resultImages->fetch_assoc()) {
      $additionalImages[] = $imageRow['image_path'];
    }
  } else {
    // Handle the case where the blog post with the provided ID is not found
    echo "Blog post not found.";
    exit;
  }
} else {
  // Handle the case where the blog_id is not provided in the URL
  echo "Invalid blog post URL.";
  exit;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog Details</title>
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

  <!-- Add this in your HTML head section -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">




  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="blog-details-page" data-bs-spy="scroll" data-bs-target="#navmenu">

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
            <li><a href="index.php#careers">Join us</a></li>
            <li><a href="blog-details.php" class="active">Blog</a></li>
          </ul>

          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->


        <a class="btn-getstarted" href="index.php#contact">Contact us</a>
      </div>

    </header><!-- End Header -->

    <main id="main">

      <!-- Blog Details Page Title & Breadcrumbs -->
      <div data-aos="fade" class="page-title">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>Blog Details</h1>
                <p class="mb-0"></p>
              </div>
            </div>
          </div>
        </div>
        <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.php">Home</a></li>
              <li class="current">Blog Details</li>
            </ol>
          </div>
        </nav>
      </div><!-- End Page Title -->

      <!-- Blog-details Section - Blog Details Page -->

      <!-- Blog-details Section - Blog Details Page -->
      <section id="blog-details" class="blog-details">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row g-5">
            <div class="col-lg-8">
              <article class="article">
                <div class="post-img">
                  <img src="<?php echo $row['cover_image']; ?>" alt="blog image" class="img-fluid">
                </div>

                <h2 class="title">
                  <?php echo $row['title']; ?>
                </h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                      <?php echo $row['author_name']; ?>
                    </li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time
                        datetime="<?php echo $row['publish_date']; ?>">
                        <?php echo date('M d, Y', strtotime($row['publish_date'])); ?>
                      </time></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <p>
                    <?php echo $row['content']; ?>
                  </p>
                </div><!-- End post content -->

                <!-- Additional Images Slider -->
                <div class="additional-images-slider">
                  <?php foreach ($additionalImages as $index => $imagePath): ?>
                    <a href="<?php echo $imagePath; ?>" data-lightbox="additional-images">
                      <img src="<?php echo $imagePath; ?>" alt="Additional Image <?php echo $index; ?>" class="img-fluid">
                    </a>
                  <?php endforeach; ?>
                </div>


              </article><!-- End post article -->
            </div>

            <div class="col-lg-4">
              <!-- Sidebar content for recent posts -->
              <div class="sidebar">
                <div class="sidebar-item recent-posts">
                  <h3 class="sidebar-title">Recent Posts</h3>
                  <?php
                  // Query to fetch the most recent 6 blog posts
                  $sqlRecentPosts = "SELECT * FROM blog ORDER BY publish_date DESC LIMIT 6";
                  $resultRecentPosts = $connect->query($sqlRecentPosts);

                  // Loop through the recent posts and display them
                  while ($rowRecent = $resultRecentPosts->fetch_assoc()): ?>
                    <div class="post-item">
                      <img src="<?php echo $rowRecent['cover_image']; ?>" alt="Recent Post Image" class="flex-shrink-0">
                      <div>
                        <h4><a href="blog-details.php?blog_id=<?php echo $rowRecent['blog_id']; ?>">
                            <?php echo $rowRecent['title']; ?>
                          </a></h4>
                        <time datetime="<?php echo $rowRecent['publish_date']; ?>">
                          <?php echo date('M d, Y', strtotime($rowRecent['publish_date'])); ?>
                        </time>
                      </div>
                    </div><!-- End recent post item-->
                  <?php endwhile; ?>
                </div><!-- End sidebar recent posts-->
              </div> <!-- End sidebar -->
            </div>

          </div>
        </div>
      </section><!-- End Blog-details Section -->

    </main>



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
              <a href="https://www.instagram.com/qplustechnicalservice/"><i class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/company/qplus-technical-service-llc/"><i class="bi bi-linkedin"></i></a>
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
            <p><strong><br>Email:</strong> <span><a href="mailto:info@qplus-ts.com">info@qplus-ts.com</span></a></p>
          </div>

        </div>
      </div>

      <div class="container copyright text-center mt-4">
        <p>&copy; <span>Copyright</span><strong class="px-1">DaCentric Technologies</b></strong><span>All Rights
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
  </div> -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Add this in your HTML body section, after including jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Add this script to your HTML body section -->
    <script>
      $(document).ready(function () {
        $('.additional-images-slider').slick({
          slidesToShow: 1, // Adjust the number of slides to display at a time
          slidesToScroll: 1,
          dots: true, // Add navigation dots
          prevArrow: '<button type="button" class="slick-prev">Previous</button>',
          nextArrow: '<button type="button" class="slick-next">Next</button>'
        });

        // Initialize Lightbox2
        lightbox.option({
          'resizeDuration': 200,
          'wrapAround': true
        });
      });
    </script>



  </body>

</html>