<form action="actionChecklistAll.php?pageChecklistID=<?php echo $_GET['pageChecklistID'] ?>" method = post>
<input type=hidden name="FailedExtracts" value = "<?php echo $_POST['FailedExtracts'] ?>"> 
<input type=hidden name="FailedExtractNames" value = "<?php echo $_POST['FailedExtractNames'] ?>">
<input type=hidden name="SalesFiles" value = "<?php echo $_POST['SalesFiles'] ?>"> 
<input type=hidden name="SalesFilesClients" value = "<?php echo $_POST['SalesFilesClients'] ?>">
<input type=hidden name="EFTA" value = "<?php echo $_POST['EFTA'] ?>">
<input type=hidden name="EFTB" value = "<?php echo $_POST['EFTB'] ?>">
<input type=hidden name="EFTC" value = "<?php echo $_POST['EFTC'] ?>">
<input type=hidden name="DIAL_BH" value = "<?php echo $_POST['DIAL_BH'] ?>">
<input type=hidden name="DIAL_BR" value = "<?php echo $_POST['DIAL_BR'] ?>">
<input type=hidden name="DIAL_CN" value = "<?php echo $_POST['DIAL_CN'] ?>">
<input type=hidden name="DIAL_FR" value = "<?php echo $_POST['DIAL_FR'] ?>">
<input type=hidden name="DIAL_DE" value = "<?php echo $_POST['DIAL_DE'] ?>">
<input type=hidden name="DIAL_HK" value = "<?php echo $_POST['DIAL_HK'] ?>">
<input type=hidden name="DIAL_ID" value = "<?php echo $_POST['DIAL_ID'] ?>">
<input type=hidden name="DIAL_IE" value = "<?php echo $_POST['DIAL_IE'] ?>">
<input type=hidden name="DIAL_JP" value = "<?php echo $_POST['DIAL_JP'] ?>">
<input type=hidden name="DIAL_MC" value = "<?php echo $_POST['DIAL_MC'] ?>">
<input type=hidden name="DIAL_MY" value = "<?php echo $_POST['DIAL_MY'] ?>">
<input type=hidden name="DIAL_MX" value = "<?php echo $_POST['DIAL_MX'] ?>">
<input type=hidden name="DIAL_MO" value = "<?php echo $_POST['DIAL_MO'] ?>">
<input type=hidden name="DIAL_SG" value = "<?php echo $_POST['DIAL_SG'] ?>">
<input type=hidden name="DIAL_KR" value = "<?php echo $_POST['DIAL_KR'] ?>">
<input type=hidden name="DIAL_TW" value = "<?php echo $_POST['DIAL_TW'] ?>">
<input type=hidden name="DIAL_TH" value = "<?php echo $_POST['DIAL_TH'] ?>">
<input type=hidden name="DIAL_AE" value = "<?php echo $_POST['DIAL_AE'] ?>">
<input type=hidden name="DIAL_UK" value = "<?php echo $_POST['DIAL_UK'] ?>">
<input type=hidden name="DIAL_VN" value = "<?php echo $_POST['DIAL_VN'] ?>">
<input type=hidden name="ActAcqW1" value = "<?php echo $_POST['ActAcqW1'] ?>">
<input type=hidden name="ActAcqW2" value = "<?php echo $_POST['ActAcqW2'] ?>">
<input type=hidden name="ActAcqW3" value = "<?php echo $_POST['ActAcqW3'] ?>">
<input type=hidden name="DialAcqValue" value = "<?php echo $_POST['DialAcqValue'] ?>">
<input type=hidden name="DialEUAcqValue" value = "<?php echo $_POST['DialEUAcqValue'] ?>">
<input type=hidden name="IPAcqValue" value = "<?php echo $_POST['IPAcqValue'] ?>">
<input type=hidden name="SIPAcqValue" value = "<?php echo $_POST['SIPAcqValue'] ?>">
<input type=hidden name="SIPEUAcqValue" value = "<?php echo $_POST['SIPEUAcqValue'] ?>">
<input type=hidden name="SIPHAcqValue" value = "<?php echo $_POST['SIPHAcqValue'] ?>">
<input type=hidden name="SSCAcqValue" value = "<?php echo $_POST['SSCAcqValue'] ?>">
<input type=hidden name="DialAcqClient" value = "<?php echo $data_parms_row['DialAcqClient'] ?>">
<input type=hidden name="DialEUAcqClient" value = "<?php echo $data_parms_row['DialEUAcqClient'] ?>">
<input type=hidden name="IPAcqClient" value = "<?php echo $data_parms_row['IPAcqClient'] ?>">
<input type=hidden name="SIPAcqClient" value = "<?php echo $data_parms_row['SIPAcqClient'] ?>">
<input type=hidden name="SIPEUAcqClient" value = "<?php echo $data_parms_row['SIPEUAcqClient'] ?>">
<input type=hidden name="SIPHAcqClient" value = "<?php echo $data_parms_row['SIPHAcqClient'] ?>">
<input type=hidden name="SSCAcqClient" value = "<?php echo $data_parms_row['SSCAcqClient'] ?>">
<input type=hidden name="NRTI" value = "<?php echo $_POST['NRTI'] ?>">
<input type=hidden name="Malls" value = "<?php echo $_POST['Malls'] ?>">
<input type=hidden name="SL_DiffURL" value = "<?php echo $_POST['SL_DiffURL'] ?>">
<input type=hidden name="SL_Orgs" value = "<?php echo $_POST['SL_Orgs'] ?>">
<input type=hidden name="Notable_Failures" value = "<?php echo $_POST['Notable_Failures'] ?>">

<input type=hidden name="portal" value="<?php echo $_POST[portal]?>">
<input type=hidden name="insights" value="<?php echo $_POST[insights] ?>">
<input type=hidden name="opsportal" value="<?php echo $_POST[opsportal] ?>">
<input type=hidden name="plweb11" value="<?php echo $_POST[plweb11] ?>">
<input type=hidden name="plweb12" value="<?php echo $_POST[plweb12] ?>">
<input type=hidden name="plweb13" value="<?php echo $_POST[plweb13] ?>">
<input type=hidden name="plweb14" value="<?php echo $_POST[plweb14] ?>">
<input type=hidden name="eu1_q" value = "<?php echo $_POST[eu1_q] ?>">
<input type=hidden name="eu2_q" value = "<?php echo $_POST[eu2_q] ?>">
<input type=hidden name="remedy" value="<?php echo $_POST[remedy] ?>">
<input type=hidden name="kpiapi" value="<?php echo $_POST[kpiapi] ?>">
<input type=hidden name="edtws" value="<?php echo $_POST[edtws] ?>">
<input type=hidden name="MktIntel" value="<?php echo $_POST[MktIntel] ?>">
<input type=hidden name="ForeAdmin" value="<?php echo $_POST[ForeAdmin] ?>">
<input type=hidden name="SMSBill" value="<?php echo $_POST[SMSBill] ?>">
<input type=hidden name="RDMVP" value="<?php echo $_POST[RDMVP] ?>">
<input type=hidden name="SysRpt" value="<?php echo $_POST[SysRpt] ?>">
<input type=hidden name="EFTWS" value="<?php echo $_POST[EFTWS] ?>">

<input type=hidden name="FTP_Inbox" value = "<?php echo $_POST['FTP_Inbox'] ?>">
<input type=hidden name="CE_Root_Inbox" value = "<?php echo $_POST['CE_Root_Inbox']  ?>">
<input type=hidden name="IFACT_Rollups" value = "<?php echo $_POST['IFACT_Rollups'] ?>">
<input type=hidden name="Manual_Releases_Q" value = "<?php echo $_POST['Manual_Releases_Q'] ?>">
<input type=hidden name="Manual_Releases_AsIs_Q" value = "<?php echo $_POST['Manual_Releases_AsIs_Q'] ?>">
<input type=hidden name="Old_IFACT_Rollup" value = "<?php echo $_POST['Old_IFACT_Rollup'] ?>">
<input type=hidden name="Day_Close_Past_Due" value = "<?php echo $_POST['Day_Close_Past_Due'] ?>">
<input type=hidden name="Output_Rollup" value = "<?php echo $_POST['Output_Rollup'] ?>">
<input type=hidden name="IFACT_IO_Rollups_Failed" value = "<?php echo $_POST['IFACT_IO_Rollups_Failed'] ?>">
<input type=hidden name="IFACT_Load_Traffic" value = "<?php echo $_POST['IFACT_Load_Traffic'] ?>">
<input type=hidden name="UDM_Rollups_InProc" value = "<?php echo $_POST['UDM_Rollups_InProc'] ?>">
<input type=hidden name="UDM_Rollups_Waiting" value = "<?php echo $_POST['UDM_Rollups_Waiting'] ?>">
<input type=hidden name="XML_Traffic_Stage" value = "<?php echo $_POST['XML_Traffic_Stage'] ?>">
<input type=hidden name="Harvest_Rec_Not_Tried" value = "<?php echo $_POST['Harvest_Rec_Not_Tried'] ?>">
<input type=hidden name="Dial_ADR_InProc_First" value = "<?php echo $_POST['Dial_ADR_InProc_First'] ?>">
<input type=hidden name="Dial_ADR_InProc_Retry" value = "<?php echo $_POST['Dial_ADR_InProc_Retry'] ?>">
<input type=hidden name="Dial_ADR_Q_First" value = "<?php echo $_POST['Dial_ADR_Q_First'] ?>">
<input type=hidden name="Dial_ADR_Q_Retry" value = "<?php echo $_POST['Dial_ADR_Q_Retry'] ?>">
<input type=hidden name="Inppwibx02" value = "<?php echo $_POST['Inppwibx02'] ?>">
<input type=hidden name="Inppwibx03" value = "<?php echo $_POST['Inppwibx03'] ?>">
<input type=hidden name="Inppwibx05" value = "<?php echo $_POST['Inppwibx05'] ?>">

<input type=hidden name="plapp04_idle" value ="<?php echo $_POST['plapp04_idle'] ?>">
<input type=hidden name="plapp04_active" value = "<?php echo $_POST['plapp04_active'] ?>">
<input type=hidden name="plapp05_idle" value = "<?php echo $_POST['plapp05_idle'] ?>">
<input type=hidden name="plapp05_active" value ="<?php echo $_POST['plapp05_active'] ?>">
<input type=hidden name="plapp06_idle" value = "<?php echo $_POST['plapp06_idle'] ?>">
<input type=hidden name="plapp06_active" value = "<?php echo $_POST['plapp06_active'] ?>">
<input type=hidden name="plapp07_idle" value = "<?php echo $_POST['plapp07_idle'] ?>">
<input type=hidden name="plapp07_active" value = "<?php echo $_POST['plapp07_active'] ?>">
<input type=hidden name="plapp04_mem" value = "<?php echo $_POST['plapp04_mem'] ?>">
<input type=hidden name="plapp05_mem" value = "<?php echo $_POST['plapp05_mem'] ?>">
<input type=hidden name="plapp06_mem" value = "<?php echo $_POST['plapp06_mem'] ?>">
<input type=hidden name="plapp07_mem" value = "<?php echo $_POST['plapp07_mem'] ?>">
<input type=hidden name="plapp04_cpu" value = "<?php echo $_POST['plapp04_cpu'] ?>">
<input type=hidden name="plapp05_cpu" value = "<?php echo $_POST['plapp05_cpu'] ?>">
<input type=hidden name="plapp06_cpu" value = "<?php echo $_POST['plapp06_cpu'] ?>">
<input type=hidden name="plapp07_cpu" value = "<?php echo $_POST['plapp07_cpu'] ?>">

<input type="submit" value="Submit"> 
Press Back on your browser to adjust entered values.
</form> 