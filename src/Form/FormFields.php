<?php
namespace StudentsCabin\Form;

use StudentsCabin\Form\FormTypes\StudentRegistrationForm;
use StudentsCabin\Form\FormTypes\PartnershipForm;
use StudentsCabin\Form\FormTypes\DonationForm;

class FormFields extends FormFunctions
{
    public static function getFormFields($formId)
    {
        $formFields = '';
        switch($formId)
        {
            case 'studentRegistration':
                $formFields = StudentRegistrationForm::getStudentRegisrationFormFields();
            break;
            
            case 'partnership':
                $formFields = PartnershipForm::getPartnershipFormFields();
            break;

            case 'donation':
                $formFields = DonationForm::getDonationFormFields();
            break;
        }

        return $formFields;
    }
}