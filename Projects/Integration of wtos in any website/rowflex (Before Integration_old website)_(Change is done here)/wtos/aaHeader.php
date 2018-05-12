<?php session_start();

 

include('coomon.php');

	//  $loadImage=$site['url'].'image/loading.gif'; 

		$loadImage=$site['url'].'image/ele.gif'; 

		$tImage=$site['url'].'image/t.png'; 

		$cImage=$site['url'].'image/c.png'; 

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title><?php echo $site['siteTitle'];?></title>

<meta name="description" content="description">

<meta name="keywords" content="keywords1 , keywords2">

<script>

var themepath='<?php echo $themepath ?>';

</script>

<? 



$pagevar[myJs][]=$site['url'].'js/basic.function.js';

$pagevar[myJs][]=$site['url'].'js/common.js';

//$pagevar[myJs][]=$site['url'].'js/jquery-1.2.2.pack.js';



$pagevar[myCss][]=$site['themePath'].'css/style.css';



?>

<?   echo   $os->addCss($pagevar[myCss]); ?>

<?   echo  $os->addJs($pagevar[myJs]); ?>

		<script src="<?php echo $site['url']?>js/datepkr/jquery-1.7.2.js"></script>

		

		<link rel="stylesheet" href="<?php echo $site['url']?>wtos-theme/css/datepkr/jquery-ui.css">

		<script src="<?php echo $site['url']?>js/datepkr/jquery.ui.core.js"></script>

		<script src="<?php echo $site['url']?>js/datepkr/jquery.ui.datepicker.js"></script>

		

		<link rel="stylesheet" href="<?php echo $site['url']?>wtos-theme/css/jquery.autocomplete.css" type="text/css" media="screen" />

		<script type="text/javascript" src="<?php echo $site['url']?>js/jquery.autocomplete.js"></script>

		  <link rel="stylesheet" href="<?php echo $site['url']?>diary.css" type="text/css" media="screen" />



<?php

$os->validateWtos();

ob_start(); 

$recordPerPage= $os->recordPerPageDD();

$recordPerPageDDS=ob_get_clean();



?><script>

  var globalDateFormat='dd-mm-yy';

function dateCalander(){

	$( ".dtpk" ).datepicker({

	dateFormat: globalDateFormat,

	changeMonth: true,

	changeYear: true,

	yearRange: 'c-50:c+10'

	});

}

</script>





  

  <script>



   function open_pop_up(element,t,w,h)

 {

	 

		$( "#"+element ).dialog({title:t,height:h,width:w,modal:true});

	}

 

 function close_pop_up(element){ os.hide(element);}

 

  </script>

  <script>

	$(function() {

  $( "#datepickerFollowup" ).datepicker( { dateFormat: globalDateFormat,

      onSelect: function(date, picker){ listFollowups(date);    }

    } );

	

	 

} )



$(function() {

  $( "#datepickerDiary" ).datepicker( { dateFormat: globalDateFormat,

      onSelect: function(date, picker){   viewAppoByDate(date); resetAppo(); os.setVal('appoDate',date);  }

    } );

	

	 

} )





function nextDate(dateCount){

 

		var today = new Date();	

			

		today.setDate(today.getDate()+dateCount);

		

		var dd=today.getDate(); dd=dd.toString(); if(dd.length==1){dd='0'+dd;}

		var mm=today.getMonth()+1; mm=mm.toString(); if(mm.length==1){mm='0'+mm;}

		var yyyy=today.getFullYear();	

		

		if(globalDateFormat=='dd-mm-yy'){ var todayStr= dd+'-'+mm+'-'+yyyy; }	

		if(globalDateFormat=='mm-dd-yy'){ var todayStr= mm+'-'+dd+'-'+yyyy; }	

		

		return todayStr;

}



function toDayStr()

{

			

		return nextDate(0);	 

}



 function setCurrentDateIfBlank(dateFieldIds)

  {

  var  dateFieldIdsVal =os.getVal(dateFieldIds);

  

  if(dateFieldIdsVal==''){  

  dateFieldIdsVal=toDayStr();

  os.setVal(dateFieldIds,dateFieldIdsVal);

  }

  

  }

function nextweek(){

		return nextDate(7);	 

}





function setNextDate(dateFieldIds,dateCount)

{

 os.setVal(dateFieldIds,nextDate(dateCount));

}



function setCurrentMonth(monthFieldIds)

{

   var today = new Date();	

  var mm=today.getMonth()+1;

   

   os.setVal(monthFieldIds,mm);

}

function setCurrentYesr(yearFieldIds)

{

      var today = new Date();	

	  var yyyy=today.getFullYear();	

       os.setVal(yearFieldIds,yyyy);

}



















 function viewAppoByDate(dates)

 {

    

	 if(dates==''){		 

		   var today = toDayStr();

		 

		        dates=today;

			}

		 

			 

		//	dates='07-08-2015';  ////////////////////////////////////////////please look at me

		//alert(memberId);	

		var url='dates='+dates+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?viewAppoByDate=OK&'+url;	

		 

		os.animateMe.div='div_busy'; 

		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		

		os.setAjaxHtml('viewAppoByDateDIV',url);

	//	os.setAjaxFunc('showapporesult',url);

		return false;

	



 }

 

 

 

 

 function showapporesult(data)   // notinuse

 {

 alert(data);

 }

		





function closepopup(divid)

{

 $("#"+divid).dialog( "close" );

}



function defaultApplicant(memberId)

{

   window.location='<? echo $site['url']?>aaaplicant.php?defaultApplicant='+memberId;



}

function defaultAppo(memberId,appoId)

{

   window.location='<? echo $site['url']?>aaaplicant.php?defaultApplicant='+memberId+'&defaultAppo='+appoId;



}









 function setnextCallShow(memberId,vallue)

 {

    

	 

			 

		 

		var url='memberId='+memberId+'&vallue='+vallue+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?setnextCallShow=OK&'+url;	

		 

		os.animateMe.div='div_busy';

	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		

		os.setAjaxFunc('nextcallShowSuccess',url);

	//	os.setAjaxFunc('showapporesult',url);

		return false;

	



 }

 function nextcallShowSuccess(data)

 {

 var memId=parseInt(data);

 if(memId>0)

 {

 

   defaultApplicant(memId);

 }

   

 }



function printById(id){ // not in use

      	 

			var data = document.getElementById(id).innerHTML;

			

		 

			var  mywindow = window.open('aaron', 'aaronprint', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width=900,height=600,left=10, top=10,screenX=10,screenY=10');

			mywindow.document.write('<html><head> ');	

			

					mywindow.document.write('<link rel="stylesheet" href="<? echo $site['url'] ?>wtos-theme/css/style.css" type="text/css" />');	

						mywindow.document.write('<link rel="stylesheet" href="<? echo $site['url'] ?>diary.css" type="text/css" />');	

			/*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');

			

		

			

			mywindow.document.write('</head><body>');

			mywindow.document.write(data);

			

			

			mywindow.document.write('</body></html>');

			mywindow.print();	

		

		}

</script>



<script>

		function openNotePopup(primeryid,popupdiv,title,w,h)

		{

		   var  primaryVal=os.getVal(primeryid);  

		   if(primaryVal<1)

		  {

		    alert('Please click save button');

			return false;

		  } 

		    open_pop_up(popupdiv,title,w,h)

		}

		

		

		function saveNotes(fieldidtoedit,table,primeryid,primeryVal)

		{

		 

		 

		  if(primeryVal<1)

		  {

		     primaryVal=os.getVal(primeryid);   

		  }

		 

		  if(primaryVal<1)

		  {

		    alert('Please click save button');

			return false;

		  }

		  

		 var fieldidtoeditDiv=fieldidtoedit+'Div';

		 var fieldidtoeditVal=escape(os.getVal(fieldidtoedit));  

		 if(fieldidtoeditVal=='')

		  {

		    alert('Unable to save blank note, please type note');

			return false;

		  }

	

		var url='fieldidtoedit='+fieldidtoedit+'&table='+table+'&primeryid='+primeryid+'&primaryVal='+primaryVal+'&fieldidtoeditVal='+fieldidtoeditVal+'&';

		url='<? echo $site['url'] ?>/aaajxSysytem.php?saveNotes=OK&'+url;	

		os.animateMe.div=fieldidtoeditDiv;

		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';		

		os.setAjaxFunc('saveNotesOutPut',url);

		return false;

		}

		

		function saveNotesOutPut(data)

		{

		 

		var d=data.split('@#@');

		var fieldidtoedit=d[0];

		var notesDiv=fieldidtoedit+'Div';

		var notesNewValue=d[3];

		 

		os.setVal(notesDiv,notesNewValue);  

		os.setVal(fieldidtoedit,'');  

		closepopup(fieldidtoedit+'PopupDIV');

		  

		}

		

		function printDiary()

	{

	var appoDate=os.getVal('appoDate');

	var  URLStr='<? echo $site['url']?>aadiaryPrint.php?appoDate='+appoDate;

	   popUpWindow(URLStr, 100, 20, 1200, 700);

	 //  window.location=URLStr;

	}

	

	// added script

	

	function int(vars)

	{

	//alert(p);

	

	var p= parseInt(vars);

	    if(!p){p=0;}

	  return p;

	}

	

		</script>

		<script>



 

 

 function readURL(input,prevId) {



if (input.files && input.files[0]) {

var reader = new FileReader();



reader.onload = function (e) {

 os.show(prevId);

$('#'+prevId).attr('src', e.target.result);

}



reader.readAsDataURL(input.files[0]);

}

}

os.setImg=function (id,value)

{

  if(value!=''){

  os.getObj(id).src=value; os.show(id);}else

  {

   os.hide(id);

  }

  



}



 os.setLink=function(id,value)

 {

  if(value!=''){

  os.getObj(id).href=value; os.show(id);

  }else

  {

  os.hide(id);

  }

  

 

 }



os.clicks=function(id)

{

 os.getObj(id).click();

}

										 

 

 

 </script>

		 



</head>