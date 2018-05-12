<?php 
 
if(!$os->isLogin()){?>
<?php


	global $pageVar;
	$ref_url='';$ref_url_register='';
	if(isset($pageVar['segment'][2]) && $pageVar['segment'][2]!=''){
		$ref_url_register = '/'.$pageVar['segment'][2];
		$ref_url = substr($pageVar['segment'][2],8);		
		$ref_url = $site['url'].$ref_url;	
		//_d($ref_url);
	}	
?>

        	<div class="row v_space20">
            	<?php include('leftCol.php');?>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                	<div class="prodect_right_grupe">
                    	<div class="col-lg-12 col-md-12 col-sm-12">
                        	<div class="login_center">
                            	<h2>Returning Customers...</h2>
                        	    <form id="login-form" class="form-horizontal v_space20" method="post">
                        	    
                        	    <div class="form-group">
                        	    	<div class="col-sm-2"></div>
                        	    	<div id="login_Msg" class="col-sm-10" style="color: #F00"></div>
                        	    </div>
                        	    
                              <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="username" name="email" placeholder="Email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                  <input type="hidden" name="SystemLogin" value="SystemLogin"/>
								  <input type="hidden" name="redirect" value="<?php echo $ref_url;?>"/>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox"> Remember me
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <a href="javascript:void(0)" class="btn btn-primary" onclick="loginValidation()">Sign in</a>
                                  <span>or <a href="<?php echo $site['url'];?>sign-up<?php echo $ref_url_register;?>">Register as new user</a></span>
                                </div>
                              </div>
                              
                         </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{?>
 <div class="alreadyLogin">Already logged in</div>
 <?php }?>
            </div>
       
    
<script>
		function setAjaxLoginMsg(loginMsg){
		var loginMsg=loginMsg.split('**');
		var valid = loginMsg[0];
		var msg = loginMsg[1];								
		if(valid<1){os.setHtml('login_Msg',msg);}else{formSubmit('login-form');}
		}
		
		function chkUserPass(uName,pass){
			var uName = Base64.encode(uName);
			var pass = Base64.encode(pass);
			
			var url = '<?php echo $site['url'];?>application/ajxSysytem.php?chkUnamePass=yes'+'&uName='+uName+'&pass='+pass;
			os.animateMe.div='login_Msg';						
			os.animateMe.html='<img src="<?php echo $site['themePath'];?>images/ajax-loader.gif" alt="" border="0" /> Working....';
			os.setAjaxFunc('setAjaxLoginMsg',url);
		
		}
		function loginValidation(){	
			if (!chkEmail(os.getVal('username'))) {
			umsg = 'Please enter a valid username.';
			os.setHtml('login_Msg','Please enter a valid username.');	
			os.getObj('username').focus();
			return false;
		}
		else{os.setHtml('login_Msg','');}
		if (chkEmpty(os.getVal('password'))) {
			pmsg = 'Please enter your password.';
			os.setHtml('login_Msg','Please enter your password.');
			os.getObj('password').focus();
			return false;
		}
		else{os.setHtml('login_Msg','');}
		chkUserPass(os.getVal('username'),os.getVal('password'));
		}
		function navigate(e) {	
			if(e.keyCode == 13){ //enter pressed
				loginValidation();
			}
		}	
		document.onkeyup=navigate;
</script>
    
    
    