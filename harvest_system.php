
<?php
    
$harvest_abbrev= array(
    "plapp04_idle",
    "plapp05_idle",
    "plapp06_idle",
    "plapp07_idle",
    "plapp04_active",
    "plapp05_active",
    "plapp06_active",
    "plapp07_active",
    "plapp04_mem",
    "plapp05_mem",
    "plapp06_mem",
    "plapp07_mem",
    "plapp04_cpu",
    "plapp05_cpu",
    "plapp06_cpu",
    "plapp07_cpu");
    
    
$harvest_string = implode (", ", $harvest_abbrev);



$harvest_sql = "SELECT $harvest_string from Checklist.System_Parms where system_id = $baseline_id";

$harvest_baseline_result = $conn->query($harvest_sql);
    
$harvest_baseline_row = null;

if ($harvest_baseline_result->num_rows > 0) {
    while($harvest_baseline_row_tester = $harvest_baseline_result->fetch_assoc()) {
        $harvest_baselines = $harvest_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}


    
?>
<div id = "harvestTitleExpanded">
<h4><u>Harvest System</u></h4>
</div>
<div class = "container">
<div id = "harvestBody">
    <table style="width:50%">
    <h5><u>Number of Harvest Connections</u></h5>
        <tr>
            <td><b>Instance </b></td>
            <td><b>NumIdle</b></td>
            <td><b>NumActive</b></td>
        </tr>
<?php
    $hosts = array("PLAPP04: ","PLAPP05: ","PLAPP06: ","PLAPP07: ");  
    for($idle=0;$idle<4;$idle++){
        $act=$idle+4;
        $actname=$harvest_abbrev[$act];
        $idlename=$harvest_abbrev[$idle];
        $baseline_act = $harvest_baselines[$harvest_abbrev[$act]];
        $baseline_idle = $harvest_baselines[$harvest_abbrev[$idle]];
        echo "<tr><td>$hosts[$idle]</td><td><input type=\"number\" name=\"$idlename\" placeholder=$baseline_idle></td>";
        echo "<td><input type=\"number\" name=\"$actname\" placeholder = $baseline_act></td></tr>";
        if ($baseline_form==FALSE){
            echo "<input type =\"hidden\" name=\"baselines[$idlename]\" value=\"$baseline_idle\">";
            echo "<input type =\"hidden\" name=\"baselines[$actname]\" value=\"$baseline_act\">";
        }
    }
?>
    </table> 	

    <table style="width:40%">
        <h5><u>Harvest Memory Utilization:</u></h5>
<?php 
    for($app=0;$app<4;$app++){
        $baseline_mem = $harvest_baselines[$harvest_abbrev[$app+8]];
        $name_mem = $harvest_abbrev[$app+8];
        echo "<tr><td>$hosts[$app] </td><td><input type=\"percent\" name=\"$name_mem\" placeholder=\"$baseline_mem\">%</td></tr>";
        if ($baseline_form==FALSE){
            echo "<input type =\"hidden\" name=\"baselines[$name_mem]\" value=\"$baseline_mem\">";
        }
    }
    ?>
    </table>

    <table style="width:40%">
        <h5><u>Harvest CPU Utilization:</u></h5>
   <?php 
    for($app=0;$app<4;$app++){
        $baseline_cpu = $harvest_baselines[$harvest_abbrev[$app+12]];
        $name_cpu = $harvest_abbrev[$app+12];
        echo "<tr><td>$hosts[$app] </td><td><input type=\"percent\" name=\"$name_cpu\" placeholder=\"$baseline_cpu\">%</td></tr>";
        if ($baseline_form==FALSE){
            echo "<input type =\"hidden\" name=\"baselines[$name_cpu]\" value=\"$baseline_cpu\">";
        }
    }
    ?>
    </table>


</div>
</div>
