<?php
include('includes/config.php');
 include('aaHeader.php'); ?>
 <body style="background:#E4E1DD;">
  <style>
 .printsDiary .calenderScroll{ padding-top:0px;  height: auto;
    overflow:auto; }
	.ViewPort{ width:900px;}
 </style>
 <div class="btnStyle ViewPort" >
  <script type="text/javascript" src="<? echo $site['url'] ?>html2canvas-master/dist/html2canvas.js"></script>
 
 <table border="0" cellspacing="1" cellpadding="1" width="900">
  <tr>
    <td>
	
	
	 
	 
	<div id="printsDiary" class="printsDiary" style="width:900px;">
	 DIARY &nbsp;&nbsp;&nbsp; <input type="button" id="printDiaryOKButton" value="Print" onclick="printDiaryOK()" style="cursor:pointer;" />
	<div  class="appointCal" style="width:100%;"> 
<div id="calenderArea" class="calenderDiaryView">
	 
	<div id="viewAppoByDateDIV" > List of appointmrnt
	
	</div>
	
	
	</div>

</div>
</div>

</td>
    <td valign="top" style="display:none;"><div id="datepickerDiary"></div>
	 
	
	
	<div id="div_busy"> &nbsp;</div>
	</td>
  </tr>
</table>

 
 
 
 


</div>

<!-- dummy calls- due to coomon function used in appointments-->
<input type="hidden" name="appoDate" id="appoDate" class="textbox fWidth dtpk" placeholder="dd-mm-yyyy" style="width:90px;"  >   
 
<!-- dummy calls ends-->
<script>
var dates='<? echo $_GET['appoDate']?>';

 viewAppoByDate(dates); //  shows todays appo
 
</script>
 <script>
	 function printDiaryOK()
	 {
	  os.hide('printDiaryOKButton');
	
	
	 
   /*
        html2canvas(document.body).then(function(canvas) {
            document.body.appendChild(canvas);
        });*/
		//os.hide('printsDiary');
	    window.print();
       
	 
	 }
	 </script>

</body>
</html>
