<?php
include('includes/config.php');
include('top.php');
?>   
<?php
if($_POST['changePasswordSubmit']=='Change Password Submit')
{
	$dataPassword=$_POST['newPassword'];
	$dataPasswordOld=$_POST['oldPassword'];
	$usernameE=$os->userDetails['username'];
		
	$msg='';
	if($os->userDetails['password']==addslashes(trim($_POST['oldPassword'])))	
	{
		mysql_query(" update admin set  password='$dataPassword' where  password='$dataPasswordOld'  and username='$usernameE'   ");
		$msg='Successfully Changed';
	}	
	else
	{
		$msg='Wrong Old Password';
	}
}
?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td>
					
			  <td   class="middle" style="padding-left:5px;">
			  
			  
			  <!--  ggggggggggggggg   -->
					
					
								<form action="" name="change_password_form" id="change_password_form" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm();">
				<table cellpadding="0" cellspacing="0">
				<tr>
				<td>
				  <?php if($msg!=""){ echo $msg; } ?> 
				</td>
				
				</tr>
					<tr>
							<div class="form" style="margin-left:400px;">					
								<p>
									<label>Old Password</label>
									<input type="password" name="oldPassword" id="oldPassword" class="fields" <?php if($_POST['changePasswordSubmit']=='Change Password Submit'){?> value="" <?php } ?>/>
								</p>
								<p>
									<label>New Password</label>
									<input type="password" name="newPassword" id="newPassword" class="fields" <?php if($_POST['changePasswordSubmit']=='Change Password Submit'){?> value="<?php echo $_POST['newPassword'];?>" <?php } ?> />
								</p>
								
								<input type="hidden" name="changePasswordSubmit" id="changePasswordSubmit" value="Change Password Submit" />
								<input type="submit"  value=" Change " class="fields marginbottom5px" style="font-weight:bold; font-size:12px; color:#FF0000; background-color:#CCCCCC;"/>
								
							</div>
							
							
						</td>
			
			
						</table>
				</form>
					
			 <!--   ggggggggggggggg  -->
			  
			  </td>
			  </tr>
			</table>

				
<script type="text/javascript">
function ValidateForm()
       {
       		   if(trim(document.change_password_form.oldPassword.value)=="")
               {
                       alert("Please Enter Old Password!");
                       document.change_password_form.oldPassword.focus();
                       return false;
               }  
			   if(trim(document.change_password_form.newPassword.value)=="")
               {
                       alert("Please Enter New Password!");
                       document.change_password_form.newPassword.focus();
                       return false;
               }  	
			   		   
			                         
       return true;
       }
       
function trim(str)
               {
                  return str.replace(/^\s*|\s*$/g,"");
               }
function CheckEmailFormat(str)
               
               {
                       var reg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/; // not valid
                       var reg2 = /^[a-zA-Z0-9\_]+[a-zA-Z0-9\.\-_]+\@(\[?)[a-zA-Z0-9\-\_\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/; // valid
                       if (!reg1.test(str) && reg2.test(str))
                       { // if syntax is valid
                               return true;
                       }
                       return false;
               }        
</script>		
<? include('bottom.php')?>