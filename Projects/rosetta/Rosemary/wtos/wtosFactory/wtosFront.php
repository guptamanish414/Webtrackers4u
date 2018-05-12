<?
include('../includes/config.php');
include('../top.php');
  
function recurse_copy($src,$dst,$type) { 
global $os;
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
				
				if($type=='css' || $type=='js' )
				{
				  if(strpos($file,'css') || strpos($file,'js')){
				 //  $os->files[$type][]=$file;
				   }   
				
				}
				
				 
            } 
        } 
    } 
    closedir($dir); 
} 
 
$activeSystem=true;
$alowRight=true;
$sysVar=array();
$sysVar['backRoot']=$site['root'];
$sysVar['frontRoot']=str_replace('wtos/','',$site['root']);
$sysVar['rawPath']=$_POST['rawPath'];
 
$sysVar['setupSystem']=$_POST['setupSystem'];

if($activeSystem && $sysVar['rawPath']!='' &&  $sysVar['setupSystem']=='1' )
{
	 /* read template 454 */
	$rawHtmlPath=$sysVar['rawPath'].'/index.html';
	
	$handle = fopen('config.html', "r");
	$os->ConfigTmplStr =(string) fread($handle, filesize('config.html'));
	fclose($handle);
	
	$handle = fopen('top.html', "r");
	$os->TopTmplStr =(string) fread($handle, filesize('top.html'));
	fclose($handle);
	$handle = fopen('home.html', "r");
	$os->HomeTmplStr = fread($handle, filesize('home.html'));
	fclose($handle);
	$handle = fopen($rawHtmlPath, "r");
	$os->RawTmplStr = fread($handle, filesize($rawHtmlPath));
	fclose($handle);

	
	# getting css
	$re = '/\<link.*?href=".*?\s*\/\>/';
	preg_match_all($re, $os->RawTmplStr, $css) ;
	$css=str_replace('href="','href="<? echo $site[\'themePath\']?>',$css[0]);
	if(is_array( $css))
	{
		$os->Factory['WTF_CSS']=implode("\n",$css);
	}
	# getting js
	$re = '/\<script.*?src=".*?\s*\>\<\/script\>/';
	preg_match_all($re, $os->RawTmplStr, $js) ;
	$js=str_replace('src="','src="<? echo $site[\'themePath\']?>',$js[0]);
	if(is_array( $js))
	{
		$os->Factory['WTF_JS']=implode("\n",$js);
	}
  
	
	$os->RawTmplStr = str_replace('src="images','src="<?php echo $site[\'themePath\']?>images',$os->RawTmplStr);
	$os->RawTmplStr = str_replace('<!--WTF_NAVDD-->','<? include(\'wtNav.php\'); ?>',$os->RawTmplStr);
	
	
	
	$os->RawTmplStrBody=preg_match('/<body>(.*)<\/body>/s',$os->RawTmplStr,$matches);
	$os->RawTmplStrBody=$matches[0];
	$os->RawTmplStrBodyA=explode('<!--WTF_SEPERATOR-->',$os->RawTmplStrBody);
	
	## extra header code 
	$os->rawHeaderExtra=explode('<!--WTF_HEADER_EXTRA-->',$os->RawTmplStr);
	
	$os->rawHeaderExtra=$os->rawHeaderExtra[1];
	
	$os->TopTmplStr=str_replace('<!--WTF_HEADER_EXTRA-->',$os->rawHeaderExtra,$os->TopTmplStr);
	
	
	$os->Factory['WTF_top']=$os->TopTmplStr.''.$os->RawTmplStrBodyA[0];
	$os->Factory['WTF_body']=str_replace('<!--WTF_CONTENT-->',$os->HomeTmplStr,$os->RawTmplStrBodyA[1]);
	
	
	
	$os->Factory['WTF_foot']=$os->RawTmplStrBodyA[2].'</html>';
	$os->Factory['WTF_config']=str_replace(array('WTF_database','WTF_devFolder'),array($site['db'],str_replace('wtos/','',$site['devFolder'])),$os->ConfigTmplStr);
	
	$os->Factory['WTF_top']=str_replace(array('<!--WTF_JS-->','<!--WTF_CSS-->'),array($os->Factory['WTF_JS'],$os->Factory['WTF_CSS'] ),$os->Factory['WTF_top']);

  if($alowRight)
  {
    $writePath=str_replace('wtos/','',$site['root']);
	$rawPath=$sysVar['rawPath'];
	
	recurse_copy("$rawPath/css","$writePath"."wtos-theme/css",'css');
	recurse_copy("$rawPath/js","$writePath"."wtos-theme/js",'js');
	recurse_copy("$rawPath/images","$writePath"."wtos-theme/images");
	
	

	$os->top  = fopen($writePath.'application/top.php', 'w');
	$os->home = fopen($writePath.'application/home.php' , 'w');
	$os->content = fopen($writePath.'application/content.php' , 'w');
	$os->foot    = fopen($writePath.'application/bottom.php' , 'w');
	#$os->config  = fopen($writePath.'includes/config.php', 'w');
	
	fwrite($os->top,$os->Factory['WTF_top']);
	fwrite($os->home,$os->Factory['WTF_body']);
	fwrite($os->content,str_replace(array('$os->wtosHome =$os->get_pagecontent','$os->wtospage=$os->wtosHome'),
	array('#$os->wtosHome =$os->get_pagecontent','#$os->wtospage=$os->wtosHome'),$os->Factory['WTF_body']));
	fwrite($os->foot,$os->Factory['WTF_foot']);
	#fwrite($os->config,$os->Factory['WTF_config']);
	
	fclose($os->top);
	fclose($os->home);
	fclose($os->foot);
	#fclose($os->config);
	fclose($os->content);
	
		
	

  }

}

?><div style="height:450px; width:100%; padding:10px;">
<div style="font-style:italic; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FF0000; font-size:36px; font-weight:bold; position:absolute; top:260px; left:650px;">
WTOS FACTORY
</div>
<form action="" method="post">
  <p>Html folder Path (D:\wamp\www\html)
    <input type="text" name="rawPath" value="D:\requirement\rdalegal.in\new template\RD NEW HTML 02" style="width:400px;" /> 
    <input type="submit" value="ok" name="setup" />
    <input type="hidden" name="setupSystem" value="1" />
    </p>
	
  <p>&lt;!--WTF_SEPERATOR--&gt;           {top} seperator {content}  seperator {bottom}   <br />  
  &lt;!--WTF_CONTENT--&gt;<br />
  &lt;!--WTF_HEADER_EXTRA--&gt;<br />
  &lt;!--WTF_NAVDD--&gt;<br />
  </p>
</form>
</div>