<?php
/* 
global $pageVar,$os;
	if(is_array($pageVar['segment']) && count($pageVar['segment'])>0){
		$checkedArr =$pageVar['segment'];	
		$checkedStr =$pageVar['segment'][3];
	}
	 
	$categoryName=$pageVar['segment'][2];
	$categoryfeatureIds=$os->getByFld('productcategory','title',$categoryName,'featureIds');
	 
	 
	$categoryfeatureIds='0'.$categoryfeatureIds.'0';
	
	*/
?>
<?php $nop=1;?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
 
	<div class="filter_left" style="color:#000000">
    
    <img src="<?php echo $site['themePath'];?>images/leftSide.jpg" alt="rosette"/>
	<!--<input type="hidden" id="Posters_prev_link" value="<?php echo $site['url'];?>Products/<?php echo $categoryName;  ?>/" />-->
		<?php					
              	/*$q = "SELECT title, productfeatureId FROM productfeature WHERE productfeatureId in ($categoryfeatureIds) ";
					$rs=$os->mq($q);
					
					while($row=$os->mfa($rs))
					{
						$parents=$row['title'];
						
						$filterCss = "" ;
						
						if ($nop < 4)
						{
							$filterCss = "main-filter collapse mCustomScrollbar" ;
						}
						else 
						{
							$filterCss = "main-filter collapse in mCustomScrollbar" ;
						}
						*/
						?>
	
		<!--<div class="filter-block">
		
			<h2 data-toggle="collapse" data-target="#filter_<?php echo  $nop ?>" class="collapse_toggle">
				<?php echo $row['title'];?><span class="sine"><i class="fa fa-plus"></i> <i class="fa fa-minus"></i></span>
			</h2>
			<div class="<?php echo  $filterCss ?>" id="filter_<?php echo $nop ?>">
				<ul>
				<?php
                	$parantId=$row['productfeatureId'];
                	$prodFeatureTitle = "SELECT title FROM productfeature WHERE  parentId = '$parantId' ";
                	$prodFeatureTitleRs=$os->mq($prodFeatureTitle);
                	
                	?>
					<?php
					
					while($featesTitle = $os->mfa($prodFeatureTitleRs)){
						
					//	_d($featesTitle['title']);
						$checked='';
					//	if(is_array($checkedArr) && in_array($featesTitle['title'],$checkedArr)){
						if(strpos($checkedStr,$featesTitle['title'])!==false){
						
							
							$checked='checked="checked"';
						}
					?> 
					<li>
				
					
						<input <?php echo $checked;?> onclick="searchLeft(this,'Posters_prev_link')" type="checkbox" id="<?php echo $featesTitle['title'];?>"  value="<?php echo $featesTitle['title'];?>" name="cb[]"> 
						<label for="<?php echo $featesTitle['title'];?>"><?php echo $featesTitle['title'];?></label>
						
					</li>
					<?php }?>
				</ul>
			</div>
		</div>-->
		<?php // $nop ++ ; }?>
		
	</div>
 
</div>

<script>
	
	
 	/*function searchLeft(checkBox,prevLinkId){
 	 	
 		var urlStr='';
 	   
       var chkBoxesObj=document.getElementsByName('cb[]');
      
       for (var i = 0; i < chkBoxesObj.length; i++) {

    	    if (chkBoxesObj[i].checked == true) 
        	    {
    	    	     urlStr=urlStr+chkBoxesObj[i].value+'+';
    	         }
    	}

          var srString = os.getVal(prevLinkId);
           srString = srString+urlStr;
 
    
		window.location=srString;
		
	}*/

</script>  