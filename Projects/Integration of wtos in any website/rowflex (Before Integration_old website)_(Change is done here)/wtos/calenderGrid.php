<?php
include('includes/config.php');
include('top-inner.php');
$primeryTable='alerts';
 $f_dated= $os->setNget('sDate',$primeryTable);
	$t_dated= $os->setNget('eDate',$primeryTable);
   $anddated=$os->DateQ('executionDate',$f_dated,$t_dated,$sTime='00:00:00',$eTime='59:59:59');
$queryD=" select alertsId ,	alertType ,	a.title ,	bookedDate 	,bookedBy ,	executeBy ,	executionDate, 	duration ,	startTime 	,endTime, 	appoStatus, 	folloStatus ,	a.note 	,	ampm ,DATE_FORMAT(executionDate, '%d-%m-%Y') d , firstName, lastName from $primeryTable a, member m where alertsId>0  $anddated and m.memberId=a.memberId    order by executionDate asc,ampm asc, startTime desc  ";
  
  
  
  
  
  
  
  
  $queryRsD=$os->mq($queryD);
   while($recordD=$os->mfa($queryRsD))
   {
    $rec[$recordD['d']][]=$recordD;
    

   }
   
 
   if(count($rec>0))
   {
   
   ?>
   <style>
   .appGrid{ height:60px; width:100px; margin:0px; padding:2px; margin:2px; background:#FEEAE2;border-right:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;}
   .followGrid{ height:60px; width:100px; margin:0px; padding:2px; margin:2px; background:#DAF8F1;border-right:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;}
   
   .calgrid{ border:1px solid #CCCCCC;}
   .calgrid td{ border-right:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;}
   
   .dayText{ color:#666666; font-size:14px; font-weight:bold;}
   </style>
   
   
   <table border="0" cellspacing="0" cellpadding="0" class="calgrid">
   <tr>
     <? foreach($rec as $day=>$dateRec){?>
               <td ><span class="dayText"><? echo $day ?></span></td>
    <? } ?>
	
	 
  </tr>
  
  
  
  <tr>
     <? foreach($rec as $day=>$dateRec){?>
               <td valign="top">
			   
			   
			    <?  if(count($rec>0))
   {
   
   foreach($dateRec as $dateData){
   
   $gridCss='followGrid';
   if( $dateData['alertType']=='Appointment' )
   {
   $gridCss='appGrid';
   }
  
   ?>
    
   <div class="<? echo $gridCss;  ?>"> 
   
  <!-- <? echo $dateData['alertType'] ?>  <br />-->
   <? echo $dateData['firstName'] ?>  <? echo $dateData['lastName'] ?>  <br />  
    <? echo $dateData['startTime'] ?>   <? echo $dateData['ampm'] ?>  <br />
   
   
   <?  if( $dateData['alertType']=='Appointment' )  {  ?>
   
   
    <?php $os->changeStatusDD($os->appoStatus,$dateData['appoStatus'],'alerts','appoStatus','alertsId',$dateData['alertsId'],' style="width:200px;border:none"');?>
    <?  // echo  $dateData['appoStatus'] ?>  
   <? } else {?>
   <?php $os->changeStatusDD($os->folloStatus,$dateData['folloStatus'],'alerts','folloStatus','alertsId',$dateData['alertsId'],' style="width:200px;border:none"');?>
    <? // echo $dateData['folloStatus'] ?>  
   <? } ?>
   
    
   
   
   </div>
   
	
	<? } 
	} ?>
			   
			   
			   
			   
			   </td>
    <? } ?>
	
	 
  </tr>
  

</table>
   
   
   
  <?  
   
   
   }
   
   ?>
    <script>
	
		
	 dateCalander();
	
	</script>
	
    
   
	<? include('bottom-inner.php')?>
