<?php
include('includes/config.php');
 include('aaHeader.php');
// config 

$DivIds['AJAXPAGE']='propertyEdit';
 

$listPAGE='property';
 
$primeryTable='property';
$primeryField='propertyId';
$listHeader='Enquery ';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft'),'');
  
 
 $hidden=' and active=1'; 
$listingQuery=" select * from $primeryTable where $primeryField>0   $andtitle  $andname  $andpostcode  $andbed  $andbath  $andfeatured  $andtype    $hidden order by $primeryField desc  ";

##  fetch row
$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
$records=$recordsA['records'];


 
$colorFeatured=array('No'=>'FFFFFF','Yes'=>'FF9900');

$colorStatus=array('0'=>'F2C6C6','1'=>'A0EBB9');
$status=array('0'=>'Inactive','1'=>'Active');
$statuslist=array('-1'=>'All','1'=>'Active','0'=>'Inactive');

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>

	<table class="container"  >
				<tr>
					 
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  
			   
			   <div id="reportData">
				  
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
								
<td ><b>Title</b></td>  <td ><b>Address</b></td> <td ><b>No. of Hits</b></td> <td ><b>NO of Enquery</b></td> 
   
   
    
	
								
							 
								
							</tr>
							
							<tr class="border" >
								<td id="create_0_0" style="display:none" colspan="10">
								<div  id="create_0"> &nbsp </div>	
								
								</td>
							</tr>
							
							
							
							<?php
							 $i=1;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								$location =$os->getByFld('propertylocation','propertylocationId',$record['locationId'],'title');
							
							 ?>
							
							<tr class="border"  onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
								
								
<td><?php echo $record['title']?>  &nbsp;</td>  
<td><?php echo $record['address']?> &nbsp;</td> 
<td style="font-size:14px; font-weight:bold; text-align:center"><?php echo $record['hits']?> &nbsp;</td> 
<td style="font-size:14px; font-weight:bold;text-align:center"><?php echo $record['enquery']?> &nbsp;</td> 
  
      		
							 	
						
						   
														
					</tr>
					<tr class="border">
						<td id="<?php echo  $DivIds['DIVLIST']; ?>" style="display:none" colspan="10">
							   <div  id="<?php echo  $DivIds['DIV']; ?>"> &nbsp </div>	
						
						</td>
					</tr>
                            
							
							<?php $i++;
							} 
							}?>
							
							
							
						</table>
						</div>
				 <a href="javascript:void(0)" onclick="printById('reportData')" style="color:#FF0000; font-weight:bold; font-size:16px;">Print</a>
				 		<?php echo $recordsA['links'];?>			
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>



<script>
		function printById(id){ // not in use
      	 
			var data = document.getElementById(id).innerHTML;
			
		 
			var  mywindow = window.open('bw', 'btp', 'height=600,width=900');
			mywindow.document.write('<html><head> ');			
			/*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
			
			mywindow.document.write('<link rel="stylesheet" href="<? echo $site['url'] ?>wtos-theme/css/style.css" type="text/css" />');
			
			mywindow.document.write('</head><body>');
			mywindow.document.write(data);
			
			
			mywindow.document.write('</body></html>');
			mywindow.print();	
			//mywindow.close();
			//mywindow.document.close();			
			//return true;
		
		}
	</script>



	
    
	
    
   
	<? include('bottom.php')?>