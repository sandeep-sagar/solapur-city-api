<?php
require_once 'common-db-function.php';
//echo "<pre/>";
//print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['mr_state'] = isset($_REQUEST['mr_state']) ? trim($_REQUEST['mr_state']) : '';
$aInput['mr_dist'] = isset($_REQUEST['mr_dist']) ? trim($_REQUEST['mr_dist']) : '';
$aInput['mr_ps'] = isset($_REQUEST['mr_ps']) ? trim($_REQUEST['mr_ps']) : '';
$aRegDate = array();

$aRegDate = explode('T', $_REQUEST['mr_reg_date']);

$aInput['mr_count'] = isset($_REQUEST['mr_count']) ? trim($_REQUEST['mr_count']) : '';
$aInput['mr_number'] = isset($_REQUEST['mr_number']) ? trim($_REQUEST['mr_number']) : '';
$aInput['mr_details'] = isset($_REQUEST['mr_details']) ? trim($_REQUEST['mr_details']) : '';
$aInput['mr_officer'] = isset($_REQUEST['mr_officer']) ? trim($_REQUEST['mr_officer']) : '';
$aInput['mr_reg_date'] = $aRegDate[0] . ' ' . $aRegDate[1] . ':00';
$aInput['mr_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);

$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertMissingRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_missing_record.php?m=".$sMsg);
die();
?>