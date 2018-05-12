<?php
include('includes/config.php');
include('aaTop.php');
// config 
$listHeader='List Rentbill';
$primeryTable='rentbill';
$primeryField='rentbillId';




?>
<style>
.textbox{ width:70px;}
</style>
 <table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?> 	<span id="div_busy"> </span> </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%" border="1" cellspacing="1" cellpadding="1">
			 
  <tr>
    <td width="420" height="470" valign="top">
	<div  >
	<input type="button" value="Delete" onclick="WT_rentbillDeleteRowById('');" /> &nbsp;
	<span   onclick="rentbillPrint()"><input class="" type="button" value="Print" /></span>  &nbsp;
	
	 <input type="button" value="Save" onclick="WT_rentbillEditAndSave();" />	
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 		
	<tr >
	  									<td >Month </td>
										<td><select name="rentMonth" id="rentMonth" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->rentMonth,$pageData['rentMonth']);	?></select>	
  <select name="rentYear" id="rentYear" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->rentYear,$pageData['rentYear']);	?></select>	
										</td>						
										</tr> 
										
										
										 
										
										
										
										
										
										<tr >
	  									<td>Due Date </td>
										<td><input value="<?php if(isset($pageData['dueDate'])){ echo $os->showDate($pageData['dueDate']); } ?>" type="text" name="dueDate" id="dueDate" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										
											
										
										
										
										
										
<tr >
	  									<td>Rent Amount </td>
										<td><input value="<?php if(isset($pageData['rentAmount'])){ echo $pageData['rentAmount']; } ?>" type="text" name="rentAmount" id="rentAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										
											
										
										<tr >
	  									<td style="width:133px;"> + Arrears </td>
										<td><input value="<?php if(isset($pageData['rentArrears'])){ echo $pageData['rentArrears']; } ?>" type="text" name="rentArrears" id="rentArrears" class="textbox fWidth"/> 
										</td>						
										</tr>
											
										<tr >
	  									<td colspan="2" >  
										<div>
 
	<? 

include('quickEditPage.php'); 

$options['PageHeading']='Add Fees';  
$options['foreignId']='rentbillId'; 
$options['foreignTable']='rentbill';
$options['table']='rentbillotherfees';
$options['tableId']='rentbillotherfeesId';
$options['tableQuery']="select * from rentbillotherfees where [condition] order by rentbillotherfeesId "; 
$options['fields']=array('sign'=>'','title'=>'Description','amount'=>'Amount');
$options['type']=array('sign'=>'DD','title'=>'T','amount'=>'T'); 
$options['relation']=array('sign'=>'operationSign','title'=>'','amount'=>''); 
$options['class']=array('sign'=>'otherdropdown','title'=>'othertexts','amount'=>'otheramount');  ## add jquery date class
$options['add']='1';
$options['delete']='1';
$options['defaultValues']=array();   
$options['afterSaveCallback']=array('php'=>'calculateRentTotal','javaScript'=>'setRentTotal');  
$functionId='rent';
quickEdit_v_four($options ,0,$functionId);
?>
<style>
  .qaddButton{ font-size:10px; font-weight:bold; background-color:#009900;color:#FFFFFF; cursor:pointer; height:20px;  padding:0px; margin:0px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
  .qdeleteButton{ font-size:10px; font-weight:bold; background-color:#FF0000;color:#FFFFFF; cursor:pointer; height:20px;  padding:0px; margin:0px; line-height:10px;-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
   .wtclass<? echo $functionId?>{   margin:0px 5px 0px 0px; padding:0px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
  .wtclass<? echo $functionId?> tr{ height:10px;}
  .wtclass<? echo $functionId?> td{ height:10px; padding:0px;}
  .wtclass<? echo $functionId?> tr:hover{ background-color:#F0F0F0;}
   .wtclass<? echo $functionId?> .PageHeading{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; background:#007CB9; color:#FFFFFF; padding:2px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; font-style:italic;}
   .wtalise<? echo $functionId?>{ display:none;}
  .othertexts{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:120px; }
  .otheramount{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:70px; }
  .formTR{ opacity:0.1;}
  .formTR:hover{ opacity:1;}
  .otherdropdown{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:0px;-webkit-appearance: none; -moz-appearance: none;  text-indent: 1px; text-overflow: '';}
</style>
 <script>
 function setRentTotal(data)
 {
   
		var callBackOutput=data.split('-CALLBACKOUTPUT-');
		callBackOutput=callBackOutput[1];
		if(!callBackOutput){   callBackOutput='';      } 
		 
		
		
		
		var rentAmount=parseFloat(os.getVal('rentAmount'));
		var rentArrears=parseFloat(os.getVal('rentArrears'));
		var totalVal=  rentAmount+rentArrears;
		
		totalVal= totalVal+parseFloat(eval(callBackOutput)) ;
		totalVal=totalVal.toFixed(2);
		os.setVal('paybleAmount',totalVal);
	    setDueAmount();
		
		
			 
 }
 
  
 </script>



  </div>
										
										 </td>
										
										 					
										</tr>
										
										<tr >
	  									<td>Payble Amount </td>
										<td><input value="<?php if(isset($pageData['paybleAmount'])){ echo $pageData['paybleAmount']; } ?>" type="text" name="paybleAmount" id="paybleAmount" class="textbox fWidth"/>
										</td>						
										</tr>
										<tr>  <td colspan="4"><br /><br /> Payment details</td></tr>	
										<tr><td colspan="4"><div>
 
	<? 

 
$options=array();
$options['PageHeading']='Payments';  
$options['foreignId']='linkedIdValue'; 
$options['foreignTable']='rentbill';
$options['table']='payments';
$options['tableId']='paymentsId';
$options['tableQuery']="select * from payments where linkedIdFields='rentbillId'  and [condition] order by paymentsId "; 
$options['fields']=array('dated'=>'Date','amount'=>'Amount','mode'=>'Mode','details'=>'details');
$options['type']=array('dated'=>'D','amount'=>'T','mode'=>'DD','details'=>'T'); 
$options['relation']=array('dated'=>'','amount'=>'','mode'=>'paymentMode','details'=>''); 
$options['class']=array('dated'=>'dtpk payDate','amount'=>'paymentText','mode'=>'paymentdown','details'=>'paymentText');  ## add jquery date class
$options['add']='1';
$options['delete']='1';
$options['defaultValues']=array('linkedIdFields'=>'rentbillId','direction'=>'IN','title'=>'Rent Payments','note'=>'');   
$options['afterSaveCallback']=array('php'=>'calculatePaymentTotal','javaScript'=>'setPaymentTotal');  
$functionId='payments';
quickEdit_v_four($options ,0,$functionId);
?>
<style>
  .qaddButton{ font-size:10px; font-weight:bold; background-color:#009900;color:#FFFFFF; cursor:pointer; height:20px;  padding:0px; margin:0px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
  .qdeleteButton{ font-size:10px; font-weight:bold; background-color:#FF0000;color:#FFFFFF; cursor:pointer; height:20px;  padding:0px; margin:0px; line-height:10px;-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
   .wtclass<? echo $functionId?>{   margin:0px 5px 0px 0px; padding:0px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px;}
  .wtclass<? echo $functionId?> tr{ height:10px;}
  .wtclass<? echo $functionId?> td{ height:10px; padding:0px;}
  .wtclass<? echo $functionId?> tr:hover{ background-color:#F0F0F0;}
   .wtclass<? echo $functionId?> .PageHeading{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; background:#007CB9; color:#FFFFFF; padding:2px; -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; font-style:italic;}
   .wtalise<? echo $functionId?>{ display:none;}
  .paymentText{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:120px; }
  .otheramount{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:70px; }
  .formTR{ opacity:0.1;}
  .formTR:hover{ opacity:1;}
  .paymentdown{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:0px;-webkit-appearance: none; -moz-appearance: none;  text-indent: 1px; text-overflow: '';}
  .payDate{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:110px;}
</style>
  <script>
 function setPaymentTotal(data)
 {
   
		var callBackOutput=data.split('-CALLBACKOUTPUT-');
		callBackOutput=callBackOutput[1];
		if(!callBackOutput){   callBackOutput='';      } 
		 
		
		var totalVal= parseFloat(eval(callBackOutput)) ;
		totalVal=totalVal.toFixed(2);
		os.setVal('receivedAmount',totalVal);	 
		 setDueAmount();
 }
 
 </script>


  </div></td></tr>
										<tr>
	  									<td>Received Amount </td>
										<td><input value="<?php if(isset($pageData['receivedAmount'])){ echo $pageData['receivedAmount']; } ?>" type="text" name="receivedAmount" id="receivedAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Due Amount </td>
										<td><input value="<?php if(isset($pageData['dueAmount'])){ echo $pageData['dueAmount']; } ?>" type="text" name="dueAmount" id="dueAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										
										
										<tr >
	  									<td>Payment Status </td>
										<td><select name="paymentStatus" id="paymentStatus" class="textbox fWidth" style="width:100px;" >	<? 
										  $os->onlyOption($os->rentPaymentStatus,$pageData['paymentStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input style="width:300px;" value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
														
		 								
	</table>					
	<input type="hidden"  id="rentbillId" value="0" />	
	<input type="hidden"  id="WT_rentbillpagingPageno" value="1" />							
	<input type="button" value="Delete" onclick="WT_rentbillDeleteRowById('');" />  &nbsp;
	&nbsp;
	<span   onclick="rentbillPrint()"><input class="" type="button" value="Print" /></span> 
	&nbsp; <input type="button" value="Save" onclick="WT_rentbillEditAndSave();" />	
	
	<div style="display: none">
	Date <input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										 
	</div>
	</div>	</td>
    <td valign="top">
	
	

    
										  
										  
										   Property:
										   <? 
	
	   $bulkQuery=" select propertyId,houseNO,RoadName,postcode from property ";
		$rsSource=$os->mq($bulkQuery);
		while($record=$os->mfa( $rsSource))
		{ 
		$propertyArray[$record['propertyId']]=$record['houseNO'] . " ".$record['RoadName']. " ".$record['postcode'];
		}  ?>
	<select name="propertyId_s" id="propertyId_s" class="textbox " style="width:150px;" ><option value=""> ------------------------------   </option>		  	<? 
								
										  $os->onlyoption($propertyArray,$propertyId_s);?>
							</select>
	    From Due Date: <input class="dtpk" type="text" name="f_dueDate_s" id="f_dueDate_s" value="<?php echo $f_dueDate_s?>" style="width:100px;" /> &nbsp;  
  To Due Date: <input class="dtpk" type="text" name="t_dueDate_s" id="t_dueDate_s" value="<?php echo $t_dueDate_s?>" style="width:100px;" /> &nbsp; 
	 
  
  
								  
		 <div style="display:none">		
		  Search Key  
  <input type="text" id="searchKey" style="width:70px;" />   &nbsp;						  
  Month:
	
	<select name="rentMonth_s" id="rentMonth_s" class="textbox fWidth" ><option value="">Select Month</option>	<? 
										  $os->onlyOption($os->rentMonth,$rentMonth_s);	?></select>	
   Year:
	
	<select name="rentYear_s" id="rentYear_s" class="textbox fWidth" ><option value="">Select Year</option>	<? 
										  $os->onlyOption($os->rentYear,$rentYear_s);	?></select>			
   Payment Status:
	
	<select name="paymentStatus_s" id="paymentStatus_s" class="textbox fWidth" ><option value="">Select Payment Status</option>	<? 
										  $os->onlyOption($os->rentPaymentStatus,$paymentStatus_s);	?></select>	
   Note: <input type="text" name="note_s" id="note_s" value="<?php echo $note_s?>" style="width:100px;" /> &nbsp;  
  
  </div>
  <input type="button" value="Search" onclick="WT_rentbillListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer; display:none;"/>
	<div style="padding:5px;" id="WT_rentbillListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>

<script>
 //setCurrentMonth('rentMonth_s');
// setCurrentYesr('rentYear_s');
setCurrentDateIfBlank('f_dueDate_s');
setCurrentDateIfBlank('t_dueDate_s');
function WT_rentbillListing()
{
	
 var rentMonth_sV= os.getVal('rentMonth_s'); 
 var rentYear_sV= os.getVal('rentYear_s'); 
 var f_dueDate_sV= os.getVal('f_dueDate_s'); 
 var t_dueDate_sV= os.getVal('t_dueDate_s'); 
  var propertyId_sV= os.getVal('propertyId_s'); 
 var paymentStatus_sV= os.getVal('paymentStatus_s'); 
 var note_sV= os.getVal('note_s'); 
 var params='rentMonth_s='+rentMonth_sV +'&rentYear_s='+rentYear_sV +'&f_dueDate_s='+f_dueDate_sV +'&t_dueDate_s='+t_dueDate_sV +'&paymentStatus_s='+paymentStatus_sV +'&note_s='+note_sV+'&propertyId_s='+propertyId_sV +'&';
	var searchKey=os.getVal('searchKey');
	var WT_rentbillpagingPageno=os.getVal('WT_rentbillpagingPageno');
	
	var url='wtpage='+WT_rentbillpagingPageno+'&searchKey='+searchKey;
	url='<? echo $site['url'] ?>rentbillEditAjax.php?WT_rentbillListing=OK&'+params+url;
	//alert(url);
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxHtml('WT_rentbillListDiv',url);
	return false;

}
 WT_rentbillListing();
function  searchReset()
	{
			
	    os.setVal('rentMonth_s',''); 
 os.setVal('rentYear_s',''); 
 os.setVal('f_dueDate_s',''); 
 os.setVal('t_dueDate_s',''); 
 os.setVal('paymentStatus_s',''); 
 os.setVal('note_s',''); 
 os.setVal('propertyId_s',''); 
	
	   os.setVal('searchKey','');
	   WT_rentbillListing();
	}
	
 
function WT_rentbillEditAndSave()
{
	         	      
	//var p=confirm('Are you sure? ')	;	
	//if(p!=true){ return;}		    	         
	
	var rentAmountV= os.getVal('rentAmount'); 
var rentMonthV= os.getVal('rentMonth'); 
var rentYearV= os.getVal('rentYear'); 
var rentArrearsV= os.getVal('rentArrears'); 
var paybleAmountV= os.getVal('paybleAmount'); 
var receivedAmountV= os.getVal('receivedAmount'); 
var dueAmountV= os.getVal('dueAmount'); 
var dueDateV= os.getVal('dueDate'); 
var datedV= os.getVal('dated'); 
var paymentStatusV= os.getVal('paymentStatus'); 
var noteV= os.getVal('note'); 


var url='rentAmount='+rentAmountV+'&rentMonth='+rentMonthV+'&rentYear='+rentYearV+'&rentArrears='+rentArrearsV+'&paybleAmount='+paybleAmountV+'&receivedAmount='+receivedAmountV+'&dueAmount='+dueAmountV+'&dueDate='+dueDateV+'&dated='+datedV+'&paymentStatus='+paymentStatusV+'&note='+noteV+'&';
	
	
	var  rentbillId =os.getVal('rentbillId');
	
	var pkStr='rentbillId='+rentbillId+'&';
	
	url='<? echo $site['url'] ?>rentbillEditAjax.php?WT_rentbillEditAndSave=OK&'+pkStr+url;
	
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxFunc('WT_rentbillReLoadList',url);
	return false;

}	

function WT_rentbillReLoadList(data)
{ // alert(data);
	var d=data.split('#-#');
	var rentbillId=parseInt(d[0]);
	if(d[0]!='Error' && rentbillId>0)
	{
	// alert(d[0]);
	  os.setVal('rentbillId',rentbillId);
	}
	
	
	if(d[1]!=''){alert(d[1]);}
	
	WT_rentbillListing();
}

function WT_rentbillGetById(rentbillId)
{
		
	  if(parseInt(rentbillId)<1 || rentbillId==''){  
		var  rentbillId =os.getVal('rentbillId');
		}
		var url='rentbillId='+rentbillId+'&';
		url='<? echo $site['url'] ?>rentbillEditAjax.php?WT_rentbillGetById=OK&'+url;
		os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_rentbillFillData',url);
		return false;
			
			
			
}

function WT_rentbillFillData(data)
{

var objJSON = JSON.parse(data);
os.setVal('rentbillId',parseInt(objJSON.rentbillId));

 os.setVal('rentAmount',objJSON.rentAmount); 
 os.setVal('rentMonth',objJSON.rentMonth); 
 os.setVal('rentYear',objJSON.rentYear); 
 os.setVal('rentArrears',objJSON.rentArrears); 
 os.setVal('paybleAmount',objJSON.paybleAmount); 
 os.setVal('receivedAmount',objJSON.receivedAmount); 
 os.setVal('dueAmount',objJSON.dueAmount); 
 os.setVal('dueDate',objJSON.dueDate); 
 os.setVal('dated',objJSON.dated); 
 os.setVal('paymentStatus',objJSON.paymentStatus); 
 os.setVal('note',objJSON.note); 

ajaxViewrent(parseInt(objJSON.rentbillId));  ///// function call editQuickAjax
ajaxViewpayments(parseInt(objJSON.rentbillId)); 
 
}

function WT_rentbillDeleteRowById(rentbillId)
     {
       if(parseInt(rentbillId)<1 || rentbillId==''){  
		var  rentbillId =os.getVal('rentbillId');
		}
		
			
		if(parseInt(rentbillId)<1){ alert('No record Selected'); return;}
			 
			 
		
        var p =confirm('Are you Sure? You want to delete this record forever.')
		if(p){
		var url='rentbillId='+rentbillId+'&';	 
		url='<? echo $site['url'] ?>rentbillEditAjax.php?WT_rentbillDeleteRowById=OK&'+url;
	 	os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_rentbillDeleteRowByIdResults',url);
		}
		return false;

     }
	function WT_rentbillDeleteRowByIdResults(data)
	{
	   alert(data);
	   WT_rentbillListing();
	} 

   function wtAjaxPagination(pageId,pageNo)
   {
    
     os.setVal('WT_rentbillpagingPageno',parseInt(pageNo));
	 WT_rentbillListing();
   }
	
	function setDueAmount()
	{
	var paybleAmount=os.getVal('paybleAmount');
	var receivedAmount=os.getVal('receivedAmount');
	var dueAmount=parseFloat(paybleAmount)-parseFloat(receivedAmount);
	    dueAmount=dueAmount.toFixed(2);
	    os.setVal('dueAmount',dueAmount);
	 
	//  WT_rentbillEditAndSave();
	}
	
    function rentbillPrint()
	{
 
	 var rentbillId=os.getVal('rentbillId');
	  if(rentbillId<1){ alert('Please Select reord'); return;}
	  
	
	  var url='<? $site['url'] ?>rentBillPrint.php?rentbillId='+rentbillId;
       popupURL(url);
	 
	}
</script>

  
<? include('aaBottom.php')?>