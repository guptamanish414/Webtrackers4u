<?php
include('includes/config.php');
 include('aaHeader.php');  

// config 

$DivIds['AJAXPAGE']='propertyimageEdit';
$listPAGE='propertyimage';
$primeryTable='propertyimage';
$primeryField='propertyImageId';
$listHeader='List Property Image';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft','propertyId'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','propertyId'),'');
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
		
		
 $dataToSave['propertyId']=varP('propertyId'); 
 $dataToSave['title']=varP('title'); 

 $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
				   	if($image!=''){
					$dataToSave['image']='wtos-images/'.$image;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);}
					} 					
					
					
					
 $dataToSave['type']=varP('type'); 
 $dataToSave['active']=varP('active'); 

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	//  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	 
	 }
	
	
}
 

/* searching */

 
$andpropertyIdA=  $os->andField('propertyId','propertyId',$primeryTable,'%');
  $propertyId=$andpropertyIdA['value']; $andpropertyId=$andpropertyIdA['andField'];	 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
  $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 
$andtypeA=  $os->andField('type','type',$primeryTable,'%');
  $type=$andtypeA['value']; $andtype=$andtypeA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andpropertyId  $andtitle  $andtype    $andActive order by priority asc, $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>
<body >
	<table class="container">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext" style="display:none;">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB" style="display:none;">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	

<!-- Property:--><input type="text" name="propertyId" id="propertyId" value="<?php echo $propertyId?>" style="width:100px; display:none;" /> &nbsp;  
   Title:<input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
   Type:<input type="text" name="type" id="type" value="<?php echo $type?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="resetButton" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="<? echo $_SERVER['REQUEST_URI']; ?>" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a  class="addButton"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add Image</a></span></div>
				 <style>
				 .ibox{ height:185px; width:170px; float:left; border: solid 1px #999999; margin:0px 5px 5px 0px; padding:2px;}
				 </style>
				 <div style="width:100%; height:auto; margin-top:5px;">
							
							
							
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<div class="border  ibox"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
							<div> <font style="color:#0000CC"><?php echo $i?>.</font> <?php echo $record['title']?>   </div>
							<div>Order <?php $os->editTextField($record['priority'],$primeryTable,'priority',$primeryField,$DivIds['EDITID'] , $inputNameID='pripritychange',$extraParams='class="tField" style="width:20px; height:15px; border:1px solid #999999;" ');?>	
							Print Order <?php $os->editTextField($record['printOrder'],$primeryTable,'printOrder',$primeryField,$DivIds['EDITID'] , $inputNameID='printOrderchange',$extraParams='class="tField" style="width:20px; height:15px; border:1px solid #999999;" ');?><br />
							  
							  
							  
							  
							 </div>
							<div> <img src="<?php  echo $site['urlFront'].$record['image']; ?>"  height="120" width="170" /> </div>
							 
							
							<div style="padding-top:5px;">
							 
                      
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>&nbsp;&nbsp;
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a> &nbsp;&nbsp;&nbsp;
						
						
						
					
						 <?php $os->changeStatusDD($os->activeOptions,$record['active'],'propertyimage','active','propertyImageId',$DivIds['EDITID'],$os->activeColors); ?>  
						
						
							</div>	

 
                        
                      
					</div>
							
							<?php $i++;
							} 
							}?>
							
							
							
						 
				 
				 		<?php echo $recordsA['links'];?>			
	         
	 



</div>

	
    <script>
	
	 function searchText()
	 {
	 
	   
 var propertyIdV= os.getVal('propertyId'); 
 var titleV= os.getVal('title'); 
 var typeV= os.getVal('type'); 
window.location='<?php echo $listPAGEUrl; ?>propertyId='+propertyIdV +'&title='+titleV +'&type='+typeV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>propertyId=&title=&type=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>