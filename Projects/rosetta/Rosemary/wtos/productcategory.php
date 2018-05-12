<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='productcategoryEdit';
$listPAGE='productcategory';
$primeryTable='productcategory';
$primeryField='productcategoryId';
$listHeader='Product Category List';

 
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
		
		
 $dataToSave['title']=varP('title'); 
 $dataToSave['parentId']=varP('parentId'); 
 $dataToSave['description']=varP('description'); 
 $dataToSave['productType']=varP('productType'); 
 $img=$os->UploadPhoto('img',$site['imgPath'].'wtos-images');
				   	if($img!=''){
					$dataToSave['img']='wtos-images/'.$img;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'img',$site['imgPath']);}
					} 					
		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		
			$parentIds=    getUplineCatIdsStr( $dataToSave['parentId']);
			$dataToSave['parentIds']= $parentIds;
			
			$dataToSave['featureIds'] = varP('featureIds');
			
			if(is_array(varP('featureIds')) && count(varP('featureIds'))>0)
			{
			$dataToSave['featureIds'] = ','.implode(',',varP('featureIds')).',';
			
			}
			
		 
		if($rowId < 1){
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

 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
   $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andparentIdA=  $os->andField('parentId','parentId',$primeryTable,'%');
   $parentId=$andparentIdA['value']; $andparentId=$andparentIdA['andField'];	 
$anddescriptionA=  $os->andField('description','description',$primeryTable,'%');
   $description=$anddescriptionA['value']; $anddescription=$anddescriptionA['andField'];	 
$andproductTypeA=  $os->andField('productType','productType',$primeryTable,'%');
   $productType=$andproductTypeA['value']; $andproductType=$andproductTypeA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andparentId  $anddescription  $andproductType    $andActive order by $primeryField desc  ";

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
	

 Title: <input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
   Parent:<select name="parentId" id="parentId" class="SelectBox" >
   			<option value="">All</option>
			<? $os->optionsHTML($parentId,'productcategoryId','title','productcategory');?>
		  </select>
   Description: <input type="text" name="description" id="description" value="<?php echo $description?>" style="width:100px;" /> &nbsp;  
   Product Type: <input type="text" name="productType" id="productType" value="<?php echo $productType?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="searchReset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
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
								
								
<td ><b>Title</b></td>  
  <td ><b>Parent</b></td>  
  <td ><b>Description</b></td>  
  <td ><b>Product Type</b></td>  
  <td ><b>Image</b></td>  
  
								
								 
								
                                
								
								
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
								
								
<td><?php echo $record['title']?> </td>  
  <td><?php echo $os->getByFld('productcategory','productcategoryId',$record['parentId'],'title'); ?></td> 
  <td><?php echo $record['description']?> </td>  
  <td><?php echo $record['productType']?> </td>  
  <td>
  <?php if($record['img']!=''){?>
 <img alt="" onclick="showLargeImage('<?php echo $site['urlFront'].$record['img'];?>')" class="listImg" src="<?php  echo $site['urlFront'].$record['img']; ?>"/>
   <?php }?>
 
  </td>  
  
							 	
								
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
	 
	   
 var titleV= os.getVal('title'); 
 var parentIdV= os.getVal('parentId'); 
 var descriptionV= os.getVal('description'); 
 var productTypeV= os.getVal('productType'); 
window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&parentId='+parentIdV +'&description='+descriptionV +'&productType='+productTypeV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&parentId=&description=&productType=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>