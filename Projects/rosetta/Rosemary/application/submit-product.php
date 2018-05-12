<div style="margin-top:10px;">
<?php if($os->isLogin()){?>

<?php
	$dealerId=$os->userDetails['customerId'];
	$scmsg='';
	
	if(isset($_POST['sp_hidden'])){
		$spDataSave['name']=varP('name');
		$spDataSave['code']=varP('code');
		$spDataSave['make']=varP('make');
		$spDataSave['model']=varP('model');
		$spDataSave['description']=addslashes(varP('description'));
		$spDataSave['price']=varP('price');
		$spDataSave['oldPrice']=varP('oldPrice');
		$spDataSave['availableQuantity']=varP('availableQuantity');
		
		
		if($_FILES['img1']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['img1']['tmp_name']);}#for Thumbnail
		$img1=$os->UploadPhoto('img1',$site['imgPath'].'wtos-images/submit_product');
		if($img1!=''){
		$spDataSave['img1']='wtos-images/submit_product/'.$img1;
		createThumbnail($type,$width,$height,$thumb_width='150',$thumb_height='150',$img1,$site['imgPath'].'wtos-images/submit_product/',$site['imgPath'].'wtos-images/submit_product/thumb/');				
		}
									
		if($_FILES['img2']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['img2']['tmp_name']);}#for Thumbnail					
		$img2=$os->UploadPhoto('img2',$site['imgPath'].'wtos-images/submit_product');
		if($img2!=''){
		$spDataSave['img2']='wtos-images/submit_product/'.$img2;
		createThumbnail($type,$width,$height,$thumb_width='150',$thumb_height='150',$img2,$site['imgPath'].'wtos-images/submit_product/',$site['imgPath'].'wtos-images/submit_product/thumb/');		
		}
		
		if($_FILES['img3']['name']!=''){list($width,$height,$type,$attr) = getimagesize($_FILES['img3']['tmp_name']);}#for Thumbnail	
		$img3=$os->UploadPhoto('img3',$site['imgPath'].'wtos-images/submit_product');
		if($img3!=''){
		$spDataSave['img3']='wtos-images/submit_product/'.$img3;
		createThumbnail($type,$width,$height,$thumb_width='150',$thumb_height='150',$img3,$site['imgPath'].'wtos-images/submit_product/',$site['imgPath'].'wtos-images/submit_product/thumb/');		
		}
		$spDataSave['modifyDate']=$os->now();
		$spDataSave['addedDate']=$os->now();
		
		$spDataSave['status']='Inactive';
		$spDataSave['dealerId']=$dealerId;
		
		$insertedId=$os->save('productSubmit',$spDataSave,'','');
		if($insertedId>0){$os->mq("UPDATE customer SET dealer='Yes' WHERE customerId=$dealerId");$scmsg='<font style="color:#008000;">Product posted successfully.</font>';}
		
	}
?>
<style>
.sp_txt{ border:1px solid #666; width:100px;}
.sp_txt_area{border:1px solid #666; width:660px;resize: none; height:70px;}
.sp_tbl td{ color:#2E2E2E;}
.sp_file{ color:#0080C0; font-size:11px;}
.sp_submit{ color:#232323;}
.pp_dt{ padding-bottom:14px; color:#333;}
.SelectBox{ width:102px;border: 1px solid #BFBFBF;font-size: 12px;padding: 1px;}
.dtpk{ cursor:pointer;}
.dtpk:hover{ background:#F2F9FF;}
.ui-datepicker{ font-size:11px; font-family:Arial, Helvetica, sans-serif;}

.sp_iframe{ border:none; width:100%; height:100%; min-height:450px;}

</style>

<div style="font-family:Arial, Helvetica, sans-serif; font-size:14px; padding:5px;">
	<div style="color:#0076AE; font-weight:bold;">Post Product</div>   
    <div style="margin-top:5px; background:#F2F2F2; font-size:12px; padding:5px 5px 5px 5px;">
     <div>&nbsp;<?php echo $scmsg;?></div>   
    <form action="" method="post" id="sp_form" enctype="multipart/form-data">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="sp_tbl">
          <tr>
            <td>Name:</td>
            <td><input type="text" name="name" id="name" class="sp_txt" value="" style="width:185px;" /></td>
            <td>Code:</td>
            <td><input type="text" name="code" id="code" class="sp_txt" value="" /></td>
            <td>Make:</td>
            <td><input type="text" name="make" id="make" class="sp_txt" value="" /></td>
            <td>Model:</td>
            <td><input type="text" name="model" id="model" class="sp_txt" value="" /></td>
          </tr>
          <tr><td colspan="8">&nbsp;</td></tr>
          <tr>
          	<td>Description:</td>
            <td colspan="7"><textarea name="description" id="description" class="sp_txt_area"></textarea></td>
          </tr>
          
           <tr><td colspan="8">&nbsp;</td></tr>
           
           <tr>
            <td>Price:</td>
            <td><input type="text" name="price" id="price" class="sp_txt" value="" /></td>
            <td>Old Price:</td>
            <td><input type="text" name="oldPrice" id="oldPrice" class="sp_txt" value="" /></td>
            <td>Quantity:</td>
            <td><input type="text" name="availableQuantity" id="availableQuantity" class="sp_txt" value="" /></td>
           
          	<td colspan="2">&nbsp;</td>
          </tr>
          
          <tr><td colspan="8">&nbsp;</td></tr>
          
          <tr>
          	<td>Image 1</td>
          	<td colspan="3"><input class="sp_file" type="file" name="img1" id="img1" /></td>
            <td>Image 2</td>
            <td colspan="3"><input class="sp_file" type="file" name="img2" id="img2" /></td>
          </tr>
          
           <tr><td colspan="8">&nbsp;</td></tr>
          
          <tr>
          	 <td>Image 3</td>
          	<td colspan="3"><input class="sp_file" type="file" name="img3" id="img3" /></td>
            <td colspan="4">
            <input class="sp_submit" type="button" onclick="validateProductSubmit()" value="Submit" />
            <input type="hidden" name="sp_hidden" />
            </td>
          </tr>
          
        </table>
    </form>    

    </div>
    <div style="color:#0076AE; font-weight:bold; margin-top:5px;">Posted Products</div>
     <div style="margin-top:5px;font-size:12px; padding:5px 5px 5px 5px;">
	 <div style="min-height:150px; max-height:570px; overflow-y:scroll;">
     	<?php
        	$postedPro=$os->getMe("SELECT * FROM productSubmit  WHERE dealerId=$dealerId");
			if(is_array($postedPro) && count($postedPro)>0){
			foreach($postedPro as $v){
		?>
        	<div style="margin-bottom:15px; padding:5px; background:#F2F9FF; border:1px solid #AED7FF;">			
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  	<td width="15%" valign="top">
                    	<img  src="<?php echo $site['url'].$v['img1'];?>" width="100" height="100" alt="Image" />
                    </td>
                    <td width="55%" valign="top">
                    	<div class="pp_dt">Name: <?php echo $v['name'];?></div>
                        <div class="pp_dt">Code: <?php echo $v['code'];?></div>
                        <div class="pp_dt">Make: <?php echo $v['make'];?></div>
                        <div class="pp_dt">Model: <?php echo $v['model'];?></div>
                    </td>
                    <td valign="top">
                    	<div class="pp_dt">Price: <?php echo $v['price'];?></div>
                        <div class="pp_dt">Old Price: <?php echo $v['oldPrice'];?></div>
                        <div class="pp_dt">Quantity: <?php echo $v['availableQuantity'];?></div>
                        <div class="pp_dt">Status: <?php echo $v['status'];?></div>
                    </td>
                  </tr>
                  <tr>
                  	<td valign="top">Description:</td>
                    <td colspan="2" valign="top">
                    <div style="text-align:justify; color:#333;"><?php echo stripslashes($v['description']);?></div>
                    </td>
                  </tr>
                </table>	
            </div>
			
        <?php }}else{?>
		<div>No product posted.</div>
		<?php }?>
		</div>
     </div>
	 
	 
	 <div style="color:#0076AE; font-weight:bold;">Posted Products in Orders</div>
     <div style="margin-top:5px;font-size:12px; padding:5px 5px 5px 5px;">
	 	<div style="background:#EBEBEB; padding:5px;">
		<table width="100%" border="0" cellspacing="0" cellpadding="1">
		  <tr>
			<td>Order Code: </td>
			<td><input type="text" name="" id="s_orderCode" class="sp_txt" value="" /></td>
			<td>Date From: </td>
			<td><input type="text" name="" id="s_form" class="sp_txt dtpk" value="" /></td>
			<td>Date To: </td>
			<td><input type="text" name="" id="s_to" class="sp_txt dtpk" value="" /></td>
			<td>Status: </td>
			<td>
				<select id="s_status" class="SelectBox">	
					<option value="">All</option>									
				<?php $os->onlyOption($os->orderStatus,'');?>
				</select>
			</td>
		  </tr>
		  <tr>
			<td>Payment: </td>
			<td>
				<select id="s_payment" class="SelectBox">	
					<option value="">All</option>									
				<?php $os->onlyOption($os->paymentStatus_order,'');?>
				</select>
			</td>
			<td>Product: </td>
			<td>
				<select id="s_product" class="SelectBox">	
					<option value="">All</option>									
				<?php  $os->optionsHTML('','productId','name','product',"dealerId=$dealerId",'name ASC','');?>
				</select>
			</td>
			<td><input class="sp_submit" type="button" id="" onclick="setiframeSrc()" value="Search" /></td>
			<td><input class="sp_submit" type="button" id="" onclick="resetIframe()" value="Reset" /></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
		</div>
	 </div>
	 
	 <div style="font-size:12px; padding:5px 5px 5px 5px;">
	
	 <iframe src="<?php echo $site['url'];?>application/submit_order_iframe.php" class="sp_iframe" id="s_ifrm"></iframe>
	
	 </div>
	 
</div>
<script src="<?php echo $site['url'];?>wtos/js/datepkr/jquery.ui.core.js"></script>
<script src="<?php echo $site['url'];?>wtos/js/datepkr/jquery.ui.datepicker.js"></script>
<link href="<?php echo $site['url'];?>wtos/wtos-theme/css/datepkr/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script>
	function setiframeSrc(){
		var s_orderCode=os.getVal('s_orderCode');
		var s_form=os.getVal('s_form');
		var s_to=os.getVal('s_to');
		var s_status=os.getVal('s_status');
		var s_payment=os.getVal('s_payment');
		var s_product=os.getVal('s_product');
		var src='<?php echo $site['url'];?>application/submit_order_iframe.php?s_orderCode='+s_orderCode+'&s_form='+s_form+'&s_to='+s_to+'&s_status='+s_status+'&s_payment='+s_payment+'&s_product='+s_product;
		
		os.getObj('s_ifrm').src=src;
	}
	
	function resetIframe(){
		os.setVal('s_orderCode','');
		os.setVal('s_form','');
		os.setVal('s_to','');
		os.setVal('s_status','');
		os.setVal('s_payment','');
		os.setVal('s_product','');
		setiframeSrc();
	}
	
	function performClick(node) {
		var evt = document.createEvent("MouseEvents");
		evt.initEvent("click", true, false);
		node.dispatchEvent(evt);
	}
	
	function validateProductSubmit(){
		if (chkEmpty(os.getVal('name'))) {			
			alert('Please enter product name.');
			os.getObj('name').focus();
			return false;
		}
		
		if (chkEmpty(os.getVal('code'))) {			
			alert('Please enter product code.');
			os.getObj('code').focus();
			return false;
		}
		
		if (chkEmpty(os.getVal('make'))) {			
			alert('Please enter make.');
			os.getObj('make').focus();
			return false;
		}
		
		if (chkEmpty(os.getVal('model'))) {			
			alert('Please enter model.');
			os.getObj('model').focus();
			return false;
		}
		
		if (chkEmpty(os.getVal('description'))) {			
			alert('Please enter product description.');
			os.getObj('description').focus();
			return false;
		}
		if (chkEmpty(os.getVal('price'))) {			
			alert('Please enter product price.');
			os.getObj('price').focus();
			return false;
		}
		if (chkEmpty(os.getVal('oldPrice'))) {			
			alert('Please enter product old price.');
			os.getObj('oldPrice').focus();
			return false;
		}
		if (chkEmpty(os.getVal('availableQuantity'))) {			
			alert('Please enter product available quantity.');
			os.getObj('availableQuantity').focus();
			return false;
		}
		
		if (chkEmpty(os.getVal('img1'))) {			
			alert('Please select first image.');
			//os.getObj('img1').focus();
			performClick(os.getObj('img1'));
			return false;
		}
		
		var ext = os.getVal('img1').substring(os.getVal('img1').lastIndexOf('.') + 1);	
		if(ext !="gif" && ext!="GIF" && ext !="JPEG" && ext !="jpeg" && ext !="jpg" && ext !="JPG" && ext !="PNG" && ext !="png"){
			alert("Upload Gif or png or Jpg images only");
			performClick(os.getObj('img1'));
			return false;	
		}
		
		if(!chkEmpty(os.getVal('img2'))){
			var ext = os.getVal('img2').substring(os.getVal('img2').lastIndexOf('.') + 1);	
			if(ext !="gif" && ext!="GIF" && ext !="JPEG" && ext !="jpeg" && ext !="jpg" && ext !="JPG" && ext !="PNG" && ext !="png"){
				alert("Upload Gif or png or Jpg images only");
				performClick(os.getObj('img2'));
				return false;	
			}	
		}
		
		if(!chkEmpty(os.getVal('img3'))){
			var ext = os.getVal('img3').substring(os.getVal('img3').lastIndexOf('.') + 1);	
			if(ext !="gif" && ext!="GIF" && ext !="JPEG" && ext !="jpeg" && ext !="jpg" && ext !="JPG" && ext !="PNG" && ext !="png"){
				alert("Upload Gif or png or Jpg images only");
				performClick(os.getObj('img3'));
				return false;	
			}	
		}
				
		formSubmit('sp_form');		
		
	}
	
	dateCalander();
</script>

<?php }?>
</div>