<?

include(inclPath('classes').'/sm.php');

function varP($key)

{

  $postval='';

  if(isset($_POST[$key]))

  {

     $postval=str_replace('m#m','&',$_POST[$key]);

  }

  return $postval;

  

}



function varG($key)

{

  $getval='';

  if(isset($_GET[$key]))

  {

     $getval=$_GET[$key];

  }

  return $getval;

  

}



function tinyMce()

{

  include('tinyMCE.php'); 

}







class os extends sm 

{





 ## --- property  234

 	var $propType=array('Rent'=>'Let','Buy'=>'Sale' );

	var $propTypeRent=array('Rent'=>'Let'  );

	var $propTypeBuy=array( 'Buy'=>'Sale' );	

	var $propUnit=array('Rent'=>'pcm','Buy'=>'' );

	//var $propFeature=array('No'=>'No','Yes'=>'Yes' );

	var $propFeature=array('No'=>'No','Featured Sales'=>'Featured Sales','Featured Rentals'=>'Featured Rentals' ,'Recently Added'=>'Recently Added');

	var $leasehold=array('Leasehold'=>'Leasehold','Freehold'=>'Freehold','Share of Freehold'=>'Share of Freehold','Contract'=>'Contract');	

	//var $propLebel=array('-'=>'No Lebel','Sold'=>'Sold','Let'=>'Let','Rented'=>'Rented' );

	 

	var $propLebel=array('-'=>'No Label','Sold'=>'Sold','Let'=>'Let','Under offer'=>'Under offer' ,'Let & Managed'=>'Let & Managed','Managed'=>'Managed','Let Agreed'=>'Let Agreed','For Sale'=>'For Sale','To Let'=>'To Let');

	

	 

	//var $propImageType=array('Details'=>'Details','Featured'=>'Featured','Listing'=>'Listing','Listing Small'=>'Listing Small','Sliding'=>'Sliding' );

	var $propImageType=array( ''=>'Select Type','Primary '=>'Primary Image' );

	

	var $orderBy=array( 'title'=>'Title','price '=>'Price' );

	var $ascDesc=array( 'asc'=>'ASC','desc'=>'DESC' );

	

	var $propertyType=array('0'=>'Not Specified','1'=>'Terraced House','2'=>'End of terrace house','3'=>'Semi-detached house','4'=>'Detached house',

							'6'=>'Cluster house','7'=>'Ground floor flat','8'=>'Flat','9'=>'Studio flat','10'=>'Ground floor maisonette','11'=>'Maisonette',

							'12'=>'Bungalow','13'=>'Terraced bungalow','14'=>'Semi-detached bungalow','15'=>'Detached bungalow','23'=>'Cottage',

							'27'=>'Villa','28'=>'Apartment','48'=>'House share','52'=>'Farm House');





 ## --- property  234

 

 ##-- member----444#

	//var $memberType=array( 'Individual'=>'Individual','Company'=>'Company');  

		var $memberType=array(''=>'', 'Prospective Tenant'=>'Prospective Tenant','Existing Tenant'=>'Existing Tenant');  

	var $source=array( 'Property'=>'Property','Website '=>'Website','Rightmove '=>'Rightmove','Leaftet '=>'Leaftet','Newspapers '=>'Newspapers','Others '=>'Others');  

	//var $status=array( 'FTB'=>'FIRST TIME BUYER','OTS'=>'OWNER TO SELL','NTS'=>'NOTHING TO SELL','LTB'=>'LET TO BUY','BTL'=>'BUY TO LET','SSPC'=>'SOLE SUBJECT TO CONTRACTS','LTR'=>'LOOKING TO RENT');  

	

	var $status=array( 'LANDLORD'=>'LANDLORD','TENANT'=>'TENANT');  

	

	

	var $statusActive=array( 'Active'=>'Active','InActive'=>'InActive');  

	var $alertType=array( 'Appointment'=>'Appointment','Followup'=>'Followup');  

	

	var $appoStatus=array( ''=>'','Cancelled'=>'Cancelled','Viewed'=>'Viewed','Closed'=>'Closed','Noshow'=>'Noshow');  

	

	

	

	var $folloStatus=array( 'PendingCall'=>'PendingCall','CloseCall'=>'CloseCall'); 

	 

	var $staffAppo=array( 'User1'=>'User1','User2'=>'User2','User3'=>'User3','User4'=>'User4');  

	var $staffAppoColorClss=array( 'User1'=>'colorOrange','User2'=>'colorBlue','User3'=>'colorGreen','User4'=>'colorYellow');   

	

	var $ampm=array( 'AM'=>'AM','PM'=>'PM');  

	var $title=array( 'Mr'=>'Mr','Mrs'=>'Mrs','Miss'=>'Miss','Ms'=>'Ms','Dr'=>'Dr');     

	var $docStatus=array( 'Recent'=>'Recent','Old'=>'Old'); 

	var $propertyStatus=array( 'Active'=>'Active','Archives'=>'Archives'); 

	//var $propertyStatus=array( 'Sold'=>'Sold','Under Offer'=>'Under Offer','On The Market'=>'On The Market','Reserved'=>'Reserved','Valuation'=>'Valuation','Archives'=>'Archives'); 

	

	var $attrType=array( 'House'=>'House','Bunglow'=>'Bunglow','Flats/apartments'=>'Flats/apartments','Maisonette'=>'Maisonette','cottage'=>'cottage','Studio Flat'=>'Studio Flat','Single Room'=>'Single Room','Double Room'=>'Double Room'); 

	var $attrStyle=array( 'Terraced'=>'Terraced','End of Terrace'=>'End of Terrace','Detached'=>'Detached','Semi-detached'=>'Semi-detached','Mews'=>'Mews','Ground Floor'=>'Ground Floor','Upper Floor'=>'Upper Floor'); 

	var $attrExternal=array( 'communal garden'=>'communal garden','garden'=>'garden','LandPaddock'=>'LandPaddock','suburban'=>'suburban','rural'=>'rural','village'=>'village','Mews'=>'Mews','Mews'=>'Mews','Mews'=>'Mews','Mews'=>'Mews','Mews'=>'Mews','Mews'=>'Mews','town/city'=>'town/city'); 

	var $attrSpecial=array( 'Retirement'=>'Retirement','lift'=>'lift','Accesible'=>'Accesible','Residential parking'=>'Residential parking','Garage'=>'Garage','Double garage'=>'Double garage'); 

	

	var $appoType=array( 'Viewing'=>'Viewing','Marketapprisal'=>'Marketapprisal','Appointment'=>'Appointment','Meeting'=>'Meeting','Second Viewing'=>'Second Viewing','general'=>'general','others'=>'others');  

	

	var $appoTypeColor=array( 'Viewing'=>'#FFFF00','Marketapprisal'=>'#CCFF66','Appointment'=>'#00CC00','Meeting'=>'#FF6600','Second Viewing'=>'#FFCC00','general'=>'#FF33FF','others'=>'#FFFFFF');

	 

	 

	

	

	

	var $appoTime=array( ''=>'','09:00 AM'=>'09:00 AM','09:15 AM'=>'09:15 AM','09:30 AM'=>'09:30 AM','09:45 AM'=>'09:45 AM','10:00 AM'=>'10:00 AM','10:15 AM'=>'10:15 AM','10:30 AM'=>'10:30 AM','10:45 AM'=>'10:45 AM','11:00 AM'=>'11:00 AM','11:15 AM'=>'11:15 AM','11:30 AM'=>'11:30 AM' ,'11:45 AM'=>'11:45 AM','12:00 PM'=>'12:00 PM'  ,'12:15 PM'=>'12:15 PM','12:30 PM'=>'12:30 PM'   ,'12:45 PM'=>'12:45 PM','01:00 PM'=>'01:00 PM'   ,'01:15 PM'=>'01:15 PM','01:30 PM'=>'01:30 PM'   ,'01:45 PM'=>'01:45 PM','02:00 PM'=>'02:00 PM'   ,'02:15 PM'=>'02:15 PM','02:30 PM'=>'02:30 PM'  ,'02:45 PM'=>'02:45 PM','03:00 PM'=>'03:00 PM' ,'03:15 PM'=>'03:15 PM','03:30 PM'=>'03:30 PM'  ,'03:45 PM'=>'03:45 PM','04:00 PM'=>'04:00 PM' ,'04:15 PM'=>'04:15 PM','04:30 PM'=>'04:30 PM' ,'04:45 PM'=>'04:45 PM','05:00 PM'=>'05:00 PM','05:15 PM'=>'05:15 PM','05:30 PM'=>'05:30 PM' ,'05:45 PM'=>'05:45 PM','06:00 PM'=>'06:00 PM' ,'06:15 PM'=>'06:15 PM','06:30 PM'=>'06:30 PM','06:45 PM'=>'06:45 PM','07:00 PM'=>'07:00 PM','07:15 PM'=>'07:15 PM','07:30 PM'=>'07:30 PM','07:45 PM'=>'07:45 PM','08:00 PM'=>'08:00 PM');

	

	

    

   // var $appoMin=array(''=>'','09:00 AM'=>'540','09:15 AM'=>'555','09:30 AM'=>'570','09:45 AM'=>'585', '10:00 AM'=>'600','10:15 AM'=>'615','10:30 AM'=>'630','10:45 AM'=>'645','11:00 AM'=>'660','11:15 AM'=>'675','11:30 AM'=>'690'   ,'11:45 AM'=>'705','12:00 PM'=>'720'   ,'12:15 PM'=>'735','12:30 PM'=>'750'   ,'12:45 PM'=>'765','01:00 PM'=>'780'   ,'01:15 PM'=>'795','01:30 PM'=>'810'   ,'01:45 PM'=>'825','02:00 PM'=>'840'   ,'02:15 PM'=>'855','02:30 PM'=>'870'  ,'02:45 PM'=>'885','03:00 PM'=>'900' ,'03:15 PM'=>'915','03:30 PM'=>'930'  ,'03:45 PM'=>'945','04:00 PM'=>'960' ,'04:15 PM'=>'975','04:30 PM'=>'990' ,'04:45 PM'=>'1005','05:00 PM'=>'1020','05:15 PM'=>'1035','05:30 PM'=>'1050' ,'05:45 PM'=>'1075','06:00 PM'=>'1080' ,'06:15 PM'=>'1095','06:30 PM'=>'1110','06:45 PM'=>'1125','07:00 PM'=>'1140','07:15 PM'=>'1155','07:30 PM'=>'1170','07:45 PM'=>'1185','08:00 PM'=>'1200');





 //var $appoTime=array( ''=>'','09:00 AM'=>'09:00 AM','09:30 AM'=>'09:30 AM','10:00 AM'=>'10:00 AM','10:30 AM'=>'10:30 AM','11:00 AM'=>'11:00 AM','11:30 AM'=>'11:30 AM' ,'12:00 PM'=>'12:00 PM'  ,'12:30 PM'=>'12:30 PM'   ,'01:00 PM'=>'01:00 PM'   ,'01:30 PM'=>'01:30 PM'   ,'02:00 PM'=>'02:00 PM'   ,'02:30 PM'=>'02:30 PM'  ,'03:00 PM'=>'03:00 PM' ,'03:30 PM'=>'03:30 PM'  ,'04:00 PM'=>'04:00 PM' ,'04:30 PM'=>'04:30 PM' ,'05:00 PM'=>'05:00 PM','05:30 PM'=>'05:30 PM' ,'06:00 PM'=>'06:00 PM' ,'06:30 PM'=>'06:30 PM','07:00 PM'=>'07:00 PM','07:30 PM'=>'07:30 PM','08:00 PM'=>'08:00 PM');

	

	

    

    var $appoMin=array(''=>'','09:00 AM'=>'540','09:15 AM'=>'555','09:30 AM'=>'570','09:45 AM'=>'585', '10:00 AM'=>'600','10:15 AM'=>'615','10:30 AM'=>'630','10:45 AM'=>'645','11:00 AM'=>'660','11:15 AM'=>'675','11:30 AM'=>'690'   ,'11:45 AM'=>'705','12:00 PM'=>'720'   ,'12:15 PM'=>'735','12:30 PM'=>'750'   ,'12:45 PM'=>'765','01:00 PM'=>'780'   ,'01:15 PM'=>'795','01:30 PM'=>'810'   ,'01:45 PM'=>'825','02:00 PM'=>'840'   ,'02:15 PM'=>'855','02:30 PM'=>'870'  ,'02:45 PM'=>'885','03:00 PM'=>'900' ,'03:15 PM'=>'915','03:30 PM'=>'930'  ,'03:45 PM'=>'945','04:00 PM'=>'960' ,'04:15 PM'=>'975','04:30 PM'=>'990' ,'04:45 PM'=>'1005','05:00 PM'=>'1020','05:15 PM'=>'1035','05:30 PM'=>'1050' ,'05:45 PM'=>'1075','06:00 PM'=>'1080' ,'06:15 PM'=>'1095','06:30 PM'=>'1110','06:45 PM'=>'1125','07:00 PM'=>'1140','07:15 PM'=>'1155','07:30 PM'=>'1170','07:45 PM'=>'1185','08:00 PM'=>'1200');













  var $showInWebsite=array('0'=>'Hide In Website','1'=>'Show In Website');

    var $outcome=array(''=>'','Accepted'=>'Accepted','Thinking'=>'Thinking');

	

 ##-- member -----444#

    var $purposePorperty=array(''=>'','Residential'=>'Residential','Commercial'=>'Commercial');

	## ------ For dss and available keys -----------###

	var $propYn=array(''=>'','No'=>'No','Yes'=>'Yes' );

	var $workingStatusg=array('Working'=>'Working','DSS'=>'DSS','Part DSS'=>'Part DSS' );

	var $facilityGas=array(''=>'','Gas and Electric'=>'Gas and Electric','Gas'=>'Gas','Electric'=>'Electric' );

	

## rent managemennt

var $rentMonths = array (

        '' => '',

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

var $rentYears=array(''=>'','2015'=>'2015','2016'=>'2016','2017'=>'2017');

var $amountStatus=array(''=>'','Received'=>'Received','Pending'=>'Pending');

var $llAmountStatus=array(''=>'','Paid To Landlord'=>'Paid To Landlord','Pending'=>'Pending');

var $contractStatus=array(''=>'','Active'=>'Active','Terminated'=>'Terminated');



	

	

	var $bedDD=array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6');

	var $bathDD=array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6');

	var $recceptionDD=array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6');

	

	var $adminAccess=array('Agreements'=>'Agreements','Rents'=>'Rents','Landlord Payments'=>'Landlord Payments','Expense'=>'Expense','Report'=>'Report','In out report'=>'In out report','Rent Details'=>'Rent Details','Website Pages'=>'Website Pages');

	

	function checkAccess($accKey=''){

		if($accKey!=''){

			$accArr = array();

			

			if($this->userDetails['access']!=''){

				$accArr = explode(',',$this->userDetails['access']);

			}

			if(is_array($accArr) && in_array($accKey,$accArr)){

				return true;

			}

		}

		else{

			return false;

		}

	}

	

	



   var $hhh=array('1'=>'one','2'=>'two');

   var $activeStatus=array('1'=>'one','2'=>'two');		

	function changeStatusDD_2($statusArr,$selected,$table,$satusfld,$idFld,$idVal,$colorStatus)

	{

		

	    $vars=	"'$table','$satusfld','$idFld','$idVal'";		

		$backGround=($colorStatus[$selected])?$colorStatus[$selected]:'FFFFFF';

		echo '<input type="text"   value='.$selected.' id="changeStatusDD_2" name="changeStatusDD" style="width:50px;height:10px;" onchange="os.changeStatus(this,'.$vars.')" >';

		// return   $selected;



	}

	

	function viewToday()

	{

	  return date('d-m-Y');

	}

	

	function viewNextWeek()

	{

	$nextw  = mktime(0, 0, 0, date("m"),   date("d")+7,   date("Y"));

	

	 return date('d-m-Y',$nextw);

	

	}

	

	

	function startOB()

	{

	     ob_start();

	}

	function getOB()

	{

	     return ob_get_clean();

	}

	

	

	// added by mizanur 08-01-2016

	## paging start  pppppp

	

	function page($total,$showPerPage='')

	{

	

	 if($showPerPage<1)

	 {

	     $showPerPage=$this->showPerPage;

	 }

	

	    $pageCount=1;

		if($total>0)

		{

		 $pageCount=ceil($total/$showPerPage);

		}

		

		return $pageCount;

	

	

	}

	

	function pageLink($total,$showPerPage='',$seoUrl=false,$ajax=false)

	{

	    $res['links']='';

		$res['pageNo']=1;

		$res['limit']='';

		

		$linkChar='';

		if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		$res['showPerPage']=$showPerPage;

		if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		

		

		$pageId='wtpage';

	    $pageNo=0; 

		$link='';

		$selectedLink='';

		$linkUrl='';

		$totalPage=0;

		$prev='Prev';

		$next='Next';

		$totalPage=$this->page($total,$showPerPage);

		$loopstart=1;

		$loopend=$totalPage;

		$showPages=ceil($this->showPages/2);

		

		$link=$_SERVER["REQUEST_URI"];

		

		$linkMatch=preg_match("/".$pageId."=[0-9]*/",$link,$match);

		if(isset($match[0]))

		{

		 

		 $pageNo=(int)str_replace($pageId.'=','',$match[0]);

		 

		}

		if($pageNo<1)

		{

		$pageNo=1;

		}

	 		 

		

		

	 

		 if($seoUrl)

		 {		 

		 $link=preg_replace("/\/".$pageId."=[0-9]*/","",$link);

		 		 

		 }else

		 {

		

		  $link=preg_replace("/&".$pageId."=[0-9]*/","",$link);

		 

		 }

		 

		 if(substr($link, -4)=='.php')

		{

		  $link=$link;  // backendLink

		

		}

		 

		 if(substr($link, -1)=='/')

		 {

		  $link=substr($link, 0, -1); 

		   $link=$link.'/home';  // default link at root 666

		 }

		 

		 

		  if(!$seoUrl)

		  {

		 

			  if(substr($link, -4, -1)=='.ph')

			 {

			  $link= $link.'?';

			 }

		 

		  

		  }

		  

		  

		  

		  if($totalPage>1)

		  {

		    $linkUrl='';$linkChar=='';

		    $linkChar=($seoUrl)? '/':'&';

			$res=array();

			$this->startOB();

			

			if($pageNo>1){	

			$prevPage=$pageNo-1;

			

			  $finalLink=' href="'.$link.$linkChar.$pageId."=".$prevPage.'" ';

			  

			 

			  if($ajax)

			  {

			  $finalLink=' href="javascript:void(0)"  onclick="wtAjaxPagination(\''.$pageId.'\',\''.$prevPage.'\')"       ';

			  }

			

			?><a <? echo  $finalLink ?>><?php echo $prev ?></a><?php

			}else

			{

			?><a   href="javascript:void(0)"  style="color:#CCCCCC; cursor:auto;"><?php echo $prev ?></a><?php

			}

			

			# show pages ----

			if($this->showPages>0)

			{

			   $loopstart=$pageNo-$showPages;

			    $loopend=$pageNo+$showPages;

			}

			

			$loopstart=($loopstart<1)?1:$loopstart;

			$loopend=($loopend>$totalPage)?$totalPage:$loopend;

			

			#show pages 

			

			

			

			

		    for($i=$loopstart;$i<=$loopend ;$i++)

			{

			$selectedLink='';

			  

			$linkUrl=$link.$linkChar.$pageId."=$i";

			 			

			$selectedLink=($pageNo==$i)?'class="selected"':'';

			 	

				

			 $finalLink=' href="'.$link.$linkChar.$pageId."=".$i.'" ';

			  if($ajax)

			  {

			  $finalLink=' href="javascript:void(0)"  onclick="wtAjaxPagination(\''.$pageId.'\',\''.$i.'\')"       ';

			  }	

				

			?>

			<a <?php echo $selectedLink; ?> <? echo  $finalLink ?> ><?php echo $i ?></a>

			

			<?php 

			

			}

			 

			if($pageNo<$totalPage){	

			$nextPage=$pageNo+1;

			

			$finalLink=' href="'.$link.$linkChar.$pageId."=".$nextPage.'" ';

			  if($ajax)

			  {

			  $finalLink=' href="javascript:void(0)"  onclick="wtAjaxPagination(\''.$pageId.'\',\''.$nextPage.'\')"       ';

			  }	

			?><a  <? echo  $finalLink ?>><?php echo $next ?></a><?php

			}

			else

			{

			?><a   href="javascript:void(0)" style="color:#CCCCCC; cursor:auto;"><?php echo $next ?></a><?php

			}

			

			$res['links']=$this->getOB();

			$res['showPerPage']=$showPerPage;

			$res['pageNo']=$pageNo;

			  $limit=($pageNo-1)*$showPerPage;

			$res['limit']="$limit , $showPerPage";

		    return $res;

		 

		  

		  }

	

	}

	

	function pagingQuery($query,$showPerPage='',$seoUrl=true,$ajax=false)

	{

	   $limit='';

	    if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		$p=$this->mq('select count(*) t '. stristr($query, 'from'));

		$rs=$this->mfa($p);

		$res=$this->pageLink($rs['t'],$showPerPage,$seoUrl,$ajax);

		if(trim($res['limit'])!='') {$limit=" Limit  ".$res['limit'];}

	    $querywithLimit=$query.$limit;

		$p=$this->mq($querywithLimit);

		$res['resource']=$p;

		$res['totalRec']=$rs['t'];

		return $res;

		 

	

	

	}

	

	///for rent management  66666666

	

	function datesB2nDateRange($from,$to,$interval,$format)

	{

	        //$from_Y date('', strtotime($from));

	        $dateRangeArray=array();

			$begin = new DateTime( $from );

			$end = new DateTime( $to );

			$interval = new DateInterval($interval);  

			$end->add( $interval );

			$daterange = new DatePeriod($begin, $interval ,$end);

			

			foreach($daterange as $date)

			{

				$dateRangeArray[] = $date->format($format);  

			}

			return $dateRangeArray;

	}

	

	

	function addAgrementRentbillsLandlordbills($agreement,$rentagreementId)

	{

	  $dateRange=  $this->datesB2nDateRange($agreement['fromDate'],$agreement['toDate'],'P1M','Y-m');

	 

	   $rentDueDateDay=date('d',strtotime($agreement['rentDueDate'])) ; 

	    $landLordDueDateDay=date('d',strtotime($agreement['landLordDueDate'])) ; 

	   

	   if(count($dateRange)>0 && count($dateRange)<24)

	   {

	   

	     foreach($dateRange as $ym)

		 {

			$ymA=explode('-',$ym);

			$year= $ymA[0];

			$month= $ymA[1];

			 $rentDueDate=$year.'-'.$month.'-'.$rentDueDateDay." 00:00:00";

			  $landLordDueDate=$year.'-'.$month.'-'.$landLordDueDateDay." 00:00:00";

			 

			# Rentbills  adding 

			$dataToSave=array(); 

			$dataToSave['rentagreementId']=$rentagreementId; 

			$dataToSave['agreementReffId']=$agreement['agreementReffId']; 

			$dataToSave['rentAmount']=$agreement['rentAmount']; 

			$dataToSave['rentMonth']=$month; 

			$dataToSave['rentYear']=$year; 

			$dataToSave['rentArrears']=0; 

			$dataToSave['rentOtherBills']='';  # not in use

			$dataToSave['paybleAmount']=$agreement['rentAmount']; 

			$dataToSave['receivedAmount']=0; 

			$dataToSave['dueAmount']=0; 

			$dataToSave['dueDate']=$rentDueDate; 

			$dataToSave['dated']=$rentDueDate; 

			$dataToSave['paymentStatus']='Pending'; 

			$dataToSave['note']=''; 

			$dataToSave['modifyDate']=$this->now();

			$dataToSave['modifyBy']=$this->userDetails['adminId']; 

			$dataToSave['addedDate']=$this->now();

			$dataToSave['addedBy']=$this->userDetails['adminId'];

		   	$rentbillId=$this->save('rentbill',$dataToSave,'rentbillId',0);	

	

	        # landlordbill  adding 

			$dataToSave=array();

	        $dataToSave['dated']=$landLordDueDate; 

			$dataToSave['rentbillId']=$rentbillId; 

			$dataToSave['agreementReffId']=$agreement['agreementReffId']; 

			$dataToSave['rentAmountLandlord']=$agreement['rentAmountLandlord'];  

			$dataToSave['commission']=$agreement['commission'];

			$dataToSave['landlordOtherBills']='';  #   not in use

			$dataToSave['paybleAmount']=$agreement['rentAmountLandlord']-$agreement['commission'];

			$dataToSave['paidAmount']=0; 

			$dataToSave['paymentStatus']='Pending'; 

			$dataToSave['note']=''; 

			$dataToSave['rentMonth']=$month; 

			$dataToSave['rentYear']=$year; 

	    	$dataToSave['modifyDate']=$this->now();

			$dataToSave['modifyBy']=$this->userDetails['adminId']; 

			$dataToSave['addedDate']=$this->now();

			$dataToSave['addedBy']=$this->userDetails['adminId'];

		   	$landlordbillId=$this->save('landlordbill',$dataToSave,'landlordbillId',0);	

			 

		 

		 }

	   

	   }

	

	  

		

	 

 

  

	}

	 

	

	

	var $rentMonth = array (

        '' => '',

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

var $rentYear=array(''=>'','2015'=>'2015','2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020');

	

	var $agreementStatus=array(''=>'','Valid'=>'Valid','Expired'=>'Expired');

	var $rentPaymentStatus=array(''=>'','Pending'=>'Pending','Add To Next'=>'Add To Next','Paid'=>'Paid');

	var $landlordpaymentStatus=array(''=>'','Pending'=>'Pending','Paid'=>'Paid');

	var $operationSign=array(''=>'+','-'=>'-');

	var $paymentMode=array('Online'=>'Online','Cash'=>'Cash','Cheque'=>'Cheque','Bank Deposite'=>'Bank Deposite');

	var $expCategory=array(''=>'','Wages'=>'Wages','Property renovation'=>'Property renovation','Cash withdrawn'=>'Cash withdrawn','Electricity'=>'Electricity','Gas'=>'Gas','Waterbill'=>'Waterbill','Council Tax'=>'Council Tax','Internet'=>'Internet','Car'=>'Car','Food'=>'Food','Office expenses'=>'Office expenses','Loan'=>'Loan','Petty cash'=>'Petty cash');

	

	

	



















	

	

	

	

	

	

	

	var $exppaymentStatus=array(''=>'','Pending'=>'Pending','Paid'=>'Paid');

	

	// call back

	function calculateRentTotal($option,$linkidVal)

	{    

			extract($option);

			if($linkidVal!='')

			{ $condition .="  $foreignId!='' and $foreignId>0 ";

			  $condition .=" and $foreignId='$linkidVal'";

			}

			$tableQuery=str_replace('[condition]',$condition,$tableQuery);

			//echo  $tableQuery;

			$rs=$this->mq($tableQuery);

			$result=0;

			while($rec=$this->mfa($rs))

			{

			

			if($rec['sign']=='' || $rec['sign']=='+' )

			{

			$result +=(float)$rec['amount'];

			}

			if($rec['sign']=='-' )

			{

			$result -=(float)$rec['amount'];

			

			}

			

			 

			  

			  

			  

			}

			echo $result;

			

			 

	}

	function calculateRentLandlordTotal($option,$linkidVal)

	{    

			extract($option);

			if($linkidVal!='')

			{ $condition .="  $foreignId!='' and $foreignId>0 ";

			  $condition .=" and $foreignId='$linkidVal'";

			}

			$tableQuery=str_replace('[condition]',$condition,$tableQuery);

			//echo  $tableQuery;

			$rs=$this->mq($tableQuery);

			$result=0;

			while($rec=$this->mfa($rs))

			{

			

			if($rec['sign']=='' || $rec['sign']=='+' )

			{

			$result +=(float)$rec['amount'];

			}

			if($rec['sign']=='-' )

			{

			$result -=(float)$rec['amount'];

			

			}

			

			 

			  

			  

			  

			}

			echo $result;

			

			 

	}

	

	

	function calculatePaymentTotal($option,$linkidVal)

	{    

			extract($option);

			if($linkidVal!='')

			{ $condition .="  $foreignId!='' and $foreignId>0 ";

			  $condition .=" and $foreignId='$linkidVal'";

			}

			$tableQuery=str_replace('[condition]',$condition,$tableQuery);

			//echo  $tableQuery;

			$rs=$this->mq($tableQuery);

			$result=0;

			while($rec=$this->mfa($rs))

			{

						 

			$result +=(float)$rec['amount'];

						  

			}

			echo $result;

			

			 

	}

	

	function getIdsByAgreemenRefeId($agreementReffId)

	{

	 $data=array();

	  if($agreementReffId!='')

	  {

				$temp=explode('A',$agreementReffId);

				$rentagreementId=(int)$temp[1];

				

				 

				$temp=explode('T',$agreementReffId);

				$memberIdT=(int)$temp[1];

				

				 

				$temp=explode('P',$agreementReffId);

				$propertyId=(int)$temp[1];

				

				 

				$temp=explode('L',$agreementReffId);

				$memberIdL=(int)$temp[1];

				

				 $data['rentagreementId']=$rentagreementId;

				 $data['memberIdTenant']=$memberIdT;

				  $data['propertyId']=$propertyId;

				   $data['memberIdLandlord']=$memberIdL;

	                            

	  

	  

	  

	  }

	  return $data;

	}

	

	 function getByagreementReffId($agreementReffId)

	 {

	  $ids=$this->getIdsByAgreemenRefeId($agreementReffId);

	  

			

			

			

			$rentagreementId=$ids['rentagreementId'];

			$rec=$this->get_rentagreement(" rentagreementId=$rentagreementId ");

			$data['rentagreement']=$rec[0];

			

			

			$memberId=$ids['memberIdTenant'];

			$rec=$this->get_member(" memberId=$memberId ");

			$data['memberTenant']=$rec[0];

			 

			

			$memberId=$ids['memberIdLandlord'];

			$rec=$this->get_member(" memberId=$memberId ");

			$data['memberLandlord']=$rec[0];

			

			$propertyId=$ids['propertyId'];

			$rec=$this->get_property(" propertyId=$propertyId ");

			$data['property']=$rec[0];

			 

       return $data;

     

			

	  

	   

	 

	 }

	  

	  function billHeaders()

	  {

		$head['titletag']='ROWFLEX PROPERTY SERVICES';

		$head['name']='ROWFLEX PROPERTY SERVICES';

		$head['address']='333 Barking Road, East Ham London';

		$head['postcode']='E6 1LA';

		$head['tel']='0208 472 5579';

		$head['email']='info@rowflex.co.uk';

		$head['website']='www.rowflex.co.uk';

		$head['bank']=' ';

		$head['SortCode']=' ';

		$head['Account']=' ';

		return  $head;

	  }

	 

      function arrearsToNextMonth($rentMonth,$rentYear,$dueAmount,$rentbillId)

	  {

	      

		  if($rentMonth>0 && $rentYear>0  && $rentbillId>0)

		  {

		  	$rec=$this->get_rentbill(" rentbillId='$rentbillId' ");

			$rentbill=$rec[0];

			$agreementReffId=$rentbill['agreementReffId'];

			

			 $nextMonth=$rentMonth+1;

			 $year=$rentYear;

			 if($nextMonth>12){ $nextMonth='01';  $year=$rentYear+1; }

			 

			 $updatequery=" update rentbill set rentArrears='$dueAmount' where agreementReffId= '$agreementReffId' and rentMonth='$nextMonth' and  rentYear='$year' " ;

			 $this->mq($updatequery);

		  

		  

		  }

		  

		  

	  

	  }



	  

	  function deleteRentLandlordByAgreementId($rentagreementId)

	  {

				$rentbillIds=$this->get_rentbill(" rentagreementId='$rentagreementId' ") ;

				if(is_array($rentbillIds)){

				foreach($rentbillIds as $rentbillIdA)

				{

				$rentbillId= $rentbillIdA['rentbillId'];

				

				$updateQuery="delete from rentbill where rentbillId='$rentbillId'";

				$this->mq($updateQuery);

				$updateQuery="delete from landlordbill where rentbillId='$rentbillId'";

				$this->mq($updateQuery);

				

				

				

				}

  

  }

	  

	  

	  }

	///for rent management  66666666 end



}





$os= new os;



global $autoSeoId; 

function uniqueSEOid($seoId,$NseoId,$rowId)

 {

         static $i=1;   global $autoSeoId;

			

			if($rowId>0)

			{

			   $andId=" and  propertyId!='$rowId'";

			}

			$proQuery=" select count(*) cc from property where seoId='$NseoId' $andId  ";

			$prors=mysql_query($proQuery);

			$pro=mysql_fetch_assoc($prors);

			if($pro['cc']>0)

			{

			$i++;

			 

			 uniqueSEOid($seoId,$seoId.'-'.$i,$rowId);

			

			}else

			{

			 

			$autoSeoId=$NseoId;

			// return $seoId;

			

			}

			

 

    

 }