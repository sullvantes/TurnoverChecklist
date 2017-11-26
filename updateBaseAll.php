 <!DOCTYPE html>
<html>

<head>
<?php
    $chklist_id = $_GET['pageChecklistID'];
    if ($chklist_id){
        $baseline_id= (int)$chklist_id+1000;
        }
    else{
        $baseline_id= 1001;
    }
    
   if ($baseline_id==1001) {
        $chk_time = '7AM';
    } elseif ($baseline_id==1002) {
        $chk_time = '11AM';
    } elseif ($baseline_id==1003) {
        $chk_time = ' 3PM';
    } elseif ($baseline_id==1004) {
        $chk_time = '11PM';
    }    
    $baseline_form=TRUE;
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header">Update <?php echo $chk_time ?> Checklist Baselines </title>
    
</head>

<body>

<?php
//HEADER
include("header.html");
?>
<div class="container">
<?php
include("makeconnection.php");
$chklstid = $_GET['pageChecklistID']-1000;
$BASELINE_ID = $chklstid+1000;
echo "<h2>Update System Health Baselines for $chk_time Checklist</h2>";
////Update Data Baseline Parameters
//Building Update SQL for data parms
$data_params=array(
    "FailedExtracts", 
    "SalesFiles", 
    "EFTA",
    "EFTB", 
    "EFTC", 
    "ActAcqW1", 
    "ActAcqW2", 
    "ActAcqW3", 
    "NRTI", 
    "Malls", 
    "DialAcqClient", 
    "DialAcqValue", 
    "DialEUAcqClient",
    "DialEUAcqValue",
    "IPAcqClient",
    "IPAcqValue", 
    "SIPAcqClient", 
    "SIPAcqValue", 
    "SIPEUAcqClient", 
    "SIPEUAcqValue", 
    "SIPHAcqClient", 
    "SIPHAcqValue", 
    "SSCAcqClient", 
    "SSCAcqValue"
    );
$data_baseline_update_sql = "UPDATE Checklist.Data_Parms SET ";
$data_baseline_updates = array();
    foreach($data_params as $value){
    if(empty($_POST[$value]) && $_POST[$value]!='0'){}
    else{
        if (is_numeric($_POST[$value])){
            $this_attribute = $_POST[$value];  
        }
        else{
            $this_attribute = "\"$_POST[$value]\"";
        }
        $data_baseline_update_sql .= " $value=$this_attribute,";
        array_push($data_baseline_updates,"$value is changed to $this_attribute."); 
    }
}
    
$data_baseline_update_sql=rtrim($data_baseline_update_sql,",");
$data_baseline_update_sql .= " where data_id = $BASELINE_ID";
    
//executing update sql for data parms
if (!empty($data_baseline_updates)){
    if($conn->query($data_baseline_update_sql) === TRUE) {
        echo "<b>Updated baseline settings for Data Parms.</b><br>";
        foreach($data_baseline_updates as $change){
            echo "&nbsp&nbsp&nbsp&nbsp$change<br>";
            }
        } 
    else {
    echo "Error: " . $data_baseline_update_sql . "<br>" . $conn->error;
    }
}    
    
////Update Dial Baseline Parameters
    
//Building Update SQL for Dial parms
$dial_params=array(
    "DIAL_BH", 
    "DIAL_BR", 
    "DIAL_CN", 
    "DIAL_FR", 
    "DIAL_DE", 
    "DIAL_HK", 
    "DIAL_ID", 
    "DIAL_IE", 
    "DIAL_JP", 
    "DIAL_MC", 
    "DIAL_MY", 
    "DIAL_MX", 
    "DIAL_MO", 
    "DIAL_SG", 
    "DIAL_KR", 
    "DIAL_TW", 
    "DIAL_AE", 
    "DIAL_UK", 
    "DIAL_VN"
);
$dial_baseline_update_sql = "UPDATE Checklist.Dial_Parms SET ";
$dial_baseline_updates = array();
foreach($dial_params as $value){
    if(empty($_POST[$value]) && $_POST[$value]!='0'){}
    else{
        $this_attribute = $_POST[$value];  
        $dial_baseline_update_sql .= " $value=$this_attribute,";
        array_push($dial_baseline_updates,"$value is changed to $this_attribute."); 
    }
}
$dial_baseline_update_sql=rtrim($dial_baseline_update_sql,",");
$dial_baseline_update_sql .= " where dial_chklist_id = $BASELINE_ID";
    
//executing update sql for dial parms
if (!empty($dial_baseline_updates)){
    if($conn->query($dial_baseline_update_sql) === TRUE) {
        echo "<b>Updated baseline settings for Dial Parms.</b><br>";
        foreach($dial_baseline_updates as $change){
            echo "&nbsp&nbsp&nbsp&nbsp$change<br>";
            }
        } 
    else {
    echo "Error: " . $dial_baseline_update_sql . "<br>" . $conn->error;
    }
}

////Update Jobwatch Baseline Parameters
    
//Building Update SQL for Jobwatch parms
$jobwatch_params = array(
    "FTP_Inbox",
    "CE_Root_Inbox",
    "IFACT_Rollups",
    "Manual_Releases_Q", 
    "Manual_Releases_AsIs_Q", 
    "Old_IFACT_Rollup",
    "Day_Close_Past_Due",
    "Output_Rollup", 
    "IFACT_IO_Rollups_Failed",
    "IFACT_Load_Traffic",
    "UDM_Rollups_InProc",
    "UDM_Rollups_Waiting",
    "XML_Traffic_Stage",
    "Harvest_Rec_Not_Tried",
    "Dial_ADR_InProc_First", 
    "Dial_ADR_InProc_Retry",
    "Dial_ADR_Q_First",
    "Dial_ADR_Q_Retry"
);
$jobwatch_baseline_update_sql = "UPDATE Checklist.Jobwatch SET ";
$jobwatch_baseline_updates = array();
foreach($jobwatch_params as $value){
    if(empty($_POST[$value]) && $_POST[$value]!='0'){}
    else{
        $this_attribute = $_POST[$value];  
        $jobwatch_baseline_update_sql .= " $value=$this_attribute,";
        array_push($jobwatch_baseline_updates,"$value is changed to $this_attribute."); 
    }
}    
$jobwatch_baseline_update_sql=rtrim($jobwatch_baseline_update_sql,",");
$jobwatch_baseline_update_sql .= " where jobwatch_id = $BASELINE_ID";

//executing update sql for jobwatch parms
if (!empty($jobwatch_baseline_updates)){
    if($conn->query($jobwatch_baseline_update_sql) === TRUE) {
        echo "<b>Updated baseline settings for Jobwatch Parms.</b><br>";
        foreach($jobwatch_baseline_updates as $change){
            echo "&nbsp&nbsp&nbsp&nbsp$change<br>";
            }
        } 
    else {
    echo "Error: " . $jobwatch_baseline_update_sql . "<br>" . $conn->error;
    }
}  
    
    
////Update Portal Baseline Parameters
    
//Building Update SQL for Portal parms
$portal_params= array("eu1_q","eu2_q");
$portal_baseline_update_sql = "UPDATE Checklist.Portal_Parms SET ";
$portal_baseline_updates = array();
foreach($portal_params as $value){
    if(empty($_POST[$value]) && $_POST[$value]!='0'){}
    else{
        $this_attribute = $_POST[$value];  
        $portal_baseline_update_sql .= " $value=$this_attribute,";
        array_push($portal_baseline_updates,"$value is changed to $this_attribute."); 
    }
}    
$portal_baseline_update_sql=rtrim($portal_baseline_update_sql,",");
$portal_baseline_update_sql .= " where portal_id = $BASELINE_ID";

//executing update sql for portal parms    
if (!empty($portal_baseline_updates)){
    if($conn->query($portal_baseline_update_sql) === TRUE) {
        echo "<b>Updated baseline settings for Portal Parms.</b><br>";
        foreach($portal_baseline_updates as $change){
            echo "&nbsp&nbsp&nbsp&nbsp$change<br>";
            }
        } 
    else {
    echo "Error: " . $portal_baseline_update_sql . "<br>" . $conn->error;
    }
}
    
////Update Portal Baseline Parameters
    
//Building Update SQL for Portal parms
    
$system_params = array(
    "plapp04_idle", 
    "plapp05_idle", 
    "plapp06_idle", 
    "plapp07_idle", 
    "plapp04_active", 
    "plapp05_active", 
    "plapp06_active", 
    "plapp07_active", 
    "plapp04_mem", 
    "plapp05_mem",
    "plapp06_mem",
    "plapp07_mem",
    "plapp04_cpu", 
    "plapp05_cpu",
    "plapp06_cpu",
    "plapp07_cpu");

$system_baseline_update_sql = "UPDATE Checklist.system_Parms SET ";
$system_baseline_updates = array();
foreach($system_params as $value){
    if(empty($_POST[$value]) && $_POST[$value]!='0'){}
    else{
        $this_attribute = $_POST[$value];  
        $system_baseline_update_sql .= " $value=$this_attribute,";
        array_push($system_baseline_updates,"$value is changed to $this_attribute."); 
    }
}    
$system_baseline_update_sql=rtrim($system_baseline_update_sql,",");
$system_baseline_update_sql .= " where system_id = $BASELINE_ID";

//executing update sql for system parms    
if (!empty($system_baseline_updates)){
    if($conn->query($system_baseline_update_sql) === TRUE) {
        echo "<b>Updated baseline settings for System Parms.</b><br>";
        foreach($system_baseline_updates as $change){
            echo "&nbsp&nbsp&nbsp&nbsp$change<br>";
            }
        } 
    else {
    echo "Error: " . $system_baseline_update_sql . "<br>" . $conn->error;
    }
}

echo "<br><br><a href='doBaseline.php?pageChecklistID=$chklstid'> Edit this Checklist again</a><br>"; 
?>
    <a href='ChecklistHome.php'> Return Home</a>
</div>

</body>
</html> 

 

