<script type="text/javascript">
/*<![CDATA[*/
function getNiceFloat(val, friendlyName)
{
    if (val == '')
        throw 'Please enter a value in the ' + friendlyName + ' box.';
    var result = parseFloat(val.replace(/[£%, ]/g, ''));
    if (isNaN(result))
        throw 'The ' + friendlyName + ' you entered was not recognised. Please enter a valid number.';
    if (result <= 0)
        throw 'The ' + friendlyName + ' you entered was not a positive number.';
    return result;
}

function prettyFormat(amount)
{
    main = Math.floor(amount).toString();
    frac = amount.toFixed(2);
    n = 0;

    if (main.length >= 3)
    {
        digits = main.split('');
        main = '';
        n = 0;
        while (digits.length)
        {
            main = digits.pop() + (n++ % 3 == 0 ? ',' : '') + main;
        }

        main = main.substring(0, main.length-1);
    }

    return main + '.' + frac.substring(frac.length-2);
}

function calc(form)
{
    try
    {
        var mortgage = getNiceFloat(form.mortgage.value, 'mortgage amount');
        var rate = getNiceFloat(form.rate.value, 'interest rate') / 100;
        var term = getNiceFloat(form.term.value, 'term');
    } catch (e) {
        alert(e);
        return false;
    }

    interest = (mortgage * rate) / 12;
    form.repayment_interest.value = prettyFormat(interest);
    form.repayment_capital.value = prettyFormat(interest * (1 / (1 - (Math.pow(1 / (rate + 1), term)))));
 

    return false;
}
/*]]>*/
</script>
<form class="form_field1" onsubmit="calc(this); return false" method="post">
						<fieldset>
							<p>
								<label>Mortgage amount</label>
								<input type="text" class="textfield2"  name="mortgage" id="mortgage"/>
							</p>
							<p>
								<label>Interest rate</label>
								<input type="text" class="textfield2" name="rate" id="rate" />
							</p>
							<p>
								<label>Term</label>
								<input type="text" class="textfield2" name="term" id="term"  />
							</p>
							<p class="formbtn">
								<input type="submit" class="button" value="Calculate" />
							</p>
							<p>
								<label>Interest Only</label>
								<input type="text" class="textfield2" name="repayment_interest"
                id="repayment_interest" />
							</p>
							<p>
								<label>Capital Payment</label>
								<input type="text" class="textfield2" name="repayment_capital"
                id="repayment_capital" />
							</p>
						</fieldset>
</form>
<article class="contents2" >
<p style=" max-width:331px; padding-right:5px; text-align:justify;">Intellicalc is essentially an affordability mortgage calculator which provides crucial home affordability values on a visual chart with a slider control to adjust payments and the maximum purchase price to a mortgage you could afford.</p>
<figure><script type="text/javascript" src="http://www.occfinance.com/intellicalc/intellicalc.aspx?aid=broadwaywest"></script>
<script type="text/javascript">
		intellicalc._searchurl = '<? echo $site['url'] ?>Sales/_100_%maxpurchase%_1';
		intellicalc.icbar_colors = '#7b0023,#850024,#8e0023,#a10023,#A02,#C20027'.split(',');
</script>
<script type="text/javascript">intellicalc.Banner();</script> </figure></article>