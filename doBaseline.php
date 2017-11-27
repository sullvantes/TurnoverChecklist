 <!DOCTYPE html>
<html>

<head>
<?php
    $chklist_id = $_GET['pageChecklistID'];
    if ($chklist_id){
        $baseline_id= (int)$chklist_id+1000;
        }
    else{
        $baseline_id= 1001;
    }
    
   if ($baseline_id==1001) {
        $chk_time = '7AM';
    } elseif ($baseline_id==1002) {
        $chk_time = '11AM';
    } elseif ($baseline_id==1003) {
        $chk_time = ' 3PM';
    } elseif ($baseline_id==1004) {
        $chk_time = '11PM';
    }    
    $baseline_form=TRUE;
?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id = "chk-header">Edit <?php echo $chk_time ?> Checklist Baselines </title>
    
</head>

<body>

<?php
//HEADER
include("header.html");
?>
 
<form action="updateBaseAll.php?pageChecklistID=<?php echo $baseline_id ?>" method = post>


<?php 
//BODY
echo "<h2>Update System Health Baselines for $chk_time Checklist</h2>";
include("makeconnection.php");

include("DataRetrieval.php");
echo "</div>";
include("Overnight.php");
echo "</div>";
include("Dial.php");
echo "</div>";
include("Jobwatch.php");
echo "</div>";
include("portals.php");
echo "</div>";
include ("harvest_system.php");
$conn->close();
?>


<br>
<input type=hidden name="CHKLST_ID" value = "<?php echo $chklist_id ?>">


<input type="submit" value="Submit">
</form> 

<a href='ChecklistHome.php'> Return Home</a>

</body>


</html> 

