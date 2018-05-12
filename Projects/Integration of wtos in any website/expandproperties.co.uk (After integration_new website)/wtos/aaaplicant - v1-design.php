<?php
include('includes/config.php');
include('aaTop.php'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <div class="btnStyle ViewPort" style="background-color:#D2FFD2;">
<div class="pageHead applicants"> Applicants  </div>

 
<table class="calender"  cellspacing="0" cellpadding="0" width="100%"  >
  <tr>
  <td width="700">
 
  
<form   method="post"   enctype="multipart/form-data"  id="recordEditForm"  >
			
				  <input type="hidden" name="memberId" id="memberId" />
						
						        <table border="0" class="formClass"  style="width:800px;"  >
										<tr >
	  									<td> Code </td>
										<td >
										
										<input type="text" name="code" id="code" class="textbox fWidth" style="color:#C64000; font-weight:bold; border:none; width:150px; background:none;" disabled="disabled"/>					
										<input type="text" name="searchKey" id="searchKey" class="textbox fWidth" style="display:none;"/>										</td>						
										<td>Type </td>
										<td><select name="memberType" id="memberType" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->memberType,$pageData['memberType']);	?></select>		
										  
										 
										
										  
										  </td>
										<td>Price </td>
										<td><input type="text" name="minBudget" id="minBudget" class="textbox fWidth" style="width:80px;"/> to <input type="text" name="maxBudget" id="maxBudget" class="textbox fWidth" style="width:80px;"/>	</td>
										</tr>
										
										<tr >
										<td>Surname </td>
										<td><input value="<?php if(isset($pageData['lastName'])){ echo $pageData['lastName']; } ?>" type="text" name="lastName" id="lastName" class="textbox fWidth"/>										</td>
										<td>Telephone </td>
										<td><input value="<?php if(isset($pageData['telephone'])){ echo $pageData['telephone']; } ?>" type="text" name="telephone" id="telephone" class="textbox fWidth" style="width:90px;"/>	</td>
										
										<td colspan="2" rowspan="5">
										
										<span   class="opener" onclick="open_pop_up('requirementsPopupDIV','Attribute',600,400)">Requirements</span> <br />
										<textarea  name="requirements" id="requirements" rows="5"  cols="25" ><?php if(isset($pageData['requirements'])){ echo $pageData['requirements']; } ?></textarea>
										
										
									 </td>
										</tr>
										
										<tr >
											<td>Title </td>
										<td> <select name="title" id="title" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->title,$pageData['title']);	?></select>	</td>
										
										<td> Mobile</td>
										<td><input value="<?php if(isset($pageData['mobile'])){ echo $pageData['mobile']; } ?>" type="text" name="mobile" id="mobile" class="textbox fWidth" style="width:90px;"/>			</td>				
										</tr>
										
										<tr >
										
										
	  									<td>Initial </td>
										<td><input value="<?php if(isset($pageData['firstName'])){ echo $pageData['firstName']; } ?>" type="text" name="firstName" id="firstName" class="textbox fWidth"/>										</td>		
										<td><!--xxxxx--> </td>
										<td><!--xxxxxxx--> <input type="checkbox" value="1" name="activeMember"	  id="activeMember"  /> Active </td>   
										</tr>
										
										
										<td>House Name </td>
										<td><input value="<?php if(isset($pageData['flatOrHouseName'])){ echo $pageData['flatOrHouseName']; } ?>" type="text" name="flatOrHouseName" id="flatOrHouseName" class="textbox fWidth"/>										</td>		
										<td><!--xxxxx--> </td>
										<td><!--xxxxxxx--> <input type="checkbox" value="1" name="willRetain"	 id="willRetain" /> Will Retain	</td>
										</tr>
										
										<td>Address </td>
										<td><input value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="address" id="address" class="textbox fWidth"/>										</td>		
										<td><!--xxxxx--> </td>
										<td><!--xxxxxxx-->	</td>
										</tr>
										
									
	  									<td>Post Code </td>
										<td><input value="<?php if(isset($pageData['postCode'])){ echo $pageData['postCode']; } ?>" type="text" name="postCode" id="postCode" class="textbox fWidth"/>										</td>	
									
									<td>Source </td>
										<td><select name="source" id="source" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->source,$pageData['source']);	?></select>		</td>
										<td>Next Call </td>
										<td> <input value="<?php if(isset($pageData['nextCall'])){ echo $pageData['nextCall']; } ?>" type="text" name="nextCall" id="nextCall" class="textbox fWidth dtpk"/></td>				
										
	  														
										
	  													
										</tr>
										
										
										<td> Email </td>
										<td>
										<input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" id="email" class="textbox fWidth" />	
																	</td>		
										
											<td>Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->status,$pageData['status']);	?></select>		</td>		
										
										
	  												<td>Registered </td>
										<td> <input value="" type="text" name="registerDate" id="registerDate" class="textbox fWidth" style="border:none; background:none; font-weight:bold;" disabled="disabled" />		</td>			
										
	  													
										</tr>
										<tr>
										<td colspan="3">Requirement Notes <br />	<textarea  name="requirementNotes" id="requirementNotes" rows="15"  cols="35" ></textarea></td>
										<td colspan="3">
										
										
										<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td rowspan="2">Contact Notes <br />	<textarea  name="contactNotes" id="contactNotes" rows="15"  cols="35" ></textarea></td>
    <td> <div style="height:130px; width:130px; border:0px solid #FF0000;">
	<span id="div_busy" style="background-color:#FFCC00;"> </span></div></td>
  </tr>
  <tr>
    <td><input name="button" type="button" class="submit" onclick="saveMemberData();"  value="Save" />
	
	<input name="button" type="button" class="submit" onclick="matchProperties();"  value="Match Properties" />
	<input name="button" type="button" class="submit" onclick="viewCalender();"  value="View" />
	
	
	</td>
  </tr>
</table>

										

										
									 
										
										
										
										
										</td>
										</tr>
										
										
									
										
										</table>
										
									 
						
						
						
						
						
						
						
	  </form>
  
  </td>
    <td valign="top">
	
	Search <input type="text" id="srarchApplicant" value="" /> <input type="button" value="Search" onclick="listMemberData()" style="cursor:pointer;" /> <input type="button" value="Reset" onclick="resetSearch()" style="cursor:pointer;" />
	<div class="listArea" >
	<div id="listMemberData_DIV">&nbsp;</div>
	</div>
	
	
	</td>
  
  
  </tr>
 
</table>

<!-- popups  -->
<div id="requirementsPopupDIV" class="wtpopup" >

Department   <select name="type" id="type" class="textbox fWidth" style="width:60px;">	<? 
										  $os->onlyOption($os->propType,$pageData['type']);	?></select>	

 <table border="0" cellspacing="1" cellpadding="1" style="width:500px;">
  <tr>
    <td>Type</td>
    <td>Style</td>
    <td>External</td>
    <td>Special</td>
  </tr>
  <tr>
    <td><? foreach($os->attrType as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  />  <? echo $val; ?> <br />    <?   }  ?></td>
    <td><? foreach($os->attrStyle as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />     <?   }  ?></td>
   <td><? foreach($os->attrExternal as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />    <?   }  ?></td>
     <td><? foreach($os->attrSpecial as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />     <?   }  ?></td>
  </tr>
</table>
<br /><br />




Lease Info  <select name="leasehold" id="leasehold" class="textbox fWidth" style="width:140px;">
							<option value=""> </option>
							 
							<?
							 
							$os->onlyOption($os->leasehold,$pageData['leasehold']);
							  
							?>
							</select>	  Years 	 <input value="<?php if(isset($pageData['leaseyears'])){ echo $pageData['leaseyears']; } ?>" type="text" name="leaseyears" id="leaseyears" class="textbox fWidth" style="width:35px;"/>
							
							
							<br />	<br />  
							
							
							
								 	&nbsp; Bed <input value="<?php if(isset($pageData['bed'])){ echo $pageData['bed']; } ?>" type="text" name="bed" id="bed" class="textbox fWidth" style="width:40px;"/> &nbsp;Bath 	<input value="<?php if(isset($pageData['bath'])){ echo $pageData['bath']; } ?>" type="text" name="bath" id="bath" class="textbox fWidth" style="width:40px;"/> &nbsp;Sofa    <input value="<?php if(isset($pageData['sofa'])){ echo $pageData['sofa']; } ?>" type="text" name="sofa" id="sofa" class="textbox fWidth" style="width:40px;"/> &nbsp; 
							 


<br /><br />
<span onclick="setPropAttribute()" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp;
<span onclick="setPropAttribute()" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>
 

 
 
 
 
 
 
 </div>
 
 
 <div id="matchPropertiesDIV" class="wtpopup" >

 <div id="matchPropertiesListDiv"> &nbsp;</div>
 
 </div>
 
 <div id="viewCalenderDIV" class="wtpopup" >

<div id="viewCalenderListDiv"> 
 
	 <input type="hidden" name="appoId" id="appoId" class="textbox fWidth"  >
	 
<div class="appointform"><table border="0" cellspacing="1" cellpadding="1" style="width:100%;">
  <tr>
    <td>Date</td>
    <td><input type="text" name="appoDate" id="appoDate" class="textbox fWidth dtpk" placeholder="dd-mm-yyyy" style="width:90px;"  >&nbsp; Time  From
	
	<select name="appoTime" id="appoTime" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->appoTime,$pageData['appoTime']);	?></select>	
  
  To
  <select name="endTime" id="endTime" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->appoTime,$pageData['appoTime']);	?></select>	
											  
										  </td>
 
  </tr>
  <tr>
    <td>Type</td>
    <td><select name="appoType" id="appoType" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->appoType,$pageData['appoType']);	?></select>	Acompany By   <select name="acompanyBy" id="acompanyBy" class="textbox fWidth"  >	<? 
										  $os->onlyOption($os->staffAppo,$pageData['acompanyBy']);	?></select>	</td>
    </tr>
  <tr>
    <td>Applicant</td>
    <td valign="top" bgcolor="#C6FFD5">
	<table border="0" cellspacing="1" cellpadding="1" width="100%">
  <tr>
    <td><input type="text" name="memberHints" id="memberHints" class="textbox fWidth"></td>
    <td> <span id="memberDetails" style="height:30px; width:100px;" > -- </span></td>
  </tr>
</table>
	
	
	
	
	
	 </td>
    </tr> 
  <tr>
    <td>Property</td>
    <td valign="top" bgcolor="#DFEFFF">
	
	<table border="0" cellspacing="1" cellpadding="1" width="100%">
  <tr>
    <td><input type="text" name="propertyHints" id="propertyHints" class="textbox fWidth" style="width:90px;" onchange="propListPopUp('propertyHints' ,'setProDetails' )"><input type="button" value="Brows" />
	
	
	 <input type="hidden" name="propertyId" id="propertyId" class="textbox fWidth"></td> 
    <td> <span id="propertyDetails" style="height:30px; width:100px;" > dddd</span> </td>
  </tr>
</table>
	
	</td>
    </tr>
  <tr>
    <td>Notes</td>
    <td><input type="text" name="appoNote" id="appoNote" class="textbox fWidth"> Status
	<select name="appoStatus" id="appoStatus" class="textbox fWidth"   >	<? 
										  $os->onlyOption($os->appoStatus,$pageData['appoStatus']);	?></select>	
 </td>
    </tr>
	
	 <tr>
    <td colspan="5">
	<table border="0" cellspacing="1" cellpadding="1" width="500">
  <tr>
    <td width="280">
	<span style="color:#663399;">Apointments of this applicants</span>
	<div id="applicantsAppointsments" style="height:200px; overflow-y:scroll;">
	Applicants Apointments
	</div>
	
	</td>
    <td width="150" valign="top"><div id="datepickerDiary"></div></td>
  </tr>
</table>

	
	
   
	
    </td>
    </tr>
	
	
	
</table> 




<span onclick="saveAppo()" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp;
<span onclick="saveAppo()" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>
</div>	 
	 
<div  class="appointCal"> 
<div id="calenderArea" class="calenderAreaApplicantView">
	 
	<div id="viewAppoByDateDIV" > List of appointmrnt
	
	</div>
	
	
	</div>

</div>		 
	 
 <div style="clear:both;"> &nbsp;</div>




</div>
 
 </div>
 
 
 
 <div id="propListPopUpDIV" class="wtpopup" >

 <div id="propListPopUpDIVList"> &nbsp;</div>
 
 </div>
 
 
  
 

 
 
 
 
 
 
<!-- popups  ends  -->
<script>
function saveMemberData()
{

		//  ------------------
		var memberId=os.getVal('memberId');
		var memberType=os.getVal('memberType');
		var minBudget=os.getVal('minBudget');
		var maxBudget=os.getVal('maxBudget');
		
		var lastName=os.getVal('lastName');
		var telephone=os.getVal('telephone');
		var requirements=escape(os.getVal('requirements'));
		var title=os.getVal('title');
		var mobile=os.getVal('mobile');
		var firstName=os.getVal('firstName');
		
		var flatOrHouseName=os.getVal('flatOrHouseName');
		
		var address=os.getVal('address');
		var postCode=os.getVal('postCode');
		var nextCall=os.getVal('nextCall');
		var email=os.getVal('email');
		var status=os.getVal('status');
		var requirementNotes=escape(os.getVal('requirementNotes'));
		var contactNotes=escape(os.getVal('contactNotes'));
		var source=os.getVal('source');
		var activeMember=os.getVal('activeMember');
		var willRetain=os.getVal('willRetain');
		
		if(os.getObj('activeMember').checked==false){activeMember='';}
		if(os.getObj('willRetain').checked==false){willRetain='';}
		
		
		// attribute section 
	
	    var  type=escape(os.getVal('type'));
	    var  leasehold =os.getVal('leasehold');
		var  leaseyears =os.getVal('leaseyears');
		var  bed =os.getVal('bed');
		var  bath =os.getVal('bath');
		var  sofa =os.getVal('sofa');
	 
	 // attribute section end 
		
    
		if(os.check.empty('lastName','Missing surname')==false){ return false;}
		if(os.check.empty('firstName','Missing initials')==false){ return false;}
		if(os.check.empty('address','Missing address')==false){ return false;}
	//	if(os.check.empty('type','Select Type')==false){ return false;}
	 
		
		var url='memberId='+memberId+'&memberType='+memberType+'&minBudget='+minBudget+'&maxBudget='+maxBudget+'&lastName='+lastName+'&telephone='+telephone+'&requirements='+requirements+'&title='+title+'&mobile='+mobile+'&firstName='+firstName+'&activeMember='+activeMember+'&flatOrHouseName='+flatOrHouseName+'&willRetain='+willRetain+'&address='+address+'&postCode='+postCode+'&nextCall='+nextCall+'&email='+email+'&status='+status+'&requirementNotes='+requirementNotes+'&contactNotes='+contactNotes+'&source='+source+'&leasehold='+leasehold+'&leaseyears='+leaseyears+'&bed='+bed+'&bath='+bath+'&sofa='+sofa+'&type='+type+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?saveMemberData=OK&'+url;
	
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		
		os.setAjaxFunc('reloadList',url);
		return false;

}

function reloadList( data)
{


 var memberId=parseInt(data);
 os.setVal('memberId',memberId);
  listMemberData()
}


function listMemberData()
{

        var srarchApplicant=os.getVal('srarchApplicant');
        var url='srarchApplicant='+srarchApplicant+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?listMemberData=OK&'+url;
	//	alert(url);
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		
		os.setAjaxHtml('listMemberData_DIV',url);
		return false;



}
function fillMemberData(memberId)
{
      
        var url='memberId='+memberId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?fillMemberData=OK&'+url;
	 	os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		
		os.setAjaxFunc('fillMember',url);
		return false;



}
function fillMember(data)
{
var objMem = JSON.parse(data);
os.setVal('memberId',parseInt(objMem.memberId));
os.setVal('memberType',objMem.memberType);
os.setVal('minBudget',objMem.minBudget);
os.setVal('maxBudget',objMem.maxBudget);

os.setVal('lastName',objMem.lastName);
os.setVal('telephone',objMem.telephone);
os.setVal('requirements',objMem.requirements);
os.setVal('title',objMem.title);
os.setVal('mobile',objMem.mobile);
os.setVal('firstName',objMem.firstName);

os.setVal('flatOrHouseName',objMem.flatOrHouseName);

os.setVal('address',objMem.address);
os.setVal('postCode',objMem.postCode);
os.setVal('nextCall',objMem.nextCall);
os.setVal('registerDate',objMem.registerDate);

os.setVal('email',objMem.email);
os.setVal('status',objMem.status);
os.setVal('requirementNotes',objMem.requirementNotes);
os.setVal('contactNotes',objMem.contactNotes);
os.setVal('source',objMem.source);
os.setVal('code',objMem.code);

os.getObj('activeMember').checked=false;
if(parseInt(objMem.activeMember)==1){os.getObj('activeMember').checked=true; }
os.getObj('willRetain').checked=false;
if(parseInt(objMem.willRetain)==1){os.getObj('willRetain').checked=true; }



// attribute section
os.setVal('type',objMem.type); 
os.setVal('leasehold',objMem.leasehold);
os.setVal('leaseyears',objMem.leaseyears);
os.setVal('bed',objMem.bed);
os.setVal('bath',objMem.bath);
os.setVal('sofa',objMem.sofa); 
 
	//alert(objMem.requirements);
	var attrs= document.getElementsByName('attr[]');
	var atObj='';	 
	 for (i = 0; i < attrs.length; i++) 
	 {
	   atObj = attrs[i] ;
	   atObj.checked=false;
	   var exists= objMem.requirements.indexOf(atObj.value); 
	  exists=parseInt(exists);
	  if(exists>-1){
	  atObj.checked=true;
	  
	  }
			
		
		
		 
	 }

 

 os.setVal('memberHints',objMem.lastName+'  '+objMem.firstName); 
 var memberDetails =objMem.telephone+'  '+objMem.mobile+' <br> '+objMem.address+'  '+objMem.postCode;
 
        
  os.setHtml('memberDetails',memberDetails);    
  // appo section 
 viewAppoByMember('');
 
}
function resetSearch()
{




       os.setVal('srarchApplicant','');
		listMemberData()
}
// ssaveMemberData();
 listMemberData();
 
 
 
 
 
 
function setPropAttribute()
{
 
  
   var attrs= document.getElementsByName('attr[]');
   var atObj='';
   var attrVals='';
   
   
var leaseholdText='';
var leaseyearsText='';
var bedText='';
var bathText='';
var sofaText='';
   
   
     for (i = 0; i < attrs.length; i++) 
	 {
	 
	
        atObj = attrs[i] ;
		if(atObj.checked==true)
		{
		   attrVals=attrVals+atObj.value+', ';
		
		}
		
		 
     }
	 
	 
	 
		var  leasehold =os.getVal('leasehold');
		var  leaseyears =os.getVal('leaseyears');
		var  bed =os.getVal('bed');
		var  bath =os.getVal('bath');
		var  sofa =os.getVal('sofa');
		
		if(leasehold!=''){   leaseholdText=leasehold+',';}
		if(leaseyears!=''){  leaseyearsText=leaseyears+' Years,';}
		if(bed!=''){  bedText=bed+' Beds ,';}
		if(bath!=''){  bathText=bath+' Bath ,';}
		if(sofa!=''){  sofaText=sofa+' Reception ,';}
	 
	 
	 attrVals =attrVals+ leaseholdText+' '+ leaseyearsText+' '+ bedText+' '+ bathText+' '+ sofaText;
	 
	 os.setVal('requirements',attrVals);
 
 }
 
 
 
 function matchProperties()
 {
        open_pop_up('matchPropertiesDIV','Match Properties',600,400);
        var  memberId =os.getVal('memberId');
		var url='memberId='+memberId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?matchProperties=OK&'+url;
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		os.setAjaxHtml('matchPropertiesListDiv',url);
		return false;
   
   
 
 }
 function propListPopUp(searchTextId,functiontocall)
	{
	 // alert('propListPopUp');
	 
	    
		 open_pop_up('propListPopUpDIV','Searched Propertties',600,400);
		// alert('propListPopUp');
       var  searchText=os.getVal(searchTextId);
		var url='searchText='+searchText+'&functiontocall='+functiontocall+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?propListPopUp=OK&'+url;
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
		os.setAjaxHtml('propListPopUpDIVList',url);
		return false;
	 
	
	}
	
function setProDetails(data)
{
	var d=data.split('#');
	os.setVal('propertyId',d[0]);
	os.setVal('propertyHints',d[1]);
	os.setHtml('propertyDetails','Post '+d[2]+' Address  '+d[3]+'  '+d[4]+' Bed  '+d[5]);

}
 
 
 
function viewCalender()
{
open_pop_up('viewCalenderDIV','view Calender',1100,550)
 
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
		
		
		if(memberId<1){ alert('Missing Member '); return;}
		
		var url='memberId='+memberId+'&appoId='+appoId+'&appoDate='+appoDate+'&appoTime='+appoTime+'&endTime='+endTime+'&endTime='+endTime+'&propertyId='+propertyId+'&appoNote='+appoNote+'&acompanyBy='+acompanyBy+'&appoStatus='+appoStatus+'&appoType='+appoType+'&';
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
 }
 viewAppoByDate(''); //  shows todays appo
 
 
 
  dateCalander();
</script>

</div>  <!-- end viewport-->

<? include('aaBottom.php')?>