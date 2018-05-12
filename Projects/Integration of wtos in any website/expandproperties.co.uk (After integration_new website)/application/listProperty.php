<?

global $pageVar;

global $os;

$pageC = trim ( $pageVar ['segment'] [1] );

if ($pageC == 'Sales') {

  $type = 'Buy';
   
}

if ($pageC == 'Lettings') {

  $type = 'Rent';
   

}

if ($pageC == 'properties') {

    $type = '';
    $PurposeType = '';
  
}


//$type = 'Rent';



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

//   _d($search);
 
if ($search != '') {

    $searchA = explode ( '_', $search );

   // _d($searchA);

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

        

        $andPurposeType = " and purposeType='" . $searchA [3] . "'";

    }



     if ($searchA [4] == 'Lettings') {

        
        $type = 'Rent';
        $andType = " and type='$type'";

    }

    if ($searchA [4] == 'Sales') {

        
        $type = 'Buy';
        $andType = " and type='$type'";

    }

    

    $andSearch = " $andLocation  $andPriceFrom $andPriceTo  $andMinBed";

// _d($andSearch);

}

$proQuery = " select * from property where propertyId>0 and active=1 $andType  $andSearch $andPurposeType order by price desc  ";

 //_d($proQuery);

$prors = $os->mq ( $proQuery );





?>

<div class="listing_page">
        <div class="container">
            <div class="row block_r">
                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 left_site">

                    <div class="listing_block">

                         <?php 

                            $pc = 0;

                            while ( $pro = $os->mfa ( $prors ) ) {

                                

                             $pc ++;

                             $propertyId = $pro ['propertyId'];

                             $pImage = $os->get_propertyimage ( " active=1 and propertyId='$propertyId'  order by priority asc ,propertyImageId desc" );

                             //_d($pImage[0]['image']);

                             //_d($pro);

                        ?>

                        <article class="property-item  clearfix">
                            <div class="top_block clearfix">
                                <figure>
                                    <a href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>">
                                        <img src="<? echo $site['url'] ?><? echo $pImage[0]['image'];?>" class="image"> 
                                       <!-- <span class="box-type"><span class="text"> <?php // echo $pro['label']?></span></span> -->
                                        <span class="text_meta"><?php echo $pro['label']?></span>
                                    </a>
                                </figure>
        
                                <div class="detail">
                                    <h3><a href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>">  <? echo $pro['title'] ?> </a></h3>
                                    <h5 class="price"><? echo $GLOBALS['currency']; ?> <?php echo  number_format( $pro['price'])?>  <?php echo $pro['priceUnit']?></h5>
                                    <p class="text_des"><? echo substr($pro['fullDescription'], 0, 150);?>...</p>
                                    <a class="more-details" href="<? echo $site['url'] ?>property/<? echo $pro['seoId'] ?>">More Details <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                            <ul class="property-meta clearfix">
                                
                                <li><img src="<?php echo $site['themePath']?>images/icon-recept.png"> <span> <?php echo $pro['sofa']?>&nbsp;Reception</span></li>
                                <li><img src="<?php echo $site['themePath']?>images/icon-bed.png"> <span> <?php echo $pro['bed']?>&nbsp;Bedrooms</span></li>
                                <li><img src="<?php echo $site['themePath']?>images/icon-bath.png"> <span> <?php echo $pro['bath']?>&nbsp;Bathrooms</span></li>

                            </ul>
                            <?
                                if ($pro['type'] !='') {

                                    if ($pro['type'] == 'Buy') {
                                         
                                         $labelType = 'For Sale';
                                    }
                                    if ($pro['type'] == 'Rent') {
                                         
                                         $labelType = 'For Letting';
                                    }

                                                                     
                            ?>

                            <div class="property-status"><? echo $labelType ;?></div>

                            <? } ?>
                        </article>

                        
                        <?

                            }

                            if ($pc == 0){

                        ?>

                            <div class="notfound"> <img src="<?php echo $site['themePath']?>images/property_not_found.png"  alt="" />  </div>

                

                        <?

                            }

                        ?>



                    </div>
                </div>



                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 right_site">
                    
                     

                     <? include('rightCol.php') ?>


                    <div class="Featured_Properties">


                    <? include('featProperty.php') ;?>

                    
                    </div>
                    
                    <div class="clear"></div>

                     
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

