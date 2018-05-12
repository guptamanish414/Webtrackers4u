function dateCalander(){
	$( ".dtpk" ).datepicker({
	dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	yearRange: 'c-50:c+10'
	});
}

function timepk1(){
	$(document).ready(function(){		
			$('.timePick').ptTimeSelect();		
		
		});	
}
	
function autoCompleteText(pIds,element){
	$(document).ready(function(){
	$("."+element).autocomplete(pIds);
	});
}

function chkEmpty(val) {
	val = val.replace(/^\s+/, '').replace(/\s+$/, '');
	return (val == '');
}


function chkNumeric(val) {
	rgx = /^([0-9]+)$/;
	return rgx.test(val);
}


function chkEmail(val) {
	rgx = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	return rgx.test(val);
}


function chkAlnumunderscored(val) {
	if (chkEmpty(val)) {
		return false;
	}
	rgx = /^([a-zA-Z0-9_]+)$/;
	return rgx.test(val);
}


function chkPassword(mval, cval) {
	if (chkEmpty(mval)) {
		alert("Password must be more than 5 digits.");
		return false;
	}
	if (mval.length < 6) {
		alert("Password must be more than 5 digits.");
		return false;
	}
	if (mval != cval) {
		alert("Passwords does not match.");
		return false;
	}
	return true;
}





function isGoodDate(dt){
    var reGoodDate = new RegExp("/^((0?[1-9]|[12][0-9]|3[01])[- /.](0?[1-9]|1[012])[- /.](19|20)?[0-9]{2})*$/");
    return reGoodDate.test(dt);
}




function PopupPrint(elmId,width,height) 
    {
      
	  if(elmId==''){return false;}
		var data = document.getElementById(elmId).innerHTML;
		if(width==''){width='800';}
		if(height==''){height='500';}
	
		var mywindow = window.open('WTOS', 'WTOS', 'height='+height+',width='+width);
        mywindow.document.write('<html><head>   ');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
		mywindow.document.close();
		mywindow.print();
		
       
        return true;
    }

	
	
function pF(val){	
	val =parseFloat(val);
	if(isNaN(val)){val=0;}
	return val;
}

function calculateFinancialYear(date,finYearField,expMonthField){ //dd-mm-yyyy
		if(date!=''){
			date = date.split('-');
			if(Array.isArray(date)){
				
				var day = date[0];
				var month = date[1];
				var year = date[2];
				year = pF(year);
				var expMonth = year+''+month;
				var finYear='';
		
				if(month<4){
					finYear = (year-1)+'-'+year;
				}
				else{
					finYear = year+'-'+(year+1);
				}
		
				//set value
				if(finYearField!=''){os.setVal(finYearField,finYear);}							
				if(expMonthField!=''){os.setVal(expMonthField,expMonth);}
			}
		}
}
/* for list Table tr Selected ---     $totaltr = count($records);     ----Add Into Listing tr -> id="selected<?php echo $i;?>" onclick="trSelected('<?php echo $i;?>','<?php echo $totaltr;?>');" */

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
	