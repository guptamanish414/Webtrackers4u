<?php
if($_POST['changePasswordSubmit']=='Change Password Submit')
{
	$data=array('password' => addslashes(trim($_POST['newPassword'])));
	
	$IdWhere=" id=".$os->userDetails['id'];
	$userDetails=$os->getT('admin','',$IdWhere);
	$userDetails=$userDetails[0];
	$msg='';
	if($userDetails['password']==addslashes(trim($_POST['oldPassword'])))	
	{
		$os->saveR('admin',$data,'id',$userDetails['id']);
		$msg='<span class="success_msg">Successfully Changed.</span>';
	}	
	else
	{
		$msg='<span class="error_msg">Wrong Old Password.</span>';
	}
}
?>