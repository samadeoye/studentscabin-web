<?php
namespace StudentsCabin\Student;

use Exception;
use StudentsCabin\Crud\Crud;
use StudentsCabin\Mailer\Mailer;
use StudentsCabin\File\File;

class Student
{
    protected static $table = DEF_TBL_STUDENTS;
    protected static $lineBreak = "<br>";

    public static function registerStudent()
    {
        $firstName = stringToUpper($_REQUEST['firstName']);
        $lastName = stringToUpper($_REQUEST['lastName']);
        $dateOfBirth = trim($_REQUEST['dateOfBirth']);
        $emailAddress = strtolower($_REQUEST['emailAddress']);
        $whatsappPhone = trim($_REQUEST['whatsappPhone']);
        $stateOfOrigin = stringToUpper($_REQUEST['stateOfOrigin']);
        $nameOfSchool = stringToUpper($_REQUEST['nameOfSchool']);
        $courseOfStudy = stringToUpper($_REQUEST['courseOfStudy']);
        $yearOfStudyId = doTypeCastInt($_REQUEST['yearOfStudyId']);
        $joinReason = trim($_REQUEST['joinReason']);
        $meansOfAwarenessId = trim($_REQUEST['meansOfAwarenessId']);
        $meansOfAwarenessOthers = trim($_REQUEST['meansOfAwarenessOthers']);
        $referralEmail = strtolower(trim($_REQUEST['referralEmail']));

        //check duplicate account with email
        self::checkDuplicate($emailAddress);

        //upload student ID file
        $studentId = getNewId();
        $filePath = $fileExtension = '';
        $studentIdUploaded = 0;
        $fieldId = 'studentId';
        $imgFileSize = $_FILES[$fieldId]['size'];
        if ($imgFileSize > 0)
        {
            //upload image
            File::$directory = 'assets/files/students/';
            File::$fieldId = $fieldId;
            File::$arExtensions = ['jpeg', 'jpg', 'png', 'pdf'];
            $fileName = File::uploadFile($studentId);
            if ($fileName == '')
            {
                throw new Exception('An error occured. Please try again.');
            }
            else
            {
                $fileExtension = File::$fileExtension;
                $filePath = DEF_DOC_ROOT.File::$directory.$fileName;
                $studentIdUploaded = 1;
            }
        }
        else
        {
            throw new Exception('Please upload your Student ID or proof of admission');
        }

        //send email
        $type = "Student Registration Form";

        $meansOfAwarenessValue = getDropdownValue('meansOfAwareness', $meansOfAwarenessId);
        if ($meansOfAwarenessValue != '')
        {
            $meansOfAwarenessValue = "$meansOfAwarenessValue, $meansOfAwarenessOthers";
        }
        else
        {
            $meansOfAwarenessValue = $meansOfAwarenessOthers;
        }

        $startingMsg = self::getStartingMessage();
        $body = self::getMessageRow("First Name", $firstName);
        $body .= self::getMessageRow("Last Name", $lastName);
        $body .= self::getMessageRow("Date of Birth", $dateOfBirth);
        $body .= self::getMessageRow("Email Address", $emailAddress);
        $body .= self::getMessageRow("WhatsApp Phone", $whatsappPhone);
        $body .= self::getMessageRow("State of Origin", $stateOfOrigin);
        $body .= self::getMessageRow("Name of School", $nameOfSchool);
        $body .= self::getMessageRow("Course of Study", $courseOfStudy);
        $body .= self::getMessageRow("Reason for Joining", $joinReason);
        $body .= self::getMessageRow("Year of Study", getDropdownValue('yearsOfStudy', $yearOfStudyId));
        $body .= self::getMessageRow("Means of Awareness", $meansOfAwarenessValue);
        $body .= self::getMessageRow("Referral Email", $referralEmail);

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
                    'attachmentName' => "studentId-$firstName-$lastName.$fileExtension",
                    'fileExtension' => $fileExtension
                ]
            ]
        ];
        Mailer::sendMail($arParams);

        //Send confirmation email to client
        $startingMsg = self::getStartingMessage('client', $firstName);
        $arParams['mailTo'] = $emailAddress;
        $arParams['toName'] = $firstName . ' ' . $lastName;
        $arParams['subject'] = self::getEmailSubject($type, 'client');
        //As per the team's request, the submission details should not be sent to the user
        //$arParams['body'] = $startingMsg.$body;
        $arParams['body'] = $startingMsg;
        Mailer::sendMail($arParams);

        $data = [
            'id' => $studentId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'dateOfBirth' => $dateOfBirth,
            'emailAddress' => $emailAddress,
            'whatsappPhone' => $whatsappPhone,
            'stateOfOrigin' => $stateOfOrigin,
            'nameOfSchool' => $nameOfSchool,
            'courseOfStudy' => $courseOfStudy,
            'yearOfStudyId' => $yearOfStudyId,
            'joinReason' => $joinReason,
            'meansOfAwarenessId' => $meansOfAwarenessId,
            'meansOfAwarenessOthers' => $meansOfAwarenessOthers,
            'referralEmail' => $referralEmail,
            'studentIdUploaded' => $studentIdUploaded,
            'cdate' => time()
        ];

        Crud::insert(
            self::$table,
            $data
        );
    }

    protected static function checkDuplicate($emailAddress)
    {
        $rs = Crud::select(
            self::$table,
            [
                'columns' => 'id',
                'where' => [
                    'emailAddress' => $emailAddress
                ]
            ]
        );
        if ($rs)
        {
            throw new Exception('An account already exists with this email address!');
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
            $communityLink = STUDENTS_COMMUNITY_LINK;
            $msg = "Dear $clientName," . $lineBreak.$lineBreak;
            $msg .= "This is to notify you that your registration on $siteName is successful. $lineBreak";
            $msg .= "Please find the link to the Students Community below. $lineBreak.$lineBreak";
            $msg .= "<a href='{$communityLink}'>Click here</a> $lineBreak.$lineBreak";
        }
        else
        {
            $msg = "Dear Team," . $lineBreak.$lineBreak;
            $msg .= "Please see below submission from $siteName. $lineBreak.$lineBreak";
        }
        
        return $msg;
    }
}