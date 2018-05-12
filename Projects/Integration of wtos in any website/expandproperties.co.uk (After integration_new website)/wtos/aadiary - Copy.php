<?php
include('includes/config.php');
include('aaTop.php'); ?>
 <div class="btnStyle ViewPort" >
<div class="pageHead diary"> Diary  </div>
<style>
.calender td{ border-right:1px solid #E2E2E2;border-bottom:1px solid #E2E2E2; height:20px; padding:1px;}
.slot{ width:300px;  position:absolute;
-moz-border-radius:4px; -webkit-border-radius:4px;border-radius:4px; border:#999999 1px solid; background:#FFFFFF; padding:2px; float:left;}
.colorOrange{ background-color:#FFECD9;}
.colorYellow{ background-color:#FFFFD7;}
.colorBlue{ background-color:#DDEEFF;}
.apptwo{  position:relative;left:200;}
.thirtyMin{height:19px;}
.sixtyMin{height:38px;}

</style>
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
<table class="calender"  cellspacing="0" cellpadding="0" width="100%" style="border:1px solid #E2E2E2; color:#787878">
  <tr>
    <td width="70">Time </td>
    <td>Appointment Details</td>
    <td width="150">Calender</td>
  </tr>
  <tr>
    <td>10 AM</td>
    <td>&nbsp;</td>
    <td rowspan="18" valign="top">
	<div id="datepicker"></div>
	
	</td>
  </tr>
  <tr>
    <td class="ttime">10:30 AM</td>
	<td  valign="top"><div class="slot colorOrange sixtyMin"> Mr Arupam Purkayastha   &nbsp;</div>
	
	</td>
  </tr>
  <tr>
 <td >11 AM</td>
      <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>11:30 AM</td>
        <td valign="top">&nbsp;</td>
  </tr>
  <tr>
   <td>12 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
  <tr>
   <td>12:30 PM</td>
       <td valign="top"><div class="slot colorYellow thirtyMin"> &nbsp;</div>
  </tr>
  <tr>
    <td>01 PM</td>
        <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>01:30 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
  <tr>
     <td>02 PM</td>
      <td valign="top"><div class="slot colorBlue thirtyMin"> &nbsp;</div>
  </tr>
  <tr>
   <td>02:30 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
  <tr>
     <td>03 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>03:30 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
  <tr>
   <td>04 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>04:30 PM</td>
      <td valign="top">&nbsp;</td>
  </tr>
  <tr>
      <td>05 PM</td>
        <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>05:30 PM</td>
     <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td>06 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
   <tr>
    <td>06:30 PM</td>
       <td valign="top">&nbsp;</td>
  </tr>
</table>

</div>
<? include('aaBottom.php')?>