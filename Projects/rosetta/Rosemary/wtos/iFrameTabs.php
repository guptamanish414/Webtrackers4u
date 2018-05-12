<style>
.iFrameTabs{ padding:5px 0px 0px 5px;} 
.tab{ float:left; width:100px; height:24px; font-size:12px; font-weight:bold; cursor:pointer; text-align:center; border:1px solid #CCCCCC; padding:2px 5px 0px 5px; 
background:#EEEEEE;   }
.tabs{float:left; width:100px;height:25px; font-size:12px; font-weight:bold; cursor:pointer; text-align:center; border:1px solid #CCCCCC; padding:2px 5px 0px 5px;  
 border-bottom:none;    }
 .lastTab{float:left; width:790px;height:25px; font-size:12px; font-weight:bold;  text-align:center; border:none;  
 border-bottom:1px solid #CCCCCC; background:#FFFFFF;  }
 
 
 
.tabText{   border:1px solid #CCCCCC; border-top:none;  padding:5px 0px 0px 5px;   } 
.iframeLink{ border:none; width:1100px; height:250px;}
</style>
<script>
var iframePK='';
var iframePKVAL='';
function saveFormData(params,table,pk,pkval)
{
	iframePK=pk;
	iframePKVAL=pkval;
	var url='ajxSysytemiFrame.php?iFrameAjaxSave=OK&table='+table+'&pk='+pk+'&pkval='+pkval+'&';
	os.animateMe.div='updatemsg';
	os.animateMe.html='Working....';
	os.setAjaxFuncp('setAjaxSaveMessage',url,params);
}
function setAjaxSaveMessage(data)
{
	var D=data.split('@@');
	var updatemsg=D[0];
	var iframePKVALajax=D[1]; 
	var iFe= document.getElementsByName('iF[]');
	var NewSrc=iframePK+'='+iframePKVALajax;
	var OldSrc=iframePK+'=0';
	
	if(parseInt(iframePKVAL)<1){   for (var i = 0; i < iFe.length; i++) { iFe[i].src=iFe[i].src.replace(OldSrc,NewSrc);    } }
	
	os.setHtml('updatemsg',updatemsg);
	os.show('iFrameTabs');
	setTimeout('removeupdatemsg()',5000);
}
function removeupdatemsg()
{
 os.setHtml('updatemsg','');
}

function openTab(tab)
{
	for(var i=1;i<=3;i++)
	{
		var tabId='tab'+i;
		var tabTextId=tabId+tabId;
		os.hide(tabTextId);
		os.getObj(tabId).className='tab';
	
	}
	var selectedText=tab+tab;
	
	os.show(selectedText);
	os.getObj(tab).className='tabs';
}
</script>