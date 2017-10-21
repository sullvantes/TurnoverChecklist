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
//GETBASELINES FROM DB

include("makeconnection.php");
$BASELINE_ID = $_GET['pageChecklistID'] + 1000;
$sql1 = "SELECT failedextracts,salesfiles, EFTA,EFTB,EFTC, ActAcqW1,ActAcqW2,ActAcqW3, DIAL_BH, DIAL_BR, DIAL_CN, DIAL_FR, DIAL_DE, DIAL_HK, DIAL_KR, DIAL_ID, DIAL_IE, DIAL_JP, DIAL_MO, DIAL_MY, DIAL_MX, DIAL_MC, DIAL_SG, DIAL_TH, DIAL_TW, DIAL_AE, DIAL_UK, DIAL_VN, DialAcqClient, DialEUAcqClient, IPAcqClient, SIPAcqClient, SIPEUAcqClient, SIPHAcqClient, SSCAcqClient, DialAcqValue, DialEUAcqValue, IPAcqValue, SIPAcqValue, SIPEUAcqValue, SIPHAcqValue, SSCAcqValue, NRTI, Malls FROM Data_Parms WHERE id = ".$BASELINE_ID;
$result1 = $conn->query($sql1);
$data_parms_row = null;
if ($result1->num_rows > 0) {
    // output data of each row
    while($data_parms_row_tester = $result1->fetch_assoc()) 
	{
        $data_parms_row = $data_parms_row_tester;
    	}
	} 
	else 
		{
    		echo "0 results<br><br>";
		}

$sql2 = "SELECT eu1_q, eu2_q from Portal_Parms WHERE ".$BASELINE_ID;
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) 
	{
// output data of each row
	while($portal_parms_row_tester = $result2->fetch_assoc()) 
		{
        	$portal_parms_row = $portal_parms_row_tester;
		}
	} 
		else 
		{
		echo "0 results<br><br>";
		}

$sql3 = "SELECT plapp04_idle, plapp05_idle, plapp06_idle, plapp07_idle, plapp04_active, plapp05_active, plapp06_active, plapp07_active, plapp04_mem, plapp05_mem, plapp06_mem, plapp07_mem, plapp04_cpu, plapp05_cpu, plapp06_cpu, plapp07_cpu from System_Parms WHERE id =".$BASELINE_ID;
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) 
	{
// output data of each row
	while($system_parms_row_tester = $result3->fetch_assoc()) 
		{
		$system_parms_row = $system_parms_row_tester;
		}
	} 
	else 
		{
	    	echo "0 results<br><br>";
		}

$sql4 = "SELECT FTP_Inbox, CE_Root_Inbox, IFACT_Rollups, Manual_Releases_Q, Manual_Releases_AsIs_Q, Old_IFACT_Rollup, Day_Close_Past_Due, Output_Rollup, IFACT_IO_Rollups_Failed, IFACT_Load_Traffic, UDM_Rollups_InProc, UDM_Rollups_Waiting, XML_Traffic_Stage, Harvest_Rec_Not_Tried, Dial_ADR_InProc_First, Dial_ADR_InProc_Retry, Dial_ADR_Q_First, Dial_ADR_Q_Retry, Inppwibx02, Inppwibx03, Inppwibx05 FROM Jobwatch where id = ".$BASELINE_ID;
$result4 = $conn->query($sql4);
if ($result4->num_rows > 0) 	
	{
// output data of each row
    	while($Jobwatch_row_tester = $result4->fetch_assoc()) 
		{
        $Jobwatch = $Jobwatch_row_tester;
	}
} else {
    echo "0 resultsJobwatch<br><br>";
}

$conn->close();

//END OF BASELINE RETRIEVAL
?>


<?php

//FUNCTIONS FOR REPORTING DATA

function TrueFalse($input)
{
if($input == "TRUE")
		echo 1;
	else
		echo 0;
}

function Available ($input,$name)
{
//echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
		echo "<div class='row'><div class='col-md-4'>$name is available.</div></div><br>";
	}
	elseif($input == "FALSE")
		{
		echo "<div class='row'><div class='col-md-4'><font color = 'red'>$name is unavailable.</font></div><div class='col-md-8'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage.</div></div></div>";
		}
		else
			{
			echo "<div class='row'><div class='col-md-4'>There is no availability entered for $name.</div><div class='col-md-8'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Is $name available? Please hit 'Back' to add your entry.</div></div></div>";
			}
}

function UpDown ($input,$name)
{
//echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
		echo "<div class='row'><div class='col-md-4'>$name is up.</div></div></br>";
	}
	elseif($input == "FALSE")
		{
			echo "<div class='row'><div class='col-md-4'><font color = 'red'>$name is down.</font></div><div class='col-md-8'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage.</div></div></div>";
		}
		else
			{
			echo "<div class='row'><div class='col-md-4'>There is no entry for $name.</div><div class='col-md-8'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong> Is $name Up or Down? Please hit 'Back' to add your entry.</div></div></div>";
			}
}
 
function AvailString($String, $input)
{
if($input == 'FALSE')
{
echo "<font color='red'>$String</font>";
}
}
 
function QueueLevel($Value, $Thresh, $Name)
{
if($Value>=$Thresh)
echo "<div class='col-md-3'><font color='red'>There are currently ".$Value." files waiting to be processed.</font></div><div class='col-md-3'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$Name." queue. </div></div>";
elseif(empty($Value))
	{
	echo "<div class='col-md-3'>There is no entry of files waiting to be processed.</div><div class='col-md-3'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Please hit 'Back' to add your entry.</div></div>";
	}
	else
		{
		echo "<div class='col-md-3'>There are currently ".$Value." files waiting to be processed. This is okay.</div><div class='col-md-3'></div>";
		}
}

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
		echo "<div class='col-md-6'><font color='red'>$country success rate is $dialvalue%.This is above the threshold of $thresh%.</font></div>";
		echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for $country. $dialvalue% is less than the threshold of $thresh%.</div></div></div>";
		}
		else
		{
		echo "<div class='col-md-12'>$country success rate is $dialvalue%.<br><br><br> </div></div>";
		}
	}

}


function OvernightHandle($acqValue, $acqThresh, $acqString)
{
if(empty($acqValue)&&$acqValue != '0')
	{
	echo "<div class='col-md-6'>There is no entry for overnight success rate for ". $acqString. ".</div><div class='col-md-6'><div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter an overnight success rate for ". $acqString. "? 		Please hit 'Back' to adjust your entry."."</div></div>";
	}
	else
	{

	if($acqValue<$acqThresh)
		{
		echo "<div class='col-md-6'>$acqString success rate is <font color='red'>$acqValue%. </font></div><div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor acquisition success rate for $acqString. $acqValue% is less than the threshold of $acqThresh%.</div></div>";
		}	
		else
		{
		echo "<div class='col-md-12'>$acqString success rate is $acqValue%.</div> <br> <br>";
		}
	}
}

function JobwatchHandle($param,$string,$thresh)
{
$Value = $_POST[$param];
if(!empty($Value))
{	
	if($Value>$thresh)
		echo "<div class = 'row'><div class='col-md-6'> <font color='red'> There are $Value $string which is higher than the threshold of $thresh.</font></div><div class='col-md-6'> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please investigate why $string are above threshold.</div></div></div>";
	else
		echo "<div class = 'row'><div class='col-md-6'>There are $Value $string. This is within the threshold.</div></div></br>";
}

else
	{
	echo "<div class = 'row'><div class='col-md-6'><strong>No value was entered for $string.</strong></div><div class='col-md-6'>";
	WantsValue($_POST[$param], $string);
	echo "</div></div>";
	}	
}

function DialBoolHandle($dialvalue,$dialbool){
if($dialbool!='on'){
	echo $dialvalue;
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
	echo "<div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter a value for ". $name. "? Please hit 'Back' to adjust your entry."."</div>";
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
	echo "$name is performing well.</div></div>";
	}
		else
		{
		echo "<font color = 'red'>$name is not performing well.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage. </div></div></div>";
		}
}
?>


<?php
//BEGIN HEADER
include("header.php");
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
//BEGIN BODY
include("dataRetrievalReturn.php");
include("overnightReturn.php");
include("dialReturn.php");
include("jobwatchReturn.php");
include("portalReturn.php");
include("harvestReturn.php");
include("salesReturn.php");
include("notableFailuresReturn.php");
?>










<form action="actionChecklistAll.php?pageChecklistID=<?php echo $_GET['pageChecklistID'] ?>" method = post>
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
