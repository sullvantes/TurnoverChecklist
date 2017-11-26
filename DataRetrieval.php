<script type="text/javascript" src="/JS/checklist.js"></script>

<div id = "dataAcqTitle">
<h4><u>Data Acquisition and Delivery</u></h4>
</div>
<div class="container">
    <div id = "dataAcqBody">
            <div id = "extractSalesPre">
                <h5><u>Number of Failed Extracts :</u></h5>
                    <input type="number" name="FailedExtracts" placeholder=0> 
                <?php
                if ($baseline_form ==FALSE){
                    echo "&nbsp&nbsp Names of Extracts: <input type=\"text\" name=\"FailedExtractNames\"><input type =\"hidden\" name=\"baselines[FailedExtracts]\" value = 0>";
                }
                ?>
                    <br><br>
                <h5><u>Number of Sales & Labor Files to be reposted:</u></h5><br>
                    <input type="number" name="SalesFiles" placeholder=0> 
                <?php
                if ($baseline_form ==FALSE){
                    echo "&nbsp&nbsp Clients With Bad Files:<input type=\"text\" name=\"SalesFilesClients\"><input type =\"hidden\" name=\"baselines[SalesFiles]\" value = 0>";
                    echo "<br><br></div>";
                    echo "<div id = \"extractSalesPost\">Sales Files and Failed Extracts have been reloaded/rerun."; 
                    echo "<input type=\"checkbox\" name=\"SalesExtractBool\"><br><br>";
                    echo "If no action has been taken please notes why:<br>";
                    echo "<textarea name=\"NoteForSalesExtract\" cols=\"50\" rows=\"5\"></textarea><br><br></div>";
                }
                ?>
                 
            <br><br>
            <div id = "eFT">
                <u>Number of EFT Sites Missing</u> <br>
            
<?php

$retrieval_db_names=array("EFTA",
    "EFTB",
    "EFTC",
    "ActAcqW1",    
    "ActAcqW2",
    "ActAcqW3",
    "NRTI",
    "Malls"
    );

$retrieval_string = implode (", ", $retrieval_db_names);

$retrieval_baseline_sql="SELECT $retrieval_string from Checklist.Data_Parms where data_id = $baseline_id";


$retrieval_baseline_result = $conn->query($retrieval_baseline_sql);

$retrieval_baseline_row = null;

if ($retrieval_baseline_result->num_rows > 0) {
    while($retrieval_baseline_row_tester = $retrieval_baseline_result->fetch_assoc()) {
        $retrieval_baselines = $retrieval_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}


//array of array to show times pertinent to each checklist
$eft_times=array(
                array(" 6:30AM : ", " 6:45AM : ", " 7:00AM : "), 
                array("10:30AM : ", "10:45AM : ", "11:00AM : "),
                array(" 2:30PM : ", " 2:45PM : ", " 3:00PM : "),
                array("10:30PM : ", "10:45PM : ", "11:00PM : ")
                );
//uses posted pageChecklistID to decide which times from eft_times array to display                
$chklist_index = $_GET['pageChecklistID']-1;
$chklist_eft_times = $eft_times[$chklist_index];
//iterates through EFT windows to display inputs                
for($index=0; $index<3;$index++){
    $time_interval=$chklist_eft_times[$index];
    $name = $retrieval_db_names[$index];
    $baseline_value = $retrieval_baselines[$name];
    echo "$time_interval<input type=\"number\" name=\"$name\" placeholder = $baseline_value><br>";
    if ($baseline_form==FALSE){
        echo "<input type =\"hidden\" name=\"baselines[$name]\" value=$baseline_value>";
    }
    
}
                
    if ($baseline_form==FALSE){
        echo "<input type =\"hidden\" name=\"eftTimeA\" value=$chklist_eft_times[0]>";            
        echo "<input type =\"hidden\" name=\"eftTimeB\"]\" value = $chklist_eft_times[1]>";
        echo "<input type =\"hidden\" name=\"eftTimeC\"]\" value = $chklist_eft_times[2]>";
    }
?>
            
            <br>
            </div>

            <div id = "actualAcqWindow">
                <h5><u>Actual Acquisition Window:</u></h5>
<?php
    
$act_acq_names=array(3 =>"Less than 30 min: ", 4 => "More than 30 min: ",5 => "More than 60 min: ");
                
for($index=3;$index<6;$index++){
    $baseline_value = $retrieval_baselines[$retrieval_db_names[$index]];
    $name = $retrieval_db_names[$index];
    echo "$act_acq_names[$index]<input type=\"number\" name=\"$name\" placeholder=$baseline_value>&nbsp&nbsp&nbsp";
    if ($baseline_form==FALSE){
        echo "<input type =\"hidden\" name=\"baselines[$name]\" value = $baseline_value>";
    }
    }
?>
            <br><br>
            </div>
            
            <div id = "malls">
<?php
for($index=6;$index<8;$index++){
    $mall_inputs=array(6=>"NRTI Sites",7=>"Malls");
    $baseline_value = $retrieval_baselines[$retrieval_db_names[$index]];
    $name = $retrieval_db_names[$index];
    echo "<h5><u> Missing $mall_inputs[$index]:</u></h5><input type=\"number\" name=\"$retrieval_db_names[$index]\" placeholder=$baseline_value>";
    if ($baseline_form==FALSE){
        echo "<input type =\"hidden\" name=\"baselines[$name]\" value = $baseline_value>";
        }
}
?>                
            </div>
<?php
    if ($baseline_form ==FALSE){
        echo "<br><b>Harvest Org Problems:</b> <br>";
        echo "<a>SIP Problems</a><br>";
        echo "<a>IP/VPN Problems</a><br>";
        echo "<a>SSC Problems</a>";
 }
?>
    <br></div>
</div>