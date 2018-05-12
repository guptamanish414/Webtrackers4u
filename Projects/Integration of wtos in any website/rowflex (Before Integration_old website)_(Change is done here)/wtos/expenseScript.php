<?php
include('includes/config.php');
include('aaTop.php');
// config 
$listHeader='List Expense';
$primeryTable='expense';
$primeryField='expenseId';




?>
 <table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?> 	<span id="div_busy"> </span> </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%" border="1" cellspacing="1" cellpadding="1">
			   
  <tr>
    <td width="450" height="470" valign="top">
	<div style="  position:fixed; top:120px;" >
	<input type="button" value="Delete" onclick="WT_expenseDeleteRowById('');" />	 &nbsp; <input type="button" value="Save" onclick="WT_expenseEditAndSave();" />
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	
										<tr >
	  									<td>Category </td>
										<td><select name="category" id="category" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->expCategory,$pageData['category']);	?></select>	
  
										</td>						
										</tr>
	 		
	 
<tr >
	  									<td>Date </td>
										<td><input value="<?php if(isset($pageData['dated'])){ echo $os->showDate($pageData['dated']); } ?>" type="text" name="dated" id="dated" class="dtpk textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Title </td>
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Amount </td>
										<td><input value="<?php if(isset($pageData['amount'])){ echo $pageData['amount']; } ?>" type="text" name="amount" id="amount" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Expense To </td>
										<td><input value="<?php if(isset($pageData['expenseTo'])){ echo $pageData['expenseTo']; } ?>" type="text" name="expenseTo" id="expenseTo" class="textbox fWidth"/>
										</td>						
										</tr>
											
											
											
											
											
											
											<tr>  <td colspan="4"><br /><br /> Payment details</td></tr>	
										<tr><td colspan="4"><div>
 <? include('quickEditPage.php');  ?>
	<? 

 
$options=array();
$options['PageHeading']='Expense Payments';  
$options['foreignId']='linkedIdValue'; 
$options['foreignTable']='expense';
$options['table']='payments';
$options['tableId']='paymentsId';
$options['tableQuery']="select * from payments where linkedIdFields='expenseId'  and [condition] order by paymentsId "; 
$options['fields']=array('dated'=>'Date','amount'=>'Amount','mode'=>'Mode','details'=>'details');
$options['type']=array('dated'=>'D','amount'=>'T','mode'=>'DD','details'=>'T'); 
$options['relation']=array('dated'=>'','amount'=>'','mode'=>'paymentMode','details'=>''); 
$options['class']=array('dated'=>'dtpk payDate','amount'=>'paymentText','mode'=>'paymentdown','details'=>'paymentText');  ## add jquery date class
$options['add']='1';
$options['delete']='1';
$options['defaultValues']=array('linkedIdFields'=>'expenseId','direction'=>'OUT','title'=>'Expense Payments','note'=>'');   
$options['afterSaveCallback']=array('php'=>false,'javaScript'=>false);  
$functionId='paymentsExpense';
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
  .paymentText{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:70px; }
  .otheramount{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:70px; }
  .formTR{ opacity:0.1;}
  .formTR:hover{ opacity:1;}
  .paymentdown{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:0px;-webkit-appearance: none; -moz-appearance: none;  text-indent: 1px; text-overflow: '';}
  .payDate{-moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; border:1px dotted #F2F2F2; width:80px;}
</style>
  

  </div></td></tr>
											
										
											
										
										<tr >
	  									<td>Payment Status </td>
										<td><select name="paymentStatus" id="paymentStatus" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->exppaymentStatus,$pageData['paymentStatus']);	?></select>	
  
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Note </td>
										<td><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
														
		 								
	</table>					
	<input type="hidden"  id="expenseId" value="0" />	
	<input type="hidden"  id="WT_expensepagingPageno" value="1" />							
	<input type="button" value="Save" onclick="WT_expenseEditAndSave();" />
	</div>	</td>
    <td valign="top">
	
	
 Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  From Date: <input class="dtpk" type="text" name="f_dated_s" id="f_dated_s" value="<?php echo $f_dated_s?>" style="width:100px;" /> &nbsp;  
  To Date: <input class="dtpk" type="text" name="t_dated_s" id="t_dated_s" value="<?php echo $t_dated_s?>" style="width:100px;" /> &nbsp; 
	  <div style="display:none">
  
       
 
   Expense To: <input type="text" name="expenseTo_s" id="expenseTo_s" value="<?php echo $expenseTo_s?>" style="width:100px;" /> &nbsp;  
   Category:
	
	<select name="category_s" id="category_s" class="textbox fWidth" ><option value="">Select Category</option>	<? 
										  $os->onlyOption($os->expCategory,$category_s);	?></select>	
   Payment Status:
	
	<select name="paymentStatus_s" id="paymentStatus_s" class="textbox fWidth" ><option value="">Select Payment Status</option>	<? 
										  $os->onlyOption($os->exppaymentStatus,$paymentStatus_s);	?></select>	
   Note: <input type="text" name="note_s" id="note_s" value="<?php echo $note_s?>" style="width:100px;" /> &nbsp;  
  
  </div>
  <input type="button" value="Search" onclick="WT_expenseListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>
	<div style="padding:5px;" id="WT_expenseListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>

<script>
 
function WT_expenseListing()
{
	
 var f_dated_sV= os.getVal('f_dated_s'); 
 var t_dated_sV= os.getVal('t_dated_s'); 
 var expenseTo_sV= os.getVal('expenseTo_s'); 
 var category_sV= os.getVal('category_s'); 
 var paymentStatus_sV= os.getVal('paymentStatus_s'); 
 var note_sV= os.getVal('note_s'); 
 var params='f_dated_s='+f_dated_sV +'&t_dated_s='+t_dated_sV +'&expenseTo_s='+expenseTo_sV +'&category_s='+category_sV +'&paymentStatus_s='+paymentStatus_sV +'&note_s='+note_sV +'&';
	var searchKey=os.getVal('searchKey');
	var WT_expensepagingPageno=os.getVal('WT_expensepagingPageno');
	
	var url='wtpage='+WT_expensepagingPageno+'&searchKey='+searchKey;
	url='<? echo $site['url'] ?>expenseEditAjax.php?WT_expenseListing=OK&'+params+url;
	//alert(url);
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxHtml('WT_expenseListDiv',url);
	return false;

}
 WT_expenseListing();
function  searchReset()
	{
			
	    os.setVal('f_dated_s',''); 
 os.setVal('t_dated_s',''); 
 os.setVal('expenseTo_s',''); 
 os.setVal('category_s',''); 
 os.setVal('paymentStatus_s',''); 
 os.setVal('note_s',''); 
	
	   os.setVal('searchKey','');
	   WT_expenseListing();
	}
	
 
function WT_expenseEditAndSave()
{
	         	      
	//var p=confirm('Are you sure? ')	;	
	//if(p!=true){ return;}		    	         
	
	var datedV= os.getVal('dated'); 
var titleV= os.getVal('title'); 
var amountV= os.getVal('amount'); 
var expenseToV= os.getVal('expenseTo'); 
var categoryV= os.getVal('category'); 
var paymentStatusV= os.getVal('paymentStatus'); 
var noteV= os.getVal('note'); 


var url='dated='+datedV+'&title='+titleV+'&amount='+amountV+'&expenseTo='+expenseToV+'&category='+categoryV+'&paymentStatus='+paymentStatusV+'&note='+noteV+'&';
	
	
	var  expenseId =os.getVal('expenseId');
	
	var pkStr='expenseId='+expenseId+'&';
	
	url='<? echo $site['url'] ?>expenseEditAjax.php?WT_expenseEditAndSave=OK&'+pkStr+url;
	
	os.animateMe.div='div_busy';
	os.animateMe.html='&nbsp;Please wait. Working...';
	
	os.setAjaxFunc('WT_expenseReLoadList',url);
	return false;

}	

function WT_expenseReLoadList(data)
{
	var d=data.split('#-#');
	var expenseId=parseInt(d[0]);
	if(d[0]!='Error' && expenseId>0)
	{
	// alert(d[0]);
	  os.setVal('expenseId',expenseId);
	}
	
	
	if(d[1]!=''){alert(d[1]);}
	
	WT_expenseListing();
}

function WT_expenseGetById(expenseId)
{
		
	  if(parseInt(expenseId)<1 || expenseId==''){  
		var  expenseId =os.getVal('expenseId');
		}
		var url='expenseId='+expenseId+'&';
		url='<? echo $site['url'] ?>expenseEditAjax.php?WT_expenseGetById=OK&'+url;
		os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_expenseFillData',url);
		return false;
			
			
			
}

function WT_expenseFillData(data)
{

var objJSON = JSON.parse(data);
os.setVal('expenseId',parseInt(objJSON.expenseId));

 os.setVal('dated',objJSON.dated); 
 os.setVal('title',objJSON.title); 
 os.setVal('amount',objJSON.amount); 
 os.setVal('expenseTo',objJSON.expenseTo); 
 os.setVal('category',objJSON.category); 
 os.setVal('paymentStatus',objJSON.paymentStatus); 
 os.setVal('note',objJSON.note); 

ajaxViewpaymentsExpense(parseInt(objJSON.expenseId));
}

function WT_expenseDeleteRowById(expenseId)
     {
       if(parseInt(expenseId)<1 || expenseId==''){  
		var  expenseId =os.getVal('expenseId');
		}
		
			
		if(parseInt(expenseId)<1){ alert('No record Selected'); return;}
			 
			 
		
        var p =confirm('Are you Sure? You want to delete this record forever.')
		if(p){
		var url='expenseId='+expenseId+'&';	 
		url='<? echo $site['url'] ?>expenseEditAjax.php?WT_expenseDeleteRowById=OK&'+url;
	 	os.animateMe.div='div_busy';
	    os.animateMe.html='&nbsp;Please wait. Working...';
		os.setAjaxFunc('WT_expenseDeleteRowByIdResults',url);
		}
		return false;

     }
	function WT_expenseDeleteRowByIdResults(data)
	{
	   alert(data);
	   WT_expenseListing();
	} 

   function wtAjaxPagination(pageId,pageNo)
   {
    
     os.setVal('WT_expensepagingPageno',parseInt(pageNo));
	 WT_expenseListing();
   }
	

</script>

  
<? include('aaBottom.php')?>