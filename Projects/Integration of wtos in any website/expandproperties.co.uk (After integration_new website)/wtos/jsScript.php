<script>

function nextprevweek(d,dir){
		var today = new Date(d);
		if(dir=='N'){ var nextweekv = new Date(today.getFullYear(), today.getMonth()+1, today.getDate()+7);}
		
		if(dir=='P'){ var nextweekv = new Date(today.getFullYear(), today.getMonth()+1, today.getDate()-7);	}
		
		var d =nextweekv.getDate();  d =d.toString(); if(d.length==1){d='0'+d;}
		var m =nextweekv.getMonth(); m =m.toString(); if(m.length==1){m='0'+m;}
		//alert(m);
		var y =nextweekv.getFullYear();
	
	 var nextweekDate= d+'-'+m+'-'+y;
	 
	// alert(nextweekDate);
	 // var nextweekDate= nextweekv.toString('DD-MM-YYYY');
	  
	 
    return nextweekDate;
}
function prevweek(d){ // not in use
    var today = new Date(d);
    var nextweekv = new Date(today.getFullYear(), today.getMonth()+1, today.getDate()-7);
	 var nextweekDate= nextweekv.getDate()+'-'+nextweekv.getMonth()+'-'+nextweekv.getFullYear();
	 // var nextweekDate= nextweekv.toString('DD-MM-YYYY');
	  
	 
    return nextweekDate;
}

function setWeek(dir)
{
	 
var mainDate=	os.getVal('sDate');
if(dir=='N'){
    mainDate=	os.getVal('eDate');}			 
 var md= mainDate.split('-');
 if(md[1].length==1){md[1]='0'+md[1];}
 if(md[0].length==1){md[0]='0'+md[0];}
 var mainDateDmy=md[2]+'-'+md[1]+'-'+md[0];

 
if(dir=='N'){
    
	var calcDay=nextprevweek(mainDateDmy,dir);
	os.setVal('sDate',mainDate );
	os.setVal('eDate',calcDay);
	 
	
	}
	
if(dir=='P'){
    
	var calcDay=nextprevweek(mainDateDmy,dir);
	os.setVal('eDate',mainDate );
	os.setVal('sDate',calcDay);
	 
	
	}






drawGrid()
 



}


 






			   function drawGrid()
			   {
			   
			    if(document.getElementById('sDate')){
			     var sDatev=os.getVal('sDate');
				 var eDatev=os.getVal('eDate');
			    var srci='calenderGrid.php?sDate='+sDatev+'&eDate='+eDatev;
				//alert (srci);
				os.getObj('calenderFrame').src=srci;
				}
			  
			   }
			   
			   
drawGrid()// for the first time

			   </script>