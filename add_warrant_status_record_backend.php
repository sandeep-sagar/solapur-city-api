<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['ws_state'] = isset($_REQUEST['ss_state']) ? trim($_REQUEST['ss_state']) : '';
$aInput['ws_dist'] = isset($_REQUEST['ss_dist']) ? trim($_REQUEST['ss_dist']) : '';
$aInput['ws_ps'] = isset($_REQUEST['ss_ps']) ? trim($_REQUEST['ss_ps']) : '';
$aInput['ws_pre_balance'] = isset($_REQUEST['ss_pre_balance']) ? trim($_REQUEST['ss_pre_balance']) : '0';
$aInput['ws_current'] = isset($_REQUEST['ss_current']) ? trim($_REQUEST['ss_current']) : '0';
$aInput['ws_total'] = $aInput['ws_pre_balance'] + $aInput['ws_current'];
$aInput['ws_summoned'] = isset($_REQUEST['ss_summoned']) ? trim($_REQUEST['ss_summoned']) : '0';
$aInput['ws_not_summoned'] = isset($_REQUEST['ss_not_summoned']) ? trim($_REQUEST['ss_not_summoned']) : '0';
$aInput['ws_post'] = isset($_REQUEST['ss_post']) ? trim($_REQUEST['ss_post']) : '0';
$aInput['ws_balance'] = isset($_REQUEST['ss_balance']) ? trim($_REQUEST['ss_balance']) : '0';
$aInput['ws_per'] = ($aInput['ws_summoned']/$aInput['ws_total'])*100;
$aInput['ws_per'] = round($aInput['ws_per'], 2);
$aInput['ws_per_balance'] = $aInput['ws_per'] - ($aInput['ws_balance']/100);
$aInput['ws_per_balance'] = round($aInput['ws_per_balance'], 2);
$aInput['ws_reg_date'] = isset($_REQUEST['ss_reg_date']) ? trim($_REQUEST['ss_reg_date']) : '';
$aInput['ws_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';

//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertWarRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_warrant_status_record.php?m=".$sMsg);
die();
?>