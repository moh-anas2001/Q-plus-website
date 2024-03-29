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
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


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


                <h2 class="title" id="land">
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
                     <li class="d-flex align-items-center"><i class="fas fa-comments"></i>
                        <a href="https://www.qplus-ts.com/blog-details.php?blog_id=<?php echo $blogId; ?>#disqus_thread">
                                    Read More
                        </a>
                    </li>
                    <li class="d-flex align-items-center"><button class="btn btn-share" id="shareBlogs"><i
                          class="bi bi-share"></i>&nbsp;Share</button>
                    </li>
                   

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
                </div><br>
              </article><!-- End post article -->


              <!-- Add this code where you want the Disqus comment section to appear -->
              <div id="disqus_thread"></div>
              <script>
                (function () {
                  var d = document, s = d.createElement('script');
                  s.src = 'https://qplus-ts-blog.disqus.com/embed.js';// Replace 'your-shortname' with your Disqus shortname
                  s.setAttribute('data-timestamp', +new Date());
                  (d.head || d.body).appendChild(s);
                })();
              </script>
              <!-- <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments poweredby Disqus.</a></noscript> -->
            </div>


            <div class="col-lg-4">
              <!-- Sidebar content for recent posts -->
              <div class="sidebar">
                <div class="sidebar-item recent-posts">
                  <h3 class="sidebar-title">Recent Posts</h3>
                  <?php
                  // Query to fetch the most recent 6 blog posts
                  $sqlRecentPosts = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 6";
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



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info">
                        <h3>DaCentric Technologies</h3>
                        <p class="pb-3"><em>We are specialized in providing solution for IT & ELV Systems.</em></p>
                        <!-- <div class="row">

                            <div class="col-md-6" style="padding-left: 50px;">
                                <address style="padding-top: 20px;">India</address>
                            </div>
                            <div class="col-md-6" style="padding-right: 50px;">
                                <address>Mas Tower, <br>Attakulangara, Thiruvananthapuram</address>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-6" style="padding-left: 50px;">
                                <address style="padding-top: 20px;">UAE</address>
                            </div>
                            <div class="col-md-6" style="padding-right: 50px;">
                                <address>Office:702-20, Mai Tower, Al Nahda-1,

                                    Al Qusais, Dubai, UAE</address>
                            </div>
                        </div> -->


                        <div class="row">
                            <!-- India Address -->
                            <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                              <address style="padding-top: 20px;">India</address>
                            </div>
                            <!-- Mas Tower Address -->
                            <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                              <address style="text-align: left;">Mas Tower, <br>Attakulangara, Thiruvananthapuram</address>
                            </div>
                          </div>
                          
                          <div class="row">
                            <!-- UAE Address -->
                            <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                              <address style="padding-top: 20px;">UAE</address>
                            </div>
                            <!-- Dubai Address -->
                            <div class="col-md-6 col-sm-12" style="padding-left: 20px; padding-right: 20px;">
                              <address style="text-align: left;">Office:702-20, Mai Tower, Al Nahda-1, Al Qusais, Dubai, UAE</address>
                            </div>
                          </div>

                        <p>
                            <strong>Email:</strong> tse@dacentrictechnologies.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://x.com/dacentric?s=20" class="twitter"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.facebook.com/DaCentric" class="facebook"><i
                                    class="bx bxl-facebook"></i></a>
                            <a href="https://instagram.com/dacentrictechnologies?igshid=MTlnbmdhanJhMzhoYQ=="
                                class="instagram"><i class="bx bxl-instagram"></i></a>
                            <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
                            <a href="https://www.linkedin.com/company/dacentric-technologies/" class="linkedin"><i
                                    class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="index.html">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="about.html">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="services.html">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="blog.html">Blog</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="services.html">IT Solutions & Support</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="services.html">Software Services</a></li>                     
                        <li><i class="bx bx-chevron-right"></i> <a href="services.html">ELV Systems</a></li>
                        <!-- <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li> -->
                    </ul>
                </div>

                <!-- <div class="col-lg-4 col-md-6 footer-newsletter">


                    
        
                </div> -->

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <p style="text-align: center; font-size: 20px;">India</p>
                            <!-- Content for the first row goes here -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2925.8682601120336!2d76.94564645004365!3d8.478687293855524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b05bbab3adce1c3%3A0xdc1b33b9ab0e92fd!2sDaCentric%20Technologies!5e0!3m2!1sen!2sae!4v1700048587682!5m2!1sen!2sae"  width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <p style="text-align: center; font-size: 20px;">UAE</p>
                            <!-- Content for the second row goes here -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28859.983693419534!2d55.3572806!3d25.2874685!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5dc8bf44b213%3A0x2b359e754483f519!2sQplus%20Technical%20Service%20LLC!5e0!3m2!1sen!2sin!4v1700029795698!5m2!1sen!2sin" width="100%" height="175" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                

                

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>DaCentric Technologies</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- Designed by <a href="https://dacentrictechnologies.com">DaCentric Technologies</a> -->
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

    <!-- Bootstrap JS and jQuery (include jQuery first) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


    


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


      function initShareBlogs() {
        const shareBlogs = document.getElementById("shareBlogs");

        if (shareBlogs) {
          shareBlogs.addEventListener("click", function () {
            if (navigator.share) {
              // Use the Web Share API if available
              navigator.share({
                title: document.title, // Use the blog title as the title
                text: "Check out this blog post!", // Change the sharing text
                url: window.location.href, // Use the current blog post URL
              })
                .then(() => {
                  console.log("Shared successfully");
                })
                .catch((error) => {
                  console.error("Error sharing:", error);
                });
            } else {
              // Fallback for browsers that don't support Web Share API
              alert("Web Share API is not supported in your browser. You can manually copy the link.");
            }
          });
        }
      }

      // Call the function when the document is ready
      document.addEventListener("DOMContentLoaded", function () {
        initShareBlogs();
      });
    </script>
<!-- Include Disqus Comment Count Script -->
<script id="dsq-count-scr" src="//qplus-ts-blog.disqus.com/count.js" async></script>






  </body>

</html>