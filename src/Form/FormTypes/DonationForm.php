<?php
namespace StudentsCabin\Form\FormTypes;

use StudentsCabin\Form\FormFields;

class DonationForm
{
    public static function getDonationFormFields()
    {
        global $arGlobalDropdowns;

        $arYesNo = $arGlobalDropdowns['yesNo'];
        $ddYesNo = FormFields::getFormFormattedOptions(
            $arYesNo
        );
        $arDonationFrequency = $arGlobalDropdowns['donationFrequency'];
        $ddDonationFrequency = FormFields::getFormFormattedOptions(
            $arDonationFrequency
        );

        $paystackPaymentLink = PAYSTACK_PAYMENT_LINK;

        return <<<EOQ
        <form id="donationForm" onsubmit="return false;">
            <div class="row mt-3">
                <div class="mb-5">
                    Kindly click the button below to make your donations now<br>
                    <a class="thm-btn" target="_blank" href="{$paystackPaymentLink}">Donate</a>
                </div>
                <input type="hidden" id="action" name="action" value="addDonation">
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Full Name</label> <span class="text-danger">*</span>
                        <input type="text" placeholder="Full Name" name="fullName" id="fullName">
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
                        <label>Donation Amount</label> <span class="text-danger">*</span>
                        <input type="number" placeholder="Donation Amount" name="donationAmount" id="donationAmount">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Donation Frequency</label> <span class="text-danger">*</span>
                        <select placeholder="Donation Frequency" name="donationFrequencyId" id="donationFrequencyId">
                            {$ddDonationFrequency}
                        </select>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="comment-form__input-box">
                        <label>Kindly Upload Receipt of Payment</label> <span class="text-danger">*</span>
                        <label for="receiptOfPayment" class="custom-file-upload">
                            Click to choose file
                        </label>
                        <input type="file" name="receiptOfPayment" id="receiptOfPayment">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <label>Would you like to receive updates from StudentsCabin?</label> <span class="text-danger">*</span>
                        <select placeholder="Would you like to receive updates from StudentsCabin?" name="receiveUpdates" id="receiveUpdates">
                            {$ddYesNo}
                        </select>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="comment-form__input-box">
                        <label>Message or Dedication (optional)</label>
                        <textarea type="text" placeholder="Message or Dedication (optional)" name="donationMessage" id="donationMessage"></textarea>
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