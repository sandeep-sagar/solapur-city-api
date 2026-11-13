<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);exit;

//exit;
$aInput = array();
$aInput['pg_state'] = isset($_REQUEST['pg_state']) ? trim($_REQUEST['pg_state']) : '';
$aInput['pg_dist'] = isset($_REQUEST['pg_dist']) ? trim($_REQUEST['pg_dist']) : '';
$aInput['pg_on_id'] = isset($_REQUEST['pg_on_id']) ? trim($_REQUEST['pg_on_id']) : '';
$aInput['pg_rec_last_month'] = isset($_REQUEST['pg_rec_last_month']) ? trim($_REQUEST['pg_rec_last_month']) : '';
$aInput['pg_pend'] = isset($_REQUEST['pg_pend']) ? trim($_REQUEST['pg_pend']) : '';
$aInput['pg_total_rec_till_last_month'] = isset($_REQUEST['pg_total_rec_till_last_month']) ? trim($_REQUEST['pg_total_rec_till_last_month']) : '';
$aInput['pg_total_op_till_last_month'] = isset($_REQUEST['pg_total_op_till_last_month']) ? trim($_REQUEST['pg_total_op_till_last_month']) : '';
$aInput['pg_pend_last_ft'] = isset($_REQUEST['pg_pend_last_ft']) ? trim($_REQUEST['pg_pend_last_ft']) : '';
$aInput['pg_pend_last_month'] = isset($_REQUEST['pg_pend_last_month']) ? trim($_REQUEST['pg_pend_last_month']) : '';
$aInput['pg_per_last_month'] = isset($_REQUEST['pg_per_last_month']) ? trim($_REQUEST['pg_per_last_month']) : '';
$aInput['pg_rec_cur_month'] = isset($_REQUEST['pg_rec_cur_month']) ? trim($_REQUEST['pg_rec_cur_month']) : '';
$aInput['pg_op_cur_month'] = isset($_REQUEST['pg_op_cur_month']) ? trim($_REQUEST['pg_op_cur_month']) : '';
$aInput['pg_reg_date'] = isset($_REQUEST['pg_reg_date']) ? trim($_REQUEST['pg_reg_date']) : '';
$aInput['pg_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertPgRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_record_pg_portal.php?m=".$sMsg);
die();
?>