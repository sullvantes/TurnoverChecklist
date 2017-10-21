<div id = "harvestTitleExpanded">
<h4><u>Harvest Baseline(-)</u></h4>
</div>
<div id = "harvestTitleCollapsed">
<h4><u>Harvest Baseline(+)</u></h4>
</div>
<div class = "container">
<div id = "harvestBody">

  					 <table style="width:50%">
						 <h5><u>Number of Harvest Connections</u></h5>
  <tr>
    <td><b>Instance </b></td>
    <td><b>NumIdle</b></td>
    <td><b>NumActive</b></td>
  </tr>
  <tr>
    <td>PLAPP04: </td>
    <td><input type="number" name="plapp04_NumIdle" value = "<?php echo $system_parms_row['plapp04_idle'];?>"></td>
    <td><input type="number" name="plapp04_NumActive" value = "<?php echo $system_parms_row['plapp04_active'];?>"></td>
  </tr>
  <tr>
    <td>PLAPP05:</td>
    <td><input type="number" name="plapp05_NumIdle"value = "<?php echo $system_parms_row['plapp05_idle'];?>"></td>
    <td><input type="number" name="plapp05_NumActive"value = "<?php echo $system_parms_row['plapp05_active'];?>"></td>
  </tr>
  <tr>
    <td>PLAPP06:</td>
    <td><input type="number" name="plapp06_NumIdle"value = "<?php echo $system_parms_row['plapp06_idle'];?>"></td>
    <td><input type="number" name="plapp06_NumActive"value = "<?php echo $system_parms_row['plapp06_active'];?>"></td>
  </tr>
  <tr>
    <td>PLAPP07:</td>
    <td><input type="number" name="plapp07_NumIdle"value = "<?php echo $system_parms_row['plapp07_idle'];?>"></td>
    <td><input type="number" name="plapp07_NumActive"value = "<?php echo $system_parms_row['plapp07_active'];?>"></td>
  </tr>
</table> 	


	<table style="width:40%">
	<h5><u>Harvest Memory Utilization:</u></h5>
   <tr>
    <td>PLAPP04: </td>
    <td><input type="percent" name="plapp04_Mem" value = 11>%</td>
   </tr>
   <tr>
    <td>PLAPP05: </td>
    <td><input type="percent" name="plapp05_Mem"value = 12>%</td>
   </tr>
   <tr>
    <td>PLAPP06: </td>
    <td><input type="percent" name="plapp06_Mem"value = 13>%</td>
   </tr>
   <tr>
    <td>PLAPP07: </td>
    <td><input type="percent" name="plapp07_Mem"value = 14>%</td>
   </tr>
   </table>

<table style="width:40%">
	<h5><u>Harvest CPU Utilization:</u></h5>
   <tr>
    <td>PLAPP04: </td>
    <td><input type="percent" name="plapp04_CPU"value = 21>%</td>
   </tr>
   <tr>
    <td>PLAPP05: </td>
    <td><input type="percent" name="plapp05_CPU"value = 22>%</td>
   </tr>
   <tr>
    <td>PLAPP06: </td>
    <td><input type="percent" name="plapp06_CPU"value = 23>%</td>
   </tr>
   <tr>
    <td>PLAPP07: </td>
    <td><input type="percent" name="plapp07_CPU"value = 24>%</td>
   </tr>
   </table>

<br>

</div>
</div>
