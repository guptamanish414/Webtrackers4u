
<?php
$submitLink=$site['url'].'login/ref-url=submit-product';
if($os->isLogin()){
	$submitLink=$site['url'].'submit-product';
	}
?>
			
<?php	
$q = "SELECT title,	productcategoryId FROM productcategory where parentId < 1 ";
$rs=$os->mq($q);

//$parentS = $os->getT($tables="productcategory",$fields="title",$where="parentId<1",$orderby='',$limit='')

//_d($parentS);
?>

<div class="nav_menu">
        	<div class="container">
            	<nav class="clearfix">
        	      <a class="toggleMenu" href="#"><i class="fa fa-th"></i></a>
                  <div class="social_icons">
            	<ul>
                	<li><a class="#" href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a class="#" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="#" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
                <ul class="nav">
                	<?php while($row=$os->mfa($rs)){ 
					
						$Sub = "SELECT title FROM productcategory where parentId=" .$row['productcategoryId'] ." ORDER BY title ASC";
						$Subrs=$os->mq($Sub);
					?>
                    	
                
                
                	<li class="nav-drop">
                    	<a href="<?php echo $site['url'].'Products/'.$row['title'];?>" onclick="searchProduct(this,'Genres_prev_link')"><?php echo $row['title'];?></a>
                        <ul>
                        	<? 
								while($SubRow=$os->mfa($Subrs)){ 
							?>
                            <li> <a href="<?php echo $site['url'].'Products/'.$SubRow['title'];?>" onclick="searchProduct(this,'Genres_prev_link')"><? echo $SubRow['title']?></a> </li>
                            
                            <?  } ?>
                		</ul>
                	</li>
                     <?php } ?>
                     <li><a href="<?php echo $site['url']?>Gallery">Gallery</a></li>
                     <li><a href="<?php echo $site['url']?>events">Events</a></li>
                     
                </ul>
              </nav>	
            </div>
        </div>
