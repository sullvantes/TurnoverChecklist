<div id = "overnightTitle">
<h4><u> Overnight Processing</u></h4>
</div>

<div class="container">
<div id = "overnightBody">

<?php

$overnight = explode(",",$results['overnightOrgImp']);
$connectiontypes = array('Dial','European Dial','IP','SIP','European SIP','SIPH','SSC');
$overnight_value_param = array('DialAcqValue','DialEUAcqValue','IPAcqValue','SIPAcqValue','SIPEUAcqValue','SIPHAcqValue','SSCAcqValue');
    
for($x=0; $x<=count($overnight_value_param)-1; $x++)
{
	$acqValue = $results[$overnight_value_param[$x]];
    $acqThresh = $baselines[$overnight_value_param[$x]];
    $acqClientParam=rtrim($overnight_value_param[$x],"Value")."Client";
	$acqClient = $results[$acqClientParam];
    $acqString = $connectiontypes[$x]."(".$acqClient.")";
	OvernightHandle($acqValue,$acqThresh,$acqString,$view_chk);
}

?>
</div>
</div>
