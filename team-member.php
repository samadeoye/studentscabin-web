<?php
require_once 'inc/utils.php';
use StudentsCabin\Team\Team;

$pageTitle = 'Our Team';

$id = isset($_GET['id']) ? trim($_GET['id']) : '';
$arMember = [];

$redirect = true;
if ($id != '')
{
    if (strlen($id) == 36)
    {
        $arMember = Team::getTeamMember(
            $id, ['name', 'role', 'description']
        );
        if ($arMember)
        {
            $redirect = false;
        }
    }
}
if ($redirect)
{
    header('location: '.DEF_ROOT_PATH.'/team');
}

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

<!--Team Members Page Start-->
<section class="volunteers-one my-5">
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline"><?php echo $arMember['name'];?></span>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="about-page__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                    <div class="about-page__img">
                        <img class="teamMemberImg" src="assets/images/team/volunteers-1-1.jpg" alt="<?php echo $arMember['name'];?>">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-page__right">
                    <h4 class="volunteers-one__name"><?php echo $arMember['name'];?></h4>
                    <p class="volunteers-one__title fw-bold"><?php echo $arMember['role'];?></p>
                    <p class="about-page__text pt-3"><?php echo $arMember['description'];?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team Members Page End-->

<?php
require_once 'inc/foot.php';
?>