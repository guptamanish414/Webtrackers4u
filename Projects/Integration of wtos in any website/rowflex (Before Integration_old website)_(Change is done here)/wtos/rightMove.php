<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
echo "Required rightmove agent key";
exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<?

 
 
$site['themePath']=$site['urlFront'].'wtos-theme/';
$site['url']=$site['urlFront'];
$propertyId=$_GET['propertyId'];


$proQuery=" select * from property where propertyId='$propertyId'  ";
$prors=$os->mq($proQuery);
$pro=$os->mfa($prors);


$network_id='8189';
$branch_id='95332';
$agent_ref=$branch_id."_".$propertyId;

$channel=($pro['type']=='Buy')?1:2;  # 1 sale 2 late

 

$property_type=$pro['propertyType'];
$genDate=date('d-m-Y 00:00:00');
$transaction_date=$genDate;

 
# dd-MM-yyyy HH:mm:ss
$jsonRequest=$_GET['jsonRequest'];

$url['addProperty']='https://adfapi.rightmove.co.uk/v1/property/sendpropertydetails';
                     
$url['deleteProperty']='https://adfapi.rightmove.co.uk/v1/property/removeproperty';
$url['getBranch']='https://adfapi.rightmove.co.uk/v1/property/getbranchpropertylist';

// $url['getPerformance']='https://adfapi.adftest.rightmove.com/v1/property/getpropertyperformance ';

  








if($jsonRequest=='addProperty')
{
       $rent_frequency=($pro['type']=='Buy')?'':52;  # 1 sale 2 late
 

	    $pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'  order by priority asc ,propertyImageId desc   ");
		
        $zoop['TOWN']=$os->getByFld('propertylocation','propertylocationId',$pro['locationId'],'title');
		$pcodeA=explode(' ',$pro['postcode']);
		$zoop['POSTCODE1']=$pcodeA[0];
		$zoop['POSTCODE2']=$pcodeA[1];
		
		$tenureType=1;	 
		if($pro['leasehold']=='Freehold'){$tenureType=1;}
		if($pro['leasehold']=='Leasehold'){$tenureType=2;}
		if($pro['leasehold']=='Share of Freehold'){$tenureType=5;}
		
		$zoop['TENURE_TYPE_ID']=$tenureType; #1 – Freehold, 2 – Leasehold, 3 – Feudal,4 – Commonhold, 5 – Share of Freehold
		
		
		$create_date=$genDate;
		$update_date=$genDate;
				
		$date_available=date('d-m-Y');
		$genDateImage=$genDate;
		# image min 3
		
		$iMgStr='';
		
		 
		$totalImg=count($pImage);
		for($i=0;$i<$totalImg;$i++)
		{
			
		
		   $k=$i+1;
		    $img_text=$pImage[$i]['title'];
			$imgLink=$site['url'].$pImage[$i]['image'];
			
			if($img_text==''){ $img_text=' Image Title';}
			 
			// 1 Image, 2 Floorplan, 3 Brochure, 4 Virtual Tour, 5 Audio Tour, 6 EPC, 7 EPC Graph"
		$iMgStr []=	'{
			"media_type":1,
			"media_url":"'.$imgLink.'",
			"caption":"'.addslashes($img_text).'",
			"sort_order":'.$k.',
			"media_update_date": "'.$genDateImage.'"
		}';
		
		if($pImage[$i]['title']!='')
		 {
		 
			
			$roomStr []='{
			"room_name":"'.$pImage[$i]['title'].'",
			"room_photo_urls":["'.$imgLink.'"]
		}';
			
			
		 }
		
		
		}
		
		
		## adding floor plan 
		$k++;
		$floorPlanImg=$site['url']. $pro['floorplan'];    
		$iMgStr []=	'{
			"media_type":2,
			"media_url":"'.$floorPlanImg.'",
			"caption":"'.addslashes('Floorplan').'",
			"sort_order":'.$k.',
			"media_update_date": "'.$genDateImage.'"
		}';
			 
	    ## adding EPC
		$k++;
		$epcImg=$site['url']. $pro['EPC'];
		$iMgStr []=	'{
			"media_type":7,
			"media_url":"'.$epcImg.'",
			"caption":"'.addslashes('EPC Graph').'",
			"sort_order":'.$k.',
			"media_update_date": "'.$genDateImage.'"
		}';
			 		 
		 ## adding brochurePdf
		 
		
		$brochurePdf=$site['url']. $pro['brochurePdf'];
		$k++;
		$iMgStr []=	'{
			"media_type":3,
			"media_url":"'.$brochurePdf.'",
			"caption":"'.addslashes('Brochure').'",
			"sort_order":'.$k.',
			"media_update_date": "'.$genDateImage.'"
		}';	 
			 /* */
			 
			
		
		## --------------------------------------
		
		/*  $bigImg=$site['url'].$pro['print'];
		$qrImg=$site['url'].$pro['qrCode'];
		$floorPlanImg=$site['url']. $pro['floorplan'];
		
		
		
        */
		$rent_frequency_STR='';
		if($channel==2){
		$rent_frequency_STR='"rent_frequency": '.$rent_frequency.',';
		}
		
		$summary=substr(strip_tags($pro['fullDescription'], '<p><a>'),0,800);
		
		$body=	'
{
	"network":{
		"network_id": '.$network_id.'
	},
	"branch":{
		"branch_id": '.$branch_id.',
		"channel": '.$channel.',
		"overseas": false
	},
	"property":{
		"agent_ref": "'.$agent_ref.'",
		"published": true,
		"property_type":'.$property_type.',
		"status": 1,
		 
		"create_date": "'.$create_date.'",
		"update_date": "'.$update_date.'",
		"date_available": "'.$date_available.'",
		 
		"address":{
			"house_name_number": "'.$pro['houseNO']. ' '.$pro['RoadName'].'",
			"address_2": "'.$pro['RoadName'].'",
			"address_3": "",
			"address_4": "",
			"town": "'.$zoop['TOWN'].'",
			"postcode_1": "'.$zoop['POSTCODE1'].'",
			"postcode_2": "'.$zoop['POSTCODE2'].'",
			"display_address": "'.$pro['title'].'"
			 
		},
		"price_information":{
			"price": '.$pro['price'].',
			"price_qualifier": 0,
			'.$rent_frequency_STR.'
			"tenure_type":'.$tenureType.'
			 
		},
		"details":{
			"summary": "'.addslashes($summary).'",
			"description": "'.addslashes($pro['fullDescription']).'",
			"features": [
				"'.addslashes($pro['bulletText1']).'",
				"'.addslashes($pro['bulletText2']).'",
				"'.addslashes($pro['bulletText3']).'",
				"'.addslashes($pro['bulletText4']).'",
				"'.addslashes($pro['bulletText5']).'"
			],
			"bedrooms": '.$pro['bed'].',
			"bathrooms": '.$pro['bath'].',
			"reception_rooms": '.$pro['sofa'].',   
			"rooms": [ '.implode(',',$roomStr).' ]
			 			 
			 
		},
		"media": [ '.implode(',',$iMgStr).'],
		"principal": {
			"principal_email_address": "enquiries@broadwayandwest.co.uk",
			"auto_email_when_live": true,
			"auto_email_updates": true
		}
	}
}';
		
		

}

if($jsonRequest=='deleteProperty')
{
$body=	'
{
               "network":{
                               "network_id": '.$network_id.'
               },
               "branch":{
                               "branch_id": '.$branch_id.',
                               "channel": '.$channel.'
               },
               "property":{
                               "agent_ref": "'.$agent_ref.'",
                               "removal_reason": 7,
                               "transaction_date": "'.$transaction_date.'"
              }
}';

}
if($jsonRequest=='getBranch')
{

$body=	'
{
               "network":{
                               "network_id": '.$network_id.'
               },
               "branch":{
                              "branch_id": '.$branch_id.',
                              "channel": '.$channel.'
               }
}';

}
if($jsonRequest=='getPerformance')
{
$p_start_date=date('d-m-Y');
$p_start_date='09-11-2014';
$p_end_date=date('d-m-Y');

$body=	'{
               "network":{
                               "network_id": '.$network_id.'
               },
               "branch":{
                               "branch_id": '.$branch_id.'
                               
               },
               "property":{
                               "agent_ref": "'.$agent_ref.'"
                              
                              },
             "export_period":{
				                "start_date":"'.$p_start_date.'",
                                "end_date":"'.$p_end_date.'"
                          }

}';
}

$jsonStr=$body;
 
 
                                                     
 $allow=true;
if($jsonStr!='' && $url[$jsonRequest]!='' && $allow==true){

$ch = curl_init($url[$jsonRequest]);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
curl_setopt($ch, CURLOPT_SSLCERT, "broadway_west.pem"); //"client.pem";
curl_setopt($ch, CURLOPT_SSLCERTPASSWD, "U5DCHWJr");
                                                                 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($jsonStr))                                                                       
);                                                                                                                   
 $response = curl_exec($ch);
 $response=json_decode($response);
  
	 
	
 if($response->success==1 )  
 {
    
     
	 if($response->property->rightmove_url!='' &&  $jsonRequest=='addProperty')
	 {
				 $dataToSave['rightmoveLink']=$response->property->rightmove_url;
				 $os->save('property',$dataToSave,'propertyId',$propertyId);
				 
				 ?>
				 <a title="Click Here To View Property" href="<? echo $response->property->rightmove_url;?>"><? echo $response->property->rightmove_url;?> </a>
				 <br />
				 <? 
				 
	 }
	 if($jsonRequest=='deleteProperty')
	 {
				 $dataToSave['rightmoveLink']='';
				 $os->save('property',$dataToSave,'propertyId',$propertyId);
	 }
 
 
 
 
 }
 
}


echo '<br>
 Response From Rightmove.<br><br>

<pre>'; 
print_r($response);

echo   "<BR><BR>RTDF JSON REQUEST";



echo '</pre>'; 
 
_d($jsonStr);
 
 
	
?> <body>
</body>
</html>