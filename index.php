<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Zambales Coastal Cleanup Trash Data">
  <meta name="author" content="John Dave Espinosa">
  <link rel="icon" type="resources/admindesign/image/png" sizes="16x16" href="resources/images/GADDSEAPLOGOV2.png">
  <title>GADDSEAP</title>

  <link rel="stylesheet" href="resources/bootstrap-4.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="resources/Font-Awesome-v5/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="resources/customcss/navbar.css">
  <link rel="stylesheet" href="resources/customcss/carouselcss.css">
  <script src="resources/dist/js/jquery-3.3.1.min.js"></script>
  <script src="resources/dist/js/bootstrap.min.js"></script>
  <script src="resources/dist/js/popper.min.js"></script>

  <style>
  body, html {
    height: 100%;

  }
  body{
    background-color: #F7F7F7;
  }
  /* Tablet and bigger */
  @media ( min-width: 768px ) {
    .grid-divider {
      position: relative;
      padding: 0;
    }
    .grid-divider>[class*='col-'] {
      position: static;
    }
    .grid-divider>[class*='col-']:nth-child(n+2):before {
      content: "";
      border-left: 1px solid #DDD;
      position: absolute;
      top: 0;
      bottom: 0;
    }
    .col-padding {
      padding: 0 15px;
    }
    .col-padding h3{
      text-align: center;
      font-weight: 650;
    }
  }
  @media (max-width: 420px ) {
    .col-padding h3{
      text-align: center;
      font-weight: 650;
    }
  }
  p{
    text-align: center;
    font-weight: 350;
  }

  </style>
</head>
<body>
  <?php include('navbar.php');?>

  <div class="viewportt"><!-- for Responsive Viewport (Insert Carousel or other item for "cover" effect)  -->
    <!-- Carousel container -->
    <div id="kni-carousel" class="carousel fade-carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#kni-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#kni-carousel" data-slide-to="1"></li>
        <li data-target="#kni-carousel" data-slide-to="2"></li>
      </ol>

      <!-- Content -->
      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-caption">
            <hgroup>
              <h1>GOV. ATTY. AMOR D. DELOSO SCHOLARSHIP AND EDUCATIONAL ASSISTANCE PROGRAM</h1>
              <h3>Catch Phrase</h3>
              <!-- <a type="button" class="btn btn-lg btn-car" role="button" href="reservation/">BOOK NOW</a> -->
            </hgroup>
          </div>
          <div class="overlay"></div>
          <div class="slide-1"></div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
          <div class="carousel-caption">
            <hgroup>
              <h1>Some advertising</h1>
              <h3>Statement here</h3>
              <!-- <a type="button" class="btn btn-lg btn-car" role="button" href="reservation/">BOOK NOW</a> -->
            </hgroup>
          </div>
          <div class="overlay"></div>
          <div class="slide-2"></div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
          <div class="carousel-caption">
            <hgroup>
              <h1>Some advertising</h1>
              <h3>Statement here</h3>
              <!-- <a type="button" class="btn btn-lg btn-car" role="button" href="reservation/">BOOK NOW</a> -->
            </hgroup>
          </div>
          <div class="overlay"></div>
          <div class="slide-3"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- END OF CAROUSEL-->

  <!-- start of mission vision -->
  <div class="container-fluid" style="margin: 0; padding: 0;  background-color: #f4f4f4; padding-top: 8vh;">
    <div class="row grid-divider">
      <div class="col-md-6">
        <div class="col-padding">
          <h3>MISSION</h3>
          <p>Zambales with vast productive development opportunity lands, is envisioned to be an Agri-Based technologically industrialized province through the establishment of globally competitive economic zones with a peaceful, a holistically healthy, and empowered citizenry in a politically stable environment.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="col-padding">
          <h3>VISION</h3>
          <p>Promote the socio-cultural and economic status of the people by providing employment, livelihood and other income generating activities and provision of primary social services and infrastructive facilities for the upliftment of life and standard of living.</p>
        </div>
      </div>

    </div>
  </div>
  <!-- end of mission vision -->
  <!-- start footer -->
  <?php include('footer.php'); ?>
</body>
