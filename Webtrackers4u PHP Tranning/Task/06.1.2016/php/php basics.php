<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>php basics</title>
</head>

<body>

<h3><u>echo</u></h3>
<?php
$k= "I am Manish  \n gupta <br><br>"; 
echo nl2br($k);  //nl2br is a function for new line if we use \n for new line

$p=5;
echo "This is php basics $p <br>";
echo 'This is php basics $p';
?>

<h3><u>function</u></h3>
<?php
function myfun(){
echo 'Hello Manish';
}
echo myfun();
?>

<h3><u>function arguments</u></h3>
<?php
function familyName($fname){
echo "$fname Gupta <br>";
}
echo familyName("Manish");
echo familyName("Ahbijit");
?>

<h3><u>Passing two arguments</u></h3>
<?php
function jobfun($name, $job){
echo "$name works in $job";
}
jobfun("Manish", "IT Industery<br>");
jobfun("Suresh", "BPO<br>");
jobfun("Ram", "Cemical factory<br>");
?>

<h3><u>Default Argument Value</u></h3>
<?php
function setHeight($minheight = 50) { 
     echo "The height is : $minheight <br>";
}

setHeight(350);
setHeight();  // If we call the function setHeight() without arguments it takes the default value as argument
setHeight(135);
setHeight(80);
?>

<h3><u>Returning values</u></h3>
<?php
function sum($x, $y) {
    $z = $x + $y;
    return $z;
}

echo "6 +  4 = " . sum(6,  4) . "<br>";
echo "5 + 10 = " . sum(5, 10) . "<br>";
?>

<h3><u>Functions within functions</u></h3>
<?php
function function1()
{
	function function2()
	{
	echo "Good Morning <br>";
	}
}
function1();
function2(); //executing function1() makes funtion2() accessible. Therefore we can not call function2() independently without calling function1().
?>

<h3><u>Passing arguments by reference</u></h3>
<?php
function cube(&$x)
{
$x = $x * $x * $x;
}
$result = 5;
echo $result . "<br>";
cube($result);
echo $result;
?>

<h3><u>list() Function</u></h3>
<?php
$my_array = array("Dog","Cat","Horse");

list($a, $b, $c) = $my_array;
echo "I have several animals, a $a, a $b and a $c.";
?>

</body>
</html>
