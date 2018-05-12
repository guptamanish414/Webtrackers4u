<?php
include('includes/config.php');
include('aaTop.php'); ?>
 
 <style>
.noBorder td{ text-align:left; height:20px; padding:2px;}
.vend{ color:#3399FF; }
.appli{ color:#33CC00;}
</style>
		
 
 <div class="btnStyle ViewPort" >
 <div class="pageHead followcall"> Followup   </div>
 <table width="100%" border="0" cellspacing="1" cellpadding="1"  style="margin-left:15px;">
  <tr>
   <td>
    <div style="margin:20px 0px 10px 0px; width:200px; font-size:14px; color:#999999;">
  Click on calender date to view Followup.
  </div>
   <div id="datepickerFollowup"></div> </td>
    <td valign="top"><div id="listFollowupsDiv" > 


 
 </div></td>
   
  </tr>
</table>

 
 
 
 

</div>

 
 <script>
  function listFollowups(dates)
{
       if(dates==''){		 
		   var today = toDayStr();
		 
		        dates=today;
			}
		 
			 
		 
		var url='dates='+dates+'&';
      // alert(url);
		url='<? echo $site['url'] ?>/aaajxSysytem.php?listFollowups=OK&'+url;
	 	os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		
		os.setAjaxFunc('listFollowupsIntoDiv',url);
		return false;

}

function listFollowupsIntoDiv(data)
{

os.setHtml('listFollowupsDiv',data);
//alert(data)
}


 function setFolloupThenOpen(memberId,vallue)
 {
    var p=confirm('Applicant/vendor will be  removed from this list. Confirm proceed ?');
     if(p==true){
    setnextCallShow(memberId,vallue);
	}
   
 }
 
 listFollowups('');
 </script>
<? include('aaBottom.php')?>