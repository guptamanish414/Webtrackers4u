<?php

$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));

$pageBody=$os->replaceWtBox($pageBody);

//echo stripslashes($os->wtospage['pageCss']); 

?>

 <div class="sub_banner">
        <div class="pag_titl_sec">
            <h1 class="pag_titl"><?php echo $os->wtospage['heading'];?></h1>

            <h4 class="sub_titl"> Service You Deserve. People You Trust </h4>
        </div> 
    </div>

    <?  echo $pageBody; ?>
    
    
    
