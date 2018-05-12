<? session_start();
ob_start();
include('includes/config.php');
include('coomon.php');
ob_end_clean();
$table=$_GET['table'];
$idVal=$_GET['pkval'];
$idFld=$_GET['pk'];

if($_GET['iFrameAjaxSave']=='OK' && $table=='news')
{
 
	$data['title']=$_POST['title'];
	$data['newsdate']=$_POST['newsdate'];
	$data['body']=$_POST['body'];
	
	$savedId = $os->saveR($table,$data,$idFld,$idVal); 
	$msg=($idVal)?'Record saved successfully':'Record added successfully';
	echo $msg.'@@'.$savedId;
	exit();
	
}