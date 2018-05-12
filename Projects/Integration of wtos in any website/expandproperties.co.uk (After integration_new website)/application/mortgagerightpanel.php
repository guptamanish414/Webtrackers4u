<aside class="rightblock">
                	<div class="search_fields">
                     	<div class="top_field">
					<h4>Property Search</h4>
					<p>
						<input type="radio" id="typeRent" value="Sales" name="type-p" onclick="setPriceRange('Lettings');"   /><label for="rent">Rent</label>
						<input type="radio" id="typeBuy"  value="Lettings" name="type-p" onclick="setPriceRange('Sales');"   />
						
						
						<label for="buy">Buy</label>
						 
					</p>
					<div class="clear"></div>
				</div>
				<div class="fields_block">
					<form class="form_field">
						<fieldset>
							<p><input type="text" class="textfield" placeholder="Location" name="location" id="location" /><span style="cursor:pointer;" onclick="showLoc()" class="add_ico"></span>
							<div id="locArea" style="height:60%; width:100%; background:#a5003e;  position:absolute; z-index:500; display:none; color:#FFFFFF; padding:15px 10px 10px 10px ; font:normal 14px/14px fontin_sans_crregular;">&nbsp; 
							
							<div style="width:45%;  float:left; ">
							<? $locations=$os->get_propertylocation(" active=1",'',' 0,6');
							
							foreach($locations as $loc){
							?>		
							<div style=" padding:5px 0px 5px 0px;">				  
							<input type="radio" id="loc<? echo $loc['propertylocationId'] ?>" value="<? echo $loc['title'] ?>" name="loc"  onclick="setLoc('<? echo $loc['title'] ?>')"  /> <? echo $loc['title'] ?> 
							</div>
							<?
							}
							?>
							</div>
							
							<div style="width:50%;  float:right; ">
							<? $locations=$os->get_propertylocation(" active=1",'',' 6,6');
							
							foreach($locations as $loc){
							?>							  
							<div style="padding:5px 0px 5px 0px;  ">				  
							<input type="radio" id="loc<? echo $loc['propertylocationId'] ?>" value="<? echo $loc['title'] ?>" name="loc" onclick="setLoc('<? echo $loc['title'] ?>')"   /> <? echo $loc['title'] ?> 
							</div>
							<?
							}
							?>
							
							
							<div style="clear:both;">&nbsp; </div>
						 
							<p class="submit_btn" style="padding-right:27px;">
								<input type="button" value="Close" class="button" onclick="hideLoc()" />
								 
							</p>
							
							</div>
							
							</div>
							
							</p>
							<h3>Price <span id="priceUnit">(p/w)</span></h3>
						
							
							
							<p id="letFromPriceHolder" style="display:'';">
						 <select class="styled"  name="fromPrice" id="fromPrice">
							<option value="100">From</option>
								<option  value="100">&pound;100 </option>
								<option  value="200">&pound;200</option>
								<option  value="300">&pound;300</option>
								<option  value="400">&pound;400</option>
								<option  value="500">&pound;500</option>
								<option  value="600">&pound;600</option>
								<option  value="700">&pound;700</option>
								<option  value="800">&pound;800</option>
								<option  value="900">&pound;900</option>
								<option  value="1000">&pound;1,000</option>
								
							</select>
							</p>
							<p id="letToPriceHolder" style="display:'';">
							<select class="styled"  name="toPrice" id="toPrice">
							<option>To</option>
								<option  value="100">&pound;100 </option>
								<option  value="200">&pound;200</option>
								<option  value="300">&pound;300</option>
								<option  value="400">&pound;400</option>
								<option  value="500">&pound;500</option>
								<option  value="600">&pound;600</option>
								<option  value="700">&pound;700</option>
								<option  value="800">&pound;800</option>
								<option  value="900">&pound;900</option>
								<option  value="1000">&pound;1,000</option>
								<option  value="0">No Limit</option>
							</select>
							</p>
							<p id="buyFromPriceHolder" style="display:none;">
							<select class="styled"  name="fromPriceBuy" id="fromPriceBuy">
							<option>From</option>
										 <option value="100000">&pound;100,000</option>
  <option value="150000">&pound;150,000</option>
  <option value="200000">&pound;200,000</option>
  <option value="250000">&pound;250,000</option>
  <option value="300000">&pound;300,000</option>
  <option value="350000">&pound;350,000</option>
  <option value="400000">&pound;400,000</option>
  <option value="450000">&pound;450,000</option>
  <option value="500000">&pound;500,000</option>
  <option value="750000">&pound;750,000</option>
  <option value="1000000">&pound;1,000,000</option>
  <option value="1500000">&pound;1,500,000</option>
  <option value="2000000">&pound;2,000,000</option>
  <option value="2500000">&pound;2,500,000</option>
  <option value="3000000">&pound;3,000,000</option>
  <option value="3500000">&pound;3,500,000</option>
  <option value="4000000">&pound;4,000,000</option>
  <option value="4500000">&pound;4,500,000</option>
  <option value="5000000">&pound;5,000,000</option>
							</select>
							</p>
							<p id="buyToPriceHolder" style="display:none;">
							<select class="styled"  name="toPriceBuy" id="toPriceBuy">
							<option>To</option>
									    	<option value="100000">&pound;100,000</option>
										  <option value="150000">&pound;150,000</option>
										  <option value="200000">&pound;200,000</option>
										  <option value="250000">&pound;250,000</option>
										  <option value="300000">&pound;300,000</option>
										  <option value="350000">&pound;350,000</option>
										  <option value="400000">&pound;400,000</option>
										  <option value="450000">&pound;450,000</option>
										  <option value="500000">&pound;500,000</option>
										  <option value="750000">&pound;750,000</option>
										  <option value="1000000">&pound;1,000,000</option>
										  <option value="1500000">&pound;1,500,000</option>
										  <option value="2000000">&pound;2,000,000</option>
										  <option value="2500000">&pound;2,500,000</option>
										  <option value="3000000">&pound;3,000,000</option>
										  <option value="3500000">&pound;3,500,000</option>
										  <option value="4000000">&pound;4,000,000</option>
										  <option value="4500000">&pound;4,500,000</option>
										  <option value="5000000">&pound;5,000,000</option>
										  <option value="0" selected="selected">No Limit</option>
							</select>
							</p>
							
							
							<h3>Minimum Bedrooms</h3>
							<p ><select class="styled"  name="bed" id="bed" >
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							</select></p>
							<p class="submit_btn"><input type="button" class="button" value="Search" onclick="searchProp()" /></p>
						</fieldset>
						
						<script>
						function searchProp()
						{
						  	var type='Sales';
							var fromPrice=os.getVal('fromPrice').replace('From','');
							var toPrice=os.getVal('toPrice').replace('To','');
							
							if(os.getObj('typeRent').checked){
								type='Lettings';
								fromPrice=os.getVal('fromPrice').replace('From','');
								toPrice=os.getVal('toPrice').replace('To','');
							 }
							if(os.getObj('typeBuy').checked){
								type='Sales';
								fromPrice=os.getVal('fromPriceBuy').replace('From','');
								toPrice=os.getVal('toPriceBuy').replace('To','');
							
							}
							
							var locationV=os.getVal('location');
							var bedV=os.getVal('bed');
								
							var vars=  locationV+'_'+fromPrice+'_'+toPrice+'_'+bedV;
						    window.location='<? echo $site['url']; ?>'+type+'/'+vars;
							
							 
						}
						function showLoc()
						{
						  os.show('locArea');
						}
						function hideLoc()
						{
						  os.hide('locArea');
						}
						function setLoc(locName)
						{
						 os.setVal('location',locName);
						
						}
						
						function setPriceRange(k)
						{
						 
						 
						  if(k=='Sales')
						  {
						 
						       
						     os.setHtml('priceUnit','');
							
							os.show('buyFromPriceHolder');
							os.show('buyToPriceHolder');
							os.hide('letFromPriceHolder');
							os.hide('letToPriceHolder');
							 
							 
						 
						 
						  }
						  
						  if(k=='Lettings')
						  {
								os.setHtml('priceUnit','(p/w)'); 
							
							os.hide('buyFromPriceHolder');
							os.hide('buyToPriceHolder');
							os.show('letFromPriceHolder');
							os.show('letToPriceHolder');
							
							 
							 
							  
						  }
						 
						}
						 
						
						</script>
					</form>
					<div class="bottom_shadow"><span></span></div>
				</div>
                    </div>
					
                    <div class="box_block2">
<? 
$frecent=$os->get_property(" active='1' and Featured='Featured Rentals' " , ' propertyId desc');
$frecentId=$frecent[0]['propertyId'];
$frecentImg=$os->get_propertyimage(" active=1 and propertyId='$frecentId' order by priority asc ,propertyImageId desc");
?>
					
                        <h4>Recently Added</h4>
                        <figure><a href="<? echo $site['url'] ?>property/<? echo $frecent[0]['seoId'] ?>"  >
						
							<img src="<? echo $site['url'] ?>application/imageThumb.php?image=<? echo  $site['root'].$frecentImg[0]['image'] ?>&newwidth=273&newheight=168" />
						<!--<img src="<?php echo $site['url']?><?php echo $frecentImg[0]['image']?>" />--></a></figure>
                        <article>
                            <div class="top_block">
                                <span class="left">For  <?php echo ($frental[0]['type']=='Buy')?'Sale':'Rent';?></span>
                                <span class="right">&pound; <?php echo $frecent[0]['price']?> <?php echo $frecent[0]['priceUnit']?></span>
                            </div>
                            <div class="pro_text">
                               <?php echo $frecent[0]['title']?>  <?php echo $frecent[0]['name']?>  
                            </div>
                            <div class="bottom_block">
                                <div class="left">
                                   <span class="bed"><?php echo $frecent[0]['bed']?>   </span>
								<span class="bath"><?php echo $frecent[0]['bath']?>   </span>
								<span class="sofa"><?php echo $frecent[0]['sofa']?>   </span>
                                </div>
                                <div class="right"><a class="button1" href="<? echo $site['url'] ?>property/<? echo $frecent[0]['seoId'] ?>"><span>Details</span></a></div>
                            </div>
                        </article>
                        <div class="shadow1"></div>
                    </div>
                </aside>