<?php
include("makeconnection.php");
$sql1 = "SELECT DialAcqClient,DialEUAcqClient,IPAcqClient,SIPAcqClient,SIPEUAcqClient,SIPHAcqClient,SSCAcqClient FROM Data_Parms WHERE id = 1001";
$result1 = $conn->query($sql1);
$data_parms_row = null;

if ($result1->num_rows > 0) {
    // output data of each row
    while($data_parms_row_tester = $result1->fetch_assoc()) {
        $overnight = $data_parms_row_tester;
    	}
} else {
    echo "0 results<br><br>";
}
//$overnight=$data_parms_row;
$connectiontypes = array('Dial','European Dial','IP','SIP','European SIP','SIPH','SSC');
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
	//echo $y." value = ".$connectiontypes[$x]."<br>";
	//echo "<input type='hidden' name='ON_Connection'".$y." value = ".$connectiontypes[$x].">";
	//echo "<input type='hidden' name='ON_Client'".$y." value = ".$overnight[$x].">";
	//echo "<input type='hidden' name='ON_DBConnection'".$y." value = ".$dbvalue[$x].">";
	$x++;
	//$y++;
		
}

/*for($x=0;$x<=6;$x++)
{
echo $overnight[$y]."(".$connectiontypes[$x]."): ";
echo "<input type='percent' name= ".$dbvalue[$x].">  % &nbsp&nbsp&nbsp&nbsp&nbsp <input name='AcqClient'".$y."_BOOL type='checkbox'>No Value to Submit<br>";
//echo $y." value = ".$connectiontypes[$x]."<br>";

$y++;
}*/

$overnightOrgImp = implode(",",$overnight);
$overnightTypeNameImp = implode(",",$connectiontypes);
$overnightTypeIDImp = implode(",",$dbvalue);


echo "<input type='hidden' name='overnightOrgImp' value = '$overnightOrgImp'>";
echo "<input type='hidden' name='overnightTypeNameImp' value = '$overnightTypeNameImp'>";
echo "<input type='hidden' name='overnightTypeIDImp' value = '$overnightTypeIDImp'>";

//echo $overnightTypeNameImp."<br>";
//echo $overnightTypeIDImp."<br>";
?>





</div>
</div>
</div>










