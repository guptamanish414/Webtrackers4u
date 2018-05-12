<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='wtbox';
$primeryTable='wtbox';
$primeryField='wtboxId';
$editHeader='Edit WT Box';
$addHeader='Add WT Box';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
// get row data


//Define Variable----os.php

$yesNo = array('0'=>'No','1'=>'Yes');
$wtBoxContainer = array(''=>'None','div'=>'Div','span'=>'Span');

if($rowId)
  {
        
		
		$where="$primeryField='$rowId'";
		$pageData=$os->getT($primeryTable,'',$where);
		
		
		if(isset($pageData[0]))
		{
		  $pageData=$pageData[0];
		}
        
  }else{ $editHeader=$addHeader;  }

?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			 <div class="formsection">
						<h3><?php  echo $editHeader; ?></h3>
						
						<form  action="<? echo $listPAGEUrl ?>" method="post"   enctype="multipart/form-data"  

id="recordEditForm"  >
												
						<fieldset class="cFielSets"  >
						<legend  class="cLegend">Records Details</legend>
						<span>    </span> 
						
						<table border="0" class="formClass"   >
												
						
<tr >
	  									<td>Title </td>
										<td>
										<input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="bigTextBox textbox fWidth"/>										</td>						
										</tr>
											
										
										<tr >
	  									<td>Access Key   </td>
										<td>
										<input <? echo ($pageData['system'])?'readonly=1   ':' '; ?> value="<?php if(isset($pageData['accessKey'])){ echo $pageData['accessKey']; } ?>" type="text" name="accessKey" id="accessKey" class="bigTextBox textbox fWidth"/>										</td>						
										</tr>
											
										
										<tr >
	  									<td>Language </td>
										<td>
										<select name="langId" id="langId" class="newSelectBox" style="width:124px;">																			
										<?php echo $os->optionsHTML($pageData['langId'],'langId','title','lang',$where='',$orderby='title ASC',$limit='');?>
										</select>&nbsp;
										<a class="newEntryLink" onclick="os.quickAdd('langEdit','langId','langId','title','lang','','title ASC','',500,230)" href="javascript:void(0);"> Add  New Language </a>										</td>						
										</tr>
											
										<tr >
	  									<td>Content </td>
										<td><textarea style="width:635px; height:150px;"   name="content" class="addressTextArea" id="content"><?php if(isset($pageData['content'])){ echo stripslashes($pageData['content']); } ?>
										</textarea></td>						
										</tr>
										
										<tr >
	  									<td>CSS </td>
										<td>
										<textarea style="width:635px; height:150px;" name="css" id="css" class="addressTextArea"><?php if(isset($pageData['css'])){ echo $pageData['css']; } ?></textarea>										</td>						
										</tr>
											
										
										<tr >
	  									<td>Container </td>
										<td>
										
										<select id="container"  name="container" class="newSelectBox" style="width:124px;">										
										<?php $os->onlyOption($wtBoxContainer,$pageData['container']);?>
										</select>										</td>						
										</tr>
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Cancel" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						
						
						
						
						
						
						
						
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


			<?php include('tinyMCE.php')?>
<? if($pageData['tinymce']==1){ ?>
		<script>tmce('content');</script>	
		<? } ?>	

   
	<? include('bottom.php')?>