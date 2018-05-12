<? 
include('crmE.php');
include('sefu.php');
class language 
{
var $lang=array();

function language()
{
        
		$this->lang[1][Language]='English';
		$this->lang[1][page]='English.php';
		
		
		
		$this->defaultKey['English']=1;
		
		
		
		
}


	function langOption()
	{
			
			  if(count($this->lang)>0)
			  {
			
							   foreach($this->lang as $key=>$val)
							   {
								$lang[$key]=$val[Language];
							  
							   }
			   }
			   return $lang; 
	  
	 } 
	function setLanguage($langId)
	{	    
	   
	   global $site;
	   $langId=1;
	   
		$defaultL=$this->defaultKey[$site['defaultLanguage']];
		$defaultL=($defaultL<1)?1:$defaultL;	
		
	    $langId=($langId<1)?$defaultL:$langId;#if configure default language missing then default english
		
		  $_SESSION[myLanguage][Id]=$langId; 
		  $_SESSION[myLanguage][Lang]=$this->lang[$langId][Language];
		  $_SESSION[myLanguage][page]=$this->lang[$langId][page];
		 
	      return  $_SESSION[myLanguage][page];
	}
	
	
	

}


class systemFunction extends cms
{


function myLang($id)
{
   $this->lang=new language;
   require_once(inclPath('language').'/'.$this->lang->setLanguage($id));
   $this->sLang= $sLang;
  
   
}
function sL($key)
{
 echo  $this->sLang[$key];
}
function sLR($key)
{
 return  $this->sLang[$key];
}


function systemAccess()
{

                
					 if($this->currentPage!="login.php")
					 {
								 if(!$this->isLogin())
								  {
								 $this->Execute($this->rId[jump], 'login.php',"results"); 
								  }
					 }
}



function arrayString($a)
{

if(count($a)>0)
{
foreach($a as $key=>$val)
 {
 $str[]= "\"$key\" => \"$val\" ";
 
 }

$str='array('.implode(',', $str).')';

}



return $str;




}
function stringArray($s)
{
if(trim($s)!=""){

          eval('$a='.$s.';;');
		  }
return $a;
}
function cAccess($f)
	{
	   if($this->ap[$f]==1){echo 'checked';}
	 }

function cAccessImgTick($f)
	{
	global $site;
	   if($this->ap[$f]==1){echo '<img src="'.$site['url'].'images/ok.gif" />';}
	   else{echo '<img src="'.$site['url'].'images/nok.gif" />';}
	 }


function addJs($js)
	{
	
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
	
	   if(count($css)>0)
			  {
			
			   foreach($css as $valcss)
			   {
			  
			   $CssCss .=" <link href='$valcss' rel='stylesheet' type='text/css' />\n";
							  
			   }
			  
			  
			  } 
	  return $CssCss; 		  
	 }

function dFormatNT($normaldate) // Normal to Time Stamp
{

		if($normaldate!="")
		{
				 $normaldate=explode("/",$normaldate);
				 if(count($normaldate)>0)
				  {
				  
				   $normaldate= $normaldate[2]."-". $normaldate[0]."-". $normaldate[1]." 00:00:00";
				 
				  }
				
				
		}
		return $normaldate;
}
function dFormatTN($timestamp) //Time Stamp To Normal 
{

		if($timestamp!="")
		{
				 $timestamp=explode(" ",$timestamp);
				 $timestamp=explode("-",$timestamp[0]);
				 if(count($timestamp)>0)
				  {
				  
				   $timestamp= $timestamp[1]."/". $timestamp[2]."/". $timestamp[0];
				 
				  }
				
				
		}
		return $timestamp;
}



//$this->Execute($this->rId['jump'], $latUrl,"results"); 


// $truck->dateC('30/02/1998','dmy','mm/yyyy/dd');

	function dateC($date,$format,$newFormat)
	{
		  $oF=array('d'=>2,'m'=>2,'y'=>4);
		  $dF=array('d'=>'dd','m'=>'mm','y'=>'yyyy');
		  $pos=0;
		  $o=str_split($format);
		  foreach($o as $k=> $v)
		  {
			  $tD[$dF[$v]]= substr($date,$pos, $oF[$v]);
			  $pos=$pos+$oF[$v]+1;
		  }
		 
		  foreach($tD as $k=> $v)
		  {
		 	  $newFormat=str_replace($k,$v,$newFormat);
		  }
		  return 	$newFormat;
	}



	function getMe($q)
	{
		 $this->Execute($this->rId[rows],$q,'results');
		 return $this->results;
			 
	}
	function getMeP($q)
	{
		$this->Execute($this->rId['prows'],$q,"results"); 
		$res[records]=$this->results;
		$this->Execute($this->rId['plinks'],"results"); 
		$res[links]=$this->results;
		$res[linksAjax]=$this->pagingLinksAjax();
		
		return $res;
			 
	}

	function getT($tables="",$fields="",$where="",$orderby='',$limit='')
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
			$this->q=$q;	
			$_SESSION['exportQ'][$this->currentPage]=$this->q;
			
			
			
			return $this->getMe($q);
		}	
					  
	}	




	

function optionList($fieldKey,$fieldVal,$myArray)
{
   $fieldVal=explode("|",$fieldVal);
  
	if(count($myArray)>0)
		{
				 foreach($myArray as $val)
				 {
					 $optionListArray[$val[$fieldKey]]=$val[$fieldVal[0]]." ". $val[$fieldVal[1]];
				 }
				 
				return $optionListArray; 		 
		}

}


function StatusDropdown($ar,$selectedValue)
{
   $this->onlyOption($ar,$selectedValue);
}

function getRowById($table="",$idfields="",$id='')
{
   $val= $this->getT($table,'',$idfields."='$id'");
   return $val[0];
}







function searchByDate($dateField ,$sDate,$eDate)
{
$str="";
if(trim($sDate)!="")
		{
		
		  $str =" and $dateField >='$sDate'  ";
		}
		if(trim($eDate)!="")
		{
		
		$dm=explode("-",$eDate);
		
		$nextday  = mktime(0, 0, 0, $dm[1]  ,$dm[2] , $dm[0]);
        $nextday=date('Y-m-d 59:59:59',$nextday);
		
		  $str .=" and $dateField <= '$nextday' ";
		}
return $str;	

}



	function DateQ($fld,$sDate,$eDate,$sTime='00:00:00',$eTime='00:00:00')
	{
		if($sDate){
		$sDates=$this->dateC($sDate,'dmy','yyyy-mm-dd '.$sTime);
		}
		if($eDate){
		$eDates=$this->dateC($eDate,'dmy','yyyy-mm-dd '.$eTime);
		}
		
		return $this->searchByDate($fld ,$sDates,$eDates);
	
	
	}

function setTemp($array=NULL,$heder=NULL,$heading="")
{
    $un=date('YmdHms')."-".rand(999,9999);
    if($array!=NULL && count($array)>0)
    {
        $data=json_encode($array);
        $hdr=json_encode($heder);
        $q="insert into tempreport set mykey='$un', data='$data', head='$hdr', heading='$heading' ";
        $p=mysql_query($q);
        return $un;
    }

}
function getTemp($key)
{
   
    $data=$this->getT('tempreport',''," mykey='$key'");
    if($data[0]['data']!="")
    {
        $fdata['data']=json_decode($data[0][data],true);
        $fdata['head']=json_decode($data[0][head],true);
		$fdata['heading']=$data[0][heading];
        return $fdata;
    }
}

function strTopdf($strContent,$pagename)
{
	$pagename=date("Y-m-d_H-i",time())."_".$pagename.".pdf";
	require('html2pdf/html2fpdf.php');
	$pdf=new HTML2FPDF();
	$pdf->setBasePath('pdf');
	$pdf->SetFontSize(8);##66--notset
	$pdf->UseCSS(true);
	$pdf->SetFont($family,$style='',$size=8);
	$pdf->AddPage();
	$pdf->WriteHTML($strContent);
	$pdf->Output($pagename);
	return $pagename;
/*
$fp = fopen("sample.html","r");
$strContent = fread($fp, filesize("sample.html"));
fclose($fp);
*/
}

function sendMailAttached($to,$from,$fromName,$subj,$body,$filename)
{
 require_once("activeMailLib.php");
 $to = urldecode($to);
 $charset = "iso-8859-1";
 $encoding = "base64";
 $email=new activeMailLib("html");
		
      		
		   $email->Attachment($filename,$filename,999999,$disp="attachment",'pdf');
		
		
		
		$email->From($from,"$fromName");
		$email->To($to);
		$email->Subject($subj);
		$email->Message($body,$charset,'');

		$email->Send();
		
		//print $email->getRawData();
	
	    if (!$email->isSent($to)) 
			$result="An internal error occured. The email was not sent";
		else
		{
			$result="Email sent";
		}
 
     return $result;


  }


function timeFormatToDb($timFromInput)//input  05:26PM      output: 17:26:00
{
		
	$p=explode(':',$timFromInput);
	if(strpos($timFromInput, 'PM')>0)
	{
	 $add=12;
	}
	$hour=$p[0]+$add;
	$min=intval($p[1]);
	$sec='00';
	
     $result=$hour.":".$min.":".$sec;
		
	return $result;
}
function timeFormatToView($timeFromDb)//input 17:26:00      output: 05:26PM 
{
   if($timeFromDb==""){$timeFromDb='00:00:00';}
    $p=explode(':',$timeFromDb);
   $sec='AM';
	if($p[0]>12)
	{
	 $sec='PM';
	 $p[0]=$p[0]-12;
	}
	$hour=$p[0];
	$min=$p[1];
	
	
    $result=$hour.":".$min.$sec;
		
	return $result;
}


	
function rs($query)
	{
	   $this->Execute($this->rId[xecute],$query,'wt');
	   return $this->wt;	
	}
	
	function spc($v=1)
    {
		for($i=0;$i<=$v;$i++)
		{
		echo "&nbsp;";
		}
   }
   
   
	function now($format='Y-m-d h:i:s')
	{
	 return date($format,time());
	
	}
	
}






function initModels($modelss)
	{
	 try {

	
	
	
	
	global $site;
	$modelss=strrev($modelss);
	
	$models='';
	//$t=mysql_list_tables($site['db']);
	 
    $t = mysql_query("SHOW TABLES FROM  ".$site['db']);
	if(($t))
	{
	
	 while($ts=mysql_fetch_row($t))
	  {
	  
			$tName=$ts[0];
			$tModel='function get_'.$tName.'($where="",$orderby="",$limit="",$filds=""){ return  $this->getT("'.$tName.'",$filds,$where,$orderby,$limit);}
			function save_'.$tName.'($data,$primeryField="",$primeryFieldVal=""){ return $this->saveR("'.$tName.'",$data,$primeryField,$primeryFieldVal);}';
			$models.=$tModel; 
			
			
	   
	  }
				
		$models.='  function pagin'.'gResult($query="",$showPerPage=10){$this->paging= new paging($showPerPage);return $this->getMeP($query);}	
		function sa'.'ve($table,$data,$primeryField,$primeryFieldVal){	return $this->saveR($table,$data,$primeryField,$primeryFieldVal);}';
		
	  
	   	  
	
	}
	 
	   
		$modelsC='clas'.'s '.$modelss.' extends systemFunction{'.$models.'}';
		
		if($models=='')
		{
			//exit();
		}
		eval($modelsC);
			
	
	
	
	} catch  (Exception  $e) {  }
	}

initModels('s'.'o'.'t'.'w');
//$sF= new systemFunction;
?>