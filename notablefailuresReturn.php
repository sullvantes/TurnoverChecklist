<h4>Notable Failures</h4>
<div class="container">
    <?php 

if(empty($results['Notable_Failures'])){
	echo "There are no notable failures to report.<br>";
	}
	else {
	echo "<font color = 'red'><h4><b>".$results['Notable_Failures']."</b></h4></font>";
	}
?>
</div>  
