<div id = "dialTitleExpanded">
<h4><u>International Dial Success Rate by Region (-)</u></h4>
</div>
<div id = "dialTitleCollapsed">
<h4><u>International Dial Success Rate by Region (+) </u></h4>
</div>

<div class="container">
<div id = "dialBody">
<?php
DialHandle($_POST["DIAL_BH"], "Bahrain",$data_parms_row[DIAL_BH],"DIAL_BH");
DialHandle($_POST["DIAL_BR"], "Brazil",$data_parms_row[DIAL_BR],"DIAL_BR_BOOL"); 
DialHandle($_POST["DIAL_CN"], "China",$data_parms_row[DIAL_CN],"DIAL_CN_BOOL"); 
DialHandle($_POST["DIAL_FR"], "France",$data_parms_row[DIAL_FR],"DIAL_FR_BOOL"); 
DialHandle($_POST["DIAL_DE"], "Germany",$data_parms_row[DIAL_DE],"DIAL_DE_BOOL"); 
DialHandle($_POST["DIAL_HK"], "Hong Kong",$data_parms_row[DIAL_HK],"DIAL_HK_BOOL");
DialHandle($_POST["DIAL_ID"], "Indonesia",$data_parms_row[DIAL_ID],"DIAL_ID_BOOL"); 
DialHandle($_POST["DIAL_IE"], "Ireland",$data_parms_row[DIAL_IE],"DIAL_IE_BOOL"); 
DialHandle($_POST["DIAL_JP"], "Japan",$data_parms_row[DIAL_JP],"DIAL_JP_BOOL"); 
DialHandle($_POST["DIAL_MC"], "Macau",$data_parms_row[DIAL_MC],"DIAL_MC_BOOL"); 
DialHandle($_POST["DIAL_MY"], "Malaysia",$data_parms_row[DIAL_MY],"DIAL_MY_BOOL"); 
DialHandle($_POST["DIAL_MX"], "Mexico",$data_parms_row[DIAL_MX],"DIAL_MX_BOOL"); 
DialHandle($_POST["DIAL_MO"], "Monaco",$data_parms_row[DIAL_MO],"DIAL_MO_BOOL"); 
DialHandle($_POST["DIAL_SG"], "Singapore",$data_parms_row[DIAL_SG],"DIAL_SG_BOOL"); 
DialHandle($_POST["DIAL_KR"], "South Korea",$data_parms_row[DIAL_KR],"DIAL_KR_BOOL"); 
DialHandle($_POST["DIAL_TW"], "Taiwan",$data_parms_row[DIAL_TW],"DIAL_TW_BOOL"); 
DialHandle($_POST["DIAL_TH"], "Thailand",$data_parms_row[DIAL_TH],"DIAL_TH_BOOL");
DialHandle($_POST["DIAL_AE"], "United Arab Emirates",$data_parms_row[DIAL_AE],"DIAL_AE_BOOL");
DialHandle($_POST["DIAL_UK"], "United Kingdom",$data_parms_row[DIAL_UK],"DIAL_UK_BOOL"); 
DialHandle($_POST["DIAL_VN"], "Vietnam",$data_parms_row[DIAL_VN],"DIAL_VN_BOOL");
?>

</div></div>
