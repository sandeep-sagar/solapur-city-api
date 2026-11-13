<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>API Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Criminal Analysis">
    <meta name="author" content="Sandeep Sagar">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/nlogo.png">

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img alt="Charisma Logo" src="img/nlogo.png" class="hidden-xs"/>
                <span>API Dashboard - CM Dashboard</span>
            </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
             <!--
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Option 1</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Option 2</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Option 3</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Option 4</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Option 5</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Option 6</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Option 7</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Option 8</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> Option 9</a></li>
                </ul>
            </div>
            -->
            <!-- theme selector ends -->

            <!-- Language selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-refresh"></i><span
                        class="hidden-sm hidden-xs"> भाषा निवडा</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="language-change">
                    <li><a data-value="en-US" href="#"><i class="whitespace"></i> English</a></li>
                    <li><a data-value="mr-IN" href="#"><i class="whitespace"></i> मराठी</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">
                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> डॅशबोर्ड</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon"></i><span> गुन्हे शाखा </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_record_cmd.php"><i class="glyphicon glyphicon-plus-sign"></i><span> गुन्हेगारी नोंद </span></a></li>
                                <li><a class="ajax-link" href="master_data.php"><i class="glyphicon glyphicon-list"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> बेपत्‍ता </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_missing_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> बेपत्‍ता नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_missing.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> अकस्मात मृत्यू </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_death_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> अकस्मात मृत्यू नोंद  </span></a></li>
                                <li><a class="ajax-link" href="master_data_death.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> कालचे अटक </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_yesterday_arrest_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> कालचे अटक नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_yesterday_arrest.php"><i class="glyphicon glyphicon-list-alt"></i><span>  मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> कारागृहातून सुटलेले </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_jail_release_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> कारागृहातून सुटलेले नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_jail_release.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> जेएमएफसी (JMFC) न्यायालयातील खटले </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_jmfc_court_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> जेएमएफसी (JMFC) न्यायालयातील खटले नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_jmfc_court.php"><i class="glyphicon glyphicon-list-alt"></i><span>  मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> सत्रन्यायालयातील खटले </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_session_court_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> सत्रन्यायालयातील खटले नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_session_court.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> बालन्यायालयातील प्रकरणे </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_juvenile_court_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> बालन्यायालयातील प्रकरणे नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_juvenile_court.php"><i class="glyphicon glyphicon-list-alt"></i><span>  मास्टर डेटा</span></a></li>
                           </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> समन्सची स्थिती </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_summons_status_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> समन्सची स्थिती नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_summons_status.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> वॉरंटची स्थिती </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_warrant_status_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> वॉरंटची स्थिती नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_warrant_status.php"><i class="glyphicon glyphicon-list-alt"></i><span>  मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> वाहतूक शाखा माहिती </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_traffic_info_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> वाहतूक शाखा माहिती नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_traffic_info.php"><i class="glyphicon glyphicon-list-alt"></i><span>मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> पोलीस आयुक्त कार्यालयातील तक्रार अर्ज </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_complaints_application_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> तक्रार अर्ज नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_complaints_application.php"><i class="glyphicon glyphicon-list-alt"></i><span>मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> पासपोर्ट विभाग </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_passport_application_record.php"><i class="glyphicon glyphicon-plus-sign"></i><span> पासपोर्ट विभाग नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_passport_application.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> चारित्र्य पडताळणी </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_record_character_verification.php"><i class="glyphicon glyphicon-plus-sign"></i><span> चारित्र्य पडताळणी नोंद</span></a></li>
                                <li><a class="ajax-link" href="add_record_character_verification_notified.php"><i class="glyphicon glyphicon-plus-sign"></i><span> चारित्र्य पडताळणी - अधिसुचित सेवा नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_character_verification.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                                <li><a class="ajax-link" href="master_data_character_verification_notified.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा - अधिसुचित सेवा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> आपले सरकार २.० तक्रार निवारण </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_record_apale_sarkar_complaint.php"><i class="glyphicon glyphicon-plus-sign"></i><span> आपले सरकार २.० तक्रार निवारण नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_apale_sarkar_complaint.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> पी.जी. पोर्टल </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="ajax-link" href="add_record_pg_portal.php"><i class="glyphicon glyphicon-plus-sign"></i><span> पी.जी. पोर्टल नोंद</span></a></li>
                                <li><a class="ajax-link" href="master_data_pg_portal.php"><i class="glyphicon glyphicon-list-alt"></i><span> मास्टर डेटा</span></a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> पोलीस आयुक्त कार्यालयातील जनशासकीय माहिती अधिकार </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> आयटीएसएसओ (ITSSO) </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon "></i><span> संभाव्य घटना </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>
        <div id="content" class="col-lg-10 col-sm-10 ">