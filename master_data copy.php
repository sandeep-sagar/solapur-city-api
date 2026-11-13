<?php
require_once 'header.php';
require_once 'common-db-function.php';
$dbConnect = new commonDbFunction();
$aCrime = $dbConnect->getCrimeData();
//echo "<pre/>";
foreach($aCrime as $sKey => $aRow) {
    $aCrimes = array();
    $aCrimes = $dbConnect->getCrime($aRow['cr_id']);
    $sCrime = '';
    $bFound = true;
    foreach ($aCrimes as $aRowCr) {
        if ($bFound) {
            $bFound = false;
            $sCrime = $aRowCr['law_short'] . '-' . $aRowCr['section_no'] . '|' . substr($aRowCr['section_name'], 0, 10);
        } else {
            $sCrime .= ', ' . $aRowCr['law_short'] . '-' . $aRowCr['section_no'] . '|' . substr($aRowCr['section_name'], 0, 10);
        }
    }
    $aCrime[$sKey]['cr_crimes'] = $sCrime;
    //print_r($aCrimes);
}

//print_r($aCrime);
?>

<!-- content starts -->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Master Data</a>
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
                        <button class="btn btn-default button_mr">2025</button>
                        <button class="btn btn-default button_mr">2024</button>
                        <button class="btn btn-default button_mr">2023</button>
                        <button class="btn btn-default button_mr">2022</button>
                        <button class="btn btn-default button_mr">2021</button>
                        <button class="btn btn-default button_mr">2020</button>
                        <button class="btn btn-default button_mr">2019</button>
                        <button class="btn btn-default button_mr">2018</button>
                        <button class="btn btn-default button_mr">2017</button>
                        <button class="btn btn-default button_mr">2016</button>
                        <button class="btn btn-default button_mr">2015</button>
                        <button class="btn btn-default button_mr">2014</button>
                        <button class="btn btn-default button_mr">2013</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box-content">
                        <div class="col-md-12"> <h4>Crime</h4></div>
                        <button class="btn btn-default button_mr">Armed</button>
                        <button class="btn btn-default button_mr">TREPASS</button>
                        <button class="btn btn-default button_mr">THEFT</button>
                        <button class="btn btn-default button_mr">ROBBERY</button>
                        <button class="btn btn-default button_mr">RIOT</button>
                        <button class="btn btn-default button_mr">RAPE</button>
                        <button class="btn btn-default button_mr">PROB</button>
                        <button class="btn btn-default button_mr">POCSO</button>
                        <button class="btn btn-default button_mr">PITA</button>
                        <button class="btn btn-default button_mr">MONEY</button>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="box-content">
                        <div class="col-md-12"> <h4>Police Station</h4></div>
                        <button class="btn btn-default button_mr">Faujdar Chawadi</button>
                        <button class="btn btn-default button_mr">Jail Road</button>
                        <button class="btn btn-default button_mr">Jodbhavi Peth</button>
                        <button class="btn btn-default button_mr">MIDC</button>
                        <button class="btn btn-default button_mr">Sadar Bazar</button>
                        <button class="btn btn-default button_mr">Salgar Wasti</button>
                        <button class="btn btn-default button_mr">Vijapur Naka</button>
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
                <h2><i class="glyphicon glyphicon-user"></i> Master Criminal Record</h2>
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
                            <th>Name</th>
                            <th>FIR</th>
                            <th>Crime Date</th>
                            <th>Police Station</th>
                            <th>Crime</th>
                            <th>Mobile</th>
                            <th>Religion</th>
                            <th>Cast</th>
                            <th>Status</th>
                            <th>Detected</th>
                            <th>Notice</th>
                            <th>Investigator</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            //print_r($aCrime);
                            foreach($aCrime as $row) {
                            //print_r($row);
                            $aImage = array();
                            $aImage = explode("##", $row['cr_criminal_photo']);
                            //print_r($aImage);
                            ?>
                           <tr role="row">
                               <td class="center">
                                    <a href="view_crime.php?id=<?php echo $row['cr_id']; ?>">
                                        <img class="crime-avatar" alt="<?php echo $row['cr_criminal_name']; ?>" src="<?php echo $aImage[0]; ?>">
                                   </a>
                                   <a href="view_crime.php?id=<?php echo $row['cr_id']; ?>">
                                       <?php echo $row['cr_criminal_name']; ?>
                                   </a>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cr_complaint_number']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cr_crime_date']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['ps_name']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cr_crimes']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cr_criminal_mo']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo $row['cr_criminal_religion']; ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo ucfirst($row['cr_criminal_cast']); ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo ucfirst($row['cr_crime_status']); ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo ucfirst($row['cr_crime_detect']); ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo ucfirst($row['cr_crime_notice']); ?> </span>
                               </td>
                               <td class="center">
                                   <span > <?php echo ucfirst($row['cr_investigator']); ?> </span>
                               </td>
                               <td class="center">
                                   <a href="edit_record.php?id=<?php echo $row['cr_id'] ?>" class="btn btn-info">
                                       <i class="glyphicon glyphicon-edit icon-white"></i>
                                       Edit
                                   </a>
                                   <a href="remove_record.php?id=<?php echo $row['cr_id'] ?>" class="btn btn-warning  btn-setting" >
                                       <i class="glyphicon glyphicon-trash icon-white"></i>
                                       Delete
                                   </a>
                               </td>

                           </tr>

                            <?php
                            }
                            //$aImage = array();
                            //$aImage = explode("##", $row['cr_criminal_photo']);
                            ?>

                            <!--
                        <tr>
                            <td>
                                <a href="<?php echo 'view_record.php?id='.$row[cr_id]; ?>"> <img class="crime-avatar" alt="<?php echo $row['cr_criminal_name']; ?>" src="<?php echo $aImage[0]; ?>"></a>
                                <a href="<?php echo 'view_record.php?id='.$row[cr_id]; ?>"><?php echo $row['cr_criminal_name']; ?></a>
                            </td>
                            <td class="center">
                                <span style="color:#ff8800;"> <?php echo $row['cr_complaint_number']; ?> </span>
                            </td>
                            <td class="center">
                                <span style="color:#5185e7;"><?php echo $row['cr_crime_date']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#9933cc;"><?php echo $row['cr_police_station']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_crimes']; ?></span>
                            </td>
                            <td class="center">
                                <span class="label-warning label label-default"><?php echo $row['cr_criminal_mo']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_criminal_religion']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_criminal_cast']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_crime_status']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_crime_detect']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_crime_notice']; ?></span>
                            </td>
                            <td class="center">
                                <span style="color:#cc0000;"><?php echo $row['cr_investigator']; ?></span>
                            </td>
                            <td>
                                <a href="edit_record.html?tri=<?php echo '' ?>" class="btn btn-info">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a href="#" class="btn btn-warning  btn-setting" >
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    -->
                        <?php //} ?>


                        </tbody>
                    </table>
                    <!--
                    <ul class="dashboard-list">
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Usman" src="img/avatar-3637561_640.webp"></a>
                            <strong>Name:</strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Saat Rasta </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Armed Robbery, Homicide </span>
                            <span class="label-success label label-default">299-335 Info</span>
                        </li>
                        <li>
                            <a href="#">
                                <img class="crime-avatar" alt="Sheikh Heera"
                                     src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Kidwai Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Armed Robbery, Homicide </span>
                            <span class="label-warning label label-default">Arrest</span>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Usman" src="img/police-handcuffs.png"></a>
                            <strong>Name:</strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Samrat Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Extortion and Robbery </span>
                            <span class="label-danger label label-default">Wanted</span>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                        <li>
                            <a href="#"> <img class="crime-avatar" alt="Sheikh Heera" src="img/ai-generated-9798057_640.webp"></a>
                            <strong>Name: </strong> <a href="#">Vikram Singh</a>
                            <strong>Crime Date: </strong> <span style="color:#ff8800;"> 17/10/2025 </span></b>
                            <strong>Area: </strong> <span style="color:#9933cc;">Shivaji Chowk </span><br>
                            <strong>Crime: </strong> <span style="color:#cc0000;"> Theft </span>
                            <span class="label-info label label-default">Notice</span>
                            <br>
                        </li>
                    </ul>
                    -->
                </div>
            </div>
        </div>
    </div>
    <!-------- New Code Ends Here ----->
</div>
<?php
require_once 'footer.php';
?>