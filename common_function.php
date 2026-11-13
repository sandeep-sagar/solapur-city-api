<?php
//require_once 'config.php';
require_once 'common-db-function.php';
//echo "<pre/>";
//print_r($_REQUEST);
$dbConnect = new commonDbFunction();
$aReturn = array();
$aReturn['status'] = 'failure';
switch ($_REQUEST['fn']) {
    case 'getstate' :
        $aReturn['data'] = $dbConnect->getDistrict($_REQUEST['state']);
        $aReturn['status'] = 'success';
    break;
    case 'getps' :
        $aReturn['data'] = $dbConnect->getPoliceStation($_REQUEST['state'], $_REQUEST['dist']);
        $aReturn['status'] = 'success';
    break;
    case 'getsection' :
        $aReturn['data'] = $dbConnect->getSection($_REQUEST['law']);
        $aReturn['status'] = 'success';
    break;
}
echo json_encode($aReturn);
