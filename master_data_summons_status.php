<?php
$defaultLang = 'mr-IN';
$sCurrentLang = $_COOKIE["lang"] ?? $defaultLang;
if ($sCurrentLang == 'en-US') {
    require_once 'header.php';
} else {
    require_once 'header-mr.php';
}
require_once 'common-db-function.php';
$dbConnect = new commonDbFunction();
$aCrime = $dbConnect->getSumDataCMD();
//$aCrime = $dbConnect->getCrimeData();
//echo "<pre/>";print_r($aCrime); exit;
$aYear = $aPoliceStation = array();
$aDivData = $aDiv = array();
foreach ($aCrime as $aRowCr) {
    //print_r($aRowCr);
    $aYearTemp = $aPoliceStationTemp = array();
    $aYearTemp = explode('-', $aRowCr['ss_reg_date']);
    if (!isset($aYear[$aYearTemp[0]])) {
        $aYear[$aYearTemp[0]] = 0;
    }
    $aYear[$aYearTemp[0]]++;
    
   if (!isset($aPoliceStation[$aRowCr['ps_name']])) {
        $aPoliceStation[$aRowCr['ps_name']] = 0;
    }
    $aPoliceStation[$aRowCr['ps_name']]++;

    $aDiv[$aRowCr['div_id']][] = $aRowCr;
    if (!isset($aDivData[$aRowCr['div_id']]['div_name'])) {
        $aDivData[$aRowCr['div_id']]['div_name'] = $aRowCr['div_name'];
    } 
    if (!isset($aDivData[$aRowCr['div_id']]['div_email'])) {
        $aDivData[$aRowCr['div_id']]['div_email'] = $aRowCr['div_email'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_pre_balance'])) {
        $aDivData[$aRowCr['div_id']]['ss_pre_balance'] = $aRowCr['ss_pre_balance'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_pre_balance'] += $aRowCr['ss_pre_balance'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_current'])) {
        $aDivData[$aRowCr['div_id']]['ss_current'] = $aRowCr['ss_current'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_current'] += $aRowCr['ss_current'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_total'])) {
        $aDivData[$aRowCr['div_id']]['ss_total'] = $aRowCr['ss_total'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_total'] += $aRowCr['ss_total'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_summoned'])) {
        $aDivData[$aRowCr['div_id']]['ss_summoned'] = $aRowCr['ss_summoned'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_summoned'] += $aRowCr['ss_summoned'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_not_summoned'])) {
        $aDivData[$aRowCr['div_id']]['ss_not_summoned'] = $aRowCr['ss_not_summoned'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_not_summoned'] += $aRowCr['ss_not_summoned'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_post'])) {
        $aDivData[$aRowCr['div_id']]['ss_post'] = $aRowCr['ss_post'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_post'] += $aRowCr['ss_post'];
    }
    if (!isset($aDivData[$aRowCr['div_id']]['ss_balance'])) {
        $aDivData[$aRowCr['div_id']]['ss_balance'] = $aRowCr['ss_balance'];
    } else {
        $aDivData[$aRowCr['div_id']]['ss_balance'] += $aRowCr['ss_balance'];
    }
}
if (!empty($aDivData) && sizeof($aDivData) > 0) {
    foreach ( $aDivData as $index => $aRow) {
        $aDivData[$index]['ss_per'] = ($aRow['ss_summoned']/$aRow['ss_total'])*100;
        $aDivData[$index]['ss_per'] = round($aDivData[$index]['ss_per'], 2);
        $aDivData[$index]['ss_per_balance'] = $aDivData[$index]['ss_per'] - ($aRow['ss_balance']/100);
        $aDivData[$index]['ss_per_balance'] = round($aDivData[$index]['ss_per_balance'], 2);
    }
}
//echo "<pre/>";print_r($aDiv);print_r($aDivData); exit;

?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Summons Status Master Data</a>
        </li>
    </ul>
</div>
<div class=" row">
    <!-------- New Code Starts Here ----->
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-filter"></i> Filter</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-4 col-md-4">
                    <div class="box-content">
                        <div class="col-md-12"> <h4>Year</h4></div>
                        <?php if (isset($aYear) && !empty($aYear) && sizeof($aYear) > 0) {
                            foreach($aYear as $sIndex => $sRowYear) {
                            ?>
                            <button class="btn btn-default button_mr"><?php echo $sIndex; ?></button>
                        <?php
                            }
                        } ?>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box-content">
                        <div class="col-md-12"> <h4>Police Station</h4></div>
                        <?php if (isset($aPoliceStation) && !empty($aPoliceStation) && sizeof($aPoliceStation) > 0) {
                            foreach($aPoliceStation as $sIndex => $sRowYear) {
                            ?>
                            <button class="btn btn-default button_mr"><?php echo $sIndex; ?></button>
                        <?php
                            }
                        } ?>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="box-content">
                    <input type="submit" class="btn btn-success">
                    <input type="reset" class="btn btn-default">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------- New Code Ends Here ----->
</div>
<div class=" row">
    <!-------- New Code Starts Here ----->
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Master Summons Status Record</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Police Station</th>
                            <th>Previous Balance</th>
                            <th>New Entry</th>
                            <th>Total</th>
                            <th>How Many Summoned?</th>
                            <th>How Many Not Summoned?</th>
                            <th>Sent By Post</th>
                            <th>Balance</th>
                            <th>Percentage Summoned</th>
                            <th>Except Balance Percentage Summoned</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            //print_r($aCrime);
                            foreach($aDiv as $sDivID => $aRow) {
                            //print_r($aRow);
                            foreach($aRow as $row) {
                            //print_r($aImage);
                            ?>
                           <tr role="row">
                               <td class="center">
                                   <a href="view_summons_status_data.php?id=<?php echo $row['ss_id']; ?>">
                                       <?php echo $row['ss_reg_date']; ?>
                                   </a>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ps_name']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_pre_balance']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_current']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_total']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_summoned']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_not_summoned']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_post']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_balance']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_per']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ss_per_balance']; ?> </span>
                               </td>
                               
                               <td class="center">
                                   <a href="edit_summons_status_record.php?id=<?php echo $row['ss_id'] ?>" class="btn btn-info">
                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                       
                                   </a>
                                   <a href="edit_summons_status_record.php?id=<?php echo $row['ss_id'] ?>" class="btn btn-warning  btn-setting" >
                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                       
                                   </a>
                               </td>

                           </tr>

                            <?php
                            }

                            ?> 
                            <tr role="row">
                               <td class="center">
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['div_name']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_pre_balance']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_current']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_total']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_summoned']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_not_summoned']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_post']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_balance']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_per']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $aDivData[$sDivID]['ss_per_balance']; ?> </span>
                               </td>
                               
                               <td class="center">
                                   
                               </td>

                           </tr>

                            
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-------- New Code Ends Here ----->
</div>
<?php
require_once 'footer.php';
?>