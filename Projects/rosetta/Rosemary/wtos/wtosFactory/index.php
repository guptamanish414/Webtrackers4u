<?php
$eFile=stripslashes($_GET['eFile']);
$tuluvulu=$_GET['tuluvulu'];
$folder=$_GET['folder'] ;

$file=__FILE__;
$fileS=explode('wtosFactory',$file);
$dirPath=$fileS[0];

if($tuluvulu!='tuluvulu'){ 

				
				if($_GET['delfactory']=='delfactory'){
				  $unlinkPath=$dirPath.'wtosFactory';
				  unlink($unlinkPath);
				
				}
				
			 
				exit(); 
				
                    }

if($_GET['delFile']=='ok')
{
				  $unlinkPath=$_GET['eFile'];
				  if($unlinkPath!='')
				  {
				     unlink($unlinkPath);
				  }
				
				}

 
  
 

?>
<script>
	 function delFactory()
	 {
	  if(confirm('Confirm Delete')){
	       window.location='?delfactory=delfactory';
		   }
		   return false;
	 
	 }
	 function delFile()
	 {
	     if(confirm('Confirm Delete')){
	        return true;
		   }
		   return false;
	 
	 }
	</script>
	<? 
	
  if($folder!='')
  {
 $dirPath=stripslashes( $folder).'';
  }
  ?>
	
<b> WTOS  Factory </b> <a href="javascript:void(0);" onclick="delFactory()" style="color:#FF0000; font-size:9px;" ><b>Delete Factory </b></a> 
       
 <font style="font-family:Verdana, Arial, Helvetica, sans-serif; color:#727272;"><? echo $dirPath ?> </font>
 <br/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td   valign="top" style="width:160px;">
	
	<a href="wtosFactory.php?table=" style="color:#000099; text-decoration:none;" ><b>Factory </b></a> <br/>
	

 <b>Master Editor</b> <br />
 
 <a class="folderSt" href="index.php?tuluvulu=tuluvulu&folder=<? echo $fileS[0] ?>" >ROOT </a><br>	<br>	
 
 
 
  
 <div style="height:480px; overflow-y:scroll;">
<style>
.fileSt{ color:#007100; text-decoration:none; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px}
.fileSt:hover{ color:#007100; text-decoration:underline; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px}
.folderSt{color:#EC0000; text-decoration:none; font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:11px}
.delSt{ color:#FF0000; text-decoration:none; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px}
 
</style>



 <div class="content">
                    <?php
					
  
                        
                     
					 
					 
					 
					 
					 function echoDir($dirPath)
					 {
					    
					    $handle=@opendir($dirPath);
                        while ($file = @readdir($handle)) {
						//print_r(is_dir($file));
						
						$nDir=$dirPath.$file;
						
						$lc=substr($dirPath, -1); 
					   
						 if($lc=='\\' || $lc=='/')
						 {
						 
						 }else
						 {
						  $nDir=$dirPath.'/'.$file;
						 }
						// echo $nDir.'<br>';
						
						  if(is_dir($nDir)) 
						{ 
						 if($file=='.' || $file=='..'){ }else{
						?>
							<a class="folderSt" href="index.php?tuluvulu=tuluvulu&folder=<? echo $nDir ?>" ><? echo $file ?> </a><br>	 
							<? 
							 }
						}				
						else 
						{
						$filePath=$dirPath;
						
					    $lc=substr($filePath, -1); 
					   
						 if($lc=='\\' || $lc=='/')
						 {
						 $filePath=$filePath.$file;
						 }else
						 {
						  $filePath=$filePath.'/'.$file;
						 }
						
						?>
						 <!-- file link -->
                        
						<a class="delSt"  href="index.php?tuluvulu=tuluvulu&eFile=<? echo $filePath ?>&folder=<? echo $dirPath ?>&delFile=ok" onclick="return delFile();"  >D</a> 
						<a class="fileSt"  href="index.php?tuluvulu=tuluvulu&eFile=<? echo $filePath ?>&folder=<? echo $dirPath ?>&fileName=<? echo $file ?>" ><? echo $file ?> </a><br>	 
						
                             
                                 
								<?
                            }
                        }
                        @closedir($handle);
					 
					 
					 }
					 
                         
                        echoDir($dirPath); 
						
						 
                    ?>
            </div>


<?php

 

?>



	</div>
	
	</td>
    <td valign="top" style="padding-left:10px;"> 
	<? 
if($eFile!='')
{

 
	
	 
	if(isset($_POST['operation']))
	{
				if($_POST['operation']=='Keep Backup And Save'){
				    $fileName=$_GET['fileName'];
					$file=__FILE__;
					$fileS=explode('wtosFactory',$file);
					
					$fRoot=str_replace(array('\\','/',':'),'.',$dirPath).'.';
					 
					
					$backupPath=$fileS[0].'wtosFactory/backup/';
				    $fileName=$backupPath.date('Y-m-d-h-i-s-').$fRoot.$fileName;
					 
					 
			 		copy($eFile,$fileName);
				
				}
				// if($_POST['operation']=='Save'){}
				
				
				$pageContentE=stripslashes($_POST['pageContent']);
				
				 $handle = fopen($eFile, "w");
				 fwrite($handle,$pageContentE, 9999999999999);
				 fclose($handle);
	
	}






$handle = fopen($eFile, "r");
$pageContent =(string) fread($handle, filesize($eFile));
fclose($handle);
 
?>
<div style="color:#FF0000; height:25px;"> <? echo $eFile; ?></div>
<form action="" method="post">
<textarea name="pageContent" style="height:500px; width:100%;"><? echo $pageContent  ?></textarea>

<input type="submit" value="Keep Backup And Save" name="operation" /> &nbsp; &nbsp; <input type="submit" value="Save" name="operation" />
</form>

<? 

}
?>
	
	</td>
    <td>&nbsp;</td>
  </tr>
  
</table>
