<div id = "jobwatchTitleExpanded">
<h4><u>JobWatch Snapshot (-)</u></h4>
</div>
<div id = "jobwatchTitleCollapsed">
<h4><u>JobWatch Snapshot (+)</u></h4>
</div>
<div class="container">
<div id = "jobwatchBody">
<h5><b> File Count </b></h5>

<?php 
JobwatchHandle("FTP_Inbox","FTP Inbox files",$Jobwatch['FTP_Inbox']);
JobwatchHandle("CE_Root_Inbox","CE Root Inbox files",$Jobwatch['CE_Root_Inbox']);
?>


<h5><b> BBS Messages </b></h5>
<?php 
JobwatchHandle("IFACT_Rollups","IFACT BBS Rollup messages",$Jobwatch['IFACT_Rollups']);
JobwatchHandle("Manual_Releases_Q","BBS Manual Release Queue messages",$Jobwatch['Manual_Releases_Q']);
JobwatchHandle("Manual_Releases_AsIs_Q","BBS Manual Release As-Is Queue messages",$Jobwatch['Manual_Releases_AsIs_Q']);?>


<h5><b> Queries </b></h5>

<?php 
JobwatchHandle("Old_IFACT_Rollup","Old IFACT Rollup messages",$Jobwatch['Old_IFACT_Rollup']);
JobwatchHandle("Day_Close_Past_Due","Day Close Past Due messages",$Jobwatch['Day_Close_Past_Due']);
JobwatchHandle("Output_Rollup","Output Rollup 15 minute to hour/day messages",$Jobwatch['Output_Rollup']);
JobwatchHandle("IFACT_IO_Rollups_Failed","IFACT Input to Output Rollups Failed messages",$Jobwatch['IFACT_IO_Rollups_Failed']);
JobwatchHandle("IFACT_Load_Traffic","IFACT Load Traffic(xfer_notification) messages",$Jobwatch['IFACT_Load_Traffic']);
JobwatchHandle("UDM_Rollups_InProc","UDM Rollups(RTA) In-Process messages",$Jobwatch['UDM_Rollups_InProc']);
JobwatchHandle("UDM_Rollups_Waiting","UDM Rollups(RTA) Waiting messages",$Jobwatch['UDM_Rollups_Waiting']);
JobwatchHandle("XML_Traffic_Stage","XML Traffic Stage messages",$Jobwatch['XML_Traffic_Stage']);
JobwatchHandle("Harvest_Rec_Not_Tried","Harvest Recoveries Not Tried",$Jobwatch['Harvest_Rec_Not_Tried']);
JobwatchHandle("Dial_ADR_InProc_First","Dial ADR In-Process 1st Attempt messages",$Jobwatch['Dial_ADR_InProc_First']);
JobwatchHandle("Dial_ADR_InProc_Retry","Dial ADR In-Process Retry messages",$Jobwatch['Dial_ADR_InProc_Retry']);
JobwatchHandle("Dial_ADR_Q_First","Dial ADR Queue 1st Attempt messages",$Jobwatch['Dial_ADR_Q_First']);
JobwatchHandle("Dial_ADR_Q_Retry","Dial ADR Queue Retry messages",$Jobwatch['Dial_ADR_Q_Retry']);
?>


<h5><b> Windows Inboxes </b></h5>
<?php Okay($_POST["Inppwibx02"],'Windows Inbox(Inppwibx02)');?><br>
<?php Okay($_POST["Inppwibx03"],'Windows Inbox(Inppwibx03)');?><br>
<?php Okay($_POST["Inppwibx05"],'Windows Inbox(Inppwibx05)');?></div></div><br>




