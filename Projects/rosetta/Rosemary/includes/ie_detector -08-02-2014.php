<style type="text/css">
.ieFallBackSavor{
    position:absolute;
    top:0;
    left:0;
    width:100%;
}

.ieSavorContent{
    
    width:450px;
    height:500px;
    background:#fff;
    border:#ccc 10px solid;    
	position:absolute;
	top:0;
	left:0;
}

.windowHead{    
    background:#666;
    padding:5px 10px 5px 10px;
    height:30px;
}

.windowHead h3{
    font-size:14px;
    font-weight:bold;
    margin:0;
    color:#fff;
    font-family:Arial;
    float:left;
    width:350px;
    height:30px;
    margin-top:10px;
}

.windowHead button{
    float:left;
    margin-top:7px;
    background:#fff;
    font-size:12px;
    border:none;
    padding:5px;
}

.ieFallBackSavor .content{
    
    font-family:Arial;
    font-size:14px;
    color:#666666;
    padding:20px;
    line-height:22px;
    
}

ul.browserList{
width:350px;
height:70px;
margin:50px 0 0 16px;
padding:0;
}

ul.browserList li{
float:left;
width:86px;
height:100px;
text-align:center;
border-left:1px dashed #ccc;
list-style-type:none;
background:url(images/browser_logo_sprite.jpg) no-repeat;
}

ul.browserList li.chrome{
background-position:0px 20px;
}

ul.browserList li.safari{
background-position:-82px 20px;
}

ul.browserList li.ff{
background-position:-239px 20px;
}

ul.browserList li.ie{
background-position:-158px 20px;
}

ul.browserList li.first{
border-left:none;
}

ul.browserList li a{
font-size:12px;
display:block;
width:86px;
height:100px;
text-decoration:none;
color:#222;
line-height:14px;
}

a.noThanks{
text-decoration:none;
font-size:14px;
font-weight:bold;
background:#026862;
color:#fff;
padding:10px;
float:left;
margin-top:60px;
margin-left:80px;
}

a.noThanks:hover{
background:#666;
}

.ieShadow{
background:#000;
width:1280px;
height:1280px;
}

</style>
<div class="ieFallBackSavor">
        <div class="ieShadow"></div>
        <div class="ieSavorContent">        
            <div class="windowHead">
                <h3>Did you know that your browser is out of date?</h3>
                <button>Close</button>
            </div>
            
            <div class="content">
                <p>To get the best possible experience using our website we recommend that you upgrade to a newer version or other web browser. A list of the most popular web browsers can be found below.</p>
                <ul class="browserList">
                    <li class="first ie"><a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">Internet Explorer 8+</a></li>
                    <li class="ff"><a href="http://www.mozilla.org/en-US/firefox/new/">Firefox 3.6+</a></li>
                    <li class="safari"><a href="http://www.apple.com/safari/">Safari 9.5+</a></li>
                    <li class="chrome"><a href="http://www.google.com/chrome">Chrome 2.0+</a></li>
                </ul>
                
                <a class="noThanks" href="#">No thanks! Leave it for now</a>
                
            </div>       
        </div>    
</div>

<script type="text/javascript">
$('.navigationEnvelop').prependTo('.fatherContainer');
function commonShowOverlay(configuration){
				
				var alignmentFunction=null;
				
				alignmentFunction = function(){
					var W,H,wH,wx,hx,left,top;
					W = $(window).width();
					H = $(document).height();
					wH = $(window).height();
					
					
					left = (W-configuration.content.width())/2;
					top = (wH-configuration.content.height())/2;
					
					configuration.shadow.css('width',W);
					configuration.shadow.css('height',H);
					configuration.shadow.css('opacity',0.8);
					
					configuration.content.css('left',left);
					configuration.content.css('top',top);
					
					configuration.closeButton.click(function(){ configuration.container.remove(); });
					configuration.shadow.click(function(){ configuration.container.remove(); });
					configuration.container.css('z-index',9999999999999999);
					//alert(left);
				};
				alignmentFunction();
				
			}
commonShowOverlay({ container:$('.ieFallBackSavor'),closeButton:$('.windowHead button,a.noThanks'), content:$('.ieFallBackSavor .ieSavorContent:first'), shadow:$('.ieFallBackSavor .ieShadow') });
</script>