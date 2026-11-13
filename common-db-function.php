<?php

class commonDbFunction {

    private $sServerName = "localhost";
    private $sUserName = "root";
    private $sPassword = "";
    private $sDatabase = "caa";
    private $sConnection = '';

    private $sNotice = 'notice';
    private $sState = 'state';
    private $sDistrict = 'district';
    private $sPoliceStation = 'police_station';
    private $sLaw = 'law';
    private $sSection = 'section';
    private $sCriminalRecord = 'criminal_record';
    private $sCrime = 'crime';
    private $sStatus = 'status';
    private $sSpecialEventCrime = 'special_event_crime';
    private $sPreventiveHead = 'preventive_head';
    private $sDetect = 'detect';
    private $sCrimeStatus = 'crime_status';
    private $sReligion = 'religion';

    private $sCriminalRecordCMD = 'criminal_record_cmd';
    private $sMissingRecordCMD = 'missing_record_cmd';
    private $sDeathRecordCMD = 'death_record_cmd';
    private $sYesterdayRecordCMD = 'yesterday_arrest_record_cmd';
    private $sJailReleaseRecordCMD = 'jail_release_cmd';
    private $sJMFCRecordCMD = 'jmfc_court_cmd';
    private $sSesRecordCMD = 'ses_court_cmd';
    private $sJevRecordCMD = 'juvenile_court_cmd';
    private $sSumRecordCMD = 'summons_status_cmd';
    private $sWarRecordCMD = 'warrant_status_cmd';
    private $sDivCMD = 'division';
    private $sCaRecordCMD = 'complaints_application_cmd';
    private $sPaRecordCMD = 'passport_application_cmd';
    private $sCvRecordCMD = 'character_verification_cmd';
    private $sCnRecordCMD = 'character_verification_notified_cmd';
    private $sOnCMD = 'office_name_cmd';
    private $sAsRecordCMD = 'apale_sarkar_complaint_cmd';
    private $sPgRecordCMD = 'pg_portal_cmd';

    private $sCategory = 'category';
    private $sPayment = 'payment';
    private $sCreditCard = 'creditcard';
    private $sTransaction = 'transaction';
    private $sUser = 'user';
    private $sEvents = 'events';



    function __construct() {
        $this->sConnection = new mysqli($this->sServerName, $this->sUserName, $this->sPassword, $this->sDatabase);
        if ($this->sConnection->connect_error) {
            die("Connection failed: " . $this->sConnection->connect_error);
        }
    }

    /*
    private function createConnection() {
        echo "<br/> Where are in create Connection :: sConnection = ". print_r($this->sConnection,1);
       // if (!isset($this->sConnection) || $this->sConnection != '' || !empty($this->sConnection)) {
            echo "<br/> Where are in create Connection 1";
            $this->sConnection = new mysqli($this->sServerName, $this->sUserName, $this->sPassword, $this->sDatabase);
            if ($this->sConnection->connect_error) {
                die("Connection failed: " . $this->sConnection->connect_error);
            } else {

            }
        } else {
            echo "<br/> Connection Created ";
            print_r($this->sConnection);
        }

    }
    */

    private  function selectQuery($sSql) {
        //$this->createConnection();
        $oResult = $this->sConnection->query($sSql);
        $aResult = array();
        if ($oResult->num_rows > 0) {
            while ($aRow = $oResult->fetch_assoc()) {
                $aResult[] = $aRow;
            }
        }
        return $aResult;
    }

    private function executeQuery($sSql) {
        $bStatus = false;
        if ( $this->sConnection->query($sSql) === TRUE) {
            $bStatus = true;
        }
        return $bStatus;
    }

    public function getNotice() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT notice_id, notice_name, notice_link, notice_createdby, notice_status FROM ' . $this->sNotice .  " WHERE notice_status = 'active' ORDER BY notice_createdon desc limit 10";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getState() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT state_id, state_name, state_createdby, state_status, state_createdon, state_modifiedon FROM ' . $this->sState .  " WHERE state_status = 'active' ORDER BY state_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getDistrict($sStateID) {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT dist_id, dist_name, dist_state_id, dist_createdby, dist_status, dist_createdon, dist_modifiedon FROM ' . $this->sDistrict .  " WHERE dist_status = 'active' and dist_state_id = " .$sStateID. " ORDER BY dist_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getPoliceStation($sStateID, $sDistID) {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT ps_id, ps_name, ps_email, ps_dist_id, ps_state_id, ps_createdby, ps_status, ps_createdon, ps_modifiedon FROM ' . $this->sPoliceStation .  " WHERE ps_status = 'active' and ps_state_id = " .$sStateID. " and ps_dist_id = " . $sDistID . " ORDER BY ps_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getOfficeName($sStateID, $sDistID) {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT on_id, on_name, on_name_mr, on_email, on_dist_id, on_state_id, on_createdby, on_status, on_createdon, on_modifiedon FROM ' . $this->sOnCMD .  " WHERE on_status = 'active' and on_state_id = " .$sStateID. " and on_dist_id = " . $sDistID . " ORDER BY on_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getLaw() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT law_id, law_name, law_short, law_createdby, law_status, law_createdon, law_modifiedon FROM ' . $this->sLaw .  " WHERE law_status = 'active'  ORDER BY law_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getSection($sLawId) {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT section_id, section_no, section_name, section_punishment, section_cognizance, section_bail, section_triableby, section_law_id, section_createdby, section_status,  section_createdon, section_modifiedon FROM ' . $this->sSection .  " WHERE section_status = 'active' and section_law_id = " . $sLawId. " ORDER BY section_no";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertCriminalRecord($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sCriminalRecord ." (cr_criminal_photo, cr_crime_name, cr_crime_details, cr_complaint_number, cr_crime_date, cr_crimereg_date, cr_crime_state, cr_crimes_dist, cr_police_station, cr_criminal_name, cr_criminal_dob, cr_criminal_mo, cr_criminal_religion, cr_criminal_religion_other, cr_criminal_cast, cr_criminal_add, cr_criminal_state, cr_criminal_dist, cr_criminal_pincode, cr_crime_status, cr_crime_detect, cr_crime_notice, cr_investigator, cr_preventive_info, cr_preventive_head, cr_special_event_crime, cr_section, cr_createdby, cr_status)value ('". $aTranData['criminalPhoto']."', '". $aTranData['crimeName']."', '". $aTranData['crimeDetails']."', '". $aTranData['complaintNumber']."', '". $aTranData['crimeDate']."', '". $aTranData['crimeRegDate']."', '". $aTranData['crimeState']."', '". $aTranData['crimesDist']."', '". $aTranData['policeStation']."', '". $aTranData['criminalName']."', '". $aTranData['criminalDob']."', '". $aTranData['criminalMo']."', '". $aTranData['criminalReligion']."', '". $aTranData['criminalReligionOther']."', '". $aTranData['criminalCast']."', '". $aTranData['criminalAdd']."', '". $aTranData['criminalState']."', '". $aTranData['criminalDist']."', '". $aTranData['criminalPincode']."', '". $aTranData['crimeStatus']."', '". $aTranData['crimeDetect']."', '". $aTranData['crimeNotice']."', '". $aTranData['investigator']."', '". $aTranData['preventiveInfo']."', '". $aTranData['preventiveHead']."', '". $aTranData['specialEventCrime']."', '". $aTranData['section']."', '". $aTranData['userid']."', 'active' )";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function insertCriminalRecordCMD($aTranData) {
        echo $sInsertSQL = "INSERT INTO ". $this->sCriminalRecordCMD ." (cmd_name, cmd_details, cmd_complaint_number, cmd_start_date, cmd_end_date, cmd_place, cmd_lang, cmd_state, cmd_dist, cmd_police_station, cmd_type, cmd_law, cmd_arrested, cmd_punishment, cmd_e_saksh, cmd_history, cmd_preventive, cmd_other_serction, cmd_other_law, cmd_crimereg_date, cmd_createdby)value ('". $aTranData['cmd_name']."', '". $aTranData['cmd_details']."', '". $aTranData['cmd_complaint_number']."', '". $aTranData['cmd_start_date']."', '". $aTranData['cmd_end_date']."', '". $aTranData['cmd_place']."', '". $aTranData['cmd_lang']."', '". $aTranData['cmd_state']."', '". $aTranData['cmd_dist']."', '". $aTranData['cmd_police_station']."', '". $aTranData['cmd_type']."', '". $aTranData['cmd_law']."', '". $aTranData['cmd_arrested']."', '". $aTranData['cmd_punishment']."', '". $aTranData['cmd_e_saksh']."', '". $aTranData['cmd_history']."', '". $aTranData['cmd_preventive']."', '". $aTranData['cmd_other_serction']."', '". $aTranData['cmd_other_law']."', '". $aTranData['cmd_crimereg_date']."', '". $aTranData['cmd_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function insertCrime($aInput) {
        $sInsertSQL = "INSERT INTO ". $this->sCrime ." (crime_law, crime_section, crime_cr_id, crime_createdby)value ('". $aInput['crime_law']."', '". $aInput['crime_section']."', '". $aInput['crime_cr_id']."', '". $aInput['crime_createdby']."' )";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['crime_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function insertMissingRecordCMD($aTranData) {
        echo $sInsertSQL = "INSERT INTO ". $this->sMissingRecordCMD ." (mr_state, mr_dist, mr_ps, mr_count, mr_number, mr_details, mr_officer, mr_reg_date, mr_createdby)value ('". $aTranData['mr_state']."', '". $aTranData['mr_dist']."', '". $aTranData['mr_ps']."', '". $aTranData['mr_count']."', '". $aTranData['mr_number']."', '". $aTranData['mr_details']."', '". $aTranData['mr_officer']."', '". $aTranData['mr_reg_date']."', '". $aTranData['mr_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }
    
    function insertDeathRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sDeathRecordCMD ." (dr_state, dr_dist, dr_ps, dr_details, dr_reason, dr_gender, dr_reg_date, dr_createdby)value ('". $aTranData['dr_state']."', '". $aTranData['dr_dist']."', '". $aTranData['dr_ps']."', '". $aTranData['dr_details']."', '". $aTranData['dr_reason']."', '". $aTranData['dr_gender']."', '". $aTranData['dr_reg_date']."', '". $aTranData['dr_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getDeathDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(dr.dr_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND dr.dr_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT dr.dr_id, dr.dr_state, dr.dr_dist, dr.dr_ps, dr.dr_details, dr.dr_reason, dr.dr_gender, dr.dr_reg_date, dr.dr_createdby, dr.dr_status, dr.dr_createdon, dr.dr_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sDeathRecordCMD .' as dr LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = dr.dr_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertYesterdayRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sYesterdayRecordCMD ." (yr_state, yr_dist, yr_ps, yr_fir, yr_law, yr_count, yr_arrest, yr_reg_date, yr_createdby)value ('". $aTranData['yr_state']."', '". $aTranData['yr_dist']."', '". $aTranData['yr_ps']."', '". $aTranData['yr_fir']."', '". $aTranData['yr_law']."', '". $aTranData['yr_count']."', '". $aTranData['yr_arrest']."', '". $aTranData['yr_reg_date']."', '". $aTranData['yr_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getYesterdayDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(dr.yr_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND dr.yr_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT dr.yr_id, dr.yr_state, dr.yr_dist, dr.yr_ps, dr.yr_fir, dr.yr_law, dr.yr_count, dr.yr_arrest, dr.yr_reg_date, dr.yr_createdby, dr.yr_status, dr.yr_createdon, dr.yr_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sYesterdayRecordCMD .' as dr LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = dr.yr_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertJailReleaseRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sJailReleaseRecordCMD ." (jr_state, jr_dist, jr_ps, jr_fir, jr_law, jr_name, jr_release_date, jr_reg_date, jr_createdby)value ('". $aTranData['jr_state']."', '". $aTranData['jr_dist']."', '". $aTranData['jr_ps']."', '". $aTranData['jr_fir']."', '". $aTranData['jr_law']."', '". $aTranData['jr_name']."', '". $aTranData['jr_release_date']."', '". $aTranData['jr_reg_date']."', '". $aTranData['jr_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getJailReleaseDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(jr.jr_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND jr.jr_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT jr.jr_id, jr.jr_state, jr.jr_dist, jr.jr_ps, jr.jr_fir, jr.jr_law, jr.jr_name, jr.jr_release_date, jr.jr_reg_date, jr.jr_createdby, jr.jr_status, jr.jr_createdon, jr.jr_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sJailReleaseRecordCMD .' as jr LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = jr.jr_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertJMFCRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sJMFCRecordCMD ." (jm_state, jm_dist, jm_ps, jm_closed, jm_prof, jm_release, jm_compromis, jm_reg_date, jm_createdby )value ('". $aTranData['jm_state']."', '". $aTranData['jm_dist']."', '". $aTranData['jm_ps']."', '". $aTranData['jm_closed']."', '". $aTranData['jm_prof']."', '". $aTranData['jm_release']."', '". $aTranData['jm_compromis']."', '". $aTranData['jm_reg_date']."', '". $aTranData['jm_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getJMFCDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(jm.jm_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND jm.jm_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT jm.jm_id, jm.jm_state, jm.jm_dist, jm.jm_ps, jm.jm_closed, jm.jm_prof, jm.jm_release, jm.jm_compromis, jm.jm_reg_date, jm.jm_createdby, jm.jm_status, jm.jm_createdon, jm.jm_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sJMFCRecordCMD .' as jm LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = jm.jm_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertSesRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sSesRecordCMD ." (se_state, se_dist, se_ps, se_closed, se_prof, se_release, se_compromis, se_reg_date, se_createdby )value ('". $aTranData['se_state']."', '". $aTranData['se_dist']."', '". $aTranData['se_ps']."', '". $aTranData['se_closed']."', '". $aTranData['se_prof']."', '". $aTranData['se_release']."', '". $aTranData['se_compromis']."', '". $aTranData['se_reg_date']."', '". $aTranData['se_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getSesDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(se.se_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND se.se_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT se.se_id, se.se_state, se.se_dist, se.se_ps, se.se_closed, se.se_prof, se.se_release, se.se_compromis, se.se_reg_date, se.se_createdby, se.se_status, se.se_createdon, se.se_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sSesRecordCMD .' as se LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = se.se_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertSusRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sSumRecordCMD ." (ss_state, ss_dist, ss_ps, ss_pre_balance, ss_current, ss_total, ss_summoned, ss_not_summoned, ss_post, ss_balance, ss_per, ss_per_balance, ss_reg_date, ss_createdby )value ('". $aTranData['ss_state']."', '". $aTranData['ss_dist']."', '". $aTranData['ss_ps']."', '". $aTranData['ss_pre_balance']."', '". $aTranData['ss_current']."', '". $aTranData['ss_total']."', '". $aTranData['ss_summoned']."', '". $aTranData['ss_not_summoned']."', '". $aTranData['ss_post']."', '". $aTranData['ss_balance']."', '". $aTranData['ss_per']."', '". $aTranData['ss_per_balance']."', '". $aTranData['ss_reg_date']."', '". $aTranData['ss_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getSumDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(se.se_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND se.se_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT ss.ss_id, ss.ss_state, ss.ss_dist, ss.ss_ps, ss.ss_pre_balance, ss.ss_current, ss.ss_total, ss.ss_summoned, ss.ss_not_summoned, ss.ss_post, ss.ss_balance, ss.ss_per, ss.ss_per_balance, ss.ss_reg_date, ss.ss_createdby, ss.ss_status, ss.ss_createdon, ss.ss_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email, d.div_id, d.div_name, d.div_email FROM ' . $this->sSumRecordCMD .' as ss LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = ss.ss_ps  LEFT JOIN ' . $this->sDivCMD .' as d ON d.div_id = ps.ps_div_id' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertWarRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sWarRecordCMD ." (ws_state, ws_dist, ws_ps, ws_pre_balance, ws_current, ws_total, ws_summoned, ws_not_summoned, ws_post, ws_balance, ws_per, ws_per_balance, ws_reg_date, ws_createdby )value ('". $aTranData['ws_state']."', '". $aTranData['ws_dist']."', '". $aTranData['ws_ps']."', '". $aTranData['ws_pre_balance']."', '". $aTranData['ws_current']."', '". $aTranData['ws_total']."', '". $aTranData['ws_summoned']."', '". $aTranData['ws_not_summoned']."', '". $aTranData['ws_post']."', '". $aTranData['ws_balance']."', '". $aTranData['ws_per']."', '". $aTranData['ws_per_balance']."', '". $aTranData['ws_reg_date']."', '". $aTranData['ws_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getWarDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(se.se_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND se.se_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT ss.ws_id, ss.ws_state, ss.ws_dist, ss.ws_ps, ss.ws_pre_balance, ss.ws_current, ss.ws_total, ss.ws_summoned, ss.ws_not_summoned, ss.ws_post, ss.ws_balance, ss.ws_per, ss.ws_per_balance, ss.ws_reg_date, ss.ws_createdby, ss.ws_status, ss.ws_createdon, ss.ws_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email, d.div_id, d.div_name, d.div_email FROM ' . $this->sWarRecordCMD .' as ss LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = ss.ws_ps  LEFT JOIN ' . $this->sDivCMD .' as d ON d.div_id = ps.ps_div_id' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertJevRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sJevRecordCMD ." (jv_state, jv_dist, jv_ps, jv_closed, jv_prof, jv_release, jv_compromis, jv_per, jv_reg_date, jv_createdby )value ('". $aTranData['jv_state']."', '". $aTranData['jv_dist']."', '". $aTranData['jv_ps']."', '". $aTranData['jv_closed']."', '". $aTranData['jv_prof']."', '". $aTranData['jv_release']."', '". $aTranData['jv_compromis']."', '". $aTranData['jv_per']."', '". $aTranData['jv_reg_date']."', '". $aTranData['jv_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getJevDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(jv.jv_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND jv.jv_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT jv.jv_id, jv.jv_state, jv.jv_dist, jv.jv_ps, jv.jv_closed, jv.jv_prof, jv.jv_release, jv.jv_compromis, jv.jv_per, jv.jv_reg_date, jv.jv_createdby, jv.jv_status, jv.jv_createdon, jv.jv_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sJevRecordCMD .' as jv LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = jv.jv_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertCaRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sCaRecordCMD ." (ca_state, ca_dist, ca_ps, ca_one_year, ca_six_month, ca_three_month, ca_less_three_month, ca_total, ca_reg_date, ca_createdby )value ('". $aTranData['ca_state']."', '". $aTranData['ca_dist']."', '". $aTranData['ca_ps']."', '". $aTranData['ca_one_year']."', '". $aTranData['ca_six_month']."', '". $aTranData['ca_three_month']."', '". $aTranData['ca_less_three_month']."', '". $aTranData['ca_total']."', '". $aTranData['ca_reg_date']."', '". $aTranData['ca_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getCaDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(ca.ca_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND ca.ca_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT ca.ca_id, ca.ca_state, ca.ca_dist, ca.ca_ps, ca.ca_one_year, ca.ca_six_month, ca.ca_three_month, ca.ca_less_three_month, ca.ca_total, ca.ca_reg_date, ca.ca_createdby, ca.ca_status, ca.ca_createdon, ca.ca_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sCaRecordCMD .' as ca LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = ca.ca_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertPaRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sPaRecordCMD ." (pa_state, pa_dist, pa_ps, pa_seven_days, pa_fifteen_days, pa_one_month, pa_total_waiting, pa_total_received, pa_reg_date, pa_createdby )value ('". $aTranData['pa_state']."', '". $aTranData['pa_dist']."', '". $aTranData['pa_ps']."', '". $aTranData['pa_seven_days']."', '". $aTranData['pa_fifteen_days']."', '". $aTranData['pa_one_month']."', '". $aTranData['pa_total_waiting']."', '". $aTranData['pa_total_received']."', '". $aTranData['pa_reg_date']."', '". $aTranData['pa_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getPaDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(pa.pa_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND pa.pa_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT pa.pa_id, pa.pa_state, pa.pa_dist, pa.pa_ps, pa.pa_seven_days, pa.pa_fifteen_days, pa.pa_one_month, pa.pa_total_waiting, pa.pa_total_received, pa.pa_reg_date, pa.pa_createdby, pa.pa_status, pa.pa_createdon, pa.pa_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sPaRecordCMD .' as pa LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = pa.pa_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }
    
    function insertCvRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sCvRecordCMD ." (cv_state,cv_dist,cv_ps,cv_rec_last_month,cv_pend,cv_total_rec_till_last_month,cv_total_op_till_last_month,cv_pend_last_ft,cv_pend_last_month,cv_per_last_month,cv_rec_cur_month,cv_op_cur_month,cv_reg_date,cv_createdby )value ('". $aTranData['cv_state']."', '". $aTranData['cv_dist']."', '". $aTranData['cv_ps']."', '". $aTranData['cv_rec_last_month']."', '". $aTranData['cv_pend']."', '". $aTranData['cv_total_rec_till_last_month']."', '". $aTranData['cv_total_op_till_last_month']."', '". $aTranData['cv_pend_last_ft']."', '". $aTranData['cv_pend_last_month']."', '". $aTranData['cv_per_last_month']."', '". $aTranData['cv_rec_cur_month']."', '". $aTranData['cv_op_cur_month']."', '". $aTranData['cv_reg_date']."', '". $aTranData['cv_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getCvDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(pa.pa_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND pa.pa_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT cv.cv_id, cv.cv_state, cv.cv_dist, cv.cv_ps, cv.cv_rec_last_month, cv.cv_pend, cv.cv_total_rec_till_last_month, cv.cv_total_op_till_last_month, cv.cv_pend_last_ft, cv.cv_pend_last_month, cv.cv_per_last_month, cv.cv_rec_cur_month, cv.cv_op_cur_month, cv.cv_reg_date, cv.cv_createdby, cv.cv_status, cv.cv_createdon, cv.cv_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sCvRecordCMD .' as cv LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = cv.cv_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    
    function insertCnRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sCnRecordCMD ." (cn_name, cn_dura, cn_total_rec, cn_total_op, cn_total_pend, cn_reg_date, cn_createdby )value ('". $aTranData['cn_name']."', '". $aTranData['cn_dura']."', '". $aTranData['cn_total_rec']."', '". $aTranData['cn_total_op']."', '". $aTranData['cn_total_pend']."', '". $aTranData['cn_reg_date']."', '". $aTranData['cn_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getCnDataCMD ($sYear = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(cn_reg_date, "%Y") = ' . $sYear;
        }

        $sSqlSelect = 'SELECT cn_id, cn_name, cn_dura, cn_total_rec, cn_total_op, cn_total_pend, cn_reg_date, cn_createdby, cn_status, cn_createdon, cn_modifiedon FROM ' . $this->sCnRecordCMD .' ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }
    
    function insertAsRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sAsRecordCMD ." (as_state, as_dist, as_on_id, as_pend_last_month, as_comp_today, as_total, as_op_today, as_pend_today, as_reg_date, as_createdby )value ('". $aTranData['as_state']."', '". $aTranData['as_dist']."', '". $aTranData['as_on_id']."', '". $aTranData['as_pend_last_month']."', '". $aTranData['as_comp_today']."', '". $aTranData['as_total']."', '". $aTranData['as_op_today']."', '". $aTranData['as_pend_today']."', '". $aTranData['as_reg_date']."', '". $aTranData['as_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getAsDataCMD ($sYear = '', $sOName = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(a.as_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sOName) && !empty($sOName) ) {
            $sSqlWhere .= ' AND a.as_on_id = ' . $sOName;
        }

        $sSqlSelect = 'SELECT a.as_id, a.as_state, a.as_dist, a.as_on_id, a.as_pend_last_month, a.as_comp_today, a.as_total, a.as_op_today, a.as_pend_today, a.as_reg_date, a.as_createdby, a.as_status, a.as_createdon, a.as_modifiedon, o.on_id, o.on_name, o.on_name_mr, o.on_email FROM ' . $this->sAsRecordCMD .' as a  LEFT JOIN ' .  $this->sOnCMD . ' as o ON o.on_id = a.as_on_id ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    //pg_portal_cmd
    function insertPgRecordCMD($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sPgRecordCMD ." (pg_state, pg_dist, pg_on_id, pg_rec_last_month, pg_pend, pg_total_rec_till_last_month, pg_total_op_till_last_month, pg_pend_last_ft, pg_pend_last_month, pg_per_last_month, pg_rec_cur_month, pg_op_cur_month, pg_reg_date, pg_createdby )value ('". $aTranData['pg_state']."', '". $aTranData['pg_dist']."', '". $aTranData['pg_on_id']."', '". $aTranData['pg_rec_last_month']."', '". $aTranData['pg_pend']."', '". $aTranData['pg_total_rec_till_last_month']."', '". $aTranData['pg_total_op_till_last_month']."', '". $aTranData['pg_pend_last_ft']."', '". $aTranData['pg_pend_last_month']."', '". $aTranData['pg_per_last_month']."', '". $aTranData['pg_rec_cur_month']."', '". $aTranData['pg_op_cur_month']."', '". $aTranData['pg_reg_date']."', '". $aTranData['pg_createdby']."')";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['cr_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }

    function getPgDataCMD ($sYear = '', $sOName = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(p.pg_reg_date, "%Y") = ' . $sYear;
        }

        if (isset($sOName) && !empty($sOName) ) {
            $sSqlWhere .= ' AND p.pg_on_id = ' . $sOName;
        }

        $sSqlSelect = 'SELECT p.pg_id, p.pg_state, p. pg_dist, p. pg_on_id, p. pg_rec_last_month, p. pg_pend, p. pg_total_rec_till_last_month, p. pg_total_op_till_last_month, p. pg_pend_last_ft, p. pg_pend_last_month, p. pg_per_last_month, p. pg_rec_cur_month, p. pg_op_cur_month, p. pg_reg_date, p. pg_createdby , o.on_id, o.on_name, o.on_name_mr, o.on_email FROM ' . $this->sPgRecordCMD .' as p  LEFT JOIN ' .  $this->sOnCMD . ' as o ON o.on_id = p.pg_on_id ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getRecentActivity() {
        $aResult = array();
        $sSqlSelect = 'SELECT cr_id, cr_crime_name, cr_complaint_number FROM ' . $this->sCriminalRecord .  " WHERE cr_status = 'active' ORDER BY cr_modifiedon desc limit 10";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getCrimeDataCMD ($sYear = '', $sCrime = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(cr.cmd_crimereg_date, "%Y") = ' . $sYear;
        }

        if (isset($sCrime) && !empty($sCrime) ) {
            $sSqlWhere .= ' AND cr.cmd_type = "' . $sCrime .'"';
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND cr.cmd_police_station = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT cr.cmd_id, cr.cmd_name, cr.cmd_details, cr.cmd_complaint_number, cr.cmd_start_date, cr.cmd_end_date, cr.cmd_place, cr.cmd_lang, cr.cmd_state, cr.cmd_dist, cr.cmd_police_station, cr.cmd_type, cr.cmd_law, cr.cmd_arrested, cr.cmd_punishment, cr.cmd_e_saksh, cr.cmd_history, cr.cmd_preventive, cr.cmd_other_serction, cr.cmd_other_law, cr.cmd_createdby, cr.cmd_crimereg_date, cr.cmd_status, cr.cmd_createdon, cr.cmd_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sCriminalRecordCMD .' as cr LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = cr.cmd_police_station ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    
    function getMissingDataCMD ($sYear = '', $sPoliceStation = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sYear) && !empty($sYear) ) {
            $sSqlWhere = ' AND date_format(mr.mr_reg_dater, "%Y") = ' . $sYear;
        }

        if (isset($sPoliceStation) && !empty($sPoliceStation) ) {
            $sSqlWhere .= ' AND mr.mr_ps = ' . $sPoliceStation;
        }
        $sSqlSelect = 'SELECT mr.mr_id, mr.mr_state, mr.mr_dist, mr.mr_ps, mr.mr_count, mr.mr_number, mr.mr_details, mr.mr_officer, mr.mr_reg_date, mr.mr_createdby, mr.mr_status, mr.mr_createdon, mr.mr_modifiedon, ps.ps_id, ps.ps_name, ps.ps_email FROM ' . $this->sMissingRecordCMD .' as mr LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON ps.ps_id = mr.mr_ps ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getCrimeData ($sCrimeID = '') {
        $aResult = array();
        $sSqlWhere = '';
        if (isset($sCrimeID) && !empty($sCrimeID) ) {
            $sSqlWhere = ' WHERE cr.cr_id = ' . $sCrimeID;
        }
        $sSqlSelect = 'SELECT cr.cr_id, cr.cr_criminal_photo, cr.cr_crime_name, cr.cr_crime_details, cr.cr_complaint_number, cr.cr_crime_date, cr.cr_crimereg_date, cr.cr_crime_state, cr.cr_crimes_dist, cr.cr_police_station, cr.cr_criminal_name, cr.cr_criminal_dob, cr.cr_criminal_mo, cr.cr_criminal_religion, cr.cr_criminal_religion_other, cr.cr_criminal_cast, cr.cr_criminal_add, cr.cr_criminal_state, cr.cr_criminal_dist, cr.cr_criminal_pincode, cr.cr_crime_status, cr.cr_crime_detect, cr.cr_crime_notice, cr.cr_investigator, cr.cr_preventive_info, cr.cr_preventive_head, cr.cr_special_event_crime, cr.cr_section, cr.cr_createdby, cr.cr_status, cr.cr_createdon, cr.cr_modifiedon, crst.state_name as cr_state_name, crdt.dist_name as cr_dist_name, cmst.state_name as cm_state_name, cmdt.dist_name as cm_dist_name, ps.ps_name FROM ' . $this->sCriminalRecord .' as cr LEFT JOIN ' . $this->sState .' as crst ON cr.cr_crime_state = crst.state_id LEFT JOIN ' . $this->sDistrict .' as crdt ON cr.cr_crimes_dist = crdt.dist_id LEFT JOIN ' . $this->sState .' as cmst ON cr.cr_criminal_state = cmst.state_id LEFT JOIN ' . $this->sDistrict .' as cmdt ON cr.cr_criminal_dist = cmdt.dist_id  LEFT JOIN ' .  $this->sPoliceStation . ' as ps ON cr.cr_police_station = ps.ps_id  ' . $sSqlWhere;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getCrime ($sCrID)  {
        $aResult = array();
        $sSqlSelect = 'SELECT crime_id, crime_law, crime_section, crime_cr_id, crime_createdby, crime_status, law_name, law_short, section_no, section_name FROM ' . $this->sCrime . ' LEFT JOIN ' .$this->sLaw . ' ON law_id = crime_law LEFT JOIN ' . $this->sSection. ' ON section_id = crime_section where crime_cr_id = ' . $sCrID;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getCrimeStatus() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT cr_id, cr_name, cr_createdby, cr_status,  cr_createdon, cr_modifiedon FROM ' . $this->sCrimeStatus .  " WHERE cr_status = 'active' ORDER BY cr_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getDetect() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT dt_id, dt_name, dt_createdby, dt_status,  dt_createdon, dt_modifiedon FROM ' . $this->sDetect .  " WHERE dt_status = 'active' ORDER BY dt_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getPreventiveHead() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT ph_id, ph_name, ph_createdby, ph_status,  ph_createdon, ph_modifiedon FROM ' . $this->sPreventiveHead .  " WHERE ph_status = 'active' ORDER BY ph_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getSpecialEventCrime() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT sec_id, sec_name, sec_createdby, sec_status,  sec_createdon, sec_modifiedon FROM ' . $this->sSpecialEventCrime .  " WHERE sec_status = 'active' ORDER BY sec_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getStatus() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT st_id, st_name, st_createdby, st_status,  st_createdon, st_modifiedon FROM ' . $this->sStatus .  " WHERE st_status = 'active' ORDER BY st_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getReligion() {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlSelect = 'SELECT rl_id, rl_name, rl_createdby, rl_status,  rl_createdon, rl_modifiedon FROM ' . $this->sReligion .  " WHERE rl_status = 'active' ORDER BY rl_name asc";
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }
    //old Code
    public function getCategory($sUserId, $sCategory = '', $sStatus = '') {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = "WHERE cat_expense_type = 'debit' and cat_user_id = " . $sUserId;
        }
        if (isset($sCategory) && $sCategory != '') {
            $sSqlWhere .= ' AND cat_id = ' . $sCategory;
        }
        if (isset($sStatus) && $sStatus != '') {
            $sSqlWhere .= " AND cat_status = '" . $sStatus."'";
        }

        $sSqlSelect = 'SELECT cat_id, cat_user_id, cat_title, cat_desc, cat_budget, cat_status, cat_background_color, cat_color FROM ' . $this->sCategory . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getCategoryByTitle($sUserId, $sCategory = '', $sStatus = '') {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE cat_user_id = ' . $sUserId;
        }
        if (isset($sCategory) && $sCategory != '') {
            $sSqlWhere .= " AND cat_title = '" . $sCategory . "'";
        }
        if (isset($sStatus) && $sStatus != '') {
            $sSqlWhere .= " AND cat_status = '" . $sStatus."'";
        }

        $sSqlSelect = 'SELECT cat_id, cat_user_id, cat_title, cat_desc, cat_budget, cat_status, cat_background_color, cat_color FROM ' . $this->sCategory . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertCategory($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sCategory ." (cat_user_id, cat_title, cat_desc, cat_budget, cat_expense_type, cat_status, cat_background_color, cat_color)value (". $aTranData['cat_user_id'].", '". $aTranData['cat_title']."','". $aTranData['cat_desc']."','". $aTranData['cat_budget']."','". $aTranData['cat_expense_type']."','". $aTranData['cat_status']."','". $aTranData['cat_background_color']."','". $aTranData['cat_color']."' )";
        return $this->executeQuery($sInsertSQL);
    }

    function updateCategory($aTranData) {
        $sUpdateSQL = 'UPDATE ' . $this->sCategory . " SET cat_title = '". $aTranData['cat_title'] . "', cat_desc = '". $aTranData['cat_desc'] . "', cat_budget = '". $aTranData['cat_budget'] . "', cat_status = '". $aTranData['cat_status'] . "', cat_background_color = '". $aTranData['cat_background_color'] . "', cat_color = '". $aTranData['cat_color'] . "'  WHERE cat_id = " . $aTranData['cat_id'] . " AND cat_user_id = " . $aTranData['cat_user_id'];
        return $this->executeQuery($sUpdateSQL);
    }

    function removeCategory($aTranData) {
        $sUpdateSQL = 'DELETE FROM  ' . $this->sCategory . "  WHERE cat_id = " . $aTranData['cat_id'] . " AND cat_user_id = " . $aTranData['cat_user_id'];
        return $this->executeQuery($sUpdateSQL);
    }

    public function getPayment($sUserId, $sPaymentTitle = '') {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE payment_user_id = ' . $sUserId;
        }

        if (isset($sPaymentTitle) && ($sPaymentTitle) != '') {
            $sSqlWhere .= " AND payment_type = '" .$sPaymentTitle. "'";
        }

        $sSqlSelect = 'SELECT payment_id, payment_type, payment_user_id, payment_background_color, payment_color, payment_created, payment_updated FROM ' . $this->sPayment . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    public function getCreditCard($sUserId, $sCreditCardId = '') {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE creditcard_user_id = ' . $sUserId;
        }

        if (isset($sCreditCardId) && ($sCreditCardId) != '') {
            $sSqlWhere .= ' AND creditcard_id = ' . $sCreditCardId;
        }

        $sSqlSelect = 'SELECT creditcard_id, creditcard_title, creditcard_payment_id, creditcard_bill_date, creditcard_payment_date, creditcard_user_id, creditcard_background_color, creditcard_color, creditcard_created, creditcard_updated FROM ' . $this->sCreditCard . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    private function getTransaction($sUserId) {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE trans_user_id = ' . $sUserId;
        }
        $sSqlSelect = 'SELECT trans_id, trans_user_id, trans_date, trans_cat_id, trans_expens, trans_desc, trans_payment_id, trans_creditcard_id, trans_amount, trans_created, trans_updated FROM ' . $this->sTransaction . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getUser($sUserId = '', $sUserMo = '', $sUserEmail = '') {
        $sSqlWhere = '';
        $aResult = array();
        $sSqlWhere = 'WHERE ';
        $bKeySet = false;
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere .= ' user_id = ' . $sUserId;
            $bKeySet = true;
        }
        if (isset($sUserMo) && ($sUserMo) != '') {
            if ($bKeySet) {
                $sSqlWhere .= ' AND user_mo = ' . $sUserMo;
            } else {
                $sSqlWhere .= ' user_mo = ' . $sUserMo;
                $bKeySet = true;
            }
        }
        if (isset($sUserEmail) && ($sUserEmail) != '') {
            if ($bKeySet) {
                $sSqlWhere .= " AND user_email_id = '" . $sUserEmail . "'";
            } else {
                $sSqlWhere .= " user_email_id = '" . $sUserEmail . "'";
                $bKeySet = true;
            }
        }
        $sSqlSelect = 'SELECT user_id, user_first_name, user_middle_name, user_last_name, user_mo, user_email_id, user_pass, user_created, user_updated FROM ' . $this->sUser . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertTransaction($aTranData) {
        $sInsertSQL = "INSERT INTO ". $this->sTransaction ." (trans_user_id, trans_date, trans_cat_id, trans_type, trans_expens, trans_desc, trans_payment_id, trans_creditcard_id, trans_amount, trans_emi, trans_recur, trans_emi_tenure, trans_emi_amount)value (". $aTranData['trans_user_id'].", '". $aTranData['trans_date']."',". $aTranData['trans_cat_id'].",'". $aTranData['trans_expens_type']."','". $aTranData['trans_expens']."','". $aTranData['trans_desc']."','". $aTranData['trans_payment_id']."','". $aTranData['trans_creditcard_id']."', '". $aTranData['trans_amount']."','". $aTranData['trans_emi']."', '". $aTranData['trans_recur']."', '". $aTranData['trans_emi_tenure']."', '". $aTranData['trans_emi_amount']."' )";
        $aReturn = array();
        if ($this->executeQuery($sInsertSQL)) {
            $aReturn['status'] = true;
            $aReturn['trans_id'] = $this->sConnection->insert_id;
        } else {
            $aReturn['status'] = false;
        }
        return $aReturn;
    }


    function getTransactionDetails($sUserId, $sStartDate = '', $sEndDate = '') {
        $sSqlWhere = '';
        $aResult = array();
        $sStartD = date("Y-m-01");
        $sEndD = date("Y-m-31");

        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE trans_user_id = ' . $sUserId;
        }

        if (isset($sStartDate) && !empty($sStartDate) && $sStartDate != '') {
            $sSqlWhere .= " AND trans_date >= '" . $sStartDate ."'";
        } else {
            $sSqlWhere .= " AND trans_date >= '" . $sStartD ."'";
        }

        if (isset($sEndDate) && !empty($sEndDate) && $sEndDate != '') {
            $sSqlWhere .= " AND trans_date <= '" . $sEndDate . "'";
        } else {
            $sSqlWhere .= " AND trans_date <= '" . $sEndD . "'";
        }

        $sSqlSelect = 'SELECT trans_cat_id, trans_payment_id, trans_creditcard_id, trans_id, trans_date, trans_expens, trans_desc, trans_emi, trans_emi_tenure, trans_emi_amount, trans_recur, cat_title, cat_budget, cat_background_color, cat_color, payment_type, payment_background_color, payment_color, creditcard_title, creditcard_background_color, creditcard_color, sum(trans_amount) as spend, count(1) as cnt FROM ' . $this->sTransaction . ' LEFT JOIN ' . $this->sCategory . ' on trans_cat_id = cat_id LEFT JOIN ' . $this->sPayment . ' on payment_id = trans_payment_id LEFT JOIN ' . $this->sCreditCard . ' on creditcard_id = trans_creditcard_id  ' .$sSqlWhere . ' group by 1,2,3 ';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getTransactionDetailsForCC($sUserId, $sDate, $sCatId, $sExpense = '') {
        $sSqlWhere = '';
        $aResult = array();

        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE trans_user_id = ' . $sUserId;
        }

        if (isset($sDate) && !empty($sDate) && $sDate != '') {
            $sSqlWhere .= " AND trans_date = '" . $sDate ."'";
        }

        if (isset($sCatId) && !empty($sCatId) && $sCatId != '') {
            $sSqlWhere .= " AND trans_cat_id = '" . $sCatId . "'";
        }

        if (isset($sExpense) && !empty($sExpense) && $sExpense != '') {
            $sSqlWhere .= " AND trans_expens = '" . $sExpense . "'";
        }

        $sSqlSelect = 'SELECT trans_id, trans_user_id, trans_cat_id, trans_payment_id, trans_creditcard_id, trans_id, trans_date, trans_expens, trans_desc, trans_amount, trans_emi, trans_emi_tenure, trans_emi_amount, trans_recur, cat_title, cat_budget, cat_background_color, cat_color, payment_type, payment_background_color, payment_color, creditcard_title, creditcard_background_color, creditcard_color, sum(trans_amount) as spend, count(1) as cnt FROM ' . $this->sTransaction . ' LEFT JOIN ' . $this->sCategory . ' on trans_cat_id = cat_id LEFT JOIN ' . $this->sPayment . ' on payment_id = trans_payment_id LEFT JOIN ' . $this->sCreditCard . ' on creditcard_id = trans_creditcard_id  ' .$sSqlWhere . ' group by 1,2,3 ';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getTransactionDetailsAll($sUserId, $sTransID = '', $sStartDate = '', $sEndDate = '', $sRecur = '') {
        $sSqlWhere = '';
        $aResult = array();
        $sStartD = date("Y-m-01");
        $sEndD = date("Y-m-d");

        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE trans_user_id = ' . $sUserId;
        }

        if (isset($sTransID) && $sTransID > 0) {
            $sSqlWhere .= ' AND trans_id = ' . $sTransID;
        }

        if (isset($sStartDate) && !empty($sStartDate) && $sStartDate != '') {
            $sSqlWhere .= " AND trans_date >= '" . $sStartDate ."'";
        } else {
            $sSqlWhere .= " AND trans_date >= '" . $sStartD ."'";
        }

        if (isset($sEndDate) && !empty($sEndDate) && $sEndDate != '') {
            $sSqlWhere .= " AND trans_date <= '" . $sEndDate . "'";
        } else {
            $sSqlWhere .= " AND trans_date <= '" . $sEndD . "'";
        }

        if (isset($sRecur) && !empty($sRecur) && $sRecur != '') {
            $sSqlWhere .= " AND trans_recur = '" . $sRecur . "'";
        }

        //$sSqlWhere .= " AND trans_date >= '" . $sStartD ."' AND trans_date <= '" . $sEndD . "'";

        $sSqlSelect = 'SELECT trans_user_id, trans_cat_id, trans_type, trans_payment_id, trans_creditcard_id, trans_id, trans_date, trans_expens, trans_desc, trans_recur, trans_emi, trans_emi_tenure, trans_emi_amount, cat_title, cat_budget, cat_background_color, cat_color, payment_type, payment_background_color, payment_color, creditcard_title, creditcard_bill_date, creditcard_payment_date, creditcard_background_color, creditcard_color, trans_amount as spend FROM ' . $this->sTransaction . ' LEFT JOIN ' . $this->sCategory . ' on trans_cat_id = cat_id LEFT JOIN ' . $this->sPayment . ' on payment_id = trans_payment_id LEFT JOIN ' . $this->sCreditCard . ' on creditcard_id = trans_creditcard_id  ' .$sSqlWhere . ' ';
        //exit;
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getTransactionDetailsAllbyTransID($sUserId, $sTransID = '') {
        $sSqlWhere = '';
        $aResult = array();

        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE trans_user_id = ' . $sUserId;
        }

        if (isset($sTransID) && $sTransID > 0) {
            $sSqlWhere .= ' AND trans_id = ' . $sTransID;
        }

        $sSqlSelect = 'SELECT trans_user_id, trans_cat_id, trans_payment_id, trans_creditcard_id, trans_id, trans_date, trans_expens, trans_desc, trans_recur, trans_emi, trans_emi_tenure, trans_emi_amount, cat_title, cat_budget, cat_background_color, cat_color, payment_type, payment_background_color, payment_color, creditcard_title, creditcard_bill_date, creditcard_payment_date, creditcard_background_color, creditcard_color, trans_amount as spend FROM ' . $this->sTransaction . ' LEFT JOIN ' . $this->sCategory . ' on trans_cat_id = cat_id LEFT JOIN ' . $this->sPayment . ' on payment_id = trans_payment_id LEFT JOIN ' . $this->sCreditCard . ' on creditcard_id = trans_creditcard_id  ' .$sSqlWhere . ' ';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function getEMITransaction($sUserId, $sTransID = '') {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE trans_user_id = ' . $sUserId;
        }

        if (isset($sTransID) && $sTransID > 0) {
            $sSqlWhere .= ' AND trans_emi = ' . $sTransID;
        }
        $sSqlSelect = 'SELECT trans_id, trans_user_id, trans_date, trans_cat_id, trans_expens, trans_desc, trans_payment_id, trans_creditcard_id, trans_amount, trans_emi, trans_emi_tenure, trans_emi_amount, trans_recur FROM ' . $this->sTransaction . ' ' .$sSqlWhere . ' ';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function updateTransaction($aTranData) {
        $sUpdateSQL = 'UPDATE ' . $this->sTransaction . " SET trans_date = '". $aTranData['trans_date'] . "', trans_expens = '". $aTranData['trans_expens'] . "', trans_cat_id = '". $aTranData['trans_cat_id'] . "', trans_desc = '". $aTranData['trans_desc'] . "', trans_payment_id = '". $aTranData['trans_payment_id'] . "', trans_creditcard_id = '". $aTranData['trans_creditcard_id'] . "', trans_amount = '" .$aTranData['trans_amount']. "', trans_emi = '" .$aTranData['trans_emi']. "', trans_emi_tenure = '" .$aTranData['trans_emi_tenure']. "', trans_emi_amount = '" .$aTranData['trans_emi_amount']. "', trans_recur = '" .$aTranData['trans_recur']. "'  WHERE trans_id = " . $aTranData['trans_id'] . " AND trans_user_id = " . $aTranData['trans_user_id'];
        return $this->executeQuery($sUpdateSQL);
    }

    function removeTransaction($aTranData) {
        $sUpdateSQL = 'DELETE FROM  ' . $this->sTransaction . "  WHERE trans_id = " . $aTranData['trans_id'] . " AND trans_user_id = " . $aTranData['trans_user_id'];
        return $this->executeQuery($sUpdateSQL);
    }

    function updateTask($date, $status, $task, $taskId, $sDueDate) {
        $sUpdateSQL = 'UPDATE ' . $this->sTaskTable . " SET date = '". $date . "', task_status = '" . $status . "', task = '" . $task . "', due_date = '" .$sDueDate. "' WHERE task_id = " . $taskId;
        return $this->executeQuery($sUpdateSQL);
    }

    function insertComment($taskId, $comment) {
        $sInsertSQL = "INSERT INTO ". $this->sCommentTable ." (comment, task_id)value ('$comment', $taskId )";
        return $this->executeQuery($sInsertSQL);
    }

    public function getEvents($sUserId, $sStatus = '') {
        $sSqlWhere = '';
        $aResult = array();
        if (isset($sUserId) && ($sUserId) != '') {
            $sSqlWhere = 'WHERE event_user_id = ' . $sUserId;
        }
        if (isset($sStatus) && $sStatus != '') {
            $sSqlWhere .= " AND event_status = '" . $sStatus."'";
        }

        $sSqlSelect = 'SELECT event_id, event_user_id, event_title, event_desc, event_css, event_background_colour, event_colour, event_url, date_format(event_startdate, "%Y-%m-%d") as event_startdate, date_format(event_enddate, "%Y-%m-%d") as event_enddate, event_status, event_updated FROM ' . $this->sEvents . ' ' .$sSqlWhere . ' ORDER BY 1 asc';
        $aResult = $this->selectQuery($sSqlSelect);
        return $aResult;
    }

    function insertEvent($aEventData) {
        $sInsertSQL = "INSERT INTO ". $this->sEvents ." (event_user_id, event_title, event_desc, event_css, event_background_colour, event_colour, event_url, event_startdate, event_enddate, event_status)value (". $aEventData['user_id'].", '". $aEventData['title']."','". $aEventData['eventdr']."','". $aEventData['css']."','". $aEventData['background_color']."','". $aEventData['color']."','". $aEventData['link']."','". $aEventData['sdate']."','". $aEventData['edate']."','". $aEventData['status']."' )";
        return $this->executeQuery($sInsertSQL);
    }

    function __destruct() {
        $this->sConnection->close();
        //print "Destroying " . __CLASS__ . "\n";
    }
}
?>