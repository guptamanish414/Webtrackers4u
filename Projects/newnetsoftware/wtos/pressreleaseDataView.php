<?
/*
   # wtos version : 1.1
   # main ajax process page : pressreleaseAjax.php 
   #  
*/
include('wtosConfigLocal.php');
include($site['root-wtos'].'top.php');
?><?
$pluginName='';
$listHeader='Manage newform';
$ajaxFilePath= 'pressreleaseAjax.php';
$os->loadPluginConstant($pluginName);
$loadingImage=$site['url-wtos'].'images/loadingwt.gif';
 
?>
  

 <table class="container">
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?>  </div>
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  <table width="100%"  cellspacing="0" cellpadding="1" class="ajaxViewMainTable">
			  
  <tr>
    <td width="470" height="470" valign="top" class="ajaxViewMainTableTD">
	<div>
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_pressreleaseDeleteRowById('');" /><? } ?>	 
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp;<? if($os->access('wtEdit')){ ?> <input type="button" value="Save" onclick="WT_pressreleaseEditAndSave();" /><? } ?>	 
	<table width="100%" border="0" cellspacing="1" cellpadding="1" class="ajaxEditForm">	
	 
<tr >
	  									<td>title </td>
										<td><textarea  name="title" id="title" ></textarea></td>						
										</tr><tr >
	  									<td>details </td>
										<td><textarea  name="details" id="details" ></textarea></td>						
										</tr><tr >
	  									<td>releaseDate </td>
										<td><input value="" type="text" name="releaseDate" id="releaseDate" class="wtDateClass textbox fWidth"/></td>						
										</tr><tr >
	  									<td>active </td>
										<td>  
	
	<select name="active" id="active" class="textbox fWidth" ><option value="">Select active</option>	<? 
										  $os->onlyOption($os->activeInactive);	?></select>	 </td>						
										</tr>	
									
		 								
	</table>
	
	
	<input type="hidden"  id="showPerPage" value="<? echo $os->showPerPage; ?>" />					
	<input type="hidden"  id="pressReleaseId" value="0" />	
	<input type="hidden"  id="WT_pressreleasepagingPageno" value="1" />							
	<? if($os->access('wtDelete')){ ?><input type="button" value="Delete" onclick="WT_pressreleaseDeleteRowById('');" />	<? } ?>	  
	&nbsp;&nbsp;
	&nbsp; <input type="button" value="New" onclick="javascript:window.location='';" />
	 
	&nbsp; <? if($os->access('wtEdit')){ ?><input type="button" value="Save" onclick="WT_pressreleaseEditAndSave();" /><? } ?>	 
	</div>	
	
	 
	
	</td>
    <td valign="top" class="ajaxViewMainTableTD">
	
	Search Key  
  <input type="text" id="searchKey" />   &nbsp;
     
	  
	 
  <div style="display:none; ;margin-top:20px" id="advanceSearchDiv">
         
 title: <input type="text" class="wtTextClass" name="title_s" id="title_s" value="" /> &nbsp;  details: <input type="text" class="wtTextClass" name="details_s" id="details_s" value="" /> &nbsp; From releaseDate: <input class="wtDateClass" type="text" name="f_releaseDate_s" id="f_releaseDate_s" value=""  /> <br><br>   To releaseDate: <input class="wtDateClass" type="text" name="t_releaseDate_s" id="t_releaseDate_s" value=""  /> 
   active:
	
	<select name="active" id="active_s" class="textbox fWidth" ><option value="">Select active</option>	<? 
										  $os->onlyOption($os->activeInactive);	?></select>	
   
  </div>

   <br><br> 


  <input type="button" value="Search" onclick="WT_pressreleaseListing();" style="cursor:pointer;"/>
  <input type="button" value="Reset" onclick="searchReset();" style="cursor:pointer;"/>
	<div style="padding:5px;" id="WT_pressreleaseListDiv">&nbsp; </div>
	&nbsp;</td>
  </tr>
</table>

		
			  			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>
			
			 

<script>
 
function WT_pressreleaseListing() // list table searched data get 
{
	var formdata = new FormData();
	
	
 var title_sVal= os.getVal('title_s'); 
 var details_sVal= os.getVal('details_s'); 
 var f_releaseDate_sVal= os.getVal('f_releaseDate_s'); 
 var t_releaseDate_sVal= os.getVal('t_releaseDate_s'); 
 var active_sVal= os.getVal('active_s'); 
formdata.append('title_s',title_sVal );
formdata.append('details_s',details_sVal );
formdata.append('f_releaseDate_s',f_releaseDate_sVal );
formdata.append('t_releaseDate_s',t_releaseDate_sVal );
formdata.append('active_s',active_sVal );

	
	 
	formdata.append('searchKey',os.getVal('searchKey') );
	formdata.append('showPerPage',os.getVal('showPerPage') );
	var WT_pressreleasepagingPageno=os.getVal('WT_pressreleasepagingPageno');
	var url='wtpage='+WT_pressreleasepagingPageno;
	url='<? echo $ajaxFilePath ?>?WT_pressreleaseListing=OK&'+url;
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxHtml('WT_pressreleaseListDiv',url,formdata);
		
}

WT_pressreleaseListing();
function  searchReset() // reset Search Fields
	{
		 os.setVal('title_s',''); 
		 os.setVal('details_s',''); 
		 os.setVal('f_releaseDate_s',''); 
		 os.setVal('t_releaseDate_s',''); 
		 os.setVal('active_s',''); 
	
		os.setVal('searchKey','');
		WT_pressreleaseListing();	
	
	}
	
 
function WT_pressreleaseEditAndSave()  // collect data and send to save
{
        
	var formdata = new FormData();
	var titleVal= os.getVal('title'); 
var detailsVal= tinyMCE.get("details").getContent();    
var releaseDateVal= os.getVal('releaseDate'); 
var activeVal= os.getVal('active'); 



 formdata.append('title',titleVal );
 formdata.append('details',detailsVal );
 formdata.append('releaseDate',releaseDateVal );
 formdata.append('active',activeVal );

	
if(os.check.empty('title','Please Add title')==false){ return false;} 
//if(os.check.empty('details','Please Add details')==false){ return false;} 
if(os.check.empty('releaseDate','Please Add releaseDate')==false){ return false;} 

	 var   pressReleaseId=os.getVal('pressReleaseId');
	 formdata.append('pressReleaseId',pressReleaseId );
  	var url='<? echo $ajaxFilePath ?>?WT_pressreleaseEditAndSave=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_pressreleaseReLoadList',url,formdata);

}	

function WT_pressreleaseReLoadList(data) // after edit reload list
{
  
	var d=data.split('#-#');
	var pressReleaseId=parseInt(d[0]);
	if(d[0]!='Error' && pressReleaseId>0)
	{
	  os.setVal('pressReleaseId',pressReleaseId);
	}
	
	if(d[1]!=''){alert(d[1]);}
	WT_pressreleaseListing();
}

function WT_pressreleaseGetById(pressReleaseId) // get record by table primery id
{
	var formdata = new FormData();	 
	formdata.append('pressReleaseId',pressReleaseId );
	var url='<? echo $ajaxFilePath ?>?WT_pressreleaseGetById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_pressreleaseFillData',url,formdata);
				
}

function WT_pressreleaseFillData(data)  // fill data form by JSON
{
   
	var objJSON = JSON.parse(data);
	os.setVal('pressReleaseId',parseInt(objJSON.pressReleaseId));
	
 os.setVal('title',objJSON.title); 
 
 tinyMCE.activeEditor.setContent(objJSON.details);
 os.setVal('releaseDate',objJSON.releaseDate); 
 os.setVal('active',objJSON.active); 

  
}

function WT_pressreleaseDeleteRowById(pressReleaseId) // delete record by table id
{
	var formdata = new FormData();	 
	if(parseInt(pressReleaseId)<1 || pressReleaseId==''){  
	var  pressReleaseId =os.getVal('pressReleaseId');
	}
	
	if(parseInt(pressReleaseId)<1){ alert('No record Selected'); return;}
	
	var p =confirm('Are you Sure? You want to delete this record forever.')
	if(p){
	
	formdata.append('pressReleaseId',pressReleaseId );
	
	var url='<? echo $ajaxFilePath ?>?WT_pressreleaseDeleteRowById=OK&';
	os.animateMe.div='div_busy';
	os.animateMe.html='<div class="loadImage"><img  src="<? echo $loadingImage?>"  /> <div class="loadText">&nbsp;Please wait. Working...</div></div>';	
	os.setAjaxFunc('WT_pressreleaseDeleteRowByIdResults',url,formdata);
	}
 

}
function WT_pressreleaseDeleteRowByIdResults(data)
{
	alert(data);
	WT_pressreleaseListing();
} 

function wtAjaxPagination(pageId,pageNo)// pagination function
{
	os.setVal('WT_pressreleasepagingPageno',parseInt(pageNo));
	WT_pressreleaseListing();
}

	
	
	
	 
	 
</script>

<? include('tinyMCE.php'); ?>
<script>tmce('details')</script>
  
 
<? include($site['root-wtos'].'bottom.php'); ?>