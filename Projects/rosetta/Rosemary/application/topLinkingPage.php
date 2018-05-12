<? $pagecontentLinks=$os->get_pagecontent("active=1 and parentPage<1 and onHead='1' $andLangId "," priority asc ",'',' seoId ,	externalLink, title  , pagecontentId , openNewTab');
?>
<p style="color:#7D7D7D"><?php echo $os->bNavigation();?></p>
            <ul>
            <? if(is_array($pagecontentLinks)){
				
				 $l=1;
				 
				foreach($pagecontentLinks as $page)
				{
				    $subPage=$os->get_pagecontent("active=1 and parentPage=".$page['pagecontentId'],"priority asc");
					$mRel='';
					if($subPage){	
					  $mRel='rel="ddsubmenu'.$page['pagecontentId'].'"';
					}
					
					$removeLastSep='';
					if($l==count($pagecontentLinks))
					{
					  $removeLastSep='style="border-right:none;"';
	
					}
					
					 $pageSeoLink=($page['externalLink']=='')?$seoLink->l($page['seoId']):$pageSeoLink=$page['externalLink'];
					 $_target=($page['openNewTab']<1)?'':'target="_blank"';
					
				?>
				<?php
				if ($page['title']=='Home')
				{
					?>
					<li>
					
					<a title="<? echo $page['title'] ?>" <?php echo $_target ?> href="<?php echo $seoLink->l();?>" style="color:#7D7D7D"><? echo $page['title'] ?></a>
					
					</li>
				<?php 
				}
				else 
				{
				?>
				
				
            	<li>
            	
            	<a title="<? echo $page['title'] ?>" <?php echo $_target ?> href="<? echo $pageSeoLink ?>"><? echo $page['title'] ?></a>
            	
            	</li>
                <? 
				 
				  $l++; 
				}
				}
            }
				?> 
            </ul>