<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DEVI BALIKA VIDYALAYA</title>
  <meta name="description" content="Established in January 15th 1953, Devi Balika Vidyalaya stands as a premier national school for girls in Colombo, Sri Lanka. With a steadfast commitment to academic excellence and holistic development, we cultivate a nurturing environment that empowers young women to become compassionate leaders and innovators in society.">
  <meta name="keywords" content="DEVI BALIKA VIDYALAYA, Colombo, Sri Lanka, National School, devi, balika, devi balika">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="starter-page-page">

  <!-- import header -->
   <?php include 'header.php'; ?>
    <!-- End Header -->

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>News & Announcements</h1>
              <p class="mb-0">
                Welcome to the Devi Balika Vidyalaya News & Announcements page. Here, you will find the latest updates, events, and important information related to our school community. Stay informed about our academic achievements, extracurricular activities, and upcoming events that shape the vibrant life of our students.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">News</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
        <?php 
          // select all news from the database
          include 'connection.php';
          $get_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
          $query = "SELECT * FROM tbl_news WHERE expire_date >= CURDATE() AND id = $get_id ORDER BY expire_date DESC";
          $result = mysqli_query($conn, $query);

            $title = '';
            $description = '';
            $image = '';
            $id = '';

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $title = $row['title'];
              $description = $row['description'];
              $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
              $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
              $image = $row['image_link'];
              $id = $row['id'];
            }
        }

        ?>

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2><?php echo $title; ?></h2> 
      </div><!-- End Section Title -->

      <div class="container">

         <div class="row gy-4  features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex " data-aos="zoom-out" data-aos-delay="100">
            <img src="<?php echo $image; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="100">
            
            <p>
              <?php echo $description; ?>
            </p>
          </div>
        </div> 
      </div>
    </section><!-- /Starter Section Section -->

  </main>

  <!-- include footer -->
    <?php include 'footer.php'; ?>
    <!-- End Footer -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>