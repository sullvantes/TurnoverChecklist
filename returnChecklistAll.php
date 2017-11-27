<!DOCTYPE html>
<html>

<head>
<?php
    
   if ($_GET['pageChecklistID']==1) {
        $chk_time = '7AM Checklist Results';
    } elseif ($_GET['pageChecklistID']==2) {
        $chk_time = '11AM Checklist Results';
    } elseif ($_GET['pageChecklistID']==3) {
        $chk_time = ' 3PM Checklist Results';
    } elseif ($_GET['pageChecklistID']==4) {
        $chk_time = '11PM Checklist Results';
    }
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header"><?php echo $chk_time ?> </title>

</head>


<?php
//Get Baselines from previous form
$baselines=$_POST[baselines];
 
//functions for analyzing report
include("reporting_functions.php");
?>

<body>

<?php
//HEADER
include("header.html");
?>
    <h4><center>Be sure to confirm both</center></h4>
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
    <h4><center>Click "Submit" if values are accurate.</center></h4> 

<?php 
    
$results=$_POST;
//below Boolean indicates that this is not a viewchecklist but rather a confirmchecklist
$view_chk=FALSE;
    
echo "<h2>System Health Handoff ($chk_time)</h2>";
print_r($baselines);
echo "<br><br>";
print_r($results);
echo "<br><br>";
    
include("dataRetrievalReturn.php");
include("overnightReturn.php");
include("dialReturn.php");
include("jobwatchReturn.php");
include("portalReturn.php");
include("harvestReturn.php");
include("notablefailuresReturn.php");
include("confirmChecklistForm.php");
?>
    </body>
    </html>  
