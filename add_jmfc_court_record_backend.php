<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['jm_state'] = isset($_REQUEST['jm_state']) ? trim($_REQUEST['jm_state']) : '';
$aInput['jm_dist'] = isset($_REQUEST['jm_dist']) ? trim($_REQUEST['jm_dist']) : '';
$aInput['jm_ps'] = isset($_REQUEST['jm_ps']) ? trim($_REQUEST['jm_ps']) : '';
$aInput['jm_closed'] = isset($_REQUEST['jm_closed']) ? trim($_REQUEST['jm_closed']) : '';
$aInput['jm_prof'] = isset($_REQUEST['jm_prof']) ? trim($_REQUEST['jm_prof']) : '';
$aInput['jm_release'] = isset($_REQUEST['jm_release']) ? trim($_REQUEST['jm_release']) : '';
$aInput['jm_compromis'] = isset($_REQUEST['jm_compromis']) ? trim($_REQUEST['jm_compromis']) : '';
$aInput['jm_reg_date'] = isset($_REQUEST['jm_reg_date']) ? trim($_REQUEST['jm_reg_date']) : '';
$aInput['jm_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertJMFCRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_jmfc_court_record.php?m=".$sMsg);
die();
?>