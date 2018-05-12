<?
session_start();


ob_start();
include('includes/config.php');
  
include('os.php');

ob_end_clean();
 $os->loginKey=$site['loginKey'];
 
  //echo $site['loginKey'];
 // _d($_SESSION);
if(!$os->isLogin())
{
exit();
}
 
 if($_GET['delete']=='ok' && $_GET['delid']>0)
 {
 $delid= $_GET['delid'];
 
 
  if(mysql_query("delete from imageuploader where imageId='$delid'"))
  {
      $os->removeImage('imageuploader','imageId',$delid,'image',str_replace('wtos/','',$site['root']));
    
  }
 }
 

 
 
 
  

if($_POST['operation']=='updateImg')
{
   $updateMsg='';

 
 
  
  
            $gImage=$os->UploadPhoto('image',$site['imgPath'].'wtos-images');
			if($gImage!='')
			{
			
			
			  
				$dataToSave['title']=varP('title');
				 
				$dataToSave['image']='wtos-images/'.$gImage;
				
				$os->save_imageuploader($dataToSave,'imageId','0');
				$updateMsg='Image Updated Successfully';
			
			}
			
			
			
  
  
}

?>

<form  action="" method="post"   enctype="multipart/form-data">
 


    
						
						<fieldset class="cFielSet" style="background-color:#46A3FF" >
						<legend  class="cLegend">UPLOAD IMAGE</legend>
						
						
						<table border="0" class="formClass"  cellpadding="0" cellspacing="0">
						<tr>
							
						  <td width="107"  valign="top">Image Title:</td>
							<td width="231"  valign="top">
						  <input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title"  style="width:210px;" class="textbox fWidth"/>	&nbsp;	&nbsp;	&nbsp;						
						  </td>
						  <td valign="top">
						 
						  <input type="file" name="image" />
						  
						  </td>
						  
						    <td valign="top">
						 
						 					  
						  
<? if($updateMsg!='') { ?>
 <div style="color:#FFFFFF; background-color:#06990A; font-size:16px; font-weight:bold; padding:4px;" > <? echo $updateMsg; ?></div>
  
<? } ?>
						  
						  </td>
	

						  
							</tr>
							
							</table>
						
						</fieldset>
						
						
						
						
						
						
						
					             	<input type="submit" class="submit"  value="UPLOAD IMAGE" style="background:#FF0000; color:#FFFFFF; width:140px;   font-weight:bold; font-size:15px; cursor:pointer; padding:3px;" />	
									<!--<input type="button" class="submit"  value="Cancel"  />-->
								    <input type="hidden" name="operation" value="updateImg" />
						
						
						
						
						
						
						
						
						</form>
	<?					
		
$userGalleryInfo=$os->get_imageuploader( );
$recordPerRow=6;
 $portImgs=$os->chunkSplit($userGalleryInfo,$recordPerRow);
  

?>

		<br /><br />		
	
	
	<table cellpadding="5" cellspacing="5" >
	<? foreach( $portImgs as $r){ ?>
	
	<tr>
	<? if(is_array($r)){ foreach($r as $t){ ?>
	
	<td width="100" align="center"  > 
	 
	<img src="<?php  echo $site['urlFront'].$t['image']; ?>" alt="" height="100" width="150" class="<? echo  $portfolioImage; ?>" onclick="javascript:insertWtImg(this);" /> <br />
	  <a href="?delete=ok&delid=<? echo $t['imageId']; ?> " title="Delete Image" style="color:#FF0000;">D</a> &nbsp;  <?php  echo $t['title']; ?>
	
	

	
	
	</td>
	
	
	
	<? }} ?>
	
	
	</tr>
	
	
	
	
	<? }  ?>
	
	
	</table>
	<script>
	function insertWtImg(imo)
	{
	//alert(imo.src)
	 window.opener.document.getElementById('src').value=imo.src;
	 	
	 window.close();
	 //window.parent.getElementById('srcImg').src=imo.src;
	}
	</script>
					
				
	

