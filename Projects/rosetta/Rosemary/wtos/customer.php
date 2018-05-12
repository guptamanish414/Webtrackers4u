<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='customerEdit';
$listPAGE='customer';
$primeryTable='customer';
$primeryField='customerId';
$listHeader='Customer List';

 
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
 $dataToSave['phone']=varP('phone'); 
 $dataToSave['email']=varP('email'); 
 $dataToSave['address']=varP('address'); 
 
 
 $dataToSave['shippingAddress']=varP('shippingAddress'); 

 $dataToSave['password']=varP('password'); 
 
$dataToSave['dealer']=varP('dealer'); 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['status']='Active'; 
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

 
$andnameA=  $os->andField('name','name',$primeryTable,'%');
   $name=$andnameA['value']; $andname=$andnameA['andField'];	 
$andphoneA=  $os->andField('phone','phone',$primeryTable,'%');
   $phone=$andphoneA['value']; $andphone=$andphoneA['andField'];	 
$andemailA=  $os->andField('email','email',$primeryTable,'%');
   $email=$andemailA['value']; $andemail=$andemailA['andField'];	 
$andaddressA=  $os->andField('address','address',$primeryTable,'%');
   $address=$andaddressA['value']; $andaddress=$andaddressA['andField'];	 
$andshippingAddressA=  $os->andField('shippingAddress','shippingAddress',$primeryTable,'%');
   $shippingAddress=$andshippingAddressA['value']; $andshippingAddress=$andshippingAddressA['andField'];
   
   $andstatusA=  $os->andField('status','status',$primeryTable,'=');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];
   
   
   
    $anddealerA=  $os->andField('dealer','dealer',$primeryTable,'=');
   $dealer=$anddealerA['value']; $anddealer=$anddealerA['andField'];
   	  

   

$listingQuery=" select * from $primeryTable where $primeryField>0   $andname  $andphone  $andemail  $andaddress  $andshippingAddress  $andstatus $anddealer $andActive order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 $activeColorStatus=array('Active'=>'A0EBB9','Inactive'=>'F2C6C6');

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
	

 Name: <input type="text" name="name" id="name" value="<?php echo $name?>" style="width:100px;" /> &nbsp;  
   Phone: <input type="text" name="phone" id="phone" value="<?php echo $phone?>" style="width:100px;" /> &nbsp;  
   Email: <input type="text" name="email" id="email" value="<?php echo $email?>" style="width:100px;" /> &nbsp;  
   Address: <input type="text" name="address" id="address" value="<?php echo $address?>" style="width:100px;" /> &nbsp;  
   Shipping Address: <input type="text" name="shippingAddress" id="shippingAddress" value="<?php echo $shippingAddress?>" style="width:100px;" /> &nbsp;  
   
   Status:
	
	<select name="status" id="status" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->activeStatus,$status);	?></select>	
     
     Dealer:
	
	<select name="dealer" id="dealer" class="SelectBox" ><option value="">All</option>	<? 
										  $os->onlyOption($os->yesNO,$status);	?></select>	                                     
  
	 
	
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
								
								
<td ><b>Name</b></td>  
  <td ><b>Phone</b></td>  
  <td ><b>Email</b></td>  
  <td ><b>Address</b></td>  
  <td ><b>Shipping Address</b></td> 
  <td>Status</td> 
  
								
								 
								
                                
								
								
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
								
								
<td style="text-align:left;"><?php echo $record['name']?> </td>  
  <td><?php echo $record['phone']?> </td>  
  <td style="text-align:left;"><?php echo $record['email']?> </td>  
  <td><?php echo $record['address']?> </td>  
  <td><?php echo $record['shippingAddress']?> </td>  
  <td><?php $os->changeStatusDD($os->activeStatus,$record['status'],'customer','status','customerId',$DivIds['EDITID'],$activeColorStatus); ?></td> 
							 	
								
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
	 
	   
 var nameV= os.getVal('name'); 
 var phoneV= os.getVal('phone'); 
 var emailV= os.getVal('email'); 
 var addressV= os.getVal('address'); 
 var shippingAddressV= os.getVal('shippingAddress'); 
 var statusV= os.getVal('status');
 
 var dealerV= os.getVal('dealer');
 
 
 
window.location='<?php echo $listPAGEUrl; ?>name='+nameV +'&phone='+phoneV +'&email='+emailV +'&address='+addressV +'&shippingAddress='+shippingAddressV +'&status='+statusV +'&dealer='+dealerV+'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>name=&phone=&email=&address=&shippingAddress=&status=&dealer=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>