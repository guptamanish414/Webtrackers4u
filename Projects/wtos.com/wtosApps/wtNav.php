		  
			<? $pagecontentLinks=$os->get_pagecontent('seoId ,	externalLink, title  , pagecontentId , openNewTab ',"active=1 and parentPage<1 and  onHead='1'  $andLangId "," priority asc ",'',''); 
				
				?>
				
			<ul class="nav navbar-nav custom_nav">
			<? 	
				while($page=$os->mfa($pagecontentLinks))
				{ 
				$pageSeoLink=($page['externalLink']=='')?$os->sefu->l($page['seoId']):$pageSeoLink=$page['externalLink'];
				$_target=($page['openNewTab']<1)?'':'target="_blank"';
				?> 
				<li class=""> <a   title="<? echo $page['title'] ?>"  <?php echo $_target ?> href="<? echo $pageSeoLink ?>"  ><? echo $page['title'] ?></a> </li>
				 
				  
				 
				 
				 
				 
				 <? } ?>
				 
				 
           
            
          </ul>
				 	
						

