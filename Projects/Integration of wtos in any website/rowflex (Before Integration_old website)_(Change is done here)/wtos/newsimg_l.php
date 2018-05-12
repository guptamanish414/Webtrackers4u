<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='newsimgEdit_e';
$listPAGE='newsimg_l';
$primeryTable='newsimg';
$primeryField='newsImgId';
$listHeader='List Newsimg';

 
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
 $dataToSave['active']=varP('active'); 
 $dataToSave['newsId']=varP('newsId'); 

		 
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$andnewsIdA=  $os->andField('newsId','newsId',$primeryTable,'%');
  $newsId=$andnewsIdA['value']; $andnewsId=$andnewsIdA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andnewsId    $andActive order by $primeryField desc  ";

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
	

 newsId:
	
	
	<select name="newsId" id="newsId" class="textbox fWidth" ><option value="">Select newsId</option>		  	<? 
								
										  $os->optionsHTML($newsId,'pagecontentId','title','pagecontent');?>
							</select>
  
	 
	
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
								
								
<td ><b>newsId</b></td>  
  
								
								 
								
                                
								
								
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
								
								
<td><?php echo  
	$os->getByFld('pagecontent','pagecontentId',$record['newsId'],'title'); ?></td> 
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
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
	 
	   
 var newsIdV= os.getVal('newsId'); 
window.location='<?php echo $listPAGEUrl; ?>newsId='+newsIdV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>newsId=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>