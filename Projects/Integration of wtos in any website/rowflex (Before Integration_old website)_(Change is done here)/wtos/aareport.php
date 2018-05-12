<?php
include('includes/config.php');
include('aaTop.php'); ?>


<div class="pageHead reports"> Reports  </div>
<div style="background-color:#FFFFFF; width:1240px; height:700px; float:left; padding:5px;">
 
 
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
<style>
.reportAppo{ font-size:11px;}
.reportAppo{ border:#EEEEEE 1px solid;}
.reportAppo td{ padding:2px; border-bottom:1px solid #CCCCCC; border-left:1px solid #CCCCCC;}
</style>
 <div id="wtostabs">
  <ul>
		<li><a href="#appointmentTab">Appointment</a></li>
		<li><a href="#applicantTab">Applicant By Budget</a></li>
		<li><a href="#propertyViewingTab">Property Viewing</a></li>
		<li><a href="#propertyWebEnqTab">Website Enquery</a></li>
		<li><a href="#searchApplicantTab">Search Tenant</a></li>
		 <? if($os->checkAccess('Rent Details')){?>
		<li><a href="#searchRentTab">Rent details</a></li>
		 <? } ?>
		<li><a href="#searchLandlordTab">Landlord details</a></li>
		
	   <? if($os->checkAccess('In out report')){?>
	  <li><a href="#inoutBalanceTab">In Out Report</a></li>
	  <? } ?>
	  
	   
   
  </ul>
  <div id="appointmentTab">
  <strong>Appointment Details </strong>
  
  From <input type="text" id="fromDate1" class="dtpk" /> To <input type="text" id="toDate1" class="dtpk" />  <input type="button" value="OK" onclick="appointmentReport()" />
  <div id="appointmentReportDiv">  </div>
 
  </div>
  <div id="applicantTab">
  <strong>Applicant By budget </strong>
   From <input type="text" id="fromBudget" class="" /> <!--To--> <input type="text" id="toBudget" class="" style="display:none;" />  <input type="button" value="OK" onclick="applicantByBudgetReport()" />
  <div id="applicantByBudgetReportDiv">  </div>
  </div>
  
  <div id="openpropertyViewingReportPOPDIV" class="wtpopup" style="z-index:100; background-color:#FFFFCC; border: 1px solid #DCE109; border-bottom:2px solid #666666; border-right: 2px solid #666666;">
<div id="openpropertyViewingReportDiv"> &nbsp; </div> <br /> <br />
 <input type="button" onclick="printById('openpropertyViewingReportDiv')" value="Print" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span onclick="closepopup('openpropertyViewingReportPOPDIV')" class="popbutton"> <img  src="<? echo $cImage ?>" height="30" /> </span> &nbsp; &nbsp;
</div>
   <div id="propertyViewingTab">
  <strong>Property Viewing </strong> <input type="button" onclick="printById('propertyViewingReportDiv')" value="Print" /> 
  
  <div id="propertyViewingReportDiv">  </div>
  </div>
  
  <div id="propertyWebEnqTab">
  <iframe height="600" width="1000" frameborder="0" src="report.php"></iframe>
  </div>
  
  
  <div id="searchApplicantTab">
  <strong>Search Tenent </strong>  <select name="status" id="status" class="textbox fWidth" style="display:none;" >	
  <option value=""></option>
 <?  $os->onlyOption($os->status,$pageData['status']);	?></select>		
										   <select name="memberType" id="memberType" class="textbox fWidth" >	<? 
                      $os->onlyOption($os->memberType,$pageData['memberType']);	?></select>	
  
   
										   Req. Bed <select name="bed" id="bed" class="textbox fWidth" style="width:60px;">
											<option value=""></option>
											<option value="Studio Flat">Studio Flat</option>
											<option value="Single Room">Single Room</option>
											<option value="Double Room">Double Room</option>
											
											
											<? $os->onlyOption($os->bedDD,$pageData['bed']);	?></select>	
										  &nbsp;&nbsp; <input type="button" onclick="searchApplicant()" value="Search" />
										  &nbsp;&nbsp; <input type="button" onclick="printById('searchApplicantTabDivCSS')" value="Print" /> 
  
  <div id="searchApplicantTabDivCSS" >
  <style>
    .borderTitleTable{ font-size:11px;} .borderTitleTable{ border:1px solid #CCCCCC;}
  .borderTitleTable td{ border-left:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC; padding:2px;}
  </style>
  <div id="searchApplicantTabDiv">  </div>
  </div>
  </div>
  
    <? if($os->checkAccess('Rent Details')){?>
  <div id="searchRentTab">
  <strong>Rent Details </strong>
  <br /> Month <select name="rentMonth" id="rentMonth" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->rentMonth,$pageData['rentMonth']);	?></select>	
  <select name="rentYear" id="rentYear" class="textbox fWidth" >	<? 
										  $os->onlyOption($os->rentYear,$pageData['rentYear']);	?></select>	
										  &nbsp;&nbsp; <input type="button" onclick="searchRent()" value="Search" />
										  &nbsp;&nbsp; <input type="button" onclick="printById('searchRentTabDivCSS')" value="Print" /> 
  
  <div id="searchRentTabDivCSS" >
  <style>
    .borderTitleTable{ font-size:11px;} .borderTitleTable{ border:1px solid #CCCCCC;}
  .borderTitleTable td{ border-left:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC; padding:2px;}
  </style>
  <div id="searchRentTabDiv">  </div>
  </div>
  </div>
  
  <?  } ?>
  
  
  <div id="searchLandlordTab">
  <strong>Landlord Details </strong> 
										  &nbsp;&nbsp; <input type="button" onclick="searchLandlord()" value="Search" />
										  &nbsp;&nbsp; <input type="button" onclick="printById('searchLandlordTabDivCSS')" value="Print" /> 
  
  <div id="searchLandlordTabDivCSS" >
  <style>
 
    .borderTitleTable{ font-size:11px;} .borderTitleTable{ border:1px solid #CCCCCC;}
  .borderTitleTable td{ border-left:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC; padding:2px;}
  </style>
  <div id="searchLandlordTabDiv">  </div>
  </div>
  </div>
 
  
  
   <? if($os->checkAccess('In out report')){?>
  <div id="inoutBalanceTab">
  <strong>In Out Details </strong> 
  
  From <input type="text" id="fromDateInout" class="dtpk" /> To <input type="text" id="toDateInout" class="dtpk" />  <input type="button" value="OK" onclick="inoutBalanceReport()" />  &nbsp;<input type="button" onclick="printById('inoutBalanceReportDivCSS')" value="Print" style="cursor:pointer;" />
  
  <div id="inoutBalanceReportDivCSS" >
  <style>
 
    .borderTitleTable{ font-size:11px;} .borderTitleTable{ border:1px solid #CCCCCC;}
  .borderTitleTable td{ border-left:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC; padding:2px;}
  </style>
  <div id="inoutBalanceReportDiv">  </div>
  
  </div>
 
  </div>
  <? } ?>
  
  
 
  
</div>

 
 <script>
  $(function() {
    $( "#wtostabs" ).tabs();
  });
  
  dateCalander();
  </script>
  <script>
   
  
    
  function appointmentReport()
  {
  
		setCurrentDateIfBlank('fromDate1');
		setCurrentDateIfBlank('toDate1');
		 var  fromDate1 =os.getVal('fromDate1');
		var  toDate1 =os.getVal('toDate1');
	 
	    
	 
		var url='fromDate1='+fromDate1+'&toDate1='+toDate1+'&';
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?appointmentReport=OK&'+url;	
		os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxHtml('appointmentReportDiv',url);
		return false;          
  }
  
  
  
   function applicantByBudgetReport()
  {
  
		
		 var  fromBudget =os.getVal('fromBudget');
		var  toBudget =os.getVal('toBudget');
	 
	    
	 
		var url='fromBudget='+fromBudget+'&toBudget='+toBudget+'&';
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?applicantByBudgetReport=OK&'+url;	
	os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
		os.setAjaxHtml('applicantByBudgetReportDiv',url);
		return false;          
  }
  
  
   function propertyViewingReport()
  {
  
	 
	//	var url='fromBudget='+fromBudget+'&toBudget='+toBudget+'&';
	    var url='';
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?propertyViewingReport=OK&'+url;	
	os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxHtml('propertyViewingReportDiv',url);
		return false;          
  }
  
  
  function detailsAppoByproperty(propertyId)
  {
  
     	var url='propertyId='+propertyId+'&';
	     url='<? echo $site['url'] ?>/aaajxSysytemReport.php?detailsAppoByproperty=OK&'+url;	
		// alert(url);
		os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxFunc('openpropertyViewingReport',url);
		return false;     
  
   
  
  }
  function openpropertyViewingReport(data)
  {
    os.setHtml('openpropertyViewingReportDiv',data); 
	open_pop_up('openpropertyViewingReportPOPDIV','Reports Notes',600,400);
  
  }
     
	 
   function searchApplicant()
  {
  
	var  status=os.getVal('status');
	var  memberType=os.getVal('memberType');
	var  bed=os.getVal('bed');
	  status='TENANT';
	 	var url='status='+status+'&bed='+bed+'&memberType='+memberType+'&';
	   
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?searchApplicant=OK&'+url;	
		os.animateMe.div='searchApplicantTabDiv';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';		
		os.setAjaxHtml('searchApplicantTabDiv',url);
		        
  }  
  
  
  function searchLandlord()
  {
  
	 
	 
	  var status='LANDLORD';
	 	var url='status='+status +'&';
	   
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?searchLandlord=OK&'+url;	
		os.animateMe.div='searchLandlordTabDiv';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';		
		os.setAjaxHtml('searchLandlordTabDiv',url);
		     
  }  
  
  function searchRent()
  {
  
	var  rentMonth=os.getVal('rentMonth');
	var  rentYear=os.getVal('rentYear');
	  
	  if(rentMonth==''){alert('Select Month'); return false;}
	  if(rentYear==''){alert('Select Year'); return false;}
	 	var url='rentMonth='+rentMonth+'&rentYear='+rentYear+'&';
	   
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?searchRent=OK&'+url;	
		os.animateMe.div='searchRentTabDiv';
		os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>" height="50" /> </div><div class="loadText">&nbsp;Please wait. Working...</div>';		
		os.setAjaxHtml('searchRentTabDiv',url);
		        
  }  
       
 
  
  
  function inoutBalanceReport()
  {
  
		setCurrentDateIfBlank('fromDateInout');
		setCurrentDateIfBlank('toDateInout');
		 var  fromDate1 =os.getVal('fromDateInout');
		var  toDate1 =os.getVal('toDateInout');
	 
	    
	 
		var url='fromDate1='+fromDate1+'&toDate1='+toDate1+'&';
		url='<? echo $site['url'] ?>/aaajxSysytemReport.php?inoutBalanceReport=OK&'+url;	
		os.animateMe.div='div_busy';
			os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadImage ?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';		
		os.setAjaxHtml('inoutBalanceReportDiv',url);
		return false;          
  }
  
  
  
  
   appointmentReport();
   applicantByBudgetReport();
   propertyViewingReport();
  </script>
 
 
 
 
 
  </div>

<? include('aaBottom.php')?>