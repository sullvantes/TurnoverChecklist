<?php
//baselines for DataParms
$data_baseline_sql="SELECT * from Checklist.Data_Parms where data_id = $BASELINE_ID";

$data_baseline_result = $conn->query($data_baseline_sql);

$data_baseline_row = null;

if ($data_baseline_result->num_rows > 0) {
    while($data_baseline_row_tester = $data_baseline_result->fetch_assoc()) {
        $data_baselines = $data_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//baselines for Dial Parms
$dial_baseline_sql="SELECT * from Checklist.Dial_Parms where dial_chklist_id = $BASELINE_ID";

$dial_baseline_result = $conn->query($dial_baseline_sql);

$dial_baseline_row = null;

if ($dial_baseline_result->num_rows > 0) {
    while($dial_baseline_row_tester = $dial_baseline_result->fetch_assoc()) {
        $dial_baselines = $dial_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//baselines for Jobwatch
$jobwatch_baseline_sql="SELECT * from Checklist.Jobwatch where jobwatch_id = $BASELINE_ID";

$jobwatch_baseline_result = $conn->query($jobwatch_baseline_sql);

$jobwatch_baseline_row = null;

if ($jobwatch_baseline_result->num_rows > 0) {
    while($jobwatch_baseline_row_tester = $jobwatch_baseline_result->fetch_assoc()) {
        $jobwatch_baselines = $jobwatch_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//baselines for Portal Parms
$portal_baseline_sql="SELECT eu1_q,eu2_q from Checklist.Portal_Parms where portal_id = $BASELINE_ID";

$portal_baseline_result = $conn->query($portal_baseline_sql);

$portal_baseline_row = null;

if ($portal_baseline_result->num_rows > 0) {
    while($portal_baseline_row_tester = $portal_baseline_result->fetch_assoc()) {
        $portal_baselines = $portal_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//baselines for System Parms
$system_baseline_sql="SELECT * from Checklist.System_Parms where system_id = $BASELINE_ID";

$system_baseline_result = $conn->query($system_baseline_sql);

$system_baseline_row = null;

if ($system_baseline_result->num_rows > 0) {
    while($system_baseline_row_tester = $system_baseline_result->fetch_assoc()) {
        $system_baselines = $system_baseline_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}






$baselines=array_merge($data_baselines, $dial_baselines, $jobwatch_baselines, $portal_baselines, $system_baselines);

//print_r($baselines);
?>