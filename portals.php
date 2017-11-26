<div id = "portalsTitleExpanded"><h4><u>Customer & Internal Portals</u></h4></div>
<div class = "container"><div id = "portalsBody">
<?php


if ($baseline_form == FALSE){ 
    
    $portal_db = array("portal", "insights", "opsportal", "remedy", "kpiapi", "edtws", "MktIntel", "ForeAdmin", "SMSBill", "RDMVP", "SysRpt", "EFTWS", "plweb11", "plweb12", "plweb3", "plweb14");
    $portal_names = array("Customer Portal","Insights","Operations Portal","Remedy", "KPI API", "Enterprise Daily Traffic Web Service", "Market Intelligence", "Forecasting Admin", "SMS Billing", "RDM and Vantage Point", "System Reports", "Enterprise Flash Traffic Web Service", "PLWEB11", "PLWEB12", "PLWEB13", "PLWEB14");    

    foreach($portal_db as $index=>$db_name){
        $name=$portal_names[$index];
        echo "<div class = 'row'>";
        if ($name == "PLWEB11"){
            echo "<br>Site Manager - JBoss Running:<br>";
        }
        echo "<div class='col-md-2'><a target = \"_blank\">$name :&nbsp</a></div>";
        echo "<div class='col-md-2'><input type=\"radio\" name=\"$db_name\" value=\"TRUE\" checked>Yes&nbsp&nbsp";
        echo "<input type=\"radio\" name=\"$db_name\" value=\"FALSE\">No</div><br></div>";

        }
}
?>    
    
    
    


<a target = "_blank"> Rapid Blue:</a> <br>
<?php
$RB_abbrev=array("eu1_q","eu2_q");
$RB_names= array("EU_Backend_Server_1 - Queue Size","EU_Backend_Server_1 - Queue Size");
    


$RB_string = implode (", ", $RB_abbrev);
if ($_GET['pageChecklistID']){
    $baseline_id= (int)$_GET['pageChecklistID']+1000;
    }
else{
    $baseline_id= 1001;
}
$RB_sql="SELECT $RB_string from Checklist.Portal_Parms where portal_id = $baseline_id";

$RB_baseline_result = $conn->query($RB_sql);

$RB_baseline_row = null;

if ($RB_baseline_result->num_rows > 0) {
    while($RB_baseline_row_tester = $RB_baseline_result->fetch_assoc()) {
        $RB_baselines = $RB_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}
    for($x=0;$x<2;$x++){
        $this_baseline = $RB_baselines[$RB_abbrev[$x]];
        $this_rb_db = $RB_abbrev[$x];
        $this_rb_name = $RB_names[$x];
        echo "$this_rb_name:<br><input type=\"number\" name=\"$this_rb_db\" placeholder=\"$this_baseline\"><br>";
        if ($baseline_form==FALSE){
            echo "<input type =\"hidden\" name=\"baselines[$this_rb_db]\" value=\"$this_baseline\">";
        }
    }
?>
</div>
</div>


