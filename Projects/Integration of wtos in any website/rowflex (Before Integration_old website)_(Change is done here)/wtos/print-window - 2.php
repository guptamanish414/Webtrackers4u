<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
 $propertyId=$_GET['propertyId'];
//$seoId= trim($pageVar['segment'][2]) ;

$proQuery=" select * from property where propertyId='$propertyId'  ";
$prors=$os->mq($proQuery);
$pro=$os->mfa($prors);
$bigImg=$site['urlFront'].$pro['print'];
$qrImg=$site['urlFront'].$pro['qrCode'];
 

$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'   order by priority asc ");
$smallImg1=$site['urlFront'].$pImage['0']['image'];
$smallImg2=$site['urlFront'].$pImage['1']['image'];
$smallImg3=$site['urlFront'].$pImage['2']['image'];
$smallImg4=$site['urlFront'].$pImage['3']['image'];
$smallImg5=$site['urlFront'].$pImage['4']['image'];
$smallImg6=$site['urlFront'].$pImage['5']['image'];


$type=($pro['type']=='Rent')?'To Let':'For Sale';
$emailShow=($pro['type']=='Rent')?'enquiries@broadwayandwest.co.uk':'sales@brodwayandwest.co.uk';
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>B&W PRINT WINDOW</title>
<link rel="stylesheet" type="text/css" href="<? echo $site['urlFront']?>wtos-theme/css/global-wt.css" />
<link rel="stylesheet" type="text/css" href="<? echo $site['urlFront']?>wtos-theme/css/responsive-wt.css" />
</head>

<body> 
<div style="margin:auto; text-align:center; margin-bottom:2px;">
 <a href="javascript:void(0)" onclick="printPage()" style="color:#FF0000; font-weight:bold; font-size:16px;" id="printPageButton">Print</a>
 <script>
 function printPage()
 {
    document.getElementById('printPageButton').style.display='none';
   window.print();
   document.getElementById('printPageButton').style.display='';
 
 }
 
 </script>
 </div>


<div style="width:800px; margin:auto;">
 <div>
	<div style=" background-color:#a6003e; padding:0px 17px 0px 17px; height:90px;">
		<div>
			<div style="width:125px; float:left;"><div style="padding-top:5px;"><img src="<?php echo $site['url']?>wtos-theme/images/b_logo.jpg" border="0" /></div></div>
			<div style="width:195px; float:right;">
				<div style="font-family: Myriad Pro; font-size:22px; color:#FFFFFF; text-align:right; padding-top:30px;">020 8834 7030</div>
			</div>
			<div style="font-size:0px; line-height:0px; clear:both;"></div>
		</div>
	</div>
	<div style="background:#f4efdc;">
		<div style="font-family: Myriad Pro; font-size:22px; color:#a5013e; font-weight:bold; text-align:center; padding:0px 0px 0px 0px;"><? echo $type ?></div>
	</div>
	<div >
	
	<?  if($pro['qrCode']!=''){ ?>
	<div style="position:absolute;  height:100px; width:100px; top:537px; left:800px; "> <img src="<?php echo $qrImg?>" border="0"   width="100" height="100"  /></div>
	<? } ?>
	
	   <img src="<?php echo $bigImg?>" border="0" width="800" height="500" /></div>
	<div style="background:#a3013d; height:5px;">&nbsp;</div>
	<div>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="middle"><img src="<?php echo $smallImg1?>" border="0"  width="267" height="200"  /></td>
    <td align="left" valign="middle"><img src="<?php echo $smallImg2?>" border="0"  width="267" height="200"  /></td>
    <td align="left" valign="middle"><img src="<?php echo $smallImg3?>" border="0"   width="267s" height="200"  /></td>
  </tr>
</table>

	</div>
	</div>
<div>	
	<div>
		<div style="width:600px; float:left; height:49px; background:#a3003b;">
			<div style="font-family: Myriad Pro; font-size:20px; font-weight:normal; color:#FFFFFF; padding:12px 15px 15px 20px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>
		</div>	
		<div style="width:200px; float:left; height:49px; background:#f1ecda;">
			<div style=" padding:12px 10px 15px 10px;">
			<div  style="font-family: Myriad Pro; font-size:16px; font-weight:bold; color:#a4003c; text-align:center;">
				
				<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle">Price:</td>
    <td align="left" valign="middle"><!--<img src="<?php echo $site['url']?>wtos-theme/images/rupia.jpg" border="0" />-->&pound; </td>
    <td align="left" valign="middle"><?php echo number_format($pro['price'])?>  <?php echo $pro['priceUnit']?> </td>
  </tr>
</table>

			</div>
			</div>
		</div>	
		<div style="font-size:0px; line-height:0px; clear:both;"></div>	
	</div>	
	<div>
		<div style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#000; text-align:justify; padding:32px 18px 32px 18px;"><?php echo stripslashes($pro['shortDescription'])?></div>
	</div>
</div>
	<div>
	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>	
	<div style="background:#f4efdc; height:30px;">
		<div style=" margin:auto; font-family:Myriad Pro; font-size:12px; font-weight:bold; color:#a4003c; padding:5px 5px 0px 10px;">
			<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle">P: 020 8834 7030</td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">
	 
	E: <? echo $emailShow ?></td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">W: www.broadwayandwest.co.uk</td>
  </tr>
</table>

		</div>
	</div>	
	<div style="background:#a6023f; height:5px;">&nbsp;</div>
	</div>
</div>
</body>
</html>
