<?php
require_once 'inc/utils.php';
$pageTitle = 'About';
require_once 'inc/head.php';
?>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/banner3.jpg)">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2><?php echo $pageTitle; ?></h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="<?php echo DEF_ROOT_PATH; ?>">Home</a></li>
                <li><span>/</span></li>
                <li class="active"><?php echo $pageTitle; ?></li>
            </ul>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Page Start-->
<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-page__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-page__img">
                        <img src="assets/images/resources/aboutImg.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-page__right">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">get to know us</span>
                        <h2>We believe in the power of education to transform lives</h2>
                    </div>
                    <p class="about-page__text">StudentsCabin is a non-profit organization dedicated to empowering and supporting students in Nigeria. Our name reflects our core values of shelter, unity, support, and hope. Just as a cabin
                    provides shelter and support in the wilderness, StudentsCabin aims to be a sanctuary of support
                    and a beacon of hope for students navigating the challenges of education and life.<br>
                    Click the button below to see what we do.
                    </p>
                    <a href="services" class="thm-btn hoverBase">Discover now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Page End-->

<?php
require_once 'inc/foot.php';
?>