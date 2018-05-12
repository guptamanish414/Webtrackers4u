<?  
    session_start();
	ob_start();
	include('../includes/config.php');
	include('coomon.php');
	$MapTypeId=$_GET['MapTypeId'];
	$address=$_GET['address'];
	
	 if($MapTypeId=='STREETVIEW'){ 
	 include('wtMapStreet.php');
	 }else{
	
	
	if(isset($_GET['address']))
	{
		
	$info=$_GET['info'];
	ob_end_clean();
	 
	$mapConfig['zoom']=15;
	include('wtMap.php');
	
	
	$prop[0]['address']=$address; 
	$prop[0]['info']=$info;
	if(trim($prop[0]['address'])=="")
	 {
	  $prop[0]['address']='95 Mitcham Lane Streatham,SW16 6LY'; $prop[0]['info']='95 Mitcham Lane Streatham,SW16 6LY';
	 
	  }
	  
	   wtPlot($prop);
	   wtCanvas('style="height:100%; width:100%;"');  
	
	
?>

<script>

<?  if($MapTypeId!=''){ ?>

map.setMapTypeId(google.maps.MapTypeId.<? echo $MapTypeId; ?>);
<?  } ?>



</script>




<? }
}?>