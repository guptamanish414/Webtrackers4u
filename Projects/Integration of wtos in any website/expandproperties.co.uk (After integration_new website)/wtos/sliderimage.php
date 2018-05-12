<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='sliderimageEdit';
$listPAGE='sliderimage';
$primeryTable='sliderimage';
$primeryField='sliderImageId';
$listHeader='Slider Image List ';

 
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
 $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
 
				   	if($image!=''){
					$dataToSave['image']='wtos-images/'.$image;
					} 					
					if($rowId && $_FILES['image']['name']!='') {  $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);}

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$andtitleA=  $os->andField('title','title',$primeryTable,'%');
  $title=$andtitleA['value']; $andtitle=$andtitleA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......


$languageA = $os->getMe("SELECT langId,title FROM lang ORDER BY title ASC");
if(is_array($languageA) && count($languageA)>0){
	foreach($languageA as $k=>$v){
		$language[$v['langId']]=$v['title'];
		$colorStatus[$v['langId']] = 'A0EBB9';
	}
}




//$colorStatus='';
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
	

 Title:<input type="text" name="title" id="title" value="<?php echo $title?>" style="width:100px;" /> &nbsp;  
  
	 
	
	<a  class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="searchReset" href="javascript:void(0)"  onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a class="addButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Title</b></td>  
  <td ><b>Image</b></td>  
  
								
	<td><b>Language</b></td>							 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
							</tr>
							
							
							
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
								
<td style="text-align:center;"><?php echo $record['title']?> </td>  
  <td style="text-align:center;"><img src="<?php  echo $site['urlFront'].$record['image']; ?>"  height="70" width="70" /></td>  
  
		<td style="text-align:center;"><?php $os->changeStatusDD($language,$record['langId'],'sliderimage','langId','sliderImageId',$DivIds['EDITID'],$colorStatus); ?></td>					 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a  class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
					<tr class="border">
						<td id="<?php echo  $DivIds['DIVLIST']; ?>" style="display:none" colspan="10">
							   <div  id="<?php echo  $DivIds['DIV']; ?>"> &nbsp </div>	
						
						</td>
					</tr>
                            
							
							<?php $i++;
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
window.location='<?php echo $listPAGEUrl; ?>title='+titleV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>title=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>