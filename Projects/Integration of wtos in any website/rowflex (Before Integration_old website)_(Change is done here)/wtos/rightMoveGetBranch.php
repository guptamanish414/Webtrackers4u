<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
$propertyId=$_GET['propertyId'];
 
 
$site['themePath']=$site['urlFront'].'wtos-theme/';
$site['url']=$site['urlFront'];
$blmfile='JSON-GetBranchPropertyList-Call-Request'.$propertyId.'.txt';

$network_id='8207';
$branch_id='95332';

 

 
 

 
 

function zooplaBML($propertyId,$branch_id,$network_id)
{
		global $site,$os;
		$proQuery=" select * from property where propertyId='$propertyId'  ";
		$prors=$os->mq($proQuery);
		$pro=$os->mfa($prors);
		$property_type=($pro['type']=='Buy')?1:2;  # 1 sale 2 late
		$channel=$property_type;
		
		
		$transaction_date=date('d-m-y h:i:s');
		$agent_ref=$branch_id."_".$propertyId;
		
		
		## --------------------------------------
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
		#-------------------------------------------
		
		return $body;
}



$body=zooplaBML($propertyId,$branch_id,$network_id);

$bmlStr=$head.$body. $foot;


 
 
	$fileName=$blmfile;
	$filenamePath=$site['root'].$fileName;
	header("Content-type: application/octet-stream");
	header( "Content-disposition: filename=".$fileName);
	echo $bmlStr; 
	exit();
	
?> 