<?php
include('includes/config.php');
include('top.php');

// config 
$rowId=$_GET['editRowId'];

$listPAGE='news';
$primeryTable='news';
$primeryField='newsId';
$editHeader='EDIT LATEST NEWS';
if($rowId)
  {
        
	   $where="$primeryField='$rowId'";
		$pageData=$os->getT($primeryTable,'',$where);
		
		
		if(isset($pageData[0]))
		{
		  $pageData=$pageData[0];
		}
        
  }




$admintypes=array('Admin'=>'Admin','Super Admin'=>'Super Admin');
$adminAccess=array('0'=>'No','1'=>'Yes');
?>
<?
//include('tinyMCE.php');
?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGE ?>.php" method="post" id="recordEditForm"   enctype="multipart/form-data">
						
						<fieldset class="cFielSet"  >
						<legend  class="cLegend">Details</legend>
						
						
						<table border="0" class="formClass"   >
						<tr >
							<td width="107">Title:</td>
							<td width="231">
						  <input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title"  style="width:210px;" class="textbox fWidth"/>							</td>
							<td width="416">&nbsp;</td>
						</tr>
						
						<tr >
							<td width="107">Date:</td>
							<td width="231">
						  <input value="<?php if(isset($pageData['newsdate'])){ echo $pageData['newsdate']; } ?>" type="text" name="newsdate" id="newsdate"  style="width:210px;" class="textbox fWidth"/>							</td>
							<td width="416">&nbsp;</td>
						</tr>
						<tr >
							<td>News:</td>
							<td colspan="2">
							<textarea class="textbox fWidth" name="body" id="body" rows="1" cols="50"><?php if(isset($pageData['body'])){ echo $pageData['body']; } ?></textarea>							</td>
						  </tr>
						</table>
	
						</fieldset>
							
							 <input type="submit" class="submit"  value="Save And List" />	 
							<input type="button" class="submit popupHide"  value="Cancel" 
							onclick="javascript:window.location='<? echo $listPAGE ?>.php';" />	
							
							
							<input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
							<input type="hidden" name="operation" value="updateField" />
						
						 <!-- iframe set  parameter -->
						 <input type="button" name="ajaxSubmit" value="<? echo  ($rowId)?'Save':'Add'; ?>"  onclick="formDatas()" />	
						 <span id="updatemsg"> </span>
						 <script>
						  // collect values    
						  function formDatas()
						  {
						      var paramsIframe='operation=updateField&title='+os.getVal('title')+'&newsdate='+os.getVal('newsdate')+'&body='+os.getVal('body');
						      saveFormData(paramsIframe,'<?php echo $primeryTable ?>','<?php echo $primeryField ?>','<?php echo $rowId ?>')
						  }
                         
  						 </script>	
					      
						 <!-- iframe set parameter end -->
						
						</form>
						
				</div>
				
				
				  <!-- iframe set  -->
				  <?php include('iframeTabs.php'); ?>
				   <? $iframeHide= ($rowId)?'display:block':'display:none';   ?>
			       <div class="iFrameTabs" style=" <?php echo $iframeHide; ?>" id="iFrameTabs" >  
			            <div id="tabHolder" style="padding:0px 0px 0px 0px;">
						<div class="tabs" id="tab1" onclick="openTab('tab1');" >Images</div>
						<div class="tab" id="tab2" onclick="openTab('tab2');">Payments</div>
						<div class="tab" id="tab3" onclick="openTab('tab3');">Order Details</div>
						<div class="tab lastTab" id="" onclick="#" >&nbsp; </div>
						
						<div style="clear:both"> </div>
						 
						
						
						<div id="tab1tab1" class="tabText" style="display:block;"> 
						<iframe src="newsimg_f.php?hideTopLeft=1&<?php echo $primeryField ?>=<?php echo $rowId ?>" class="iframeLink" name="iF[]"></iframe>
						
						
						</div>
						<div id="tab2tab2"  class="tabText" style="display:none;">
						<iframe src="lang.php?hideTopLeft=1&<?php echo $primeryField ?>=<?php echo $rowId ?>" class="iframeLink" name="iF[]"></iframe>
						</div>
						<div id="tab3tab3"  class="tabText" style="display:none;"> 
						<iframe src="wtbox.php?hideTopLeft=1&<?php echo $primeryField ?>=<?php echo $rowId ?>" class="iframeLink" name="iF[]"></iframe>
						</div>
			            </div>
			   </div>
			   <!-- iframe set  end -->
			  </td>
			  </tr>
			
</table>

<script>

// tmce('body');
 
</script>				

   
	<? include('bottom.php')?>