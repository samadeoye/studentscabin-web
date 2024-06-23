<?php
require_once 'inc/utils.php';
$pageTitle = 'Partner With Us';
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

<!--Partnership Page Start-->
<section class="about-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="about-page__right">
                    <div class="section-title text-left">
                        <h2>Partner with us to help students</h2>
                    </div>
                    <p class="about-page__text">At StudentsCabin, we believe in the power of collaboration and partnership to maximize our
                    impact and reach. We welcome opportunities to collaborate with like-minded organizations,
                    businesses, educational institutions, and individuals who share our commitment to empowering
                    and supporting students in Nigeria. Whether you're interested in sponsoring a program, offering
                    internship opportunities, providing resources, or collaborating on community initiatives, we invite you to partner with us in making a difference in the lives of students. Together, we can create
                    meaningful and sustainable change that transforms futures and strengthens communities.
                    Partner with StudentsCabin today and join us on our mission to empower students and build a
                    brighter future for all.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Partnership Page End-->

<!--CTA One Start-->
<section class="cta-one">
    <div class="cta-one-shape" style="background-image: url(assets/images/shapes/cta-one-shape.png);"></div>
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-12">
                <div class="pb-3">
                    <h2 class="text-white">Ready to become a partner?</h2>
                </div>
                <div>
                    <a href="participate?id=partnership" class="thm-btn cta-one__btn">start now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--CTA One End-->

<?php
require_once 'inc/foot.php';
?>