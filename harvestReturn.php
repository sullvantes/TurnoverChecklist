<div id = "harvestTitleExpanded">
<h4><u>Harvest (-)</u></h4>
</div>
<div id = "harvestTitleCollapsed">
<h4><u>Harvest (+)</u></h4>
</div>
<div class = "container">
<div id = "harvestBody">
<?php 

HarvestHealth("04",$_POST["plapp04_NumIdle"],$_POST["plapp04_NumActive"],$_POST["plapp04_Mem"],$_POST["plapp04_CPU"],$system_parms_row["plapp04_idle"],$system_parms_row["plapp04_active"],$system_parms_row["plapp04_mem"],$system_parms_row["plapp04_cpu"]);
HarvestHealth("05",$_POST["plapp05_NumIdle"],$_POST["plapp05_NumActive"],$_POST["plapp05_Mem"],$_POST["plapp05_CPU"],$system_parms_row["plapp05_idle"],$system_parms_row["plapp05_active"],$system_parms_row["plapp05_mem"],$system_parms_row["plapp05_cpu"]);
HarvestHealth("06",$_POST["plapp06_NumIdle"],$_POST["plapp06_NumActive"],$_POST["plapp06_Mem"],$_POST["plapp06_CPU"],$system_parms_row["plapp06_idle"],$system_parms_row["plapp06_active"],$system_parms_row["plapp06_mem"],$system_parms_row["plapp06_cpu"]);
HarvestHealth("07",$_POST["plapp07_NumIdle"],$_POST["plapp07_NumActive"],$_POST["plapp07_Mem"],$_POST["plapp07_CPU"],$system_parms_row["plapp07_idle"],$system_parms_row["plapp07_active"],$system_parms_row["plapp07_mem"],$system_parms_row["plapp07_cpu"]);

?>
</div>


