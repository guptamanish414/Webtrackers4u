<?php
global $os;
$msgEnquery='';
 
if($_POST['valuation']=='valuation')
{

 
$msgEnquery='<font style="color:#FF0000" > Sorry your message failed  please try agin. </font>';
if($_POST['name']!='' && $_POST['email']!='')
		{
			 
			# save to data base  888
			 
			
			$dataToSave['name']=$_POST['name']; 
			$dataToSave['address']=$_POST['address']; 
			$dataToSave['city']=$_POST['city']; 
			$dataToSave['postcode']=$_POST['postcode']; 
			$dataToSave['email']=$_POST['email']; 
			$dataToSave['telephone']=$_POST['telephone']; 
			
			$dataToSave['details']=$_POST['details']; 
			 
			
			
			 
			$os->startOB();
			?>

<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;">&nbsp; New message from <? echo $dataToSave['name'] ?> </td>
  </tr>
  <tr>
    <td>    
			Name: <strong><? echo $dataToSave['name']?></strong> <br /><br />
			address: <strong><? echo $dataToSave['address']?></strong> <br /><br />
			city: <strong><? echo $dataToSave['city']?></strong> <br /><br />
			postcode: <strong><? echo $dataToSave['postcode']?></strong> <br /><br />
			email: <strong><? echo $dataToSave['email']?></strong> <br /><br />
			telephone: <strong><? echo $dataToSave['telephone']?></strong> <br /><br />
			
			Message: <strong><? echo $dataToSave['details']?></strong> <br /><br />
			
 
			 
			 
      &nbsp;</td>
  </tr>
  
</table>
<?
			
		 
		    $body=$os->getOB();
			$os->emailSend($os->getSettings('email'),$dataToSave['email'],$dataToSave['name'],'  New message from '. $dataToSave['name'],$body);
		    $msgEnquery='<font style="color:#00CC00" > Message sent successfully . Thanks for your time </font> ';
		}


}

?>
<form action="" method="post">
			<?  echo $msgEnquery; ?>
			<div id="veritionblock_contact">
			   <div>
			<aside id="valution_leftdiv">
			 <div class="name_plane">Name<font style=" font-size:12px; color:#FF0000"> *</font> :</div>
			</aside>
			<aside id="valution_rightdiv">
				<div><input type="text" name="name" class="varition_fild1"> </div>
			</aside>
			<div class="clear"></div>
			</div>
			<div>
			<aside id="valution_leftdiv">
			 <div class="name_plane">Email<font style=" font-size:12px; color:#FF0000"> *</font>: </div>
			</aside>
			<aside id="valution_rightdiv">
				<div><input name="email" type="text" class="varition_fild1"> </div>
			</aside>
			<div class="clear"></div>
			</div>
			   <div>
			<aside id="valution_leftdiv">
			 <div class="name_plane">Address: </div>
			</aside>
			<aside id="valution_rightdiv">
				<div><input name="address" type="text" class="varition_fild1"></div>
			</aside>
			<div class="clear"></div>
			</div>
			   <div>
			<aside id="valution_leftdiv">
			 <div class="name_plane">Town/city: </div>
			</aside>
			<aside id="valution_rightdiv">
				<div><input name="city" type="text" class="varition_fild1"></div>
			</aside>
			<div class="clear"></div>
			</div>
			   <div>
			   	<div id="post_block_contact">
			    <aside id="valution_leftdiv">
			 <div class="name_plane">Postcode: </div>
			</aside>
			    <aside id="postcode_rightdiv">
				<div><input name="postcode" type="text" class="post_fild1"></div>
			</aside>
			    <div class="clear"></div>
				</div>
			</div>
			   
			   <div>
			<aside id="valution_leftdiv">
			 <div class="name_plane">Telephone: </div>
			</aside>
			<aside id="valution_rightdiv">
				<div><input name="telephone" type="text" class="varition_fild1"></div>
			</aside>
			<div class="clear"></div>
			</div>
			
			    <div>
			   	<div id="post_block_contact">
			    
			    <div class="clear"></div>
				</div>
			</div>
			   
			</div>
			
			<div class="valution_plane01">Please enter details about the property, such as the type of property and number of bedrooms. If the address to be valued is different to the address you gave above, include it here.</div>
			
			<div id="veritionblock_contact">
			   <div>
			<aside id="valution_leftdiv">
			 <div class="name_plane">Message:</div> <!-- Details Change into Message but rest of code is same -->
			</aside>
			<aside id="valution_rightdiv">
				<div><textarea name="details" class="veri_textarea1"></textarea></div>
			</aside>
			<div class="clear"></div>
			</div>
			
				<div>
			   	<div id="button_block_contact">
			    	
					<aside id="valutionbutton_leftdiv">
						
						<input type="submit" value="Send" class="valution_button" />
						<input type="hidden" name="valuation" value="valuation" />
					</aside>
					<aside id="valutionbutton_leftdiv">
						
					<input type="button" value="Back" class="valution_button" onclick="window.location='<? echo $site['url'] ?>'" />
					</aside>
			    <div class="clear"></div>
			   
				</div>
			</div>
			
			
			   
			</div>
			
	</form>		