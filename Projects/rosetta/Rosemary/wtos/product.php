<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='productEdit';
$listPAGE='product';
$primeryTable='product';
$primeryField='productId';
$listHeader='Product List';

 
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
		
		
 $dataToSave['name']=varP('name'); 
 $dataToSave['code']=varP('code'); 
$dataToSave['shortDescription']=addslashes(varP('shortDescription')); 
 $dataToSave['fullDescription']=addslashes(varP('fullDescription')); 
 $dataToSave['active']=varP('active'); 
 $dataToSave['model']=varP('model'); 
 $dataToSave['seoId']=varP('seoId'); 
 $dataToSave['marketPrice']=varP('marketPrice'); 
 $dataToSave['discount']=varP('discount'); 
 $dataToSave['discountPercent']=varP('discountPercent'); 
 $dataToSave['ourPrice']=varP('ourPrice'); 
 $dataToSave['starRating']=varP('starRating'); 
 $dataToSave['make']=varP('make'); 
 $dataToSave['status']=varP('status'); 
 $dataToSave['featured']=varP('featured'); 
 $dataToSave['orders']=varP('orders'); 
 $dataToSave['oldPrice']=varP('oldPrice'); 
 
 _d($dataToSave['featured']);
 $dataToSave['dealerId']=varP('dealerId'); 
 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		#ADD category and featyre#
	//delete al edit mode
	if($rowId>0){
	
		$os->mq("DELETE FROM productcategorymap WHERE productId='$rowId'");
		$os->mq("DELETE FROM productfeaturemap WHERE productId='$rowId'");
	}
	
	//delete al edit mode END
	
	
	
	$ctgr = varP('ctgr');
	$featr = varP('featr');
	$catStr=$os->getMe("SELECT * FROM productcategorymap");
	
	$feaStr = '';
		
	 
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  
	  
		if($insertedId>0){
						
			if(is_array($ctgr) && count($ctgr>0)){
			$catStr = implode('',$ctgr);
			foreach($ctgr as $v){
			$os->mq("INSERT INTO productcategorymap SET productcategoryId='$v',productId='$insertedId'");
			}
			}
			
			
			
			if(is_array($featr) && count($featr>0)){
			$feaStr = implode('',$featr);
			foreach($featr as $v1){
			$os->mq("INSERT INTO productfeaturemap SET productfeatureId='$v1',productId='$insertedId'");
			}
			}
			
			##SEO ID START
			$seoId = '';
			$pName = $dataToSave['name'];
			$pCats = '';
			$pCatsA = $os->getMe("SELECT GROUP_CONCAT(title) AS title FROM productcategory WHERE productcategoryId IN(SELECT productcategoryId FROM productcategorymap WHERE productId=$insertedId)");
		if(is_array($pCatsA)){$pCats = $pCatsA[0]['title'];}
		
		$pFeas = '';
			$pFeasA = $os->getMe("SELECT GROUP_CONCAT(title) AS title FROM productfeature WHERE productfeatureId IN(SELECT productfeatureId FROM productfeaturemap WHERE productId=$insertedId)");
		if(is_array($pFeasA)){$pFeas = $pFeasA[0]['title'];}
		$seoId.= $pName;
		if($pCats!=''){$seoId = $seoId.'-'.$pCats;}/*if($pFeas!=''){$seoId = $seoId.'-'.$pFeas;}*/
			$os->productSeoId($seoId,$rowId);
			$seoId = $os->pSeoId;
			$os->mq("UPDATE product SET seoId='$seoId' WHERE productId=$insertedId");
			##SEO ID END 
	  }
	  
	  
	  
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$andnameA=  $os->andField('name','name',$primeryTable,'%');
   $name=$andnameA['value']; $andname=$andnameA['andField'];	 
$andcodeA=  $os->andField('code','code',$primeryTable,'%');
   $code=$andcodeA['value']; $andcode=$andcodeA['andField'];	 
$andshortDescriptionA=  $os->andField('shortDescription','shortDescription',$primeryTable,'%');
   $shortDescription=$andshortDescriptionA['value']; $andshortDescription=$andshortDescriptionA['andField'];	 
$andfullDescriptionA=  $os->andField('fullDescription','fullDescription',$primeryTable,'%');
   $fullDescription=$andfullDescriptionA['value']; $andfullDescription=$andfullDescriptionA['andField'];	 
$andactiveA=  $os->andField('active','active',$primeryTable,'=');
   $active=$andactiveA['value']; $andactive=$andactiveA['andField'];	 
$andmodelA=  $os->andField('model','model',$primeryTable,'%');
   $model=$andmodelA['value']; $andmodel=$andmodelA['andField'];	 
$andmakeA=  $os->andField('make','make',$primeryTable,'%');
   $make=$andmakeA['value']; $andmake=$andmakeA['andField'];	 
$andstatusA=  $os->andField('status','status',$primeryTable,'=');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 
$andfeaturedA=  $os->andField('featured','featured',$primeryTable,'%');
   $featured=$andfeaturedA['value']; $andfeatured=$andfeaturedA['andField'];
   
   
   $anddealerIdA=  $os->andField('dealerId','dealerId',$primeryTable,'=');
   $dealerId=$anddealerIdA['value']; $anddealerId=$anddealerIdA['andField'];
   	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andname  $andcode  $andshortDescription  $andfullDescription  $andactive  $andmodel  $andmake  $andstatus  $andfeatured  $anddealerId  $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 
$activeColorStatus=array('Active'=>'A0EBB9','Inactive'=>'F2C6C6');

$productColorStatus=array('Available'=>'A0EBB9','Not Available'=>'F2C6C6','Coming Soon'=>'FFC');

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
	
	 <div class="scrHeading">Name:</div>
    <div class="scrField"><input type="text" name="name" id="name" value="<?php echo $name?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading">Code:</div>
    <div class="scrField"><input type="text" name="code" id="code" value="<?php echo $code?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading">Short Des:</div>
    <div class="scrField"><input type="text" name="shortDescription" id="shortDescription" value="<?php echo $shortDescription?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading">Specifications:</div>
    <div class="scrField"><input type="text" name="fullDescription" id="fullDescription" value="<?php echo $fullDescription?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading">Active:</div>
    <div class="scrField"><select name="active" id="active" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->activeStatus,$active);	?></select>&nbsp;</div>
    
     <div class="scrHeading">Model:</div>
    <div class="scrField"><input type="text" name="model" id="model" value="<?php echo $model?>" style="width:100px;" />&nbsp;</div>
    
    <div class="scrHeading">Make:</div>
    <div class="scrField"><input type="text" name="make" id="make" value="<?php echo $make?>" style="width:100px;" />&nbsp;</div>
    
     <div class="scrHeading" style="display:none;">Featured:</div>
    <div class="scrField" style="display:none;"><select name="featured" id="featured" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->productFeatured,$featured);	?></select>&nbsp;</div>
                                          
     <div class="scrHeading">Status:</div>
    <div class="scrField"><select name="status" id="status" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->productStatus,$status);	?></select>&nbsp;</div>                                     
    

<div class="scrHeading">Dealer:</div>
    <div class="scrField"><select name="dealerId" id="dealerId" class="SelectBox" ><option value="">All</option>	<? 
										  $os->optionsHTML($dealerId,'customerId','name','customer',"dealer='Yes'",'name ASC','');?></select>&nbsp;</div>  

  
	 
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
								
								
<td ><b>Name</b></td>  
  <td ><b>Code</b></td>  
    
  <td ><b>Model</b></td>  
  <td ><b>Price</b></td>  
  <td ><b>Make</b></td> 
  
   <td ><b>Dealer</b></td>
  
  <td ><b>Status</b></td>  
  <td ><b>Featured</b></td>
  
  
   
   <td ><b>Active</b></td>  
  
	<td ><b>Order</b></td>							
								 
								
                                
								
								
								<td >Action </td>
								
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
								
								
<td><?php echo $record['name']?> </td>  
  <td><?php echo $record['code']?> </td>  

  <td><?php echo $record['model']?> </td>  
  <td><?php echo $record['ourPrice']?> </td>  
  <td><?php echo $record['make']?> </td> 
  
    <td><?php echo  
	$os->getByFld('customer','customerId',$record['dealerId'],'name'); ?></td> 
   
  <td><?php $os->changeStatusDD($os->productStatus,$record['status'],'product','status','productId',$DivIds['EDITID'],$productColorStatus); ?></td> 
  <td><?php echo  
	$os->productFeatured[$record['featured']]; ?></td> 
    
   
    
 <td><?php $os->changeStatusDD($os->activeStatus,$record['active'],'product','active','productId',$DivIds['EDITID'],$activeColorStatus); ?></td> 
  
	<td><?php $os->changeStatusDD_2('',$record['orders'],'product','orders','productId',$DivIds['EDITID'],''); ?>  </td>						 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
<a class="viewButton" href="javascript:void(0)" onclick="popUpWindow('image.php?hideTopLeft=1&imageTypeId=<?php echo  $DivIds['EDITID'];?>&imageType=Product', 50, 50, 800, 450)">Images</a>			
						
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
	 
	   
 var nameV= os.getVal('name'); 
 var codeV= os.getVal('code'); 
 var shortDescriptionV= os.getVal('shortDescription'); 
 var fullDescriptionV= os.getVal('fullDescription'); 
 var activeV= os.getVal('active'); 
 var modelV= os.getVal('model'); 
 var makeV= os.getVal('make'); 
 var statusV= os.getVal('status'); 
 var featuredV= os.getVal('featured'); 
 
 
 var dealerIdV= os.getVal('dealerId'); 
 
 
window.location='<?php echo $listPAGEUrl; ?>name='+nameV +'&code='+codeV +'&shortDescription='+shortDescriptionV +'&fullDescription='+fullDescriptionV +'&active='+activeV +'&model='+modelV +'&make='+makeV +'&status='+statusV +'&featured='+featuredV +'&dealerId='+dealerIdV+'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>name=&code=&shortDescription=&fullDescription=&active=&model=&make=&status=&featured=&dealerId=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>