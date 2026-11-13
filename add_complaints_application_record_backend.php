<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);exit;

//exit;
$aInput = array();
$aInput['ca_state'] = isset($_REQUEST['se_state']) ? trim($_REQUEST['se_state']) : '';
$aInput['ca_dist'] = isset($_REQUEST['se_dist']) ? trim($_REQUEST['se_dist']) : '';
$aInput['ca_ps'] = isset($_REQUEST['se_ps']) ? trim($_REQUEST['se_ps']) : '';
$aInput['ca_one_year'] = isset($_REQUEST['se_closed']) ? trim($_REQUEST['se_closed']) : '';
$aInput['ca_six_month'] = isset($_REQUEST['se_prof']) ? trim($_REQUEST['se_prof']) : '';
$aInput['ca_three_month'] = isset($_REQUEST['se_release']) ? trim($_REQUEST['se_release']) : '';
$aInput['ca_less_three_month'] = isset($_REQUEST['se_compromis']) ? trim($_REQUEST['se_compromis']) : '';
$aInput['ca_total'] = $aInput['ca_one_year'] +$aInput['ca_six_month'] +$aInput['ca_three_month'] +$aInput['ca_less_three_month']; 
$aInput['ca_reg_date'] = isset($_REQUEST['se_reg_date']) ? trim($_REQUEST['se_reg_date']) : '';
$aInput['ca_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertCaRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_complaints_application_record.php?m=".$sMsg);
die();
?>