<? session_start();
ob_start();
include('../includes/config.php');
include('coomon.php');
ob_end_clean();




if(isset($_GET['actionPage']))
{
  
	$wtAjax['ajaxRowId']=0;
	if(isset($_GET['ajaxRowId']))
	{
	 	$wtAjax['ajaxRowId']=$_GET['ajaxRowId'];
	
	}
   include($_GET['actionPage'].'.php');
}

if($_GET['changeStatus']=='change')
{
  
	
	$newStatus=varG('newStatus');
	$table=varG('table');
	$satusfld=varG('satusfld');
	$idFld=varG('idFld');
	$idVal=varG('idVal');
    $data[$satusfld]=$newStatus;
	$os->saveR($table,$data,$idFld,$idVal);
	echo 'Status changed successfully';
	
}

if($_GET['changeLanguage']=='OK' &&  $_GET['langId']>0)
{

 
 
 	if($os->setLang($_GET['langId'])){ echo 1;exit();}
}

if($_GET['chkUnamePass']=='yes'){
	$uName = base64_decode($_GET['uName']);
	$pass = base64_decode($_GET['pass']);	
	$valid = $os->getMe("SELECT COUNT(*) as valid FROM customer WHERE status='Active' AND email='$uName' AND password='$pass'");
	$valid = $valid[0]['valid'];
	echo $valid.'**'.'Username and password are incorrect';	
}
if($_GET['chkUname']=='yes'){
	$uName = $_GET['uName'];	
	$valid = $os->getMe("SELECT COUNT(*) as valid FROM customer WHERE email='$uName'");
	$exists = $valid[0]['valid'];
	echo $exists;	
}
if($_GET['addToWishList']=='yes' && $_GET['productId']>0){
	$productId = $_GET['productId'];	
	$validP = $os->getMe("SELECT COUNT(*) as validP FROM product WHERE productId=$productId");
	$existsP = $validP[0]['validP'];
	if($existsP>0){
	if($os->isLogin()){
		$cId = $os->userDetails['customerId'];
		if(!$os->wListExists($productId)){
			$addedDate=$os->now();
			if($os->mq("INSERT INTO wishlist SET productId=$productId,customerId=$cId,addedDate='$addedDate'")){
				echo '4';
			}else{echo '3';}
		}else{echo '2';}
	}
	else{echo '1';}
	}else{echo '0';}
}
if($_GET['checkCoupon']=='ok' && $_GET['pCount']>0  && $_GET['pIds']!='' && $_GET['cCode']!=''){
	$pIds = $_GET['pIds'];$pCount = $_GET['pCount'];$cCode = $_GET['cCode'];$cDate=date('Y-m-d').' 00:00:00';
	$couponA = $os->getMe("SELECT * FROM coupon WHERE code='$cCode' AND validTo>='$cDate' AND status='Active'");
	$msg='0';
	if(is_array($couponA) && count($couponA)>0){
		
		$couponCatId=$couponA[0]['productcategoryId'];
		$couponPCount=$couponA[0]['productCount'];
		
		if($couponPCount>0 && $couponPCount!=$pCount){$msg='3';}
		
		if($couponCatId>0){
			$pIdsA=explode(',',$pIds);
			$sameCat=0;
			foreach($pIdsA as $pId){
				$catA=$os->getMe("SELECT productcategoryId FROM productcategorymap WHERE productId=$pId");
				if(is_array($catA) && count($catA)>0){$catId=$catA[0]['productcategoryId'];if($catId!=$couponCatId){$sameCat=1;}}
			}
			
			if($sameCat==1){$msg='2';}
		}
		
		
	}else{$msg='1';}	
	if($msg=='0'){
		$_SESSION['Imposter_Coupon']['discount']=$couponA[0]['discount'];
		$_SESSION['Imposter_Coupon']['couponType']=$couponA[0]['couponType'];
		$_SESSION['Imposter_Coupon']['code']=$couponA[0]['code'];
		$_SESSION['Imposter_Coupon']['details']=$couponA[0]['details'];
		$_SESSION['Imposter_Coupon']['validFrom']=$couponA[0]['validFrom'];
		$_SESSION['Imposter_Coupon']['validTo']=$couponA[0]['validTo'];
	}
	else{unset($_SESSION['Imposter_Coupon']);}	
	echo $msg;
}

if($_GET['checkCouponTop']=='ok' && $_GET['cCode']!=''){
	$cDate=date('Y-m-d').' 00:00:00';$cCode = $_GET['cCode'];
	$couponA = $os->getMe("SELECT * FROM coupon WHERE code='$cCode' AND validTo>='$cDate' AND status='Active'");
	if(is_array($couponA) && count($couponA)>0){$_SESSION['Imposter_Coupon']['code']=$couponA[0]['code'];echo 1;}else{unset($_SESSION['Imposter_Coupon']);}
}

if($_GET['eventShow']=='OK' )
{
	?>
    <?
		$allEvents=$os->getMe("SELECT * FROM events WHERE eventId>0 LIMIT 3");
		//_d($allEvents);
		if($allEvents){
	 ?>
<div class="row">
      <h1>Events</h1>
       <div id="event" class="section section_1 event">
    	<div class="container">
                <? foreach($allEvents as $event){
					
					//_d($event);
				?>
                
                <div class="col-md-4">
                	<div class="block_contain">
                	<img src="<? echo $site['url']."/".$event['image'];?>"/>
                    <h3><? echo $event['title'];?></h3>
                    <p><? echo substr($event['details'],0,30);?></p>
                    <a href="<? echo $site['url']?>events" class="button buy_now">Read More</a>
                    </div>
                </div>
                <? }?>
            </div>
 		</div>
    </div>

 
<? 	} 
	 exit();
}
?>