<?php
$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));
$pageBody=$os->replaceWtBox($pageBody);
//echo stripslashes($os->wtospage['pageCss']); 
?>
<!--   center area  start--->
<div class="main">
<?php if($os->wtospage['heading']!=''){?>	  
    <h1><?php echo $os->wtospage['heading'];?></h1> 
    <div class="clr"></div>
      <div class="line"></div>
<?php }?>   
    <?php if($os->wtospage['preInclude']!='' && file_exists(inclPath('application').'/'.$os->wtospage['preInclude']) ){?> 
    <?php include(inclPath('application').'/'.$os->wtospage['preInclude']);?>
    <?php } ?>   		
    <?php echo $pageBody; ?>   
    <?php if($os->wtospage['postInclude']!='' && file_exists(inclPath('application').'/'.$os->wtospage['postInclude']) ){?> 
    <?php include(inclPath('application').'/'.$os->wtospage['postInclude']);?>
    <?php } ?>		
</div>				
<!--   center area  end--->
