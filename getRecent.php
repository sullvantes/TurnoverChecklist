<?php
//recents for DataParms
$data_recent_sql="SELECT * from Checklist.Data_Parms where data_id = $recent_chklst_id";

$data_recent_result = $conn->query($data_recent_sql);

$data_recent_row = null;

if ($data_recent_result->num_rows > 0) {
    while($data_recent_row_tester = $data_recent_result->fetch_assoc()) {
        $data_recents = $data_recent_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//recents for Dial Parms
$dial_recent_sql="SELECT * from Checklist.Dial_Parms where dial_chklist_id = $recent_chklst_id";

$dial_recent_result = $conn->query($dial_recent_sql);

$dial_recent_row = null;

if ($dial_recent_result->num_rows > 0) {
    while($dial_recent_row_tester = $dial_recent_result->fetch_assoc()) {
        $dial_recents = $dial_recent_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//recents for Jobwatch
$jobwatch_recent_sql="SELECT * from Checklist.Jobwatch where jobwatch_id = $recent_chklst_id";

$jobwatch_recent_result = $conn->query($jobwatch_recent_sql);

$jobwatch_recent_row = null;

if ($jobwatch_recent_result->num_rows > 0) {
    while($jobwatch_recent_row_tester = $jobwatch_recent_result->fetch_assoc()) {
        $jobwatch_recents = $jobwatch_recent_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//recents for Portal Parms
$portal_recent_sql="SELECT eu1_q,eu2_q from Checklist.Portal_Parms where portal_id = $recent_chklst_id";

$portal_recent_result = $conn->query($portal_recent_sql);

$portal_recent_row = null;

if ($portal_recent_result->num_rows > 0) {
    while($portal_recent_row_tester = $portal_recent_result->fetch_assoc()) {
        $portal_recents = $portal_recent_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}

//recents for System Parms
$system_recent_sql="SELECT * from Checklist.System_Parms where system_id = $recent_chklst_id";

$system_recent_result = $conn->query($system_recent_sql);

$system_recent_row = null;

if ($system_recent_result->num_rows > 0) {
    while($system_recent_row_tester = $system_recent_result->fetch_assoc()) {
        $system_recents = $system_recent_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}






$recents=array_merge($data_recents, $dial_recents, $jobwatch_recents, $portal_recents, $system_recents);

//print_r($recents);
?>