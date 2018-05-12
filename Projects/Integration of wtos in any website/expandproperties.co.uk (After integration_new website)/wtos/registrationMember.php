<?php
include('includes/config.php');
include('top-inner.php');


$memberId=$_GET['memberId'];
$member=$os->get_member("memberId='$memberId'");
$member=$member[0];
$pageData=$member;
 
?>

<table border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td style="padding-top:10px;" >
	
	 <div id="typeMemberDiv" style="display:none;" >   
			 
			 </div></td></tr><tr>
    <td >
	<div id="memberDetails">
	<table border="0" class="formClass"   >
	
	
	<tr >
	  									<td>Member Type </td>
										<td> <select name="type" id="type" class="textbox fWidth" >	<option value="">Select Type</option><? 
										  $os->onlyOption($os->memberType,$pageData['type']);	?></select>	
										</td>						
										
	  									<td>Registered  </td>
										<td><input value="<?php if(isset($pageData['registerDate'])){ echo $os->showDate($pageData['registerDate']); } ?>" type="text" name="registerDate" id="registerDate" class="textbox fWidth" style="font-size:12px; font-weight:bold; background-color:#EEEEEE; width:110px; color:#000099" disabled="disabled"/> 
										</td>						
										
	  									<td>Code </td>
										<td>
										 <input value="<?php if(isset($pageData['code'])){ echo $pageData['code']; } ?>" type="text" name="code" id="code" class="textbox fWidth" disabled="disabled" style="font-size:14px; color:#0000CC; background-color:#F5F5F5; width:100px;"/>
										</td>						
										</tr>
	
	
	
	
	<tr >
	  									<td>First Name </td>
										<td><input value="<?php if(isset($pageData['firstName'])){ echo $pageData['firstName']; } ?>" type="text" name="firstName" id="firstName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Last Name </td>
										<td><input value="<?php if(isset($pageData['lastName'])){ echo $pageData['lastName']; } ?>" type="text" name="lastName" id="lastName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Status </td>
										<td>
										<select name="status" id="status" class="textbox fWidth"  style="font-size:8px;">	<? 
										  $os->onlyOption($os->status,$pageData['status']);	?></select>	
										</td>						
										</tr>
												
						
<tr >
	  									<td width="100"> Email</td>
										<td><input value="<?php if(isset($pageData['email'])){ echo $pageData['email']; } ?>" type="text" name="email" id="email" class="textbox fWidth" />
										</td>						
										
	  									<td>Mobile </td>
										<td><input value="<?php if(isset($pageData['mobile'])){ echo $pageData['mobile']; } ?>" type="text" name="mobile" id="mobile" class="textbox fWidth"/>
										</td>						
										
	  									<td>Telephone </td>
										<td><input value="<?php if(isset($pageData['telephone'])){ echo $pageData['telephone']; } ?>" type="text" name="telephone" id="telephone" class="textbox fWidth" style="width:90px;"/>
										</td>						
										</tr>
											
										
										
										
										
											
										
										<tr >
	  									<td>House Name </td>
										<td><input value="<?php if(isset($pageData['flatOrHouseName'])){ echo $pageData['flatOrHouseName']; } ?>" type="text" name="flatOrHouseName" id="flatOrHouseName" class="textbox fWidth"/>
										</td>						
										
	  									<td>Address </td>
										<td><input value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="address" id="address" class="textbox fWidth"/>
										</td>						
										
	  									<td>Post Code </td>
										<td><input value="<?php if(isset($pageData['postCode'])){ echo $pageData['postCode']; } ?>" type="text" name="postCode" id="postCode" class="textbox fWidth" style="width:90px;"/>
										</td>						
										</tr>
											<tr >
	  									<td>Purpose </td>
										<td><input value="<?php if(isset($pageData['purpose'])){ echo $pageData['purpose']; } ?>" type="text" name="purpose" id="purpose" class="textbox fWidth"/>
										</td>	
											<td>Note </td>
										<td ><input value="<?php if(isset($pageData['note'])){ echo $pageData['note']; } ?>" type="text" name="note" id="note" class="textbox fWidth"/>
										</td>							
										
	  									<td>Source </td>
										<td><select name="source" id="source" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->source,$pageData['source']);	?></select>	
  
										</td>						
										
	  													
										</tr>
										
	  												
										
	  									 
											
										
										
						
						</table>
	</div>
	
	 
	
	</td></tr>
	</table>
	
       <script>
			
	 dateCalander();
	
	</script>
	
   
	<? include('bottom-inner.php')?>