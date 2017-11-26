<!DOCTYPE html>
<html>

<head>
<?php
    
   if ($_GET['pageChecklistID']==1) {
        $chk_time = '7AM Checklist Submission';
    } elseif ($_GET['pageChecklistID']==2) {
        $chk_time = '11AM Checklist Submission';
    } elseif ($_GET['pageChecklistID']==3) {
        $chk_time = ' 3PM Checklist Submission';
    } elseif ($_GET['pageChecklistID']==4) {
        $chk_time = '11PM Checklist Submission';
    }
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header"><?php echo $chk_time ?> </title>


</head>
<body>


<?php

function IsPostNull($input) {
if(empty($input) && $input!='0')
	{
	return "null";
	}
	else {
	return $input;
	}
}

function IfEmpty($input) {
if(empty($input))
	{
	return "NULL";
	}
	else {
	return $input;
	}
}


include("header.html");

include("makeconnection.php");

echo "<h2 id = 'action-title'></h2>";
$chklstid = $_GET['pageChecklistID'];

//Insert Record for ID table
$sql_create_id = "INSERT INTO Checklist.Checklist (date_submitted,user,chklist_time_id)
VALUES(now(),'msullivan',$chklstid)";
    
//If ID insert successful, Create SQL Strings for each Parm Table
if ($conn->query($sql_create_id) === TRUE) {
	echo "New record created successfully for CHKLST_ID <br>";
	$last_id = mysqli_insert_id($conn);
	echo "Last inserted ID is: " . $last_id."<br>"; 
 	
	$sql_insert_data_parms = "INSERT INTO Checklist.Data_Parms (data_id, FailedExtracts,FailedExtractNames, SalesFiles, SalesFilesClients, EFTA, EFTB, EFTC, ActAcqW1, ActAcqW2, ActAcqW3, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, NRTI, Malls) VALUES ($last_id,".IsPostNull($_POST[FailedExtracts]).",'$_POST[FailedExtractNames]',".IsPostNull($_POST[SalesFiles]).",'$_POST[SalesFilesClients]',".IsPostNull($_POST[EFTA]).",".IsPostNull($_POST[EFTB]).",".IsPostNull($_POST[EFTC]).",".IsPostNull($_POST[ActAcqW1]).",".IsPostNull($_POST[ActAcqW2]).",".IsPostNull($_POST[ActAcqW3]).",".IsPostNull($_POST[DialAcqValue]).",".IsPostNull($_POST[DialEUAcqValue]).",".IsPostNull($_POST[IPAcqValue]).",".IsPostNull($_POST[SIPAcqValue]).",".IsPostNull($_POST[SIPEUAcqValue]).",".IsPostNull($_POST[SIPHAcqValue]).",".IsPostNull($_POST[SSCAcqValue]).",'$_POST[DialAcqClient]','$_POST[DialEUAcqClient]','$_POST[IPAcqClient]','$_POST[SIPAcqClient]','$_POST[SIPEUAcqClient]','$_POST[SIPHAcqClient]','$_POST[SSCAcqClient]',".IsPostNull($_POST[NRTI]).",".IsPostNull($_POST[Malls]).")";

    $sql_insert_dial_parms = "INSERT INTO Checklist.Dial_Parms (dial_chklist_id, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_AE, DIAL_UK, DIAL_VN) VALUES ($last_id,".IsPostNull($_POST[DIAL_BH]).",".IsPostNull($_POST[DIAL_BR]).",".IsPostNull($_POST[DIAL_CN]).",".IsPostNull($_POST[DIAL_FR]).",".IsPostNull($_POST[DIAL_DE]).",".IsPostNull($_POST[DIAL_HK]).",".IsPostNull($_POST[DIAL_ID]).",".IsPostNull($_POST[DIAL_IE]).",".IsPostNull($_POST[DIAL_JP]).",".IsPostNull($_POST[DIAL_MO]).",".IsPostNull($_POST[DIAL_MY]).",".IsPostNull($_POST[DIAL_MX]).",".IsPostNull($_POST[DIAL_MC]).",".IsPostNull($_POST[DIAL_SG]).",".IsPostNull($_POST[DIAL_TH]).",".IsPostNull($_POST[DIAL_AE]).",".IsPostNull($_POST[DIAL_UK]).",".IsPostNull($_POST[DIAL_VN]).")";

	$sql_insert_portal_parms = "INSERT INTO Checklist.Portal_Parms(portal_id, portal, insights, opsportal, plweb11, plweb12, plweb13, plweb14, eu1_q, eu2_q, remedy, kpi, edtws, mkt_intel, fore_admin, sms_bill, rdm_vp, sys_rpt, eftws) VALUES ($last_id,".IfEmpty($_POST[portal]).",".IfEmpty($_POST[insights]).",".IfEmpty($_POST[opsportal]).",".IfEmpty($_POST[plweb11]).",".IfEmpty($_POST[plweb12]).",".IfEmpty($_POST[plweb13]).",".IfEmpty($_POST[plweb14]).",$_POST[eu1_q],$_POST[eu2_q],".IfEmpty($_POST[remedy]).",".IfEmpty($_POST[kpiapi]).",".IfEmpty($_POST[edtws]).",".IfEmpty($_POST[MktIntel]).",".IfEmpty($_POST[ForeAdmin]).",".IfEmpty($_POST[SMSBill]).",".IfEmpty($_POST[RDMVP]).",".IfEmpty($_POST[SysRpt]).",".IfEmpty($_POST[EFTWS]).")";
	
	$sql_insert_system_parms = "INSERT INTO Checklist.System_Parms(system_id, plapp04_idle, plapp05_idle, plapp06_idle, plapp07_idle, plapp04_active, plapp05_active, plapp06_active, plapp07_active, plapp04_mem, plapp05_mem, plapp06_mem, plapp07_mem, plapp04_cpu, plapp05_cpu, plapp06_cpu, plapp07_cpu) VALUES ($last_id,".IsPostNull($_POST[plapp04_idle]).",".IsPostNull($_POST[plapp05_idle]).",".IsPostNull($_POST[plapp06_idle]).",".IsPostNull($_POST[plapp07_idle]).",".IsPostNull($_POST[plapp04_active]).",".IsPostNull($_POST[plapp05_active]).",".IsPostNull($_POST[plapp06_active]).",".IsPostNull($_POST[plapp07_active]).",".IsPostNull($_POST[plapp04_mem]).",".IsPostNull($_POST[plapp05_mem]).",".IsPostNull( $_POST[plapp06_mem]).",".IsPostNull($_POST[plapp07_mem]).",".IsPostNull($_POST[plapp04_cpu]).",".IsPostNull($_POST[plapp05_cpu]).",".IsPostNull($_POST[plapp06_cpu]).",".IsPostNull($_POST[plapp07_cpu]).")";

	$sql_insert_jobwatch_parms = "INSERT INTO Checklist.Jobwatch(jobwatch_id, FTP_Inbox, CE_Root_Inbox, IFACT_Rollups, Manual_Releases_Q, Manual_Releases_AsIs_Q, Old_IFACT_Rollup,Day_Close_Past_Due, Output_Rollup, IFACT_IO_Rollups_Failed, IFACT_Load_Traffic, UDM_Rollups_InProc, UDM_Rollups_Waiting, XML_Traffic_Stage, Harvest_Rec_Not_Tried, Dial_ADR_InProc_First, Dial_ADR_InProc_Retry, Dial_ADR_Q_First, Dial_ADR_Q_Retry, Inppwibx02,Inppwibx03,Inppwibx05) VALUES ($last_id,".IsPostNull($_POST[FTP_Inbox]).", ".IsPostNull($_POST[CE_Root_Inbox]).", ". IsPostNull($_POST[ IFACT_Rollups]).", ". IsPostNull($_POST[ Manual_Releases_Q]).", ". IsPostNull($_POST[ Manual_Releases_AsIs_Q]).", ". IsPostNull($_POST[ Old_IFACT_Rollup]).", ". IsPostNull($_POST[Day_Close_Past_Due]).", ". IsPostNull($_POST[ Output_Rollup]).", ". IsPostNull($_POST[IFACT_IO_Rollups_Failed]).", ".IsPostNull($_POST[ IFACT_Load_Traffic]).", ". IsPostNull($_POST[UDM_Rollups_InProc]).", ". IsPostNull($_POST[UDM_Rollups_Waiting]).", ". IsPostNull($_POST[XML_Traffic_Stage]).", ". IsPostNull($_POST[ Harvest_Rec_Not_Tried]).", ". IsPostNull($_POST[Dial_ADR_InProc_First]).", ". IsPostNull($_POST[ Dial_ADR_InProc_Retry]).", ". IsPostNull($_POST[Dial_ADR_Q_First]).", ". IsPostNull($_POST[ Dial_ADR_Q_Retry]).", ". IsPostNull($_POST[ Inppwibx02]).", ".IsPostNull($_POST[Inppwibx03]).", ".IsPostNull($_POST[Inppwibx05]).")";


//    Submitting to Parm Tables
    $AllSubmissionSuccess=TRUE;
        
    if ($conn->query($sql_insert_data_parms) === TRUE) {
        echo "<br>New record created successfully for DATA_PARMS.<br>";
    } else {
        echo "<br>Data Parms Error: " . $conn->error;
        $AllSubmissionSuccess=FALSE;
    }

    if ($conn->query($sql_insert_dial_parms) === TRUE) {
        echo "<br>New record created successfully for DIAL_PARMS.<br>";
    } else {
        echo "<br>Dial Parms Error: " . $conn->error;
        $AllSubmissionSuccess=FALSE;

    }

    if ($conn->query($sql_insert_portal_parms) === TRUE) {
        echo "<br>New record created successfully for Portal_Parms.<br>";
    } else {
        echo "<br>Portal Parms Error: " . $conn->error;
        $AllSubmissionSuccess=FALSE;
    }

    if ($conn->query($sql_insert_system_parms) === TRUE) {
        echo "<br>New record created successfully for System_Parms.<br>";
    } else {
        echo "<br>System Parms Error: " . $conn->error;
        $AllSubmissionSuccess=FALSE;
    }

    if ($conn->query($sql_insert_jobwatch_parms) === TRUE) {
        echo "<br>New record created successfully for Jobwatch_Parms.<br>";
    } 
    else{
        echo "<br>Jobwatch Parms Error: " . $conn->error;
//        $AllSubmissionSuccess=FALSE;
    }

    if ($AllSubmissionSuccess==TRUE){
        echo "<h2>Submission Accepted.</h2>";
    }
}

else {
    echo "<br>Error: Insert into Secondary Tables not attempted - CHKLST_ID update failed ";
	}


$conn->close();
print("<br><a href='ChecklistHome.php'> Return Home</a>");
?>


</body>
</html>  

