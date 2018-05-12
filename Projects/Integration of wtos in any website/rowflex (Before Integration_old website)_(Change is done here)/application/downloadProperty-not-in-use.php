<?
session_start();
ob_start();
include('../includes/config.php');
include('coomon.php');
ob_end_clean();
?>
<? 

global $pageVar;
 

$propertyId=$_GET['propertyId'];
//$seoId= trim($pageVar['segment'][2]) ;

$proQuery=" select * from property where propertyId='$propertyId'  ";
$prors=$os->mq($proQuery);
$pro=$os->mfa($prors);

//$propertyId=$pro['propertyId'];
$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'   order by priority asc ,propertyImageId desc ");

$fileName=str_replace(array(' ',',',"'",'"','`'),'',$pro['title']).'.html';
//$filenamePath=$site['root'].'printFiles/abc.html';
header("Content-type: application/octet-stream");
header( "Content-disposition: filename=".$fileName);

$bigImg=$site['url'].$pro['print'];

$smallImg1=$site['url'].$pImage['0']['image'];
$smallImg2=$site['url'].$pImage['1']['image'];
$smallImg3=$site['url'].$pImage['2']['image'];
$smallImg4=$site['url'].$pImage['3']['image'];
$smallImg5=$site['url'].$pImage['4']['image'];
$smallImg6=$site['url'].$pImage['5']['image'];

$floorPlanImg=$site['url']. $pro['floorplan'];
$epcImg=$site['url']. $pro['EPC'];
 

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
 
<meta name="language" content="en-uk, english">
<meta name="DC.description" content="">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<title><?php echo $site['siteTitle'];?><?php echo $os->getSettings('siteTitle');?><?php echo $os->wtospage['heading'];?></title>
<meta name="keywords" content="<?php echo $site['keywords'];?> <?php echo $os->getSettings('metaKey');?> <?php echo $os->wtospage['metaTag'];?>   ">
<meta name="description" content="<?php echo $site['description'];?> <?php echo $os->getSettings('metaDescription');?> <?php echo $os->wtospage['metaDescription'];?> ">

<?php  
 #------------js ----------------------#
// $pagevar[myJs][]=$site['url'].'js/basic.function.js';
// $pagevar[myJs][]=$site['url'].'js/common.js';
 
 #------------css ----------------------#
 #$pagevar[myCss][]=$site['url'].'css/common.css';
 
	//echo   $os->addCss($pagevar[myCss]); 
//	echo  $os->addJs($pagevar[myJs]); 
?>


<? 
$m=1;
if($m==1){ ?>
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/global-wt.css" />
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/responsive-wt.css" />
<? }else{ ?>

<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/global.css" />
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/responsive.css" />


<? } ?>
 



<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/ie.css" />
<script src="<? echo $site['themePath']?>js/html5.js"></script>
<![endif]-->
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
 
</head>

<body>
<div style="margin:auto; text-align:center; margin-bottom:2px;">
 <a href="javascript:void(0)" onClick="printPage()" style="color:#FF0000; font-weight:bold; font-size:16px;" id="printPageButton">Print</a>
 <script>
 function printPage()
 {
    document.getElementById('printPageButton').style.display='none';
   window.print();
   document.getElementById('printPageButton').style.display='';
 
 }
 
 </script>
 </div>
<div style="width:1090px; margin:auto;">

 
  <div>
	<div style="background:#a6003e; padding:0px 17px 0px 17px; height:98px;">
		<div>
			<div style="width:182px; float:left;padding-top:2px;"><img src="<?php echo $site['themePath']?>images/b_logo.jpg" border="0" width="182" height="84" /></div>
			<div style="width:480px; float:right;">
				<div style="font-family: Myriad Pro; font-size:28px; color:#FFFFFF; text-align:right; padding-top:20px;">020 8834 7030</div>
				<div style="font-family: Myriad Pro; font-size:16px; color:#f1c2d3; text-align:right; padding-top:0px;">121 Fulham Palace Road, Hamersmith, London W6 8JA</div>
			</div>
			<div style="font-size:0px; line-height:0px; clear:both;"></div>
		</div>
	</div>
	<div style="position:absolute; width:460px; background:#ede6d1; margin-top:40px;">
	 	<div style="font-family: Myriad Pro; font-size:17px; font-weight:bold; color:#a5023e; padding:10px 5px 10px 10px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>
	</div>
	<div><img src="<?php  echo $bigImg;?>" border="0" width="1090" height="651"/></div>
	
	
  </div>
  

<? if($pro['type']!="Rent"){ ?>
 
<div style="padding-top:60px;">
	<div style="padding:0px 5px 0px 5px;">
	<div style="width:813px; float:left;">
		<div>
		<div style="width:543px; float:left;">
			<table width="100%" border="0">
			  <tr>
				<td align="left" valign="middle"><img src="<? echo $smallImg1; ?>" border="0" width="265" height="192"/></td>
				<td align="left" valign="middle">&nbsp;</td>
				<td align="left" valign="middle"><img src="<? echo $smallImg2; ?>" border="0" width="262" height="191" /></td>
			  </tr>
			  <tr>
				<td align="left" valign="middle"><img src="<? echo $smallImg3; ?>" border="0" width="265" height="187" /></td>
				<td align="left" valign="middle">&nbsp;</td>
				<td align="left" valign="middle"><img src="<? echo $smallImg4; ?>" border="0"  width="262" height="191" /></td>
			  </tr>
		  </table>

		</div>
	    <div style="width:202px; float:right;"><img src="<? echo $floorPlanImg; ?>" border="0" width="202" height="385"/></div>
		<div style="font-size:0px; line-height:0px; clear:both;"></div>
		</div>
		<div>
			<div style="font-family: Myriad Pro; font-size:18px; font-weight:normal; color:#515151; padding:10px 0px 0px 5px; line-height:18px;">
			 <?php echo stripslashes($pro['shortDescription'])?>	</div>
			<div>&nbsp;</div>
		</div>
	</div>
	<div style="width:228px; float:right;">
		<div style="border-left:#ececec solid 1px;">
			<div style="padding:0px 0px 0px 10px;">
				<div style="width:60px;">
					<table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle" style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu01.jpg" border="0" width="32" height="20" /></a></td>
								<td align="left" valign="middle"  style="font-family: Myriad Pro; font-size:16px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bed']?></td>
								<td align="left" valign="middle"  style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu02.jpg" border="0" /></a></td>
								<td align="left" valign="middle"   style="font-family: Myriad Pro; font-size:16px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bath']?></td>
								<td align="left" valign="middle" >&nbsp;</td>
							  </tr>
					  </table>
				</div>
				<div>
				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:justify; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:justify; font-weight:bold;"><?php echo $pro['leasehold']?> </span>  <?php if( $pro['leaseyears']!=''){?>   <?php echo $pro['leaseyears']?> Years <? }?> </div>
				<?php if( $pro['leasehold']=='Leasehold' || $pro['leasehold']=='Share of Freehold'  ){?> 
				
				<div style="padding-top:10px;">
				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:justify; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:justify; font-weight:bold;">Ground Rent</span> <?php echo $pro['groundrent']?> 
 </div>
                </div>
				<div style="padding-top:10px;">
				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:left; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:left; font-weight:bold;">Service Charge</span>  <?php echo $pro['servicecharge']?> 
 </div>
                </div>
				<? } ?>
				
				
				</div>
				<div style="padding-top:10px;">
					<div><img src="<? echo $epcImg; ?>" border="0" width="173" height="154" /></div>
				</div>
			</div>
			<div style="padding-top:190px;">
			<div style="background:#a5003e; height:40px;">
				
				<div style="padding:3px 20px 0px 30px;">
				<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:18px; color:#fff; font-weight:bold;">Price:</td>
    
    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:18px; color:#fff; font-weight:bold;">&pound; <?php echo number_format($pro['price']);?>  <?php echo $pro['priceUnit']?></td>
  </tr>
</table>
				</div>

		
			</div>
			<div style="height:50px;">&nbsp;</div>
			</div>
		</div>
	</div>
	<div style="font-size:0px; line-height:0px; clear:both;"></div>
	</div>
</div>
 
<!--FOOTER-->	
  
<div>
	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>	
	<div style="background:#f4efdc; height:35px;">
		<div style="width:804px; float:left;">
		<div style=" padding:5px 0px 0px 8px;">
			<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">P: </td>
    
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">E:info@heavenproperties.co.uk </td>
   
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">W: www.heavenproperties.co.uk</td>
  </tr>
</table>

		</div>
		</div>
		<div style="width:160px; float:right;">
			<div style="padding-top:3px;"><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></div>
		</div>
		<div style="font-size:0px; line-height:0px; clear:both;"></div>
	</div>	
	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>
	<div style="font-family: Myriad Pro; font-size:13px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">
			These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are	</div>
	</div>

<? }  else{ ?>
<!--Part002-->
 
<div style="padding-top:90px;">
	<div style="padding:0px 5px 0px 5px;">
	<div style="width:839px; float:left;">
		<div><table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"><img src="<? echo $smallImg1; ?>" border="0" width="267" height="190" /></td>
    <td align="left" valign="middle"><img src="<? echo $smallImg2; ?>" border="0" width="262" height="190" /></td>
    <td align="left" valign="middle"><img src="<? echo $smallImg3; ?>" border="0" width="262" height="190" /></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><img src="<? echo $smallImg4; ?>" border="0" width="267" height="185" /></td>
    <td align="left" valign="middle"><img src="<? echo $smallImg5; ?>" border="0" width="261" height="185" /></td>
    <td align="left" valign="middle"><img src="<? echo $smallImg6; ?>" border="0" width="261" height="185" /></td>
  </tr>
</table>
</div>
		<div>
			<div style="font-family: Myriad Pro; font-size:18px; font-weight:normal; color:#515151; text-align:justify; padding:10px 5px 0px 5px; line-height:18px;">
			<?php echo stripslashes($pro['shortDescription'])?>		</div>
			<div>&nbsp;</div>
		</div>
	</div>
	<div style="width:228px; float:right;">
		<div style="border-left:#ececec solid 1px;">
			<div style="padding:0px 0px 0px 10px;">
				<div style="width:60px;">
					<table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle" style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu01.jpg" border="0" width="32" height="20" /></a></td>
								<td align="left" valign="middle"  style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bed']?></td>
								<td align="left" valign="middle"  style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['themePath']?>images/cu02.jpg" border="0" width="32" height="20" /></a></td>
								<td align="left" valign="middle"   style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $pro['bath']?></td>
								<td align="left" valign="middle" >&nbsp;</td>
							  </tr>
					  </table>
				</div>
				<div>
				
				<div style="padding-top:10px;">
				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:justify; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:justify; font-weight:bold;">Council Tax</span> <?php echo $pro['counciltax']?>   </div>
                </div>
				<div style="padding-top:10px;">
				<div  style="font-family: Myriad Pro; font-size:14px; color:#585757; text-align:left; font-weight:bold;"><span   style="font-family: Myriad Pro; font-size:17px; color:#383838; text-align:left; font-weight:bold;">Underground</span> <?php echo $pro['underground']?><br />

 </div>
                </div>
				</div>
				<div style="padding-top:20px;">
					<div><img src="<? echo $epcImg; ?>" border="0" width="173" height="154" /></div>
				</div>
			</div>
			<div style="padding-top:205px;">
			<div style="background:#a5003e; height:40px;">
				
				<div style="padding:3px 20px 0px 30px;">
				<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:18px; color:#f0e8d6; font-weight:bold; ">Price:</td>
    
    <td align="left" valign="middle" style="font-family:'Myriad Pro'; font-size:18px; color:#f0e8d6; font-weight:bold; ">&pound; <?php echo number_format($pro['price']);?>  <?php echo $pro['priceUnit']?></td>
  </tr>
</table>
				</div>

		
			</div>
			<div style="height:50px;">&nbsp;</div>
			</div>
		</div>
	</div>
	<div style="font-size:0px; line-height:0px; clear:both;"></div>
	</div>
</div>
 
	
<!--FOOTER-->	
  
	
<div>
	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>	
	<div style="background:#f4efdc; height:35px;">
		<div style="width:804px; float:left;">
		<div style=" padding:5px 0px 0px 8px;">
			<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:bold; color:#c3456d;">W: www.heavenproperties.co.uk</td>
  </tr>
</table>

		</div>
		</div>
		<div style="width:160px; float:right;">
			<div style="padding-top:3px;"><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></div>
		</div>
		<div style="font-size:0px; line-height:0px; clear:both;"></div>
	</div>	
	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>
	<div style="font-family: Myriad Pro; font-size:13px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">
			These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are	</div>
	</div>
		

<? } ?>



</div>
	
	
 </body></html>
	<? exit; ?>