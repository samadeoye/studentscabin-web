<?php
require_once 'inc/utils.php';
$pageTitle = 'Submissions';
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

<section>
    <div class="container">
        <div class="section-title text-center mt-5">
            <span class="section-title__tagline">Select the module to export</span>
        </div>
        <div class="row m-4">
            <form id="submissionsExportForm" method="POST" action="inc/actions" onsubmit="return false;">
                <input type="hidden" name="action" value="exportSubmissions">
                <div class="col-xl-6 mx-auto">
                    <div class="comment-form__input-box">
                        <select class="form-control" name="moduleId" id="moduleId">
                            <option value="">Select module</option>
                            <option value="students">Students</option>
                            <option value="partnerships">Partnerships</option>
                            <option value="donations">Donations</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 mx-auto">
                    <div class="comment-form__input-box">
                        <input type="password" class="form-control" placeholder="Admin Pass Code" name="adminPassCode" id="adminPassCode">
                    </div>
                    <button type="submit" class="thm-btn comment-form__btn" id="btnSubmit">Export</button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
$arAdditionalJsOnLoad[] = <<<EOQ
$("#submissionsExportForm #btnSubmit").on('click', function()
{
    enableDisableBtn(formId+' #btnSubmit', 0);

    var formId = '#submissionsExportForm';
    var moduleId = $(formId+' #moduleId').val();
    var adminPassCode = $(formId+' #adminPassCode').val();

    if (moduleId.length == 0)
    {
        throwError('Please select a module to export!');
    }
    else if (adminPassCode.length < 5)
    {
        throwError('Please enter a valid admin pass code!');
    }
    else
    {
        var form = $("#submissionsExportForm");

        form.attr('onsubmit', '');
        form.submit();
        enableDisableBtn(formId+' #btnSubmit', 1);
        form.attr('onsubmit', 'return false;');
        form[0].reset();
        return false;
    }
});
EOQ;
require_once 'inc/foot.php';
?>