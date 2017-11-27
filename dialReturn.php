<div id = "dialTitleExpanded">
<h4><u>International Dial Success Rate by Region</u></h4>
</div>

<div class="container">
<div id = "dialBody">
<?php

$dial_country_abbrev=array(
    "DIAL_BH",
    "DIAL_BR",
    "DIAL_CN",
    "DIAL_FR",    
    "DIAL_DE",
    "DIAL_HK",
    "DIAL_ID",
    "DIAL_IE",
    "DIAL_JP",
    "DIAL_MO",
    "DIAL_MY",
    "DIAL_MX",    
    "DIAL_MC",
    "DIAL_SG",
    "DIAL_TH",
    "DIAL_AE",
    "DIAL_UK",
    "DIAL_VN");
$dial_country_names= array(
    "Bahrain",
    "Brazil",
    "China",
    "France",
    "Germany",
    "Hong Kong",
    "Indonesia",
    "Ireland",
    "Japan",
    "Macau",
    "Malaysia",
    "Mexico",
    "Monaco",
    "Singapore",
    "South Korea",
    "Taiwan",
    "Thailand",
    "UAE",
    "United Kingdom",
    "Vietnam");   

//iterates through countries displaying values and comparing the baseline     
foreach($dial_country_abbrev as $index => $dbname){
    DialHandle($results[$dbname], $dial_country_names[$index], $baselines[$dbname], $dbname, $view_chk);
}    
?>

</div></div>
