<?
include(inclPath('classes').'/sm.php');
function varP($key)
{
  $postval='';
  if(isset($_POST[$key]))
  {
     $postval=str_replace('m#m','&',$_POST[$key]);
  }
  return $postval;
  
}

function varG($key)
{
  $getval='';
  if(isset($_GET[$key]))
  {
     $getval=$_GET[$key];
  }
  return $getval;
  
}

function tinyMce()
{
  include('tinyMCE.php'); 
}

function selectedTab($seoid)
{

return '';
}

class os extends sm 
{
	var $currency = '&#x20b9;';
		
		var $paymentStatus_order = array('Pending'=>'Pending','Received'=>'Received','Refunded'=>'Refunded');
	var $orderStatus = array('New Order'=>'New Order','Processing'=>'Processing','Delivered'=>'Delivered','Not Delivered'=>'Not Delivered','Cancelled'=>'Cancelled','Returned'=>'Returned');
		
	function enc($str){
	$r=base64_encode(strrev(base64_encode($str)));
	return $r;
	}
	
	
	function dec($str){
	$r=base64_decode(strrev(base64_decode($str)));
	return $r;
	}
	
	function addProductView($productId){
		if($productId>0){
			$cDate = $this->now();
			$viewArr = $this->getMe("SELECT * FROM productview WHERE productId=$productId");
			if(is_array($viewArr)){
				$this->mq("UPDATE productview SET totalView=totalView+1,lastViewDate='$cDate' WHERE productId=$productId ");
			}
			else{
				$this->mq("INSERT productview SET totalView=1,lastViewDate='$cDate',productId=$productId");
			}
		}
	}
	
	function wListExists($productId){
		if($productId>0 && $this->isLogin()){
			$cId = $this->userDetails['customerId'];
			$wL = $this->getMe("SELECT COUNT(*) as wlP FROM wishlist WHERE productId=$productId AND customerId=$cId");
			$wlP = $wL[0]['wlP'];
			if($wlP>0){return true;}else{return false;}
		}else{return false;}
	}
	
	function bNavigation(){
		global $pageVar,$site;
		$navStr='<a class="bNavA" href="'.$site['url'].'" style="color:#7D7D7D">Home</a> ';
		if(is_array($pageVar['segment'])){
			$totN = count($pageVar['segment']);
			$prevLink='';
			for($i=1;$i<=$totN;$i++){
				$prevLink.= ($pageVar['segment'][$i-1]!='')?$pageVar['segment'][$i-1].'/':'';
				$navStr.=' <font>>></font> <a class="bNavA" href="'.$site['url'].$prevLink.$pageVar['segment'][$i].'" style="color:#7D7D7D">'.ucwords(strtolower($pageVar['segment'][$i])).'</a> ';
			}
		}		
		return $navStr;		
	}
	
	function genOrderCode(){
		$orderCode=mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"));
		$exits=$this->getByFld('orders','orderCode',$orderCode,'orderId');
		if($exits>0){$this->genOrderCode();}else{return $orderCode;}
	}
	
	function convertToDatetime($date){
			if($date==''){
				return 	$date;
			}
			else{
				$dateA = explode('-',$date);		
				$dateTime = $dateA[2].'-'.$dateA[1].'-'.$dateA[0].' '.'00:00:00';
				return $dateTime;
			}	
		}
		
		function viewDate($dt,$format=''){
			if($dt=='' || $dt=='0000-00-00 00:00:00'){
				return '';
			}
			else{
				if($format==''){$format='d-m-Y';}
					$viewDt = date($format,strtotime($dt));
					return  $viewDt;
			}	
		}
		

}

function createThumbnail($type,$width,$height,$thumb_width='100',$thumb_height='100',$filename,$main_image_path='',$thumb_image_path='') {
	/*Mrinal Kanti Pain*/
	
		//if($main_image_path=''){$main_image_path = 'images/';}
		$mainImage = $main_image_path.$filename;
		
		//if($thumb_image_path=''){$thumb_image_path = 'images/thumb';}
			
		//$thumb_filename = $thumb_width . "x" . $thumb_height . "_" . $filename;
		$thumb_filename = $filename;
		
			switch($type) {
			case IMAGETYPE_JPEG:
			$image = imagecreatefromjpeg($mainImage) or die('This is not a supported image.');
			break;
			case IMAGETYPE_GIF:
			$image = imagecreatefromgif($mainImage) or die('This is not a supported image.');
			break;
			case IMAGETYPE_PNG:
			$image = imagecreatefrompng($mainImage) or die('This is not a supported image.');
			break;
			default:
			die('This is not a supported image.');
			}
			
		$thumb = imagecreatetruecolor($thumb_width,$thumb_height);
		imagecopyresampled($thumb,$image,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
		imagejpeg($thumb,$thumb_image_path.$thumb_filename);
		return $thumb_filename;}


$os= new os;
