<?php
include('includes/config.php');
include('aaTop.php'); ?>


<div class="pageHead wtpound"> Rent Detail  </div>
<div style="background-color:#FFFFFF; width:1344px; height:800px; float:left; padding:5px;">
 <iframe id="listrents" src="" frameborder="0" width="100%" height="100%" class="margzero"></iframe>	
 
 <script>
 
   var listrents='aarents.php?hideTopLeft=1&rentMonths=<? echo date('m');?>&rentYears=<? echo date('Y');?>';
	 os.getObj('listrents').src=listrents;
 </script>
 
 
 
 
 
  
 
 
 
 
 
  </div>

<? include('aaBottom.php')?>