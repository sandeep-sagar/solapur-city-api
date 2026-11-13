<?php
require_once 'common-db-function.php';
//echo "<pre/>";
//print_r($_REQUEST);

//exit;
$aInput = array();
$aInput['cmd_name'] = isset($_REQUEST['crimeName']) ? trim($_REQUEST['crimeName']) : '';
$aInput['cmd_details'] = isset($_REQUEST['crimeDetails']) ? trim($_REQUEST['crimeDetails']) : '';
$aInput['cmd_complaint_number'] = isset($_REQUEST['complaintNumber']) ? trim($_REQUEST['complaintNumber']) : '';
$aCrimeSDate = $aCrimeEDate = $aCrimeRegDate = array();

$aCrimeSDate = explode('T', $_REQUEST['crimeSDate']);
$aCrimeEDate = explode('T', $_REQUEST['crimeEDate']);
$aCrimeRegDate = explode('T', $_REQUEST['crimeRegDate']);

$aInput['cmd_start_date'] = $aCrimeSDate[0] . ' ' . $aCrimeSDate[1] . ':00';
$aInput['cmd_end_date'] = $aCrimeEDate[0] . ' ' . $aCrimeEDate[1] . ':00';
$aInput['cmd_place'] = isset($_REQUEST['crimePlace']) ? trim($_REQUEST['crimePlace']) : '';
$aInput['cmd_lang'] = isset($_REQUEST['crimeLang']) ? trim($_REQUEST['crimeLang']) : '';
$aInput['cmd_state'] = isset($_REQUEST['crimeState']) ? trim($_REQUEST['crimeState']) : '';
$aInput['cmd_dist'] = isset($_REQUEST['crimesDist']) ? trim($_REQUEST['crimesDist']) : '';
$aInput['cmd_police_station'] = isset($_REQUEST['policeStation']) ? trim($_REQUEST['policeStation']) : '';
$aInput['cmd_type'] = isset($_REQUEST['crimeType']) ? trim($_REQUEST['crimeType']) : '';
$aInput['cmd_law'] = isset($_REQUEST['crimeLaw']) ? trim($_REQUEST['crimeLaw']) : '';
$aInput['cmd_arrested'] = isset($_REQUEST['crimeArrested']) ? trim($_REQUEST['crimeArrested']) : '';
$aInput['cmd_punishment'] = isset($_REQUEST['crimePunishment']) ? trim($_REQUEST['crimePunishment']) : '';
$aInput['cmd_e_saksh'] = isset($_REQUEST['crimeESaksh']) ? trim($_REQUEST['crimeESaksh']) : '';
$aInput['cmd_history'] = isset($_REQUEST['criminalHistory']) ? trim($_REQUEST['criminalHistory']) : '';
$aInput['cmd_preventive'] = isset($_REQUEST['preventiveAction']) ? trim($_REQUEST['preventiveAction']) : '';
$aInput['cmd_other_serction'] = isset($_REQUEST['otherSection']) ? trim($_REQUEST['otherSection']) : '';
$aInput['cmd_other_law'] = isset($_REQUEST['otherLaw']) ? trim($_REQUEST['otherLaw']) : '';
$aInput['cmd_crimereg_date'] = $aCrimeRegDate[0] . ' ' . $aCrimeRegDate[1] . ':00';
$aInput['cmd_createdby'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
//print_r($aInput);

$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertCriminalRecordCMD($aInput);
$sMsg = 'e';
if ($sReturnInsert['status']) {
    $sMsg = 's';
}
header("Location: http://localhost/ca/add_record.php?m=".$sMsg);
die();
?>