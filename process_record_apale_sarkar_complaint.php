<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);exit;

//exit;
$aInput = array();
$aInput['as_state'] = isset($_REQUEST['as_state']) ? trim($_REQUEST['as_state']) : '';
$aInput['as_dist'] = isset($_REQUEST['as_dist']) ? trim($_REQUEST['as_dist']) : '';
$aInput['as_on_id'] = isset($_REQUEST['as_on_id']) ? trim($_REQUEST['as_on_id']) : '';
$aInput['as_pend_last_month'] = isset($_REQUEST['as_pend_last_month']) ? trim($_REQUEST['as_pend_last_month']) : '';
$aInput['as_comp_today'] = isset($_REQUEST['as_comp_today']) ? trim($_REQUEST['as_comp_today']) : '';
$aInput['as_total'] = isset($_REQUEST['as_total']) ? trim($_REQUEST['as_total']) : '';
$aInput['as_op_today'] = isset($_REQUEST['as_op_today']) ? trim($_REQUEST['as_op_today']) : '';
$aInput['as_pend_today'] = isset($_REQUEST['as_pend_today']) ? trim($_REQUEST['as_pend_today']) : '';
$aInput['as_reg_date'] = isset($_REQUEST['as_reg_date']) ? trim($_REQUEST['as_reg_date']) : '';
$aInput['as_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertAsRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_record_apale_sarkar_complaint.php?m=".$sMsg);
die();
?>