<div id = "salesSystemTitle">
<h4><u>Sales and Labor Errors </u></h4>
</div>
<div class = "container">
<div id = "salesSystemBody">

<h3>Sales and Labor TCE/TCE_OTPT Errors</h3>
<div class = 'row'><div class='col-md-6'> 

There are <?php	ThreshNum($RecentDataParms[SL_DiffURL],$data_parms_row['SL_DiffURL']);?> sites with different URLS. <br>
<?php if(empty($RecentDataParms['SL_Orgs'])){
	echo "There are no orgs to report.<br>";
	}
	else	
	echo "<font color = 'red'> The top orgs with issues are ".$RecentDataParms['SL_Orgs'].".</font><br>";
?>
</div></div>
</div></div>
