<?php
require_once 'inc/utils.php';
$pageTitle = 'Advertise With Us';
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

<!--Advertisement Page Start-->
<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-page__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-page__img">
                        <img src="assets/images/resources/advertiseImg.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-page__right">
                    <div class="section-title text-left">
                        <h2>Expand Your Reach with StudentsCabin!</h2>
                    </div>
                    <p class="about-page__text">Are you looking to connect with a vibrant, engaged, and fast-growing student community in
                    Nigeria? Look no further! StudentsCabin offers unique advertising opportunities that can help
                    your brand reach thousands of students who are eager to learn, grow, and succeed.</p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xl-12">
                <div class="py-4">
                    <h3>Why advertise with us?</h3>
                </div>
                <ul class="about-one__points list-unstyled">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Targeted Audience</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">Reach students who are actively engaged in their academic, personal, and professional development.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled pt-3">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>High Engagement</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">Our community is dynamic and interactive, ensuring your message
                        gets the attention it deserves.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled pt-3">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Diverse Advertising Options</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">From banner ads and social media posts to email
                        newsletters and event sponsorships, we offer a variety of ways to showcase your brand.</p>
                    </li>
                </ul>

                <ul class="about-one__points list-unstyled pt-3">
                    <li>
                        <div class="icon">
                            <span class="icon-confirmation"></span>
                        </div>
                        <div class="text">
                            <p>Supportive Environment</p>
                        </div>
                    </li>
                </ul>
                <ul class="about-one__points-content list-unstyled">
                    <li>
                        <p class="about-one__points-text">Align your brand with our mission of empowerment and
                        support, making a positive impact on the next generation.</p>
                    </li>
                </ul>

                <p class="mt-5">Join us and make a difference while growing your brand's presence. We look forward to
                partnering with you!</p>

            </div>
        </div>
    </div>
</section>
<!--Advertisement Page End-->

<!--CTA Start-->
<section class="cta-one cta-one_style2">
    <div class="cta-one-shape" style="background-image: url(assets/images/shapes/cta-one-shape.png);"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-12">
                <div class="pb-3">
                    <h2 class="text-white">Ready to get started?</h2>
                </div>
                <div>
                    <p class="text-white">Kindly reach out to us on <a class="linkBase" href="tel:<?php echo SITE_PHONE;?>"><b><?php echo SITE_PHONE;?></b></a> or <a class="linkBase" href="mailto:<?php echo SITE_EMAIL;?>"><b><?php echo SITE_EMAIL;?></b></a> to discuss how we can help your brand connect with our community. Let's work together to create meaningful and impactful advertising campaigns that resonate with students across Nigeria.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CTA End-->

<?php
require_once 'inc/foot.php';
?>