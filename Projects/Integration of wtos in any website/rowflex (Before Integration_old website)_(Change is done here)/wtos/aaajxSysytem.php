<? session_start();

ob_start();

include('includes/config.php');

include('coomon.php');

ob_end_clean();





if($_GET['saveMemberData']=='OK')

{



$memberId=$_GET['memberId'];

$dataToSave['memberType']=$_GET['memberType'];

$dataToSave['minBudget']=$_GET['minBudget'];

$dataToSave['maxBudget']=$_GET['maxBudget'];



$dataToSave['lastName']=$_GET['lastName'];

$dataToSave['telephone']=$_GET['telephone'];

$dataToSave['requirements']=addslashes($_GET['requirements']);

$dataToSave['title']=$_GET['title'];

$dataToSave['mobile']=$_GET['mobile'];

$dataToSave['firstName']=$_GET['firstName'];

$dataToSave['activeMember']=$_GET['activeMember'];

$dataToSave['flatOrHouseName']=$_GET['flatOrHouseName'];

$dataToSave['willRetain']=$_GET['willRetain'];

$dataToSave['address']=$_GET['address'];

$dataToSave['postCode']=$_GET['postCode'];

$dataToSave['nextCall']=$os->saveDate($_GET['nextCall']); 

$dataToSave['email']=$_GET['email'];

$dataToSave['status']=$_GET['status'];

if($dataToSave['status']=='LANDLORD'){$dataToSave['memberType']=''; }





//$dataToSave['requirementNotes']=addslashes($_GET['requirementNotes']);  // edited from popup

//$dataToSave['contactNotes']=addslashes($_GET['contactNotes']);

$dataToSave['source']=$_GET['source'];

$dataToSave['corrAddress']=$_GET['corrAddress'];

$dataToSave['otherContact']=$_GET['otherContact'];





$dataToSave['townCity']=$_GET['townCity'];

$dataToSave['outcome']=$_GET['outcome'];

$dataToSave['feedBackValue']=$_GET['feedBackValue'];

 // newly added to member/aplicant

$dataToSave['occupation']=$_GET['occupation'];

$dataToSave['reference']=$_GET['reference'];

$dataToSave['propertyReqDate']=$os->saveDate($_GET['propertyReqDate']);

$dataToSave['adult']=$_GET['adult'];

$dataToSave['child']=$_GET['child'];

$dataToSave['pets']=$_GET['pets'];

$dataToSave['bankName']=$_GET['bankName'];

$dataToSave['bankAcNo']=$_GET['bankAcNo'];

$dataToSave['sortcode']=$_GET['sortcode'];



$dataToSave['locationId']=$_GET['locationId'];





$dataToSave['bankDetails']=addslashes($_GET['bankDetails']);

$dataToSave['workingStatus']=$_GET['workingStatus'];

// newly added to member/aplicant End



//  attribute section 

$dataToSave['type']=$_GET['type'];

// newly added for price unit.


$dataToSave['leasehold']=$_GET['leasehold'];

$dataToSave['leaseyears']=$_GET['leaseyears'];

$dataToSave['bed']=$_GET['bed'];

$dataToSave['bath']=$_GET['bath'];

$dataToSave['sofa']=$_GET['sofa'];





if($memberId<1){



$dataToSave['registerDate']=$os->now();

$dataToSave['addedDate']=date('Y-m-d h:i:s');

$dataToSave['addedBy']=$os->userDetails['adminId'];



 

}



$id= $os->save_member($dataToSave,'memberId',$memberId);

 



    //  if($memberId<1)

	  {

    

       $dataToSave2['code']='AA'.$id;

	   if($dataToSave['status']=='LANDLORD')

	   {

	    $dataToSave2['code']='VV'.$id;

	   

	   }

	   

	    $id= $os->save_member($dataToSave2,'memberId',$id);

 

      }



echo $id;

exit();



  

}







if($_GET['saveMemberData_prop']=='OK')  // add member vendor from property form popup

{





$dataToSave['firstName']=$_GET['firstName_prop'];

$dataToSave['lastName']=$_GET['lastName_prop'];

$dataToSave['title']=$_GET['title_prop'];

$dataToSave['address']=$_GET['address_prop'];

$dataToSave['email']=$_GET['email_prop'];



$dataToSave['mobile']=$_GET['mobile_prop'];

$dataToSave['telephone']=$_GET['telephone_prop'];



$dataToSave['flatOrHouseName']=$_GET['flatOrHouseName_prop'];

$dataToSave['postCode']=$_GET['postCode_prop'];

$dataToSave['status']='LANDLORD';

$dataToSave['activeMember']='1';

 $dataToSave['nextCall']=$os->saveDate($os->viewNextWeek()); 

  



$dataToSave['townCity']=$_GET['townCity_prop'];

//$dataToSave['outcome']=$_GET['outcome_prop'];  // not applicable for vendor

//$dataToSave['feedBackValue']=$_GET['feedBackValue_prop'];

           

if($memberId<1){



$dataToSave['registerDate']=$os->now();

$dataToSave['addedDate']=date('Y-m-d h:i:s');

$dataToSave['addedBy']=$os->userDetails['adminId'];

 

}

$id= $os->save_member($dataToSave,'memberId',$memberId);

 //if($memberId<1)

 

 {

 

       $dataToSave2['code']='VV'.$id;

	    $id= $os->save_member($dataToSave2,'memberId',$id);

 

      }



echo $id;

exit();



  

}





if($_GET['listMemberData']=='OK')

{

$srarchApplicant=$_GET['srarchApplicant'];

$vendorList=$_GET['vendorList'];

$memberTypeList=$_GET['memberTypeList'];



 

$andOnlyApplicant=" and status='TENANT'";

if($vendorList=='1')

{

   $andOnlyApplicant=" and status='LANDLORD'";

}







if(trim($srarchApplicant)!='')

{

 $wheres=" and  (lastName like '%$srarchApplicant%'  || address like '%$srarchApplicant%'  || telephone like '%$srarchApplicant%'  || requirements like '%$srarchApplicant%'  || mobile like '%$srarchApplicant%'  || firstName like '%$srarchApplicant%'  || flatOrHouseName like '%$srarchApplicant%'  || postCode like '%$srarchApplicant%'  || email like '%$srarchApplicant%'  || requirementNotes like '%$srarchApplicant%'  || contactNotes like '%$srarchApplicant%'  || status like '%$srarchApplicant%' || code like '%$srarchApplicant%'   ) " ;

 

 

 

}



if($memberTypeList!='')

{

   $andmemberTypeList=" and memberType like '$memberTypeList%' ";

}



 $listingQuery=" select * from member where memberId>0  $andOnlyApplicant $andmemberTypeList $wheres   order by memberId desc ";

$rsmember=$os->mq($listingQuery);

 $rsmemberCount=mysql_num_rows($rsmember);





?>

<table  border="0" cellspacing="0" cellpadding="0" class="noBorder"  >

							<tr class="borderTitle" >

						

								

	<td ><b>Code</b></td>  							

<td ><b>Title</b></td>  

  <td ><b>Surname</b></td>  

  <td ><b>Initial</b></td>  

  <td ><b>Address</b></td>  

   <td ><b>Mobile</b></td>  

 

								

							</tr>

							

							

							

							<?php

							  

						 

							while($record=$os->mfa( $rsmember)){ 

							    

								

								

							

							 ?>

							

							

							

							<tr onclick="fillMemberData('<? echo  $record['memberId'] ?>')" >

							

		 <td><?php echo $record['code']?> </td>  						

								

 <td><?php echo $record['title']?> </td>  

   <td><?php echo $record['lastName']?> </td> 

  <td><?php echo $record['firstName']?> </td>  

 

  <td><?php echo $record['address']?> </td>  

  <td><?php echo $record['mobile']?> </td>  

  

							 	

					

                        

                     

														

					</tr>

				 

                          <? } ?>  

						

						</table> 

		

		

		

<?php

}

if($_GET['fillMemberData']=='OK'){



		$memberId=$_GET['memberId'];

		

		if($memberId>0)	

		{

		$wheres=" where memberId='$memberId'";

		}

	$listingQuery=" select * from member  $wheres ";

		$rsmember=$os->mq($listingQuery);

		$record=$os->mfa( $rsmember);

		$record['requirementNotes']=stripslashes($record['requirementNotes']);

		$record['contactNotes']=stripslashes($record['contactNotes']);

		$record['requirements']=stripslashes($record['requirements']);

		$record['nextCall']=$os->showDate($record['nextCall']);

		$record['registerDate']=$os->showDate($record['registerDate']);

		$record['propertyReqDate']=$os->showDate($record['propertyReqDate']);

		echo  json_encode($record);

		exit();

}

 

if($_GET['savePropertyData']=='OK')

{



$propertyId=$_GET['propertyId'];

$dataToSave['title']=$_GET['title'];

$dataToSave['address']=$_GET['address'];

$dataToSave['postcode']=$_GET['postcode'];



$dataToSave['locationId']=$_GET['locationId'];

 

$dataToSave['fullDescription']=addslashes($_GET['fullDescription']);

$dataToSave['attribute']=addslashes($_GET['attribute']);                 

$dataToSave['propertyStatus']=$_GET['propertyStatus'];

//$dataToSave['generalNotes']=addslashes($_GET['generalNotes']);  // edited from popup

//$dataToSave['contactNotes']=addslashes($_GET['contactNotes']);

$dataToSave['available']=$_GET['available'];

$dataToSave['houseNO']=$_GET['houseNO'];

$dataToSave['RoadName']=$_GET['RoadName'];

$dataToSave['townCity']=$_GET['townCity'];



// newly added to the to the property

$dataToSave['name']=$_GET['name'];

$dataToSave['address']=addslashes($_GET['address']);

$dataToSave['propertyType']=$_GET['propertyType'];

$dataToSave['label']=$_GET['label'];

$dataToSave['groundrent']=$_GET['groundrent'];

$dataToSave['servicecharge']=$_GET['servicecharge'];

$dataToSave['counciltax']=$_GET['counciltax'];

$dataToSave['underground']=$_GET['underground'];

$dataToSave['epcvalue']=$_GET['epcvalue'];

$dataToSave['shortDescription']=addslashes($_GET['shortDescription']);

$dataToSave['bulletText1']=$_GET['bulletText1'];

$dataToSave['bulletText2']=$_GET['bulletText2'];

$dataToSave['bulletText3']=$_GET['bulletText3'];

$dataToSave['bulletText4']=$_GET['bulletText4'];

$dataToSave['bulletText5']=$_GET['bulletText5'];

$dataToSave['propertyAvlDate']=$os->saveDate($_GET['propertyAvlDate']);

$dataToSave['dss']=$_GET['dss'];

$dataToSave['availableKeys']=$_GET['availableKeys'];

$dataToSave['purposeType']=$_GET['purposeType'];

$dataToSave['area']=$_GET['area'];

$dataToSave['featured']=$_GET['featured'];

$dataToSave['sharing']=$_GET['sharing'];

$dataToSave['furnished']=$_GET['furnished'];

$dataToSave['facility']=$_GET['facility'];



    

 



//  attribute section 

$dataToSave['type']=$_GET['type'];
$dataToSave['priceUnit']=$os->propUnit[$dataToSave['type']];

$dataToSave['leasehold']=$_GET['leasehold'];

$dataToSave['leaseyears']=$_GET['leaseyears'];

$dataToSave['bed']=$_GET['bed'];

$dataToSave['bath']=$_GET['bath'];

$dataToSave['sofa']=$_GET['sofa'];

$dataToSave['price']=$_GET['price'];



 $dataToSave['active']=$_GET['active'];

 

  $dataToSave['seoId']=str_replace(array('-',' ','`',"'",'--','---'),'-',$dataToSave['title'].'-for-'.$dataToSave['type']);

  $seoid=uniqueSEOid($dataToSave['seoId'],$dataToSave['seoId'],$rowId);

  $dataToSave['seoId']=$autoSeoId;

 

 

  

 

                  $floorplan=$os->UploadPhoto('floorplan',$site['imgPath'].'wtos-images');

					if($floorplan){

					$dataToSave['floorplan']='wtos-images/'.$floorplan;

					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'floorplan',$site['imgPath']);}

					} 					

					

					

					

					$EPC=$os->UploadPhoto('EPC',$site['imgPath'].'wtos-images');

				   	if($EPC){

					$dataToSave['EPC']='wtos-images/'.$EPC;

					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'EPC',$site['imgPath']);}

					} 					

					

					

					$printImg=$os->UploadPhoto('printImg',$site['imgPath'].'wtos-images');

				   	if($printImg){

					$dataToSave['printImg']='wtos-images/'.$printImg;

					

					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'printImg',$site['imgPath']);}

					} 	

					 

					

					

					

					

					 

					

				

				

					$brochurePdf=$os->UploadPhoto('brochurePdf',$site['imgPath'].'wtos-images');

				   	if($brochurePdf){

					$dataToSave['brochurePdf']='wtos-images/'.$brochurePdf;

					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'brochurePdf',$site['imgPath']);}

					} 					

					

					

				

					

					

					$qrCode=$os->UploadPhoto('qrCode',$site['imgPath'].'wtos-images');

				   	if($qrCode){

					$dataToSave['qrCode']='wtos-images/'.$qrCode;

					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'qrCode',$site['imgPath']);}

					} 			

			

 

                    $gasCertificate=$os->UploadPhoto('gasCertificate',$site['imgPath'].'wtos-images');

				   	if($gasCertificate){

					$dataToSave['gasCertificate']='wtos-images/'.$gasCertificate;

					if($rowId) {  $os->removeImage($primeryTable,$primeryField,$rowId,'gasCertificate',$site['imgPath']);}

					} 	

 

 

 

 

 

 

 



 if($propertyId<1){

$dataToSave['registerDate']=$os->now();

$dataToSave['addedDate']=date('Y-m-d h:i:s');

$dataToSave['addedBY']=$os->userDetails['adminId'];

}

$id= $os->save_property($dataToSave,'propertyId',$propertyId);





//if($propertyId<1)



{

 

       $dataToSave2['propCode']='PP'.$id;

	    $id= $os->save_property($dataToSave2,'propertyId',$id);

 

      }





echo $id;

exit();

 

}





if($_GET['listPropertyData']=='OK')

{

$srarchProperty=$_GET['srarchProperty'];



$bed=$_GET['bed'];



if((int)$bed>0){

$andbed=" and bed='$bed'  ";

}else

{



if($bed!=''){

   $andbed=" and attribute like '%$bed%'";

   }



}







if(trim($srarchProperty)!='')

{

  $wheres=" and (title like '%$srarchProperty%'  || postCode like '%$srarchProperty%'  || address like '%$srarchProperty%' || propCode like '%$srarchProperty%' || houseNO like '%$srarchProperty%' || RoadName like '%$srarchProperty%'|| townCity like '%$srarchProperty%'  ) " ;

 

  

 

}

  $listingQuery=" select * from property where propertyId>0  $wheres  $andbed order by propertyId desc ";

$property=$os->mq($listingQuery);

 





?>

<table  border="0" cellspacing="0" cellpadding="2" class="noBorder"   >

							<tr class="borderTitle" >

						<td ><b>Code</b></td> 		

			<td ><b>Label</b></td> 

			<td ><b>For</b></td> 									

						

<td ><b>Title</b></td>  

 

<td ><b>Post</b></td>  

<td ><b>Bed</b></td>  

 <td ><b>Vendor</b></td>  

  <td ><b>Publish</b></td> 

 

								

							</tr>

							

							

							

							<?php

							  

						 

							while($record=$os->mfa( $property)){ 

							    

								$memberId=$record['memberId'];

								$mem=$os->get_member(" memberId='$memberId' ");

								$mem=$mem[0];

								

							$featuredC='';	

							  if($record['featured']!='No' && $record['featured']!='')

							  { 

							    $featuredC='background-color:#CAE4FF';	

							  }

							 ?>

							

							

							

							<tr onclick="fillPropertyData('<? echo  $record['propertyId'] ?>')" style="cursor:pointer; <? echo $featuredC ?>" >

						 <td><?php echo $record['propCode']?> </td>  		

			 <td><?php echo $record['label']?> </td>  		

			  <td><?php echo $record['purposeType']?> </td>  	

			 			

							

 <td><font style="color:#005CB9; font-weight:bold;"><?php echo $record['title']?> </font><br />

 <span style="font-size:10px; color:#747474; font-style:italic;"> <?php echo $record['houseNO']?>  <?php echo $record['RoadName']?>  <?php echo $record['townCity']?></span>

 </td>  

  

   <td style="color:#990000; font-weight:bold;"><?php echo $record['postcode']?> </td> 

  

					 <td ><?php echo $record['bed']?> </td> 

                        <td><?php echo $mem['code'] ?>  <?php echo $mem['title'] ?>  <?php echo $mem['firstName'] ?> <?php echo $mem['lastName'] ?> </td>  

						 <td >

						 

						 <?php if($record['active']==1){?>

						 

						   <span style="color:#FF0000; font-weight:bold;">Yes</span>

						 <?   }else{ ?> 

						 <span style="color:#00CC66;">No</span>

						 <? } ?>

						 </td>  

                     

														

					</tr>

				 

                          <? } ?>  

						

						</table> 

		

		

		

<?php

}





if($_GET['fillPropertyData']=='OK'){



		$propertyId=$_GET['propertyId'];

		

		if($propertyId>0)	

		{

			$wheres=" where propertyId='$propertyId'";

		}

	 	$listingQuery=" select * from property  $wheres ";

		$rsmember=$os->mq($listingQuery);

		$record=$os->mfa( $rsmember);

		

		 

		//$record['requirementNotes']=stripslashes($record['requirementNotes']);

	//	$record['contactNotes']=stripslashes($record['contactNotes']);

		$record['registerDate']=$os->showDate($record['registerDate']);

		$record['propertyAvlDate']=$os->showDate($record['propertyAvlDate']);

		$record['shortDescription']=utf8_encode($record['shortDescription']);

		$record['fullDescription']=utf8_encode($record['fullDescription']);

		

		if($record['floorplan']!=''){

		$record['floorplan']=$site['urlFront'].$record['floorplan'];

		}

		

		if($record['EPC']!=''){

		$record['EPC']=$site['urlFront'].$record['EPC'];

		}

		

		if($record['brochurePdf']!=''){

		$record['brochurePdf']=$site['urlFront'].$record['brochurePdf'];

		}

		

		if($record['qrCode']!=''){

		$record['qrCode']=$site['urlFront'].$record['qrCode'];

		}

		

		if($record['gasCertificate']!=''){

		    $record['gasCertificate']=$site['urlFront'].$record['gasCertificate'];

		}

		

		if($record['printImg']!=''){

		$record['printImg']=$site['urlFront'].$record['printImg'];

		}

		

		

		

		

		$memberId=$record['memberId'];

		if($memberId>0)

		{

		$wheres=" where memberId='$memberId'";

		$listingQuerym=" select * from member  $wheres ";

		$rsmemberm=$os->mq($listingQuerym);

		$member=$os->mfa( $rsmemberm); #77777777

		$record['vendorData']= $member['lastName']." ".$member['firstName']." @@ ".$member['address']."  ".$member['postCode']." @@T- ".$member['telephone']."  M- ".$member['mobile'];

		}

		

		 

		 

    	echo  json_encode($record);

		exit();

}







if($_GET['matchProperties']=='OK'){



		$memberId=$_GET['memberId'];

		

		if($memberId>0)	

		{

		$wheres=" where memberId='$memberId'";

	

	    $listingQuery=" select * from member  $wheres ";

		$rsmember=$os->mq($listingQuery);

		$member=$os->mfa( $rsmember);

		 

		$attrStr='';

		$attr=$member['requirements'];

		$attrA=explode(',',$attr);

		 

		foreach($attrA as $val)

		{

			if(trim($val)!='')

			{

			   $attrStrArr[]=" attribute LIKE '%$val%' ";

			}

		

		}

		$attrStr='  or ('.implode(' OR ',$attrStrArr).' )';

	                 

						 //  $dailyQuery="select GROUP_CONCAT() dl from dailylist where caseNo RLIKE '$caseStr'";  //	$caseStr = implode('|',$singleCaseA);

		

		

		

		$type=$member['type']; 

		$leasehold=$member['leasehold'];

		$leaseyears=$member['leaseyears'];

		$bed=$member['bed'];

		$bath=$member['bath'];

		$sofa=$member['sofa'];

		if($type!=''){ $andtype=" or  type='$type'";  }

		

		if($leasehold!=''){ $andleasehold=" or leasehold='$leasehold'";  }

		

		if($leaseyears!=''){ $andleaseyears=" or leaseyears='$leaseyears'";  }

	

		if($bed!=''){ $andbed=" and bed='$bed'";  }

	

		if($bath!=''){ $andbath=" or bath='$bath'";  }

		

		if($sofa!=''){ $andsofa=" or sofa='$sofa'";  }

		

		 

	  $listingQuery=" select * from property  where propertyId>0 and  ( propertyId>0  $andtype  $andleasehold  $andleaseyears  $andbath  $andsofa  $attrStr )  $andbed order by title ";

		 $rsprop=$os->mq($listingQuery);

		 ?>

		 <table class="noBorder matchprop" > 

		 

		 <?

		while( $prop=$os->mfa( $rsprop))

		{

		?>

		<tr> <td><? echo $prop['title'] ?></td><td width="90"> <? echo $prop['postcode'] ?></td><td> <? echo $prop['houseNO'] ?></td><td> <? echo $prop['RoadName'] ?></td> <td>Bed: <? echo $prop['bed'] ?> Bath:<? echo $prop['bath'] ?> Reception:<? echo $prop['sofa'] ?>  </td><td><? echo $prop['attribute'] ?></td></tr>

	 

		

		<?

		  

		}

		?>

		 </table > 

		<?

		

		

		}

		exit();

}





if($_GET['propListPopUp']=='OK'){



		$searchText=$_GET['searchText'];

		$functiontocall=$_GET['functiontocall'];

		

		if($searchText!='')	

		{

		 $andsearchText=" and ( title LIKE '%$searchText%' or  postcode LIKE '%$searchText%' or  address LIKE '%$searchText%' or  attribute LIKE '%$searchText%' or  propCode LIKE '%$searchText%'  or houseNO like '%$searchText%' or RoadName like '%$searchText%' or townCity like '%$searchText%' )";

	    }

		

		 

	  $listingQuery=" select * from property  where propertyId>0 $andsearchText order by title" ;

		 $rsprop=$os->mq($listingQuery);

		 ?>

		 <table class="noBorder" width="100%" > 

		 

		 <?

		while( $prop=$os->mfa( $rsprop))

		{

		?>

		<tr onclick="<? echo $functiontocall; ?>('<? echo $prop['propertyId'] ?>#<? echo $prop['title'] ?>#<? echo $prop['postcode'] ?>#<? echo $prop['houseNO'] ?>#<? echo $prop['RoadName'] ?>#<? echo $prop['bed'] ?>')"> <td><? echo $prop['propCode'] ?></td><td><? echo $prop['title'] ?></td><td> <? echo $prop['postcode'] ?></td><td> <? echo $prop['houseNO'] ?></td><td> <? echo $prop['RoadName'] ?></td> <td>Bed: <? echo $prop['bed'] ?> Bath:<? echo $prop['bath'] ?> Reception:<? echo $prop['sofa'] ?>  </td></tr>

		

		<?

		  

		}

		?>

		 </table > 

		<?

		

		

	 

		exit();

}









if($_GET['selectVendor']=='OK'){



		$memberId=$_GET['memberId'];

		$propertyId=$_GET['propertyId'];

		

		if($memberId>0)	

		{

		

		if($propertyId>0)

		{

		

		$updateVendorQ=" update property set  memberId='$memberId' where propertyId='$propertyId'";

		$os->mq($updateVendorQ);

		

		}	

		

		

		$wheres=" where memberId='$memberId'";

	

	    $listingQuery=" select * from member  $wheres ";

		$rsmember=$os->mq($listingQuery);

		$member=$os->mfa( $rsmember);

		

		echo $member['lastName']." ".$member['firstName']." @@ ".$member['address']."  ".$member['postCode']." @@T: ".$member['telephone']."  M: ".$member['mobile'];

		 

		 

		 

		

		}

		exit();

}







if($_GET['saveAppo']=='OK')

{



 

		

$appoId=$_GET['appoId'];

$dataToSave['memberId']=$_GET['memberId'];

$dataToSave['appoDate']=$os->saveDate($_GET['appoDate']);  





$dataToSave['appoTime']=$_GET['appoTime'];

$dataToSave['endTime']=$_GET['endTime'];



$dataToSave['appoTime']=$_GET['appoTime'];

$dataToSave['endTime']=$_GET['endTime'];





$dataToSave['appoMin']=$os->appoMin[$dataToSave['appoTime']];

$dataToSave['endMin']=$os->appoMin[$dataToSave['endTime']];



$dataToSave['duration']=(int)$dataToSave['endMin']-(int)$dataToSave['appoMin'];

$dataToSave['propertyId']=$_GET['propertyId'];

$dataToSave['appoNote']=$_GET['appoNote'];

$dataToSave['acompanyBy']=$_GET['acompanyBy'];

$dataToSave['appoStatus']=$_GET['appoStatus'];

$dataToSave['appoType']=$_GET['appoType'];



if($memberId<1)

{

	$dataToSave['addedDate']=date('Y-m-d h:i:s');

	$dataToSave['addedBY']=$os->userDetails['adminId'];

}



$id= $os->save_appo($dataToSave,'appoId',$appoId);







//   if($dataToSave['appoStatus']!='Closed' && $dataToSave['appoStatus']!='')

{

// except close   other status will show in followuplist by next day.



// later req save while book appo date



    $memId=$dataToSave['memberId'];

      

	 

	  

     //$nexD  = mktime(0, 0, 0, date("m"),   date("d")+1,   date("Y"));

	//  $dataToSavem['nextCall']=date('Y-m-d 00:00:00',$nexD); // 999

	   

	  $datedd = new DateTime($dataToSave['appoDate']);

      $datedd->modify('+1 day');

      $nexD=$datedd->format('Y-m-d 00:00:00');

	  $dataToSavem['nextCall']=$nexD; // 999

	 

  

  

 $os->save_member($dataToSavem,'memberId',$memId);

}





$confirmEmailSend=$_GET['confirmEmailSend'];

$mailMsg='Appointment Booked  successfully ';

if($confirmEmailSend==1 && $dataToSave['appoStatus']=='' && ($dataToSave['appoType']=='Viewing' ||  $dataToSave['appoType']=='Marketapprisal'   ))

{

}



echo $id.'###'.$mailMsg;

exit();

 

}









if($_GET['viewAppoByDate']=='OK')

{

$dates=$_GET['dates'];

 

	 



 $dates=$os->saveDate($dates);  

  $datesShow=$os->showDate($dates);

$mAppos= $os->get_appo(" appoDate='$dates' and duration>0 and  appoStatus!='Cancelled' ", '');



 



if(is_array($mAppos))

{

 foreach($mAppos as $slots)

 {

 

  $memberId=$slots['memberId'];

  $member= $os->get_member(" memberId='$memberId' ");

  $member= $member[0];

  

  $propertyId=$slots['propertyId'];

  $property= $os->get_property(" propertyId='$propertyId' ");

  $property= $property[0];

 

	$slot[$slots['appoTime']][$slots['appoId']]=$slots;

	$slot[$slots['appoTime']][$slots['appoId']]['member']=$member['title'].' '.$member['lastName']." ".$member['firstName'];

	$slot[$slots['appoTime']][$slots['appoId']]['memberId']=$member['memberId'];

	$slot[$slots['appoTime']][$slots['appoId']]['property']= $property['title']; //.''.$property['address']." ".$property['postcode'];

	$slot[$slots['appoTime']][$slots['appoId']]['phone']= ($member['mobile']!='')? $member['mobile']:$member['telephone'];

	

	 

		

 }



}

 

if($dates!='')

{



// 





?>

<div style="font-size:18px; font-weight:bold; color:#008FD5; padding:2px; text-align:left;"> Date:<span style="color:#FF3300;">  <? echo $datesShow ?> </span> &nbsp; Total Appointments: <span style="color:#FF3300;"> <? echo count($mAppos) ?> </span> </div >

<div class="calenderScroll">

 

<table class="calenderDiary"  cellspacing="0" cellpadding="0" width="100%" style="border:1px solid #E2E2E2; color:#787878">

 

  <? foreach($os->appoTime as $times){

  ?>

   <tr>

    <td width="70"><div class="timeDiv"><? echo $times; ?></div></td>

    <td>

	<? 

	if(is_array($slot[$times]))

	{

	$appoMargin=1;

	

	$countAppoADay=count($slot[$times]);

	foreach($slot[$times]  as $appos){

	 

	$appoDetls=$appos;

	$fullWidthSlotStyle='';

	if($countAppoADay==1)

	{

	$fullWidthSlotStyle='width:97%;';

	}

	

	$colorClass=$os->staffAppoColorClss[$appoDetls['acompanyBy']];

	$durationClass='duration'.$appoDetls['duration'];

	?>

	<div class="slot <? echo $colorClass ?> <? echo $durationClass ?> appoMargin<? echo $appoMargin ?>" onclick="defaultAppo('<? echo $appoDetls['memberId']?>','<? echo $appoDetls['appoId']?>')" style="<? echo $fullWidthSlotStyle ?>">  

	<span class="viewTypeStyle" style="background-color:<? echo $os->appoTypeColor[$appoDetls['appoType']]; ?>;" ><? echo $appoDetls['appoType']; ?></span>

	

	/<? echo $appoDetls['member']; ?> 

	

	<span class="slotMoreData">/<? echo $appoDetls['phone']; ?>/ <? echo $appoDetls['property']; ?>/<? echo $appoDetls['appoNote']; ?></span></div>

	

	<? 

	$appoMargin++;

	}

	 

	}

	

	

	?>

		

	</td>

    

  </tr>

   <?  } ?>

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

   

</table>

</div>

 <? 



} 

 

exit();

 

}



if($_GET['viewAppoByDate-notinuse-onlyforbackups']=='OK')

{

$dates=$_GET['dates'];

 

	 



 $dates=$os->saveDate($dates);  

  $datesShow=$os->showDate($dates);

$mAppos= $os->get_appo(" appoDate='$dates' ", '');



 



if(is_array($mAppos))

{

 foreach($mAppos as $slots)

 {

 

  $memberId=$slots['memberId'];

  $member= $os->get_member(" memberId='$memberId' ");

  $member= $member[0];

  

  $propertyId=$slots['propertyId'];

  $property= $os->get_property(" propertyId='$propertyId' ");

  $property= $property[0];

 

	$slot[$slots['appoTime']][$slots['appoId']]=$slots;

	$slot[$slots['appoTime']][$slots['appoId']]['member']=$member['title'].' '.$member['lastName']." ".$member['firstName'];

	$slot[$slots['appoTime']][$slots['appoId']]['memberId']=$member['memberId'];

	$slot[$slots['appoTime']][$slots['appoId']]['property']= $property['title']; //.''.$property['address']." ".$property['postcode'];

	 

		

 }



}

 

if($dates!='')

{



// 





?>

<div style="font-size:12px; font-weight:bold; color:#660099; padding:2px; text-align:center;"> Appointment List Dated: <? echo $datesShow ?></div >



<table class="calenderDiary"  cellspacing="0" cellpadding="0" width="100%" style="border:1px solid #E2E2E2; color:#787878">

   

 

  

  <? foreach($os->appoTime as $times){

  _d($times);

  

   ?>

   <tr>

    <td width="70"><div class="timeDiv"><? echo $times; ?></div></td>

    <td>

	<? 

	if($slot[$times]!='')

	{

	$appoDetls=$slot[$times];

	$colorClass=$os->staffAppoColorClss[$appoDetls['acompanyBy']];

	$durationClass='duration'.$appoDetls['duration'];

	?>

	<div class="slot <? echo $colorClass ?> <? echo $durationClass ?>" onclick="defaultApplicant('<? echo $appoDetls['memberId']?>')">  <? echo $appoDetls['appoType']; ?>/<? echo $appoDetls['member']; ?> / <? echo $appoDetls['property']; ?>/<? echo $appoDetls['appoNote']; ?> &nbsp;</div>

	

	<? 

	

	 

	}

	

	

	?>

	

	

	

	

	

	&nbsp;

	

	

	

	

	</td>

    

  </tr>

   <?  } ?>

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

  

   

</table>



 <? 



} 

 

exit();

 

}





if($_GET['viewAppoByMember']=='OK')

{



 

		

$memberId=$_GET['memberId'];

 

$mAppos= $os->get_appo(" memberId='$memberId' and  duration>0 ", ' appoDate desc ');



if(is_array($mAppos))

{

?>

<table style="font-size:11px;">

<tr><td>Date</td> <td>Note/Status</td> <td>Action</td></tr>

<? 

 foreach($mAppos as $appos)

 {

 ?>

 <tr  class="memappolist">

 <td valign="top" class="appoDate" onclick="fillAppoData('<? echo $appos['appoId']?>')" style="cursor:pointer;"> <? echo $os->showDate($appos['appoDate']); ?> 

 

 <br /> <font color="#999999"> <? echo $appos['appoTime']?> </font>

 </td> <td valign="top" onclick="fillAppoData('<? echo $appos['appoId']?>')" > <? echo $appos['appoNote']?> <br /> <font color="#999999"> <? echo $appos['appoStatus']?> </font></td>

    <td valign="top"><span class="deleteAppo" onclick="deleteAppo('<? echo  $appos['appoId'] ?>')">Delete</span> </td>

 </tr>

 

 <? 

 

 }

 

 ?>

 </table>

 <? 



} 

 

exit();

 

}

if($_GET['deleteAppo']=='OK')

{ 



$appoId=$_GET['appoId'];

 

 $updateQuery="delete from appo where appoId='$appoId'";

 $os->mq($updateQuery);

 echo 'Appointment Deleted Successfully';

 exit();

}











if($_GET['fillAppoData']=='OK'){



		$appoId=$_GET['appoId'];

		

		if($appoId>0)	

		{

		$wheres=" where appoId='$appoId'";

		}

     	$listingQuery=" select * from appo  $wheres ";

		$appo=$os->mq($listingQuery);

		$record=$os->mfa( $appo);

	 

		$record['appoDate']=$os->showDate($record['appoDate']);

		$record['propertyHints']='';

		$record['propertyDetails']='';

		$propertyId=$record['propertyId'];

		$proprty=$os->get_property(" propertyId='$propertyId' ");

		$proprty=$proprty[0];

		if($propertyId>0){

		$record['propertyHints']=$proprty['title'];

		$record['propertyDetails']="Post ".$proprty['title']." Address ".$proprty['houseNO']." ".$proprty['roadName']."  Bed ".$proprty['bed']."";

		

		}

		 

	   

		

		

		

		

		

		echo  json_encode($record);

		exit();

}





if($_GET['setnextCallShow']=='OK'){

$memberId=$_GET['memberId'];

$vallue=$_GET['vallue'];

$updateQuery="update member set nextCallShow='$vallue' where memberId='$memberId'";

if($memberId>0){

$os->mq($updateQuery);

}

if($vallue<1)

{

 echo $memberId;

}

exit();

}





if($_GET['saveNotes']=='OK')

{

  

  



$fieldidtoedit = $_GET['fieldidtoedit'];

$table = $_GET['table'];

$primeryid = $_GET['primeryid'];

$primaryVal = $_GET['primaryVal'];

$fieldidtoeditVal = addslashes( $_GET['fieldidtoeditVal']);



if($fieldidtoeditVal!='' ){

$existingQuery=" select $fieldidtoedit from $table where $primeryid='$primaryVal' limit 1 ";

$notesRS=$os->mq($existingQuery);

$notes=$os->mfa($notesRS);

$notesOldValue=$notes[$fieldidtoedit];



  $adminName=$os->userDetails['name'];

  $adminTime=$os->now('d-m-Y h:i a');

  $whoWhen=$adminTime.' '.$adminName."\n";



 $notesNewValue=$whoWhen.$fieldidtoeditVal."\n\n".$notesOldValue;

 

 //cho $notesNewValue;

 

 $NewQuery=" update $table set  $fieldidtoedit='$notesNewValue'  where $primeryid='$primaryVal' ";

 $notesRS=$os->mq($NewQuery);

 

$existingQuery=" select $fieldidtoedit from $table where $primeryid='$primaryVal' limit 1 ";

$notesRS=$os->mq($existingQuery);

$notes=$os->mfa($notesRS);

$notesNewValue=$notes[$fieldidtoedit];

 



 echo  $fieldidtoedit."@#@".$table."@#@".$primeryid."@#@".$notesNewValue;

 }



  

 

exit();

}

















// for old programming



if($_GET['saveNewregistration']=='OK')

{

  

	

$dataToSave['type']=$_GET['type'];

$dataToSave['firstName']=$_GET['firstName'];

$dataToSave['lastName']=$_GET['lastName'];

$dataToSave['mobile']=$_GET['mobile'];

$dataToSave['email']=$_GET['email'];



$dataToSave['registerDate']=$os->now();

$dataToSave['addedDate']=date('Y-m-d h:i:s');

$dataToSave['addedBY']=$os->userDetails['adminId'];

	 

	 $id= $os->save_member($dataToSave);

	 

	  

	 $dataToSave2['code']=date('ymd').$id;

	 $id= $os->save_member($dataToSave2,'memberId',$id);

	 

	 echo $id;

	 exit();

	

}





 if($_GET['getCustomerDetailsFlds']=='1' && $_GET['memberId']>0)

 {

	

	$memberId = $_GET['memberId'];

	$cusDtls = $os->getMe("SELECT * FROM member WHERE memberId='$memberId'");

	if(is_array($cusDtls) && count($cusDtls)>0){

		$cusDtls = $cusDtls[0];

		echo $cusDtls['code']."#-#".$cusDtls['memberId']."#-#".$cusDtls['firstName']."#-#".$cusDtls['lastName']."#-#".$cusDtls['type']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['pin']."#-#".$cusDtls['mobileR']."#-#";

		

		

		

	    

	}	

	exit();

	

	}

	

	

if($_GET['matchApplicants']=='OK'){



		$propertyId=$_GET['propertyId'];

		

		if($propertyId>0)	

		{

		$wheres=" where propertyId='$propertyId'";

	

	    $listingQuery=" select * from property  $wheres ";

		$rsproperty=$os->mq($listingQuery);

		$property=$os->mfa( $rsproperty);

		

		

		$attrStr='';

		$attr=$property['attribute']; 

		$attrA=explode(',',$attr);

		 

		foreach($attrA as $val)

		{

			if(trim($val)!='')

			{

			   $attrStrArr[]=" requirements LIKE '%$val%' ";

			}

		

		}

		$attrStr='  or ('.implode(' OR ',$attrStrArr).' )';

	                 

						 //  $dailyQuery="select GROUP_CONCAT() dl from dailylist where caseNo RLIKE '$caseStr'";  //	$caseStr = implode('|',$singleCaseA);

		

		

		

		$type=$property['type']; 

		$leasehold=$property['leasehold'];

		$leaseyears=$property['leaseyears'];

		$bed=$property['bed'];

		$bath=$property['bath'];

		$sofa=$property['sofa'];

		if($type!=''){ $andtype=" or  type='$type'";  }

		

		if($leasehold!=''){ $andleasehold=" or leasehold='$leasehold'";  }

		

		if($leaseyears!=''){ $andleaseyears=" or leaseyears='$leaseyears'";  }

	

		if($bed!=''){ $andbed=" and bed='$bed'";  }

	

		if($bath!=''){ $andbath=" or bath='$bath'";  }

		

		if($sofa!=''){ $andsofa=" or sofa='$sofa'";  }

		

		 

	  $listingQuery=" select * from member  where status!='OTS' and  ( memberId>0  $andtype  $andleasehold  $andleaseyears  $andbath  $andsofa  $attrStr )  $andbed order by lastName ";

		 $rsmem=$os->mq($listingQuery);

		 ?>

		 <table class="noBorder matchprop" > 

		 

		 <?

		while( $mem=$os->mfa( $rsmem))

		{

		?>

		<tr> <td><? echo $mem['title'] ?></td><td width="90"> <? echo $mem['lastName'] ?></td><td> <? echo $mem['firstName'] ?></td><td> <? echo $mem['flatOrHouseName'] ?>  <? echo $mem['address'] ?>  <span style="color:#0066FF"><? echo $mem['postCode'] ?></span> <span style="color:#009900"> <? echo $mem['mobile'] ?>  <? echo $mem['telephone'] ?></span> </td> <td>Bed: <? echo $mem['bed'] ?> Bath:<? echo $mem['bath'] ?> Reception:<? echo $mem['sofa'] ?>  </td><td><? echo $mem['requirements'] ?></td></tr>

	 

		

		<?

		  

		}

		?>

		 </table > 

		<?

		

		

		}

		exit();

}



if($_GET['listFollowups']=='OK')

{

   

    $dates=$_GET['dates'];

	

	

    $dates=$os->saveDate($dates);  

    $datesToshow=$os->showDate($dates);



 //$dates =date('Y-m-d 00:00:00');

 $wheres=" where  nextCall='$dates' and nextCallShow='1' " ;

 

   $listingQuery=" select * from member   $wheres order by code  ";

 $rsmember=$os->mq($listingQuery);

 $tFu=mysql_num_rows($rsmember);

 





?>

<div style="font-size:18px; font-weight:bold; color:#008FD5; padding:2px; text-align:left;"> Date:<span style="color:#FF3300;">  <? echo $datesToshow ?> </span> &nbsp; Total Followup: <span style="color:#FF3300;"><? echo $tFu ?></span> </div >

 



<table  border="0" cellspacing="0" cellpadding="0" class="noBorder" width="900" style="background-color:#FFFFFF;"  >

							<tr class="borderTitle" >

						

								

		<td ><b>Registered</b></td>  		

		<td ><b>Code</b></td>  		

		<td ><b> </b></td>  				

<td ><b>Title</b></td>  

  <td ><b>Surname</b></td>  

  <td ><b>Initial</b></td>  

  <td ><b>Address</b></td>  

   <td ><b>Mobile</b></td>  

 

								

							</tr>

							

							

							

							<?php

							  

						 

							while($record=$os->mfa( $rsmember)){ 

							    

								

								

							

							 ?>

							

							

							

							<tr  onclick="setFolloupThenOpen('<? echo $record['memberId']?>','0')" style="cursor:pointer;" >

						

								

			<td><? echo $os->showDate($record['registerDate']); ?> </td>  	

				<td><?php echo $record['code']?>  </td>  	

				<td> <? if(substr($record['code'],0,2)=='VV'){ ?> <span class="vend">Vendor</span> <? } else {?><span class="appli">Applicant</span>  <? } ?> </td>  				

 <td><?php echo $record['title']?> </td>  

   <td><?php echo $record['lastName']?> </td> 

  <td><?php echo $record['firstName']?> </td>  

 

  <td><?php echo $record['address']?> </td>  

  <td><?php if($record['mobile']!=''){ echo 'M: '.$record['mobile'].' &nbsp; ';}?>   <?php if($record['telephone']!=''){ echo 'T: '.$record['telephone'].' &nbsp; ';}?> </td>  

  

							 	

					

                        

                     

														

					</tr>

				 

                          <? } ?>  

						

						</table>

 

  <?

  exit();

}





if($_GET['deleteMember']=='OK')

{ 



$memberId=$_GET['memberId'];

 if($memberId>0){

 $updateQuery="delete from member where memberId='$memberId'";

 $os->mq($updateQuery);

 echo 'Member Deleted Successfully';

 }

 exit();

}



if($_GET['deleteProperty']=='OK')

{ 



$propertyId=$_GET['propertyId'];

 if($propertyId>0){

 $updateQuery="delete from property where propertyId='$propertyId'";

 $os->mq($updateQuery);

 echo 'Record Deleted Successfully';

 }

 exit();

}



if($_GET['addLocation']=='OK')

{ 



$loc=$_GET['loc'];

 if($loc!=''){

  $updateQuery="insert into propertylocation set title='$loc',active=1";

 $id=$os->mq($updateQuery);

 

   

if( $id>0){							

 $os->optionsHTML($id,'propertylocationId','title','propertylocation');

 }else

 {

  echo '';

 }

							 

  //echo $id."##".$loc;

 }

 exit();

}