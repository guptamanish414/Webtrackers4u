 <?php
$pageBody=preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($os->wtospage['content']));
$pageBody=$os->replaceWtBox($pageBody);
echo stripslashes($os->wtospage['pageCss']); 
?>
<div class="container">
<?php echo $pageBody; ?>
</div>
        	
            	
                
            
        