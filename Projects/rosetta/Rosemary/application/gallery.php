<link rel="stylesheet" type="text/css" href="<?php echo $site['url'];?>fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<? 
global $os,$site,$pageVar;

$galleryCatagoryId=$pageVar['segment'][2];


?>
<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}

		
	</style>

<style>
.gallery_wrapper{ overflow:hidden; margin:20px 0px;}
.gallery_containt{ margin-left:-15px; overflow:hidden; text-align:center;}
.gCat{ height:216px; width:216px; margin:0 0 15px 15px; float:left; overflow:hidden; display:inline-block; position:relative;}
.gCatImg{margin:0; border-radius: 4px; background-color: #fff;border: 1px solid #ddd;padding:4px; }
 .imgC{ width:206px; height:206px;}
 .back_button{ text-align:center; margin:10px 0 0 0;}
 .gCatName{ position:absolute; bottom:5px; left:5px; right:5px; background:RGBA(0, 0, 0, 0.53);; color:#FFFFFF; padding:5px 5px; text-align:center; }
 .galLink{ background: #ff7519;
color: #FFF;
font-size: 11px;
padding: 5px 0;
text-transform: uppercase;
font-weight: 500;
display: inline-block;
margin: 5px 0 0 0;
max-width:100%;
width:200px;
text-align: center;
border: 1px solid #E07E3D;}
.galLink:hover{ background:#FFFFFF; color:#E07E3D; text-decoration:none;}
</style>
<?



if($galleryCatagoryId<1)
{


$gCat=$os->get_gallerycatagory("active=1");
if(is_array($gCat))
{
  foreach($gCat as $val)
  {
  $wh="galleryCatagoryId='".$val['galleryCatagoryId']."'";
  $gCatImg=$os->get_photogallery($wh,' photoGalleryId desc','1');

  $catName=$val['categoryName'];
  $img=$site['url'].'wtos-images/'.$gCatImg[0]['name'];
  $url=$site['url'].'Gallery/'.$val['galleryCatagoryId'];
  ?>
  <div class="gCat">
  <a href="<? echo $url;?>">
   <div class="gCatImg">
   <img src="<? echo $img?>" height="100%" width="100%"  class="imgC"/>
  <div class="gCatName">
  <? echo $catName?>
  </div>
  </div>
   
  </a>
  </div>
    
  <? 
  
  }


}


}
else
{

?>

<!--  light box --->
	   
	   

	<!--  light box end -->	






<div style="clear:both;"></div>
<div class="gallery_wrapper">
   		<div class="gallery_containt">

<? 

   $wh="galleryCatagoryId='$galleryCatagoryId'";
   $gCatImg=$os->get_photogallery($wh,' photoGalleryId desc');

//_d($gCatImg);
  if(is_array($gCatImg))
{
  foreach($gCatImg as $vals)
  {
  
  $ImgName=$vals['title'];
  
  $img=$site['url'].'wtos-images/'.$vals['name'];
   ?>
   
        	<div class="gCat">
                <div class="gCatImg">
                 <a class="fancybox" href="<? echo $img?>" data-fancybox-group="gallery" title="<? echo $ImgName?>"><img class="imgC" src="<? echo $img?>" alt="<? echo $ImgName?>" /></a>
                </div>
           </div>
       
  <? 
  
  }


}



?>


	
	

 </div>
   
   </div>
   
   <div class="back_button">
   		<a href="<? echo $site['url']?>Gallery" class="galLink"> Back To Gallery</a>
   </div>
   



<? 



}
?>
<div style="clear:both;"> &nbsp;</div>