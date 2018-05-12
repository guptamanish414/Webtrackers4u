<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='couponEdit';
$listPAGE='coupon';
$primeryTable='coupon';
$primeryField='couponId';
$listHeader='Coupon List';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
##  delete row
if(varG('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,varG('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
	   }
}


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	  #---- edit section ----#
		
		
 $dataToSave['code']=varP('code'); 
 $dataToSave['details']=varP('details'); 
 $dataToSave['validFrom']=$os->saveDate(varP('validFrom')); 
 $dataToSave['validTo']=$os->saveDate(varP('validTo')); 
 
 $dataToSave['couponType']=varP('couponType'); 
 $dataToSave['productCount']=varP('productCount'); 
 $dataToSave['discount']=varP('discount'); 
 $dataToSave['productcategoryId']=varP('productcategoryId'); 
 $dataToSave['status']=varP('status'); 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['generateDate']=$os->saveDate(varP('generateDate')); 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		
		
	 
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$andcodeA=  $os->andField('code','code',$primeryTable,'%');
   $code=$andcodeA['value']; $andcode=$andcodeA['andField'];	 
$anddetailsA=  $os->andField('details','details',$primeryTable,'%');
   $details=$anddetailsA['value']; $anddetails=$anddetailsA['andField'];	 

    $f_generateDate= $os->setNget('f_generateDate',$primeryTable);
	$t_generateDate= $os->setNget('t_generateDate',$primeryTable);
   $andgenerateDate=$os->DateQ('generateDate',$f_generateDate,$t_generateDate,$sTime='00:00:00',$eTime='59:59:59');$andcouponTypeA=  $os->andField('couponType','couponType',$primeryTable,'%');
   $couponType=$andcouponTypeA['value']; $andcouponType=$andcouponTypeA['andField'];	 
$andproductcategoryIdA=  $os->andField('productcategoryId','productcategoryId',$primeryTable,'%');
   $productcategoryId=$andproductcategoryIdA['value']; $andproductcategoryId=$andproductcategoryIdA['andField'];	 
$andstatusA=  $os->andField('status','status',$primeryTable,'=');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 

   

echo $listingQuery=" select * from $primeryTable where $primeryField>0   $andcode  $anddetails  $andgenerateDate  $andcouponType  $andproductcategoryId  $andstatus    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>

	<table class="container">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	<style>
		.scrHeading{ float:left; width:85px; margin:5px 0px 0px 0px; padding:5px 0px 0px 0px; height:20px;}
		
		.scrField{float:left; width:140px; margin:5px 0px 0px 0px; padding:0px 0px 0px 0px; height:25px;}
		
		.scrButtonDiv{ float:left;padding-top:10px}
		
		.SelectBox{ width:102px;}
		
		.actionLink{ width:120px;}
		
	</style>
	
	 <div class="scrHeading">Code:</div>
    <div class="scrField"><input type="text" name="code" id="code" value="<?php echo $code?>" style="width:100px;" />&nbsp;</div>
    
    <div class="scrHeading">Details:</div>
    <div class="scrField"><input type="text" name="details" id="details" value="<?php echo $details?>" style="width:100px;" />&nbsp;</div>
    
    <div class="scrHeading">G Date From:</div>
    <div class="scrField"><input class="dtpk" type="text" name="f_generateDate" id="f_generateDate" value="<?php echo $f_generateDate?>" style="width:100px;" />&nbsp;</div>

	<div class="scrHeading">G Date To:</div>
    <div class="scrField"><input class="dtpk" type="text" name="t_generateDate" id="t_generateDate" value="<?php echo $t_generateDate?>" style="width:100px;" />&nbsp;</div>
    
    <div class="scrHeading">Coupon Type:</div>
    <div class="scrField"><select name="couponType" id="couponType" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->couponType,$couponType);	?></select>&nbsp;</div>
 
 
  
   <div class="scrHeading">Category:</div>
    <div class="scrField"><select name="productcategoryId" id="productcategoryId" class="SelectBox" ><option value="">All</option>		  	<? 
								
										  $os->optionsHTML($productcategoryId,'productcategoryId','title','productcategory');?>
							</select>&nbsp;</div>
   
   
   <div class="scrHeading">Status:</div>
    <div class="scrField"><select name="status" id="status" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->activeStatus,$status);	?></select>&nbsp;</div>
   	
	
	<div class="scrButtonDiv">
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="searchReset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	</div>
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a  class="addButton"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Code</b></td>  
  <td ><b>Details</b></td>  
  <td ><b>Valid From</b></td>  
  <td ><b>Valid To</b></td>  
  <td ><b>Generate Date</b></td>  
  <td ><b>Coupon Type</b></td>  
  <td ><b>Product Count</b></td>  
  <td ><b>Discount</b></td>  
  <td ><b>Category</b></td>  
  <td ><b>Status</b></td>  
  
								
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
							</tr>
							
							
							
							<?php
							 $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
								
<td><?php echo $record['code']?> </td>  
  <td><?php echo $record['details']?> </td>  
  <td><?php echo $os->viewDate($record['validFrom']);?> </td>  
  <td><?php echo $os->viewDate($record['validTo']);?> </td>  
  <td><?php echo $os->viewDate($record['generateDate']);?> </td>  
  <td><?php echo  
	$os->couponType[$record['couponType']]; ?></td> 
  <td><?php echo $record['productCount']?> </td>  
  <td><?php echo $record['discount']?> </td>  
  <td><?php echo  
	$os->getByFld('productcategory','productcategoryId',$record['productcategoryId'],'title'); ?></td> 
  <td><?php echo  
	$os->activeStatus[$record['status']]; ?></td> 
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
							} 
							}?>
							
							
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>







	
    <script>
	
	 function searchText()
	 {
	 
	   
 var codeV= os.getVal('code'); 
 var detailsV= os.getVal('details'); 
 var f_generateDateV= os.getVal('f_generateDate'); 
 var t_generateDateV= os.getVal('t_generateDate'); 
 var couponTypeV= os.getVal('couponType'); 
 var productcategoryIdV= os.getVal('productcategoryId'); 
 var statusV= os.getVal('status'); 
window.location='<?php echo $listPAGEUrl; ?>code='+codeV +'&details='+detailsV +'&f_generateDate='+f_generateDateV +'&t_generateDate='+t_generateDateV +'&couponType='+couponTypeV +'&productcategoryId='+productcategoryIdV +'&status='+statusV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>code=&details=&f_generateDate=&t_generateDate=&couponType=&productcategoryId=&status=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>