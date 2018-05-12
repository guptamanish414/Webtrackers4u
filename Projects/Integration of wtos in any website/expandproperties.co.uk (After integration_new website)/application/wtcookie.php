<? 

global $site,$os;
$ok=true;
$oks=false;

?>
<? if($oks){ ?><script src="<? echo $site['url'] ?>wtcookie/jquery-2.1.3.min.js"></script> <? } ?>
<? if($ok){ ?><link rel="stylesheet" type="text/css" href="<? echo $site['url'] ?>wtcookie/jquery-eu-cookie-law-popup.css"/> <? } ?>
<? if($ok){ ?><script src="<? echo $site['url'] ?>wtcookie/jquery-eu-cookie-law-popup.js"></script><? } ?>
<? if($oks){ ?><link rel="stylesheet" type="text/css" href="<? echo $site['url'] ?>wtcookie/demo.css"/><? } ?>
<script>

$(document).ready( function() {
	if ($(".eupopup").length > 0) {
		$(document).euCookieLawPopup().init({
			'info' : 'YOU_CAN_ADD_MORE_SETTINGS_HERE',
			'cookiePolicyUrl' : '<? echo $site['url'] ?>cookiepolicy',
			'popupTitle' : 'This website is using cookies.',
			'popupText' : 'We use them to give you the best experience. If you continue using our website, we\'ll assume that you are happy to receive all cookies on this website.'
		});
	}
});

$(document).bind("user_cookie_consent_changed", function(event, object) {
	console.log("User cookie consent changed: " + $(object).attr('consent') );
});
</script>




<? if($ok){ ?><div class="eupopup eupopup-top eupopup-style-compact"></div><? } ?>

  