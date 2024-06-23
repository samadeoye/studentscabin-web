<?php
namespace StudentsCabin\Mailer;

use PHPMailer\PHPMailer\Exception;
use SendGrid;
use SendGrid\Mail\Mail;

class Mailer
{
    static $isSent = false;
    
    public static function sendMail($arParams)
    {
        $mailTo = $arParams['mailTo'];
        $toName = $arParams['toName'];
        $mailFrom = $arParams['mailFrom'];
        $fromName = $arParams['fromName'];
        $subject =  $arParams['subject'];
        $body = $arParams['body'];
        $arCC = array_key_exists('arCC', $arParams) ? $arParams['arCC'] : [];
        $arAttachments = array_key_exists('arAttachments', $arParams) ? $arParams['arAttachments'] : [];
        
        $email = new Mail(); 
        $email->setFrom($mailFrom, $fromName);
        $email->setSubject($subject);
        $email->addTo($mailTo, $toName);
        if (count($arCC) > 0)
        {
            foreach($arCC as $ccEmail)
            {
                $email->addCc($ccEmail);
            }
        }
        $email->addContent("text/plain", $body);
        $email->addContent("text/html", $body);

        if (count($arAttachments) > 0)
        {
            foreach ($arAttachments as $arAttachment)
            {
                $fileExtension = $arAttachment['fileExtension'];
                $fileEncoded = base64_encode(file_get_contents($arAttachment['filePath']));
                $email->addAttachment(
                    $fileEncoded,
                    "application/$fileExtension",
                    $arAttachment['attachmentName'],
                    "attachment"
                );
            }
        }

        //$email->setTemplateId("d-13b8f94fbcae4ec6b75270d6cb59f932");

        $sendgrid = new SendGrid(DEF_SENDGRID_API_KEY);
        try
        {
            $response = $sendgrid->send($email);
            /*
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
            exit;
            */
            if(substr($response->statusCode(), 0, 1) == 2)
            {
                self::$isSent = true;
            }
        }
        catch (Exception $e)
        {
            //echo 'Caught exception: '. $e->getMessage() ."\n";
            throw new Exception('An error occured.');
        }
    }
}