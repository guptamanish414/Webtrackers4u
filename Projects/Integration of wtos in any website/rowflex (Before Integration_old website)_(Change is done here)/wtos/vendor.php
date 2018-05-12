<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='vendorEdit';
$listPAGE='vendor';
$primeryTable='member';
$primeryField='memberId';
$listHeader='List  Vendor';

 
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
		
		
 $dataToSave['code']=varP('code'); 
 $dataToSave['firstName']=varP('firstName'); 
 $dataToSave['lastName']=varP('lastName'); 
 $dataToSave['purpose']=varP('purpose'); 
 $dataToSave['telephone']=varP('telephone'); 
 $dataToSave['mobile']=varP('mobile'); 
 $dataToSave['email']=varP('email'); 
 $dataToSave['flatOrHouseName']=varP('flatOrHouseName'); 
 $dataToSave['address']=varP('address'); 
 $dataToSave['postCode']=varP('postCode'); 
 $dataToSave['source']=varP('source'); 
 $dataToSave['status']=varP('status'); 
 $dataToSave['note']=varP('note'); 
 $dataToSave['registerDate']=$os->saveDate(varP('registerDate')); 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		
		$dataToSave['type']='Vendor'; 
	 
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 
$andcodeA=  $os->andField('code','code',$primeryTable,'%');
   $code=$andcodeA['value']; $andcode=$andcodeA['andField'];	 
$andfirstNameA=  $os->andField('firstName','firstName',$primeryTable,'%');
   $firstName=$andfirstNameA['value']; $andfirstName=$andfirstNameA['andField'];	 
$andlastNameA=  $os->andField('lastName','lastName',$primeryTable,'%');
   $lastName=$andlastNameA['value']; $andlastName=$andlastNameA['andField'];	 
$andpurposeA=  $os->andField('purpose','purpose',$primeryTable,'%');
   $purpose=$andpurposeA['value']; $andpurpose=$andpurposeA['andField'];	 
$andtelephoneA=  $os->andField('telephone','telephone',$primeryTable,'%');
   $telephone=$andtelephoneA['value']; $andtelephone=$andtelephoneA['andField'];	 
$andmobileA=  $os->andField('mobile','mobile',$primeryTable,'%');
   $mobile=$andmobileA['value']; $andmobile=$andmobileA['andField'];	 
$andemailA=  $os->andField('email','email',$primeryTable,'%');
   $email=$andemailA['value']; $andemail=$andemailA['andField'];	 
$andaddressA=  $os->andField('address','address',$primeryTable,'%');
   $address=$andaddressA['value']; $andaddress=$andaddressA['andField'];	 
$andpostCodeA=  $os->andField('postCode','postCode',$primeryTable,'%');
   $postCode=$andpostCodeA['value']; $andpostCode=$andpostCodeA['andField'];	 
$andsourceA=  $os->andField('source','source',$primeryTable,'%');
   $source=$andsourceA['value']; $andsource=$andsourceA['andField'];	 
$andstatusA=  $os->andField('status','status',$primeryTable,'%');
   $status=$andstatusA['value']; $andstatus=$andstatusA['andField'];	 
$andnoteA=  $os->andField('note','note',$primeryTable,'%');
   $note=$andnoteA['value']; $andnote=$andnoteA['andField'];	 

    $f_registerDate= $os->setNget('f_registerDate',$primeryTable);
	$t_registerDate= $os->setNget('t_registerDate',$primeryTable);
   $andregisterDate=$os->DateQ('registerDate',$f_registerDate,$t_registerDate,$sTime='00:00:00',$eTime='59:59:59');
   
$andType=" and type='Vendor'";

$listingQuery=" select * from $primeryTable where $primeryField>0   $andcode  $andfirstName  $andlastName  $andpurpose  $andtelephone  $andmobile  $andemail  $andaddress  $andpostCode  $andsource  $andstatus  $andnote  $andregisterDate    $andActive $andType order by $primeryField desc  ";

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
	

 Code: <input type="text" name="code" id="code" value="<?php echo $code?>" style="width:100px;" /> &nbsp;  
   First Name: <input type="text" name="firstName" id="firstName" value="<?php echo $firstName?>" style="width:100px;" /> &nbsp;  
   Last Name: <input type="text" name="lastName" id="lastName" value="<?php echo $lastName?>" style="width:100px;" /> &nbsp;  
  
   Email: <input type="text" name="email" id="email" value="<?php echo $email?>" style="width:100px;" /> &nbsp;  
 
 
  From Registered: <input class="dtpk" type="text" name="f_registerDate" id="f_registerDate" value="<?php echo $f_registerDate?>" style="width:100px;" /> &nbsp;  
  To Registered: <input class="dtpk" type="text" name="t_registerDate" id="t_registerDate" value="<?php echo $t_registerDate?>" style="width:100px;" /> &nbsp;  
  <div style="display:none;">
   Purpose: <input type="text" name="purpose" id="purpose" value="<?php echo $purpose?>" style="width:100px;" /> &nbsp;  
   Telephone: <input type="text" name="telephone" id="telephone" value="<?php echo $telephone?>" style="width:100px;" /> &nbsp;  
   Mobile: <input type="text" name="mobile" id="mobile" value="<?php echo $mobile?>" style="width:100px;" /> &nbsp;  
     Source:
	
	<select name="source" id="source" class="textbox fWidth" ><option value="">Select Source</option>	<? 
										  $os->onlyOption($os->source,$source);	?></select>	
   Status:
	
	<select name="status" id="status" class="textbox fWidth" ><option value="">Select Status</option>	<? 
										  $os->onlyOption($os->status,$status);	?></select>	
   Note: <input type="text" name="note" id="note" value="<?php echo $note?>" style="width:100px;" /> &nbsp;  
     Address: <input type="text" name="address" id="address" value="<?php echo $address?>" style="width:100px;" /> &nbsp;  
   Post Code: <input type="text" name="postCode" id="postCode" value="<?php echo $postCode?>" style="width:100px;" /> &nbsp;  
  </div>
	 
	
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
								
								
<td ><b>Code</b></td>  
  <td ><b>First Name</b></td>  
  <td ><b>Last Name</b></td>  
  <td ><b>Purpose</b></td>  
  <td ><b>Telephone</b></td>  
  <td ><b>Mobile</b></td>  
  <td ><b>Email</b></td>  
  <td ><b>House Name</b></td>  
  <td ><b>Address</b></td>  
  <td ><b>Post Code</b></td>  
  <td ><b>Source</b></td>  
  <td ><b>Status</b></td>  
  <td ><b>Note</b></td>  
  <td ><b>Registered</b></td>  
  
								
								 
								
                                
								
								
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
								
								
<td><?php echo $record['code']?> </td>  
  <td><?php echo $record['firstName']?> </td>  
  <td><?php echo $record['lastName']?> </td>  
  <td><?php echo $record['purpose']?> </td>  
  <td><?php echo $record['telephone']?> </td>  
  <td><?php echo $record['mobile']?> </td>  
  <td><?php echo $record['email']?> </td>  
  <td><?php echo $record['flatOrHouseName']?> </td>  
  <td><?php echo $record['address']?> </td>  
  <td><?php echo $record['postCode']?> </td>  
  <td><?php echo  
	$os->source[$record['source']]; ?></td> 
  <td><?php echo  
	$os->status[$record['status']]; ?></td> 
  <td><?php echo $record['note']?> </td>  
  <td><?php echo $os->showDate($record['registerDate']);?> </td>  
  
							 	
								
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
	 
	   
 var codeV= os.getVal('code'); 
 var firstNameV= os.getVal('firstName'); 
 var lastNameV= os.getVal('lastName'); 
 var purposeV= os.getVal('purpose'); 
 var telephoneV= os.getVal('telephone'); 
 var mobileV= os.getVal('mobile'); 
 var emailV= os.getVal('email'); 
 var addressV= os.getVal('address'); 
 var postCodeV= os.getVal('postCode'); 
 var sourceV= os.getVal('source'); 
 var statusV= os.getVal('status'); 
 var noteV= os.getVal('note'); 
 var f_registerDateV= os.getVal('f_registerDate'); 
 var t_registerDateV= os.getVal('t_registerDate'); 
window.location='<?php echo $listPAGEUrl; ?>code='+codeV +'&firstName='+firstNameV +'&lastName='+lastNameV +'&purpose='+purposeV +'&telephone='+telephoneV +'&mobile='+mobileV +'&email='+emailV +'&address='+addressV +'&postCode='+postCodeV +'&source='+sourceV +'&status='+statusV +'&note='+noteV +'&f_registerDate='+f_registerDateV +'&t_registerDate='+t_registerDateV +'&';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>code=&firstName=&lastName=&purpose=&telephone=&mobile=&email=&address=&postCode=&source=&status=&note=&f_registerDate=&t_registerDate=&';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>