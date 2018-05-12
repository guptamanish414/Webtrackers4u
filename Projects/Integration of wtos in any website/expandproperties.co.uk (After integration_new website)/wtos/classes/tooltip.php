<?php
class tooltip
{

public $initTip;
private $objList=array();

function tooltip($idLink=array())
	{
	  $this->objList=$idLink;
	  $this->initTip=$this->startTooltip();
	}
	
function addObject($id,$lnk)
{
	if($id!="" && $lnk!="")
	{
		$p=count($this->objList);
		$this->objList[$p]['id']=$id;
		$this->objList[$p]['url']=$lnk;
	
	}
	$this->initTip=$this->startTooltip();
}

function startTooltip()
{
	   $strArr='';
	   if(is_array($this->objList) and count($this->objList))
	   {
			 foreach($this->objList as $val)
			 {
			   
			  $strArr .= "caR.setTooltip('".$val['id']."','".$val['url']."');";
			   
			 }
	   
	   }
	   
	   $str='<script>'.$strArr.'</script>';
	   return $str;


}




}



?>