<?php
namespace StudentsCabin\Form\FormTypes;

use StudentsCabin\Form\FormFields;
use StudentsCabin\States\NigerianStates;

class StudentRegistrationForm
{
    public static function getStudentRegisrationFormFields()
    {
        global $arGlobalDropdowns;

        $arNigerianStates = NigerianStates::getNigerianStates();
        $ddNigerianStates = FormFields::getFormFormattedOptions(
            $arNigerianStates
        );
        $arMeansOfAwareness = $arGlobalDropdowns['meansOfAwareness'];
        $ddMeansOfAwareness = FormFields::getFormFormattedOptions(
            $arMeansOfAwareness
        );
        $arYearsOfStudy = $arGlobalDropdowns['yearsOfStudy'];
        $ddYearsOfStudy = FormFields::getFormFormattedOptions(
            $arYearsOfStudy
        );

        return <<<EOQ
        <form id="studentRegistrationForm" onsubmit="return false;">
            <div class="row mt-3">
                <input type="hidden" id="action" name="action" value="registerStudent">
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>First Name</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="First Name" name="firstName" id="firstName">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Last Name</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Last Name" name="lastName" id="lastName">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Date of Birth</label> <span class="text-danger">*</span>
                        <input type="date" placeholder="Date of Birth" name="dateOfBirth" id="dateOfBirth">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Email Address</label> <span class="text-danger">*</span>
                        <span style="font-size:14px;">(This will be your community ID)</span>
                        <input type="email" placeholder="Email Address" name="emailAddress" id="emailAddress">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>WhatsApp Phone Number</label> <span class="text-danger">*</span>
                        <input type="tel" placeholder="WhatsApp Phone Number" name="whatsappPhone" id="whatsappPhone">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>State of Origin</label> <span class="text-danger">*</span>
                        <select placeholder="State of Origin" name="stateOfOrigin" id="stateOfOrigin">
                            {$ddNigerianStates}
                        </select>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Name of School</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Name of School" name="nameOfSchool" id="nameOfSchool">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Course of Study</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Course of Study" name="courseOfStudy" id="courseOfStudy">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <label>Why do you want to join StudentsCabin?</label> <span class="text-danger">*</span>
                        <textarea type="text" placeholder="Why do you want to join StudentsCabin?" name="joinReason" id="joinReason"></textarea>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Year of Study</label> <span class="text-danger">*</span>
                        <select placeholder="Year of Study" name="yearOfStudyId" id="yearOfStudyId">
                            {$ddYearsOfStudy}
                        </select>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>How did you hear about us?</label> <span class="text-danger">*</span>
                        <select placeholder="How did you hear about us?" name="meansOfAwarenessId" id="meansOfAwarenessId">
                            {$ddMeansOfAwareness}
                        </select>
                    </div>
                </div>
                <div class="col-xl-12" id="meansOfAwarenessOthersDiv" style="display:none;">
                    <div class="comment-form__input-box">
                        <label>Specify how you heard about us</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Specify how you heard about us" name="meansOfAwarenessOthers" id="meansOfAwarenessOthers">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Referral Email (if any)</label>
                        <input type="text" placeholder="Referral Email (if any)" name="referralEmail" id="referralEmail">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Upload Student ID/Proof of Admission</label> <span class="text-danger">*</span>
                        <label for="studentId" class="custom-file-upload">
                            Click to choose file
                        </label>
                        <input type="file" name="studentId" id="studentId">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <input type="checkbox" name="termsAndConditions" id="termsAndConditions">
                        I agree to the terms and conditions. <a data-bs-toggle="modal" data-bs-target="#termsAndConditionsModal" class="linkPrimary">Click here to read</a>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="googleRecaptcha" id="participateFormRecaptcha"></div>
                </div>

                <div class="comment-form__btn-box pt-3">
                    <button type="submit" class="thm-btn comment-form__btn" id="btnSubmit">Submit</button>
                </div>
            </div>
        </form>

        <div class="modal fade" id="termsAndConditionsModal" tabindex="-1" aria-labelledby="termsAndConditionsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsAndConditionsModalLabel">Terms and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        By joining StudentsCabin, you agree to the following terms:
                        <ul>
                            <li><span class="fw-bold">Eligibility:</span> Membership is open to students in Nigeria currently enrolled in an educational institution</li>
                            <li><span class="fw-bold">Registration:</span> Provide accurate information during registration and maintain the confidentiality of your account</li>
                            <li><span class="fw-bold">Conduct:</span> Respect and inclusivity are core values. Discrimination, harassment, or abusive behavior will not be tolerated</li>
                            <li><span class="fw-bold">Use of Services:</span> Use our resources, including financial assistance, scholarships, and data giveaways, solely for their intended purposes</li>
                            <li><span class="fw-bold">Referral Program:</span> Adhere to the guidelines. Misuse, including creating fake accounts, will result in disqualification and possible termination</li>
                            <li><span class="fw-bold">Privacy:</span> Your information is collected and highly secured with us</li>
                            <li><span class="fw-bold">Termination:</span> StudentsCabin reserves the right to suspend or terminate membership for violations. You may terminate your membership at any time by contacting us</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
EOQ;
    }
}