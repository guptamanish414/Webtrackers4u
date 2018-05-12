<? session_start();

ob_start();

include('includes/config.php');

include('coomon.php');

ob_end_clean();



$pageContacts['tel']='0208 472 5579';

$pageContacts['email']='info@rowflex.co.uk';

$pageContacts['website']='www.rowflex.co.uk';

 $propertyId=$_GET['propertyId'];

//$seoId= trim($pageVar['segment'][2]) ;



$proQuery=" select * from property where propertyId='$propertyId'  ";

$prors=$os->mq($proQuery);

$pro=$os->mfa($prors);

 

$bigImg=$site['urlFront'].$pro['printImg'];

$qrImg=$site['urlFront'].$pro['qrCode'];

 



$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId' and printOrder>0   order by printOrder asc ,propertyImageId desc");

$smallImg1=$site['urlFront'].$pImage['0']['image'];

$smallImg2=$site['urlFront'].$pImage['1']['image'];

$smallImg3=$site['urlFront'].$pImage['2']['image'];

$smallImg4=$site['urlFront'].$pImage['3']['image'];

$smallImg5=$site['urlFront'].$pImage['4']['image'];

$smallImg6=$site['urlFront'].$pImage['5']['image'];





$type=($pro['type']=='Rent')?'To Let':'For Sale';

$emailShow=($pro['type']=='Rent')?$pageContacts['email']:$pageContacts['email'];

 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>ROWFLEX PRINT WINDOW</title>

<link rel="stylesheet" type="text/css" href="<? echo $site['urlFront']?>wtos-theme/css/global-wt.css" />

<link rel="stylesheet" type="text/css" href="<? echo $site['urlFront']?>wtos-theme/css/responsive-wt.css" />



<style type="text/css">
	body{ margin: 0; padding: 0; }
	
	.print_main{width:800px; height: 1040px; background: url(../wtos/image/rowflex_Print.png); background-repeat: no-repeat; background-size: 100%; margin: 0px auto;
	font-family: Arial, Helvetica, sans-serif;   }
	.print_top{width:800px; height: 400px;   }
	.small_image{ width:; height: 130px; }
	.bulletUl{margin:15px 0px 0px 18px; padding:0px; font-size:13px;  list-style:disc; color:#c41d22; }
	.bulletUl li{margin:5px 0; padding:0px;}

</style>


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
<div class="print_main" >

<div style="width:800px; margin-top:10px; text-align:right;" id="printBtn"><input type="button" onclick="printPage()" value="Print" />

&nbsp;<input type="button" value="Email" onclick="sentToMail()" style="display:none;" />

</div>

<div style="padding-top: 120px; ">


 <div >

	<div style=" background-color:#ffffff; padding:5px 17px 0px 17px; height:90px; color:#333333 ; display: none;   ">

		<div >

			<div style="width:125px; float:left; padding-top:5px;"><div style="padding-top:5px;"><img width="100%" src="<?php echo $site['url']?>image/billogo.png" border="0" /></div></div>

			<div style="width:195px; float:right; margin-right:10px;">

				<div style="font-family: Myriad Pro; font-size:22px; ; text-align:right; padding-top:30px;"><?  echo $pageContacts['tel']; ?></div>

			</div>

			<div style="font-size:0px; line-height:0px; clear:both;"> </div>

		</div>

	</div>

	<div style="background:#f4efdc; ">

		<div style="font-family: Myriad Pro; font-size:20px; color:#c41d22; font-weight:bold; text-align:center; padding:0px 0px 0px 0px;"><? echo $type ?></div>

	</div>

	<div  style="position:  relative;" >

	

	<?  if($pro['qrCode']!=''){ ?>

	<div style="position:absolute;   height:100px; width:100px; top:281px; right:10px; "> <img style="height:100px; width:100px; " src="<?php  echo $qrImg?>"/></div>

	<? } ?>

	

	   <img src="<?php echo $bigImg?>" class="print_top"   />

	   </div>

	<!-- <div style="background:#c41d22; height:5px;">&nbsp;</div> -->

	<div>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" margin-top: 2px " >

  <tr>

    <td align="center" valign="middle" style="padding-left:5px;"> <? if($pImage['0']['image']!=''){ ?><img src="<?php echo $smallImg1?>" class="small_image"   /><? } ?></td>

    <td align="center" valign="middle"><? if($pImage['1']['image']!=''){ ?><img src="<?php echo $smallImg2?>" class="small_image"/><? } ?></td>

    <td align="center" valign="middle"><? if($pImage['2']['image']!=''){ ?><img src="<?php echo $smallImg3?>" class="small_image" /><? } ?></td>

  </tr>

</table>



	</div>

	</div>

<div>	

	<div>

		<div style="width:600px; float:left; height:49px;">

			<div style="font-family: Myriad Pro; font-size:22px; font-weight:bold; color:#c41d22; padding:12px 15px 15px 20px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>

		</div>	

		<div style=" float:left;  ">

			<div style=" padding:3px 10px">

			<div  style="font-family: Myriad Pro; font-size:17px; font-weight:bold; color:#c41d22; text-align:center;">

				

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

		

		 

		

		

		<ul class="bulletUl">

		<? if($pro['bulletText1'] != '' ){ ?><li><? echo stripslashes($pro['bulletText1']) ; ?></li> <? } ?>

		<? if($pro['bulletText2'] != '' ){ ?><li><? echo stripslashes($pro['bulletText2']) ; ?></li> <? } ?>

		<? if($pro['bulletText3'] != '' ){ ?><li><? echo stripslashes($pro['bulletText3']) ; ?></li> <? } ?>

		<? if($pro['bulletText4'] != '' ){ ?><li><? echo stripslashes($pro['bulletText4']) ; ?></li> <? } ?>

	    <? if($pro['bulletText5'] != '' ){ ?><li><? echo stripslashes($pro['bulletText5']) ; ?></li> <? } ?>

		 

		</ul>

		

	


		

	</div>

</div>

	<div>

	<!-- not working -->

	<div style="background:#ffffff; height:30px; display: none; ">  

			 

		<div style=" margin:auto; font-family:Myriad Pro; font-size:12px; font-weight:bold; display: none; color:#c41d22; padding:5px 5px 0px 17px;">
		


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

	<!-- not working -->

	<!-- <div style="background:#c41d22; height:5px;">&nbsp;</div> -->

	</div>

</div>


</div> <!-- end of image background -->


<script>

	function printPage(){

		document.getElementById("printBtn").style.display="none";

		window.print();

		document.getElementById("printBtn").style.display="block";

	}

	function sentToMail()

 	{		

		//window.open('<? echo $site['url'] ?>sendMail.php','','width=715,height=130','top=200,left=300');

	}

</script>


</body>

</html>

