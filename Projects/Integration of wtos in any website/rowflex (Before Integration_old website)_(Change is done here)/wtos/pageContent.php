<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='pageContentEdit';
$primeryTable='pagecontent';
$primeryField='pagecontentId';
$listHeader='PAGE CONTENT';
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?editRowId=';

##  delete row
if(varG('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,varG('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
	   }
}


# wt access  454

if($os->preparePage(varP('rowId'))){
$wtAccess['addPage']=true;
}
$wtAccess['deletePage']=true; 

# wt access  454 end


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	  
	  #---- edit section ----#
	 	 	 	 	 	 	 	 	 	 	 	 	 	  	 	 	 	 	 	 	 	 	    	  	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	  	 	  	 	 	 	 		 	 	 	 	 		 	 	 	 	 	 
		$dataToSave['heading']=varP('heading');
		$dataToSave['title']=varP('title');
		$dataToSave['content']=addslashes(varP('content'));
		$dataToSave['langId']=addslashes(varP('langId'));
		$dataToSave['postInclude']=varP('postInclude');
		$dataToSave['preInclude']=varP('preInclude');
		$dataToSave['parentPage']=varP('parentPage');
		$dataToSave['seoId']=varP('seoId');
		$dataToSave['externalLink']=varP('externalLink');
		
		$dataToSave['onHead']=varP('onHead');
		$dataToSave['onBottom']=varP('onBottom');
		$dataToSave['openNewTab']=varP('openNewTab');
		
		$dataToSave['metaTag']=varP('metaTag');
		$dataToSave['metaDescription']=varP('metaDescription');
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		$dataToSave['addedDate']=date("Y-m-d h:i:s");
		$dataToSave['pageCss']=varP('pageCss');
		$dataToSave['showImage']=varP('showImage');
		
	  $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
	  if($image!='')
	  {
	  	$dataToSave['image']='wtos-images/'.$image;
		
		if($rowId)
		{
		   $os->removeImage($primeryTable,$primeryField,$rowId,'image',$site['imgPath']);
		}
		
		
	  }


		
		
	  $os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	 
	 
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  
	  #---- edit section end ----#
	
	 }
	
	
}
##  fetch row

/* searching */

$active= $os->setNget('active',$primeryTable);  //for session set
$andActive=($active!=-1 && $active!='' )? " and active='$active'":'';


$andUser=$os->andField('name_search','title',$primeryTable,'%');	
$name_search=$andUser['value']; $andname=$andUser['andField'];


$pagecontentIdA=$os->andField('pagecontentId','parentPage',$primeryTable);	
$pagecontentId=$pagecontentIdA['value']; $andPagecontentId=$pagecontentIdA['andField'];

$langIdA=$os->andField('langId','langId',$primeryTable);	
$langId=$langIdA['value']; $andlangId=$langIdA['andField'];




$listingQuery=" select * from $primeryTable where $primeryField>0  $andActive  $andType $andPagecontentId  $andArea $andname $andlangId order by parentPage asc, priority asc,   $primeryField desc  ";

//echo $listingQuery;


##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 


#-- status dd #
$featured=array('0'=>'No','1'=>'Yes');
$colorFeatured=array('0'=>'F2C6C6','1'=>'A0EBB9');

$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');
$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');

$os->setFlash($flashMsg);
tinyMce();

//searching......





?>

	<table class="container" border="0">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option<span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB">
			  
			  <table cellpadding="0" cellspacing="0" border="0">
							<tr>
							<td class="buttonSa">
							
							
							
							&nbsp;
							Page Under:
							<select name="catId" id="pagecontentId" onchange="searchText()">
							<option value=""> Select Parent Page </option>
							<option value="0"> Only Parent Pages </option>
							<?
							 $os->optionsHTML($pagecontentId,'pagecontentId','title','pagecontent',"active=1 and parentPage<1");
							
							?>
							</select>
						
							
							&nbsp;
							
							Link Name:<input type="text" name="name_search" id="name_search" value="<?php echo $name_search?>" style="width:100px;" />
							
							Language:<select name="langId" id="langId" onchange="searchText()">
							<option value=""> Select Language</option>
							
							<?
							 $os->optionsHTML($langId,'langId','title','lang',"");
							
							?>
							</select>
							
								Status:
						&nbsp;
							<select name="active" id="active_search"  onchange="javascript:window.location='<? $seoLink->getLink('pageContent',true); ?>?active='+this.value"><?php $os->onlyOption($statuslist,$active);	?>
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
				 <a href="<? echo $_SERVER['REQUEST_URI']; ?>" style="margin-left:20px;"> Refresh </a>    
				 <span style="float:right">
				 <? if($wtAccess['addPage']){?>
				 <a href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a>
				 <? } ?>
				 </span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								<td ><b>Link Name</b></td>
								<td ><b> Page Under</b></td>
								<td ><b> Link</b></td>
								<td ><b> Language</b></td>
								<td ><b>Order</b></td>
								<td ><b>Active</b></td>
								
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
								  
								 
								  $parentPage=$os->getByFld('pagecontent','pagecontentId',$record['parentPage'],'title');
								 		 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								<td valign="top"><b style="color:#2E2E2E;"> <?php echo $record['title']?></b><br />
								<font style="font-size:10px; font-style:italic; color:#787878;">
								Page Heading/Title : <?  echo  $record['heading'];?> <br />
								position : <?  echo  ($record['onHead'])?'Header ' :'';  echo  ($record['onBottom'])?'  Footer' :'';  ?>
								 , Page Id : <b> <?  echo  $record['pagecontentId'];  ?></b>
								
								<? if($record['image']!=''){ ?> <br />
								Show Image :  <?  echo  ($record['showImage'])?'<font color="#008A45">Active</font> ' :'<font color="#FF4848">Inactive</font>';?><br />
								  Image  Link <a href="<?  echo $site['urlFront'].$record['image'] ; ?> " target="_blank" ><?php echo  $record['image']; ?> </a>
								      
									 <? } ?>
								</font>
								
								
								 
								
								 </td>
									<td>
								<?php echo $parentPage?>
									</td>
									<td>
									<?php if(  $record['externalLink'] ){ ?>
									Ex: <font color="#FF0000"><b><? echo $record['externalLink']?></b></font>
									<? } else{ ?>
									
								<font color="#0000CC"><b><?php echo $record['seoId']?></b></font>
								
								<? } ?>
								<br />
								<font style="font-size:10px; font-style:italic; color:#787878">
								
								Meta Tag : <?  echo  $record['metaTag'];?> <br />
								Meta Description : <?  echo  $record['metaDescription'];?>
								</font>
								
								
								
									</td>
									<td>
									  <b>  <? echo $os->getByFld('lang','langId',$record['langId'],'title');?></b> <br />
								<!--Pre:<font color="#0000EA"><?php echo $record['preInclude']?> </font> Post:<font color="#0000EA"><?php echo $record['postInclude']?></font>-->
									</td>
								<td><?php $os->changeStatusDD_2($status,$record['priority'],'pagecontent','priority','pagecontentId',$DivIds['EDITID'],$colorStatus); ?>  </td>
								
								<td><?php $os->changeStatusDD($status,$record['active'],'pagecontent','active','pagecontentId',$DivIds['EDITID'],$colorStatus); ?>  </td>
								  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a href="javascript:void(0)" class="editButton" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						 <? if($wtAccess['deletePage']){?>
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						<? } ?>
						
						
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
	 
	   var nameSearch= os.getVal('name_search');
	 
	    var pagecontentIdVal= os.getVal('pagecontentId');
		var langId= os.getVal('langId');
	    
	   window.location='?name_search='+nameSearch+'&pagecontentId='+pagecontentIdVal+'&langId='+langId;
		 
	 }
	function  searchReset()
	{
				
	   window.location='?name_search=&active=-1=&areaId=&pagecontentId=&catId=&langId=';
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>