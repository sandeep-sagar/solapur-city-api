<?php
require_once 'common-db-function.php';
echo "<pre/>";
print_r($_REQUEST);
//print_r($_FILES);
$aInput = array();

$bFound = true;
foreach ($_FILES['criminalPhoto']['name'] as $sKey => $sValue) {
    $path = 'criminal_photo/' . $_REQUEST['complaintNumber']."_". $sValue;
    if ($bFound) {
        $aInput['criminalPhoto'] = $path;
        $bFound = false;
    } else {
        $aInput['criminalPhoto'] .= '##'.$path;
    }
    @move_uploaded_file($_FILES['criminalPhoto']['tmp_name'][$sKey],$path);
}
$aInput['userid'] = isset($_REQUEST['userid']) ? trim($_REQUEST['userid']) : '';
$aInput['crimeName'] = isset($_REQUEST['crimeName']) ? trim($_REQUEST['crimeName']) : '';
$aInput['crimeDetails'] = isset($_REQUEST['crimeDetails']) ? trim($_REQUEST['crimeDetails']) : '';
$aInput['complaintNumber'] = isset($_REQUEST['complaintNumber']) ? trim($_REQUEST['complaintNumber']) : '';
//$aInput['crimeDate'] = isset($_REQUEST['crimeDate']) ? trim($_REQUEST['crimeDate']) : '';
$aCrimeDate = $aCrimeRegDate = array();
$aCrimeDate = explode('T', $_REQUEST['crimeDate']);
$aCrimeRegDate =  explode('T', $_REQUEST['crimeRegDate']);
$aInput['crimeDate'] = $aCrimeDate[0] . ' ' . $aCrimeDate[1] . ':00';
$aInput['crimeRegDate'] = $aCrimeRegDate[0] . ' ' . $aCrimeRegDate[1] . ':00';
$aInput['crimeState'] = isset($_REQUEST['crimeState']) ? trim($_REQUEST['crimeState']) : '';
$aInput['crimesDist'] = isset($_REQUEST['crimesDist']) ? trim($_REQUEST['crimesDist']) : '';
$aInput['policeStation'] = isset($_REQUEST['policeStation']) ? trim($_REQUEST['policeStation']) : '';
//$aInput['law'] = isset($_REQUEST['law']) ? trim($_REQUEST['law']) : '';
//$aInput['section'] = isset($_REQUEST['section']) ? trim($_REQUEST['section']) : '';
$aInput['criminalName'] = isset($_REQUEST['criminalName']) ? trim($_REQUEST['criminalName']) : '';
$aInput['criminalDob'] = isset($_REQUEST['criminalDob']) ? trim($_REQUEST['criminalDob']) : '';
$aInput['criminalMo'] = isset($_REQUEST['criminalMo']) ? trim($_REQUEST['criminalMo']) : '';
$aInput['criminalReligion'] = isset($_REQUEST['criminalReligion']) ? trim($_REQUEST['criminalReligion']) : '';
$aInput['criminalCast'] = isset($_REQUEST['criminalCast']) ? trim($_REQUEST['criminalCast']) : '';
$aInput['criminalReligionOther'] = isset($_REQUEST['criminalReligionOther']) ? trim($_REQUEST['criminalReligionOther']) : '';
$aInput['criminalAdd'] = isset($_REQUEST['criminalAdd']) ? trim($_REQUEST['criminalAdd']) : '';
$aInput['criminalState'] = isset($_REQUEST['criminalState']) ? trim($_REQUEST['criminalState']) : '';
$aInput['criminalDist'] = isset($_REQUEST['criminalDist']) ? trim($_REQUEST['criminalDist']) : '';
$aInput['criminalPincode'] = isset($_REQUEST['criminalPincode']) ? trim($_REQUEST['criminalPincode']) : '';
$aInput['crimeStatus'] = isset($_REQUEST['crimeStatus']) ? trim($_REQUEST['crimeStatus']) : '';
$aInput['crimeDetect'] = isset($_REQUEST['crimeDetect']) ? trim($_REQUEST['crimeDetect']) : '';
$aInput['crimeNotice'] = isset($_REQUEST['crimeNotice']) ? trim($_REQUEST['crimeNotice']) : '';
$aInput['investigator'] = isset($_REQUEST['investigator']) ? trim($_REQUEST['investigator']) : '';
$aInput['preventiveInfo'] = isset($_REQUEST['preventiveInfo']) ? trim($_REQUEST['preventiveInfo']) : '';
$aInput['preventiveHead'] = isset($_REQUEST['preventiveHead']) ? trim($_REQUEST['preventiveHead']) : '';
$aInput['specialEventCrime'] = isset($_REQUEST['specialEventCrime']) ? trim($_REQUEST['specialEventCrime']) : '';

$bFoundSection = true;
$aCrime = array();
foreach($_REQUEST as $sKey => $sRow) {
    if (str_contains($sKey, 'section_selected')) {
        $aKey = array();
        $aKey = explode('_', $sKey);
        if ($bFoundSection) {
            $aInput['section'] = $aKey[2] . '_' . $aKey[3];
            $bFoundSection = false;
        } else {
            $aInput['section'] .= '##' . $aKey[2] . '_' . $aKey[3];
        }
        $aCrime[] = array('section' => $aKey[3], 'law' => $aKey[2]);
        //$aCrime[$aKey[2]][]['law'] = $aKey[2];
        $aKey = array();
    }
}


$dbConnect = new commonDbFunction();
$sReturnInsert = $dbConnect->insertCriminalRecord($aInput);
//$sReturnInsert = true;
$sMsg = 'e';
$aReturn = array();
if ($sReturnInsert['status']) {
    $sMsg = 's';
    foreach ($aCrime as $aRow) {
        $aInputCrime = array();
        $aInputCrime['crime_cr_id'] = $sReturnInsert['cr_id'];
        $aInputCrime['crime_law'] = $aRow['law'];
        $aInputCrime['crime_section'] = $aRow['section'];
        $aInputCrime['crime_createdby'] = $aInput['userid'];
        $aReturnInsertCrime = $dbConnect->insertCrime($aInputCrime);
    }
}
header("Location: http://localhost/ca/add_record.php?m=".$sMsg);
die();

?>