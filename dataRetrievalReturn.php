<!--This page is used for both ViewChecklist and ReturnChecklist(confirmation)-->
<div id = "dataAcqTitleExpanded">
<h4><u>Data Acquisition and Delivery</u></h4>
</div>
<div class="container">
<div id = "dataAcqBody">
<div id = "extractSalesPre">

<!--Extract Row-->
<div class='row'>
<!--Extract Info    -->
    <div class='col-md-4'> Shoppertrak has missed 
        <?php 
            $Above_Thresh = ThreshEval($results["FailedExtracts"],$baselines[FailedExtracts]);
            ThreshNum($results["FailedExtracts"],$baselines[FailedExtracts]);
        ?> extract<?php Plural($results["FailedExtracts"]);?>.
    </div>
<!--Extract Alerts-->
    <div class='col-md-4'>
    <?php 
        if(!$results["SalesExtractBool"]){
            if ($Above_Thresh){
                    if ($results["FailedExtractNames"]!= ""){
                        ThreshString("Please look into the failed extract issue for ".$results["FailedExtractNames"].".",$results["FailedExtracts"],$baselines[FailedExtracts]);
                    }
                    else {
                    ThreshString("Please look into the failed extract issue.",$results["FailedExtracts"],$baselines[failedextracts]);
                    }
                    }
            }
        elseif($results["FailedExtracts"]) {
            echo "Extracts have been rerun. If this is a regular occurrence, please investigate.";
            }
    ?>
    </div>
    
<!--Extract Warnings    -->
    <div class='col-md-4'>
        <?php WantsValue($results["FailedExtracts"], "number of missing extracts",$view_chk); ?>
        <?php if($Above_Thresh)
                WantsValue($results["FailedExtractNames"], "names of missing extracts", $view_chk); ?>
    </div>
</div>
<br><br>
<!--Sales Row-->
<div class='row'>

<!--Sales Info-->
<div class='col-md-4'> Production Support needs to reload 
<?php ThreshNum($results["SalesFiles"],$baselines[salesfiles]);?> sales/labor file<?php Plural($results["SalesFiles"]); ?>.
</div>

<!--Sales Alerts    -->
<div class='col-md-4'>    
<?php 
    if(! $results["SalesExtractBool"]){
        if ($results["SalesFilesClients"]!= ""){
            ThreshString("Please reload files for ".$results["SalesFilesClients"].".",$results["SalesFiles"],$baselines[salesfiles]);
            }
            else 
            {
            ThreshString("Please reload the historical files.",$results["SalesFiles"],$baselines[salesfiles]);
            }
        }
    elseif($results["SalesFiles"]) {
            echo "Sales Files have been reloaded. If this is a regular occurrence, please investigate.";
            }
	?>
</div>

<!--Sales Warnings    -->
<div class='col-md-4'>
<?php WantsValue($results["SalesFiles"], "# of historical sales files",$view_chk); ?> 
<?php if($results["SalesFiles"]>0){
	WantsValue($results["SalesFilesClients"], "clients with historical sales files",$view_chk); 
    }?> <br>
</div>
</div>
</div>




<div id = "extractSalesPost">
<?php 
if ($results["SalesFiles"] || $results["FailedExtracts"])
{   
    echo "<b>Sales Files and Failed Extracts have ";
    if(!$results["SalesExtractBool"])
    {
        echo "not been reloaded/rerun.  ";
        if ($results["NoteForSalesExtract"])
        {
            echo "The note is \"$results[NoteForSalesExtract]\".";
        }
	}
	else
	{
		echo "been reloaded/rerun.";
	}
    echo "</b><br><br>";

}
?>
</div>

 
<div id = "eFT">
<div class='row'>
<div class='col-md-4'> 
<!--EFT Data Values-->
<?php
    $eftTimes = array($results[eftTimeA], $results[eftTimeB], $results[eftTimeC]);
    $eftBaselines = array($baselines[EFTA],$baselines[EFTA],$baselines[EFTA]);
    $eftValues =array($results[EFTA],$results[EFTB],$results[EFTC]);
    
    if ($results[EFTA] && $results[EFTB] && $results[EFTC]){
        echo "The number of sites missed in the last 3 EFT cycles is ";
        for($index=0;$index<3;$index++){
            ThreshNum($eftValues[$index],$eftBaselines[$index]);
            echo ($index == 1 ? ", and " : ($index == 0 ? ', ' : "."));
        }
    }
    elseif (!($results[EFTA]||$results[EFTB]||$results[EFTC])){
        echo "You did not enter any of the three latest cycles.";
    }
    else{
        echo "You did not enter all of the the latest cycles. The cycles that were entered were: ";
        for($index=0;$index<3;$index++){
            if ($eftValues[$index]){
                echo "<br>$eftTimes[$index]: ";
            ThreshNum($eftValues[$index],$eftBaselines[$index]);
            }
        }
        
    }
?>
</div>
<!--EFT Alerts-->
<div class='col-md-4'>

<?php 
     for($index=0;$index<3;$index++){
         ThreshString("Please investigate the cause for missing ". $eftValues[$index] . " sites at $eftTimes[$index]." , $eftValues[$index], $eftBaselines[$index]);
     }  
?>
</div>
    
<!--EFT Warnings-->
<div class='col-md-4'> 
<?php 
    for($index=0;$index<3;$index++){
        WantsValue($eftValues[$index], "missed EFT sites at $eftTimes[$index]",$view_chk); 
    }
?>
</div>
</div>
</div>


<div id = "actualAcqWindow">
<h5><b>Actual Acquisition Window :</b></h5>
This is the number of sites that have been attempting data recovery and how long they've been trying. 


<?php
    $ActAcqUnits = array("<30 Min", ">30 Min", ">60 Min");
    $ActAcqBaselines = array($baselines[ActAcqW1],$baselines[ActAcqW2],$baselines[ActAcqW3]);
    $ActAcqValues =array($results[ActAcqW1],$results[ActAcqW2],$results[ActAcqW3]);
    
    for($index=0;$index<3;$index++){
        //Value and Alert
        echo "<div class='row'><div class='col-md-4'> $ActAcqUnits[$index]: ";
        if ($index == 0){
            BelowThreshNum($ActAcqValues[$index],$ActAcqBaselines[$index]);
            echo "</div><div class='col-md-4'>";
            BelowThreshString("Please investigate the cause for $ActAcqValues[$index] sites taking $ActAcqUnits[$index] to acquire data.", $ActAcqValues[$index], $ActAcqBaselines[$index]);
            echo "</div><div class='col-md-4'>"; 
            }
        else {
            ThreshNum($ActAcqValues[$index],$ActAcqBaselines[$index]);
            echo "</div><div class='col-md-4'>";
            ThreshString("Please investigate the cause for $ActAcqValues[$index] sites taking $ActAcqUnits[$index] to acquire data.", $ActAcqValues[$index], $ActAcqBaselines[$index]);
            echo "</div><div class='col-md-4'>"; 
            }
        //Warning
        WantsValue($ActAcqValues[$index], "sites taking $ActAcqUnits[$index] to acquire data currently", $view_chk);
        echo "</div></div><br>";
    }
    

?>    
    
    
    
</div>


<div id = "malls"> <h5><b>Large Format Data Acquisition :</b></h5>
<?php 
    $largeformat = array(array( "NRTI", $results[NRTI], $baselines[NRTI]),array( "Malls", $results[Malls], $baselines[Malls]));
    for($index=0;$index<2;$index++){
        echo "<div class='row'><div class='col-md-4'> There are "; ThreshNum($largeformat[$index][1],$largeformat[$index][2]); 
        echo " missing ".$largeformat[$index][0]." sites.</div><div class='col-md-4'>"; 
        ThreshString("Please investigate the cause for missing ". $largeformat[$index][1] . " ". $largeformat[$index][0]." sites." , $largeformat[$index][1], $largeformat[$index][2]);
        echo "</div><div class='col-md-4'>"; 
        WantsValue($largeformat[$index][0], "missed ".$largeformat[$index][0]." sites", $view_chk);
        echo "</div></div><br>";
        }
?>
</div><br><br>

</div>
</div>
