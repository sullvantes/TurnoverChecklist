<?php

$overnight_types=array("DialAcqClient","DialEUAcqClient","IPAcqClient","SIPAcqClient","SIPEUAcqClient","SIPHAcqClient","SSCAcqClient");
$overnight_types_string = implode (", ", $overnight_types);

if ($_GET['pageChecklistID']){
    $baseline_id= (int)$_GET['pageChecklistID']+1000;
    }
else{
    $baseline_id= 1001;
}
$overnight_types_sql = "SELECT $overnight_types_string FROM Checklist.Data_Parms WHERE data_id = $baseline_id";
$overnight_clients_result = $conn->query($overnight_types_sql);
$overnight_clients_row = null;
if ($overnight_clients_result->num_rows > 0) {
    // overnight is client used for this connectivity type for each row
    while($overnight_clients_row_tester = $overnight_clients_result->fetch_assoc()) {
        $overnight_clients = $overnight_clients_row_tester;
    }
} else {
    echo "0 results for client names<br><br>";
}

//Name for Connection Type
$connectiontypes = array('Dial','European Dial','IP','SIP','European SIP','SIPH','SSC');
//DB name for Connection Type
$overnight_value_param = array('DialAcqValue','DialEUAcqValue','IPAcqValue','SIPAcqValue','SIPEUAcqValue','SIPHAcqValue','SSCAcqValue');

$overnight_value_param_string=implode(", ",$overnight_value_param);

$overnight_value_param_sql="SELECT $overnight_value_param_string FROM Checklist.Data_Parms where data_id = $baseline_id";

$overnight_baseline_result=$conn->query($overnight_value_param_sql);

$overnight_baseline_row = null;
if ($overnight_baseline_result->num_rows > 0) {
    // overnight is client used for this connectivity type for each row
    while($overnight_baseline_row_tester = $overnight_baseline_result->fetch_assoc()) {
        $overnight_baselines = $overnight_baseline_row_tester;
    	}
} else {
    echo "0 results for baseline<br><br>";
}

?>

<div id = "overnightTitleExpanded">
<h4><u> Overnight Processing</u></h4>
</div>


<div class="container">
<div id = "overnightBody">


<?php 
    
for($index=0; $index<7; $index++){
    $this_connection_type = $connectiontypes[$index];
    $this_attribute = $overnight_value_param[$index];
    $this_attribute_client=rtrim($this_attribute,"Value")."Client";
    $this_baseline = $overnight_baselines[$this_attribute];
    $this_client_name = $overnight_clients[$overnight_types[$index]];
    if ($baseline_form==FALSE){
        echo "$this_connection_type($this_client_name): <input type='percent' name=$this_attribute placeholder=\"$this_baseline\">  %<br>";
        echo "<input type =\"hidden\" name=\"baselines[$this_attribute]\"]\" value = $this_baseline>";
        echo "<input type =\"hidden\" name=\"$this_attribute_client\" value = \"$this_client_name\">";
    }
    else{
        $this_client_type=rtrim($this_attribute,"Value")."Client";
        echo "$this_connection_type <br> &nbsp&nbsp&nbsp Client Name: <input type='text' name=\"$this_client_type\" placeholder=\"$this_client_name\"><br>&nbsp&nbsp&nbsp Baseline Value: <input type='percent' name=$overnight_value_param[$index] placeholder=\"$this_baseline\">  %<br>";    
    }
        }
    
?>
    
</div>
</div>










