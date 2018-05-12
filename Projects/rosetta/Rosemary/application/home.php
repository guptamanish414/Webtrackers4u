<?
$os->wtosHome = $os->get_pagecontent ( "active=1 and pagecontentId='" . $os->getSettings ( 'homePageId' ) . "'" );

$os->wtospage = $os->wtosHome [0];
$pageBody = preg_replace ( '/src=\".*?wtos-images/', 'src="' . $site ['url'] . "wtos-images", stripslashes ( $os->wtospage ['content'] ) );
$pageBody = $os->replaceWtBox ( $pageBody );
echo stripslashes ( $os->wtospage ['pageCss'] );
?>


<div class="banner-area clearfix">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8">
				<div class="banner">
					<div id="myCarousel" class="carousel slide">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
                        	<? $qu = "select title,image  from banner where type = 'ShopHomeBanner' AND status = 'Active' ORDER BY type ASC ";
								$re = $os->getMe($qu);
								$counter = 0;
							foreach($re as $value){
								//_d($value);
								
							?>
                            <? if($counter ==  0){ ?>
							<div class="item active">
								<img src="<?  echo $value['image']?>"	alt="<?  echo $value['title']?>" />
							</div>
                            <? }else{?>
                            
                            <div class="item">
								<img src="<?  echo $value['image']?>"	alt="<?  echo $value['title']?>" />
							</div>
                            
                            <? } $counter ++ ; }?>
                            
							<!--<div class="item">
								<img src="<?php echo $site['themePath'];?>images/banner1.jpg"
									alt="rosette-banner2" />

							</div>
							<div class="item">
								<img src="<?php echo $site['themePath'];?>images/banner2.jpg"
									alt="rosette-banner3" />
							</div>-->
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#myCarousel"
							data-slide="prev"> <span class="icon-prev"></span>
						</a> <a class="right carousel-control" href="#myCarousel"
							data-slide="next"> <span class="icon-next"></span>
						</a>
					</div>
				</div>
				<div class="clear"></div>
				<div class="brands_scroll clearfix">
					<!-- Slides Container -->
					<div id="slider1_container"
						style="position: relative; top: 0px; left: 0px; width: 750px; height: 100px; overflow: hidden;">
						<!-- Slides Container -->
                        <img src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate.jpg" alt=""/>
						<!--<div u="slides"
							style="cursor: move; position: absolute; left: 0px; top: 0px; width: 750px; height: 100px; overflow: hidden;">
							<div>
								<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate1.jpg" />
							</div>
							<div>
								 <img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate2.jpg" />
							</div>
							<div>
								<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate3.jpg" />								
							</div>
							<div>
                            	<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate4.jpg" />								
							</div>
							<div>
                            	<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate5.jpg" />
							</div>
							<div>
                            	<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate6.jpg" />
							</div>
							<div>
                            	<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate7.jpg" />
							</div>
                            <div>
                           		<img u="image" alt="rosette"
									src="<?php echo $site['themePath'];?>images/rosette_Rosemary_Dark_Chocolate8.jpg" />
							</div>
						</div>-->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="home-right">
					<div class="search-sec">
						<h2>Quick Search</h2>

						<ul>
							<li><select name="category" id="category">
									<option value="">Select Category</option>
                            <?php
                            
								$os->optionsHTML ( $pageData ['parentId'], 'productcategoryId', 'title', 'productcategory','parentId >0' );
							?>
                        </select></li>
                        
<!-- 							<li><select> -->
<!-- 									<option>Department</option> -->
<!-- 									<option>Brand</option> -->
<!-- 									<option>Brand</option> -->
<!-- 							</select></li> -->
<!-- 							<li><select> -->
<!-- 									<option>Size</option> -->
<!-- 									<option>Brand</option> -->
<!-- 									<option>Brand</option> -->
<!-- 							</select></li> -->
<!-- 							<li><select> -->
<!-- 									<option>Price</option> -->
<!-- 									<option>Brand</option> -->
<!-- 									<option>Brand</option> -->
<!-- 							</select></li> -->
							<li><input class="form-control" type="text" id="srchKeyword" name="product"></li>
							<li><input type="submit" value="search" onclick="keywordSearch()" name="submit"></li>
							<div id="serachMsg" style="color:#FF2424;"></div>
						</ul>
					</div>
					<script>
							//alert("heeee");
                        	function keywordSearch(){
								if(os.getVal('srchKeyword')!=''){
									os.setHtml('serachMsg','');
									var kwrd = os.getVal('srchKeyword');
									//kwrd = encodeURIComponent(kwrd);
									var sUrl='<?php echo $site['url'];?>Products/Serach_Keyword='+kwrd;									
									window.location=sUrl;
								}
								else{
									os.setHtml('serachMsg','Please enter something to search');
								}	
							}
							
							function resetKeywordSearch(){
								os.setVal('srchKeyword','');
								window.location='<?php echo $site['url'];?>Products';
							}
                        </script>
					<div class="add-banner">							 
						<img src="<?php echo $site['themePath'];?>images/homeSideBanner.JPG" />
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="prodect_gride prodect_gride_home">
	<div class="container">
		<div class="row">
		<?php
			// Home page dislapy featured products
			
			
			//$productId = $featuredProduct['imageTypeId'];
			$q = "select name, seoId,productId from product  where featured='show in home'  AND active = 'Active' LIMIT 4";
			$pRs = $os->mq($q);
			while ($pName = $os->mfa($pRs))
			{
				$productId = $pName['productId'];
				
				$featuredProduct = "SELECT title,image FROM image WHERE imageTypeId= $productId AND featured='Yes' AND active='1' ORDER BY image DESC LIMIT 4 ";
				$bbRs = $os->mq( $featuredProduct );
				$productImg = $os->mfa($bbRs);
				$img = $productImg['image'];
				$catIdsA = $os->getMe ( "SELECT productcategoryId FROM productcategorymap WHERE productId IN($productId)" );
				$catId = $catIdsA[0][productcategoryId];
				//_d($catIdsA[0][productcategoryId]);
				$categoryName = $os->getMe ( "SELECT title FROM productcategory WHERE productcategoryId = $catId");
				//_d($categoryName);
		?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				<div class="images">
					<a href="<?php echo $site['url'];?>Products/<?php echo $categoryName[0][title];?>">
                    <img src="<?php echo $img;?>" alt="" />
						<span class="cata_name"><?php echo $categoryName[0][title]; ?></span></a>
				</div>
			</div>
			
			<?php }?>
			</div>
		<div class="about_text_block">
			<h2><?php echo $os->wtospage['heading'];?></h2>
			<p><? echo $pageBody; ?></p>
		</div>
	</div>
</div>

