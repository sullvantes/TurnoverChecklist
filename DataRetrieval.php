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
<input type="number" name="FailedExtracts"> &nbsp &nbsp&nbsp&nbsp&nbsp Names of Extracts <input type="text" name="FailedExtractNames">
<br><br>
<h5><u>Number of Sales & Labor Files to be reposted:</u></h5><br>
<input type="number" name="SalesFiles" value = 2> &nbsp&nbsp&nbsp&nbsp&nbsp Clients <input type="text" name="SalesFilesClients" value = "Kellwood and Nike Singapore">
<br><br>
</div>


<div id = "extractSalesPost">
Sales Files and Failed Extracts have been reloaded/rerun &nbsp&nbsp&nbsp&nbsp&nbsp 
<input type="radio" name="SalesExtractBool" value="TRUE" checked>Yes
<input type="radio" name="SalesExtractBool" value="FALSE">No
<br><br>
Notes for Extract/Sales failures:
<br>
<textarea name="NoteForSalesExtract" cols="50" rows="5"></textarea>
<br><br>
</div>

<div id = "eFT">
<u>Number of Verizon EFT Sites Missing</u> <br>
10:30AM : 
<input type="number" name="EFTA"> <br>
10:45AM : 
<input type="number" name="EFTB" value = 4> <br>
11:00AM : 
<input type="number" name="EFTC" value = 45> <br>
<br>
</div>

<div id = "actualAcqWindow">
<h5><u>Actual Acquisition Window:</u></h5>
<30 min: <input type="number" name="ActAcqW1"> 
>30 min: <input type="number" name="ActAcqW2" value = 1000>
>60 min: <input type="number" name="ActAcqW3" value = 100>
<br>
<br>
</div>


<div id = "malls">
<h5><u>Missed NRTI Sites:</u></h5>
<input type="number" name="NRTI" value = 1000>

<h5><u>Missing Malls:</u></h5>
<input type="number" name="Malls" value = 2>
<br><br>
</div>


<b>Harvest Org Problems:</b> <br>
 <a href="http://infpzweb02/cgi-bin/harvest_problems.pl">SIP Problems</a> 
<br>
 <a href="http://infpzweb02/cgi-bin/harvest_vpn_problems.pl">IP/VPN Problems</a> 
<br>
 <a href="http://infpzweb02/cgi-bin/harvest_SSC_problems.pl">SSC Problems</a> 
<br>

</div>
</div>




