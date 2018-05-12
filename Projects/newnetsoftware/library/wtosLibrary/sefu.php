<?
/**
 * Wtos Framework
 *@author mizanur82@gmail.com
 * @package    Wtos_Sefu
 */

class sefu{


    var $sefuParams=array();

    function sefu($ext='')
    {
		 global $site;
		 
		 $this->sefuParams['active']=true;
		 $this->sefuParams['baseUrl']= $site['url'];
		 $this->sefuParams['suffix']='';
		 $this->sefuParams['queryStr']=$_SERVER['QUERY_STRING'];
		 $this->sefuParams['segment']=array();
		 $this->sefuParams['segmentPage']=array();
		 
		 $this->setParams('suffix',$ext);
		 $this->sefuParams['pageSeperator']=' - ';
		 $this->splitSegment();

    }
   function setExtension($ext='')
   {
    $this->setParams('suffix',$ext);
	 $this->splitSegment();
	 return $this;
   
   }
   function setParams($name,$value)
    {
        if(!empty($name))
        {
            $this->sefuParams[$name]=$value;
        }
    }

   function getParams($name)
   {
      if(!empty($name))
        {
          return   $this->sefuParams[$name];
        }

   }
   function splitSegment()
   {

		$this->sefuParams['segment']=explode('/',$this->sefuParams['queryStr']);
		$seg=$this->sefuParams['segment'];
		if(count($seg)>0 && is_array($seg))
		{
		    $noSeg=count($seg);
			for($i=0;$i<=$noSeg;$i++)
			{
			 
				if(!isset($seg[$i]) || trim($seg[$i])=='')
				{
				   unset($seg[$i]);
				}
			
			}
		}
		
		$this->sefuParams['segment']=$seg;
		$this->sefuParams['segment']=str_replace($this->sefuParams['suffix'], '', $this->sefuParams['segment']);


   }
   function getSegments()
   {
    	
		
		return  $this->sefuParams['segment'];

   }
   function addSuffix($str)
   {
		if($this->sefuParams['suffix'] != '')
		{
		  $str=$str.$this->sefuParams['suffix'];
		}
		return $str;

   }
   function getLink($str,$print=false)
   {
       $str= $this->sefuParams['baseUrl'].$this->addSuffix($str);
	   if($print){echo $str;}
	   else{ return $str; }
   }
    function l($str,$print=false)
   {
       return $this->getLink($str,$print);
   }
   

   function LoadPageName()
   {
      	$filename='';
		$seg=$this->sefuParams['segment'];
	   	$noofseg=count($seg);
      	if(!empty($seg[1]))
      	{
          $filenameStr=$seg[1];
    	
		  $filenameA=explode($this->sefuParams['pageSeperator'],$filenameStr);
		  $this->sefuParams['segmentPage']=$filenameA;		
		  $filename=$filenameA[0];
		
		}
		
		return $filename;

   }
  

}

	

?>