<? global $site; ?>
<div class="body_div_left">
			<div class="latest_bg">
				<div class="latest_text">Latest News</div>
			</div>
			<div class="latest_box">
				
				<? $os->News =$os->get_news("active=1 ",'',' 3'); 
				  
				   
				   if(is_array($os->News))
				   {
				   foreach($os->News as $val)
				   {
				?>
				
				<div style="padding-top:10px;">
					<div class="latest_text_sub"><?php echo $val['body']?> </div>
					<div class="latest_text_sa"><?php echo $val['newsdate']?></div>
				</div>
			
				<?  } } ?>
				
				
				
				<div style="padding-top:10px;">
					<div class="find_text">Find Us : </div>
					<div style="padding-top:10px;"><img src="<?php echo $site['themePath']?>images/pix01.png" width="232" height="155" />
<map name="Map" id="Map"><area shape="rect" coords="3,2,38,38" href="#" /><area shape="rect" coords="50,2,88,39" href="#" /><area shape="rect" coords="99,1,137,38" href="#" /></map></div>
				</div>
			</div>
		</div>