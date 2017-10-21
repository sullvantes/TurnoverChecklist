<div id = "notableFailuresTitle">
<h4><u>Notable Failures </u></h4>
</div>
<div class = "container">
<div id = "notableFailuresBody">
<?php 

if(empty($RecentDataParms[Notable_Failures])){
	echo "There are no notable failures to report.<br>";
	}
	else {
	echo "<font color = 'red'><h4><b>".$RecentDataParms[Notable_Failures]."</b></h4></font>";
	}
?>
</div></div>
