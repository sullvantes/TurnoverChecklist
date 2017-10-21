<div id = "harvestTitleExpanded">
<h4><u>Harvest (-)</u></h4>
</div>
<div id = "harvestTitleCollapsed">
<h4><u>Harvest (+)</u></h4>
</div>
<div class = "container">
<div id = "harvestBody">
<?php 

HarvestHealth("04",$RecentSystemParms[plapp04_idle],$RecentSystemParms[plapp04_active],$RecentSystemParms[plapp04_mem],$RecentSystemParms[plapp04_cpu],$system_parms_row["plapp04_idle"],$system_parms_row["plapp04_active"],$system_parms_row["plapp04_mem"],$system_parms_row["plapp04_cpu"]);
HarvestHealth("05",$RecentSystemParms["plapp05_idle"],$RecentSystemParms["plapp05_active"],$RecentSystemParms["plapp05_mem"],$RecentSystemParms["plapp05_cpu"],$system_parms_row["plapp05_idle"],$system_parms_row["plapp05_active"],$system_parms_row["plapp05_mem"],$system_parms_row["plapp05_cpu"]);
HarvestHealth("06",$RecentSystemParms["plapp06_idle"],$RecentSystemParms["plapp06_active"],$RecentSystemParms["plapp06_mem"],$RecentSystemParms["plapp06_cpu"],$system_parms_row["plapp06_idle"],$system_parms_row["plapp06_active"],$system_parms_row["plapp06_mem"],$system_parms_row["plapp06_cpu"]);
HarvestHealth("07",$RecentSystemParms["plapp07_idle"],$RecentSystemParms["plapp07_active"],$RecentSystemParms["plapp07_mem"],$RecentSystemParms["plapp07_cpu"],$system_parms_row["plapp07_idle"],$system_parms_row["plapp07_active"],$system_parms_row["plapp07_mem"],$system_parms_row["plapp07_cpu"]);

?>
</div>
</div>


