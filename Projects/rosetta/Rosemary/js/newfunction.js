/*Mrinal Kanti Pain (mrinal.pain@gmail.com)*/
function dateCalander(){   /// must add dtpk js and css folder and files in site
	$( ".dtpk" ).datepicker({
	dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	yearRange: 'c-80:c+10'
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

function ImageExist(url) 
{
	var img = new Image();
	img.src = url;
	return img.height != 0;
}
		
function showLargeImage(imgSrc){
	if(imgSrc!='' && ImageExist(imgSrc)){
		
		var img = new Image();
		img.src = imgSrc;
		var imgHeight = img.height;
		var imgWidth = img.width;
		//if(imgHeight>600){imgHeight=600;}
		//if(imgWidth>1100){imgWidth=1100;}
		
		var popupHeight = imgHeight+20;
		var popupWidth = imgWidth+20;
		popUpWindow('view-image.php?src='+imgSrc, 50, 50, popupWidth, popupHeight);
	}
}

function formSubmit(formId){
		document.getElementById(formId).submit();
}


var Base64 = {

    // private property
    _keyStr : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",

    // public method for encoding
    encode : function (input) {
        var output = "";
        var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
        var i = 0;

        input = Base64._utf8_encode(input);

        while (i < input.length) {

            chr1 = input.charCodeAt(i++);
            chr2 = input.charCodeAt(i++);
            chr3 = input.charCodeAt(i++);

            enc1 = chr1 >> 2;
            enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
            enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
            enc4 = chr3 & 63;

            if (isNaN(chr2)) {
                enc3 = enc4 = 64;
            } else if (isNaN(chr3)) {
                enc4 = 64;
            }

            output = output +
            this._keyStr.charAt(enc1) + this._keyStr.charAt(enc2) +
            this._keyStr.charAt(enc3) + this._keyStr.charAt(enc4);

        }

        return output;
    },

    // public method for decoding
    decode : function (input) {
        var output = "";
        var chr1, chr2, chr3;
        var enc1, enc2, enc3, enc4;
        var i = 0;

        input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

        while (i < input.length) {

            enc1 = this._keyStr.indexOf(input.charAt(i++));
            enc2 = this._keyStr.indexOf(input.charAt(i++));
            enc3 = this._keyStr.indexOf(input.charAt(i++));
            enc4 = this._keyStr.indexOf(input.charAt(i++));

            chr1 = (enc1 << 2) | (enc2 >> 4);
            chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
            chr3 = ((enc3 & 3) << 6) | enc4;

            output = output + String.fromCharCode(chr1);

            if (enc3 != 64) {
                output = output + String.fromCharCode(chr2);
            }
            if (enc4 != 64) {
                output = output + String.fromCharCode(chr3);
            }

        }

        output = Base64._utf8_decode(output);

        return output;

    },

    // private method for UTF-8 encoding
    _utf8_encode : function (string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }

        return utftext;
    },

    // private method for UTF-8 decoding
    _utf8_decode : function (utftext) {
        var string = "";
        var i = 0;
        var c = c1 = c2 = 0;

        while ( i < utftext.length ) {

            c = utftext.charCodeAt(i);

            if (c < 128) {
                string += String.fromCharCode(c);
                i++;
            }
            else if((c > 191) && (c < 224)) {
                c2 = utftext.charCodeAt(i+1);
                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
                i += 2;
            }
            else {
                c2 = utftext.charCodeAt(i+1);
                c3 = utftext.charCodeAt(i+2);
                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
                i += 3;
            }

        }

        return string;
    }

}
