<? 
include('includes/config.php');
include('top-inner.php');
$propertyId=$_GET['propertyId'];
include('quickEditPage.php');
quickEdit_v_four($options,$propertyId,'rooms_page'); 

?>
	<? include('bottom-inner.php')?>