<?

global $os, $pageVar, $propertyId, $pro, $pImage, $site;



$propertyId = '1';

$seoId = trim ( $pageVar ['segment'] [2] );



$proQuery = " select * from property where seoId='$seoId' and active=1  ";

$prors = $os->mq ( $proQuery );

$pro = $os->mfa ( $prors );



$propertyId = $pro ['propertyId'];

$pImage = $os->get_propertyimage ( " active=1 and propertyId='$propertyId'    order by priority asc ,propertyImageId desc " );

// _d($pImage);



$proQueryS = " select * from property where active=1 and  type='" . $pro ['type'] . "' order by price desc  ";

$prorsS = $os->mq ( $proQueryS );





// _d($pro);

?><?

// msg send ------start--------

$ok_forwardmail = true;

if (empty ( $_SESSION ['6_letters_code_request'] ) || strcasecmp ( $_SESSION ['6_letters_code_request'], $_POST ['6_letters_code_request'] ) != 0) {

	$ok_forwardmail = false;

}



$msgEnqueryV = '';



if ($_POST ['bookview'] == 'bookview') {

	

	$msgEnqueryV = '<font style="color:#FF0000" > Sorry your message failed  please try agin.</font>';

	// if($_POST['name-v']!='' && $_POST['email-v']!=''&& $_SESSION["wt-captcha2"]==$_POST["wt-captcha2"]&& $_SESSION["wt-captcha2"]!='')

	// { $_SESSION["wt-captcha2"]=='';

	

	if ($_POST ['name-v'] != '' && $_POST ['email-v'] != '' && $ok_forwardmail == true) {

		

		$proENQQ = " update property set  enquery=enquery+1   where propertyId='$propertyId'   ";

		$proENQQ = $os->mq ( $proENQQ );

		// save to data base 888

		

		$dataToSaveV ['name'] = $_POST ['name-v'];

		$dataToSaveV ['phone'] = $_POST ['phone-v'];

		$dataToSaveV ['email'] = $_POST ['email-v'];

		$dataToSaveV ['msg'] = $_POST ['msg-v'];

		

		$os->startOB ();

		?>



<table width="400" border="0" cellpadding="5" cellspacing="2">

	<tr>

		<td

			style="background: #006AD5; color: #ffffff; font-size: 15px; font-weight: bold;">&nbsp; New request from <? echo $dataToSaveV['name'] ?> </td>

	</tr>

	<tr>

		<td>Request to view booking property <b> <? echo $pro['title'].$pro['name']; ?> </b><br />

			<br /> Name: <strong><? echo $dataToSaveV['name']?></strong> <br /> <br />

 

			Email : <? echo $dataToSaveV['email']?> <br /> <br />

			

			Mobile no : <? echo $dataToSaveV['phone']?> <br /> <br />

			Message  : <? echo $dataToSaveV['msg']?> <br /> <br /> &nbsp;

		</td>

	</tr>



</table>



<?

		$subjectL = $pro ['title'] . $pro ['name'] . '   BOOK VIEW REQUEST';

		

		$bodyv = $os->getOB ();

		$os->emailSend ( $os->getSettings ( 'email' ), $dataToSaveV ['email'], $dataToSaveV ['name'], $subjectL, $bodyv );

		

		$dataToSave2 ['name'] = 'VIEW REQUEST from  ' . $dataToSaveV ['name'];

		$dataToSave2 ['email'] = $dataToSaveV ['email'];

		$dataToSave2 ['mobile'] = $dataToSaveV ['phone'];

		$dataToSave2 ['details'] = $dataToSaveV ['msg'];

		$os->save ( 'contactus', $dataToSave2, $primeryField, $rowId );

		

		$msgEnqueryV = '<font style="color:#00CC00" > Message sent successfully . Thanks for your time </font> ';

	}

} else {

	$proHitQ = " update property set hits=hits+1   where propertyId='$propertyId'   ";

	$proHitQ = $os->mq ( $proHitQ );

}

?>

 <?

	

	// msg send -----

	

	?>

 <?  if($msgEnqueryV!=''){ ?>



<div id='bookmsg'

	style="position: fixed; top: 0px; left: 20%; max-width: 345px; font-size: 16px; background: #FFFFFF;">

	<h5 id="msgResp"><? echo $msgEnqueryV ?></h5>

</div>

<script>

  

  function hidemsg()

  {

    os.hide('bookmsg');

  

  }

  setTimeout('hidemsg()',5000)

 </script>

<?  } ?>



<div class="property_details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 left_site">
                <div class="product-title clearfix">
                <div class="pull-left">
                    <h3><?php echo $pro['title'] ?></h3>
                    <span class="titel_small"><?php echo $pro['address']; ?>,<?php echo $pro['postcode']; ?></span>
                </div>
                    
                    <span class="prop-price pull-right"><? echo $GLOBALS['currency']; ?><strong><?php echo  number_format( $pro['price'])?></strong> <?php echo $pro['priceUnit']?></span>
                </div>
                <div class="tab_contain_block">
                    <ul class="nav_tab">
                        <li class="active"><a data-toggle="tab" href="#tab1">Images</a></li>
                        <li><a data-toggle="tab" href="#tab2" onclick="selectPro(this,'<?php echo addslashes($pro['address'])?> ','<?php echo addslashes($pro[                                             'info'])?> ')">Map</a></li>
                        <li><a data-toggle="tab" href="#tab3">Floor Plan</a></li>
                        <li><a data-toggle="tab" href="#tab4">EPC</a></li>
                        <!-- <li><a data-toggle="tab" href="#tab5">Print</a></li> -->
                        <li><a data-toggle="tab" href="#tab6">E-mail</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="images_slider">
                                <div class="price"><i class="fa fa-home"></i>  <?php echo $pro['label']?></span>
                                    </div>
                                 <div id="sync1" class="owl-carousel big_img">

                                    <?php

                                        foreach ( $pImage as $key ) {

                                    ?>

                                    <div class="item"><img src="<? echo $site['url'] ?><? echo $key['image']?>"/></div>
                                    
                                    <? } ?>


                                 </div>
                                 <div id="sync2" class="owl-carousel thumbnail_img">

                                    <?php

                                        foreach ( $pImage as $key ) {

                                    ?>

                                    <div class="item"><img src="<? echo $site['url'] ?><? echo $key['image']?>"/></div>
                                    
                                    <? } ?>

                                 </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane fade">
                            <div class="google_map">
                            <div style="overflow:hidden;width:100%;height:300px;resize:none;max-width:100%; position:relative;"><div id="gmap_canvas" style="height:100%; width:100%;max-width:100%;">
                                    <iframe id="iframeMapId" style="height:100%;width:100%;border:0; position:relative;" frameborder="0" src="<? echo $site['url'] ?>application/broadMap.php"> </iframe>

                            </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab3" class="tab-pane fade">
                            <div class="foor_plan">
                                <? if ($pro['floorplan'] != "") { ?>
                                   
                                    <img src="<? echo $site['url'] ?><?php echo $pro['floorplan']; ?>">
                                    
                              <?  } else{  ?>
                              
                                    <p>No floor Plan </p>
                                <? } ?>
                                
                            </div>
                        </div>
                        <div id="tab4" class="tab-pane fade">
                            <? if ($pro['EPC'] != "") { ?>
                                   
                                    <img src="<? echo $site['url'] ?><?php echo $pro['EPC']; ?>">
                                    
                              <?  } else{  ?>
                              
                                    <p>No EPC </p>
                                <? } ?>
                                
                        </div> 
                        <!-- <div id="tab5" class="tab-pane fade">
                            <div class="images_slider">
                            </div>
                        </div> -->

                        <div id="tab6" class="tab-pane fade">
                            <div class="email">
                                <? include('emailToFriend.php'); ?>
                            </div>
                        </div>
                  </div>
                  	<div class="clear"></div>
                </div>
                
                <div class="description">
                    <div class="row">
                        <div class="col-md-9">
                            <h3>Property Description</h3>
                            <p><?php echo stripslashes($pro['fullDescription'])?></p>

                           <!-- <h3>Property Features</h3>
                            <ul>
                                <li>Wood floors</li>
                                <li>Overlooking the River</li>
                                <li>Mins to LRT</li>
                                <li>Three bathrooms</li>
                                <li>Off street parking</li>
                                <li>Mins to Canary Wharf</li>
                                <li>Excellent amenities</li>
                            </ul> -->


                        </div>
                        <div class="col-md-3">
                            <div class="right_book">
                                <div class="pinkblock">
                                    <a href="#" class="button" data-toggle="modal" data-target="#myModal">Book Viewing <i class="fa fa-book"></i></a></div>
                                <div class="whiteblock"><? echo $site['homeContact'];?></div>
                           </div>
                           
                           <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content Enquiry_from">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Fillup the form we will contact you soon..</h4>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form">
                                                <div class="row">
                                                    <div class="form-group col-sm-6 ">

                                                    <label for="email">Name:</label> 

                                                    <input class="form-control"id="name-v" placeholder=" Enter Your Name" name="name-v" type="text">

                                                </div>
                                                    <div class="form-group col-sm-6">

                                                    <label for="email">Phone No.:</label> 

                                                    <input class="form-control"	id="phone-v" placeholder=" Enter Your Phone Number" name="phone-v" type="text">

                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">

                                                    <label for="email-v">Email:</label> 

                                                    <input class="form-control" id="email-v" placeholder=" Enter Your Email Address" name="email-v" type="text">

                                                </div>
                                                    <div class="form-group col-sm-6">

                                                    <label for="msg-v">Message:</label>

                                                    <textarea class="form-control" rows="1" id="msg-v" name="msg-v"></textarea>

                                                </div>
                                                </div>
                                             </div>


                                             <div style="display: none;">

                                                <input name="wt-captcha2" type="text" class="textfield1">

                                                <?

                                                

                                                $code = rand ( 1000, 9999 );

                                                $_SESSION ["wt-captcha2"] = $code;

                                                ?>

                                                

                                                    <b style="color: #FFFFFF;">&nbsp;   Please enter <? echo $code; ?><?  echo $site['url']?>application/wtCaptcha.php" />   in the above captcha field.

                                                    </b>

                                                <p class="submit_btn">

                                                    <input type="submit" value="Send" class="button" /> <input

                                                        type="hidden" value="bookview" name="bookview" />

                                                </p>

                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default button" data-dismiss="modal">Send</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                          </div>
                      </div>
                   </div>
               </div> 
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 right_site">

                <? include('rightCol.php') ?>

                <div class="Featured_Properties">


                <? include('featProperty.php') ;?>
                
               
                
                

                
                </div>
                 <div class="clear"></div>
            </div>
        </div>
     </div>
 </div>

   <script>

    var tAdd='';

     

    function selectPro(d,address,info)

    {

      //alert(address);

      

       d.className='details selected';

       

       if(tAdd!=address){

      //codeAddress(address,info)

       iframeMap(address,info);

       }

        tAdd=address;

    }

    function deselectPro(d)

    {

          d.className='details';

    }

    function iframeMap(address,info){

    

    var mapurl='<? echo $site['url']?>application/broadMap.php?address='+address+'&info='+info;

     //alert(mapurl);

         os.getObj('iframeMapId').src=mapurl;

    }

    iframeMap('','');

    </script>

