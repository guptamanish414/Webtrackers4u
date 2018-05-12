<?php

include('includes/config.php');

include('aaTop.php'); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<?

//  $loadImage=$site['url'].'image/loading.gif'; 

	       $loadImage=$site['url'].'image/ele.gif'; 

		     $tImage=$site['url'].'image/t.png'; 

			  $cImage=$site['url'].'image/c.png'; 

 ?>

 <div class="   " >

<div class="pageHead property"> Property  </div>

 

<table    cellspacing="1" cellpadding="1" width="100%" border="1" bgcolor="#FFFFFF";  >

  <tr>

  	<td width="600" valign="top">

      <form   method="post"   enctype="multipart/form-data"  id="recordEditForm"  >

                

        <input type="hidden" name="propertyId" id="propertyId" />

                      

       	<table width="100%" border="0" cellspacing="0" cellpadding="0">

      		<tr>

        		<td valign="top">

                	<table border="0" cellspacing="0" cellpadding="1" class="formClass"  style="width:510px;" >

                        <tr><td colspan="20"> 

                <span  onclick="openRooms()" style="display:none;"><input class="wtedit" type="button" value="  Rooms" /></span> 

				 <span   onclick="windowPrint()"><input class="" type="button" value="Print" /></span> 

                <span   onclick="openMarketing()"><input class="wtedit" type="button" value="  Marketing" /></span> 

                <span  style="display:none;"   class="opener" onclick="open_pop_up('EPCPopupDIV','EPC',600,400)"><input class="wtedit" type="button" value="  EPC" /></span> 

                <span  onclick="openImages();"><input class="wtedit" type="button" value="  Images" /></span> 

                  &nbsp;  <input name="button" type="button" class="submit" onclick="matchApplicants();"  style="cursor:pointer;"  value="Match Applicants" />

					&nbsp; <input type="button" class="submit"  value="Save" onclick="savePropertyData();" />&nbsp;

					</td></tr>

                        <tr><td>Code</td> <td colspan="20"> <input type="text" name="propCode" id="propCode" class="textbox fWidth" style="color:#C64000; font-weight:bold; border:none; width:150px; background:none;" disabled="disabled"/>	Registered  <input value="" type="text" name="registerDate" id="registerDate" class="textbox fWidth" style="border:none; background:none; font-weight:bold; color:#FF0000;" disabled="disabled" /></td></tr>

                        <tr>

                        <td>Property Reference</td>

                        <td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth" style="width:150px;" /></td>

                        <td>Landlord : <span id="vendorNameSpan" onclick="vendorlistPopup();" style="cursor:pointer;" title="Click to change vendor">&nbsp; No Landlord Assigned</span>

                            <input class="wtedit" type="button" onclick="vendorlistPopup();" value="" />

                

                         </td>

                <td>&nbsp;</td>

              </tr>

                        <tr>

                <td valign="top">House No/Name</td>   

                <td>

                <input value="<?php if(isset($pageData['houseNO'])){ echo $pageData['houseNO']; } ?>" type="text" name="houseNO" id="houseNO" class="textbox fWidth" style="width:150px;"/>

                	</td>

                <td>Contact : <span id="vendorAddressSpan" onclick="vendorlistPopup();" style="cursor:pointer;" title="Click to change Landlord">&nbsp;</span></td> 

                <td>&nbsp;</td>

              </tr>

                        <tr>

                <td valign="top">Address </td> 

                <td> <input value="<?php if(isset($pageData['RoadName'])){ echo $pageData['RoadName']; } ?>" type="text" name="RoadName" id="RoadName" class="textbox fWidth" /> 

                	

                <input placeholder="Address for Map" value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="address" id="address" class="textbox fWidth" style="width:150px;  "/>

                 </td>

                <td>&nbsp;<span id="vendorContactSpan" onclick="vendorlistPopup();" style="cursor:pointer;" title="Click to change vendor">&nbsp;</span></td>

                <td>&nbsp;</td>

              </tr>

                        <tr>

                <td>Town/City </td> 

                <td> <input value="<?php if(isset($pageData['townCity'])){ echo $pageData['townCity']; } ?>" type="text" name="townCity" id="townCity" class="textbox fWidth" />  </td>

                <td>Status <select name="propertyStatus" id="propertyStatus" class="textbox fWidth" >

                                        <option value="">   </option>

                                         

                                        <?

                                         

                                        $os->onlyOption($os->propertyStatus,$featured);

                                          

                                        ?>

                                    </select>   <span style="display:none;"><input type="checkbox" value="1" name="available"	  id="available"  /> Available</span></td>

                <td>&nbsp;</td>

              </tr>

                        <tr>

                <td>Postcode</td>

                <td colspan="3"> <input value="<?php if(isset($pageData['postcode'])){ echo $pageData['postcode']; } ?>" type="text" name="postcode" id="postcode" class="textbox fWidth" style="width:60px;"/> Area <select name="locationId" id="locationId" class="textbox fWidth" > 

                

            

                                

                                                <?

                                        

                                         $os->optionsHTML($pageData['locationId'],'propertylocationId','title','propertylocation');

                                        ?>

                                        </select>	<input type="button" value="+" onclick="addLocation();"/>

                                        

                                            &nbsp; &nbsp; Price  <input value="<?php if(isset($pageData['price'])){ echo $pageData['price']; } ?>" type="text" name="price" id="price" class="textbox fWidth" style="width:100px;" />

                                        

                                        

                          </td>

               

              </tr>

			  

			  <tr>

			  <td> Available date:  </td><td colspan="3"><input value="<?php if(isset($pageData['propertyAvlDate'])){ echo $pageData['propertyAvlDate']; } ?>" type="text" name="propertyAvlDate" id="propertyAvlDate" class="textbox fWidth dtpk" />&nbsp;   Available Keys 

                	<select name="availableKeys" id="availableKeys" class="textbox fWidth" >

						<?

                            $os->onlyOption($os->propYn,$pageData['availableKeys']);

                        ?> 							

                    </select></td>

			  </tr>

			  <tr>

			  <td> DSS  </td><td colspan="3"><select name="dss" id="dss" class="textbox fWidth" style="width:50px;">

						<?

                            $os->onlyOption($os->propYn,$pageData['dss']);

                            ?> 							

                    </select>

					

					 &nbsp;

					Featured <select name="featured" id="featured" class="textbox fWidth" >

							

							

							<?

							 

							$os->onlyOption($os->propFeature,$pageData['featured']);

							  

							?>

							</select> Label <select name="label" id="label" class="textbox fWidth" >

                        <?

                            $os->onlyOption($os->propLebel,$pageData['label']);

                        ?>

                     </select>	  </td>

			  </tr>

			  

			  <tr>

			  <td> Sharing  </td><td colspan="3"><select name="sharing" id="sharing" class="textbox fWidth" style="width:50px;">

						<?

                            $os->onlyOption($os->propYn,$pageData['sharing']);

                            ?> 							

                    </select>

					

					 &nbsp;

					Furnished <select name="furnished" id="furnished" class="textbox fWidth" >

							

							

							<?

							 

							$os->onlyOption($os->propYn,$pageData['furnished']);

							  

							?>

							</select> Facility <select name="facility" id="facility" class="textbox fWidth" >

                        <?

                            $os->onlyOption($os->facilityGas,$pageData['facility']);

                        ?>

                     </select>	  </td>

			  </tr>

			  

			  <tr><td colspan="2"><b>Short Description</b> <br />

			   &bull;<input value="<?php if(isset($pageData['bulletText1'])){ echo $pageData['bulletText1']; } ?>" type="text" name="bulletText1" id="bulletText1" class="textbox fWidth" style="width:240px;" /><br />

		&bull;<input value="<?php if(isset($pageData['bulletText2'])){ echo $pageData['bulletText2']; } ?>" type="text" name="bulletText2" id="bulletText2" class="textbox fWidth"  style="width:240px;"  /><br />									

		&bull;<input value="<?php if(isset($pageData['bulletText3'])){ echo $pageData['bulletText3']; } ?>" type="text" name="bulletText3" id="bulletText3" class="textbox fWidth"  style="width:240px;" /><br />									       

		&bull;<input value="<?php if(isset($pageData['bulletText4'])){ echo $pageData['bulletText4']; } ?>" type="text" name="bulletText4" id="bulletText4" class="textbox fWidth"  style="width:240px;" /><br />

		&bull;<input value="<?php if(isset($pageData['bulletText5'])){ echo $pageData['bulletText5']; } ?>" type="text" name="bulletText5" id="bulletText5" class="textbox fWidth" style="width:240px;"  /><br /> </td>

			  <td valign="top">

			  <span onclick="openAttr()"> <input class="wtedit" type="button" value="  Attribute" /></span> 

			  <textarea readonly   class="textbox fWidth" name="attribute" id="attribute"  style="width:190px; height:90px; background-color:#F4F4F4;"><?php if(isset($pageData['fullDescription'])){ echo $pageData['fullDescription']; } ?></textarea>

			  

			 

			  </td>

			  </tr>

			  

			  

			  

                       

                         

    				</table>

        		</td>

     

        		<td valign="top">

        

        <!-- hhh-->

        <span   onclick="openNotePopup('propertyId','generalNotesPopupDIV','General Notes',400,400)"><input class="wtedit" type="button" value="  General Notes" /> </span>

        <textarea id="generalNotesDiv" class="flexyAreaOutput" readonly >&nbsp;</textarea>

        <br />

        <div id="generalNotesPopupDIV" class="wtpopup">

        <textarea  name="generalNotes" id="generalNotes" class="flexyArea" rows="15"  cols="35"  ></textarea><br />

        <span onclick="closepopup('generalNotesPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp; &nbsp;

        <span onclick="saveNotes('generalNotes','property','propertyId','')" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>

        </div>

        

        

         <br />

        <span    onclick="openNotePopup('propertyId','contactNotesPopupDIV','Contact Notes',400,400)"> <input class="wtedit" type="button" value="  Contact Notes" /></span> </span>

        <textarea id="contactNotesDiv" class="flexyAreaOutput" readonly >&nbsp;</textarea>

        <br />

        <div id="contactNotesPopupDIV" class="wtpopup">

        <textarea  name="contactNotes" id="contactNotes" class="flexyArea" rows="15"  cols="35"  ></textarea><br />

        <span onclick="closepopup('contactNotesPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp; &nbsp;

        <span onclick="saveNotes('contactNotes','property','propertyId','')" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>

        </div>

         

        

        

        <!-- hhh -->

        

        

        </td> 

      		</tr>

    	</table>

		<div id="images">

		<table  border="1" cellpadding="5"><tr>

		<td><b>Floor Plan</b><br /><img id="floorplanPreview" src="" height="100" style="display:none;"	 />		

                                         <br>

                                         <input type="file" name="floorplan" value=""  id="floorplan" onchange="readURL(this,'floorplanPreview') " style="display:none;"/>

										

										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('floorplan');">Edit Image</span>

										 

										 </td>

		<td><b>Epc</b><br /> <img id="EPCPreview" src="" height="100" style="display:none;"	 />		

									     <br>  <input type="file" name="EPC"  id="EPC" onchange="readURL(this,'EPCPreview') " style="display:none;"/>

										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('EPC');">Edit Image</span>

										 </td>

		<td><b>Print Image</b><br /><img id="printImgPreview" src="" height="100" style="display:none;"	 />		

										 

                                         <br>  <input type="file" name="printImg"  id="printImg" onchange="readURL(this,'printImgPreview') " style="display:none;"/>

										 <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('printImg');">Edit Image</span></td>

										 

				 						 

		

		

		

		<td><b>QR Code</b><br /><img id="qrCodePreview" src="" height="100" style="display:none;"	 />		

									 

										  <br>  <input type="file" name="qrCode"  id="qrCode" onchange="readURL(this,'qrCodePreview') " style="display:none;"/>

										  <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('qrCode');">Edit Image</span> </td>

										  

										  <td><b>Gas Certificate </b><br /> 

									 <img id="gasCertificatePreview" src="" height="100" style="display:none;"	 />		

										  <br>  <input type="file" name="gasCertificate"  id="gasCertificate"  onchange="readURL(this,'gasCertificatePreview') " style="display:none;"/> <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('gasCertificate');">Edit Image</span>		</td>

										  <td valign="top" style="display:none;"><b>Brochure (PDF File ) </b><br /><br /><br />

		<a href="" id="brochurePdfPreview" style="display:none;"> <img src="<? echo  $site['url'] ?>image/wtpages.png" /> &nbsp; Brochure Pdf Link </a>

		<br /><br />

		<input type="file" name="brochurePdf"  id="brochurePdf" style="display:none;"/> <span style="cursor:pointer; color:#FF0000;" onclick="os.clicks('brochurePdf');">Edit File</span></td>

											 

		

		

		</tr>

		<tr>

		<td colspan="10"><span  ><b>Description</b> </span><br /><textarea class="textbox fWidth" name="fullDescription" id="fullDescription" style="width:738px; height:100px;"><?php if(isset($pageData['fullDescription'])){ echo $pageData['fullDescription']; } ?></textarea>	</td>

		</tr>

		</table>

		

											  

										  

 

		</div>

		 <span  onclick="openRooms()" style="display:none;"><input class="wtedit" type="button" value="  Rooms" /></span> 

		 

		   <span   onclick="windowPrint()"><input class="" type="button" value="Print" /></span> 

                <span   onclick="openMarketing()"><input class="wtedit" type="button" value="  Marketing" /></span> 

                <span  style="display:none;"   class="opener" onclick="open_pop_up('EPCPopupDIV','EPC',600,400)"><input class="wtedit" type="button" value="  EPC" /></span> 

                <span  onclick="openImages();"><input class="wtedit" type="button" value="  Images" /></span> 

                  &nbsp;  <input name="button" type="button" class="submit" onclick="matchApplicants();"  style="cursor:pointer;"  value="Match Applicants" />

					&nbsp; <input type="button" class="submit"  value="Save" onclick="savePropertyData();" />&nbsp;

		

		

		

        

		

		

		

		

		

		

		

		

    </form>

<!--      pop ups  123   --->

<!--      pop ups  123   --->

  </td>

    <td valign="top">

	Search <input type="text" id="srarchProperty" value="" />  Bed <select name="bed" id="bed_s" class="textbox fWidth" style="width:60px;">

											<option value=""></option>

											<option value="Studio Flat">Studio Flat</option>

											<option value="Single Room">Single Room</option>

											<option value="Double Room">Double Room</option>

											

											

											<? $os->onlyOption($os->bedDD,$pageData['bed']);	?></select>	 <input type="button" value="Search" onclick="listPropertyData()" style="cursor:pointer;" /> <input type="button" value="Reset" onclick="resetSearch()" style="cursor:pointer;" />

	<div class="listArea" >

	<div id="listPropertyData_DIV">&nbsp;</div>

	</div>

	

	

	</td>

    

    </tr>

 </table>



<!-- popups  -->

<div id="AttrPopupDIV" class="wtpopup" >

  <table width="550" border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td>Department</td>

     <td colspan="6"><select name="type" id="type" class="textbox fWidth" style="width:60px;">

    	<?  $os->onlyOption($os->propType,$pageData['type']);	?>

        </select>	 

    For 

   

  <select name="purposeType" id="purposeType" class="textbox fWidth" style="width:150px;"> 

							

							 

														<?

														 

														$os->onlyOption($os->purposePorperty,$pageData['purposeType']);

														  

														?>

												</select> Use. &nbsp;&nbsp;  Area <input value="<?php if(isset($pageData['area'])){ echo $pageData['area']; } ?>" type="text" name="area" id="area" class="textbox fWidth" style="width:90px;" /> Sq. Feet.</td>

    

  </tr>

  <tr>

    

    <td>Lease Info </td>

    <td>

 <select name="leasehold" id="leasehold" class="textbox fWidth" style="width:140px;">

							<option value=""> </option>

							 

							<?

							 

							$os->onlyOption($os->leasehold,$pageData['leasehold']);

							  

							?>

							</select></td>

    <td>Years</td>

    <td>

	   	 <input value="<?php if(isset($pageData['leaseyears'])){ echo $pageData['leaseyears']; } ?>" type="text" name="leaseyears" id="leaseyears" class="textbox fWidth" style="width:35px;"/></td>

		 

		 <td>Type for Rightmove</td>

    <td> <select name="propertyType" id="propertyType" class="textbox fWidth" >	

						<? $os->onlyOption($os->propertyType,$pageData['propertyType']);?>

                    </select>	</td>

  </tr>

  

    

  

  

  <tr>

    <td>Bed</td>

    <td> <select name="bed" id="bed" class="textbox fWidth" style="width:60px;"><? $os->onlyOption($os->bedDD,$pageData['bed']);	?></select>	</td>

    <td>Bath</td>

    <td>	<select name="bath" id="bath" class="textbox fWidth" style="width:60px;"><? $os->onlyOption($os->bathDD,$pageData['bath']);	?></select></td>

    <td>Reception</td>

    <td> <select name="sofa" id="sofa" class="textbox fWidth" style="width:60px;"><? $os->onlyOption($os->recceptionDD,$pageData['sofa']);	?></select> </td>

  </tr>

</table>



<table style="display:none;">

            <tr>

            	<td>Name:</td>

                <td>

                <input value="<?php if(isset($pageData['name'])){ echo $pageData['name']; } ?>" type="text" name="name" id="name" class="textbox fWidth" style="		width:150px;"/>

                </td>

                <td>Address:</td>

                <td>

                <input value="<?php if(isset($pageData['address'])){ echo $pageData['address']; } ?>" type="text" name="name" id="name" class="textbox fWidth" style="		width:150px;"/>

                </td>

                <td></td>

                <td>

                	

                </td>

            </tr>

            <tr>

                <td> </td>

                <td>

                     

                </td>

                <td>Ground Rent</td>

                <td>

                    <input value="<?php if(isset($pageData['groundrent'])){ echo $pageData['groundrent']; } ?>" type="text" name="groundrent" id="groundrent" class="textbox fWidth"/> 							

                </td>

               	<td> Service Charge</td>

                <td>

                    <input value="<?php if(isset($pageData['servicecharge'])){ echo $pageData['servicecharge']; } ?>" type="text" name="servicecharge" id="servicecharge" class="textbox fWidth"/>

                </td>

            </tr>

            <tr>

										

                <td>Council Tax </td>

                <td>

                <input value="<?php if(isset($pageData['counciltax'])){ echo $pageData['counciltax']; } ?>" type="text" name="counciltax" id="counciltax" class="textbox fWidth"/>

                </td>						

                

                <td>Underground </td>

                <td>

                 

            <input value="<?php if(isset($pageData['underground'])){ echo $pageData['underground']; } ?>" type="text" name="underground" id="underground" class="textbox fWidth"/>

        

                

                </td>	

                <td>EPC </td>

                <td><input value="<?php if(isset($pageData['epcvalue'])){ echo $pageData['epcvalue']; } ?>" type="text" name="epcvalue" id="epcvalue" class="textbox fWidth"/>										</td>						

                

                                

            </tr>

            <tr>

            	<td>

                	Short Description:

                </td>

                <td>

                	<textarea class="textbox fWidth" name="shortDescription" id="shortDescription" rows="" cols=""><?php if(isset($pageData['shortDescription'])){ echo $pageData['shortDescription']; } ?></textarea>	

                </td>

                <td>

                	Bullet Text:

                </td>

                <td>

                	

                </td>

				<td colspan="2">

				

				

				 

				   

				</td>

            </tr>

            

            

            

        </table>

		<br /><br />					 

<table border="0" cellspacing="1" cellpadding="1" style="width:100%">

  <tr>

    <td class="bbold">Type</td>

    <td class="bbold">Style</td>

    <td class="bbold">External</td>

    <td class="bbold">Special</td>

  </tr>

  <tr>

    <td valign="top" class="shadows"><? foreach($os->attrType as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  />  <? echo $val; ?> <br />    <?   }  ?></td>

    <td valign="top" class="shadows"><? foreach($os->attrStyle as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />     <?   }  ?></td>

   <td valign="top" class="shadows"><? foreach($os->attrExternal as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />    <?   }  ?></td>

     <td valign="top" class="shadows"><? foreach($os->attrSpecial as $key=>$val){ ?> <input type="checkbox" name="attr[]" id="<? echo $val; ?>" value="<? echo $val; ?>"  /> <? echo $val; ?> <br />     <?   }  ?></td>

  </tr>

</table>



<br /><br />

<span onclick="closepopup('AttrPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp;

<span onclick="setPropAttribute()" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>

 

 </form>

 

 

 

 

 

 

 </div>

 

<div id="RoomsPopupDIV" class="wtpopup" >

 <iframe id="roomsIframe" src="" frameborder="0" width="850" height="400" class="margzero"></iframe>

 <script>

 function viewRooms()

 {

   	var propertyId=os.getVal('propertyId');

	 

	if(propertyId>0)

	{

	       var roomIframe='aaroomIframe.php?propertyId='+propertyId;

		   os.getObj('roomsIframe').src=roomIframe;

	

	}

 

 }

 



			  

			

 </script>

 

    

 

 </div>

 

<div id="MarketingPopupDIV" class="wtpopup" >

  

  <div style="padding:10px;">

  <select name="active" id="active" class="textbox fWidth" style="width:200px;">							 

   <?

							 

							$os->onlyOption($os->showInWebsite);

							  

							?>

							</select> 

							 &nbsp;&nbsp;

							 

							  RightMove <input type="button" onclick="rightMoveAction('upload');"  value="Upload" />

 

  

  </div>

     <span onclick="closepopup('MarketingPopupDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp;&nbsp;

<span onclick="setMarketing()" class="popbutton" > <img  src="<? echo $tImage ?>" height="30" /> </span>



 </div>

<div id="EPCPopupDIV" class="wtpopup" >

     EPCDIV

 

 </div>

 

<div id="imageopupDIV" class="wtpopup" >

   <iframe id="imageIframe" src="" frameborder="0" width="850" height="400" class="margzero"></iframe>

   <script>

 function viewImages()

 {

   	var propertyId=os.getVal('propertyId');

	 

	if(propertyId>0)

	{

	

	

	       var imageIframe='propertyimage.php?hideTopLeft=1&propertyId='+propertyId;

		   // alert(imageIframe);

		   os.getObj('imageIframe').src=imageIframe;

	

	}

 

 }

 



			  

			

 </script>

 

 </div>



<div id="vendorListopupDIV" class="wtpopup" >

 

 <?  

 

 $wheres=" status='LANDLORD' ";

	

	    $listingQuery=" select * from member where $wheres order by lastName ";

		$rsmember=$os->mq($listingQuery);

		?>

		<style>

		.vendList:hover{ background-color:#FFCC66;}

		</style>

		

		

		<table width="100%" border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td valign="top"><table border="0" cellspacing="0" cellpadding="2">

  <tr style="display:none">

    <td>Title</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  





		<?

		while($vendor=$os->mfa( $rsmember))

		{

		?>

		<tr onclick="selectVendor('<? echo $vendor['memberId'] ?>')" style="cursor:pointer;" class="vendList">

    <td><? echo $vendor['title'] ?></td>

     <td><? echo $vendor['lastName'] ?></td>

    <td><? echo $vendor['firstName'] ?></td>

    <td><? echo $vendor['address'] ?> <? echo $vendor['postcode'] ?></td>

  </tr>

		

		<?

		

		}

		

		

 

  ?>

     </table></td>

    <td valign="top"> 

	

	

	

	 Add new Landlord

		

	<table width="100%" border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td>Title <br /><select name="title_prop" id="title_prop" class="textbox fWidth" >	<? 

										  $os->onlyOption($os->title,$pageData['title']);	?></select></td>

  </tr>

  

  <tr>

    <td>Surname <br /><input value="" type="text" name="lastName_prop" id="lastName_prop" class="textbox fWidth"/></td>

  </tr>

  <tr>

     <td>First Name <br /><input value="" type="text" name="firstName_prop" id="firstName_prop" class="textbox fWidth"/></td>

  </tr>

  

  <tr>

    <td>House Name/No <br /> <input value="" type="text" name="flatOrHouseName_prop" id="flatOrHouseName_prop" class="textbox fWidth"/>	 </td>

  </tr>

  <tr>

     <td>Address  <br /><input value="" type="text" name="address_prop" id="address_prop" class="textbox fWidth"/>			</td>

  </tr>

   <tr>

     <td>Town/City  <br /><input value="" type="text" name="townCity_prop" id="townCity_prop" class="textbox fWidth"/>			</td>

  </tr>

  

  <tr>

     <td>Post Code <br /><input value="" type="text" name="postCode_prop" id="postCode_prop" class="textbox fWidth"/></td>

  </tr>

  <tr>

     <td>Email <br /><input value="" type="text" name="email_prop" id="email_prop" class="textbox fWidth"/></td>

  </tr>

  <tr>

     <td>Mobile <br /><input value="" type="text" name="mobile_prop" id="mobile_prop" class="textbox fWidth" style="width:190px;"/>	</td>

  </tr>

  

   <tr>

     <td>Telephone <br /><input value="" type="text" name="telephone_prop" id="telephone_prop" class="textbox fWidth" style="width:190px;"/>	</td>

  </tr>

</table>



	<input type="button" value="OK" onclick="addnewvendor()" />

	

	

	

	

	</td>

  </tr>

</table>



		

 

 

 </div>

  

<div id="matchApplicantsDIV" class="wtpopup" >



 <div id="matchApplicantsListDiv"> &nbsp;</div>

 

 </div>

 

 

<!-- popups end  -->

 

 

<script>

function savePropertyData() 

{		

		// newly added to the to the property

		var name=os.getVal('name');

		var address=os.getVal('address');

		var propertyType=os.getVal('propertyType');

		var label=os.getVal('label');

		var groundrent=os.getVal('groundrent');

		var servicecharge=os.getVal('servicecharge');

		var counciltax=os.getVal('counciltax');

		var underground=os.getVal('underground');

		var epcvalue=os.getVal('epcvalue');

		var shortDescription=os.getVal('shortDescription');

		var bulletText1=os.getVal('bulletText1');

		var bulletText2=os.getVal('bulletText2');

		var bulletText3=os.getVal('bulletText3');

		var bulletText4=os.getVal('bulletText4'); 

		var bulletText5=os.getVal('bulletText5');

		var propertyAvlDate=os.getVal('propertyAvlDate');

		var dss=os.getVal('dss');

		var availableKeys=os.getVal('availableKeys');

		

		var purposeType=os.getVal('purposeType');

		var area=os.getVal('area');

		var featured=os.getVal('featured');

		         

		

		 //alert('hi..');

		

		//  ------------------

		var propertyId=os.getVal('propertyId');

		var title=os.getVal('title');

		//var address=os.getVal('address');  // noot use

		var postcode=os.getVal('postcode');

		

		var houseNO=os.getVal('houseNO');

		var RoadName=os.getVal('RoadName');

		var townCity=os.getVal('townCity');

		

		var locationId=os.getVal('locationId');

		var fullDescription=os.getVal('fullDescription');

		var attribute=escape(os.getVal('attribute'));

		var propertyStatus=os.getVal('propertyStatus');

		var generalNotes=escape(os.getVal('generalNotes'));

	 	var contactNotes=escape(os.getVal('contactNotes'));

	 

	 var sharing=escape(os.getVal('sharing'));

	 var furnished=escape(os.getVal('furnished'));

	 var facility=escape(os.getVal('facility'));

	   

	 

	 

	// attribute section  

	

	    var  type=escape(os.getVal('type'));

	    var  leasehold =os.getVal('leasehold');

		var  leaseyears =os.getVal('leaseyears');

		var  bed =os.getVal('bed');

		var  bath =os.getVal('bath');

		var  sofa =os.getVal('sofa');

		var  price =os.getVal('price');

	 

	 // attribute section end 

		var available=os.getVal('available');

		if(os.getObj('available').checked==false){available='';}

		 

		 var  active =os.getVal('active');

		 

		 

		  var formdata = new FormData();

		 

		var floorplan=os.getObj('floorplan').files[0];

		if(floorplan){       formdata.append('floorplan',floorplan,floorplan.name ); }

		

		var printImg=os.getObj('printImg').files[0];

		 

		if(printImg){       formdata.append('printImg',printImg,printImg.name ); }

			 

			

			var EPC=os.getObj('EPC').files[0];

	      if(EPC){     formdata.append('EPC',EPC,EPC.name ); }

			 

			

			var brochurePdf=os.getObj('brochurePdf').files[0];

	      if(brochurePdf){     formdata.append('brochurePdf',brochurePdf,brochurePdf.name ); }

			

			

			var qrCode=os.getObj('qrCode').files[0];

	      if(qrCode){     formdata.append('qrCode',qrCode,qrCode.name ); }

			

			

			var gasCertificate=os.getObj('gasCertificate').files[0];

	     if(gasCertificate){      formdata.append('gasCertificate',gasCertificate,gasCertificate.name );  }

		 

		  

		 

		

    

		if(os.check.empty('title','Missing title')==false){ return false;}

		if(os.check.empty('postcode','Missing postcode')==false){ return false;}

	//	if(os.check.empty('address','Missing address')==false){ return false;}

	 

	

		

		var url='propertyId='+propertyId+'&title='+title+'&address='+address+'&postcode='+postcode+'&locationId='+locationId+'&fullDescription='+fullDescription+'&attribute='+attribute+'&propertyStatus='+propertyStatus+'&generalNotes='+generalNotes+'&contactNotes='+contactNotes+'&available='+available+'&houseNO='+houseNO+'&RoadName='+RoadName+'&leasehold='+leasehold+'&leaseyears='+leaseyears+'&bed='+bed+'&bath='+bath+'&sofa='+sofa+'&type='+type+'&price='+price+'&active='+active+'&townCity='+townCity+'&name='+name+'&address='+address+'&propertyType='+propertyType+'&label='+label+'&groundrent='+groundrent+'&servicecharge='+servicecharge+'&counciltax='+counciltax+'&underground='+underground+'&epcvalue='+epcvalue+'&shortDescription='+shortDescription+'&bulletText1='+bulletText1+'&bulletText2='+bulletText2+'&bulletText3='+bulletText3+'&bulletText4='+bulletText4+'&bulletText5='+bulletText5+'&propertyAvlDate='+propertyAvlDate+'&dss='+dss+'&availableKeys='+availableKeys+'&purposeType='+purposeType+'&area='+area+'&featured='+featured+'&sharing='+sharing+'&furnished='+furnished+'&facility='+facility+'&';

		

		 

		            

	

		url='<? echo $site['url'] ?>/aaajxSysytem.php?savePropertyData=OK&'+url;

	

		os.animateMe.div='div_busy';

			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	

		

		os.setAjaxFunc('reloadList',url,formdata);

		return false;



}



function reloadList( data)   ///  ok

{



 

 var propertyId=parseInt(data);

 os.setVal('propertyId',propertyId);

  listPropertyData()

}





function listPropertyData()   //ok

{

         var  bed=os.getVal('bed_s');

        var srarchProperty=os.getVal('srarchProperty');

        var url='srarchProperty='+srarchProperty+'&bed='+bed+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?listPropertyData=OK&'+url;

	//	alert(url);

		os.animateMe.div='div_busy';

			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	

		

		os.setAjaxHtml('listPropertyData_DIV',url);

		return false;







}

function fillPropertyData(propertyId) //  ok

{

      

        var url='propertyId='+propertyId+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?fillPropertyData=OK&'+url;

	 	os.animateMe.div='div_busy';

		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	

		

		os.setAjaxFunc('fillProperty',url);

		return false;







}

function fillProperty(data)

{

 

var objMem = JSON.parse(data);



os.getObj('available').checked=false;

if(parseInt(objMem.available)==1){os.getObj('available').checked=true; }



os.setVal('propertyId',parseInt(objMem.propertyId));

os.setVal('propCode',objMem.propCode);

os.setVal('title',objMem.title);

os.setVal('address',objMem.address);

os.setVal('postcode',objMem.postcode);



os.setVal('locationId',objMem.locationId);

os.setVal('fullDescription',objMem.fullDescription);

os.setVal('attribute',objMem.attribute);

os.setVal('propertyStatus',objMem.propertyStatus);



//os.setVal('generalNotes',objMem.generalNotes);

//os.setVal('contactNotes',objMem.contactNotes);

os.setVal('contactNotesDiv',objMem.contactNotes);

os.setVal('generalNotesDiv',objMem.generalNotes);





os.setVal('registerDate',objMem.registerDate);

os.setVal('houseNO',objMem.houseNO);

os.setVal('RoadName',objMem.RoadName);

os.setVal('townCity',objMem.townCity);



 

// attribute section

os.setVal('type',objMem.type); 

os.setVal('leasehold',objMem.leasehold);

os.setVal('leaseyears',objMem.leaseyears);

os.setVal('bed',objMem.bed);

os.setVal('bath',objMem.bath);

os.setVal('sofa',objMem.sofa);

os.setVal('price',objMem.price);

os.setVal('active',objMem.active); 



// newly aded to the property

os.setVal('name',objMem.name);

os.setVal('address',objMem.address); 

os.setVal('label',objMem.label); 

os.setVal('propertyType',objMem.propertyType); 

os.setVal('propertyType',objMem.propertyType); 

os.setVal('servicecharge',objMem.servicecharge); 

os.setVal('counciltax',objMem.counciltax); 

os.setVal('underground',objMem.underground); 

os.setVal('epcvalue',objMem.epcvalue); 

os.setVal('shortDescription',objMem.shortDescription); 

os.setVal('bulletText1',objMem.bulletText1); 

os.setVal('bulletText2',objMem.bulletText2); 

os.setVal('bulletText3',objMem.bulletText3); 

os.setVal('bulletText4',objMem.bulletText4); 

os.setVal('bulletText5',objMem.bulletText5); 

os.setVal('propertyAvlDate',objMem.propertyAvlDate); 

os.setVal('dss',objMem.dss);

os.setVal('availableKeys',objMem.availableKeys);

os.setVal('purposeType',objMem.purposeType);

os.setVal('area',objMem.area);

os.setVal('featured',objMem.featured);



os.setVal('sharing',objMem.sharing);

os.setVal('furnished',objMem.furnished);

os.setVal('facility',objMem.facility);



os.setImg('floorplanPreview',objMem.floorplan);

os.setImg('EPCPreview',objMem.EPC);

 

os.setImg('qrCodePreview',objMem.qrCode);

os.setImg('gasCertificatePreview',objMem.gasCertificate);

 

os.setImg('printImgPreview',objMem.printImg);

os.setLink('brochurePdfPreview',objMem.brochurePdf);





   

// Images

 



 







	

	var attrs= document.getElementsByName('attr[]');

	var atObj='';	 

	 for (i = 0; i < attrs.length; i++) 

	 {

	   atObj = attrs[i] ;

	   atObj.checked=false;

	   var exists= objMem.attribute.indexOf(atObj.value); 

	  exists=parseInt(exists);

	  if(exists>-1){

	  atObj.checked=true;

	  

	  }

			

		

		

		 

	 }

	

	

//vendor section 

if(objMem.vendorData!=''){

   showVendor(objMem.vendorData);

}







}





function resetSearch()  // ok

{









       os.setVal('srarchProperty','');

		listPropertyData()

}

// ssaveMemberData();

 listPropertyData();

 

  

 

 



 

 

 

 function setPropAttribute()

 {

 

  

   var attrs= document.getElementsByName('attr[]');

   var atObj='';

   var attrVals='';

   

   

      

var leaseholdText='';

var leaseyearsText='';

var bedText='';

var bathText='';

var sofaText='';

     for (i = 0; i < attrs.length; i++) 

	 {

	 

	

        atObj = attrs[i] ;

		if(atObj.checked==true)

		{

		   attrVals=attrVals+atObj.value+', ';

		

		}

		

		 

     }

	 

	 

	 

		var  leasehold =os.getVal('leasehold');

		var  leaseyears =os.getVal('leaseyears');

		var  bed =os.getVal('bed');

		var  bath =os.getVal('bath');

		var  sofa =os.getVal('sofa');

		

		if(leasehold!=''){   leaseholdText=leasehold+',';}

		if(leaseyears!=''){  leaseyearsText=leaseyears+' Years,';}

		if(bed!=''){  bedText=bed+' Beds ,';}

		if(bath!=''){  bathText=bath+' Bath ,';}

		if(sofa!=''){  sofaText=sofa+' Reception ,';}

	 

	 

	 attrVals =attrVals+ leaseholdText+' '+ leaseyearsText+' '+ bedText+' '+ bathText+' '+ sofaText;

	 

	 os.setVal('attribute',attrVals);

	  savePropertyData() ;

	 closepopup('AttrPopupDIV');

 

 }

 

 

 

 

 

</script>

 

 



  <script>

  function vendorlistPopup()

  {

       var propertyId=os.getVal('propertyId');

	  if(propertyId<1){ alert('Please save property'); return;}

     open_pop_up('vendorListopupDIV','LANDLORD',800,500);

  

  

  

  

  }

  

  

  

   function selectVendor(memberId)

   {

   

   	  var propertyId=os.getVal('propertyId');

	  if(propertyId<1){ alert('Please save property'); return;}

	  

	   var url='propertyId='+propertyId+'&memberId='+memberId+'&';

		

		

	

		url='<? echo $site['url'] ?>/aaajxSysytem.php?selectVendor=OK&'+url;

	

		os.animateMe.div='div_busy';

	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	

		

		os.setAjaxFunc('showVendor',url);

		

	  

      

   

   }

   function showVendor(data)

   {

  // alert(data);

   

   os.setHtml('vendorNameSpan','Select Vendor');

	os.setHtml('vendorAddressSpan','');

	os.setHtml('vendorContactSpan','');

   

   if(data){ // checking undefine

  // alert(data);

    var D=data.split('@@');

	os.setHtml('vendorNameSpan',D[0]);

	os.setHtml('vendorAddressSpan',D[1]);

	os.setHtml('vendorContactSpan',D[2]);

     

	closepopup('vendorListopupDIV');

	

	

	 os.setVal('firstName_prop','');

		 os.setVal('lastName_prop','');

	 os.setVal('title_prop','');

	 os.setVal('mobile_prop','');

	  os.setVal('email_prop','');

	   os.setVal('telephone_prop','');

		

 os.setVal('flatOrHouseName_prop','');

	 os.setVal('address_prop','');

	 os.setVal('postCode_prop','');

	  os.setVal('townCity_prop','');

	}

	

   }

   dateCalander();

   

   

   

   

 function saveMemberData_prop()

{

		

		var firstName_prop=os.getVal('firstName_prop');

		var lastName_prop=os.getVal('lastName_prop');

		var title_prop=os.getVal('title_prop');

		var mobile_prop=os.getVal('mobile_prop');

		var telephone_prop=os.getVal('telephone_prop');

		var email_prop=os.getVal('email_prop');

	 

		var flatOrHouseName_prop=os.getVal('flatOrHouseName_prop');

		var address_prop=os.getVal('address_prop');

		var postCode_prop=os.getVal('postCode_prop');

		var townCity_prop=os.getVal('townCity_prop');

		

		if(os.check.empty('lastName_prop','Missing surname')==false){ return false;}

		if(os.check.empty('firstName_prop','Missing First Name')==false){ return false;}

		if(os.check.empty('mobile_prop','Missing Mobile')==false){ return false;}

		if(os.check.empty('flatOrHouseName_prop','Missing House No/ Name')==false){ return false;}

		if(os.check.empty('address_prop','Missing Address')==false){ return false;}

		if(os.check.empty('townCity_prop','Missing Town/City')==false){ return false;}

		if(os.check.empty('postCode_prop','Missing Postcode')==false){ return false;}

		

		

		

		

				

		var url='firstName_prop='+firstName_prop+'&lastName_prop='+lastName_prop+'&title_prop='+title_prop+'&mobile_prop='+mobile_prop+'&flatOrHouseName_prop='+flatOrHouseName_prop+'&address_prop='+address_prop+'&postCode_prop='+postCode_prop+'&email_prop='+email_prop+'&telephone_prop='+telephone_prop+'&townCity_prop='+townCity_prop+'&';  

		url='<? echo $site['url'] ?>/aaajxSysytem.php?saveMemberData_prop=OK&'+url;

	

		os.animateMe.div='div_busy';

			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	

		

		os.setAjaxFunc('selectVendor_prop',url);

		return false;



}



function selectVendor_prop(data)

{

//alert(data);

var data=parseInt(data);

   selectVendor(data)

}



function addnewvendor()

{

  saveMemberData_prop();

}





 

 function setMarketing()

 {

 savePropertyData();

 closepopup('MarketingPopupDIV');

 }

 

   

   

  </script>

  <script>

 function openAttr()

 {

  

    open_pop_up('AttrPopupDIV','Attribute',700,430);

 }

 

  function openRooms()

 {

  var propertyId=os.getVal('propertyId');

	  if(propertyId<1){ alert('Please save property'); return;}

   open_pop_up('RoomsPopupDIV','Rooms',900,450);  viewRooms();

 }

 

 function openImages()

 {

  var propertyId=os.getVal('propertyId');

	  if(propertyId<1){ alert('Please save property'); return;}

    open_pop_up('imageopupDIV','Images',900,550);  viewImages();

 }

 

 

 function openMarketing()

 {

  var propertyId=os.getVal('propertyId');

	  if(propertyId<1){ alert('Please save property'); return;}

    open_pop_up('MarketingPopupDIV','Marketing',600,400);  

 }

 

 function rightMoveAction(action)

{

 var propertyId=os.getVal('propertyId');

 if(action=='upload')

 {

 

  var url='<? $site['url'] ?>rightMove.php?jsonRequest=addProperty&propertyId='+propertyId;

    popupURL(url);

 }





}

 

 

 

 function matchApplicants()

 {

        open_pop_up('matchApplicantsDIV','Match Applicants',1000,400);

        var  propertyId =os.getVal('propertyId');

		 

		var url='propertyId='+propertyId+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?matchApplicants=OK&'+url;

		os.animateMe.div='div_busy';

		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	

		os.setAjaxHtml('matchApplicantsListDiv',url);

		return false;

   

   

 

 }

 

 

 function deleteProperty(propertyId)

     {

        if(propertyId<1){

		 var  propertyId =os.getVal('propertyId');

			}

			

			 if(propertyId<1){ alert('No record Selected'); return;}

			// alert(propertyId);

			 

			 

        var p =confirm('Are you Sure? Yoy are going to delete this record!')

		if(p){

		var url='propertyId='+propertyId+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?deleteProperty=OK&'+url;

	 	os.animateMe.div='div_busy';

		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		

		

		os.setAjaxFunc('reloadPropertyist',url);

		}

		return false;



     }

	function reloadPropertyist(data)

	{

	  alert(data);

	  os.setVal('propertyId','0');

	  listPropertyData();

	} 

	function windowPrint()

	{

	 var propertyId=os.getVal('propertyId');

	  if(propertyId<1){ alert('Please Select property'); return;}

	  

	

	  var url='<? $site['url'] ?>print-window.php?propertyId='+propertyId;

    popupURL(url);

	 

	}

 

  function addLocation(){

							  var loc = prompt("Add new area");

							   if(loc)

							   {

							      var loc=loc.trim();

								  if(loc!='')

								  {

										var url='loc='+loc+'&';

										url='<? echo $site['url'] ?>/aaajxSysytem.php?addLocation=OK&'+url;

										os.animateMe.div='div_busy';

										os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';

										os.setAjaxFunc('addLocationResult',url);

										return false; 

								  }

								   

								       

							   }

							 }

							 

							 function addLocationResult(data)

							 {

							       

								  if(data!=''){  

								   os.setHtml('locationId',data);

								   

								   }

								   return;

								   /*

								    var d=data.split('##');

							   

							        var locId=parseInt(d[0]);

									if(locId>0){

									

									

									var option = document.createElement("option");

									option.text = d[1];

									option.value = locId;

							        var locationId = os.getObj("locationId");

									locationId.appendChild(option);

									//locationId.add(option,0);   not work

								 	os.setVal('locationId',locId);

									

									

									

									}*/

							   

							 }

 </script>

</div>  <!-- end viewport-->



<? 

$defaultProperty=$_GET['defaultProperty']; // not in use

if($defaultProperty>0){

?> <script> fillPropertyData('<? echo  $defaultProperty ?>'); </script><?



}



?>

<? 

 



include('aaBottom.php')



?>