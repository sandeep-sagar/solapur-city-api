<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);exit;

//exit;
$aInput = array();
$aInput['cn_name'] = isset($_REQUEST['cn_name']) ? trim($_REQUEST['cn_name']) : '';
$aInput['cn_dura'] = isset($_REQUEST['cn_dura']) ? trim($_REQUEST['cn_dura']) : '';
$aInput['cn_total_rec'] = isset($_REQUEST['cn_total_rec']) ? trim($_REQUEST['cn_total_rec']) : '';
$aInput['cn_total_op'] = isset($_REQUEST['cn_total_op']) ? trim($_REQUEST['cn_total_op']) : '';
$aInput['cn_total_pend'] = isset($_REQUEST['cn_total_pend']) ? trim($_REQUEST['cn_total_pend']) : '';
$aInput['cn_reg_date'] = isset($_REQUEST['cn_reg_date']) ? trim($_REQUEST['cn_reg_date']) : '';
$aInput['cn_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertCnRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_record_character_verification_notified.php?m=".$sMsg);
die();
?>