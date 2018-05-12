<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
$propertyId=$_GET['propertyId'];
 
 
$site['themePath']=$site['urlFront'].'wtos-theme/';
$site['url']=$site['urlFront'];


$version='3';
$eof='^';
$eor='|';
$branchId='32378';
$propertyCount=1;
$genDate=date('d-m-y h:i');

$secNo='01';
$blmfile=$branchId.'_'.date('Ymd').$secNo.'.BLM';
$zipfile=$branchId.'.ZIP';

$head= 
"#HEADER# 
Version : $version  
EOF : '$eof'
EOR : '$eor'

Property Count : $propertyCount 
Generated Date : $genDate

#DEFINITION# 
AGENT_REF^ADDRESS_1^ADDRESS_2^ADDRESS_3^TOWN^POSTCODE1^POSTCODE2^FEATURE1^FEATURE2^FEATURE3^FEATURE4^FEATURE5^SUMMARY^DESCRIPTION^BRANCH_ID^STATUS_ID^BEDROOMS^PRICE^PRICE_QUALIFIER^PROP_SUB_ID^CREATE_DATE^UPDATE_DATE^DISPLAY_ADDRESS^PUBLISHED_FLAG^LET_DATE_AVAILABLE^LET_BOND^LET_TYPE_ID^LET_FURN_ID^LET_RENT_FREQUENCY^TENURE_TYPE_ID^TRANS_TYPE_ID^NEW_HOME_FLAG^MEDIA_IMAGE_00^MEDIA_IMAGE_TEXT_00^MEDIA_IMAGE_01^MEDIA_IMAGE_TEXT_01^MEDIA_IMAGE_02^MEDIA_IMAGE_TEXT_02^MEDIA_IMAGE_03^MEDIA_IMAGE_TEXT_03^MEDIA_IMAGE_60^MEDIA_IMAGE_TEXT_60^MEDIA_DOCUMENT_50^MEDIA_DOCUMENT_TEXT_50^MEDIA_FLOOR_PLAN_00^|

#DATA#
";
 
 
 $foot="
#END# ";

function zooplaBML($propertyId,$branchId,$eof,$eor)
{
		global $site,$os;
		$propertyRef=$propertyId;
		$agent_ref=$branchId."_".$propertyRef;
		
		$proQuery=" select * from property where propertyId='$propertyId'  ";
		$prors=$os->mq($proQuery);
		$pro=$os->mfa($prors);
		
		$bigImg=$site['url'].$pro['print'];
		$qrImg=$site['url'].$pro['qrCode'];
		$floorPlanImg=$site['url']. $pro['floorplan'];
		$epcImg=$site['url']. $pro['EPC'];
		
		$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId' and printOrder>0   order by printOrder asc ,propertyImageId desc ");
		//$smallImg1=$site['url'].$pImage['0']['image'];
		
		
		
		
		
		
		$zoop['AGENT_REF']=$agent_ref;
		$zoop['ADDRESS_1']=$pro['houseNO']; 
		$zoop['ADDRESS_2']=$pro['RoadName']; 
		$zoop['ADDRESS_3']=$pro['']; ## redundant
		$zoop['TOWN']=$os->getByFld('propertylocation','propertylocationId',$pro['locationId'],'title');
		$pcodeA=explode(' ',$pro['postcode']);
		
		$zoop['POSTCODE1']=$pcodeA[0];
		$zoop['POSTCODE2']=$pcodeA[1];
		# feature min 5
		$zoop['FEATURE1']=$pro['bulletText1'];
		$zoop['FEATURE2']=$pro['bulletText2'];
		$zoop['FEATURE3']=$pro['bulletText3'];
		$zoop['FEATURE4']=$pro['bulletText4'];
		$zoop['FEATURE5']=$pro['bulletText5'];
		  
		$zoop['SUMMARY']=$pro['shortDescription'];
		$zoop['DESCRIPTION']=$pro['fullDescription'];
		$zoop['BRANCH_ID']=$branchId;
		$zoop['STATUS_ID']=0; #0 – Available, 1 – SSTC (Sales only), 2 – SSTCM (Scottish Sales only), 3 – Under Offer (Sales only),4 – Reserved (Sales only), 5 – Let Agreed (Lettings only)
		$zoop['BEDROOMS']=$pro['bed'];
		$zoop['PRICE']=$pro['price'];
		$zoop['PRICE_QUALIFIER']=0;#0 – Default, 1 – POA, 2 – Guide Price, 3 – Fixed Price, 4 – Offers in Excess of, 5 – OIRO, 6 – Sale by Tender, 7 – From, 9 – Shared Ownership, 10 – Offers Over, 11 – Part Buy Part Rent, 12 – Shared Equity, 14 – Equity Loan, 15 – Offers Invited
		
		
		$zoop['PROP_SUB_ID']=8; # flat   #################### confusion 
		$zoop['CREATE_DATE']=$pro['addedDate'];
		$zoop['UPDATE_DATE']=$pro['modifyDate'];
		$zoop['DISPLAY_ADDRESS']=$pro['address'];
		
		$zoop['PUBLISHED_FLAG']=1;
		$zoop['LET_DATE_AVAILABLE']=$pro['addedDate'];
		$zoop['LET_BOND']=0;    #################### confusion 
		$zoop['LET_TYPE_ID']=0;   #################### confusion 
		$zoop['LET_FURN_ID']=0;    #################### confusion 
		$zoop['LET_RENT_FREQUENCY']=0;  ## weekly
		
		if($pro['leasehold']=='Freehold'){$tenureType=1;}
		if($pro['leasehold']=='Leasehold'){$tenureType=2;}
		if($pro['leasehold']=='Share of Freehold'){$tenureType=5;}
		$zoop['TENURE_TYPE_ID']=$tenureType; #1 – Freehold, 2 – Leasehold, 3 – Feudal,4 – Commonhold, 5 – Share of Freehold
		 
		 
		$transtype=($pro['type']=='Buy')?1:2;
		$zoop['TRANS_TYPE_ID']=$transtype;# 1 - Resale, 2- Lettings
		$zoop['NEW_HOME_FLAG']='';# Y - New Home, N or empty - Non new home property 
		
		# image min 3
		
		$i=0;
		for($i=0;$i<4;$i++)
		{
		
		 $img_name_key='MEDIA_IMAGE_0'.$i;
		 $img_text_key='MEDIA_IMAGE_TEXT_0'.$i;
		 $k=$i+1;
		 $img_text_value='photo '.$k;
		 if($pImage[$i]['title']!='')
		 {
		    $img_text_value=$pImage[$i]['title'];
		 }
		 
		
		 $zoop[$img_name_key]=$agent_ref.'_IMG_0'.$i.'.jpg';
		 $zoop[$img_text_key]=$img_text_value;
		
		
		}
		     
		
		
		
		
		
		 
		
		
		
		# EPC
		$zoop['MEDIA_IMAGE_60']=$agent_ref.'_IMG_60.jpg';
		$zoop['MEDIA_IMAGE_TEXT_60']='EPC';
		
		  
		$zoop['MEDIA_DOCUMENT_50']=$site['urlFront'].'property/'.$pro['seoId'];
		$zoop['MEDIA_DOCUMENT_TEXT_50']=$pro['title'];
		#Floorplan
		$zoop['MEDIA_FLOOR_PLAN_00']=$agent_ref.'_FLP_00.jpg';
 
		$body=implode($eof,$zoop).$eof.$eor;
		return $body;
		
				 
}



$body=zooplaBML($propertyId,$branchId,$eof,$eor);

$bmlStr=$head.$body. $foot;


 
 
	$fileName=$blmfile;
	$filenamePath=$site['root'].$fileName;
	header("Content-type: application/octet-stream");
	header( "Content-disposition: filename=".$fileName);
	echo $bmlStr; 
	exit();
	
?> 