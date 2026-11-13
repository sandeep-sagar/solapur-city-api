<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['jv_state'] = isset($_REQUEST['se_state']) ? trim($_REQUEST['se_state']) : '';
$aInput['jv_dist'] = isset($_REQUEST['se_dist']) ? trim($_REQUEST['se_dist']) : '';
$aInput['jv_ps'] = isset($_REQUEST['se_ps']) ? trim($_REQUEST['se_ps']) : '';
$aInput['jv_closed'] = isset($_REQUEST['se_closed']) ? trim($_REQUEST['se_closed']) : '';
$aInput['jv_prof'] = isset($_REQUEST['se_prof']) ? trim($_REQUEST['se_prof']) : '';
$aInput['jv_release'] = isset($_REQUEST['se_release']) ? trim($_REQUEST['se_release']) : '';
$aInput['jv_compromis'] = isset($_REQUEST['se_compromis']) ? trim($_REQUEST['se_compromis']) : '';
$aInput['jv_per'] = isset($_REQUEST['se_per']) ? trim($_REQUEST['se_per']) : '';
$aInput['jv_reg_date'] = isset($_REQUEST['se_reg_date']) ? trim($_REQUEST['se_reg_date']) : '';
$aInput['jv_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertJevRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_juvenile_court_record.php?m=".$sMsg);
die();
?>