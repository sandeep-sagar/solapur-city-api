<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['ss_state'] = isset($_REQUEST['ss_state']) ? trim($_REQUEST['ss_state']) : '';
$aInput['ss_dist'] = isset($_REQUEST['ss_dist']) ? trim($_REQUEST['ss_dist']) : '';
$aInput['ss_ps'] = isset($_REQUEST['ss_ps']) ? trim($_REQUEST['ss_ps']) : '';
$aInput['ss_pre_balance'] = isset($_REQUEST['ss_pre_balance']) ? trim($_REQUEST['ss_pre_balance']) : '0';
$aInput['ss_current'] = isset($_REQUEST['ss_current']) ? trim($_REQUEST['ss_current']) : '0';
$aInput['ss_total'] = $aInput['ss_pre_balance'] + $aInput['ss_current'];
$aInput['ss_summoned'] = isset($_REQUEST['ss_summoned']) ? trim($_REQUEST['ss_summoned']) : '0';
$aInput['ss_not_summoned'] = isset($_REQUEST['ss_not_summoned']) ? trim($_REQUEST['ss_not_summoned']) : '0';
$aInput['ss_post'] = isset($_REQUEST['ss_post']) ? trim($_REQUEST['ss_post']) : '0';
$aInput['ss_balance'] = isset($_REQUEST['ss_balance']) ? trim($_REQUEST['ss_balance']) : '0';
$aInput['ss_per'] = ($aInput['ss_summoned']/$aInput['ss_total'])*100;
$aInput['ss_per'] = round($aInput['ss_per'], 2);
$aInput['ss_per_balance'] = $aInput['ss_per'] - ($aInput['ss_balance']/100);
$aInput['ss_per_balance'] = round($aInput['ss_per_balance'], 2);
$aInput['ss_reg_date'] = isset($_REQUEST['ss_reg_date']) ? trim($_REQUEST['ss_reg_date']) : '';
$aInput['ss_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';

//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertSusRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_summons_status_record.php?m=".$sMsg);
die();
?>