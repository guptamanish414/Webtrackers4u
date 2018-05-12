<?php
include('includes/config.php');
include('top.php');
include('../wt-slider/sliderConfig.php');
// config 

$rowId=$_GET['editRowId'];
$listPAGE='appearance';
$primeryTable='appearance';
$primeryField='appearanceId';
$editHeader='Edit Appearance';
$addHeader='Add Appearance';
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
  
  
  
  
  //Define Variable----os.php
  
  $bgImgCss = array('no-repeat'=>'No Repeat','repeat-x'=>'Repeat X','repeat-y'=>'Repeat Y');
  

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
	  									<td>Logo Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['logoImage']; ?>"  height="100" width="100" />
                                          <br /> <input type="file" name="logoImage"  id="logoImage"/>									  
										</td>						
										</tr>
										
										<tr >
	  									<td>Body Backgroung Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['bodyBgImg']; ?>"  height="100" width="100" />
                                          <br />  <input type="file" name="bodyBgImg"  id="bodyBgImg"/>&nbsp;Style <select id="bodyBgImgCss"  name="bodyBgImgCss" class="newSelectBox" style="width:124px;">										
											<?php $os->onlyOption($bgImgCss,$pageData['bodyBgImgCss']);?>
										</select>
										</td>						
										</tr>
										
										<tr >
	  									<td>Header Backgroung Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['headerBgImg']; ?>"  height="100" width="100" />
                                          <br />  <input type="file" name="headerBgImg"  id="headerBgImg"/>&nbsp;Style <select id="headerBgImgCss"  name="headerBgImgCss" class="newSelectBox" style="width:124px;">										
											<?php $os->onlyOption($bgImgCss,$pageData['headerBgImgCss']);?>
										</select>
										</td>						
										</tr>
										
										
										<tr >
	  									<td>Footer Backgroung Image </td>
										<td>
										<img src="<?php  echo $site['urlFront'].$pageData['footerBgImg']; ?>"  height="100" width="100" />
                                         <br />  <input type="file" name="footerBgImg"  id="footerBgImg"/>&nbsp;Style <select id="footerBgImgCss"  name="footerBgImgCss" class="newSelectBox" style="width:124px;">										
											<?php $os->onlyOption($bgImgCss,$pageData['footerBgImgCss']);?>
										</select>
										</td>						
										</tr>
										
										
										
										<tr >
	  									<td>Slider Name </td>
										<td>										
										<select id="sliderName"  name="sliderName" class="newSelectBox" onchange="getEffect(this.value);" style="width:223px;">										
										<?php $os->onlyOption($sliderList,$pageData['sliderName']);?>
										</select>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Slider Effect </td>
										<td>										
										<select id="sliderEffect"  name="sliderEffect" class="newSelectBox" style="width:223px;">										
										<?php $os->onlyOption($sliderEffectList[$pageData['sliderName']],$pageData['sliderEffect']);?>
										</select>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Slider Width </td>
										<td>
										<input value="<?php if(isset($pageData['sliderWidth'])){ echo $pageData['sliderWidth']; } ?>" type="text" name="sliderWidth" id="sliderWidth" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Slider Height </td>
										<td>
										<input value="<?php if(isset($pageData['sliderHeight'])){ echo $pageData['sliderHeight']; } ?>" type="text" name="sliderHeight" id="sliderHeight" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										<tr >
	  									<td>Slider Interval </td>
										<td>
										<input value="<?php if(isset($pageData['sliderInterval'])){ echo $pageData['sliderInterval']; } ?>" type="text" name="sliderInterval" id="sliderInterval" class="bigTextBoxSm textbox fWidth"/>
										</td>						
										</tr>
											
										
										
						
						</table>
							
						
						            
						     
											
						
						</fieldset>
						
						
						
						<input type="submit" class="submit"  value="Save" />	
									<input type="button" class="submit  popupHide"  value="Back" 	onclick="os.jump('<?php echo $listPAGEUrl ?>');" />
									
									
									 <input type="hidden" name="rowId" value="<?php echo $rowId; ?>" />
                                     <input type="hidden" name="operation" value="updateField" />
						</form>
						
					</div>
			  </td>
			  </tr>
			</table>


			<script>
				function setEffect(effectsHtml){
					
					os.setHtml('sliderEffect',effectsHtml);
				}
				
				function getEffect(sliderName){
					if(sliderName==''){
					
						sN = os.getObj("sliderName");
						sliderName = sN.options[sN.selectedIndex].value;
					}
					
					var url = '<?php echo $site['url'];?>'+'ajxSysytem.php?sliderEffect=ok&sliderName='+sliderName;
					os.setAjaxFunc('setEffect',url);
					
				}
				<?php if($rowId<1){?>getEffect('');<?php } ?>
			</script>		

   
	<? include('bottom.php')?>