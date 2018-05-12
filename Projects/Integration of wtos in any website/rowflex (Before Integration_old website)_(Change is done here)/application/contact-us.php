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

	$msgEnquery = "Mobile is required";

	} else {

	$mobile = test_input($_POST["mobile"]);

	}

	

  

$msgEnquery=' Sorry your message failed  please try agin';

if($_POST['fullname']!='' && $_POST['email']!='')

		{

			

			

			# save to data base  888

			

			$dataToSave['name']=$_POST['name'];

			$dataToSave['email']=$_POST['email'];

			$dataToSave['mobile']=$_POST['mobile'];

			$dataToSave['details']=$_POST['comments'];

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

			Company : <? echo $_POST['Company']?> <br /><br />

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


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 map_top">
	<div class="map">
    	<div class="map-responsive">
    	<iframe width="100%" height="216" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=216&amp;hl=en&amp;q=333%20Barking%20Road%2C%20East%20Ham%20London.%20Post%20Code%3A%20E6%201LA+(Rowflex)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/de/erstellen-sie-eine-google-map/">Rowflex Google Map</a> by <a href="http://www.mapsdirections.info/de/">Rowflex Google Map</a></iframe>
    </div> 
    </div>

</div>    

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left_site">
	<div class="form">
	    <form class="form-group" method="post">
		    <div class="row">
		       <div class="form-group col-md-6">
		           <input id="fullname" name="fullname" class="form-control" placeholder="Full Name*" type="text">
		           <span class="error"> <?php // echo $msgEnquery;?></span>
		       </div>
		       <div class="form-group col-md-6">
		          <input id="email" name="email" class="form-control" placeholder="Email*" type="email">
		          <span class="error"> <?php //echo $msgEnquery;?></span>
		       </div>
		       <div class="form-group col-md-6">
		          <input id="mobile" name="mobile" class="form-control" placeholder="Phone" type="text">
		          <span class="error"> <?php //echo $msgEnquery;?></span>
		       </div>
		       <div class="form-group col-md-6">
		          <input id="Company" name="Company" class="form-control" placeholder="Company Name" type="text">
		          <span class="error"> <?php //echo $msgEnquery;?></span>
		       </div>
		       <div class="form-group col-md-12">
		           <textarea cols="6" rows="5" id="comments" name="comments" class="form-control" placeholder="Message"></textarea>
		           <span class="error"> <?php //echo $msgEnquery;?></span>
		       </div>
		       <div class="col-md-12">
		       	<div class="text-center"><input id="submit" name="submit" class="button Submit" value="Submit now!" type="submit"></div>
		       </div>
		    </div>
		</form>
	</div>
</div>




