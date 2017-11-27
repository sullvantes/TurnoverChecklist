<?php

//results for DataParms
$data_result_sql="SELECT * from Checklist.Data_Parms where data_id = $recent_chklst_id";
    
$data_result_result = $conn->query($data_result_sql);

$data_result_row = null;

if ($data_result_result->num_rows > 0) {
    while($data_result_row_tester = $data_result_result->fetch_assoc()) {
        $data_results = $data_result_row_tester;
    	}
}
//results for Dial Parms
$dial_result_sql="SELECT * from Checklist.Dial_Parms where dial_chklist_id = $recent_chklst_id";

$dial_result_result = $conn->query($dial_result_sql);

$dial_result_row = null;

if ($dial_result_result->num_rows > 0) {
    while($dial_result_row_tester = $dial_result_result->fetch_assoc()) {
        $dial_results = $dial_result_row_tester;
    	}
}

//results for Jobwatch
$jobwatch_result_sql="SELECT * from Checklist.Jobwatch where jobwatch_id = $recent_chklst_id";

$jobwatch_result_result = $conn->query($jobwatch_result_sql);

$jobwatch_result_row = null;

if ($jobwatch_result_result->num_rows > 0) {
    while($jobwatch_result_row_tester = $jobwatch_result_result->fetch_assoc()) {
        $jobwatch_results = $jobwatch_result_row_tester;
    	}
}

//results for Portal Parms
$portal_result_sql="SELECT * from Checklist.Portal_Parms where portal_id = $recent_chklst_id";

$portal_result_result = $conn->query($portal_result_sql);

$portal_result_row = null;

if ($portal_result_result->num_rows > 0) {
    while($portal_result_row_tester = $portal_result_result->fetch_assoc()) {
        $portal_results = $portal_result_row_tester;
    	}
}

//results for System Parms
$system_result_sql="SELECT * from Checklist.System_Parms where system_id = $recent_chklst_id";

$system_result_result = $conn->query($system_result_sql);

$system_result_row = null;

if ($system_result_result->num_rows > 0) {
    while($system_result_row_tester = $system_result_result->fetch_assoc()) {
        $system_results = $system_result_row_tester;
    	}
}
$results=array_merge($data_results, $dial_results, $jobwatch_results, $portal_results, $system_results);

?>