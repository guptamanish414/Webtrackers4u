<script>
		$.fn.modal = function(){
		var th = $(this);
		$('button, a').on('click', function(e){
		//e.preventDefault();
		
		if($(this).attr("href") == ('#'+th.attr('id')) ){
		th.toggle();
		}
		});
		
		};
		
		
</script>
<style>
				
.modal_window_class{
    display: none;
    background:#fff;
    
    margin:auto;
    position:fixed;
    top:20%;
    width:50%;
      -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
    box-shadow:0 3px 7px rgba(0,0,0,.25);
    -moz-box-shadow:0 3px 7px rgba(0,0,0,.25);
    -webkit-box-shadow:0 3px 7px rgba(0,0,0,.25);
    box-sizing:border-box;
    -moz-box-sizing:border-box;
    -webkit-box-sizing:border-box;
    z-index: 5000;
    padding: 0;}
	 
 
 
.modal_heading{
   background:#F7F7F7;
    border-bottom: 1px solid #e7e7e7;
    border-radius: 5px 5px 0 0;
    -moz-border-radius: 5px 5px 0 0;
    -webkit-border-radius: 5px 5px 0 0;
    padding: 10px;
}
.modal_heading h2{
    margin: 0px;
}
.modal_content{
    padding: 5px;
	/*height:60%;*/
	/*overflow-y:scroll;
	overflow-x:hidden;*/
}
 
.modal_footer{
    background:#F7F7F7;
    border-top: 1px solid #e7e7e7;
    border-radius: 5px 5px 0 0;
    -moz-border-radius: 5px 5px 0 0;
    -webkit-border-radius: 5px 5px 0 0;
    padding: 5px;
}

.modal_close{ float:right; margin:-20px 0px 0px 0px ; color:#FF0000;}
			
</style>

<!--
example 

<script>  $(document).ready(function(){	
$("#salesValuation").modal(); 
}); </script>

<div id="salesValuation" class="modal_window_class">
        <div class="modal_heading"><h2>Sales Valuation</h2> <a class="modal_close" href="#salesValuation">Close</a></div>
        <div class="modal_content">
            <p>This is the Modal Content Area.</p>
        </div>
        <div class="modal_footer">
        </div>
</div>
<a href="#salesValuation"><span id="create-user">Sales Valuation click her to view modal</span></a>

-->