
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>php basics2</title>
</head>

<body>
<h3><u>Date</u></h3>
<?php
// Prints the day
echo date("l") . "<br>";

// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A") . "<br>";

// Prints October 3, 1975 was on a Friday
echo "Oct 3,1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

// Use a constant in the format parameter
echo date(DATE_RFC822) . "<br>";

// prints something like: 1975-10-03T00:00:00+00:00
echo date(DATE_ATOM,mktime(0,0,0,10,3,1975));
?>
<br/>
<br/>

<h3><u>Array function</u></h3>
<?php
$cars=array("Volvo","BMW","Toyota"); 
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
?>
<br/>
<br/>

<h3><u>String function</u></h3>
<?php
$str = "Hello World!";
echo $str . "<br>";
echo chop($str,"World!");
?>
<br/>
<br/>

<h3><u>redirect</u></h3>
<?php
// This results in an error.
// The output above is before the header() call
header('Location: http://www.example.com/');
?>
</body>
</html>