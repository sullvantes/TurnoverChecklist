<div id = "portalsTitleExpanded">
<h4><u>Customer & Internal Portals (-)</u></h4>
</div>

<div id = "portalsTitleCollapsed">
<h4><u>Customer & Internal Portals (+)</u></h4>
</div>
<div class = "container">
<div id = "portalsBody">
<?php 
Available($RecentPortalParms["portal"],'Customer Portal');
Available($RecentPortalParms["insights"],'Insights');
Available($RecentPortalParms["ops_portal"],'Operations Portal');
UpDown($RecentPortalParms["remedy"],"Remedy");

?>



<div id = "secondaryPortalsTitleCollapsed">
<h5><b>Click for Additional Systems</b></h5>
</div>
<div id = "secondaryPortalsTitleExpanded">
<h5><b>Click to Hide Additional Systems</b></h5>
</div>
<div id = "secondaryPortalsBody">

<?php 
UpDown($RecentPortalParms["plweb11"], "Site Manager PLWEB11");
UpDown($RecentPortalParms["plweb12"], "Site Manager PLWEB12");
UpDown($RecentPortalParms["plweb13"], "Site Manager PLWEB13");
UpDown($RecentPortalParms["plweb14"], "Site Manager PLWEB14");
?>
<br>
<div class='row'>
<?php QueueLevel($RecentPortalParms["eu1_q"],$portal_parms_row_base["eu1_q"],"Rapid Blue EU1 Server");?>
<?php QueueLevel($RecentPortalParms["eu2_q"],$portal_parms_row_base["eu2_q"],"Rapid Blue EU2 Server");?>
</div>
<br>
<br>

<?php Available($RecentPortalParms["kpi"],"KPI API");?>
<?php Available($RecentPortalParms["edtws"], "Enterprise Data Traffic Web Service");?>
<?php Available($RecentPortalParms["mkt_intel"],"Market Intelligence");?>
<?php Available($RecentPortalParms["fore_admin"], "Forecasting Admin");?>
<?php Available($RecentPortalParms["sms_bill"],"SMS Billing");?>
<?php Available($RecentPortalParms["rdm_vp"],"RDM/Vantage Point");?>
<?php Available($RecentPortalParms["sys_rpt"], "System Reports");?>
<?php Available($RecentPortalParms["eftws"],"EFT Web Service");?>
</div></div></div></div> 

