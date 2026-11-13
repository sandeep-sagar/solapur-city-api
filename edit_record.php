<?php
require_once 'header.php';
require_once 'common-db-function.php';
$dbConnect = new commonDbFunction();
$dbConnect = new commonDbFunction();
$sCrimeID = isset($_REQUEST['id']) ? trim($_REQUEST['id']) : '';
$aCrimeData = $dbConnect->getCrimeData($sCrimeID);
$aCrime = $dbConnect->getCrime($sCrimeID);
$aDistrict = $dbConnect->getDistrict($aCrimeData[0]['cr_crime_state']);
$aDistrictCm = $dbConnect->getDistrict($aCrimeData[0]['cr_criminal_state']);
$aState = $dbConnect->getState();
$aPoliceStation = $dbConnect->getPoliceStation($aCrimeData[0]['cr_crime_state'], $aCrimeData[0]['cr_crimes_dist']);
$aLaw = $dbConnect->getLaw();
$aCrimeStatus = $dbConnect->getCrimeStatus();
$aDetect = $dbConnect->getDetect();
$aPreventiveHead = $dbConnect->getPreventiveHead();
$aSpecialEventCrime = $dbConnect->getSpecialEventCrime();
$aStatus = $dbConnect->getStatus();
$aReligion = $dbConnect->getReligion();

if ($_REQUEST['test']==1) {
    echo "<pre/>";
    echo "<br/> Crime Data";
    print_r($aCrimeData);
    echo "<br/> aLaw";
    print_r($aLaw);
}
?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/">Edit Criminal Record</a>
        </li>
    </ul>
</div>
<div class=" row">
    <!-------- New Code Starts Here ----->
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> <?php echo $aCrimeData[0]['cr_criminal_name'] ?> Criminal Record</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <form id="frAddCrimRecord" role="form" action="edit_record_backend.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="userid" name="userid" value="1">
                    <input type="hidden" id="transid" name="transid" value="127">
                    <div class="form-group col-md-12">
                        <hr>
                        <h4>Crime Information</h4>
                        <hr>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-md-12">
                            <label for="crimeName">Crime</label>
                            <input type="text" class="form-control" id="crimeName" name="crimeName" value="<?php echo $aCrimeData[0]['cr_crime_name']; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="crimeDetails">Crime Details</label>
                            <textarea class="form-control" id="crimeDetails" name="crimeDetails" placeholder="Crime Details" rows="5"><?php echo $aCrimeData[0]['cr_crime_details']; ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complaintNumber">Complaint Number</label>
                            <input type="text" class="form-control" id="complaintNumber" name="complaintNumber" value="<?php echo $aCrimeData[0]['cr_complaint_number']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeDate">Crime Date</label>
                            <input type="datetime-local" class="form-control" id="crimeDate" name="crimeDate" value="<?php echo $aCrimeData[0]['cr_crime_date']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeRegDate">Crime Registration Date</label>
                            <input type="datetime-local" class="form-control" id="crimeRegDate" name="crimeRegDate" value="<?php echo $aCrimeData[0]['cr_crimereg_date']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeState">State</label>
                            <select name="crimeState" id="crimeState" data-rel="chosen" class="col-md-12">
                                <option value="">Select State</option>
                                <?php
                                foreach ( $aState as $aRow) {
                                    if ($aRow['state_id'] == $aCrimeData[0]['cr_crime_state']) {
                                        ?>
                                        <option value="<?php echo $aRow['state_id']; ?>" selected><?php echo $aRow['state_name']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $aRow['state_id']; ?>"><?php echo $aRow['state_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimesDist">District</label>
                            <select name="crimesDist" id="crimesDist" data-rel="chosen" class="col-md-12" >
                                <option value="">Select</option>
                                <?php
                                foreach ( $aDistrict as $aRow) {
                                    if ($aRow['dist_id'] == $aCrimeData[0]['cr_crimes_dist']) {
                                        ?>
                                        <option value="<?php echo $aRow['dist_id']; ?>" selected><?php echo $aRow['dist_name']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $aRow['dist_id']; ?>"><?php echo $aRow['dist_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="policeStation">Police Station</label>
                            <select name="policeStation" id="policeStation" data-rel="chosen" class="col-md-12" >
                                <option value="">Select</option>
                                <?php
                                foreach ( $aPoliceStation as $aRow) {
                                    if ($aRow['ps_id'] == $aCrimeData[0]['cr_police_station']) {
                                        ?>
                                        <option value="<?php echo $aRow['ps_id']; ?>" selected><?php echo $aRow['ps_name']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $aRow['ps_id']; ?>"><?php echo $aRow['ps_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                        </div>
                         <div class="form-group col-md-12">
                            <table class="col-md-12" id="law_section_table">
                                <tr>
                                    <td class="col-md-4">
                                            <label for="law">Law</label>
                                    </td>
                                    <td class="col-md-4">
                                            <label for="section">Section</label>
                                    </td>
                                    <td class="col-md-4"></td>
                                </tr>
                                <tr>
                                    <td class="col-md-4">
                                        <?php foreach ($aLaw as $row1) { ?>
                                        <input type="hidden"  id="<?php echo 'law_'.$row1['law_id']; ?>"  value="<?php echo $row1['law_name']; ?>"  />
                                        <?php } ?>
                                        <select id="law" name="law" data-rel="chosen" class="col-md-12"  style="height: 38px">
                                            <option value="">Select</option>
                                            <?php foreach ($aLaw as $row) { ?>
                                            <option value="<?php echo $row['law_id']; ?>"><?php echo $row['law_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td class="col-md-4">
                                        <div id="sectionH"></div>
                                        <select id="section" name="section" data-rel="chosen" class="col-md-12" style="height: 38px" disabled>
                                            <option value="">Select</option>
                                        </select>
                                    </td>
                                    <td class="col-md-4">
                                        <button type="submit" ID="addLaw" class="btn btn-default" onclick="return false; " disabled>Add</button>
                                    </td>
                                </tr>
                                <?php foreach ($aCrime as $aRow) { ?>
                                <tr>
                                    <td class="col-md-4">
                                        <input type="text" class="form-control"  id="law_selected_<?php echo $aRow['crime_law']; ?>" name="law_selected_<?php echo $aRow['crime_law']; ?>"  value="<?php echo $aRow['law_name']; ?>" readonly>
                                    </td>
                                    <td class="col-md-4">
                                        <input type="text" class="form-control"  id="section_selected_<?php echo $aRow['crime_section']; ?>" name="section_selected_<?php echo $aRow['crime_law']; ?>_<?php echo $aRow['crime_section']; ?>"  value="<?php echo $aRow['section_no'] .' - '. $aRow['section_name']; ?>" readonly>
                                    </td>
                                    <td class="col-md-4">
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                            <h4>Criminal Information</h4>
                            <hr>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalName">Name</label>
                            <input type="text" class="form-control" id="criminalName" name="criminalName" value="<?php echo $aCrimeData[0]['cr_criminal_name']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalDob">Date Of Birth</label>
                            <input type="date" class="form-control" id="criminalDob" name="criminalDob" value="<?php echo $aCrimeData[0]['cr_criminal_dob']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalMo">Mobile Number</label>
                            <input type="text" class="form-control" id="criminalMo" name="criminalMo" value="<?php echo $aCrimeData[0]['cr_criminal_mo']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalReligion">Religion</label>
                            <select name="criminalReligion" id="criminalReligion" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select Religion</option>
                                <?php
                                foreach ( $aReligion as $aRow) {
                                    if ($aRow['rl_id'] == $aCrimeData[0]['cr_criminal_religion']) {
                                        ?>
                                        <option value="<?php echo $aRow['rl_id']; ?>" selected><?php echo $aRow['rl_name']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $aRow['rl_id']; ?>"><?php echo $aRow['rl_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                            <?php if (isset($aCrimeData[0]['cr_criminal_religion_other']) && !empty($aCrimeData[0]['cr_criminal_religion_other'])) { ?>
                            <div class="form-group" id="crimOther" >
                               <?php } else { ?>
                               <div class="form-group" id="crimOther" style="display: none;">
                               <?php } ?>
                                <hr>
                                <label for="criminalReligionOther">Other Religion</label>
                                <input type="text" class="form-control" id="criminalReligionOther" name="criminalReligionOther" value="<?php echo $aCrimeData[0]['cr_criminal_religion_other']; ?>" >
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalCast">Cast</label>
                            <input type="text" class="form-control" id="criminalCast" name="criminalCast" value="<?php echo $aCrimeData[0]['cr_criminal_cast']; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="criminalAdd">Address</label>
                            <input type="text" class="form-control" id="criminalAdd" name="criminalAdd" value="<?php echo $aCrimeData[0]['cr_criminal_add']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalState">State</label>
                            <select name="criminalState" id="criminalState" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select</option>
                                <?php
                                foreach ( $aState as $aRow) {
                                    if ($aRow['state_id'] == $aCrimeData[0]['cr_criminal_state']) {
                                        ?>
                                        <option value="<?php echo $aRow['state_id']; ?>" selected><?php echo $aRow['state_name']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $aRow['state_id']; ?>"><?php echo $aRow['state_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalDist">District</label>
                            <select name="criminalDist" id="criminalDist" data-rel="chosen" class="col-md-12 form-control" >
                                <option value="">Select</option>
                                <?php
                                foreach ( $aDistrictCm as $aRow) {
                                    if ($aRow['dist_id'] == $aCrimeData[0]['cr_criminal_dist']) {
                                        ?>
                                        <option value="<?php echo $aRow['dist_id']; ?>" selected><?php echo $aRow['dist_name']; ?></option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="<?php echo $aRow['dist_id']; ?>"><?php echo $aRow['dist_name']; ?></option>
                                        <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalPincode">Pincode</label>
                            <input type="text" class="form-control" id="criminalPincode" name="criminalPincode" value="<?php echo $aCrimeData[0]['cr_criminal_pincode']; ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="criminalPhoto">Criminal Photo</label>

                            <div class="form-group col-md-12">
                                </div>
                                <div class="form-group col-md-4">
                                <input type="file" class="form-control"  multiple  id="criminalPhoto" name="criminalPhoto[]">
                                </div>
                                <div class="form-group col-md-8">
                                <ul class="thumbnails gallery-edit">
                                    <?php
                                    $aImages = explode("##", $aCrimeData[0]['cr_criminal_photo']);
                                    foreach($aImages as $sIndex => $aRow) {
                                        ?>
                                    <li id="image-<?php echo $sIndex; ?>" class="thumbnail">
                                        <div class="thumbnailImg">
                                            <button type="button" class="close" onclick="removeImage(<?php echo $sIndex; ?>)" >X</button>
                                            <input type="hidden" class="form-control" id="criminalPhotoEdit_<?php echo $sIndex; ?>" name="criminalPhotoEdit_<?php echo $sIndex; ?>" value="<?php echo $aRow; ?>">
                                            <a style="background:url(<?php echo $aRow; ?>)"
                                           title="<?php echo $aCrimeData[0]['cr_crime_name']; ?>" href="<?php echo $aRow; ?>"><img class="grayscale" src="<?php echo $aRow; ?>" alt="<?php echo $aCrimeData[0]['cr_crime_name']; ?>"></a>
                                        </div>
                                    </li>
                                <?php }?>

                                </ul>
                                </div>
                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                            <h4>Other Information</h4>
                            <hr>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeStatus">Status</label>
                            <select name="crimeStatus" id="crimeStatus" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select</option>
                                <?php
                                foreach ( $aStatus as $aRow) {
                                    if ($aRow['st_id'] == $aCrimeData[0]['cr_crime_status']) { ?>
                                    <option value="<?php echo $aRow['st_id']; ?>" selected><?php echo $aRow['st_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $aRow['st_id']; ?>" ><?php echo $aRow['st_name']; ?></option>
                                <?php }
                                 } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeDetect">Detect/UnDetect</label>
                            <select name="crimeDetect" id="crimeDetect" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select</option>
                                <?php
                                foreach ( $aDetect as $aRow) {
                                    if ($aRow['dt_id'] == $aCrimeData[0]['cr_crime_detect']) { ?>
                                        <option value="<?php echo $aRow['dt_id']; ?>" selected><?php echo $aRow['dt_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $aRow['dt_id']; ?>" ><?php echo $aRow['dt_name']; ?></option>
                                <?php }
                                 } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeNotice">Arrest/Notice</label>
                            <select name="crimeNotice" id="crimeNotice" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select</option>
                                <?php
                                foreach ( $aCrimeStatus as $aRow) {
                                    if ($aRow['cr_id'] == $aCrimeData[0]['cr_crime_notice']) { ?>
                                        <option value="<?php echo $aRow['cr_id']; ?>" selected><?php echo $aRow['cr_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $aRow['cr_id']; ?>" ><?php echo $aRow['cr_name']; ?></option>
                                <?php }
                                 } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="investigator">Investigation Officer</label>
                            <input type="text" class="form-control" id="investigator"  name="investigator" value="<?php echo $aCrimeData[0]['cr_investigator']; ?>">
                        </div><div class="form-group col-md-4">
                            <label for="preventiveInfo">Preventive Info</label>
                            <input type="text" class="form-control" id="preventiveInfo" name="preventiveInfo" value="<?php echo $aCrimeData[0]['cr_preventive_info']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="preventiveHead">Preventive Head</label>
                            <select name="preventiveHead" id="preventiveHead" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select</option>
                                <?php
                                foreach ( $aPreventiveHead as $aRow) {
                                    if ($aRow['ph_id'] == $aCrimeData[0]['cr_preventive_head']) { ?>
                                        <option value="<?php echo $aRow['ph_id']; ?>" selected><?php echo $aRow['ph_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $aRow['ph_id']; ?>" ><?php echo $aRow['ph_name']; ?></option>
                                <?php }
                                 } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="specialEventCrime">Special Event Crime</label>
                            <select name="specialEventCrime" id="specialEventCrime" data-rel="chosen" class="col-md-12 form-control">
                                <option value="">Select</option>
                                <?php
                                foreach ( $aSpecialEventCrime as $aRow) {
                                    if ($aRow['sec_id'] == $aCrimeData[0]['cr_special_event_crime']) { ?>
                                        <option value="<?php echo $aRow['sec_id']; ?>" selected><?php echo $aRow['sec_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $aRow['sec_id']; ?>" ><?php echo $aRow['sec_name']; ?></option>
                                <?php }
                                 } ?>
                            </select>
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="box-content">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-------- New Code Ends Here ----->
</div>
<?php
require_once 'footer.php';
?>
<script>
$(document).ready(function() {

    $("#criminalState").on("change",function () {
        var stateId = $("#criminalState").val();
        //alert("State Value got changed = State ID = " + stateId);
        $.ajax({
            type: "GET",
            url: "common_function.php?fn=getstate&state=" + stateId,
            dataType: 'json',
            success: function(response){
                $(".response").empty();
                $.each(response, function(key, value){
                    if (key === 'status') {
                        success = 1;;
                    } else if (key == 'data') {
                        //var sDistrictOption = ('#crimesDist');
                        $("#criminalDist").empty();
                        $('<option value="">Select District</option>').appendTo("#criminalDist");
                        $.each(value, function(key1, value1){
                            //console.log(" Key = " + key1 + " District ID = " + value1['dist_id'] + "; Name = " + value1['dist_name']);
                            $('<option value="' + value1['dist_id'] + '">' + value1['dist_name'] + '</option>').appendTo("#criminalDist");
                            $('#criminalDist').prop('disabled', false);
                            $("#criminalDist").trigger("chosen:updated");
                        });
                    }
                });
            }
        });
    });
    $("#crimesDist").on("change",function () {
        var stateId = $("#crimeState").val();
        var distId = $("#crimesDist").val();
        //alert("State Value got changed = State ID = " + stateId);
        $.ajax({
            type: "GET",
            url: "common_function.php?fn=getps&state=" + stateId +"&dist=" + distId,
            dataType: 'json',
            success: function(response){
                $(".response").empty();
                $.each(response, function(key, value){
                    if (key === 'status') {
                        success = 1;;
                    } else if (key == 'data') {
                        //var sDistrictOption = ('#crimesDist');
                        $("#policeStation").empty();
                        $('<option value="">Select Police Station</option>').appendTo("#policeStation");
                        $.each(value, function(key1, value1){
                            //console.log(" Key = " + key1 + " District ID = " + value1['dist_id'] + "; Name = " + value1['dist_name']);
                            $('<option value="' + value1['ps_id'] + '">' + value1['ps_name'] + '</option>').appendTo("#policeStation");
                            $('#policeStation').prop('disabled', false);
                            $("#policeStation").trigger("chosen:updated");
                        });
                    }
                });
            }
        });
    });
    $("#crimeState").on("change",function () {
        var stateId = $("#crimeState").val();
        $("#policeStation").empty();
        $('#policeStation').prop('disabled', true);
        $("#policeStation").trigger("chosen:updated");
        //alert("State Value got changed = State ID = " + stateId);
        $.ajax({
            type: "GET",
            url: "common_function.php?fn=getstate&state=" + stateId,
            dataType: 'json',
            success: function(response){
                $(".response").empty();
                $.each(response, function(key, value){
                    if (key === 'status') {
                        success = 1;;
                    } else if (key == 'data') {
                        //var sDistrictOption = ('#crimesDist');
                        $("#crimesDist").empty();
                        $('<option value="">Select District</option>').appendTo("#crimesDist");
                        $.each(value, function(key1, value1){
                            //console.log(" Key = " + key1 + " District ID = " + value1['dist_id'] + "; Name = " + value1['dist_name']);
                            $('<option value="' + value1['dist_id'] + '">' + value1['dist_name'] + '</option>').appendTo("#crimesDist");
                            $('#crimesDist').prop('disabled', false);
                            $("#crimesDist").trigger("chosen:updated");
                        });
                    }
                });
            }
        });
    });
    $("#law").on("change",function () {
        var lawId = $("#law").val();
        $('#addLaw').prop('disabled', true);
        $("#section").empty();
        $("#section").trigger("chosen:updated");
        //alert("State Value got changed = State ID = " + stateId);
        $.ajax({
            type: "GET",
            url: "common_function.php?fn=getsection&law=" + lawId,
            dataType: 'json',
            success: function(response){
                $(".response").empty();
                $.each(response, function(key, value){
                    if (key === 'status') {
                        success = 1;;
                    } else if (key == 'data') {
                        //var sDistrictOption = ('#crimesDist');
                        $("#section").empty();
                        $("#sectionH").empty();
                        $('<option value="">Select Section</option>').appendTo("#section");
                        $.each(value, function(key1, value1){
                            //console.log(" Key = " + key1 + " District ID = " + value1['dist_id'] + "; Name = " + value1['dist_name']);
                            $('<option value="' + value1['section_id'] + '">' + value1['section_no'] + " - " +  value1['section_name'] + '</option>').appendTo("#section");
                            $('<input type="hidden" id="section_' + value1['section_id'] +  '" value="' + value1['section_no'] + " - " +  value1['section_name'] +  '">').appendTo("#sectionH");
                            $('#section').prop('disabled', false);
                            $("#section").trigger("chosen:updated");
                        });
                    }
                });
            }
        });
    });
    $("#section").on("change",function () {
        var section = $("#section").val();
        if (section != '' ) {
            $('#addLaw').prop('disabled', false);
        } else {
            $('#addLaw').prop('disabled', true);
        }

    });
    $("#addLaw").on("click",function () {
        var lawId = $("#law").val();
        var sectionId = $("#section").val();
        var lawSelected = $("#law_" + lawId).val();
        var sectionSelected = $("#section_" + sectionId).val();
        //alert("Law Selected = " + lawSelected + ' Section Selected = ' + sectionSelected);
        var newRow = '<tr>' +
                        '<td class="col-md-4">' +
                            '<input type="text" class="form-control" id="law_selected_' + lawId + '" name="law_selected_' + lawId + '"  value="' + lawSelected + '" readonly/>' +
                         '</td>' +
                         '<td class="col-md-4"> ' +
                             '<input type="text" class="form-control" id="section_selected_' + sectionId + '" name="section_selected_' + lawId + '_' + sectionId + '" value="' + sectionSelected + '"  readonly /> ' +
                         '</td>' +
                         '<td class="col-md-4"></td> ' +
                     '</tr>';
        $('#law_section_table').append(newRow);
    });
    $("#criminalReligion").on("change",function () {
        var criminalReligion = $("#criminalReligion").val();
        if (criminalReligion == '7' ) {
            $('#crimOther').show();
        } else {
            $('#crimOther').hide();
        }
    });

 });
function removeImage(ID) {
        $("#image-"+ID).hide();
        $("#criminalPhotoEdit_"+ID).val('');
    }
</script>