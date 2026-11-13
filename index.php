<?php
require_once 'header.php';
require_once 'common-db-function.php';
$dbConnect = new commonDbFunction();
$aNotice = $dbConnect->getNotice();
$aRecentActivity = $dbConnect->getRecentActivity();
//echo "<pre/>";
//print_r($aRecentActivity);
?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-8">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Notification</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12">
                    <div class="box-content marqueh">
                        <ul class="dashboard-list">
                            <marquee scrollamount="3" direction="up" loop="true" style="height:200px">
                            <?php
                                foreach($aNotice as $aRow) {
                            ?>
                            <li>
                                <a href="<?php echo $aRow['notice_link']; ?>">
                                    <i class="glyphicon glyphicon-arrow-up"></i>
                                    <?php echo $aRow['notice_name']; ?>
                                </a>
                            </li>
                            <?php
                            } ?>

                            </marquee>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Recent Activity</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-12 col-md-12">
                    <div class="box-content marqueh">
                        <ul class="dashboard-list">
                            <marquee scrollamount="3" direction="up" loop="true"  style="height:200px">
                                <?php foreach ($aRecentActivity as $aRow) { ?>
                                <li>
                                    <a href="view_crime.php?id=<?php echo $aRow['cr_id'];  ?>">
                                        <i class="glyphicon glyphicon-arrow-up"></i>
                                        <?php echo $aRow['cr_complaint_number']. '-' . $aRow['cr_crime_name'] . ' Added'; ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </marquee>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'footer.php';
?>