 <!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "viewBaseline-header">Header</title>
	<link rel="stylesheet" href="/CSS/bootstrap.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.min.css"/>
</head>




<?php
/*
function ModemSuccessRate($inputbool,$inputpercent) {
     if($inputbool == false){
	$inputpercent = null;
}
	return($inputpercent);
}*/
?>
 
<?php
include("header.php");
include("makeconnection.php");
$chklstid = $_GET['pageChecklistID'];
$BASELINE_ID = $chklstid + 1000;
$sql1 = "SELECT failedextracts, salesfiles, EFTA, EFTB, EFTC, ActAcqW1, ActAcqW2, ActAcqW3, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_KR, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_TW, DIAL_AE, DIAL_UK, DIAL_VN, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, NRTI, Malls, SL_DiffURL, SL_Orgs, Notable_Failures FROM Data_Parms WHERE id = $BASELINE_ID";
$result1 = $conn->query($sql1);
$data_parms_row = null;
if ($result1->num_rows > 0) {
    // output data of each row
    while($data_parms_row_tester = $result1->fetch_assoc()) {
        $data_parms_row = $data_parms_row_tester;
    	}
} else {
    echo "0 resultsData<br><br>";
}

$sql2 = "SELECT eu1_q, eu2_q from Portal_Parms WHERE id = $BASELINE_ID";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
    while($portal_parms_row_tester = $result2->fetch_assoc()) {
        $portal_parms_row = $portal_parms_row_tester;
	}
} else {
    echo "0 resultsPortals<br><br>";
}

$sql3 = "SELECT plapp04_idle, plapp05_idle, plapp06_idle, plapp07_idle, plapp04_active, plapp05_active, plapp06_active, plapp07_active, plapp04_mem, plapp05_mem, plapp06_mem, plapp07_mem, plapp04_cpu, plapp05_cpu, plapp06_cpu, plapp07_cpu from System_Parms WHERE id = $BASELINE_ID";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    // output data of each row
    while($system_parms_row_tester = $result3->fetch_assoc()) {
        $system_parms_row = $system_parms_row_tester;
	}
} else {
    echo "0 resultsSystem<br><br>";
}

$sql4 = "SELECT FTP_Inbox, CE_Root_Inbox, IFACT_Rollups, Manual_Releases_Q, Manual_Releases_AsIs_Q, Old_IFACT_Rollup, Day_Close_Past_Due, Output_Rollup, IFACT_IO_Rollups_Failed, IFACT_Load_Traffic, UDM_Rollups_InProc, UDM_Rollups_Waiting, XML_Traffic_Stage, Harvest_Rec_Not_Tried, Dial_ADR_InProc_First, Dial_ADR_InProc_Retry, Dial_ADR_Q_First, Dial_ADR_Q_Retry, Inppwibx02, Inppwibx03, Inppwibx05 FROM Jobwatch where id = ".$BASELINE_ID;
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) {
    // output data of each row
    while($Jobwatch_row_tester = $result4->fetch_assoc()) {
        $Jobwatch = $Jobwatch_row_tester;
	}
} else {
    echo "0 resultsJobwatch<br><br>";
}
?>

<h2 id = "viewBaseline-title"></h2>

<form action="updateBaseAll.php?pageChecklistID=<?php echo $_GET['pageChecklistID'] ?>" method = post>
<?php 
include ("dataRetrievalBase.php");
include ("overnightBase.php");
include("dialBase.php");
include("jobwatchBase.php");
include("harvestBase.php");
include("portalBase.php");
?>
  
<input type="submit" value="Submit">
</form> 

<a href='ChecklistHome.php'> Return Home</a>

</body>
<?php
$conn->close();
?>

</html> 

