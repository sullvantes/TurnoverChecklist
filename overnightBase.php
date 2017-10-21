<?php
$sql5 = "SELECT DialAcqClient,DialEUAcqClient,IPAcqClient,SIPAcqClient,SIPEUAcqClient,SIPHAcqClient,SSCAcqClient FROM Data_Parms WHERE id = $BASELINE_ID";
$result = $conn->query($sql5);


if ($result->num_rows > 0) {
    // output data of each row
    while($data_parms_row_testerX = $result->fetch_assoc()) {
        $overnightclient = $data_parms_row_testerX;
    	}
} else {
    echo "0 results for client<br><br>";
}

$sql6 = "SELECT DialAcqValue,DialEUAcqValue,IPAcqValue,SIPAcqValue,SIPEUAcqValue,SIPHAcqValue,SSCAcqValue FROM Data_Parms WHERE id = $BASELINE_ID";
$result = $conn->query($sql6);

if ($result->num_rows > 0) {
    // output data of each row
    while($data_parms_row_tester2 = $result->fetch_assoc()) {
        $overnightvalueX = $data_parms_row_tester2;
    	}
} else {
    echo "0 results for value<br><br>";
}

$connectiontypes = array('Dial','European Dial','IP','SIP','European SIP','SIPH','SSC');
$dbvalue = array('DialAcqValue','DialEUAcqValue','IPAcqValue','SIPAcqValue','SIPEUAcqValue','SIPHAcqValue','SSCAcqValue');
$dbclient = array('DialAcqClient','DialEUAcqClient','IPAcqClient','SIPAcqClient','SIPEUAcqClient','SIPHAcqClient','SSCAcqClient');
array_multisort($overnightclient, $overnightvalueX, $connectiontypes,$dbvalue,$dbclient);



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

foreach ($overnightclient as $value) {
	$z = $dbvalue[$x];
	$w = $dbclient[$x];	
	echo $overnightclient[$x]."<input type='text' name= $dbclient[$x] value = $overnightclient[$w]>($connectiontypes[$x]): <input type='percent' name= $dbvalue[$x] value = $overnightvalueX[$z]>  %<br>";
	
	//echo $y." value = ".$connectiontypes[$x]."<br>";
	//echo "<input type='hidden' name='ON_Connection'".$y." value = ".$connectiontypes[$x].">";
	//echo "<input type='hidden' name='ON_Client'".$y." value = ".$overnight[$x].">";
	//echo "<input type='hidden' name='ON_DBConnection'".$y." value = ".$dbvalue[$x].">";
	$x++;
	//$y++;
		
}
echo "overnightclient";
print_r($overnightclient);
echo "<br>connectiontypes";
print_r($connectiontypes);
echo "<br>dbvalue";
print_r($dbvalue);
echo "<br>overnightvalueX";
print_r($overnightvalueX);
echo "<br>dbclient";
print_r($dbclient);
echo "<br>";

$overnightOrgClImp = implode(",",$overnightclient);
$overnightTypeNameImp = implode(",",$connectiontypes);
$overnightTypeIDImp = implode(",",$dbvalue);
$overnightOrgValImp = implode(",",$overnightvalueX);
$overnightClientImp = implode(",",$dbclient);

echo "<input type='hidden' name='overnightOrgImp' value = '$overnightOrgImp'>";
echo "<input type='hidden' name='overnightTypeNameImp' value = '$overnightTypeNameImp'>";
echo "<input type='hidden' name='overnightTypeIDImp' value = '$overnightTypeIDImp'>";
echo "<input type='hidden' name='overnightClientImp' value = '$overnightClientImp'>";

//echo $overnightTypeNameImp."<br>";
//echo $overnightTypeIDImp."<br>";*/
?>





</div>
</div>
</div>










