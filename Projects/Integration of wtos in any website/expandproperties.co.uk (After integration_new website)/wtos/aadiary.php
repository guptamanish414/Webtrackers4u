<?php
include('includes/config.php');
include('aaTop.php'); ?>

 <div class="btnStyle ViewPort" >
<div class="pageHead diary"> Appointment Diary</div>
 
 <table border="0" cellspacing="1" cellpadding="1" width="1200" style="margin-left:15px;">
  <tr>
  <td valign="top">
   
  <div style="margin:20px 0px 10px 0px; width:200px; font-size:14px; color:#999999;">
  Click on calender date to view appointment
  </div>
  <div id="datepickerDiary"></div>
  <br />
  <br />
  
	
	<input type="button" value="Print Preview" onclick="printDiary()" style="cursor:pointer; height:50px; width:195px; font-weight:bold; font-size:16px;" />&nbsp;&nbsp;&nbsp;
	
	
	<div class="colorBoxDiv"> 
	<?
	if($need){
	 foreach( $os->staffAppoColorClss as $mem=>$col  )
	 {
	 ?>
	 <div class="<? echo $col?> colorBox"><? echo $mem ?> </div> 
	 
	 
	 
	 <? 
	 
	 
	 }
	 }
	
	 ?>
	<div>
	
	</td>
    <td width="900" align="right" valign="top">
	
	 
	 
	<div id="dddddd" >
	<div  class="appointCal" style="width:100%;"> 
<div id="calenderArea" class="calenderDiaryView">
	 
	<div id="viewAppoByDateDIV" > List of appointmrnt
	
	</div>
	
	
	</div>

</div>
</div>

</td>
    
  </tr>
</table>

 
 
 
 


</div>

<!-- dummy calls- due to coomon function used in appointments-->
<input type="hidden" name="appoDate" id="appoDate" class="textbox fWidth dtpk" placeholder="dd-mm-yyyy" style="width:90px;"  >   
<script>
function resetAppo(){};
</script>
<!-- dummy calls ends-->
<script>
 
 viewAppoByDate(''); //  shows todays appo
 
</script>

<? include('aaBottom.php')?>