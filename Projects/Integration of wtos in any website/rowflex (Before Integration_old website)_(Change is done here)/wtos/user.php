<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='userEdit';
$primeryTable='user';
$primeryField='userId';
$listHeader='USER DETAILS';


$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?editRowId=';
##  delete row
if(varG('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,varG('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
	   }
}



/* searching */

$active= $os->setNget('active',$primeryTable);  //for session set
$andActive=($active!=-1 && $active!='' )? " and active='$active'":'';


$andUser=$os->andField('name_search','firstName',$primeryTable,'%');	
$name_search=$andUser['value']; $andname=$andUser['andField'];

$listingQuery=" select * from $primeryTable where $primeryField>0  $andActive $andCountry $andname order by $primeryField desc  ";



##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 


#-- status dd #
$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');
$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');

$os->setFlash($flashMsg);
//tinyMce();

//searching......





?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  <div class="headertext">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB">
			  <table cellpadding="0" cellspacing="0">
							<tr>
							<td class="buttonSa">
						
							&nbsp;
							
							First Name:
							<input type="text" name="name_search" id="name_search" value="<?php echo $name_search?>" style="width:100px;" />
							
								Status:
						&nbsp;
							<select name="active" id="active_search"  onchange="javascript:window.location='<? $seoLink->getLink('user',true); ?>?active='+this.value"><?php $os->onlyOption($statuslist,$active);	?>
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
				<!-- <span style="float:right"><a href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span>--></div>
				 
				 <table width="765" border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								<td ><b>User name</b></td>
							
								<td ><b> Active</b></td>
								
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
								
									$country=$os->getByFld('country','countryId',$record['countryId'],'name');							 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								<td><?php echo $record['firstName']." ".$record['lastName']?> </td>
								
								
								
								
								<td><?php $os->changeStatusDD($status,$record['active'],'user','active','userId',$DivIds['EDITID'],$colorStatus); ?>  </td>
								  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<!--<a href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>-->
						
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
	 
	   var nameSearch= os.getVal('name_search');
	   var countryVal= os.getVal('country');
	    
	   window.location='?name_search='+nameSearch;
		 
	 }
	function  searchReset()
	{
				
	   window.location='?name_search=&active=-1&countryId=';
	
	}
		
	
	
	</script>
	
    
   
	<? include('bottom.php')?>