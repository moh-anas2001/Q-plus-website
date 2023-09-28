<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - Q plus</title>
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

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="QPLUS" Class="">
    
      </a>

      <!-- Nav Menu -->
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php#home" class="active">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#services">Services</a></li>
          <li><a href="index.php#portfolio">Portfolio</a></li>
          <li><a href="index.php#careers">Join us</a></li>
           <li><a href="index.php#recent-posts">Blog</a></li> 

          </li>
          <!-- <li><a href="index.php#contact">Contact</a></li> -->
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav><!-- End Nav Menu -->

      <a class="btn-getstarted" href="index.php#contact">Contact us</a>
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- home Section - Home Page -->
    <section id="home" class="home">

      <img src="assets/img/Home-2.jpg" alt="Background" data-aos="fade-in">

      <div class="container">
        <div class="row">
          <!-- <div class="col-lg-10"> -->
          <h2 data-aos="fade-up" data-aos-delay="100">Q PLUS TECHNICAL SERVICE LLC</h2><br>
          <p data-aos="fade-up" data-aos-delay="200">"Building Trust With Quality"</p>

          <!-- </div> -->
          <div class="col-lg-5">
          
          </div>
        </div>
      </div>

    </section><!-- End home Section -->

    <!-- Clients Section - Home Page -->


    <section id="clients" class="slide-show">
      

      <div class=" sec-tit" data-aos="fade-up">
        <h2> Our Clients</h2><br>
      </div>
      <div class="slider">

        <div class="slide-track">

          <!--  slide images -->

          <div class="cli-log">
            <img src="assets/img/clients/client-1.gif" style="max-height: 120%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-2.png" style="max-height: 120%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-3.jpg" style="max-height: 100%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-4.jpg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->
          
              <div class="cli-log">
            <?php
            // Include the database configuration
            require_once('admin/includes/database.php');

            // Fetch brand logos from the "logo" table
            $sqlClientLogos = "SELECT client_path FROM logo WHERE client_path IS NOT NULL AND client_path != ''";
            $resultClientLogos = $connect->query($sqlClientLogos);

            while ($rowClientLogo = $resultClientLogos->fetch_assoc()) {
              echo '<img src="' . $rowClientLogo["client_path"] . '" class="img-fluid" alt="Brand Logo">';
            }

            
            ?>
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-19.png" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-7.jpg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-8.jpg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-9.jpg" style="max-height: 120%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->


          <!-- Set of 9 -->

          <div class="cli-log">
            <img src="assets/img/clients/client-10.jpg" style="max-height: 130%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-11.jpeg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-12.jpg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-13.jpg" style="max-height: 120%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-14.jpeg" style="max-height: 120%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-15.jpeg" style="max-height: 120%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-16.svg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-17.svg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="cli-log">
            <img src="assets/img/clients/client-18.png" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->




        </div>

      </div>
    </section>


    <!-- About Section - Home Page -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <div class="sec-title" data-aos="fade-up">
              <h3> About us</h3><br>
            </div>
            <h2>Quality is the best business plan</h2>
            <p>Q Plus Technical Service LLC is a company raised by a team of experienced professionals to provide a
              single window solution for all Building Services, Interior Decoration, Electrical, HVAC, Plumbing, IT &
              ELV requirements. Q Plus means, Quality plus and we believe quality will be always a plus which will lead
              a hassle free solutions. We study your requirements and understand your needs, we design, propose and
              construct as per requirements. We get to know your business in depth to provide a solution which meets
              your goals. We ensure prompt responds to your queries and attend to resolve your issues as a leader.
              Along with bringing the best brands on the table, we undertake all the incidental and ancillary services
              including installation, maintenance, up gradation and repairs, thus giving our clients complete peace of
              mind and hassle free business experience.
              We continued to progress and earn respect of our clients as being one of the honest, transparent and
              trustworthy service providers across the UAE
            </p><br><br>

            <a href="index.php" class="logo-2 me-xl-0">
              <p> WE ARE ISO 9001 2015 Certified</p>

              <img src="assets/img/clients/ISO-1.jpg" alt="QPLUS" class="iso-1">
              <img src="assets/img/clients/ISO-2.png" alt="QPLUS" class="iso-2">
            </a>

          </div>

          <div class="col-xl-7 abt">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6 ic-0" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Our Clients</h3>
                  <p>Our company constantly strives its best to abide by the client expectations,
                    and we firmly believe that nothing but potential clients help greatly to expand the business.
                  </p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6 ic-1" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-clipboard-pulse"></i>
                  <h3>CEO Message</h3>
                  <p>Q Plus is excited to promote the benefits of latest technologies to the customers.
                    Our aim is to automate your daily requirements to run an easy life.
                  </p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6 ic-2" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-command"></i>
                  <h3>Our Vision</h3>
                  <p>Our Vision is to provide a quality work from start to end by adopting modern
                    construction technologies which will remind the Q Plus as a leader in the Market.
                  </p>
                </div>
              </div> <!-- End Icon Box -->

              <div class="col-md-6 ic-3" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Our Mission</h3>
                  <p>Our mission is to enhance business growth of our customers with high quality
                    technologies and services that create valuable and reliable outcomes.
                  </p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

    <!-- Stats Section - Home Page -->

    <?php
    // Read the JSON file
    $jsonData = file_get_contents('admin/stats.json');
    $stats = json_decode($jsonData, true);

    // Access individual statistics
    $clients = $stats['clients'];
    $projects = $stats['projects'];
    $brands = $stats['brands'];
    ?>

    <section id="stats" class="stats">

      <img src="assets/img/stats-bg.jpg" alt="" data-aos="fade-in">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $clients ?>" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Projects Done</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $projects ?>" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $brands ?>" data-purecounter-duration="1"
                class="purecounter"></span>
              <p>Brands we Handle</p>
            </div>
          </div><!-- End Stats Item -->
        </div>

      </div>

    </section><!-- End Stats Section -->



    <!-- Brands we Handle Section - Home Page -->
    <section id="brands" class="slide-show">

      <div class=" sec-tit" data-aos="fade-up">
        <h2> Brands we Handle</h2><br>
      </div>

      <div class="slider">

        <div class="slide-track-2">

          <!--  slide images -->

          <div class=" brand-log">
            <img src="assets/img/Brands/Brand-1.png" style="max-height: 40%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-2.png" style="max-height: 20%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-3.png" style="max-height: 20%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-4.png" style="max-height: 30%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->
          
          
          <div class="brand-log">
            <?php
            // Include the database configuration
            require_once('admin/includes/database.php');

            // Fetch brand logos from the "logo" table
            $sqlBrandLogos = "SELECT brand_path FROM logo WHERE brand_path IS NOT NULL AND brand_path != ''";
            $resultBrandLogos = $connect->query($sqlBrandLogos);

            while ($rowBrandLogo = $resultBrandLogos->fetch_assoc()) {
              echo '<img src="' . $rowBrandLogo["brand_path"] . '" style="max-height: 40%;" class="img-fluid" alt="Brand Logo">';
            }

            $connect->close();
            ?>
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-5.jpg" style="max-height: 20%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-6.svg" style="max-height: 20%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-7.jpg" style="max-height: 100%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-8.svg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-9.svg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->


          <!-- Set of 9 -->

          <div class="brand-log">
            <img src="assets/img/Brands/Brand-10.png" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-11.svg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-12.svg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-13.jpg" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-14.jpg" style="max-height: 100%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-15.jpeg" style="max-height: 80%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-16.jpg" style="max-height: 100%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-17.png" style="max-height: 100%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->

          <div class="brand-log">
            <img src="assets/img/Brands/brand-18.png" style="max-height: 80%;" class="img-fluid" alt="New Client">
          </div><!-- End Client Item -->




        </div>

      </div>
    </section>



    <!-- ======= Services Section ======= -->

    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="container section-title" data-aos="fade-up">
          <h2>Our Services</h2><br>
          <h6>To provide solutions for the customer requirements with latest technologies</h6><br>
        </div>

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="assets/img/elv services.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <a href="service-details.php?tab=tab-1">
                  <div class="icon">
                    <i class="bi bi-lightning-charge"></i>
                  </div>
                </a>
                <a href="service-details.php?tab=tab-1" class="stretched-link">
                  <h3>ELV Services</h3>
                </a>
                <p class="remove-space">Elevate your projects with our ELV Systems expertise. From cutting-edge security
                  and seamless communication networks to smart automation designs, we offer a comprehensive approach
                  that guarantees integration and superior performance.
                  With a commitment to quality, sustainability, and technical proficiency, we stand by you as your
                  reliable partner in creating spaces that define the future.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
              <div class="img">
                <img src="assets/img/IT Services.png" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
              <a href="service-details.php?tab=tab-2">
                  <div class="icon">
                    <i class="bi bi-router"></i>
                  </div>
                </a>
                <a href="service-details.php?tab=tab-2" class="stretched-link">
                  <h3>IT and Networking Services </h3>
                </a>
                <p>Empower your business with tailored IT and Networking solutions, meticulously designed to match your
                  requirements. Our adept team architects high-performance networks, guaranteeing flawless connectivity
                  and streamlined data management. Whether optimizing infrastructure or fortifying security, our
                  solutions seamlessly pave the path to your digital triumph.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
              <div class="img">
                <img src="assets/img/Mep.jpg" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
              <a href="service-details.php?tab=tab-3">
                  <div class="icon">
                    <i class="bi bi-tools"></i>
                  </div>
                </a>
                <a href="service-details.php?tab=tab-3" class="stretched-link">
                  <h3>MEP Services</h3>
                </a>
                <p> Our MEP services provide a foundation of excellence for your projects.
                  From innovative electrical systems and efficient mechanical designs to meticulously planned plumbing
                  solutions, we offer a holistic approach that ensures seamless integration and optimal performance.
                  With a focus on quality, sustainability, and technical expertise, we are your trusted partner in
                  shaping spaces that stand the test of time.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section>

    <!-- End Services Section -->


    <!-- Portfolio Section - Home Page -->
    <section id="portfolio" class="portfolio">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>An extensive portfolio of projects in the UAE and across the globe</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            
        <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            <?php
            // Establish a database connection (you may need to adjust the database credentials)
            $conn = new mysqli("localhost", "cms", "secret", "cms");

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Define an array of project IDs that you want to retrieve
           $projectIdsToRetrieve = [2, 3, 4, 1, 5, 6, 7, 8, 9]; // Replace with the desired project IDs
            
            // Create a comma-separated string of project IDs
            $projectIdsString = implode(",", $projectIdsToRetrieve);

            // Query to fetch specific projects based on project IDs
            $sql = "SELECT id, image_path, project_name FROM projects WHERE id IN ($projectIdsString) ORDER BY FIELD(id, $projectIdsString)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">';
                echo '<img src="' . $row["image_path"] . '" class="img-fluid" alt="">';
                echo '<div class="portfolio-info">';
                echo '<a href="project-details.php?id=' . $row["id"] . '">';
                echo '<h4>' . $row["project_name"] . '</h4><br><br>';
                echo '<p>Learn More <i class="bi bi-plus-circle"></i></a></p>';
                echo '</div></div>';
              
                echo '<!-- End Portfolio Item -->';
              }
            } else {
              echo "";
            }

            $conn->close();
            ?>

            </div>

         

          <div class="port-buts">
            <a href="portfolio-details.php">
              <button type="submit" class="all-port"><i class="bi bi-arrow-right-circle-fill"></i>&nbsp;&nbsp;See all
                Projects</button>
            </a>
          </div>

        </div>

      </div>

    </section><!-- End Portfolio Section -->

    <!-- Careers Page -->
    <section id="careers" class="careers">

      <div class="container">

        <div class="section-title car-hd">
          <h2>Careers</h2>
          <p>Join our team of talented and passionate individuals</p>
        </div>

        <div class="row">
          <?php
          // Establish a database connection (you may need to adjust the database credentials)
          $conn = new mysqli("localhost", "cms", "secret", "cms");

          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Retrieve job listings from the database
          $sql = "SELECT id, job_title, job_code, job_description, experience, posted, stat FROM jobs ORDER BY created_at DESC LIMIT 6";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<div class="col-lg-4">';
              echo '<div class="career-item">';
              echo '<h3>' . $row["job_title"] . '</h3>';
              $description = substr($row["job_description"], 0, 100);

              // Check if the description was truncated
              if (strlen($row["job_description"]) > 100) {
                $description .= '... <a href="job-details.php?job_id=' . $row["id"] . '">Read More</a>';
              }

              echo '<p>' . $description . '</p>';
              echo '<p><strong>Experience:</strong> ' . $row["experience"] . '</p>';
              $formattedDate = date('d-m-Y', strtotime($row["posted"]));
              echo '<p><strong>Posted on:</strong> ' . $formattedDate . '</p>';

              // echo '<P><strong>Status:&nbsp;</strong>' . $row["stat"] . '</p>';
              echo '<div class="car-buts">';
              // echo '<a href="mailto:info@qplus-ts.com?subject=[' . $row["job_code"] . ']">';
              // echo '<button class="small-button" type="submit">Apply Now</button>';
              echo '<a href="job-details.php?job_id=' . $row["id"] . '">';
              echo '<button class="small-button" type="submit">Apply Now</button>';
              echo '</a></div></div></div>';
            }
          } else {
            echo "";
          }

          $conn->close();
          ?>
        </div><br><br><br>
        <div class="car-buts">
          <a href="careers.php">
            <button type="submit" class="all-job"><i class="bi bi-arrow-right-circle-fill"></i>&nbsp;&nbsp;See all open
              jobs</button>
          </a>
        </div>
      </div>

    </section> <!-- End of Career Section -->

    <!-- Testimonials Section - Home Page -->
    <section id="testimonials" class="testimonials">

      <div class="container">

        <div class="row align-items-center">

          <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
            <h3>Testimonials</h3><br>
            <p>
              Discover what our valued clients have to say about their experience partnering with us.
              From exceeding expectations to transforming visions into reality, our testimonials showcase the impact
              we've had on businesses just like yours.
              Dive into their stories and learn how our expertise, dedication, and innovative solutions have made a
              difference.
              These are more than just words – they're a testament to our commitment to your success.
            </p>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">

            <div class="swiper">
              <template class="swiper-config">
                {
                "loop": true,
                "speed" : 600,
                "autoplay": {
                "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
                }
                }
              </template>
              <div class="swiper-wrapper">


                <?php


                // Establish a database connection (you may need to adjust the database credentials)
                $conn = new mysqli("localhost", "cms", "secret", "cms");

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve testimonials from the database
                $sql = "SELECT name,com_name, role, testimonial, image_path FROM testimonials ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo '<div class="swiper-slide">';
                    echo '<div class="testimonial-item">';
                    echo '<div class="d-flex">';
                    echo '<img src="' . $row["image_path"] . '" class="testimonial-img flex-shrink-0" alt="">';
                    echo '<div>';
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<h4><strong>' . $row["com_name"] . '</strong></h4>';
                    echo '<h4>' . $row["role"] . '</h4>';
                    echo '</div></div>';
                    echo '<p>';
                    echo '<i class="bi bi-quote quote-icon-left"></i>';
                    echo '<span>' . $row["testimonial"] . '</span>';
                    echo '<i class="bi bi-quote quote-icon-right"></i>';
                    echo '</p></div></div>';
                  }
                } else {
                  echo "";
                }

                $conn->close();
                ?>

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- End Testimonials Section -->


   
    <!-- Recent-posts Section - Home Page -->
    <section id="recent-posts" class="recent-posts">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Posts</h2>
        <p> Check out our recent blogs</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <?php
          // Include the database configuration and establish a database connection
          include('admin/includes/database.php');

          // Fetch up to three most recent blog posts
          $sql = "SELECT * FROM blog ORDER BY created_at DESC LIMIT 3";
          $result = $connect->query($sql);
          ?>

          <div class="row gy-4 posts-list">
            <?php while ($row = $result->fetch_assoc()): ?>
              <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <article>
                  <div class="post-img">
                      <a href="blog-details.php?blog_id=<?php echo $row['blog_id']; ?>">
                    <img src="<?php echo $row['cover_image']; ?>" alt="" class="img-fluid">
                  </div>

                  <h2 class="title">
                    <a href="blog-details.php?blog_id=<?php echo $row['blog_id']; ?>">
                      <?php echo $row['title']; ?>
                    </a>
                  </h2>

                  <div class="d-flex align-items-center">
                    <img src="<?php echo $row['author_image']; ?>" alt="" class="img-fluid post-author-img flex-shrink-0">
                    <div class="post-meta">
                      <p class="post-author">
                        <?php echo $row['author_name']; ?>
                      </p>
                      <p class="post-date">
                        <time datetime="<?php echo $row['publish_date']; ?>">
                          <?php echo date('M d, Y', strtotime($row['publish_date'])); ?>
                        </time>
                      </p>
                    </div>
                  </div>
                </article>
              </div><!-- End post list item -->
            <?php endwhile; ?>
          </div>


          <div class="car-buts">
            <a href="blog.php">
              <button type="submit" class="all-job"><i class="bi bi-arrow-right-circle-fill"></i>&nbsp;&nbsp; See all
                recent posts</button>
            </a>
          </div>

        </div><!--End recent posts list -->


      </div>


    </section>

    <!-- End Recent-posts Section -->

   

    <!-- Contact Section - Home Page -->
    <section id="contact" class="contact">

      <!--  Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Our team is ready to answer all your questions</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6" class="con-det">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p><strong>Q Plus Technical Service LLC</strong></p>
                  <a href="https://goo.gl/maps/baR7adV2LxGMmDGF8">
                    <p>Office:702-20, Mai Tower, Al Nahda-1,</p>
                    <p>Al Qusais, Dubai UAE</p>
                  </a>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6" style="margin-bottom: 0;">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p><strong>Mob:</strong><a href="tel:+971581174967"> +971 581174967</a></p>
                  <p ><a href="tel:+971585388100" style="margin-left: 39px;">+971 585388100</a></p>
                  <p><strong>Tel:</strong>&nbsp;&nbsp;&nbsp;<a href="tel:043931110"> +971 4 393 1110</a>
                </div><br>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p><a href="mailto:tse@qplus-ts.com">info@qplus-ts.com</a></p><br>
                  <p> <strong>For Technical Support</strong></p>
                  <p><a href="mailto:tse@qplus-ts.com">tse@qplus-ts.com</a></p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p><strong> Monday - Friday</strong></p>
                  <p>8:30AM - 05:30PM</p>
                  <p><strong>Saturday</strong></p>
                  <p>8:30AM - 2:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <!-- Contact Section -->

          <div class="col-lg-6">
            <form action="https://formsubmit.co/97912b3e6b2cb7f4275ebe40a96035a8 " method="post" class="contact_form"
              data-aos="fade-up*" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email*" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject*" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message*" required></textarea>
                  <input type="hidden" name="_cc" value="qplus.ts@gmail.com">
                  <input type="hidden" name="_autoresponse" value="We will get back to you as soon as possible">
                  <input type="hidden" name="_template" value="table">
                  <input type="hidden" name="_next" value="https://www.qplus-ts.com/index.php#contact">
                </div>

                <!-- <div class="col-md-12 text-center">
                    <div class="g-recaptcha" data-sitekey="6LfZHrwnAAAAAFTiF2rhtSeinYRE_8APTUQgQ5VG" data-callback="recaptchaCallback" ></div>
                    <div class="g-recaptcha-error" >Please complete the reCAPTCHA.</div>
                </div> -->


                <div class="col-md-12 text-center">
                  <div class="error-message"></div>
                  <button type="submit" name="button">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- End Contact Section -->

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
             <p ><a href="tel:+971585388100" style="margin-left: 39px;">+971 585388100</a></p>
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

  <!-- Scripts Reference -->

  <!-- Google Recaptcha JS File -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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