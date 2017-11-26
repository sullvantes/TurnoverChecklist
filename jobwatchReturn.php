<div id = "jobwatchTitle">
<h4><u>JobWatch Snapshot</u></h4>
</div>
<div class="container">
<div id = "jobwatchBody">
<h5><b> File Count </b></h5>

<?php 
//database names for jobwatch attributes
$db_status_abbrev= array(
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
$db_status_names= array(
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

//Displaying Jobwatch values and their relationship to the threshold. 
for($x=0; $x<18; $x++){
        $name=$db_status_abbrev[$x];
        $curr_baseline = $baselines[$name];
        JobwatchHandle("$name","$db_status_names[$x]",$curr_baseline);
        //inserting headers for different sections
        if ($x==2){
            echo "</div><div id = \"jobwatchBBS\"><h5><b> BBS Messages</b></h5>";
            }
        elseif($x==5){
            echo "</div><div id = \"jobwatchQueries\"><h5><b>Queries</b></h5>";   
            }
    }
?>


<h5><b> Windows Inboxes </b></h5>
    
<?php 
    $inboxservers=array("Inppwibx02","Inppwibx03","Inppwibx05");
    foreach($inboxservers as $server_name){
        Okay($_POST[$server_name],"Windows Inbox($server_name)");
    }
?>
</div><br>




