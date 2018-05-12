<?php if(!$os->isLogin()){?>
<?php
	$error='';$successMsg = '';$pass='';
	
	function chkEmail($val) {
		if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$val)){
		return true;
	}
		return false;
	}
	
	if(isset($_POST['f_pass'])){
		if(trim(varP('fp_email'))=='' || !chkEmail(varP('fp_email'))) {
			$error='Please Enter a valid email address';
		}
		if($error==''){
			$email = mysql_real_escape_string(varP('fp_email'));
			$pass=$os->getByFld('customer','email',$email,'password');
			if($pass!=''){
				$msgSubject = 'Your  Password';
				$msgFromName = 'admin@webtrackers.co.in';
				$adminEmail = $os->getSettings('email'); # get admin email id from settings
				$msgBody = "Dear customer your username: $email ,password: $pass";
				if($adminEmail!='' && $os->emailSend($email,$adminEmail,$msgFromName,$msgSubject,$msgBody)){
					$successMsg = 'Your password is send to your email.';
				}else{$error = 'Something wrong! please try again later';}
			}
			else{
				$error = 'This email is not valid.';	
			}
		}
		else{
			$error = 'Please enter a valid email.';	
		}
	}
	
?>
<div class="loginin">
<h3>Forgot Password</h3><br />
<div class="clr"></div>
<div><span style="font-size:14px; color:#F00;"><?php echo $error?></span> <span style="font-size:14px; color:#008000;"><?php echo $successMsg?></span></span></div>
<form action="" id="fp-form" method="post">
<h4>Email Address</h4>
<input name="fp_email" id="fp_email" type="text" class="mail" placeholder="Email" /><br />
<div id="fpMsg" class="loginMsg"></div>
<input type="hidden" name="f_pass" />
</form>
<div class="clr"></div>

<a class="sing" href="javascript:void(0)" onclick="fp_validation()">Send Password</a>

</div>
<script>
function fp_validation(){	
	os.setHtml('fpMsg','');
	if (!chkEmail(os.getVal('fp_email'))) {
		os.setHtml('fpMsg','Please enter a valid email address.');
	}
	else{
		formSubmit('fp-form');
	}
}
function navigate(e) {	
	if(e.keyCode == 13){ //enter pressed
		fp_validation();
	}
}	
document.onkeyup=navigate;
</script>
 <?php }else{?>
 <div class="alreadyLogin">Already logged in</div>
 <?php }?>