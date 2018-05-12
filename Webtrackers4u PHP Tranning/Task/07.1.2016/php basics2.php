
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>php basics2</title>
</head>

<body>
<?php
//start the session
session_start();
?>
<br/>

<h3><u>Session</u></h3>
<?php
//Set session variable.
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "session variables are set <br/>";

$color=$_SESSION['favcolor'];
echo 'For $_SESSION["favcolor"] value is set ' . $color;	//printing session variable value.
?>
<br/>

<h3><u>While oop</u></h3>
<?php
$count=0;
While($count<=5){
	if($count==5){
		echo "FIVE";
		}
	else{
	echo "$count, ";
	}
	$count++;
}
?>
<br/>

<h3><u>for loop</u></h3>
<?php
for($count=0; $count<=5; $count++){
echo "$count, ";
}
?>
<br/><br/>
<?php
for($count=0; $count<=5; $count++){
	if($count % 2 == 0){
		echo "$count is even <br/>";
		}
		else{
		echo "$count is odd <br/>";
		}
}
?>

<h3><u>foreach loop</u></h3>
<?php
$ages = array(5,7,8,12,15);
foreach($ages as $age){
echo "Age = $age <br/>";
}
?>
<br/>

<h3><u>foreach loop using associative array</u></h3>
<?php
$person = array("firstname" => "Manish",
			  "lastname" => "Gupta",
			  "address" => "Kanchrapara",
			  "zip_code" => "743145"
			   );
foreach($person as $key => $values){
$key_not=ucwords(str_replace("_", " ", $key)); 
echo "{$key_not} : {$values} <br/>";
}
?>
<br/>

<h3><u>Switch case</u></h3>
<?php
/*
 * multiline comment 
 * in php contain all lines *
 */
$i=0;
switch($i){
	case 0: 
	echo "i=0";
	break;
	case 1:
	echo "i=1";
	break;
	case 2:
	echo "i=2";
	break;
	default:
	echo " i is not between 0 to 2";
} 
?>
<br/>

<h3><u>Class & Objects</u></h3>
<?php
//Creating class interestCalculator
class interestCalculator
{
public $rate;
public $duration;
public $capital;
	public function calculateInterest()
	{
	return ($this->rate*$this->duration*$this->capital)/100;
	}
}
//Creating object of class interestCalculator to calculate interest.
$calculator1 = new InterestCalculator();

$calculator1->rate = 3;
$calculator1->duration =2;
$calculator1->capital = 300;

$interest1 = $calculator1->calculateInterest();

echo "Your interest on capital $calculator1->capital with rate $calculator1->rate for duration $calculator1->duration is $interest1 <br/> ";
?> 
<br/>

<h3><u>Implode</u></h3>
<?php
$arr= array("I", "work", "in", "webtrackers4u");
$imp = implode(" ",$arr);
echo $imp;
?>
<br/>

<h3><u>Explode</u></h3>
<?php
$str="I am a student";

print_r (explode(" ",$str));
?>
</body>
</html>