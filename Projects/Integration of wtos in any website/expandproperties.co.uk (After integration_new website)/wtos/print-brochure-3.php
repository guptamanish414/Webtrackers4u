<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
 $propertyId=$_GET['propertyId'];
global $pageVar;
 
$site['themePath']=$site['urlFront'].'wtos-theme/';
$site['url']=$site['urlFront'];
//$propertyId=$_GET['propertyId'];
//$seoId= trim($pageVar['segment'][2]) ;

$proQuery=" select * from property where propertyId='$propertyId'  ";
$prors=$os->mq($proQuery);
$pro=$os->mfa($prors);

//$propertyId=$pro['propertyId'];
$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'   order by priority asc ,propertyImageId desc ");

$fileName=str_replace(array(' ',',',"'",'"','`'),'',$pro['title']).'.html';
//$filenamePath=$site['root'].'printFiles/abc.html';
//header("Content-type: application/octet-stream");
//header( "Content-disposition: filename=".$fileName);

$bigImg=$site['url'].$pro['print'];
$qrImg=$site['url'].$pro['qrCode'];

$smallImg1=$site['url'].$pImage['0']['image'];
$smallImg2=$site['url'].$pImage['1']['image'];
$smallImg3=$site['url'].$pImage['2']['image'];
$smallImg4=$site['url'].$pImage['3']['image'];
$smallImg5=$site['url'].$pImage['4']['image'];
$smallImg6=$site['url'].$pImage['5']['image'];

$floorPlanImg=$site['url']. $pro['floorplan'];
$epcImg=$site['url']. $pro['EPC'];
 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Heaven Properties</title>
 

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
 <link rel="stylesheet" type="text/css" href="<? echo $site['themePath']?>css/myriadpro.css" />
<? }?>
 




 
</head>

<body>
<!--<div style="margin:auto; text-align:center; margin-bottom:2px; display:none;">
 <a href="javascript:void(0)" onClick="printPage()" style="color:#FF0000; font-weight:bold; font-size:16px;" id="printPageButton">Print</a>
 <script>
 function printPage()
 {
    document.getElementById('printPageButton').style.display='none';
   window.print();
   document.getElementById('printPageButton').style.display='';
 
 }
 
 </script>
 </div>-->
 
 
 <table    style="width:100%;" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" ><div style="background:#a61d43; padding:0px 0px 0px 0px; height:102px;">
		<div>
			<div style="width:183px; float:left;"><img src="<?php echo $site['themePath']?>images/b_logo.jpg" border="0" width="183" height="101" /></div>
			<div style="width:356px; float:right;"><img src="<?php echo $site['themePath']?>images/adress.jpg" border="0" width="356" height="101" /></div>
			<div style="font-size:0px; line-height:0px; clear:both;"></div>
		</div>
	</div> </td>
   </tr>
  <tr>
   <!-- <td colspan="3" style="background:url('<?php  echo $bigImg;?>') ; width:100%; height:740px;background-size:100% 100%;">-->
	 <td colspan="3" >
 	<img src="<?php  echo $bigImg;?>" border="0" width="99.99%"  height="700"/>  
 <div style="position:absolute; width:360px; height:60px; background:#f8f6e6; top:161px; left:10px;">
	 	<div style="font-family: Myriad Pro; font-size:20px; font-weight:bold; color:#a5023e; padding:15px 5px 10px 25px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>
	</div>	
 
	<div style="position:absolute; left:86%; top:658px;">
	  <img src="<?php  echo $qrImg;?>" border="0" width="150" height="150"/> 
	</div> 
 
	
	
	
	</td>
   </tr>
  

	
 
	
 
<? if($pro['type']!="Rent"){ ?>
 
	
	
 
 <tr>
    <td style="width:200px;" align="left" >
	
	<table border="0" cellspacing="0" cellpadding="0"  style="margin-top:10px;"  >
  <tr>
    <td> <img src="<?php echo $site['themePath']?>images/red_line.jpg" border="0" width="264" height="14"/> </td>
  </tr>
  <tr>
    <td> <img src="<? echo $smallImg1; ?>" border="0"  width="325" height="219"/> </td>
  </tr>
  <tr>
    <td> <img src="<?php echo $site['themePath']?>images/red_line02.jpg" border="0" width="264" height="4"/> </td>
  </tr>
  <tr>
    <td> <img src="<? echo $smallImg2; ?>" border="0"  width="325" height="219"/> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $site['themePath']?>images/red_line03.jpg" border="0" width="264" height="5"/> </td>
  </tr>
  <tr>
    <td><img src="<? echo $smallImg3; ?>" border="0"  width="325" height="219"/> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $site['themePath']?>images/red_line04.jpg" border="0" width="264" height="18"/></td>
  </tr>
</table>

	   
		 
		 </td>
    <td align="left" style="width:25px;padding-left:29px;" valign="top"> 
	 <div style="width:255px;">
		<div style="font-family:'Myriad Pro'; font-size:17px; color:#a61d43; line-height:23px; padding-top:15px; width:225px; ">
		<?php echo stripslashes($pro['shortDescription'])?>.</div>
		 
		<div style="padding-top:50px; width:225px; ">
			<div style=" background:#f8f6e6; height:40px;">
				<div style="font-family:'Myriad Pro'; font-size:23px; font-weight:bold; color:#a61d43; line-height:25px; padding:8px 0px 8px 0px; text-align:center; ">Price :&pound;<?php echo number_format($pro['price']);?>  <?php echo $pro['priceUnit']?></div>
			</div>
		</div>
		 			<div style="padding-top:10px; width:225px; ">
				<table  border="0">
					  <tr>
						<td><img src="<?php echo $site['themePath']?>images/b01.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bed']?></td>
						<td><img src="<?php echo $site['themePath']?>images/b003.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bath']?></td>
					  </tr>
			  </table>

			</div>
			
		
			<?php if( $pro['leasehold']=='Leasehold' || $pro['leasehold']=='Share of Freehold'  ){?> 
			<div style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; width:225px;  padding-top:5px;">Ground Rent:<?php echo $pro['groundrent']?> </div>
			<? } ?>
			
				<div style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; width:225px;  padding-top:5px;"><?php echo $pro['leasehold']?>:<?php if( $pro['leaseyears']!=''){?>   <?php echo $pro['leaseyears']?> Years <? }?></div>
			
			
			
			<?php if( $pro['leasehold']=='Leasehold' || $pro['leasehold']=='Share of Freehold'  ){?> 
			<div style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; width:225px; padding-top:5px;">Service Charge:<?php echo $pro['servicecharge']?> </div>
			<? } ?>
  
				</div>
			
			
		 
	 
	 </td>
    <td align="center" valign="middle"><img src="<? echo $floorPlanImg; ?>" border="0"  width="250" height="600"  /></td>
  </tr>
  
  <tr>
    <td colspan="3"><div style="padding-top:0px;height:82px;width:100%">
<div style="background:#f4efdc; height:35px;">
		<div style="width:60%; float:left;">
		<div style=" padding:5px 0px 0px 20px;">
			<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">W: www.heavenproperties.co.uk</td>
  </tr>
</table>

 


		</div>
		</div>
		<div style="width:30%px; float:right;">
			<div style="padding-top:3px;"><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></div>
		</div>
		
  </div>	
<div style="width:100%;height:1px; clear:both;">  </div> <!--   1234  -->	

<div style="font-family: Myriad Pro; font-size:10px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 20px;">
			These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Broadwat & West or the Vendors or Lessors, and are not to be relied on as statement
or representation of fact. Intending purchasers or Lessors must satisfy themselves or otherwise as the correctness of each of the stat ements contained in these particulars. Broadway & West has not tested any of the appliances in this property	</div>
   
</div></td>
   </tr>
 

 

<? }  else{ ?>

 
 <tr>
    <td style="width:200px;" align="left" >
	
	<table border="0" cellspacing="0" cellpadding="0"  style="margin-top:10px;"  >
  <tr>
    <td> <img src="<?php echo $site['themePath']?>images/red_line.jpg" border="0" width="264" height="14"/> </td>
  </tr>
  <tr>
    <td> <img src="<? echo $smallImg1; ?>" border="0"  width="325" height="219"/> </td>
  </tr>
  <tr>
    <td> <img src="<?php echo $site['themePath']?>images/red_line02.jpg" border="0" width="264" height="4"/> </td>
  </tr>
  <tr>
    <td> <img src="<? echo $smallImg2; ?>" border="0"  width="325" height="219"/> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $site['themePath']?>images/red_line03.jpg" border="0" width="264" height="5"/> </td>
  </tr>
  <tr>
    <td><img src="<? echo $smallImg3; ?>" border="0"  width="325" height="219"/> </td>
  </tr>
  <tr>
    <td><img src="<?php echo $site['themePath']?>images/red_line04.jpg" border="0" width="264" height="18"/></td>
  </tr>
</table>

	   
		 
		 </td>
    <td align="left" style="width:25px;padding-left:29px;" valign="top"> 
	 <div style="width:255px;">
		<div style="font-family:'Myriad Pro'; font-size:17px; color:#a61d43; line-height:23px; padding-top:15px; width:225px; ">
		<?php echo stripslashes($pro['shortDescription'])?>.</div>
		 
		<div style="padding-top:50px; width:225px; ">
			<div style=" background:#f8f6e6; height:40px;">
				<div style="font-family:'Myriad Pro'; font-size:23px; font-weight:bold; color:#a61d43; line-height:25px; padding:8px 0px 8px 0px; text-align:center; ">Price :&pound;<?php echo number_format($pro['price']);?>  <?php echo $pro['priceUnit']?></div>
			</div>
		</div>
		 			<div style="padding-top:10px; width:225px; ">
				<table  border="0">
					  <tr>
						<td><img src="<?php echo $site['themePath']?>images/b01.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bed']?></td>
						<td><img src="<?php echo $site['themePath']?>images/b003.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bath']?></td>
					  </tr>
			  </table>

			</div>
			
		<div style="font-family:'Myriad Pro'; font-size:16px; color:#a61d43; font-weight:bold; padding-top:5px;">Underground: <?php echo $pro['underground']?> </div>
			<div style="font-family:'Myriad Pro'; font-size:15px; color:#a61d43; font-weight:bold; padding-top:5px;">Council Tax: <?php echo $pro['counciltax']?>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'Myriad Pro'; font-size:15px; color:#a61d43; font-weight:bold; padding-top:5px;"><!--EPC:&pound;100--></span></div>
  
				</div>
			
			
		 
	 
	 </td>
    <td align="center" valign="middle"><!--<img src="<? echo $floorPlanImg; ?>" border="0"  width="250" height="600"  />--></td>
  </tr>
  
  <tr>
    <td colspan="3"><div style="padding-top:0px;height:82px;width:100%">
<div style="background:#f4efdc; height:35px;">
		<div style="width:60%; float:left;">
		<div style=" padding:5px 0px 0px 20px;">
			<table width="100%" border="0">
  <tr>
    <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">W: www.heavenproperties.co.uk</td>
  </tr>
</table>

 


		</div>
		</div>
		<div style="width:30%px; float:right;">
			<div style="padding-top:3px;"><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></div>
		</div>
		
  </div>	
<div style="width:100%;height:1px; clear:both;">  </div> <!--   1234  -->	

<div style="font-family: Myriad Pro; font-size:10px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 20px;">
			These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are not to be relied on as statement
or representation of fact. Intending purchasers or Lessors must satisfy themselves or otherwise as the correctness of each of the stat ements contained in these particulars. Heaven Properties has not tested any of the appliances in this property	</div>
   
</div></td>
   </tr>






 <? } ?>
  </table>
 </body>
	</html>

 	<? exit; ?>
 
 