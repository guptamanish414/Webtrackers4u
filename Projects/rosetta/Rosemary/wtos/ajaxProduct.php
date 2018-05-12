<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();


 

if($_GET['featuresDiv']=='OK')
{
    $featureIds=$_GET['featureIds'];
  $rowId=$_GET['rowId'];
   $inRowId=str_replace(array(',,,',',,'),',',$featureIds);
  if($inRowId!=''){
        $inRowId='9999999999999999'.$inRowId.'999999999999999';
		$feaArr = $os->getMe("SELECT GROUP_CONCAT(productfeatureId) AS feaIds FROM productfeaturemap WHERE productId='$rowId'");
	 
		$feaStrArr = array();
		if(is_array($feaArr) && count($feaArr)>0){$feaArr=$feaArr[0];$feaIds = $feaArr['feaIds'];$feaStrArr=explode(',',$feaIds);}
	  
	  
	    $featureA = $os->get_productfeature(" productfeatureId IN (  $inRowId )  ");
		 
					if(is_array($featureA) && count($featureA)>0){
					foreach($featureA as $fk=>$fVal){
					$fId = $fVal['productfeatureId'];
					
					
				?>
				<div style="margin-top:5px;">
				<div class="ctHding">
				<!--<input <?php if(is_array($feaStrArr) && in_array($fVal['productfeatureId'],$feaStrArr)){?> checked="checked"<?php }?> type="checkbox" name="featr[]" id="" value="<?php echo $fVal['productfeatureId'];?>" />-->&nbsp;<?php echo $fVal['title'];?>&nbsp;
				<span class="pType"><?php if($fVal['productType']!=''){?>[<?php echo $fVal['productType'];?>]<?php }?></span>
				</div>
				<?php 
					$subfea1A = $os->get_productfeature(" parentId='$fId'");
					if(is_array($subfea1A) && count($subfea1A)>0){
					foreach($subfea1A as $fk1=>$fVal1){
				?>
				<div class="subCat">
				
				<input <?php if(is_array($feaStrArr) && in_array($fVal1['productfeatureId'],$feaStrArr)){?> checked="checked"<?php }?> type="checkbox" name="featr[]" id="" value="<?php echo $fVal1['productfeatureId'];?>" />
				&nbsp;<?php echo $fVal1['title'];?></div>
				<?php }}?>
				
				</div>
				
				
				
				
				
				<?php }}
	  }			
   
   exit();
}

?>