<?php
namespace StudentsCabin\Submission;

use Exception;
use StudentsCabin\Crud\Crud;
use StudentsCabin\Mailer\Mailer;
use StudentsCabin\File\File;
use StudentsCabin\Export\ExportCSV;

class Submission
{
    protected static $tableContacts = DEF_TBL_CONTACTS;
    protected static $tablePartnerships = DEF_TBL_PARTNERSHIPS;
    protected static $tableDonations = DEF_TBL_DONATIONS;
    protected static $tableStudents = DEF_TBL_STUDENTS;
    protected static $lineBreak = "<br>";
    public static $errorMsg = '';

    public static function sendContactMessage()
    {
        $fullName = stringToUpper(regexReplaceWithSpace($_REQUEST['fullName']));
        $email = strtolower(regexReplace($_REQUEST['email']));
        $phone = regexReplace($_REQUEST['phone']);
        $subject = regexReplaceWithSpace($_REQUEST['subject']);
        $message = regexReplaceMsg($_REQUEST['message']);

        $data = [
            'fullName' => $fullName,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ];

        //check duplicate submission
        self::checkDuplicate(self::$tableContacts, $data);

        //send email
        $type = "Contact Form";

        $startingMsg = self::getStartingMessage();
        $body = self::getMessageRow("Name", $fullName);
        $body .= self::getMessageRow("Email", $email);
        $body .= self::getMessageRow("Phone Number", $phone);
        $body .= self::getMessageRow("Subject", $subject);
        $body .= self::getMessageRow("Message", $message);

        $arParams = [
            'mailTo' => SITE_EMAIL,
            'toName' => SITE_NAME,
            'mailFrom' => SITE_EMAIL,
            'fromName' => SITE_NAME,
            'subject' => self::getEmailSubject($subject),
            'body' => $startingMsg.$body
        ];
        Mailer::sendMail($arParams);

        //Send confirmation email to client
        $startingMsg = self::getStartingMessage('client', $fullName);
        $arParams['mailTo'] = $email;
        $arParams['toName'] = $fullName;
        $arParams['subject'] = self::getEmailSubject($type, 'client');
        //As per the team's request, the submission details should not be sent to the user
        //$arParams['body'] = $startingMsg.$body;
        $arParams['body'] = $startingMsg;
        Mailer::sendMail($arParams);

        $data['id'] = getNewId();
        $data['cdate'] = time();

        Crud::insert(
            self::$tableContacts,
            $data
        );
    }

    public static function addPartnership()
    {
        $organizationName = stringToUpper(regexReplaceWithSpace($_REQUEST['organizationName']));
        $contactPersonName = stringToUpper(regexReplaceWithSpace($_REQUEST['contactPersonName']));
        $position = trim($_REQUEST['position']);
        $emailAddress = strtolower(regexReplace($_REQUEST['emailAddress']));
        $phone = regexReplace($_REQUEST['phone']);
        $organizationAddress = trim($_REQUEST['organizationAddress']);
        $website = trim($_REQUEST['website']);
        $arPartnershipTypesIds = $_REQUEST['partnershipTypesIds'];
        $ptnOthersDesc = trim($_REQUEST['ptnOthersDesc']);
        $organizationDesc = trim($_REQUEST['organizationDesc']);
        $supportDesc = trim($_REQUEST['supportDesc']);

        $data = [
            'organizationName' => $organizationName,
            'emailAddress' => $emailAddress
        ];

        //check duplicate submission
        self::checkDuplicate(self::$tablePartnerships, $data);
        $partnershipTypesValues = getDropdownValuesFromArIds(
            'partnershipTypes', $arPartnershipTypesIds, 'string'
        );
        if ($partnershipTypesValues != '')
        {
            $partnershipTypesValues = "$partnershipTypesValues, $ptnOthersDesc";
        }
        else
        {
            $partnershipTypesValues = $ptnOthersDesc;
        }

        //upload proposal file
        $partnershipId = getNewId();
        $filePath = $fileExtension = '';
        $fieldId = 'proposalDoc';
        $imgFileSize = $_FILES[$fieldId]['size'];
        if ($imgFileSize > 0)
        {
            //upload image
            File::$directory = 'assets/files/partnerships/';
            File::$fieldId = $fieldId;
            File::$arExtensions = ['pdf'];
            $fileName = File::uploadFile($partnershipId);
            if ($fileName != '')
            {
                $fileExtension = File::$fileExtension;
                $filePath = DEF_DOC_ROOT.File::$directory.$fileName;
                $data['proposalFileUploaded'] = 1;
            }
        }

        //send email
        $type = "Partnership Application Form";

        $startingMsg = self::getStartingMessage();
        $body = self::getMessageRow("Organization Name", $organizationName);
        $body .= self::getMessageRow("Contact Person Name", $contactPersonName);
        $body .= self::getMessageRow("Position", $position);
        $body .= self::getMessageRow("Email Address", $emailAddress);
        $body .= self::getMessageRow("Phone", $phone);
        $body .= self::getMessageRow("Organization Address", $organizationAddress);
        $body .= self::getMessageRow("Website", $website);
        $body .= self::getMessageRow("Partnership Type(s)", $partnershipTypesValues);
        $body .= self::getMessageRow("Way of Supporting", $supportDesc);

        $orgNameNoSpace = str_replace(' ', '-', $organizationName);
        $arParams = [
            'mailTo' => SITE_EMAIL,
            'toName' => SITE_NAME,
            'mailFrom' => SITE_EMAIL,
            'fromName' => SITE_NAME,
            'subject' => self::getEmailSubject($type),
            'body' => $startingMsg.$body,
            'arAttachments' => [
                [
                    'filePath' => $filePath,
                    'attachmentName' => "proposalDoc-$orgNameNoSpace.$fileExtension",
                    'fileExtension' => $fileExtension
                ]
            ]
        ];
        Mailer::sendMail($arParams);

        //Send confirmation email to client
        $toName = "$contactPersonName ($organizationName)";
        $startingMsg = self::getStartingMessage('client', $toName);
        $arParams['mailTo'] = $emailAddress;
        $arParams['toName'] = $toName;
        $arParams['subject'] = self::getEmailSubject($type, 'client');
        //As per the team's request, the submission details should not be sent to the user
        //$arParams['body'] = $startingMsg.$body;
        $arParams['body'] = $startingMsg;
        Mailer::sendMail($arParams);

        $partnershipTypesIds = implode(',', $arPartnershipTypesIds);
        
        $data['id'] = $partnershipId;
        $data['contactPersonName'] = $contactPersonName;
        $data['position'] = $position;
        $data['phone'] = $phone;
        $data['organizationAddress'] = $organizationAddress;
        $data['website'] = $website;
        $data['organizationDesc'] = $organizationDesc;
        $data['supportDesc'] = $supportDesc;
        $data['partnershipTypesIds'] = $partnershipTypesIds;
        $data['ptnOthersDesc'] = $ptnOthersDesc;
        $data['cdate'] = time();

        Crud::insert(
            self::$tablePartnerships,
            $data
        );
    }

    public static function addDonation()
    {
        $fullName = stringToUpper(regexReplaceWithSpace($_REQUEST['fullName']));
        $emailAddress = strtolower(regexReplace($_REQUEST['emailAddress']));
        $phone = regexReplace($_REQUEST['phone']);
        $donationAmount = doTypeCastInt($_REQUEST['donationAmount']);
        $donationFrequencyId = trim($_REQUEST['donationFrequencyId']);
        $receiveUpdatesId = doTypeCastInt($_REQUEST['receiveUpdates']);
        $donationMessage = trim($_REQUEST['donationMessage']);

        $data = [
            'fullName' => $fullName,
            'emailAddress' => $emailAddress
        ];

        //check duplicate submission
        self::checkDuplicate(self::$tableDonations, $data);

        $donationFrequencyValue = getDropdownValue(
            'donationFrequency', $donationFrequencyId
        );
        $receiveUpdatesValue = getDropdownValue(
            'yesNo', $receiveUpdatesId
        );

        //upload proposal file
        $donationId = getNewId();
        $filePath = $fileExtension = '';
        $fieldId = 'receiptOfPayment';
        $imgFileSize = $_FILES[$fieldId]['size'];
        if ($imgFileSize > 0)
        {
            //upload image
            File::$directory = 'assets/files/donations/';
            File::$fieldId = $fieldId;
            File::$arExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
            $fileName = File::uploadFile($donationId);
            if ($fileName != '')
            {
                $fileExtension = File::$fileExtension;
                $filePath = DEF_DOC_ROOT.File::$directory.$fileName;
                $data['receiptOfPaymentUploaded'] = 1;
            }
        }

        //send email
        $type = "Donation Form";

        $startingMsg = self::getStartingMessage();
        $body = self::getMessageRow("Full Name", $fullName);
        $body .= self::getMessageRow("Email Address", $emailAddress);
        $body .= self::getMessageRow("Phone", $phone);
        $body .= self::getMessageRow("Donation Amount", $donationAmount);
        $body .= self::getMessageRow("Donation Frequency", $donationFrequencyValue);
        $body .= self::getMessageRow("Receive Updates?", $receiveUpdatesValue);
        $body .= self::getMessageRow("Donation Message", $donationMessage);

        $fullNameNoSpace = str_replace(' ', '-', $fullName);
        $arParams = [
            'mailTo' => SITE_EMAIL,
            'toName' => SITE_NAME,
            'mailFrom' => SITE_EMAIL,
            'fromName' => SITE_NAME,
            'subject' => self::getEmailSubject($type),
            'body' => $startingMsg.$body,
            'arAttachments' => [
                [
                    'filePath' => $filePath,
                    'attachmentName' => "receiptOfPayment-$fullNameNoSpace.$fileExtension",
                    'fileExtension' => $fileExtension
                ]
            ]
        ];
        Mailer::sendMail($arParams);

        //Send confirmation email to client
        $startingMsg = self::getStartingMessage('client', $fullName);
        $arParams['mailTo'] = $emailAddress;
        $arParams['toName'] = $fullName;
        $arParams['subject'] = self::getEmailSubject($type, 'client');
        //As per the team's request, the submission details should not be sent to the user
        //$arParams['body'] = $startingMsg.$body;
        $arParams['body'] = $startingMsg;
        Mailer::sendMail($arParams);
        
        $data['id'] = $donationId;
        $data['phone'] = $phone;
        $data['donationAmount'] = $donationAmount;
        $data['donationFrequencyId'] = $donationFrequencyId;
        $data['receiveUpdates'] = $receiveUpdatesId;
        $data['donationMessage'] = $donationMessage;
        $data['cdate'] = time();

        Crud::insert(
            self::$tableDonations,
            $data
        );
    }

    protected static function checkDuplicate($table, $data)
    {
        $rs = Crud::select(
            $table,
            [
                'columns' => 'cdate',
                'where' => $data,
                'order' => 'cdate DESC',
                'limit' => 1
            ]
        );
        if (count($rs) > 0)
        {
            $currentTime = time();
            $submissionTime = $rs['cdate'];
            $reversedTime = strtotime("+2 minutes", $submissionTime);
            if($currentTime < $reversedTime)
            {
                //submission was done in less than 2 minutes ago
                throw new Exception('You already made this submission. Thank you!');
            }
        }
    }

    protected static function getMessageRow($label, $value)
    {
        return "$label: $value" . self::$lineBreak;
    }

    protected static function getEmailSubject($text, $typeId='')
    {
        $subjectPrefix = "Mail From ";
        if ($typeId == 'client')
        {
            $subjectPrefix = "Confirmation From ";
        }
        $subject = $subjectPrefix.SITE_NAME;
        if ($text != '')
        {
            $subject .= " - $text";
        }
        return $subject;
    }

    protected static function getStartingMessage($typeId='', $clientName='')
    {
        $siteName = SITE_NAME;
        $lineBreak = self::$lineBreak;

        $msg = '';
        if ($typeId == 'client')
        {
            $msg = "Dear $clientName," . $lineBreak.$lineBreak;
            $msg .= "This is to notify you that we have received your submission below as sent on $siteName. $lineBreak";
            $msg .= "We will get back to you shortly. $siteName. $lineBreak";
        }
        else
        {
            $msg = "Dear Team," . $lineBreak.$lineBreak;
            $msg .= "Please see below submission from $siteName. $siteName. $lineBreak";
        }
        
        return $msg;
    }

    public static function exportSubmissions()
    {
        $moduleId = $_REQUEST['moduleId'];
        $adminPassCode = trim($_REQUEST['adminPassCode']);

        if ($adminPassCode != DEF_ADMIN_EXPORT_PASSCODE)
        {
            self::$errorMsg = 'Admin pass code is invalid!';
        }
        else
        {
            $arExportData = self::getExportDataByModuleId($moduleId);
            //EXPORT TO CSV
            ExportCSV::$fileName = SITE_NAME.'-'.$moduleId;
            ExportCSV::$arHeaders = $arExportData['arHeaders'];
            ExportCSV::$arData = $arExportData['arData'];
            ExportCSV::exportArray();
        }
    }

    public static function getExportDataByModuleId($moduleId)
    {
        $table = '';
        $arHeaders = $arHeaderLabels = [];
        switch ($moduleId)
        {
            case 'students':
                $table = self::$tableStudents;
                $arHeaders = [
                    'firstName' => 'FIRST NAME',
                    'lastName' => 'LAST NAME',
                    'dateOfBirth' => 'DATE OF BIRTH',
                    'emailAddress' => 'EMAIL ADDRESS',
                    'whatsappPhone' => 'WHATSAPP PHONE',
                    'stateOfOrigin' => 'STATE OF ORIGIN',
                    'nameOfSchool' => 'NAME OF SCHOOL',
                    'courseOfStudy' => 'COURSE OF STUDY',
                    'yearOfStudyId' => 'YEAR OF STUDY',
                    'joinReason' => 'REASON FOR JOINING',
                    'meansOfAwarenessId' => 'MEANS OF AWARENESSS',
                    'meansOfAwarenessOthers' => 'OTHER MEANS OF AWARENESS',
                    'referralEmail' => 'REFERRAL EMAIL',
                    'cdate' => 'DATE SUBMITTED'
                ];
            break;
            case 'partnerships':
                $table = self::$tablePartnerships;
                $arHeaders = [
                    'organizationName' => 'ORGANIZATION NAME',
                    'contactPersonName' => 'CONTACT PERSON',
                    'position' => 'POSITION',
                    'emailAddress' => 'EMAIL ADDRESS',
                    'phone' => 'PHONE',
                    'organizationAddress' => 'ORGANIZATION ADDRESS',
                    'website' => 'WEBSITE',
                    'partnershipTypesIds' => 'PARTNERSHIP TYPES',
                    'ptnOthersDesc' => 'OTHER PARTNERSHIP TYPES',
                    'organizationDesc' => 'ORGANIZATION DESCRIPTION',
                    'supportDesc' => 'SUPPORT DESCRIPTION',
                    'cdate' => 'DATE SUBMITTED'
                ];
            break;
            case 'donations':
                $table = self::$tableDonations;
                $arHeaders = [
                    'fullName' => 'FULL NAME',
                    'emailAddress' => 'EMAIL ADDRESS',
                    'phone' => 'PHONE',
                    'donationAmount' => 'DONATION AMOUNT',
                    'donationFrequencyId' => 'DONATION FREQUENCY',
                    'receiveUpdates' => 'RECEIVE UPDATES?',
                    'donationMessage' => 'DONATION MESSAGE',
                    'cdate' => 'DATE SUBMITTED'
                ];
            break;
        }
        $arHeaderLabels = array_values($arHeaders);

        if ($table == '')
        {
            throw new Exception('Please select a module to export!');
        }

        $rs = Crud::select(
            $table,
            [
                'where' => [
                    'deleted' => 0
                ],
                'return_type' => 'all',
                'order' => '`cdate` DESC'
            ]
        );
        if (count($rs) > 0)
        {
            $arData = self::getArrayDataByHeaders($rs, $arHeaders);
        }
        return [
            'arHeaders' => $arHeaderLabels,
            'arData' => $arData
        ];
    }

    public static function getArrayDataByHeaders($rs, $arHeaders)
    {
        $arData = [];
        foreach ($rs as $r)
        {
            $arRow = [];
            foreach ($arHeaders as $headerId => $headerLabel)
            {
                $value = $r[$headerId];
                switch ($headerId)
                {
                    case 'yearOfStudyId':
                        $value = getDropdownValue('yearsOfStudy', $value);
                    break;
                    case 'meansOfAwarenessId':
                        $value = getDropdownValue('meansOfAwareness', $value);
                    break;
                    case 'partnershipTypesIds':
                        $arPartnershipTypes = explode(',', $value);
                        $value = getDropdownValuesFromArIds(
                            'partnershipTypes', $arPartnershipTypes
                        );
                    break;
                    case 'donationFrequencyId':
                        $value = getDropdownValue('donationFrequency', $value);
                    break;
                    case 'receiveUpdates':
                        $value = getDropdownValue('yesNo', $value);
                    break;
                    case 'cdate':
                        $value = getFormattedDate($value);
                    break;
                }
                $arRow[] = $value;
            }
            $arData[] = $arRow;
        }
        
        return $arData;
    }
}