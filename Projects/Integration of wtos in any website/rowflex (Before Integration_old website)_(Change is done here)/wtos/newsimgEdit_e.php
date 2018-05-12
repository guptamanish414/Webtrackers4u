<?php
include('includes/config.php');
include('top.php');

// config 

$rowId=$_GET['editRowId'];
$listPAGE='newsimg_l';
$primeryTable='newsimg';
$primeryField='newsImgId';
$editHeader='Edit Newsimg';
$addHeader='Add Newsimg';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
// get row data
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
	  									<td>title </td>
										<td><input value="<?php if(isset($pageData['title'])){ echo $pageData['title']; } ?>" type="text" name="title" id="title" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>active </td>
										<td><input value="<?php if(isset($pageData['active'])){ echo $pageData['active']; } ?>" type="text" name="active" id="active" class="textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>newsId </td>
										<td><select name="newsId" id="newsId" class="textbox fWidth" >
							
							 		<?
							
							 $os->optionsHTML($pageData['newsId'],'pagecontentId','title','pagecontent');
							?>
							</select>
  
										</td>						
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


					

   
	<? include('bottom.php')?>