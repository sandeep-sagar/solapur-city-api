<?php
require_once 'header.php';
require_once 'common-db-function.php';
$dbConnect = new commonDbFunction();
$sCrimeID = isset($_REQUEST['id']) ? trim($_REQUEST['id']) : '';
$aCrimeData = $dbConnect->getCrimeData($sCrimeID);
$aCrime = $dbConnect->getCrime($sCrimeID);
//$aLaw = $dbConnect->getLaw();
//echo "<pre/>";
//print_r($aCrime);
?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/">View Criminal Record</a>
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
                <form id="frAddCrimRecord" role="form" action="add_record_backend.php" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="crimeName" name="crimeName" value="<?php echo $aCrimeData[0]['cr_crime_name']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="crimeDetails">Crime Details</label>
                            <textarea class="form-control" id="crimeDetails" name="crimeDetails"  rows="5" disabled><?php echo $aCrimeData[0]['cr_crime_details']; ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complaintNumber">Complaint Number</label>
                            <input type="text" class="form-control" id="complaintNumber" name="complaintNumber"  value="<?php echo $aCrimeData[0]['cr_complaint_number']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeDate">Crime Date</label>
                            <input type="datetime-local" class="form-control" id="crimeDate" name="crimeDate"   value="<?php echo $aCrimeData[0]['cr_crime_date']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeRegDate">Crime Registration Date</label>
                            <input type="datetime-local" class="form-control" id="crimeRegDate" name="crimeRegDate"   value="<?php echo $aCrimeData[0]['cr_crimereg_date']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeState">State</label>
                            <input type="text" class="form-control" id="crimeState" name="crimeState"   value="<?php echo $aCrimeData[0]['cr_state_name']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimesDist">District</label>
                            <input type="text" class="form-control" id="crimesDist" name="crimesDist"   value="<?php echo $aCrimeData[0]['cr_dist_name']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="policeStation">Police Station</label>
                            <input type="text" class="form-control" id="policeStation" name="policeStation"   value="<?php echo $aCrimeData[0]['ps_name']; ?>" disabled>

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
                                <?php foreach ($aCrime as $aRow) { ?>
                                <tr>
                                    <td class="col-md-4">
                                        <input type="text" class="form-control"   value="<?php echo $aRow['law_name']; ?>" disabled>
                                    </td>
                                    <td class="col-md-4">
                                        <input type="text" class="form-control"   value="<?php echo $aRow['section_no'] .' - '. $aRow['section_name']; ?>" disabled>
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
                            <input type="text" class="form-control" id="criminalName" name="criminalName"   value="<?php echo $aCrimeData[0]['cr_criminal_name']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalDob">Date Of Birth</label>
                            <input type="date" class="form-control" id="criminalDob" name="criminalDob"   value="<?php echo $aCrimeData[0]['cr_criminal_dob']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalMo">Mobile Number</label>
                            <input type="text" class="form-control" id="criminalMo" name="criminalMo"   value="<?php echo $aCrimeData[0]['cr_criminal_mo']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalReligion">Religion</label>
                            <?php if (isset($aCrimeData[0]['cr_criminal_religion'])) { ?>
                                <input type="text" class="form-control" id="criminalReligion" name="criminalReligion"   value="<?php echo $aCrimeData[0]['cr_criminal_religion']; ?>" disabled>
                            <?php } else {?>
                                <input type="text" class="form-control" id="criminalReligionOther" name="criminalReligionOther"  value="<?php echo $aCrimeData[0]['cr_criminal_religion_other'] ;?>"  disabled>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalCast">Cast</label>
                            <input type="text" class="form-control" id="criminalCast" name="criminalCast" value="<?php echo $aCrimeData[0]['cr_criminal_cast'] ;?>" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="criminalAdd">Address</label>
                            <input type="text" class="form-control" id="criminalAdd" name="criminalAdd" value="<?php echo $aCrimeData[0]['cr_criminal_add']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalState">State</label>
                            <input type="text" class="form-control" id="criminalState" name="criminalState" value="<?php echo $aCrimeData[0]['cm_state_name']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalDist">District</label>
                            <input type="text" class="form-control" id="criminalDist" name="criminalDist" value="<?php echo $aCrimeData[0]['cm_dist_name']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalPincode">Pincode</label>
                            <input type="text" class="form-control" id="criminalPincode" name="criminalPincode" value="<?php echo $aCrimeData[0]['cr_criminal_pincode']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="criminalPhoto">Criminal Photo</label>
                            <ul class="thumbnails gallery">
                                <?php
                                    $aPhoto = explode("##", $aCrimeData[0]['cr_criminal_photo']);
                                    foreach ($aPhoto as $aRowP) {
                                ?>
                                <li id="image-1" class="thumbnail">
                                    <a style="background:url(<?php echo $aRowP; ?>)"
                                       title="<?php echo $aCrimeData[0]['cr_criminal_name']; ?>" href="<?php echo $aRowP; ?>"><img class="grayscale" src="<?php echo $aRowP; ?>" alt="<?php echo $aCrimeData[0]['cr_criminal_name']; ?>"></a>
                                </li>
                                <?php } ?>
                            </ul>

                        </div>
                        <div class="form-group col-md-12">
                            <hr>
                            <h4>Other Information</h4>
                            <hr>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeStatus">Status</label>
                            <input type="text" class="form-control" id="crimeStatus" name="crimeStatus" value="<?php echo ucfirst($aCrimeData[0]['cr_crime_status']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeDetect">Detect/UnDetect</label>
                            <input type="text" class="form-control" id="crimeDetect" name="crimeDetect" value="<?php echo ucfirst($aCrimeData[0]['cr_crime_detect']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeNotice">Arrest/Notice</label>
                            <input type="text" class="form-control" id="crimeNotice" name="crimeNotice" value="<?php echo ucfirst($aCrimeData[0]['cr_crime_notice']); ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="investigator">Investigation Officer</label>
                            <input type="text" class="form-control" id="investigator"  name="investigator" value="<?php echo $aCrimeData[0]['cr_investigator']; ?>" disabled>
                        </div><div class="form-group col-md-4">
                            <label for="preventiveInfo">Preventive Info</label>
                            <input type="text" class="form-control" id="preventiveInfo" name="preventiveInfo" value="<?php echo $aCrimeData[0]['cr_preventive_info']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="preventiveHead">Preventive Head</label>
                            <input type="text" class="form-control" id="preventiveHead" name="preventiveHead" value="<?php echo $aCrimeData[0]['cr_preventive_head']; ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="specialEventCrime">Special Event Crime</label>
                            <input type="text" class="form-control" id="specialEventCrime" name="specialEventCrime" value="<?php echo $aCrimeData[0]['cr_special_event_crime']; ?>" disabled>
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
                            '<input type="text" class="form-control" id="law_selected_' + lawId + '" name="law_selected_' + lawId + '"  value="' + lawSelected + '" />' +
                         '</td>' +
                         '<td class="col-md-4"> ' +
                             '<input type="text" class="form-control" id="section_selected_' + sectionId + '" name="section_selected_' + lawId + '_' + sectionId + '" value="' + sectionSelected + '"  /> ' +
                         '</td>' +
                         '<td class="col-md-4"></td> ' +
                     '</tr>';
        $('#law_section_table').append(newRow);
    });
    $("#criminalReligion").on("change",function () {
        var criminalReligion = $("#criminalReligion").val();
        if (criminalReligion == 'Other' ) {
            $('#crimOther').show();
        } else {
            $('#crimOther').hide();
        }
    });
 });

</script>