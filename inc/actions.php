<?php
require_once 'utils.php';

use StudentsCabin\Param\Param;
use StudentsCabin\Student\Student;
use StudentsCabin\Submission\Submission;

$action = isset($_REQUEST['action']) ? trim($_REQUEST['action']) : '';
if ($action == '')
{
    getJsonRow(false, 'Invalid request!');
}

$params = Param::getRequestParams($action);
$arResponse = doValidateRequestParams($params);
if (count($arResponse) > 0)
{
    if ($arResponse['status'] == false)
    {
        if (in_array($action, ['exportSubmissions']))
        {
            $msg = $arResponse['msg'];
            getErrorMsgNReturnLink($msg);
        }
        else
        {
            getJsonList($arResponse);
        }
    }
}

try
{
    $data = [];
    $db->beginTransaction();

    switch($action)
    {
        case 'registerStudent':
            Student::registerStudent();
        break;
        
        case 'addPartnership':
            Submission::addPartnership();
        break;
        
        case 'addDonation':
            Submission::addDonation();
        break;
        
        case 'sendContactMessage':
            Submission::sendContactMessage();
        break;

        case 'exportSubmissions':
            Submission::exportSubmissions();
            getErrorMsgNReturnLink(Submission::$errorMsg);
        break;
    }

    $db->commit();
    if (count($data) > 0)
    {
        getJsonList($data);
    }
    getJsonRow(true, 'Operation successful!');
}
catch(Exception $ex)
{
	$db->rollBack();
	// $ex->getMessage();exit;
    getJsonRow(false, $ex->getMessage());
}