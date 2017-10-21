<div id = "dataAcqTitleExpanded">
<h4><u>Data Acquisition and Delivery (-)</u></h4>
</div>
<div id = "dataAcqTitleCollapsed">
<h4><u>Data Acquisition and Delivery (+)</u></h4>
</div>
<div class="container">
<div id = "dataAcqBody">
<div id = "extractSalesPre">

<div class='row'>
<div class='col-md-4'> Shoppertrak has missed 
<?php ThreshNum($RecentDataParms["failedextracts"],$data_parms_row[failedextracts]); ?>  
extract<?php Plural($RecentDataParms["failedextracts"]); ?>.
</div>
<div class='col-md-4'>
<?php if ($RecentDataParms["failedextractnames"]!= "")
	{
	ThreshString("Please look into the failed extract issue for ".$RecentDataParms["failedExtractNames"].".",$RecentDataParms["failedextracts"],$data_parms_row[failedextracts]);
	}
	else 
	{
	ThreshString("Please look into the failed extract issue.",$RecentDataParms["failedextracts"],$data_parms_row[failedextracts]);
	}
	?>
</div>
<div class='col-md-4'>
<?php WantsValue($RecentDataParms["failedextracts"], "number of missing extracts"); ?>


<?php if($RecentDataParms["failedextracts"]>0)
	WantsValue($RecentDataParms["failedextractnames"], "names of missing extracts"); ?>
</div>
</div>
<br><br>

<div class='row'>
<div class='col-md-4'> Production Support needs to reload 
<?php ThreshNum($RecentDataParms["salesfiles"],$data_parms_row[salesfiles]);?> sales/labor file<?php Plural($RecentDataParms["salesfiles"]); ?>.
</div>
<div class='col-md-4'>
<?php if ($RecentDataParms["salesfilesclients"]!= "")
	{
	ThreshString("Please reload files for ".$RecentDataParms["salesfilesclients"].".",$RecentDataParms["salesfiles"],$data_parms_row[salesfiles]);
	}
	else 
	{
	ThreshString("Please reload the historical files.",$RecentDataParms["salesfiles"],$data_parms_row[salesfiles]);
	}
	?>
</div>
<div class='col-md-4'>
<?php WantsValue($RecentDataParms["salesfiles"], "# of historical sales files"); ?> 
<?php if($RecentDataParms["salesfiles"]>0)
	WantsValue($RecentDataParms["salesfilesclients"], "clients with historical sales files"); ?> <br>
</div>
</div>
</div>




<div id = "extractSalesPost">
<b>Sales Files and Failed Extracts have <?php 
if($RecentDataParms["SalesExtractBool"])
	{
	echo "not been reloaded/rerun. The note is '".$RecentDataParms[NoteForSalesExtract]."'.";
	}
	else
	{
		echo "been reloaded/rerun.";
	}
?>
</b>
&nbsp&nbsp&nbsp&nbsp&nbsp 
<br>
<br>
</div>

 
<div id = "eFT">
<div class='row'>
<div class='col-md-4'> 
The number of sites missed in the last 3 EFT cycles is :
<?php ThreshNum($RecentDataParms[EFTA],$data_parms_row[EFTA]);?>,
<?php ThreshNum($RecentDataParms[EFTB],$data_parms_row[EFTB]);?>, and
<?php ThreshNum($RecentDataParms[EFTC],$data_parms_row[EFTC]);?>.
</div>
<div class='col-md-4'> 
<?php ThreshString("Please investigate the cause for missing ". $RecentDataParms[EFTA] . " sites at 10:30am." , $RecentDataParms[EFTA], $data_parms_row[EFTA]);?>
<?php ThreshString("Please investigate the cause for missing ". $RecentDataParms[EFTB] . " sites at 10:45am." , $RecentDataParms[EFTB], $data_parms_row[EFTB]);?>
<?php ThreshString("Please investigate the cause for missing ". $RecentDataParms[EFTC] . " sites at 11am." , $RecentDataParms[EFTC], $data_parms_row[EFTC]);?>
</div>
<div class='col-md-4'> 
<?php WantsValue($RecentDataParms[EFTA], "missed EFT sites at 10:30"); ?>
<?php WantsValue($RecentDataParms[EFTB], "missed EFT sites at 10:45"); ?>
<?php WantsValue($RecentDataParms[EFTC], "missed EFT sites at 11:00"); ?>
</div>
</div>
</div>


<div id = "actualAcqWindow">
<h5>Actual Acquisition Window :</h5>

<div class='row'>
<div class='col-md-2'> 
<?php 	echo "<30 Min:";
	BelowThreshNum($RecentDataParms[ActAcqW1],$data_parms_row[ActAcqW1]);?>
</div>
<div class='col-md-5'> 
<?php BelowThreshString("Please investigate the cause for only acquiring ". $RecentDataParms[ActAcqW1] . " within 30 minutes." , $RecentDataParms[ActAcqW1], $data_parms_row[ActAcqW1]);?>
</div>
<div class='col-md-5'> 
<?php WantsValue($RecentDataParms[ActAcqW1], "acquired sites within 30 minutes."); ?>
</div>
</div>

<div class='row'>
<div class='col-md-2'> 
<?php 	echo ">30 Min:";
	ThreshNum($RecentDataParms[ActAcqW2],$data_parms_row[ActAcqW2]);?>
</div>
<div class='col-md-5'> 
<?php ThreshString("Please investigate the cause for only acquiring ". $RecentDataParms[ActAcqW2] . " within 30 minutes." , $RecentDataParms[ActAcqW2], $data_parms_row[ActAcqW2]);?>
</div>
<div class='col-md-5'> 
<?php WantsValue($RecentDataParms[ActAcqW2], "acquired sites longer 30 minutes."); ?>
</div>
</div>

<div class='row'>
<div class='col-md-2'> 
<?php 	echo ">60 Min:";
	ThreshNum($RecentDataParms[ActAcqW3],$data_parms_row[ActAcqW3]);?>
</div>
<div class='col-md-5'> 
<?php ThreshString("Please investigate the cause for only acquiring ". $RecentDataParms[ActAcqW3] . " within 30 minutes." , $RecentDataParms[ActAcqW3], $data_parms_row[ActAcqW3]);?>
</div>
<div class='col-md-5'> 
<?php WantsValue($RecentDataParms[ActAcqW3], "acquired sites longer that 60 minutes."); ?>
</div>
</div>
</div>


<div id = "malls">
<div class='row'>
<div class='col-md-4'> 
There are <?php ThreshNum($RecentDataParms[NRTI],$data_parms_row[NRTI]);?> missing NRTI sites.
</div>
<div class='col-md-4'> 
<?php ThreshString("Please investigate the cause for missing ". $RecentDataParms[NRTI] . "  NRTI sites." , $RecentDataParms[NRTI], $data_parms_row[NRTI]);?>
</div>
<div class='col-md-4'> 
<?php WantsValue($RecentDataParms[NRTI], "missed NRTI sites"); ?>
</div>
</div>



<div class='row'>
<div class='col-md-4'> 
There are <?php ThreshNum($RecentDataParms[Malls],$data_parms_row[Malls]);?> missing Malls sites.
</div>
<div class='col-md-4'> 
<?php ThreshString("Please investigate the cause for missing ". $RecentDataParms[Malls] . "  Malls sites." , $RecentDataParms[Malls], $data_parms_row[Malls]);?>
</div>
<div class='col-md-4'> 
<?php WantsValue($RecentDataParms[Malls], "missed Malls sites"); ?>
</div>
</div>
</div>

</div>
</div>
