 <style>

.linkClass{

margin:2px 5px 2px 20px;

}



.linkCss{ text-decoration:none; color:#004E9B; margin:1px 5px 1px 2px; border:1px solid #5C5C5C; background:#ECF5FF;

border-top:none;

border-left:none;

height:15px; width:140px; padding:3px 3px 3px 3px; 

-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;

display:block;

font-weight:none; font-size:13px;





}

.linkCss:hover{ text-decoration:none; color:#FFFFFF; margin:1px 5px 1px 2px; border:1px solid #002435; background:#0098E1;

border-top:none;

border-left:none;

height:15px; width:140px; padding:3px 3px 3px 3px;

-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;

display:block;

font-weight:bold;}

.linkCssSelected{text-decoration:none; color:#FFFFFF; margin:1px 5px 1px 2px; border:1px solid #002435; background:#0098E1;

border-top:none;

border-left:none;

height:15px; width:140px; padding:3px 3px 3px 3px;

-moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;

display:block;

font-weight:bold;

}



.ca{ height:2px; clear:both; width:50px;}

</style>

<? 

						function sTab($pname )

						{

						 global $os;

						

						  $class='linkCss';

						  if($pname.'.php'==$os->currentPage)

						  {

						      $class='linkCssSelected';

							 

						  }

						 echo "class='$class'";

						}

						 

						

						?>

						 	<div style="margin:5px; text-align:center"> </div>	

							<? if($os->checkAccess('Website Pages')){?>

						<a <? sTab('pageContent') ?>  href="<? $seoLink->l('pageContent',true); ?>" >Pages</a><div class="ca">&nbsp;</div>

						<? } ?>

						<a <? sTab('propertylocation') ?>  href="<? $seoLink->l('propertylocation',true); ?>" >Locations</a><div class="ca">&nbsp;</div>
						<a <? sTab('wtbox') ?>  href="<? $seoLink->l('wtbox',true); ?>" >BOX</a><div class="ca">&nbsp;</div>

				   		

					   

						

						

						<div style="margin:5px; text-align:center">Users And Settings</div>				

				

						<a <? sTab('settings') ?> href="<? $seoLink->l('settings',true); ?>" > Settings</a> <div class="ca">&nbsp;</div> 

						

					 

						<? if($os->userDetails['adminType']=='Super Admin') {?>

						<a <? sTab('admin') ?> href="<? $seoLink->l('admin',true); ?>" > Admin Users</a> <div class="ca">&nbsp;</div> 

						<? } ?>

						

						

						<? if($linkok=='ok'){?>	

						<a <? sTab('report') ?>  href="<? $seoLink->l('report',true); ?>" >Report</a><div class="ca">&nbsp;</div>

						 <a <? sTab('aamanageProp') ?>  href="<? $seoLink->l('aamanageProp',true); ?>" >Rent Management</a><div class="ca">&nbsp;</div>

						<a <? sTab('changepwd') ?> href="<? $seoLink->l('changepwd',true); ?>" >Change Password </a>  <div class="ca">&nbsp;</div>

						 <a <? sTab('property') ?>  href="<? $seoLink->l('property',true); ?>" >Property</a><div class="ca">&nbsp;</div>

                        <a <? sTab('property-rent') ?>  href="<? $seoLink->l('property-rent',true); ?>" >Let Property</a><div class="ca">&nbsp;</div>

						<a <? sTab('propertyHidden') ?>  href="<? $seoLink->l('propertyHidden',true); ?>" >Hidden Property</a><div class="ca">&nbsp;</div>

                        

								<a <? sTab('print') ?>  href="<? $seoLink->l('print',true); ?>" >Print</a><div class="ca">&nbsp;</div>

						<a <? sTab('Appointment') ?> href="<? $seoLink->l('Appointment',true); ?>" > Task and Messages</a> <div class="ca">&nbsp;</div> 

						<a <? sTab('Followup') ?> href="<? $seoLink->l('Followup',true); ?>" > Followup</a> <div class="ca">&nbsp;</div> 

						

							<div style="margin:5px; text-align:center">Reports</div>

						<a <? sTab('viewing') ?> href="<? $seoLink->l('viewing',true); ?>" > Property Viewing</a> <div class="ca">&nbsp;</div> 

						<a <? sTab('enq') ?> href="<? $seoLink->l('enq',true); ?>" > Enquery</a> <div class="ca">&nbsp;</div>  

						<a <? sTab('sold') ?> href="<? $seoLink->l('sold',true); ?>" > Sold Property</a> <div class="ca">&nbsp;</div>  

						

						

						<a <? sTab('dashboard') ?> href="<? $seoLink->l('dashboard',true); ?>" > Dashboard</a> <div class="ca">&nbsp;</div>

						<a <? sTab('appointments') ?> href="<? $seoLink->l('appointments',true); ?>" > Appointments</a> <div class="ca">&nbsp;</div>

						<a <? sTab('calender') ?> href="<? $seoLink->l('calender',true); ?>" > Calender</a> <div class="ca">&nbsp;</div>

						<a <? sTab('applicants') ?> href="<? $seoLink->l('applicants',true); ?>" > Applicants</a> <div class="ca">&nbsp;</div> 

						<a <? sTab('vendor') ?> href="<? $seoLink->l('vendor',true); ?>" > Vendor</a> <div class="ca">&nbsp;</div> 

						<a <? sTab('other') ?> href="<? $seoLink->l('other',true); ?>" > Other Member</a> <div class="ca">&nbsp;</div> 

						

						<a <? sTab('property') ?> href="<? $seoLink->l('property',true); ?>" > Property</a> <div class="ca">&nbsp;</div> 

						<a  <? sTab('staff') ?> href="<? $seoLink->l('staff',true); ?>" > Staff</a> <div class="ca">&nbsp;</div> 

						

						

						<a <? sTab('contactus') ?>  href="<? $seoLink->l('contactus',true); ?>" >Enquiries</a><div class="ca">&nbsp;</div>

						 

						<a <? sTab('imageuploader') ?> href="<? $seoLink->l('imageuploader',true); ?>" >Image Uploader</a> <div class="ca">&nbsp;</div>

							<a <? sTab('changepwd') ?> href="<? $seoLink->l('changepwd',true); ?>" >Change Password </a>  <div class="ca">&nbsp;</div>

						

		                	<a <? sTab('news') ?>  href="<? $seoLink->l('news',true); ?>" >Latest News</a><div class="ca">&nbsp;</div>

						

						<a <? sTab('lang') ?>  href="<? $seoLink->l('lang',true); ?>" >Language</a><div class="ca">&nbsp;</div>

						

						<a <? sTab('appearance') ?>  href="<? $seoLink->l('appearance',true); ?>" >Appearance</a><div class="ca">&nbsp;</div>

						<a <? sTab('sliderimage') ?>  href="<? $seoLink->l('sliderimage',true); ?>" >Sliderimage</a><div class="ca">&nbsp;</div>

						<a <? sTab('style') ?>  href="<? $seoLink->l('style',true); ?>" >Style</a><div class="ca">&nbsp;</div>

				        <a <? sTab('wtbox') ?>  href="<? $seoLink->l('wtbox',true); ?>" >BOX</a><div class="ca">&nbsp;</div>

						

					<? } ?>

					