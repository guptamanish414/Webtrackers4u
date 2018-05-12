<?
if($_POST['querySubmit']=='queryValues')
{
	$msgEnquery=' Sorry your message failed  please try agin';
if($_POST['name']!='' && $_POST['email']!='')
		{
	
	
		# save to data base  888
			
		$dataToSave['name']=$_POST['name'];
		$dataToSave['email']=$_POST['email'];
		$dataToSave['mobile']=$_POST['phone'];
		$dataToSave['details']=$_POST['message'];
		$os->save('contactus',$dataToSave,$primeryField,$rowId);
		//_d($dataToSave);


$os->startOB();
?>
<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;">&nbsp; <? echo $_POST['name']?> Contacting   </td>
  </tr>
  <tr>
    <td>  Name: <strong><? echo $_POST['name']?></strong> <br /><br />
 
			Email : <? echo $_POST['email']?> <br /><br />
			
			Mobile no : <? echo $_POST['phone']?> <br /><br />
			Query : <? echo $_POST['message']?> <br /><br />
			
      &nbsp;</td>
  </tr>
  
</table>
<?
			
		 
		    $body=$os->getOB();
			$os->emailSend($os->getSettings('email'),$_POST['email'],$_POST['fullname'],$_POST['fullname'].'  Contacting You ',$body);
			//$os->emailSend($os->getSettings('email'),$_POST['email'],$_POST['fullname'],$_POST['fullname'].'  Contacting You ',$body);
		    $msgEnquery=' Message sent successfully . Thanks for your time  ';
			
		}


}

$to      = 'asraful@webtrackers.co.in';
$subject = 'the subject';
$message = 'hellodsfghfdshfdgfhsfdthsdrtsdfgsthsrghstrhsrthsrthtrhtrshsrthsrthth';
$headers = 'From: web@rosettamcdermott.com' . "\r\n" .
    'Reply-To: web@rosettamcdermott.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

 mail($to, $subject, $message, $headers);

?>


        	<div class="row v_space20">
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                
                	<h2>Contact Us</h2>
                    <h5><? echo $msgEnquery; ?></h5>
                    <p></p>
                    
                    <form role="form" method="post">
                      <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                      <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                      </div>
                      <div class="form-group">
                        <label for="message">Message</label>
                        <textarea  class="form-control" rows="5" id="message" name="message" ></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Sent</button>
                      <input type="hidden" name="action"  value="SUBMIT"  />
					<input type="hidden" value="queryValues" name="querySubmit"  />
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                	<div class="location v_space20">
                    	<img src="<?php echo $site['themePath'];?>images/aboutUS.jpg" alt=""/>
                    </div>
                </div>
            </div>
        