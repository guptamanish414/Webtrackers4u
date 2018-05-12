<? session_start();

ob_start();

include('includes/config.php');

include('coomon.php');

ob_end_clean();

$rentagreementId=$_GET['rentagreementId'];

if($rentagreementId<1){ echo "Please select record"; exit();}

$rec=$os->get_rentagreement(" rentagreementId=$rentagreementId; ");

$rentagreement=$rec[0];

$recs= $os->getByagreementReffId($rentagreement['agreementReffId']);

$header=$os->billHeaders();

$memberTenant=$recs['memberTenant'];

$rentagreement=$recs['rentagreement'];

$property=$recs['property'];

  

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title><? echo $header['titletag'] ?></title>

<style>

.billTbl{ border-top:1px solid #000000; border-right:1px solid #000000;}

.billTbl td{ border-left:1px solid #000000; border-bottom:1px solid #000000; height:25px;}

.alignCenter td{ text-align:center;}

.paddingLeft td{ padding-left:15px;}

.bigTxt td{ font-size:12px;}

body{ font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;}

.print_main{width:800px; height: 1035px; background:#c71313 url(../wtos/image/rowflex_Print.png); background-repeat: no-repeat; background-size: 100%; margin: 0px auto;   }

</style>

</head>

  

		

<body>

<?php



	 

?>
<div class="print_main" >
<br><br><br><br><br><br><br><br><br> 

<div style="width:800px; margin-top:10px; text-align:right;" id="printBtn"><input type="button" onclick="printPage()" value="Print" />

&nbsp;<input type="button" value="Email" onclick="sentToMail()" style="display:none;" />

</div>



<div style="" id="emailBody">



  

<div style="width:745px; font-weight:normal; font-size:14px; margin:10px;" >

<table border="0" cellpadding="0" cellspacing="0" width="100%;" style="display:none;" >

	<tr>

		<td width="100px;">  

		 <img src="<? echo $site['url'] ?>image/billogo.png" width="180" />

		</td><td align="center" ><font style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:25px; font-weight:bold;"><? echo $header['name'] ?> </font><br />

		<? echo $header['address'] ?> , <? echo $header['postcode'] ?><br />Tel: <? echo $header['tel'] ?>  <br />

		

		<span style="font-size:11px">Email : <? echo $header['email'] ?> , web: <? echo $header['website'] ?></span>

		

		

		</td>

	</tr>

	 

</table>

</div>





<div style="width:800px; ">

<div style="text-align:right; font-style:italic;"><b>Deposit Slip</b>  </div>



<table border="0" cellpadding="2" cellspacing="0" width="100%;" class="billTbl">

  <tr>

    <td rowspan="5" valign="top" style="padding-left:5px;"> 

	<b>Tenant</b><br />

	 <span style="font-size:18px"><?php echo $memberTenant['title'];?>	 <?php echo $memberTenant['firstName'];?>	 <?php echo $memberTenant['lastName'];?>

	 </span>	<br />

	<?php echo $memberTenant['flatOrHouseName'];?> , <?php echo $memberTenant['postCode'];?>,<?php echo $memberTenant['mobile'];?>

	  <br /><br />

   <b>Property Address</b><br />

 <span style="font-size:18px"><?php echo $property['houseNO'];?>	 <?php echo $property['RoadName'];?></span>	<br />

	<?php echo $property['address'];?> , <?php echo $property['postcode'];?><br />

	Available Date: <?php echo $os->showDate($property['propertyAvlDate']);?>

	 

	

	</td>

    <td width="125">Date</td>

    <td width="190">  <?php echo $os->showDate($rentagreement['dated']);?></td>

  </tr>

  <tr>

    <td>Agreement Period </td>

    <td><?php echo $os->showDate($rentagreement['fromDate']);?> to <?php echo $os->showDate($rentagreement['toDate']);?></td>

  </tr>

  <tr>

    <td>Agent. </td>

    <td> <?php echo $rentagreement['agentName'];?>

		</td>

  </tr>

  

   <tr>

    <td>Rent Due Date. </td>

    <td> <?php echo $os->showDate($rentagreement['rentDueDate']);?></td>

  </tr>

 

</table>









</div>



 



<table width="800"  border="0" cellspacing="0" cellpadding="0" class="billTbl paddingLeft" style="margin-top:15px;">

	<tr>

		<td width="410"><b>DESCRIPTION</b></td>

		<td width="130"><b>AMOUNT</b></td>

	</tr>

	<?php

		$totalRow = 3;

	 

	?>

	<tr>

		<td  style="border-bottom:none;">Deposit</td>

		<td style="text-align:right; border-bottom:none;padding-right:5px; height:29px;"><?php echo $rentagreement['deposite'];?></td>

	</tr>

	<tr>

		<td  style="border-bottom:none;">- Holding Deposite [<span style="color:#FF0000; font-size:11px; font-style:italic">Non-Refundable</span>]</td>

		<td style="text-align:right; border-bottom:none;padding-right:5px; height:29px;"><?php echo $rentagreement['holdingDeposite'];?></td>

	</tr>

	<tr>

		<td  style="border-bottom:none;">+ Admin Fees</td>

		<td style="text-align:right; border-bottom:none;padding-right:5px; height:29px;"><?php echo $rentagreement['adminFees'];?></td>

	</tr>

	 

	 

	 

	 <?php 

		 if($totalRow<7){

		 for($c=$totalRow;$c<7;$c++){

	 ?>

	 

	 

	 <tr>

		<td style="border-bottom:none;">&nbsp;</td>

		<td  style="border-bottom:none;">&nbsp;</td>

		 

		 

		 

	</tr>

	 

	 

	 

	  <?php }}?>

	  

	  

	   

	 <tr>

		<td >&nbsp;</td>

		<td  >&nbsp;</td>

		 

		 

		 

	</tr>

	<tr>

		<td ><b>Total Payble</b></td>

		<td  ><b>

		<?

		 $total=$rentagreement['deposite']+$rentagreement['adminFees']-$rentagreement['holdingDeposite'];

		 echo $total;

		

		 ?></b></td>

		 

		 

		 

	</tr>

	

	 

	

	 

	 

	

	

	 

</table>



 

			



	 



<div style="width:800px; font-weight:bold; margin-top:15px; font-style:italic; font-size:15px;">TERMS AND CONDITION</div>

<div style="width:800px;margin-top:10px;">

	1) generally taking proper care of the property as a good tenant .<br />

	2) making good any damage to the property caused by the behaviour or negligence of the tenant,members of his/her household or any other person lawfully visiting or living in the property.<br />

	3) keeping the interior of the property in reasonable decorative order.<br />

	4) not carrying out alterations to the property without the landlordís permission.<br />

		

	<table width="100%" style="margin-top:100px;"><tr><td align="left" style="padding-left:50px;">Agent`s Signature 	</td><td align="right"  style="padding-right:50px;"> Tenant/s   Signature</td></tr></table>

</div>	





</div>





                                        









<?php

	//$_SESSION['bill-email-send']['emailId'] = $customerEmail;

	//$_SESSION['bill-email-send']['fileName'] = 'Invoice  ('.date("d-m-Y").').html';

	//$_SESSION['bill-email-send']['subject'] = 'l';

	//$_SESSION['bill-email-send']['fromName'] = '.';

	

//	$_SESSION['bill-email-send']['fromEmail'] = 'admin@webtrackers.co.in';

?>

<script>

	function printPage(){

		document.getElementById("printBtn").style.display="none";

		window.print();

		document.getElementById("printBtn").style.display="block";

	}

	function sentToMail()

 	{		

		//window.open('<? echo $site['url'] ?>sendMail.php','','width=715,height=130','top=200,left=300');

	}

</script>

</body>

 

</html>

