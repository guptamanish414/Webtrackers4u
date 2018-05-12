<?php
include('includes/config.php');
include('top.php');

// config 


?>

	<table class="container">
				<tr>
					<td   class="leftside">
						
				  
						
						<?php  include('osLinks.php'); ?>
					</td> 
			  <td   class="middle" style="padding-left:5px;">
			  <br />
			    &nbsp; &nbsp;<input type="button" value="Prev Week" onclick="setWeek('P')" />
			  From <input type="text" name="sDate" id="sDate" class="dtpk textbox " value="<? echo $os->viewToday();?>"  style="width:70px;" />  &nbsp;
			   To <input type="text" name="eDate" id="eDate" class="dtpk textbox " value="<? echo $os->viewNextWeek();?>"  style="width:70px;"  /> 
			   &nbsp; &nbsp;<input type="button" value="VIEW" onclick="drawGrid()" />
			     &nbsp; &nbsp;<input type="button" value="Next Week" onclick="setWeek('N')" />
			   
			   <br /> <br />
			 <iframe id="calenderFrame" src="<? echo $site['url']?>calenderGrid.php?sDate=01-07-2015&eDate=05-07-2015" frameborder="0" width="800" height="400" class="margzero"></iframe>	
			  
			  
			  
			  
			 
			  </td>
			  </tr>
			</table>


				<script>
				 dateCalander();
				</script>	

   
	<? include('bottom.php')?>