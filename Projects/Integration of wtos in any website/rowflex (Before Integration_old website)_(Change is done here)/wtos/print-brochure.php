<? 
$u_agent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/MSIE/i',$u_agent))
    {
	
     include('print-brochure-ie.php');
    
         
    }else{
     include('print-brochure-chrome.php');
	
	 
	 } 
	