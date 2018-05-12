<?php
include('includes/config.php');
include('aaTop.php'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <style>
  .rightDiv{ padding:5px;}
  </style>
  <? 
  $vendorList= $_GET['vendor'];
   $memberTypeList= $_GET['memberType'];
  $pageData['memberType']=$memberTypeList.' Tenant';
  $pageHead=$memberTypeList.' Tenant';
 // $bgColor='#D2FFD2';
 $vendorDisplay='display:none';
 $tenantDisplay='display:none';
   
  if($vendorList!='')
  {
  $pageHead='LANDLORD';
  $vendorDisplay='';
  $pageData['status']='LANDLORD';
  
  }else
  {
  $tenantDisplay='';
  $pageData['status']='TENANT';
  }
  
   
  
  
  ?>

  <div class=""  >
  
  <input type="hidden" value="<? echo $vendorList ?>" name="vendorList" id="vendorList"  />
  <input type="hidden" value="<? echo $memberTypeList ?>" name="memberTypeList" id="memberTypeList"  />
  
  
<div class="pageHead applicants"> <? echo $pageHead; ?>  </div>

 
<table class="calender"  cellspacing="1" cellpadding="1" width="100%" border="1"  >
  <tr>
        <td width="700" valign="top">
        
        
        	<form   method="post"   enctype="multipart/form-data"  id="recordEditForm"  >
        
              <input type="hidden" name="memberId" id="memberId" />
         <div>
		  <input name="button" type="button" class="submit" onclick="deleteMember('0');"  value="Delete" style="cursor:pointer;" />&nbsp; 

        
       
        <input name="button" type="button"  class="wtedit"  onclick="viewCalender();"  style="cursor:pointer;"  value="  Appointment" /> &nbsp; 
				 <input name="button" type="button" class="submit" onclick="saveMemberData();"  value="Save" style="cursor:pointer;" /> &nbsp; 
        
       
        </div>
                      
            <table border="0" cellspacing="0" class=""  style="width:800px;"  >
            
        
                    <tr >
                    <td style="width:100px;" > Code </td>
                    <td style="width:100px;" >
                    
                    <input type="text" name="code" id="code" class="textbox fWidth" style="color:#C64000; font-weight:bold; border:none; width:150px; background:none;" disabled="disabled"/>					
                    <input type="text" name="searchKey" id="searchKey" class="textbox fWidth" style="display:none;"/>										</td>	  <td>Registered</td>	<td style="width:100px;"> <input value="" type="text" name="registerDate" id="registerDate" class="textbox fWidth" style="border:none; background:none; font-weight:bold; color:#CC0000" disabled="disabled" />	</td>							
                    
                    <td rowspan="16" valign="top">  
						
					<div style="<? echo  $vendorDisplay ?>">
					<div class="rightDiv">
					 Bank Name	<input value="<?php if(isset($pageData['bankName'])){ echo $pageData['bankName']; } ?>" type="text" name="bankName" id="bankName" class="textbox fWidth"/></div>  
                   <div class="rightDiv"> 	Bank A/C No. <input value="<?php if(isset($pageData['bankAcNo'])){ echo $pageData['bankAcNo']; } ?>" type="text" name="bankAcNo" id="bankAcNo" class="textbox fWidth"/> </div> 
				   <div class="rightDiv"> 	Sortcode. <input value="<?php if(isset($pageData['sortcode'])){ echo $pageData['sortcode']; } ?>" type="text" name="sortcode" id="sortcode" class="textbox fWidth"/> </div>  
				   
				  
					<div class="rightDiv">	Bank Details<br /> 
						<textarea style="width:200px;" class="textbox fWidth" name="bankDetails" id="bankDetails" rows="" cols=""><?php if(isset($pageData['bankDetails'])){ echo $pageData['bankDetails']; } ?></textarea> </div>  
					
					</div>
					<div style="<? echo  $tenantDisplay ?>"> 
					 <input name="button" type="button" class="submit" onclick="matchProperties();"  style="cursor:pointer; <? echo $matchApplicant ?>"  value="Match Properties" />&nbsp; 
					<div class="rightDiv" > Type 
					 <select name="memberType" id="memberType" class="textbox fWidth" >	<? 
                      $os->onlyOption($os->memberType,$pageData['memberType']);	?></select>	  </div>
					  
					  <div class="rightDiv" >
					 Budget  
					   <input type="text" name="minBudget" id="minBudget" class="textbox fWidth" style="width:60px;"/> to <input type="text" name="maxBudget" id="maxBudget" class="textbox fWidth" style="width:60px;"/>  
					  </div>
					 <div class="rightDiv" >
					  Occupation <input value="<?php if(isset($pageData['occupation'])){ echo $pageData['occupation']; } ?>" type="text" name="occupation" id="occupation" class="textbox fWidth"/>
					  </div>
					  <div class="rightDiv" >
					  
					   Property Req. Date <input value="<?php if(isset($pageData['propertyReqDate'])){ echo $pageData['propertyReqDate']; } ?>" type="text" name="propertyReqDate" id="propertyReqDate" class="textbox fWidth dtpk" style="width:70px;"/>
					  </div>
					 <div class="rightDiv" >
					  Working Status <select name="workingStatus" id="workingStatus" class="textbox fWidth" style="width:70px;">
							<option value=""> </option>
							<?
                            	$os->onlyOption($os->workingStatusg,$pageData['workingStatus']);
                            ?> 							
                    	</select>
					  
					  </div>
					  <div class="rightDiv" >
                    Adult	<input value="<?php if(isset($pageData['adult'])){ echo $pageData['adult']; } ?>" type="text" name="adult" id="adult" class="textbox fWidth" style="width:50px;"/>
					
					Child <input value="<?php if(isset($pageData['child'])){ echo $pageData['child']; } ?>" type="text" name="child" id="child" class="textbox fWidth" style="width:50px;"/>
					</div>
					<div class="rightDiv" >
					Pets <select name="pets" id="pets" class="textbox fWidth" style="width:70px;">
							<option value=""> </option>
							<?
                            	$os->onlyOption($os->propYn,$pageData['pets']);
                            ?> 							
                    	</select>
					  </div>
						<div class="rightDiv" >
						<div style="margin:5px;" class="tAreaBack">
                    <span   onclick="open_pop_up('requirementsPopupDIV','Requirements',900,400)"><input class="wtedit" type="button" value="  Requirements" /></span> <br />
                    <textarea readonly class="flexyAreaOutput"  name="requirements" id="requirements"  style="background-color:#F4F4F4; height:100px; width:180px" ><?php if(isset($pageData['requirements'])){ echo $pageData['requirements']; } ?></textarea>	
                        </div>
						</div>
					</div>
					
					
					
					
                   
                     </td>
                    </tr>
                    
                    <tr >
                    <td>Title  </td>
                    <td>   
                    <select name="title" id="title" class="textbox fWidth" >	<? 
                      $os->onlyOption($os->title,$pageData['title']);	?></select>															</td>
                    
                      
                     <td >Followup Date  </td>
                    <td  ><input value="<?php if(isset($pageData['nextCall'])){ echo $pageData['nextCall']; } ?>" type="text" name="nextCall" id="nextCall" class="textbox fWidth dtpk" onchange="setfollowup()" style="width:90px;"/>
                      
                    
                    
                      
                      </td>
                            
                    </tr>
                    
                    <tr >
                        <td>Surname </td>
                    <td> <input value="<?php if(isset($pageData['lastName'])){ echo $pageData['lastName']; } ?>" type="text" name="lastName" id="lastName" class="textbox fWidth"/>						</td>
                     <td>Telephone </td>
                    <td><input value="<?php if(isset($pageData['telephone'])){ echo $pageData['telephone']; } ?>" type="text" name="telephone" id="telephone" class="textbox fWidth" style="width:90px;"/>	</td> 
                    </tr>
                    
                    <tr >
                    
                    
                    <td>First Name </td>
                    <td><input value="<?php if(isset($pageData['firstName'])){ echo $pageData['firstName']; } ?>" type="text" name="firstName" id="firstName" class="textbox fWidth"/>										</td>	<td> Mobile</td>
                    <td><input value="<?php if(isset($pageData['mobile'])){ echo $pageData['mobile']; } ?>" type="text" name="mobile" id="mobile" class="textbox fWidth" style="width:90px;"/>			</td>	
                    </tr>
                    
                    <tr>
                    
                    <td>House Name/No </td>
                    <td><input value="<?php if(isset($pageData['flatOrHouseName'])){ echo $pageData['flatOrHouseName']; } ?>" type="text" name="flatOrHouseName" id="flatOrHouseName" class="textbox fWidth"/>										</td>	 <td><!--xxxxx-->Email</td>
                    <td><!--xxxxxxx--> 
                    <input style="width:150px;" value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" id="email" class="textbox fWidth"  />										 </td> 		
                    </tr>
                    <tr> 
                    <td>Address   <br /> <br />Town City</td>
                    <td><input value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="address" id="address" class="textbox fWidth"/>		<br /> <input value="<?php if(isset($pageData['townCity'])){ echo $pageData['townCity']; } ?>" type="text" name="townCity" id="townCity" class="textbox fWidth" style=" margin-top:5px;"/>								</td>	 <td>Other Contact</td>
                    <td>	<textarea   name="otherContact" id="otherContact"   style="width:150px; height:40px;" ><?php if(isset($pageData['otherContact'])){ echo $pageData['otherContact']; } ?></textarea>					</td>
                    </tr>
                    
                <tr>
                    <td>  Post Code </td>
                    <td>	  <input value="<?php if(isset($pageData['postCode'])){ echo $pageData['postCode']; } ?>" type="text" name="postCode" id="postCode" class="textbox fWidth" style="width:70px;" placeholder="Postcode"/>										</td>	 
                            <td>Source </td>
                    <td><select name="source" id="source" class="textbox fWidth" >	<? 
                      $os->onlyOption($os->source,$pageData['source']);	?></select>		</td>	
              </tr>
                    
                    
                    
                    <tr>
                    <td>Corr. Address </td>
                        
                
                
                    
                    
                    <td colspan="3" ><input type="checkbox" id="checkAddress" onclick="fillAdressAbove()" /> as above. &nbsp; <input value="<?php if(isset($pageData['corrAddress'])){ echo $pageData['corrAddress']; } ?>" type="text" name="corrAddress" id="corrAddress" class="textbox fWidth " style="width:300px;"/>  
                    
                    <script>
                    function fillAdressAbove()
                    {
                    
                      var add=os.getObj('checkAddress');
                      if(add.checked==true)
                      {
                      var allAddress=os.getVal('flatOrHouseName')+'  '+os.getVal('address')+'  '+os.getVal('postCode');
                       
                       os.setVal('corrAddress',allAddress);
                      }else
                      {
                       os.setVal('corrAddress','');
                      
                      }
                    
                    }
                    </script>										</td>			 
                        
                    </tr>
                    <tr>
                    
                    <td> Area </td>
                     
                         <td colspan="3">   <select name="locationId" id="locationId" class="textbox fWidth" > 
                
            
                                
                                                <?
                                        
                                         $os->optionsHTML($pageData['locationId'],'propertylocationId','title','propertylocation');
                                        ?>
                                        </select>	<input type="button" value="+" onclick="addLocation();"/> <select name="status" id="status" class="textbox fWidth" style="display:none;" >	<? 
                      $os->onlyOption($os->status,$pageData['status']);	?></select>	<input type="checkbox" value="1" name="activeMember"	  id="activeMember"  /> Active	    <input type="checkbox" value="1" name="willRetain"	 id="willRetain" /> Will Retain	</td>
                 
                    </tr>
                                        
                    <tr>
                    <td>									
Reference             </td>	


<td colspan="3">  	<input value="<?php if(isset($pageData['reference'])){ echo $pageData['reference']; } ?>" type="text" name="reference" id="reference" class="textbox fWidth" style="width:300px;"/> </td>				
</tr>		
                     
                    <tr>
                    <td>
                    
Feedback Value                 </td>	


<td><input value="<?php if(isset($pageData['feedBackValue'])){ echo $pageData['feedBackValue']; } ?>" type="text" name="feedBackValue" id="feedBackValue" class="textbox fWidth"/>	</td>	<td> Outcome</td>	
<td><select name="outcome" id="outcome" class="textbox fWidth" >	<? 
                      $os->onlyOption($os->outcome,$pageData['outcome']);	?></select></td>				
</tr>		
<tr><td colspan="2"><div style="margin:5px;" class="tAreaBack">
                    <span    onclick="openNotePopup('memberId','requirementNotesPopupDIV','Viewing Feedback',400,400)"><input class="wtedit" type="button" value="  Feedback" /></span><br />
                    
                    <textarea id="requirementNotesDiv" class="flexyAreaOutput" style="height:95px; width:240px;" readonly >&nbsp;</textarea>
                    <br />
                    <div id="requirementNotesPopupDIV" class="wtpopup">
                    <textarea  name="requirementNotes" id="requirementNotes" class="flexyArea" rows="15"  cols="35"  ></textarea><br />
                    <span onclick="closepopup('requirementNotesPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp; &nbsp;
                    <span onclick="saveNotes('requirementNotes','member','memberId','')" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>										</div>	
                        </div></td> <td colspan="4">   
                      
                      <div style="margin:5px;" class="tAreaBack">
                    
                    <span    onclick="openNotePopup('memberId','contactNotesPopupDIV','General Notes',400,400)"><input class="wtedit" type="button" value="  Notes" /><br /></span>
<textarea id="contactNotesDiv" class="flexyAreaOutput" readonly  style="height:95px; width:240px;"  >&nbsp;</textarea>
<br />
<div id="contactNotesPopupDIV" class="wtpopup">
<textarea  name="contactNotes" id="contactNotes" class="flexyArea" rows="15"  cols="35"  ></textarea><br />
<span onclick="closepopup('contactNotesPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp; &nbsp;
<span onclick="saveNotes('contactNotes','member','memberId','')" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>	</div>	
                        </div>


                        </td></tr>

<tr> <td colspan="4"> <div class=""><input name="button" type="button" class="submit" onclick="deleteMember('0');"  value="Delete" style="cursor:pointer;" />&nbsp; 

        
       
        <input name="button" type="button"  class="wtedit"  onclick="viewCalender();"  style="cursor:pointer;"  value="  Appointment" /> &nbsp; 
				 <input name="button" type="button" class="submit" onclick="saveMemberData();"  value="Save" style="cursor:pointer;" /> &nbsp; 

</div>		
    </td></tr>							 
                     
                             
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

<table width="550" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>Department</td>
    <td><select name="type" id="type" class="textbox fWidth" style="width:60px;">	<? 
										  $os->onlyOption($os->propType,$pageData['type']);	?></select>	</td>
    <td>Lease Info </td>
    <td>
 <select name="leasehold" id="leasehold" class="textbox fWidth" style="width:140px;">
							<option value=""> </option>
							 
							<?
							 
							$os->onlyOption($os->leasehold,$pageData['leasehold']);
							  
							?>
							</select></td>
    <td>Years</td>
    <td>
	   	 <input value="<?php if(isset($pageData['leaseyears'])){ echo $pageData['leaseyears']; } ?>" type="text" name="leaseyears" id="leaseyears" class="textbox fWidth" style="width:35px;"/></td>
  </tr>
  <tr>
    <td>Bed</td>
    <td> <select name="bed" id="bed" class="textbox fWidth" style="width:60px;"><? $os->onlyOption($os->bedDD,$pageData['bed']);	?></select>	</td>
    <td>Bath</td>
    <td>	<select name="bath" id="bath" class="textbox fWidth" style="width:60px;"><? $os->onlyOption($os->bathDD,$pageData['bath']);	?></select></td>
    <td>Reception</td>
    <td> <select name="sofa" id="sofa" class="textbox fWidth" style="width:60px;"><? $os->onlyOption($os->recceptionDD,$pageData['sofa']);	?></select> </td>
  </tr>
</table>

<br />

<br />


							
 
 <table border="0" cellspacing="1" cellpadding="1" style="width:800px;">
  <tr>
    <td class="bbold">Type</td>
    <td class="bbold">Style</td>
    <td class="bbold">External</td>
    <td class="bbold">Special</td>
  </tr>
  <tr>
    <td valign="top" class="shadows"><? foreach($os->attrType as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  />  <? echo $val; ?> <br />    <?   }  ?></td>
    <td valign="top"  class="shadows"><? foreach($os->attrStyle as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />     <?   }  ?></td>
   <td valign="top"  class="shadows"><? foreach($os->attrExternal as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />    <?   }  ?></td>
     <td valign="top"  class="shadows"><? foreach($os->attrSpecial as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />     <?   }  ?></td>
  </tr>
</table>
<br /><br />

<span onclick="closepopup('requirementsPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp;
<span onclick="setPropAttribute()" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>
 

 
 
 
 
 
 
 </div>
 
<div id="matchPropertiesDIV" class="wtpopup" >

 <div id="matchPropertiesListDiv"> &nbsp;</div>
 
 </div>
 
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
  <tr><td>Applicant</td><td><input type="text" name="memberHints" id="memberHints" class="textbox fWidth" readonly style="background-color:#FDFDFD;"></td></tr>
   <tr><td colspan="2" bgcolor="#C6FFD5"><span id="memberDetails" style="height:30px; width:100px;" > -- </span></td></tr>
   <tr><td>Property</td><td><input type="text" name="propertyHints" id="propertyHints" class="textbox fWidth" style="width:90px;" onchange="propListPopUp('propertyHints' ,'setProDetails' )" /><input type="button" onclick="propListPopUp('propertyHints' ,'setProDetails' )" value="Find" style="width:40px;" /></td></tr>
   <tr><td colspan="2"  bgcolor="#DFEFFF">
    <input type="hidden" name="propertyId" id="propertyId" class="textbox fWidth">
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
 
<div id="propListPopUpDIV" class="wtpopup" >

 <div id="propListPopUpDIVList"> &nbsp;</div>
 
 </div>
 
<!-- popups  ends  -->
<script>
function saveMemberData()
{
		// newly aded to member/aplicant
		var occupation=os.getVal('occupation');
		var reference=os.getVal('reference');
		var propertyReqDate=os.getVal('propertyReqDate');
		var adult=os.getVal('adult');
		var child=os.getVal('child');
		var pets=os.getVal('pets');
		var bankName=os.getVal('bankName');
		var bankAcNo=os.getVal('bankAcNo');
		var sortcode=os.getVal('sortcode');
		
		var bankDetails=os.getVal('bankDetails');
		var workingStatus=os.getVal('workingStatus');
		
		
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
		var corrAddress=os.getVal('corrAddress');
		var otherContact=escape(os.getVal('otherContact'));
		
	  
		var townCity=escape(os.getVal('townCity'));
		var outcome=escape(os.getVal('outcome'));
		var feedBackValue=escape(os.getVal('feedBackValue'));
		var locationId=escape(os.getVal('locationId'));
		
		
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
		
    
		//	if(os.check.empty('lastName','Missing surname')==false){ return false;}
		//	if(os.check.empty('firstName','Missing First Name')==false){ return false;}
		//	if(os.check.empty('flatOrHouseName','Missing flat Or HouseName')==false){ return false;}
		//	if(os.check.empty('address','Missing address')==false){ return false;}
		//	if(os.check.empty('postCode','Missing postCode')==false){ return false;}
					
		//	if(os.check.empty('corrAddress','Missing corr. Address')==false){ return false;}
		//	if(os.check.empty('telephone','Missing telephone')==false){ return false;}
		//	if(os.check.empty('mobile','Missing mobile')==false){ return false;}
		//	if(os.check.empty('email','Missing email')==false){ return false;}
		//	if(os.check.empty('minBudget','Missing Min Budget')==false){ return false;}
		//	if(os.check.empty('maxBudget','Missing Max Budget')==false){ return false;}
		
		
		
		
		
	//	if(os.check.empty('type','Select Type')==false){ return false;}
	 
		
		var url='memberId='+memberId+'&memberType='+memberType+'&minBudget='+minBudget+'&maxBudget='+maxBudget+'&lastName='+lastName+'&telephone='+telephone+'&requirements='+requirements+'&title='+title+'&mobile='+mobile+'&firstName='+firstName+'&activeMember='+activeMember+'&flatOrHouseName='+flatOrHouseName+'&willRetain='+willRetain+'&address='+address+'&postCode='+postCode+'&nextCall='+nextCall+'&email='+email+'&status='+status+'&requirementNotes='+requirementNotes+'&contactNotes='+contactNotes+'&source='+source+'&leasehold='+leasehold+'&leaseyears='+leaseyears+'&bed='+bed+'&bath='+bath+'&sofa='+sofa+'&type='+type+'&corrAddress='+corrAddress+'&otherContact='+otherContact+'&townCity='+townCity+'&outcome='+outcome+'&feedBackValue='+feedBackValue+'&occupation='+occupation+'&reference='+reference+'&propertyReqDate='+propertyReqDate+'&adult='+adult+'&child='+child+'&pets='+pets+'&bankName='+bankName+'&bankAcNo='+bankAcNo+'&bankDetails='+bankDetails+'&workingStatus='+workingStatus+'&sortcode='+sortcode+'&locationId='+locationId+'&';
	//alert(url);		         
		
		
		url='<? echo $site['url'] ?>aaajxSysytem.php?saveMemberData=OK&'+url;
	
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		
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

        var vendorList=os.getVal('vendorList');
		 var memberTypeList=os.getVal('memberTypeList');
		
        var srarchApplicant=os.getVal('srarchApplicant');
        var url='srarchApplicant='+srarchApplicant+'&vendorList='+vendorList+'&memberTypeList='+memberTypeList+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?listMemberData=OK&'+url;
	//	alert(url);
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
		
		os.setAjaxHtml('listMemberData_DIV',url);
		return false;



}
function fillMemberData(memberId)
{
      
        var url='memberId='+memberId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?fillMemberData=OK&'+url;
	 	os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
		
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
//s.setVal('requirementNotes',objMem.requirementNotes);
//os.setVal('contactNotes',objMem.contactNotes);
os.setVal('contactNotesDiv',objMem.contactNotes);
os.setVal('requirementNotesDiv',objMem.requirementNotes);
os.setVal('source',objMem.source);
os.setVal('code',objMem.code);
os.setVal('corrAddress',objMem.corrAddress);
os.setVal('otherContact',objMem.otherContact);

 
os.setVal('townCity',objMem.townCity);
os.setVal('outcome',objMem.outcome);
os.setVal('feedBackValue',objMem.feedBackValue);
 
// newly added to member/aplicant
os.setVal('occupation',objMem.occupation);
os.setVal('reference',objMem.reference);
os.setVal('propertyReqDate',objMem.propertyReqDate);
os.setVal('adult',objMem.adult);
os.setVal('child',objMem.child);
os.setVal('pets',objMem.pets);
os.setVal('bankName',objMem.bankName);
os.setVal('bankAcNo',objMem.bankAcNo);
os.setVal('sortcode',objMem.sortcode);
os.setVal('locationId',objMem.locationId);


os.setVal('bankDetails',objMem.bankDetails);
os.setVal('workingStatus',objMem.workingStatus);
// newly added to member/aplicant end


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
        open_pop_up('matchPropertiesDIV','Match Properties',1000,400);
        var  memberId =os.getVal('memberId');
		var url='memberId='+memberId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?matchProperties=OK&'+url;
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxHtml('matchPropertiesListDiv',url);
		return false;
   
   
 
 }
 function propListPopUp(searchTextId,functiontocall)
	{
	 // alert('propListPopUp');
	 
	    
		
		// alert('propListPopUp');
       var  searchText=os.getVal(searchTextId);
	   
		var url='searchText='+searchText+'&functiontocall='+functiontocall+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?propListPopUp=OK&'+url;
		os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxHtml('propListPopUpDIVList',url);
		 open_pop_up('propListPopUpDIV','Searched Propertties',1050,400);
		return false;
	 
	
	}
	
function setProDetails(data)
{
	var d=data.split('#');
	os.setVal('propertyId',d[0]);
	os.setVal('propertyHints',d[1]);
	os.setHtml('propertyDetails','Post '+d[2]+' Address  '+d[3]+'  '+d[4]+' Bed  '+d[5]);
     closepopup('propListPopUpDIV');
}
 
 
 
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
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
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
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxFunc('setAppoVal',url);
		return false;

	
	
            
 }
 
 
 function setAppoVal(data)
 {
    var d=data.split('###');
	alert(d[1]);
  var appointId=parseInt(d[0]);
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
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		
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
 
  dateCalander();
</script>
<script>
var  nextWeekDate=nextweek();

	var mId=os.getVal('memberId');
	if(mId==''){
	os.setVal('nextCall',nextWeekDate);
	 }
	 if(os.getVal('appoDate')=='')
	 {
	     
		 os.setVal('appoDate', toDayStr())
		 
	 }
	 
	 
	  function deleteAppo(appoId)
     {
      
        var p =confirm('Are you Sure?')
		if(p){
		var url='appoId='+appoId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?deleteAppo=OK&'+url;
	 	os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		
		os.setAjaxFunc('reloadAppo',url);
		}
		return false;

     }
	function reloadAppo()
	{
	  viewAppoByMember('');
	} 
	 
	 
	  function deleteMember(memberId)
     {
        if(memberId<1){
		 var  memberId =os.getVal('memberId');
			}
			
			 if(memberId<1){ alert('No record Selected'); return;}
			// alert(memberId);
			 
			 
        var p =confirm('Are you Sure? You are going to delete a record!')
		if(p){
		var url='memberId='+memberId+'&';
		url='<? echo $site['url'] ?>/aaajxSysytem.php?deleteMember=OK&'+url;
	 	os.animateMe.div='div_busy';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		
		os.setAjaxFunc('reloadMemberList',url);
		}
		return false;

     }
	function reloadMemberList(data)
	{
	//alert(data);
	  listMemberData(); 
	} 
	 
	</script>

</div>  <!-- end viewport-->
<? 
$defaultApplicant=$_GET['defaultApplicant'];
if($defaultApplicant>0){
?> <script> fillMemberData('<? echo  $defaultApplicant ?>'); </script><?

}

?>

<? 
$defaultAppo=$_GET['defaultAppo'];
if($defaultAppo>0){
?> <script> 

fillAppoData('<? echo  $defaultAppo ?>');
open_pop_up('viewCalenderDIV','view Calender',1100,550);
 </script><?

}

?>
<script>
function setfollowup()
{

var memberId=os.getVal('memberId');
 
if(memberId!='')
{
setnextCallShow(memberId,'1');
}

}

  function addLocation(){
							  var loc = prompt("Add new Area");
							   if(loc)
							   {
							      var loc=loc.trim();
								  if(loc!='')
								  {
										var url='loc='+loc+'&';
										url='<? echo $site['url'] ?>/aaajxSysytem.php?addLocation=OK&'+url;
										os.animateMe.div='div_busy';
										os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';
										os.setAjaxFunc('addLocationResult',url);
										return false; 
								  }
								   
								       
							   }
							 }
							 
							 function addLocationResult(data)
							 {
							       
								  if(data!=''){  
								   os.setHtml('locationId',data);
								   
								   }
								   return;
								   /*
								    var d=data.split('##');
							   
							        var locId=parseInt(d[0]);
									if(locId>0){
									
									
									var option = document.createElement("option");
									option.text = d[1];
									option.value = locId;
							        var locationId = os.getObj("locationId");
									locationId.appendChild(option);
									//locationId.add(option,0);   not work
								 	os.setVal('locationId',locId);
									
									
									
									}*/
							   
							 }
</script>


<? include('aaBottom.php')?>