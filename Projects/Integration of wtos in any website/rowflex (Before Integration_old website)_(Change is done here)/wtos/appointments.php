<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='vendorEdit';
$listPAGE='vendor';
$primeryTable='member';
$primeryField='memberId';
$listHeader='Appointment/Followup';

 
$os->setFlash($flashMsg);
//tinyMce();

//searching......


#customer autocomplete start#
$customerString = '';
$customerRS = $os->mq("SELECT firstName,lastName,type,address,memberId FROM  member");
	while ($customerRow = $os->mfa($customerRS)) {
	
	  $customerRow['address']=str_replace("\n",',',	  $customerRow['address']);
			
		$customerString.= $customerRow['lastName'].' '.$customerRow['firstName'].'@'.$customerRow['type'].'@'.addslashes($customerRow['address']).'*'.$customerRow['memberId'].'##';
	}
	
	  $loadImage=$site['url'].'image/loading.gif'; 
	       $loadImage=$site['url'].'image/ele.gif'; 
	
#customer autocomplete end#

?>

	<table class="container" style="background-color:#FBFAF9">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px; border:#FF0000 0px solid;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  <style>
			  .bbuton{ cursor:pointer; }
			  .areaMember{ border:1px solid #666666; height:200px; width:710px;-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px; padding:1px; background-color:#F0EFEC;}
			  .calenderArea{border:1px solid #666666; height:410px; width:98%;-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px; margin:2px;padding:1px;background-color:#FFFFFF;}
			  
			  
			  .divForm{border:1px solid #666666; height:720px; width:730px;-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px; float:left;padding:1px;}
			   .divApps{border:1px solid #666666; height:720px; width:410px;-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;float:left;padding:1px;}
			   .margzero{ margin:0;}
			  </style>
			  
			  
			  
			  
			  
			  <table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td> Last Name <input id="searchBox"  placeholder="Please search by last name" type="text" name="searchMember" style="width:300px;" class="textbox fWidth nameAuto" onblur="getCustomerDetails()"/><input type="button" value="Search" onclick="getCustomerDetails()" /> &nbsp; Not Found! Click <input class="bbuton" type="button" value="New Registration" name="registrationMember" onclick="newRegistration()"  />
	
	
	
	 </td>
	 </tr></table>
	 
	 
	 <div class="divForm">
	 
	 <div id="ele">
	 <br /><br />
	 <img src="<? echo $loadImage ?>" />
	 </div>
	 
	 
			 <div id="RegistrationDiv" style="display:none;">
			 
	 <iframe id="registrationMember" src="" frameborder="0" width="700" height="165" class="margzero"></iframe>
	

	 <table border="0" cellspacing="1" cellpadding="1">
	<tr>
    <td>
	<b>Other Details</b>
	<div id="applicantsArea" class="areaMember">
	 <iframe id="memberquery" src="" frameborder="0" width="700" height="190" class="margzero"></iframe>
	
	
	
	 </div>
	<div id="vendorArea" style="display:none" class="areaMember"></div>
	
	<div id="OtherArea" style="display:none"  class="areaMember"></div>
	
	
	
	</td>
	</tr><tr>
	
	 <td>
	<b>Appointments/Followup</b>
	<div id="appointsMents" class="areaMember" style="height:300px;">
	 <iframe id="alerts" src="" frameborder="0" width="700" height="280" class="margzero"></iframe>
	</div>
	
	
	
	
	</td>
	
	
	
	
	</tr>
 
</table>
</div>



	  <div id="newRegistration" style="display:none;"> 
	  
	  
	  <div class="areaMember" style="text-align:center; height:300px;">
	  <div style="font-size:20px" >New Member Registration</div>
	  
	  <br />
	 
	  
	  <table border="0" class="formClass"   >
			<tr >
	  									<td>Member Type </td>
										<td colspan="5"> <select name="type" id="type" class="textbox fWidth" >	<option value="">Select Type</option><? 
										  $os->onlyOption($os->memberType,$pageData['type']);	?></select>
										   
										</td>						
										 	
										</tr>
										
										<tr >									
						
			<tr >
	  									<td>First Name </td>
										<td><input value="<?php if(isset($pageData['firstName'])){ echo $pageData['firstName']; } ?>" type="text" name="firstName" id="firstName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Last Name </td> 
										<td><input value="<?php if(isset($pageData['lastName'])){ echo $pageData['lastName']; } ?>" type="text" name="lastName" id="lastName" class="textbox fWidth"/>
										</td>			
										</tr>
										
										<tr >
										
	  									<td>Mobile </td> 
										<td><input value="<?php if(isset($pageData['mobile'])){ echo $pageData['mobile']; } ?>" type="text" name="mobile" id="mobile" class="textbox fWidth"/>
										</td>						
										
	  													
										
											
										
													
										
	  									<td>Email </td>
										<td><input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" id="email" class="textbox fWidth" />
										</td>						
										</tr>
										
											
										
						
						</table>
	  <br />
	    <br />
		
	  
	  <input type="button"  value="Save New Registration" style="cursor:pointer;" onclick="saveNewregistration();" />
	  
	  <div id="div_newreg"> &nbsp;</div>
	  
	 
	   
	  
	  </div></div>

    



		</div>	 
				 
	 <div class="divApps">	
	<b>  Calender</b>
	<div id="calenderArea" class="calenderArea" style="text-align:center;">
	<div style="padding:3px;">
	<div style="padding:3px;">
				  From <input type="text" name="sDate" id="sDate" class="dtpk textbox " value="<? echo $os->viewToday();?>"  style="width:65px;" />  &nbsp;
			   To <input type="text" name="eDate" id="eDate" class="dtpk textbox " value="<? echo $os->viewNextWeek();?>"  style="width:65px;"  /> 
			   
			   &nbsp;<input type="button" value="VIEW" onclick="drawGrid()" />&nbsp;
			   </div>
	<input type="button" value="Prev Week" onclick="setWeek('P')" />
	
			
				
				<input type="button" value="Next Week" onclick="setWeek('N')" />
				</div>
				
			 
	 <iframe id="calenderFrame" src="" frameborder="0" width="400" height="350" class="margzero"></iframe>	
	
	</div>
	<br />
	
	<div id="documents" class="calenderArea" style="height:250px; display:none;">
	<b>Documents</b>
	 <iframe id="memberdoc" src="" frameborder="0" width="400" height="290" class="margzero"></iframe>		

	</div>
	
		
	</div>	 			 

			  <!--   ggggggggggggggg  --> 
			  
			  </td>
			  </tr>
			</table>

<script> dateCalander();

function getCustomerDetails(cStr){
  var cStr=os.getVal('searchBox');
 
		if(cStr!=''){
			cStr = cStr.split('*');
			var memberId = cStr[1];
			 
			if(memberId>0){
			var customerName = cStr[0];
			
			// os.setVal('memberId',memberId);	
			
			  
			   viewmemberData(memberId)
			    
			  	   
				//alert (srci);
				
			 //alert(memberId);
		
			
			//var url = '<?php echo $site['url'];?>ajxSysytem.php?getCustomerDetailsFlds=1&memberId='+memberId;
		 
			}else{
			
			 	
			}
		}
	}
	
	function viewmemberData(memberId)
	{
	
	  var registrationMemberFL='registrationMember.php?memberId='+memberId;
			  var memberqueryFL='memberquery.php?memberId='+memberId;
			  var alertsFL='alerts.php?memberId='+memberId;
			  var memberdocFL='memberdoc.php?memberId='+memberId;
			  
			  os.getObj('registrationMember').src=registrationMemberFL;
			  os.getObj('memberquery').src=memberqueryFL;
			  os.getObj('alerts').src=alertsFL;
			  os.getObj('memberdoc').src=memberdocFL;
			  
			  
			  
			   os.show('RegistrationDiv');
			   os.show('documents');
			   os.hide('newRegistration');
			   os.hide('ele');
			   
			   
			   
			    
				
	
	}
	
	
	
	
	function newRegistration()
	{
	os.hide('ele');
	          os.hide('RegistrationDiv');
			   os.hide('documents');
			   os.show('newRegistration');
	
	
	
	}
	
	function saveNewregistration()
    {
	
	   
	
	
     var type=os.getVal('type');
	 var firstName=os.getVal('firstName');
	 var lastName=os.getVal('lastName');
	 var mobile=os.getVal('mobile');
	  var email=os.getVal('email');
	  
	  if(os.check.empty('type','Select Type')==false){ return false;}
	  if(os.check.empty('firstName','Select First Name')==false){ return false;}
	  if(os.check.empty('lastName','Select Last Name ')==false){ return false;}
	  if(os.check.empty('email','Select email')==false){ return false;}
	  
	  
	  
     var url='type='+type+'&firstName='+firstName+'&lastName='+lastName+'&mobile='+mobile+'&email='+email+'&';
     url='<? echo $site['url'] ?>/ajxSysytem.php?saveNewregistration=OK&'+url;
	//alert(url);
	os.animateMe.div='div_newreg';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Checking Monthly List...</div>';
	
	 os.setAjaxFunc('gottomemberdetails',url);
    return false;

}
function gottomemberdetails(data)
{
 //alert(data);
 memberId=parseInt(data);
 viewmemberData(memberId)
}
	
</script>





<script>
var cval = "<?php echo $customerString;?>".split("##");
  $(document).ready(function(){    
	$(".nameAuto").autocomplete(cval);
  });    
</script>
   
	<? include('bottom.php')?>