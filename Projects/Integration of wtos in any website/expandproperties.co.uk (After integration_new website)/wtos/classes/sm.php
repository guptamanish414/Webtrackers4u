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
	
	function removeImage($table,$fld,$fldVal,$getFld,$path)
	{
	   if($fldVal>0)
	   {	
	     
			$imgName=$this->getByFld($table,$fld,$fldVal,$getFld);
			 $imgPath=$path.$imgName;
			
			if(is_file($imgPath))
			{
			 
	           unlink($imgPath);
			   return true;
			}
	   }
	   return false;
	}		
	
	
		
	
		
		
}


?>