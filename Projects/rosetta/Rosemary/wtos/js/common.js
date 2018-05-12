var anyChanges=false;

miz.Confirm=function(msg)
{
 var p=confirm (msg);
 return p;
}
var dAjax=function(deBUG)
{
	alert(deBUG);
}
miz.show=function(id)
{
	
	miz.getObj(id).style.display='';
}
miz.hide=function(id)
{
	miz.getObj(id).style.display='none';
}

miz.rowOn=function(id)
	{
	  miz.getObj(id).className='selectDot' ;
	}

miz.rowOff=function(id,selected)
	{
		  var selectedId='dotDivId'+selected; 
		  if(selectedId!=id)
		  {
			 
		    miz.getObj(id).className='offDot' ;
		  }
		  else
		  {
			  
			 miz.getObj(id).className='onDot' ;  
		 }
	}
	
miz.rowOnFav=function(id)
	{
	  miz.getObj(id).className='selectDotFav' ;
	}

miz.rowOffFav=function(id,selected)
	{
		  var selectedId='dotDivId'+selected; 
		  if(selectedId!=id)
		  {
			 
		    miz.getObj(id).className='offDotFav' ;
		  }
		  else
		  {
			  
			 miz.getObj(id).className='onDotFav' ;  
		 }
	}	
	
	
	
	
miz.submitForm=function(formId)
{
   miz.getObj(formId).submit();	
}

miz.setAction=function(IdforEdit,action)
{
        miz.setVal('IdforEdit',IdforEdit);
		miz.setVal('actionOnId',action);
		miz.submitForm('ActionForm');
}

function setPvalues(destination,source)
{
	var t=document.getElementsByName(source); 
	var text='';
	for(i=0;i<t.length;i++)
	{
	   if(t[i].checked)
	   {
		   if(t[i].value>0)
		   {
		   text +=t[i].title+", ";
		   }
		
		}
	}
	miz.setVal(destination,text);
	
}

function isValueInArray(arr, val) 
	  {
	    inArray = false;
			  for (i = 0; i < arr.length; i++)
			  {
			  		  if (val == arr[i]){
			  			   inArray = true;
					  }
			  }
		 return inArray;
   
      }

function setDatepicker(Obj)
{
  $(Obj).datepicker({dateFormat: 'dd-mm-yy'});

}

function controlLatlong()
{
	 if(miz.getObj('Skiplatlonlookup').checked)
	 {
			//$('#TR_Latitude').show(); 
			//$('#TR_Longitude').show(); 
			$('#LatLong').show(500); 
			
				
	 }
	 else
	 {
			//miz.setVal('Latitude','');
			//miz.setVal('Longitude','');
			
			$('#LatLong').hide(500); 
			//$('#TR_Latitude').hide(); 
			//$('#TR_Longitude').hide(); 
	 
	 }
 
}

function closePicklist(id)
{
	
	$('#'+id).hide(320); 
}

function showPicklist(id)
{
	
	$('#'+id).show(320); 
}



function popitup(text,title,UniqueId) 
{
	var styleStr = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbar=no,resizable=no,copyhistory=yes,width=600,height=500,left=100,top=100,screenX=100,screenY=100';
	
	var newwindow=window.open('',UniqueId,styleStr);
	
	Set_Cookie('TestCookie', '0', '3600', '', '', '');
	
	var tmp = newwindow.document;
	tmp.write(text);
	tmp.close();
}

function MyReload()
{
var cookeivalue=Get_Cookie('TestCookie');
	
if(cookeivalue<1)
{
window.location.reload();
Set_Cookie('TestCookie', '1', '3600', '', '', '');	
}





//alert(cookeivalue);
} 


var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
  /*if(popUpWin)
  {
    if(!popUpWin.closed) popUpWin.close();
  }*/
  var rnd = 'popUpWin'+Math.floor((Math.random()*100)+1);
popUpWin = open(URLStr, rnd, 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');

}
function popupURL(URLStr)
{
	popUpWindow(URLStr, 20, 20, 900, 600);
}

miz.isFunction=function(fName)
{
	var truee='false';
    eval("if(typeof "+fName+" == 'function') { truee=true;};");
    return truee;
}
miz.isDefined=function(Name)
{
	return true;
	if(typeof(Name)!='undefined'){ return false;}

}





miz.checkChanges=function() // check any changes
{
  if(anyChanges)
    {
	   if(miz.Confirm(SaveChangeMSG)){
		   
		 miz.saveChangesValue();  		 
	     return false;
		 }else{ 
		 return true;
		 } 
	
	}
  return true;	
}

miz.saveChangesValue=function() //save changes value 
{	
	var triggerSave='';
	triggerSave=(miz.isFunction('miz.save')==true)? 'miz.save' : (miz.isFunction('saveWork')==true)?'saveWork':'';
	//trigger function
	if(triggerSave!="")
	{
	   eval(triggerSave+'();');
	}

}




miz.timeStamp=function(date)// date format dd-mm-yyyy
 {
  	var nowDate=new Date();
	if(date!="")
	{
		var D=date.split('-');
		nowDate = new Date(D[2], D[1], D[0]);
	}
	return nowDate.getTime();
 }
 
  
miz.timeStampYMDHMS=function(date)// date format yyyy-mm-dd hh:mm:ss
 {
  	var nowDate=new Date();
	if(date!="")
	{
		
		
		var DC=date.split(' ');
		var D=DC[0].split('-');
		var C=DC[1].split(':');
		
		nowDate = new Date(D[0], D[1], D[2],C[0], C[1], C[2]);
	}
	return nowDate.getTime();
 }
 
 miz.isValidDate=function(date) // date format dd-mm-yyyy
 {
    var DtTS=miz.timeStamp(date);
	var cDtTS=miz.timeStamp('');
	 if(DtTS>cDtTS)
	 {
	      return true
	 }
	 return false;
 }

/****************  Countdown Functions ******************/

      var timeDiff=new Object();
       
	   miz.countDownTime=function(dateS,dateE,cdContainer,uId,hmsStr) /// date format yyyy-mm-dd hh:mm:ss
	   {
	       timeDiff[uId]=getDateDiff(dateS,dateE);
		   timeDiff[uId].diffSMinusOne=timeDiff[uId].diffS;
		   timeDiff[uId].cdContainer=cdContainer;
		   timeDiff[uId].uId=uId;
		   timeDiff[uId].dateS=dateS;
		   timeDiff[uId].dateE=dateE;
		   timeDiff[uId].hmsStr=hmsStr;
		   startCountDown(uId);
	     
	   }  
	   function	getDateDiff(dateS,dateE) // date format yyyy-mm-dd hh:mm:ss
	   {
	    	var tS=new Object();
			tS.diffTms=0;
			tS.diffS=0;
			tS.dateS= miz.timeStampYMDHMS(dateS);
			tS.dateE= miz.timeStampYMDHMS(dateE);
			tS.diffMS=tS.dateE-tS.dateS;  // ms
			if(tS.diffMS>0)
			{
				tS.diffS=tS.diffMS/1000;
			}
			return tS;
					
	   }
	   
	   function  startCountDown(uId)
	   {
	    	if(timeDiff[uId].diffSMinusOne>0)
			{
				timeDiff[uId].diffSMinusOne=timeDiff[uId].diffSMinusOne-1;
				timeDiff[uId].hms=getHMS(timeDiff[uId].diffSMinusOne);
						
				timeDiff[uId].strDiff=timeDiff[uId].hms.h+timeDiff[uId].hmsStr.hStr+timeDiff[uId].hms.m+timeDiff[uId].hmsStr.mStr+timeDiff[uId].hms.s+timeDiff[uId].hmsStr.sStr;
				 
				timeDiff[uId].cdContainerM=timeDiff[uId].cdContainer.split('|');
				for(i=0;i<timeDiff[uId].cdContainerM.length;i++) 
				{
					miz.setHtml(timeDiff[uId].cdContainerM[i],timeDiff[uId].strDiff);
				}
							
				setTimeout('startCountDown('+uId+')',1000);
			}
			
	   }
	   
	   function	getHMS(ts) // date format dd-mm-yyyy
	   {
	    	var hms=new Object();
			hms.ts=ts;
			hms.s=0;
			hms.m=0;
			hms.h=0;
			
			if(hms.ts>0)
			{
			  hms.m= hms.ts/60;
			  hms.s= hms.ts%60;
			  hms.m=Math.floor(hms.m);
			  
			}
			if(hms.m>0)
			{
			  hms.h= hms.m/60;
			  hms.m= hms.m%60;
			  hms.h=Math.floor(hms.h);
			  
			}
			if(hms.s<10)
			{
			hms.s='0'+hms.s;
			}
			
			return hms;
					
	   }



/******************CountDown function end ***********/













function loadjscssfile(filename, filetype){
 if (filetype=="js"){ //if filename is a external JavaScript file
  var fileref=document.createElement('script')
  fileref.setAttribute("type","text/javascript")
  fileref.setAttribute("src", filename)
 }
 else if (filetype=="css"){ //if filename is an external CSS file
  var fileref=document.createElement("link")
  fileref.setAttribute("rel", "stylesheet")
  fileref.setAttribute("type", "text/css")
  fileref.setAttribute("href", filename)
 }
 if (typeof fileref!="undefined")
  document.getElementsByTagName("head")[0].amizendChild(fileref)
}




var ajaxCounter=0;



function saveDesCription(readview,editview,closeid)
					  {
						
						 var  TextDesc=tinyMCE.get(editview).getContent();
						  //	 var  TextDesc= tinyMCE.getContent(editview); 
						 
						 
						 miz.setHtml(readview,TextDesc);
 						  closePicklist(closeid);
					  }
function setDesCriptionToEditor(readview,editview,closeid)
				  {
					
				 var  TextDesc=miz.getHtml(readview);
				 tinyMCE.get(editview).setContent(TextDesc);
								
				  }				  
				  
	
	
	
	
function initMce(textarea)
{
	   tinyMCE.init({

		// General options

		mode : "textareas",

		theme : "advanced",
		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		theme_advanced_resizing : true

	});

	 
			
		
		/*
	tinyMCE.init({
	mode : "specific_textareas",
	editor_selector : textarea,
	theme : "simple"
	
	});
	

	 tinyMCE.init({
    mode : "exact",
    elements : "Description",
    theme : "advanced",
    theme_advanced_toolbar_location : "top",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true
});
*/
}

function matchMe(expr,val)
 {
  var re= new RegExp(expr);
  return val.match(re);
 }

miz.getValFromEuro=function(value)
{
	
     var replaceDot=value.replace(".", "");
	 return parseFloat(replaceDot.replace(",", "."));
	
}

miz.getValFromEuroById=function(id)
{
	return miz.getValFromEuro(miz.getVal(id));
}

function getWeekByVal(val)// format'dd-mm-yyyy'
{
	 if(val!="")
	 {
		 var d=val.split('-');
		 var  y=jQuery.datepicker.iso8601Week(new Date(parseInt(d[2]), d[1] - 1, d[0]));
		 if(y<10)
		 {
		   y='0'+y;	 
		 }
		return  y;
	 }
	return '';
}
function attachWeek(dd)
	{
	 var weekf=dd+'week';
	 if(miz.getVal(dd)!='')
	 {
	 var  dateWeek=' (week '+getWeekByVal(miz.getVal(dd))+')';
	      miz.setVal(weekf,dateWeek);
	 }
    }	

















function Set_Cookie( name, value, expires, path, domain, secure )
{
// set time, it's in milliseconds
var today = new Date();
today.setTime( today.getTime() );

/*
if the expires variable is set, make the correct
expires time, the current script below will set
it for x number of days, to make it for hours,
delete * 24, for minutes, delete * 60 * 24
*/
if ( expires )
{
expires = expires * 1000 * 60 * 60 * 24;
}
var expires_date = new Date( today.getTime() + (expires) );

document.cookie = name + "=" +escape( value ) +
( ( expires ) ? ";expires=" + expires_date.toGMTString() : "" ) +
( ( path ) ? ";path=" + path : "" ) +
( ( domain ) ? ";domain=" + domain : "" ) +
( ( secure ) ? ";secure" : "" );
}



function Get_Cookie( check_name ) {
	// first we'll split this cookie up into name/value pairs
	// note: document.cookie only returns name=value, not the other components
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var b_cookie_found = false; // set boolean t/f default f

	for ( i = 0; i < a_all_cookies.length; i++ )
	{
		// now we'll split apart each name=value pair
		a_temp_cookie = a_all_cookies[i].split( '=' );


		// and trim left/right whitespace while we're at it
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

		// if the extracted name matches passed check_name
		if ( cookie_name == check_name )
		{
			b_cookie_found = true;
			// we need to handle case where cookie has no value but exists (no = sign, that is):
			if ( a_temp_cookie.length > 1 )
			{
				cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
			}
			// note that in cases where cookie is initialized but no value, null is returned
			return cookie_value;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}
	if ( !b_cookie_found )
	{
		return null;
	}
}

miz.loadJS=function(path)
{
	
   var head= document.getElementsByTagName('head')[0];
   var script= document.createElement('script');
   script.type= 'text/javascript';
   script.src=path ;
   head.appendChild(script);
	
}








/*
function CheckAll(fmobj) {
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ((e.type=='checkbox') && (!e.disabled) ) {
      //e.checked = fmobj.allbox.checked;
	   alert(e.value);
    }
  }
}

*/

/* -------------------- cms functions ----------*/

function sh(id)
{
  if(miz.getObj(id).style.display=='')
  {
  
 
	  miz.getObj(id).style.display='none'
	 // miz.setHtml(id,'');
  
  }else
  {
  
   miz.getObj(id).style.display='';
  
  }

}


function she(id,divId)
{
  if(miz.getObj(id).style.display=='')
  {
  
      miz.setHtml(divId,'');
	  miz.getObj(id).style.display='none'
	  
  
  }else
  {
  
   miz.getObj(id).style.display='';
  
  }

}




var callbackEdit='';
var divEdit='';
function getData(div,divId,pageId,ajaxRowId,callback)
{
   callbackEdit=callback;
   divEdit=divId;
   miz.animateMe.div=divId;
   miz.animateMe.html='Loading....';
   she(div,divId);
   var url='ajxSysytem.php?actionPage='+pageId+'&ajaxRowId='+ajaxRowId;
   if(callback!='')
   {
	     
	   miz.setAjaxFunc('setEditData',url);
   }
   else
   {
     miz.setAjaxHtml(divId,url);
   }
}
function setEditData(data)
{
   miz.setHtml(divEdit,data);
   
   if(callbackEdit)
   {
	   eval(callbackEdit+'();');
   }	
}




function doSet(pageId,ajaxRowId,formId) // function doSet(pageId,ajaxRowId,dataObj)
{
  
  // var params='operation=updateField&fieldName='+dataObj.name+'&fieldValue='+dataObj.value;
  // var url='ajxSysytem.php?actionPage='+pageId+'&ajaxRowId='+ajaxRowId;
  // miz.setAjaxFuncp('flashMessage',url,params);
   
   
   var data=  miz.getFormElement(formId)
   var params='operation=updateField&'+data;
   var url='ajxSysytem.php?actionPage='+pageId+'&ajaxRowId='+ajaxRowId;
   miz.setAjaxFuncp('flashMessage',url,params);

}
function flashMessage(data)
{
    miz.setHtml('flashMessageDiv',data);
}

miz.showj=function(id)
{

	$('#'+id).show(10); 
}
miz.hidej=function(id)
{
	$('#'+id).hide(10);
	
}


var lastSwitchedRowid='';
miz.switchRow=function(id)
{

  if(id==lastSwitchedRowid)
  {
	  return;
  }
  miz.showj(id);
  if(lastSwitchedRowid!='')
  {
	 miz.hidej(lastSwitchedRowid);
	
  }
  lastSwitchedRowid=id;
}
						
miz.getFormElement=function(formId)
{
		// get all the inputs into an array.
		var $inputs = $('#'+formId+' :input');
		// not sure if you wanted this, but I thought I'd add it.
		// get an associative array of just the values.
		// var values = {};
		var values = new Array();
		var str='';
		var add=true;
		var i=0;
		$inputs.each(function() {
		var name=this.name;
		var val=$(this).val().replace('&', "m#m");

		// values[this.name] = $(this).val();
		add=( (this.type=='checkbox' || this.type=='radio') && this.checked==false)?false:true;
		if(add)
		{
		values[i]=name+'='+val; i++;
		// str=str+name+'='+val+'&';
		}
		
		});
		str=values.join('&');
		alert(str);
		return str;
		
}

// os f

function removeFlashMessageDiv()
		 {
		    $('#FlashMessageDiv').hide(1000); 
		 }
		 
	
os.deleteRecord=function(id)
{

if(miz.Confirm('Are you Sure You want to delete this record?')){
var delUrl = window.location.href;

if(delUrl.indexOf(".php?")>1){
var delUrl=delUrl+'&operation=deleteRow&delId='+id;
}
else{
var delUrl=delUrl+'?operation=deleteRow&delId='+id;
}

window.location=delUrl;
}

}
		
os.changeStatus=function(ob,table,satusfld,idFld,idVal)
{
	
	
	
   var vars='&newStatus='+ob.value+'&table='+table+'&satusfld='+satusfld+'&idFld='+idFld+'&idVal='+idVal;	
   var url='ajxSysytem.php?changeStatus=change'+vars;
   os.setAjaxFunc('flashStatusMessage',url);
	
	
}
function flashStatusMessage(data)
{
	
	os.setHtml('FlashMessageDiv',data);
	miz.showj('FlashMessageDiv',data);
    setTimeout('removeFlashMessageDiv()',3000);
	
}

os.editRecord=function(url)
{
 os.jump(url);
}
 
os.quickAdd=function(editPage,selectDDId,keyFld,ValFld,Table,where,orderby,limit,popupWidth,popupHeight)
{
	
	 
	var url=editPage+'.php?editRowId=0&hideTopLeft=1&addNewPopUp='+selectDDId+'wtpopwt'+keyFld+'wtpopwt'+ValFld+'wtpopwt'+Table+'wtpopwt'+where+'wtpopwt'+orderby+'wtpopwt'+limit;
	popUpWindow(url, 200, 50,popupWidth, popupHeight)
	
}

function dateCalander(){   /// must add dtpk js and css folder and files in wtos
	$( ".dtpk" ).datepicker({
	dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	yearRange: 'c-50:c+10'
	});
}

//--- selected row grid  by mrinal //

function trSelected(id,totalTr){
        if(id!='' && totalTr!=''){
           
            for(i=1;i<=totalTr;i++){
                if (os.getObj('selected'+i)){
                    os.getObj('selected'+i).style.background = '';
                }
            }
           
            os.getObj('selected'+id).style.background = '#DADADA'; /*DDEEFF*/ /*FFBD9D*/
        }
    }
/*------------------- cms function end ---------------*/


