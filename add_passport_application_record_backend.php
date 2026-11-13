<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);exit;

//exit;
$aInput = array();
$aInput['pa_state'] = isset($_REQUEST['se_state']) ? trim($_REQUEST['se_state']) : '';
$aInput['pa_dist'] = isset($_REQUEST['se_dist']) ? trim($_REQUEST['se_dist']) : '';
$aInput['pa_ps'] = isset($_REQUEST['se_ps']) ? trim($_REQUEST['se_ps']) : '';
$aInput['pa_seven_days'] = isset($_REQUEST['se_closed']) ? trim($_REQUEST['se_closed']) : '';
$aInput['pa_fifteen_days'] = isset($_REQUEST['se_prof']) ? trim($_REQUEST['se_prof']) : '';
$aInput['pa_one_month'] = isset($_REQUEST['se_release']) ? trim($_REQUEST['se_release']) : '';
$aInput['pa_total_waiting'] = isset($_REQUEST['se_compromis']) ? trim($_REQUEST['se_compromis']) : '';
$aInput['pa_total_received'] = isset($_REQUEST['se_received']) ? trim($_REQUEST['se_received']) : '';
$aInput['pa_reg_date'] = isset($_REQUEST['se_reg_date']) ? trim($_REQUEST['se_reg_date']) : '';
$aInput['pa_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertPaRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_passport_application_record.php?m=".$sMsg);
die();
?>