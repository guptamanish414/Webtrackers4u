<?php

$msgEnquery='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	if (empty($_POST["fullname"])) {
	$msgEnquery = "Name is required";
	} else {
	$name = test_input($_POST["fullname"]);
	}
	
	if (empty($_POST["email"])) {
	$msgEnquery = "Email is required";
	} else {
	$email = test_input($_POST["email"]);
	}
	
	if (empty($_POST["mobile"])) {
	$msgEnquery = "Message is required";
	} else {
	$mobile = test_input($_POST["mobile"]);
	}
	if (empty($_POST["details"])) {
	$msgEnquery = "Message is required";
	} else {
	$message = test_input($_POST["details"]);
	}
  
$msgEnquery=' Sorry your message failed  please try agin';
if($_POST['fullname']!='' && $_POST['email']!='')
		{
			
			
			# save to data base  888
			
			$dataToSave['name']=$name;
			$dataToSave['email']=$email; 
			$dataToSave['mobile']=$mobile; 
			$dataToSave['details']=$message; 
			$dataToSave['addedDate']=date('Y-m-d h:i:s');
			$os->save('contactus',$dataToSave,$primeryField,$rowId);		
				# save to data base  888 end	
			$os->startOB();
			?>

<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#ffffff; color:#666666; font-size:15px; font-weight:bold;">&nbsp; <? echo $_POST['fullname']?> Contacting  <? echo $site['url']; ?>  </td>
  </tr>
  <tr>
    <td>  Name: <strong><? echo $_POST['fullname']?></strong> <br /><br />
 
			Email : <? echo $_POST['email']?> <br /><br />
			
			Mobile no : <? echo $_POST['mobile']?> <br /><br />
			Query : <? echo $_POST['details']?> <br /><br />
			 
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


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<div class="row-fluid">
                    	<div class="map"> <div id="gmap_canvas" style="height:100%; width:100%;max-width:100%;">
                        	<iframe style="height:100%;width:100%;border:0; position:relative;" frameborder="0" src="<? echo $site['url']?>application/broadMap.php?address=47 London Rd, London SW17 9JR, UK"></iframe></div>
                      </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<form class="form-group" method="post">
                    	<div class="form-group">
                           <input id="name" name="fullname" class="form-control input-lg" placeholder="Name" type="text">
                           <span class="error"> <?php echo $nameErr;?></span>
                       </div>
                       <div class="form-group">
                          <input id="email" name="email" class="form-control input-lg" placeholder="Email" type="email">
                          <span class="error"> <?php echo $nameErr;?></span>
                       </div>
                       <div class="form-group">
                          <input id="phone" name="mobile" class="form-control input-lg" placeholder="Phone" type="text">
                          <span class="error"> <?php echo $nameErr;?></span>
                       </div>
                       <div class="form-group">
                           <textarea cols="6" rows="5" id="comments" name="comments" class="form-control input-lg" placeholder="Details"></textarea>
                           <span class="error"> <?php echo $nameErr;?></span>
                    </div>
                    <div class="text-center"><input id="submit" name="submit" class="button Submit" value="Submit Now !" type="submit"></div>
                    
                    
                    </form>
                	
                
                </div>