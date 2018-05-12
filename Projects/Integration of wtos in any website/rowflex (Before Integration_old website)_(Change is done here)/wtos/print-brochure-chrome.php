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
$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId' and printOrder>0  order by printOrder asc ,propertyImageId desc ");

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

function imgThumb($img,$w,$h)
{
global $site;
 $sroot=str_replace('wtos/','',$site['root']);
 
 return $site['url'].'wtos/imageThumb.php?image='.$sroot.$img.'&newwidth='.$w.'&newheight='.$h;
}

$bigImg=imgThumb($pro['print'],1190,735);

$smallImg1=imgThumb($pImage['0']['image'],400,240);;
$smallImg2=imgThumb($pImage['1']['image'],400,240);
$smallImg3=imgThumb($pImage['2']['image'],400,240);







 

?><html xmlns="http://www.w3.org/1999/xhtml">
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
 


 <style>
 p{ padding:0px; margin:0px;}
 </style>
 
</head><body style="background-color:#E0DFDB;">
 
 

 
 
 
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
	
	 
	 <img src="<?php  echo $bigImg;?>" border="0" width="1190" height="735"/>
	 
		 
		
	</td>
  </tr>
  
  <? if($pro['type']!="Rent"){ ?>
  <tr>
    <td align="left" valign="top"     >
		<table     cellpadding="0" cellspacing="0" border="0" width="100%"   >
			  <tr>
				<td width="200" align="left" valign="top" style="margin:0px; padding:0px;"><?
	
				 
				//	$heightSmallImage='height="200"'; #204
					$heightStyle='height:240px;'; #204
					?>
                        
               <style>
				.smallImg1{background-image:url(<? echo $smallImg1; ?>);background-size:100% 100%; <?  echo $heightStyle?> width:400px; }
				.smallImg2{background-image:url(<? echo $smallImg2; ?>);background-size:100% 100%; <?  echo $heightStyle?> width:400px; }
				.smallImg3{background-image:url(<? echo $smallImg3; ?>);background-size:100% 100%; <?  echo $heightStyle?> width:400px; }
				
				.sep1{background-image:url(<?php echo $site['themePath']?>images/red_line.jpg);background-size:100% 100%;width:264px; height:14px; }
				.sep2{background-image:url(<?php echo $site['themePath']?>images/red_line02.jpg);background-size:100% 100%;width:264px; height:4px; }
				.sep3{background-image:url(<?php echo $site['themePath']?>images/red_line03.jpg);background-size:100% 100%;width:264px; height:5px; }
				.sep4{background-image:url(<?php echo $site['themePath']?>images/red_line04.jpg);background-size:100% 100%;width:264px; height:15px; }
				
				
				
				
				</style>
               
                 <div class="sep1" >&nbsp; </div>
		        <div class="smallImg1" >&nbsp; </div>	   
				  
				  <div class="sep2" >&nbsp; </div>
		            <div class="smallImg2" >&nbsp; </div>		   
				    
				    <div class="sep3" >&nbsp; </div>
		             <div class="smallImg3" >&nbsp; </div>
				  <div class="sep4" >&nbsp; </div></td>
                  <td width="29" align="left" valign="middle">&nbsp;</td>
				<td width="260" align="left" valign="top">
					<span style="font-family:'Myriad Pro'; font-size:17px; color:#a61d43; line-height:23px; padding-top:15px;display:block; height:550px; overflow:hidden;"> <?php echo stripslashes($pro['fullDescription'])?></span>
					<span style="padding-top:1px;">
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
						<table  border="0" cellpadding="0" cellspacing="0">
					  
					  <tr>
						<td><img src="<?php echo $site['themePath']?>images/bed.png" border="0" /></td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;">&nbsp;<?php echo $pro['bed']?> &nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/bath.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;">&nbsp;<?php echo $pro['bath']?>&nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/Sofa.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;">&nbsp;<?php echo $pro['sofa']?></td>
					  </tr></table>
					  <table width="100%" border="0">
						
						 <tr>
								<td  style="font-family:'Myriad Pro'; font-size:18px; color:#a61d43; font-weight:bold; padding-top:5px;"><?php echo $pro['leasehold']?> <?php if( $pro['leaseyears']!=''){?>   :<font style="font-weight:normal">
								
							    <?php echo $pro['leaseyears']?> </font>  <? }?></td>
						  </tr>
						  
						  
			<?php if( $pro['leasehold']=='Leasehold' || $pro['leasehold']=='Share of Freehold'  )
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
				<td width="50" align="left" valign="middle">&nbsp;</td>
				<td  align="left" valign="middle"><style>
				.pp{background-image:url(<? echo $floorPlanImg; ?>);background-size:100% 100%; height:630px; width:450px; margin-top:2px;}
				</style>

				<div class="pp" >&nbsp; </div>
				
			<!--<img src="<? echo $floorPlanImg; ?>" border="0" style="width:300px; height:600px;" />--></td>
			  </tr>
	  </table>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top"  style="background:#f4efdc; height:35px; ">
						<table width="100%" border="0" >
				  <tr>
				 
					<td>
						<table width="0" border="0" style="padding-left:10px;font-family:Myriad Pro; font-size:18px; font-weight:normal; color:#c3456d;">
  <tr>
    <td align="left" valign="middle"  >P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style=" padding-left:20px;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style=" padding-left:20px;">W: www.heavenproperties.co.uk</td>
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
    <td align="left" valign="top" style="font-family: Myriad Pro; font-size:10px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are not to be relied on as statement
or representation of fact. Intending purchasers or Lessors must satisfy themselves or otherwise as the correctness of each of the stat ements contained in these particulars. Heaven Properties has not tested any of the appliances in this property</td>
  </tr> 
<? }  else{ ?>
  <tr>
    <td align="left" valign="top"     >
		<table     cellpadding="0" cellspacing="0" border="0" width="100%"   >
			  <tr>
				<td width="200" align="left" valign="top" style="margin:0px; padding:0px;"><?
	
				 
				//	$heightSmallImage='height="200"'; #204
					$heightStyle='height:240px;'; #204
					?>
                        
               <style>
				.smallImg1{background-image:url(<? echo $smallImg1; ?>);background-size:100% 100%; <?  echo $heightStyle?> width:400px; }
				.smallImg2{background-image:url(<? echo $smallImg2; ?>);background-size:100% 100%; <?  echo $heightStyle?> width:400px; }
				.smallImg3{background-image:url(<? echo $smallImg3; ?>);background-size:100% 100%; <?  echo $heightStyle?> width:400px; }
				
				.sep1{background-image:url(<?php echo $site['themePath']?>images/red_line.jpg);background-size:100% 100%;width:264px; height:14px; }
				.sep2{background-image:url(<?php echo $site['themePath']?>images/red_line02.jpg);background-size:100% 100%;width:264px; height:4px; }
				.sep3{background-image:url(<?php echo $site['themePath']?>images/red_line03.jpg);background-size:100% 100%;width:264px; height:5px; }
				.sep4{background-image:url(<?php echo $site['themePath']?>images/red_line04.jpg);background-size:100% 100%;width:264px; height:15px; }
				
				
				
				
				</style>
               
                 <div class="sep1" >&nbsp; </div>
		        <div class="smallImg1" >&nbsp; </div>	   
				  
				  <div class="sep2" >&nbsp; </div>
		            <div class="smallImg2" >&nbsp; </div>		   
				    
				    <div class="sep3" >&nbsp; </div>
		             <div class="smallImg3" >&nbsp; </div>
				  <div class="sep4" >&nbsp; </div></td>
                  <td width="29" align="left" valign="middle">&nbsp;</td>
				<td width="260" align="left" valign="top">
					<span style="font-family:'Myriad Pro'; font-size:17px; color:#a61d43; line-height:23px; padding-top:1px;display:block; height:608px; overflow:hidden;"> <?php echo stripslashes($pro['fullDescription'])?></span>
					<span style="padding-top:1px;">
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
						<table  border="0" cellpadding="0" cellspacing="0">
					  
					  <tr>
						<td><img src="<?php echo $site['themePath']?>images/bed.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;">&nbsp;<?php echo $pro['bed']?> &nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/bath.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;">&nbsp;<?php echo $pro['bath']?>&nbsp;&nbsp;</td>
						<td><img src="<?php echo $site['themePath']?>images/Sofa.png" border="0" /> </td>
						<td style="font-family:'Myriad Pro'; font-size:18px; color:#a61d42; font-weight:bold;">&nbsp;<?php echo $pro['sofa']?></td>
					  </tr></table>
					  <table width="100%" border="0" cellpadding="0" cellspacing="0">
							  
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
				<td width="50" align="left" valign="middle">&nbsp;</td>
				<td align="left" valign="top">&nbsp;
				
				<style>
				.pp{background-image:url(<? echo $floorPlanImg; ?>);background-size:100% 100%; height:630px; width:450px; margin-top:2px;}
				</style>

				<div class="pp" >&nbsp; </div>
				</td>
			  </tr>
	  </table>
	</td>
  </tr>
  <tr>
    <td align="left" valign="top"  style="background:#f4efdc; height:35px; ">
						<table width="100%" border="0" >
				  <tr>
				 
					<td>
						<table width="0" border="0" style="padding-left:10px;font-family:Myriad Pro; font-size:18px; font-weight:normal; color:#c3456d;">
  <tr>
    <td align="left" valign="middle"  >P: 020-8696-6904</td>
    
    <td align="left" valign="middle"   style=" padding-left:20px;">E: info@heavenproperties.co.uk</td>
   
    <td align="left" valign="middle"   style=" padding-left:20px;">W: www.heavenproperties.co.uk</td>
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
    <td align="left" valign="top" style="font-family: Myriad Pro; font-size:10px; font-weight:normal; color:#000; text-align:justify; padding:5px 15px 0px 15px;">These particulars are for general information only and do not constitute any part of an offer or a contract. All statements contained herein are made without responsibility on the part of Heaven Properties or the Vendors or Lessors, and are not to be relied on as statement
or representation of fact. Intending purchasers or Lessors must satisfy themselves or otherwise as the correctness of each of the stat ements contained in these particulars. Heaven Properties has not tested any of the appliances in this property</td>
  </tr>  
  <? } ?></table>
  </body></html><? exit; ?>