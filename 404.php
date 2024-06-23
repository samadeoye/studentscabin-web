<?php
require_once 'inc/utils.php';
$pageTitle = '404';
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

<!--Error Page Start-->
<section class="error-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="error-page__inner">
                    <h2 class="error-page__title">404</h2>
                    <h3 class="error-page__tagline">Sorry we can't find that page!
                    </h3>
                    <p class="error-page__text">The page you are looking for does not exist.</p>
                    <a href="<?php echo DEF_ROOT_PATH; ?>" class="thm-btn error-page__btn mt-4">back to home</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Error Page End-->

<?php
require_once 'inc/foot.php';
?>