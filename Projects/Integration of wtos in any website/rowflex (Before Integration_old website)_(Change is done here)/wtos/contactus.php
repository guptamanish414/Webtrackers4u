<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='contactusEdit';
$primeryTable='contactus';
$primeryField='contactid';
$listHeader='List contactus';



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
	
	  #---- edit section ----#
		
		
 $dataToSave['name']=varP('name'); 
 $dataToSave['email']=varP('email'); 
 $dataToSave['mobile']=varP('mobile'); 
 $dataToSave['details']=varP('details'); 
                    $image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
				   	if($image!=''){
					$dataToSave['image']='wtos-images/'.$image;
					} 
 
		 
		$dataToSave['addedDate']=date('Y-m-d h:i:s');
		$dataToSave['addedBy']=$os->userDetails['adminId'];
	 
	  
	  $os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  
	  #---- edit section end ----#
	
	 }
	
	
}
##  fetch row

/* searching */

$active= $os->setNget('active',$primeryTable);  //for session set
$andActive=($active!=-1 && $active!='' )? " and active='$active'":'';

 
$andnameA=  $os->andField('name_search','name',$primeryTable,'%');
  $name_search=$andnameA['value']; $andname=$andnameA['andField'];	 
$andemailA=  $os->andField('email_search','email',$primeryTable,'%');
  $email_search=$andemailA['value']; $andemail=$andemailA['andField'];	 
$andmobileA=  $os->andField('mobile_search','mobile',$primeryTable,'%');
  $mobile_search=$andmobileA['value']; $andmobile=$andmobileA['andField'];	 
$anddetailsA=  $os->andField('details_search','details',$primeryTable,'%');
  $details_search=$anddetailsA['value']; $anddetails=$anddetailsA['andField'];	 

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andname  $andemail  $andmobile  $anddetails    $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];

#-- status dd #
$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');
 

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
	<select name="active" id="active_search"  onchange="javascript:window.location='<? $seoLink->getLink('contactus',true); ?>?active='+this.value"><?php $os->onlyOption($statuslist,$active);	?>
	</select>
	&nbsp;

 name:<input type="text" name="name_search" id="name_search" value="<?php echo $name_search?>" style="width:100px;" /> &nbsp;  
   email:<input type="text" name="email_search" id="email_search" value="<?php echo $email_search?>" style="width:100px;" /> &nbsp;  
   mobile:<input type="text" name="mobile_search" id="mobile_search" value="<?php echo $mobile_search?>" style="width:100px;" /> &nbsp;  
   details:<input type="text" name="details_search" id="details_search" value="<?php echo $details_search?>" style="width:100px;" /> &nbsp;  
  
	 
	
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
								
								
<td ><b>name</b></td>  
  <td ><b>email</b></td>  
  <td ><b>mobile</b></td>  
  <td ><b>details</b></td>  
  <td ><b>Attachment</b></td>  
  
								
								 
								
                                <td ><b>Status</b></td>
								
								
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
								
								
<td><?php echo $record['name']?> </td>  
  <td><?php echo $record['email']?> </td>  
  <td><?php echo $record['mobile']?> </td>  
  <td><?php echo $record['details']?> </td>  
  <td>
  <a href="<?php  echo $site['urlFront'].$record['image']; ?>" target="_blank"><?php  echo $record['image']; ?></a>
  <!--<img src="<?php  echo $site['urlFront'].$record['image']; ?>"  height="70" width="70" />-->
  
  </td>  
  
							 	
								
							<td><?php $os->changeStatusDD($status,$record['active'],'contactus','active','contactid',$DivIds['EDITID'],$colorStatus); ?>  </td>	  <td class="actionLink">                   
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
	 
	   
 var name_searchV= os.getVal('name_search'); 
 var email_searchV= os.getVal('email_search'); 
 var mobile_searchV= os.getVal('mobile_search'); 
 var details_searchV= os.getVal('details_search'); 
window.location='?name_search='+name_searchV +'&email_search='+email_searchV +'&mobile_search='+mobile_searchV +'&details_search='+details_searchV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='?name_search=&email_search=&mobile_search=&details_search=&';	
	   
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>