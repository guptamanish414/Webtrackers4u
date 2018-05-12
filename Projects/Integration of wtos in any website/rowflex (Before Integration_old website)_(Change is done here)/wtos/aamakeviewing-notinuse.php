<? global $alreadyProprtyId;?>
<div id="viewCalenderDIV" class="wtpopup" >

<div id="viewCalenderListDiv"> 
 
	 <input type="hidden" name="appoId" id="appoId" class="textbox fWidth"  >
	 
<div class="appointform">
 
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table border="0" cellspacing="1" cellpadding="1" style="width:20px;">
  <tr>
    <td>Date</td>
    <td><input type="text" name="appoDate" id="appoDate" class="textbox fWidth dtpk" placeholder="dd-mm-yyyy" style="width:90px;"  >    
	
	
					  
										  </td>
 
  </tr>
  
  <tr><td>From</td><td><select name="appoTime" id="appoTime" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->appoTime,$pageData['appoTime']);	?></select>	
  
 </td></tr>
										  
										  
	 <tr><td>To</td><td>
 	
  <select name="endTime" id="endTime" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->appoTime,$pageData['appoTime']);	?></select>	</td></tr>									  
										  
  
  <tr><td>Type</td><td><select name="appoType" id="appoType" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->appoType,$pageData['appoType']);	?></select>	</td></tr>
  <tr><td>Acompany By </td><td><select name="acompanyBy" id="acompanyBy" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->staffAppo,$pageData['acompanyBy']);	?></select>	</td></tr>
  <tr><td>Applicant</td><td><input type="text" name="memberHints" id="memberHints" class="textbox fWidth" readonly="true" style="background-color:#FDFDFD;"></td></tr>
   <tr><td colspan="2" bgcolor="#C6FFD5"><span id="memberDetails" style="height:30px; width:100px;" > -- </span></td></tr>
   <tr><td>Property</td><td><input type="text" name="propertyHints" id="propertyHints" class="textbox fWidth" style="width:90px;" onchange="propListPopUp('propertyHints' ,'setProDetails' )" /></td></tr>
   <tr><td colspan="2"  bgcolor="#DFEFFF">
   <? if($alreadyProprtyId!='TRUE'){ ?> <input type="hidden" name="propertyId" id="propertyId" class="textbox fWidth"> <? } ?>
	 <span id="propertyDetails" style="height:30px; width:100px;" > --</span> 
   </td></tr>
  
  
  <tr>
    <td>Notes</td>
    <td><input type="text" name="appoNote" id="appoNote" class="textbox fWidth"> 
	 
 </td>
    </tr>
	<tr >
    <td>Status</td>
    <td> 
	<select name="appoStatus" id="appoStatus" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->appoStatus,$pageData['appoStatus']);	?></select>	
 </td>
    </tr>
	<tr>
    <td></td>
    <td> 
	<input type="checkbox" value="1" name="confirmEmailSend" id="confirmEmailSend" /> Send Email.
	<br />
	
	<br />
<span onclick="closepopup('viewCalenderDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp;
<span onclick="saveAppo()" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>


 </td>
 </tr>
	

	
</table></td>
    <td><table border="0" cellspacing="1" cellpadding="1" width="260">
	 <tr>
	
    <td   valign="top" height="200"><div id="datepickerDiary"></div></td>
  </tr>
  <tr>
    <td width="280">
	<span style="color:#663399;">Apointments of this applicants</span>
	<div id="applicantsAppointsments" style="height:200px; overflow-y:scroll;">
	Applicants Apointments
	</div>
	
	</td>
	</tr>
	
</table></td>
  </tr>
</table>

 



</div>	 
	 
<div  class="appointCal"> 
<div id="calenderArea" class="calenderApplicantView">
	 
	<div id="viewAppoByDateDIV" > List of appointmrnt
	
	</div>
	
	
	</div>

</div>		 
	 
 <div style="clear:both;"> &nbsp;</div>




</div>
 
 </div>
 <script>
  
 
function viewCalender()
{

resetAppo();
open_pop_up('viewCalenderDIV','view Calender',1100,550)  //  same code in dafault appo
 
}
 
 function resetAppo()
 {
  	 	 	     

os.setVal('appoId','');
os.setVal('appoDate',toDayStr());
os.setVal('appoTime','');
os.setVal('endTime','');

os.setVal('appoType','');
os.setVal('acompanyBy','');
os.setVal('propertyHints','');
os.setVal('propertyId','');
os.setVal('appoNote','');
os.setVal('appoStatus','');
os.setHtml('propertyDetails','');

 
 }
 
	 
 // appo functions 
 
 
 function viewAppoByMember(memberId)
 {
        
		 if(memberId<1){
		 var  memberId =os.getVal('memberId');
			}
		//alert(memberId);	
		var url='memberId='+memberId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?viewAppoByMember=OK&'+url;	
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';		
		os.setAjaxHtml('applicantsAppointsments',url);
		return false;
			
 
 }
 
 
 
 function saveAppo()
 {
 
		var  memberId =os.getVal('memberId');
		var  appoId =os.getVal('appoId');
		var  appoDate =os.getVal('appoDate');
		var  appoTime =os.getVal('appoTime');
		var  endTime =os.getVal('endTime');
		 var  endTime =os.getVal('endTime');
		var  propertyId =os.getVal('propertyId');
		var  appoNote =os.getVal('appoNote');
		var  acompanyBy =os.getVal('acompanyBy');
		var  appoStatus =os.getVal('appoStatus');
		var  appoType =os.getVal('appoType');
		
		var confirmEmailSend='';
		if(os.getObj('confirmEmailSend').checked==true){confirmEmailSend=1;}
		
		if(memberId<1){ alert('Missing Member '); return;}
		
		var url='memberId='+memberId+'&appoId='+appoId+'&appoDate='+appoDate+'&appoTime='+appoTime+'&endTime='+endTime+'&endTime='+endTime+'&propertyId='+propertyId+'&appoNote='+appoNote+'&acompanyBy='+acompanyBy+'&appoStatus='+appoStatus+'&appoType='+appoType+'&confirmEmailSend='+confirmEmailSend+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?saveAppo=OK&'+url;	
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';		
		os.setAjaxFunc('setAppoVal',url);
		return false;

	
	
            
 }
 
 
 function setAppoVal(data)
 {
 
  var appointId=parseInt(data);
  os.setVal('appoId',appointId);
   
  viewAppoByMember('');
//  closepopup('viewCalenderDIV');
 }
 viewAppoByDate(''); //  shows todays appo
 function fillAppoData(appoId)
{
      
        var url='appoId='+appoId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?fillAppoData=OK&'+url;
	 	os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		
		os.setAjaxFunc('fillappo',url);
		return false;

}

function fillappo(data)
{
var objMem = JSON.parse(data);

	 	 	 	 	     

os.setVal('appoId',parseInt(objMem.appoId));
os.setVal('appoDate',objMem.appoDate);
os.setVal('appoTime',objMem.appoTime);
os.setVal('endTime',objMem.endTime);

os.setVal('appoType',objMem.appoType);
os.setVal('acompanyBy',objMem.acompanyBy);
os.setVal('propertyHints',objMem.propertyHints);
os.setVal('propertyId',objMem.propertyId);
os.setVal('appoNote',objMem.appoNote);
os.setVal('appoStatus',objMem.appoStatus);
os.setHtml('propertyDetails',objMem.propertyDetails);

 
 
}
 
 
  function deleteAppo(appoId)
     {
      
        var p =confirm('Are you Sure?')
		if(p){
		var url='appoId='+appoId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?deleteAppo=OK&'+url;
	 	os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		
		os.setAjaxFunc('reloadAppo',url);
		}
		return false;

     }
	function reloadAppo()
	{
	  viewAppoByMember('');
	} 
	function setMemberHints()
{

	var  lastName=os.getVal('lastName');
	var  firstName=os.getVal('firstName');
	var  telephone=os.getVal('telephone');
	var  mobile=os.getVal('mobile');
	var  address=os.getVal('address');
	var  postCode=os.getVal('postCode');
	
	
   os.setVal('memberHints',lastName+'  '+firstName); 
   var memberDetails =telephone+'  '+mobile+' <br> '+address+'  '+postCode;
   os.setHtml('memberDetails',memberDetails);  
}

 </script>