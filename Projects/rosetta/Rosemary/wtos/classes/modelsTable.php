<? 
include('sFunction.php');

class systemModel extends wtos 
{
	
	
	var $quickDatabase=array();
	var $activeColors=array('0'=>'F2C6C6','1'=>'A0EBB9');
	var $activeOptions=array('0'=>'Inactive','1'=>'Active');
	#-- status dd #
 
 
	
	
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
	  
	  
	    $list=$this->options($keyField,$valField,$tName,$where,$orderby,$limit);
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
	
	
	function editAreaField($value,$table,$editFld,$idFld,$idVal , $inputNameID='changeStatusDD',$extraParams='class="tArea" ')
	{
	   
	    
				
	    $vars=	"'$table','$editFld','$idFld','$idVal'";		
		?>
		<textarea  name="<? echo $inputNameID; ?>" id="<? echo $inputNameID; ?>"  onchange="os.changeStatus(this,<? echo $vars?>)" <? echo $extraParams; ?> ><? echo $value ?></textarea>
		<?
	}
	function editTextField($value,$table,$editFld,$idFld,$idVal , $inputNameID='changeStatusDD',$extraParams='class="tField" ')
	{
	   
	    
				
	    $vars=	"'$table','$editFld','$idFld','$idVal'";		
		?>
		<input name="<? echo $inputNameID; ?>" id="<? echo $inputNameID; ?>" type="text" name="changeStatusDD"  onchange="os.changeStatus(this,<? echo $vars?>)" value="<? echo $value ?>"  <? echo $extraParams; ?> > 
		
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
		
	
		      $_SESSION[$key][$var];
		
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


function getCountVal($table,$field,$fieldVal)
{
  $where=" $field='$fieldVal' ";
  
  return $this->getCount($table,$where);


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

function emailSend($to,$from,$fromName,$subj,$body)
{
	
	
	
	return $this->sendMail($to,$from,$fromName,$subj,$body );
	
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

	function mq($query)
	{
	  return mysql_query($query);
	}
	function mfa($rs)
	{
	 return mysql_fetch_assoc($rs);
	}
	
	function preparePage($editId='')
	{
       $totalPage=$this->getCount('pagecontent',$where='');
	  if($editId)
	   { 
	       if( $totalPage < $this->getSettings('pageCount')) 
		      {  
		       return true; 
			   }
			   else{ return false; }                      
	  
	  }
	  
	 
	  if( $totalPage < $this->getSettings('pageCount'))
	  {
	         return true;
	  
	  }else{
	  
	  $this->saveRecord=false;
	  return $this->saveRecord;
	  }   
	
	
	
	} 
	
	
	function hideTopLeft()
	{
	  if(isset($_GET['hideTopLeft']))
	  {
	   
	    echo '<style>
	  .leftside{ display:none;}
	  .headerimage{ display:none;}
	  .searchReset{ display:none;}
	  </style>
	   
	  ';
	 
	  
	  }
	
	
	}
	
	function addPopUp($listPage)
	{
	 $this->hideTopLeft();  
	  if(isset($_GET['addNewPopUp']))
	  {
	  
	   $listLink= $listPage.'.php?addNewPopUp='.$_GET['addNewPopUp'];
	    echo ' 
	  <script>
	   os.getObj("recordEditForm").action="'.$listLink.'";
	  </script>
	  
	  ';
	    echo '<style>
	 
	  .popupHide{ display:none;}
	  </style>
	   
	  ';
	 
	  
	  }
	
	}
	
	function popUpSaveAssign($insertedId)
	{
	  
	if(isset($_GET['addNewPopUp']) && $insertedId>0)
	  {
	    $params=explode('wtpopwt',stripslashes($_GET['addNewPopUp']));
	    $selectDDId=$params[0];
		$keyFld=$params[1];
		$ValFld=$params[2];
		$Table=$params[3];
		$where=$params[4];
		$orderby=$params[5];
		$limit=$params[6];
		ob_start(); $this->optionsHTML($insertedId,$keyFld,$ValFld,$Table,$where,$orderby,$limit); $htmlStr=ob_get_clean();
		$htmlStr=addslashes($htmlStr);
		?>
			<script>
			var categoryStr='<? echo $htmlStr; ?>';
			 
			var categoryIdentifier=window.opener.parent.document.getElementById("<?php echo $selectDDId ?>");
			categoryIdentifier.innerHTML=categoryStr;
			 
			
			window.close();
			</script>
		
		<?
		exit();
	  
	  }
	
	
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
	
	
	
	
	function validateWtos()
	{
	  if($this->currentPage=='settings.php'){ return ;}
	
	    ?>
		<style>
		.box{ font-style:italic; color:#353535; font-size:11px; text-align:center;
		} 
		
		</style>
		<? 
		 
		$checkSystem=$this->getSettings('Validate Wtos');
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
					<div class="box">
					System Expiry date: <font color="#FF0000" style=" font-size:15px;"> <? echo $expDate ?></font> &nbsp; 
					You have <font color="#FF0000" style=" font-size:15px;"> <? echo $days ?> Days Left </font>
					<? echo $expMessage; ?> <a href="activation.php">Activate Now</a>
					</div>
					<? 
					}
				 if($exitSystem) {?> 
				 
				 <div class="box" style="margin:auto; margin-top:100px; font-size:22px;">
					System Expired  <a href="activation.php" style="text-decoration:none; color:#FF0000;">Activate Now</a><br />
					<font style="font-size:12px;"> For acivation code contact <font style="color:#0000FF; font-size:14px;">admin@webtrackers.co.in </font>or <font style="color:#0000FF;font-size:14px;">033 6501 0194</font></font>
					</div>
				 
				 <? 
				  exit();	}
					
		   
	   
	    
		
		
		
	  
	
	
	}
	
	
	
	
	
	
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
	
}
?>