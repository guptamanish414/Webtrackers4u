<?php

include('includes/config.php');

include('aaTop.php'); 

 

?>

 <div class="btnStyle ViewPort">

<div class="pageHead organizer">Dashboard</div>

<style>

 

.organizerDiv{ width:300px; border:1px solid #CCCCCC; height:120px; margin:10px; padding-left:10px; float:left;}

.organizerHead{ color:#660099; font-size:16px; font-style:italic; font-weight:bold;}



.organizerDiv td{ padding-left:5px; width:70px;}



</style>

 <?  

 

 $queryT=" select count(*) cc from property where type='Rent'  ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalPropertyRent=$qrs['cc'];

  $queryT=" select count(*) cc from property where type='Buy'  ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalPropertySales=$qrs['cc'];

 $totalProp=$totalPropertyRent+$totalPropertySales;

 

 $queryT=" select count(*) cc from member  ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalApplicant=$qrs['cc'];

 

 

  $queryT=" select count(*) cc from member  where status!='OTS' and memberType like'%Prospective%' ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalApplicantProspective=$qrs['cc'];

 

  $queryT=" select count(*) cc from member  where status!='OTS' and memberType like'%Existing%' ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalApplicantExisting=$qrs['cc'];



 

 $queryT=" select count(*) cc from member where status='OTS'   ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalVendor=$qrs['cc'];

 

 

 $nows=date('Y-m-d 00:00:00');

 $queryT=" select count(*) cc from appo  where appoDate=' $nows' and duration>0 and  appoStatus!='Cancelled'  ";

 $qrs=$os->mq($queryT);

 $qrs=$os->mfa($qrs);

 $totalappo=$qrs['cc'];

  

  

  

 $dates =date('Y-m-d 00:00:00');;

 $wheres=" nextCall='$dates' " ;

 $listingQuery=" select count(*) cc from  member where  $wheres  ";

 $qrs=$os->mq($listingQuery);

 $qrs=$os->mfa($qrs);

 $totalFollowup=$qrs['cc'];

  



  

 $applicant['Total']['Sales']=$totalApplicant;

 $applicant['Total']['Lettings']= '0';

 $applicant['Tocall']['Sales']='0';

 $applicant['Tocall']['Lettings']='0';

 $applicant['Removal']['Sales']='0';

 $applicant['Removal']['Lettings']='0';

 

 

 $properties['Total']['Sales']=$totalPropertySales;

 $properties['Total']['Lettings']=$totalPropertyRent;

 $properties['Tocall']['Vendor']=$totalVendor;

 $properties['Tocall']['Landlords']='0';

 $properties['Deals']['Offers']='0';

 $properties['Deals']['Tenancies']='0';

 

 $todo['diary']['today']= $totalappo;

 $todo['diary']['followup']=$totalFollowup;

 

 

 ?>

 <style>

 .btnaao{ float:left; margin:30px; height:47px;}

 .cc{ font-size:16px; color:#FF0000;}

 </style>

<table class="calender"  cellspacing="0" cellpadding="0" width="100%" style="border:1px solid #E2E2E2; color:#787878">



<tr>

<td> 

 



<a class="abtnaa" href="<?php echo $site['url'] ?>aadiary.php" ><div class="btnaa  diary btnaao">Diary <br /> <span class="cc"><? echo $todo['diary']['today'] ?></span></div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>aafollowcall.php" ><div class="btnaa  followcall btnaao">Followup  <br /> <span class="cc"><? echo $todo['diary']['followup'] ?></span></div></a>



 

<a class="abtnaa" href="<?php echo $site['url'] ?>aaaplicant.php?memberType=Prospective" ><div class="btnaa  applicants btnaao">Prospective Tenant<br /> <span class="cc"><? echo $totalApplicantProspective ?></span></div></a>

<a class="abtnaa" href="<?php echo $site['url'] ?>aaaplicant.php?memberType=Existing" ><div class="btnaa  applicants btnaao">Existing Tenant<br /> <span class="cc"><? echo $totalApplicantExisting ?></span></div></a>





<a class="abtnaa" href="<?php echo $site['url'] ?>aaproperty.php" ><div class="btnaa  property btnaao">Property  <br /> <span class="cc"><? echo $totalProp?></span></div></a>



 

 

</tr>

  <tr>

  <td> 

  

  

  

  <!-- ttttt    -->

  <? 

 $queryT=" select count(*)  cc , DATE_FORMAT(appoDate, '%b-%Y') appoD, DATE_FORMAT(appoDate, '%Y%m') appoDM   from appo  where duration>0 and  appoStatus!='Cancelled'  group by appoD    order by CAST(appoDM AS DECIMAL ) asc limit 12 ";

 $qrs=$os->mq($queryT);



 

 

 ?>

  <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <script type="text/javascript">



      

      google.load('visualization', '1', {'packages':['corechart']});

 

      google.setOnLoadCallback(drawChart);



    

      function drawChart() {

 

        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Month');

        data.addColumn('number', 'Appointment');

        data.addRows([

		<? while( $rs=$os->mfa($qrs)){?>

 ['<? echo $rs['appoD']  ?>', <? echo $rs['cc']  ?>],

  

<?  } ?>

          

        ]);



      

        var options = {'title':'Appointment History',

                       'width':'100%',

                       'height':300

					   



					   

					   };



        

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

        chart.draw(data, options);

      }

    </script>

	<div style=" padding:0px 0px 0px 10px;">

<div id="chart_div"></div>

</div>



  <!-- ttt -->

  

  <?  if($notnecessery){ ?>

  

  <div class="organizerDiv">

  <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td colspan="3"><span class="organizerHead">To Do</span></td>

   

  </tr>

  <tr>

    <td>Diary</td>

    <td><a href="<? echo $site['url']?>aadiary.php"> <? echo $todo['diary']['today'] ?> Today </a></td>

    <td><a href="<? echo $site['url']?>aafollowcall.php"> <? echo $todo['diary']['followup'] ?> Followup </a></td>

  </tr>

  

</table>



  </div>

  

  

  <div class="organizerDiv">

  <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td colspan="3"><span class="organizerHead">Applicant</span></td>

    

  </tr>

  <tr>

    <td>Total</td>

    <td><a href="<? echo $site['url']?>aaaplicant.php"> <? echo $applicant['Total']['Sales'] ?> Sales </a></td>

    <td><a href="<? echo $site['url']?>aaaplicant.php"> <? echo $applicant['Total']['Lettings'] ?> Lettings </a></td>

  </tr>

   

  

</table>



  </div>

   

 

  <div class="organizerDiv">

  <table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1">

  <tr>

    <td colspan="3"><span class="organizerHead">Properties</span></td>

    

  </tr>

  <tr>

    <td>Total</td>

    <td><a href="<? echo $site['url']?>aaproperty.php"> <? echo $properties['Total']['Sales'] ?> Sales </a></td>

    <td><a href="<? echo $site['url']?>aaproperty.php"> <? echo $properties['Total']['Lettings'] ?> Lettings </a></td>

  </tr>

  <tr>

    <td>To Call </td>

    <td><a href="<? echo $site['url']?>aaproperty.php"> <? echo $properties['Tocall']['Vendor'] ?> Vendor </a></td>

    <td><a href="<? echo $site['url']?>aaproperty.php"></a></td>

  </tr>

   

</table>



  </div>

  <?  } ?> 

  

  </td>

    <td>&nbsp;</td>

  

  

  </tr>

 

</table>

<div style="margin:8px;">

 <div id="curve_chart" style="width: 900px; height: 200px"></div>

 </div>

 



</div>



<? include('aaBottom.php')?>