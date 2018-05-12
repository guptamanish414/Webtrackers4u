<?php

$msgEnquery='';
if($_POST['querySubmit']=='queryValues')
{
$msgEnquery=' Sorry your message failed  please try agin';
if($_POST['fullname']!='' && $_POST['email']!='')
		{
			$image=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
			if($image!='')
			{
				$dataToSave['image']='wtos-images/'.$image;
				$attachments=$site['urlFront'].$dataToSave['image'];
			} 
			
			# save to data base  888
			
			$dataToSave['name']=$_POST['fullname']; 
			$dataToSave['email']=$_POST['email']; 
			$dataToSave['mobile']=$_POST['mobile']; 
			$dataToSave['details']=$_POST['details']; 
			$dataToSave['addedDate']=date('Y-m-d h:i:s');
			$os->save('contactus',$dataToSave,$primeryField,$rowId);		
				# save to data base  888 end	
			$os->startOB();
			?>

<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;">&nbsp; <? echo $_POST['fullname']?> Contacting  <? echo $site['url']; ?>  </td>
  </tr>
  <tr>
    <td>  Name: <strong><? echo $_POST['fullname']?></strong> <br /><br />
 
			Email : <? echo $_POST['email']?> <br /><br />
			
			Mobile no : <? echo $_POST['mobile']?> <br /><br />
			Query : <? echo $_POST['details']?> <br /><br />
			Attachment : <? echo $attachments?> <br />
      &nbsp;</td>
  </tr>
  
</table>
<?
			
		 
		    $body=$os->getOB();
			$os->emailSend($os->getSettings('email'),$_POST['email'],$_POST['fullname'],$_POST['fullname'].'  Contacting You ',$body);
		    $msgEnquery=' Message sent successfully . Thanks for your time  ';
		}


}

?>
	<style>
							
							
							.curveboxF{
							/* background:#5151FF; */
							 background:#FFFFFF; 
							-moz-border-radius:4px; 
							border-radius:4px; 
							-webkit-border-radius:4px; 
							 
							border:1px solid #CCCCCC;
							border-bottom:2px solid #CCCCCC;
							border-right:2px solid #CCCCCC;
							behavior: url(<?php  echo $site['url']; ?>ie-css3.htc); 
							color:#333333;
							width:200px;
							height:27px;
							}
							.fillform{ color:#999999; font-size:11px; font-family:Verdana, Arial, Helvetica, sans-serif; font-style:italic;}
							.msgs{color:#009900; font-size:11px; font-family:Verdana, Arial, Helvetica, sans-serif; font-style:italic;}
							.txts{color:#666666; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif;   padding-top:5px;}
							
							</style>
							 
								 
					 
					<div class="fillform" >Please fill up the contact form .We will getback to you  as soon as possible.</div>
					
					<div style="width:100%;">
					
					<form action="" method="post" id="contactUs" enctype="multipart/form-data">
					 <table border="0" cellspacing="0" cellpadding="0">
					 <tr>
    <td><div class="msgs"><? echo $msgEnquery; ?> </div>  </td>
  </tr>
  <tr>
    <td class="txts">Name <br /><input type="text" name="fullname" id="fullname" class="curveboxF" /></td>
  </tr>
  <tr>
    <td class="txts">Email  <br /><input type="text" name="email" id="email" class="curveboxF" /></td>
  </tr>
  <tr>
    <td class="txts">Mobile  <br /><input type="text" name="mobile" id="mobile" class="curveboxF" /></td>
  </tr>
  <tr>
    <td class="txts">Query <br /><textarea name="details" id="details" class="curveboxF" style="height:55px; width:300px;"></textarea></td>
  </tr>
   <tr>
    <td class="txts">Attachment <br /><input type="file" name="image" /></td>
  </tr>
   <tr>
    <td>
	<BR />
	<input type="submit" value="SEND MESSAGE" />
	<BR />
	<BR />
	</td>
  </tr>
</table>
                       <input type="hidden" name="action"  value="SUBMIT"  />
					<input type="hidden" value="queryValues" name="querySubmit"  />
		</form> 			
					
					</div>
					
					
					
				
					
					 
		