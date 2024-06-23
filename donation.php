<?php
require_once 'inc/utils.php';
$pageTitle = 'Donate / Support Us';
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

<!--Donation Page Start-->
<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="about-page__right">
                    <div class="section-title text-left">
                        <h2>Support us to help students</h2>
                    </div>
                    <p class="about-page__text">Join us on our mission to empower and support students in Nigeria! Your support makes a
                    difference! By donating to StudentsCabin, you're investing in the future of Nigeria by supporting
                    the education and empowerment of its students. Your contributions help us provide vital
                    resources, programs, and support services to students in need.<br>
                    Together, let's empower students, build futures, and create positive change that lasts a lifetime.
                    Donate today and make a difference in the lives of students in Nigeria!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Donation Page End-->

<!--CTA One Start-->
<section class="cta-one">
    <div class="cta-one-shape" style="background-image: url(assets/images/shapes/cta-one-shape.png);"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-12">
                <div class="pb-3">
                    <h2 class="text-white">Ready to support / donate to our community?</h2>
                </div>
                <div>
                    <a href="participate?id=donation" class="thm-btn cta-one__btn">start now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CTA One End-->

<?php
require_once 'inc/foot.php';
?>