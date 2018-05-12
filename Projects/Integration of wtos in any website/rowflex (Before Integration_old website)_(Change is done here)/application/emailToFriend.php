<?php

global $os,$pageVar,$propertyId,$pro,$pImage,$site;

 

function attachedFileCreation($site,$os,$pageVar,$propertyId,$pro,$pImage)

{

 	

	$bigImg=$site['url'].$pImage['0']['image'];

	$smallImg1=$site['url'].$pImage['0']['image'];

	$smallImg2=$site['url'].$pImage['1']['image'];

	$smallImg3=$site['url'].$pImage['2']['image'];

	$smallImg4=$site['url'].$pImage['3']['image'];

	$smallImg5=$site['url'].$pImage['4']['image'];

	$smallImg6=$site['url'].$pImage['5']['image'];

	

	$floorPlanImg=$site['url']. $pro['floorplan'];

	$epcImg=$site['url']. $pro['EPC'];

	$os->startOB();

?>

<div style="width:1090px; margin:auto;">



 

  <div>

	<div style="background:#a6003e; padding:0px 17px 0px 17px; height:98px;">

		<div>

			<div style="width:182px; float:left;padding-top:2px;"><img src="<?php echo $site['themePath']?>images/b_logo.jpg" border="0" width="182" height="84" /></div>

			<div style="width:380px; float:right;">

				<div style="font-family: Myriad Pro; font-size:28px; color:#FFFFFF; text-align:right; padding-top:20px;">020 8834 7030</div>

				<div style="font-family: Myriad Pro; font-size:16px; color:#f1c2d3; text-align:right; padding-top:0px;">121 Fulham Palace Road, Hamersmith, London W6 8JA</div>

			</div>

			<div style="font-size:0px; line-height:0px; clear:both;"></div>

		</div>

	</div>

	<div style="position:absolute; width:360px; background:#ede6d1; margin-top:40px;">

	 	<div style="font-family: Myriad Pro; font-size:17px; font-weight:bold; color:#a5023e; padding:10px 5px 10px 10px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>

	</div>

	<div><img src="<?php  echo $bigImg;?>" border="0" width="1090" height="651"/></div>

	

	

  </div>

  



<? if($pro['type']!="Rent"){ ?>

 

<div style="padding-top:60px;">

	<div style="padding:0px 5px 0px 5px;">

	<div style="width:813px; float:left;">

		<div>

		<div style="width:543px; float:left;">

			<table width="100%" border="0">

			  <tr>

				<td align="left" valign="middle"><img src="<? echo $smallImg1; ?>" border="0" width="265" height="192"/></td>

				<td align="left" valign="middle">&nbsp;</td>

				<td align="left" valign="middle"><img src="<? echo $smallImg2; ?>" border="0" width="262" height="191" /></td>

			  </tr>

			  <tr>

				<td align="left" valign="middle"><img src="<? echo $smallImg3; ?>" border="0" width="265" height="187" /></td>

				<td align="left" valign="middle">&nbsp;</td>

				<td align="left" valign="middle"><img src="<? echo $smallImg4; ?>" border="0"  width="262" height="191" /></td>

			  </tr>

		  </table>



		</div>

	    <div style="width:202px; float:right;"><img src="<? echo $floorPlanImg; ?>" border="0" width="202" height="385"/></div>

		<div style="font-size:0px; line-height:0px; clear:both;"></div>

		</div>

		<div>

			<div style="font-family: Myriad Pro; font-size:17px; font-weight:bold; color:#515151; padding:10px 0px 0px 5px; line-height:18px;">

			 <?php echo stripslashes($pro['fullDescription'])?>	</div>

			<div>&nbsp;</div>

		</div>

	</div>

	<div style="width:228px; float:right;">

		<div style="border-left:#ececec solid 1px;">

			<div style="padding:0px 0px 0px 10px;">

				<div style="width:60px;">

					<table width="100%" border="0">

							  <tr>

								<td align="left" valign="middle" style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu01.jpg" border="0" width="32" height="20" /></a></td>

								<td align="left" valign="middle"  style="font-family: Myriad Pro; font-size:16px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bed']?></td>

								<td align="left" valign="middle"  style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu02.jpg" border="0" /></a></td>

								<td align="left" valign="middle"   style="font-family: Myriad Pro; font-size:16px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bath']?></td>

								<td align="left" valign="middle" >&nbsp;</td>

							  </tr>

					  </table>

				</div>

				<div>

				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:justify; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:justify; font-weight:bold;">Leasehold</span> <?php echo $pro['leasehold']?>  </div>

				<div style="padding-top:10px;">

				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:justify; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:justify; font-weight:bold;">Ground Rent</span> <?php echo $pro['groundrent']?> 

annum approx  </div>

                </div>

				<div style="padding-top:10px;">

				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:left; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:left; font-weight:bold;">Service Charge</span> – <?php echo $pro['servicecharge']?> 

per annum approx </div>

                </div>

				</div>

				<div style="padding-top:10px;">

					<div><img src="<? echo $epcImg; ?>" border="0" width="173" height="154" /></div>

				</div>

			</div>

			<div style="padding-top:190px;">

			<div style="background:#a5003e; height:40px;">

				

				<div style="padding:3px 20px 0px 30px;">

				<table width="100%" border="0">

  <tr>

    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:20px; color:#fff; font-weight:bold;">Prices:</td>

    

    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:20px; color:#fff; font-weight:bold;">£ <?php echo $pro['price']?>  <?php echo $pro['priceUnit']?></td>

  </tr>

</table>

				</div>



		

			</div>

			<div style="height:50px;">&nbsp;</div>

			</div>

		</div>

	</div>

	<div style="font-size:0px; line-height:0px; clear:both;"></div>

	</div>

</div>

 

<!--FOOTER-->	

  

<div>

	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>	

	<div style="background:#f4efdc; height:35px;">

		<div style="width:704px; float:left;">

		<div style=" padding:5px 0px 0px 8px;">

			<table width="100%" border="0">

  <tr>

    <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">P: 020 3695 7896</td>

    

    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">E:     admin@webhouse4u.co.uk 



k</td>

   

    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">W: www.webhouse4u.co.uk</td>

  </tr>

</table>



		</div>

		</div>

		<div style="width:160px; float:right;">

			<div style="padding-top:3px;"><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></div>

		</div>

		<div style="font-size:0px; line-height:0px; clear:both;"></div>

	</div>	

	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>

	<div style="font-family: Myriad Pro; font-size:13px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">

			These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are	</div>

	</div>



<? }  else{ ?>

<!--Part002-->

 

<div style="padding-top:90px;">

	<div style="padding:0px 5px 0px 5px;">

	<div style="width:839px; float:left;">

		<div><table width="100%" border="0">

  <tr>

    <td align="left" valign="middle"><img src="<? echo $smallImg1; ?>" border="0" width="267" height="190" /></td>

    <td align="left" valign="middle"><img src="<? echo $smallImg2; ?>" border="0" width="262" height="190" /></td>

    <td align="left" valign="middle"><img src="<? echo $smallImg3; ?>" border="0" width="262" height="190" /></td>

  </tr>

  <tr>

    <td align="left" valign="middle"><img src="<? echo $smallImg4; ?>" border="0" width="267" height="185" /></td>

    <td align="left" valign="middle"><img src="<? echo $smallImg5; ?>" border="0" width="261" height="185" /></td>

    <td align="left" valign="middle"><img src="<? echo $smallImg6; ?>" border="0" width="261" height="185" /></td>

  </tr>

</table>

</div>

		<div>

			<div style="font-family: Myriad Pro; font-size:17px; font-weight:bold; color:#515151; text-align:justify; padding:10px 5px 0px 5px; line-height:18px;">

			<?php echo stripslashes($pro['fullDescription'])?>		</div>

			<div>&nbsp;</div>

		</div>

	</div>

	<div style="width:228px; float:right;">

		<div style="border-left:#ececec solid 1px;">

			<div style="padding:0px 0px 0px 10px;">

				<div style="width:60px;">

					<table width="100%" border="0">

							  <tr>

								<td align="left" valign="middle" style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu01.jpg" border="0" width="32" height="20" /></a></td>

								<td align="left" valign="middle"  style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bed']?></td>

								<td align="left" valign="middle"  style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu02.jpg" border="0" width="32" height="20" /></a></td>

								<td align="left" valign="middle"   style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bath']?></td>

								<td align="left" valign="middle" >&nbsp;</td>

							  </tr>

					  </table>

				</div>

				<div>

				

				<div style="padding-top:10px;">

				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:justify; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:justify; font-weight:bold;">Council Tax</span> <?php echo $pro['counciltax']?>   </div>

                </div>

				<div style="padding-top:10px;">

				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:left; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:left; font-weight:bold;">Underground</span> <?php echo $pro['underground']?><br />



 </div>

                </div>

				</div>

				<div style="padding-top:20px;">

					<div><img src="<? echo $epcImg; ?>" border="0" width="173" height="154" /></div>

				</div>

			</div>

			<div style="padding-top:205px;">

			<div style="background:#a5003e; height:40px;">

				

				<div style="padding:3px 20px 0px 30px;">

				<table width="100%" border="0">

  <tr>

    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:20px; color:#f0e8d6; font-weight:bold; ">Prices:</td>

    

    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:20px; color:#f0e8d6; font-weight:bold; ">£ <?php echo $pro['price']?>  <?php echo $pro['priceUnit']?></td>

  </tr>

</table>

				</div>



		

			</div>

			<div style="height:50px;">&nbsp;</div>

			</div>

		</div>

	</div>

	<div style="font-size:0px; line-height:0px; clear:both;"></div>

	</div>

</div>

 

	

<!--FOOTER-->	

  

	

<div>

	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>	

	<div style="background:#f4efdc; height:35px;">

		<div style="width:704px; float:left;">

		<div style=" padding:5px 0px 0px 8px;">

			<table width="100%" border="0">

  <tr>

  <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">P: 020-8696-6904</td>

    

    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">E: info@heavenproperties.co.uk</td>

   

    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">W: www.heavenproperties.co.uk</td>

  </tr>

    

</table>



		</div>

		</div>

		<div style="width:160px; float:right;">

			<div style="padding-top:3px;"><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></div>

		</div>

		<div style="font-size:0px; line-height:0px; clear:both;"></div>

	</div>	

	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>

	<div style="font-family: Myriad Pro; font-size:13px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">

			These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are	</div>

	</div>

		



<? } ?>







</div>

<?  

	$attachedFilecontent=$os->getOB();

	return $attachedFilecontent;

}





 



$msgEnquerye='';

 

if($_POST['sendmail']=='sendmail')

{

 $msgEnquerye='<font style="color:#FF0000" > Sorry your message failed  please try agin. </font>';

           ## attach ments--file -----

					

			$fileName=str_replace(array(' ',',',"'",'"','`'),'',$pro['title']).'.html';

			$filePath=$site['root'].'wtos-images/'.$fileName;

			$fileLink=$site['url'].'wtos-images/'.$fileName;

			

			$fileContent=attachedFileCreation($site,$os,$pageVar,$propertyId,$pro,$pImage);

			

			$fp = fopen($filePath, 'w');

			fwrite($fp, $fileContent);

		 	fclose($fp);

			 

	      //$filenamePath=$site['root'].'printFiles/abc.html';

 			## attachment file end-----

			

			

foreach($_POST['emailFriend'] as $emailFriend)

{





 



if($emailFriend!='' && $_POST['email']!='')

		{

			 

			

			 

			

			$dataToSave['emailFriend']=$emailFriend; 

		 	$dataToSave['email']=$_POST['email']; 

			 

			

			

			 

			$os->startOB();

			?>



<table width="400" border="0" cellpadding="5" cellspacing="2" >

  <tr>

    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;">&nbsp; Message from your friend  <? echo $dataToSave['email'] ?> </td>

  </tr>

  <tr>

    <td>    

			Your friend invited you to view this property . <br /> Please find attachment to view property.

			 

			

 

			 

			 

      &nbsp;</td>

  </tr>

  

</table>

<?

			

		 

		    $body=$os->getOB();

		//	$os->emailSend($os->getSettings('email'),$dataToSave['email'],$dataToSave['email'],'  New message from '. $dataToSave['email'],$body);

		 

		 

		       $attachment['file']=$filePath;

			   $attachment['filename']=$fileName;

			   $attachment['maxsize']=filesize ( $filePath );

			   $attachment['type']='html';

		

			if($os->emailSend($dataToSave['emailFriend'],$dataToSave['email'],$dataToSave['email'],'  New message from '. $dataToSave['email'],$body, $attachment)){

		    $msgEnquerye='<font style="color:#00CC00" > Message sent successfully . Thanks for your time. </font> ';

			

			}

		}



}



 unlink($filePath);







}



?>

<?  echo $msgEnquerye; ?>

<div class="email">

	<form role="form">

		<div class="form-group">

			<label for="email">Your email address:</label> <input type="email" style="width: 90%"

				class="form-control" id="email"

				placeholder=" Enter Your Email Address" name="email">

		</div>

		<div class="form-group" id="inputHolder">

			<div class="clear" ></div>

			<label for="emailFriend">Friends email address</label> 

			<input type="email" class="form-control email_doble" id="emailFriend" style="width: 90%;float:left; "  placeholder=" Enter Friends Email Address" name="emailFriend[]"/> 

				<span style="cursor: pointer;" onclick="addFld()" class="addon" >

					<i  class="glyphicon glyphicon-plus" title="Click here to add more firends"></i>

				</span>

				<div class="clear" ></div>

		</div>



		<button type="submit" class="btn btn-default">Send</button>

	</form>

</div>



<script>

var ii=0;

function addFld()

{

	

 ii++;

 if(ii<=3){

 

  var f='<p><input type="text" value="" class="form-control" style="width: 90%; margin-top: 10px" placeholder="Enter friends Email Address" name="emailFriend[]" id="emailFriend" /></p>';

	 os.setHtml('inputHolder',os.getHtml('inputHolder')+f);  

	  // $('#inputHolder').append(f);

	} 

	



  

}

function hideLoc()

{

  os.hide('locArea');

}









</script>				