<?php

if(!$os->isLogin()){
	
	global $pageVar;
	$ref_url='';$ref_url_login='';
	if(isset($pageVar['segment'][2]) && $pageVar['segment'][2]!=''){
		$ref_url_login = '/'.$pageVar['segment'][2];
		$ref_url = substr($pageVar['segment'][2],8);
		$ref_url = $site['url'].$ref_url;
	}
	
	if(isset($_POST['imp-registration'])){
		
		
		$regData['email'] = varP('email');
		$regData['password'] = varP('password');
		$regData['name'] = varP('fullname');
		$regData['phone'] = varP('phone');
		$regData['address'] =varP('address1');
		$regData['address'] .=varP('address2');
		//$regData['shippingAddress'] = varP('shippingAddress');
		
		$regData['status'] = 'Active';
		$regData['addedDate']=$os->now();
		$regData['modifyDate']=$os->now();
		//_d($regData);
		$insertedId=$os->save('customer',$regData,'','');
		if($insertedId>0){
		?>
        <form method="post" id="login-form">
            <input type="hidden" name="email" value="<?php echo $regData['email'];?>" />
            <input type="hidden" name="password" value="<?php echo $regData['password'];?>" />
            <input type="hidden" name="SystemLogin" value="SystemLogin"/>
            <input type="hidden" name="redirect" value="<?php echo $_POST['redirect'];?>"/>
        </form>
        <script>formSubmit('login-form');</script>
        <?php	
		}
		
	}
?>







        	<div class="row">
        	
            	<?php include('leftCol.php');?>
            	
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                	<div class="prodect_right_grupe">
                	
                    	<div class="login_center">
                        	<h2>New Customers...</h2>
                        	<form class="form-horizontal v_space20" method="post" id="imp-registration">
                        		<div class="form-group">
		                        		<div class="col-sm-4 " id="ajaxMsg"></div>
		                                <div class="col-sm-8" id="errMessage" style="color: #F00">
                                </div>
                              </div>
                        	
                              <div class="form-group">
                                <label for="fullname" class="col-sm-4 control-label">Your Full Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Your Full Name">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email Address</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                  <input type="hidden" value="0" id="validEmail" />
                                   <div id="emailMsg" >   </div>                         
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="reemail" class="col-sm-4 control-label">Re-Type Email Address</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control" name="reemail" id="reemail" placeholder="Re-Type Email Address">
                                   <div id="remailMsg"> </div>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="reemail" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                   <div id="remailMsg"> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <h5>Billing Address:</h5>
                              </div>
                              <div class="form-group">
                                <label for="houseNo" class="col-sm-4 control-label">House Name / Number</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="houseNo" id="houseNo" placeholder="House Name / Number">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="address1" class="col-sm-4 control-label">Address 1</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="address2" class="col-sm-4 control-label">Address 2</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="address2"  id="address2" placeholder="Address 2">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="city" class="col-sm-4 control-label">Town / City</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="city" id="city" placeholder="Town / City">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="country"  class="col-sm-4 control-label">Country</label>
                                <div class="col-sm-8">
                                <select class="form-control" name="country" id="country">
                                    <option value="">select</option>
                                    <option value="UK">UK</option>
                                    
  							    </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="postcode" class="col-sm-4 control-label">Postcode</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Postcode">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Telephone No.</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Telephone No.">
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="button" onclick="javascript:registrationValidation()" class="btn btn-primary">Resister</button>
                                  <span>or <a href="<?php echo $site['url'];?>login<?php echo $ref_url_login;?>">Already user? Log in please</a></span>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <input type="hidden" name="imp-registration" /> 
                                  <input type="hidden" name="redirect" value="<?php echo $ref_url;?>" />
                                </div>
                              </div>
                         </form>
                        </div>
                    </div>
                </div>
            </div>
      
    <script>

    
	function setUnameMsg(exists){
		if(exists>0){
			os.setVal('validEmail',0);		
			os.getObj('emailMsg').style.color='#F00';			
			os.setHtml('emailMsg','This email is already exists.');
			return false;
		}
		else{os.setVal('validEmail',1);os.getObj('emailMsg').style.color='#008000';os.setHtml('emailMsg','Email id is valid');}
	}
	
	function registrationValidation(){

		if (chkEmpty(os.getVal('fullname'))) {		
			os.getObj('errMessage').style.color='#F00';		
			os.setHtml('errMessage','Please Enter Your Name.');
			os.getObj('fullname').focus();
			return false;
			}
			else{os.setHtml('errMessage','');}
		
		
		if (!chkEmail(os.getVal('email'))) {

			os.getObj('errMessage').style.color='#F00';
			os.setHtml('errMessage','Please enter a valid email.');	
			os.getObj('email').focus();
			return false;
		}
		else{
			os.setHtml('emailMsg','');
			var url = '<?php echo $site['url'];?>application/ajxSysytem.php?chkUname=yes'+'&uName='+os.getVal('email');
			os.animateMe.div='emailMsg';						
			os.animateMe.html='<img src="<?php echo $site['themePath'];?>images/ajax-loader.gif" alt="" border="0" /> Working....';
			os.setAjaxFunc('setUnameMsg',url);
		}

		
		
		if(os.getVal('validEmail')==0){return false;}
		
		if (chkEmpty(os.getVal('email'))) {			
		os.setHtml('errMessage','Please Type your email.');
		os.getObj('email').focus();
		return false;
		}
		else{os.setHtml('errMessage','');}
		
		
		if (chkEmpty(os.getVal('reemail'))) {
			os.setHtml('errMessage','Please retype your email.');
			os.getObj('reemail').focus();			
			return false;
		}
		else{os.setHtml('errMessage','');}
		
		if(os.getVal('email')!=os.getVal('reemail')){			
			os.setHtml('errMessage','Email does not match.');
			os.getObj('reemail').focus();
			return false;	
		}
		else{os.setHtml('errMessage','');}
		
		if (chkEmpty(os.getVal('houseNo'))) {			
			os.setHtml('errMessage','Please enter your House No.');
			os.getObj('houseNo').focus();
			return false;
		}
		else{os.setHtml('errMessage','');}
		
		if (chkEmpty(os.getVal('address1'))) {			
			os.setHtml('errMessage','Please enter your address1.');
			os.getObj('address1').focus();
			return false;
		}
		else{os.setHtml('errMessage','');}
		
			
		
		if (chkEmpty(os.getVal('address2'))) {			
			os.setHtml('errMessage','Please enter your address2.');
			os.getObj('address2').focus();
			return false;
		}
		else{os.setHtml('errMessage','');}
		
		if (chkEmpty(os.getVal('city'))) {			
			os.setHtml('errMessage','Please enter your city.');
			os.getObj('city').focus();
			return false;
		}
		else{os.setHtml('errMessage','');}
		
		if (chkEmpty(os.getVal('postcode'))) {			
			os.setHtml('errMessage','Please enter your Postcode.');
			os.getObj('postcode').focus();
			return false;
		}
		else{os.setHtml('errMessage','');}

		if (chkEmpty(os.getVal('phone'))) {
			os.setHtml('errMessage','Please Enter your phone.');
			os.getObj('phone').focus();			
			return false;
		}
		else{os.setHtml('errMessage','');}
		
		//var phoneno = /^\d{10}$/;  
//		if(os.getVal('phone').match(phoneno)){				
//			os.setHtml('errMessage','');
//		}  	
//		else{
//			os.setHtml('errMessage','This is not a valid mobile number. only 10 digits');
//			os.getObj('phone').focus();
//			return false;	
//		}
		
		
// 		if (chkEmpty(os.getVal('shippingAddress'))) {			
// 			os.setHtml('errMessage','Please enter your shipping address.');
// 			os.getObj('errMessage').focus();
// 			return false;
// 		}
// 		else{os.setHtml('errMessage','');}
		formSubmit('imp-registration');
 	}
	
// 	function copySAddress(chk){
// 		if(chk.checked==true){os.setVal('shippingAddress',os.getVal('address'));}else{os.setVal('shippingAddress','')}
// 	}
</script>
    
    <?php }else{?>
 <div class="alreadyLogin">Already logged in</div>
 <?php }?>