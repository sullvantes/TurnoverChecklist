<div id = "overnightTitleExpanded">
<h4><u> Overnight Processing (-)</u></h4>
</div>
<div id = "overnightTitleCollapsed">
<h4><u> Overnight Processing (+)</u></h4>
</div>

<div class="container">
<div id = "overnightBody">

<?php

$overnight = explode(",",$_POST['overnightOrgImp']);
$connectionTypes = explode(",",$_POST['overnightTypeNameImp']);
$dbvalue = explode(",",$_POST['overnightTypeIDImp']);

for($x=0; $x<=count($overnight)-1; $x++)
{
	$acqValue = $_POST[$dbvalue[$x]];
	$acqThresh = $data_parms_row[$dbvalue[$x]];
	$acqClient = $overnight[$x];
	$acqConnType = $connectionTypes[$x];
	$acqString = $acqClient."(".$acqConnType.")";
	OvernightHandle($acqValue,$acqThresh,$acqString);
}

?>
</div>
</div>
