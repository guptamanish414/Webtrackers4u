<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
$propertyId=$_GET['propertyId'];
 
 
$site['themePath']=$site['urlFront'].'wtos-theme/';
$site['url']=$site['urlFront'];
$branchId='32378';
$zipfile=$branchId.'.ZIP';  
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

 
$root=str_replace('wtos','',getcwd());


$zipWorkspace=$root.'/wtos/zipWorkspace/';  
$sourceDir=$root;

$zipArray=array();
$i=0;
for($i=0;$i<4;$i++)
{
	$newFile=$agent_ref.'_IMG_0'.$i.'.jpg';
	$source=$sourceDir.$pImage[$i]['image'];
	
	$dest=$zipWorkspace.$newFile;
	
	if(copy ( $source , $dest ))
	{
     $zipArray[$newFile]=$dest;
	}

}	

	
	
	# EPC
	$newFile=$agent_ref.'_IMG_60.jpg';
	$source=$sourceDir.$pro['EPC'];
	$dest=$zipWorkspace.$newFile;
	if(copy ( $source , $dest ))
	{
     $zipArray[$newFile]=$dest;
	}
	
	
 
	#Floorplan
	$newFile=$agent_ref.'_FLP_00.jpg';
	$source=$sourceDir.$pro['floorplan'];
	$dest=$zipWorkspace.$newFile;
	if(copy ( $source , $dest ))
	{
     $zipArray[$newFile]=$dest;
	}



##   creating Zip

$zipPath=$root.'/wtos/zipFiles/';    
$zipfilename  = $zipPath.$zipfile; // Default: "myarchive.zip"
$timeout      = 10000           ; // Default: 5000
ini_set('max_execution_time', $timeout); 
$zip = new ZipArchive();
if ($zip->open("$zipfilename", ZipArchive::CREATE) !== TRUE) {
    die ("Could not open archive");
}

foreach ($zipArray as $key=>$value) {
    $zip->addFile( realpath($value),$key) or die ("ERROR: Could not add file: $key");
}
$zip->close();
##   creating zipEnd
 
$fileName=$zipfilename;
header("Content-type: application/octet-stream");
header( "Content-disposition: filename=".$zipfile);
readfile($fileName);
unlink($zipfilename);
exit();
