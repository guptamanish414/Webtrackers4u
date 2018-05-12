<? include('includes/config.php');
include('aaTop.php'); ?>
 
 <div class="btnStyle ViewPort" >
<div class="pageHead changepwd"> Change Password  </div>
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
<style>

.passwordChange{ width:400px; height:200px; margin:60px; background:#FFFFFF;padding:40px 0px 0px 0px;  
    border: 2px solid #f4f4f4;
    border-radius: 5px;
    box-shadow: 0 0 15px #666666;


}
</style>


<div class="passwordChange">

 
					
					
								<form action="" name="change_password_form" id="change_password_form" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm();">
				<table cellpadding="3" cellspacing="3" style="margin-left:20px; font-size:14px; color:#666666;">
				<tr>
				<td colspan="10" style="color:#FF6600;">
				  <?php if($msg!=""){ echo $msg; } ?> 
				</td>
				
				</tr>
					<tr>
					
					<td>Old Password </td> <td><input type="password" name="oldPassword" id="oldPassword" class="textbox" <?php if($_POST['changePasswordSubmit']=='Change Password Submit'){?> value="" <?php } ?>/></td> </tr>
					<tr>
						<td>New Password</td> <td><input type="password" name="newPassword" id="newPassword" class="textbox" <?php if($_POST['changePasswordSubmit']=='Change Password Submit'){?> value="<?php echo $_POST['newPassword'];?>" <?php } ?> /></td> 
							 
								
								
							 
							
							</tr>
					 
			<tr>  <td> </td><td ><input type="hidden" name="changePasswordSubmit" id="changePasswordSubmit" value="Change Password Submit" />
								<input type="submit"  value=" Change Password " class="fields marginbottom5px" style="cursor:pointer;" /></td></tr>
			
						</table>
				</form>
					
			 
</div>
				
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

</div>
 

<? include('aaBottom.php')?>