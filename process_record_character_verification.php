<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);exit;

//exit;
$aInput = array();
$aInput['cv_state'] = isset($_REQUEST['se_state']) ? trim($_REQUEST['se_state']) : '';
$aInput['cv_dist'] = isset($_REQUEST['se_dist']) ? trim($_REQUEST['se_dist']) : '';
$aInput['cv_ps'] = isset($_REQUEST['se_ps']) ? trim($_REQUEST['se_ps']) : '';
$aInput['cv_rec_last_month'] = isset($_REQUEST['se_closed']) ? trim($_REQUEST['se_closed']) : '';
$aInput['cv_pend'] = isset($_REQUEST['se_prof']) ? trim($_REQUEST['se_prof']) : '';
$aInput['cv_total_rec_till_last_month'] = isset($_REQUEST['se_release']) ? trim($_REQUEST['se_release']) : '';
$aInput['cv_total_op_till_last_month'] = isset($_REQUEST['se_compromis']) ? trim($_REQUEST['se_compromis']) : '';
$aInput['cv_pend_last_ft'] = isset($_REQUEST['se_received']) ? trim($_REQUEST['se_received']) : '';
$aInput['cv_pend_last_month'] = isset($_REQUEST['se_received_30']) ? trim($_REQUEST['se_received_30']) : '';
$aInput['cv_per_last_month'] = isset($_REQUEST['se_received_last']) ? trim($_REQUEST['se_received_last']) : '';
$aInput['cv_rec_cur_month'] = isset($_REQUEST['se_received_this']) ? trim($_REQUEST['se_received_this']) : '';
$aInput['cv_op_cur_month'] = isset($_REQUEST['se_output_this']) ? trim($_REQUEST['se_output_this']) : '';
$aInput['cv_reg_date'] = isset($_REQUEST['se_reg_date']) ? trim($_REQUEST['se_reg_date']) : '';
$aInput['cv_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertCvRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_record_character_verification_notified.php?m=".$sMsg);
die();
?>