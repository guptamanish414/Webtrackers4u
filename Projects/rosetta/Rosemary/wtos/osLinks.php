<style>
.linkClass{
margin:2px 5px 2px 20px;

}
.linkCss{ 
text-decoration:none; color:#444444; margin:1px 5px 1px 2px; border:1px solid #004262; background:#F3F3F3;
border-top:none;
border-left:none;
height:15px; width:130px; padding:1px 3px 5px 3px; 
/*-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;*/
display:block;
font-weight:bold;
font-family:Calibri; font-size:15px;

}
.linkCss:hover{ text-decoration:none; color:#FFFFFF; margin:1px 5px 1px 2px; border:1px solid #002435; background:#9D4F00;
border-top:none;
border-left:none;
height:15px; width:130px;  padding:1px 3px 5px 3px; 
/*-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;*/
display:block;
font-weight:bold;
font-family:Calibri; font-size:15px;}
 
.linkCssSelected{text-decoration:none; color:#FFFFFF; margin:1px 5px 1px 2px; border:1px solid #002435; background:#9D4F00;
border-top:none;
border-left:none;
height:15px; width:130px;   padding:1px 3px 5px 3px; 
/*-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;*/
display:block;
font-weight:bold;
font-family:Calibri; font-size:15px;
}

.ca{ height:1px; clear:both; width:50px;}

.LinkSeperator{  height:18px; color:#0000FF;  text-align:left; padding:2px; font-weight:bold;font-family:Calibri; font-size:18px; cursor:default; margin-bottom:6px;}/*3B3B3B*//*418400*/
</style>
<? 
function sTab($pname ){
global $os;						
$class='linkCss';
if($pname.'.php'==$os->currentPage){
$class='linkCssSelected';							 
}
echo "class='$class'";
}
?>
<div style="background-color:#FFFFBF;">

<div  class="LinkSeperator">Orders</div>
<a <? sTab('orders') ?>  href="<? $seoLink->l('orders',true); ?>" >Order List</a><div class="ca">&nbsp;</div>
<div  class="LinkSeperator">Products </div>
<a <? sTab('product') ?>  href="<? $seoLink->l('product',true); ?>" >Product List</a><div class="ca">&nbsp;</div>
 <a <? sTab('productcategory') ?>  href="<? $seoLink->l('productcategory',true); ?>" >Product Category</a><div class="ca">&nbsp;</div>
 <a <? sTab('productfeature') ?>  href="<? $seoLink->l('productfeature',true); ?>" >Product Feature</a><div class="ca">&nbsp;</div>
 <a <? sTab('customer') ?>  href="<? $seoLink->l('customer',true); ?>" >Customer List</a><div class="ca">&nbsp;</div>
<!-- <a <? sTab('paymentmethod') ?>  href="<? $seoLink->l('paymentmethod',true); ?>" >Payment Methods</a><div class="ca">&nbsp;</div>-->
<!-- <a <? sTab('coupon') ?>  href="<? $seoLink->l('coupon',true); ?>" >Coupon List</a><div class="ca">&nbsp;</div> -->

  <a <? sTab('banner') ?>  href="<? $seoLink->l('banner',true); ?>" >Banner List</a><div class="ca">&nbsp;</div> 
  <a <? sTab('homepagebanner') ?>  href="<? $seoLink->l('homepagebanner',true); ?>" >Home Banner</a><div class="ca">&nbsp;</div>
  <a <? sTab('gallerycatagory') ?>  href="<? $seoLink->l('gallerycatagory',true); ?>" >Gallery catagory</a><div class="ca">&nbsp;</div>
  <a <? sTab('photoGallery') ?>  href="<? $seoLink->l('photoGallery',true); ?>" >Photo Gallery</a><div class="ca">&nbsp;</div>
  <a <? sTab('events') ?>  href="<? $seoLink->l('events',true); ?>" >Event</a><div class="ca">&nbsp;</div>
  <a <? sTab('wtbox') ?>  href="<? $seoLink->l('wtbox',true); ?>" >Box</a><div class="ca">&nbsp;</div>
  
<!-- <a <? sTab('productSubmit') ?>  href="<? $seoLink->l('productSubmit',true); ?>" >Product Submit</a><div class="ca">&nbsp;</div>-->
 
<?php if($os->userDetails['adminType'] == 'Super Admin') {?> 
    <div  class="LinkSeperator">Administration</div>
        <a <? sTab('pageContent') ?>  href="<? $seoLink->l('pageContent',true); ?>" >Website Pages</a><div class="ca">&nbsp;</div>
        <a <? sTab('admin') ?> href="<? $seoLink->l('admin',true); ?>" >Admin</a> <div class="ca">&nbsp;</div> 
        <a <? sTab('changepwd') ?> href="<? $seoLink->l('changepwd',true); ?>" >Change Password </a>  <div class="ca">&nbsp;</div>
        <a <? sTab('settings') ?> href="<? $seoLink->l('settings',true); ?>" > Settings</a> <div class="ca">&nbsp;</div>
        
						
<?php } ?>
</div>