<?php
namespace StudentsCabin\Form\FormTypes;

class PartnershipForm
{
    public static function getPartnershipFormFields()
    {
        global $arGlobalDropdowns;

        $arPartnershipTypes = $arGlobalDropdowns['partnershipTypes'];
        $chPartnershipTypes = '';
        foreach ($arPartnershipTypes as $ptnTypeId => $ptnTypeLabel)
        {
            $chPartnershipTypes .= <<<EOQ
            <span class="pe-4"><input type="checkbox" name="partnershipTypesIds[]" id="{$ptnTypeId}" value="{$ptnTypeId}">
            <label>{$ptnTypeLabel}</label></span>
EOQ;
        }

        return <<<EOQ
        <form id="partnershipForm" onsubmit="return false;">
            <div class="row mt-3">
                <input type="hidden" id="action" name="action" value="addPartnership">
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Organization Name</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Organization Name" name="organizationName" id="organizationName">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Contact Person Name</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Contact Person Name" name="contactPersonName" id="contactPersonName">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Position / Title</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Position / Title" name="position" id="position">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Email Address</label> <span class="text-danger">*</span>
                        <input type="email" placeholder="Email Address" name="emailAddress" id="emailAddress">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Phone Number</label> <span class="text-danger">*</span>
                        <input type="tel" placeholder="Phone Number" name="phone" id="phone">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Organization Address</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Organization Address" name="organizationAddress" id="organizationAddress">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Website</label>
                        <input type="text" placeholder="Website" name="website" id="website">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Upload Proposal/Additional Documents (if any)</label>
                        <label for="proposalDoc" class="custom-file-upload">
                            Click to choose file
                        </label>
                        <input type="file" name="proposalDoc" id="proposalDoc">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <label>Type of Partnership Interested in</label> <span class="text-danger">*</span><br>
                        {$chPartnershipTypes}
                    </div>
                </div>
                <div class="col-xl-12" id="ptn_otherDescDiv" style="display:none;">
                    <div class="comment-form__input-box">
                        <label>Specify Other Types of Partnership Interested in</label> <span class="text-danger">*</span>
                        <textarea type="text" placeholder="Specify Type of Partnership Interested in" name="ptnOthersDesc" id="ptnOthersDesc"></textarea>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <label>Brief Description of your Organization</label> <span class="text-danger">*</span>
                        <textarea type="text" placeholder="Brief Description of your Organization" name="organizationDesc" id="organizationDesc"></textarea>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <label>How can you support StudentsCabin?</label> <span class="text-danger">*</span>
                        <textarea type="text" placeholder="How can you support StudentsCabin?" name="supportDesc" id="supportDesc"></textarea>
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
EOQ;
    }
}