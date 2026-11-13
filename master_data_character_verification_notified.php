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
$aCrime = $dbConnect->getCnDataCMD();
//$aCrime = $dbConnect->getCrimeData();
//echo "<pre/>";print_r($aCrime); exit;
$aYear = array();

foreach ($aCrime as $aRowCr) {
    //print_r($aRowCr);
    $aYearTemp = $aPoliceStationTemp = array();
    $aYearTemp = explode('-', $aRowCr['cn_reg_date']);
    if (!isset($aYear[$aYearTemp[0]])) {
        $aYear[$aYearTemp[0]] = 0;
    }
    $aYear[$aYearTemp[0]]++;
   
}


?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Character Verification Notified Master Data</a>
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
                <h2><i class="glyphicon glyphicon-user"></i> Character Verification Notified Service Record</h2>
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
                            <th>Notified Service Name</th>
                            <th>Notified Service Duration</th>
                            <th>Total Received</th>
                            <th>Total Output</th>
                            <th>Total Pending</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            //print_r($aCrime);
                            foreach($aCrime as $row) {
                            //print_r($row);
                            //print_r($aImage);
                            ?>
                           <tr role="row">
                               <td class="center">
                                   <a href="view_record_character_verification_notified.php?id=<?php echo $row['cn_id']; ?>">
                                       <?php echo $row['cn_reg_date']; ?>
                                   </a>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cn_name']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cn_dura']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cn_total_rec']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cn_total_op']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cn_total_pend']; ?> </span>
                               </td>
                               
                               <td class="center">
                                   <a href="edit_record_character_verification_notified.php?id=<?php echo $row['cn_id'] ?>" class="btn btn-warning">
                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                       
                                   </a>
                                   <a href="edit_record_character_verification_notified.php?id=<?php echo $row['cn_id'] ?>" class="btn btn-danger  btn-setting" >
                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                       
                                   </a>
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