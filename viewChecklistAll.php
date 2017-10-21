<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "view-header">Header</title>
    	<link rel="stylesheet" href="/CSS/bootstrap.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.min.css"/>
</head>



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
echo "<div class='row'><div class='col-md-8'>";
if($input == '1')
	{
		echo $name." was available.</div></div>";
	}
		elseif($input === '0' )
		{
			echo "<font color = 'red'>".$name. " was unavailable.</font></div></div>";
		}
			else
			{
				echo "<font color = 'red'>".$name. " was not noted Available or Unavailable.$input</font></div></div>";
			}
}
?>

<?php
function UpDown ($input,$name)
{
echo "<div class='row'><div class='col-md-8'>";
if($input == '1')
	{
		echo $name." was up.</div>    </div>";
	}
		elseif($input === '0')
		{
			echo "<font color = 'red'>".$name. " was down.</font></div></div>";
		}
			else
			{
				echo "<font color = 'red'>".$name. " was not noted Up or Down.$input</font></div></div>";
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
echo "<div class='col-md-3'><font color='red'>There were ".$Value." files waiting to be processed on $Name. This is outside threshold($Thresh). </font></div><div class='col-md-3'></div>";
else
echo "<div class='col-md-3'>There were ".$Value." files waiting to be processed on ".$Name." This was okay within threshold($Thresh). </div><div class='col-md-3'></div>";
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
	echo "<br> <div class='alert alert-danger' role='alert'> $String</div>";
}
?>

<?php 
function ThreshString($String, $Value, $Thresh)
{
if($Value>$Thresh)
	echo "<div class='alert alert-danger' role='alert'> $String</div>";
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

function DialHandle($dialvalue, $country,$thresh,$dialname)
{
echo "<div>";
if (empty($dialvalue)&&$dialvalue != '0')
	{
	echo "<div class='col-md-6'>There is no entry for dial success rate in $country.</div><div class='col-md-6'><div class='alert alert-warning' role='alert'> <strong>Alert!</strong>. Are you sure you dont want to enter a dial success rate for $country? Please hit 'Back' to adjust your entry."."</div></div></div>";
	}
	else
	{
	if($dialvalue<$thresh)
		{
		echo "<div class='col-md-6'><font color='red'>$country success rate is $dialvalue%.</font></div>";
		echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for $country. $dialvalue% is less than the threshold of $thresh%.</div></div></div>";
		}
		else
		{
		echo "<div class='col-md-12'>$country success rate is $dialvalue%. This is above the threshold of $thresh%. <br><br><br> </div></div>";
		}
	}

}

function DialBoolHandle($dialvalue,$dialbool){
if($dialbool!='on'){
	echo $dialvalue;
	}
}

function JobwatchHandle($param,$string,$thresh)
{
if(!empty($param))
{	
	if($Value>$thresh)
		echo "<div class = 'row'><div class='col-md-6'> <font color='red'> There are $param $string which is higher than the threshold of $thresh.</font></div><div class='col-md-6'> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> $string was above threshold.</div></div></div>";
	else
		echo "<div class = 'row'><div class='col-md-6'>There are $param $string. This was within the threshold.</div></div></br>";
}

else
	{
	echo "<div class = 'row'><div class='col-md-6'><strong>No value was entered for $string.</strong></div><div class='col-md-6'>";
	WantsValue($param, $string);
	echo "</div></div>";
	}	
}

function HarvestHealth($AppNum,$AppIdle,$AppActive,$AppMem,$AppCPU,$ThreshIdle,$ThreshActive,$ThreshMem,$ThreshCPU)
{
$AppConns = $AppIdle + $AppActive;
$ThreshConns = $ThreshIdle + $ThreshActive;
echo "<h4>Harvest Node PLAPP$AppNum</h4>";
echo "<div class = 'container'>";

//Connections
if((empty($AppIdle)&&$AppIdle != '0')||(empty($AppActive)&&$AppActive != '0'))
	{
	echo "<div class = 'row'><div class='col-md-6'>Connections were not entered for PLAPP".$AppNum.".</div>";
	echo "<div class='col-md-6'>";
	WantsValue($AppIdle,"PLAPP".$AppNum." Idle Processes");
	WantsValue($AppActive,"PLAPP".$AppNum." Active Processes");
	echo "</div></div>";
	}
		elseif($AppConns>$ThreshConns)
		{
		echo "<div class = 'row'><div class='col-md-6'><font color = 'red'>PLAPP".$AppNum." has ".$AppConns." connections( > threshold of ".$ThreshConns." total connections)</font></div><div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Connections are high on this host. Please look to restart PLAPP$AppNum.</div></div></div>";
		}
			else 
			{
			echo "<div class = 'row'><div class='col-md-12'>PLAPP".$AppNum." has ".$AppConns." connections. (< = threshold of ".$ThreshConns." total connections). This is within threshold.<br></div></div><br><br>";
			}

//Memory
if(empty($AppMem)&&$AppMem != '0')
	{
	echo "<div class = 'row'><div class='col-md-6'>No value was entered for memory on PLAPP".$AppNum.".</div>";
	echo "<div class='col-md-6'>";
	WantsValue($AppMem,"PLAPP".$AppNum." Memory");
	echo "</div></div>";
	}
		elseif($AppMem>$ThreshMem)
		{
		echo "<div class = 'row'><div class='col-md-6'><font color = 'red'>PLAPP$AppNum has high memory usage at $AppMem%.<br></font></div>";
		echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please monitor memory on PLAPP$AppNum closely.</div></div></div>";}
			else
			{
			echo "<div class = 'row'><div class='col-md-12'>PLAPP$AppNum is using $AppMem% of memory. This is within threshold.</div></div><br>";
			}	


if(empty($AppCPU)&&$AppCPU != '0')
	{
	echo "<div class = 'row'><div class='col-md-6'>No Value was entered for CPU on PLAPP$AppNum.</div>";
	echo "<div class='col-md-6'>";
	WantsValue($AppCPU,"PLAPP".$AppNum." CPU");
	echo "</div></div>";
	}
		elseif($AppCPU >$ThreshCPU)
		{
		echo "<div class = 'row'><div class='col-md-6'><font color = 'red'>PLAPP$AppNum has high CPU usage at $AppCPU%.<br></font></div>";
		echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please monitor CPU on PLAPP". $AppNum." closely.</div></div></div>";}
			else
			{
			echo "<div class = 'row'><div class='col-md-12'>PLAPP$AppNum is using $AppCPU% of CPU. This is within threshold.</div>";
			}
echo "</div>";
}

function WantsValue($input,$name)
{
	if(empty($input)&&$input!='0') 
	{
	echo "<div class='alert alert-warning' role='alert'>"." No value was entered for ". $name. ".</div>";
	}
	
}

function Plural($input)
{	
	if($input > 1 || $input == 0 || empty($input))
		echo "s";
}

function Okay ($input,$name)
{
echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
		echo $name." was performing well.</div></div>";
	}
	else
	{
		echo "<font color = 'red'>".$name. " was not performing well.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'> Please look into the ".$name." outage. </div></div></div>";
	}
}
?>

<?php
include("header.php");
include("makeconnection.php");
$chklstid = $_GET['pageChecklistID'];
$BASELINE_ID = $chklstid + 1000;


$sqlID = "SELECT id, date, submission_time FROM CHKLST_ID WHERE chklst_time_id = ".$chklstid. " order by submission_time desc limit 1";
$resultID = $conn->query($sqlID);
while($row = $resultID->fetch_assoc()) {
	$recentchklstid = $row["id"];
	$recentchklstdate =  $row["date"];
	}

$sql1 = "SELECT failedextracts,salesfiles, EFTA,EFTB,EFTC, ActAcqW1,ActAcqW2,ActAcqW3, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_KR, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_TW, DIAL_AE, DIAL_UK, DIAL_VN, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, NRTI, Malls,SL_DiffURL FROM Data_Parms WHERE id = ".$BASELINE_ID;
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


$sql2 = "SELECT eu1_q, eu2_q from Portal_Parms WHERE id =$BASELINE_ID";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    // output data of each row
    while($portal_parms_row_tester = $result2->fetch_assoc()) {
        $portal_parms_row_base = $portal_parms_row_tester;
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



$sql5 = "SELECT failedextracts,failedextractnames, salesfiles, salesfilesclients, EFTA, EFTB, EFTC, ActAcqW1, ActAcqW2, ActAcqW3, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_KR, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_TW, DIAL_AE, DIAL_UK, DIAL_VN, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, NRTI, Malls, SL_DiffURL, SL_Orgs, Notable_Failures FROM Data_Parms WHERE id = ".$recentchklstid;
$result5 = $conn->query($sql5);
if ($result5->num_rows > 0) {
    // output data of each row
    while($Data_Parms_row_tester = $result5->fetch_assoc()) {
        $RecentDataParms = $Data_Parms_row_tester;
	
	}
} else {
    echo "0 resultsRecentData_Parms<br><br>";
}

$sql6 = "SELECT id, portal, insights, ops_portal, plweb11, plweb12, plweb13, plweb14, eu1_q, eu2_q, remedy, kpi, edtws, mkt_intel, fore_admin, sms_bill, rdm_vp, sys_rpt, eftws FROM Portal_Parms where id = $recentchklstid";
$result6 = $conn->query($sql6);
if ($result6->num_rows > 0) {
    // output data of each row
    while($Portal_Parms_row_tester = $result6->fetch_assoc()) {
        $RecentPortalParms = $Portal_Parms_row_tester;
	}
} else {
    echo "0 resultsRecentPortalParms<br><br>";
}

 
$sql7 = "SELECT plapp04_idle, plapp05_idle, plapp06_idle, plapp07_idle, plapp04_active, plapp05_active, plapp06_active, plapp07_active, plapp04_mem, plapp05_mem, plapp06_mem, plapp07_mem, plapp04_cpu, plapp05_cpu, plapp06_cpu, plapp07_cpu FROM System_Parms where id = ".$recentchklstid;
$result7 = $conn->query($sql7);
if ($result7->num_rows > 0) {
    // output data of each row
    while($System_Parms_row_tester = $result7->fetch_assoc()) {
        $RecentSystemParms = $System_Parms_row_tester;
	}
} else {
    echo "0 resultsRecentSystemParms<br><br>";
}

$sql8 = "SELECT FTP_Inbox, CE_Root_Inbox, IFACT_Rollups, Manual_Releases_Q, Manual_Releases_AsIs_Q, Old_IFACT_Rollup,Day_Close_Past_Due, Output_Rollup, IFACT_IO_Rollups_Failed, IFACT_Load_Traffic, UDM_Rollups_InProc, UDM_Rollups_Waiting, XML_Traffic_Stage, Harvest_Rec_Not_Tried, Dial_ADR_InProc_First, Dial_ADR_InProc_Retry, Dial_ADR_Q_First, Dial_ADR_Q_Retry, Inppwibx02,Inppwibx03,Inppwibx05 FROM Jobwatch where id = ".$recentchklstid;
$result8 = $conn->query($sql8);
if ($result8->num_rows > 0) {
    // output data of each row
    while($Jobwatch_row_tester = $result8->fetch_assoc()) {
        $RecentJobwatch = $Jobwatch_row_tester;
	}
} else {
    echo "0 resultsRecentJobwatch<br><br>";
}?>

<h2 id = "view-title"></h2>

<?php 

echo "<h4>Checklist Date: $recentchklstdate</h4><br>";


include("dataRetrievalView.php");
include("dialView.php");
include("portalView.php");
include("jobwatchView.php");
include("harvestView.php");
include("salesView.php");
include("notablefailuresView.php");
?>


</body>
</html>  

