<?
global $os,$pageVar,$propertyId,$pro,$pImage,$site;
$propertyId='1';
$seoId= trim($pageVar['segment'][2]) ;

$proQuery=" select * from property where seoId='$seoId' and active=1  ";
$prors=$os->mq($proQuery);
$pro=$os->mfa($prors);

$propertyId=$pro['propertyId'];
$pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'    order by priority asc ,propertyImageId desc ");

 
 
$proQueryS=" select * from property where active=1 and  type='".$pro['type']."'  ";
$prorsS=$os->mq($proQueryS);


 	



?><?
# msg send ------start--------

 
$msgEnqueryV='';
 
if($_POST['bookview']=='bookview')
{

 
$msgEnqueryV='<font style="color:#FF0000" > Sorry your message failed  please try agin.</font>';
if($_POST['name-v']!='' && $_POST['email-v']!='')
		{
			 
$proENQQ=" update property set  enquery=enquery+1   where propertyId='$propertyId'   ";
$proENQQ=$os->mq($proENQQ);
			# save to data base  888
			
			$dataToSaveV['name']=$_POST['name-v']; 
			$dataToSaveV['phone']=$_POST['phone-v']; 
			$dataToSaveV['email']=$_POST['email-v']; 
			$dataToSaveV['msg']=$_POST['msg-v']; 
			 
			$os->startOB();
			?>

<table width="400" border="0" cellpadding="5" cellspacing="2" >
  <tr>
    <td style="background:#006AD5; color:#ffffff; font-size:15px; font-weight:bold;">&nbsp; New request from <? echo $dataToSaveV['name'] ?> </td>
  </tr>
  <tr>
    <td>    
	       Request to view booking property <b> <? echo $pro['title'].$pro['name']; ?> </b><br /><br />
	
	        Name: <strong><? echo $dataToSaveV['name']?></strong> <br /><br />
 
			Email : <? echo $dataToSaveV['email']?> <br /><br />
			
			Mobile no : <? echo $dataToSaveV['phone']?> <br /><br />
			Message  : <? echo $dataToSaveV['msg']?> <br /><br />
			 
      &nbsp;</td>
  </tr>
  
</table>
<?
			$subjectL =$pro['title'].$pro['name']. '   BOOK VIEW REQUEST';
		 
		    $bodyv=$os->getOB();
			$os->emailSend($os->getSettings('email'),$dataToSaveV['email'],$dataToSaveV['name'],$subjectL,$bodyv);
		    $msgEnqueryV='<font style="color:#00CC00" > Message sent successfully . Thanks for your time </font> ';
		}


}else
{
$proHitQ=" update property set hits=hits+1   where propertyId='$propertyId'   ";
$proHitQ=$os->mq($proHitQ);
}

 ?>
 <?


# msg send -----

 ?>
 <?  if($msgEnqueryV!=''){ ?>
 
 <div id='bookmsg' style="position:fixed; top:0px; left:20%; max-width:345px; font-size:16px; background:#FFFFFF;">   <h5 id="msgResp"><? echo $msgEnqueryV ?></h5></div>
 <script>
  
  function hidemsg()
  {
    os.hide('bookmsg');
  
  }
  setTimeout('hidemsg()',5000)
 </script>
 <?  } ?>
 
<section class="container topspace">
		<div class="wrapper">
			<div class="detailsblock">
				<aside class="leftblock">
					<div class="details_top clearfix">
						<p class="left"><? echo $pro['title'] ?> <br /><?php echo $pro['name']?></p>
						<p class="right">&pound; <?php echo number_format( $pro['price'])?>  <?php echo $pro['priceUnit']?></p>
					</div>
					<div class="thumbslider">
						<div class="largeimg" id="tab1">
                        	<!--<img id="bigImg" src="<?php echo $site['url']?><?php echo $pImage['0']['image']?>" />-->
							<img id="bigImg" src="<? echo $site['url'] ?>application/imageThumb.php?image=<? echo  $site['root'].$pImage[0]['image'] ?>&newwidth=503&newheight=311" />
							
							
						</div>
						
						<div class="largeimg" id="tab2" style="display:none;">
						
						  <? $mapSrc= $site['url'].'application/broadMap.php'; ?>					 <iframe class="largeimg" id="iframeMapId" width="50%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<? echo $mapSrc?>"></iframe>
						 
						 <? 
						   $addressForMap=$pro['address'];
						    $infoForMap=$pro['address'];
						 ?>

                        <?  
					
					
						//$mapConfig['zoom']=12;
						//include('wtMap.php');
						//$prop[0]['address']= addslashes($pro['address']); $prop[0]['info']='';
						//wtPlot($prop);
					 	//wtCanvas('style="height:100%; width:100%;  "');  
						
						
						 
						?>
						</div>
						
						<div class="largeimg" id="tab3" style="display:none;">
                     <img title="Click to view larger image"   src="<?php echo $site['url']?><?php echo $pro['floorplan']?>" style="cursor:pointer;" onclick="popupURL('<?php echo $site['url']?>application/imagepopup.php?imglink=<?php echo $site['url']?><?php echo $pro['floorplan']?>')" />
						</div>
						<div class="largeimg" id="tab4" style="display:none;">
                        	 <img   src="<?php echo $site['url']?><?php echo $pro['EPC']?>" />
						</div>
						<div class="largeimg" id="tab5" style="display:none;">
                       <a href="<? echo $site['url']?>application/downloadProperty.php?propertyId=<? echo $propertyId; ?>"> <img   src="<?php echo $site['themePath']?>images/printDload.png" /></a>
						</div>
						<div class="largeimg" id="tab6" style="display:none;">
						<img   src="<?php echo $site['themePath']?>images/emailfriend.png" />
						<? include('emailToFriend.php'); ?>
                      
						</div>
						
						
						<div class="right-tabs">
							<ul>
								<li><a  href="javascript:printData('1');" id="tabL1" class="active"><span>Images</span></a></li>
								<li><a  href="javascript:printData('2');" id="tabL2" ><span>Map</span></a></li>
								<li><a  href="javascript:printData('3');" id="tabL3" ><span>Floor Plan</span></a></li>
								<li><a  href="javascript:printData('4');" id="tabL4" ><span>EPC</span></a></li>
								<li><a  href="javascript:printData('5');" id="tabL5" ><span>Print</span></a></li>
								<li><a  href="javascript:printData('6');" id="tabL6" ><span>E-mail</span></a></li>
							</ul>
						</div>
						<div class="thumbscroll" id="tbutton1">
						 <?   if(count($pImage)<=3){ ?>
						<style>
						/*.elastislide-wrapper nav span{ display:none  !important;}
						.elastislide-horizontal nav span{ display:none  !important;}*/
						.elastislide-horizontal nav span.elastislide-next{ display:none  !important;}
						.elastislide-horizontal nav span.elastislide-prev{ display:none  !important;}
			 
						
						</style>
						<? }?>
                        	<ul id="carousel" class="elastislide-list"   >
							<?  if(is_array($pImage)){ foreach($pImage as $pImg){
							    
							 ?>
							
                                <li><a href="javascript:void(0);">
								
								<!--<img src="<?php echo $site['url']?><?php echo $pImg['image']?>" alt="b&w" onclick="setBigImage(this);" style="height:91px; width:145px;"  />-->
								<img src="<? echo $site['url'] ?>application/imageThumb.php?image=<? echo  $site['root'].$pImg['image'] ?>&newwidth=503&newheight=311" alt="b&w" onclick="setBigImage(this);" style="height:91px; width:145px;"  />
								
								</a></li>
                                
								<? } } ?>
                            </ul>
							 
                            <script type="text/javascript" src="<?php echo $site['themePath']?>js/jquery.elastislide.js"></script>
                            <script type="text/javascript">
								$( '#carousel' ).elastislide();
							</script>
							 
                        </div>
						 
						<div class="thumbscroll-l" id="tbutton2" style="display:none; background:#FFFFFF;"> 
						<script>
						function setMapType(t)
						{
						 var src='<? echo $mapSrc; ?>';
						 var newsrc=src+'?&MapTypeId='+t+'&address=<? echo $addressForMap ?>';
						 os.getObj('iframeMapId').src=newsrc;
						  return false;
						}
						</script>
							<div>
							<div style="height:30px; clear:both;"> &nbsp;</div>
						  <input type="button" class="button" value="HYBRID" onclick="setMapType('HYBRID');"  />   &nbsp;
						  <input type="button" class="button" value="ROADMAP"  onclick="setMapType('ROADMAP');"  />  &nbsp;
						  <input type="button" class="button" value="SATELLITE"  onclick="setMapType('SATELLITE');" />   &nbsp;
						  <input type="button" class="button" value="STREET VIEW"  onclick="setMapType('STREETVIEW');"  />    &nbsp;
						  <script>
						  function testt()
						  {
						 // $('#iframeMapId').streetv('STREETVIEW');
						//  document.getElementById('iframeMapId').contentWindow.streetv('STREETVIEW');
						  }
						  
						  </script>
						  
						</div>
						
						</div>
						<div class="thumbscroll-l" id="tbutton3" style="display:none; background:#FFFFFF;"> 
						</div>
						<div class="thumbscroll-l" id="tbutton4" style="display:none; background:#FFFFFF;"> 
						</div>
						<div class="thumbscroll-l" id="tbutton5" style="display:none; background:#FFFFFF;"> 
						</div>
						<div class="thumbscroll-l" id="tbutton6" style="display:none; background:#FFFFFF;"> 
						</div>
					</div>
					<div class="description">
						<div class="left_des">
							<h4>Description</h4>
							<p style="text-align:justify;">
								<?php echo stripslashes($pro['fullDescription'])?>
							</p>
						</div>
						<div class="right_des">
							<div class="pinkblock"><a href="javascript:void(0);" onclick="showbookview()" ><span>Book Viewing</span><span class="icon"></span></a></div>
							<div class="whiteblock">020 8834 7030</div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
				</aside>
				<!--     modal boxx  -->
				<? include('jqueryModalScript.php'); ?>
				<script>  $(document).ready(function(){	
//$("#bookv").modal(); 
}); 

function showbookview()
{
 //var booksv=os.getObj('bookv');
os.show('bookv');

}
function hidebookview()
{

 os.hide('bookv');
}

</script>

<div id="bookv"   style="max-width:345px; z-index:5000; display:none; position:fixed; background:#a5003e; -webkit-border-radius: 5px; margin:auto; width:50%;
  -moz-border-radius: 5px;
  border-radius: 5px; border:2px solid #CCCCCC; z-index:5000;">
        <div class="modal_heading"><h2>Please fill-in the form bellow.</h2> <a class="modal_close" href="javascript:void(0);" onclick="hidebookview()">Close</a></div>
        <div class="modal_content" >
            <p>
			 
					
					<form class="footer_form" action="" method="post">
						<fieldset>
							<p>
								<label>Name</label>
								<input type="text" class="textfield1" name="name-v" id="name-v" />
							</p>
							<p>
								<label>Phone No.</label>
								<input type="text" class="textfield1" name="phone-v" id="phone-v" />
							</p>
							<p>
								<label>Email</label>
								<input type="text" class="textfield1" name="email-v" id="email-v" />
							</p>
							<p class="textarea_block">
								<label>Message</label>
								<textarea class="textarea1" name="msg-v" id="msg-v"></textarea>
							</p>
							<p class="submit_btn">
								<input type="submit" value="Send" class="button" />
								<input type="hidden" value="bookview" name="bookview" />
							</p>
						</fieldset>
					</form>
				 
				</p>
        </div>
        <div class="modal_footer">
        </div>
</div>
 
		<!--     modal boxx end  -->		
				
				
				
				<aside class="rightblock">
					<div class="calculate_mortage">
					<!--	<div class="corner"></div>-->
						<?  if($pro['type']!="Rent"){ ?>
						
						<div class="toptext">
						<script type="text/javascript" src="http://www.occfinance.com/intellicalc/intellicalc.aspx?aid=broadwaywest"></script>
<script type="text/javascript">
		intellicalc._searchurl = '<? echo $site['url'] ?>Sales/_100_%maxpurchase%_1';
		intellicalc.icbar_colors = '#7b0023,#850024,#8e0023,#a10023,#A02,#C20027'.split(',');
</script>
<script type="text/javascript">intellicalc.Banner();</script> 
							<!--<span>Calculate Mortage</span>-->
						</div>
						
						<? }else{ ?>
						<div  style="padding:20px;">
							<span> </span>
						</div>
						<? } ?>
						<div class="border">
							<div class="scrollbar">
								<div class="list2">
									<ul>
			 				
									
									
									<?
						while($pro=$os->mfa($prorsS))
{


                 $propertyId=$pro['propertyId'];
				 $pImage=$os->get_propertyimage(" active=1 and propertyId='$propertyId'  order by priority asc ,propertyImageId desc ");

?>
										<li>
											<div class="block">
												<h4><? echo $pro['title'] ?> <br /><?php echo $pro['name']?></h4>
												<div class="details1 clearfix">
													<div class="contents">
														<div class="iconsblock clearfix">
															<span class="bed"><?php echo $pro['bed']?></span>
															<span class="bath"><?php echo $pro['bath']?></span>
														</div>
														<div class="price">&pound; <?php echo  number_format( $pro['price'])?>  <?php echo $pro['priceUnit']?></div>
													</div>
													<div class="imgblock">
													<a href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>">
													 
													<img src="<? echo $site['url'] ?>application/imageThumb.php?image=<? echo  $site['root'].$pImage[0]['image'] ?>&newwidth=138&newheight=73" />
													
													</a></div>
												
												</div>
											</div>
										</li>
										
										
										
										<? 
}
 ?>
										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</aside>
				<div class="clear"></div>
			</div>
		</div>
	</section>
	<script>
	function setBigImage(io)
	{
		os.getObj('bigImg').src=io.src
	}
	
	function printData(id)
	{
	var tabids='tab'+id;
	var tabidLs='tabL'+id;
	var tbuttons='tbutton'+id;
	
	var tabid='';
	var tabidL='';
	var tbutton='';
	os.show(tabids);
	os.show(tbuttons);
	os.getObj(tabidLs).className='active';
	 for(var i=1; i<=6; i++)
	 {
	     tabid='tab'+i;
	     tabidL='tabL'+i;
		 tbutton='tbutton'+i;
		 
		 if(id!=i)
		 {
		  os.hide(tabid);
		  os.hide(tbutton);
		  os.getObj(tabidL).className='';
		 
		 }
		 
		 if(id==2 && i==2 )
		 {
		    
		  iframeMap('<? echo $addressForMap ?>','<? echo $infoForMap ?>');
		 }
	 
	 }
	
	}
	</script>
	<script>
	function iframeMap(address,info){
		var mapurl='<? echo $site['url']?>application/broadMap.php?address='+address+'&info='+info;
	//alert(mapurl);
	     os.getObj('iframeMapId').src=mapurl;
	}
	<? if($_POST['sendmail']=='sendmail'){?>
	printData('6')
	
	<? } ?>
	</script>
	
	