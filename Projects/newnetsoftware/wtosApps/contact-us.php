<?php
global $os;
$msgEnquery='';
 
if($os->post('querySubmit')=='queryValues')
{
$msgEnquery='<span style="color:#FF0000">  Sorry your message failed  please try agin </span>';
if($os->post('fullname')!='' && $os->post('email')!='')
		{
		$image='';
		//	$image=$os->UploadPhoto('image',$site['root'].'wtos-images');
			if($image!='')
			{
				$dataToSave['image']='wtos-images/'.$image;
				$attachments=$site['url'].$dataToSave['image'];
			} 
			
			# save to data base  888
			
			$dataToSave['name']=$os->post('fullname'); 
			$dataToSave['email']=$os->post('email'); 
			$dataToSave['mobile']=$os->post('mobile'); 
			$dataToSave['details']=$os->post('details'); 
			$dataToSave['companyName']=$os->post('companyName');
			$dataToSave['addedDate']=$os->now(); 
			$dataToSave['status']='New';
			$os->save('contactus',$dataToSave);		
				# save to data base  888 end	
			$os->startOB();
			?>

<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;"> &nbsp;<? echo $os->post('fullname')?>&nbsp; Contacting   </td>
  </tr>
  <tr>
    <td>  	Name: <strong> <? echo $os->post('fullname')?></strong> <br /><br />
 
			Email : <? echo $os->post('email')?>  <br /><br />
			
			Mobile no : <? echo $os->post('mobile')?> <br /><br />

			Company Name : <? echo $os->post('companyname')?> <br /><br />

			Message : <? echo $os->post('details')?> <br /><br />
			
      &nbsp;</td>
  </tr>
  
</table>

<?
			
		 
		    $body=$os->getOB();
			$os->sendMail($os->getSettings('email'),$os->post('email'),$os->post('fullname'),$os->post('fullname').'  Contacting You ',$body);
		    $msgEnquery=' Message sent successfully . Thanks for your time  ';
		}


}
 

?>
<div class="contact">
	<h1>contact us</h1>
	<form action="mailsending.php" method="post" id="contactUs" enctype="multipart/form-data">
    	<div class="col-md-4 col-sm-4">
        	<div class="form-group">
             <label>Name:</label>
             <input type="text" id="fullname" name="fullname" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-4">
        	<div class="form-group">
            <label>Phone Number:</label>
            <input type="number" id="mobile" name="mobile" class="form-control" required>
           </div>
            <div class="form-group">
              <label>Company Name:</label>
              <input type="text" id="companyname" name="companyname" class="form-control">
            </div>
        </div>
        
        <div class="col-md-4 col-sm-4">
        	<div class="form-group">
           <label>Message:</label>
           <textarea class="form-control" id="details" name="details" rows="3" ></textarea>
           </div>
        </div>
        <input id="submit" name="submit" class="button Submit" value="Submit now!" type="submit">
    	<input type="hidden" name="action"  value="SUBMIT"  />
		<input type="hidden" value="queryValues" name="querySubmit"  />
    
    </form>
</div>
					
					
					
				
					
					 
		