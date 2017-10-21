<div id = "dataAcqTitleExpanded">
<h4><u>Data Acquisition and Delivery (-)</u></h4>
</div>
<div id = "dataAcqTitleCollapsed">
<h4><u>Data Acquisition and Delivery (+)</u></h4>
</div>
<div class="container">
<div id = "dataAcqBody">
<div id = "extractSalesPre">
<h5><u>Number of Failed Extracts :</u></h5>
<input type="number" name="FailedExtracts" value="<?php echo $data_parms_row['failedextracts'];?>">
<br><br>
<h5><u>Number of Sales & Labor Files to be reposted:</u></h5><br>
<input type="number" name="SalesFiles" value = "<?php echo $data_parms_row['salesfiles'];?>">
<br><br>
</div>


<div id = "eFT">
<u>Number of Verizon EFT Sites Missing</u> <br>
10:30AM : 
<input type="number" name="EFTA" value = "<?php echo $data_parms_row['EFTA'];?>"> <br>
10:45AM : 
<input type="number" name="EFTB" value = "<?php echo $data_parms_row['EFTB'];?>"> <br>
11:00AM : 
<input type="number" name="EFTC" value = "<?php echo $data_parms_row['EFTC'];?>"> <br>
<br>
</div>

<div id = "actualAcqWindow">
<h5><u>Actual Acquisition Window:</u></h5>
<30 min: <input type="number" name="ActAcqW1" value = "<?php echo $data_parms_row['ActAcqW1'];?>"> 
>30 min: <input type="number" name="ActAcqW2" value = "<?php echo $data_parms_row['ActAcqW2'];?>">
>60 min: <input type="number" name="ActAcqW3" value = "<?php echo $data_parms_row['ActAcqW3'];?>">
<br>
<br>
</div>


<div id = "malls">
<h5><u>Missed NRTI Sites:</u></h5>
<input type="number" name="NRTI" value = "<?php echo $data_parms_row['NRTI'];?>">

<h5><u>Missing Malls:</u></h5>
<input type="number" name="Malls" value = "<?php echo $data_parms_row['Malls'];?>">
<br><br>
</div>

</div>
</div>




