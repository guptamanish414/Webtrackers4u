<?php
$submitLink=$site['url'].'login/ref-url=submit-product';
if($os->isLogin()){$submitLink=$site['url'].'submit-product';}
?>
<ul id="menu">

            <li><a href="<?php echo $site['url'].'Products/Posters';?>" class="drop">POSTERS</a><!-- Begin 4 columns Item -->
                <div class="dropdown_4columns"><!-- Begin 4 columns container -->
                <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Size' AND productType='Posters') ORDER BY title ASC";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
				?>
                <div><a href="<?php echo $site['url'].'Products/Posters/'.$row['title'];?>"><?php echo $row['title'];?></a></div>
                <?php }?>
                </div><!-- End 4 columns container -->
            
            </li>
            
            <li><a href="<?php echo $site['url'].'Products/T Shirts';?>" class="drop">T SHIRTS</a><!-- Begin 4 columns Item -->
            <div class="dropdown_4columns">
            	<?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Category' AND productType='T Shirts')";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
				?>
                <div><a href="<?php echo $site['url'].'Products/T Shirts/'.$row['title'];?>"><?php echo $row['title'];?></a></div>
                <?php }?>
            </div>
            
            </li><!-- End Home Item -->
        
            <li><a style="cursor:pointer;" class="drop">IMPOSTER PICKS</a><!-- Begin 4 columns Item -->
            
				<div class="dropdown_4columns"><!-- Begin 4 columns container -->
                  <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Collections' AND productType='') ORDER BY title ASC";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
				?>
                <div><a href="<?php echo $site['url'].'Products/All/'.$row['title'];?>"><?php echo $row['title'];?></a></div>
                <?php }?>
            	</div>
            </li>
            
           
        
            <li class="menu_right"><a style="cursor:pointer;" class="drop">WHAT YOU'RE LOOKING FOR</a><!-- Begin 3 columns Item -->
            
                <div class="dropdown_4columns align_right"><!-- Begin 3 columns container -->
                <?php					
                	$q = "SELECT title FROM productfeature WHERE parentId =(SELECT productfeatureId FROM productfeature WHERE title='Genres' AND productType='') ORDER BY title ASC";
					$rs=$os->mq($q);
					while($row=$os->mfa($rs)){
				?>
                <div><a href="<?php echo $site['url'].'Products/All/'.$row['title'];?>"><?php echo $row['title'];?></a></div>
                <?php }?>
                </div><!-- End 3 columns container -->
            </li>
        
            <li class="menu_right"><a style="cursor:pointer;" class="drop">WHAT WE'VE GOT</a><!-- Begin 3 columns Item -->
            <div class="dropdown_4columns align_right"><!-- Begin 3 columns container -->
			<?php					
            $q = "SELECT title FROM productcategory ORDER BY title DESC";
            $rs=$os->mq($q);
            while($row=$os->mfa($rs)){
            ?>
            <div><a href="<?php echo $site['url'].'Products/'.$row['title'];?>"><?php echo $row['title'];?></a></div>
            <?php }?>
            </div>  
            </li>
             <li class="menu_right"><a href="<?php echo $submitLink;?>">SUBMIT</a></li>
            
		</ul>