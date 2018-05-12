<div class="left">
<?php	
	if(is_array($pageVar['segment']) && count($pageVar['segment'])>0){
		$checkedArr = $pageVar['segment'];		
	}
?>
<?php $nop=0;?>
        	<div class="lft">
            <input type="hidden" id="Posters_prev_link" value="<?php echo $site['url'];?>Products/Posters/" />
            	<h1>POSTERS</h1>
                
                <!--<div class="lftsub">
                    <input type="checkbox" id="All-POSTERS" name="" />
                    <label for="All-POSTERS"><span></span>All<font>(0)</font></label>
                </div>-->
                
                <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Size' AND productType='Posters') ORDER BY title ASC";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
						
					#count start
					$title=$row['title'];
					$totQ = "SELECT COUNT(*) as nop FROM productfeaturemap WHERE productfeatureId = (SELECT productfeatureId FROM productfeature WHERE title='$title')";
					$totRs=$os->mq($totQ);
					$nopA = $os->mfa($totRs);
					if(is_array($nopA) && count($nopA)>0){$nop=$nopA['nop'];}
					#count end
					$checked='';
					if(is_array($checkedArr) && in_array($row['title'],$checkedArr)){$checked='checked="checked"';}		
				?>
                <div class="lftsub">
                    <input <?php echo $checked;?> onclick="searchLeft(this,'Posters_prev_link')" type="checkbox" class="chk" id="<?php echo $row['title'];?>" name="" value="<?php echo $row['title'];?>" />
                    <label for="<?php echo $row['title'];?>"><span></span><?php echo ucwords(strtolower($row['title']));?><font>(<?php echo $nop;?>)</font></label>
                </div>
                 <?php }?>
            </div>
            
            <div class="lft">
             <input type="hidden" id="T Shirts_prev_link" value="<?php echo $site['url'];?>Products/T Shirts/" />
            	<h1>T SHIRTS</h1>
                <!--<div class="lftsub">
                    <input type="checkbox" id="All-T SHIRTS" name="" />
                    <label for="All-T SHIRTS"><span></span>All<font>(0)</font></label>
                </div>-->
                <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Category' AND productType='T Shirts')";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
						
					#count start
					$title=$row['title'];
					$totQ = "SELECT COUNT(*) as nop FROM productfeaturemap WHERE productfeatureId = (SELECT productfeatureId FROM productfeature WHERE title='$title')";
					$totRs=$os->mq($totQ);
					$nopA = $os->mfa($totRs);
					if(is_array($nopA) && count($nopA)>0){$nop=$nopA['nop'];}
					#count end
					$checked='';
					if(is_array($checkedArr) && in_array($row['title'],$checkedArr)){$checked='checked="checked"';}						
				?>
                <div class="lftsub">
                    <input <?php echo $checked;?> onclick="searchLeft(this,'T Shirts_prev_link')" type="checkbox" class="chk" id="<?php echo $row['title'];?>" name="" value="<?php echo $row['title'];?>" />
                    <label for="<?php echo $row['title'];?>"><span></span><?php echo ucwords(strtolower($row['title']));?><font>(<?php echo $nop;?>)</font></label>
                </div>               
                <?php }?>
            </div>
            
            <div class="lft">
             <input type="hidden" id="MERCHANDISE_prev_link" value="<?php echo $site['url'];?>Products/" />
            	<h1>MERCHANDISE</h1>                
            <?php					
            $q = "SELECT title FROM productcategory WHERE title!='T Shirts' AND title!='Posters' ORDER BY title DESC";
            $rs=$os->mq($q);
            while($row=$os->mfa($rs)){
			
			#count start
			$title=$row['title'];
			$totQ = "SELECT COUNT(*) as nop FROM productcategorymap WHERE productcategoryId = (SELECT productcategoryId FROM productcategory WHERE title='$title')";
			$totRs=$os->mq($totQ);
			$nopA = $os->mfa($totRs);
			if(is_array($nopA) && count($nopA)>0){$nop=$nopA['nop'];}
			#count end
			$checked='';
			if(is_array($checkedArr) && in_array($row['title'],$checkedArr)){$checked='checked="checked"';}	
            ?>
                <div class="lftsub">
                    <input <?php echo $checked;?> onclick="searchLeft(this,'MERCHANDISE_prev_link')" type="checkbox" class="chk" id="<?php echo $row['title'];?>" name="" value="<?php echo $row['title'];?>" />
                    <label for="<?php echo $row['title'];?>"><span></span><?php echo ucwords(strtolower($row['title']));?><font>(<?php echo $nop;?>)</font></label>
                </div>               
            <?php }?>
            </div>
            
            <div class="lft">
             <input type="hidden" id="Collections_prev_link" value="<?php echo $site['url'];?>Products/All/" />
            	<h1>Collections</h1>
                <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Collections' AND productType='') ORDER BY title ASC";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
					
					#count start
					$title=$row['title'];
					$totQ = "SELECT COUNT(*) as nop FROM productfeaturemap WHERE productfeatureId = (SELECT productfeatureId FROM productfeature WHERE title='$title')";
					$totRs=$os->mq($totQ);
					$nopA = $os->mfa($totRs);
					if(is_array($nopA) && count($nopA)>0){$nop=$nopA['nop'];}
					#count end
					$checked='';
					if(is_array($checkedArr) && in_array($row['title'],$checkedArr)){$checked='checked="checked"';}	
				?>                	
                <div class="lftsub">
                    <input <?php echo $checked;?> onclick="searchLeft(this,'Collections_prev_link')" type="checkbox" class="chk" id="<?php echo $row['title'];?>" name="" value="<?php echo $row['title'];?>" />
                    <label for="<?php echo $row['title'];?>"><span></span><?php echo ucwords(strtolower($row['title']));?><font>(<?php echo $nop;?>)</font></label>
                </div>
               <?php }?>
            </div>
            
            <div class="lft">
             <input type="hidden" id="Genres_prev_link" value="<?php echo $site['url'];?>Products/All/" />
            	<h1>Genres</h1>
                <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Genres' AND productType='') ORDER BY title ASC";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
					#count start
					$title=$row['title'];
					$totQ = "SELECT COUNT(*) as nop FROM productfeaturemap WHERE productfeatureId = (SELECT productfeatureId FROM productfeature WHERE title='$title')";
					$totRs=$os->mq($totQ);
					$nopA = $os->mfa($totRs);
					if(is_array($nopA) && count($nopA)>0){$nop=$nopA['nop'];}
					#count end
					$checked='';
					if(is_array($checkedArr) && in_array($row['title'],$checkedArr)){$checked='checked="checked"';}	
				?>
                <div class="lftsub">
                    <input <?php echo $checked;?> onclick="searchLeft(this,'Genres_prev_link')" type="checkbox" class="chk" id="<?php echo $row['title'];?>" name="" value="<?php echo $row['title'];?>" />
                    <label for="<?php echo $row['title'];?>"><span></span><?php echo ucwords(strtolower($row['title']));?><font>(<?php echo $nop;?>)</font></label>
                </div>
               <?php }?>
            </div>
            
            <script>
            	function searchLeft(checkBox,prevLinkId){
					if(checkBox.checked==true){
						var sVal=checkBox.value;
						var srString = os.getVal(prevLinkId)+sVal;						
						window.location=srString;
					}
					else{window.location='<?php echo $site['url']?>Products';}
				}
            </script>      
       </div>