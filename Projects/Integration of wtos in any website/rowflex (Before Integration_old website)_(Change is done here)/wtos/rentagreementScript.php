<?php
include('includes/config.php');
include('aaTop.php');
// config 
$listHeader='List Rentagreement';
$primeryTable='rentagreement';
$primeryField='rentagreementId';


 // delete unlinked bill  // deleted for the one time
$rentagreements=$os->get_rentagreement();
if(is_array($rentagreements))
{
  $rAr=array();
  foreach($rentagreements as $rentagreement )
  {
  
  
    $rAr[]= $rentagreement['rentagreementId'];
  
  }
  
  $rArStr=implode(',',$rAr);
  if($rArStr!=''){
 $nonLinkedBill="select rentbillId,rentagreementId from rentbill where rentagreementId NOT IN ($rArStr)";
 
  $nonLinkedBillObj=$os->mq($nonLinkedBill);
  while($deletIds=$os->mfa($nonLinkedBillObj))
  {
               
				$rentbillIdTodel=$deletIds['rentbillId'];
				$updateQuery="delete from rentbill where rentbillId='$rentbillIdTodel'";
			//	$os->mq($updateQuery);
				$updateQuery="delete from landlordbill where rentbillId='$rentbillIdTodel'";
			//	$os->mq($updateQuery);
				
				
  
  }
  }


}


 // delete unlinked bill  end







?>
<style></style>
 
 <table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?>  </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%" border="1" cellspacing="1" cellpadding="1">
			  
  <tr>
    <td width="470" height="470" valign="top">
	<div>
	<input type="button" value="Delete" onclick="WT_rentagreementDeleteRowById('');" />	 
	&nbsp;&nbsp;
	<span   onclick="rentagreementPrint()"><input class="" type="button" value="Print" /></span> 
	&nbsp; <input type="button" value="Save" onclick="WT_rentagreementEditAndSave();" />
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	
	<tr >
	  									<td>Property </td>
										<td colspan="10"><select name="propertyId" id="propertyId" class="textbox fWidth" >
							
							 		<?
							 $os->extraOptionField='RoadName';
							 $os->optionsHTML($pageData['propertyId'],'propertyId','title','property');
							 $os->extraOptionField='';
							?>
							</select>
  
										</td>						
										</tr>
										
										
										<tr >
	  									<td>Tenant </td>
										<td colspan="10"><select name="tenantId" id="tenantId" class="textbox fWidth" >
										<option></option>
							
							 		<?
							 $os->extraOptionField='address';
							 $os->optionsHTML($pageData['tenantId'],'memberId','firstName','member '," status='TENANT' and memberType like 'Existing%' ");
							  $os->extraOptionField='';
							?>
							</select>
  
										</td>						
										 
	  									
										</tr>
										
										<tr >
	  									
	  									<td>Landlord </td>
										<td colspan="10"><select name="landlordId" id="landlordId" class="textbox fWidth" >
							<option></option>
							 		<?
							 $os->extraOptionField='address';
							 $os->optionsHTML($pageData['landlordId'],'memberId','firstName','member '," status='LANDLORD'");
							  $os->extraOptionField='';
							?>
							</select>
  
										</td>						
										</tr>
										
											
	 		
	 
<tr >
	  									<td>Date </td>
										<td><input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										</td>						
										 
	  									<td>Agent Name </td>
										<td><input value="<?php if(isset($pageData['agentName'])){ echo $pageData['agentName']; } ?>" type="text" name="agentName" id="agentName" class="textbox fWidth"/>
										</td>						
										</tr>
										
										<tr >
	  									<td>Agreement From </td>
										<td><input value="<?php if(isset($pageData['fromDate'])){ echo $os->showDate($pageData['fromDate']); } ?>" type="text" name="fromDate" id="fromDate" class="dtpk textbox fWidth"/>
										</td>						
										 
	  									<td> To </td>
										<td><input value="<?php if(isset($pageData['toDate'])){ echo $os->showDate($pageData['toDate']); } ?>" type="text" name="toDate" id="toDate" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										
											
									
										
										
											
										
										<tr >
	  									<td>Rent Amount </td>
										<td><input value="<?php if(isset($pageData['rentAmount'])){ echo $pageData['rentAmount']; } ?>" type="text" name="rentAmount" id="rentAmount" class="textbox fWidth"  onkeyup="agreementCalc();"/>
										</td>						
										 
	  									<td>Deposit </td>
										<td><input value="<?php if(isset($pageData['deposite'])){ echo $pageData['deposite']; } ?>" type="text" name="deposite" id="deposite" class="textbox fWidth"  onkeyup="agreementCalc();"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Commission </td>
										<td><input value="<?php if(isset($pageData['commission'])){ echo $pageData['commission']; } ?>" type="text" name="commission" id="commission" class="textbox fWidth"/>
										</td>							
										 
	  									<td>Admin Fees </td>
										<td><input value="<?php if(isset($pageData['adminFees'])){ echo $pageData['adminFees']; } ?>" type="text" name="adminFees" id="adminFees" class="textbox fWidth"  onkeyup="agreementCalc();"/>
										</td>						
										</tr>
											
											<tr >
											
											<td>Status </td>
										<td><select name="status" id="status" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->agreementStatus,$pageData['status']);	?></select>	
  
										</td>	
	  									<td>Holding Deposit </td>
										<td><input value="<?php if(isset($pageData['holdingDeposite'])){ echo $pageData['holdingDeposite']; } ?>" type="text" name="holdingDeposite" id="holdingDeposite" class="textbox fWidth"  onkeyup="agreementCalc();"/>
										</td>						
										 
	  													
										</tr>
										
										
											
										
										<tr >
	  									<td>Due Date </td>
										<td><input value="<?php if(isset($pageData['rentDueDate'])){ echo $os->showDate($pageData['rentDueDate']); } ?>" type="text" name="rentDueDate" id="rentDueDate" class="dtpk textbox fWidth"/> 
										</td>						
										 
	  									<td>Payble Amount </td>
										<td><input value="<?php if(isset($pageData['paybleAmount'])){ echo $pageData['paybleAmount']; } ?>" type="text" name="paybleAmount" id="paybleAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											<tr >
	  									<td>Landlord Payment Date </td>
										<td><input value="<?php if(isset($pageData['landLordDueDate'])){ echo $os->showDate($pageData['landLordDueDate']); } ?>" type="text" name="landLordDueDate" id="landLordDueDate" class="dtpk textbox fWidth"/> 
										</td>						
										 
	  									<td>  </td>
										<td> 
										</td>						
										</tr>
											<tr style="display:none;" >
	  									<td>Landlord Amount </td>
										<td><input value="<?php if(isset($pageData['rentAmountLandlord'])){ echo $pageData['rentAmountLandlord']; } ?>" type="text" name="rentAmountLandlord" id="rentAmountLandlord" class="textbox fWidth"/>
										</td>	
										 <td>Type </td>
										<td><select name="type" id="type" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->agreementType,$pageData['type']);	?></select>	
  
										</td>			
	  													
										</tr>
											
											
										
										<tr >
	  														
										 
	  									<td>Note </td>
										<td colspan="10"><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth" style="width:342px;"/>
										</td>						
										</tr>
											
										
														
		 								
	</table>
	
	
						
	<input type="hidden"  id="rentagreementId" value="0" />	
	<input type="hidden"  id="WT_rentagreementpagingPageno" value="1" />							
	<input type="button" value="Delete" onclick="WT_rentagreementDeleteRowById('');" />	 
	&nbsp;&nbsp;
	<span   onclick="rentagreementPrint()"><input class="" type="button" value="Print" /></span> 
	&nbsp; <input type="button" value="Save" onclick="WT_rentagreementEditAndSave();" />
	</div>	
	
	<div id="documents" class="calenderArea" style="height:250px; display:none; padding-top:10px;">
	<b>Documents</b>
	 <iframe id="memberdoc" src="" frameborder="0" width="400" height="290" class=""></iframe>		

	</div>
	
	
	</td>
    <td valign="top">
	
	Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  
	  <div style="display:none">
  
       
From Date: <input class="dtpk" type="text" name="f_dated_s" id="f_dated_s" value="<?php echo $f_dated_s?>" style="width:100px;" /> &nbsp;  
  To Date: <input class="dtpk" type="text" name="t_dated_s" id="t_dated_s" value="<?php echo $t_dated_s?>" style="width:100px;" /> &nbsp;  
   Tenant:
	
	
	<select name="tenantId_s" id="tenantId_s" class="textbox fWidth" ><option value="">Select Tenant</option>		  	<? 
								
										  $os->optionsHTML($tenantId_s,'memberId','firstName','member ');?>
							</select>
   Landlord:
	
	
	<select name="landlordId_s" id="landlordId_s" class="textbox fWidth" ><option value="">Select Landlord</option>		  	<? 
								
										  $os->optionsHTML($landlordId_s,'memberId','firstName','member ');?>
							</select>
   Property:
	
	
	<select name="propertyId_s" id="propertyId_s" class="textbox fWidth" ><option value="">Select Property</option>		  	<? 
								
										  $os->optionsHTML($propertyId_s,'propertyId','title','property');?>
							</select>
   Type:
	
	<select name="type_s" id="type_s" class="textbox fWidth" ><option value="">Select Type</option>	<? 
										  $os->onlyOption($os->agreementType,$type_s);	?></select>	
   Agent Name: <input type="text" name="agentName_s" id="agentName_s" value="<?php echo $agentName_s?>" style="width:100px;" /> &nbsp;  
   Status:
	
	<select name="status_s" id="status_s" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->agreementStatus,$status_s);	?></select>	
   Note: <input type="text" name="note_s" id="note_s" value="<?php echo $note_s?>" style="width:100px;" /> &nbsp;  
  
  </div>
  <input type="button" value="Search" onclick="WT_rentagreementListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>
	<div style="padding:5px;" id="WT_rentagreementListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>

<script>
 
function WT_rentagreementListing()
{
	
 var f_dated_sV= os.getVal('f_dated_s'); 
 var t_dated_sV= os.getVal('t_dated_s'); 
 var tenantId_sV= os.getVal('tenantId_s'); 
 var landlordId_sV= os.getVal('landlordId_s'); 
 var propertyId_sV= os.getVal('propertyId_s'); 
 var type_sV= os.getVal('type_s'); 
 var agentName_sV= os.getVal('agentName_s'); 
 var status_sV= os.getVal('status_s'); 
 var note_sV= os.getVal('note_s'); 
 var params='f_dated_s='+f_dated_sV +'&t_dated_s='+t_dated_sV +'&tenantId_s='+tenantId_sV +'&landlordId_s='+landlordId_sV +'&propertyId_s='+propertyId_sV +'&type_s='+type_sV +'&agentName_s='+agentName_sV +'&status_s='+status_sV +'&note_s='+note_sV +'&';
	var searchKey=os.getVal('searchKey');
	var WT_rentagreementpagingPageno=os.getVal('WT_rentagreementpagingPageno');
	
	var url='wtpage='+WT_rentagreementpagingPageno+'&searchKey='+searchKey;
	url='<? echo $site['url'] ?>rentagreementEditAjax.php?WT_rentagreementListing=OK&'+params+url;
	//alert(url);
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxHtml('WT_rentagreementListDiv',url);
	return false;

}
 WT_rentagreementListing();
function  searchReset()
	{
			
	    os.setVal('f_dated_s',''); 
 os.setVal('t_dated_s',''); 
 os.setVal('tenantId_s',''); 
 os.setVal('landlordId_s',''); 
 os.setVal('propertyId_s',''); 
 os.setVal('type_s',''); 
 os.setVal('agentName_s',''); 
 os.setVal('status_s',''); 
 os.setVal('note_s',''); 
	
	   os.setVal('searchKey','');
	   WT_rentagreementListing();
	}
	
 
function WT_rentagreementEditAndSave()
{
	         	      
	//var p=confirm('Are you sure? ')	;	
	//if(p!=true){ return;}		    	         
	
	var datedV= os.getVal('dated'); 
var fromDateV= os.getVal('fromDate'); 
var toDateV= os.getVal('toDate'); 
var tenantIdV= os.getVal('tenantId'); 
var landlordIdV= os.getVal('landlordId'); 
var propertyIdV= os.getVal('propertyId'); 
var typeV= os.getVal('type'); 
var rentAmountLandlordV= os.getVal('rentAmountLandlord'); 
var commissionV= os.getVal('commission'); 
var rentAmountV= os.getVal('rentAmount'); 
var depositeV= os.getVal('deposite'); 
var holdingDepositeV= os.getVal('holdingDeposite'); 
var adminFeesV= os.getVal('adminFees'); 
var agentNameV= os.getVal('agentName'); 
var rentDueDateV= os.getVal('rentDueDate'); 
var paybleAmountV= os.getVal('paybleAmount'); 
var statusV= os.getVal('status'); 
var noteV= os.getVal('note'); 

var landLordDueDateV= os.getVal('landLordDueDate'); 

var url='dated='+datedV+'&fromDate='+fromDateV+'&toDate='+toDateV+'&tenantId='+tenantIdV+'&landlordId='+landlordIdV+'&propertyId='+propertyIdV+'&type='+typeV+'&rentAmountLandlord='+rentAmountLandlordV+'&commission='+commissionV+'&rentAmount='+rentAmountV+'&deposite='+depositeV+'&holdingDeposite='+holdingDepositeV+'&adminFees='+adminFeesV+'&agentName='+agentNameV+'&rentDueDate='+rentDueDateV+'&paybleAmount='+paybleAmountV+'&status='+statusV+'&note='+noteV+'&landLordDueDate='+landLordDueDateV+'&';
	
	
	var  rentagreementId =os.getVal('rentagreementId');
	
	var pkStr='rentagreementId='+rentagreementId+'&';
	
	url='<? echo $site['url'] ?>rentagreementEditAjax.php?WT_rentagreementEditAndSave=OK&'+pkStr+url;
	
	os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_rentagreementReLoadList',url);
	return false;

}	

function WT_rentagreementReLoadList(data)
{
	var d=data.split('#-#');
	var rentagreementId=parseInt(d[0]);
	if(d[0]!='Error' && rentagreementId>0)
	{
	// alert(d[0]);
	  os.setVal('rentagreementId',rentagreementId);
	}
	
	
	if(d[1]!=''){alert(d[1]);}
	
	WT_rentagreementListing();
}

function WT_rentagreementGetById(rentagreementId)
{
	 
	  if(parseInt(rentagreementId)<1 || rentagreementId==''){  
		var  rentagreementId =os.getVal('rentagreementId');
		}
		var url='rentagreementId='+rentagreementId+'&';
		url='<? echo $site['url'] ?>rentagreementEditAjax.php?WT_rentagreementGetById=OK&'+url;
		os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_rentagreementFillData',url);
		return false;
			
			
			
}

function WT_rentagreementFillData(data)
{

var objJSON = JSON.parse(data);
os.setVal('rentagreementId',parseInt(objJSON.rentagreementId));

 os.setVal('dated',objJSON.dated); 
 os.setVal('fromDate',objJSON.fromDate); 
 os.setVal('toDate',objJSON.toDate); 
 os.setVal('tenantId',objJSON.tenantId); 
 os.setVal('landlordId',objJSON.landlordId); 
 os.setVal('propertyId',objJSON.propertyId); 
 os.setVal('type',objJSON.type); 
 os.setVal('rentAmountLandlord',objJSON.rentAmountLandlord); 
 os.setVal('commission',objJSON.commission); 
 os.setVal('rentAmount',objJSON.rentAmount); 
 os.setVal('deposite',objJSON.deposite); 
 os.setVal('holdingDeposite',objJSON.holdingDeposite); 
 os.setVal('adminFees',objJSON.adminFees); 
 os.setVal('agentName',objJSON.agentName); 
 os.setVal('rentDueDate',objJSON.rentDueDate); 
 os.setVal('paybleAmount',objJSON.paybleAmount); 
 os.setVal('status',objJSON.status); 
 os.setVal('note',objJSON.note); 
 os.setVal('landLordDueDate',objJSON.landLordDueDate); 
 
  var memberdocFL='memberdoc.php?memberId='+objJSON.tenantId;
			     os.getObj('memberdoc').src=memberdocFL;
				  os.show('documents');


}

function WT_rentagreementDeleteRowById(rentagreementId)
     {
       if(parseInt(rentagreementId)<1 || rentagreementId==''){  
		var  rentagreementId =os.getVal('rentagreementId');
		}
		
			
		if(parseInt(rentagreementId)<1){ alert('No record Selected'); return;}
			 
			 
		
        var p =confirm('Are you Sure? You want to delete this record forever.')
		if(p){
		var url='rentagreementId='+rentagreementId+'&';	 
		url='<? echo $site['url'] ?>rentagreementEditAjax.php?WT_rentagreementDeleteRowById=OK&'+url;
	 	os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_rentagreementDeleteRowByIdResults',url);
		}
		return false;

     }
	function WT_rentagreementDeleteRowByIdResults(data)
	{
	   alert(data);
	   WT_rentagreementListing();
	} 

   function wtAjaxPagination(pageId,pageNo)
   {
    
     os.setVal('WT_rentagreementpagingPageno',parseInt(pageNo));
	 WT_rentagreementListing();
   }
	
	// // added script
	setCurrentDateIfBlank('dated');
	setCurrentDateIfBlank('fromDate');
	setCurrentDateIfBlank('rentDueDate');
	setCurrentDateIfBlank('landLordDueDate');
	 
	setNextDate('toDate',330);
	
	function agreementCalc()
	{
	  
	     os.setVal('rentAmountLandlord',os.getVal('rentAmount'));
	  
	//	var deposite=os.getVal('deposite');
	//	var holdingDeposite=os.getVal('holdingDeposite');
	//	var adminFees=os.getVal('adminFees');
		//var paybleAmount=int(deposite)-int(holdingDeposite)+int(adminFees);
		//os.setVal('paybleAmount',paybleAmount);
		
		 os.setVal('paybleAmount',os.getVal('rentAmount'));    
		
	}
	   
 function rentagreementPrint()
	{
	 var rentagreementId=os.getVal('rentagreementId');
	  if(rentagreementId<1){ alert('Please Select record'); return;}
	  
	
	  var url='<? $site['url'] ?>rentagreementPrint.php?rentagreementId='+rentagreementId;
       popupURL(url);
	 
	} 
</script>


  
<? include('aaBottom.php')?>