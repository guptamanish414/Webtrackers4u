<?php
include('includes/config.php');
include('top.php');

// config 

$DivIds['AJAXPAGE']='orderdetailsEdit';
$listPAGE='orderdetails';
$primeryTable='orderdetails';
$primeryField='orderdetailsId';
$listHeader='Order Details';

 
$DivIds['EDITPAGE']=$site['url'].$DivIds['AJAXPAGE'].'.php?'.$os->addParams(array('hideTopLeft','orderId'),'').'editRowId=';
$listPAGEUrl=$listPAGE.'.php?'.$os->addParams(array('hideTopLeft','orderId'),'');

$orderId = varG('orderId');
if($orderId<1){echo '<font style="color:#FF0000; font-weight:bold;">Order Id Not Found...</font>';exit();}

$cId=$os->getByFld('orders','orderId',$orderId,'customerId');
$cDtls = $os->getMe("SELECT * FROM customer WHERE customerId='$cId'");
 
$oDtls = $os->getMe("SELECT * FROM orders WHERE orderId='$orderId' limit 1");
$oDtls=$oDtls[0];
##  delete row
if(varG('operation')=='deleteRow')
{
       if($os->deleteRow($primeryTable,$primeryField,varG('delId')))
	   {
	     $flashMsg='Data Deleted Successfully';
	   }
}


##  update row
if(varP('operation'))
{

	 if(varP('operation')=='updateField')
	 {
	  $rowId=varP('rowId');
	
	  #---- edit section ----#
		
$dataToSave['orderId'] = $orderId;	
 $dataToSave['productId']=varP('productId'); 
 $dataToSave['quantity']=varP('quantity'); 
 $dataToSave['ourPrice']=varP('ourPrice'); 
 $dataToSave['totalAmount']=varP('totalAmount'); 

		 
		$dataToSave['modifyDate']=$os->now();
		$dataToSave['modifyBy']=$os->userDetails['adminId']; 
		 
		if($rowId < 1){
		$dataToSave['addedDate']=$os->now();
		$dataToSave['addedBy']=$os->userDetails['adminId'];
		}
		
		
		
	 
	 
	  
	  $insertedId=$os->save($primeryTable,$dataToSave,$primeryField,$rowId);
	  $flashMsg=($rowId)?'Record Updated Successfully':'Record Added Successfully';
	  $os->popUpSaveAssign($insertedId);
	  #---- edit section end ----#
	
	 }
	
	
}
 

/* searching */

 

   

$listingQuery=" select * from $primeryTable where $primeryField>0 AND orderId='$orderId' $andActive order by $primeryField desc  ";

##  fetch row
//$recordsA=$os->pagingResult($listingQuery,$recordPerPage);
//$records=$recordsA['records'];

$records = $os->getMe($listingQuery);


 

$os->setFlash($flashMsg);
//tinyMce();

//searching......




?>

	<table class="container">
				<tr>
					<td  class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
			  <td  class="middle" style="padding-left:5px;">
			  
			  
			  <div class="listHeader"> <?php  echo $listHeader; ?></div>
			  
			  <!--  ggggggggggggggg   -->
			  <div style="font-size:11px;">
              	<?php if(is_array($cDtls) && count($cDtls)>0){$cDtls=$cDtls[0];?>
              
               <table  border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                    	<td width="50%" valign="top"> <b>Name:</b> <?php echo $cDtls['name'];?><br />
						  <b>Date:</b> <?php echo $os->viewDate($oDtls['orderDate']);?>  <br />
						   <b>Order Code:</b> <?php echo $oDtls['orderCode'] ;?>  <br />
						   <b>Discount:</b>   <?php echo $oDtls['discountAmount']?>
			<?  if($oDtls['discountPercent']>0) {?>			   
	<span style="font-size:10px; font-style:italic; color:#737373;">  
	<? 	{echo '@'.$oDtls['discountPercent'].'%';}?> <font style="color:#E800E8"> <?php echo $oDtls['couponCode']?></font>
	</span>
	<? } ?><br />
	
	 <b>Total Payble Amount:</b> <b>  <?php echo $oDtls['totalAmount']?></b>
 
  
						</td>
                        
                  
                    	 
						
                        <td width="50%" valign="top"> 
						<b>Phone:</b> <?php echo $cDtls['phone'];?><br />
						<b>Email:</b> <?php echo $cDtls['email'];?> <br />
						<b>Ship Address:</b> <?php echo nl2br($cDtls['shippingAddress']);?></td>
                    </tr>
               </table>
                <?php }?>
              </div>
              
			  <div style="display:none;" class="headertext">Search Option   <span style="float:right">Record per page  <?php  echo $recordPerPageDDS; ?></span></div>
			  <div class="searchB" style="display:none;">
<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="buttonSa">
	


	 
	
	<a class="searchButton" href="javascript:void(0)" onclick="javascript:searchText()">Search</a>
	&nbsp;
	<a class="searchReset" href="javascript:void(0)"   onclick="javascript:searchReset()">Reset</a>
	
	</td>
	</tr>
</table>
				</div>
				 <div class="headertext" style="margin-top:10px;">Total <? if(is_array($records)){ echo count($records);} ?>
				 <a class="refreshButton" href="" style="margin-left:20px; display:none;"> Refresh </a>    
				 <span style="float:right;display:none;"><a  class="addButton"  href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?>0') ">Add record</a></span></div>
				 
				 <table  border="0" cellspacing="0" cellpadding="0" class="listTable" >
							<tr class="borderTitle" >
								<td >#</td>
								
	<td><b>Dealer</b></td>							
<td><b>Product</b></td>  
  <td ><b>Quantity</b></td>  
  <td ><b>Price</b></td>  
  <td ><b>Amount</b></td>  
  
								
								 
								
                                
								
								
								<td >Action </td>
								
							</tr>
							
							
							
							
							
							<?php
							 $c=1;
							 $i=$os->slNo();
							 $tot=0;
							 if(is_array($records)){ foreach($records as $k=>$record){ 
							    
								 $DivIds =$os->divIds($record[$primeryField], $DivIds);
																 
								 $selected=0;
								$tot+=$record['totalAmount'];
							
							 ?>
							
							<tr class="border" id="selected<?php echo $c;?>" onclick="trSelected('<?php echo $c;?>','<?php echo  count($records);?>');"   onmouseover="javascript:miz.switchRow('<?php echo  $DivIds['BUTTONS']; ?>')">
								<td><?php echo $i?>     </td>
			
        <td>
        <?php		
        $dealerId=$os->getByFld('product','productId',$record['productId'],'dealerId');
		echo $os->getByFld('customer','customerId',$dealerId,'name'); 
        ?>
        </td> 					
								
<td><?php echo  
	$os->getByFld('product','productId',$record['productId'],'name'); ?></td> 
  <td><?php echo $record['quantity']?> </td>  
  <td><?php echo $record['ourPrice']?> </td>  
  <td><?php echo $record['totalAmount']?> </td>  
  
							 	
								
						  <td class="actionLink">                   
                        <span id="<?php echo  $DivIds['BUTTONS']; ?>"  style="display:none"  class="buttonSa">
						
						<a class="editButton" href="javascript:void(0)" onclick="os.editRecord('<? echo $DivIds['EDITPAGE']?><?php echo  $DivIds['EDITID']; ?>')">Edit</a>
						
						<a class="deleteButton" href="javascript:void(0)" onclick="os.deleteRecord('<?php echo  $DivIds['EDITID']; ?>') ">Delete</a>
						
						
						
						</span>
						
                        
                       </td>
														
					</tr>
				 
                            
							
							<?php $i++; $c++;
							} 
							}?>
							
						<?php if(is_array($records)){?>	
                        <tr class="border">
                        	<td colspan="4">&nbsp;</td>
                            <td><b>Total</b></td>
                            <td><b><?php echo number_format($tot,2);?></b></td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php }?>
							
						</table>
				 
				 		<?php echo $recordsA['links'];?>			
	         
	  <br />
			  
			  <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>







	
    <script>
	
	 function searchText()
	 {
	 
	   
window.location='<?php echo $listPAGEUrl; ?>';
	  
	 }
	function  searchReset()
	{
			
	  window.location='<?php echo $listPAGEUrl; ?>';	
	   
	
	}
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom.php')?>