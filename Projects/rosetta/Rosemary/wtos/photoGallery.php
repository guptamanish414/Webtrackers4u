<?php
include('includes/config.php');
include('top.php');



// config 

$DivIds['AJAXPAGE']='photoGalleryEdit';
$primeryTable='photogallery';
$primeryField='photoGalleryId';
$listHeader='IMAGE UPLOADER DETAILS';


$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?editRowId=';
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
	  $title=varP('title');
	  
	  #---- edit section ----#
	   	  	 	 	 	 	 		 	
	  $dataToSave['galleryCatagoryId']=varP('galleryCatagoryId');
	  $dataToSave['title']=$title; 
	 
		$image = $os->UploadPhoto('image',$site['imgPath'].'wtos-images');
		
	  if($image!='')
	  {
	  	$dataToSave['name']=$image;
		
	  }

	
	  
	  $os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  
	  #---- edit section end ----#
	
	 }
	
	
}
##  fetch row

/* searching */

$andUser=$os->andField('name','title',$primeryTable,'%');	

$name_search=$andUser['value']; $andname=$andUser['andField'];

$andGalaryA=$os->andField('galleryCatagoryId','galleryCatagoryId',$primeryTable);	

$galleryCatagoryId=$andGalaryA['value']; $andGalary=$andGalaryA['andField'];

$listingQuery=" select * from $primeryTable where $primeryField>0  $andname $andGalary order by $primeryField desc";
//_d($listingQuery);
##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];

#-- status dd #
$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');

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
							&nbsp;
					
							Title:
							<input type="text" name="name_search" id="name_search" value="<?php echo $title?>" style="width:100px;" />
							
							&nbsp;
							Category:
							<select name="galleryCatagoryId" id="gallerycatagory" onchange="searchText()">
							<option value=""> All gallerycatagory</option>
							<?
							
							 $os->optionsHTML($galleryCatagoryId,'galleryCatagoryId','categoryName','gallerycatagory');
							?>
							</select>
							&nbsp;
							
							<a href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
						    &nbsp;
						    <a href="javascript:void(0)" onclick="javascript:searchReset()">Reset</a>
							
							</td>
							</tr>
					 </table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a href="" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right"><a href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								<td ><b>Title</b></td>
								<td ><b>galary category</b></td>
								<td ><b>Image Url</b></td>
								<td ><b>Image</b></td>
							
								
								<td > Action </td>
								
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
								$cat=$os->getByFld('gallerycatagory','galleryCatagoryId',$record['galleryCatagoryId'],'categoryName');
								 $selected=0;
								
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								<td><?php echo $record['title']?>     </td>
								<td>
								<?php echo $cat?>
									</td>
								<td><?php  echo $site['urlFront'].'wtos-images/'.$record['name']; ?></td>
																
									<td style="width:200px;">
								 <img src="<?php  echo $site['urlFront'].'wtos-images/'.$record['name']; ?>"  height="70" width="70" />
								
								</td>
								
							
								
								  <td class="actionLink"  style="width:140px;">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
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
	 
	  
	  	var name= os.getVal('name_search');
	    var galaryVal= os.getVal('gallerycatagory');
	   window.location='?name='+name+'&galleryCatagoryId='+galaryVal;
		 
	 }
	function  searchReset()
	{
				
	   window.location='?name=&galleryCatagoryId=';
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>