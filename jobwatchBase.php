<div id = "jobwatchTitleExpanded">
<h4><u>JobWatch Snapshot (-)</u></h4>
</div>
<div id = "jobwatchTitleCollapsed">
<h4><u>JobWatch Snapshot (+)</u></h4>
</div>
<div class = "container">
<div id = "jobwatchBody">

<div id = "jobwatchFiles"><h5><b> File Count</b></h5>
	FTP Inbox:&nbsp<input type="number" name="FTP_Inbox" value = "<?php echo $Jobwatch['FTP_Inbox'];?>"><br> 
	CE Root Inbox:&nbsp<input type="number" name="CE_Root_Inbox" value = "<?php echo $Jobwatch['CE_Root_Inbox'];?>"><br> 
</div>
<div cid = "jobwatchBBS"><h5><b> BBS Messages</b></h5>
	IFACT Rollups:&nbsp<input type="number" name="IFACT_Rollups" value = "<?php echo $Jobwatch['IFACT_Rollups'];?>"> <br>
	Manual Releases Queue:&nbsp<input type="number" name="Manual_Releases_Q" value = "<?php echo $Jobwatch['Manual_Releases_Q'];?>"> <br>
	Manual Releases As-Is Queue:&nbsp<input type="number" name="Manual_Releases_AsIs_Q" value = "<?php echo $Jobwatch['Manual_Releases_AsIs_Q'];?>"><br> 
</div>
<div id = "jobwatchQueries"><h5><b>Queries</b></h5>
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
</div>


