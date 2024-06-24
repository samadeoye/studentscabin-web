<?php
require_once 'inc/utils.php';
$pageTitle = 'Our Team';
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

<!--Team Start-->
<section class="volunteers-one">
    <div class="container">
        <div class="section-title text-center mt-5">
            <span class="section-title__tagline">Meet the dedicated individuals who make up the StudentsCabin team</span>
        </div>
        <div class="row">
            <?php
                echo StudentsCabin\Team\TeamDisplay::getTeamsDisplay();
            ?>
        </div>
    </div>
</section>
<!--Team End-->

<?php
require_once 'inc/foot.php';
?>