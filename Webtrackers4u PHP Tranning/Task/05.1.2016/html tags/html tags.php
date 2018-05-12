<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HTML Tags</title>
</head>

<body>

<h1 align="center" style=" color:#0066FF">HTML Tags</h1>
<pre>
Text in a pre element
is displayed in a fixed-width
font, and it preserves
both      spaces and
line breaks
</pre>

<div style="color:#0000FF">
  <h3>This is a heading</h3>
  <p>This is a paragraph.</p>
</div>

<table border="1">
	<tr>
	<th colspan="2">JOB</th>
	</tr>
	
	<tr>
    <td>Company Name</td>
    <td>Year</td>
	</tr>
	
	<tr>
	<td>Webtrackers4u</td>
	<td>2016</td>
	</tr>
</table>

<ul>
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ul>

<ol start="50">
  <li>Coffee</li>
  <li>Tea</li>
  <li>Milk</li>
</ol>

<a href="http://www.html tags.php">Visit HTML Tags.com!</a>

<h3><u>Example of document.getElementById</u></h3>
<p id="para1">paragraph</p>
<script>
document.getElementById("para1").innerHTML ="This change the paragraph1 content.";
</script>


<h3><u>Example of Onclick</u></h3>
<p id="para2">paragraph2</p>
<button onclick="myfunction()">Click for change</button>
<script>
function myfunction(){
document.getElementById("para2").innerHTML ="This change the paragraph2 content on button click.";
}
</script>

<h3><u>Example of Onblur</u></h3>
Enter Your Name <input type="text" id="fname" onblur="changeName()" />
<script>
function changeName(){
var x = document.getElementById("fname");
x.value = x.value.toUpperCase();
}
</script>

<h3><u>Example of Onchange</u></h3>
<select id="myselect" onchange="changeFruit()">
<option value="mango">Mango</option>
<option value="banana">Banana</option>
<option value="apple">Apple</option>
</select>
<p id="food">paragraph</p>
<script>
function changeFruit() {
	var x = document.getElementById("myselect").value;
	document.getElementById("food").innerHTML ="You select " + x + " to eat";
}
</script>

<h3><u>Example of iframe</u></h3>
<iframe src="html tags.php">
</iframe>

<h3><u>Example of input tags</u></h3>
Name: <input type="text" name="name" value=""/> <br/><br/>

Text area: <textarea name="area"></textarea> <br/>

<input type="radio" name="sex" value="male">Male
<input type="radio" name="sex" value="female">Female<br/>

<input type="checkbox" name="vehicle" value="bus" />I have Bus <br/>
<input type="checkbox" name="vehicle" value="car" />I have Car <br/>
<input type="checkbox" name="vehicle" value="truck" />I have Truck <br/><br/>

file upload <input type="file" /> <br/><br/>

button <button type="button">Submit </button> <br/><br/>

select multiple
<select name="letters" multiple="multiple">
<option>acb</option>
<option>123</option>
<option>$@*</option>
</select><br/>

<input type="hidden" name="country" value="Norway">

</body>
</html>
