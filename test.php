<?php
require_once 'header.php';
require_once 'common-db-function.php';
$dbConnect = new commonDbFunction();
$aNotice = $dbConnect->getNotice();
//echo "<pre/>";
//print_r($aNotice);
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

<?php
require_once 'footer.php';
?>