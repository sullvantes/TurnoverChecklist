<div id = "jobwatchTitleExpanded">
<h4><u>JobWatch Snapshot </u></h4>
</div>
<!--
<div id = "jobwatchTitleCollapsed">
<h4><u>JobWatch Snapshot (+)</u></h4>
</div>
-->
<div class = "container">
<div id = "jobwatchBody">
    
<?php
//database names for jobwatch attributes
$jobwatch_db= array(
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
    "Dial_ADR_Q_Retry");

//verbose names for jobwatch attributes
$jobwatch_names= array(
    "FTP Inbox",
    "CE Root Inbox",
    "IFACT Rollups",
    "Manual Releases Queue",
    "Manual Releases As-Is Queue",
    "Old IFACT Rollup",
    "Day Close Past Due",
    "Output Rollup 15 to Hr/Day",
    "IFACT Input to Output Rollups Failed",
    "IFACT Load Traffic",
    "UDM Rollups(RTA) In-Process",
    "UDM Rollups(RTA) Waiting",
    "XML Traffic Stage",
    "Harvest Recoveries Not Tried",
    "Dial ADR In-Process 1st Attempt",
    "Dial ADR In-Process Retry",
    "Dial ADR Queue 1st Attempt",
    "Dial ADR Queue Retry");

$jobwatch_db_string = implode (", ", $jobwatch_db);
$jobwatch_name_string = implode (", ", $jobwatch_names);
    
if ($_GET['pageChecklistID']){
    $baseline_id= (int)$_GET['pageChecklistID']+1000;
    }
else{
    $baseline_id= 1001;
}

$jobwatch_sql = "SELECT $jobwatch_db_string from Checklist.Jobwatch where jobwatch_id = $baseline_id";

$jobwatch_baseline_result = $conn->query($jobwatch_sql);
    
$jobwatch_baseline_row = null;

if ($jobwatch_baseline_result->num_rows > 0) {
    while($jobwatch_baseline_row_tester = $jobwatch_baseline_result->fetch_assoc()) {
        $jobwatch_baselines = $jobwatch_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}


    
?>

<div id = "jobwatch">
    <h5><b> File Count</b></h5>
<?php
    for($x=0; $x<18; $x++){
        $name=$jobwatch_db[$x];
        $curr_baseline = $jobwatch_baselines[$name];
        echo "$jobwatch_names[$x]:<input type=\"number\" name=\"$name\" placeholder=\"$curr_baseline\"><br>";
        if ($baseline_form==FALSE){
            echo "<input type =\"hidden\" name=\"baselines[$name]\" value=$curr_baseline>";
        }
        //inserting headers for different sections
        if ($x==2){
            echo "</div><div id = \"jobwatchBBS\"><h5><b> BBS Messages</b></h5>";
            }
        elseif($x==5){
            echo "</div><div id = \"jobwatchQueries\"><h5><b>Queries</b></h5>";   
            }
    }
?>    
</div>
<?php
    if ($baseline_form ==FALSE){
        echo "<div id = \"jobwatchInbox\">";
        echo "<h5><b>Inboxes</b></h5>"; 
        $inboxservers=array("Inppwibx02","Inppwibx03","Inppwibx05");
        foreach($inboxservers as $server_name){
            echo "$server_name:&nbsp&nbsp  ";
            echo "<input type=\"radio\" name=\"$server_name\" value=\"TRUE\">Okay&nbsp&nbsp";
            echo "<input type=\"radio\" name=\"$server_name\" value=\"FALSE\" checked>Not Okay<br></div>";
        }
    } 
?>

</div>
</div>
