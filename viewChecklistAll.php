<!DOCTYPE html>
<html>

<head>
<?php
    
   if ($_GET['pageChecklistID']==1) {
        $chk_time = 'Most Recent 7AM Checklist Results';
    } elseif ($_GET['pageChecklistID']==2) {
        $chk_time = 'Most Recent 11AM Checklist Results';
    } elseif ($_GET['pageChecklistID']==3) {
        $chk_time = 'Most Recent 3PM Checklist Results';
    } elseif ($_GET['pageChecklistID']==4) {
        $chk_time = 'Most Recent 11PM Checklist Results';
    }
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header"><?php echo $chk_time ?> </title>

</head>


<?php
//Get Baselines from previous form
//$baselines=$_POST[baselines];
 

?>

<body>

<?php
//HEADER
include("header.html");
$chklstid = $_GET['pageChecklistID'];
$BASELINE_ID = $chklstid + 1000;

//functions for analyzing report
include("reporting_functions.php");
//connecting to SQL DB
include("makeconnection.php");
//Getting baselines, adding to array called $baselines
include("getBaselines.php");

echo "<h2>$chk_time</h2>";

$sqlID = "SELECT id, date_submitted FROM Checklist.Checklist WHERE chklist_time_id = $chklstid order by date_submitted desc limit 1";
$resultID = $conn->query($sqlID);
while($row = $resultID->fetch_assoc()) {
	$recent_chklst_id = $row["id"];
	$recent_chklst_date =  $row["date_submitted"];
	}
include("getRecent.php");
?>

<h2 id = "view-title"></h2>

<?php 

echo "<h4>Checklist Date: $recent_chklst_date</h4><br>";

//
//include("dataRetrievalView.php");
//include("dialView.php");
//include("portalView.php");
//include("jobwatchView.php");
//include("harvestView.php");
//include("salesView.php");
//include("notablefailuresView.php");
?>


</body>
</html>  

