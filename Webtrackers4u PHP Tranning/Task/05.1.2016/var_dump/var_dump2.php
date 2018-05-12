
<?php
ob_start();
var_dump("Var_dump output in a string");
$out = ob_get_clean();
echo $out;
echo("<br>");
echo substr($out,0,20);
?>
    