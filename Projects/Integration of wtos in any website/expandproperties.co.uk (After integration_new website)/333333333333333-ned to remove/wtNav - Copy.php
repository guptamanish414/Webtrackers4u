<? global $os; 
$pagecontentLinks=$os->get_pagecontent("active=1 and parentPage<1 and onHead='1' $andLangId "," priority asc ",'',' seoId ,	externalLink, title  , pagecontentId , openNewTab');
//_d($pagecontentLinks);

 ?>
 
<ul class="menu clearfix">
		<? 
		if(is_array($pagecontentLinks))
		{
			//$l=1;
			foreach($pagecontentLinks as $page)
			{
				$subPage=$os->get_pagecontent("active=1 and parentPage=".$page['pagecontentId'],"priority asc");
				//_d($subPage);
				$pageSeoLink=($page['externalLink']=='')?$seoLink->l($page['seoId']):$pageSeoLink=$page['externalLink'];
				$_target=($page['openNewTab']<1)?'':'target="_blank"';
				if (count($subPage)>0)
				{
		?>
        
  
     
    			 
     <li class = "dropdown" <? selectedTab($page['seoId'],$pageVar['segment'][1]) ?>  >
      
     <a title="<? echo $page['title'] ?>" <?php echo $_target ?> href="<? echo $pageSeoLink ?>"  class = "dropdown-toggle" data-toggle = "dropdown"> <? echo $page['title'] ?> <b class = "caret"></b></a>
        <ul class = "dropdown-menu">
        <? 
				 if(is_array($subPage))
					{
						
					foreach($subPage as $subp){
						
	                $pageSeoLink=($subp['externalLink']=='')?$seoLink->l($subp['seoId']):$pageSeoLink=$subp['externalLink'];
					$_target=($subp['openNewTab']<1)?'':'target="_blank"';
					
					?>
           <li <? selectedTab($page['seoId'],$pageVar['segment'][1]) ?>><a title="<? echo $page['title'] ?>" <?php echo $_target ?> href="<? echo $pageSeoLink ?>" ><? echo $subp['title'] ?></a></li>
           <?  } }?>  
        </ul>
        <?php }else {
			
			if($page['title'] == "Home" )
			{
			
			?>
        
		<li class="active" <? selectedTab($page['seoId'],$pageVar['segment'][1]) ?>><a title="<? echo $page['title'] ?>" <?php echo $_target ?> href='<? echo $pageSeoLink ?>'><? echo $page['title'] ?></a>
		
	<? }else{?>
		
		<li  <? selectedTab($page['seoId'],$pageVar['segment'][1]) ?>><a title="<? echo $page['title'] ?>" <?php echo $_target ?> href='<? echo $pageSeoLink ?>'><? echo $page['title'] ?></a>
		
		<? }
		}?> 		
		<? 
			}
			//$l++; 
		} 
		?>
     </li>
     
</ul>


