<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "rtrn-header">Header</title>
    	<link rel="stylesheet" href="/CSS/bootstrap.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.min.css"/>
</head>



<body>


<?php
include("header.php");
include("makeconnection.php");
$BASELINE_ID = $_GET['pageChecklistID'] + 1000;
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

$sql2 = "SELECT eu1_q, eu2_q from Portal_Parms WHERE ".$BASELINE_ID;
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
?>
<h2 id = "rtrn-title"></h2>
<h4><center>Be sure to confirm both<center> </h4>
<div class="row">
        <div class="col-md-3">
	</div>
	<div class="col-md-2">
	<center><div class='alert alert-danger' role='alert'><strong>ALERT Values</strong></div></center>
	</div>
	<div class="col-md-2">
	<h4><center>and</center></h4> 
	</div>
	<div class="col-md-2">
	<center><div class='alert alert-warning' role='alert'><strong>Empty Entries</strong></div></center>
	</div>
	<div class="col-md-3">
	</div>
</div>
<h4><center>Click "Submit" if values are accurate.<center></h4> 
<body>


<?php
function TrueFalse($input)
{
if($input == "TRUE")
		echo 1;
	else
		echo 0;
}
?>

<?php
function Available ($input,$name)
{
echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
		echo $name." is available.</div></div>";
	}
	else
	{
		echo "<font color = 'red'>".$name. " is unavailable.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$name." outage. </div></div></div>";
	}
}
?>

<?php
function UpDown ($input,$name)
{
echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
		echo $name." is up.</div>    </div>";
	}
	else
	{
		echo "<font color = 'red'>".$name. " is down.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$name." outage. </div></div></div>";
	}
}
?>
<?php 
function AvailString($String, $input)
{
if($input == 'FALSE')
{
echo "<font color='red'>$String</font>";
}
}
?>

<?php 
function QueueLevel($Value, $Thresh, $Name)
{
if($Value>=$Thresh)
echo "<div class='col-md-3'><font color='red'>There are currently ".$Value." files waiting to be processed.</font></div><div class='col-md-3'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$Name." queue. </div></div>";
else
echo "<div class='col-md-3'>There are currently ".$Value." files waiting to be processed. This is okay.</div><div class='col-md-3'></div>";
}
?>

<?php 
function ThreshNum($Value, $Thresh)
{
if(!empty($Value))
{	
	if($Value>$Thresh)
		echo "<font color='red'>$Value</font>";
	else
		echo $Value;
}
elseif($Value == '0')
	{
	echo $Value;
	}
else
	{
	echo "<strong>blank</strong>";
	}	
}
?>

<?php 
//BELOW is for Thresholds that need to be alerted when the are BELOW a certain threshold rather than above.
function BelowThreshNum($Value, $Thresh)
{
if(!empty($Value))
{	
	if($Value<$Thresh)
		echo "<font color='red'>$Value</font>";
	else
		echo $Value;
}
elseif($Value == '0')
	{
	echo $Value;
	}
else
	{
	echo "<strong>blank</strong>";
	}	
}
?>

<?php 
//BELOW is for Thresholds that need to be alerted when the are BELOW a certain threshold rather than above.
function BelowThreshString($String, $Value, $Thresh)
{
if($Value>$Thresh && $value !='0')
	echo "<br> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> $String</div>";
}
?>

<?php 
function ThreshString($String, $Value, $Thresh)
{
if($Value>$Thresh)
	echo "<div class='alert alert-danger' role='alert'><strong>Action Required!</strong> $String</div>";
else
	echo "<div class='col-md-4'></div>";
}
?>


<?php
function ThreshDecide($inputBAD,$inputOKAY,$value,$threshold)
{
if($value > $threshold)
	{
		echo "<font color = 'red'>$inputBAD</font>";
	}
	else
	{
		echo $inputOKAY;
	}
}
?>







<?php
function DialHandle($dialvalue, $country,$thresh,$dialbool)
{
if($dialbool == 'on')
{
echo $country." is not represented in this checklist.";
}
elseif (empty($dialvalue)&&$dialvalue != '0')
	{
	echo "There is no entry for dial success rate in ". $country. ".<div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter a dial success rate for ". $country. "? 		Please hit 'Back' to adjust your entry."."</div>";
	}
	else
	{
	echo $country . " success rate is ";
	if($dialvalue<$thresh)
		echo "<font color='red'>$dialvalue%. </font>";
	else
		echo $dialvalue."%. ";
	if($dialvalue < $thresh)
		echo "<br> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for ".$country.". ".$dialvalue."% is less than the threshold of ". $thresh."%.</div>";
	}
}

?>

<?php
function AcqHandle($dialvalue, $country,$thresh,$dialbool)
{
if($dialbool == 'on')
{
echo $country." is not represented in this checklist.";
}
elseif (empty($dialvalue)&&$dialvalue != '0')
	{
	echo "There is no entry for dial success rate in ". $country. ".<div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter a dial success rate for ". $country. "? 		Please hit 'Back' to adjust your entry."."</div>";
	}
	else
	{
	echo $country . " success rate is ";
	if($dialvalue<$thresh)
		echo "<font color='red'>$dialvalue%. </font>";
	else
		echo $dialvalue."%. ";
	if($dialvalue < $thresh)
		echo "<br> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for ".$country.". ".$dialvalue."% is less than the threshold of ". $thresh."%.</div>";
	}
}

?>




<?php function DialBoolHandle($dialvalue,$dialbool){
if($dialbool!='on'){
	echo $dialvalue;
	}
}
?>
	

<?php
function HarvestHealth($AppNum,$AppIdle,$AppActive,$AppMem,$AppCPU,$ThreshIdle,$ThreshActive,$ThreshMem,$ThreshCPU)
{
$AppConns = $AppIdle + $AppActive;
$ThreshConns = $ThreshIdle + $ThreshActive;
//left column - Info
echo "<div class = 'row'><div class='col-md-4'>"; 



if((empty($AppIdle)&&$AppIdle != '0')||(empty($AppActive)&&$AppActive != '0'))
{
echo "Connections were not entered for PLAPP".$AppNum.".<br>";
}
	else if($AppConns>$ThreshConns)
	{
	echo "<font color = 'red'>PLAPP".$AppNum." has ".$AppConns." connections( > threshold of ".$ThreshConns." total connections)<br></font>";
	}
		else 
		{
		echo "PLAPP".$AppNum." has ".$AppConns." connections. (< = threshold of ".$ThreshConns." total connections)<br>";
		}



	
if(empty($AppMem)&&$AppMem != '0')
{
echo "No Value was entered for Memory on PLAPP".$AppNum.".<br>";
}
	else if($AppMem>$ThreshMem)
	{
	echo "<font color = 'red'>PLAPP".$AppNum." has high memory usage at ".$AppMem."%.<br></font>";
	}
		else
		{
		echo "PLAPP".$AppNum." is using ".$AppMem."% of memory. This is within threshold.<br>";
		}	
if(empty($AppCPU)&&$AppCPU != '0')
{
echo "No Value was entered for CPU on PLAPP".$AppNum.".<br>";
}
	else if($AppCPU >$ThreshCPU)
	{
	echo "<font color = 'red'>PLAPP".$AppNum." has high CPU usage at ".$AppCPU."%.<br></font>";
	}
		else
		{
		echo "PLAPP".$AppNum." is using ".$AppCPU."% of CPU. This is within threshold.<br>";
		}
echo "</div>";
//Middle Column - Warning Alerts
echo "<div class='col-md-4'>";
if($AppConns>$ThreshConns)
	echo "<div class='alert alert-danger' role='alert'><strong>Action Required!</strong> JBoss needs to be restarted on PLAPP". $AppNum.".</div>";
if($AppMem>$ThreshMem)
	echo "<div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please monitor memory on PLAPP". $AppNum." closely.</div>";
if($AppCPU >$ThreshCPU)
	echo "<div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please monitor CPU on PLAPP". $AppNum." closely.</div>";
echo "</div>";
//Right Column - Empty Alerts
echo "<div class='col-md-4'>";
WantsValue($AppIdle,"PLAPP".$AppNum." Idle Processes");
WantsValue($AppActive,"PLAPP".$AppNum." Active Processes");
WantsValue($AppMem,"PLAPP".$AppNum." Memory");
WantsValue($AppCPU,"PLAPP".$AppNum." CPU");
echo "</div></div>";
}
?>




<?php
function WantsValue($input,$name)
{
	if(empty($input)&&$input!='0') 
	{
	echo "<div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter a value for ". $name. "? Please hit 'Back' to adjust your entry."."</div>";
	}
	
}
?>




<?php
function Plural($input)
{	
	if($input > 1 || $input == 0 || empty($input))
		echo "s";
}
?>

<?php
function Okay ($input,$name)
{
echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
		echo $name." is performing well.</div></div>";
	}
	else
	{
		echo "<font color = 'red'>".$name. " is not performing well.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$name." outage. </div></div></div>";
	}
}
?>

<div id = "dataAcqTitleExpanded">
<h4><u>Data Acquisition and Delivery (-)</u></h4>
</div>
<div id = "dataAcqTitleCollapsed">
<h4><u>Data Acquisition and Delivery (+)</u></h4>
</div>
<div class="container">
<div id = "dataAcqBody">

<div class='row'><div class='col-md-4'> Shoppertrak has missed 
<?php ThreshNum($_POST["FailedExtracts"],$data_parms_row[failedextracts]); ?>  
extract<?php Plural($_POST["FailedExtracts"]); ?>.</div>
<div class='col-md-4'>
<?php if ($_POST["FailedExtractNames"]!= "")
	{
	ThreshString("Please look into the failed extract issue for ".$_POST["FailedExtractNames"].".",$_POST["FailedExtracts"],$data_parms_row[failedextracts]);
	}
	else 
	{
	ThreshString("Please look into the failed extract issue.",$_POST["FailedExtracts"],$data_parms_row[failedextracts]);
	}
	?>
</div>
<div class='col-md-4'>
<?php WantsValue($_POST["FailedExtracts"], "number of missing extracts"); ?>


<?php if($_POST["FailedExtracts"]>0)
	WantsValue($_POST["FailedExtractNames"], "names of missing extracts"); ?>
</div></div>
<br><br>


<div class='row'><div class='col-md-4'> Production Support needs to reload 
<?php ThreshNum($_POST["SalesFiles"],$data_parms_row[salesfiles]);?> sales/labor file<?php Plural($_POST["SalesFiles"]); ?>.</div>
<div class='col-md-4'>
<?php if ($_POST["SalesFilesClients"]!= "")
	{
	ThreshString("Please reload files for ".$_POST["SalesFilesClients"].".",$_POST["SalesFiles"],$data_parms_row[salesfiles]);
	}
	else 
	{
	ThreshString("Please reload the historical files.",$_POST["SalesFiles"],$data_parms_row[salesfiles]);
	}
	?>
</div>
<div class='col-md-4'>
<?php WantsValue($_POST["SalesFiles"], "# of historical sales files"); ?> 
<?php if($_POST["SalesFiles"]>0)
	WantsValue($_POST["SalesFilesClients"], "clients with historical sales files"); ?> <br>
</div>
</div>


<div id = "eFT">
<div class='row'><div class='col-md-4'> 
The number of sites missed in the last 3 EFT cycles is :
<?php ThreshNum($_POST[EFTA],$data_parms_row[EFTA]);?>,
<?php ThreshNum($_POST[EFTB],$data_parms_row[EFTB]);?>, and
<?php ThreshNum($_POST[EFTC],$data_parms_row[EFTC]);?>.</div>
<div class='col-md-4'> 
<?php ThreshString("Please investigate the cause for missing ". $_POST[EFTA] . " sites at 10:30am." , $_POST[EFTA], $data_parms_row[EFTA]);?>
<?php ThreshString("Please investigate the cause for missing ". $_POST[EFTB] . " sites at 10:45am." , $_POST[EFTB], $data_parms_row[EFTB]);?>
<?php ThreshString("Please investigate the cause for missing ". $_POST[EFTC] . " sites at 11am." , $_POST[EFTC], $data_parms_row[EFTC]);?>
</div>
<div class='col-md-4'> 
<?php WantsValue($_POST[EFTA], "missed EFT sites at 10:30"); ?>
<?php WantsValue($_POST[EFTB], "missed EFT sites at 10:45"); ?>
<?php WantsValue($_POST[EFTC], "missed EFT sites at 11:00"); ?>
</div>
</div>
</div>

<div id = "actualAcqWindow">
<h5>Actual Acquisition Window :</h5>

<div class='row'>
<div class='col-md-2'> 
<?php 	echo "<30 Min:";
	BelowThreshNum($_POST[ActAcqW1],$data_parms_row[ActAcqW1]);?>
</div>
<div class='col-md-5'> 
<?php BelowThreshString("Please investigate the cause for only acquiring ". $_POST[ActAcqW1] . " within 30 minutes." , $_POST[ActAcqW1], $data_parms_row[ActAcqW1]);?>
</div>
<div class='col-md-5'> 
<?php WantsValue($_POST[ActAcqW1], "acquired sites within 30 minutes."); ?>
</div>
</div>

<div class='row'><div class='col-md-2'> 
<?php 	echo ">30 Min:";
	ThreshNum($_POST[ActAcqW2],$data_parms_row[ActAcqW2]);?>
</div>
<div class='col-md-5'> 
<?php ThreshString("Please investigate the cause for only acquiring ". $_POST[ActAcqW2] . " within 30 minutes." , $_POST[ActAcqW2], $data_parms_row[ActAcqW2]);?>
</div>
<div class='col-md-5'> 
<?php WantsValue($_POST[ActAcqW2], "acquired sites longer 30 minutes."); ?>
</div>
</div>

<div class='row'>
<div class='col-md-2'> 
<?php 	echo ">60 Min:";
	ThreshNum($_POST[ActAcqW3],$data_parms_row[ActAcqW3]);?>
</div>
<div class='col-md-5'> 
<?php ThreshString("Please investigate the cause for only acquiring ". $_POST[ActAcqW3] . " within 30 minutes." , $_POST[ActAcqW3], $data_parms_row[ActAcqW3]);?>
</div>
<div class='col-md-5'> 
<?php WantsValue($_POST[ActAcqW3], "acquired sites longer that 60 minutes."); ?>
</div>
</div>
</div>

<div id = "malls">
<div class='row'>
<div class='col-md-4'> 
There are <?php ThreshNum($_POST[NRTI],$data_parms_row[NRTI]);?> missing NRTI sites.
</div>
<div class='col-md-4'> 
<?php ThreshString("Please investigate the cause for missing ". $_POST[NRTI] . "  NRTI sites." , $_POST[NRTI], $data_parms_row[NRTI]);?>
</div>
<div class='col-md-4'> 
<?php WantsValue($_POST[NRTI], "missed NRTI sites"); ?>
</div>
</div>


<div class='row'>
<div class='col-md-4'> 
There are <?php ThreshNum($_POST[Malls],$data_parms_row[Malls]);?> missing Malls sites.
</div>
<div class='col-md-4'> 
<?php ThreshString("Please investigate the cause for missing ". $_POST[Malls] . "  Malls sites." , $_POST[Malls], $data_parms_row[Malls]);?>
</div>
<div class='col-md-4'> 
<?php WantsValue($_POST[Malls], "missed Malls sites"); ?>
</div>
</div>



<h4> Overnight Processing</h4>


<?php 	
	$acqValue = $_POST[$_POST['ON_DBConnection1']];
	$acqthresh = $data_parms_row[$_POST['ON_DBConnection1']];
	$acqClient = $_POST['ON_Client1'];
	$acqConnType = $_POST['ON_Connection1'];
	$acqString = $acqClient."(".$acqConnType.")";

	if (empty($acqValue)&&$acqValue != '0')
	{
	echo "<div class='row'><div class='col-md-5'> There is no entry for acquisition success rate for ".$acqClient." using . $acqConnType."."<div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter a dial success rate for ". $acqString. "? 		Please hit 'Back' to adjust your entry."."</div></div>";
	}
		else
		{
		echo "<div class='row'><div class='col-md-5'>".$acqString.": ";
		ThreshNum($acqValue,$data_parms_row[$_POST['ON_DBConnection1']]);
		echo "% recovered at time of checklist.</div>";
		}
	
	if($dialvalue < $thresh)
		{
		echo "<div class='col-md-5'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for ".$acqString.". ".$acqValue."% is less than the threshold of ". $acqthresh."%.</div></div>";
		}	
		else echo "<div class='col-md-5'></div>";
?>



<h4> Dial Success</h4>
<?php DialHandle($_POST["DIAL_BH"], "Bahrain",$data_parms_row[DIAL_BH],$_POST["DIAL_BH_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_BR"], "Brazil",$data_parms_row[DIAL_BR],$_POST["DIAL_BR_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_CN"], "China",$data_parms_row[DIAL_CN],$_POST["DIAL_CN_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_FR"], "France",$data_parms_row[DIAL_FR],$_POST["DIAL_FR_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_DE"], "Germany",$data_parms_row[DIAL_DE],$_POST["DIAL_DE_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_HK"], "Hong Kong",$data_parms_row[DIAL_HK],$_POST["DIAL_HK_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_ID"], "Indonesia",$data_parms_row[DIAL_ID],$_POST["DIAL_ID_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_IE"], "Ireland",$data_parms_row[DIAL_IE],$_POST["DIAL_IE_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_JP"], "Japan",$data_parms_row[DIAL_JP],$_POST["DIAL_JP_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_MC"], "Macau",$data_parms_row[DIAL_MC],$_POST["DIAL_MC_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_MY"], "Malaysia",$data_parms_row[DIAL_MY],$_POST["DIAL_MY_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_MX"], "Mexico",$data_parms_row[DIAL_MX],$_POST["DIAL_MX_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_MO"], "Monaco",$data_parms_row[DIAL_MO],$_POST["DIAL_MO_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_SG"], "Singapore",$data_parms_row[DIAL_SG],$_POST["DIAL_SG_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_KR"], "South Korea",$data_parms_row[DIAL_KR],$_POST["DIAL_KR_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_TW"], "Taiwan",$data_parms_row[DIAL_TW],$_POST["DIAL_TW_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_TH"], "Thailand",$data_parms_row[DIAL_TH],$_POST["DIAL_TH_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_AE"], "United Arab Emirates",$data_parms_row[DIAL_AE],$_POST["DIAL_AE_BOOL"]);?> <br>
<?php DialHandle($_POST["DIAL_UK"], "United Kingdom",$data_parms_row[DIAL_UK],$_POST["DIAL_UK_BOOL"]); ?><br>
<?php DialHandle($_POST["DIAL_VN"], "Vietnam",$data_parms_row[DIAL_VN],$_POST["DIAL_VN_BOOL"]); ?><br>


</div>

<h3>Customer & Internal Portals</h3>
<?php Available($_POST["portal"],'Customer Portal');?><br>
<?php Available($_POST["insights"],'Insights');?><br>
<?php Available($_POST["opsportal"],'Operations Portal');?><br>
<?php UpDown($_POST["plweb11"], "Site Manager PLWEB11");?></div>
<?php UpDown($_POST["plweb12"], "Site Manager PLWEB12");?>
<?php UpDown($_POST["plweb13"], "Site Manager PLWEB13");?>
<?php UpDown($_POST["plweb14"], "Site Manager PLWEB14");?><br>

<div class='row'>
<?php QueueLevel($_POST["eu1_q"],$portal_parms_row[eu1_q],"Rapid Blue EU1 Server" );?>
<?php QueueLevel($_POST["eu2_q"],$portal_parms_row[eu2_q],"Rapid Blue EU2 Server" );?>
</div>

<?php UpDown($_POST["remedy"],"Remedy");?>
<?php Available($_POST["kpiapi"],"KPI API");?>
<?php Available($_POST["edtws"], "Enterprise Data Traffic Web Service");?>
<?php Available($_POST["MktIntel"],"Market Intelligence");?>
<?php Available($_POST["ForeAdmin"], "Forecasting Admin");?>
<?php Available($_POST["SMSBill"],"SMS Billing");?>
<?php Available($_POST["RDMVP"],"RDM/Vantage Point");?>
<?php Available($_POST["SysRpt"], "System Reports");?>
<?php Available($_POST["EFTWS"],"EFT Web Service");?>


<h3>JobWatch</h3>
<h4> Queries </h4>
<div class = 'row'><div class='col-md-4'> 
There are <?php ThreshNum($_POST["Old_IFACT_Rollup"],$Jobwatch['Old_IFACT_Rollup']);?> Old IFACT Rollup messages. <br>
There are <?php ThreshNum($_POST["Day_Close_Past_Due"],$Jobwatch['Day_Close_Past_Due']);?> Day Close Past Due messages. <br>
There are <?php ThreshNum($_POST["Output_Rollup"],$Jobwatch['Output_Rollup']);?> Output Rollup 15 minute to hour/day messages. <br>
There are <?php ThreshNum($_POST["IFACT_IO_Rollups_Failed"],$Jobwatch['IFACT_IO_Rollups_Failed']);?> IFACT Input to Output Rollups Failed messages. <br>
There are <?php ThreshNum($_POST["IFACT_Load_Traffic"],$Jobwatch['IFACT_Load_Traffic']);?> IFACT Load Traffic(xfer_notification) messages. <br>
There are <?php ThreshNum($_POST["UDM_Rollups_InProc"],$Jobwatch['UDM_Rollups_InProc']);?> UDM Rollups(RTA) In-Process messages. <br>
There are <?php ThreshNum($_POST["UDM_Rollups_Waiting"],$Jobwatch['UDM_Rollups_Waiting']);?> UDM Rollups(RTA) Waiting messages. <br>
There are <?php ThreshNum($_POST["XML_Traffic_Stage"],$Jobwatch['XML_Traffic_Stage']);?> XML Traffic Stage messages. <br>
There are <?php ThreshNum($_POST["Harvest_Rec_Not_Tried"],$Jobwatch['Harvest_Rec_Not_Tried']);?> Harvest Recoveries Not Tried messages. <br>
There are <?php ThreshNum($_POST["Dial_ADR_InProc_First"],$Jobwatch['Dial_ADR_InProc_First']);?> Dial ADR In-Process 1st Attempt messages. <br>
There are <?php ThreshNum($_POST["Dial_ADR_InProc_Retry"],$Jobwatch['Dial_ADR_InProc_Retry']);?> Dial ADR In-Process Retry messages. <br>
There are <?php ThreshNum($_POST["Dial_ADR_Q_First"],$Jobwatch['Dial_ADR_Q_First']);?> Dial ADR Queue 1st Attempt messages. <br>
There are <?php ThreshNum($_POST["Dial_ADR_Q_Retry"],$Jobwatch['Dial_ADR_Q_Retry']);?> Dial ADR Queue Retry messages. <br>
</div>

<div class='col-md-4'> 
<?php ThreshString("Please investigate why Old IFACT Rollup messages are high at ".$_POST["Old_IFACT_Rollup"].".",$_POST["Old_IFACT_Rollup"], $Jobwatch["Old_IFACT_Rollup"]);?>
<?php ThreshString("Please investigate why Day Close Past Due messages are high at ". $_POST["Day_Close_Past_Due"].".", $_POST['Day_Close_Past_Due'], $Jobwatch['Day_Close_Past_Due']);?>
<?php ThreshString("Please investigate why Output Rollup 15 minute to hour/day messages are high at ". $_POST["Output_Rollup"].".", $_POST['Output_Rollup'], $Jobwatch['Output_Rollup']);?>
<?php ThreshString("Please investigate why IFACT Input to Output Rollups Failed messages are high at ".$_POST["IFACT_IO_Rollups_Failed"].".",$_POST["IFACT_IO_Rollups_Failed"], $Jobwatch["IFACT_IO_Rollups_Failed"]);?>
<?php ThreshString("Please investigate why IFACT Load Traffic(xfer_notification) messages are high at ". $_POST["IFACT_Load_Traffic"].".", $_POST['IFACT_Load_Traffic'], $Jobwatch['IFACT_Load_Traffic']);?>
<?php ThreshString("Please investigate why UDM Rollups(RTA) In-Process messages are high at ". $_POST["UDM_Rollups_InProc"].".", $_POST['UDM_Rollups_InProc'], $Jobwatch['UDM_Rollups_InProc']);?>
<?php ThreshString("Please investigate why UDM Rollups(RTA) Waiting messages are high at ". $_POST["UDM_Rollups_Waiting"].".", $_POST['UDM_Rollups_Waiting'], $Jobwatch['UDM_Rollups_Waiting']);?>
<?php ThreshString("Please investigate why XML Traffic Stage messages are high at ". $_POST["XML_Traffic_Stage"].".", $_POST['XML_Traffic_Stage'], $Jobwatch['XML_Traffic_Stage']);?>
<?php ThreshString("Please investigate why Harvest Recoveries Not Tried messages are high at ". $_POST["Harvest_Rec_Not_Tried"].".", $_POST['Harvest_Rec_Not_Tried'], $Jobwatch['Harvest_Rec_Not_Tried']);?>
<?php ThreshString("Please investigate why Dial ADR In-Process 1st Attempt messages are high at ". $_POST["Dial_ADR_InProc_First"].".", $_POST['Dial_ADR_InProc_First'], $Jobwatch['Dial_ADR_InProc_First']);?>
<?php ThreshString("Please investigate why Dial ADR In-Process Retry messages are high at ". $_POST["Dial_ADR_InProc_Retry"].".", $_POST['Dial_ADR_InProc_Retry'], $Jobwatch['Dial_ADR_InProc_Retry']);?>
<?php ThreshString("Please investigate why Dial ADR Queue 1st Attempt messages are high at ". $_POST["Dial_ADR_Q_First"].".", $_POST['Dial_ADR_Q_First'], $Jobwatch['Dial_ADR_Q_First']);?>
<?php ThreshString("Please investigate why Dial ADR Queue Retry messages are high at ". $_POST["Dial_ADR_Q_Retry"].".", $_POST['Dial_ADR_Q_Retry'], $Jobwatch['Dial_ADR_Q_Retry']);?>
</div>

<div class='col-md-4'>
<?php WantsValue($_POST["Old_IFACT_Rollup"], " Old IFACT Rollup messages"); ?>
<?php WantsValue($_POST["Day_Close_Past_Due"], "Day Close Past Due messages"); ?>
<?php WantsValue($_POST["Output_Rollup"], "Output Rollup 15 minute to hour/day messages"); ?>
<?php WantsValue($_POST["IFACT_IO_Rollups_Failed"], " IFACT Input to Output Rollups Failed messages"); ?>
<?php WantsValue($_POST["IFACT_Load_Traffic"], " IFACT Load Traffic (xfer_notification) messages"); ?>
<?php WantsValue($_POST["UDM_Rollups_InProc"], "UDM Rollups(RTA) In-Process messages"); ?>
<?php WantsValue($_POST["UDM_Rollups_Waiting"], "UDM Rollups(RTA) Waiting messages"); ?>
<?php WantsValue($_POST["XML_Traffic_Stage"], "XML Traffic Stage messages"); ?>
<?php WantsValue($_POST["Harvest_Rec_Not_Tried"], "Harvest Recoveries Not Tried messages"); ?>
<?php WantsValue($_POST["Dial_ADR_InProc_First"], "Dial ADR In-Process 1st Attempt messages"); ?>
<?php WantsValue($_POST["Dial_ADR_InProc_Retry"], "Dial ADR In-Process Retry messages"); ?>
<?php WantsValue($_POST["Dial_ADR_Q_First"], "Dial ADR Queue 1st Attempt messages"); ?>
<?php WantsValue($_POST["Dial_ADR_Q_Retry"], "Dial ADR Queue Retry messages"); ?>
</div>
</div>

<h4> Windows Inboxes </h4>
<?php Okay($_POST["Inppwibx02"],'Windows Inbox(Inppwibx02)');?><br>
<?php Okay($_POST["Inppwibx03"],'Windows Inbox(Inppwibx03)');?><br>
<?php Okay($_POST["Inppwibx05"],'Windows Inbox(Inppwibx05)');?><br>

<h3>Harvest Health Checks</h3>
<?php HarvestHealth("04",$_POST["plapp04_NumIdle"],$_POST["plapp04_NumActive"],$_POST["plapp04_Mem"],$_POST["plapp04_CPU"],$system_parms_row["plapp04_idle"],$system_parms_row["plapp04_active"],$system_parms_row["plapp04_mem"],$system_parms_row["plapp04_cpu"]);?>
<?php HarvestHealth("05",$_POST["plapp05_NumIdle"],$_POST["plapp05_NumActive"],$_POST["plapp05_Mem"],$_POST["plapp05_CPU"],$system_parms_row["plapp05_idle"],$system_parms_row["plapp05_active"],$system_parms_row["plapp05_mem"],$system_parms_row["plapp05_cpu"]);?>
<?php HarvestHealth("06",$_POST["plapp06_NumIdle"],$_POST["plapp06_NumActive"],$_POST["plapp06_Mem"],$_POST["plapp06_CPU"],$system_parms_row["plapp06_idle"],$system_parms_row["plapp06_active"],$system_parms_row["plapp06_mem"],$system_parms_row["plapp06_cpu"]);?>
<?php HarvestHealth("07",$_POST["plapp07_NumIdle"],$_POST["plapp07_NumActive"],$_POST["plapp07_Mem"],$_POST["plapp07_CPU"],$system_parms_row["plapp07_idle"],$system_parms_row["plapp07_active"],$system_parms_row["plapp07_mem"],$system_parms_row["plapp07_cpu"]);?>



<h3>Sales and Labor TCE/TCE_OTPT Errors</h3>
<div class = 'row'><div class='col-md-6'> 
There are <?php ThreshNum($_POST["SL_DiffURL"],$data_parms_row['SL_DiffURL']);?> sites with different URLS. <br>
<?php if(empty($_POST['SL_Orgs'])){
	echo "There are no orgs to report.<br>";
	}
	else	
	echo "<font color = 'red'> The top orgs with issues are ".$_POST['SL_Orgs'].".</font><br>";
?>
</div></div>


<h3>Notable Failures</h3>
<?php 

if(empty($_POST['Notable_Failures'])){
	echo "There are no notable failures to report.<br>";
	}
	else {
	echo "<font color = 'red'><h4><b>".$_POST['Notable_Failures']."</b></h4></font>";
	}
?>



<form action="action_page3p.php" method = post>
<input type=hidden name="FailedExtracts" value = "<?php echo $_POST['FailedExtracts'] ?>"> 
<input type=hidden name="FailedExtractNames" value = "<?php echo $_POST['FailedExtractNames'] ?>">
<input type=hidden name="SalesFiles" value = "<?php echo $_POST['SalesFiles'] ?>"> 
<input type=hidden name="SalesFilesClients" value = "<?php echo $_POST['SalesFilesClients'] ?>">
<input type=hidden name="EFTA" value = "<?php echo $_POST['EFTA'] ?>">
<input type=hidden name="EFTB" value = "<?php echo $_POST['EFTB'] ?>">
<input type=hidden name="EFTC" value = "<?php echo $_POST['EFTC'] ?>">
<input type=hidden name="DIAL_BH" value = "<?php DialBoolHandle($_POST['DIAL_BH'],$_POST['DIAL_BH_BOOL'])?>">
<input type=hidden name="DIAL_BR" value = "<?php DialBoolHandle($_POST['DIAL_BR'],$_POST['DIAL_BR_BOOL'])?>">
<input type=hidden name="DIAL_CN" value = "<?php DialBoolHandle($_POST['DIAL_CN'],$_POST['DIAL_CN_BOOL'])?>">
<input type=hidden name="DIAL_FR" value = "<?php DialBoolHandle($_POST['DIAL_FR'],$_POST['DIAL_FR_BOOL'])?>">
<input type=hidden name="DIAL_DE" value = "<?php DialBoolHandle($_POST['DIAL_DE'],$_POST['DIAL_DE_BOOL'])?>">
<input type=hidden name="DIAL_HK" value = "<?php DialBoolHandle($_POST['DIAL_HK'],$_POST['DIAL_HK_BOOL'])?>">
<input type=hidden name="DIAL_ID" value = "<?php DialBoolHandle($_POST['DIAL_ID'],$_POST['DIAL_ID_BOOL'])?>">
<input type=hidden name="DIAL_IE" value = "<?php DialBoolHandle($_POST['DIAL_IE'],$_POST['DIAL_IE_BOOL'])?>">
<input type=hidden name="DIAL_JP" value = "<?php DialBoolHandle($_POST['DIAL_JP'],$_POST['DIAL_JP_BOOL'])?>">
<input type=hidden name="DIAL_MC" value = "<?php DialBoolHandle($_POST['DIAL_MC'],$_POST['DIAL_MC_BOOL'])?>">
<input type=hidden name="DIAL_MY" value = "<?php DialBoolHandle($_POST['DIAL_MY'],$_POST['DIAL_MY_BOOL'])?>">
<input type=hidden name="DIAL_MX" value = "<?php DialBoolHandle($_POST['DIAL_MX'],$_POST['DIAL_MX_BOOL'])?>">
<input type=hidden name="DIAL_MO" value = "<?php DialBoolHandle($_POST['DIAL_MO'],$_POST['DIAL_MO_BOOL'])?>">
<input type=hidden name="DIAL_SG" value = "<?php DialBoolHandle($_POST['DIAL_SG'],$_POST['DIAL_SG_BOOL'])?>">
<input type=hidden name="DIAL_KR" value = "<?php DialBoolHandle($_POST['DIAL_KR'],$_POST['DIAL_KR_BOOL'])?>">
<input type=hidden name="DIAL_TW" value = "<?php DialBoolHandle($_POST['DIAL_TW'],$_POST['DIAL_TW_BOOL'])?>">
<input type=hidden name="DIAL_TH" value = "<?php DialBoolHandle($_POST['DIAL_TH'],$_POST['DIAL_TH_BOOL'])?>">
<input type=hidden name="DIAL_AE" value = "<?php DialBoolHandle($_POST['DIAL_AE'],$_POST['DIAL_AE_BOOL'])?>">
<input type=hidden name="DIAL_UK" value = "<?php DialBoolHandle($_POST['DIAL_UK'],$_POST['DIAL_UK_BOOL'])?>">
<input type=hidden name="DIAL_VN" value = "<?php DialBoolHandle($_POST['DIAL_VN'],$_POST['DIAL_VN_BOOL'])?>">
<input type=hidden name="ActAcqW1" value = "<?php echo $_POST['ActAcqW1'] ?>">
<input type=hidden name="ActAcqW2" value = "<?php echo $_POST['ActAcqW2'] ?>">
<input type=hidden name="ActAcqW3" value = "<?php echo $_POST['ActAcqW3'] ?>">
<input type=hidden name="DialAcqValue" value = "<?php echo $_POST['DialAcqValue'] ?>">
<input type=hidden name="DialEUAcqValue" value = "<?php echo $_POST['DialEUAcqValue'] ?>">
<input type=hidden name="IPAcqValue" value = "<?php echo $_POST['IPAcqValue'] ?>">
<input type=hidden name="SIPAcqValue" value = "<?php echo $_POST['SIPAcqValue'] ?>">
<input type=hidden name="SIPEUAcqValue" value = "<?php echo $_POST['SIPEUAcqValue'] ?>">
<input type=hidden name="SIPHAcqValue" value = "<?php echo $_POST['SIPHAcqValue'] ?>">
<input type=hidden name="SSCAcqValue" value = "<?php echo $_POST['SSCAcqValue'] ?>">
<input type=hidden name="DialAcqClient" value = "<?php echo $data_parms_row['DialAcqClient'] ?>">
<input type=hidden name="DialEUAcqClient" value = "<?php echo $data_parms_row['DialEUAcqClient'] ?>">
<input type=hidden name="IPAcqClient" value = "<?php echo $data_parms_row['IPAcqClient'] ?>">
<input type=hidden name="SIPAcqClient" value = "<?php echo $data_parms_row['SIPAcqClient'] ?>">
<input type=hidden name="SIPEUAcqClient" value = "<?php echo $data_parms_row['SIPEUAcqClient'] ?>">
<input type=hidden name="SIPHAcqClient" value = "<?php echo $data_parms_row['SIPHAcqClient'] ?>">
<input type=hidden name="SSCAcqClient" value = "<?php echo $data_parms_row['SSCAcqClient'] ?>">
<input type=hidden name="NRTI" value = "<?php echo $_POST['NRTI'] ?>">
<input type=hidden name="Malls" value = "<?php echo $_POST['Malls'] ?>">
<input type=hidden name="SL_DiffURL" value = "<?php echo $_POST['SL_DiffURL'] ?>">
<input type=hidden name="SL_Orgs" value = "<?php echo $_POST['SL_Orgs'] ?>">
<input type=hidden name="Notable_Failures" value = "<?php echo $_POST['Notable_Failures'] ?>">

<input type=hidden name="portal" value="<?php echo $_POST[portal]?>">
<input type=hidden name="insights" value="<?php echo $_POST[insights] ?>">
<input type=hidden name="opsportal" value="<?php echo $_POST[opsportal] ?>">
<input type=hidden name="plweb11" value="<?php echo $_POST[plweb11] ?>">
<input type=hidden name="plweb12" value="<?php echo $_POST[plweb12] ?>">
<input type=hidden name="plweb13" value="<?php echo $_POST[plweb13] ?>">
<input type=hidden name="plweb14" value="<?php echo $_POST[plweb14] ?>">
<input type=hidden name="eu1_q" value = "<?php echo $_POST[eu1_q] ?>">
<input type=hidden name="eu2_q" value = "<?php echo $_POST[eu2_q] ?>">
<input type=hidden name="remedy" value="<?php echo $_POST[remedy] ?>">
<input type=hidden name="kpiapi" value="<?php echo $_POST[kpiapi] ?>">
<input type=hidden name="edtws" value="<?php echo $_POST[edtws] ?>">
<input type=hidden name="MktIntel" value="<?php echo $_POST[MktIntel] ?>">
<input type=hidden name="ForeAdmin" value="<?php echo $_POST[ForeAdmin] ?>">
<input type=hidden name="SMSBill" value="<?php echo $_POST[SMSBill] ?>">
<input type=hidden name="RDMVP" value="<?php echo $_POST[RDMVP] ?>">
<input type=hidden name="SysRpt" value="<?php echo $_POST[SysRpt] ?>">
<input type=hidden name="EFTWS" value="<?php echo $_POST[EFTWS] ?>">

<input type=hidden name="FTP_Inbox" value = "<?php echo $_POST['FTP_Inbox'] ?>">
<input type=hidden name="CE_Root_Inbox" value = "<?php echo $_POST['CE_Root_Inbox']  ?>">
<input type=hidden name="IFACT_Rollups" value = "<?php echo $_POST['IFACT_Rollups'] ?>">
<input type=hidden name="Manual_Releases_Q" value = "<?php echo $_POST['Manual_Releases_Q'] ?>">
<input type=hidden name="Manual_Releases_AsIs_Q" value = "<?php echo $_POST['Manual_Releases_AsIs_Q'] ?>">
<input type=hidden name="Old_IFACT_Rollup" value = "<?php echo $_POST['Old_IFACT_Rollup'] ?>">
<input type=hidden name="Day_Close_Past_Due" value = "<?php echo $_POST['Day_Close_Past_Due'] ?>">
<input type=hidden name="Output_Rollup" value = "<?php echo $_POST['Output_Rollup'] ?>">
<input type=hidden name="IFACT_IO_Rollups_Failed" value = "<?php echo $_POST['IFACT_IO_Rollups_Failed'] ?>">
<input type=hidden name="IFACT_Load_Traffic" value = "<?php echo $_POST['IFACT_Load_Traffic'] ?>">
<input type=hidden name="UDM_Rollups_InProc" value = "<?php echo $_POST['UDM_Rollups_InProc'] ?>">
<input type=hidden name="UDM_Rollups_Waiting" value = "<?php echo $_POST['UDM_Rollups_Waiting'] ?>">
<input type=hidden name="XML_Traffic_Stage" value = "<?php echo $_POST['XML_Traffic_Stage'] ?>">
<input type=hidden name="Harvest_Rec_Not_Tried" value = "<?php echo $_POST['Harvest_Rec_Not_Tried'] ?>">
<input type=hidden name="Dial_ADR_InProc_First" value = "<?php echo $_POST['Dial_ADR_InProc_First'] ?>">
<input type=hidden name="Dial_ADR_InProc_Retry" value = "<?php echo $_POST['Dial_ADR_InProc_Retry'] ?>">
<input type=hidden name="Dial_ADR_Q_First" value = "<?php echo $_POST['Dial_ADR_Q_First'] ?>">
<input type=hidden name="Dial_ADR_Q_Retry" value = "<?php echo $_POST['Dial_ADR_Q_Retry'] ?>">
<input type=hidden name="Inppwibx02" value = "<?php echo $_POST['Inppwibx02'] ?>">
<input type=hidden name="Inppwibx03" value = "<?php echo $_POST['Inppwibx03'] ?>">
<input type=hidden name="Inppwibx05" value = "<?php echo $_POST['Inppwibx05'] ?>">

<input type=hidden name="plapp04_NumIdle" value ="<?php echo $_POST['plapp04_NumIdle'] ?>">
<input type=hidden name="plapp04_NumActive" value = "<?php echo $_POST['plapp04_NumActive'] ?>">
<input type=hidden name="plapp05_NumIdle" value = "<?php echo $_POST['plapp05_NumIdle'] ?>">
<input type=hidden name="plapp05_NumActive" value ="<?php echo $_POST['plapp05_NumActive'] ?>">
<input type=hidden name="plapp06_NumIdle" value = "<?php echo $_POST['plapp06_NumIdle'] ?>">
<input type=hidden name="plapp06_NumActive" value = "<?php echo $_POST['plapp06_NumActive'] ?>">
<input type=hidden name="plapp07_NumIdle" value = "<?php echo $_POST['plapp07_NumIdle'] ?>">
<input type=hidden name="plapp07_NumActive" value = "<?php echo $_POST['plapp07_NumActive'] ?>">
<input type=hidden name="plapp04_Mem" value = "<?php echo $_POST['plapp04_Mem'] ?>">
<input type=hidden name="plapp05_Mem" value = "<?php echo $_POST['plapp05_Mem'] ?>">
<input type=hidden name="plapp06_Mem" value = "<?php echo $_POST['plapp06_Mem'] ?>">
<input type=hidden name="plapp07_Mem" value = "<?php echo $_POST['plapp07_Mem'] ?>">
<input type=hidden name="plapp04_CPU" value = "<?php echo $_POST['plapp04_CPU'] ?>">
<input type=hidden name="plapp05_CPU" value = "<?php echo $_POST['plapp05_CPU'] ?>">
<input type=hidden name="plapp06_CPU" value = "<?php echo $_POST['plapp06_CPU'] ?>">
<input type=hidden name="plapp07_CPU" value = "<?php echo $_POST['plapp07_CPU'] ?>">

<input type="submit" value="Submit"> Press Back on your browser to adjust entered values.
</form> 

</body>
</html>  
