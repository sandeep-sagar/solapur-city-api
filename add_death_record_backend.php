<?php
require_once 'common-db-function.php';
//echo "<pre/>";
//print_r($_REQUEST);
//exit;

$aInput = array();
$aInput['dr_state'] = isset($_REQUEST['dr_state']) ? trim($_REQUEST['dr_state']) : '';
$aInput['dr_dist'] = isset($_REQUEST['dr_dist']) ? trim($_REQUEST['dr_dist']) : '';
$aInput['dr_ps'] = isset($_REQUEST['dr_ps']) ? trim($_REQUEST['dr_ps']) : '';
$aInput['dr_details'] = isset($_REQUEST['dr_details']) ? trim($_REQUEST['dr_details']) : '';
$aInput['dr_reason'] = isset($_REQUEST['dr_reason']) ? trim($_REQUEST['dr_reason']) : '';
$aInput['dr_gender'] = isset($_REQUEST['dr_gender']) ? trim($_REQUEST['dr_gender']) : '';
$aInput['dr_reg_date'] = isset($_REQUEST['dr_reg_date']) ? trim($_REQUEST['dr_reg_date']) : '';
$aInput['dr_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);
//exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertDeathRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
//exit;
header("Location: http://localhost/ca/add_death_record.php?m=".$sMsg);
die();
?>