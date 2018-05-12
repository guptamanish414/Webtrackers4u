<?

global $pageVar;

global $os;

$pageC = trim ( $pageVar ['segment'] [1] );

//if ($pageC == 'Sales') {

//	$type = 'Buy';

//}

//if ($pageC == 'Lettings') {

//	$type = 'Rent';

//}

$type = 'Rent';



if ($pageC == 'salesResidential') {

	$type = 'Buy';

	$PurposeType = "Residential";

}



if ($pageC == 'salesCommercial') {

	$type = 'Buy';

	$PurposeType = "Commercial";

}

if ($pageC == 'salesDubaiProperties') {

	$type = 'Buy';

	$PurposeType = "Dubai Properties";

}

if ($pageC == 'lettingResidential') {

	$type = 'Rent';

	$PurposeType = "Residential";

}

if ($pageC == 'lettingCommercial') {

	$type = 'Rent';

	$PurposeType = "Commercial";

}



if ($type != '') {

	$andType = " and type='$type'";

}



if ($PurposeType != '') {

	$andPurposeType = " and purposeType='$PurposeType'";

	// _d($andPurposeType);

}



$search = trim ( $pageVar ['segment'] [2] );

// _d($search);

if ($search != '') {

	$searchA = explode ( '_', $search );

	

	if ($searchA [0] != '') {

		$locationId = $os->getByFld ( 'propertylocation', 'title', $searchA [0], 'propertylocationId' );

		

		$andLocation = " and locationId='$locationId'";

	}

	

	if ($searchA [1] > 0) {

		

		$andPriceFrom = " and price>='" . $searchA [1] . "'";

	}

	

	if ($searchA [2] > 0) {

		

		$andPriceTo = " and price<='" . $searchA [2] . "'";

	}

	

	if ($searchA [3] != '') {

		

		$andMinBed = " and bed>='" . $searchA [3] . "'";

	}

	

	$andSearch = " $andLocation  $andPriceFrom $andPriceTo  $andMinBed";

}

$proQuery = " select * from property where propertyId>0 and active=1 $andType  $andSearch $andPurposeType order by price desc  ";

 //_d($proQuery);

$prors = $os->mq ( $proQuery );





?>

<div class="listing_page">

<div class="container">

<div class="row">

    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">

        <div class="row-fluid">

                <?php 

                    $pc = 0;

                    while ( $pro = $os->mfa ( $prors ) ) {

                        

                     $pc ++;

                     $propertyId = $pro ['propertyId'];

                     $pImage = $os->get_propertyimage ( " active=1 and propertyId='$propertyId'  order by priority asc ,propertyImageId desc" );

                     //_d($pImage[0]['image']);

                     //_d($pro);

                ?>

            

            

            <div class="block"  data-rotate-y="270deg" data-move-x="-150%">

                <div class="property-listing clearfix">

                <div class=" col-md-5">

                <div class="listing-image">

                    <a href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>"><img src="<? echo $site['url'] ?><? echo $pImage[0]['image'];?>" class="img-thumbnail"/></a>

                   <? if ($pro['label'] != ''){?>

                    <span class="box-type"><span class="text"><?php echo $pro['label']?></span></span>

                    <? }?>

                </div>

            </div>

                <div class=" col-md-7 listing-info">

                <div class="listing-title">

                    <a href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>" title="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>""><? echo $pro['title'] ?></a>

                    <i class="icon-heart"></i>

                </div>

                <div class="listing-content">

                    <div class="listing-property-price">

                        <sup class="price-curr"><? echo $GLOBALS['currency']; ?></sup><?php echo  number_format( $pro['price'])?>  <?php echo $pro['priceUnit']?>&nbsp;

                        <span class="price-postfix"></span>

                    </div>

                    <div class="listing-excerpt">

                        <p><? echo substr($pro['fullDescription'], 0, 150);?>...</p>

                    </div>

                </div>

                <div class="listing-meta">

                    <ul>

                        <li class="meta-size"><img src="<?php echo $site['themePath']?>images/Sofa.png"/> <?php echo $pro['reception']?></li>

                        <li class="meta-bedroom"><img src="<?php echo $site['themePath']?>images/icon-bed.png"/> <?php echo $pro['bed']?></li>

                        <li class="meta-bathroom"><img src="<?php echo $site['themePath']?>images/icon-bath.png"/><?php echo $pro['bath']?></li>

                    </ul>

                </div>

            </div>

                <div class="property-status">For <? echo $type ;?></div>

            </div>

            </div>

            

            <?

                }

                if ($pc == 0){

            ?>

                <div class="property-listing clearfix">No property found.</div>

    

            <?

                }

            ?>

            

        </div>

        <div class="text-center">

            <!--<ul class="pagination">

                <li class="disabled"><a href="#">&laquo;</a></li>

                <li class="active"><a href="#">1</a></li>

                <li><a href="#">2</a></li>

                <li><a href="#">3</a></li>

                <li><a href="#">4</a></li>

                <li><a href="#">5</a></li>

                <li><a href="#">&raquo;</a></li>

           </ul>-->

        </div>

        

    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

        <div class="block" data-move-y="200px" data-move-x="100px">

            <div class="search_box">

            <? include('rightCol.php');?>

            

        </div>

        </div>

        

        <div class="block" data-move-y="200px" data-move-x="100px">

             <div class="search_box">

                <? include('featProperty.php');?>

            </div>

        </div>

    </div>

</div>

</div>



</div>









<script>

	var tAdd='';

	 

	function selectPro(d,address,info)

	{

	//   alert(address);

	  

	   d.className='details selected';

	   

	   if(tAdd!=address){

	 //  codeAddress(address,info)

	   iframeMap(address,info);

	   }

	    tAdd=address;

	}

	function deselectPro(d)

	{

	      d.className='details';

	}

	function iframeMap(address,info){

	

	var mapurl='<? echo $site['url']?>application/broadMap.php?address='+address+'&info='+info;

	 

	     os.getObj('iframeMapId').src=mapurl;

	}

	iframeMap('','');

	</script>

