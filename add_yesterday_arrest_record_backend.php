<?php
require_once 'common-db-function.php';
//echo "<pre/>";print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['yr_state'] = isset($_REQUEST['yr_state']) ? trim($_REQUEST['yr_state']) : '';
$aInput['yr_dist'] = isset($_REQUEST['yr_dist']) ? trim($_REQUEST['yr_dist']) : '';
$aInput['yr_ps'] = isset($_REQUEST['yr_ps']) ? trim($_REQUEST['yr_ps']) : '';
$aInput['yr_fir'] = isset($_REQUEST['yr_fir']) ? trim($_REQUEST['yr_fir']) : '';
$aInput['yr_law'] = isset($_REQUEST['yr_law']) ? trim($_REQUEST['yr_law']) : '';
$aInput['yr_count'] = isset($_REQUEST['yr_count']) ? trim($_REQUEST['yr_count']) : '';
$aInput['yr_arrest'] = isset($_REQUEST['yr_arrest']) ? trim($_REQUEST['yr_arrest']) : '';
$aInput['yr_reg_date'] = isset($_REQUEST['yr_reg_date']) ? trim($_REQUEST['yr_reg_date']) : '';
$aInput['yr_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);exit;
$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertYesterdayRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_yesterday_arrest_record.php?m=".$sMsg);
die();
?>