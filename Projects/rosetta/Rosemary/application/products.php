
<div class="prodect_page">
	<div class="">
		<div class="row">
					<?php include ('leftCol.php'); ?>
					
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="prodect_right_grupe">
								<?php
								/*// Body Banner
								$bbQ = "SELECT image,link FROM banner WHERE type='Body' AND status='Active' ORDER BY RAND() LIMIT 1";
								$bbRs = $os->mq ( $bbQ );
								$bodyBanner = $os->mfa ( $bbRs );*/
								?>
				            <?php //if(is_array($bodyBanner)){?>
							
							<h2><?php // echo  $bodyBanner['title'] ?></h2>
					<div class="prodect_cata_image">
						<!--<img src="<?php //echo $site['url'].$bodyBanner['image'];?>" alt="" />-->
                        <img src="<?php echo $site['themePath'];?>images/bodyBanner.jpg" alt="rosette" />
					</div>
							 <?php // }?>  
							<!--<div class="shorting clearfix">

						<select class="short_by pull-left">
							<option selected>Sort By</option>
							<option>Name</option>
							<option>Brand</option>
						</select>
						<div class="pagination">

							<ul class="clearfix">
								<li><i class="fa fa-angle-left"></i></li>
								<li class="current-pagination">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li>...</li>
								<li><a href="#">10</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
					</div>-->
					<div class="prodect_list_grupe clearfix">
							<?php
							global $pageVar, $keywordWhr;
							
							$catWhr = '';
							$feaWhr = '';
							if(isset($pageVar['segment'][2]) && $pageVar['segment'][2]!='' && $pageVar['segment'][2]!='All'){
								if(strpos($pageVar['segment'][2],'Serach_Keyword=')!==false){}else{
								$cat=$pageVar['segment'][2];
								$cat = explode('+',$cat);$cat = implode('\',\'',$cat);
								
								$catIdsA = $os->getMe("SELECT GROUP_CONCAT(productcategoryId) AS catIds FROM productcategory WHERE title IN('$cat')");
								$catIds='';$pIds='';
								if(is_array($catIdsA)){$catIds = $catIdsA[0]['catIds'];}
								if($catIds!=''){		
									$pIdsA = $os->getMe("SELECT GROUP_CONCAT(productId) AS pIds FROM productcategorymap WHERE productcategoryId IN($catIds)");
									if(is_array($pIdsA)){$pIds = $pIdsA[0]['pIds'];}
									
								}
								if($pIds!=''){$catWhr = "AND productId IN($pIds)";}else{$catWhr = "AND productId<0";}
								}
								
							}
							
							if (isset ( $pageVar ['segment'] [3] ) && $pageVar ['segment'] [3] != '') {
								
								$fea = $pageVar ['segment'] [3];
								$fea = explode ( '+', $fea );
								$fea = implode ( '\',\'', $fea );
								$feaIdsA = $os->getMe ( "SELECT GROUP_CONCAT(productfeatureId) AS feaIds FROM productfeature WHERE title IN('$fea')" );
								$feaIds = '';
								$pIds = '';

								if (is_array ( $feaIdsA )) {
									$feaIds = $feaIdsA [0] ['feaIds'];
								}
								if ($feaIds != '') {
									$pIdsA = $os->getMe ( "SELECT GROUP_CONCAT(productId) AS pIds FROM productfeaturemap WHERE productfeatureId IN($feaIds)" );
									if (is_array ( $pIdsA )) {
										$pIds = $pIdsA [0] ['pIds'];
									}
								}
								if ($pIds != '') {
									$feaWhr = "AND productId IN($pIds)";
								} else {
									$feaWhr = "AND productId<0";
								}
							}
							
							$q = "SELECT productId,ourPrice,name,seoId,oldPrice FROM product WHERE productId>0 $catWhr $feaWhr $keywordWhr AND active='Active' ORDER BY orders ASC,productId DESC";
							$rs = $os->mq ( $q );

							
							?>

				
				<?php
				$i = 0;
				while ( $row = $os->mfa ( $rs ) ) {
					$i ++;
					$productId = $row ['productId'];
					$noImg = $site ['themePath'] . 'images/no_image_product.png';
					$img = '';
					$imgTitle = '';
					$imgA = $os->getMe ( "SELECT title,image FROM image WHERE imageType='Product' AND imageTypeId=$productId AND featured='Yes' AND active=1 LIMIT 1" );
					if (is_array ( $imgA ) && count ( $imgA ) > 0) {
						$imgA = $imgA [0];
						$img = $site ['url'] . $imgA ['image'];
						$imgTitle = $imgA ['title'];
						$productName = $row['name'];
					}
					$imgTitle = ($imgTitle != '') ? $imgTitle : $row ['name'];
					$img = ($img != '') ? $img : $noImg;
					?>
								<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 inline_block">
							<div class="prodect_list">
								<a
									href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"
									class="list-product-image"><img src="<?php echo $img;?>"
									" alt="" class="prodect_image"></a>
								<div class="list-product-details">
									<h4>
										<a
											href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>""><?php echo $productName;?></a>
									</h4>
									<h3>Now: <? echo $os->currency?><?php echo $row['ourPrice'];?></h3>
                                    <? if($row['oldPrice'] != '0.00'){ 
										$youSaved = $row['oldPrice'] - $row['ourPrice'];
										$youSaved = number_format($youSaved,2);
										$saveInPe = ($youSaved /$row['oldPrice'])*100 ;
										$saveInPe = number_format($saveInPe,2);
									?>
                                    	
                                    <h5>RRP:<? echo $os->currency?><?php echo $row['oldPrice'];?></h5>
                                    <h5>You Save <? echo $os->currency?><?php echo $youSaved ;?> (<?php echo $saveInPe?>%)</h5>
                                    <? }?>
									<a
										href="<?php echo $site['url'];?>product-details/<?php echo $row['seoId'];?>"
										" class="view_details">View Details &#10095; &#10095;</a>
								</div>
							</div>
						</div>
								<?php }?>
				<?php if($i==0){?>
				<div class="no_product">
                	<a href="<?php echo $site['url'];?>" style="margin-left:30%"
									class="list-product-image"><img src="<?php echo $site['themePath'];?>images/noProducts.png"
									" alt="" class="prodect_image"></a>
                </div>
				<?php }?>
								
							</div>
					<div class="shorting shorting-btm clear">
						<!--<label>View Products Per Page</label> <select class="short_by">
							<option>15</option>
							<option>25</option>
							<option>30</option>
						</select>
						<div class="pagination">
							<ul>
								<li><i class="fa fa-angle-left"></i></li>
								<li class="current-pagination">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li>...</li>
								<li><a href="#">10</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>