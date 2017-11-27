<?php
//FUNCTIONS FOR REPORTING DATA

function TrueFalse($input){
if($input == "TRUE")
		echo 1;
	else
		echo 0;
}


function Available ($input,$name,$view_chk){
if(!$view_chk){
    if($input == "TRUE" || $input == 1){
		echo "<div class='row'><div class='col-md-4'>$name is available.</div></div><br>";
	}
	elseif($input == "FALSE" || $input == 0){
		echo "<div class='row'><div class='col-md-4'><font color = 'red'>$name is unavailable.</font></div><div class='col-md-8'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage.</div></div></div>";
    }
    else{
        echo "<div class='row'><div class='col-md-4'>There is no availability entered for $name.</div><div class='col-md-8'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Is $name available? Please hit 'Back' to add your entry.</div></div></div>";
    }
}
else{
    if($input == "TRUE" || $input == 1){
		echo "<div class='row'><div class='col-md-4'>$name was available.</div></div><br>";
	}
	elseif($input == "FALSE" || $input == 0){
		echo "<div class='row'><div class='col-md-4'><font color = 'red'>$name was unavailable.</font></div><div class='col-md-8'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage.</div></div></div>";
    }
    else{
        echo "<div class='row'><div class='col-md-4'>There was no availability entered for $name.</div><div class='col-md-8'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Is $name available? Please hit 'Back' to add your entry.</div></div></div>";
    }
}
}

function UpDown ($input,$name,$view_chk){
if(!$view_chk){
    if($input == "TRUE" || $input == 1){
		echo "<div class='row'><div class='col-md-4'>$name is up.</div></div></br>";
	}
	elseif($input == "FALSE" || $input ==0){
        echo "<div class='row'><div class='col-md-4'><font color = 'red'>$name is down.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage.</div></div></div>";
    }
    else{
        echo "<div class='row'><div class='col-md-4'>There was no availability entered for $name.</div><div class='col-md-8'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Is $name available? Please hit 'Back' to add your entry.</div></div></div>";
    }
}
else{
    if($input == "TRUE" || $input == 1){
		echo "<div class='row'><div class='col-md-4'>$name was up.</div></div></br>";
	}
	elseif($input == "FALSE" || $input ==0){
        echo "<div class='row'><div class='col-md-4'><font color = 'red'>$name was down.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage.</div></div></div>";
    }
    else{
        echo "<div class='row'><div class='col-md-4'>There was no availability entered for $name.</div><div class='col-md-8'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Is $name available? Please hit 'Back' to add your entry.</div></div></div>";
    }
}
}
 
function AvailString($String, $input)
{
if($input == 'FALSE')
{
echo "<font color='red'>$String</font>";
}
}
 
function QueueLevel($Value, $Thresh, $Name, $view_chk)
{
if($view_chk){
    if($Value>=$Thresh){
        echo "<div class='col-md-3'><font color='red'>There were ".$Value." files waiting to be processed on $Name.</font></div><div class='col-md-3'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$Name." queue. </div></div>";
    }
    elseif(empty($Value))
        {
        echo "<div class='col-md-3'>There was no entry of files waiting to be processed on $Name.</div><div class='col-md-3'></div>";
        }
        else
            {
            echo "<div class='col-md-3'>There were ".$Value." files waiting to be processed  on $Name.</div><div class='col-md-3'></div>";
            }
}    
else{
    if($Value>=$Thresh){
        echo "<div class='col-md-3'><font color='red'>There are currently ".$Value." files waiting to be processed on $Name.</font></div><div class='col-md-3'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the ".$Name." queue. </div></div>";
    }
    elseif(empty($Value))
        {
        echo "<div class='col-md-3'>There is no entry of files waiting to be processed on $Name.</div><div class='col-md-3'><div class='alert alert-warning' role='alert'> <strong>Alert! </strong>Please hit 'Back' to add your entry.</div></div>";
        }
        else
            {
            echo "<div class='col-md-3'>There are currently ".$Value." files waiting to be processed  on $Name. This is okay.</div><div class='col-md-3'></div>";
            }
}
}

function ThreshEval($Value, $Thresh)
{
if ($Value > $Thresh){
    return True;
}
return False;
}
    
function ThreshNum($Value, $Thresh)
{
if(!empty($Value))
{	
	if($Value>$Thresh)
		echo "<font color='red'>$Value</font>";
	else
		echo $Value;
}
elseif($Value == '0')
	{
	echo $Value;
	}
else
	{
	echo "<strong>???</strong>";
	}	
}

//BELOW is for Thresholds that need to be alerted when the are BELOW a certain threshold rather than above.
function BelowThreshNum($Value, $Thresh)
{
if(!empty($Value))
{	
	if($Value<$Thresh)
		echo "<font color='red'>$Value</font>";
	else
		echo $Value;
}
elseif($Value == '0')
	{
	echo $Value;
	}
else
	{
	echo "<strong>???</strong>";
	}	
}


//BELOW is for Thresholds that need to be alerted when the are BELOW a certain threshold rather than above.
function BelowThreshString($String, $Value, $Thresh)
{
if($Value<$Thresh && $value !='0')
	echo "<br> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> $String</div>";
}

function ThreshString($String, $Value, $Thresh)
{
if($Value>$Thresh)
	echo "<div class='alert alert-danger' role='alert'><strong>Action Required!</strong> $String</div>";
else
	echo "<div class='col-md-4'></div>";
}

function ThreshDecide($inputBAD,$inputOKAY,$value,$threshold)
{
if($value > $threshold)
	{
		echo "<font color = 'red'>$inputBAD</font>";
	}
	else
	{
		echo $inputOKAY;
	}
}

function DialHandle($dialvalue, $country,$thresh,$dialname, $view_chk)
{
echo "<div>";
if (!$view_chk){
    if (empty($dialvalue)&&$dialvalue != '0')
        {
        echo "<div class='col-md-6'>There is no entry for dial success rate in $country.</div><div class='col-md-6'><div class='alert alert-warning' role='alert'> <strong>Alert!</strong>. Are you sure you dont want to enter a dial success rate for $country? Please hit 'Back' to adjust your entry."."</div></div></div>";
        }
    else
        {
        if($dialvalue<$thresh){
            echo "<div class='col-md-6'><font color='red'>$country success rate is $dialvalue%.This is below the threshold of $thresh%.</font></div>";
            echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for $country. $dialvalue% is less than the threshold of $thresh%.</div></div></div>";
            }
        elseif($dialvalue>100){
            echo "<div class='col-md-6'>The entry for dial success rate for $country is above 100%.</div><div class='col-md-6'><div class='alert alert-warning' role='alert'> <strong>Alert!</strong>. Please enter a valid dial success rate for $country? Please hit 'Back' to adjust your entry."."</div></div></div>";    }
        else{
            echo "<div class='col-md-12'>$country success rate is $dialvalue%.<br><br><br> </div></div>";
            }
        }
}
else{
    if (empty($dialvalue)&&$dialvalue != '0')
        {
        echo "<div class='col-md-6'>There was no entry for dial success rate in $country.</div><div class='col-md-6'></div></div>";
        }
    else
        {
        if($dialvalue<$thresh){
            echo "<div class='col-md-6'><font color='red'>$country success rate was $dialvalue%.This is below the threshold of $thresh%.</font></div>";
            echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor dial success rate for $country. $dialvalue% is less than the threshold of $thresh%.</div></div></div>";
            }
        elseif($dialvalue>100){
            echo "<div class='col-md-6'>The entry for dial success rate for $country was above 100%.</div><div class='col-md-6'></div></div>";    }
        else{
            echo "<div class='col-md-12'>$country success rate is $dialvalue%.<br><br><br> </div></div>";
            }
        }

    
}

}


function OvernightHandle($acqValue, $acqThresh, $acqString, $view_chk){
if(!$view_chk){
    if(empty($acqValue)&&$acqValue != '0'){
        echo "<div class = 'row'><div class='col-md-6'>There is no entry for overnight success rate for ". $acqString. ".</div><div class='col-md-6'><div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter an overnight success rate for ". $acqString. "? 		Please hit 'Back' to adjust your entry."."</div></div></div>";
    }
    else{
        if($acqValue<$acqThresh){
            echo "<div class = 'row'><div class='col-md-6'>$acqString success rate is <font color='red'>$acqValue%. </font></div><div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor acquisition rate for $acqString. $acqValue% is less than the threshold of $acqThresh%.</div></div></div>";
            }	
        else{
            echo "<div class = 'row'><div class='col-md-12'>$acqString success rate is $acqValue%.</div> </div><br><br>";
            }
    }
}
else{
    if(empty($acqValue)&&$acqValue != '0'){
        echo "<div class = 'row'><div class='col-md-6'>There was no entry for overnight success rate for ". $acqString. ".</div><div class='col-md-6'></div></div>";
        }
    else{
        if($acqValue<$acqThresh){
            echo "<div class = 'row'><div class='col-md-6'>$acqString success rate was <font color='red'>$acqValue%. </font></div><div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the poor acquisition rate for $acqString. $acqValue% is less than the threshold of $acqThresh%.</div></div></div>";
        }	
        else{
            echo "<div class = 'row'><div class='col-md-12'>$acqString success rate was $acqValue%.</div> </div><br><br>";
        }
        }
}
}

function JobwatchHandle($param,$string,$thresh,$result, $view_chk){
$Value = $result[$param];
if(!empty($Value))
{	
	if($Value>$thresh)
		echo "<div class = 'row'><div class='col-md-6'> <font color='red'> There are $Value $string which is higher than the threshold of $thresh.</font></div><div class='col-md-6'> <div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please investigate why $string are above threshold.</div></div></div>";
	else
		echo "<div class = 'row'><div class='col-md-6'>There are $Value $string. This is within the threshold.</div></div></br>";
}

else
	{
	echo "<div class = 'row'><div class='col-md-6'><strong>No value was entered for $string.</strong></div><div class='col-md-6'>";
	WantsValue($result[$param], $string, $view_chk);
	echo "</div></div>";
	}	
}

//function DialBoolHandle($dialvalue,$dialbool){
//if($dialbool!='on'){
//	echo $dialvalue;
//	}
//}



function WantsValue($input,$name,$view_chk){
	if(empty($input)&&$input!='0'&&!$view_chk) {
        echo "<div class='alert alert-warning' role='alert'> <strong>Alert!</strong>"." Are you sure you dont want to enter a value for ". $name. "? Please hit 'Back' to adjust your entry."."</div>";
        }
}

function Plural($input){	
	if($input > 1 || $input == 0 || empty($input))
		echo "s";
}

function Okay($input,$name)
{
echo "<div class='row'><div class='col-md-4'>";
if($input == "TRUE" || $input == 1)
	{
	echo "$name is performing well.</div></div>";
	}
		else
		{
		echo "<font color = 'red'>$name is not performing well.</font></div><div class='col-md-4'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please look into the $name outage. </div></div></div><br>    ";
		}
}
function ModemSuccessRate($inputbool,$inputpercent) {
     if($inputbool == false){
	$inputpercent = null;
}
	return($inputpercent);
}
?>