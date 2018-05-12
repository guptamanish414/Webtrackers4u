<?php

$msgEnquery='';


if($_POST['queryForm']=='queryValues')
{ 
$msgEnquery=' Sorry your message failed  please try agin';
if($_POST['firstName']!='' && $_POST['email']!='')
		{
			
				# save to data base  888 end	
			$os->startOB();
			?>
  
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="eform">
      <tr>
        <td class="fflds" width="250"> I would like </td>
        <td><? echo $_POST['moreDetails2'] ?> &nbsp;<? echo $_POST['viewProperty'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Name: </td>
        <td><? echo $_POST['title'] ?> &nbsp;<? echo $_POST['firstName'] ?>  &nbsp;<? echo $_POST['lastName'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Email:  </td>
        <td><? echo $_POST['email'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Telephone:  </td>
        <td><? echo $_POST['telephone'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Address: </td>
        <td><? echo $_POST['address'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Country:  </td>
        <td><? echo $_POST['countryCode'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Postcode:  </td>
       <td><? echo $_POST['postcode'] ?></td>
      </tr>
      <tr>
        <td class="fflds">Your message: </td>
       <td><? echo $_POST['comments'] ?></td>
      </tr>
      <tr>
        <td class="fflds">I have a property to sell:  </td>
        <td><? echo $_POST['emailAnswerSellSituationType'] ?></td>
      </tr>
      <tr>
        <td class="fflds">I have a property to let:  </td>
        <td><? echo $_POST['emailAnswerRentSituationType'] ?></td>
      </tr>
      <tr>
        <td class="fflds">I would also like: </td>
       <td><? echo $_POST['requestValuation'] ?></td>
      </tr>
    </table>
    
    
<?
			
		 
		    $body=$os->getOB();
			 
		$os->emailSend($os->getSettings('email'),$_POST['email'],$_POST['fullname'],$_POST['fullname'].'  Contacting You ',$body);
		 
		    $msgEnquery=' Message sent successfully . Thanks for your time  ';
		}


}

?>
<style>
							
							
							.curveboxF{
							/* background:#5151FF; */
							 background:#FFFFFF; 
							-moz-border-radius:4px; 
							border-radius:4px; 
							-webkit-border-radius:4px; 
							 
							border:1px solid #CCCCCC;
							border-bottom:2px solid #CCCCCC;
							border-right:2px solid #CCCCCC;
							behavior: url(<?php  echo $site['url']; ?>ie-css3.htc); 
							color:#333333;
							width:200px;
							height:27px;
							}
							.fillform{ color:#999999; font-size:11px; font-family:Verdana, Arial, Helvetica, sans-serif; font-style:italic;}
							.msgs{color:#009900; font-size:11px; font-family:Verdana, Arial, Helvetica, sans-serif; font-style:italic;}
							.txts{color:#666666; font-size:13px; font-family:Verdana, Arial, Helvetica, sans-serif;   padding-top:5px;}
							
							</style>
<div class="fillform" style="display:;" >Please fill up the contact form .We will getback to you  as soon as possible.</div>
<div style="width:100%;">
  <style>
					   .fflds{ font-weight:bold;}
					   .required{ font-size:12px; font-weight:normal; color:#999999;}
					   .eform td{ padding:3px;}
					   .msgSS{ padding:10px; margin:5px; border:1px solid #FF9900;}
					   </style>
					   
					  <? if($msgEnquery!=''){ ?><div class="msgSS">  <?  echo $msgEnquery;?> </div><? } ?> 
  <form action="" method="post" id="contactUs" enctype="multipart/form-data">
    <table width="100%" border="0" cellspacing="1" cellpadding="1" class="eform">
      <tr>
        <td class="fflds"> I would like </td>
        <td><input id="moreDetails2" name="moreDetails2" class="checkbox" value="More details" checked="checked" type="checkbox" />
        
          More details &nbsp; &nbsp;
          <input id="viewProperty" name="viewProperty" class="checkbox" value="To view a property" type="checkbox">
          To view a property </td>
      </tr>
      <tr>
        <td class="fflds">Name: <span class="required">(required)</span></td>
        <td><input id="buyingPropertyEnquiry-title" name="title" class="inputWidth title blur" title="Title" placeholder="Title" value="" maxlength="30" type="text" style="width:40px;">
          &nbsp;
          <input id="buyingPropertyEnquiry-firstName" name="firstName" class="inputWidth name blur" title="First name" placeholder="First name" value="" maxlength="100" type="text">
          &nbsp;
          <input id="buyingPropertyEnquiry-lastName" name="lastName" class="inputWidth name blur" title="Last name" placeholder="Last name" value="" maxlength="100" type="text"></td>
      </tr>
      <tr>
        <td class="fflds">Email: <span class="required">(required)</span> </td>
        <td><input id="buyingPropertyEnquiry-email" name="email" class="email" value="" maxlength="100" type="email"></td>
      </tr>
      <tr>
        <td class="fflds">Telephone: <span class="required">(required)</span> </td>
        <td><input id="telephone" name="telephone" class="telephone" value="" maxlength="50" type="tel"></td>
      </tr>
      <tr>
        <td class="fflds">Address: </td>
        <td><textarea id="address" name="address" onkeyup="RIGHTMOVE.VALIDATION.validator.limitCharactersInField(this.form.address, 200)" rows="3"></textarea></td>
      </tr>
      <tr>
        <td class="fflds">Country: <span class="required">(required)</span> </td>
        <td><select id="countryCode" name="countryCode">
            <option value="AF">Afghanistan</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AG">Antigua And Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia</option>
            <option value="BA">Bosnia-Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvetøya</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="VG">British Virgin Islands</option>
            <option value="BN">Brunei</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CB">Canouan Island</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="CI">Côte d`Ivoire</option>
            <option value="CD">Democratic Republic of the Congo</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="DU">Dubai</option>
            <option value="TL">East Timor</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands</option>
            <option value="FO">Faroe Islands</option>
            <option value="FM">Federated States of Micronesia</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern and Antarctic Lands</option>
            <option value="GA">Gabon</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GO">Goa</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard and McDonald Islands</option>
            <option value="HN">Honduras</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Laos</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MK">Macedonia</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="IM">Margarita Island</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="MD">Moldova</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="AN">Netherlands Antilles</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="KP">North Korea</option>
            <option value="NY">Northern Cyprus</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn Islands</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="RE">Réunion</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="SP">Serbia</option>
            <option value="CS">Serbia and Montenegro</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and South Sandwich Islands</option>
            <option value="KR">South Korea</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="XB">St Barthelemy</option>
            <option value="SH">St Helena</option>
            <option value="KN">St Kitts and Nevis</option>
            <option value="LC">St Lucia</option>
            <option value="XM">St Maarten</option>
            <option value="PM">St Pierre and Miquelon</option>
            <option value="VC">St Vincent and the Grenadines</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syria</option>
            <option value="ST">São Tomé and Príncipe</option>
            <option value="TW">Taiwan</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania</option>
            <option value="TH">Thailand</option>
            <option value="BS">The Bahamas</option>
            <option value="GM">The Gambia</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad And Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks And Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB" selected="selected">United Kingdom</option>
            <option value="US">United States of America</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela</option>
            <option value="VN">Vietnam</option>
            <option value="VI">Virgin Islands (U.S.A.)</option>
            <option value="WF">Wallis and Futuna Islands</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
          </select></td>
      </tr>
      <tr>
        <td class="fflds">Postcode: <span class="required">(required)</span> </td>
        <td><input id="postcode" name="postcode" class="" value="" maxlength="10" type="text"></td>
      </tr>
      <tr>
        <td class="fflds">Your message: </td>
        <td><textarea id="comments" name="comments" onkeyup="" rows="3"></textarea></td>
      </tr>
      <tr>
        <td class="fflds">I have a property to sell: <span class="required">(required)</span> </td>
        <td><select id="emailAnswerSellSituationType" name="emailAnswerSellSituationType">
            <option value="" selected="selected">Please select</option>
            <option value="no">no</option>
            <option value="yes, it is not yet on the market">yes, it is not yet on the market</option>
            <option value="yes, it is on the market already">yes, it is on the market already</option>
            <option value="yes, it is under offer">yes, it is under offer</option>
            <option value="yes, it is already exchanged">yes, it is already exchanged</option>
          </select></td>
      </tr>
      <tr>
        <td class="fflds">I have a property to let: <span class="required">(required)</span> </td>
        <td><select id="emailAnswerRentSituationType" name="emailAnswerRentSituationType">
            <option value="" selected="selected">Please select</option>
            <option value="no">no</option>
            <option value="not yet, I intend to buy to let">not yet, I intend to buy to let</option>
            <option value="yes, it is available to let now">yes, it is available to let now</option>
            <option value="yes, it will be available to let soon">yes, it will be available to let soon</option>
            <option value="yes, it is currently occupied">yes, it is currently occupied</option>
          </select></td>
      </tr>
      <tr>
        <td class="fflds">I would also like: </td>
        <td><input id="requestValuation" name="requestValuation" value="My property valued" type="checkbox">
          
          My property valued</td>
      </tr>
    </table>
    <br />
    <input type="submit" name="action"  value="SUBMIT"  />
    <input type="hidden" value="queryValues" name="queryForm"  />
  </form>
  <br />
  <br />
</div>
