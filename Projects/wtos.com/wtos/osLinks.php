
<?
function selectedPage($page)
{
   global $os;
   
   $className='';
   if($os->currentPageName()==$page)
   {
    $className='selectedLink';
   }
   return $className;
   
}
$superAdmin=false;
if($os->userDetails['adminType']=='Super Admin'){ $superAdmin=true;  }


 ?>
 <style>
 .selectedLink {  background-color:#0080C0;   border-color: #fcfcfc #666666 #666666 #fcfcfc;
    border-image: none;
    border-style: solid;
    border-width: 1px; }
  .selectedLink a{ color:#FFFFFF;  }
 </style>

<div class="linkClassDiv <? echo selectedPage('d.php') ?>" >  <a class="linkClass "  style="color:#006600;"    href="<? echo $site['url-wtos'] ?>dashBoard.php?logout=logout" ><span style="color:#990000;">Logout</span></a></div>  
<? if($superAdmin){ ?>
<div class="linkClassDiv <? echo selectedPage('adminList.php') ?>"  >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>adminList.php">Admin</a></div>  
<? } ?>

<div class="linkClassDiv <? echo selectedPage('dashBoard.php') ?>" >  <a class="linkClass "    href="<? echo $site['url-wtos'] ?>dashBoard.php" >Dashboard</a></div>   
<div class="linkClassDiv  <? echo selectedPage('pageContent.php') ?>" >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>pageContent.php" >Pages</a></div>   
<div class="linkClassDiv  <? echo selectedPage('wtboxList.php') ?>" >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>wtboxList.php">Wtbox</a></div> 



<div class="linkClassDiv  <? echo selectedPage('contactusList.php') ?>" >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>contactusList.php">Enquery</a></div>  
<div class="linkClassDiv  <? echo selectedPage('gallerycatagoryDataView.php') ?>" >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>gallerycatagoryDataView.php">Album</a></div>  
<div class="linkClassDiv  <? echo selectedPage('photogalleryDataView.php') ?>" >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>photogalleryDataView.php">Album Images</a></div>  
<div class="linkClassDiv  <? echo selectedPage('noticeboardList.php') ?>" >  <a class="linkClass"    href="<? echo $site['url-wtos'] ?>noticeboardList.php">Notice</a></div>
 
 
 