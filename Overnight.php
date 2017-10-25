<?php
include("makeconnection.php");
$sql1 = "SELECT DialAcqClient,DialEUAcqClient,IPAcqClient,SIPAcqClient,SIPEUAcqClient,SIPHAcqClient,SSCAcqClient FROM Checklist.Data_Parms WHERE id = 1001";
$result1 = $conn->query($sql1);
$data_parms_row = null;

if ($result1->num_rows > 0) {
    // overnight is client used for this connectivity type for each row
    while($data_parms_row_tester = $result1->fetch_assoc()) {
        $overnight = $data_parms_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}
//$overnight=$data_parms_row;

//Name for Connection Type
$connectiontypes = array('Dial','European Dial','IP','SIP','European SIP','SIPH','SSC');
//DB name for Connection Type
$dbvalue = array('DialAcqValue','DialEUAcqValue','IPAcqValue','SIPAcqValue','SIPEUAcqValue','SIPHAcqValue','SSCAcqValue');
array_multisort($overnight, $connectiontypes,$dbvalue);

$conn->close();
?>

<div id = "overnightTitleExpanded">
<h4><u> Overnight Processing (-)</u></h4>
</div>
<div id = "overnightTitleCollapsed">
<h4><u> Overnight Processing (+)</u></h4>
</div>

<div class="container">
<div id = "overnightBody">


<?php 
$y=1;
$x=0;
$testarray = $overnight;

foreach ($overnight as $value) {
	echo "$value($connectiontypes[$x]): <input type='percent' name= $dbvalue[$x]>  %<br>";
	$x++;	
}

//$overnightOrgImp = implode(",",$overnight);
//$overnightTypeNameImp = implode(",",$connectiontypes);
//$overnightTypeIDImp = implode(",",$dbvalue);
//
//
//echo "<input type='hidden' name='overnightOrgImp' value = '$overnightOrgImp'>";
//echo "<input type='hidden' name='overnightTypeNameImp' value = '$overnightTypeNameImp'>";
//echo "<input type='hidden' name='overnightTypeIDImp' value = '$overnightTypeIDImp'>";
//
//echo $overnightTypeNameImp."<br>";
//echo $overnightTypeIDImp."<br>";
?>





</div>
</div>
</div>










