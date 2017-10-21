<h3>Notable Failures</h3>
<?php 

if(empty($_POST['Notable_Failures'])){
	echo "There are no notable failures to report.<br>";
	}
	else {
	echo "<font color = 'red'><h4><b>".$_POST['Notable_Failures']."</b></h4></font>";
	}
