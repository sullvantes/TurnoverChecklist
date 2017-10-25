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
?>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header"><?php echo $chk_time ?> </title>
    
    <!--
	<link rel="stylesheet" href="/CSS/bootstrap.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.css.map"/>
	<link rel="stylesheet" href="/CSS/bootstrap-theme.min.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.css"/>
	<link rel="stylesheet" href="/CSS/bootstrap.min.css"/>
-->
</head>




<?php
function ModemSuccessRate($inputbool,$inputpercent) {
     if($inputbool == false){
	$inputpercent = null;
}
	return($inputpercent);
}
?>
<body>

<?php
include("header.html");

    
?>
 

<form action="returnChecklistAll.php?pageChecklistID=<?php echo $_GET['pageChecklistID'] ?>" method = post>



<?php 
//BODY
//echo "checklist ID: ". $_GET['pageChecklistID']. "<br>";
      
//include("DataRetrieval.php");
//include("Overnight.php");
include("Dial.php");
//include ("Jobwatch.php");
//include("portals.php");
//include ("harvest_system.php");
//include ("sales.php");
//include ("notableFailures.php");
?>


<br>
<input type=hidden name="CHKLST_ID" value = "<?php echo $_GET['pageChecklistID'] ?>">


<input type="submit" value="Submit">
</form> 

<a href='ChecklistHome.php'> Return Home</a>
</div>
</body>


</html> 

