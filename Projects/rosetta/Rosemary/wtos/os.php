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



class os extends sm 
{

 #Mrinal-9563688919,mrinal.pain@gmail.com# 
 
 #define variabless and arrays start# 
 	var $viewInListArr = array('Yes'=>'Yes','No'=>'No');
	var $viewInDetailsArr =  array('Yes'=>'Yes','No'=>'No');
	var $viewInShopArr =  array('Yes'=>'Yes','No'=>'No');
	var $paymentMethodStatus =  array('Active'=>'Active','Inacrtive'=>'Inacrtive');
	
 
	var $maritalStatusList = array('S'=>'Single','M'=>'Married');
		
	var $genderList = array('M'=>'Male','F'=>'Female');
	
	
							
	var $yesNO = array('No'=>'No','Yes'=>'Yes');
	
	var $activeStatus = array('Active'=>'Active','Inactive'=>'Inactive');						
 	
	var $indianStateList = array(
	'AP'=>'Andhra Pradesh','AR'=>'Arunachal Pradesh','AS'=>'Assam','BR'=>'Bihar','CT'=>'Chhattisgarh','GA'=>'Goa','GJ'=>'Gujarat','HR'=>'Haryana','HP'=>'Himachal Pradesh','JK'=>'Jammu & Kashmir','JH'=>'Jharkhand','KA'=>'Karnataka','KL'=>'Kerala','MP'=>'Madhya Pradesh','MH'=>'Maharashtra','MN'=>'Manipur','ML'=>'Meghalaya','MZ'=>'Mizoram','NL'=>'Nagaland','OR'=>'Odisha','PB'=>'Punjab','RJ'=>'Rajasthan','SK'=>'Sikkim','TN'=>'Tamil Nadu','TR'=>'Tripura','UT'=>'Uttarakhand','UP'=>'Uttar Pradesh','WB'=>'West Bengal');
	
	var $indianUnionTerritoryList = array('AN'=>'Andaman & Nicobar','CH'=>'Chandigarh','DN'=>'Dadra and Nagar Haveli','DD'=>'Daman & Diu','DL'=>'Delhi','LD'=>'Lakshadweep','PY'=>'Puducherry');
	
	var $orderPaymentStatus = array('Not Paid'=>'Not Paid','Advance'=>'Advance','Full Paid'=>'Full Paid','Cash On Delivery'=>'Cash On Delivery');
	
	
	
	
	var $productStatus = array('Available'=>'Available','Not Available'=>'Not Available','Coming Soon'=>'Coming Soon');
	
	var $orderStatus = array('New Order'=>'New Order','Processing'=>'Processing','Delivered'=>'Delivered','Not Delivered'=>'Not Delivered','Cancelled'=>'Cancelled','Returned'=>'Returned');
	
	var $imageType = array('Product'=>'Product');
	
	var $paymentStatus = array('Due'=>'Due','Paid'=>'Paid');
	var $paymentStatus_order = array('Pending'=>'Pending','Received'=>'Received','Refunded'=>'Refunded');
	
	var $orderType = array('Quotation'=>'Quotation','Bill'=>'Bill');
	
	var $serviceType = array('Quotation'=>'Quotation','Bill'=>'Bill');
	
	
	
	var $careType = array('Job'=>'Job','Bill'=>'Bill');	
	var $careStatus = array('Not Delivered'=>'Not Delivered','Delivered'=>'Delivered','Part Delivered'=>'Part Delivered');
	
	var $carePriority = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4');
	
	
	var $caredetailsStatus = array('Not Delivered'=>'Not Delivered','Delivered'=>'Delivered');
	
 	var $withInWarranty = array('No'=>'No','Yes'=>'Yes');
	
	
	var $mifStatus = array('UW'=>'UW','UC'=>'UC','NC'=>'NC','NC-B'=>'NC-B');
	
	
	
	var $partServiceType = array('PM'=>'PM','CM'=>'CM');
	
	
	var $paymentMode =  array('Cash'=>'Cash','Cheque'=>'Cheque','Demand Draft'=>'Demand Draft','Online Payment'=>'Online Payment');
	
	
	var $defaultQuantity = 1;
	
	var $dfTaxPer = 4; //Order Default Tax Percent
	
	var $couponType = array('Percentage'=>'Percentage','Fixed Amount'=>'Fixed Amount');
	
	var $bannerType = array('Header'=>'Header','Body'=>'Body','Home'=>'Home','MainPage'=>'MainPage','ShopHomeBanner'=>'ShopHomeBanner');
	var $homeBannerStatus = array('Active'=>'Active','Inactive'=>'Inactive');
	var $productFeatured = array(''=>'','show in home'=>'Show in home');
	
	
 #define variabless and arrays end# 
 
 
 
 
 
 #define functions Start# 
		
	function changeStatusDD_2($statusArr,$selected,$table,$satusfld,$idFld,$idVal,$colorStatus)

	{
	    $vars=	"'$table','$satusfld','$idFld','$idVal'";		

		$backGround=($colorStatus[$selected])?$colorStatus[$selected]:'FFFFFF';

		echo '<input type="text" value="'.$selected.'" id="changeStatusDD_2" name="changeStatusDD" style="width:40px;height:10px;" onchange="os.changeStatus(this,'.$vars.')" >';

		// return   $selected;

	}

	function addTwoDecimal($value) {
		
			if($value<=0) {
				return '00';
			}
			
			if(strpos($value,'.') === false){
				return $value.'.00';
			}
			else{
				return $value;
			}
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
	
	function convertToDate($date){
			if($date==''){
				return 	$date;
			}
			else{
				$dateA = explode('-',$date);		
				$date = $dateA[2].'-'.$dateA[1].'-'.$dateA[0];
				return $date;
			}	
		}//only date
		
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
	
	#others#	
	function ageList(){
			$ageArray = array_combine(range(10,100),range(10,100));			
			return 	$ageArray;
		}
	
	function ratingList(){
			$ratingArray = array_combine(range(1,5),range(1,5));			
			return 	$ratingArray;
		}
	#others#			
		
	function enc($str){
	$r=base64_encode(strrev(base64_encode($str)));
	return $r;
	}
	
	function dec($str){
	$r=base64_decode(strrev(base64_decode($str)));
	return $r;
	}
	
	function no_to_words($no) {
	
		

      $words = array('0'=> '' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fouteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Fourty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred &','1000' => 'Thousand','100000' => 'Lakh','10000000' => 'Crore');

      if($no == 0)

      return ' ';

      else {

      $novalue='';

      $highno=$no;

      $remainno=0;

      $value=100;

      $value1=1000;
 
      while($no>=100) {

      if(($value <= $no) &&($no < $value1)) {

      $novalue=$words["$value"];

      $highno = (int)($no/$value);

      $remainno = $no % $value;

      break;

      }

      $value= $value1;

      $value1 = $value * 100;

      }

      if(array_key_exists("$highno",$words))

      return $words["$highno"]." ".$novalue." ".no_to_words($remainno);

      else {

      $unit=$highno%10;

      $ten =(int)($highno/10)*10;

      return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".no_to_words($remainno);

      }
 
      }
 
      
	  
	}
	
	
	function monthArr1($m,$format='F'){
		$months = array();
	
		for ($i = 0; $i < 12; $i++) {
			$timestamp = mktime(0, 0, 0, date('n') - $i, 1);
			$months[date('m', $timestamp)] = date($format, $timestamp);
		}
		
		return $months[$m];
	}
	
	
	
	function showExpMonth($expMonth){	#201308#
		if($expMonth!=''){
			$mnth = substr($expMonth,4);
			$yr = substr($expMonth,0,4);
			
			
			return $this->monthArr1($mnth).' '.$yr;
			
		}
		else{
			return;
		}
	}					
		
function updateStockByProductId($productId){
		if($productId>0){
			
			
			$stockId = $this->getByFld('stock','productId',$productId,'stockId');
			
			$purchaseQty = $this->getSum('purchasedetails', 'quantity', " productId='$productId' ");
			
			$orderQty = $this->getSum('orderdetails', 'quantity', " productId='$productId' ");
			
			$returnQty = $this->getSum('orderdetails', 'returnQuantity', " productId='$productId'");
			
			$orderActualQty = $orderQty-$returnQty;
			
			$make = $this->getByFld('product','productId',$productId,'make');
			
			$model = $this->getByFld('product','productId',$productId,'model');
			
			$stock = $purchaseQty-$orderActualQty;
			
			$stock = (integer)$stock;
			
			$stockData['productId'] = $productId;
			$stockData['make'] = $make;
			$stockData['model'] = $model;
			
			$stockData['purchaseQuantity'] = $purchaseQty;
			$stockData['billQuantity'] = $orderQty;
			$stockData['returnQuantity'] = $returnQty;
			
			$stockData['quantity'] = $stock;
			
			$this->save('stock',$stockData,'stockId',$stockId);
		}
	}
	
	var $pSeoId='';
	
	function productSeoId_unique($seoId,$nSeoId,$productId){
		 static $i=1;   //global $jOSeoId;
		 if($productId>0)
            {
               $andId=" and productId!='$productId'";
            }
            $proQuery=" select count(*) cc from product where seoId='$nSeoId' $andId  ";
            $prors=mysql_query($proQuery);
            $pro=mysql_fetch_assoc($prors);
            if($pro['cc']>0)
            {
            $i++;
             
              $this->productSeoId_unique($seoId,$seoId.'-'.$i,$productId);
           
            }else
            {
             
            $this->pSeoId=$nSeoId;
            // return $seoId;
           
            }
	}
	
	function productSeoId($seoId,$productId=0){
		$replaceArr = array('/','\\',',','+','(',')','&','^','%','$','#','@','!','\'','"','`','~','?','<','>','--','---','---',' - ','  ',' ','-',' , ',' ,');
		$seoId = str_replace($replaceArr,'-',$seoId);$seoId = strtolower($seoId);
		$seoId = str_replace(array('--','---','----'),'-',$seoId);
		
		$this->productSeoId_unique($seoId,$seoId,$editId);		
	}	

#define functions End# 	


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
		return $thumb_filename;
}
$os= new os;
