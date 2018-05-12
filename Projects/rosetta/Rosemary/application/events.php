<div class="container">
    <ul class="event-list">
    	<? $allEvents=$os->getMe("SELECT * FROM events WHERE eventId>0");?>
        <? foreach($allEvents as $event){?>
        
        <li class="clearfix">
        <div class="image"><img src="<? echo $site['url']."/".$event['image'];?>"/></div>
        <div class="right_containt">
            <h3><? echo $event['title'];?></h3>
            <h4> <i class="fa fa-map-marker"></i> <? echo $event['venu'];?></h4>
            <div class="date_time"> <i class="fa fa-calendar-o"></i> <? echo date('l F d, Y ', strtotime($event['dated']));?> <!--<i class="fa fa-clock-o"></i>--> <? //echo date('g:i A', strtotime($event['dated']));?></div>
            <p><? echo $event['details'];?></p>
        </div>
        </li>
        
		<? }?>
    </ul>
</div>