<?php
session_start();
global $pageVar,$os;
$productId = $pageVar['segment'][2];

$validProduct = '';
if($productId>0){$productId = mysql_real_escape_string($productId);$validProduct = $os->getMe("SELECT productId FROM product WHERE productId=$productId AND active='Active'");}

$requestId=$productId;

if($requestId && is_array($validProduct)) {	
		$la_cartArray = array("id"=>$requestId,"quantity"=>'1');
		$flag=0;		
		if(is_array($_SESSION['imposter-cart']) && count($_SESSION['imposter-cart'])>0){		
			foreach($_SESSION['imposter-cart'] as $key=>$val) {			
				if($_SESSION['imposter-cart'][$key]['id']==$requestId) {
					$keyInitial=$key;
					$flag = 1;
				}
			}		
		}
			
		if($flag == 0) {	              
			$_SESSION['imposter-cart'][] = $la_cartArray;
		}
		else {		     
			$_SESSION['imposter-cart'][$keyInitial]['quantity']++ ;	
		}	
		?>
		 <script>window.location='<?php echo  $site['url'] ?>shopping-cart';</script>
		<?php
	}
	
	if($_GET['quantity']>0) {
		$pid = $_GET['pid'];
		$_SESSION['imposter-cart'][$pid]['quantity'] = $_GET['quantity'];
	}
	
	if($_GET['delid']!='') {
		unset($_SESSION['imposter-cart'][$_GET['delid']]);	
		$_SESSION['imposter-cart']=array_values($_SESSION['imposter-cart']);
		?>
		 <script> window.location='<?php echo $site['url'];?>shopping-cart';</script>
		<?
	}
?>
<h1>Shopping Cart</h1>
<?php 
if(is_array($_SESSION['imposter-cart']) && count($_SESSION['imposter-cart'])>0){
	$grandTotal = 0;$total = 0;	$totQty=0;$pCats='';
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tbl">
<tr class="tr_bg">
<td width="8%;">&nbsp;</td>
<td width="42%;"><b>Item</b></td>
<td width="10%;"><b>Price</b></td>
<td width="20%;"><b>Quantity</b></td>
<td width="10%;"><b>Total</b></td>
<td width="10%">&nbsp;</td>
</tr>
<?php 
foreach($_SESSION['imposter-cart'] as $key => $value) {
	$productId=$_SESSION['imposter-cart'][$key]['id'];
	$product = $os->getMe("SELECT productId,name,code,seoId,ourPrice,status FROM product WHERE productId=$productId");
	$product = $product[0];
	$pCats.=$productId.',';
	
	$noImg = $site['url'].'wtos-images/product/thumb_59x50/no_image_product.png';
	$img='';$imgTitle='';$imgName='';
	$imgA = $os->getMe("SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND featured='Yes' AND active=1 LIMIT 1");
	if(is_array($imgA) && count($imgA)>0){$imgA=$imgA[0];$imgName = str_replace('wtos-images/product/','',$imgA['image']);$imgTitle=$imgA['title'];}
	if($imgName!='' && file_exists($site['imgPath'].'wtos-images/product/thumb_59x50/'.$imgName)){
		$img=$site['url'].'wtos-images/product/thumb_59x50/'.$imgName;
	}
	
	$imgTitle=($imgTitle!='')?$imgTitle:$product['name'];
	$img=($img!='')?$img:$noImg;
	
	$total = $product['ourPrice']*$_SESSION['imposter-cart'][$key]['quantity'];
	$totQty+=$_SESSION['imposter-cart'][$key]['quantity'];
	$grandTotal+=$total;
?>
<tr>
<td> <img src="<?php echo $img;?>" title="<?php echo $imgTitle;?>" alt="Img" border="0" width="35" height="50" /></td>
<td><a class="scpname"><?php echo $product['name'];?></a></td>
<td>Rs.<?php echo $product['ourPrice'];?></td>
<td> <input class="tx" size="4" id="" name="quantity" title="change the value for update quantity" maxlength="2" onChange="updateQuantity(this.value,'<?php echo $key ;?>')" value="<?php echo $_SESSION['imposter-cart'][$key]['quantity'];?>" type="text"> </td>
<td>Rs.<?php echo number_format($total,2);?></td>
<td><a href="javascript:void(0);" onClick="delP('<?php echo $key ;?>')" class="rmv remove">Remove</a></td>
</tr>
<?php 
}

if($pCats!=''){$pCats=substr($pCats,0,-1);}
?>
<tr>

<td colspan="3" height="30">&nbsp;</td>
<td><!--<a href="#" class="remove">Update quantities</a>--><b>Grand Total</b></td>
<td>Rs.<?php echo number_format($grandTotal,2);?></td>
<td>&nbsp;</td>
</tr>
</table>
<br />	
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
    	<td width="78%" valign="top">
        	<?php				
				$couponCode='';$couponMsg='';
            	if(isset($_SESSION['Imposter_Coupon'])){
					$couponCode=$_SESSION['Imposter_Coupon']['code'];
					$couponMsg='';
				}
			?>
            <div style="font-family:Arial, Helvetica, sans-serif; font-size:14px;">            
           	 Use coupon code:  <input name="" id="cCode" value="<?php echo $couponCode;?>" type="text" class="code" placeholder="" /> &nbsp;<input onclick="checkCoupon('<?php echo $totQty;?>','<?php echo $pCats;?>',0)" type="button" value="use" />
             <span id="couMsg" style="font-size:12px;"><?php echo $couponMsg;?></span>
            </div>
        </td>
            
        <td width="50%">
            <div align="right">
            <?php 
				$checkoutLink=$site['url'].'login/ref-url=shopping-cart';
				if($os->isLogin()){$checkoutLink=$site['url'].'order-summary';}
			?>          
            <a href="<?php echo $checkoutLink;?>" class="remove">Proceed to Checkout</a>
            </div>
        </td>
    </tr>
</table>	

<script type="text/javascript">
	function pageRefresh(data){		
		window.location="<?php echo $site['url'];?>shopping-cart";
	}
	
	function updateQuantity(str,pid){		
		var url = '<?php echo $site['url'];?>application/shopping-cart.php?quantity='+str+'&pid='+pid;
		os.setAjaxFunc('pageRefresh',url);
	}
	
	function delP(k){	
		
		var p=confirm('Are you sure you want to delete?');		
			if(p){				
				var url = '<?php echo $site['url'];?>application/shopping-cart.php?delid='+k;
				os.setAjaxFunc('pageRefresh',url);				
			}
			
	}
	if(os.getVal('cCode')!=''){
		checkCoupon('<?php echo $totQty;?>','<?php echo $pCats;?>',0);		
	}
</script>
<?php }else{?>
<div class="clr"></div>                
<div class="line"></div>
<div class="empty_cart">
    <h4>Shopping cart is empty.please add atleast 1 product<br />
    <span><a href="<?php echo $site['url'];?>">&#8592 Return To Shop</a></span>
    </h4>
</div>
<?php }?>