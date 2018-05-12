<?

include('modelsTable.php');
class sm extends systemModel 
{

	function setAuthor()
	{
	 echo 'MIZANUR RAHAMAN';
	}
	
	
	function chunkSplit($array,$no)
	{
	    $rs=array();
		if(is_array($array) && count($array)>0)
		{
		     $rs=array_chunk($array, $no);
		}
		return $rs;
			
	}
	
	
	
		
	
	
		
	
		
		
}


?>