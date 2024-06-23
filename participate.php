<?php
require_once 'inc/utils.php';
use StudentsCabin\Form\FormFields;

$formId = isset($_GET['id']) ? trim($_GET['id']) : '';
$formFields = '';

if ($formId != '')
{
    $formFields = FormFields::getFormFields($formId);
}
if ($formFields == '')
{
    header('location: '.DEF_ROOT_PATH.'/');
}

$arFormInfo = FormFields::getFormInfoById($formId);
$pageTitle = $arFormInfo['pageTitle'];
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

<!--Participate Page Start-->
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="text-center"><?php echo $arFormInfo['pageHeader'];?></h2>
            </div>
        </div>
        <?php echo $formFields; ?>

        <p class="text-dark py-5">
        Kindly reach out to us on <a class="linkPrimary" href="tel:<?php echo SITE_PHONE;?>"><b><?php echo SITE_PHONE;?></b></a> or <a class="linkPrimary" href="mailto:<?php echo SITE_EMAIL;?>"><b><?php echo SITE_EMAIL;?></b></a> for further enquiries.
        </p>
    </div>
</section>
<!--Participate Page End-->

<?php
$arAdditionalJs[] = <<<EOQ
var participateFormWidgetId = 0;
EOQ;

$arAdditionalJsOnLoad[] = <<<EOQ
setTimeout(function() {
    participateFormWidgetId = grecaptcha.render(
        'participateFormRecaptcha'
        , {"sitekey": gSiteKey}
    );
}, 1000);

$("#studentId").change(function(){
    var i = $(this).prev('label').clone();
    var objFile = $('#studentId')[0].files[0];
    console.log(objFile);
    if (objFile !== undefined)
    {
        var file = objFile.name;
        $(this).prev('label').text(file);
    }
});

function invokeCommonAjaxCall(formName, formData)
{
    var formId = '#'+formName;
    var form = $("#"+formName);
    $.ajax({
        url: 'inc/actions',
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function() {
            enableDisableBtn(formId+' #btnSubmit', 0);
        },
        complete: function() {
            enableDisableBtn(formId+' #btnSubmit', 1);
        },
        success: function(data)
        {
            if (data.status == true)
            {
                throwSuccess('Submitted successfully!');
                form[0].reset();
                grecaptcha.reset(participateFormWidgetId);
            }
            else
            {
                if (data.info !== undefined)
                {
                    throwInfo(data.msg);
                }
                else
                {
                    throwError(data.msg);
                }
            }
        }
    });
}
EOQ;

if ($formId == 'partnership')
{
    $arAdditionalJsOnLoad[] = <<<EOQ
$("#proposalDoc").change(function(){
    var i = $(this).prev('label').clone();
    var objFile = $('#proposalDoc')[0].files[0];
    //console.log(objFile);
    if (objFile !== undefined)
    {
        var file = objFile.name;
        $(this).prev('label').text(file);
    }
});

$("#partnershipForm #others").on('change', function(){
    var ptn_othersChecked = $("#partnershipForm #others").is(":checked");
    if (ptn_othersChecked)
    {
        $("#ptn_otherDescDiv").show();
    }
    else
    {
        $("#ptn_otherDescDiv").hide();
    }
});

$("#partnershipForm #btnSubmit").on('click', function()
{
    var formId = '#partnershipForm';
    var organizationName = $(formId+' #organizationName').val();
    var contactPersonName = $(formId+' #contactPersonName').val();
    var position = $(formId+' #position').val();
    var emailAddress = $(formId+' #emailAddress').val();
    var phone = $(formId+' #phone').val();
    var organizationAddress = $(formId+' #organizationAddress').val();
    var website = $(formId+' #website').val();
    var organizationDesc = $(formId+' #organizationDesc').val();
    var supportDesc = $(formId+' #supportDesc').val();

    var arPartnershipTypes = ['financialSupport', 'coBrandedMarketing', 'internshipsJobPlacements', 'others'];
    var partnershipTypesChecked = false;
    for (ptnType of arPartnershipTypes)
    {
        partnershipTypesChecked = $(formId+' #'+ptnType).is(':checked');
        if (partnershipTypesChecked)
        {
            var breakLoop = true;
            if (ptnType == 'others')
            {
                var ptnOthersDescValue = $.trim($(formId+' #ptnOthersDesc').val());
                if (ptnOthersDescValue.length == 0)
                {
                    partnershipTypesChecked = false;
                    breakLoop = false;
                }
            }
            if (breakLoop)
            {
                break;
            }
        }
    }

    if (!partnershipTypesChecked)
    {
        throwError('Please select at least one partnership type');
    }
    else if (organizationName.length < 3 || organizationName.length > 250 || contactPersonName.length < 3 || contactPersonName.length > 200 || position.length < 3 || position.length > 50 || emailAddress.length < 13 || emailAddress.length > 200 || phone.length < 6 || phone.length > 15 || organizationAddress.length < 3 || organizationDesc.length < 3 || supportDesc.length < 3)
    {
        throwError('Please fill all required fields with valid details.');
    }
    else
    {
        var formData = new FormData(this.form);
        invokeCommonAjaxCall('partnershipForm', formData);
    }
});

EOQ;
}
else if ($formId == 'studentRegistration')
{
    $arAdditionalJsOnLoad[] = <<<EOQ
$("#studentId").change(function(){
    var i = $(this).prev('label').clone();
    var objFile = $('#studentId')[0].files[0];
    //console.log(objFile);
    if (objFile !== undefined)
    {
        var file = objFile.name;
        $(this).prev('label').text(file);
    }
});

$("#studentRegistrationForm #meansOfAwareness").on('change', function(){
    if ($("#studentRegistrationForm #meansOfAwareness").val() == 'others')
    {
        $("#meansOfAwarenessOthersDiv").show();
    }
    else
    {
        $("#meansOfAwarenessOthersDiv").hide();
    }
});

$("#studentRegistrationForm #btnSubmit").on('click', function()
{
    var formId = '#studentRegistrationForm';
    var firstName = $(formId+' #firstName').val();
    var lastName = $(formId+' #lastName').val();
    var dateOfBirth = $(formId+' #dateOfBirth').val();
    var emailAddress = $(formId+' #emailAddress').val();
    var whatsappPhone = $(formId+' #whatsappPhone').val();
    var stateOfOrigin = $(formId+' #stateOfOrigin').val();
    var nameOfSchool = $(formId+' #nameOfSchool').val();
    var courseOfStudy = $(formId+' #courseOfStudy').val();
    var joinReason = $(formId+' #joinReason').val();
    var yearOfStudyId = $(formId+' #yearOfStudyId').val();
    var meansOfAwarenessId = $(formId+' #meansOfAwarenessId').val();
    var meansOfAwarenessOthers = $(formId+' #meansOfAwarenessOthers').val();
    var referralEmail = $(formId+' #referralEmail').val();
    var termsConditionsChecked = $(formId+' #termsAndConditions').is(':checked');

    if (!termsConditionsChecked)
    {
        throwError('Please read and check the Terms and Conditions');
    }
    else if (firstName.length < 3 || firstName.length > 50 || lastName.length < 3 || lastName.length > 50 || dateOfBirth.length != 10 || emailAddress.length < 13 || emailAddress.length > 200 || whatsappPhone.length < 6 || whatsappPhone.length > 15 || stateOfOrigin.length < 3 || nameOfSchool.length < 3 || nameOfSchool.length > 200 || courseOfStudy.length < 3 || courseOfStudy.length > 100 || joinReason.length < 3 || yearOfStudyId.length < 1 || meansOfAwarenessId.length < 3)
    {
        throwError('Please fill all required fields with valid details.');
    }
    else
    {
        var formData = new FormData(this.form);
        invokeCommonAjaxCall('studentRegistrationForm', formData);
    }
});

EOQ;
}
else 
if ($formId == 'donation')
{
    $arAdditionalJsOnLoad[] = <<<EOQ
$("#receiptOfPayment").change(function(){
    var i = $(this).prev('label').clone();
    var objFile = $('#receiptOfPayment')[0].files[0];
    //console.log(objFile);
    if (objFile !== undefined)
    {
        var file = objFile.name;
        $(this).prev('label').text(file);
    }
});

$("#donationForm #btnSubmit").on('click', function()
{
    var formId = '#donationForm';
    var fullName = $(formId+' #fullName').val();
    var emailAddress = $(formId+' #emailAddress').val();
    var phone = $(formId+' #phone').val();
    var donationAmount = $(formId+' #donationAmount').val();
    var donationFrequencyId = $(formId+' #donationFrequencyId').val();

    if (fullName.length < 3 || fullName.length > 250 || emailAddress.length < 13 || emailAddress.length > 200 || phone.length < 6 || phone.length > 15 || donationAmount.length == 0 || donationFrequencyId.length < 3)
    {
        throwError('Please fill all required fields with valid details.');
    }
    else
    {
        var formData = new FormData(this.form);
        invokeCommonAjaxCall('donationForm', formData);
    }
});

EOQ;
}
require_once 'inc/foot.php';
?>