<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['se_state'] = isset($_REQUEST['se_state']) ? trim($_REQUEST['se_state']) : '';
$aInput['se_dist'] = isset($_REQUEST['se_dist']) ? trim($_REQUEST['se_dist']) : '';
$aInput['se_ps'] = isset($_REQUEST['se_ps']) ? trim($_REQUEST['se_ps']) : '';
$aInput['se_closed'] = isset($_REQUEST['se_closed']) ? trim($_REQUEST['se_closed']) : '';
$aInput['se_prof'] = isset($_REQUEST['se_prof']) ? trim($_REQUEST['se_prof']) : '';
$aInput['se_release'] = isset($_REQUEST['se_release']) ? trim($_REQUEST['se_release']) : '';
$aInput['se_compromis'] = isset($_REQUEST['se_compromis']) ? trim($_REQUEST['se_compromis']) : '';
$aInput['se_reg_date'] = isset($_REQUEST['se_reg_date']) ? trim($_REQUEST['se_reg_date']) : '';
$aInput['se_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertSesRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_session_court_record.php?m=".$sMsg);
die();
?>