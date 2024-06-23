<?php
require_once 'inc/utils.php';
$pageTitle = 'Contact';
require_once 'inc/head.php';
?>

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/banner3.jpg)">2
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

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="contact-page__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">Contact us</span>
                        <h2 class="section-title__title">Get in Touch With us</h2>
                    </div>
                    <div class="contact-page__social">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="contact-page__right">
                    <form class="comment-one__form" id="contactForm" onsubmit="return false;">
                        <div class="row">
                            <input type="hidden" name="action" id="action" value="sendContactMessage">
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label>Full Name</label> <span class="text-danger">*</span>
                                    <input type="text" placeholder="Full Name" name="fullName" id="fullName">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label>Email Address</label> <span class="text-danger">*</span>
                                    <input type="email" placeholder="Email Address" name="email" id="email">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label>Phone Number</label> <span class="text-danger">*</span>
                                    <input type="text" placeholder="Phone Number" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="comment-form__input-box">
                                    <label>Subject</label> <span class="text-danger">*</span>
                                    <input type="text" placeholder="Subject" name="subject" id="subject">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="comment-form__input-box text-message-box">
                                    <label>Message</label> <span class="text-danger">*</span>
                                    <textarea name="message" id="message" placeholder="Leave us a message"></textarea>
                                </div>
                                <div class="pt-4">
                                    <div class="googleRecaptcha" id="contactFormRecaptcha"></div>
                                </div>
                                <div class="comment-form__btn-box pt-3">
                                    <button type="submit" class="thm-btn comment-form__btn" id="btnSubmit">Send message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Page End-->

<!--Contact Info Start-->
<section class="contact-info">
    <div class="container mb-4">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <!--Contact Info Single-->
                <div class="contact-info__single contact-info__single-1" style="height:75%;">
                    <h4 class="contact-info__title">Address</h4>
                    <p class="contact-info__text"><?php echo SITE_ADDRESS; ?></p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <!--Contact Info Single-->
                <div class="contact-info__single contact-info__single-2" style="height:75%;">
                    <h4 class="contact-info__title">Contact</h4>
                    <p class="contact-info__email-phone">
                        <a href="mailto:<?php echo SITE_EMAIL; ?>"
                            class="contact-info__email"><?php echo SITE_EMAIL; ?></a>
                        <a href="tel:<?php echo SITE_PHONE; ?>" class="contact-info__phone"><?php echo SITE_PHONE; ?></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Info End-->

<?php
$arAdditionalJs[] = <<<EOQ
var contactFormWidgetId = 0;
EOQ;

$arAdditionalJsOnLoad[] = <<<EOQ
setTimeout(function() {
    contactFormWidgetId = grecaptcha.render(
        'contactFormRecaptcha'
        , {"sitekey": gSiteKey}
    );
}, 1000);

$("#contactForm #btnSubmit").on('click', function(){
    var formId = '#contactForm';
    var fullName = $(formId+' #fullName').val();
    var email = $(formId+' #email').val();
    var phone = $(formId+' #phone').val();
    var subject = $(formId+' #subject').val();
    var message = $(formId+' #message').val();

    if (fullName.length < 6 || fullName.length > 200 || email.length < 13 || email.length > 200 || phone.length < 7 || phone.length > 15 || subject.length < 3 || subject.length > 200 || message.length < 10)
    {
        throwError('Please fill all required fields with valid details.');
    }
    else
    {
        var formId = '#contactForm';
        var form = $("#contactForm");
        $.ajax({
            url: 'inc/actions',
            type: 'POST',
            dataType: 'json',
            data: form.serialize(),
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
                    throwSuccess('Message sent successfully!');
                    form[0].reset();
                    grecaptcha.reset(contactFormWidgetId);
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
});
EOQ;
require_once 'inc/foot.php';
?>