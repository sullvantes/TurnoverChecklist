<!DOCTYPE html>
<html>

<head>


<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "actionBaseline-header"></title>
	<link rel="stylesheet" href="/CSS/bootstrap.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.min.css"/>
</head>
<body>


<?php

function SQLPostReturn($string) {
$lowstring = strtolower($string); 
if(empty($_POST[$string]) && $_POST[$string]!='0')
	{
	return "";
	}
	else {
	return "$lowstring = $_POST[$string], ";
	}
}
function IsPostNull($string, $input) {
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

include("header.php");
include("makeconnection.php");
$chklstid = $_GET['pageChecklistID'];
$BASELINE_ID = $chklstid + 1000;


$sql5 = "UPDATE Data_Parms SET ".SQLPostReturn(FailedExtracts).SQLPostReturn(SalesFiles).SQLPostReturn(EFTA).SQLPostReturn(EFTB).SQLPostReturn(EFTC).SQLPostReturn(ActAcqW1).SQLPostReturn(ActAcqW2).SQLPostReturn(ActAcqW3).SQLPostReturn(DIAL_BH).SQLPostReturn(DIAL_BR).SQLPostReturn(DIAL_CN).SQLPostReturn(DIAL_FR).SQLPostReturn(DIAL_DE).SQLPostReturn(DIAL_HK).SQLPostReturn(DIAL_ID).SQLPostReturn(DIAL_IE).SQLPostReturn(DIAL_JP).SQLPostReturn(DIAL_MC).SQLPostReturn(DIAL_MY).SQLPostReturn(DIAL_MX).SQLPostReturn(DIAL_MO).SQLPostReturn(DIAL_SG).SQLPostReturn(DIAL_KR).SQLPostReturn(DIAL_TW).SQLPostReturn(DIAL_AE).SQLPostReturn(DIAL_UK).SQLPostReturn(DIAL_VN).SQLPostReturn(NRTI).SQLPostReturn(Malls).SQLPostReturn(DialAcqValue).SQLPostReturn(DialEUAcqValue).SQLPostReturn(IPAcqValue).SQLPostReturn(SIPAcqValue).SQLPostReturn(SIPEUAcqValue).SQLPostReturn(SIPHAcqValue).SQLPostReturn(SSCAcqValue)." Notable_Failures = NULL where id = $BASELINE_ID";


$sql9 = "UPDATE Data_Parms SET DialAcqClient = '$_POST[DialAcqClient]', DialEUAcqClient = '$_POST[DialEUAcqClient]', IPAcqClient = '$_POST[IPAcqClient]', SIPAcqClient = '$_POST[SIPAcqClient]', SIPEUAcqClient = '$_POST[SIPEUAcqClient]', SIPHAcqClient = '$_POST[SIPHAcqClient]', SSCAcqClient = '$_POST[SSCAcqClient]' where id where id = $BASELINE_ID";

$sql6 = "UPDATE Portal_Parms SET ".SQLPostReturn(eu1_q).SQLPostReturn(eu2_q)."portal = NULL where id = $BASELINE_ID";

$sql7 = "UPDATE System_Parms SET plapp04_idle = '$_POST[plapp04_NumIdle]', plapp05_idle = '$_POST[plapp05_NumIdle]', plapp06_idle = '$_POST[plapp06_NumIdle]', plapp07_idle = '$_POST[plapp07_NumIdle]', plapp04_active = '$_POST[plapp04_NumActive]', plapp05_active = '$_POST[plapp05_NumActive]', plapp06_active = '$_POST[plapp06_NumActive]', plapp07_active = '$_POST[plapp07_NumActive]', plapp04_mem = '$_POST[plapp04_Mem]', plapp05_mem = '$_POST[plapp05_Mem]', plapp06_mem = '$_POST[plapp06_Mem]', plapp07_mem = '$_POST[plapp07_Mem]', plapp04_cpu = '$_POST[plapp04_CPU]', plapp05_cpu = '$_POST[plapp05_CPU]', plapp06_cpu = '$_POST[plapp06_CPU]', plapp07_cpu = '$_POST[plapp07_CPU]' where id = ".$BASELINE_ID;

$sql8 = "UPDATE Jobwatch SET FTP_Inbox = '$_POST[FTP_Inbox]', CE_Root_Inbox = '$_POST[CE_Root_Inbox]', IFACT_Rollups = '$_POST[IFACT_Rollups]', Manual_Releases_Q = '$_POST[Manual_Releases_Q]', Manual_Releases_AsIs_Q = '$_POST[Manual_Releases_AsIs_Q]', Old_IFACT_Rollup = '$_POST[Old_IFACT_Rollup]', Day_Close_Past_Due = '$_POST[Day_Close_Past_Due]', Output_Rollup = '$_POST[Output_Rollup]', IFACT_IO_Rollups_Failed = '$_POST[IFACT_IO_Rollups_Failed]', IFACT_Load_Traffic = '$_POST[IFACT_Load_Traffic]', UDM_Rollups_InProc = '$_POST[UDM_Rollups_InProc]', UDM_Rollups_Waiting = '$_POST[UDM_Rollups_Waiting]', XML_Traffic_Stage = '$_POST[XML_Traffic_Stage]', Harvest_Rec_Not_Tried = '$_POST[Harvest_Rec_Not_Tried]', Dial_ADR_InProc_First = '$_POST[Dial_ADR_InProc_First]', Dial_ADR_InProc_Retry = '$_POST[Dial_ADR_InProc_Retry]', Dial_ADR_Q_First = '$_POST[Dial_ADR_Q_First]', Dial_ADR_Q_Retry = '$_POST[Dial_ADR_Q_Retry]' where id = ".$BASELINE_ID;


if (($conn->query($sql5) === TRUE) && ($conn->query($sql6) === TRUE)&&($conn->query($sql7) === TRUE)&&($conn->query($sql8) === TRUE)&&($conn->query($sql9) === TRUE))
{
echo "Baseline Submission Accepted.<br>";
}else
{
if ($conn->query($sql5) === TRUE) {
    echo "Updated baseline settings for Data Parms.<br>";
} else {
    echo "Error: " . $sql5 . "<br>" . $conn->error;
}
if ($conn->query($sql6) === TRUE) {
    echo "Updated baseline settings for Portal Parms.<br>";
} else {
    echo "Error: " . $sql6 . "<br>" . $conn->error;
}


if ($conn->query($sql7) === TRUE) {
    echo "Updated baseline settings for System Parms.<br>";
} else {
    echo "Error: " . $sql7 . "<br>" . $conn->error;
}

if ($conn->query($sql8) === TRUE) {
    echo "Updated baseline settings for Jobwatch.<br>";
} else {
    echo "Error: " . $sql8 . "<br>" . $conn->error;
}

if ($conn->query($sql9) === TRUE) {
    echo "Updated baseline settings for Overnight Orgs.<br>";
} else {
    echo "Error: " . $sql9 . "<br>" . $conn->error;
}
}

$sql1 = "SELECT failedextracts, salesfiles, EFTA, EFTB, EFTC, ActAcqW1, ActAcqW2, ActAcqW3, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_KR, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_TW, DIAL_AE, DIAL_UK, DIAL_VN, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, NRTI, Malls, SL_DiffURL, SL_Orgs, Notable_Failures FROM Data_Parms WHERE id = $BASELINE_ID";
$result1 = $conn->query($sql1);
//$data_parms_row = null;
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
$conn->close();?>
  
<input type="submit" value="Submit">
</form> 

<a href='ChecklistHome.php'> Return Home</a>

</body>
</html> 

<?php
/*
$sql1 = "SELECT failedextracts,salesfiles, EFTA,EFTB,EFTC, ActAcqW1,ActAcqW2,ActAcqW3, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_KR, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_TW, DIAL_AE, DIAL_UK, DIAL_VN, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, NRTI, Malls FROM Data_Parms WHERE id = ".$BASELINE_ID;
$result1 = $conn->query($sql1);
$data_parms_row = null;
if ($result1->num_rows > 0) {
    // output data of each row
    while($data_parms_row_tester = $result1->fetch_assoc()) {
        $data_parms_row = $data_parms_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

$sql2 = "SELECT eu1_q, eu2_q from Portal_Parms WHERE id = ".$BASELINE_ID;
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
    while($portal_parms_row_tester = $result2->fetch_assoc()) {
        $portal_parms_row = $portal_parms_row_tester;
	}
} else {
    echo "0 results<br><br>";
}

$sql3 = "SELECT plapp04_idle, plapp05_idle, plapp06_idle, plapp07_idle, plapp04_active, plapp05_active, plapp06_active, plapp07_active, plapp04_mem, plapp05_mem, plapp06_mem, plapp07_mem, plapp04_cpu, plapp05_cpu, plapp06_cpu, plapp07_cpu from System_Parms WHERE id =".$BASELINE_ID;
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    // output data of each row
    while($system_parms_row_tester = $result3->fetch_assoc()) {
        $system_parms_row = $system_parms_row_tester;
	}
} else {
    echo "0 results<br><br>";
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
$conn->close();


?>


<h2 id = "actionBaseline-title"></h2> 

<h4><u>Data Acquisition and Delivery</u></h4>
<form action="action_baseline7a.php" method = post>
<h5><u>Number of Failed Extracts :</u></h5>
<input type="number" name="FailedExtracts" value = "<?php echo $data_parms_row['failedextracts'];?>">

<h5><u>Number of Sales & Labor Files to be reposted:</u></h5>
<input type="number" name="SalesFiles" value = "<?php echo $data_parms_row['salesfiles'];?>">
<br>
<u>Number of Verizon EFT Sites Missing</u> <br>
10:30AM : 
<input type="number" name="EFT1030" value = "<?php echo $data_parms_row['EFTA'];?>" > <br>

10:45AM : 
<input type="number" name="EFT1045" value = "<?php echo $data_parms_row['EFTB'];?>"> <br>
11:00AM : 
<input type="number" name="EFT1100" value = "<?php echo $data_parms_row['EFTC'];?>"> <br>
<br>

<h5><u>Number of Missing NRTI sites:</u></h5>
<input type="number" name="NRTI" value = "<?php echo $data_parms_row['NRTI'];?>">
<br>

<h5><u>Number of Missing Mall Sites :</u></h5>
<input type="number" name="Malls" value = "<?php echo $data_parms_row['Malls'];?>">



  					 <table style="width:50%">
						 <h5><u>Overnight Processing</u></h5>
  <tr>
    <td><b>Connection Type </b></td>
    <td><b>Client</b></td>
    <td><b>Baseline</b></td>
  </tr>
  <tr>
    <td>SSC </td>
    <td><input type="number" name="SSCAcqClient" value = "<?php echo $data_parms_row['SSCAcqClient'];?>"></td>
    <td><input type="number" name="SSCAcqValue" value = "<?php echo $data_parms_row['SSCAcqValue'];?>">%</td>
  </tr>
  <tr>
    <td>SIPH </td>
    <td><input type="number" name="SIPHAcqClient" value = "<?php echo $data_parms_row['SIPHAcqClient'];?>"></td>
    <td><input type="number" name="SIPHAcqValue" value = "<?php echo $data_parms_row['SIPHAcqValue'];?>">%</td>
  </tr>
  <tr>
    <td>SIP </td>
    <td><input type="number" name="SIPAcqClient" value = "<?php echo $data_parms_row['SIPAcqClient'];?>"></td>
    <td><input type="number" name="SIPAcqValue" value = "<?php echo $data_parms_row['SIPAcqValue'];?>">%</td>
  </tr>
  <tr>
    <td>European SIP </td>
    <td><input type="number" name="SIPEUAcqClient" value = "<?php echo $data_parms_row['SIPEUAcqClient'];?>"></td>
    <td><input type="number" name="SIPEUAcqValue" value = "<?php echo $data_parms_row['SIPEUAcqValue'];?>">%</td>
  </tr>
  <tr>
    <td>IP </td>
    <td><input type="number" name="IPAcqClient" value = "<?php echo $data_parms_row['IPAcqClient'];?>"></td>
    <td><input type="number" name="IPAcqValue" value = "<?php echo $data_parms_row['IPAcqValue'];?>">%</td>
  </tr>
  <tr>
    <td>Dial </td>
    <td><input type="number" name="DialAcqClient" value = "<?php echo $data_parms_row['DialAcqClient'];?>"></td>
    <td><input type="number" name="DialAcqValue" value = "<?php echo $data_parms_row['DialAcqValue'];?>">%</td>
  </tr>
  <tr>
    <td>European Dial  </td>
    <td><input type="number" name="DialEUAcqClient" value = "<?php echo $data_parms_row['DialEUAcqClient'];?>"></td>
    <td><input type="number" name="DialEUAcqValue" value = "<?php echo $data_parms_row['DialEUAcqValue'];?>">%</td>
  </tr>
  </table> 	




<h4><u>International Dial Success Rate by Region:</u></h4>
Bahrain: <input type="percent" name="DIAL_BH" value = "<?php echo $data_parms_row['DIAL_BH']?>"> % 
<br>
Brazil: <input type="percent" name="DIAL_BR" value = "<?php echo $data_parms_row['DIAL_BR']?>"> % 
<br>
China: <input type="percent" name="DIAL_CN" value = "<?php echo $data_parms_row['DIAL_CN']?>"> % 
<br>
France: <input type="percent" name="DIAL_FR" value = "<?php echo $data_parms_row['DIAL_FR']?>"> % 
<br>
Germany: <input type="percent" name="DIAL_DE" value = "<?php echo $data_parms_row['DIAL_DE']?>"> % 
<br>
Hong Kong: <input type="percent" name="DIAL_HK" value = "<?php echo $data_parms_row['DIAL_HK']?>"> % 
<br>
Indonesia: <input type="percent" name="DIAL_ID" value = "<?php echo $data_parms_row['DIAL_ID']?>"> % 
<br>
Ireland: <input type="percent" name="DIAL_IE" value = "<?php echo $data_parms_row['DIAL_IE']?>"> % 
<br>
Japan: <input type="percent" name="DIAL_JP" value = "<?php echo $data_parms_row['DIAL_JP']?>"> % 
<br>
Macau: <input type="percent" name="DIAL_MC" value = "<?php echo $data_parms_row['DIAL_MC']?>"> % 
<br>
Malaysia: <input type="percent" name="DIAL_MY" value = "<?php echo $data_parms_row['DIAL_MY']?>"> % 
<br>
Mexico: <input type="percent" name="DIAL_MX" value = "<?php echo $data_parms_row['DIAL_MX']?>"> % 
<br>
Monaco: <input type="percent" name="DIAL_MO" value = "<?php echo $data_parms_row['DIAL_MO']?>"> % 
<br>
Singapore: <input type="percent" name="DIAL_SG" value = "<?php echo $data_parms_row['DIAL_SG']?>"> % 
<br>
South Korea: <input type="percent" name="DIAL_KR" value = "<?php echo $data_parms_row['DIAL_KR']?>"> % 
<br>
Taiwan: <input type="percent" name="DIAL_TW" value = "<?php echo $data_parms_row['DIAL_TW']?>"> % 
<br>
Thailand: <input type="percent" name="DIAL_TH" value = "<?php echo $data_parms_row['DIAL_TH']?>"> % 
<br>
UAE: <input type="percent" name="DIAL_AE" value = "<?php echo $data_parms_row['DIAL_AE']?>"> % 
<br>
United Kingdom: <input type="percent" name="DIAL_UK" value = "<?php echo $data_parms_row['DIAL_UK']?>"> % 
<br>
Vietnam: <input type="percent" name="DIAL_VN" value = "<?php echo $data_parms_row['DIAL_VN']?>"> % 
<br>


<h5><u>Actual Acquisition Window:</u></h5>
<30 min: <input type="number" name="ActAcqW1" value = "<?php echo $data_parms_row['ActAcqW1'];?>"> 
>30 min: <input type="number" name="ActAcqW2" value = "<?php echo $data_parms_row['ActAcqW2'];?>">
>60 min: <input type="number" name="ActAcqW3" value = "<?php echo $data_parms_row['ActAcqW3'];?>">
<br>

<h3><u>Customer & Internal Portals</u></h3>

<a href = http://10.32.10.162/ target = "_blank"> Rapid Blue:</a> <br>
EU_Backend_Server_1 - Queue Size: <br> 
<input type="number" name="eu1_q" value = "<?php echo $portal_parms_row['eu1_q'];?>"><br>
EU_Backend_Server_2 - Queue Size: <br>
<input type="number" name="eu2_q" value = "<?php echo $portal_parms_row['eu2_q'];?>"> <br>

<h3><u>JobWatch Snapshot</u></h3>
<h5><b> File Count</b></h5>
	FTP Inbox:&nbsp<input type="number" name="FTP_Inbox" value = "<?php echo $Jobwatch['FTP_Inbox'];?>"><br> 
	CE Root Inbox:&nbsp<input type="number" name="CE_Root_Inbox" value = "<?php echo $Jobwatch['CE_Root_Inbox'];?>"><br> 
<h5><b> BBS Messages</b></h5>
	IFACT Rollups:&nbsp<input type="number" name="IFACT_Rollups" value = "<?php echo $Jobwatch['IFACT_Rollups'];?>"> <br>
	Manual Releases Queue:&nbsp<input type="number" name="Manual_Releases_Q" value = "<?php echo $Jobwatch['Manual_Releases_Q'];?>"> <br>
	Manual Releases As-Is Queue:&nbsp<input type="number" name="Manual_Releases_AsIs_Q" value = "<?php echo $Jobwatch['Manual_Releases_AsIs_Q'];?>"><br> 
<h5><b>Queries</b></h5>
	Old IFACT Rollup:&nbsp<input type="number" name="Old_IFACT_Rollup" value = "<?php echo $Jobwatch['Old_IFACT_Rollup'];?>"> <br>
	Day Close Past Due:&nbsp<input type="number" name="Day_Close_Past_Due" value = "<?php echo $Jobwatch['Day_Close_Past_Due'];?>"> <br>
	Output Rollup 15 to Hr/Day:&nbsp<input type="number" name="Output_Rollup" value = "<?php echo $Jobwatch['Output_Rollup'];?>"> <br>
	IFACT Input to Output Rollups Failed:&nbsp<input type="number" name="IFACT_IO_Rollups_Failed" value = "<?php echo $Jobwatch['IFACT_IO_Rollups_Failed'];?>"> <br>
	IFACT Load Traffic:&nbsp<input type="number" name="IFACT_Load_Traffic" value = "<?php echo $Jobwatch['IFACT_Load_Traffic'];?>"> <br>
	UDM Rollups(RTA) In-Process:&nbsp<input type="number" name="UDM_Rollups_InProc" value = "<?php echo $Jobwatch['UDM_Rollups_InProc'];?>"> <br>
	UDM Rollups(RTA) Waiting:&nbsp<input type="number" name="UDM_Rollups_Waiting" value = "<?php echo $Jobwatch['UDM_Rollups_Waiting'];?>"> <br>
	XML Traffic Stage:&nbsp<input type="number" name="XML_Traffic_Stage" value = "<?php echo $Jobwatch['XML_Traffic_Stage'];?>"> <br>
	Harvest Recoveries Not Tried:&nbsp<input type="number" name="Harvest_Rec_Not_Tried" value = "<?php echo $Jobwatch['Harvest_Rec_Not_Tried'];?>"> <br>
	Dial ADR In-Process 1st Attempt:&nbsp<input type="number" name="Dial_ADR_InProc_First" value = "<?php echo $Jobwatch['Dial_ADR_InProc_First'];?>"> <br>
	Dial ADR In-Process Retry:&nbsp<input type="number" name="Dial_ADR_InProc_Retry" value = "<?php echo $Jobwatch['Dial_ADR_InProc_Retry'];?>"> <br>
	Dial ADR Queue 1st Attempt:&nbsp<input type="number" name="Dial_ADR_Q_First" value = "<?php echo $Jobwatch['Dial_ADR_Q_First'];?>"> <br>
	Dial ADR Queue Retry:&nbsp<input type="number" name="Dial_ADR_Q_Retry" value = "<?php echo $Jobwatch['Dial_ADR_Q_Retry'];?>"> <br>








<h3><u>Systems</u></h3>

  					 <table style="width:50%">
						 <h5><u>Number of Harvest Connections</u></h5>
  <tr>
    <td><b>Instance </b></td>
    <td><b>NumIdle</b></td>
    <td><b>NumActive</b></td>
  </tr>
  <tr>
    <td>PLAPP04: </td>
    <td><input type="number" name="plapp04_NumIdle" value = "<?php echo $system_parms_row['plapp04_idle'];?>"></td>
    <td><input type="number" name="plapp04_NumActive" value = "<?php echo $system_parms_row['plapp04_active'];?>"></td>
  </tr>
  <tr>
    <td>PLAPP05:</td>
    <td><input type="number" name="plapp05_NumIdle"value = "<?php echo $system_parms_row['plapp05_idle'];?>"></td>
    <td><input type="number" name="plapp05_NumActive"value = "<?php echo $system_parms_row['plapp05_active'];?>"></td>
  </tr>
  <tr>
    <td>PLAPP06:</td>
    <td><input type="number" name="plapp06_NumIdle"value = "<?php echo $system_parms_row['plapp06_idle'];?>"></td>
    <td><input type="number" name="plapp06_NumActive"value = "<?php echo $system_parms_row['plapp06_active'];?>"></td>
  </tr>
  <tr>
    <td>PLAPP07:</td>
    <td><input type="number" name="plapp07_NumIdle"value = "<?php echo $system_parms_row['plapp07_idle'];?>"></td>
    <td><input type="number" name="plapp07_NumActive"value = "<?php echo $system_parms_row['plapp07_active'];?>"></td>
  </tr>
</table> 	


	<table style="width:40%">
	<h5><u>Harvest Memory Utilization:</u></h5>
   <tr>
    <td>PLAPP04: </td>
    <td><input type="percent" name="plapp04_Mem" value = "<?php echo $system_parms_row['plapp04_mem'];?>">%</td>
   </tr>
   <tr>
    <td>PLAPP05: </td>
    <td><input type="percent" name="plapp05_Mem"value = "<?php echo $system_parms_row['plapp05_mem'];?>">%</td>
   </tr>
   <tr>
    <td>PLAPP06: </td>
    <td><input type="percent" name="plapp06_Mem"value = "<?php echo $system_parms_row['plapp06_mem'];?>">%</td>
   </tr>
   <tr>
    <td>PLAPP07: </td>
    <td><input type="percent" name="plapp07_Mem"value = "<?php echo $system_parms_row['plapp07_mem'];?>">%</td>
   </tr>
   </table>

<table style="width:40%">
	<h5><u>Harvest CPU Utilization:</u></h5>
   <tr>
    <td>PLAPP04: </td>
    <td><input type="percent" name="plapp04_CPU"value = "<?php echo $system_parms_row['plapp04_cpu'];?>">%</td>
   </tr>
   <tr>
    <td>PLAPP05: </td>
    <td><input type="percent" name="plapp05_CPU"value = "<?php echo $system_parms_row['plapp05_cpu'];?>">%</td>
   </tr>
   <tr>
    <td>PLAPP06: </td>
    <td><input type="percent" name="plapp06_CPU"value = "<?php echo $system_parms_row['plapp06_cpu'];?>">%</td>
   </tr>
   <tr>
    <td>PLAPP07: </td>
    <td><input type="percent" name="plapp07_CPU"value = "<?php echo $system_parms_row['plapp07_cpu'];?>">%</td>
   </tr>
   </table>
   
<input type="submit" value="Submit">
</form> 

<a href='ChecklistHome.php'> Return Home</a>

<?php
$conn->close();


*/?>

 

