<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='homepagebannerEdit';
$listPAGE='homepagebanner';
$primeryTable='homepagebanner';
$primeryField='homepagebannerId';
$listHeader='List Homepagebanner';

 
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
 $imageLink=$os->UploadPhoto('imageLink',$site['imgPath'].'wtos-images');
				   	if($imageLink!=''){
					$dataToSave['imageLink']='wtos-images/'.$imageLink;
					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'imageLink',$site['imgPath']);}
					} 					
						
 $dataToSave['productcategoryId']=varP('productcategoryId'); 
 $dataToSave['status']=varP('status'); 
 $dataToSave['showOrder']=varP('showOrder'); 
 $dataToSave['bannerLink']=varP('bannerLink'); 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
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
$andproductcategoryIdA=  $os->andField('productcategoryId','productcategoryId',$primeryTable,'%');
   $productcategoryId=$andproductcategoryIdA['value']; $andproductcategoryId=$andproductcategoryIdA['andField'];	 
$andbannerLinkA=  $os->andField('bannerLink','bannerLink',$primeryTable,'%');
   $bannerLink=$andbannerLinkA['value']; $andbannerLink=$andbannerLinkA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andproductcategoryId  $andbannerLink    $andActive order by $primeryField desc  ";

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
   Category:
	
	
	<select name="productcategoryId" id="productcategoryId" class="textbox fWidth" ><option value="">Select Category</option>		  	<? 
								
										  $os->optionsHTML($productcategoryId,'productcategoryId','title','productcategory');?>
							</select>
   Banner Link: <input type="text" name="bannerLink" id="bannerLink" value="<?php echo $bannerLink?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="resetButton" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
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
  <td ><b>Image</b></td>  
  <td ><b>Category</b></td>  
  <td ><b>Image Status</b></td>  
  <td ><b>Show Order</b></td>  
  <td ><b>Banner Link</b></td>  
  
								
								 
								
                                
								
								
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
  <td><img src="<?php  echo $site['urlFront'].$record['imageLink']; ?>"  height="70" width="70" /></td>  
  <td><?php echo  
	$os->getByFld('productcategory','productcategoryId',$record['productcategoryId'],'title'); ?></td> 
  <td><?php echo  
	$os->homeBannerStatus[$record['status']]; ?></td> 
  <td><?php echo $record['showOrder']?> </td>  
  <td><?php echo $record['bannerLink']?> </td>  
  
							 	
								
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
 var productcategoryIdV= os.getVal('productcategoryId'); 
 var bannerLinkV= os.getVal('bannerLink'); 
window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&productcategoryId='+productcategoryIdV +'&bannerLink='+bannerLinkV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&productcategoryId=&bannerLink=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>