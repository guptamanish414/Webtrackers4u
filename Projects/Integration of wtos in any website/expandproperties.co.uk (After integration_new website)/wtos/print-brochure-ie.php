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
$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId' and printOrder>0   order by printOrder asc ,propertyImageId desc ");

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
 

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Broadwayandwest</title>
 

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
 


 <style>
 p{ padding:0px; margin:0px;}
 </style>

 
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
 

 
 
 
 <table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="middle" style="background:#a20a42; padding:0px 0px 0px 0px; height:102px;">
		<table width="100%" border="0">
				  <tr>
					<td align="left" valign="middle"><img src="<?php echo $site['themePath']?>images/b_logo.png" border="0"   height="101" /></td>
					<td align="right" valign="middle"><img src="<?php echo $site['themePath']?>images/adress.png" border="0"  height="101" /></td>
				  </tr>
	  </table>
		
	</td>
    
  </tr>
  <tr>
    <td align="left" valign="top">
		<span  style="position:absolute; width:auto; height:60px; background:#f8f6e6; margin-top:61px; padding:0px 5px 0px 0px;">
			<div style="font-family: Myriad Pro; font-size:25px; font-weight:bold; line-height:25px; color:#a5023e; padding:15px 5px 10px 45px;"><?php echo $pro['title']?> <?php echo $pro['name']?></div>
		</span>
		<span style="position:absolute; left:1058px; top:700px;">
	  
		<? if($pro['qrCode']=='')
		{ ?> <? $style='opacity:0;filter:alpha(opacity=0);'; } ?>
		<img src="<?php  echo $qrImg;?>" border="0" width="150" height="150" style=" <?  echo $style ?>"/> 
		
	</span>
	
	 
	  <img src="<?php  echo $bigImg;?>" border="0" width="1200" height="743"/>
	 
	
	
		<!---->
		
	</td>
  </tr>
  
  <? if($pro['type']!="Rent"){ ?>
  
  <tr>
    <td align="left" valign="top" >
		<table width="0" border="0" cellpadding="0" cellspacing="0" >
			  <tr>
				<td width="200" align="left" valign="top">
				<?
	
					 
					  $heightSmallImage='240';
						 
				 ?>
	
				
			       <img src="<?php echo $site['themePath']?>images/red_line.jpg" border="0" width="264" height="14"/>
		           <img src="<? echo $smallImg1; ?>" border="0" width="400"   height="<? echo $heightSmallImage ?>"/>
				   
				   <? if($pImage['1']['image']==''){ ?> <? $styleimg='opacity:0;filter:alpha(opacity=0);'; } ?>
				   <img src="<?php echo $site['themePath']?>images/red_line02.jpg" border="0" width="264" height="4" style=" <?  echo $styleimg ?>"/>
		           <img src="<? echo $smallImg2; ?>" border="0" width="400"    height="<? echo $heightSmallImage ?>" style=" <?  echo $styleimg ?>"/>
				   
				    <? if($pImage['2']['image']==''){ ?> <? $styleimg='opacity:0;filter:alpha(opacity=0);'; } ?>
				   <img src="<?php echo $site['themePath']?>images/red_line03.jpg" border="0" width="264" height="5" style=" <?  echo $styleimg ?>"/>
		           <img src="<? echo $smallImg3; ?>" border="0"  width="400"   height="<? echo $heightSmallImage ?>" style=" <?  echo $styleimg ?>"/>
				   <img src="<?php echo $site['themePath']?>images/red_line04.jpg" border="0" width="264" height="18" style=" <?  echo $styleimg ?>"/>
				</td>
				<td width="29" align="left" valign="middle">&nbsp;</td>
				<td width="230" align="left" valign="top" >
					<span style="font-family:'Myriad Pro'; font-size:17px; color:#a61d43; line-height:23px; padding-top:12px; display:block;"><?php echo stripslashes($pro['fullDescription'])?></span>

					<span style="padding-top:1px;display:block;">
						<table width="100%" border="0">
							  
						  <tr>
							<td  style=" background:#f8f6e6; height:40px;">
								<table width="100%" border="0">
									  <tr>
										<td style="font-family:'Myriad Pro'; font-size:20px; font-weight:bold; color:#a61d43; line-height:20px; padding:8px 0px 8px 0px; text-align:center; ">Price : &pound; <?php echo number_format($pro['price']);?>  <?php echo $pro['priceUnit']?></td>
									  </tr>
							  </table>

							</td>
						  </tr>
						 
						</table>

		            </span>
					 
						<table  border="0">
					 
					  <tr>
						<td><img src="<?php echo $site['themePath']?>images/b01.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bed']?>&nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/b003.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bath']?>&nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/Sofa.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['sofa']?></td>
					  </tr>
					   
					  
						
						  
					</table>

		            
					 
						<table width="100%"   border="0">
						
						 <tr>
								<td  style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; padding-top:5px;">222<?php echo $pro['leasehold']?> <?php if( $pro['leaseyears']!=''){?>   :<font style="font-weight:normal">
								 
							    <?php echo $pro['leaseyears']?> </font> <? }?></td>
						  </tr>
						  
						  <?php  if( $pro['leasehold']=='Leasehold' || $pro['leasehold']=='Share of Freehold'  )
						  {?> 
			 <tr>
							 
								<td  style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; padding-top:5px;">Service Charge: <font style="font-weight:normal"><?php echo $pro['servicecharge']?></font></td>
							  </tr>
							  
							  
			<? } ?>
						
						<?php if( $pro['leasehold']=='Leasehold' || $pro['leasehold']=='Share of Freehold'  ){?> 
			 <tr>
								<td  style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; padding-top:5px;">Ground Rent: <font style="font-weight:normal"><?php echo $pro['groundrent']?></font> </td>
							  </tr>
			<? } ?>
			
			 <tr>
								<td  ><span style="font-family:'Myriad Pro'; font-size:16px; color:#a61d43; font-weight:bold; padding-top:5px;">EPC: <font style="font-weight:normal"><?php echo $pro['epcvalue']?></font></span> </td>
							  </tr>
				
							  
			
			
			
			
							</table>


		            
				</td>
				<td width="100" align="left" valign="middle">&nbsp;</td>
				<td width="250" align="left" valign="top"><img src="<? echo $floorPlanImg; ?>" border="0"  width="450" height="500"  /></td>
			  </tr>
	  </table></td>
  </tr>
  <tr>
    <td align="left" valign="middle"  style="background:#e3e3e5; height:2px;"></td>
  </tr>
  <tr>
    <td align="left" valign="middle"  style="background:#f4efdc; height:35px;">
						<table width="100%" border="0">
				  <tr>
				  	<td>&nbsp;</td>
					<td>
						<table width="0" border="0">
  <tr>
    < <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">W: www.heavenproperties.co.uk</td>
  </tr>
</table>
					</td>
					<td>&nbsp;</td>
					<td><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></td>
				  </tr>
				</table>

	</td>
  </tr>
  <tr>
    <td align="left" valign="middle" style="background:#e3e3e5; height:2px;"></td>
  </tr>
  <tr>
    <td align="left" valign="middle" style="font-family: Myriad Pro; font-size:11px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are not to be relied on as statement
or representation of fact. Intending purchasers or Lessors must satisfy themselves or otherwise as the correctness of each of the stat ements contained in these particulars. Heaven Properties has not tested any of the appliances in this property</td>
  </tr>
  
  <? }  else{ ?>
  <tr>
    <td align="left" valign="middle">
		<table width="0" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<td width="200" align="left" valign="top"><? 
			     
					  $heightSmallImage='240';
						 
					  ?>
	
				
			       <img src="<?php echo $site['themePath']?>images/red_line.jpg" border="0" width="264" height="14"/>
		           <img src="<? echo $smallImg1; ?>" border="0" width="400"    height="<? echo $heightSmallImage ?>"/>
				   
				   <? if($pImage['1']['image']==''){ ?> <? $styleimg='opacity:0;filter:alpha(opacity=0);'; } ?>
				   <img src="<?php echo $site['themePath']?>images/red_line02.jpg" border="0" width="264" height="4" style=" <?  echo $styleimg ?>"/>
		           <img src="<? echo $smallImg2; ?>" border="0" width="400"   height="<? echo $heightSmallImage ?>" style=" <?  echo $styleimg ?>"/>
				   
				    <? if($pImage['2']['image']==''){ ?> <? $styleimg='opacity:0;filter:alpha(opacity=0);'; } ?>
				   <img src="<?php echo $site['themePath']?>images/red_line03.jpg" border="0" width="264" height="5" style=" <?  echo $styleimg ?>"/>
		           <img src="<? echo $smallImg3; ?>" border="0"  width="400"  height="<? echo $heightSmallImage ?>" style=" <?  echo $styleimg ?>"/>
				   <img src="<?php echo $site['themePath']?>images/red_line04.jpg" border="0" width="264" height="18" style=" <?  echo $styleimg ?>"/>
				</td>
				<td width="29" align="left" valign="middle">&nbsp;</td>
				<td width="230" align="left" valign="top">
					<span style="font-family:'Myriad Pro'; font-size:17px; color:#a61d43; line-height:23px; padding-top:12px;display:block;"> <?php echo stripslashes($pro['fullDescription'])?></span>

					 

					<span style="padding-top:1px;">
						<table width="100%" border="0">
							 <tr height="10">&nbsp;</tr>
						  <tr>
							<td  style=" background:#f8f6e6; height:40px;">
								<table width="100%" border="0">
									  <tr>
										<td style="font-family:'Myriad Pro'; font-size:20px; font-weight:bold; color:#a61d43; line-height:20px; padding:8px 0px 8px 0px; text-align:center; ">Price : &pound; <?php echo number_format($pro['price']);?>  <?php echo $pro['priceUnit']?></td>
									  </tr>
									</table>

							</td>
						  </tr>
						 
						</table>

		            </span>
					 
						<table  border="0">
					  <tr>&nbsp;</tr>
					  <tr>
						<td><img src="<?php echo $site['themePath']?>images/b01.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bed']?>&nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/b003.jpg" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['bath']?>&nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/Sofa.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;"><?php echo $pro['sofa']?></td>
					  </tr>
					   
					  
						
						  
					</table>

		             
					 
						<table width="100%" border="0">
							  
							  <tr>
								<td  style="font-family:'Myriad Pro'; font-size:16px; color:#a61d43; font-weight:bold; padding-top:5px;">Council Tax:
								<font style="font-weight:normal"> <?php echo $pro['counciltax']?> </font>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:'Myriad Pro'; font-size:16px; color:#a61d43; font-weight:bold; padding-top:5px;">EPC: <font style="font-weight:normal"><?php echo $pro['epcvalue']?></font></span> </td>
							  </tr>
							  <tr>
								<td  style="font-family:'Myriad Pro'; font-size:16px; color:#a61d43; font-weight:bold; padding-top:5px;">Underground: 
								<font style="font-weight:normal"><?php echo $pro['underground']?></font> <br />
</td>
							  </tr>
							
							  
							  
							  
							</table>


		             
				</td>
				<td width="100" align="left" valign="middle">&nbsp;</td>
				<td width="250" align="left" valign="top"><img src="<? echo $floorPlanImg; ?>" border="0"  width="450" height="500"  /></td>
			  </tr>
	  </table>

	
	</td>
  </tr>
  <tr>
    <td align="left" valign="middle"  style="background:#e3e3e5; height:2px;"></td>
  </tr>
  <tr>
    <td align="left" valign="middle"  style="background:#f4efdc; height:35px;">
						<table width="100%" border="0">
				  <tr>
				  	<td>&nbsp;</td>
					<td>
						<table width="0" border="0">
  <tr>
     <td align="left" valign="middle"  style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style="font-family:Myriad Pro; font-size:16px; font-weight:normal; color:#c3456d;">W: www.heavenproperties.co.uk</td>
  </tr>
</table>
					</td>
					<td>&nbsp;</td>
					<td><img src="<?php echo $site['themePath']?>images/f_pix.jpg" border="0" width="147" height="31" /></td>
				  </tr>
				</table>

	</td>
  </tr>
  <tr>
    <td align="left" valign="middle" style="background:#e3e3e5; height:2px;"></td>
  </tr>
  <tr>
    <td align="left" valign="middle" style="font-family: Myriad Pro; font-size:11px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are not to be relied on as statement
or representation of fact. Intending purchasers or Lessors must satisfy themselves or otherwise as the correctness of each of the stat ements contained in these particulars. Heaven Properties has not tested any of the appliances in this property</td>
  </tr>
  
  <? } ?>
</table>
 
 
 
 </body>
	</html>

 	<? exit; ?>