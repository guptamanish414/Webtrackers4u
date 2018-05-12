<?php
include('includes/config.php');
include('top-inner.php');

// config 

$DivIds['AJAXPAGE']='memberqueryEdit';
$listPAGE='memberquery';
$primeryTable='memberquery';
$primeryField='memberqueryId';
$listHeader='List Memberquery';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft','memberId'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','memberId'),'');
##  delete row


$memberqueryId=$_GET['memberqueryId'];


$memberquery=$os->get_memberquery("memberqueryId='$memberqueryId'");
$memberquery=$memberquery[0];
   
   $preferedLoc=$memberquery['preferedLoc'];
   $propType=$memberquery['propType'];
   $minBudget=$memberquery['minBudget'];
    $maxBudget=$memberquery['maxBudget'];
   
   
	if( $preferedLoc>0){   $andpreferedLoc=" and locationId='$preferedLoc'";   }
	if( $propType>0){   $andpropType=" and propertyType='$propType'";   }
	if( $minBudget>0){   $andminBudget=" and price>='$minBudget'";   }
	if( $maxBudget>0){   $andmaxBudget=" and price<='$maxBudget'";   }
   
   
   
   
   
   
   

$listingQuery=" select * from property where propertyId>0   $andpreferedLoc  $andpropType  $andminBudget  $andmaxBudget  $andpreferedLoc  order by price asc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>
<table border="0" cellspacing="1" cellpadding="1" style="margin:5px; font-size:12px;">
  <tr>
    <td colspan="4">Property Search Parameters</td>
    
  </tr>
  <tr>
    <td width="150">location : <b><? echo $os->getByFld('propertylocation','propertylocationId',$preferedLoc,'title'); ?></b></td>
    <td width="150">Type: <b><? echo $os->propertyType[$record['propType']]; ?></b></td>
    <td width="150">Min Budget : <b><? echo  $minBudget ?></b></td>
    <td width="150">Max Budget: <b><? echo  $maxBudget ?></b> </td>
  </tr>
</table>
 
 
 
 
    
 

	
	
	



	<table class="container" style="width:700px;">
				<tr>
					 
			  <td  style="padding-left:5px;">
			  
			  
			  
			  
			  <!--  ggggggggggggggg   -->
			  
			  
			  
				 <div class="headertext" style="margin-top:10px;">Total <? echo $os->paging->p['count']; ?>
				 <a class="refreshButton" href="" style="margin-left:20px;"> Refresh </a>    
				 
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" style="color:#666666;" >
							<tr class="borderTitle" >
								<td >#</td>								
			
					

  <td ><b>Title</b></td>  
  <td ><b>Address</b></td>  
  <td ><b>price</b></td>  
  <td ><b>bed /bath /reception </b></td>  
  <td ><b>label</b></td>  
   
								
							</tr>
							
							
							
							
							<?php
							  $c=1;
							 $i=$os->slNo();
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								
							
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
			  	
    <td><?php echo $record['title']?> </td>  
  <td><?php echo $record['address']?> <?php echo $record['postcode']?> </td>  
  <td><?php echo $record['price']?> </td>  

  <td><?php echo $record['bed']?> /<?php echo $record['bath']?> /<?php echo $record['reception']?> </td>  
  	<td><?php echo $record['label']?> </td>  
                      
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
							} 
							}?>
							
							
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>




 
    
   
	<? include('bottom-inner.php')?>