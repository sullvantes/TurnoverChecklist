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
<?php ThreshNum($_POST["FailedExtracts"],$data_parms_row[failedextracts]); ?>  
extract<?php Plural($_POST["FailedExtracts"]); ?>.
</div>
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
</div>
</div>
<br><br>

<div class='row'>
<div class='col-md-4'> Production Support needs to reload 
<?php ThreshNum($_POST["SalesFiles"],$data_parms_row[salesfiles]);?> sales/labor file<?php Plural($_POST["SalesFiles"]); ?>.
</div>
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
</div>




<div id = "extractSalesPost">
<b>Sales Files and Failed Extracts have <?php 
if($_POST["SalesExtractBool"])
	{
	echo "not been reloaded/rerun. The note is '".$_POST[NoteForSalesExtract]."'.";
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
<?php ThreshNum($_POST[EFTA],$data_parms_row[EFTA]);?>,
<?php ThreshNum($_POST[EFTB],$data_parms_row[EFTB]);?>, and
<?php ThreshNum($_POST[EFTC],$data_parms_row[EFTC]);?>.
</div>
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

<div class='row'>
<div class='col-md-2'> 
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
</div>

</div>
</div>
