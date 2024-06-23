<?php
namespace StudentsCabin\Form;

class FormFunctions
{
    public static function getFormInfoById($formId)
    {
        $pageTitle = $pageHeader = '';
        switch($formId)
        {
            case 'studentRegistration':
                $pageTitle = 'Student Registration';
                $pageHeader = 'Join our Student Community';
            break;

            case 'partnership':
                $pageTitle = 'Partnership Registration';
                $pageHeader = 'StudentsCabin Partnership Application Form';
            break;

            case 'donation':
                $pageTitle = 'Donate / Support Us';
                $pageHeader = 'StudentsCabin Donation Form';
            break;
        }

        return [
            'pageTitle' => $pageTitle,
            'pageHeader' => $pageHeader
        ];
    }

    public static function getFormFormattedOptions($arOptions, $valueField='id')
    {
        $options = '';
        foreach ($arOptions as $optionId => $optionLabel)
        {
            $value = $optionId;
            if ($valueField == 'label')
            {
                $value = $optionLabel;
            }
            $options .= <<<EOQ
            <option value="{$value}">{$optionLabel}</option>
EOQ;
        }
        return $options;
    }
}