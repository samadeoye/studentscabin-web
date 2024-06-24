<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <base href="<?php echo DEF_ROOT_PATH; ?>/">
  <title><?php echo SITE_NAME; ?> - <?php echo $pageTitle; ?></title>

  <!-- favicons Icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/favicon.png.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon.png" />
  <meta name="description" content="<?php echo SITE_DESC; ?>" />

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
  <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="assets/vendors/jarallax/jarallax.css" />
  <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
  <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
  <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
  <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
  <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
  <link rel="stylesheet" href="assets/vendors/pifoxen-icons/style.css">
  <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
  <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css" />
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
  <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
  <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
  <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
  <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />
  <!-- template styles -->
  <link rel="stylesheet" href="assets/css/pifoxen.css" />
  <link rel="stylesheet" href="assets/css/pifoxen-responsive.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <?php
  if (count($arAdditionalCSS) > 0)
  {
    echo implode(PHP_EOL, $arAdditionalCSS);
  }
  ?>
</head>

<body>
  <div class="preloader">
    <img class="preloader__image" width="60" src="assets/images/loader.png" alt="" />
  </div>
  <!-- /.preloader -->

  <div class="page-wrapper">
    <header class="main-header clearfix">
      <div class="main-header__top">
        <div class="main-header__top-left">
          <p class="main-header__top-text"><?php echo WELCOME_TEXT; ?></p>
          <div class="main-header__top-social">
            <a href="<?php echo SITE_INSTAGRAM;?>"><i class="fab fa-instagram"></i></a>
            <a href="<?php echo SITE_FACEBOOK;?>"><i class="fab fa-facebook"></i></a>
            <a href="<?php echo SITE_LINKEDIN;?>"><i class="fab fa-linkedin"></i></a>
            <a href="<?php echo SITE_TWITTER;?>"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
        <div class="main-header__top-right">
          <ul class="list-unstyled main-header__top-address">
            <li>
              <div class="icon">
                <span class="icon-email"></span>
              </div>
              <div class="text">
                <p><a href="mailto:<?php echo SITE_EMAIL; ?>"><?php echo SITE_EMAIL; ?></a></p>
              </div>
            </li>
          </ul>
        </div>
      </div>
        <nav class="main-menu clearfix">
            <div class="main-menu-wrapper clearfix">
                <div class="main-menu-wrapper__left">
                    <div class="main-menu-wrapper__logo">
                      <a href="<?php echo DEF_ROOT_PATH; ?>"><img style="height:70px;" src="assets/images/resources/logoBrand.png" alt=""></a>
                    </div>
                    <div class="main-menu-wrapper__call">
                      <div class="main-menu-wrapper__call-icon">
                        <span class="icon-call"></span>
                      </div>
                      <div class="main-menu-wrapper__call-number">
                        <p>Call Anytime</p>
                        <h5><a href="tel:<?php echo SITE_PHONE; ?>"><?php echo SITE_PHONE; ?></a></h5>
                      </div>
                    </div>
                </div>
                <div class="main-menu-wrapper__main-menu">
                  <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                  <ul class="main-menu__list">
                    <li><a href="<?php echo DEF_ROOT_PATH; ?>">Home</a></li>
                    <li><a href="about">About Us</a></li>
                    <li><a href="services">What We Do</a></li>
                    <li><a href="team">Our Team</a></li>
                    <li class="dropdown">
                      <a href="javascript:;">Participate</a>
                      <ul>
                        <li><a href="participate?id=studentRegistration">Student Community</a></li>
                        <li><a href="partnership">Partner With Us</a></li>
                        <li><a href="donation">Donate / Support Us</a></li>
                      </ul>
                    </li>
                    <!-- <li><a href="partnership">Partnership</a></li>
                    <li><a href="donation">Donation</a></li> -->
                    <li><a href="contact">Contact</a></li>
                    <li><a href="advertise">Advertise</a></li>
                  </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="stricky-header stricked-menu main-menu">
      <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->