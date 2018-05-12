<?php

include('includes/config.php');
include('topBlank.php');
?>
<?php if(!$os->isLogin()){ ?>
<table height="500" width="100%" >
<tr><td align="center" valign="middle">

<form action="" id="loginForm" method="post">
<div class="lg_bg">


<table width="400" border="0" cellspacing="0" cellpadding="3">
     <tr>
	 <td style="padding-left:5px;"><img src="<?php echo $site['url'] ?>image/loginlogo.png" alt="" width="65" height="40"  style="margin:0 0 0 0px; border:none;"/></td>
    <td height="50" colspan="3"  valign="middle" >
	
	<span class="adm"><?php echo $site['siteTitle'];?></span> </td>
    </tr> 
   
   <tr>
    <td colspan="3" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#6c6a6a;"><!--INTEGRATE ELECTRONIC HEALTH RECORD AND PRACTICE MANAGEMENT SOFTWARE--></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top" style="color:#0099FF; font-size:14px; padding:0 0 0 35px;"></td>
  </tr>
     
  
  
  <tr>
    <td width="55">&nbsp;</td>
    <td width="80" align="center" style="font-family:'Times New Roman', Times, serif; font-size:13px; color:#000;">User Name</td>
    <td width="256"><input type="text" class="textbox" name="username" value="" /></td>
    <td width="1">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center" style="font-family:'Times New Roman', Times, serif; font-size:13px; color:#000;">Password</td>
    <td><input type="password" class="textbox" name="password" value="" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" height="30"><div class="ok" style="cursor:pointer;" onclick="document.getElementById('loginForm').submit()">login</div></td>
    <td width="30%" height="30"><div class="cancel"></div></td>
    <td width="42%" height="30"><div class="selet"></div></td>
  </tr>
</table></td>
    <td height="35">&nbsp;</td>
  </tr>
  
  <tr >
  
  <td style="padding-top:15px;">
  
  <a href="http://webtrackers.co.in/" title="Powered By Webtrackers4u" target="_blank">
	<img src="<?php echo $site['url'] ?>image/poweredBywebtrackers4u.png" alt="" width="30"   style="margin:0 0 0 5px; border:none;"/></a>
  </td>
  
    <td colspan="2" align="center" style="padding-top:15px;font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#666666;">Copyright &copy; 2011 <?php echo $site['siteTitle'];?> All rights reserved</td>
    </tr>
</table>

	  <div></div>
	
	</div>

<input type="hidden" name="SystemLogin" value="SystemLogin"/>
			<!--<input type="submit" class="loginbtn" value="" />-->

</form>	

</td></tr></table>

<?php } ?>


<?php if($os->isLogin()){

?>
<script type="text/javascript" language="javascript">
  var p="<?php echo $site['url'].'dashBoard.php'?>";
	//open(p, 'popUpWin44', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+1200+',height='+700+',left='+50+', top='+50+',screenX='+50+',screenY='+50+'');

	window.location="<?php echo $site['url'].'dashBoard.php'?>";

</script>
 

<?php } ?>

	</body>
	</html>