<? 
include('sFunction.php');

class systemModel extends wtos 
{
	
	
	var $quickDatabase=array();
	
	
	function deleteRow($table,$fld,$fldVal)
	{
	    
		
		$r=$this->getByFld($table,$fld,$fldVal);
		if(is_array($r))
		{
			 if($r[0][$fld]==$fldVal)
			 {
				  $query=" delete from $table where $fld='$fldVal' ";
				//  echo $query;
				 mysql_query($query);
				 return true;
			 }
		
		
		}
		
		return false;
		
	}
	
	function getByFld($table,$fld,$fldVal,$getfld='')
	{
	   $where=" $fld='$fldVal' ";
	   $r= $this->getT($table,'',$where);
	   if($getfld!='')
	   {
	      return $r[0][$getfld];
	   }
	   return $r;
	
	}
	
	function getSettings($key)
	{
	  $r= $this->getByFld('settings','keyword',$key,'value');
	   return $r;
	}
	
	function options($keyField,$valField,$tName,$where='',$orderby='',$limit='')
	{
	   $list=array();
	  
	  $l= $this->getT($tName," $keyField  , $valField ", $where,$orderby,$limit);
	  if(is_array($l))
	  {
	  
	    foreach($l as $val)
		{
		 $list[$val[$keyField]]=$val[$valField];
		
		}
		return  $list;
	  	  
	  }
	  
	  
	 
	
	}
	function optionsHTML($selectedValue,$keyField,$valField,$tName,$where='',$orderby='',$limit='')
	{
	  
	  
	    $list=$this->options($keyField,$valField,$tName,$where='',$orderby='',$limit='');
	    $this->onlyOption($list,$selectedValue);
	
	}
	
	function andField($getParam,$field,$primeryTable,$willCard='=',$resetValue='')
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
	
	
	function editAreaField($value,$table,$editFld,$idFld,$idVal)
	{
	   
	    
				
	    $vars=	"'$table','$editFld','$idFld','$idVal'";		
		?>
		<textarea class="tArea" name="changeStatusDD" onchange="os.changeStatus(this,<? echo $vars?>)"><? echo $value ?></textarea>
		<?
	}
	function editTextField($value,$table,$editFld,$idFld,$idVal)
	{
	   
	    
				
	    $vars=	"'$table','$editFld','$idFld','$idVal'";		
		?>
		<input class="tField" type="text" name="changeStatusDD"  onchange="os.changeStatus(this,<? echo $vars?>)" value="<? echo $value ?>"> 
		
		<? 
	}
	
	
	 
	function slNo()
	{
	   
	   return  (($this->paging->page-1)*$this->paging->p['baris'])+1;
	}
	
	
	
		
		
		function testMizu()
		{
			echo 'mizu';
		}
		
		
		
		
		
		
		function quickDatabase()
		{
		   
		   if($_SESSION['quickDatabase']['status']!='loded')
		   {
			
			   $this->quickDatabase['status']='loded';
			   $this->quickDatabase['categories']=$this->getCategories();
			  // $this->quickDatabase['users']=$this->getUsers();
			   #$this->quickDatabase['products']=$this->getProducts();
			   $_SESSION['quickDatabase']=$this->quickDatabase;
		   }
		
		}
		function quickDatabaseReset()
		{
		 unset($_SESSION['quickDatabase']);
		}
		
		function getTableQ($table='')
		{
		   $recordList=$_SESSION['quickDatabase'];
		   if($table!='')
		   {
		    $recordList=$_SESSION['quickDatabase'][$table];
		   }
		  return $recordList;
		}
		
	  function e($txt)
	  {
	   echo $txt;
	  }	
	  function root($return=false)
	  {
	    global $site;
	    if($return)
		{
		  return $site['url'];
		}
	     echo $site['url'];
	  }	
		
	
	
	function parentCatDropDown($selected=0)
	{
	
		$catWhere=" parent_id = 0 and status = 'active'";
		$catList=$this->getCategories($catWhere); 
		
		foreach($catList as $val)
		{
		  $list[$val['id']]=$val['cat_name'];
		
		}
		
		$this->onlyOption($list,$selected);
		
		
	
	}
	
	function subCatDropDown($pcat=0,$selected=0)
	{
	
		$catWhere=" parent_id ='$pcat' and status = 'active'";
		$catList=$this->getCategories($catWhere); 
		
		foreach($catList as $val)
		{
		  $list[$val['id']]=$val['cat_name'];
		
		}
		
		echo '<select id="subCatList" name="subcatid" >';
		
		$this->onlyOption($list,$selected);
		
		echo '</select>';
	
	}
	
	
	
	
	function modelDropDown($pcompany=0,$selected=0)
	{
	
		$catWhere=" car_id ='$pcompany'";
		$modelList=$this->getCar_models ($catWhere); 		
		
		foreach($modelList as $val)
		{
		  $list[$val['id']]=$val['model_name'];
		
		}
		
		echo '<select id="ModelList" name="modelid" >';
		
		$this->onlyOption($list,$selected);
		
		echo '</select>';
	
	}
	
	function setFlash($msg='')
	{
		if($msg=='')
		{
		  $style='style="display:none"';
		}
		?>
		 <div id="FlashMessageDiv" class="FlashMessageDiv" <?php echo $style ?> >
		  <?php echo $msg; ?>
					
         </div>
		 <script>
		 setTimeout('removeFlashMessageDiv()',3000);
		     

		 
		 </script>
		<?php
		
		
		
	}
	
	
	
	function recordPerPageDD()
	{
	   
	    
		?>
		<script>
		 function changeRecordPerpage(val)
		 {
		    window.location='?recordPerpage='+val;
		 }
		 </script>
		<?php
		
		$selected=$this->setNget('recordPerpage');
		if($selected<1)
		{
		  $selected=50;
		}
		
		$list[5]=5; $list[10]=10; $list[20]=20; $list[50]=50; $list[100]=100;
		echo '<select id="recordPerpage" name="recordPerpage" class="ddList" onchange="changeRecordPerpage(this.value)">';
		$this->onlyOption($list,$selected);
		echo '</select>';
		
		return   $selected;
	
	}
	
	
	function changeStatusDD($statusArr,$selected,$table,$satusfld,$idFld,$idVal,$colorStatus)
	{
	   
	    
				
	    $vars=	"'$table','$satusfld','$idFld','$idVal'";		
		$backGround=($colorStatus[$selected])?$colorStatus[$selected]:'FFFFFF';
		
		echo '<select class="statusDD" id="changeStatusDD" name="changeStatusDD" onchange="os.changeStatus(this,'.$vars.')" style="background-color:#'.$backGround.';">';
		$this->onlyOption($statusArr,$selected);
		echo '</select>';
		
		// return   $selected;
	
	}
	
	
	
	
	
	function setNpost($var,$key='os')
	{
    	if(isset($_POST[$var]))
		{
			$_SESSION[$key][$var]=$_POST[$var];
		}
		
		return $_SESSION[$key][$var];

	}
	
	
	function setNget($var,$key='os')
	{
    	if(isset($_GET[$var]))
		{
			$_SESSION[$key][$var]=$_GET[$var];
		}
		
		return $_SESSION[$key][$var];

	}
			
			
function divIds($uniqueId,$DivIds)
{
       
		$DivIds['EDITID']=$uniqueId;
		
		$DivIds['idRAND']='_'.$DivIds['EDITID'].'_'.rand(1,100);
		$DivIds['LIST']='LIST'.$DivIds['idRAND'];
		$DivIds['BUTTONS']='BUTTONS'.$DivIds['idRAND'];
		$DivIds['DIV']='DIV'.$DivIds['idRAND'];
		$DivIds['DIVLIST']='DIVLIST'.$DivIds['idRAND'];
		return  $DivIds;
}


## ---  mizanur adde  -------##


function getCount($table,$where='')
{
  $cc= $this->getT($table," count(*) cc ",$where);
  return $cc[0]['cc'];


}

function getSum($table, $field, $where='')
{
  $total= $this->getT($table," sum($field) total ",$where);
  return $total[0]['total'];
}


function getSumQuantity($table,$model)
{
#mmmmmmmmmmmmmmmmmmmmmmmmmmmm
   $total= $this->getT($table," sum($field) total ",$where);
  return $total[0]['total'];
     
}






function isExistIMEI($table,$mobIMEI)
{

  $cc= $this->getT($table," count(*) cc ",$where);
  if($cc[0]['cc']<1)
  {
    return false;
  }
  if($cc[0]['cc']==1)
  {
    return true;
  }
  if($cc[0]['cc']>1)
  {
    return 'Data Error Need to Debug';
  }
  

}



function dateSearch($date_searchVal,$fldName)
{      

   
	
		$andDateSearch='';
		if ($date_searchVal=='')
		{
		return '';
		}
		if( $date_searchVal!='dd/mm/yyyy' )
		{
		  $date_searchA=explode('/',$date_searchVal);
		 
		  $date_searchq=$date_searchA[2].'-'.$date_searchA[1].'-'.$date_searchA[0];
		  $andDateSearch=" and $fldName LIKE '%$date_searchq%'";
		}
		
		
		   
		return $andDateSearch;


}

function dmyToDB($date,$extra='')
{
          $dateA=explode('/',$date);
		  return $dateA[2].'-'.$dateA[1].'-'.$dateA[0].$extra;

}

function DBToDmy($date)
{

 return date('d/m/Y',strtotime($date));

}


##----------- adde by mizanur --------###

function getGroupQuantity($table,$andFilterByStore='')
{
    
	$qq=" SELECT sum(quantity) cc , modelId from  $table where 1=1 $andFilterByStore group by modelId ";
	$cc= $this->getMe($qq);
	return $cc;

}

function monthArr($int='')
{

$int=(int)$int;
$month = array (
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    );
	if($int)
	{
	   return $month[$int];
	}

 return $month;
}




function filterByStore()
{
     $filter='';
	 if($this->userDetails['adminType']!='Super Admin')
	 {
	    $storeId=$this->userDetails['storeId'];
	    $filter=" and  storeId='$storeId' ";
	 }
	 
	 $storeId= $this->setNget('filterByStore','os1');
	 if($modelId>0)
	 {
	 
	   $filter=" and  storeId='$storeId' ";
	 
	 }
	 
	 return $filter;


}

function emailSend($to,$from,$fromName,$subj,$body,$attachment='')
{
	
	
	
	return $this->sendMail($to,$from,$fromName,$subj,$body,$attachment);
	
	}
	
	function email($to,$subj,$body)
	{
	  
	    if($to=="")
		{
		   $to=$this->getSettings('Admin Email');
		}
		$confEmailFrom=$this->getSettings('Email From');
		$confEmailFromName=$this->getSettings('Email From Name');
		
		$from=$confEmailFrom;
		$fromName=$confEmailFromName;
		return $this->emailSend($to,$from,$fromName,$subj,$body );
	
	}
	
	function accessPage($superAminAccess)
	{
	
	 if(!$superAminAccess)
	 {
	 
	   echo ' You Are trying to HACK System . An email has been sent to system admin.';
	   exit();
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

	
	#-- wtbox language functions -323-#
	
	function getByFldWhere($table,$fld,$fldVal,$getfld='',$where='')
	{
		$WH=($where!='')? "and $where ":'';
	   $where=" $fld='$fldVal' $WH";
	   $r= $this->getT($table,'',$where);
	   if($getfld!='')
	   {
	      return $r[0][$getfld];
	   }
	   return $r;
	
	}
	
	 function wtBox($key,$langId='') //   language independent fnctio if language ==''  // get from session 
	 {
	     
		 $boxSessionKey='wtbox';
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
		  
		 
			 $content =$this->get_wtbox(" BINARY accessKey='$key'    $langIdQ   ");
			 $content=$content[0];
			
			
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
			   	 $content2 =$this->get_wtbox(" BINARY accessKey='$accKeyDataBase'    $langIdQ   ");
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
	   
	     $lang =$this->getByFld('lang','defaultLang','1','langId');
		 $_SESSION[$logKey]['language']=$lang ;
	   
	   }
	   return $_SESSION[$logKey]['language']; 
	 
	 }
	 function setLang($langId)
	 {
	   global $site;
	   $logKey=$site['loginKey'];
	    if($langId!='')
		{
		$_SESSION[$logKey]['language']=$langId ;
		return true;
		}
		 return false;
	 
	 }
	
	 function replaceWtBox($text)
	 {
	 
	    global $site, $os;
		
		
	     
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
			   $filePath=$site['application'].'/'.$PageName;
			   
				if(is_file( $filePath))
					{	   
				
				  
					   ob_start(); require($filePath);$page=ob_get_clean();
					
				       $text= str_replace($accKey, $page ,$text);
				 }
			 
			 }
		  
		  }
		  
		  
		  
		  
		  
		  
		 
		 return $text;
	 
	 }
	 
	 
	
	 
	#-- wtbox language  functions -323 end-#
	 function siteValidation()
	 {
	 
	 
	    $expDate=$this->getSettings('Deactivate Date');
		
		if($expDate!='')
		{
		 
	 	$expTime=strtotime($expDate.' 00:00:00');
		 
		$recent=time();
	 
		if($recent>$expTime)
		{
		  mysql_query("update settings set value=1 where keyword='Deactivate Site'");
		}
		}
	 
	 
	 }
}
?>