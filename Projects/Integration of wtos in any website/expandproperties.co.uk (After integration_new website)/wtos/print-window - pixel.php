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

 



$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId' and printOrder>0   order by printOrder asc ,propertyImageId desc");

$smallImg1=$site['urlFront'].$pImage['0']['image'];

$smallImg2=$site['urlFront'].$pImage['1']['image'];

$smallImg3=$site['urlFront'].$pImage['2']['image'];

$smallImg4=$site['urlFront'].$pImage['3']['image'];

$smallImg5=$site['urlFront'].$pImage['4']['image'];

$smallImg6=$site['urlFront'].$pImage['5']['image'];





$type=($pro['type']=='Rent')?'To Let':'For Sale';

$emailShow=($pro['type']=='Rent')?'info@heavenproperties.co.uk':'info@heavenproperties.co.uk';

  

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

<!--<div style="margin:auto; text-align:center; margin-bottom:2px;">

 <a href="javascript:void(0)" onclick="printPage()" style="color:#FF0000; font-weight:bold; font-size:16px;" id="printPageButton">Print</a>

 <script>

 function printPage()

 {

    document.getElementById('printPageButton').style.display='none';

   window.print();

   document.getElementById('printPageButton').style.display='';

 

 }

 

 </script>

 </div>-->





<div style="width:800px; margin:auto; ">

 <div>

	<div style=" background-color:#a20a42; padding:0px 17px 0px 17px; height:90px;">

		<div>

			<div style="width:125px; float:left;"><div style="padding-top:5px;"><img src="<?php echo $site['url']?>wtos-theme/images/billogo.png" border="0" /></div></div>

			<div style="width:195px; float:right;">

				<div style="font-family: Myriad Pro; font-size:22px; color:#FFFFFF; text-align:right; padding-top:30px;">020-8696-6904</div>

			</div>

			<div style="font-size:0px; line-height:0px; clear:both;"></div>

		</div>

	</div>

	<div style="background:#f4efdc;">

		<div style="font-family: Myriad Pro; font-size:22px; color:#a20a42; font-weight:bold; text-align:center; padding:0px 0px 0px 0px;"><? echo $type ?></div>

	</div>

	<div >

	

	<?  if($pro['qrCode']!=''){ ?>

	<div style="position:absolute;  height:100px; width:100px; top:510px; right:0px; "> <img src="<?php echo $qrImg?>" border="0"   width="100" height="100"  /></div>

	<? } ?>

	

	   <img src="<?php echo $bigImg?>" border="0" width="800" height="500" /></div>

	<div style="background:#a20a42; height:5px;">&nbsp;</div>

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

		<div style="width:600px; float:left; height:49px; background:#a20a42;">

			<div style="font-family: Myriad Pro; font-size:22px; font-weight:bold; color:#FFFFFF; padding:12px 15px 15px 20px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>

		</div>	

		<div style="width:200px; float:left; height:49px; background:#f1ecda;">

			<div style=" padding:10px 10px 10px 10px;">

			<div  style="font-family: Myriad Pro; font-size:22px; font-weight:bold; color:#a20a42; text-align:center;">

				

				<table width="100%" border="0" >

  <tr>

    <td align="left" valign="middle">Price:</td>

    <td align="left" valign="middle"><!--<img src="<?php echo $site['url']?>wtos-theme/images/rupia.jpg" border="0" />-->&pound; </td>

    <td align="left" valign="middle" ><?php echo number_format($pro['price'])?>  <?php echo $pro['priceUnit']?> </td>

  </tr>

</table>



			</div>

			</div>

		</div>	

		<div style="font-size:0px; line-height:0px; clear:both;"></div>	

	</div>	

	<div>

		<div style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#000; text-align:justify; padding:4px 18px 8px 18px; height:104px; overflow:hidden;

		">

		 

		<?php if($pro['printStyle']=='textareaStyle'){ echo stripslashes($pro['shortDescription']) ;}?>

		<?php if($pro['printStyle']=='bulletStyle'){ ?>

		<style>

		.bulletUl{margin:0px 0px 0px 18px; padding:0px; font-size:18px; font-weight:bold; list-style:disc; color:#a20a42; }

		.bulletUl li{margin:0px; padding:0px;}

		</style>

		<ul class="bulletUl">

		<li><? echo stripslashes($pro['bulletText1']) ; ?></li>

		<li><? echo stripslashes($pro['bulletText2']) ; ?></li>

		<li><? echo stripslashes($pro['bulletText3']) ; ?></li>

		<li><? echo stripslashes($pro['bulletText4']) ; ?></li>

	    <li><? echo stripslashes($pro['bulletText5']) ; ?></li>

		 

		</ul>

		

		

		

		<? }?>

		

		

		

		

		</div>

	</div>

</div>

	<div>

	<div style="background:#e3e3e5; height:2px;">&nbsp;</div>	

	<div style="background:#f4efdc; height:30px;">

		<div style=" margin:auto; font-family:Myriad Pro; font-size:12px; font-weight:bold; color:#a20a42; padding:5px 5px 0px 10px;">

			<table width="100%" border="0">

  <tr>

    <td align="left" valign="middle">P: <?  echo $pageContacts['tel']; ?></td>

    <td align="left" valign="middle">&nbsp;</td>

    <td align="left" valign="middle">

	 

	E: <? echo $emailShow ?></td>

    <td align="left" valign="middle">&nbsp;</td>

    <td align="left" valign="middle">W: <?  echo $pageContacts['website']; ?></td>

  </tr>

</table>



		</div>

	</div>	

	<div style="background:#a20a42; height:5px;">&nbsp;</div>

	</div>

</div>

</body>

</html>

