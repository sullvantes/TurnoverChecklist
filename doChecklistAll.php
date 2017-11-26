 <!DOCTYPE html>
<html>

<head>
<?php
    
   if ($_GET['pageChecklistID']==1) {
        $chk_time = '7AM Checklist';
    } elseif ($_GET['pageChecklistID']==2) {
        $chk_time = '11AM Checklist';
    } elseif ($_GET['pageChecklistID']==3) {
        $chk_time = ' 3PM Checklist';
    } elseif ($_GET['pageChecklistID']==4) {
        $chk_time = '11PM Checklist';
    }

$baseline_form = FALSE;
    
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header"><?php echo $chk_time ?> </title>
    
</head>

<body>

<?php
//HEADER
include("header.html");
if ($_GET['pageChecklistID']){
    $baseline_id= (int)$_GET['pageChecklistID']+1000;
    }
    else{
        $baseline_id= 1001;
    }
    ?>
 
<div class="container">
<form action="returnChecklistAll.php?pageChecklistID=<?php echo $_GET['pageChecklistID'] ?>" method = post>


<?php 
//BODY
echo "<h2>System Health Handoff ($chk_time)</h2>";
include("makeconnection.php");
include("DataRetrieval.php");
include("Overnight.php");
include("Dial.php");
include ("Jobwatch.php");
include("portals.php");
include ("harvest_system.php");
include ("notableFailures.php");
$conn->close();
?>


<br>
<input type=hidden name="CHKLST_ID" value = "<?php echo $_GET['pageChecklistID'] ?>">


<input type="submit" value="Submit">
</form> 

<a href='ChecklistHome.php'> Return Home</a>
</div>
</body>


</html> 

