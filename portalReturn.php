
<div id = "portalsTitleExpanded">
<h4><u>Customer & Internal Portals (-)</u></h4>
</div>

<div id = "portalsTitleCollapsed">
<h4><u>Customer & Internal Portals (+)</u></h4>
</div>
<div class = "container">
<div id = "portalsBody">
<?php 
Available($_POST["portal"],'Customer Portal');
Available($_POST["insights"],'Insights');
Available($_POST["opsportal"],'Operations Portal');
UpDown($_POST["remedy"],"Remedy");
?>

<div id = "secondaryPortalsTitleCollapsed">
<h5><b>Click for Additional Systems</b></h5>
</div>
<div id = "secondaryPortalsTitleExpanded">
<h5><b>Click to Hide Additional Systems</b></h5>
</div>
<div id = "secondaryPortalsBody">
<?php
UpDown($_POST["plweb11"], "Site Manager PLWEB11");
UpDown($_POST["plweb12"], "Site Manager PLWEB12");
UpDown($_POST["plweb13"], "Site Manager PLWEB13");
UpDown($_POST["plweb14"], "Site Manager PLWEB14");

?>
<br>
<div class='row'>
<?php QueueLevel($_POST["eu1_q"],$portal_parms_row[eu1_q],"Rapid Blue EU1 Server" );?>
<?php QueueLevel($_POST["eu2_q"],$portal_parms_row[eu2_q],"Rapid Blue EU2 Server" );?>
</div>
<br>
<br>


<?php Available($_POST["kpiapi"],"KPI API");?>
<?php Available($_POST["edtws"], "Enterprise Data Traffic Web Service");?>
<?php Available($_POST["MktIntel"],"Market Intelligence");?>
<?php Available($_POST["ForeAdmin"], "Forecasting Admin");?>
<?php Available($_POST["SMSBill"],"SMS Billing");?>
<?php Available($_POST["RDMVP"],"RDM/Vantage Point");?>
<?php Available($_POST["SysRpt"], "System Reports");?>
<?php Available($_POST["EFTWS"],"EFT Web Service");?>
</div></div></div>
