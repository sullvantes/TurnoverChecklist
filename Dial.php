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
    "DIAL_VN"
    );
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

$dial_db_string = implode(", ", $dial_country_abbrev);
$dial_country_string = implode(", ", $dial_country_names);
if ($baseline_form==FALSE){
    echo "<input type =\"hidden\" name=\"dial_db_names\" value = \"$dial_db_string\">";
    echo "<input type =\"hidden\" name=\"dial_country_names\" value = \"$dial_country_string\">";
}

if ($_GET['pageChecklistID']){
    $baseline_id= (int)$_GET['pageChecklistID']+1000;
    }
else{
    $baseline_id= 1001;
}
$dial_baseline_sql="SELECT $dial_db_string from Checklist.Dial_Parms where dial_chklist_id = $baseline_id";


$dial_baseline_result = $conn->query($dial_baseline_sql);

$dial_baseline_row = null;

if ($dial_baseline_result->num_rows > 0) {
    while($dial_baseline_row_tester = $dial_baseline_result->fetch_assoc()) {
        $dial_baselines = $dial_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}
?>

<div id = "dialTitleExpanded">
<h4><u>International Dial Success Rate by Region</u></h4>
</div>
<div class="container">
<div class="container-fluid">
    
<?php
foreach ($dial_country_abbrev as $index=>$abbrev){
    echo "<div class=\"row\"><div id=\"$abbrev\">$dial_country_names[$index]:</div><div class = 'col-md-3'><input type=\"percent\" name=\"$abbrev\" placeholder = \"$dial_baselines[$abbrev]\">%</div></div>";
    if ($baseline_form==FALSE){
        echo "<input type =\"hidden\" name=\"baselines[$abbrev]\" value=\"$dial_baselines[$abbrev]\">";
    }
    }
?>

</div>
</div>

