<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['jr_state'] = isset($_REQUEST['jr_state']) ? trim($_REQUEST['jr_state']) : '';
$aInput['jr_dist'] = isset($_REQUEST['jr_dist']) ? trim($_REQUEST['jr_dist']) : '';
$aInput['jr_ps'] = isset($_REQUEST['jr_ps']) ? trim($_REQUEST['jr_ps']) : '';
$aInput['jr_fir'] = isset($_REQUEST['jr_fir']) ? trim($_REQUEST['jr_fir']) : '';
$aInput['jr_law'] = isset($_REQUEST['jr_law']) ? trim($_REQUEST['jr_law']) : '';
$aInput['jr_name'] = isset($_REQUEST['jr_name']) ? trim($_REQUEST['jr_name']) : '';
$aInput['jr_release_date'] = isset($_REQUEST['jr_release_date']) ? trim($_REQUEST['jr_release_date']) : '';
$aInput['jr_reg_date'] = isset($_REQUEST['jr_reg_date']) ? trim($_REQUEST['jr_reg_date']) : '';
$aInput['jr_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertJailReleaseRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_jail_release_record.php?m=".$sMsg);
die();
?>