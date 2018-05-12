<?php
include('includes/config.php');
include('aaTop.php');
// config 
$listHeader='List Landlordbill';
$primeryTable='landlordbill';
$primeryField='landlordbillId';




?>
 <table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?> 	<span id="div_busy"> </span> </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%" border="1" cellspacing="1" cellpadding="1">
			 
  <tr>
    <td width="350" height="470" valign="top">
	<div >
	<input type="button" value="Delete" onclick="WT_landlordbillDeleteRowById('');" />	 
	&nbsp;&nbsp;
	<span   onclick="landlordbillPrint()"><input class="" type="button" value="Print" /></span> 
	&nbsp; <input type="button" value="Save" onclick="WT_landlordbillEditAndSave();" />
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 		
	 
<tr >
	  									<td>Date </td>
										<td><input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Rent Amount </td>
										<td><input value="<?php if(isset($pageData['rentAmountLandlord'])){ echo $pageData['rentAmountLandlord']; } ?>" type="text" name="rentAmountLandlord" id="rentAmountLandlord" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>-Commission </td>
										<td><input value="<?php if(isset($pageData['commission'])){ echo $pageData['commission']; } ?>" type="text" name="commission" id="commission" class="textbox fWidth"/>  
										</td>						
										</tr>
										
										<tr>
										<td colspan="2">
										 <div>
 
	<? 

include('quickEditPage.php'); 

$options['PageHeading']='Add Fees';  
$options['foreignId']='landlordbillId'; 
$options['foreignTable']='landlordbill';
$options['table']='landlordbillotherfees';
$options['tableId']='landlordbillotherfeesId';
$options['tableQuery']="select * from landlordbillotherfees where [condition] order by landlordbillotherfeesId "; 
$options['fields']=array('sign'=>'','title'=>'Description','amount'=>'Amount');
$options['type']=array('sign'=>'DD','title'=>'T','amount'=>'T'); 
$options['relation']=array('sign'=>'operationSign','title'=>'','amount'=>''); 
$options['class']=array('sign'=>'otherdropdown','title'=>'othertexts','amount'=>'otheramount');  ## add jquery date class
$options['add']='1';
$options['delete']='1';
$options['defaultValues']=array();   
$options['afterSaveCallback']=array('php'=>'calculateRentLandlordTotal','javaScript'=>'setRentTotal');  
$functionId='rentLandlord';
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
		 
		
		   
		
		var rentAmountLandlord=parseFloat(os.getVal('rentAmountLandlord'));
		var commission=parseFloat(os.getVal('commission'));
		var totalVal=  rentAmountLandlord-commission;
		
		totalVal= totalVal+parseFloat(eval(callBackOutput)) ;
		totalVal=totalVal.toFixed(2);
		os.setVal('paybleAmount',totalVal);
	   
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
$options['foreignTable']='landlordbill';
$options['table']='payments';
$options['tableId']='paymentsId';
$options['tableQuery']="select * from payments where linkedIdFields='landlordbillId'  and [condition] order by paymentsId "; 
$options['fields']=array('dated'=>'Date','amount'=>'Amount','mode'=>'Mode','details'=>'details');
$options['type']=array('dated'=>'D','amount'=>'T','mode'=>'DD','details'=>'T'); 
$options['relation']=array('dated'=>'','amount'=>'','mode'=>'paymentMode','details'=>''); 
$options['class']=array('dated'=>'dtpk payDate','amount'=>'paymentText','mode'=>'paymentdown','details'=>'paymentText');  ## add jquery date class
$options['add']='1';
$options['delete']='1';
$options['defaultValues']=array('linkedIdFields'=>'landlordbillId','direction'=>'OUT','title'=>'Payments to Landlord','note'=>'');   
$options['afterSaveCallback']=array('php'=>'calculatePaymentTotal','javaScript'=>'setPaymentTotal');  
$functionId='paymentsLandlord';
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
		os.setVal('paidAmount',totalVal);	 
		 
 }
 
 </script>


  </div></td></tr>
										
										
										
										
										<tr >
	  									<td>Paid Amount </td>
										<td><input value="<?php if(isset($pageData['paidAmount'])){ echo $pageData['paidAmount']; } ?>" type="text" name="paidAmount" id="paidAmount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Payment Status </td>
										<td><select name="paymentStatus" id="paymentStatus" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->landlordpaymentStatus,$pageData['paymentStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
														
		 								
	</table>					
	<input type="hidden"  id="landlordbillId" value="0" />	
	<input type="hidden"  id="WT_landlordbillpagingPageno" value="1" />							
	<input type="button" value="Delete" onclick="WT_landlordbillDeleteRowById('');" />	 
	&nbsp;&nbsp;
	<span   onclick="landlordbillPrint()"><input class="" type="button" value="Print" /></span> 
	&nbsp; <input type="button" value="Save" onclick="WT_landlordbillEditAndSave();" />
	</div>	</td>
    <td valign="top">
	
	
 
     From Date: <input class="dtpk" type="text" name="f_dated_s" id="f_dated_s" value="<?php echo $f_dated_s?>" style="width:100px;" /> &nbsp;  
  To Date: <input class="dtpk" type="text" name="t_dated_s" id="t_dated_s" value="<?php echo $t_dated_s?>" style="width:100px;" /> &nbsp; 
	  
   
	  <div style="display:none">
  Search Key  
  <input type="text" id="searchKey" />   &nbsp;
        Month:
	
	<select name="rentMonth_s" id="rentMonth_s" class="textbox fWidth" ><option value="">Select Month</option>	<? 
										  $os->onlyOption($os->rentMonth,$rentMonth_s);	?></select>	
   Year:
	
	<select name="rentYear_s" id="rentYear_s" class="textbox fWidth" ><option value="">Select Year</option>	<? 
										  $os->onlyOption($os->rentYear,$rentYear_s);	?></select>	 
 
   Note: <input type="text" name="note_s" id="note_s" value="<?php echo $note_s?>" style="width:100px;" /> &nbsp;  
  
  </div>
  <input type="button" value="Search" onclick="WT_landlordbillListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer; display:none;"/>
	
	<div style="padding:5px;" id="WT_landlordbillListDiv">&nbsp; </div>
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
setCurrentDateIfBlank('f_dated_s');
setCurrentDateIfBlank('t_dated_s');

function WT_landlordbillListing()
{
	
  var rentMonth_sV= os.getVal('rentMonth_s'); 
 var rentYear_sV= os.getVal('rentYear_s'); 	
 var f_dated_sV= os.getVal('f_dated_s'); 
 var t_dated_sV= os.getVal('t_dated_s'); 
 var note_sV= os.getVal('note_s'); 
 var params='rentMonth_s='+rentMonth_sV +'&rentYear_s='+rentYear_sV +'&f_dated_s='+f_dated_sV +'&t_dated_s='+t_dated_sV +'&note_s='+note_sV +'&';
	var searchKey=os.getVal('searchKey');
	var WT_landlordbillpagingPageno=os.getVal('WT_landlordbillpagingPageno');
	
	var url='wtpage='+WT_landlordbillpagingPageno+'&searchKey='+searchKey;
	url='<? echo $site['url'] ?>landlordbillEditAjax.php?WT_landlordbillListing=OK&'+params+url;
	//alert(url);
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxHtml('WT_landlordbillListDiv',url);
	return false;

}
 WT_landlordbillListing();
function  searchReset()
	{
		  os.setVal('rentMonth_s',''); 
 os.setVal('rentYear_s',''); 	
	    os.setVal('f_dated_s',''); 
 os.setVal('t_dated_s',''); 
 os.setVal('note_s',''); 
	
	   os.setVal('searchKey','');
	   WT_landlordbillListing();
	}
	
 
function WT_landlordbillEditAndSave()
{
	         	      
	//var p=confirm('Are you sure? ')	;	
	//if(p!=true){ return;}		    	         
	
	var datedV= os.getVal('dated'); 
var rentAmountLandlordV= os.getVal('rentAmountLandlord'); 
var commissionV= os.getVal('commission'); 
var paybleAmountV= os.getVal('paybleAmount'); 
var paidAmountV= os.getVal('paidAmount'); 
var paymentStatusV= os.getVal('paymentStatus'); 
var noteV= os.getVal('note'); 


var url='dated='+datedV+'&rentAmountLandlord='+rentAmountLandlordV+'&commission='+commissionV+'&paybleAmount='+paybleAmountV+'&paidAmount='+paidAmountV+'&paymentStatus='+paymentStatusV+'&note='+noteV+'&';
	
	
	var  landlordbillId =os.getVal('landlordbillId');
	
	var pkStr='landlordbillId='+landlordbillId+'&';
	
	url='<? echo $site['url'] ?>landlordbillEditAjax.php?WT_landlordbillEditAndSave=OK&'+pkStr+url;
	
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxFunc('WT_landlordbillReLoadList',url);
	return false;

}	

function WT_landlordbillReLoadList(data)
{
	var d=data.split('#-#');
	var landlordbillId=parseInt(d[0]);
	if(d[0]!='Error' && landlordbillId>0)
	{
	// alert(d[0]);
	  os.setVal('landlordbillId',landlordbillId);
	}
	
	
	if(d[1]!=''){alert(d[1]);}
	
	WT_landlordbillListing();
}

function WT_landlordbillGetById(landlordbillId)
{
		
	  if(parseInt(landlordbillId)<1 || landlordbillId==''){  
		var  landlordbillId =os.getVal('landlordbillId');
		}
		var url='landlordbillId='+landlordbillId+'&';
		url='<? echo $site['url'] ?>landlordbillEditAjax.php?WT_landlordbillGetById=OK&'+url;
		os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_landlordbillFillData',url);
		return false;
			
			
			
}

function WT_landlordbillFillData(data)
{

var objJSON = JSON.parse(data);
os.setVal('landlordbillId',parseInt(objJSON.landlordbillId));

 os.setVal('dated',objJSON.dated); 
 os.setVal('rentAmountLandlord',objJSON.rentAmountLandlord); 
 os.setVal('commission',objJSON.commission); 
 os.setVal('paybleAmount',objJSON.paybleAmount); 
 os.setVal('paidAmount',objJSON.paidAmount); 
 os.setVal('paymentStatus',objJSON.paymentStatus); 
 os.setVal('note',objJSON.note); 

 ajaxViewrentLandlord(parseInt(objJSON.landlordbillId));  ///// function call editQuickAjax
ajaxViewpaymentsLandlord(parseInt(objJSON.landlordbillId)); 
 
}

function WT_landlordbillDeleteRowById(landlordbillId)
     {
       if(parseInt(landlordbillId)<1 || landlordbillId==''){  
		var  landlordbillId =os.getVal('landlordbillId');
		}
		
			
		if(parseInt(landlordbillId)<1){ alert('No record Selected'); return;}
			 
			 
		
        var p =confirm('Are you Sure? You want to delete this record forever.')
		if(p){
		var url='landlordbillId='+landlordbillId+'&';	 
		url='<? echo $site['url'] ?>landlordbillEditAjax.php?WT_landlordbillDeleteRowById=OK&'+url;
	 	os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_landlordbillDeleteRowByIdResults',url);
		}
		return false;

     }
	function WT_landlordbillDeleteRowByIdResults(data)
	{
	   alert(data);
	   WT_landlordbillListing();
	} 

   function wtAjaxPagination(pageId,pageNo)
   {
    
     os.setVal('WT_landlordbillpagingPageno',parseInt(pageNo));
	 WT_landlordbillListing();
   }
	 function landlordbillPrint()
	{
	 var landlordbillId=os.getVal('landlordbillId');
	  if(landlordbillId<1){ alert('Please Select record'); return;}
	  
	
	  var url='<? $site['url'] ?>landlordbillPrint.php?landlordbillId='+landlordbillId;
       popupURL(url);
	 
	} 
</script>

  
	<? include('aaBottom.php')?>