<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='admin';
$primeryTable='admin';
$primeryField='adminId';
$editHeader='EDIT ADMIN';
// get row data
if($rowId)
  {
        
		 $where="$primeryField='$rowId'";
		$pageData=$os->getT($primeryTable,'',$where);
		
		
		if(isset($pageData[0]))
		{
		  $pageData=$pageData[0];
		  
		  
		    $accessStr  =  $pageData['access'];
		  if($accessStr!=''){$accessArr = explode(',',$accessStr);}
		}
        
  }




$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');
$adminAccess=array('0'=>'No','1'=>'Yes');
?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGE ?>.php" method="post"   enctype="multipart/form-data">
						
						<fieldset class="cFielSet"  >
						<legend  class="cLegend"> Access Details</legend>
						
						
						
						<table border="0" class="formClass"   >
						<tr >
							<td>User Type </td>
							<td>
								<select name="adminType" >	  
								<?php	$os->onlyOption($admintypes,$pageData['adminType']); ?>
								</select>
							</td>
							
							
							<td>User Name </td>
							<td>
								<input value="<?php if(isset($pageData['username'])){ echo $pageData['username']; } ?>" type="text" name="username" class="textbox fWidth"/>
							</td>
							
							<td>Password </td>
							<td>
								<input value="<?php if(isset($pageData['password'])){ echo $pageData['password']; } ?>" type="text" name="password" class="textbox fWidth"/>
							</td>
							
							
						</tr>
						
					
						
						
					
								
								
							</table>
						
						
						<div style="margin:5px 0px 5px 0px;">Access:</div>
						<? if(is_array($os->adminAccess) && count($os->adminAccess)>0){ 
									
									foreach($os->adminAccess as $acc=>$lebel){
									
									?>
									
									
							 <input value="<? echo $acc ?>" type="checkbox"  name="access[]" class="textbox fWidth" <? if(is_array($accessArr) && in_array($acc,$accessArr)) { ?> checked="checked" <? } ?> /> <? echo $lebel ?> <br />
								
								
								<? } }?>
						
						   
						
						</fieldset>
						
						
						
						<fieldset class="cFielSet"  >
						<legend  class="cLegend"> Personal Details</legend>
						<span>    </span> 
						
						<table border="0" class="formClass"   >
						
						
						<tr >
							<td>Name </td>
							<td>
								<input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" class="textbox fWidth"/>
							</td>
														
							<td>Mobile </td>
							<td>
								<input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" class="textbox fWidth"/>
							</td>
							
							<td>Email </td>
							<td>
								<input value="<?php if(isset($pageData['mobileNo'])){ echo $pageData['mobileNo']; } ?>" type="text" name="mobileNo" class="textbox fWidth"/>
							</td>
							
							
						</tr>
						
						<tr >
							<td>Adress </td>
							<td colspan="3">
								<textarea  name="address" id="address" rows="1" cols="50"><?php if(isset($pageData['address'])){ echo stripslashes($pageData['address']); } ?></textarea>
											
							</td>
														
							
							
							
						</tr>
							</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit"  value="Cancel" 
									onclick="javascript:window.location='<? echo $listPAGE ?>.php';" />	
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


					

   
	<? include('bottom.php')?>