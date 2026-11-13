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
$sUserID = 1;
//$aCrimeList = $dbConnect->getCrimeList();
$aState = $dbConnect->getState();
$sSelectedState = 14;
$sSelectedDistrict = 32;
$sSelectedPoliceStation = '';
$aDistrict = $dbConnect->getDistrict($sSelectedState);
$aPoliceStation = $dbConnect->getPoliceStation($sSelectedState, $sSelectedDistrict);

$aLaw = $dbConnect->getLaw();

//echo "<pre/>";
//print_r($aState);
?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/">Criminal Record Entry Form</a>
        </li>
    </ul>
</div>
<div class=" row">
    <!-------- New Code Starts Here ----->
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Add Criminal Record For CM Dashboard</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <form id="frAddCrimRecord" role="form" action="add_record_cmd_backend.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="userid" name="userid" value="<?php echo $sUserID; ?>">
                    <div class="form-group col-md-12">
                        <hr>
                        <h4>Crime Information</h4>
                        <hr>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-md-12">
                            <label for="crimeName">Crime</label>
                            <input type="text" class="form-control" id="crimeName" name="crimeName" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="crimeDetails">Crime Details</label>
                            <textarea class="form-control" id="crimeDetails" name="crimeDetails" placeholder="Crime Details" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="complaintNumber">Complaint Number</label>
                            <input type="text" class="form-control" id="complaintNumber" name="complaintNumber" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeSDate">Crime Start Date/Time</label>
                            <input type="datetime-local" class="form-control" id="crimeSDate" name="crimeSDate" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeEDate">Crime End Date/Time</label>
                            <input type="datetime-local" class="form-control" id="crimeEDate" name="crimeEDate" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimePlace">Crime Address</label>
                            <input type="text" class="form-control" id="crimePlace" name="crimePlace" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeLang">Crime Langlatitude and longitude</label>
                            <input type="text" class="form-control" id="crimeLang" name="crimeLang" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <BR>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeState">Crime State</label>
                            <select name="crimeState" id="crimeState" data-rel="chosen" class="col-md-12" >
                                <option value="">Select State</option>
                                <?php
                                foreach ( $aState as $aRow) { 
                                    if ($aRow['state_id'] == $sSelectedState) { ?>
                                        <option value="<?php echo $aRow['state_id']; ?>" selected><?php echo $aRow['state_name']; ?></option>
                                    <?php
                                    } else {
                                    ?>
                                    <option value="<?php echo $aRow['state_id']; ?>"><?php echo $aRow['state_name']; ?></option>
                                <?php } 
                                }?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimesDist">Crime District</label>
                            <select name="crimesDist" id="crimesDist" data-rel="chosen" class="col-md-12" >
                                <option value="">Select</option>
                                <?php
                                foreach ( $aDistrict as $aRow) {
                                    if ($aRow['dist_id'] == $sSelectedDistrict) {
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
                            <label for="policeStation">Crime Police Station</label>
                            <?php if (!empty($sSelectedPoliceStation) && $sSelectedPoliceStation != '') { 
                                ?>
                                    <select name="policeStation" id="policeStation" data-rel="chosen" class="col-md-12" >    
                                <?php
                            } else {?>
                            <select name="policeStation" id="policeStation" data-rel="chosen" class="col-md-12" >
                                <?php } ?>
                                <option value="">Select</option>
                                <?php
                                foreach ( $aPoliceStation as $aRow) {
                                    if ($aRow['ps_id'] == $sSelectedPoliceStation) {
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
                            <BR>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="crimeType">Crime Type</label>
                            <input type="text" class="form-control" id="crimeType" name="crimeType" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeLaw">Crime Law</label>
                            <input type="text" class="form-control" id="crimeLaw" name="crimeLaw" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <BR>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeArrested">Arrested Count</label>
                            <input type="text" class="form-control" id="crimeArrested" name="crimeArrested" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimePunishment">Duration of Punishment</label>
                            <input type="text" class="form-control" id="crimePunishment" name="crimePunishment" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <BR>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeESaksh">Does E Saksh Done?</label>
                            <input type="text" class="form-control" id="crimeESaksh" name="crimeESaksh" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="criminalHistory">Criminal History</label>
                            <input type="text" class="form-control" id="criminalHistory" name="criminalHistory" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="preventiveAction">Any Preventive Action Taken?</label>
                            <input type="text" class="form-control" id="preventiveAction" name="preventiveAction" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="otherSection">Any Other Sections</label>
                            <input type="text" class="form-control" id="otherSection" name="otherSection" placeholder="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="otherLaw">Any Other Law</label>
                            <input type="text" class="form-control" id="otherLaw" name="otherLaw" placeholder="">
                        </div>
                        <div class="form-group col-md-12">
                            <BR>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="crimeRegDate">Crime Registration Date</label>
                            <input type="datetime-local" class="form-control" id="crimeRegDate" name="crimeRegDate" placeholder="">
                        </div>

                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="box-content">
                            <input type="submit" class="btn btn-success">
                            <input type="reset" class="btn btn-default">
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
        if (!document.getElementById("row_" + lawId + '_' + sectionId)) {
            
            var newRow = '<tr id="row_' + lawId + '_' + sectionId +'">' +
                            '<td class="col-md-4">' +
                                '<input type="text" class="form-control" id="law_selected_' + lawId + '" name="law_selected_' + lawId + '"  value="' + lawSelected + '" />' +
                            '</td>' +
                            '<td class="col-md-4"> ' +
                                '<input type="text" class="form-control" id="section_selected_' + sectionId + '" name="section_selected_' + lawId + '_' + sectionId + '" value="' + sectionSelected + '"  /> ' +
                            '</td>' +
                            '<td class="col-md-4">' +
                            '<button type="button" ID="removeLaw_' + lawId + '_' + sectionId +'" class="btn btn-danger" onclick="removeLaw('+sectionId +')">Delete</button>' +
                            '</td> ' +
                        '</tr>';
            $('#law_section_table').append(newRow);
        } else {
            alert ("Section already added");
        }
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

 function removeLaw(id) {
    //alert("Remove ID = " + id);
    $("#row_1_" + id).remove();
 }

</script>