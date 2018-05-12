 		 
			
		<!-- 	iiiiiiiiiiiiii nav iiiiiiiiiiiiii -->
			
			<? $pagecontentLinks=$os->get_pagecontent("active=1 and parentPage<1 and onHead='1' $andLangId "," priority asc ",'',' seoId ,	externalLink, title  , pagecontentId , openNewTab'); ?>
			
			 
								 		
	<div id="ddtopmenubar" class="mattblackmenu">
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
                          <li <? selectedTab($page['seoId']) ?>><a  title="<? echo $page['title'] ?>" <? echo $removeLastSep; ?> <?php echo $_target ?> href="<? echo $pageSeoLink ?>" <? echo $mRel; ?> ><? echo $page['title'] ?></a>  </li>
                
				 
				
				
				 <? 
				 
				 
				 
				 
				 
				 
				  $l++; } }?>
				 	
						 </ul>
 
</div>
<!--Top Drop Down Menu 2 HTML-->

    


<?				

 
if($pagecontentLinks){
reset($pagecontentLinks);
foreach($pagecontentLinks as $page)
				{
				
				
				     
				    
					$mRel='ddsubmenu'.$page['pagecontentId'];
					 $subPage=$os->get_pagecontent(" active=1 and parentPage='".$page['pagecontentId']."'","priority asc");
					 
					 
					 
					?>


<? if($subPage){	?>  <ul id="<?  echo $mRel ?>" class="ddsubmenustyle"><? 


foreach($subPage as $subp)		{

                     $pageSeoLink=($subp['externalLink']=='')?$seoLink->l($subp['seoId']):$pageSeoLink=$subp['externalLink'];
					 $_target=($subp['openNewTab']<1)?'':'target="_blank"';

 ?>

   <li <? selectedTab($subp['seoId']) ?>><a  title="<? echo $subp['title'] ?>"   <?php echo $_target ?> href="<? echo $pageSeoLink ?>" <? echo $mRel; ?> ><? echo $subp['title'] ?></a>  </li>


<?  } ?>  </ul> <?  }?>




<?  } }?>
<!--Top Drop Down Menu 2 HTML-->


			
								
			<script type="text/javascript">
			ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")  //  EEEEEEEEEEEEEEE
			</script>
			<!-- 	iiiiiiiiiiiii     iiiiiiiiiiiiiii  nav  end  -->
 
			
			
				 
			 