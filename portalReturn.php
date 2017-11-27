
<div id = "portalsTitleExpanded">
<h4><u>Customer & Internal Portals</u></h4>
</div>

<div class = "container">
<div id = "portalsBody">
<?php 

$portal_db = array("portal", "insights", "opsportal", "remedy", "kpiapi", "edtws", "MktIntel", "ForeAdmin", "SMSBill", "RDMVP", "SysRpt", "EFTWS", "plweb11", "plweb12", "plweb3", "plweb14");
$portal_names = array("Customer Portal","Insights","Operations Portal","Remedy", "KPI API", "Enterprise Daily Traffic Web Service", "Market Intelligence", "Forecasting Admin", "SMS Billing", "RDM and Vantage Point", "System Reports", "Enterprise Flash Traffic Web Service", "PLWEB11", "PLWEB12", "PLWEB13", "PLWEB14");    
foreach($portal_db as $index=>$abbrev){
    $name=$portal_names[$index];
//    echo "dbname==>$abbrev<br>name==>$name<br>value==>$result[$abbrev]";
    
    if (strpos($abbrev, "plweb") !== FALSE){
        if ($abbrev=="plweb11"){
            echo "<br><b>Site Manager - JBoss Running:</b><br>"; 
        }
        UpDown($results[$abbrev], "Site Manager $name", $view_chk);
        
    }
    else{
        Available($results[$abbrev],$name,$view_chk);
    }
    }
?>

<div class='row'>
<h5>Rapid Blue Current Queues</h5><br>
<?php QueueLevel($results["eu1_q"],$baselines["eu1_q"],"Rapid Blue EU1 Server", $view_chk);?>
<?php QueueLevel($results["eu2_q"],$baselines["eu2_q"],"Rapid Blue EU2 Server", $view_chk );?>
</div>
<br>
<br>



</div></div>
