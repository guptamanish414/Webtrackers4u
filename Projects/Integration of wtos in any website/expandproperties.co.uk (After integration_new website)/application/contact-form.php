
			<?php

$msgEnquery='Leave A Message';
 function get_numerics ($str) {
        preg_match('/\d+/', $str, $matches);
        return $matches[0];
    }
	$ntPart= get_numerics ($_POST['name-b']) ;
	
	// if($ntPart>0){ $_SESSION["wt-captcha"]="";}
	$ok_forwardmail=true;
	if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
	{
	   $ok_forwardmail=false;
	 
	}
	 
//if($_POST['footerMsg']=='footerMsg' && $_SESSION["wt-captcha"]==$_POST["wt-captcha"]&& $_SESSION["wt-captcha"]!='')
//{$_SESSION["wt-captcha"]=='';
if($_POST['footerMsg']=='footerMsg' && $ok_forwardmail==true)
{



 
$msgEnquery='<font style="color:#FF0000" > Sorry your message failed  please try agin.</font>';
if($_POST['name-b']!='' && $_POST['email-b']!=''  )
		{
			 
			# save to data base  888
			
			$dataToSave['name']=$_POST['name-b']; 
			$dataToSave['phone']=$_POST['phone-b']; 
			$dataToSave['email']=$_POST['email-b']; 
			$dataToSave['msg']=$_POST['msg-b']; 
			 
			$os->startOB();
			?>

<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;">&nbsp; New message from <? echo $dataToSave['name'] ?>  </td>
  </tr>
  <tr>
    <td>    Name: <strong><? echo $dataToSave['name']?></strong> <br /><br />
 
			Email : <? echo $dataToSave['email']?> <br /><br />
			
			Mobile no : <? echo $dataToSave['phone']?> <br /><br />
			Message  : <? echo $dataToSave['msg']?> <br /><br />
			 
      &nbsp;</td>
  </tr>
  
</table>
<?
			
		 
		    $body=$os->getOB();
			$os->emailSend($os->getSettings('email'),$dataToSave['email'],$dataToSave['name'],'  New message from '. $dataToSave['name'],$body);
			
			 
			
			 $dataToSave2['name']= 'Contact from  '.$dataToSave['name'];
		    $dataToSave2['email']= $dataToSave['email'];
			 $dataToSave2['mobile']=$dataToSave['phone'];
			  $dataToSave2['details']= $dataToSave['msg'];
			$os->save('contactus',$dataToSave2,$primeryField,$rowId);	
			
			
			
		 
		    $msgEnquery='<font style="color:#00CC00" > Message sent successfully . Thanks for your time </font> ';
		}


}elseif($_POST['footerMsg']=='footerMsg')
{
$msgEnquery='<font style="color:#FF0000" > Wrong Captcha code. Message failed.</font>';


}

?>  
<aside class="f_block last">
				
				
				
					<h5 id="msgResp" style="font-weight:bold"><? echo $msgEnquery ?></h5>
					<form class="footer_form" action="" method="post">
						<fieldset>
							<p>
								<label>Name</label>
								<input type="text" class="textfield1" name="name-b" id="name-b" />
							</p>
							<p>
								<label>Phone No.</label>
								<input type="text" class="textfield1" name="phone-b" id="phone-b" />
							</p>
							<p>
								<label>Email</label>
								<input type="text" class="textfield1" name="email-b" id="email-b" />
							</p>
							<p class="textarea_block">
								<label>Message</label>
								<textarea class="textarea1" name="msg-b" id="msg-b"></textarea>
								
								
							</p>
							
							<p  >
							
							
								<label>Captcha</label>
								<input id="6_letters_code" name="6_letters_code" type="text" class="textfield1"  >
								 
								 
								
								
							</p>
							<p  >
							
							
								 
							 
								<img src="<? echo $site['url'] ?>application/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg'>
								 <small>Can't read ? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small>
								
								
							</p>
							
							<p style="display:none;"  >
							 <input name="wt-captcha" type="text" class="textfield1">
							<?  $code=rand(1000,9999);
$_SESSION["wt-captcha"]=$code; ?>
							
								<b>&nbsp;   Please enter <? echo $code; ?><!--<img src="<?  echo $site['url']?>application/wtCaptcha.php" />-->   in the above captcha field.
								  
								</b>
								
							</p>
							
							<p class="submit_btn" style="text-align:center;">
							
								
								
								<input type="submit" value="Send" class="button" />
								<input type="hidden" value="footerMsg" name="footerMsg" />
							</p>
						</fieldset>
					</form>
				</aside>