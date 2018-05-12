<?php
if (! $os->isLogin ()) {
	global $pageVar;
	$ref_url = '';
	$ref_url_login = '';
	if (isset ( $pageVar ['segment'] [2] ) && $pageVar ['segment'] [2] != '') {
		$ref_url_login = '/' . $pageVar ['segment'] [2];
		$ref_url = substr ( $pageVar ['segment'] [2], 8 );
		$ref_url = $site ['url'] . $ref_url;
	}
	
	if (isset ( $_POST ['imp-registration'] )) {
		
		$regData ['email'] = varP ( 'email' );
		$regData ['password'] = varP ( 'password' );
		$regData ['name'] = varP ( 'name' );
		$regData ['phone'] = varP ( 'phone' );
		$regData ['address'] = varP ( 'address' );
		$regData ['shippingAddress'] = varP ( 'shippingAddress' );
		
		$regData ['status'] = 'Active';
		$regData ['addedDate'] = $os->now ();
		$regData ['modifyDate'] = $os->now ();
		$insertedId = $os->save ( 'customer', $regData, '', '' );
		if ($insertedId > 0) {
			?>
<form method="post" id="login-form">
	<input type="hidden" name="email"
		value="<?php echo $regData['email'];?>" /> <input type="hidden"
		name="password" value="<?php echo $regData['password'];?>" /> <input
		type="hidden" name="SystemLogin" value="SystemLogin" /> <input
		type="hidden" name="redirect" value="<?php echo $_POST['redirect'];?>" />
</form>
<script>formSubmit('login-form');</script>
<?php
		}
	}
	?>
<div class="loginin">
	<h3>Customer Registration</h3>
	<br />
	<div class="clr"></div>
	<form method="post" id="imp-registration">
		<h4>Email Address</h4>
		<input name="email" id="email" type="text" class="mail"
			placeholder="Email" /><br /> <input type="hidden" value="0"
			id="validEmail" />
		<div id="emailMsg" class="loginMsg"></div>
		<h4>Password</h4>
		<input name="password" id="password" type="password" class="mail pass"
			placeholder="Password" /><br />
		<div id="passwordMsg" class="loginMsg"></div>
		<h4>Confirm Password</h4>
		<input name="password_confirm" id="password_confirm" type="password"
			class="mail pass" placeholder="Password" /><br />
		<div id="password_confirmMsg" class="loginMsg"></div>
		<h4>Full name</h4>
		<input name="name" id="name" type="text" class="mail"
			placeholder="Full name" /><br />
		<div id="nameMsg" class="loginMsg"></div>
		<h4>Mobile</h4>
		<input name="phone" id="phone" type="text" class="mail"
			placeholder="Mobile" /><br />
		<div id="phoneMsg" class="loginMsg"></div>
		<h4>Address</h4>
		<textarea name="address" id="address" cols="" rows=""
			style="width: 252px; height: 50px;"></textarea>
		<input type="checkbox" onclick="copySAddress(this)" name="" id="" /><font
			style="color: #0078B3; font-size: 13px;"> Shipping address</font> <br />
		<br />
		<div id="addressMsg" class="loginMsg"></div>
		<h4>Shpping Address</h4>
		<textarea name="shippingAddress" id="shippingAddress" cols="" rows=""
			style="width: 252px; height: 50px;"></textarea>
		<br />
		<div id="shippingAddressMsg" class="loginMsg"></div>
		<input type="hidden" name="imp-registration" /> <input type="hidden"
			name="redirect" value="<?php echo $ref_url;?>" />
	</form>
	<div class="clr"></div>

	<a class="sing" href="javascript:void(0)"
		onclick="registrationValidation()">Resister</a>
	<h5>
		or <a
			href="<?php echo $site['url'];?>login<?php echo $ref_url_login;?>">Already
			user? Log in please</a>
	</h5>
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
		if (!chkEmail(os.getVal('email'))) {			
			os.setHtml('emailMsg','Please enter a valid email.');	
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
		
		//if(os.getVal('validEmail')==0){return false;}
		
		if (chkEmpty(os.getVal('password'))) {			
		os.setHtml('passwordMsg','Please enter your password.');
		os.getObj('password').focus();
		return false;
		}
		else{os.setHtml('passwordMsg','');}
		
		
		if (chkEmpty(os.getVal('password_confirm'))) {
			os.setHtml('password_confirmMsg','Please re enter your password.');
			os.getObj('password_confirm').focus();			
			return false;
		}
		else{os.setHtml('password_confirmMsg','');}
		
		if(os.getVal('password')!=os.getVal('password_confirm')){			
			os.setHtml('password_confirmMsg','Passwords does not match.');
			os.getObj('password_confirm').focus();
			return false;	
		}
		else{os.setHtml('password_confirmMsg','');}
		
		if (chkEmpty(os.getVal('name'))) {			
			os.setHtml('nameMsg','Please enter your full name.');
			os.getObj('name').focus();
			return false;
		}
		else{os.setHtml('nameMsg','');}
		
		if (chkEmpty(os.getVal('phone'))) {			
			os.setHtml('phoneMsg','Please enter your mobile number.');
			os.getObj('phone').focus();
			return false;
		}
		else{os.setHtml('phoneMsg','');}
		
			var phoneno = /^\d{10}$/;  
			if(os.getVal('phone').match(phoneno)){				
				os.setHtml('phoneMsg','');
			}  	
			else{
				os.setHtml('phoneMsg','This is not a valid mobile number. only 10 digits');
				os.getObj('phone').focus();
				return false;	
			}
		
		if (chkEmpty(os.getVal('address'))) {			
			os.setHtml('addressMsg','Please enter your address.');
			os.getObj('address').focus();
			return false;
		}
		else{os.setHtml('addressMsg','');}
		
		if (chkEmpty(os.getVal('shippingAddress'))) {			
			os.setHtml('shippingAddressMsg','Please enter your shipping address.');
			os.getObj('shippingAddress').focus();
			return false;
		}
		else{os.setHtml('shippingAddressMsg','');}
		formSubmit('imp-registration');
	}
	
	function copySAddress(chk){
		if(chk.checked==true){os.setVal('shippingAddress',os.getVal('address'));}else{os.setVal('shippingAddress','')}
	}
</script>
<?php }else{?>
<div class="alreadyLogin">Already logged in</div>
<?php }?>