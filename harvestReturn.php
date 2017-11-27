<div id = "harvestTitleExpanded">
<h4><u>Harvest Nodes</u></h4>
</div>
<div class = "container">
<div id = "harvestBody">
<?php 
function HarvestHealth($AppName, $AppIdle, $AppActive, $AppMem, $AppCPU, $ThreshIdle, $ThreshActive, $ThreshMem, $ThreshCPU)
{
$AppConns = $AppIdle + $AppActive;
$ThreshConns = $ThreshIdle + $ThreshActive;
$AppName = strtoupper($AppName);
echo "<h5><b>$AppName</b></h5>";
echo "<div class = 'container'>";

//Connections
if((empty($AppIdle)&&$AppIdle != '0')||(empty($AppActive)&&$AppActive != '0'))
	{
	echo "<div class = 'row'><div class='col-md-6'>Connections were not entered for ".$AppName.".</div>";
	echo "<div class='col-md-6'>";
	WantsValue($AppIdle,"$AppName Idle Processes",$view_chk);
	WantsValue($AppActive,"$AppName Active Processes",$view_chk);
	echo "</div></div>";
	}
		elseif($AppConns>$ThreshConns)
		{
		echo "<div class = 'row'><div class='col-md-6'><font color = 'red'>$AppName has ".$AppConns." connections( > threshold of ".$ThreshConns." total connections)</font></div><div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Connections are high on this host. Please look to restart $AppName.</div></div></div>";
		}
			else 
			{
			echo "<div class = 'row'><div class='col-md-12'>$AppName has ".$AppConns." connections. (< = threshold of ".$ThreshConns." total connections). This is within threshold.<br></div></div><br>";
			}
    

//Memory
if(empty($AppMem)&&$AppMem != '0')
	{
	echo "<div class = 'row'><div class='col-md-6'>No value was entered for memory on $AppName</div>";
	echo "<div class='col-md-6'>";
	WantsValue($AppMem,"$AppName Memory",$view_chk);
	echo "</div></div>";
	}
		elseif($AppMem>$ThreshMem)
		{
		echo "<div class = 'row'><div class='col-md-6'><font color = 'red'>$AppName has high memory usage at $AppMem%.<br></font></div>";
		echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please monitor memory on $AppName closely.</div></div></div>";}
			else
			{
			echo "<div class = 'row'><div class='col-md-12'>$AppName is using $AppMem% of memory. This is within threshold.</div></div><br>";
			}	


if(empty($AppCPU)&&$AppCPU != '0')
	{
	echo "<div class = 'row'><div class='col-md-6'>No value was entered for CPU on $AppName.</div>";
	echo "<div class='col-md-6'>";
	WantsValue($AppCPU,"$AppName CPU",$view_chk);
	echo "</div></div>";
	}
elseif($AppCPU >$ThreshCPU){
    echo "<div class = 'row'><div class='col-md-6'><font color = 'red'>$AppName has high CPU usage at $AppCPU%.<br></font></div>";
    echo "<div class='col-md-6'><div class='alert alert-danger' role='alert'><strong>Action Required!</strong> Please monitor CPU on $AppName closely.</div></div></div>";
    }
else{
    echo "<div class = 'row'><div class='col-md-12'>$AppName is using $AppCPU% of CPU. This is within threshold.</div></div>";
    }
echo "</div>";
}

$harvest_hosts=array("plapp04","plapp05","plapp06","plapp07");
foreach($harvest_hosts as $AppName){
$AppIdle = $results[$AppName."_idle"];
    
    $AppActive = $results[$AppName."_active"];
    $AppMem = $results[$AppName."_mem"];
    $AppCPU = $results[$AppName."_cpu"];
    $ThreshIdle=$baselines[$AppName."_idle"];
    $ThreshActive=$baselines[$AppName."_active"];
    $ThreshMem=$baselines[$AppName."_mem"];
    $ThreshCPU=$baselines[$AppName."_cpu"];
    HarvestHealth($AppName, $AppIdle, $AppActive, $AppMem, $AppCPU, $ThreshIdle, $ThreshActive, $ThreshMem, $ThreshCPU);
    
}     

?>
    </div></div>


