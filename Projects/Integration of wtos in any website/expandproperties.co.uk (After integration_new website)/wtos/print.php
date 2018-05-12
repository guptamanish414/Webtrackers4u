<?php
include('includes/config.php');
include('top.php');
exit();
// config 

$DivIds['AJAXPAGE']='propertyEdit';
$type=$_GET['type']; 

$listPAGE='property';
 
$primeryTable='property';
$primeryField='propertyId';
$listHeader='Print Properties';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
  
 
 $hidden=' and active=1'; 
 
  $andtype=" and type='Buy' ";
 if($type=='Rent'){
 $andtype=" and type='Rent' ";
 }
 
 
$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andname  $andpostcode  $andbed  $andbath  $andfeatured  $andtype    $hidden
 order by bed asc, price asc, $primeryField desc  ";
$recordPerPage=6;
##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 
$colorFeatured=array('No'=>'FFFFFF','Yes'=>'FF9900');

$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');

$os->setFlash($flashMsg);
//tinyMce();

//searching......

$emailShow=($type=='Rent')?'enquiries@broadwayandwest.co.uk':'sales@brodwayandwest.co.uk';


?>

	<table class="container"   >
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td    style="padding-left:5px; text-align:left;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?>   &nbsp;     
			   &nbsp;  &nbsp;  &nbsp; 
			<a href="<? echo $site['url'] ?>print.php?&type=Rent"  style="color:#FFFFFF; font-weight:bold; font-size:16px; font-style:normal;"> LET</a>   &nbsp; 
			<a href="<? echo $site['url'] ?>print.php?&type=Buy"  style="color:#FFFFFF; font-weight:bold; font-size:16px;font-style:normal;"> SALE</a>   &nbsp; 
			  
			  </div>
			  
			  <!--  ggggggggggggggg   -->
			  <div style="text-align:center;">
			<!--   <a href="javascript:void(0)" onclick="printById('reportData')" style="color:#FF0000; font-weight:bold; font-size:16px;">Print</a>-->
				<a href="listPrint.php" style="color:#FF0000; font-weight:bold; font-size:16px;">Print</a>
			   </div>
			   <?  ob_start(); ?>
			   <div id="reportData">
			  <!-- <link rel="stylesheet" type="text/css" href="<? echo $site['urlFront']?>wtos-theme/css/global-wt.css" />-->
			   <style>
			   @font-face {
    font-family: 'fontin_sans_crbold';
    src: url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_b_46b.eot');
    src: url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_b_46b.eot?#iefix') format('embedded-opentype'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_b_46b.woff') format('woff'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_b_46b.ttf') format('truetype'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_b_46b.svg#fontin_sans_crbold') format('svg');
    font-weight: normal;
    font-style: normal;
}

@font-face {
    font-family: 'fontin_sans_crregular';
    src: url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_r_46b-webfont.eot');
    src: url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_r_46b-webfont.eot?#iefix') format('embedded-opentype'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_r_46b-webfont.woff') format('woff'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_r_46b-webfont.ttf') format('truetype'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/fontinsans_cyrillic_r_46b-webfont.svg#fontin_sans_crregular') format('svg');
    font-weight: normal;
    font-style: normal;

}


@font-face {
    font-family: 'Myriad Pro';	 
    src: url('<? echo $site['urlFront']?>wtos-theme/fonts/myriad-pro/myriadpro-regular.eot');
    src: url('<? echo $site['urlFront']?>wtos-theme/fonts/myriad-pro/myriadpro-regular.eot?#iefix') format('embedded-opentype'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/myriad-pro/myriadpro-regular.woff') format('woff'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/myriad-pro/myriadpro-regular.ttf') format('truetype'),
         url('<? echo $site['urlFront']?>wtos-theme/fonts/myriad-pro/myriadpro-regular.svg#Myriad Pro') format('svg');
}

			   </style>
               
				  
				 <div style="width:800px; margin:0px;">
 <div>
	<div style="background:#a6003e; padding:0px 17px 0px 17px; height:90px;">
		<div>
			<div style="width:125px; float:left;"><div style="padding-top:5px;"><img src="<?php echo $site['url']?>wtos-theme/images/b_logo.jpg" border="0" /></div></div>
			<div style="width:300px; float:right;">
				<div style="font-family: Myriad Pro; font-size:17px; color:#FFFFFF; text-align:right; padding-top:5px;">020 8834 7030</div>
				<div style="font-family: Myriad Pro; font-size:13px; color:#fef1f6; text-align:right; padding-top:0px;">E: <? echo $emailShow ?></div>
				<div style="font-family: Myriad Pro; font-size:13px; color:#fef1f6; text-align:right; padding-top:0px;">W: www.broadwayandwest.co.uk</div>
				<div style="font-family: Myriad Pro; font-size:13px; color:#fef1f6; text-align:right; padding-top:0px;">121 Fulham Palace Road, Hamersmith, London W6 8JA</div>
			</div>
			<div style="font-size:0px; line-height:0px; clear:both;"></div>
		</div>
	</div>
	<div style="background:#fff;">
		<div style="font-family: Myriad Pro; font-size:18px; color:#a5013e; font-weight:bold; text-align: left; padding:16px 16px 0px 15px;">
		<? if($type=='Rent'){ ?>Properties to Let<?  }else{  ?> Properties for Sales <? } ?>
		         
		
		</div>
		
		<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								 $propertyId=$record['propertyId'];
				              $pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'  order by priority asc ");
							
							 ?>
		<div style="padding:11px 10px 0px 14px;">
			<div style="width:175px; float:left;"><img src="<?php echo $site['urlFront']?><?php echo $pImage[0]['image']?>" border="0" width="175" height="114" /></div>
			<div  style="width:600px; float:right;">
				<div style="background:#f7f2e5;">
					<div  style="width:300px; float:left;">
						<div style="font-family: Myriad Pro; font-size:13px; font-weight:bold; color:#a5013e; padding:5px 0px 5px 12px;"><?php echo $record['title']?> </div>
					</div>
					<div  style="width:130px; float:right;">
						<table width="100%" border="0">
							  <tr>
								<td align="left" valign="middle" style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['url']?>wtos-theme/images/cu01.jpg" border="0" /></a></td>
								<td align="left" valign="middle"  style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $record['bed']?></td>
								<td align="left" valign="middle"  style="padding:5px 0px 0px 0px;"><a href="#"><img src="<?php echo $site['url']?>wtos-theme/images/cu02.jpg" border="0" /></a></td>
								<td align="left" valign="middle"   style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $record['bath']?></td>
								<td align="left" valign="middle"  style="padding:5px 0px 0px 0px;">&nbsp;<a href="#"><img src="<?php echo $site['url']?>wtos-theme/images/Sofa.png" border="0" /></a></td>
								<td align="left" valign="middle"   style="font-family: Myriad Pro; font-size:15px; font-weight:bold; color:#a5013e; padding:4px 0px 0px 0px;"><?php echo $record['sofa']?></td>
								
								
								<td align="left" valign="middle" >&nbsp;</td>
							  </tr>
					  </table>

					</div>
					<div style="font-size:0px; line-height:0px; clear:both;"></div>
				</div>
				<div style="border-right:#e2e2e2 solid 1px; border-top:#e2e2e2 solid 1px; border-bottom:#e2e2e2 solid 1px; padding:1px 12px 0px 12px; height:85px; overflow:hidden;">
					<div  style="font-family: Myriad Pro; font-size:12px; color:#3f3e3e; text-align:justify; font-weight:bold;height:60px; overflow:hidden;"><?php echo stripslashes($record['fullDescription'])?> </div>
					<div style="width:180px; float:right;">
						<table width="100%" border="0">
  <tr>
    
    <td width="14%" align="left" valign="middle"><!--<img src="images/rupia_two.jpg" border="0" />--></td>
    <td width="86%" align="right" valign="middle"   style="font-family: Myriad Pro; font-size:15px; color:#bd4271; text-align:right; font-weight:bold;">&pound; <?php echo number_format($record['price']);?>  <?php echo $record['priceUnit']?> </td>
  </tr>
</table>
					</div>
					<div style="font-size:0px; line-height:0px; clear:both;"></div>
				</div>
			</div>
			<div style="font-size:0px; line-height:0px; clear:both;"></div>
		</div>
		
		 <?php $i++;
							} 
							}?>
							
							
		
	</div>
	 	
	
	
	</div>
<div>	
		
	
</div>
	
</div>
					 
				 
				 
				 
				  
						</div>
						
						<?    $listPrint=ob_get_clean();
						      $_SESSION['listPrint']=$listPrint;
							  echo $listPrint;
						 ?>
						  <div style="text-align:center;">
						
					<!--<a href="javascript:void(0)" onclick="printById('reportData')" style="color:#FF0000; font-weight:bold; font-size:16px;">Print</a><br /><br />-->
					<a href="listPrint.php" style="color:#FF0000; font-weight:bold; font-size:16px;">Print</a><br /><br />
					
					  <?php echo $recordsA['links'];?> <br />
					 </div>
				 		
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>



<script>

function printById(id){ // not in use
      	 
			window.open('listPrint.php','Print','left=10, top=10');
		
		}

		function printById2(id){ // not in use
      	 
			var data = document.getElementById(id).innerHTML;
			
		 
			var  mywindow = window.open('bw', 'btp', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width=900,height=600,left=10, top=10,screenX=10,screenY=10');
			mywindow.document.write('<html><head> ');			
			/*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
			
			mywindow.document.write('<link rel="stylesheet" href="<? echo $site['url'] ?>wtos-theme/css/style.css" type="text/css" />');
			
			mywindow.document.write('</head><body>');
			mywindow.document.write(data);
			
			
			mywindow.document.write('</body></html>');
			mywindow.print();	
			//mywindow.close();
			//mywindow.document.close();			
			//return true;
		
		}
	</script>



	
    
	
    
   
	<? include('bottom.php')?>