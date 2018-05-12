<?php if(!$os->isLogin()){?>
<?php
	global $pageVar;
	$ref_url='';$ref_url_register='';
	if(isset($pageVar['segment'][2]) && $pageVar['segment'][2]!=''){
		$ref_url_register = '/'.$pageVar['segment'][2];
		$ref_url = substr($pageVar['segment'][2],8);		
		$ref_url = $site['url'].$ref_url;		
	}	
?>
<div class="loginin">
<h3>Customer Login</h3><br />
<div class="clr"></div>
<form action="" id="login-form" method="post">
<h4>Email Address</h4>
<input name="email" id="username" type="text" class="mail" placeholder="Email" /><br />
<div id="usernameMsg" class="loginMsg"></div>
<h4>Password</h4>
<input name="password" id="password" type="password" class="mail pass" placeholder="Password" />&nbsp;
<a style="color: #515151;font-family: Arial,Helvetica,sans-serif;font-size: 11px;" href="<?php echo $site['url'];?>forgot-password">Forgot password?</a>
<div id="password_login_Msg" class="loginMsg"></div>
<input type="hidden" name="SystemLogin" value="SystemLogin"/>
<input type="hidden" name="redirect" value="<?php echo $ref_url;?>"/>
</form>
<div class="clr"></div>

<a class="sing" href="javascript:void(0)" onclick="loginValidation()">Sing In</a>
<h5>or <a href="<?php echo $site['url'];?>sign-up<?php echo $ref_url_register;?>">Register as new user</a></h5>
</div>
<script>
function setAjaxLoginMsg(loginMsg){
var loginMsg=loginMsg.split('**');
var valid = loginMsg[0];
var msg = loginMsg[1];								
if(valid<1){os.setHtml('password_login_Msg',msg);}else{formSubmit('login-form');}
}

function chkUserPass(uName,pass){
	var uName = Base64.encode(uName);
	var pass = Base64.encode(pass);
	
	var url = '<?php echo $site['url'];?>application/ajxSysytem.php?chkUnamePass=yes'+'&uName='+uName+'&pass='+pass;
	os.animateMe.div='password_login_Msg';						
	os.animateMe.html='<img src="<?php echo $site['themePath'];?>images/ajax-loader.gif" alt="" border="0" /> Working....';
	os.setAjaxFunc('setAjaxLoginMsg',url);

}
function loginValidation(){	
	if (!chkEmail(os.getVal('username'))) {
	umsg = 'Please enter a valid username.';
	os.setHtml('usernameMsg','Please enter a valid username.');	
	os.getObj('username').focus();
	return false;
}
else{os.setHtml('usernameMsg','');}
if (chkEmpty(os.getVal('password'))) {
	pmsg = 'Please enter your password.';
	os.setHtml('password_login_Msg','Please enter your password.');
	os.getObj('password').focus();
	return false;
}
else{os.setHtml('password_login_Msg','');}
chkUserPass(os.getVal('username'),os.getVal('password'));
}
function navigate(e) {	
	if(e.keyCode == 13){ //enter pressed
		loginValidation();
	}
}	
document.onkeyup=navigate;
</script>
 <?php }else{?>
 <div class="alreadyLogin">Already logged in</div>
 <?php }?>