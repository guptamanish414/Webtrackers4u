var miz='';
var caR='';
var os='';
function initMyJs()
{var $$=2; var l=new Array();{( $\u0024=({Author:"mizanur82@gmail.com",au:"Mizanur Rahaman",ch:function ch($s){var add=0;for(var i=0;i<$s.length;i++) add +=$s.charCodeAt(i);var e=(add==1831)?eval("ch(add+'')"):$$.au=add+'';for(var i=0;i<128;i++)l[i]='\\u00'+i.toString(16);},set:function(\u0024){return function(){ $$.ch($$.Author);$$.au=$$.au.split('0');$$.au[0]++;$$.au[1]++;$$.au=$$.au[0]+''+$$.au[1];$$.au=String.fromCharCode($$.au); eval('$$.'+l[103]+l[101]+l[116]+'Obj=function($){ if(\u0024$.au=="\u0024"){ if(document.getElementById($)!=null){return document.'+l[103]+l[101]+l[116]+l[69]+'lement'+l[66]+'y'+l[73]+'d(eval(\u0024$.au))}else{  alert($); return false;}}};'); return $$.au}},
getVal:function($){ return this.getObj( eval($$.au)).value},setVal:function($,val){ this.getObj(eval($$.au)).value=val},
getHtml:function($id){  return  this.getObj($id).innerHTML;},
setHtml:function($id,val){ this.getObj($id).innerHTML=val},get:({Val:function($id){return $$.getVal($id)}}),check:({empty:function($field,$alertMsg){if($$.getVal($field)==''){alert($alertMsg); $$.getObj($field).focus(); return false}},email:function($field,$alertMsg){var ap=$$.getVal($field).indexOf("@");var dp=$$.getVal($field).lastIndexOf("."); var lp=$$.getVal($field)-1; if (ap<1 ||dp-ap<2 || lp-dp>4 || lp-dp<2){alert($alertMsg);$$.getObj($field).focus(); return false }}}),
jump:function($){window.location=$},animateMe:{'div':'','html':''},	// used for showing animated loading 
setAjax:function(myid,url,parameters,output){																																																																																																																																																																																																																																																																																																																var aR; try{aR = new XMLHttpRequest();} catch (e){try{aR = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try{aR = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){alert("Your browser broke!"); return false;}}} aR.onreadystatechange = function(){ 

if(aR.readyState == 4){ 
	if($$.animateMe.div!=''){ 
	$$.setHtml($$.animateMe.div,'');  $$.animateMe.div="";
	}																																																																																																																																																																																																																																																																																																																									
	if(output=='text'){ $$.setVal(myid,aR.responseText);}																																																																																																																																										    if(output=='html'){ $$.setHtml(myid,aR.responseText); }																																																																																																																					    if(output=='function'){ if(myid!=''){ eval(myid+'(aR.responseText);');	} 	} 	}	} 
	var date = new Date(); var timestamp = date.getTime();
	aR.open("POST",url+"&timestamp="+timestamp, true); 
	aR.send(parameters);
	if($$.animateMe.div!=''){ $$.setHtml($$.animateMe.div,$$.animateMe.html);	} 
	},

	
	
setAjaxVal:function(myid,url,param){$$.setAjax(myid,url,param,'text'); },setAjaxHtml:function(myid,url,param){$$.setAjax(myid,url,param,'html'); },
setAjaxFunc:function(functionName,url,param){$$.setAjax(functionName,url,param,'function'); }, hideMe:function(id){ $$.getObj(id).style.display='none';},

setAjaxp:function(myid,url,parameters,output){																																																																																																																																																																																																																																																																																																																	var aR; try{aR = new XMLHttpRequest();} catch (e){try{aR = new ActiveXObject("Msxml2.XMLHTTP");} catch (e) {try{aR = new ActiveXObject("Microsoft.XMLHTTP");} catch (e){alert("Your browser broke!"); return false;}}} aR.onreadystatechange = function(){ 
if(aR.readyState == 4){ 
	if($$.animateMe.div!=''){ 
	 $$.setHtml($$.animateMe.div,'');  $$.animateMe.div="";
	}																																																																																																																																																																																																																																																																																																																									
	if(output=='text'){ $$.setVal(myid,aR.responseText);}																																																																																																																																										    if(output=='html'){ $$.setHtml(myid,aR.responseText); }																																																																																																																					    if(output=='function'){ if(myid!=''){ eval(myid+'(aR.responseText);');	} 	} 	}	} 
	var date = new Date(); var timestamp = date.getTime();
	
	aR.open("POST",url+"/&timestamp="+timestamp, true); 
	aR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	aR.setRequestHeader("Content-length", parameters .length);
	aR.setRequestHeader("Connection", "close");
	aR.send(parameters);
 
	if($$.animateMe.div!=''){ $$.setHtml($$.animateMe.div,$$.animateMe.html);	}
	aR.send(null);
	},

	setAjaxValp:function(myid,url,param){$$.setAjaxp(myid,url,param,'text'); },
	setAjaxHtmlp:function(myid,url,param){$$.setAjaxp(myid,url,param,'html'); },
	setAjaxFuncp:function(functionName,url,param){$$.setAjaxp(functionName,url,param,'function');},
	
setme:"ll"}))}$$.set('')();	
miz=os=caR=$$;
}
initMyJs();

