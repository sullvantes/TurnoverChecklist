<div id = "dialTitleExpanded">
<h4><u>International Dial Success Rate by Region</u></h4>
</div>

<div class="container">
<div id = "dialBody">
<?php

//converts string for country names and db country names to arrays for iteration
$dial_country= explode(",", $_POST["dial_country_names"]);
$dial_db_abbrev=explode(", ",$_POST["dial_db_names"]);

//iterates through countries displaying values and comparing the baseline     
foreach($dial_db_abbrev as $index => $dbname){
    DialHandle($_POST[$dbname], $dial_country[$index], $baselines[$dbname], $dbname);
}    
?>

</div></div>
