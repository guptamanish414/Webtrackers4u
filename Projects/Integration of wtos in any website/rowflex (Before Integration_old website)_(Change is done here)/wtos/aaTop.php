<? include('aaHeader.php'); ?>

<body style="background:#E4E1DD;">

<?


 ?>



<style>

 .main {

    min-height: 0px;

    padding-bottom: 10px;

	

}

	.tlinkCss{ 

	text-decoration:none; 

	 margin:0px 0px 0px 0px; border:1px solid #004262; background:#FFFFFF; 

	border-top:none;

	border-left:none;

	height:15px; width:auto; padding:1px 2px 1px 20px; 

	-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;

	 

	font-weight:normal;

	font-size:11px;

    opacity:0.8;filter:alpha(opacity=80);

}

 

.tlinkCss:hover{ opacity:1;filter:alpha(opacity=100); }

.logout{background:#FFFFFF url(<?php echo $site['url'] ?>image/logout.png) no-repeat; background-position: 0px 0px, center; }

.changepass{background:#FFFFFF url(<?php echo $site['url'] ?>image/changePAss.png) no-repeat;background-position: 0px 0px, center;  } 

.settings{background:#FFFFFF url(<?php echo $site['url'] ?>image/settings.png) no-repeat;background-position: 0px 0px, center; } 

.admin{background:#FFFFFF url(<?php echo $site['url'] ?>image/admin.png) no-repeat;background-position: 0px 0px, center;}

.refresh{background:#FFFFFF url(<?php echo $site['url'] ?>image/refresh.png) no-repeat;background-position: 0px 0px, center; }

.download{background:#FFFFFF url(<?php echo $site['url'] ?>image/download.png) no-repeat;background-position: 0px 0px, center; }

.add{background:#FFFF33 url(<?php echo $site['url'] ?>image/add.png) no-repeat;background-position: 0px 0px, center; text-decoration:none; color:#FF0000;  font-weight:bold; }

.searches{background:#FFFFFF url(<?php echo $site['url'] ?>image/search.png) no-repeat;background-position: 0px 0px, center; }

.reset{background:#FFFFFF url(<?php echo $site['url'] ?>image/reset.png) no-repeat;background-position: 0px 0px, center; }

.wtedit{background:#D4D0C8 url(<?php echo $site['url'] ?>image/wtedit.png) no-repeat;background-position: 1px 3px, center; cursor:pointer;

termsCondition{background:#FFFFFF url(<?php echo $site['url'] ?>image/tNc.png) no-repeat;background-position: 0px 0px, center; }

-moz-border-radius:10px 0px 0px 0px; -webkit-border-radius:10px 0px 0px 0px; border-radius:10px 0px 0px 0px; 

}

.wtedit:hover{background:#D4D0C8 url(<?php echo $site['url'] ?>image/wteditred.png) no-repeat;background-position: 1px 3px, center; cursor:pointer;}

 





	





 

.organizer{background:url(<?php echo $site['url'] ?>image/organizer.png) no-repeat; background-position: 15px 3px, center; }

.applicants{background:url(<?php echo $site['url'] ?>image/applicants.png) no-repeat; background-position: 15px 3px, center; }

.property{background:url(<?php echo $site['url'] ?>image/property2.png) no-repeat; background-position: 15px 3px, center; }

.diary{background:url(<?php echo $site['url'] ?>image/diary.png) no-repeat; background-position: 15px 3px, center; }

.reports{background:url(<?php echo $site['url'] ?>image/reports.png) no-repeat; background-position: 15px 3px, center; }

.logoutt{background:url(<?php echo $site['url'] ?>image/logoutt.png) no-repeat; background-position: 15px 3px, center; }

.followcall{background:url(<?php echo $site['url'] ?>image/call.png) no-repeat; background-position: 15px 3px, center; }

.changepwd{background:url(<?php echo $site['url'] ?>image/changepass32.png) no-repeat; background-position: 15px 3px, center; }

.wtpound{background:url(<?php echo $site['url'] ?>image/wtpound.png) no-repeat; background-position: 15px 3px, center; }

.wtpages{background:url(<?php echo $site['url'] ?>image/wtpages.png) no-repeat; background-position: 15px 3px, center; }

.agreement{background:url(<?php echo $site['url'] ?>image/aggrement.png) no-repeat; background-position: 15px 3px, center; }

.expense{background:url(<?php echo $site['url'] ?>image/expense.png) no-repeat; background-position: 15px 3px, center; }

.termsCondition{background:url(<?php echo $site['url'] ?>image/tNc.png) no-repeat;background-position: 15px 3px, center; }

.flexyArea{ height:220px; width:280px;}

.flexyAreaOutput{  height:154px; width:250px; background-color:#F0F8FF; color:#000099; border-radius: 4px; border:1px solid #CCCCCC; }

.tAreaBack{  }

.loginAs{ padding:20px 0px 0px 20px; color:#333333; font-size:11px; width:240px; float:left   }

.loginAs span{  color:#FF5604; font-size:12px;font-weight:bold;}

.tenant1{background:url(<?php echo $site['url'] ?>image/tenant3.png) no-repeat; background-position: 15px 3px, center; }

.tenant2{background:url(<?php echo $site['url'] ?>image/tenant1.png) no-repeat; background-position: 15px 3px, center; }

.landlord{background:url(<?php echo $site['url'] ?>image/landlord1.png) no-repeat; background-position: 15px 3px, center; }

.selected{ color:#FF0000; font-weight:bold;}

 </style>



<div class="main">

	<div class="wrapper">

		<div class="header">

		</div>

		<div class="curvebox">

			<div class="headerimage" style="display:none;">

		 



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center"><a   href="<?php echo $site['url']?>/dashBoard.php"><img src="<?php echo $site['url'] ?>image/loginlogo.png" alt=""  height="30"  style="margin:0 0 0 0px; border:none;"/></a></td>

    <td  align="center"><span class="style2" style="width:350px;"><strong> <? echo $site['siteHeading']; ?> </strong></span></td>

     

    <td   align="left">Welcome <span class="style2"><strong><?php echo $os->userDetails['name']; ?></strong></span>

	

	&nbsp; <a href="javascript:void(0)" class="style2" style="text-decoration:none"><? echo date('d-M-Y'); ?> </a> 

	

	</td>

    <td align="right" >

	

	&nbsp; <a class="tlinkCss refresh" href=""   style="text-decoration:none"> Refresh </a> &nbsp;

	

	

	

 

	<?php if($os->isLogin()){ ?><a class="tlinkCss logout" href="?logout=logout" style="text-decoration:none; color:#FF0000">Logout</a> <?php }?>

	</td>

  </tr>

</table>



</div>

	 		

			<!-- link script css   -->

	<div class="appWidth">	 

  

<div class="btnStyle welcome" style="display:none;"> Welcome Back <?php echo $os->userDetails['name']; ?>  <? echo date('d-M-Y'); ?></div>

<div class="btnStyle iconsLinks">

<a class="abtnaa" href="<?php echo $site['url'] ?>aaorganizer.php" ><div class="btnaa  organizer">Dashboard</div></a>

<!--<a class="abtnaa" href="<?php echo $site['url'] ?>aamanageProp.php" ><div class="btnaa  wtpound">Rent Details</div></a>-->





<a class="abtnaa" href="<?php echo $site['url'] ?>aaaplicant.php?memberType=Prospective" ><div class="btnaa  tenant2">Prospective Tenant</div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>aaaplicant.php?memberType=Existing" ><div class="btnaa  tenant1">Existing Tenant</div></a>





<a class="abtnaa" href="<?php echo $site['url'] ?>aaproperty.php" ><div class="btnaa  property">Property</div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>aaaplicant.php?vendor=1" ><div class="btnaa  landlord">Landlord</div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>aadiary.php" ><div class="btnaa  diary">Diary</div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>aafollowcall.php" ><div class="btnaa  followcall">Followup</div></a>







<? if($os->checkAccess('Agreements')){?>

<a class="abtnaa" href="<?php echo $site['url'] ?>rentagreementScript.php" ><div class="btnaa  agreement">Agreements</div></a> <? } ?>

<? if($os->checkAccess('Rents')){?>

<a class="abtnaa" href="<?php echo $site['url'] ?>rentbillScript.php" ><div class="btnaa  wtpound">Rents</div></a><? } ?>

<? if($os->checkAccess('Landlord Payments')){?>

<a class="abtnaa" href="<?php echo $site['url'] ?>landlordbillScript.php" ><div class="btnaa  expense">Landlord Payments</div></a>  <? } ?>

<? if($os->checkAccess('Expense')){?>

<a class="abtnaa" href="<?php echo $site['url'] ?>expenseScript.php" ><div class="btnaa  expense">Expense</div></a><? } ?>

<? if($os->checkAccess('Report')){?>

<a class="abtnaa" href="<?php echo $site['url'] ?>aareport.php" ><div class="btnaa  reports">Reports</div></a><? } ?>

<a class="abtnaa" href="<?php echo $site['url'] ?>termsDownload/TERMS-AND-CONDITIONS-RENTAL.docx" ><div class="btnaa  termsCondition" style="margin-left:20px;" >Download</div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>propertylocation.php" ><div class="btnaa  wtpages" style="margin-left:20px;" >Web Admin</div></a>




<a class="abtnaa" href="<?php echo $site['url'] ?>aachangepwd.php" ><div class="btnaa  changepwd" >Change Password</div></a>

 

<a class="abtnaa" href="?logout=logout" ><div class="btnaa  logoutt"  >Logout  </div></a> 



<div style="position:fixed; top:-5px; right:-100px;">

<a class="abtnaa" href="javascript:void(0);" onClick="alert('Hi')"  > <div class="loginAs"> login As <span><?php echo $os->userDetails['name']; ?></span>  <br>Date: <span><? echo date('d-M-Y'); ?></span></div>  </a>



</div>



</div>



<div id="div_busy" class="div_busy_class" > &nbsp;</div>